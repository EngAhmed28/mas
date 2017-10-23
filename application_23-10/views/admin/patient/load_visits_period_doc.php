<?php if(isset($records)&&$records!=null):?>
          <div class="visible-print ">
              <div class="col-xs-4">
              
                        <img src="<?php echo base_url();?>asisst/img/logo_sanad.png" />
                    </div>
                <div class="col-xs-12">
                    <h4>مجموعه بانوراما الطبية  </h4>
                </div>
                
            </div>

    <div style="float:left" >
        <button onclick="window.print();" class="btn btn-sm  btn-success hidden-print" > <span class="glyphicon glyphicon-print"></span> طبـاعه </button>
    </div>

    <table id="example" class="table table-bordered display" role="table">
        <thead>
        <tr>
            <th width="2%">#</th>
            <th  class="text-right">إسم العميل</th>
            <th class="text-right">التاريخ</th>
            <th class="text-right">القسم</th>
            <th class="text-right">العملية</th>
            <th class="text-right">السعر بعد الخصم</th>
            <th class="text-right">الكمية</th>
            <th class="text-right">الخصم</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for($x = 0 ; $x < count($records) ; $x++){
            $totalTickets = array_sum(array_map("count", $records[key($records)]));
            $total = 0;
            $total2 = 0;
            $total3 = 0;
            $discount = 0;
            $payment = 0;
        $remain=0;
        $ppaid = 0;
        $medical_other=0;
        $first_paid=0; ?>
            <tr>
                <td rowspan="<?php echo ((count($records[key($records)], COUNT_RECURSIVE)-count($records[key($records)]))-$totalTickets) ?>">
                <span class="badge"><?php echo ($x+1); ?></span></td>
                
                <td rowspan="<?php echo ((count($records[key($records)], COUNT_RECURSIVE)-count($records[key($records)]))-$totalTickets) ?>">
                <?php echo key($records) ?>
                </td>
                
                <?php 
                
for($a = 0 ; $a < count($records[key($records)]) ; $a++){
echo '<td rowspan="'.(count($records[key($records)][key($records[key($records)])], COUNT_RECURSIVE)-count($records[key($records)][key($records[key($records)])])).'">
        '.key($records[key($records)]).'
        </td>';
for($r = 0 ; $r < count($records[key($records)][key($records[key($records)])]) ; $r++){
echo '<td rowspan="'.(count($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])])).'">
        '.$departs[key($records[key($records)][key($records[key($records)])])]->dep_name.'
        </td>';
$diss = 0;
$check = 0;
for($z = 0 ; $z < count($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])]) ; $z++)
{
$diss = $records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->discount;
if($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->status == 1 && $check == 0)
{
            $DB1 = $this->load->database('kingdom', TRUE);
            $DB1->select('*');
            $array = array('hospital_id'=>2,
            'patient_id'=>$records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->p_id,
            'out_date'=>$records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->out_date,
            'fatora_num'=>$records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->fatora_num);
            $DB1->where($array);
            $query = $DB1->get('payment');
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row)
                   // $payment = (($row->operation_price * $row->opretion_amuont  ) - $row->discount_op);
                    $payment = (($row->paid ));
                $medical_other = $row->other_medical;
                $remain =  $row->remain;
                $ppaid = $row->paid;
            }
   $final_paid = ($payment + $records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->first_paid );
    $check = 1;
}
if($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->status == 0){
    $check = 0;
}
echo '
<!--
<td  data-title="">
      '.$records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->out_date.'
      </td-->
      <td  data-title="">
      '.$operations[$records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->operation_id]->operation.'
      </td>
<!--
      <td  data-title="">
      '.$publisher[$records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->publisher]->user_username.'
      </td>
-->
      <td  data-title="">
    '.(($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->operation_price *
            $records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->opretion_amuont
        ) - $records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->discount_op ).'      </td>
      <td  data-title="">
      '.$records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->opretion_amuont.'
      </td>
      <td  data-title="">
      '.$records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->discount_op.'
      </td>
    </tr>';
      $total +=
          (($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->operation_price *
                  $records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->opretion_amuont
              )-
              $records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->discount_op
          )
          ;
      $total2 += $records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->id;
    if($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->status == 0)
        $total3 += $records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->paid;
    else
        $total3 +=$payment;
    $payment = 0;
    $first_paid = $records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->first_paid;
    /*  if($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->status == 0)
            $total3 += ($payment + $records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->first_paid   );
      else
          $total3 +=$payment;
    $payment = 0;*/
}
next($records[key($records)][key($records[key($records)])]);
}
next($records[key($records)]);
}
                echo '
<tr class="text-center warning">
<td colspan="2">مدفوع مقدما </td>
<td colspan="">'.$first_paid.'</td>
<td colspan="">علاجات أخري</td>
<td colspan="">'.$medical_other.'</td>
<td colspan="2">المدفوع</td>
<td colspan="1">'.$final_paid.'</td>
<!--
 <td colspan="1">لمدفوع</td>
<td colspan="2">\'.$pay.\'</td>
 -->
</tr>
<tr class="text-center warning">
<td colspan="2"> الإجمـــــالــــي</td>
<td colspan="">'.$total.'</td>
<td colspan=""> إجمالي المدفوع</td>
<td colspan="">'.$final_paid.'</td>
<td colspan="2"> إجمالي المتبقي</td>
<td>'.(($total + $medical_other) - ($ppaid + $first_paid ) ).'</td>
<!--
<td colspan="">'.(($total + $medical_other) - ($ppaid + $first_paid ) ).'</td>
(($total + $medical_other) - ($payment + $first_paid ) )
-->
</tr>
<!--
<td class="text-center info" colspan="5">الإجمـــــالــــي</td>
                <td class="text-right info" colspan="2">'.$total2.'</td>
                <td class="text-right info" colspan="">'.$total.'</td>
                <td class="text-right info">'.$total3.'</td>
                </tr>
                -->
                ';
                next($records);
                } ?>
        </tbody>
    </table>
    
<?php 
else:
echo '<div class="alert alert-danger alert-dismissible" role="alert" style="width: 100%;margin-top: 60px">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>تنبية!</strong> لا توجد زيارات
</div>';
endif;?>