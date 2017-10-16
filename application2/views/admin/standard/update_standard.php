<div class="well bs-component"> 
<?php
if(isset($table) && $table != null){ ?>
<div class="col-xs-12 r-secret-table">
    <div class="panel-body">
        <div class="fade in active">
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">م</th>
                        <th class="text-center">إسم المنبع</th>
                        <th class="text-center">التفاصيل</th>
                        <th class="text-center">التحكم</th>
                    </tr>
                </thead>
                <tbody class="text-center">
               
                <?php
                for($x = 0 ; $x < count($table) ; $x++){
                    echo '<tr>
                            <td>'.($x+1).'</td>
                            <td>'.$products[key($table)]->p_name.'</td>
                            <td>
                                <button type="button" class="btn btn-info btn-xs col-lg-12" data-toggle="modal" data-target="#myModal'.key($table).'"><span><i class="fa fa-"></i></span> عرض التفاصيل </button>
                            </td>
                            <td>
                            <a href="'.base_url().'Products/standard/'.key($table).'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</a>

                            <a  href="'.base_url().'Products/delete_standard/'.key($table).'" onclick="return confirm(\'هل انت متأكد من عملية الحذف ؟\');"><i class="fa fa-trash" aria-hidden="true"></i> حذف</a>
                            </td>
                          </tr>';
                    next($table);
                } 
                ?>   
                </tbody>
            </table>
            <?php
            reset($table);
            for($z = 0 ; $z < count($table) ; $z++){
                echo '<div class="modal fade" id="myModal'.key($table).'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close store-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel"> الأصناف التي تدخل في تركيب المنبع ('.$products[key($table)]->p_name.')</h4>
                                </div>
                                <div class="row" style="width:550px;margin-right:15px">
                                    <table  class="table table-bordered" >
                                    <thead>
                                        <tr>
                                            <th class="text-right">م</th>
                                            <th class="text-right">إسم الصنف</th>
                                            <th class="text-right">الوحدة</th>
                                            <th class="text-right">الكمية</th>
                                        </tr>
                                    </thead>';
                for($x = 0 ; $x < count($table[key($table)]) ; $x++){
                    echo '<tr>
                            <td>'.($x+1).'</td>
                            <td>'.$products[$table[key($table)][$x]->product_sub_code_fk]->p_name.'</td>
                            <td>'.$units[$products[$table[key($table)][$x]->product_sub_code_fk]->p_unit_fk]->unit_name.'</td>
                            <td>'.$table[key($table)][$x]->product_sub_amount.'</td>
                          </tr>';
                }
                echo '</table>
                         </div>
                            <div class="modal-footer">
                                <button type="button " class="btn btn-default  store-btn1" data-dismiss="modal">إغلاق</button>
                            </div>
                         </div>
                    </div>
                </div>';
                next($table); 
            }
            
            ?>
    </div>
</div>
</div>
<?php } ?>
</div>