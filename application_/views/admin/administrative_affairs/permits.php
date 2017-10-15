
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
        <?php if(isset($result)):?>
            <?php  echo form_open_multipart('Administrative_affairs/edit_permits/'.$result[0]->id)?>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">رقم الطلب</label>
            <input type="number" id="permit_num" name="permit_num" value="<?php echo $result[0]->permit_num; ?>" class="form-control text-left"  readonly/>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">التاريخ</label>
            <input type="date" name="date" value="<? echo date('Y-m-d',$result[0]->date);?>" class="form-control text-right" placeholder=" التاريخ " />
        </div>
    </div>


    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">الإسم</label>
            <input type="text" class="r-inner-h4 form-control" name="emp_code" value="<?if(!empty($select[$result[0]->emp_code][0]->employee)): echo  $select[$result[0]->emp_code][0]->employee ; endif;?>"  readonly>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">المسمي الوظيفي</label>
            <input type="text" class="r-inner-h4 form-control" name=""  readonly value="<? if(!empty($select[$result[0]->emp_code][0]->department)): echo $job_title[$select[$result[0]->emp_code][0]->department][0]->name; endif;?>">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">نوع الإذن</label>
            <select name="permit_type"  id="permit_type"  class="form-control">
                <?php if($result[0]->permit_type ==1){?>
                    <option value="1">صباحى</option>
                    <option value="2">مسائي</option>
                <?}elseif($result[0]->permit_type ==2){?>
                    <option value="2">مسائي</option>
                    <option value="1">صباحى</option>
                <?}?>
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label"> وقت الخروج</label>
            <input type="time"  id="time_out" name="time_out"  value="<? echo $result[0]->time_out;?>"   class="form-control text-right" placeholder="وقت الخروج" />
        </div>
    </div>


    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label"> وقت العودة</label>
            <input type="time"  id="time_return" name="time_return"  value="<? echo $result[0]->time_return;?>"  class="form-control text-right" placeholder=" وقت العودة" />
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">سبب الإذن</label>
            <br>
            <textarea class="form-control" style="" name="permit_reason"> <? echo $result[0]->permit_reason;?></textarea>
        </div>
    </div>



</div>

            <div class="form-group"  >
                <div class="col-xs-8 col-xs-pull-4">
                    <button  name="edit" value="حفظ" type="submit" class="btn btn-primary"> تعديل</button>
                </div>
            </div>
            <br>

        <?php echo form_close()?>
        <?php else: ?>
            <?php  echo form_open_multipart('Administrative_affairs/add_permits')?>
            <div class="row">


                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">رقم الطلب</label>
                        <input type="number" id="permit_num" name="permit_num" value="<?php echo ($last+1); ?>" readonly="readonly" class="form-control text-right" placeholder="رقم الطلب " />
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">التاريخ</label>
                        <input type="date" name="date" value="" class="form-control text-right" placeholder=" التاريخ " />
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">الإسم</label>
                        <input type="text" class="r-inner-h4 form-control" name="emp_code"
                               value="<?if(!empty($select[$_SESSION['emp_code']][0]->employee)): echo  $select[$_SESSION['emp_code']][0]->employee ; endif;?>"
                               readonly="" />
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">المسمي الوظيفي</label>
                        <input type="text" class="r-inner-h4 form-control" name=""  readonly value="<? if(!empty($select[$_SESSION['emp_code']][0]->department)): echo $job_title[$select[$_SESSION['emp_code']][0]->department][0]->name; endif;?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">نوع الإذن</label>
                        <select name="permit_type"  id="permit_type" class="form-control text-right" >
                            <option value="">إختر</option>
                            <option value="1">صباحى</option>
                            <option value="2">مسائي</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label"> وقت الخروج</label>
                        <input type="time"  id="time_out" name="time_out"   class="form-control text-right" placeholder="وقت الخروج" />
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label"> وقت العودة</label>
                        <input type="time"  id="time_return" name="time_return"   class="form-control text-right" placeholder=" وقت العودة" />
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">سبب الإذن</label>
                        <br>
                        <textarea class="form-control" style="" name="permit_reason"></textarea>
                    </div>
                </div>

            </div>

            <?php
            if(!empty($permits)){
                $perm_num=sizeof($permits);

                $ozon_num_max=$affairs_setting[0]->ozon_num;
                if( $perm_num < $ozon_num_max ){
                    $html_tag=' <button name="add" value="حفظ" type="submit" class="btn btn-primary">حفظ</button>';
                }elseif($perm_num > $ozon_num_max ){
                    $html_tag=' ';
                }elseif($perm_num == $ozon_num_max ){
                    $html_tag='';
                }

            }else{

                $html_tag='<input type="submit" role="button" name="add" value="حفظ" class="btn btn-primary">';

            }

            ?>
            <div class="form-group"  >
                <div class="col-xs-8 col-xs-pull-4">
                    <?php   echo $html_tag;?>
                </div>
            </div>
            <br>


            <?php echo form_close()?>
        <?php  endif;?>
    </fieldset>
    </div>

<?php if(isset($records)&&$records!=null):?>

<div  class="panel panel-default card-topline-red card lobipanel">
    <div class="panel-body">
        <div class="table-responsive">
            <table id="example" class=" display table table-bordered table-striped table-hover">
                <thead>
                <tr class="info">
                    <th class="text-center">م</th>
                    <th class="text-center">تاريخ اليوم</th>
                    <th class="text-center">نوع الإذن</th>
                    <th class="text-center">وقت الخروج</th>
                    <th class="text-center">وقت العودة</th>
                    <th class="text-center">التفاصيل</th>
                    <th class="text-center">الاجراء</th>
                </tr>
                </thead>
                <?php
                $a=1;
                foreach ($records as $record ):?>
                
                
<tr>
<td><?php echo $a ?></td>
<td><?echo date('Y-m-d',$record->date); ?></td>
<?php
if ($record->permit_type ==1){
echo'  <td >صباحى</td>';
}else{
echo'  <td >مسائي</td>';
}
?>
<td > <?php echo $record->time_out ?></td>
<td> <?php echo $record->time_return ?></td>
<td>
 <button type="button" style="width:100px" class="btn btn-info btn-xs " 
 data-toggle="modal" data-target="#myModal<?php echo $record->id?>"> التفاصيل </button></td>
<td> <a href="<?php echo base_url('Administrative_affairs/delete_permits').'/'.$record->id?>" 
 onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs "><i class="fa fa-trash"></i> حذف</a>

 </a>   <a href="<?php echo base_url('Administrative_affairs/edit_permits').'/'.$record->id ?>"  
 class="btn btn-warning btn-xs"> <i class="fa fa-pencil"></i> تعديل</a> 
        </a></td>
</tr>
                
                
                
                
                
                   <div class="modal fade" id="myModal<?php echo $record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" >
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">تفاصيل الأذن : ( <?if(!empty($select[$record->emp_code][0]->emp_name)): echo  $select[$record->emp_code][0]->emp_name ; endif;?>)</h4>
                                </div>
                                <div class="row" style="margin-right:10px">
                                    <div class="col-sm-3">
                                        <h5> إسم الموظف:</h5>
                                    </div>
                                    <div class="col-sm-9">
                                        <h5><?if(!empty($select[$record->emp_code][0]->emp_name)): echo  $select[$record->emp_code][0]->emp_name ; endif;?></h5>
                                    </div>
                                </div>

                                <div class="row" style="margin-right:10px">
                                    <div class="col-sm-3">
                                        <h5> تاريخ الطلب:</h5>
                                    </div>
                                    <div class="col-sm-9">
                                        <h5><? echo date('Y-m-d',$record->date); ?></h5>
                                    </div>
                                </div>

                                <div class="row" style="margin-right:10px">
                                    <div class="col-sm-3">
                                        <h5> وقت الخروج:</h5>
                                    </div>
                                    <div class="col-sm-9">
                                        <h5><? echo $record->time_out; ?></h5>
                                    </div>
                                </div>

                                <div class="row" style="margin-right:10px">
                                    <div class="col-sm-3">
                                        <h5> وقت العوده:</h5>
                                    </div>
                                    <div class="col-sm-9">
                                        <h5><? echo $record->time_return; ?></h5>
                                    </div>
                                </div>
                                <div class="row" style="margin-right:10px">
                                    <div class="col-sm-3">
                                        <h5> سبب الأذن:</h5>
                                    </div>
                                    <div class="col-sm-9">
                                        <h5><? echo $record->permit_reason; ?></h5>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
    function lood(num){
        if(num>0 && num != '')
        {
            var id = num;
            var dataString = 'admin_num=' + id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/Administrative_affairs/add_employee',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea1").html(html);
                }
            });
            return false;
        }
        else
        {
            $("#vid_num").val('');
            $("#optionearea1").html('');
        }
    }
</script>

<script>
    $(document).ready(function () {
        $('#contract_id').hide();
    });

    function go(valu) {
        if(valu === '0'){
            $('#contract_id').show();
        }else{
            $('#contract_id').hide();
        }

    }
</script>

