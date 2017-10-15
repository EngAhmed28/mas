<?php
class Supplier extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function select(){
        $this->db->select('*');
        $this->db->from('suppliers');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select2(){
        $this->db->select('*');
        $this->db->from('suppliers');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->code] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function getById($id){
        $h = $this->db->get_where('suppliers', array('id'=>$id));
        return $h->row_array();
    }
    
    public function insert(){
        $data['name']=$this->input->post('name');
        $data['code']=$this->input->post('code');
        $data['supplier_address']=$this->input->post('supplier_address');
        $data['supplier_phone']=$this->input->post('supplier_phone');
        $data['supplier_fax']=$this->input->post('supplier_fax');
        $data['accountant_name']=$this->input->post('accountant_name');
        $data['accountant_telephone']=$this->input->post('accountant_telephone');
        $data['supplier_dayen']=$this->input->post('supplier_dayen');
        $this->db->insert('suppliers',$data);
    }
    
    public function update($id){
        $update = array(
            'name'=>$this->input->post('name'),
            'code'=>$this->input->post('code'),
            'supplier_address'=>$this->input->post('supplier_address'),
            'supplier_phone'=>$this->input->post('supplier_phone'),
            'supplier_fax'=>$this->input->post('supplier_fax'),
            'accountant_name'=>$this->input->post('accountant_name'),
            'accountant_telephone'=>$this->input->post('accountant_telephone'),
            'supplier_dayen'=>$this->input->post('supplier_dayen')
        );
        
        $this->db->where('id', $id);
        if($this->db->update('suppliers',$update)) {
            return true;
        }else{
            return false;
        }
    }

}