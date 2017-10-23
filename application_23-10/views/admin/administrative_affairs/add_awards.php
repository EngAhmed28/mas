


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
            <?php echo form_open_multipart('Administrative_affairs/edit_awards/'.$result[0]->id)?>
            <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">تاريخ اليوم</label>
                        <input type="date" class="form-control docs-date"   name="date"  placeholder="شهر / يوم / سنة " value="<? echo  date('Y-m-d',$result[0]->date);?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">إسم الموظف </label>
                        <select name="emp_id" id="emp_id"   class="form-control"  >
                            <option> - اختر - </option>
                            <?php if (!empty($employs)):?>
                                <?php  foreach ($employs as $record):
                                    $dis ='';
                                    if($result[0]->emp_id == $record->id){
                                        $dis ='selected';

                                    }?>
                                    <option value="<?php  echo $record->id;?>" <?echo $dis;?>><?php  echo $record->employee;?></option>
                                <?php  endforeach;?>
                            <?php endif;?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label"> قيمة المكافأة</label>
                        <input type="number" name="value"   value="<? echo $result[0]->value;?>"  class="form-control "  >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">التفاصيل</label>
                        <textarea   name="details" style="margin: 0px; width: 287px; height: 75px;"><? echo $result[0]->details; ?> </textarea>
                    </div>
                </div>


                <div class="form-group"  >
                    <div class="col-xs-8 col-xs-pull-4">
                        <button name="edit" value="تعديل" type="submit" class="btn btn-primary">تعديل</button>
                    </div>
                </div>


            </div>
            <br>
            <?php echo form_close()?>
        <?php else: ?>
            <?php echo form_open_multipart('Administrative_affairs/add_awards/')?>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">تاريخ اليوم</label>
                        <input type="date" class="form-control docs-date"   name="date" placeholder="شهر / يوم / سنة " >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">إسم الموظف </label>
                        <?php if($_SESSION['role_id_fk'] ==2 ||$_SESSION['role_id_fk'] ==1):?>
                            <input type="text" name="emp_id" value="<?php echo $get_data['employee'];?>" disabled class="form-control half input-style">
                        <?elseif($_SESSION['role_id_fk'] ==3):?>
                        <select name="emp_id" id="emp_id"   class="form-control"  >
                            <option> - اختر - </option>
                            <?php if (!empty($employs)):?>
                                <?php  foreach ($employs as $record):?>
                                    <option value="<?php  echo $record->id;?>"><?php  echo $record->employee;?></option>
                                <?php  endforeach;?>
                            <?php endif;?>
                            <?php endif;?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label"> قيمة المكافأة</label>
                        <input type="number" name="value"   class="form-control "  >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">التفاصيل</label>
                        <textarea    style="margin: 0px; width: 287px; height: 75px;" name="details" > </textarea>
                    </div>
                </div>


            </div>
            <div class="form-group"  >
                <div class="col-xs-8 col-xs-pull-4" >
                    <button name="add" value="add" type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </div>
            <br>
            <?php echo form_close()?>

        <?php  endif;?>

    </fieldset>
</div>


<?php


if(isset($records) && $records !=null  ):?>
    <table id="no-more-tables" class="table table-bordered" role="table">
        <thead>
        <tr>
            <th>م</th>
            <th class="text-center">تاريخ اليوم</th>
            <th class="text-center">إسم الموظف</th>
            <th class="text-center">الإدارة</th>
            <th  class="text-center">القسم</th>
            <th  class="text-center">قيمة المكافأة</th>
            <th  class="text-center">الاجراء</th>
        </tr>
        </thead>
        <tbody class="text-center">
        <?php $a=1;
        foreach ($records as $record ):?>
            <tr>
                <td><?php echo $a ?></td>
                <td><?php echo date('Y-m-d',$record->date);?></td>
                <td><?php if(!empty($get_data2[$record->emp_id][0]->employee)): echo$get_data2[$record->emp_id][0]->employee; endif;?></td>
                <td><?php if(!empty($get_data2[$record->emp_id]))echo $depart_name[$get_data2[$record->emp_id][0]->administration][0]->name;?></td>
                <td><?php if(!empty($get_data2[$record->emp_id]))echo$depart_name[$get_data2[$record->emp_id][0]->department][0]->name;?></td>
                <td><?php echo$record->value;?></td>
                <td data-title="التحكم" class="text-right">
                    <a href="<?php echo base_url().'Administrative_affairs/edit_awards/'.$record->id?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> تعديل</a>
                    <a  href="<?php  echo base_url().'Administrative_affairs/delete_awards/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs "><i class="fa fa-trash"></i> حذف</a>
                </td>
            </tr>
            <?php
            $a++;
        endforeach;  ?>
        </tbody>
    </table>
<?php endif;?>


