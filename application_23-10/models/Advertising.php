<?php

class Advertising extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("advertising");

    }

    public  function  insert($file){
        $data['image'] = $file;
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
     

        
        $this->db->insert('advertising',$data);
    }
///////////selecting data//////////////////
    public function select($limit){
        $this->db->select('*');
        $this->db->from('advertising');
        $this->db->order_by('id','DESC');
        $this->db->limit($limit);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
      public function select_adver(){
        $this->db->select('*');
        $this->db->from('advertising');
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
        $this->db->delete('advertising');

    }
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('advertising', array('id'=>$id));
        return $h->row_array();
    }
    public function update($id,$file){

        $update = array(
            'date' => strtotime(date("Y-m-d")),
            'date_s' => time(),
        );
        
        
    if($file != ''){
            $update['image']=$file ;
        }    
        
        $this->db->where('id', $id);
        if($this->db->update('advertising',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    
    

 }