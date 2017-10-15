<?php
class Pages extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
    //return row count
    public function record_count() {
        return $this->db->count_all("pages");
    }
    //return data array
    public function select($limit,$start){
        /////
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->join('groups', 'pages.group_id_fk = groups.group_id');
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    ///insert data
    public function insert(){
$data=array(
    'page_title'=>$this->input->post('page_title'),
    'page_link'=>$this->input->post('page_link'),
    'group_id_fk'=>$this->input->post('group_id_fk'),
    'page_icon_code'=>$this->input->post('page_icon_code'),
    'page_order'=>$this->input->post('page_order')
);
        if($this->db->insert('pages',$data)){
          return true;
        }else{
            return false;
        }
    }
    //fetch row by id
    public function get_by_id($id){
$query=$this->db->get_where('pages',array('page_id'=>$id));
   return $query->row_array();
    }
    //update row
    public function update($id,$data){
        $this->db->where('page_id', $id);

        if ($this->db->update('pages', $data)) {
            return true;

        } else {
            return false;
        }

    }
    //delete row
    public function delete(){

    }
    //select all group for select
    public function get_all_groups(){
        $query=$this->db->get('groups');
        return $query->result();
    }
}