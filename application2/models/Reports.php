<?php

class Reports extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("reports");

    }

    public  function  insert($file){
        $data['title']=$this->input->post('title');
        $data['attached'] = $file;
        $data['publisher'] = $_SESSION['user_id'];
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        $data['suspend'] = 1;

        
        $this->db->insert('reports',$data);
    }
    //////////////////////////
///////////selecting data//////////////////
    public function select($limit){
        $this->db->select('*');
        $this->db->from('reports');
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
     public function select_report(){
        $this->db->select('*');
        $this->db->from('reports');
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
      

    /////////////////
    /////delete/////
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('reports');

    }
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('reports', array('id'=>$id));
        return $h->row_array();
    }
    public function update($id,$file){

        $update = array(
            'title'=>$this->input->post('title') ,
            'publisher' => $_SESSION['user_id'],
            'date' => strtotime(date("Y-m-d")),
            'date_s' => time(),
        );
        
        if($file !=''){
        $update['attached']  =  $file; 
            
            
        }
        $this->db->where('id', $id);
        if($this->db->update('reports',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    /////////////////////// Suspend
    
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
        if($this->db->update('reports',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    
    
    /*
        
    public function all_patients(){
        
        $DB1 = $this->load->database('kingdom', TRUE);
        
        $DB1->select('*');
        
        $query = $DB1->get('patient');
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
 
    */
    
    
    /**************/
    
        public function select_where($id)
    {
        
            $DB1 = $this->load->database('kingdom', TRUE);
        
        $DB1->select('*');
        $DB1->where('id',$id);
        $query = $DB1->get('patient');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
      
    }
    
    public function select_account($code){
        $DB1 = $this->load->database('kingdom', TRUE);
        $DB1->select('*');
         $DB1->where('patient_id',$code);
         $query = $DB1->get('payment');
       
     if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    
    
    
    
    
    
    
    
    
    
    /*
        public function select_patient_payment($code){
       
          
        $DB1 = $this->load->database('kingdom', TRUE);
        $DB1->select('*');
        $query = $DB1->get('payment');
        $this->db->where('patient_id', $code);
    
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    
    
    
       */ 
        
        
    }
    
    
    


 