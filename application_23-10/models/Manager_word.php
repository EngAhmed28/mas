<?php

class Manager_word extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("all_words");

    }

    public  function  insert($type){
        $data['content']=$this->input->post('content');
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        $data['type'] = $type;
        
        $this->db->insert('all_words',$data);
    }
    //////////////////////////
///////////selecting data//////////////////
    public function select($limit,$type){
        $this->db->select('*');
        $this->db->from('all_words');
        $this->db->where('type',$type);
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
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('all_words', array('id'=>$id));
        return $h->row_array();
    }
    public function update($id){
        $update = array(
            'content'=>$this->input->post('content') ,
            'date' => strtotime(date("Y-m-d")),
            'date_s' => time() 
        );
        $this->db->where('id', $id);
        if($this->db->update('all_words',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
   
 }