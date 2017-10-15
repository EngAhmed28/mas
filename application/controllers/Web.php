<?php
class Web extends CI_Controller
{
    public $footer ;
    public $report;
    public $advert;
    public $voot;
    public $header ;
    public $header2 ;
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','text','permission','form','cookie'));
        $this->load->library('pagination');
        
        $this->load->model('Main_data');
        $this->footer = $this->Main_data->select(1,0);
        $this->header = $this->Main_data->select(1,0);
        
        
         $this->load->model('Departs');
        $this->header2 = $this->Departs->select(1);




  $this->load->model('Doctors');
   $this->doctor = $this->Doctors->select();






        
        $this->load->model('Reports');
        $this->report = $this->Reports->select_report();
        
        $this->load->model('Advertising');
        $this->advert = $this->Advertising->select_adver();
        
        $this->load->model('Vote');
        $this->voot = $this->Vote->select_vote();
        
    }
    private function test($data = array())
    {

        echo "<pre>";

        print_r($data);

        echo "</pre>";

        die;

    }

    private function message($type, $text)
    {

        if ($type == 'success') {

            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible shadow" data-sr="wait 0s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>' . $text . '!</p></div>');

        } elseif ($type == 'wiring') {

            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" data-sr="wait 0.6s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>' . $text . '</p></div>');

        } elseif ($type == 'error') {

            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" data-sr="wait 0.3s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>' . $text . '</p></div>');

        }

    }
    private function thumb($data)

    {

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
    private  function upload_image($file_name){

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

        //  unlink($datafile['full_path']);

    }
    //////////////////////////////////
    private  function upload_file($file_name){

        $config['upload_path'] = 'uploads/files';

        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';

        $config['max_size']    = '1024*8';

        //$config['encrypt_name']=true;
        $config['overwrite'] = true;
        $this->load->library('upload',$config);

        if(! $this->upload->do_upload($file_name)){

            return  false;

        }else {

            $datafile = $this->upload->data();

            return $datafile['file_name'];

        }

    }
    
     private function pagnate($method,$recordcount,$per_page,$segment){
        $config = array();
        $config["base_url"] = base_url() . "Web/".$method;
        $config["total_rows"] = $recordcount;
        $config["per_page"] = $per_page;
        $config["uri_segment"] = $segment;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination" >';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '<li class="disabled"><a href="#">«</a></li>';
        $config['last_link'] = '<li><a href="#">»</a></li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        return $config;
    }
   
    ////////////////////end of excel library option
    
        public function index(){
            $this->load->model('News');
            $data['records']=$this->News->select_web(4,0,'','');
            
            $data['records2']=$this->News->select_web(11,0,'','');
             $data['records3']=$this->News->select_web(4,2,'','');
              $data['news']=$this->News->select_web(6,0,'','');
              
           
            $this->load->model('Slider');
            
            $data['imgs']=$this->Slider->get_all_img();
            
            
            
              $this->load->model('Video');
            
           $data['records5']=$this->Video->select_web(4,'');
            $data['records6']=$this->Video->select_web(3,1);
            
              $this->load->model('Clients');
                  $data['records7']=$this->Clients->select(2);
                  
                  $data['records8']=$this->Clients->select_limit(1);
                 
                 // var_dump($data['records7']);
            //Clients
             $this->load->model('Album');
            
            $data['photos']=$this->Album->get_all_img();
            
            $data['title'] ='مستشفي الماس';
    
            $data['subview'] = 'web/home';
    
            $this->load->view('index1', $data);
            
    }
    public function details($id,$type){
            
            $this->load->model('News');
              $this->load->model('Slider');
          
            $data['imgs']=$this->Slider->get_all_img();
            
            $data['records']=$this->News->select_web(1,$type,$id,'');
            $data['records2']=$this->News->select_web('',$type,'','');
            
            $config=$this->pagnate('details/'.$id.'/'.$type.'',($this->News->record_count($type)-1),7,5);
            $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
            $page = (($page*7)-7);
            if($page<0)
                $page = 0;
            $data['records3']=$this->News->select_except($config["per_page"],$type,$id,$page);
            
            $data["links"] = $this->pagination->create_links();
            
            $this->load->model('Users');
            for($r = 0 ; $r < count($data['records']) ; $r++)
                $data['user'][$r]=$this->Users->display($data['records'][$r]->publisher);
            
            $data['title'] ='مستشفي الماس';
    
            $data['subview'] = 'web/one_offer';
    
            $this->load->view('index1', $data);
            
    }
    ///////////////////////////////////////////////// 
    
        public function departs($id){
            
            
        
        
          $this->load->model('Departs');
        $data['records'] = $this->Departs->getById($id);
        
        
        $data['records3']=$this->Departs->select_except($id);
     //   var_dump($data['records']);
            
            $data['title'] ='مستشفي الماس';
    
            $data['subview'] = 'web/departs';
    
            $this->load->view('index1', $data);
            
    }
    
    
    //////////////////////////////////////
        public function all_details(){
            
            $this->load->model('News');
              $this->load->model('Slider');
            $data['imgs']=$this->Slider->get_all_img();
            
      
      
      
      
              $config=$this->pagnate('all_details/',$this->News->record_count(2),6,3);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $page = (($page*6)-6);
            if($page<0)
                $page = 0;
            $data['records2']=$this->News->select_web($config["per_page"],2,'',$page);
            $data["links"] = $this->pagination->create_links();
            
      
          
            $data['title'] ='مستشفي الماس';
    
            $data['subview'] = 'web/details';
    
            $this->load->view('index1', $data);
            
    }
            public function all_news(){
            
            $this->load->model('News');
              $this->load->model('Slider');
            $data['imgs']=$this->Slider->get_all_img();
            
      
      
            $config=$this->pagnate('all_news/',$this->News->record_count(0),6,3);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $page = (($page*6)-6);
            if($page<0)
                $page = 0;
            $data['news']=$this->News->select_web($config["per_page"],0,'',$page);
            $data["links"] = $this->pagination->create_links();
      
           // $data['news']=$this->News->select_all_news();
          
            $data["links"] = $this->pagination->create_links();
          
            $data['title'] ='مستشفي الماس';
    
            $data['subview'] = 'web/all_news';
    
            $this->load->view('index1', $data);
            
    }
    
    
                public function all_vedio(){
            
          $this->load->model('Video');
            
            
            
               $config=$this->pagnate('all_vedio/',$this->Video->record_count(),9,3);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $page = (($page*9)-9);
            if($page<0)
                $page = 0;
            $data['all_vedio']=$this->Video->select_web($config["per_page"],$page);
            $data["links"] = $this->pagination->create_links();
          // $data['all_vedio']=$this->Video->select();
            //$data['records6']=$this->Video->select_web(3,1);
            
          
            $data["links"] = $this->pagination->create_links();
          
            $data['title'] ='مستشفي الماس';
    
            $data['subview'] = 'web/all_vedio';
    
            $this->load->view('index1', $data);
            
    }
    
        
                public function all_t2meen(){
            
           $this->load->model('Clients');
        // $data['records7']=$this->Clients->select(2);
            //$data['records6']=$this->Video->select_web(3,1);
            
            
             $config=$this->pagnate('all_t2meen/',$this->Clients->record_count(2),6,3);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $page = (($page*6)-6);
            if($page<0)
                $page = 0;
            $data['records7']=$this->Clients->select_web($config["per_page"],$page);
            $data["links"] = $this->pagination->create_links();  
          
          
            $data['title'] ='مستشفي الماس';
    
            $data['subview'] = 'web/all_t2meen';
    
            $this->load->view('index1', $data);
            
    }
    
                    public function client(){
            
           $this->load->model('Clients');
        // $data['records7']=$this->Clients->select(2);
            //$data['records6']=$this->Video->select_web(3,1);
            
            
             $config=$this->pagnate('client/',$this->Clients->record_count(1),8,3);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $page = (($page*8)-8);
            if($page<0)
                $page = 0;
            $data['records7']=$this->Clients->select_web_clients($config["per_page"],$page);
          
            $data["links"] = $this->pagination->create_links();  
           // var_dump(    $this->Clients->record_count(1));
          
            $data['title'] ='مستشفي الماس';
    
            $data['subview'] = 'web/client';
    
            $this->load->view('index1', $data);
            
    }
    
  public function all_images(){
            
            $this->load->model('Album');
            $data['data']=$this->Album->get_all_img();
            
           
            $config=$this->pagnate('all_images/',$this->Album->record_count(),6,3);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $page = (($page*6)-6);
            if($page<0)
                $page = 0;
            $data['photos']=$this->Album->select_web($config["per_page"],$page);
            $data["links"] = $this->pagination->create_links();                 
            
          //  $data['photos']=$this->Album->get_all_img();
            //$data['records6']=$this->Video->select_web(3,1);
            
          
            $data["links"] = $this->pagination->create_links();
          
            $data['title'] ='جمعية وفاق';
    
            $data['subview'] = 'web/all_images';
    
            $this->load->view('index1', $data);
            
    }
    
        public function news_details($id,$type){
           $this->load->model('News');
              $this->load->model('Slider');
            $data['imgs']=$this->Slider->get_all_img();
            
            $data['records']=$this->News->select_web(1,$type,$id,'');
            //var_dump($data['records']); die;
            $data['records2']=$this->News->select_web('',$type,'','');
            
            $config=$this->pagnate('details/'.$id.'/'.$type.'',($this->News->record_count($type)-1),7,5);
            $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
            $page = (($page*7)-7);
            if($page<0)
                $page = 0;
            $data['records3']=$this->News->select_except($config["per_page"],$type,$id,$page);
           
            $data["links"] = $this->pagination->create_links();
            
            $this->load->model('Users');
            for($r = 0 ; $r < count($data['records']) ; $r++)
                $data['user'][$r]=$this->Users->display($data['records'][$r]->publisher);
            
            
    
            $data['title'] ='مستشفي الماس -  تفاصيل الخبر';
    
            $data['subview'] = 'web/news_details';
    
            $this->load->view('index1', $data);
            
    }
    
    
    public function news($type){
            $this->load->model('News');
            
            $config=$this->pagnate('news/'.$type.'',$this->News->record_count($type),9,4);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $page = (($page*9)-9);
            if($page<0)
                $page = 0;
            $data['records']=$this->News->select_web($config["per_page"],$type,'',$page);
            $data["links"] = $this->pagination->create_links();
            
            $data['title'] ='جمعية وفاق';
    
            $data['subview'] = 'web/jornalist';
    
            $this->load->view('index1', $data);
            
    }
    
        public function about($type){
            
            $this->load->model('About');
            
            $data['records']=$this->About->select_web($type);
            

            $data['title'] ='نبذة عن مجمع عيادة الماس';
    
            $data['subview'] = 'web/about';
    
            $this->load->view('index1', $data);
            
    }
        public function manager_word(){
            
            $this->load->model('Manager_word');
            $data['records']=$this->Manager_word->select('',1);

            $data['title'] ='كلمة رئيس مجلس الإدارة';
    
            $data['subview'] = 'web/manager_word';
    
            $this->load->view('index1', $data);
            
    }
    
    ///////////////////////////////
            public function shakwa(){
            
                  if($this->input->post('send'))
       {
        
            $this->load->model('Shakwa');
            
            $this->Shakwa->insert($this->input->post('email'));
            
            $this->message('success','تمت  إرسال الرسالة');
           
            
            redirect('web/shakwa');
       }
            $data['title'] ='المقترحات والشكاوي';
    
            $data['subview'] = 'web/shakwa';
    
            $this->load->view('index1', $data);
            
    }
    
    //////////////////////////////
    
    public function journalist($type){
            $this->load->model('News');
            
            $config=$this->pagnate('journalist/'.$type.'',$this->News->record_count($type),19,4);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $page = (($page*19)-19);
            if($page<0)
                $page = 0;
            $data['records']=$this->News->select_web($config["per_page"],$type,'',$page);
            $data["links"] = $this->pagination->create_links();
            
            $data['title'] ='جمعية وفاق';
    
            $data['subview'] = 'web/journalist';
    
            $this->load->view('index1', $data);
            
    }
    

    public function resala(){
            
            $this->load->model('Manager_word');
            $data['records']=$this->Manager_word->select('',4);

            $data['title'] ='رسالة الجمعية';
    
            $data['subview'] = 'web/resala';
    
            $this->load->view('index1', $data);
            
    }
    
    public function vision(){
            
            $this->load->model('Manager_word');
            $data['records']=$this->Manager_word->select('',5);

            $data['title'] ='رؤية الجمعية';
    
            $data['subview'] = 'web/vision';
    
            $this->load->view('index1', $data);
            
    }
    
    public function goals(){
            
            $this->load->model('Manager_word');
            $data['records']=$this->Manager_word->select('',3);

            $data['title'] ='أهداف الجمعية';
    
            $data['subview'] = 'web/goals';
    
            $this->load->view('index1', $data);
            
    }
    

    
    public function ameen_word(){
            
            $this->load->model('Manager_word');
            $data['records']=$this->Manager_word->select('',2);

            $data['title'] ='كلمة الأمين العام';
    
            $data['subview'] = 'web/ameen_word';
    
            $this->load->view('index1', $data);
            
    }
    
    public function members(){
            
            $this->load->model('Members');
            $data['records']=$this->Members->select_web();

            $data['title'] ='أعضاء مجلس الإدارة';
    
            $data['subview'] = 'web/members';
    
            $this->load->view('index1', $data);
            
    }
    
    public function sayings(){
            
            $this->load->model('Sayings');
            $data['records']=$this->Sayings->select_web();

            $data['title'] ='قالوا عن الجمعية';
    
            $data['subview'] = 'web/sayings';
    
            $this->load->view('index1', $data);
            
    }
    
    public function course()
    {
        
        $this->load->model('Sessions');
        $data['records'] = $this->Sessions->select();
        
        $data['title'] ='كورسات';
        
        $data['subview'] = 'web/course';
        
        $this->load->view('index1', $data);
        
    }
    
    
    public function contact()
    {
       
       if($this->input->post('send'))
       {
        
            $this->load->model('Contact');
            
            $this->Contact->insert($this->input->post('email'));
            
            $this->message('success','تمت  إرسال الرسالة');
           
            
            redirect('web/contact');
       }
       $this->load->model('Main_data');
        $data['data'] = $this->Main_data->select(1,0);
        
        
        $data['title'] ='إتصل بنا';
        
        $data['subview'] = 'web/contact';
        
        $this->load->view('index1', $data);
        
    }


/**
 * Abd Al-Razeq
 * 
 * **/
 
 public function session_request(){
     $id = $this->uri->segment(3);

     $this->load->model('Sessions');
        $data['sessions']=$this->Sessions->select();
         $data['reeee']=$this->Sessions-> getById($id);

     $this->load->model('Sessions_reserve');
        if ($this->input->post('add_sessions_reserve')){

            $this->Sessions_reserve->inserted();
            $this->message('success','ارسال طلب الحجز');
            redirect('web/session_request','refresh');
        }
        $data['title'] = 'اضافة حجز الكورسات .';
        $data['subview'] = 'web/session_request';
        $this->load->view('index1', $data);


    }
    
     public function course_details(){
         $id = $this->uri->segment(3);

         if($id==0){
             redirect(base_url('course'));
         }

     $this->load->model('Sessions');


         $data['records']=$this->Sessions->select();
         $data['reeee']=$this->Sessions-> getById($id);

         $data['title'] = 'تفاصيل كورس';
        $data['subview'] = 'web/course_details';
        $this->load->view('index1', $data);


    }

 /**
 *** م. أحمد
 
 
 */   
 
         public function img(){
            
            $this->load->model('Album');
            
         $data['records']=$this->Album->select();

            $data['title'] ='مكتبة الصور';
    
            $data['subview'] = 'web/img-gallery';
    
            $this->load->view('index1', $data);
            
    }

  ///////////////////////////////////////////////
        public function img_details($id){
            $this->load->model('Album');
            $data['records4']=$this->Album->select_imgs($id);
            
            $data['title'] ='مكتبة الصور';
    
            $data['subview'] = 'web/img_details';
    
            $this->load->view('index1', $data);
            
    }
    /////////////////////////
    
        public function voters() {
            
            $url = explode('web/',$this->input->post('url'));
           
          $this->load->model('Vote');
            
                    if ($this->input->post('vote')) {
                    
          if(isset($_COOKIE['rateLikeChnage_3'])){}
          else{ 
                            
              $this->Vote->update_v($_POST['voting']); 
              setcookie('rateLikeChnage_3', 'rateLikeChnage_3',time() + 3600 );
       
            }
             } 
             
             redirect('web/'.$url[1].'');   
    }
    ///////////////////
    
      public function download($file)
        {
        $url = explode('web/',$this->input->post('url'));
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/files/'.$file); 
        force_download($name, $data); 
             redirect('web/'.$url[1].'');  
        }
        
        
        
       public function doctors(){
      
       if($this->input->post('id') != ""){

             $this->load->model('Doctors');
  
  $data['all']=$this->Doctors->getBydepart($this->input->post('id'));
  
     $this->load->view('web/x',$data);
}else{
       
             $this->load->model('Departs');
 
  $data['all']=$this->Departs->select(1);
            $data['title'] ='الأطباء';
    
            $data['subview'] = 'web/doctors';
    
            $this->load->view('index1', $data);
         }   
    }
    
    public function ask_doctor($id)
    {
       
        $this->load->model('Question');
        
         if($this->input->post('send'))
           {
                $this->Question->insert($this->input->post('email'),$id);
                
                $this->message('success',' إرسال الرسالة');
                
                redirect('web/ask_doctor/'.$id.'');
           }
              
        $data['title'] ='إسأل طبيبك';
        
        $data['subview'] = 'web/ask_doctor';
        
        $this->load->view('index1', $data);
        
    }
    
    
        public function career(){

        $this->load->model('Career');

        if($this->input->post('send'))
        {

            $file= $this->upload_file('file');
            $this->Career->insert($file);

         //   $this->test($_POST);
            $this->message('success',' إرسال طلبك');
            redirect('web/career','refresh');
        }
        $data['title'] ='طلب توظيف';
        $data['subview'] = 'web/career';
        $this->load->view('index1', $data);
    }
    
    
    
    
    
    
    /***********************************/
    
            public function Apport(){
      
   
         
    
     $this->load->model('Departs');
     $this->load->model('Apport');
    $data['depart_id']=$this->Departs->select(1);

 
        if($this->input->post('add_apport'))
        {
               $this->Apport->insert();

          
            $this->message('success',' إرسال حجزك');
            redirect('web/Apport','refresh');
        }
        
   if($this->input->post('num')!=""){
             $this->load->model('Doctors');
      $data['doctor_id']=$this->Doctors->select();
  $data['all']=$this->Doctors->getBydepart($this->input->post('num'));
  
  
     $this->load->view('web/doctor_data',$data);
    
   
        }else{
                
                if($this->input->post('dd')){
            $this->load->model('Doctors');
         $data['all_data']=$this->Doctors->records_ss($this->input->post('dd'));
         $this->load->view('web/dd',$data);
              }else{
                         $data['title'] ='إحجز موعدك';
        $data['subview'] = 'web/time';
       
        $this->load->view('index1', $data);  
                }
                
     
        }
        
      
    }
    
    
    public function jobs(){

        $this->load->model('Jobs_advert');
        
        $data['recordes'] = $this->Jobs_advert->select_web('','');

        $data['title'] ='الوظائف';
        $data['subview'] = 'web/jobs';
        $this->load->view('index1', $data);
    }
    
     public function job_details($id){

        $this->load->model('Jobs_advert');
        
        $data['recordes'] = $this->Jobs_advert->getById($id);
        
        $data['recordes2'] = $this->Jobs_advert->select_web(3,$id);

        $data['title'] ='الوظائف';
        $data['subview'] = 'web/job_details';
        $this->load->view('index1', $data);
    }
    
    
    
    
    
    
    
public function doctor($id){
    $this->load->model('Doctors');
    $data['records']=$this->Doctors->getById($id);
    $data['booking']=$this->Doctors->records_ss($id);
    $data['subview'] = 'web/doctor';
    $this->load->view('index1', $data);
}    
    
    
    
    
    

}

