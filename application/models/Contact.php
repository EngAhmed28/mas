<?php

class Contact extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){

        return $this->db->count_all("contact");

    }

    public  function  insert($email){
        $data['title']=$this->input->post('title');
        $data['content']=$this->input->post('content');
        $data['email'] = $email;
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        $data['name'] = $this->input->post('name');
        $data['active'] = 0;
        
        $this->db->insert('contact',$data);
    }
    //////////////////////////
///////////selecting data//////////////////
    public function select($limit,$start){
        $this->db->select('*');
        $this->db->from('contact');
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
    /////////////////
    /////delete/////
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('contact');

    }
    
    /////////////////////////
    
    public  function getallinbox(){
        $this->db->select("*");
        $this->db->from("contact");
        $this->db->where("active",0);
        $query=$this->db->get();
        return $query->result_array();

    }
    
    public function getmessagebyid($id){
     $this->db->select("*");
        $this->db->from("contact");
        $this->db->where("id",$id);
        $query=$this->db->get();
        return $query->row_array();
    }
public function readmessagebyid($id){
      $data['active']=1;
        $this->db->where("id",$id);

        if($this->db->update("contact",$data)){
            return true;
        }else{
            return false;
        }

}

 }