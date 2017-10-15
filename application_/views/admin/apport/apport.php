<h2 class="text-flat">إدارة الحجوزات<span class="text-sm"><?php echo $title; ?></span></h2>

<ul class="breadcrumb pb30">

    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>


    <li class="active"><?php echo $title; ?></li>

</ul>

<span id="message">

<?php
$day = array('السبت','الأحد','الإثنين','الثلاثاء','الأربعاء','الخميس');

if(isset($_SESSION['message']))
   echo $_SESSION['message'];
unset($_SESSION['message']);

?>
   </span>
<div class="col-md-12">

        <div class="panel with-nav-tabs panel-default">

            <div class="panel-heading">

                <ul class="nav nav-tabs">
                
                    <li class="active"><a href="#tab0default" data-toggle="tab">الحجوزات الواردة</a></li>

                    <li><a href="#tab1default" data-toggle="tab">الحجوزات المقبولة</a></li>
                    
                    <li><a href="#tab2default" data-toggle="tab">الحجوزات المرفوضة</a></li>

                </ul>
            </div>


            <div class="panel-body">

                <div class="tab-content">

                    <div class="tab-pane fade in active" id="tab0default">


<?php echo form_open_multipart('dashboard/delete_selected_booking',array('class'=>"form-horizontal",'role'=>"form" ))?>

<?php if(isset($records)&&$records!=null):?>


    <table id="no-more-tables" class="table " role="table">

        <caption class="text-right text-success">
        <input type="submit" name="del" value="حذف ما تم إختياره" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs " title="حذف ما تم إختياره">
        </caption>

        <thead>
        
        <tr>

            <th width="2%"><input type="checkbox" id="all" name="all" value="1" style="float: center" ></th>
            
            <th width="3%">#</th>
            
            <th  class="text-right">تاريخ الحجز</th>

            <th  class="text-right">الإسم</th>

            <th class="text-right">الطبيب</th>
            
            <th class="text-right">موعد الحجز</th>

            <th width="15%" class="text-right">الحالة</th>

        </tr>

        </thead>
        <tbody>
        <?php $x = ($this->uri->segment('3')*10)-10;
        
        if($x < 0) 
            $x=0;
           
             foreach($records as $record):
                $x++;
                
                
          
                
        ?>
       
            <tr data-toggle="tooltip" data-placement="bottom"  title="إضغط للتفاصيل">
                <td><!--span class="badge"-->
                <input type="checkbox" value="<?php echo $record->id?>" id="check" style="float: center;" name="check[]" class="cc">
                <?php //echo $x?><!--/span--></td>
                
                <td data-toggle="modal" data-target="#myodal<?php echo $record->id ?>" onclick="return read('<?php echo $record->id?>');" ><span class="badge"><?php echo $x; ?></span></td>
                
                <td data-toggle="modal" data-target="#myodal<?php echo $record->id ?>" onclick="return read('<?php echo $record->id?>');" ><?php echo date('Y/m/d',$record->date)?></td>
                
                <td data-toggle="modal" data-target="#myodal<?php echo $record->id ?>" onclick="return read('<?php echo $record->id?>');" ><?php echo $record->first_name ?></td>
                
                <td data-toggle="modal" data-target="#myodal<?php echo $record->id ?>" onclick="return read('<?php echo $record->id?>');" ><?php echo $record->doc_name?> </td>
                
                <td data-toggle="modal" data-target="#myodal<?php echo $record->id ?>" onclick="return read('<?php echo $record->id?>');" ><?php echo $record->booking_date?> </td>

                <td >

                    <!--button type="button" class="btn btn-info btn-xs col-lg-5" data-toggle="modal" data-target="#myModal<?php echo $record->id ?>"><span class="glyphicon glyphicon-list"></span> محتوى الرسالة </button-->
                    <a  data-toggle="tooltip" data-placement="bottom" title="موافقة" href="<?php echo base_url().'dashboard/app_approved/1/'.$record->id?>"  class="btn btn-success btn-xs   "> <i class="fa fa-check"></i></a>
                    <a data-toggle="tooltip" data-placement="bottom" title="رفض" href="<?php echo base_url().'dashboard/app_approved/2/'.$record->id?>" class="btn btn-danger btn-xs   "> <i class="fa fa-times"></i></a>
                    
                </td>

            </tr>
            
            <div class="modal fade" id="myodal<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:550px">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"  aria-hidden="true">&times;</button>
                <h4 class="modal-title">تفاصيل الحجز</h4>
             </div>
             
             <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>تاريخ الحجز:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo date('Y/m/d',$record->date) ?></h5>
                           </div>
                      </div>
             
             <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>الإسم:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo $record->name?></h5>
                           </div>
                      </div>
                      
                      <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>النوع:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php if($record->gender == 1) echo 'ذكر'; else echo 'أنثى';?></h5>
                           </div>
                      </div>
                      
                     <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>البريد الألكتروني:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo $record->email ?></h5>
                           </div>
                      </div>
             <div class="row" style="margin-right:10px">
                            <div class="col-md-4">
                                  <h5>الجوال:</h5>
                             </div>
                            <div class="col-sm-8">
                               <h5><?php echo $record->phone ?></h5>
                          </div>
                      </div>
                <div class="row" style="margin-right:10px">
                                    <div class="col-md-4">
                                          <h5>العنوان:</h5>
                                       </div>
                                      <div class="col-sm-8">
                                           <h5><?php echo $record->address ?></h5>
                                      </div>
                                 </div>
                                 
                                 <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>القسم:</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                     <h5><?php echo $record->dep_name ?></h5>
                                                </div>
                                           </div>
                                 
                                 <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>الطبيب:</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                     <h5><?php echo $record->doc_name ?></h5>
                                                </div>
                                           </div>
                                           
                                            <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>الطبيب متاح خلال:</h5>
                                                 </div>
                                                <div class="col-sm-6">
                                                     <h5><?php 
                                                   
                                                     foreach($records2[$record->id] as $time){
                                                        echo '<div class="alert alert-success">'.$day[$time->day].'  '.$time->time.'</div>';
                                                     }
                                                     
                                                     ?></h5>
                                                </div>
                                           </div>
                                           
                        <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>موعد الحجز:</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                     <h5><?php echo $record->booking_date ?></h5>
                                                </div>
                                           </div>
                    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" >إغلاق</button>
      </div>
    </div>
  </div>
</div>

        <?php endforeach ;?>

        </tbody>

    </table>

    

<?php 
else:
    echo '<div class="alert alert-danger" >
              لا توجد حجوزات تم إرسالها اليوم
              </div>';

endif;
 echo form_close()?>


 </div>




     <div class="tab-pane fade" id="tab1default">

<?php echo form_open_multipart('dashboard/delete_selected_booking',array('class'=>"form-horizontal",'role'=>"form" ))?>

<?php if(isset($records3)&&$records3!=null):?>


    <table id="no-more-tables" class="table " role="table">

        <caption class="text-right text-success">
        <input type="submit" name="del" value="حذف ما تم إختياره" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs " title="حذف ما تم إختياره">
        </caption>

        <thead>
        
        <tr>

            <th width="2%"><input type="checkbox" id="all" name="alll" value="1" style="float: center" ></th>
            
            <th width="3%">#</th>
            
            <th  class="text-right">تاريخ الحجز</th>

            <th  class="text-right">الإسم</th>

            <th class="text-right">الطبيب</th>
            
            <th class="text-right">موعد الحجز</th>

            <th width="15%" class="text-right">الحالة</th>

        </tr>

        </thead>
        <tbody>
        <?php $x = ($this->uri->segment('3')*10)-10;
        
        if($x < 0) 
            $x=0;
             foreach($records3 as $record):
                $x++;
                
        ?>
       
            <tr data-toggle="tooltip" data-placement="bottom"  title="إضغط للتفاصيل">
                <td><!--span class="badge"-->
                <input type="checkbox" value="<?php echo $record->id?>" id="check" style="float: center;" name="check[]" class="ccc">
                <?php //echo $x?><!--/span--></td>
                
                <td data-toggle="modal" data-target="#myoda<?php echo $record->id ?>" onclick="return read('<?php echo $record->id?>');" ><span class="badge"><?php echo $x; ?></span></td>
                
                <td data-toggle="modal" data-target="#myoda<?php echo $record->id ?>" onclick="return read('<?php echo $record->id?>');" ><?php echo date('Y/m/d',$record->date)?></td>
                
                <td data-toggle="modal" data-target="#myoda<?php echo $record->id ?>" onclick="return read('<?php echo $record->id?>');" ><?php echo $record->name ?></td>
                
                <td data-toggle="modal" data-target="#myoda<?php echo $record->id ?>" onclick="return read('<?php echo $record->id?>');" ><?php echo $record->doc_name?> </td>
                
                <td data-toggle="modal" data-target="#myoda<?php echo $record->id ?>" onclick="return read('<?php echo $record->id?>');" ><?php echo $record->booking_date?> </td>

                <td >

                    <!--button type="button" class="btn btn-info btn-xs col-lg-5" data-toggle="modal" data-target="#myModal<?php echo $record->id ?>"><span class="glyphicon glyphicon-list"></span> محتوى الرسالة </button-->
                    <a  data-toggle="tooltip" data-placement="bottom" title="إلغاء" href="<?php echo base_url().'dashboard/app_approved/0/'.$record->id?>"  class="btn btn-warning btn-xs   "> <i class="fa fa-undo"></i></a>
                    
                </td>

            </tr>
            
            <div class="modal fade" id="myoda<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:550px">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"  aria-hidden="true">&times;</button>
                <h4 class="modal-title">تفاصيل الحجز</h4>
             </div>
             
             <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>تاريخ الحجز:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo date('Y/m/d',$record->date) ?></h5>
                           </div>
                      </div>
             
             <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>الإسم:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo $record->name?></h5>
                           </div>
                      </div>
                      <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>النوع:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php if($record->gender == 1) echo 'ذكر'; else echo 'أنثى';?></h5>
                           </div>
                      </div>
                     <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>البريد الألكتروني:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo $record->email ?></h5>
                           </div>
                      </div>
             <div class="row" style="margin-right:10px">
                            <div class="col-md-4">
                                  <h5>الجوال:</h5>
                             </div>
                            <div class="col-sm-8">
                               <h5><?php echo $record->phone ?></h5>
                          </div>
                      </div>
                <div class="row" style="margin-right:10px">
                                    <div class="col-md-4">
                                          <h5>العنوان:</h5>
                                       </div>
                                      <div class="col-sm-8">
                                           <h5><?php echo $record->address ?></h5>
                                      </div>
                                 </div>
                                 
                                 <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>القسم:</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                     <h5><?php echo $record->dep_name ?></h5>
                                                </div>
                                           </div>
                                 
                                 <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>الطبيب:</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                     <h5><?php echo $record->doc_name ?></h5>
                                                </div>
                                           </div>
                                           
                                            <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>الطبيب متاح خلال:</h5>
                                                 </div>
                                                <div class="col-sm-6">
                                                     <h5><?php 
                                                     foreach($records4[$record->id] as $time){
                                                        echo '<div class="alert alert-success">'.$day[$time->day].'  '.$time->time.'</div>';
                                                     }
                                                     
                                                     ?></h5>
                                                </div>
                                           </div>
                                           
                        <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>موعد الحجز:</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                     <h5><?php echo $record->booking_date ?></h5>
                                                </div>
                                           </div>
                    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" >إغلاق</button>
      </div>
    </div>
  </div>
</div>

        <?php endforeach ;?>

        </tbody>

    </table>

    

<?php 
else:
    echo '<div class="alert alert-danger" >
              لا توجد حجوزات مقبولة
              </div>';

endif;
 echo form_close()?>



 </div>


    
   <div class="tab-pane fade" id="tab2default">

<?php echo form_open_multipart('dashboard/delete_selected_booking',array('class'=>"form-horizontal",'role'=>"form" ))?>

<?php if(isset($records5)&&$records5!=null):?>


    <table id="no-more-tables" class="table " role="table">

        <caption class="text-right text-success">
        <input type="submit" name="del" value="حذف ما تم إختياره" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs " title="حذف ما تم إختياره">
        </caption>

        <thead>
        
        <tr>

            <th width="2%"><input type="checkbox" id="all" name="all2" value="1" style="float: center" ></th>
            
            <th width="3%">#</th>
            
            <th  class="text-right">تاريخ الحجز</th>

            <th  class="text-right">الإسم</th>

            <th class="text-right">الطبيب</th>
            
            <th class="text-right">موعد الحجز</th>

            <th width="15%" class="text-right">الحالة</th>

        </tr>

        </thead>
        <tbody>
        <?php $x = ($this->uri->segment('3')*10)-10;
        
        if($x < 0) 
            $x=0;
             foreach($records5 as $record):
                $x++;
                
        ?>
       
            <tr data-toggle="tooltip" data-placement="bottom"  title="إضغط للتفاصيل">
                <td><!--span class="badge"-->
                <input type="checkbox" value="<?php echo $record->id?>" id="check" style="float: center;" name="check[]" class="cc2">
                <?php //echo $x?><!--/span--></td>
                
                <td data-toggle="modal" data-target="#myod<?php echo $record->id ?>" onclick="return read('<?php echo $record->id?>');" ><span class="badge"><?php echo $x; ?></span></td>
                
                <td data-toggle="modal" data-target="#myod<?php echo $record->id ?>" onclick="return read('<?php echo $record->id?>');" ><?php echo date('Y/m/d',$record->date)?></td>
                
                <td data-toggle="modal" data-target="#myod<?php echo $record->id ?>" onclick="return read('<?php echo $record->id?>');" ><?php echo $record->name ?></td>
                
                <td data-toggle="modal" data-target="#myod<?php echo $record->id ?>" onclick="return read('<?php echo $record->id?>');" ><?php echo $record->doc_name?> </td>
                
                <td data-toggle="modal" data-target="#myod<?php echo $record->id ?>" onclick="return read('<?php echo $record->id?>');" ><?php echo $record->booking_date?> </td>

                <td >

                    <!--button type="button" class="btn btn-info btn-xs col-lg-5" data-toggle="modal" data-target="#myModal<?php echo $record->id ?>"><span class="glyphicon glyphicon-list"></span> محتوى الرسالة </button-->
                    <a  data-toggle="tooltip" data-placement="bottom" title="إلغاء" href="<?php echo base_url().'dashboard/app_approved/0/'.$record->id?>"  class="btn btn-warning btn-xs   "> <i class="fa fa-undo"></i></a>
                    
                </td>

            </tr>
            
            <div class="modal fade" id="myod<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:550px">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"  aria-hidden="true">&times;</button>
                <h4 class="modal-title">تفاصيل الحجز</h4>
             </div>
             
             <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>تاريخ الحجز:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo date('Y/m/d',$record->date) ?></h5>
                           </div>
                      </div>
             
             <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>الإسم:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo $record->name?></h5>
                           </div>
                      </div>
                      <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>النوع:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php if($record->gender == 1) echo 'ذكر'; else echo 'أنثى';?></h5>
                           </div>
                      </div>
                     <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>البريد الألكتروني:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo $record->email ?></h5>
                           </div>
                      </div>
             <div class="row" style="margin-right:10px">
                            <div class="col-md-4">
                                  <h5>الجوال:</h5>
                             </div>
                            <div class="col-sm-8">
                               <h5><?php echo $record->phone ?></h5>
                          </div>
                      </div>
                <div class="row" style="margin-right:10px">
                                    <div class="col-md-4">
                                          <h5>العنوان:</h5>
                                       </div>
                                      <div class="col-sm-8">
                                           <h5><?php echo $record->address ?></h5>
                                      </div>
                                 </div>
                                 
                                 <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>القسم:</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                     <h5><?php echo $record->dep_name ?></h5>
                                                </div>
                                           </div>
                                 
                                 <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>الطبيب:</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                     <h5><?php echo $record->doc_name ?></h5>
                                                </div>
                                           </div>
                                           
                                            <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>الطبيب متاح خلال:</h5>
                                                 </div>
                                                <div class="col-sm-6">
                                                     <h5><?php 
                                                   
                                                     foreach($records6[$record->id] as $time){
                                                         echo '<div class="alert alert-success">'.$day[$time->day].'  '.$time->time.'</div>';
                                                     }
                                                     
                                                     ?></h5>
                                                </div>
                                           </div>
                                           
                        <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>موعد الحجز:</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                     <h5><?php echo $record->booking_date ?></h5>
                                                </div>
                                           </div>
                    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" >إغلاق</button>
      </div>
    </div>
  </div>
</div>

        <?php endforeach ;?>

        </tbody>

    </table>

    

<?php 
else:
    echo '<div class="alert alert-danger" >
              لا توجد حجوزات مرفوضة
              </div>';

endif;
 echo form_close()?>



 </div>







            </div>



        </div>



    </div>



</div>

<script>
 function read(id){
    
        var dataString = 'id=' + id ;
       
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>/dashboard/complains',
            data:dataString,
            dataType: 'html',
            cache:false,
            
        });
        
        
    
        return false; 
        
 }

</script>



<style>
td { cursor: pointer; cursor: hand; }

</style>

<script>

    $(document).ready(function(){
    $('#all').on('click',function(){
        if(this.checked){
            $('.cc').each(function(){
                this.checked = true;
            });
        }else{
             $('.cc').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.cc').on('click',function(){
        if($('.cc:checked').length == $('.cc').length){
            $('#all').prop('checked',true);
        }else{
            $('#all').prop('checked',false);
        }
    });
 });
 
  $(document).ready(function(){
    $('#alll').on('click',function(){
        if(this.checked){
            $('.ccc').each(function(){
                this.checked = true;
            });
        }else{
             $('.ccc').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.ccc').on('click',function(){
        if($('.ccc:checked').length == $('.ccc').length){
            $('#alll').prop('checked',true);
        }else{
            $('#alll').prop('checked',false);
        }
    });
 });
 
 $(document).ready(function(){
    $('#all2').on('click',function(){
        if(this.checked){
            $('.cc2').each(function(){
                this.checked = true;
            });
        }else{
             $('.cc2').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.cc2').on('click',function(){
        if($('.cc2:checked').length == $('.cc2').length){
            $('#all2').prop('checked',true);
        }else{
            $('#all2').prop('checked',false);
        }
    });
 });

</script>


<script>

$(document).ready(function(){
    

$('#myodal').on('hidden.bs.modal', function () {
 window.location.reload();
 
 });
 });
</script>







