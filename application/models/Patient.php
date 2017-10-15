<?php

class Patient extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
    }

    public  function  insert($file){
        
        $DB1 = $this->load->database('kingdom', TRUE);
        
        if($file == '')
            $file = 'user.png';
        $data['a_name']=$this->input->post('a_name');
       // $data['birth_date']=$this->input->post('birth_date');
        if($this->input->post('gender'))
            $data['gender']=0;//$this->input->post('gender');
        else
            $data['gender']=1;
        $data['social']=$this->input->post('social');
        $data['work']=$this->input->post('work');
        $data['mobile']=$this->input->post('mobile');
          $data['birth_year']=$this->input->post('birth_year');
        
        $data['work_phone']=$this->input->post('work_phone');
        $data['health']=$this->input->post('health');
        $data['file_date']=$this->input->post('file_date');
        $data['card_type']=$this->input->post('card_type');
        $data['phone']=$this->input->post('phone');
        $data['address']=$this->input->post('address');
        $data['id_card']=$this->input->post('id_card');
        $data['nationality']=$this->input->post('nationality');
        $data['e_name']=$this->input->post('e_name');
        $data['code']=$this->input->post('code');
        $data['img']=$file;
       $data['hospital_id_fk']=2;
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        
        $DB1->insert('patient',$data);
        
        $patient_id = $DB1->insert_id();
        
        $opp['petient_id'] = $patient_id;
        $opp['fatora_num'] = time()."2";
        $opp['hospital_id'] = 2;
        $opp['dep_id'] = $this->input->post('dep_id');
        $opp['re_doc_id'] = $this->input->post('doc_id');
         $oppr['first_paid'] = $this->input->post('first_paid');
        $opp['operation_id'] = $this->input->post('operation_id');
        $opp['operation_price'] = $this->input->post('price');
        $opp['operation_date'] = $this->input->post('operation_date');
        $opp['details'] = '';
        $opp['paid'] = $this->input->post('price');
        $opp['doctor_id'] = '';
        $opp['in/out'] = 0;
        $opp['publisher'] = $_SESSION['user_id'];
        $opp['date'] = strtotime(date("Y/m/d"));
        $opp['date_s'] = time();
        
        $DB1->insert('operation',$opp);
        
    }


    public function select($hospital_id,$inout,$date,$dep_id){
        
        if($date != ''){
            $array = array('in/out'=>$inout,'operation_date'=>$date);
        }else{
            $array = array('in/out'=>$inout);
        }


        if($dep_id != 0){
            $array['dep_id'] = $dep_id;
        }

        if($hospital_id != ''){
            $array['hospital_id'] = $hospital_id;
        }
        
        $DB1 = $this->load->database('kingdom', TRUE);
        
        $DB1->select('operation.*,patient.a_name,patient.id AS p_id,patient.id_card,patient.mobile,patient.birth_date,patient.nationality,transformation.to_dep');
        
        $DB1->join('patient','patient.id=operation.petient_id','left');
        
        $DB1->join('transformation','transformation.id=operation.transform','left');
        $DB1->order_by('id','desc');
        $DB1->where($array);
        
        $query = $DB1->get('operation');
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
                $data2[$row->id_card][$row->dep_id][] = $row;
                $data3[$row->a_name][$row->operation_date][$row->dep_id][] = $row;
                //$data3[$row->a_name][$row->operation_date][$row->dep_id][$row->out_date][] = $row;
                $data4[$row->hospital_id][$row->id_card] = $row;
            }
            return array($data,$data2,$data3,$data4);
        }
        return false;
    }
    
    
        public function select_for_doc_account($hospital_id,$inout,$date,$dep_id,$doc_id){
        
        if($date != '')
            $array = array('in/out'=>$inout,'operation_date'=>$date);
        else
            $array = array('in/out'=>$inout);
        if($dep_id != 0)
            $array['dep_id'] = $dep_id;
        if($hospital_id != '')
            $array['hospital_id'] = $hospital_id;
            
            
            if($doc_id != ''){
            $array['re_doc_id'] = $_SESSION['doctor_id'];   }
        
        $DB1 = $this->load->database('kingdom', TRUE);
        
        $DB1->select('operation.*,patient.a_name,patient.id AS p_id,patient.id_card,patient.mobile,patient.birth_date,patient.nationality,transformation.to_dep');
        
        $DB1->join('patient','patient.id=operation.petient_id','left');
        
        $DB1->join('transformation','transformation.id=operation.transform','left');
        
        $DB1->order_by('date','asc');
        $DB1->where($array);
        
        $query = $DB1->get('operation');
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
                $data2[$row->id_card][$row->dep_id][] = $row;
                $data3[$row->a_name][$row->operation_date][$row->dep_id][] = $row;
                //$data3[$row->a_name][$row->operation_date][$row->dep_id][$row->out_date][] = $row;
                $data4[$row->hospital_id][$row->id_card] = $row;
            }
            return array($data,$data2,$data3,$data4);
        }
        return false;
    }
    
    
    public function select_outdate($hospital_id,$inout,$out_date,$dep_id,$patient_id){
        
        if($out_date != '')
            $array = array('in/out'=>$inout,'out_date'=>$out_date);
        else
            $array = array('in/out'=>$inout);
        if($patient_id != '')
            $array = array('petient_id'=>$patient_id);
        if($dep_id != 0)
            $array['dep_id'] = $dep_id;
        if($hospital_id != '')
            $array['hospital_id'] = $hospital_id;
        
        $DB1 = $this->load->database('kingdom', TRUE);
        
        $DB1->select('operation.*,patient.a_name,patient.id AS p_id,patient.id_card,patient.mobile,patient.birth_date,patient.nationality,transformation.to_dep');
        
        $DB1->join('patient','patient.id=operation.petient_id','left');
        
        $DB1->join('transformation','transformation.id=operation.transform','left');
        
        $DB1->where($array);
        
        $query = $DB1->get('operation');
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id_card][$row->fatora_num][] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function printt($hospital_id,$inout,$out_date,$patient_id,$fatora_num){
        
        $array = array('in/out'=>$inout,'out_date'=>$out_date,'petient_id'=>$patient_id,'hospital_id'=>$hospital_id,'fatora_num'=>$fatora_num);
        
        $DB1 = $this->load->database('kingdom', TRUE);
        
        $DB1->select('operation.*,patient.a_name,patient.id AS p_id,patient.id_card,patient.mobile,patient.birth_date,patient.nationality');
        
        $DB1->join('patient','patient.id=operation.petient_id','left');
        
        $DB1->where($array);
        
        $query = $DB1->get('operation');
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id_card][] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select_report($hospital_id,$inout,$date_from,$date_to,$dep_id,$doc_id){
        
        $array = array('in/out'=>$inout,'out_date>='=>$date_from,'out_date<='=>$date_to,'doctor_id'=>$doc_id);
        if($dep_id != 0)
            $array['dep_id'] = $dep_id;
        if($hospital_id != '')
            $array['hospital_id'] = $hospital_id;
        
        $DB1 = $this->load->database('kingdom', TRUE);
        
        $DB1->select('operation.*,patient.a_name,patient.id AS p_id,patient.id_card,patient.mobile,patient.birth_date,patient.nationality,transformation.to_dep');
        
        $DB1->join('patient','patient.id=operation.petient_id','left');
        
        $DB1->join('transformation','transformation.id=operation.transform','left');
        
        $DB1->where($array);
        
        $query = $DB1->get('operation');
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id_card][] = $row;
                $data3[$row->a_name][$row->out_date][$row->dep_id][] = $row;
            }
            return $data3;
        }
        return false;
    }
    
    
    public function all_patients(){
        
        $DB1 = $this->load->database('kingdom', TRUE);
        
        $DB1->select('*');
                 $array = array('hospital_id_fk'=>2);
          $DB1->where($array);
        $query = $DB1->get('patient');
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
 

    public function getById($id){
        $DB1 = $this->load->database('kingdom', TRUE);
        $h = $DB1->get_where('patient', array('id'=>$id));
        return $h->row_array();
    }
    
  
    public function update($id,$file){
        $DB1 = $this->load->database('kingdom', TRUE);
        
        if($this->input->post('gender') != null)
            $gender=0;
        else
            $gender=1;
        
        $update = array(
                        'a_name'=>$this->input->post('a_name'),
                        'e_name'=>$this->input->post('e_name'),
                        'gender'=>$gender,
                     /*   'birth_date'=>$this->input->post('birth_date'),*/
                        'nationality'=>$this->input->post('nationality'),
                        'mobile'=>$this->input->post('mobile'),
                        'social'=>$this->input->post('social'),
                        'birth_year'=>$this->input->post('birth_year'),
                        
                        'work'=>$this->input->post('work'),
                        'work_phone'=>$this->input->post('work_phone'),
                        'health'=>$this->input->post('health'),
                        'card_type'=>$this->input->post('card_type'),
                        'phone'=>$this->input->post('phone'),
                        'address'=>$this->input->post('address'),
                        'id_card'=>$this->input->post('id_card'),
                        'date' => strtotime(date("Y-m-d")),
                        'date_s' => time()
                        );
        if($file != ''){
            $update['img']=$file;
        }
        
        $DB1->where('id', $id);
        
        $DB1->update('patient',$update);
        
        $oppr['petient_id'] = $id;
        $oppr['fatora_num'] = time()."2";
        $oppr['hospital_id'] = 2;
        $oppr['dep_id'] = $this->input->post('dep_id');
        $oppr['operation_id'] = $this->input->post('operation_id');
        $oppr['operation_price'] = $this->input->post('price');
        $oppr['operation_date'] = $this->input->post('operation_date');
        $oppr['details'] = '';
        $oppr['paid'] = $this->input->post('price');
        
         $oppr['re_doc_id'] = $this->input->post('doc_id');
          $oppr['first_paid'] = $this->input->post('first_paid');
        
        $oppr['doctor_id'] = 0;
        $oppr['out_date'] = '';
        $oppr['in/out'] = 0;
        $oppr['publisher'] = $_SESSION['user_id'];
        $oppr['date'] = strtotime(date("Y/m/d"));
        $oppr['date_s'] = time();
        
        $DB1->insert('operation',$oppr);
    }
    
    public function checkout($check,$id,$tt)
    {
        $DB1 = $this->load->database('kingdom', TRUE);
        
        if(isset($_POST['operation'])){
            for($x = 0 ; $x < count($_POST['operation']) ; $x++){
                $ope['petient_id'] = $this->input->post('petient_id');
                $ope['hospital_id'] = 2;
                $ope['dep_id'] = $this->input->post('dep_id');
                
                $ope['operation_id'] = key($_POST['operation']);
                $ope['operation_price'] = $_POST['operation'][key($_POST['operation'])];
                
                $ope['discount_op']=$_POST['dis_'.key($_POST['operation']).$id];
                
                  $ope['opretion_amuont']=$_POST['opretion_amuont'.key($_POST['operation']).$id];
                
                
                
                $ope['operation_date'] = $this->input->post('operation_date'.$this->input->post('id').'');
                $ope['details'] = $this->input->post('details'.$this->input->post('id').'');
                $ope['doctor_id'] = $_SESSION['doctor_id'];
                $ope['in/out'] = $check;
                
                if(isset($_POST['to_dep']))
                    $ope['transform'] = $tt;
                
                $ope['date'] = strtotime(date("Y/m/d"));
                $ope['date_s'] = time();
                $ope['paid'] = '';
                $ope['out_date'] = '';
                $ope['publisher'] = $_SESSION['user_id'];
                $ope['fatora_num'] = $this->input->post('fatora_num');
                
                $DB1->insert('operation',$ope);
                
                next($_POST['operation']);
            }
        }
        
        $up = array('in/out'=>$check);
        
        if(isset($_POST['to_dep']))
            $up['transform'] = $tt;
        
        $array = array('id'=> $id);
        
        $DB1->where($array);
        
        if($DB1->update('operation',$up)) {
            return true;
        }else{
            return false;
        }
    }
    
    public function transform($id){
        $DB1 = $this->load->database('kingdom', TRUE);
        
        $trans['patient_id'] = $this->input->post('petient_id');
        $trans['from_dep'] = $_SESSION['dep_id'];
        $trans['to_dep'] = $_POST['to_dep'];
        $trans['details'] = $this->input->post('details'.$this->input->post('id').'');
        $trans['tranform_date'] = date("Y-m-d");
        $trans['date'] = strtotime(date("Y/m/d"));
        $trans['date_s'] = time();
        
        $DB1->insert('transformation',$trans);
        
        $trans_id = $DB1->insert_id();
        
        return $trans_id;
    }
    
    
    public function exitt($check,$id,$paid,$discount,$status)
    {
        $DB1 = $this->load->database('kingdom', TRUE);
        
        if($discount == '')
            $discount = 0;
        
        if($paid != '')
            $up = array('in/out'=>$check,'paid'=>$this->input->post('after_dis'.$paid.''),'out_date'=>date("Y-m-d"),'discount'=>$discount,'status'=>$status);
        else
            $up = array('in/out'=>$check,'out_date'=>date("Y-m-d"),'status'=>$status);
        
        $up['publisher'] = $_SESSION['user_id'];
        
        $array = array('id'=> $id);
        
        $DB1->where($array);
        
        if($DB1->update('operation',$up)) {
            return true;
        }else{
            return false;
        }
    }

    
    public function search($id_card)
    {
        $DB1 = $this->load->database('kingdom', TRUE);
        
        $query = $DB1->get_where('patient', array('id_card'=>$id_card));
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    
    public function departs($hospital_id)
    {
        $DB1 = $this->load->database('kingdom', TRUE);
        
        $DB1->select('*');
        $DB1->where('hospital_id',$hospital_id);
        $query = $DB1->get('all_dep');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    
    
    public function departs_except($hospital_id)
    {
        $DB1 = $this->load->database('kingdom', TRUE);
        
        $DB1->select('*');
        $array = array('hospital_id'=>$hospital_id,'id!='=>$_SESSION['dep_id']);
        $DB1->where($array);
        $query = $DB1->get('all_dep');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    
    
    public function operation($hospital_id,$dep_id)
    {
        $DB1 = $this->load->database('kingdom', TRUE);
        
        $DB1->select('*');
        if($dep_id != 0)
            $array = array('dep'=>$dep_id,'hospital'=>$hospital_id,'type'=>1);
        else
            $array = array('hospital'=>$hospital_id,'type'=>1);
        $DB1->where($array);
        $query = $DB1->get('all_defined');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->dep][$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    
    
    public function all_operation($hospital_id)
    {
        $DB1 = $this->load->database('kingdom', TRUE);
        
        $DB1->select('*');
        $array = array('hospital'=>$hospital_id);
        $DB1->where($array);
        $query = $DB1->get('all_defined');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    
    
    public function price($dep_id,$hospital_id)
    {
        $DB1 = $this->load->database('kingdom', TRUE);
        
        $DB1->select('*');
        $DB1->from('all_defined');
        $array = array('dep'=>$dep_id,'hospital'=>$hospital_id,'type'=>0);
        $DB1->where($array);
        $query = $DB1->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    
    public function delete($id){
        $DB1 = $this->load->database('kingdom', TRUE);
        $DB1->where('id',$id);
        $DB1->delete('operation');
    }
    
       
    public function payment($hospital_id,$fatora_num,$payment,$total,$id,$date,$paid,$other_medical){
        $DB1 = $this->load->database('kingdom', TRUE);
        
        $pay['patient_id'] = $id;
        $pay['hospital_id'] = $hospital_id;
        $pay['dep_id'] = 0;
        $pay['status'] = 0;
        $pay['fatora_num'] = $fatora_num;
        $pay['out_date'] = $date;
        $pay['other_medical']=$other_medical;
        $pay['paid_method'] = $this->input->post('paid_method');
        
            $pay['cash'] = $this->input->post('cash');
            $pay['atm'] = $this->input->post('atm');
            $pay['card'] = $this->input->post('card');
        
        $pay['total'] = $total+$paid;
        $pay['paid'] = $payment+$paid;
        $pay['remain'] = (($total+$paid) - ($payment+$paid));
        $pay['publisher'] = $_SESSION['user_id'];
        $pay['date'] = strtotime(date("Y/m/d"));;
        $pay['date_s'] = time();
        
        $DB1->insert('payment',$pay);
        
        $payment_id = $DB1->insert_id();
        
        return $payment_id;
    }
    
 
    
    public function income($hospital_id,$inout,$date_from,$date_to,$dep_id){
        
        $array = array('in/out'=>$inout,'out_date>='=>$date_from,'out_date<='=>$date_to);
        if($dep_id != 0)
            $array['dep_id'] = $dep_id;
        if($hospital_id != '')
            $array['hospital_id'] = $hospital_id;
        $array['status']=0;            
        
        $DB1 = $this->load->database('kingdom', TRUE);
        
        $DB1->select('operation.*,patient.a_name,patient.id AS p_id,patient.id_card,patient.mobile,patient.birth_date,patient.nationality');
        
        $DB1->join('patient','patient.id=operation.petient_id','left');
        
        $DB1->where($array);
        
        $query = $DB1->get('operation');
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id_card][] = $row;
                $data3[$row->out_date][$row->a_name][] = $row->paid;
            }
            return $data3;
        }
        return false;
    }
    
    public function income2($hospital_id,$date_from,$date_to){
        
        $DB1 = $this->load->database('kingdom', TRUE);
        
        $array = array('out_date>='=>$date_from,'out_date<='=>$date_to);
        if($hospital_id != '')
            $array['hospital_id'] = $hospital_id;
        
        $DB1->select('payment.*,patient.a_name,patient.id AS p_id,patient.id_card,patient.mobile,patient.birth_date,patient.nationality');
        
        $DB1->join('patient','patient.id=payment.patient_id','left');
        
        $DB1->where($array);
        
        $query = $DB1->get('payment');
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data3[$row->out_date][$row->a_name][] = $row->paid;
            }     
            return $data3;            
        }
        return false;
    }
    
    public function all_patient($hospital_id){
        
        $array = array('hospital_id'=>$hospital_id,'status'=>1);
        
        $DB1 = $this->load->database('kingdom', TRUE);
        
        $DB1->select('operation.*,patient.a_name');
        
        $DB1->group_by('petient_id');
        
        $DB1->join('patient','patient.id=operation.petient_id','left');
        
        $DB1->where($array);
        
        $query = $DB1->get('operation');
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data3[] = $row;
            }
            return $data3;
        }
        return false;
        
    }
    
    
    public function users($hospital_id){
        if($hospital_id == 0)
            $DB1 = $this->load->database('kingdom', TRUE);
        elseif($hospital_id == 2)
            $DB1 = $this->load->database('default', TRUE);
        elseif($hospital_id == 1)
            $DB1 = $this->load->database('panorama', TRUE);
        
        $DB1->select('*');
        $query = $DB1->get('users');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->user_id] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function fatora($hospital_id,$patient_id){
        $DB1 = $this->load->database('kingdom', TRUE);
        $array = array('hospital_id'=>$hospital_id,'patient_id'=>$patient_id);
        
        $DB1->select('*');
        $DB1->where($array);
        $query = $DB1->get('payment');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->fatora_num] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function fatora_detais($fatora_num){
        $DB1 = $this->load->database('kingdom', TRUE);
        $array = array('fatora_num'=>$fatora_num);
        
        $DB1->select('*');
        $DB1->order_by('id','ASC');
        $DB1->where($array);
        $query = $DB1->get('payment');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function delete_payment($id){
        $DB1 = $this->load->database('kingdom', TRUE);
        $DB1->where('id',$id);
        $DB1->delete('payment');
    }
    
    public function print_sanad_sarf($id){
        $DB1 = $this->load->database('kingdom', TRUE);
        
        $array = array('payment.id'=>$id);
        $DB1->select('payment.*,patient.a_name,patient.id AS p_id');
        $DB1->join('patient','patient.id=payment.patient_id','left');
        $DB1->where($array);
        $query = $DB1->get('payment');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
        
    }
    
    
    
    
    
       public function select_name($a_name)
    {
    
        /*
        $search_term="%".$search_term."%";
$sql="SELECT * FROM table WHERE field LIKE ? ";
$query=$this->db->query($sql,array($search_term));
$res=$query->result();
     $this->db->like('column', 'pattern');   
        */
        $DB1 = $this->load->database('kingdom', TRUE);
        $array = array('a_name'=>$a_name);

        $DB1->select('*');
        $DB1->order_by('id','ASC');
        $DB1->like('a_name',$a_name);
        //$this->db->like('title', $query, 'before');
        $query = $DB1->get('patient');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
        
        
    } 
    
     public function update_frist_payed($id,$first_paid){
    $DB1 = $this->load->database('kingdom', TRUE);
    $data['first_paid']=$first_paid;
    $DB1->where("id",$id);
    $DB1->update('operation',$data);
    
   } 
    
    //--------------------------------------------------------------//
    public function get_visits_beetween_dates_emp($from,$to,$emp)
    {
        $this->db->select('*');
        $this->db->from('permits');
        $this->db->where('date>=',$from);
        $this->db->where('date <= ',$to);
        $this->db->where('emp_code',$emp);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
    
    

 }