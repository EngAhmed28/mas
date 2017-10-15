<?php

class Slider extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("slider");

    }

    public  function  insert($file){
        $data['title']=$this->input->post('title');
        $data['img'] = $file;
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
     

        
        $this->db->insert('slider',$data);
    }
    //////////////////////////
///////////selecting data//////////////////
    public function select($limit){
        $this->db->select('*');
        $this->db->from('slider');
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
    /////////////////
    /////delete/////
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('slider');

    }
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('slider', array('id'=>$id));
        return $h->row_array();
    }
    public function update($id,$file){


            $update = array(
            'title'=>$this->input->post('title') ,
            'date' => strtotime(date("Y-m-d")),
            'date_s' => time(),
        );
       
                if($file != ''){
            $update['img']=$file ;
        }    
            
        $this->db->where('id', $id);
        if($this->db->update('slider',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    
    
    //////////////////////////////////shreef
    
    public function get_all_img(){

        $query=$this->db->get('slider');

        return $query->result();

    }
    

 }