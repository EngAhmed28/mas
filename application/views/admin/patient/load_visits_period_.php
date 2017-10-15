<?php if(isset($records)&&$records!=null){
?>



    <table id="no-more-tables" class="table table-bordered" role="table">

        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>لوحة التحكم في الإدارة.</p></caption>

        <thead>

        <tr>

            <th width="2%">#</th>

            <th  class="text-right">إسم العميل</th>

            <th class="text-right">التاريخ</th>
            
            <th class="text-right">القسم</th>
            
            <!--th class="text-right">تاريخ الخروج</th-->
            
            <th class="text-right">العملية</th>
            
            <th class="text-right">قام بالنشر</th>
            
            <th class="text-right">السعر</th>
            
            <th class="text-right">الخصم</th>
            
            <th class="text-right">السعر بعد الخصم</th>
            
            <th class="text-right">المدفوع</th>

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
            
            ?>
       
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
                            
                    echo '<td rowspan="'.count($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])]).'">
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
                                        $payment = $row->paid;
                                }
                        $pay = '<td  data-title="">'.$payment.'</td>';
                        $check = 1;
                    }
                    if($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->status == 0){
                        $check = 0;
                        $pay = '<td  data-title="">'.
                                $records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->paid.
                                '</td>';
                    }
                    
                    echo '<!--td  data-title="">
                          '.$records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->out_date.'
                          </td-->
                          
                          <td  data-title="">
                          '.$operations[$records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->operation_id]->operation.'
                          </td>
                          
                          <td  data-title="">
                          '.$publisher[$records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->publisher]->user_username.'
                          </td>
                          
                          <td  data-title="">
                          '.$records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->operation_price.'
                          </td>
                          
                          <td  data-title="">
                          '.$records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->discount.' %
                          </td>
                
                          <td  data-title="">
                          '.$records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->paid.'
                          </td>
                          
                          '.$pay.'</tr>';
                          
                          $total += $records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->paid;
                          $total2 += $records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->operation_price;
                          
                          if($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->status == 0)
                                $total3 += $records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][$z]->paid;
                          else
                                $total3 +=$payment;
                          $payment = 0;
                }
                
                next($records[key($records)][key($records[key($records)])]);
                    
                }
                
                next($records[key($records)]);
                
                }
                echo '<td class="text-center info" colspan="6">الإجمـــــالــــي</td>
                <td class="text-right info" colspan="2">'.$total2.'</td>
                <td class="text-right info" colspan="">'.$total.'</td>
                <td class="text-right info">'.$total3.'</td>
                </tr>';
                next($records);
                } ?>

        </tbody>

    </table>

<?php 
 }
else
echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>تنبية!</strong> لا توجد زيارات تمت خلال تلك الفترة
</div>';

?>

