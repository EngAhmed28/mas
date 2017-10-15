<?php
class Purchases extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
           redirect('login');
        }
        
        
        //---------------------------------------------
        if($_SESSION['group_number']==0){
            redirect('Dash/home');
        }
        $this->load->model('Groups');
        $this->main_groups=$this->Groups->fetch_groups("","");
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        //-------------------------
        $this->load->helper(array('url','text','permission','form'));
        $this->load->model('purchases/Purchase');
        $this->load->model('suppliers/Supplier');
        $this->load->model('storage/Storage');
    }
    private function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    private function thumb($data){
        $config['image_library'] = 'gd2';
        $config['source_image'] =$data['full_path'];
        $config['new_image'] = 'uploads/thumbs/'.$data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker']='';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }
    private function upload_image($file_name){
        $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size']    = '1024*8';
        $config['encrypt_name']=true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
           return  false;
        }else{
            $datafile = $this->upload->data();
            $this->thumb($datafile);
            return  $datafile['file_name'];
        }
    }
    private function upload_file($file_name){
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size']    = '1024*8';
        $config['overwrite'] = true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }
    private function url(){
        unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
    private function message($type,$text){
        if($type =='success') {
            return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible shadow" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>'.$text.'!</p></div>');
        }elseif($type=='wiring'){
            return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>'.$text.'</p></div>');
        }elseif($type=='error'){
            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>'.$text.'</p></div>');
        }
    }

    public function add_purchases($id){
        $data['suppliers'] = $this->Supplier->select();
        $data['box_name'] = $this->Purchase->get_by_method(3);
        $data['bank_name'] = $this->Purchase->get_by_method(4);
        $data['ma5zon'] = $this->Storage->select_id();
        $data['all_asnaf'] = $this->Purchase->select_sanf3('','');
        $data['units'] = $this->Purchase->select_units();
        
        if($id != 0){
            $data['result']=$this->Purchase->getById($id);
            $data['result2']=$this->Purchase->getById2($id);
            $data['asnaf'] = $this->Purchase->select_sanf_where($data['result2']['product_storage']);
            $data['details'] = $this->Purchase->select_details($id);
        }
        if($this->input->post('save') && $id == 0){
            $this->Purchase->insert();
            $this->message('success','إضافة فاتورة');
            redirect('Purchases/add_purchases/0', 'refresh');
        }
        if($this->input->post('save') && $id != 0){
            $this->Purchase->delete_fatore($id);
            $this->Purchase->insert();
            $this->message('success','تعديل فاتورة');
            redirect('Purchases/edit_purchases','refresh');
        }
        if($this->input->post('load') || $this->input->post('method') || $this->input->post('sanf_id') || $this->input->post('store_id')){
            if($this->input->post('load'))
                $this->load->view('admin/purchases/get_session', $data);
            elseif($this->input->post('method')){
                $data['method']=$this->input->post('method');
                $data['id']=$this->input->post('id');
                $this->load->view('admin/purchases/get_pay_methods',$data);
            }
            elseif($this->input->post('sanf_id')){
                $data['unit']=$this->Purchase->select_sanf3('id',$this->input->post('sanf_id'));
                $data['unit_name']=$this->Purchase->unit_name('id',$data['unit'][key($data['unit'])]->p_unit_fk);
                $this->load->view('admin/purchases/get_pay_methods',$data);
            }
            elseif($this->input->post('store_id')){
                $data['asnafs'] = $this->Purchase->select_sanf_where($this->input->post('store_id'));
                $this->load->view('admin/purchases/get_pay_methods',$data);
            }
        }
        else{    
            $data['subview'] = 'admin/purchases/purchases';
            $data['title'] = 'المشتريات';
            $this->load->view('index', $data);
        }
    }
    
    public function edit_purchases(){
        $data['suppliers'] = $this->Purchase->select_suppliers();
        $data['ma5zon'] = $this->Storage->select_id();
        $data['all_asnaf'] = $this->Purchase->select_sanf3('','');
        
        $data['table'] = $this->Purchase->select_purchases();
        $data['details'] = $this->Purchase->select_purchases2();
        $data['subview'] = 'admin/purchases/edit_purchases';
        $data['title'] = 'المشتريات';
        $this->load->view('index', $data);
    }
    
    public function delete($id){
        $this->Purchase->delete_fatore($id);
        redirect('Purchases/edit_purchases','refresh');
    }

}