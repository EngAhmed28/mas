
<ul class="breadcrumb pb30">

    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> التقارير </a></li>



    <li class="active"><?php echo $title; ?></li>

</ul>

<span id="message">

<?php

if(isset($_SESSION['message']))

    echo $_SESSION['message'];

unset($_SESSION['message']);


?>
    </span>


<div class="well bs-component" >

 <fieldset>

           

<?php if(isset($records5) && $records5 != null){ 
    //var_dump($records5); ?>
     
     <table  class="table table-bordered" role="table">

        <thead>

        <tr>

            <th class="text-right" width="10%">#</th>

            <th width="25%" class="text-right">إسم المريض</th>
            
            <th width="25%" class="text-right">الجوال</th>

            <th width="16%" class="text-right">المبلغ المدفوع</th>
            
            <!--th  class="text-right">القسم</th -->

        </tr>

        </thead>
        <tbody>
            
            <tr>
            <?php
            
            $total3 = 0;
            for($b = 0 ; $b < count($records5) ; $b++){
                $val = 0;
                $pay2 = 0;
                echo '<tr>
                      <td>'.($b+1).'</td>
                      <td>'.$records5[key($records5)][key($records5[key($records5)])][0]->a_name.'</td>
                      <td>'.$records5[key($records5)][key($records5[key($records5)])][0]->mobile.'</td>';
                      
                for($a = 0 ; $a < count($records5[key($records5)]) ; $a++){
                    for($z = 0 ; $z < count($records5[key($records5)][key($records5[key($records5)])]) ; $z++){
                        if($records5[key($records5)][key($records5[key($records5)])][$z]->status == 0)
                                $val += $records5[key($records5)][key($records5[key($records5)])][$z]->paid;
                        else{
                            $DB1 = $this->load->database('kingdom', TRUE);
                            $h = $DB1->get_where('payment',array(
                                                 'patient_id'=>$records5[key($records5)][key($records5[key($records5)])][$z]->p_id,
                                                 'hospital_id'=>2,
                                                 'out_date'=>date("Y-m-d"),
                                                 'fatora_num'=>$records5[key($records5)][key($records5[key($records5)])][$z]->fatora_num));
                            $pay = $h->row_array();
                            $pay2 = $pay['paid'];
                        }
                        next($records5[key($records5)][key($records5[key($records5)])]);
                    }
                    $val += $pay2;
                    $pay2 = 0;
                    next($records5[key($records5)]);
                }
                    
                echo '<td>'.sprintf('%.2f',$val).'</td>
                      </tr>';
                next($records5);
                $total3 += $val;
            }
            echo '<tr class="alert alert-success">
                  <td colspan="3">الإجمـــــالي</td>
                  <td>'.sprintf('%.2f',$total3).'</td>
                  </tr>';
            
            ?>
                
            </tr>
        
        </tbody>
     
     </table>
     
     <?php }else {?>
    
        <?php echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
  <strong>تنبية!</strong> لا توجد كشوفات حصلت بتاريخ اليوم
</div>'; } 

?>
     
</fieldset>
</div>
