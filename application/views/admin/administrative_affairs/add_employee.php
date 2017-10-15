
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
        <?php  echo form_open_multipart('Administrative_affairs/edit_employee/'.$result[0]->id)?>
        <div class="row">
<div class="col-md-3">
<div class="form-group">
    <label class="control-label">كود الموظف </label>
    <?php   if(!empty($count)){ $value=($count[0]->id)+1; }else{   $value =1;  }?>
    <input type="text"  name="emp_code" value="<?php  echo $result[0]->id; ?>"  readonly="readonly" class="form-control text-right" placeholder="كود الموظف " />
</div>
</div>

<div class="col-md-3">
    <div class="form-group">
        <label class="control-label">إسم الموظف</label>
        <input type="text" name="employee" value="<?echo $result[0]->employee;?>" required="required" class="form-control text-right" placeholder="كود الموظف " />
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label class="control-label">الإدارة</label>
        <select name="administration" id="administration"  class="form-control" required="required" onchange="return lood($('#administration').val());">
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
        <label class="control-label">القسم</label>
        <select  name="department"  class="form-control" required="required" id="optionearea1" >
            <option value="">إختر</option>
            <?php if(!empty($admin)):
                foreach ($departs[$result[0]->administration] as $record):
                    $select='';
                    if($record->id == $result[0]->department ){
                        $select='selected';
                    }
                    ?>
                    <option value="<? echo $record->id;?>" <? echo $select;?>><? echo $record->name;?></option>
                <?php  endforeach; endif;?>
        </select>
    </div>
</div>
<div class="col-md-3">
        <div class="form-group">
            <label class="control-label">تاريخ الميلاد</label>
            <input type="date" name="birth_date" value="<? echo  date("Y-m-d",$result[0]->birth_date);?>" required="required" class="form-control text-right" placeholder="كود الموظف " />
        </div>
    </div>

<div class="col-md-3">
        <div class="form-group">
            <label class="control-label"> رقم الهوية </label>
            <input type="number" name="id_num" value="<?echo $result[0]->id_num;?>" required="required" class="form-control text-right" placeholder=" رقم الهوية" />
        </div>
    </div>
<div class="col-md-3">
        <div class="form-group">
            <label class="control-label">رقم الهاتف </label>
            <input type="number" name="phone_num" value="<?echo $result[0]->phone_num;?>"  class="form-control text-right" placeholder="كود الموظف " />
        </div>
    </div>

<div class="col-md-3">
        <div class="form-group">
            <label class="control-label">العنوان</label>
            <input type="text" name="address" value="<?echo $result[0]->address;?>" required="required" class="form-control text-right" placeholder="العنوان " />
        </div>
    </div>


<div class="col-md-3">
        <div class="form-group">
            <label class="control-label">البريد الإلكتروني </label>
            <input type="email" name="email" value="<?echo $result[0]->email;?>"  class="form-control text-right" placeholder="البريد الإلكتروني " />

        </div>
    </div>

<div class="col-md-3">
        <div class="form-group">
            <label class="control-label">نوع التعيين</label>
            <select name="contract"  id="contract" required="required" onchange=" return goup($('#contract').val())" class="form-control">
                <?if($result[0]->contract ==0){?>
                    <option value="0">مكلف</option>
                    <option value="1">مكافأة</option>
                <?}elseif($result[0]->contract ==1){?>
                    <option value="1">مكافأة</option>
                    <option value="0">مكلف</option>
                <?}?>
            </select>
        </div>
    </div>
    <? if($result[0]->contract ==0){?>

    <div class="col-md-3" id="contract_idup">
        <div class="form-group">
            <label class="control-label">قرار التكليف </label>
              <div class="row">
            <div class="col-lg-4">
            <input type="text" name="" class="form-control" value="<?php echo $result[0]->contract ?>" style=""  readonly="readonly"/>
            </div>
                  <div class="col-lg-8">
            <input type="file" name="img" class="form-control" style=""  title=""/>
                  </div>
            </div>
        </div>
    </div>
    <? }?>



  <!--  <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">الراتب</label>

            <input type="number" name="salary" value="<?echo $result[0]->salary;?>" required="required" class="form-control text-right" placeholder="البريد الإلكتروني " />
        </div>
      </div> -->
 </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">إعدادات الأجازات و الأذونات</label>
                        <select name="group_affairs_id_fk" id="group_affairs_id_fk" class="form-control" >

                            <?php if(!empty($affairs_settings_options_FK)):

                                foreach ($affairs_settings_options_FK as $record):
                                    $sect='';
                                    if( $result[0]->group_affairs_id_fk ==$record->id ){
                                        $sect ='selected';
                                    }
                                    ?>
                                    <option value="<? echo $record->id;?>" <? echo $sect;?>><? echo $record->set_name;?></option>
                                <?php  endforeach; endif;?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">

                        <label class="control-label">رصيد أجازات سابق</label>
                        <input type="text" class="r-inner-h4 form-control" name="past_days"  value="<?php echo $result[0]->past_days;?>" />

                    </div>
                </div>
            </div>




<div class="row">


<div class="col-md-3">
<div class="form-group">
<label class="control-label">الراتب</label>
<input type="number" name="salary" value="<?echo $result[0]->salary;?>" required="required" class="form-control text-right" placeholder="الراتب " />
</div>
</div>


<div class="col-md-3">
<div class="form-group">
    <label class="control-label">بدل نقل</label>
      <input type="text" class="form-control text-right" value="<?echo $result[0]->b_naql;?>"  name="b_naql" required="required" >
</div>
</div>

<div class="col-md-3">
<div class="form-group">
    <label class="control-label">بدل منصب اشرافي</label>
      <input type="text" class="form-control text-right" value="<?echo $result[0]->b_eshraf;?>" name="b_eshraf" required="required" >
</div>
</div>


<div class="col-md-3">
<div class="form-group">

<label class="control-label">بدل طبيعه عمل </label>
<input type="text" class="form-control text-right" value="<?echo $result[0]->b_amal;?>"  name="b_amal" required="required" >
</div>
</div>

<div class="col-md-3">
<div class="form-group">

<label class="control-label">بدل اتصالات </label>
<input type="text" class="form-control text-right" value="<?echo $result[0]->b_etislat;?>"  name="b_etislat" required="required" >
</div>
</div>


<div class="col-md-3">
<div class="form-group">

<label class="control-label">خصم تأمينات </label>
<input type="text" class="form-control text-right" value="<?echo $result[0]->k_tamen;?>"   name="k_tamen" required="required"  >
</div>
</div>


</div>






















            <div class="form-group"  >
                <div class="col-xs-8 col-xs-pull-4">
                    <button name="edit" value="حفظ" type="submit" class="btn btn-primary">تعديل</button>
                </div>
            </div>

            <br>
            <?php echo form_close()?>
        <?php else: ?>
            <?php  echo form_open_multipart('Administrative_affairs/add_employee')?>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">كود الموظف </label>
                        <?php   if(!empty($count)){ $value=($count[0]->id)+1; }else{   $value =1;  }?>
                        <input type="number"  name="emp_code" value="<?php echo $value ?>" readonly="readonly" class="form-control text-right" placeholder="كود الموظف " />
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">إسم الموظف</label>
                        <input type="text" name="employee" value="<? ?>"  required="required" class="form-control text-right" placeholder="إسم الموظف" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">الإدارة</label>
                        <select name="administration" id="administration" required="required" class="form-control text-right"  onchange="return lood($('#administration').val());">
                            <option value="">إختر</option>
                            <?php if(!empty($admin)):
                                foreach ($admin as $record):?>
                                    <option value="<? echo $record->id;?>"><? echo $record->name;?></option>
                                <?php  endforeach; endif;?>
                        </select>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">القسم</label>
                        <select name="department"  class="form-control text-right" required="required"  id="optionearea1">
                            <option value="">إختر</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">تاريخ الميلاد</label>
                        <input type="date" name="birth_date" value="" class="form-control text-right" required="required" placeholder="كود الموظف " />
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label"> رقم الهوية </label>
                        <input type="number" name="id_num" value="" class="form-control text-right" required="required" placeholder=" رقم الهوية" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">رقم الهاتف </label>
                        <input type="number" name="phone_num" value="" class="form-control text-right" required="required" placeholder="رقم الهاتف" />
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">العنوان</label>
                        <input type="text" name="address" value="" class="form-control text-right" required="required" placeholder="العنوان " />
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">البريد الإلكتروني </label>
                        <input type="email" name="email" value="" class="form-control text-right" placeholder="البريد الإلكتروني " />

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">نوع التعيين</label>
                        <select name="contract"  id="contract"  class="form-control text-right" required="required" onchange=" return go($('#contract').val())">
                            <option value="">إختر</option>
                            <option value="0">مكلف</option>
                            <option value="1">مكافأة</option>
                        </select>
                    </div>
                </div>


                    <div class="col-md-3" id="contract_id" style="display: none" >
                        <div class="form-group">
                            <label class="control-label">قرار التكليف </label>
                            <input type="file" name="img" class="form-control" style="" title=""/>
                        </div>
                    </div>


              <!--  <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">الراتب</label>
                        <input type="number" name="salary" value="" required="required" class="form-control text-right" placeholder="الراتب " />
                    </div>
                </div> -->
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">إعدادات الأجازات و الأذونات</label>
                        <select name="group_affairs_id_fk" id="group_affairs_id_fk" class="form-control" >
                            <option value="">إختر</option>
                            <?php if(!empty($affairs_settings_options)):
                                foreach ($affairs_settings_options as $record):?>
                                    <option value="<? echo $record->id;?>"><? echo $record->set_name;?></option>
                                <?php  endforeach; endif;?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">

                        <label class="control-label">رصيد أجازات سابق</label>
                        <input type="text" class="r-inner-h4 form-control" name="past_days">
                    </div>
                </div>
            </div>



<div class="row">


<div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">الراتب</label>
                        <input type="number" name="salary" value="" required="required" class="form-control text-right" placeholder="الراتب " />
                    </div>
                </div>


<div class="col-md-3">
<div class="form-group">
    <label class="control-label">بدل نقل</label>
      <input type="text" class="form-control text-right"  name="b_naql" required="required" >
</div>
</div>

<div class="col-md-3">
<div class="form-group">
    <label class="control-label">بدل منصب اشرافي</label>
      <input type="text" class="form-control text-right" name="b_eshraf" required="required" >
</div>
</div>


<div class="col-md-3">
<div class="form-group">

<label class="control-label">بدل طبيعه عمل </label>
<input type="text" class="form-control text-right"  name="b_amal" required="required" >
</div>
</div>

<div class="col-md-3">
<div class="form-group">

<label class="control-label">بدل اتصالات </label>
<input type="text" class="form-control text-right"  name="b_etislat" required="required" >
</div>
</div>


<div class="col-md-3">
<div class="form-group">

<label class="control-label">خصم تأمينات </label>
<input type="text" class="form-control text-right"  name="k_tamen" required="required"  >
</div>
</div>


</div>










            <div class="form-group"  >
                <div class="col-xs-8 col-xs-pull-4">
                    <button name="add" value="add" type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </div>
            <br>
            <?php echo form_close()?>

        <?php  endif;?>

    </fieldset>
</div>


<?php if(isset($records) && $records !=null  ):?>
    <table id="no-more-tables" class="table table-bordered" role="table">
        <thead>
        <tr>
            <th class="text-right">#</th>
            <th class="text-right">إسم الموظف</th>

            <th class="text-right">التحكم</th>
        </tr>
        </thead>
        <tbody>
        <?php $count=1; foreach($records as $record ):?>
            <tr>
                <td data-title="#"><span class="badge"><?php echo $count++?></span></td>
                <td data-title="#"><? echo $record->employee;?></td>
                <td data-title="التحكم" class="text-right">
                    <a href="<?php echo base_url().'Administrative_affairs/edit_employee/'.$record->id?>"
                     class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> تعديل</a>
                     
                     
                    <a  href="<?php  echo base_url().'Administrative_affairs/delete_employee/'.$record->id?>" 
                    onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs ">
                    <i class="fa fa-trash"></i> حذف</a>
                </td>
            </tr>
        <?php endforeach ;?>
        </tbody>
    </table>
<?php endif;?>





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




    function goup(valu) {
        if(valu === '0'){
            $('#contract_idup').show();
        }else{
            $('#contract_idup').hide();
        }

    }
</script>