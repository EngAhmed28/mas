<?php

class Achieve extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
    
    public  function  insert($file){
        $data['title']=$this->input->post('news_name');
        $data['content']=$this->input->post('details');
        $data['date']=$this->input->post('news_date');
        $data['image']=serialize($file);
        $data['date_s']=time();
        $data['date_day'] = strtotime(date("m/d/Y"));
        $data['publisher'] = $_SESSION['user_id'];
        $data['type'] = 2;
       
    
        $this->db->insert('news',$data);
    }
    //////////////////////////
///////////selecting data//////////////////
    public function select($limit){
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('type',2);
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
            'type' => 2
        );
        $this->db->where('id', $id);
        if($this->db->update('news',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
   

}