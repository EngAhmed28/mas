<h2 class="text-flat">إدارة الرسائل <span class="text-sm"><?php echo $title; ?></span></h2>

<ul class="breadcrumb pb30">

    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>



    <li class="active"><?php echo $title; ?></li>

</ul>

<span id="message">

<?php

if(isset($_SESSION['message']))

    echo $_SESSION['message'];

unset($_SESSION['message']);

?>
    </span>
    <?php if($_SESSION['role_id_fk'] == 1) {?>








<?php echo form_open_multipart('dashboard/delete_selected_contact',array('class'=>"form-horizontal",'role'=>"form" ))?>

<?php if(isset($records)&&$records!=null):?>


    <table id="no-more-tables" class="table " role="table">

        <caption class="text-right text-success">
        <input type="submit" name="del" value="حذف ما تم إختياره" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs " title="حذف ما تم إختياره">
        </caption>

        <thead>
        
        <tr>

            <th width="2%"><input type="checkbox" id="all" name="all" value="1" style="float: center" ></th>
            
            <th width="3%"> </th>

            <th  class="text-right">التاريخ</th>

            <th class="text-right">العنوان</th>
            
            <th class="text-right">أرسل بواسطة</th>

            <th width="2%" class="text-right">التحكم</th>

        </tr>

        </thead>
        <tbody>
        <?php $x = ($this->uri->segment('3')*10)-10;
        
        if($x < 0) 
            $x=0;
            ?>
        <?php foreach($records as $record):
                $x++;
                if($record->active == 0)
                    $envelop = '<i class="fa fa-envelope"></i>';
                else
                    $envelop = '<i class="	fa fa-envelope-open-o"></i>';
        ?>
       
            <tr>
                <td><!--span class="badge"-->
                <input type="checkbox" value="<?php echo $record->id?>" id="check" style="float: center;" name="check[]" class="cc">
                <?php //echo $x?><!--/span--></td>
                
                <td onclick="return read('<?php echo $record->id?>');"  ><?php echo $envelop; ?></td>
                
                <td onclick="return read('<?php echo $record->id?>');"><?php echo date('Y/m/d',$record->date)?></td>
                
                <td onclick="return read('<?php echo $record->id?>');"><?php echo $record->title?> </td>
                
                <td onclick="return read('<?php echo $record->id?>');"><?php echo $record->email?> </td>

                <td >

                    <!--button type="button" class="btn btn-info btn-xs col-lg-5" data-toggle="modal" data-target="#myModal<?php echo $record->id ?>"><span class="glyphicon glyphicon-list"></span> محتوى الرسالة </button-->

                    <a  href="<?php echo base_url().'dashboard/delete_contact/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   "> <i class="fa fa-trash"></i></a>
                    
                </td>

            </tr>
            
            <div class="modal fade" id="myModal<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:550px">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">تفاصيل الرسالة</h4>
             </div>
             
             <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>عنوان الرسالة:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo $record->title?></h5>
                           </div>
                      </div>
                     <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>التاريخ:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo date('Y/m/d',$record->date)?></h5>
                           </div>
                      </div>
             <div class="row" style="margin-right:10px">
                            <div class="col-md-4">
                                  <h5>إسم المرسل:</h5>
                             </div>
                            <div class="col-sm-8">
                               <h5><?php echo $record->name ?></h5>
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
                                                      <h5>نص الرسالة:</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                     <h5><?php echo $record->content ?></h5>
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

    <div class="text-center">
            
            <?php
                
                
                    echo $links;
                
                
                
            ?>
            
            </div>

<?php 
else:
    echo '<div class="alert alert-danger" >
              لا توجد رسائل واردة
              </div>';

endif;
 echo form_close();
 
 }?>
 
 <?php if($_SESSION['role_id_fk'] == 3) {?>










<?php echo form_open_multipart('dashboard/delete_selected_contact',array('class'=>"form-horizontal",'role'=>"form" ))?>

<?php if(isset($records)&&$records!=null):?>


    <table id="no-more-tables" class="table " role="table">

        <caption class="text-right text-success">
        <input type="submit" name="del" value="حذف ما تم إختياره" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs " title="حذف ما تم إختياره">
        </caption>

        <thead>
        
        <tr>

            <th width="2%"><input type="checkbox" id="all" name="all" value="1" style="float: center" ></th>
            
            <th width="3%"> </th>

            <th  class="text-right">التاريخ</th>

            <th class="text-right">الإسم</th>
            
            <th class="text-right">البريد الألكتروني</th>
            
            <th class="text-right">الحالة</th>

            <th width="2%" class="text-right">التحكم</th>

        </tr>

        </thead>
        <tbody>
        <?php $x = ($this->uri->segment('3')*10)-10;
        
        if($x < 0) 
            $x=0;
            ?>
        <?php foreach($records as $record):
                $x++;
                if($record->active == 0)
                    $envelop = '<i class="fa fa-envelope"></i>';
                else
                    $envelop = '<i class="	fa fa-envelope-open-o"></i>';
                    
                if($record->answer)
                    $answer = '<a class="btn btn-success btn-xs"><i class="fa fa-check"></i>تم الرد عليه</a>';
                else
                    $answer = '<a class="btn btn-warning btn-xs"><i class="fa fa-times"></i>لم يتم الرد</a>';
        ?>
       
            <tr data-toggle="tooltip" data-placement="bottom"  title="إضغط للتفاصيل">
                <td><!--span class="badge"-->
                <input type="checkbox" value="<?php echo $record->id?>" id="check" style="float: center;" name="check[]" class="cc">
                <?php //echo $x?><!--/span--></td>
                
                <td onclick="return read('<?php echo $record->id?>');"  ><?php echo $envelop; ?></td>
                
                <td onclick="return read('<?php echo $record->id?>');"><?php echo date('Y/m/d',$record->date)?></td>
                
                <td onclick="return read('<?php echo $record->id?>');"><?php echo $record->name?> </td>
                
                <td onclick="return read('<?php echo $record->id?>');"><?php echo $record->email?> </td>
                
                <td onclick="return read('<?php echo $record->id?>');"><?php echo $answer?> </td>

                <td >
                    <a data-toggle="tooltip" data-placement="bottom"  title="حذف" href="<?php echo base_url().'dashboard/delete_contact/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i></a>
                </td>

            </tr>
            
        

        <?php endforeach ;?>

        </tbody>

    </table>

    <div class="text-center">
            
            <?php
                
                
                    echo $links;
                
                
                
            ?>
            
            </div>


<?php  
else:
    echo '<div class="alert alert-danger" >
              لا توجد رسائل واردة
              </div>';

endif;
 echo form_close();
} ?>

<script>
 function read(id){
        var id = id;
        var url = '<?php echo base_url() ?>dashboard/viewmessage/' + id;
        window.location.replace(url);
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

</script>