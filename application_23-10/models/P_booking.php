<?php

class P_booking extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("apport");

    }

    public  function  insert(){
       /* $data['dep_id']=$this->input->post('dep_id');
        $data['doc_id']=$this->input->post('doc_id');
        $data['name']=$this->input->post('name');
        $data['address']=$this->input->post('address');
        $data['gender']=$this->input->post('gender');
        $data['email']=$this->input->post('email');
        $data['phone']=$this->input->post('phone');
        $data['booking_date']=$this->input->post('booking_date');
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        
        $this->db->insert('appointment',$data);*/
    }
    //////////////////////////
///////////selecting data//////////////////
    public function select($type){
        $this->db->select('apport.*,doctor.name as doc_name,departments.name as dep_name');
        
        $this->db->join('doctor','doctor.id=apport.doc_id','right');
        
        $this->db->join('departments','departments.id=apport.dep_id','left');
        
        $this->db->order_by('apport.id','DESC');
        
        $query = $this->db->get_where('apport', array('suspend'=>$type));
        
        return $query->result();
    }
    
    
    
    /////////////////
    /////delete/////
  /*  public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('appointment');

    }*/
///////update/////////

  /*  public function update($type,$id){
        $update = array(
            'approve'=>$type
        );
        
        $this->db->where('id', $id);
        if($this->db->update('appointment',$update)) {
            return true;
        }else{
            return false;
        }
    }
    */
  
    
   

 }