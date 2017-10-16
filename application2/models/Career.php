<?php

/**
 * Created by PhpStorm.
 * User: DASH
 * Date: 15/02/17
 * Time: 11:53 ص
 */
class Career extends CI_Model
{

    public function __construct()
    {
        parent:: __construct();
    }

    public  function record_count(){

        return $this->db->count_all("jobs");

    }


    public function insert($file){


        $data['job_name']=$this->input->post('job_name');

        $data['name']=$this->input->post('name');

        $data['phone']=$this->input->post('phone');
        $data['tele']=$this->input->post('tele');
        $data['email']=$this->input->post('email');
        $data['flat_num']=$this->input->post('flat_num');
        $data['street']=$this->input->post('street');
        $data['unit']=$this->input->post('unit');
        $data['city']=$this->input->post('city');
        $data['address']=$this->input->post('address');
        $data['skills']=$this->input->post('skills');
        $data['ex_job']=$this->input->post('ex_job');

  $data['active']= 1;
        if($file==""){

            $data['file']='الملف غير صالح';

        }else{

            $data['file']=$file;

        }
      //  $data['verify']=$this->input->post('verify');

        $data['date'] = strtotime(date("Y/m/d"));


echo '<pre/>';
print_r($data);
echo '<pre/>';
var_dump($data);
//die;


        $this->db->insert('jobs',$data);

    }



    ///////////selecting data//////////////////
    public function select($limit,$start){
        $this->db->select('*');
        $this->db->from('jobs');
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
        $this->db->delete('jobs');

    }
    

    /////////////////////////

    public  function getallinbox(){
        $this->db->select("*");
        $this->db->from("jobs");
        $this->db->where("active",0);
        $query=$this->db->get();
        return $query->result_array();

    }

    public function getmessagebyid($id){
        $this->db->select("*");
        $this->db->from("jobs");
        $this->db->where("id",$id);
        $query=$this->db->get();
        return $query->row_array();
    }
    public function readmessagebyid($id){
        $data['active']=1;
        $this->db->where("id",$id);

        if($this->db->update("jobs",$data)){
            return true;
        }else{
            return false;
        }

    }

}