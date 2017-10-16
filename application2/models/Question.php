<?php

class Question extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){

        return $this->db->count_all("question");

    }

    public  function  insert($email,$id){
        $data['name']=$this->input->post('name');
        $data['phone']=$this->input->post('phone');
        $data['city']=$this->input->post('city');
        $data['email'] = $email;
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        $data['phone'] = $this->input->post('phone');
        $data['question_to'] = $id;
        $data['forward'] = $id;
        $data['question']=$this->input->post('question');
        
        $this->db->insert('question',$data);
    }
    //////////////////////////
///////////selecting data//////////////////
    public function select($question_to,$forward){
        $this->db->select('*');
        $this->db->from('question');
        
        
        if($forward == 'all')
            $array = array('question_to' => $question_to ,'forward != ' => 0 );
        
        elseif($forward == 'send')
            $array = array('question_to' => $question_to, 'forward' => 0);
        
        $this->db->where($array);
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
    
    
    public function select_question($forward,$limit,$start){
        $this->db->select('*');
        $this->db->from('question');
        
        $array = array('forward' => $forward);
        
        $this->db->where($array);
        $this->db->order_by('id','DESC');
        $this->db->limit($limit,$start);
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
        $this->db->delete('question');

    }
    
    /////////////////////////
    
    public  function getallinbox(){
        $this->db->select("*");
        $this->db->from("question");
        $array = array('forward' => $_SESSION['role_id_fk'] ,'active' => 0 );        
        $this->db->where($array);
        $query=$this->db->get();
        return $query->result_array();

    }
    
    public function getmessagebyid($id){
     $this->db->select("*");
        $this->db->from("question");
        $this->db->where("id",$id);
        $query=$this->db->get();
        return $query->row_array();
    }
    
    
public function readmessagebyid($id){
      $data['active']=1;
        $this->db->where("id",$id);
        
        if($this->db->update("question",$data)){
            return true;
        }else{
            return false;
        }

 }
 
 public function update_m($id){
      //$data['active']=1;
      
      if($this->input->post('doc'.$id.''))
        $data['forward'] = $this->input->post('doc'.$id.'');
      else
        $data['forward'] = 0;
        
        $this->db->where("id",$id);
        
        if($this->db->update("question",$data)){
            return true;
        }else{
            return false;
        }

 }

public function send_replay($id){
      
      if($this->input->post('replay'.$id.''))
        $data['answer'] = $this->input->post('replay'.$id.'');
        
        $this->db->where("id",$id);
        
        if($this->db->update("question",$data)){
            return true;
        }else{
            return false;
        }

 }

 }