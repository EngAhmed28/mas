<h2 class="text-flat">إدارة التقارير <span class="text-sm"><?php echo $title; ?></span></h2>

<ul class="breadcrumb pb30">

    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>



    <li class="active"><?php echo $title; ?></li>

</ul>

<?php if(isset($records)&&$records!=null):?>



    <table id="no-more-tables" class="table table-bordered" role="table">

        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>لوحة التحكم في الإدارة.</p></caption>

        <thead>

        <tr>

            <th width="2%">#</th>

            <th  class="text-right">إسم العميل</th>

            <th class="text-right">تاريخ الدخول</th>
            
            <th class="text-right">القسم</th>
            
            <th class="text-right">تاريخ الخروج</th>
            
            <th class="text-right">العملية</th>
            
            <th class="text-right">السعر</th>
            
            <th class="text-right">الخصم</th>
            
            <th class="text-right">السعر بعد الخصم</th>
            
            <th class="text-right">المدفوع</th>

        </tr>

        </thead>
        <tbody>
        <?php 
        
        
        for($x = 0 ; $x < count($records) ; $x++){ 
            
            $totalTickets = array_sum(array_map("count", $records));
            $totalTickets2 = array_sum(array_map("count", $records[key($records)]));
            //$totalTickets3 = array_sum(array_map("count", $records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])]));
            $total = 0;
            $total2 = 0;
            $discount = 0;
            $payment = 0;
            
var_dump(count($records[key($records)][key($records[key($records)])], COUNT_RECURSIVE)
-array_sum(array_map("count", $records[key($records)][key($records[key($records)])]))
-count($records[key($records)][key($records[key($records)])])
);
 ?>
       
            <tr>
                <td rowspan="<?php echo ((count($records[key($records)], COUNT_RECURSIVE)-count($records[key($records)]))-$totalTickets-$totalTickets2) ?>">
                <span class="badge"><?php echo ($x+1); ?></span></td>
                
                <td rowspan="<?php echo ((count($records[key($records)], COUNT_RECURSIVE)-count($records[key($records)]))-$totalTickets-$totalTickets2) ?>">
                <?php echo key($records) ?>
                </td>
                
                <?php 
                
                for($a = 0 ; $a < count($records[key($records)]) ; $a++){
                    
                    $col = count($records[key($records)][key($records[key($records)])], COUNT_RECURSIVE)
-count($records[key($records)][key($records[key($records)])])
-array_sum(array_map("count", $records[key($records)][key($records[key($records)])]));
                    
                    echo '<td rowspan="'.$col.'">
                            '.key($records[key($records)]).'
                            </td>';
                    
                    for($r = 0 ; $r < count($records[key($records)][key($records[key($records)])]) ; $r++){
                    
                    $col2 = count($records[key($records)][key($records[key($records)])], COUNT_RECURSIVE)
-count($records[key($records)][key($records[key($records)])])
-array_sum(array_map("count", $records[key($records)][key($records[key($records)])]));
                      
                    echo '<td rowspan="'.$col2.'">
                            '.$departs[key($records[key($records)][key($records[key($records)])])]->dep_name.'
                            </td>';
                            
                    $diss = 0;
                    
                    for($s = 0 ; $s < count($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])]) ; $s++)
                    {
                        
                    echo '<td rowspan="'.count($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][key($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])])]).'">
                            '.key($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])]).'
                            </td>';
                
                for($z = 0 ; $z < count($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][key($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])])]) ; $z++)
                {
                    $diss = $records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][key($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])])][$z]->discount;
                    $pay = '<td  data-title="">'.
                            $records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][key($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])])][$z]->paid.
                            '</td>';
                    
                    if($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][key($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])])][$z]->status == 1 && $z > 0)
                    {
                        if($z == 1){
                                $DB1 = $this->load->database('kingdom', TRUE);
                                $DB1->select('*');
                                $array = array('hospital_id'=>2,
                                'patient_id'=>$records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][key($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])])][$z]->p_id,
                                'out_date'=>$records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][key($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])])][$z]->out_date);
                                $DB1->where($array);
                                $query = $DB1->get('payment');
                                if ($query->num_rows() > 0) {
                                    foreach ($query->result() as $row)
                                        $payment += $row->paid;
                                }
                                $payment += $records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][key($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])])][0]->paid;
                        }
                        $pay = '<td  data-title="">جزئي</td>';
                    }
                    
                    echo '<!--td  data-title="">
                          '.$records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][key($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])])][$z]->out_date.'
                          </td-->
                          
                          <td  data-title="">
                          '.$operations[$records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][key($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])])][$z]->operation_id]->operation.'
                          </td>
                          
                          <td  data-title="">
                          '.$records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][key($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])])][$z]->operation_price.'
                          </td>
                          
                          <td  data-title="">
                          '.$records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][key($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])])][$z]->discount.' %
                          </td>
                
                          <td  data-title="">
                          '.$records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][key($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])])][$z]->paid.'
                          </td>
                          
                          
                          '.$pay.'
                          
                          
                          </tr>';
                          
                          $total += $records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][key($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])])][$z]->paid;
                          $total2 += $records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][key($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])])][$z]->operation_price;
                          
                          if($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])][key($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])])][$z]->status == 0)
                                $payment = $total;
                }
                
                next($records[key($records)][key($records[key($records)])][key($records[key($records)][key($records[key($records)])])]);
                }//
                
                next($records[key($records)][key($records[key($records)])]);
                    
                }
                
                next($records[key($records)]);
                
                }
                echo '<tr>
                    <td class="text-center info" colspan="6">الإجمـــــالــــي</td>
                    <td class="text-right info" colspan="2">'.$total2.'</td>
                    <td class="text-right info" colspan="">'.$total.'</td>
                    <td class="text-right info">'.$payment.'</td>
                    </tr>';
                next($records);
                } ?>

        </tbody>

    </table>

    

<?php 
else:
echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>تنبية!</strong> لا توجد زيارات
</div>';
endif;?>

