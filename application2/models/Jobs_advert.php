<?php

class Jobs_advert extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("job_advert");

    }

    public  function  insert(){
        $data['start_date'] = strtotime($this->input->post('start_date'));
        $data['end_date'] = strtotime($this->input->post('end_date'));
        $data['job_name'] = $this->input->post('job_name');
        $data['job_place'] = $this->input->post('job_place');
        $data['workers'] = $this->input->post('workers');
        $data['date'] = strtotime(date("Y-m-d"));
        $data['date_s'] = time();
        $data['publisher'] = $_SESSION['user_id'];
        for ($e = 1 ; $e <= $_POST['job_requires'] ; $e++)
        {
            $requires[$_POST['job_requires_name'.$e.'']]=$_POST['job_requires_value'.$e];
        }
        $data['job_requires'] = serialize($requires);
        
        $this->db->insert('job_advert',$data);
    }
    //////////////////////////
///////////selecting data//////////////////
    public function select(){
        $this->db->select('*');
        $this->db->from('job_advert');
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
    
      public function select_web($limit,$id){
        if($id=='')
            $array = array('suspend' => 1);
        else
            $array = array('suspend' => 1, 'id!=' => $id);
        
        $this->db->select('*');
        $this->db->from('job_advert');
        $this->db->where($array);
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
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('job_advert', array('id'=>$id));
        return $h->row_array();
    }
    
    
    public function update($id){
    
        
        for ($e = 0 ; $e < $_POST['count_requires'] ; $e++)
            $requires[$_POST['requires_name_old'.$e.'']] = $_POST['requires_value_old'.$e.''];
    
        if($_POST['job_requires'] != ''){
            for( $x = 1 ; $x <= $_POST['job_requires'] ; $x++)
                $requires[$_POST['job_requires_name'.$x.'']]=$_POST['job_requires_value'.$x];       
        }
        
        $I['job_requires'] = serialize($requires);
        
        $update = array(
            'start_date'       => strtotime($this->input->post('start_date')) ,
            'end_date'         => strtotime($this->input->post('end_date')) ,
            'job_name'         => $this->input->post('job_name') ,
            'job_place'        => $this->input->post('job_place') ,
            'workers'          => $this->input->post('workers') ,
            'publisher'        => $_SESSION['user_id'],
            'job_requires'       => $I['job_requires'],
            'date'             => strtotime(date("Y-m-d")),
            'date_s'           => time() 
        );
        $this->db->where('id', $id);
        if($this->db->update('job_advert',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    public function delete($id,$index){
        $h = $this->db->get_where('job_advert', array('id'=>$id));
        $row = $h->row_array();
        
        $unserial = unserialize($row['job_requires']);
        current($unserial);
        for($x = 0 ; $x < count($unserial) ; $x++)
            {
                if($x == $index)
                    break;
                else
                    next($unserial);
            }
        
        unset($unserial[key($unserial)]); 
        $unserial=serialize($unserial);
        $update['job_requires']=$unserial;
        if($this->db->update('job_advert',$update)) {
            return true;
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
        if($this->db->update('job_advert',$update)) {
            return true;
        }else{
            return false;
        }
    }
   
 }
 