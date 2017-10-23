<h2 class="text-flat">إدارة الأسئلة العامة<span class="text-sm"><?php echo $title; ?></span></h2>

<ul class="breadcrumb pb30">

    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>


    <li class="active"><?php echo $title; ?></li>

</ul>
<?php if($_SESSION['role_id_fk'] == 1) {?>
<span id="message">

<?php

if(isset($_SESSION['message']))
   echo $_SESSION['message'];
unset($_SESSION['message']);

?>
   </span>
   
   
<div class="col-md-12">

        <div class="panel with-nav-tabs panel-default">

            <div class="panel-heading">

                <ul class="nav nav-tabs">

                    <li class="active"><a href="#tab0default" data-toggle="tab">الأسئلة العامة الواردة</a></li>

                    <li><a href="#tab1default" data-toggle="tab">الأسئلة المحولة</a></li>

                </ul>
            </div>


            <div class="panel-body">

                <div class="tab-content">

                    <div class="tab-pane fade in active" id="tab0default">


<?php echo form_open_multipart('dashboard/delete_selected_question',array('class'=>"form-horizontal",'role'=>"form" ))?>

<?php if(isset($records)&&$records!=null):?>


    <table id="no-more-tables" class="table " role="table">

        <caption class="text-right text-success">
        <input type="submit" name="del" value="حذف ما تم إختياره" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs " title="حذف ما تم إختياره">
        </caption>

        <thead>
        
        <tr>

            <th width="2%"><input type="checkbox" id="all" name="all" value="1" style="float: center" ></th>

            <th  class="text-right">التاريخ</th>
            
            <th class="text-right">الإسم</th>
            
            <th class="text-right">البريد الألكتروني</th>

            <th width="15%" class="text-right">التحكم</th>

        </tr>

        </thead>
        <tbody>
        <?php $x = ($this->uri->segment('3')*10)-10;
        
        if($x < 0) 
            $x=0;
            ?>
        <?php foreach($records as $record):
                $x++;
                /*if($record->active == 0)
                    $envelop = '<i class="fa fa-envelope"></i>';
                else
                    $envelop = '<i class="	fa fa-envelope-open-o"></i>';
                    
                    
                    
                    <tr data-toggle="tooltip" data-placement="bottom"  title="إضغط للتفاصيل">
                    <td data-toggle="modal" data-target="#myodal<?php echo $record->id ?>" onclick="return read('<?php echo $record->id?>');" >
                    <td  ><?php echo $envelop; ?></td>
                    */
                
        ?>
       
            <tr >
                <td><!--span class="badge"-->
                <input type="checkbox" value="<?php echo $record->id?>" id="check" style="float: center;" name="check[]" class="cc">
                <?php //echo $x?><!--/span--></td>
                
                
                
                <td  ><?php echo date('Y/m/d',$record->date)?></td>
                
                <td  ><?php echo $record->name ?></td>
                
                <td  ><?php echo $record->email?> </td>

                <td >

                    <!--button type="button" class="btn btn-info btn-xs col-lg-5" data-toggle="modal" data-target="#myModal<?php echo $record->id ?>"><span class="glyphicon glyphicon-list"></span> محتوى الرسالة </button-->
                    <a data-toggle="modal" data-placement="bottom" data-target="#myodal<?php echo $record->id ?>" title="تحويل إلى الطبيب المختص" class="btn btn-success btn-xs   "> <i class="fa fa-mail-forward"></i></a>
                    <a data-toggle="tooltip" data-placement="bottom" title="حذف" href="<?php echo base_url().'dashboard/delete_question/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   "> <i class="fa fa-trash"></i></a>
                    
                </td>

            </tr>
            
         

        <?php endforeach ;?>

        </tbody>

    </table>

  <?php 
  echo form_close();
  foreach($records as $recordd):?>
  
       <form name="form<?php echo $recordd->id  ?>" method="post" action="read_question/<?php echo $recordd->id ?>" role="form">
            <div class="modal fade" id="myodal<?php echo $recordd->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:550px">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"  aria-hidden="true">&times;</button>
                <h4 class="modal-title">التفاصيل </h4>
             </div>
             
             <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>الإسم:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo $recordd->name?></h5>
                           </div>
                      </div>
                     <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>العنوان:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo $recordd->city?></h5>
                           </div>
                      </div>
             <div class="row" style="margin-right:10px">
                            <div class="col-md-4">
                                  <h5>الجوال:</h5>
                             </div>
                            <div class="col-sm-8">
                               <h5><?php echo $recordd->phone ?></h5>
                          </div>
                      </div>
                <div class="row" style="margin-right:10px">
                                    <div class="col-md-4">
                                          <h5>البريد الألكتروني:</h5>
                                       </div>
                                      <div class="col-sm-8">
                                           <h5><?php echo $recordd->email ?></h5>
                                      </div>
                                 </div>
                        <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>السؤال:</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                     <h5><?php echo $recordd->question ?></h5>
                                                </div>
                                           </div>
                         <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>الطبيب المتخصص:</h5>
                                                 </div>
                                                <div class="col-sm-6">
                                                 
                                                 <?php
                                                 echo '<select name="doc'.$recordd->id.'" required>
                                                        <option value="قم بإختيار الطبيب">--قم بإختيار الطبيب--</option>';
                                                 foreach($doctors as $doc):
                                                 
                                                    echo '
                                                            <option value="'.$doc->id.'">'.$doc->name.'</option>
                                                          ';
                                                 
                                                 endforeach;
                                                 echo '</select>';
                                                 
                                                 ?>
                                                </div>
                                           </div>                  
                                           
                    <div class="modal-footer">
        <button type="submit" name="submit<?php echo $recordd->id ?>" class="btn btn-default">تحويل</button>
      </div>
    </div>
  </div>
</div>
</form>    
  
  <?php
  endforeach;
  
  ?>  

<?php 
else:
    echo '<div class="alert alert-danger" >
              لا توجد أسئلة واردة
              </div>';

endif;
 ?>


 </div>




     <div class="tab-pane fade" id="tab1default">

<?php echo form_open_multipart('dashboard/delete_selected_question',array('class'=>"form-horizontal",'role'=>"form" ))?>

<?php if(isset($records2)&&$records2!=null):?>


    <table id="no-more-tables" class="table " role="table">

        <caption class="text-right text-success">
        <input type="submit" name="dell" value="حذف ما تم إختياره" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs " title="حذف ما تم إختياره">
        </caption>

        <thead>
        
        <tr>

            <th width="2%"><input type="checkbox" id="alll" name="alll" value="1" style="float: center" ></th>
            
            

            <th  class="text-right">التاريخ</th>
            
            <th class="text-right">الإسم</th>
            
            <th class="text-right">البريد الألكتروني</th>

            <th width="15%" class="text-right">التحكم</th>

        </tr>

        </thead>
        <tbody>
        <?php $x = ($this->uri->segment('3')*10)-10;
        
        if($x < 0) 
            $x=0;
            ?>
        <?php foreach($records2 as $record):
                $x++;
             /*   if($record->active == 0)
                    $envelop = '<i class="fa fa-envelope"></i>';
                else
                    $envelop = '<i class="	fa fa-envelope-open-o"></i>';
                    <td data-toggle="modal" data-target="#myodall<?php echo $record->id ?>" ><?php echo $envelop; ?></td>*/
                
                                
        ?>
       
            <tr data-toggle="tooltip" data-placement="bottom"  title="إضغط للتفاصيل">
                <td><!--span class="badge"-->
                <input type="checkbox" value="<?php echo $record->id?>" id="check" style="float: center;" name="check1[]" class="ccc">
                <?php //echo $x?><!--/span--></td>
                
                
                
                <td data-toggle="modal" data-target="#myodall<?php echo $record->id ?>" ><?php echo date('Y/m/d',$record->date)?></td>
                
                <td data-toggle="modal" data-target="#myodall<?php echo $record->id ?>" ><?php echo $record->name ?></td>
                
                <td data-toggle="modal" data-target="#myodall<?php echo $record->id ?>" ><?php echo $record->email?> </td>

                <td >

                    <!--button type="button" class="btn btn-info btn-xs col-lg-5" data-toggle="modal" data-target="#myModal<?php echo $record->id ?>"><span class="glyphicon glyphicon-list"></span> محتوى الرسالة </button-->
                    <a  data-toggle="tooltip" data-placement="bottom"  title="الرجوع" href="<?php echo base_url().'dashboard/read_question/'.$record->id?>"  class="btn btn-success btn-xs   "> <i class="fa fa-undo"></i></a>

                    <a  data-toggle="tooltip" data-placement="bottom"  title="حذف" href="<?php echo base_url().'dashboard/delete_question/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   "> <i class="fa fa-trash"></i></a>
                    
                </td>

            </tr>
            
            <div class="modal fade www" id="myodall<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:550px">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">التفاصيل </h4>
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
                                                            <h5>العنوان:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo $record->city?></h5>
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
                                          <h5>الإيميل</h5>
                                       </div>
                                      <div class="col-sm-8">
                                           <h5><?php echo $record->email ?></h5>
                                      </div>
                                 </div>
                        <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>السؤال:</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                     <h5><?php echo $record->question ?></h5>
                                                </div>
                                           </div>
                                           
                        <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>الطبيب المحول إليه:</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                <?php
                                                $nam = '';
                                                foreach($doctors as $doc):
                                                if($doc->id == $record->forward)
                                                    $nam = $doc->name;
                                                else
                                                    $nam = '';
                                                    
                                                    echo '<h5>'.$nam.'</h5>';
                                                
                                                endforeach;
                                                
                                                ?>
                                                     
                                                </div>
                                           </div>
                                           
                    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
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
              لا توجد أسئلة محولة
              </div>';

endif;
 echo form_close()?>




 </div>


    



            </div>



        </div>



    </div>



</div>
<?php  }  ?>


<script>
/* function read(id){
    
        var dataString = 'id=' + id ;
       
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>/dashboard/complains',
            data:dataString,
            dataType: 'html',
            cache:false,
            
        });
        
        
    
        return false; 
        
 }*/

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

</script>


<script>
/*
function read(num){
    
        
        var dataString = 'num=' + num ;
        $.ajax({
            type:'post',
            url: '<?php// echo base_url() ?>/dashboard/question',
            data:dataString
            dataType: 'html',
            cache:false,
            success: function(html){
             $("#optionearea1").html(html);
            } 
        });
    
        //return false; 
      
 }
/*$(document).ready(function(){
    

$('.www').on('hidden.bs.modal', function () {
 window.location.reload();
 
 });
 });*/
</script>







