<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dash extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    }
    //-------------------------------------------------------
    public  function  index(){
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->model('Groups');
        $data["main_groups"]=$this->Groups->fetch_groups("","");
        $data['subview'] = 'admin/main';
        $data['title']='الرئيسية';
        $data['metakeyword']='الرئيسية';
        $data['metadiscription']='مستشفى الماس';
        $this->load->view('index_main', $data);


    }
    public  function  home(){



        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->model('Groups');
        $data["main_groups"]=$this->Groups->main_fetch_group();

        // print_r(  $data["main_groups"]);

        //   die;


        $data['subview'] = 'admin/main';
        $data['title']='الرئيسية';
        $data['metakeyword']='الرئيسية';
        $data['metadiscription']='مستشفى الماس';
        $this->load->view('index_main', $data);
    }
    //-------------------------------------------------------
    public function mian_group($id)
    {
        $this->load->model('Groups');
        $this->load->model('Difined_model');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $_SESSION["group_number"] = $id;
        $date_table = $this->Groups->getgroupbyid($id);
        $data['title_name'] = $date_table["page_title"];
        $data["groups"] = $this->Groups->get_group($id);
        $data['title'] = $date_table["page_title"];
        $data['metakeyword'] = $date_table["page_title"];
        $data['metadiscription'] = $date_table["page_title"];
        $data['subview'] = 'admin/sub_main';

        $this->load->view('index_main', $data);
    }
    //-------------------------------------------------------
    public function sub_sub_main($id)
    {
        $this->load->model('Groups');
        $_SESSION["group_number"] = $id;
        $data["sub_groups"] = $this->Groups->get_group($id);
        $data['title'] = 'الرئيسية';
        $data['metakeyword'] = 'الرئيسية';
        $data['metadiscription'] = 'مستشفى الماس';
        $data['subview'] = 'admin/sub_sub_main';
        $this->load->view('index_main', $data);
    }


}//END CLASS
?>