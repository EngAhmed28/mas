<?php
class Purchase extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function getById($id){
        $h = $this->db->get_where('purchases_fatora', array('fatora_code'=>$id));
        return $h->row_array();
    }
    
    public function getById2($id){
        $h = $this->db->get_where('purchases', array('fatora_code'=>$id));
        return $h->row_array();
    }
    
    public function select_details($id){
        $this->db->select('*');
        $this->db->from('purchases');
        $this->db->where('fatora_code',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select_purchases(){
        $this->db->select('*');
        $this->db->from('purchases_fatora');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->fatora_code] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select_suppliers(){
        $this->db->select('*');
        $this->db->from('suppliers');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->code] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select_purchases2(){
        $this->db->select('*');
        $this->db->from('purchases');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->fatora_code][] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function insert(){
        $admin = $_SESSION["user_id"];
        if(!empty($_SESSION["sanf_addition".$admin])){
            $mod = reset($_SESSION["sanf_addition".$admin]);
            
            $fatora['fatora_code'] = $mod['fatora_code'];
            $fatora['fatora_date'] = $mod['fatora_date'];
            $fatora['supplier_code'] = $mod['supp_code'];
            $fatora['fatora_cost'] = $this->input->post('fatora_cost');
            $fatora['paid_type'] = $mod['pay_method'];
            if($mod['pay_method'] == 1)
                $fatora['dayen'] = $mod['box_name'];
            if($mod['pay_method'] == 2)
                $fatora['dayen'] = '';
            if($mod['pay_method'] == 3){
                $fatora['dayen'] = $mod['bank_name'];
                $fatora['recived_date']=$mod['recive_date'];
                $fatora['sheek_num']=$mod['check_num'];
                $fatora['sheek_value']=$mod['check_value'];
            }
            $fatora['byan_fatora'] = $this->input->post('byan_fatora');
            $fatora['date'] = strtotime(date("m/d/Y"));
            $fatora['date_s'] = time();
            
            $this->db->insert('purchases_fatora', $fatora);
            
            for($x = 0; $x < count($_SESSION["sanf_addition".$admin]); $x++){
                $data['fatora_code'] = $mod['fatora_code'];
                $data['fatora_date'] = $mod['fatora_date'];
                $data['supplier_code'] = $mod['supp_code'];
                $data['product_code'] = $mod['sanf'];
                $data['product_storage'] = $mod['ma5zon'];
                $data['amount_buy'] = $mod['amount'];
                $data['all_cost_buy'] = $mod['all_buy_cost'];
                $data['unit_selected'] = $mod['unit_selected'];
                $data['big_unit'] = $mod['unit_selected'];
                $data['one_big_price'] = $mod['one_buy_sell'];
                $data['marge3_num'] = $mod['marge3_num'];
                $data['one_big_buy_cost'] = $mod['one_buy_cost'];
                $data['big_amount'] = $mod['amount'];
                $data['storage_id'] = $mod['ma5zon'];
                $data['publisher'] = $admin;
                $data['date'] = strtotime(date("m/d/Y"));
                $data['date_s'] = time();
                $mod = next($_SESSION["sanf_addition".$admin]);
                
                $this->db->insert('purchases', $data);
            }
            
            unset($_SESSION["sanf_addition".$admin]);
        }
    }
    
    public function get_by_method($settingID){
        if($settingID == 4 || $settingID == 3){
            $setting = $this->db->query('SELECT name, code FROM settings WHERE id='.$settingID.'');
            $setting = $setting->result();
            
            $branches = $this->db->query('SELECT * FROM `'.$setting[0]->name.'` WHERE from_id=
                                         (SELECT id FROM `'.$setting[0]->name.'` WHERE code='.$setting[0]->code.')');
        }
        else{
            $setting = $this->db->query('SELECT name, code FROM settings WHERE id=5');
            $setting = $setting->result();
                
            $branches = $this->db->query('SELECT * FROM `accounts_group` WHERE from_id=
                                             (SELECT id FROM `accounts_group` WHERE code='.$setting[0]->code.')');
        }
        return $branches->result();
    }
    
    public function select_sanf($type, $id){
        $this->db->select('*');
        $this->db->from('sanfs_card');
        $this->db->where(array($type=>$id));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->sanf_code] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select_sanf3($type, $id){
        $this->db->select('*');
        $this->db->from('storage_products');
        if($type != '')
            $this->db->where($type,$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select_sanf2(){
        $this->db->select('*');
        $this->db->from('storage_products');
        $this->db->where('p_code',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0 ;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->sub = $this->sub_pro($row->id);
                $x++;
            }
            return $data;
        }
        return false;
    }
    
    public function select_sanf_where($store){
        $this->db->select('*');
        $this->db->from('storage_products');
        $this->db->where(array('p_storage_code_fk'=>$store,'p_code!='=>0,'p_type_fk'=>1));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function sub_pro($id){
        $this->db->select('*');
        $this->db->from('storage_products');
        $this->db->where('p_from_id_fk',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select_units(){
        $this->db->select('*');
        $this->db->from('units');//currency_settings
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function unit_name($type, $id){
        $this->db->select('*');
        $this->db->from('units');//currency_settings
        $this->db->where(array($type=>$id));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function delete_fatore($id){
        $this->db->where('fatora_code',$id);
        $this->db->delete('purchases_fatora');
        
        $this->db->where('fatora_code',$id);
        $this->db->delete('purchases');
    }

}