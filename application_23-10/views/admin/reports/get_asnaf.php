<div class="well bs-component"> 
<?php //if(isset($final) && $final != null){ ?>
    <div class="col-xs-12 r-inner-details">
        <div class="panel-body">
            <div class="fade in active">
              <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                 <thead>
                        <tr>
                            <th class="text-center" rowspan="2">م</th>
                            <th class="text-center" rowspan="2">التاريخ</th>
                            <th class="text-center" rowspan="2">الشرح</th>
                            <th class="text-center" rowspan="2">مشتريات</th>
                            <th class="text-center" rowspan="2">تشغيل</th>
                            <th class="text-center" rowspan="2">صرف</th>
                            <th class="text-center" rowspan="2">رصيد</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                       
                    <?php
                    $s = 1;
                    $total = $sanf[0]->p_past_amount;
                    echo '<tr>
                            <td>'.($s++).'</td>
                            <td>-</td>
                            <td>رصيد أول</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>'.$sanf[0]->p_past_amount.'</td>
                          </tr>';

                    for($x = 0 ; $x < count($final) ; $x++){
                      if($sanf[0]->p_type_fk == 1)
                        $total += $final[key($final)]->purchses - $final[key($final)]->exchange - $final[key($final)]->production;
                      else
                        $total += $final[key($final)]->purchses - $final[key($final)]->exchange + $final[key($final)]->production;
                      echo '<tr>
                              <td>'.($s++).'</td>
                              <td>'.date("Y-m-d",key($final)).'</td>
                              <td>-</td>
                              <td>'.$final[key($final)]->purchses.'</td>
                              <td>'.$final[key($final)]->production.'</td>
                              <td>'.$final[key($final)]->exchange.'</td>
                              <td>'.$total.'</td>
                            </tr>';
                      next($final);
                    }
                    ?>   
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  <?php 
  //}
  //else
    //echo "<div class="alert alert-danger">لا توجد حركات لهذا الصنف</div>";
  ?>
</div>          