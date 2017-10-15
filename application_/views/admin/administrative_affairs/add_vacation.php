

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
        <?php  if(isset($result)):?>
            <?php  echo form_open_multipart('Administrative_affairs/update_vacation/'.$result['id'])?>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">الإدارة </label>
                        <select name="main_dep_f_id" id="main_dep_f_id"  class="form-control"  disabled>
                            <option value="">إختر</option>
                            <?php if(!empty($admin)):
                                foreach ($admin as $record):
                                    $sect='';
                                    if( $result[0]->administration ==$record->id ){
                                        $sect ='selected';
                                    }
                                    ?>
                                    <option value="<? echo $record->id;?>" <? echo $sect;?>><? echo $record->name;?></option>
                                <?php  endforeach; endif;?>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">الموظف</label>
                        <select name="emp_id" id="emp_id"   class="form-control" disabled  >
                            <option value="">إختر</option>
                            <?php if(!empty($all_empolyees[$employ_name[$result['emp_id']][0]->administration])):
                                foreach ($all_empolyees[$employ_name[$result['emp_id']][0]->administration] as $records):
                                    $select ='';

                                    if($result['emp_id'] ==  $records->id ){
                                        $select ='selected';
                                    }
                                    ?>
                                    <option value="<? echo $records->id;?>" <? echo $select;?>><? echo $records->employee;?></option>
                                <?php  endforeach; endif;?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">نوع الأجازة</label>
                        <select name="vacation_id"  id="vacation_id" class="form-control" required >
                            <?php $vacation=array('إختر','أجازة سنوية','أجازة مرضية','أجازة بدون أجر');
                            for($a=0;$a<sizeof($vacation);$a++):

                                $select='';
                                if($a ==$result['vacation_id']){
                                    $select='selected';
                                }
                                ?>
                                <option value="<? echo $a; ?>" <? echo $select;?>><? echo $vacation[$a]; ?></option>
                            <? endfor ?>

                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">من</label>
                        <input type="text" class="form-control docs-date"   name="from_date" placeholder="شهر / يوم / سنة " value="<? echo $result['from_date'];?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label"> إلي </label>
                        <input type="text" class="form-control docs-date"   name="to_date" placeholder="شهر / يوم / سنة " value="<? echo $result['to_date'];?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">التأشيره المطلوبة</label>
                        <textarea class="form-control"  name="visa"><? echo $result['visa'];?></textarea>
                    </div>
                </div>



                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">الموظف القائم بالعمل </label>
                        <select name="emp_assigned_id"  required id="emp_assigned_id" class="form-control"   >
                            <option value="">إختر </option>
                            <?php
                            if(!empty($all_empolyees[$employ_name[$result['emp_id']][0]->administration])):
                                foreach($all_empolyees[$employ_name[$result['emp_id']][0]->administration] as $record):
                                    $select ='';
                                    if($record->id == $result['emp_id']){
                                        continue;
                                    }
                                    if($record->id == $result['emp_assigned_id']){
                                        $select ='selected';
                                    }
                                    ?>
                                    <option value="<? echo $record->id;?>" <? echo $select;?>><? echo $record->employee;?></option>
                                <? endforeach; endif;?>
                        </select>
                    </div>
                </div>

                <div class="form-group"  >
                    <div class="col-xs-8 col-xs-pull-4">
                        <button name="update" value="حفظ" type="submit" class="btn btn-primary">تعديل</button>
                    </div>
                </div>


            </div>
            <br>
            <?php echo form_close()?>
        <?php else: ?>
            <?php  echo form_open_multipart('Administrative_affairs/add_vacation')?>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">الإدارة </label>
                        <?php if($_SESSION['role_id_fk'] == 1 || $_SESSION['role_id_fk'] == 2  ):?>
                        <select name="main_dep_f_id" id="main_dep_f_id"  class="form-control" required  onchange="return sub($('#main_dep_f_id').val());">
                            <option value="">إختر</option>

                            <?php if(!empty($admin)):
                                foreach ($admin as $record):
                                    $sect='';
                                    if( $result[0]->administration ==$record->id ){
                                        $sect ='selected';
                                    }
                                    ?>
                                    <option value="<? echo $record->id;?>" <? echo $sect;?>><? echo $record->name;?></option>
                                <?php  endforeach; endif;?>
                        </select>
                        <?php else: ?>
                            <input type="hidden" name="main_dep_f_id" value="<? echo $employ_name[$_SESSION['emp_code']][0]->administration ?>">
                            <select name="main_dep_f_id" id="main_dep_f_id"  class="form-control" disabled   >

                                <?php

                                if (!empty($employ_name[$_SESSION['emp_code']])):
                                if(!empty($admin)):
                                    foreach ($admin as $record):
                                        $sect='';
                                        if( $employ_name[$_SESSION['emp_code']][0]->administration ==$record->id ){
                                            $sect ='selected';
                                        }
                                        ?>
                                        <option value="<? echo $record->id;?>" <? echo $sect;?>><? echo $record->name;?></option>
                                    <?php  endforeach; endif;    endif;?>
                            </select>
                        <?php endif;?>
                    </div>
                </div>
                <div class="col-md-3" id="optionearea5">
                    <div class="form-group">
                        <label class="control-label">الموظف</label>
                        <?php if($_SESSION['role_id_fk'] == 1 || $_SESSION['role_id_fk'] == 2  ):?>

                            <select name="emp_id" id="emp_id"    class="form-control" >
                                <option value="">إختر</option>
                            </select>
                        <?php else:?>
                            <?php if (!empty($employ_name[$_SESSION['emp_code']])): ?>
                                <input type="hidden" name="emp_id" value="<? echo $employ_name[$_SESSION['emp_code']][0]->id?>">
                                <select name="emp_id" id="emp_id"    class="form-control" disabled >
                                    <option value="<?php  echo $employ_name[$_SESSION['emp_code']][0]->id;?>"><?php echo $employ_name[$_SESSION['emp_code']][0]->employee; ?></option>
                                </select>
                            <?php endif;?>
                        <?php endif?>

                    </div> </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">نوع الأجازة</label>
                        <select name="vacation_id"  id="vacation_id" class="form-control" required >
                            <?php $vacation=array('إختر','أجازة سنوية','أجازة مرضية','أجازة بدون أجر');
                            for($a=0;$a<sizeof($vacation);$a++):   ?>
                                <option value="<? echo $a; ?>"><? echo $vacation[$a]; ?></option>
                            <? endfor ?>

                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">من</label>
                        <input type="date" name="from_date" value="" class="form-control text-right" placeholder="شهر / يوم / سنة" />
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">إلي</label>
                        <input type="date" name="to_date" value="" class="form-control text-right" placeholder="شهر / يوم / سنة " />
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">التأشيره المطلوبة</label>
                        <textarea class="form-control" required name="visa"></textarea>
                    </div>
                </div>

                <div class="col-md-6" id="optionearea55">
                    <?php if (!empty($employ_name[$_SESSION['emp_code']])): ?>
                        <?php
                        $query2 =$this->db->query('SELECT * FROM `vacations` WHERE `deleted`=1 AND `emp_id`='.$employ_name[$_SESSION['emp_code']][0]->id);
                        $arr=array();
                        foreach ($query2->result() as  $row2) {
                            $arr[] =$row2;
                        }
                        ?>
                        <?php

                        if (sizeof($arr)>0) {   ?>
                            <div class="col-md-6">
                            <table class="table table-bordered table-striped "  style=""  >
                            <thead>
                            <tr>
                                <th style="text-align: center">م</th>
                                <th style="text-align: center">اليوم</th>
                                <th style="text-align: center">نوع الأجازة</th>
                                <th style="text-align: center">المدة</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?    $vacation=array('','أجازة سنوية','أجازة مرضية','أجازة بدون أجر');
                            $counter=0;
                            foreach ($arr as  $row):
                                $counter++;
                                $day_from=$row->from_date;
                                $day_to= $row->to_date;

                                $date1 = new DateTime($day_from);
                                $date2 = new DateTime($day_to);

                                $diff = $date2->diff($date1)->format("%a");
                                ?>


                                <?   echo'<tr>
                              <td>'.$counter.'</td>
                              <td>'.$day_from.'</td>
                              <td>'.$vacation[$row->vacation_id].'</td>
                              <td>'.$diff.'</td>
                            </tr>
                            
                            ';
                          endforeach;  }  ?>
                        </tbody>
                        </table>
                        </div>

                        <?php
                        $idea_emp_id=  $employ_name[$_SESSION['emp_code']][0]->id;
                        $depart=  $employ_name[$_SESSION['emp_code']][0]->administration;

                        $query2 =$this->db->query('SELECT * FROM `employees` WHERE `administration`='.$depart.' And `id` !='.$idea_emp_id);
                        $arr=array();
                        foreach ($query2->result() as  $row2) {
                            $arr[] =$row2;
                        }

                        ?>
                        <div class="col-md-6">
                            <label class="control-label">الموظف القائم بالعمل</label>
                            <select name="emp_assigned_id"  id="emp_assigned_id" class="form-control"  required >
                                <option value="">إختر </option>
                                <?php    foreach($arr as $record): ?>
                                    <option value="<? echo $record->id;?>"><? echo $record->employee;?></option>
                                <? endforeach;?>
                            </select>
                        </div>


                    <?php endif;?>
                </div>

            </div>
            
            
            <?php
            
            echo $total_holiday_remain;
            
            if($total_holiday_remain > 0){
      
     $tag_html = '<div class="col-xs-3">
  <button name="add" value="add" type="submit" class="btn btn-primary">حفظ</button>
</div>'   ;
}elseif($total_holiday_remain <= 0 ){
   $tag_html =  '<div class="col-xs-12"><div class="alert alert-danger">
                   <strong>عذرأ!</strong>  لا تمتلك رصيد كافي من الأجازات
    </div></div>';  
    
}
            
            
            ?>
            
            
            
            
            
            
            <!--
            <div class="form-group"  >
                <div class="col-xs-8 col-xs-pull-4" >
                    <button name="add" value="add" type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </div>-->
            
            
            <?php echo $tag_html ?>
            
            <br>
            <?php echo form_close()?>

        <?php  endif;?>

    </fieldset>
</div>


<?php

   // print_r($table);
if(isset($records) && $records !=null  ):?>
    <table id="no-more-tables" class="table table-bordered" role="table">
        <thead>
        <tr>
            <th>م</th>
            <th class="text-center">اسم الموظف</th>
            <th class="text-center">الموظف القائم بالعمل</th>
            <th class="text-center">مدة الاجازة</th>
            <th  class="text-center">حاله الأجازة</th>
            <th  class="text-center">الإجراء</th>
            <th  class="text-center">التفاصيل</th>
        </tr>
        </thead>
        <tbody class="text-center">


            <?php
        
            
            foreach ($records as $record ):

                $date1 = new DateTime($record->from_date);
                $date2 = new DateTime($record->to_date);
                $diff = $date2->diff($date1)->format("%a");
                if($record->suspend == 1)
                {
                    $class = 'success';
                    $title = 'نشط';
                }
                else
                {
                    $class = 'danger';
                    $title = 'غير نشط';
                }


                ?>
                <tr>
                    <td><?php echo $a ?></td>
                    <td ><?   if(!empty($record->emp_id)) :echo $employ_name[$record->emp_id][0]->employee; endif;?></td>
                                      <td ><? if(!empty($record->emp_assigned_id)) : echo $employ_name[$record->emp_assigned_id][0]->employee; endif; ?></td>
                    <td ><? echo $diff; ?></td>
                    <td>
                        <a href="<?php echo base_url().'Administrative_affairs/suspend_vacation/'.$record->id.'/'.$class?>" class="btn btn-<?php echo $class ?> btn-xs col-lg-8"><?php echo $title ?> </a>
                    </td>
                    <td data-title="التحكم" class="text-right">
                        <a href="<?php echo base_url().'Administrative_affairs/update_vacation/'.$record->id?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> تعديل</a>
                        <a  href="<?php  echo base_url().'Administrative_affairs/delete_vacation'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs "><i class="fa fa-trash"></i> حذف</a>
                    </td>
                    <td> <button type="button" class="btn btn-info btn-xs " data-toggle="modal" data-target="#myModal<?php echo $record->id?>"> التفاصيل </button>
                        <?php
                        $query2 =$this->db->query('SELECT * FROM `vacations` WHERE `emp_id`='.$record->emp_id.' And `deleted`=1  ');
                        $arr=array();
                        foreach ($query2->result() as  $row2) {
                            $arr[] = $row2;
                        }
                        ?>
                        <div class="modal fade" id="myModal<?php echo $record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content" >
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">تفاصيل أجازات الموظف </h4>
                                    </div>
                                    <div class="row" style="margin-right:10px">
                                        <div class="col-sm-3">
                                            <h5> إسم الموظف:</h5>
                                        </div>
                                        <div class="col-sm-9">
                                            <h5><?   if(!empty($record->emp_id)) :echo $employ_name[$record->emp_id][0]->employee; endif;?></h5>
                                        </div>
                                    </div>

                                    <div class="modal-body">
                                        <table id="no-more-tables" style="width:100%;" class="table table-bordered" role="table">
                                            <thead>
                                            <tr>
                                                <th width="5%" class="text-right">م</th>
                                                <th  class="text-right">القائم بالعمل</th>
                                                <th  class="text-right">المدة</th>
                                                <th  class="text-right">نوع الأجازة</th>
                                                <th  class="text-right">تاريخ النهاية</th>
                                                <th class="text-right">اريخ البداية</th>
                                            </tr>
                                            </thead>
                                            <? if (!empty($arr)) :?>
                                                <tbody>
                                                <tr>
                                                    <?
                                                    $count=0;
                                                    $sum=0;
                                                    foreach ($arr as $row):
                                                    $count++;
                                                    $date1 = new DateTime($row->from_date);
                                                    $date2 = new DateTime($row->to_date);
                                                    $diff = $date2->diff($date1)->format("%a");
                                                    ?>
                                                    <td><? echo $count;?></td>
                                                    <td><? echo $row->emp_assigned_id;?></td>
                                                    <td><? echo $diff;?></td>
                                                    <td><? echo $row->vacation_id;?></td>
                                                    <td><? echo $row->to_date;?></td>
                                                    <td><? echo $row->from_date;?></td>

                                                </tr>
                                                <? endforeach;?>
                                                </tbody>
                                            <? endif;?>
                                        </table>
                                    </div>


                                    <div class="row" style="margin-right:10px">
                                        <div class="col-sm-3">
                                            <h5>التأشيرة المطلوبة:</h5>
                                        </div>
                                        <div class="col-sm-9">
                                            <h5><? echo $row->visa;?></h5>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                    </div>
                                </div>
                            </div>
                        </div>




                    </td>
                </tr>
                <?php
                $a++;
            endforeach;  ?>
        </tbody>
    </table>
<?php endif;?>



<script>


    function sub(values)
    {
        if(values)
        {
            var dataString = 'values=' + values;
            $.ajax({

                type:'post',
                url: '<?php echo base_url() ?>/Administrative_affairs/add_vacation',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#optionearea5').html(html);
                }
            });
            return false;
        }
        else
        {
            $('#optionearea5').html('');
            return false;
        }

    }
</script>