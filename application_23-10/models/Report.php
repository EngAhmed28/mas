<?php
class Report extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
    
    public function get_sum($table, $field, $id, $sum){
        $this->db->select('SUM('.$sum.') AS summation');
        $this->db->from($table);
        $this->db->where($field,$id);
        $query = $this->db->get();
        $data = $query->result();
        return $data[0]->summation;
    }
    
    public function get_total($id){
        $this->db->select('*');
        $this->db->from('standard_recepies');
        $this->db->where('product_sub_code_fk',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $z = 0;
            foreach ($query->result() as $row) {
                $data1[$z] = $row;
                $data1[$z]->production = $this->get_sum('production_system','product_main_code_fk',$row->product_main_code_fk,'product_main_amount');
                $z++;
            }
            $value = 0;
            for($z = 0 ; $z < count($data1) ; $z++){
                $value += ($data1[$z]->product_sub_amount * $data1[$z]->production);
            }
            return $value;
        }
    }
    
    public function products($z, $store_id){
        $this->db->select('*');
        $this->db->from('storage_products');
        $this->db->order_by('p_storage_code_fk','DESC');
        if($store_id)
            $this->db->where(array('p_from_id_fk!='=>0,'p_type_fk'=>$z,'p_storage_code_fk'=>$store_id));
        else
            $this->db->where(array('p_from_id_fk!='=>0,'p_type_fk'=>$z));
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            $x = 0 ;
            foreach ($query->result() as $row){
                $data1[$x] = $row;
                $data1[$x]->supplies = $this->get_sum('purchases','product_code',$row->id,'amount_buy');
                $data1[$x]->exchange = $this->get_sum('exchange_items','product_code_fk',$row->id,'product_amount');
                if($z == 2)
                    $data1[$x]->production = $this->get_sum('production_system','product_main_code_fk',$row->id,'product_main_amount');
                if($z == 1)
                    $data1[$x]->production = $this->get_total($row->id);
                $x++;
            }
            return $data1;
        }
    }
    
    public function asnaf($store_id){
        $this->db->select('*');
        $this->db->from('storage_products');
        $this->db->where(array('id'=>$store_id));
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get($store_id, $table, $field, $result, $multiplication){
        $this->db->select('*');
        $this->db->from(''.$table.'');
        $this->db->order_by('date','ASC');
        $this->db->where(''.$field.'', $store_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            $i = 0;
            foreach ($query->result() as $row){
                if($i == 0){
                    $date = $row->date;
                    $data[$row->date] = new stdClass();
                    $data[$row->date]->$table = $row->$result * $multiplication;
                }
                else{
                    if($date == $row->date)
                        $data[$row->date]->$table += $row->$result * $multiplication;
                    else{
                        $date = $row->date;
                        $data[$row->date] = new stdClass();
                        $data[$row->date]->$table = $row->$result * $multiplication;
                    }
                }
                $i++;
            }
        }
        else
            return false;
        return $data;
    }

    public function standard($store_id){
        $this->db->select('*');
        $this->db->from('standard_recepies');
        $this->db->where('product_sub_code_fk',$store_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
    
    public function select_from_to($num1, $num2, $table)
    {
        $this->db->select('*');
        $this->db->from(''.$table.'');
        $this->db->where('date BETWEEN "'.  strtotime($num1). '" and "'. strtotime($num2).'"');
        $this->db->order_by('id', 'DESC');

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

