<?php

class Video extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("video");

    }

    public  function  insert(){
        $data['name']=$this->input->post('name');
        $data['details']=$this->input->post('details');
        $v_link =$this->input->post('link');;
   
        if( strpos($v_link,'v=') != false) {
             $b = explode('v=',$v_link);
              $data['link'] =$b[1];
        }
        
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        
        $this->db->insert('video',$data);
    }
    //////////////////////////
///////////selecting data//////////////////
    public function select(){
        $this->db->select('*');
        $this->db->from('video');
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
    
    public function select_web($limit,$start){
        $this->db->select('*');
        $this->db->from('video');
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
        $this->db->delete('video');

    }
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('video', array('id'=>$id));
        return $h->row_array();
    }
    
    public function update($id){
        
        $v_link =$this->input->post('link');;
        $b = explode('v=',$v_link);
        
        $update = array(
            'name'=>$this->input->post('name') ,
            'details'=>$this->input->post('details') ,
            'date' => strtotime(date("Y-m-d")),
            'date_s' => time(),
            'link'  => $b[1]
        );
        
        $this->db->where('id', $id);
        if($this->db->update('video',$update)) {
            return true;
        }else{
            return false;
        }
    }
    

 
    
   

 }