<?php
class Reports extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));
//---------------------------------------------
        if($_SESSION['group_number']==0){
            redirect('Dash/home');
        }
        $this->load->model('Groups');
        $this->main_groups=$this->Groups->fetch_groups("","");
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        //-------------------------
        $this->load->model('Products/Composite');
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

    public function index(){
        $this->load->model('purchases/Purchase');
        $this->load->model('Report');
        $this->load->model('suppliers/Supplier');
        $this->load->model('Exchange/Ex_orders');
        $this->load->model('Supplies/Orders');
        
        if($this->input->post('form_date') && $this->input->post('to_date') && $this->input->post('type')){
            if($this->input->post('type') == 1){
                $data['suppliers'] = $this->Purchase->select_suppliers();
                $data['all_asnaf'] = $this->Purchase->select_sanf3('','');
                $data['table'] = $this->Report->select_from_to($this->input->post('form_date'),$this->input->post('to_date'), 'purchases_fatora');
                $data['details'] = $this->Purchase->select_purchases2();
            }elseif($this->input->post('type') == 2){
                $data['products']= $this->Ex_orders->products();
                $data['units']= $this->Ex_orders->units();
                $data["donors"] = $this->Supplier->select2();
                $data["store"] = $this->Ex_orders->store();
                $data["table"] = $this->Ex_orders->select();
                $data["items"] = $this->Ex_orders->select_items();
                $data["table"] = $this->Report->select_from_to($this->input->post('form_date'),$this->input->post('to_date'), 'exchange_orders');
            }
            elseif($this->input->post('type') == 3){
                $data['products']= $this->Orders->products();
                $data['records']= $this->Report->select_from_to($this->input->post('form_date'),$this->input->post('to_date'), 'production_system');
            }
            $this->load->view('admin/reports/load', $data);
        }else{
            $data['subview'] = 'admin/reports/all_data';
            $data['title'] = 'تقارير';
            $this->load->view('index', $data);
        }
    }

    public function update_data($id){
        $data['products']= $this->Orders->products();
        $data["composite_p"] = $this->Composite->select_composite_p();
        $data["result"] = $this->Composite->getById($id);
        $data['subview'] = 'admin/products/run_output';
        $this->load->view('index', $data);
    }

    public function delete($id){

        $this->Composite->delete($id);
        $this->message('success','تمت عملية الحذف بنجاح');
        redirect('Products/index/0');

    }
    
    public function all_products(){
        $this->load->model('Report');
        $this->load->model('storage/Storage');
        
        $data['ma5zon'] = $this->Storage->select_id();
        if($this->input->post('store_id')){
            if($this->input->post('store_id') == 'all'){
                $data['compination']= $this->Report->products(2,'');
                $data['ordinary']= $this->Report->products(1,'');
            }
            else{
                $data['compination']= $this->Report->products(2,$this->input->post('store_id'));
                $data['ordinary']= $this->Report->products(1,$this->input->post('store_id'));
            }
            $this->load->view('admin/reports/get_all_products', $data);
        }
        else{
            $data['subview'] = 'admin/reports/all_products';
            $data['title'] = 'تقرير المخازن';
            $this->load->view('index', $data);
        }
    }
    
    public function asnaf(){
        $this->load->model('Report');
        $this->load->model('purchases/Purchase');
        
        $data['asnafs'] = $this->Purchase->select_sanf3('p_code!=',0);
        if($this->input->post('store_id')){
            $data['sanf']= $this->Report->asnaf($this->input->post('store_id'));
            $data['purchses']= $this->Report->get($this->input->post('store_id'),'purchases','product_code','amount_buy',1);
            $data['exchange']= $this->Report->get($this->input->post('store_id'),'exchange_items','product_code_fk','product_amount',1);
            if($data['sanf'][0]->p_type_fk == 2)
                $data['production']= $this->Report->get($this->input->post('store_id'),'production_system','product_main_code_fk','product_main_amount',1);
            if($data['sanf'][0]->p_type_fk == 1){
                $data['standard']= $this->Report->standard($this->input->post('store_id'));
                for ($i=0; $i < count($data['standard']); $i++) { 
                    $data1['production'][$i]= $this->Report->get($data['standard'][$i]->product_main_code_fk,'production_system','product_main_code_fk','product_main_amount', $data['standard'][$i]->product_sub_amount);
                }
                if(isset($data1['production'])){ 
                    $result = array();
                    for ($i=0; $i < count($data1['production']); $i++) { 
                        for ($x=0; $x < count($data1['production'][$i]); $x++) { 
                            if(! isset($result[key($data1['production'][$i])])) {
                                $result[key($data1['production'][$i])] = new StdClass;
                                $result[key($data1['production'][$i])]->production_system = 0;
                            }
                            $result[key($data1['production'][$i])]->production_system += $data1['production'][$i][key($data1['production'][$i])]->production_system;
                            next($data1['production'][$i]);
                        }
                    }
                    $data['production'] = $result;
                }
            }

            if (isset($data['purchses']) && $data['purchses'] != null) {
                foreach ($data['purchses'] as $key => $value) {
                    if(! isset($data['final'][$key])){
                        $data['final'][$key] = new stdClass();
                        $data['final'][$key]->purchses = 0;
                        $data['final'][$key]->exchange = 0;
                        $data['final'][$key]->production = 0;
                    }
                    $data['final'][$key]->purchses = $value->purchases;
                }
            }
            if (isset($data['exchange']) && $data['exchange'] != null) {
                foreach ($data['exchange'] as $key => $value) {
                    if(! isset($data['final'][$key])){
                        $data['final'][$key] = new stdClass();
                        $data['final'][$key]->purchses = 0;
                        $data['final'][$key]->exchange = 0;
                        $data['final'][$key]->production = 0;
                    }
                    $data['final'][$key]->exchange = $value->exchange_items;
                }
            }
            if (isset($data['production']) && $data['production'] != null) {
                foreach ($data['production'] as $key => $value) {
                    if(! isset($data['final'][$key])){
                        $data['final'][$key] = new stdClass();
                        $data['final'][$key]->purchses = 0;
                        $data['final'][$key]->exchange = 0;
                        $data['final'][$key]->production = 0;
                    }
                    $data['final'][$key]->production = $value->production_system;
                }
            }
            ksort($data['final']);
            $this->load->view('admin/reports/get_asnaf', $data);
        }
        else{
            $data['subview'] = 'admin/reports/R_asnaf';
            $data['title'] = 'تقرير الأصناف';
            $this->load->view('index', $data);
        }
    }

    public function array_merge_recursive_distinct ( $array1, $array2 )
    {
        $merged = $array1;

        foreach ( $array2 as $key => $value )
        {
            if ( is_array ( $value ) && isset ( $merged [$key] ) && is_array ( $merged [$key] ) )
            {
                $merged [$key] = array_merge_recursive_distinct ( $merged [$key], $value );
            }
            else
            {
                $merged [$key] = $value;
            }
        }

        return $merged;
    }
}