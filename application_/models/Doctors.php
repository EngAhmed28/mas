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