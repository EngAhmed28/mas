<?php

/**
 * Created by PhpStorm.
 * User: DASH
 * Date: 14/02/17
 * Time: 02:18 م
 */
class Doctors extends CI_Model
{

    public function __construct()
    {
        parent:: __construct();
    }




    public  function   insert_doc($file,$file6,$file7,$file8,$file9,$file10,$file11,$file12,$file2,$file3){
        $data['name']=$this->input->post('name');
         $data['id_card']=$this->input->post('id_card');
      $data['depart_id']=$this->input->post('depart_id');
     
     
     $data['reason_end_job']=$this->input->post('reason_end_job');
      $data['address']=$this->input->post('address');
        $data['phone']=$this->input->post('phone');
        $data['email']=$this->input->post('email');
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        $data['date_end_job']=$this->input->post('date_end_job');
        $data['medical_insurance_from']=$this->input->post('medical_insurance_from');
        $data['medical_insurance_to']=$this->input->post('medical_insurance_to');
        $data['insurance_professional_practice_from']=$this->input->post('insurance_professional_practice_from');
        $data['insurance_professional_practice_to']=$this->input->post('insurance_professional_practice_to');
        $data['insurance_risk_from']=$this->input->post('insurance_risk_from');
        $data['insurance_risk_to']=$this->input->post('insurance_risk_to');
        $data['medical_professional_card_from']=$this->input->post('medical_professional_card_from');
        $data['medical_professional_card_to']=$this->input->post('medical_professional_card_to');
        $data['job_contract_end_date']=$this->input->post('job_contract_end_date');
        $data['license_end_date']=$this->input->post('license_end_date');     
        $data['id_number_date']=$this->input->post('id_number_date');
        $data['birth_date']=$this->input->post('birth_date');
            
      /****************/




      if(!empty($file6)){
            $data['id_number_img']= $file6;
        }else{
            $data['id_number_img']= 'null';
        }
        if(!empty($file7)){
            $data['medical_insurance_img']= $file7;
        }else{
            $data['medical_insurance_img']= 'null';
        }
        if(!empty($file8)){
            $data['insurance_professional_practice_img']= $file8;
        }else{
            $data['insurance_professional_practice_img']= 'null';
        }
        if(!empty($file9)){
            $data['insurance_risk_img']= $file9;
        }else{
            $data['insurance_risk_img']= 'null';
        }
        if(!empty($file10)){
            $data['job_contract_img']= $file10;
        }else{
            $data['job_contract_img']= 'null';
        }
        if(!empty($file11)){
            $data['license_end_img']= $file11;
        }else{
            $data['license_end_img']= 'null';
        }
        if(!empty($file12)){
            $data['rating_img']= $file12;
        }else{
            $data['rating_img']= 'null';
        }     
        
        
            if(!empty($file)){
            $data['decision_end_job']= $file;
        }else{
            $data['decision_end_job']= 'null';
        }
        if(!empty($file2)){
            $data['insurance_professional_practice_attachment']= $file2;
        }else{
            $data['insurance_professional_practice_attachment']= 'null';
        }
        if(!empty($file3)){
            $data['job_contract']= $file3;
        }else{
            $data['job_contract']= 'null';
        }
      
  
       $this->db->insert('doctor',$data);
     /*   $doc = $this->select(); 
        for($x = 0 ; $x < 6 ; $x++)
        {
            if($this->input->post('day'.$x.''))
            {
                $dd['doctor_id'] = $doc[0]->id;
                $dd['day'] = $x;
                $dd['time'] = $this->input->post('day'.$x.'');
                $dd['date'] = strtotime(date("Y/m/d"));
                $dd['date_s'] = time();
                $this->db->insert('booking',$dd);
            }
        }*/
        
    }



           public function update_doc($file,$file6,$file7,$file8,$file9,$file10,$file11,$file12,$file2,$file3,$id){
            $update = array(
                'name'=>$this->input->post('name'),
                'id_card'=>$this->input->post('id_card'),
                'depart_id'=>$this->input->post('depart_id'),
                  'reason_end_job'=>$this->input->post('reason_end_job'),
             
              
                'id_number_date'=>$this->input->post('id_number_date'),
                'birth_date'=>$this->input->post('birth_date'),
                'address'=>$this->input->post('address'),
                'phone'=>$this->input->post('phone'),
                'email'=>$this->input->post('email'),
                'date_end_job'=>$this->input->post('date_end_job'),
                'medical_insurance_from'=>$this->input->post('medical_insurance_from'),
                'medical_insurance_to'=>$this->input->post('medical_insurance_to'),
                'insurance_professional_practice_from'=>$this->input->post('insurance_professional_practice_from'),
                'insurance_professional_practice_to'=>$this->input->post('insurance_professional_practice_to'),
                'insurance_risk_from'=>$this->input->post('insurance_risk_from'),
                'insurance_risk_to'=>$this->input->post('insurance_risk_to'),
                'medical_professional_card_from'=>$this->input->post('medical_professional_card_from'),
                'medical_professional_card_to'=>$this->input->post('medical_professional_card_to'),
                'job_contract_end_date'=>$this->input->post('job_contract_end_date'),
                'license_end_date'=>$this->input->post('license_end_date'),
            );



      if(!empty($file6)){
            $update['id_number_img']= $file6;
        }
        if(!empty($file7)){
            $update['medical_insurance_img']= $file7;
        }
        if(!empty($file8)){
            $update['insurance_professional_practice_img']= $file8;
        }
        if(!empty($file9)){
            $update['insurance_risk_img']= $file9;
        }
        if(!empty($file10)){
            $update['job_contract_img']= $file10;
        }
        if(!empty($file11)){
            $update['license_end_img']= $file11;
        }
        if(!empty($file12)){
            $update['rating_img']= $file12;
        }   
        
        
            if(!empty($file)){
            $update['decision_end_job']= $file;
        }
        if(!empty($file2)){
            $update['insurance_professional_practice_attachment']= $file2;
        }
        if(!empty($file3)){
            $update['job_contract']= $file3;
        }
     

           $this->db->where('id', $id);
            if($this->db->update('doctor',$update)) {
                return true;
            }else{
                return false;
            }
        }



    public function delete_doc($id){
        $this->db->where('id',$id);
        $this->db->delete('doctor');

    }



   public function getById_admin($id){
        $h = $this->db->get_where('doctor', array('id'=>$id));
        return $h->row_array();
    }

    public  function  insert($file){
        $data['name']=$this->input->post('name');
        $data['img']=$file;
        $data['depart_id']=$this->input->post('depart_id');
        $data['phone']=$this->input->post('phone');
        $data['major']=$this->input->post('major');
        $data['email']=$this->input->post('email');
        $data['other']=$this->input->post('other');
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        $data['publisher'] = $_SESSION['user_id'];
        
        $this->db->insert('doctor',$data);
        
        $doctor_id= $this->select_last();
for($x=0;$x<6;$x++){
    if($this->input->post('days'.$x.'')){
         $doc['doctor_id']=$doctor_id[0]->id;
        $doc['day']=$x;
        $doc['time']=$this->input->post('days'.$x.'');
        
        $doc['date'] = strtotime(date("Y/m/d"));
        $doc['date_s'] = time();
          $this->db->insert('booking',$doc);
    }
    
}



        
    }
///////////selecting data//////////////////
    public function select(){
        $q = $this->db->get('doctor');
        return $q->result();
    }
    
    
 
    
    /////////////////
    /////delete/////
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('doctor');

    }
    
        public function delete_group($id){
        $this->db->where('doctor_id',$id);
        $this->db->delete('booking');

    }
    
    
    ////////////////////
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('doctor', array('id'=>$id));
        return $h->row_array();
    }
    
        public function get_times($id){
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->where('doctor_id',$id);
       $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


    public function update($id,$file){
       
           for($x=0;$x<6;$x++){
    if($this->input->post('days'.$x.'')){
         $doc['doctor_id']=$id;
        $doc['day']=$x;
        $doc['time']=$this->input->post('days'.$x.'');
        
        $doc['date'] = strtotime(date("Y/m/d"));
        $doc['date_s'] = time();
         
          $this->db->insert('booking',$doc);
    }
    
    }
        
         $update = array(
            'name'=>$this->input->post('name') ,
            'depart_id'=>$this->input->post('depart_id') ,
            'phone'=>$this->input->post('phone') ,
            'major'=>$this->input->post('major') ,
            'email'=>$this->input->post('email') ,
            'other'=>$this->input->post('other') ,
            'date'=>strtotime(date("Y/m/d")) ,
            'date_s'=>time() ,
            'publisher'=>$_SESSION['user_id'] ,

        );
        if($file != ''){
            $update['img']=$file ;
        }
        

      
        $this->db->where('id', $id);
     if($this->db->update('doctor',$update)) {
            return true;
          
        }else{
            return false;
        }
        
        
  
        
       
        

    }


        public function select_doc_admin(){
        $this->db->select('*');
        $this->db->from('doctor');
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
        if($this->db->update('doctor',$update)) {
            return true;
        }else{
            return false;
        }
    }


    public function get_depart(){

       /* $q = $this->db->get('departments');
        return $q->result();
        */
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
        
        
        

    }


    public function get_depart_name(){
    $this->db->select('*');

    $this->db->from('departments');

    $this->db->order_by('id','DESC');

    $query = $this->db->get();

    if ($query->num_rows() > 0) {

        foreach ($query->result() as $row) {

            $data[$row->id] = $row->name;

        }

        return $data;

    }

    return false;

}

    public function select_last(){
        $this->db->select('*');
        $this->db->from('doctor');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

public  function records_select_user(){

        $query =  $this->db->query( 'SELECT doctor.*

                    FROM doctor

                    LEFT JOIN users ON users.doctor_id = doctor.id

                    WHERE users.doctor_id IS NULL');

                    

        if ($query->num_rows() > 0) {



            foreach ($query->result() as $row) {



                $data[] = $row;



            }



            return $data;



        }



        return false;

        

        

    }
    
      public function getBydepart($id){
    
        
         $this->db->select('*');
        $this->db->from('doctor');
        $this->db->where('depart_id',$id);
       $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function select_2(){
        $this->db->select('*');
        $this->db->from('doctor');
        $this->db->where('suspend',1);
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
    
    public  function records_select_user2($volunteer_id){

        

        $this->db->select('*');



        $this->db->from('doctor');



        $this->db->where('id',$volunteer_id); 

        

        $query = $this->db->get();

                    

        if ($query->num_rows() > 0) {



            foreach ($query->result() as $row) {



                $data[] = $row;



            }



            return $data;



        }



        return false;

        

        

    }
    
        public  function records_ss($doc_id){

        

        $this->db->select('*');



        $this->db->from('booking');



        $this->db->where('doctor_id',$doc_id);
       

        

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