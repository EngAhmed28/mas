<?php
class Search extends CI_Controller
{
    public $mass;
    public $mass2;
    public function __construct()
    {

        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('form_validation');
        if($this->session->userdata('is_logged_in')==0){

            redirect('login');

        }
        $this->load->helper(array('url','text','permission','form','download'));
//---------------------------------------------
        if($_SESSION['group_number']==0){
            redirect('Dash/home');
        }
        $this->load->model('Groups');
        $this->main_groups=$this->Groups->fetch_groups("","");
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        //-------------------------

        $this->load->model('Contact');
        $this->mass = $this->Contact->getallinbox();
        $this->load->model('Question');
        $this->mass2 = $this->Question->getallinbox();

    }
    private  function test($data=array()){

        echo "<pre>";

        print_r($data);

        echo "</pre>";

        die;

    }
    private  function  ara_date(){

        $nameday=date("l");

        $day=date("d");

        $namemonth=date("m");


        $year=date("Y");

        switch ($nameday)

        {

            case "Saturday":

                $nameday="السبت";

                break;

            case "Sunday":

                $nameday="الأحد";

                break;

            case "Monday":

                $nameday="الاثنين";

                break;

            case "Tuesday":

                $nameday="الثلاثاء";

                break;

            case "Wednesday":

                $nameday="الأربعاء";

                break;

            case "Thursday":

                $nameday="الخميس";

                break;

            case "Friday":

                $nameday="الجمعة";

                break;

        }

        switch ($namemonth)

        {

            case 1:

                $namemonth="يناير";

                break;

            case 2:

                $namemonth="فبراير";

                break;

            case 3:

                $namemonth="مارس";

                break;

            case 4:

                $namemonth="إبريل";

                break;

            case 5:

                $namemonth="مايو";

                break;

            case 6:

                $namemonth="يونيو";

                break;

            case 7:

                $namemonth="يوليو";

                break;

            case 8:

                $namemonth="اغسطس";

                break;

            case 9:

                $namemonth="سبتمبر";

                break;

            case 10:

                $namemonth="اكتوبر";

                break;

            case 11:

                $namemonth="نوفمبر";

                break;

            case 12:

                $namemonth="ديسمبر";

                break;

        }

        return "$nameday $day $namemonth $year";



    }
    /**

     * @param $type     success

     * @param $type     wiring

     * @param $type     error

     */
    private function message($type,$text){

        if($type =='success') {

            return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible shadow" data-sr="wait 0s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>'.$text.'!</p></div>');

        }elseif($type=='wiring'){

            return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" data-sr="wait 0.6s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>'.$text.'</p></div>');

        }elseif($type=='error'){

            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" data-sr="wait 0.3s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>'.$text.'</p></div>');

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
    ////////////////////end of excel library option
    private function url (){
        unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
    ///////////////////////////////
    /*  private  function sendmail($from,$name,$to=array(),$cc=false,$bcc=false,$subject,$message,$attach=false)
        {
            $this->load->library('email');
            $this->email->from($from, $name);
            $this->email->to($to);
            $this->email->cc($cc);
            $this->email->bcc($bcc);
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->attach($attach);

            if(!$this->email->send())
            {
                // return show_error($this->email->print_debugger());
                 return false;
            }
            else
            {
               return true;

            }

        }*/

    /**@
     * @param $method
     * @param $recordcount
     * @param $per_page
     * @return array
     */
    private function pagnate($method,$recordcount,$per_page){
        $config = array();
        $config["base_url"] = base_url() . "dashboard/".$method;
        $config["total_rows"] = $recordcount;
        $config["per_page"] = $per_page;
        $config["uri_segment"] = 3;
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

    /////////////////////////main page
    public function  index(){

        //$this->test(setpermition());
        $this->url();

        $data['title'] ='لوحة التحكم';

        $this->load->model('Users');
        $data['users_num'] = $this->Users->record_count();

        $this->load->model('News');
        $data['news_num'] = $this->News->record_count_all(0);
        $data['journal_num'] = $this->News->record_count_all(1);

        $this->load->model('Reports');
        $data['report_num'] = $this->Reports->record_count();

        $this->load->model('Album');
        $data['album_num'] = $this->Album->record_count();

        $data['subview'] = 'admin/main';

        $this->load->view('index', $data);

    }







}//END CLASS 
