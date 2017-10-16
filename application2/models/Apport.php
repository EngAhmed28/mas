<?php


class Apport extends CI_Model
{

    public function __construct()
    {
        parent:: __construct();
    }

    public  function record_count(){

        return $this->db->count_all("apport");

    }


    public function insert(){


        $data['first_name']=$this->input->post('first_name');

        $data['last_name']=$this->input->post('last_name');

        $data['address']=$this->input->post('address');
        $data['gender']=$this->input->post('gender');
        $data['email']=$this->input->post('email');
        $data['phone']=$this->input->post('phone');
        $data['n_file']=$this->input->post('n_file');
        $data['depart_id']=$this->input->post('depart_id');

        $data['doctor_id']=$this->input->post('doctor_id');
        $data['times']=$this->input->post('times');
 

        $data['date'] = strtotime(date("Y/m/d"));
        $data['suspend']=1;
    $this->db->insert('apport',$data);


    }

public function select($limit,$start){
        $this->db->select('*');
        $this->db->from('apport');
        $this->db->order_by('id','DESC');
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function times(){
        $this->db->select('*');
        $this->db->from('apport');
        $this->db->where('date',strtotime(date("Y/m/d")));
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
    
    
        public function times_aprove($type){
        $this->db->select('*');
        $this->db->from('apport');
        $this->db->where('suspend',$type);
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
    /////////////////
    /////delete/////
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('apport');

    }
    

    /////////////////////////

    public  function getallinbox(){
        $this->db->select("*");
        $this->db->from("apport");
        $this->db->where("active",0);
        $query=$this->db->get();
        return $query->result_array();

    }

    public function getmessagebyid($id){
        $this->db->select("*");
        $this->db->from("apport");
        $this->db->where("id",$id);
        $query=$this->db->get();
        return $query->row_array();
    }
    public function readmessagebyid($id){
        $data['active']=1;
        $this->db->where("id",$id);

        if($this->db->update("apport",$data)){
            return true;
        }else{
            return false;
        }

    }

 public function suspend($id,$clas)
    {
        if($clas == 'danger')
        {
            $update = array(
                'suspend' => 1
            );
        }
        else
        {
            $update = array(
                'suspend' => 0
            );
        }
        
        $this->db->where('id', $id);
        if($this->db->update('apport',$update)) {
            return true;
        }else{
            return false;
        }
    }
    


}