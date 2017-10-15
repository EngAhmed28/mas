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

    
    
    <div class="col-md-12">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab0default" data-toggle="tab">الشكاوي والمقترحات الواردة</a></li>
                            <li class=""><a href="#tab1default" data-toggle="tab">الشكاوي والمقترحات المقروءة</a></li>
                          
                            
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab0default">
                        <?php 
                        
                        
                             ?>
    <?php echo form_open_multipart('dashboard/delete_selected_shakwa',array('class'=>"form-horizontal",'role'=>"form" ))?>

<?php if(isset($records0)&&$records0!=null):?>



    <table id="no-more-tables" class="table table-bordered" role="table">

      
<caption class="text-right text-success">
        <input type="submit" name="del" value="حذف ما تم إختياره" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs " title="حذف ما تم إختياره">
        </caption>
        <thead>

            <tr>

            <th width="2%"><input type="checkbox" id="all" name="all" value="1" style="float: center" ></th>
            
            <th width="3%"> </th>

            <th  class="text-right">التاريخ</th>
          <th class="text-right">نوع الطلب</th>
            <th class="text-right">العنوان</th>
            
            <th class="text-right">أرسل بواسطة</th>

            <th width="40%" class="text-right">التحكم</th>

        </tr>

        </thead>
        <tbody>
  <?php $x = ($this->uri->segment('3')*10)-10;
        
        if($x < 0) 
            $x=0;
            ?>
        <?php foreach($records0 as $record):
                $x++;
                if($record->active == 0)
                    $envelop = '<i class="fa fa-envelope"></i>';
                else
                    $envelop = '<i class="	fa fa-envelope-open-o"></i>';
                    
                    if($record->status == 1){
                        $status='شكوي';
                    }elseif($record->status == 2){
                          $status='إقتراح';
                    }
        ?>
       
            <tr>
                <td><!--span class="badge"-->
                <input type="checkbox" value="<?php echo $record->id?>" id="check" style="float: center;" name="check[]" class="cc">
                <?php //echo $x?><!--/span--></td>
                
                <td ><?php echo $envelop; ?></td>
                
                <td ><?php echo date('Y/m/d',$record->date)?></td>
                <td><?php echo $status ;?></td>
                
                <td ><?php echo $record->title?> </td>
                
                <td ><?php echo $record->email?> </td>

                  <td data-title="التحكم" class="text-center">
                
                    <button type="button" class="btn btn-info btn-xs col-lg-4" data-toggle="modal" data-target="#myModal<?php echo $record->id ?>"><i class="fa fa-list"></i> التفاصيل </button>

                    <a href="<?php echo base_url().'dashboard/suspend_shakwa/'.$record->id?>" class="btn btn-warning btn-xs col-lg-3"><i class="fa fa-pencil"></i>مقروء</a>
                    <a  href="<?php echo base_url().'dashboard/delete_shakwa/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-3"><i class="fa fa-trash"></i> حذف</a>

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
                                  <h5>رقم الجوال:</h5>
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
<?php endforeach;?>
        </tbody>

    </table>

<?php 
else:
echo '<div class="alert alert-danger" >
          لا توجد شكاوي واردة
          </div>';

endif;?>

                     <?php 
                        ?>
                        </div>
                         <div class="tab-pane fade" id="tab1default">
                   
    <?php echo form_open_multipart('dashboard/delete_selected_shakwa',array('class'=>"form-horizontal",'role'=>"form" ))?>

<?php if(isset($records1)&&$records1!=null):?>



    <table id="no-more-tables" class="table table-bordered" role="table">

      
<caption class="text-right text-success">
        <input type="submit" name="del" value="حذف ما تم إختياره" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs " title="حذف ما تم إختياره">
        </caption>
        <thead>

            <tr>

            <th width="2%"><input type="checkbox" id="all2" name="all2" value="1" style="float: center" ></th>
            
            <th width="3%"> </th>

            <th  class="text-right">التاريخ</th>
          <th class="text-right">نوع الطلب</th>
            <th class="text-right">العنوان</th>
            
            <th class="text-right">أرسل بواسطة</th>

            <th width="40%" class="text-right">التحكم</th>

        </tr>

        </thead>
        <tbody>
  <?php $x = ($this->uri->segment('3')*10)-10;
        
        if($x < 0) 
            $x=0;
            ?>
        <?php foreach($records1 as $record):
                $x++;
                if($record->active == 0)
                    $envelop = '<i class="fa fa-envelope"></i>';
                else
                    $envelop = '<i class="	fa fa-envelope-open-o"></i>';
                    
                    if($record->status == 1){
                        $status='شكوي';
                    }elseif($record->status == 2){
                          $status='إقتراح';
                    }
        ?>
       
            <tr>
                <td><!--span class="badge"-->
                <input type="checkbox" value="<?php echo $record->id?>" id="check" style="float: center;" name="check[]" class="cc2">
                <?php //echo $x?><!--/span--></td>
                
                <td ><?php echo $envelop; ?></td>
                
                <td ><?php echo date('Y/m/d',$record->date)?></td>
                <td><?php echo $status ;?></td>
                
                <td ><?php echo $record->title?> </td>
                
                <td ><?php echo $record->email?> </td>

                  <td data-title="التحكم" class="text-center">
                
                    <button type="button" class="btn btn-info btn-xs col-lg-4" data-toggle="modal" data-target="#myModal<?php echo $record->id ?>"><i class="fa fa-list"></i> التفاصيل </button>

                  
                    <a  href="<?php echo base_url().'dashboard/delete_contact/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-3"><i class="fa fa-trash"></i> حذف</a>

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
                                  <h5>رقم الجوال:</h5>
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
<?php endforeach;?>
        </tbody>

    </table>

<?php 
else:
echo '<div class="alert alert-danger" >
          لا توجد شكاوي مقروءة
          </div>';

endif;?>


                  

                        </div>
                        
                        
                        </div>
                        </div>
                        </div>
                        </div>

    
   
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

   
<script>

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
    