<h2 class="text-flat">إدارة الحجوزات الطبية<span class="text-sm"><?php echo $title; ?></span></h2>

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

                    <li class="active"><a href="#tab0default" data-toggle="tab">الحجوزات الواردة</a></li>

                    <li><a href="#tab1default" data-toggle="tab">الحجوزات اليوم </a></li>
                       <li><a href="#tab2default" data-toggle="tab">الحجوزات الغير موافق عليها  </a></li>
                           <li><a href="#tab3default" data-toggle="tab">الحجوزات الموافق عليها   </a></li>

                </ul>
            </div>


            <div class="panel-body">

                <div class="tab-content">

                    <div class="tab-pane fade in active" id="tab0default">


<?php echo form_open_multipart('dashboard/delete_selected_question',array('class'=>"form-horizontal",'role'=>"form" ))?>

<?php if(isset($records)&&$records!=null):?>


    <table id="no-more-tables" class="table " role="table">

     

        <thead>
        
        <tr>

        <th  class="text-right">#</th>

            <th  class="text-right">التاريخ</th>
            
            <th class="text-right">الإسم</th>
            
            <th class="text-right">رقم الهوية </th>

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
                        if($record->suspend == 1)
            {
                $class = 'success';
                $title = 'موافق';
            }
            else
            {
                $class = 'danger';
                $title = 'غير موافق';
            }
                
        ?>
       
            <tr >
              
                <td><?php echo $x?></td>
          <td data-toggle="modal" data-target="#myodall<?php echo $record->id ?>" ><?php echo date('Y/m/d',$record->date)?></td>
                
                <td data-toggle="modal" data-target="#myodall<?php echo $record->id ?>" ><?php echo $record->first_name ?></td>
                
                <td data-toggle="modal" data-target="#myodall<?php echo $record->id ?>" ><?php echo $record->n_file?> </td>


                <td >

                    <!--button type="button" class="btn btn-info btn-xs col-lg-5" data-toggle="modal" data-target="#myModal<?php echo $record->id ?>"><span class="glyphicon glyphicon-list"></span> محتوى الرسالة </button-->
                   <a  href="<?php echo base_url().'dashboard/suspend_times/'.$record->id.'/'.$class?>" class="btn btn-<?php echo $class ?> btn-xs col-lg-8"><?php echo $title ?> </a>
                    <a data-toggle="tooltip" data-placement="bottom" title="حذف" href="<?php echo base_url().'dashboard/delete_times/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   "> <i class="fa fa-trash"></i></a>
                    
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
                                                            <h5>الإسم الاول:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo $record->first_name?></h5>
                           </div>
                      </div>
                         <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>إسم العائلة:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo $record->last_name?></h5>
                           </div>
                      </div>
                     <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>العنوان:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo $record->address?></h5>
                           </div>
                      </div>
                      <?php
                      if($record->gender == 1){
                        $gender="ذكر";
                      }else{
                          $gender="أنثي";
                      }
                      ?>
                      
                        <div class="row" style="margin-right:10px">
                            <div class="col-md-4">
                                  <h5>النوع:</h5>
                             </div>
                            <div class="col-sm-8">
                               <h5><?php echo $gender ?></h5>
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
                                                      <h5>رقم الملف:</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                     <h5><?php echo $record->n_file ?></h5>
                                                </div>
                                           </div>
                                           
                                              <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>القسم المحول :</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                <?php
                                                $nams = '';
                                                foreach($depart_id as $depart):
                                                if($depart->id == $record->depart_id)
                                                    $nams = $depart->name;
                                                else
                                                    $nams = '';
                                                    
                                                    echo '<h5>'.$nams.'</h5>';
                                                
                                                endforeach;
                                                
                                                ?>
                                                     
                                                </div>
                                           </div>
                      <!--  <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>الطبيب المحول :</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                <?php
                                                $nam = '';
                                                foreach($doctor_id as $doc):
                                                if($doc->id == $record->doctor_id)
                                                    $nam = $doc->name;
                                                else
                                                    $nam = '';
                                                    
                                                    echo '<h5>'.$nam.'</h5>';
                                                
                                                endforeach;
                                                
                                                ?>
                                                     
                                                </div>
                                           </div>-->
                                           
                                              <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>ميعاد الكشف المراد:</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                     <h5><?php echo $record->times ?></h5>
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
  echo form_close();
 

else:
    echo '<div class="alert alert-danger" >
              لا توجد حجوزات واردة
              </div>';

endif;
 ?>


 </div>




     <div class="tab-pane fade" id="tab1default">

<?php echo form_open_multipart('dashboard/delete_selected_question',array('class'=>"form-horizontal",'role'=>"form" ))?>

<?php if(isset($records2)&&$records2!=null):?>


    <table id="no-more-tables" class="table " role="table">

     

        <thead>
        
        <tr>

        
<th class="text-right">#</th>
            <th  class="text-right">التاريخ</th>
            
            <th class="text-right">الإسم</th>
            
            <th class="text-right">رقم الهوية</th>

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
                        if($record->suspend == 1)
            {
                $class = 'success';
                $title = 'موافق';
            }
            else
            {
                $class = 'danger';
                $title = 'غير موافق';
            }
                
        ?>
       
            <tr >
             <td><?php echo $x?></td>  
                
          <td data-toggle="modal" data-target="#myodall2<?php echo $record->id ?>" ><?php echo date('Y/m/d',$record->date)?></td>
                
                <td data-toggle="modal" data-target="#myodall2<?php echo $record->id ?>" ><?php echo $record->first_name ?></td>
                
                <td data-toggle="modal" data-target="#myodall2<?php echo $record->id ?>" ><?php echo $record->n_file?> </td>


                <td >

                    <!--button type="button" class="btn btn-info btn-xs col-lg-5" data-toggle="modal" data-target="#myModal<?php echo $record->id ?>"><span class="glyphicon glyphicon-list"></span> محتوى الرسالة </button-->
                   <a  href="<?php echo base_url().'dashboard/suspend_times/'.$record->id.'/'.$class?>" class="btn btn-<?php echo $class ?> btn-xs col-lg-8"><?php echo $title ?> </a>
                    <a data-toggle="tooltip" data-placement="bottom" title="حذف" href="<?php echo base_url().'dashboard/delete_times/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   "> <i class="fa fa-trash"></i></a>
                    
                </td>

            </tr>
            
         
            <div class="modal fade www" id="myodall2<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:550px">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">التفاصيل </h4>
             </div>
             
             <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>الإسم الاول:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo $record->first_name?></h5>
                           </div>
                      </div>
                         <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>إسم العائلة:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo $record->last_name?></h5>
                           </div>
                      </div>
                     <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>العنوان:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo $record->address?></h5>
                           </div>
                      </div>
                      <?php
                      if($record->gender == 1){
                        $gender="ذكر";
                      }else{
                          $gender="أنثي";
                      }
                      ?>
                      
                        <div class="row" style="margin-right:10px">
                            <div class="col-md-4">
                                  <h5>النوع:</h5>
                             </div>
                            <div class="col-sm-8">
                               <h5><?php echo $gender ?></h5>
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
                                                      <h5>رقم الملف:</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                     <h5><?php echo $record->n_file ?></h5>
                                                </div>
                                           </div>
                                           
                                              <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>القسم المحول :</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                <?php
                                                $nams = '';
                                                foreach($depart_id as $depart):
                                                if($depart->id == $record->depart_id)
                                                    $nams = $depart->name;
                                                else
                                                    $nams = '';
                                                    
                                                    echo '<h5>'.$nams.'</h5>';
                                                
                                                endforeach;
                                                
                                                ?>
                                                     
                                                </div>
                                           </div>
                      <!--  <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>الطبيب المحول :</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                <?php
                                                $nam = '';
                                                foreach($doctor_id as $doc):
                                                if($doc->id == $record->doctor_id)
                                                    $nam = $doc->name;
                                                else
                                                    $nam = '';
                                                    
                                                    echo '<h5>'.$nam.'</h5>';
                                                
                                                endforeach;
                                                
                                                ?>
                                                     
                                                </div>
                                           </div>-->
                                           
                                              <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>ميعاد الكشف المراد:</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                     <h5><?php echo $record->times ?></h5>
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
           لا توجد حجوزات بتاريخ اليوم
              </div>';

endif;
 echo form_close()?>




 </div>


     <div class="tab-pane fade" id="tab2default">

<?php echo form_open_multipart('dashboard/delete_selected_question',array('class'=>"form-horizontal",'role'=>"form" ))?>

<?php if(isset($records3)&&$records3!=null):?>


    <table id="no-more-tables" class="table " role="table">

     

        <thead>
        
        <tr>

        
<th class="text-right">#</th>
            <th  class="text-right">التاريخ</th>
            
            <th class="text-right">الإسم</th>
            
            <th class="text-right">رقم الهوية </th>

         

        </tr>

        </thead>
        <tbody>
        <?php $x = ($this->uri->segment('3')*10)-10;
        
        if($x < 0) 
            $x=0;
            ?>
        <?php foreach($records3 as $record):
                $x++;
                        if($record->suspend == 1)
            {
                $class = 'success';
                $title = 'موافق';
            }
            else
            {
                $class = 'danger';
                $title = 'غير موافق';
            }
                
        ?>
       
            <tr >
              
                 <td><?php echo $x?></td>
               <td data-toggle="modal" data-target="#myodall3<?php echo $record->id ?>" ><?php echo date('Y/m/d',$record->date)?></td>
                
                <td data-toggle="modal" data-target="#myodall3<?php echo $record->id ?>" ><?php echo $record->first_name ?></td>
                
                <td data-toggle="modal" data-target="#myodall3<?php echo $record->id ?>" ><?php echo $record->n_file?> </td>


             

            </tr>
            
         
            <div class="modal fade www" id="myodall3<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:550px">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">التفاصيل </h4>
             </div>
             
             <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>الإسم الاول:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo $record->first_name?></h5>
                           </div>
                      </div>
                         <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>إسم العائلة:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo $record->last_name?></h5>
                           </div>
                      </div>
                     <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>العنوان:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo $record->address?></h5>
                           </div>
                      </div>
                      <?php
                      if($record->gender == 1){
                        $gender="ذكر";
                      }else{
                          $gender="أنثي";
                      }
                      ?>
                      
                        <div class="row" style="margin-right:10px">
                            <div class="col-md-4">
                                  <h5>النوع:</h5>
                             </div>
                            <div class="col-sm-8">
                               <h5><?php echo $gender ?></h5>
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
                                                      <h5>رقم الملف:</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                     <h5><?php echo $record->n_file ?></h5>
                                                </div>
                                           </div>
                                           
                                              <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>القسم المحول :</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                <?php
                                                $nams = '';
                                                foreach($depart_id as $depart):
                                                if($depart->id == $record->depart_id)
                                                    $nams = $depart->name;
                                                else
                                                    $nams = '';
                                                    
                                                    echo '<h5>'.$nams.'</h5>';
                                                
                                                endforeach;
                                                
                                                ?>
                                                     
                                                </div>
                                           </div>
                       <!-- <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>الطبيب المحول :</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                <?php
                                                $nam = '';
                                                foreach($doctor_id as $doc):
                                                if($doc->id == $record->doctor_id)
                                                    $nam = $doc->name;
                                                else
                                                    $nam = '';
                                                    
                                                    echo '<h5>'.$nam.'</h5>';
                                                
                                                endforeach;
                                                
                                                ?>
                                                     
                                                </div>
                                           </div>-->
                                           
                                              <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>ميعاد الكشف المراد:</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                     <h5><?php echo $record->times ?></h5>
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
           لا توجد حجوزات موافق عليها
              </div>';

endif;
 echo form_close()?>




 </div>

    

     <div class="tab-pane fade" id="tab3default">

<?php echo form_open_multipart('dashboard/delete_selected_question',array('class'=>"form-horizontal",'role'=>"form" ))?>

<?php if(isset($records4)&&$records4!=null):?>


    <table id="no-more-tables" class="table " role="table">

     

        <thead>
        
        <tr>

        
<th class="text-right">#</th>
            <th  class="text-right">التاريخ</th>
            
            <th class="text-right">الإسم</th>
            
            <th class="text-right">رقم  الهوية</th>

         

        </tr>

        </thead>
        <tbody>
        <?php $x = ($this->uri->segment('3')*10)-10;
        
        if($x < 0) 
            $x=0;
            ?>
        <?php foreach($records4 as $record):
                $x++;
                        if($record->suspend == 1)
            {
                $class = 'success';
                $title = 'موافق';
            }
            else
            {
                $class = 'danger';
                $title = 'غير موافق';
            }
                
        ?>
       
            <tr >
              
                 <td><?php echo $x?></td>
               <td data-toggle="modal" data-target="#myodall4<?php echo $record->id ?>" ><?php echo date('Y/m/d',$record->date)?></td>
                
                <td data-toggle="modal" data-target="#myodall4<?php echo $record->id ?>" ><?php echo $record->first_name ?></td>
                
                <td data-toggle="modal" data-target="#myodall4<?php echo $record->id ?>" ><?php echo $record->n_file?> </td>


             

            </tr>
            
         
            <div class="modal fade www" id="myodall4<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:550px">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">التفاصيل </h4>
             </div>
             
             <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>الإسم الاول:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo $record->first_name?></h5>
                           </div>
                      </div>
                         <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>إسم العائلة:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo $record->last_name?></h5>
                           </div>
                      </div>
                     <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>العنوان:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo $record->address?></h5>
                           </div>
                      </div>
                      <?php
                      if($record->gender == 1){
                        $gender="ذكر";
                      }else{
                          $gender="أنثي";
                      }
                      ?>
                      
                        <div class="row" style="margin-right:10px">
                            <div class="col-md-4">
                                  <h5>النوع:</h5>
                             </div>
                            <div class="col-sm-8">
                               <h5><?php echo $gender ?></h5>
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
                                                      <h5>رقم الملف:</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                     <h5><?php echo $record->n_file ?></h5>
                                                </div>
                                           </div>
                                           
                                              <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>القسم المحول :</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                <?php
                                                $nams = '';
                                                foreach($depart_id as $depart):
                                                if($depart->id == $record->depart_id)
                                                    $nams = $depart->name;
                                                else
                                                    $nams = '';
                                                    
                                                    echo '<h5>'.$nams.'</h5>';
                                                
                                                endforeach;
                                                
                                                ?>
                                                     
                                                </div>
                                           </div>
                     <!--   <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>الطبيب المحول :</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                <?php
                                                $nam = '';
                                                foreach($doctor_id as $doc):
                                                if($doc->id == $record->doctor_id)
                                                    $nam = $doc->name;
                                                else
                                                    $nam = '';
                                                    
                                                    echo '<h5>'.$nam.'</h5>';
                                                
                                                endforeach;
                                                
                                                ?>
                                                     
                                                </div>
                                           </div>-->
                                           
                                              <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>ميعاد الكشف المراد:</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                     <h5><?php echo $record->times ?></h5>
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
           لا توجد حجوزات موافق عليها
              </div>';

endif;
 echo form_close()?>




 </div>


            </div>



        </div>



    </div>



</div>



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







