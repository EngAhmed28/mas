
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
            <?php echo form_open_multipart('Administrative_affairs/edit_penalty/'.$result[0]->id)?>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">تاريخ اليوم </label>
                        <input type="date" name="date" value="<? echo  date("Y-m-d",$result[0]->date);?>"  class="form-control text-right" placeholder="تاريخ اليوم " />
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">إسم الموظف</label>
                        <select name="emp_id" id="emp_id"  class="form-control" disabled>
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
                        <label class="control-label">الإدارة</label>
                        <select class="form-control" name="main_depart" id="main_depart"  disabled  >
                            <option><?php if(!empty($get_data2[$result[0]->emp_id]))echo $depart_name[$get_data2[$result[0]->emp_id][0]->administration][0]->name;?></option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">القسم</label>
                        <select class="form-control" name="sub_depart" id="sub_depart"  disabled >
                            <option><?php if(!empty($get_data2[$result[0]->emp_id]))echo$depart_name[$get_data2[$result[0]->emp_id][0]->department][0]->name;?></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">نوع الجزاء</label>
                        <select class="form-control" name="penalty_type" id="penalty_type"    >
                            <? if($result[0]->penalty_type ==1){?>
                                <option value="1">مادية</option>
                                <option value="2">أخري</option>
                            <?  }elseif($result[0]->penalty_type ==2){?>
                                <option value="2">أخري</option>
                                <option value="1">مادية</option>
                            <?} ?>
                        </select>
                    </div>
                </div>
                <? if($result[0]->penalty_type ==1){?>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">القيمة </label>
                        <input type="number" name="value"  class="form-control half text-right" value="<? echo $result[0]->value;?>">
                    </div>
                </div>
                <?}elseif($result[0]->penalty_type ==2){?>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">القيمة </label>
                            <input type="number" name="value"  class="form-control half text-right">
                        </div>
                    </div>

                <? }?>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">التفاصيل</label>
                        <br>
                        <textarea  class="form-control"  name="content"><?php echo $result[0]->content; ?></textarea>
                    </div>
                </div>

            </div>
            <div class="form-group"  >
                <div class="col-xs-8 col-xs-pull-4">
                    <button name="edit" value="تعديل" type="submit" class="btn btn-primary">تعديل</button>
<!--                     <input type="submit" role="button" name="edit" value="تعديل" class="btn btn-add">-->
                </div>
            </div>

            <br>
            <?php echo form_close()?>
        <?php else: ?>
            <?php echo form_open_multipart('Administrative_affairs/add_penalty/')?>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">تاريخ اليوم </label>
                        <input type="date"  name="date" class="form-control text-right" placeholder="تاريخ اليوم" />
                    </div>
                </div>


<?php
//print_r($_SESSION);
?>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">إسم الموظف</label>
                      <?php
                      
                   //  echo $_SESSION['role_id_fk'];
                      ?>

                        
                        <!--------------------->
                        <?php if($_SESSION['role_id_fk'] ==2 || $_SESSION['role_id_fk'] ==1):?>
                            <input type="text" name="emp_id"  class="form-control" disabled value="<?php echo $get_data['employee'];?>">
                        <?elseif($_SESSION['role_id_fk'] ==3):?>
                        <select class="form-control" name="emp_id" id="emp_id"  onchange="getTermsAndCredits(this.value);"   data-show-subtext="true" data-live-search="true">
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
                        <label class="control-label">الإدارة</label>
                        <div id="optionearea3">
                            <?php if($_SESSION['role_id_fk'] ==2):?>
                                <input type="text"  name="main_depart"  class="form-control" readonly value="<?php echo $depart_name[$get_data['administration']][0]->name;?>">
                            <?else:?>
                                <input type="text" name="main_depart"  class="form-control">
                            <?endif;?>
                    </div>
                    </div>
                 </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">القسم</label>
                        <div id="optionearea4">
                            <?php if($_SESSION['role_id_fk'] ==2 ||$_SESSION['role_id_fk'] ==1):?>
                                <input type="text"  name="sub_depart"  class="form-control"  readonly value="<?php if(isset($depart_name[$get_data['department']][0]->name)){echo $depart_name[$get_data['department']][0]->name;} ;?>">
                            <?else:?>
                                <input type="text" name="sub_depart"  class="form-control">
                            <?endif;?>
                        </div>
                    </div>
                </div>
                         <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">نوع الجزاء</label>
                                    <select class="form-control" name="penalty_type" id="penalty_type" onchange="checkduration()">
                                        <option value="">إختر</option>
                                        <option value="1">مادية</option>
                                        <option value="2">أخري</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3"  id="value" style="display: none">
                                <div class="form-group">
                                    <label class="control-label"> القيمة </label>
                                    <input type="number" name="value"  class="form-control half input-style" >
                                </div>
                            </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">التفاصيل</label>
                        <br>
                        <textarea  class="form-control"  name="content"></textarea>
                    </div>
                </div>


            <div class="form-group">
                <div class="col-xs-8 col-xs-pull-4">
                    <button name="add" value="add" type="submit" class="btn btn-primary">حفظ</button>
<!--                        <input type="submit" role="button" name="add" value="حفظ" class="btn btn-add">-->
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
        <tr >
            <th class="text-center">م</th>
            <th class="text-center">تاريخ اليوم</th>
            <th class="text-center">إسم الموظف</th>
            <th class="text-center">الإدارة</th>
            <th class="text-center">القسم</th>
            <th class="text-center">الاجراء</th>
        </tr>
        </thead>
        <tbody>
        <?php  $count=1; foreach($records as $row):?>
            <tr>
                <td  style="text-align: center !important;"><?php echo $count++?></td>
                <td style="text-align: center !important;"><?php echo date('Y-m-d',$row->date);?></td>
                <td style="text-align: center !important;"><?php echo$get_data2[$row->emp_id][0]->employee;?></td>
                <td style="text-align: center !important;"><?php if(!empty($get_data2[$row->emp_id]))echo $depart_name[$get_data2[$row->emp_id][0]->administration][0]->name;?></td>
                <td style="text-align: center !important;"><?php if(!empty($get_data2[$row->emp_id]))echo$depart_name[$get_data2[$row->emp_id][0]->department][0]->name;?></td>
    <td style="text-align: center !important;"> 
    <a href="<?php echo base_url().'Administrative_affairs/edit_penalty/'.$row->id?>"
     class="btn btn-warning btn-xs"
    >
           <i class="fa fa-pencil"></i> تعديل </a>
        <a href="<?php echo base_url().'Administrative_affairs/delete_penalty/'.$row->id?>"
        class="btn btn-danger btn-xs "
        >
            
             <i class="fa fa-trash"></i> حذف  
            
            
             </a>
        
        
        
        <?php if($_SESSION['role_id_fk'] == 1 ||$_SESSION['role_id_fk'] == 2):?>
            <button type="button" class="btn btn-info btn-xs col-lg-4" data-toggle="modal" data-target="#myModal<?php echo $row->id;?>"> الإعتماد </button>
        <?php endif;?>
    </td>
            </tr>

            <!--start-->
            <div class="modal fade" id="myModal<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        </div>
                        <br /><br />
                        <?php echo form_open_multipart('Administrative_affairs/suspend_penalty/'.$row->id)?>
                        <div class="modal-body">
                            <div class="col-sm-12">
                                <div class="col-sm-6" style="font-size: 16px;"><input type="submit" name="accept" value="موافقة" class="btn btn-success btn-xs " /></div>
                                <div class="col-sm-6" style="font-size: 16px;">  <input type="submit" name="ref" value="رفض" class="btn btn-danger btn-xs " /></div>
                            </div>
                            <br /><br />
                            <div class="row">
                                <div class="col-sm-4" style="font-size: 16px;">السبب</div>
                                <div class="col-sm-8">
                          <textarea name="reason" style="height: 100px;" id="reason" cols="60" rows="10"></textarea>
                                </div>
                            </div>
                            <?php echo form_close()?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif;?>
<!--------------------------------------------------------------------->

            <script>

                function getTermsAndCredits(value) {
                    search(value);
                    go(value);
                }

                function search(valu)
                {
                    if(valu)
                    {
                        var dataString = 'valu=' + valu;
                        $.ajax({

                            type:'post',
                            url: '<?php echo base_url() ?>/administrative_affairs/add_penalty',
                            data:dataString,
                            dataType: 'html',
                            cache:false,
                            success: function(html){
                                $('#optionearea3').html(html);
                            }
                        });
                        return false;
                    }
                    else
                    {
                        $('#optionearea3').html('');
                        return false;
                    }

                }

            </script>

            <script>
                function go(valuu)
                {
                    if(valuu)
                    {
                        var dataString = 'valuu=' + valuu;
                        $.ajax({

                            type:'post',
                            url: '<?php echo base_url() ?>/administrative_affairs/add_penalty',
                            data:dataString,
                            dataType: 'html',
                            cache:false,
                            success: function(html){
                                $('#optionearea4').html(html);
                            }
                        });
                        return false;
                    }
                    else
                    {
                        $('#optionearea4').html('');
                        return false;
                    }

                }

            </script>
            <script>
                $('#value').hide();
                function checkduration() {
                    var penalty_type =$("#penalty_type").val();
                    if(penalty_type ==1){
                        $('#value').show();
                    }else{
                        $('#value').hide();
                    }
                }
            </script>

