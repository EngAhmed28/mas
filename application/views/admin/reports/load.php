<div class="well bs-component"> 
<?php
if(isset($_POST['form_date']) && isset($_POST['to_date']) &&  isset($_POST['type'])){
    if($_POST['type'] == 1){ 
        if(isset($table) && $table != null){
?>
    <div class="col-xs-12 r-secret-table">
        <div class="panel-body">
            <div class="fade in active">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">م</th>
                        <th class="text-center">رقم الفاتورة</th>
                        <th class="text-center">تاريخ الفاتورة</th>
                        <th class="text-center">الاجمالي</th>
                        <th class="text-center">تفاصيل الفاتورة </th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php
                    $x = 0;
                    foreach($table as $record){
                        echo '<tr>
                              <td>'.($x+1).'</td>
                              <td>'.$record->fatora_code.'</td>
                              <td>'.date("Y-m-d",$record->fatora_date).'</td>
                              <td>'.$record->fatora_cost.'</td>
                              <td>
                              <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal'.$record->fatora_code.'"><span class="glyphicon glyphicon-list"></span> تفاصيل الفاتورة </button> 
                              </td>
                              </tr>';
                        $x++;
                    }
                    ?>
                    </tbody>
                </table>
                <?php 
                for($x = 0 ; $x < count($details) ; $x++){
                    echo '<div class="modal fade" id="myModal'.key($details).'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content" >
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h5 class="modal-title">تفاصيل فاتورة رقم ('.key($details).') , 
                                        المورد : '.$suppliers[$details[key($details)][0]->supplier_code]->name.'</h5>
                                    </div>
                                    <div class="row" style="width:550px;margin-right:15px">
                                        <table  class="table table-bordered" ">
                                            <thead>
                                                <tr>
                                                    <th class="text-right">مسلسل</th>
                                                    <th class="text-right">إسم الصنف</th>
                                                    <th class="text-right">الكمية</th>
                                                    <th class="text-right">السعر</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                    $total = 0;
                    for($z = 0 ; $z < count($details[key($details)]) ; $z++){
                        echo '<tr>
                                <td>'.($z+1).'</td>
                                <td>'.$all_asnaf[$details[key($details)][$z]->product_code]->p_name.'</td>
                                <td>'.$details[key($details)][$z]->amount_buy.'</td>
                                <td>'.$details[key($details)][$z]->all_cost_buy.'</td>
                              </tr>';
                        $total += $details[key($details)][$z]->all_cost_buy;
                    }
                    echo '                      <tr>
                                                    <td colspan="3">الإجمالي</td>
                                                    <td>'.$total.'</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>';  
                    next($details);                 
                }
                ?>
            </div>
        </div>
    </div>
<?php 
        }
        else
            echo '<div class="alert alert-danger">لا توجد فواتير مشتريات خلال تلك الفترة</div>';
    }
    elseif($_POST['type'] == 2){
        if(isset($table) && $table != null){
?>
    <div class="col-xs-12 r-secret-table">
        <div class="panel-body">
            <div class="fade in active">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">م</th>
                        <th class="text-center">التاريخ</th>
                        <th class="text-center">رقم أمر التوريد</th>
                        <th class="text-center">التفاصيل</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                       
                    <?php
                    $x = 1;
                    foreach($table as $record){
                        echo '<tr>
                                <td>'.($x++).'</td>
                                <td>'.date("Y-m-d",$record->date).'</td>
                                <td>'.$record->order_num.'</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal'.$record->id.'"><span class="glyphicon glyphicon-list"></span> عرض التفاصيل </button> 
                                </td>
                              </tr>';
                    } 
                    ?>   
                       
                    </tbody>
                </table>
                <?php
                foreach($table as $record){
                    echo '<div class="modal fade" id="myModal'.$record->id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close store-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel"> جدول الأصناف</h4>
                                    </div>
                                    <div class="modal-body">
                                         <div class="col-md-12 col-sm-12 col-xs-12">
                
                                            <div class="col-xs-2">
                                                <h5 class="r-h4">التاريخ:</h5>
                                            </div>
                                            
                                            <div class="col-xs-2 r-input">
                                                <label style="padding-top:6px">'.date("Y-m-d",$record->date).'</label>
                                            </div>
                                            
                                            <div class="col-xs-2">
                                                <h5 class="r-h4">المورد:</h5>
                                            </div>
                                            
                                            <div class="col-xs-2 r-input">
                                                <label style="padding-top:6px">'.$donors[$record->donar_id_fk]->name.'</label>
                                            </div>
                                            
                                            <div class="col-xs-2">
                                                <h5 class="r-h4">رقم التوريد:</h5>
                                            </div>
                                            
                                            <div class="col-xs-2 r-input">
                                                <label style="padding-top:6px">'.$record->order_num.'</label>
                                            </div>
                                        </div>
                                        <br /><br /><br />
                                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <tr>
                                                <th>م</th>
                                                <th>إسم الصنف</th>
                                                <th>الوحدة</th>
                                                <th>الكمية</th>
                                                <th>الإجمالي</th>
                                            </tr>';
                    $total = 0;
                    for($x = 0 ; $x < count($items[$record->order_num]) ; $x++){
                        echo '<tr>
                                <td>'.($x+1).'</td>
                                <td>'.$products[$items[$record->order_num][$x]->product_code_fk]->p_name.'</td>
                                <td>'.$units[$items[$record->order_num][$x]->product_unite]->unit_name.'</td>
                                <td>'.$items[$record->order_num][$x]->product_amount.'</td>
                                <td>'.sprintf("%.2f",$items[$record->order_num][$x]->all_cost_exchange).'</td>
                              </tr>';
                        $total += $items[$record->order_num][$x]->all_cost_exchange;
                    }
                                            
                    echo '          <tr>
                                        <td colspan="4">الإجمالي</td>
                                        <td>'.sprintf("%.2f",$total).'</td>
                                    </tr>  
                           </table>
                                </div>
                                    <div class="modal-footer">
                                        <button type="button " class="btn btn-default  store-btn1" data-dismiss="modal">إغلاق</button>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
                ?>
            </div>
        </div>
    </div>
<?php 
        }
        else
            echo '<div class="alert alert-danger">لا توجد مصروفات خلال تلك الفترة</div>';
    }
    elseif($_POST['type'] == 3){
        if(isset($records) && $records != null){
?>
    <div class="col-xs-12 r-secret-table">
        <div class="panel-body">
            <div class="fade in active">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-right">م</th>
                            <th class="text-right">تالايخ اليوم</th>
                            <th class="text-right">أسم المنتج</th>
                            <th class="text-right">الكمية</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    foreach ($records as $record):
                        $x=0;
                    ?>
                        <tr>
                            <td><?php echo ++$x;?></td>
                            <td> <?php echo date("Y-m-d", $record->date);?></td>
                            <td><?php echo $products[$record->product_main_code_fk]->p_name?></td>
                            <td><?php echo $record->product_main_amount; ?></td>
                        </tr>
                     <?php endforeach; ?>
                     </tbody>
                </table>
            </div>
        </div>
     </div>
<?php
        }
        else
            echo '<div class="alert alert-danger">لا توجد أوامر تشغيل خلال تلك الفترة</div>';
    }
}
?>
</div>