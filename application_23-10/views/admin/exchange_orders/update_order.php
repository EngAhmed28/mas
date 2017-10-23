<div class="well bs-component"> 
<?php if(isset($table) && $table != null){ ?>
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
                        <th class="text-center">التحكم</th>
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
                                <td>
                                <a href="'.base_url().'Exchange_orders/index/'.$record->order_num.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</a>
    
                                <a  href="'.base_url().'Exchange_orders/delete/'.$record->order_num.'/index" onclick="return confirm(\'هل انت متأكد من عملية الحذف ؟\');"><i class="fa fa-trash" aria-hidden="true"></i> حذف</a>
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
    echo '<div class="alert alert-danger">لا توجد أوامر صرف</div>';
?>
</div>