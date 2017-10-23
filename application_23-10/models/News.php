<?php

class News extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count($type){
        $this->db->select('*');
        $this->db->from('news');
        $array = array('type' => $type, 'suspend' => 1);
        $this->db->where($array);
        return $this->db->count_all_results();

    }
    
    public  function record_count_all($type){
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('type',$type);
        return $this->db->count_all_results();

    }

    public  function  insert($file){
        $data['title']=$this->input->post('news_name');
        $data['content']=$this->input->post('details');
        $data['date']=$this->input->post('news_date');
        $data['image']=serialize($file);
        $data['date_s']=time();
        $data['date_day'] = strtotime(date("m/d/Y"));
        $data['publisher'] = $_SESSION['user_id'];
        $data['type'] = 0;
       
    
        $this->db->insert('news',$data);
    }
    //////////////////////////
///////////selecting data//////////////////
    public function select($limit){
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('type',0);
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
     public function select_web($limit,$type,$id,$start){
        $this->db->select('*');
        $this->db->from('news');
        if($id=='')
            $array = array('type' => $type, 'suspend' => 1);
        else
            $array = array('type' => $type, 'suspend' => 1, 'id' => $id);
        $this->db->where($array); 
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
     public function select_except($limit,$type,$id,$start){
        $this->db->select('*');
        $this->db->from('news');
        $array = array('type' => $type, 'suspend' => 1, 'id !=' => $id);
        $this->db->where($array); 
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
    
    /////delete/////
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('news');

    }
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('news', array('id'=>$id));
        return $h->row_array();
    }
    public function update($id,$file){
        
        $h = $this->db->get_where('news', array('id'=>$id));
        $row = $h->row_array();
        
        $photo=unserialize($row['image']);
        if($file == '')
            $image = $photo;
        else
            $image = array_merge($photo,$file);
        $final = serialize($image);
        
        $update = array(
            'title'=>$this->input->post('news_name') ,
            'content'=>$this->input->post('details') ,
            'date'=>$this->input->post('news_date') ,
            'image'=>$final,
            'date_s'=>time(),
            'date_day' => strtotime(date("m/d/Y")),
            'publisher' => $_SESSION['user_id'],
            'type' => 0
        );
        $this->db->where('id', $id);
        if($this->db->update('news',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    
    public function delete_photo($id,$index){
        $h = $this->db->get_where('news', array('id'=>$id));
        $row = $h->row_array();
        
        $unserial = unserialize($row['image']);
        unset($unserial[$index]); 
        $unserial=array_values($unserial);
        $unserial=serialize($unserial);
        $update['image']=$unserial;
        $this->db->where('id', $id);
        if($this->db->update('news',$update)) {
            return true;
        }
    }
    
     /////////////////////// Suspend
    
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
        if($this->db->update('news',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
         public function select_all(){
        $this->db->select('*');
        $this->db->from('news');
       
        $this->db->where('type', 2);
  
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
    
             public function select_all_news(){
        $this->db->select('*');
        $this->db->from('news');
       
        $this->db->where('type', 0);
  
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