<?php
class Search{

    public function fatora_doc_bymonth($re_doc_id){
        $mon=date("m",time());
        $arr =array('month(`operation_date`)'=>$mon);
        $DB1 = $this->load->database('kingdom', TRUE);
        $DB1->select("*");
        $DB1->from("operation");
        $DB1->where("hospital_id",2);
        $DB1->where($arr);
        $DB1->where("re_doc_id",$re_doc_id);
        $DB1->group_by("fatora_num");
        $parent = $DB1->get();
        $categories = $parent->result();
        $total_pay=0;
        foreach($categories as $p_cat){
            $total_pay += $this->sum_fatora($p_cat->fatora_num );

        }
        return $total_pay;

    }



    public function  sum_fatora($fatora_num){
        $DB1 = $this->load->database('kingdom', TRUE);
        $DB1->select("*");
        $DB1->from("payment");
        $DB1->where("hospital_id",2);
        $DB1->where("fatora_num",$fatora_num);
        $query = $DB1->get();
        $total_pay=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $total_pay += $row->paid;
            }
            return $total_pay;
        }
        return 0;
    }










}