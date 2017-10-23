<?php

class Vote extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
    }




///////update/////////

    public function update_v($data){

        $h = $this->db->get_where('voting', array('id'=>$data));
        $row = $h->row_array();
        
      $addetion=$row['count'];

         $count=$addetion+1;

        $update = array(
            'count'=>$count,
        );
        
        $this->db->where('id', $data);
        if($this->db->update('voting',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
       public function select_vote(){
        $this->db->select('*');
        $this->db->from('voting');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


 }