<?php

class Patients_reservations extends CI_Model{
    public function __construct() {
        parent::__construct();
    }  
//------------------------------------------------
  public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
//----------------------------------------------------- 
public function get_departs(){
           $DB1 = $this->load->database('kingdom', TRUE);
        
        $DB1->select('*');
       
        $array = array('hospital_id'=>2);
         $DB1->where($array);
        $query = $DB1->get('all_dep');
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    /*
        $this->db->select('*');
        $this->db->from("departments");
		$this->db->order_by("id","DESC");
		$query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;*/
}
//---------------------------------------------
public function get_doc(){
     $this->db->select('*');
        $this->db->from("doctor");
		$this->db->order_by("id","DESC");
		$query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false; 
} 


//----------------------------------------------
public function get_dep_doc($dep_id){
     $this->db->select('*');
        $this->db->from("doctor");
        $this->db->where("depart_id",$dep_id);
	//	$this->db->order_by("id","DESC");
		$query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false; 
} 
//------------------------------------------
public function get_pat_name($patient_national_id){
        $this->db->select('*');
        $this->db->from("patients");
        $this->db->where("patient_national_id",$patient_national_id);
		$this->db->order_by("id","DESC");
		$query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;   
}
//------------------------------------------
public function insert(){
    
        $data['patient_national_id']=$this->chek_Null($this->input->post('patient_national_id'));
        $data['reservations_date']=strtotime($this->input->post('reservations_date'));
        $data['reservations_time']=strtotime($this->input->post('reservations_time'));
         // $data['reservations_time']=$this->input->post('reservations_time');
        $data['depart_id']=$this->chek_Null($this->input->post('depart_id'));
        $data['doctor_id']=$this->chek_Null($this->input->post('doctor_id'));
        $data['notes']=$this->chek_Null($this->input->post('notes'));        
        $data['date']=strtotime(date("Y-m-d",time()));
        $data['date_s']=time();
        $data['publisher'] = $_SESSION['user_username'];
        $this->db->insert('patients_reservations',$data); 
        
        if($this->chek_Null($this->input->post('patient_name')) !=""){
         $I['patient_national_id']=$this->chek_Null($this->input->post('patient_national_id'));
         $I['patient_name']=$this->chek_Null($this->input->post('patient_name')); 
           $I['tele']=$this->chek_Null($this->input->post('tele'));
          $this->db->insert('patients',$I);       
        }
    
}
//-----------------------------------------
public function update($id){
     
        $data['patient_national_id']=$this->chek_Null($this->input->post('patient_national_id'));
        $data['reservations_date']=strtotime($this->input->post('reservations_date'));
         $data['reservations_time']=strtotime($this->input->post('reservations_time'));
      //  $data['reservations_time']=$this->input->post('reservations_time');
        $data['depart_id']=$this->chek_Null($this->input->post('depart_id'));
        $data['doctor_id']=$this->chek_Null($this->input->post('doctor_id'));
        $data['notes']=$this->chek_Null($this->input->post('notes'));        
        $data['date']=strtotime(date("Y-m-d",time()));
        $data['date_s']=time();
        $data['publisher'] = $_SESSION['user_username'];
        $this->db->where("id",$id);
        $this->db->update('patients_reservations',$data); 
           
}
//-----------------------------------------
   public function getById($id){
       $this->db->select('patients_reservations.* ,
                  patients.patient_national_id as pet_nat,patients.patient_name, patients.tele, 
                  doctor.id as d_id,doctor.name as d_name
                  ');
      $this->db->from('patients_reservations'); 
      $this->db->join('patients', ' patients.patient_national_id = patients_reservations.patient_national_id');
      $this->db->join('doctor', ' doctor.id = patients_reservations.doctor_id');
      $this->db->where("patients_reservations.id",$id);
       $query = $this->db->get();
        return $query->row_array();
    }
//---------------------------------------
public function select(){
        $this->db->select('patients_reservations.* , patients.patient_national_id as pet_nat,patients.patient_name,patients.tele');
        $this->db->from("patients_reservations");
        $this->db->join('patients', ' patients.patient_national_id = patients_reservations.patient_national_id');
        $this->db->where("patients_reservations.reservations_date",strtotime(date("Y-m-d",time())));
		$this->db->order_by("id","DESC");
		$query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;  
}



public function select_(){
    
        $this->db->select('patients_reservations.* , patients.patient_national_id as pet_nat,patients.patient_name,patients.tele');
        $this->db->from("patients_reservations");
        $this->db->join('patients', ' patients.patient_national_id = patients_reservations.patient_national_id');
        $this->db->where("patients_reservations.reservations_date > ",strtotime(date("Y-m-d",time())));
		$this->db->order_by("id","DESC");
		$query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;  
}
//------------------------------------
public function group_by_doctors(){
        $this->db->select('*');
        $this->db->from("patients_reservations");
		$this->db->group_by("doctor_id");
        $this->db->order_by("id","DESC");
	    $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->sub = $this->get_by_doc($row->doctor_id);
               $i++;
            }
            return $query_result;
        }
        return false;
}
//-----------------------------------------------get_by_doc_ontime
public function get_by_doc($doctor_id){
      $this->db->select('patients_reservations.* ,
                  patients.patient_national_id as pet_nat,patients.patient_name, patients.tele,
                  doctor.id as d_id,doctor.name as d_name');
      $this->db->from('patients_reservations'); 
      $this->db->join('patients', ' patients.patient_national_id = patients_reservations.patient_national_id');
      $this->db->join('doctor', ' doctor.id = patients_reservations.doctor_id');
      //  $this->db->where("patients_reservations.reservations_date",strtotime(date("Y-m-d",time())));
		$this->db->where("patients_reservations.doctor_id",$doctor_id);
        $this->db->order_by("id","DESC");
    $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;  
    
    
}
//-----------------------------------------
public function get_by_doc_ontime($doctor_id,$date_from,$date_to){
      $this->db->select('patients_reservations.* ,
                  patients.patient_national_id as pet_nat,patients.patient_name, patients.tele, 
                  doctor.id as d_id,doctor.name as d_name');
      $this->db->from('patients_reservations'); 
      $this->db->join('patients', ' patients.patient_national_id = patients_reservations.patient_national_id');
      $this->db->join('doctor', ' doctor.id = patients_reservations.doctor_id');
       // $this->db->where("patients_reservations.reservations_date",strtotime(date("Y-m-d",time())));
		$this->db->where("patients_reservations.doctor_id",$doctor_id);
        $this->db->where("patients_reservations.reservations_date BETWEEN ".strtotime($date_from)." AND ".strtotime($date_to));
        
        
        
        
        
        $this->db->order_by("id","DESC");
    $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;  
    
    
}






public function all_doc_reservations($doctor_id){
      $this->db->select('patients_reservations.* ,
                  patients.patient_national_id as pet_nat,patients.patient_name, patients.tele, 
                  doctor.id as d_id,doctor.name as d_name');
      $this->db->from('patients_reservations'); 
      $this->db->join('patients', ' patients.patient_national_id = patients_reservations.patient_national_id');
      $this->db->join('doctor', ' doctor.id = patients_reservations.doctor_id');
       // $this->db->where("patients_reservations.reservations_date",strtotime(date("Y-m-d",time())));
		$this->db->where("patients_reservations.doctor_id",$doctor_id);
      //  $this->db->where("patients_reservations.reservations_date BETWEEN ".strtotime($date_from)." AND ".strtotime($date_to));
        
        
        
        
        
        $this->db->order_by("id","DESC");
    $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;  
    
    
}
//---------------------------------------------------------

//-----------------------------------------
//reservations_time,doctor_id,reservations_date
public function time_chek($reservations_time,$doctor_id,$reservations_date){
     //------------   
     $reservations_date=strtotime($reservations_date);
     $reservations_time=strtotime($reservations_time);
     $reservations_time_under=$reservations_time-900;
     //------------
    $this->db->select("*");
    $this->db->from('patients_reservations');     
    $this->db->where("reservations_date",$reservations_date);
    $this->db->where("doctor_id",$doctor_id);
    $this->db->where("reservations_time  >=",$reservations_time_under);
    $this->db->where("reservations_time  <=",$reservations_time);
   
   $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        }
        return false;     


}


    public function delete_reservations($id){
        $this->db->where('id',$id);
        $this->db->delete('patients_reservations');

    }
//-------------------------- 17-10-2017 --------------------------------------
  public function select_all_reservs_byday(){
        $this->db->select('patients_reservations.* , patients.patient_national_id as pet_nat,patients.patient_name,patients.tele');
        $this->db->from("patients_reservations");
        $this->db->join('patients', ' patients.patient_national_id = patients_reservations.patient_national_id');
        $this->db->where("patients_reservations.reservations_date",strtotime(date("Y-m-d",time())));
        $this->db->group_by("patients_reservations.doctor_id");
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->all_img = $this->get_bydoc($row->doctor_id);
                $i++;
            }
            return $query_result;
        }
        return false;
    }
  //---------------------------------------------
   public function get_bydoc($doc){
        $this->db->select('patients_reservations.* , patients.patient_national_id as pet_nat,patients.patient_name,patients.tele');
        $this->db->from("patients_reservations");
        $this->db->join('patients', ' patients.patient_national_id = patients_reservations.patient_national_id');
        $this->db->where("patients_reservations.reservations_date",strtotime(date("Y-m-d",time())));
        $this->db->where("patients_reservations.doctor_id",$doc);
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }  
    
    
     public function select_today_cases($doctor_id){
        $this->db->select('patients_reservations.* , patients.patient_national_id as pet_nat,patients.patient_name,patients.tele');
        $this->db->from("patients_reservations");
        $this->db->join('patients', ' patients.patient_national_id = patients_reservations.patient_national_id');
        $this->db->join('doctor', ' doctor.id = patients_reservations.doctor_id');
        $this->db->where("patients_reservations.reservations_date",strtotime(date("Y-m-d",time())));
        $this->db->where("patients_reservations.doctor_id",$doctor_id);
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    
     public function select_aftertoday_cases($doctor_id){

        $this->db->select('patients_reservations.* , patients.patient_national_id as pet_nat,patients.patient_name,patients.tele');
        $this->db->from("patients_reservations");
        $this->db->join('patients', ' patients.patient_national_id = patients_reservations.patient_national_id');
        $this->db->join('doctor', ' doctor.id = patients_reservations.doctor_id');
        $this->db->where("patients_reservations.reservations_date > ",strtotime(date("Y-m-d",time())));
        $this->db->where("patients_reservations.doctor_id",$doctor_id);
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    
/*************************************************************/


public function today_reservation(){
     $this->db->select('*');
     $this->db->from("patients_reservations");
        $this->db->where("reservations_date",strtotime(date("Y-m-d",time())));
		$this->db->order_by("id","DESC");
		$query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false; 
}

/*****************************************************************/
public function get_pat_name_2($patient_national_id){
    
        $DB1 = $this->load->database('kingdom', TRUE);

        $DB1->select('*');
        $array = array('id_card'=>$patient_national_id);

        $DB1->where($array);
        $query = $DB1->get('patient');
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
 
}


    
}// END CLASS