<?php

class Album extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("album_associations");

    }

    public  function  insert($file){
      
        $data['img']=serialize($file);
        $data['date_s']=time();
        $data['date'] = strtotime(date("m/d/Y"));
        
       
    
        $this->db->insert('album_associations',$data);
    }
    //////////////////////////
///////////selecting data//////////////////
    public function select(){
        $this->db->select('*');
        $this->db->from('album_associations');
        $this->db->order_by('id','DESC');
        //$this->db->limit($limit);
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
        $this->db->delete('album_associations');

    }
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('album_associations', array('id'=>$id));
        return $h->row_array();
    }
    public function update($id,$file){
        
        $h = $this->db->get_where('album_associations', array('id'=>$id));
        $row = $h->row_array();
        
        $photo=unserialize($row['img']);
        if($file == '')
            $img = $photo;
        else
            $img = array_merge($photo,$file);
        $final = serialize($img);
        
        $update = array(
            'img'=>$final,
            'date_s'=>time(),
            'date' => strtotime(date("m/d/Y"))
           
        );
        $this->db->where('id', $id);
        if($this->db->update('album_associations',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    
    public function delete_photo($id,$index){
        $h = $this->db->get_where('album_associations', array('id'=>$id));
        $row = $h->row_array();
        
        $unserial = unserialize($row['img']);
        unset($unserial[$index]); 
        $unserial=array_values($unserial);
        $unserial=serialize($unserial);
        $update['img']=$unserial;
        $this->db->where('id', $id);
        if($this->db->update('album_associations',$update)) {
            return true;
        }
    }
    
     /////////////////////// Suspend
             public function select_imgs($id){
        $this->db->select('*');
        $this->db->from('album_associations');
        $this->db->where('id',$id); 
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


    public function get_all_img(){

        $query=$this->db->get('album_associations');

        return $query->result();

    }
    
    
    

    
    
    
    
    
    
    
        public function select_web($limit,$start){
        $this->db->select('*');
        $this->db->from('album_associations');
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
    
    
     public function select_limit(){
        $this->db->select('*');
        $this->db->from('album_associations');
       
        $this->db->order_by('id','DESC');
        $this->db->limit(8);
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