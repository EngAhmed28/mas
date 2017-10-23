<?php
class Fatora_edit extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
    }

    public function select($code){
        $DB1 = $this->load->database('kingdom', TRUE);
        $DB1->select('*');
        $DB1->where(array('petient_id'=>$code,'in/out'=>2,'hospital_id'=>2));
        $query = $DB1->get('operation');
       
        if ($query->num_rows() > 0){
            $i = 0;
            foreach ($query->result() as $row){
                $data[$row->fatora_num][] = $row;
                /*$data[$row->fatora_num][$i] = $row;
                if($row->status == 1)
                    $data[$row->fatora_num][$i]->payment = $this->select_payment($row->fatora_num);
                $i++;*/
            }
            return $data;
        }
        return false;
    }
    
    public function select_payment($code){
        $DB1 = $this->load->database('kingdom', TRUE);
        $DB1->select('*');
        $DB1->where('fatora_num',$code);
        $query = $DB1->get('payment');
       
        if ($query->num_rows() > 0){
            $i = 0;
            foreach ($query->result() as $row){
                $data[$row->id] = $row;
                //$data[$i]->operation = $this->select($code);
                //$i++;
            }
            return $data;
        }
        return false;
    }

 }