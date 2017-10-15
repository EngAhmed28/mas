<?php
class Roles extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
    public  function selectgroups(){
        $this->db->order_by('group_order', 'ASC');
       $query=$this->db->get('groups');
        return $query->result();
    }
    public  function selectpages($groupid){
        $this->db->order_by('page_order', 'ASC');
        $query=$this->db->get_where('pages',array('group_id_fk'=>$groupid));
        return $query->result();
    }
    public function insert(){
$dataarray=array('role_name'=>$this->input->post('role_name'));
        $insert=$this->db->insert('roles',$dataarray);
        if($insert==1){
            $role_id=$this->db->insert_id();
            foreach($this->input->post('page_id_fk') as $page_id=>$pagevalue){
                $permition_array=array('role_id_fk'=>$role_id,'page_id_fk'=>$pagevalue);
                $this->db->insert('permissions',$permition_array);

            }

            return true;
        }else{
            return false;
        }
    }
    public function select(){
        $this->db->order_by('role_id_pk','ASC');
        $query=$this->db->get('roles');
        return $query->result();
    }
    public function get_by_id($id){
        $query= $this->db->get_where('roles',array('role_id_pk'=>$id));
        return $query->row_array();
    }
    public function update($id){
        $data=array('role_name'=>$this->input->post('role_name'));
        $this->db->where('role_id_pk',$id);
        $this->db->update('roles',$data);
        ////////////////////////////////delete old permition
        $this->db->where('role_id_fk',$id);
        $this->db->delete('permissions');
        ///////////////////////////////inset new permition
        foreach($this->input->post('page_id_fk') as $page_id=>$pagevalue){
            $permition_array=array('role_id_fk'=>$id,'page_id_fk'=>$pagevalue);
            $this->db->insert('permissions',$permition_array);
        }
        return true;


    }
    public function delete($id){
        $this->db->where('role_id_pk',$id);
        $this->db->delete('roles');
        /////////////////delete permition
        $this->db->where('role_id_fk',$id);
        $this->db->delete('permissions');
    }
    public  function get_permted_pages($roleid){
        $this->db->select ( '*' );
        $this->db->from ( 'pages' );
        $this->db->join ( 'permissions', 'pages.page_id = permissions.page_id_fk');
        $this->db->where ( 'permissions.role_id_fk', $roleid);
        $query = $this->db->get ();
        return $query->result();
    }

}