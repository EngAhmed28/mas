<?php

class Spending extends CI_Model
{
    public  function __construct()
    {
        parent::__construct();
    }


    public  function  insert(){
        $data['spending_for']=$this->input->post('spending_for');
        $data['spending_type']=$this->input->post('spending_type');
        $this->db->insert('spending',$data);
    }
    ///////////selecting data//////////////////
    public function select(){
        $q = $this->db->get('spending');
        return $q->result();
    }
    /////////////////
    ///////update/////////
    public function getById($id){
        $h = $this->db->get_where('spending', array('spending_id_pk'=>$id));
        return $h->row_array();
    }

    public function update($id){
        $update = array(
            'spending_for'=>$this->input->post('spending_for') ,
            'spending_type'=>$this->input->post('spending_type'),
        );
        $this->db->where('spending_id_pk', $id);
        if($this->db->update('spending',$update)) {
            return true;
        }else{
            return false;
        }


    }
    /////delete/////
    public function delete($id){
        $this->db->where('spending_id_pk',$id);
        $this->db->delete('spending');

    }
    ////////////////////




}