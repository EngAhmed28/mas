<?php
	class Payments extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
       
      
    }
//--------------------------------
public function select_fatora($hospital_id){
     $DB1 = $this->load->database('kingdom', TRUE);
      $DB1->select('payment.* ,
                  patient.id as p_id,patient.a_name ,patient.id_card');
      $DB1->from('payment'); 
      $DB1->join('patient', ' patient.id = payment.patient_id');
      $DB1->where("payment.hospital_id",$hospital_id);
      $DB1->order_by('payment.id',"DESC");
      $query = $DB1->get(); 
          if($query->num_rows() != 0){ 
                foreach ($query->result() as $row) {
                   $data[] = $row;
                }
            return $data;
          }
          return false;
}
//-------------------------------------
public function get_pateint($paitint_id,$fatora_id){
      $DB1 = $this->load->database('kingdom', TRUE);
     $DB1->select('*');
     $DB1->from('patient'); 
     $DB1->where("id",$paitint_id); 
     $query =  $DB1->get();
     $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->sub_op = $this->get_opretion($row->id,$fatora_id);
                $query_result[$i]->sub_fat = $this->get_fat($row->id,$fatora_id);
               $i++;
            }
            return $query_result;
        }
        return false;
}
//------------------------------------
public function get_opretion($paitint_id,$fatora_id){
     $DB1 = $this->load->database('kingdom', TRUE);
        $DB1->select('operation.* ,
                  all_defined.id as d_id,all_defined.operation as op_name ,all_defined.price as op_price');
        $DB1->from('operation');
        $DB1->join('all_defined', ' all_defined.id = operation.operation_id');
        $DB1->where("petient_id",$paitint_id);
        $DB1->where("fatora_num",$fatora_id);
         $DB1->where("hospital_id",2);
         $query = $DB1->get();
    if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
}
//----------------------------------
public function get_fat($paitint_id,$fatora_id){
     $DB1 = $this->load->database('kingdom', TRUE);
      $DB1->select('*');
      $DB1->from('payment'); 
      $DB1->where("fatora_num",$fatora_id);
      $DB1->where("patient_id",$paitint_id);
      $DB1->where("hospital_id",2);
      $query = $DB1->get(); 
          if($query->num_rows() != 0){ 
                foreach ($query->result() as $row) {
                   $data[] = $row;
                }
            return $data;
          }
          return false;
    
}
//--------------------------------------

public function update_percentage($paitint_id,$fatora_id){
     $DB1 = $this->load->database('kingdom', TRUE);
    
     $data["discount"]=$this->input->post("percentage");
     
      $cond = array(
    'fatora_num' => $fatora_id,
    'petient_id' => $paitint_id
  
    );
       $DB1->where($cond);
       $DB1->update("operation",$data);
    
}

public function update_payment($paitint_id,$fatora_id){
      $DB1 = $this->load->database('kingdom', TRUE);
     $data["cash"]=$this->input->post("cash");
     $data["atm"]=$this->input->post("atm");
     $data["card"]=$this->input->post("card");
     $data["paid"]=$this->input->post("payment");
     $data["remain"]=$this->input->post("remains");//paid_method
     $data["paid_method"]=$this->input->post("paid_method");
     $data['date']=strtotime(date("Y-d-m",time()));
     $data["date_s"]=time();
       $DB1->where("fatora_num",$fatora_id);
       $DB1->where("patient_id",$paitint_id);
       $DB1->update("payment",$data);
    
}
//=================================================
public  function get_opration_by_date($date_array,$hospital){
    $DB1 = $this->load->database('kingdom', TRUE);
    $DB1->select('operation.* ,
                  all_defined.id as d_id,all_defined.operation as op_name ,all_defined.price as op_price,
                  patient.id as p_id,patient.a_name ,patient.id_card , patient.mobile');
    $DB1->from('operation');
    $DB1->join('all_defined', ' all_defined.id = operation.operation_id');
    $DB1->join('patient', ' patient.id = operation.petient_id');
    $DB1->where($date_array);
    $DB1->where("status",0);
    $DB1->where("hospital_id",$hospital);
    $query = $DB1->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return false;
}

    //----------------------------------------------------------------ahmed------------------//
    public function select_fatora_bysearch($hospital_id,$patient_id){
        $DB1 = $this->load->database('kingdom', TRUE);
        $DB1->select('payment.* , patient.id as p_id,patient.a_name ,patient.id_card');
        $DB1->from('payment');
        $DB1->join('patient', ' patient.id = payment.patient_id');
        $DB1->where("payment.hospital_id",$hospital_id);
        $DB1->where("payment.patient_id",$patient_id);
        $DB1->order_by('payment.id',"DESC");
        $query = $DB1->get();
        if($query->num_rows() != 0){
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }



    public function update_status($id,$status){

        $DB1 = $this->load->database('kingdom', TRUE);
        if($status ==0){
            $data["suspend"]=1;
        }else{
            $data["suspend"]=0;
        }
        $DB1->where('id', $id);
        $DB1->update("payment",$data);
    }

}// END CLASS 
?>