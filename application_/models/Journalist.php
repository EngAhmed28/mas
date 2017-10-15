<?php

class Journalist extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("news");

    }

    public  function  insert($file,$file2){
        $data['title']=$this->input->post('news_name');
        $data['content']=$this->input->post('details');
        $data['date']=$this->input->post('news_date');
        $data['image']=serialize($file);
        $data['logo'] = $file2;
        $data['type'] = 1;
        $data['newspaper_name'] = $this->input->post('newspaper_name');
        $data['date_s']=time();
        $data['date_day'] = strtotime(date("m/d/Y"));
        $data['publisher'] = $_SESSION['user_id'];
       
    
        $this->db->insert('news',$data);
    }
    //////////////////////////
///////////selecting data//////////////////
    public function select($limit){
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('type',1);
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
        $h = $this->db->get_where('news', array('id'=>$id));
        return $h->row_array();
    }
    public function update($id,$file,$file2){
        
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
            'type' => 1,
            'newspaper_name'=>$this->input->post('newspaper_name') ,
            'date_s'=>time(),
            'date_day' => strtotime(date("m/d/Y")),
            'publisher' => $_SESSION['user_id']
        );
        if($file != ''){
            $update['logo']=$file ;
        }
        $this->db->where('id', $id);
        if($this->db->update('news',$update)) {
            return true;
        }else{
            return false;
        }
    }   

}