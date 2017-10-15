<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
    </span>
<div class="well bs-component">
    <fieldset>
        <legend></legend>


            <div class="row">
                <?php
                if(isset($result) && $result!=null && !empty($result)){
                    $out['debt_id']=$result[0]->debt_id;
                    $out['debt_date']=date('m-d-Y',$result[0]->debt_date);
                    $out['emp_id']=$result[0]->emp_id;
                    $out['value']=$result[0]->value;
                    $out['notes']=$result[0]->notes;
                    $out['administration']=$result[0]->emp_data->administration;
                    $out['department']=$result[0]->emp_data->department;
                    $out['input']='<input type="submit" role="button" name="UPDATE" value="تعديل" class="btn btn-primary">';
                    $out['form']='Administrative_affairs/UpdateEmployeesDebts/'.$result[0]->debt_id;
                    $out["desable"]='';
                    $out['hidden']='';
                }else{
                    $out['debt_date']="";
                    $out['value']="";
                    $out['notes']="";
                    $out['emp_id']="";
                    $out['administration']="";
                    $out['department']="";
                    $out["desable"]='';
                    $out['hidden']='';
                    if(isset($emp_data) && $emp_data!=null && !empty($emp_data) ){
                        $out['emp_id']=$emp_data['id'];
                        $out['administration']=$emp_data['administration'];
                        $out['department']=$emp_data['department'];
                        $out["desable"]='disabled="disabled"';
                        $out['hidden']='<input type="hidden" name="emp_id" value="'.$emp_data['id'].'" />';
                    }
                    $out['input']='<input type="submit" role="button" name="ADD" value="حفظ" class="btn btn-primary">';
                    $out['form']='Administrative_affairs/EmployeesDebts';
                }
                ?>
                <?php  echo form_open_multipart($out['form']);?>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">تاريخ اليوم</label>
                        <input type="date" name="debt_date" value="<?php echo $out['debt_date']?>" class="form-control" required="required"   placeholder="شهر / يوم / سنة ">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">القسم</label>
                        <select name="department" id="optionearea1" <? echo $out['desable'];?>  class="form-control"  onchange="return lood_emp($('#optionearea1').val());" required="required">
                            <option value="">إختر الإدارة أولا</option>
                            <?php   if(isset($emp_data) && $emp_data!=null && !empty($emp_data) || isset($result) ){
                                foreach ($departs as $one_row){
                                    $selected=''; if($one_row->id == $out['department']){$selected='selected="selected"';}  ?>
                                    <option value="<?php echo $one_row->id;?>" <?php echo $selected;?>   ><?php echo $one_row->name;?></option>
                                <?php  }
                            }?>
                        </select>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">قيمة السلفة</label>
                        <input type="number" class="form-control"  name="value" value="<?php echo $out["value"] ?>" />
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">الإدارة</label>
                        <select name="administration" id="administration" <? echo $out['desable'];?>   class="form-control" onchange="return lood_dep($('#administration').val());">
                            <option value="">إختر</option>
                            <?php if(!empty($admin)):
                                foreach ($admin as $record):
                                    $selected='';if($record->id == $out['administration']){$selected='selected="selected"';}
                                    ?>
                                    <option value="<? echo $record->id;?>" <? echo $selected;?>   ><? echo $record->name;?></option>
                                <?php  endforeach; endif;?>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">إسم الموظف</label>
                        <select name="emp_id" id="optionearea2" class="form-control" <? echo $out['desable'];?>  required="required" >
                            <option value="">إختر الادارة و القسم أولا</option>
                            <?php
                            if(isset($emp_data) && $emp_data!=null && !empty($emp_data) || isset($result) ){
                                foreach ($employees as $row):
                                    $select="";  if($row->id == $out['emp_id']){$select='selected="selected"';}?>
                                    <option value="<?php echo $row->id?>" <?php echo $select?>> <?php echo $row->employee?></option>
                                <?php  endforeach ;}?>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label"> ملاحظات</label>
                        <textarea class="r-textarea form-control"  name="notes"><? echo $out['notes'];?></textarea>
                    </div>
                </div>

            </div>

            <div class="form-group"  >
                <div class="col-xs-8 col-xs-pull-4">
                   <?php echo  $out['hidden']?>
                    <?php echo  $out['input']?>
                </div>
            </div>
            <br>

    </fieldset>
</div>

<?php if(isset($table)&& $table!=null && !empty($table)):?>

    <div  class="panel panel-default card-topline-red card lobipanel">
        <div class="panel-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>م</th>
                        <th class="text-center">اسم الموظف</th>
                        <th class="text-center">تاريخ السلفة </th>
                        <th class="text-center">قيمة السلفة</th>
                        <th class="text-center">الإجراء</th>
                        <th class="text-center">الحالة</th>
                        <th class="text-center">التفاصيل</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php
                    $a=1;
                    foreach ($table as $record ):
                        if($record->approved == 0){
                            $state="لم يتم الاجراء";
                            $button=' <a href="'.base_url().'Administrative_affairs'.$record->debt_id.'" 
                                     class="btn btn-danger btn-xs"><i class="fa fa-pencil"></i> حذف </a>
                         <a href="'.base_url().'Administrative_affairs/UpdateEmployeesDebts/'.$record->debt_id.'"
                          class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> تعديل</a>';
                        }
                        elseif($record->approved == 1){
                            $state="مقبولة";
                            $button='غير متاح';
                        }
                        elseif($record->approved ==2){
                            $state="مرفوضة";
                            $button='غير متاح';
                        }
                        ?>
                        <tr>
                            <td><?php echo $a ?></td>
                            <td><?php echo $record->emp_name ?></td>

                            <td><?php echo date("Y-m-d",$record->debt_date)  ?></td>
                            <td><?php echo $record->value?></td>
                            <td><?php echo $button?> </td>
                            <td><?php echo $state?> </td>
                            <td> <i class="fa fa-info" aria-hidden="true" data-toggle="modal" data-target="#Modal<?php echo $record->debt_id ?>"></i></td>

                            <!-- Modal -->
                            <div id="Modal<?php echo $record->debt_id ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">تفاصيل الطلب</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h4><b>اسم الموظف: </b></h4>
                                                </div>
                                                <div class="col-sm-8">
                                                    <h4><?php echo $record->emp_name ?></h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h4><b>تاريخ السلفة: </b></h4>
                                                </div>
                                                <div class="col-sm-8">
                                                    <h4><?php echo date("Y-m-d",$record->debt_date)  ?></h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h4><b>قيمة السلفة: </b></h4>
                                                </div>
                                                <div class="col-sm-8">
                                                    <h4><?php echo $record->value?></h4>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn manage-close-pop" data-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->





                        </tr>
                        <?php
                        $a++;
                    endforeach;  ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
<? endif; ?>

<script>
    function lood_dep(num){
        if(num>0 && num != '')
        {
            var id = num;
            var dataString = 'admin_num=' + id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Administrative_affairs/LoadPages',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea1").html(html);
                }
            });
            return false;
        }
    }
</script>
<script>
    function lood_emp(num){
        if(num>0 && num != '')
        {
            var id = num;
            var dataString = 'dep_num=' + id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Administrative_affairs/LoadPages',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea2").html(html);
                }
            });
            return false;
        }
    }
</script>

