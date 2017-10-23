
  <script type="text/javascript" src="<?php echo base_url()?>asisst/lib/jquery.timepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asisst/lib/jquery.timepicker.css" />
  <script type="text/javascript" src="<?php echo base_url()?>asisst/lib/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asisst/lib/bootstrap-datepicker.css" />
  <script type="text/javascript" src="<?php echo base_url()?>asisst/lib/site.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asisst/lib/site.css" />
<style>
.btn-mobileSelect-gen {
display:none!important;
}
#doctor_id {
display:block!important;
}
#depart_id{
    display:block!important;
}
.bs-component {
    padding: 10px 15px;
}
.table-bordered tbody tr td:first-child, .table-bordered tbody tr td:last-child {
    border-left: 1px #192330 solid !important;
    border-right: 0px #192330 solid !important;
}
.panel-body {
     padding: 0px;
}
.table thead>tr>th {
    background: #7da3ca;
    color: #ECF0F1;
    text-align: right;
}
.table-striped>tbody>tr:nth-child(odd)>td, .table-striped>tbody>tr:nth-child(odd)>th {

    vertical-align: middle;
}
</style>
    <ul class="breadcrumb pb30">
        <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> إدارة الحجوزات </a></li>
        <li class="active"><?php  echo $title; ?></li>
    </ul>
    <span id="message">
        <?php
        if(isset($_SESSION['message']))
            echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
</span>
<div class="well bs-component">
<fieldset>
<?php 
 if(isset($result) && $result !=null):
   echo    form_open_multipart('dashboard/update_patients_reservations/'.$result['id']); 
    
    $out['patient_national_id']=$result['patient_national_id'];
    $out['depart_id']=$result['depart_id'];
    $out['reservations_time']= date("h:i",$result['reservations_time']);
    $out['reservations_date']=date("Y-m-d",$result['reservations_date']);
    $out['doctor_id']=$result['doctor_id'];
    $out['notes']=$result['notes'];
    $out['patient_name']=$result['patient_name'];
    $out['tele']=$result['tele'];
   
    $out['readonly']='readonly="readonly"';
    $out['input']='  <button name="UPDATE"  id="button" value="UPDATE" type="submit" class="btn btn-primary">تعديل</button>';
 
  else:
  echo form_open_multipart('dashboard/patients_reservations');
    $out['patient_name']="";
    $out['tele']="";
    $out['patient_national_id']="";
    $out['depart_id']="";
    $out['reservations_time']="";
    $out['reservations_date']="";
    $out['doctor_id']="";
    $out['notes']="";
    $out['readonly']="";
    $out['input']='  <button name="ADD" value="ADD" id="button" type="submit" class="btn btn-primary">حفظ</button>';
 
  endif;
 ?>

  <div class="col-sm-9 col-xs-12">
<div class="col-md-4 col-sm-6 col-xs-12">
<div class="form-group">
  <label for="inputUser" class="control-label">تاريخ اليوم </label>
  <input type="date" name="reservations_date" id="reservations_date" onchange="return check($('#reservations_date').val())" value="<?php echo $out['reservations_date']?>" class="form-control" />
</div>
</div> 
<div class="col-md-4 col-sm-6 col-xs-12">
<div class="form-group">
  <label for="inputUser" class="control-label">إخنر العيادة  </label>
 
  <select class="form-control" id="depart_id" name="depart_id" onchange="return doc($('#depart_id').val());"> 
  <option> إختر </option>
  <?php foreach($depart as $row): 
  $selected="";if($row->id == $out['depart_id']){$selected="selected" ;} ?>
  <option value="<?php echo $row->id?>" <?php echo $selected?> > <?php echo $row->dep_name?></option> 
  <?php endforeach ?>
   </select>
</div>
</div> 
<div class="col-md-4 col-sm-6 col-xs-12" id="optionearea1">
<div class="form-group">
  <label for="inputUser" class="control-label">الطبيب </label>
<?php if(isset($result) && $result !=null): ?>
<select name="doctor_id" id="doctor_id"  class="form-control"> 
<?php foreach($doctors as $row): 
  $selected="";if($row->id == $out['doctor_id']){$selected="selected" ;} ?>
  <option value="<?php echo $row->id?>" <?php echo $selected?> > <?php echo $row->name?></option> 
  <?php endforeach ?>
  </select>
   </select><?php  else:  ?>
<select name="doctor_id" id="doctor_id"  class="form-control"> 
  <option> إختر الطبيب</option>
   </select>
<?php  endif;  ?>
</div>
</div> 
<div class="col-md-4 col-sm-6 col-xs-12">
<div class="form-group">
  <label for="inputUser" class="control-label">الوقت  </label>
 <input type="time" name="reservations_time" id="reservations_time" onchange="return time_chek($('#reservations_time').val() ,$('#doctor_id').val(),$('#reservations_date').val());" 
           value="<?php echo $out['reservations_time']?>" class="form-control" />
         <span id="optin"></span> 
        
</div>
</div> 
<div class="col-md-4 col-sm-6 col-xs-12">
<div class="form-group">
  <label for="inputUser" class="control-label">رقم الهوية  </label>
  <input type="number" name="patient_national_id" value="<?php echo $out['patient_national_id'] ?>" id="patient_national_id" 
  class="form-control"  onkeyup="return name_chek($('#patient_national_id').val());" <?php echo $out['readonly'];?>  />
</div>
</div> 
<div class="col-md-4 col-sm-6 col-xs-12" id="optionearea11">
<div class="form-group">
  <label for="inputUser" class="control-label">إسم المريض </label>
  <input type="text" name="patient_name" value="<?php echo $out['patient_name'] ;?>" class="form-control" <?php echo $out['readonly'];?> />
</div>
</div>
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="inputUser" class="control-label">رقم الهاتف </label>
            <input type="text" name="tele" id="tele" value="<?php echo $out['tele'] ;?>" class="form-control" <?php echo $out['readonly'];?> />
        </div>
        </div>
<div class="col-md-8 col-sm-6 col-xs-12">
<div class="form-group">
  <label for="inputUser" class="control-label">ملاحظات </label>
 <textarea name="notes"  class="form-control"><?php echo $out['notes'] ;?></textarea>
</div>
</div>
  </div>
    <div class="col-sm-3 col-xs-12">
        <div class="panel panel-primary" >
            <div class="panel-heading">
                <h3 class="panel-title">حجوزات خلال اليوم  <?php echo date("Y-m-d",time()); ?></h3>
            </div>
            <?php  if(isset($all_reservs_bydoc) && $all_reservs_bydoc !=null): ?>
            <div class="panel-body" style="height: 220px;overflow-y: scroll">
               <table class="table  table-striped table-bordered" style="margin-bottom: 0px;max-height: 220px;">
                   <thead>
                   <th>إسم الطبيب</th>
                   <th>رقم الحجز</th>
                   <th>التوقيت</th>
                   </thead>
                   <tbody> <tr>
                   <?php
                   
                    $a=1; foreach ($all_reservs_bydoc as $view):?>
                       <td rowspan="<?php echo sizeof($view->all_img)?>"><?php echo $view->patient_name ;?></td>
                       <?php $a=1; foreach ($view->all_img as $row):?>
                              <td> <?php echo $row->id; ?></td>
                               <td> <?php echo date('h:ia',$row->reservations_time); ?></td>
                               </tr>
                           <?php endforeach;?>
                   <?php endforeach;?>
                   </tbody>
               </table>
            </div>
            <?php else:
            echo '<div class="alert alert-danger">
  <strong>لا </strong>يوجد حججوزات  جلال اليوم .
</div>';   
            endif;?>
        </div>
    </div>


<div class="form-group">
            <div class="col-xs-10 col-xs-pull-2">
                <?php echo $out['input']?>
            </div>
</div>
 <br /> <br /> <br /> <br /> <br />
 
        <article>
            <script>
                $(function() {
                    $('#basicExample').timepicker();
                });
            </script>
        </article>
 
 
 
 
  <?php  echo form_close()?>
 
  </fieldset>


    </div>
    <div class="row">
    	<div class="col-md-12">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1default" data-toggle="tab">قائمة الحجوزات خلال اليوم </a></li>
                            <li><a href="#tab2default" data-toggle="tab">قائمة الحجوزات الأجلة </a></li>
                           
                         
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1default">
                        <!---------- today ----------->
                        
<?php
	if(isset($records) && $records!=null):

?>
  <table id="no-more-tables" class="table table-bordered" role="table">
        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>الحجوزات خلال اليوم  <?php  echo date('Y/m/d'); ?> </p></caption>
        <thead>
        <tr>
            <th width="2%">#</th>
            <th width="" class="text-right">إسم المريض</th>
             <th width="" class="text-right">رقم الهاتف</th>  
            <th width="" class="text-right">رقم الهوية</th>
            <th width="" class="text-right">الوقت</th>
            <th width="" class="text-right">إسم الطبيب </th>        
            <th width="" class="text-right">الإجراء</th>
        </tr>
        </thead>
        <tbody>
        <?php $count=1; foreach($records as $row):?>
    <tr>
    <td><?php echo $count++; ?></td>
    <td><?php echo $row->patient_name ?></td>
    <td><?php echo $row->tele ?></td>
    <td><?php echo $row->patient_national_id?></td>
    <td><?php echo date( "h:i a", $row->reservations_time)?></td>
    
  <?php
  $query = $this->db->query('SELECT name FROM doctor WHERE id = '.$row->doctor_id);
foreach ($query->result() as $doc)
{?>
  <td><?php echo $doc->name ?></td>
<?php }
  ?>
        <td>
      <a href="<?php  echo base_url().'dashboard/update_patients_reservations/'.$row->id?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> تعديل</a>
      <a  href="<?php echo base_url().'dashboard/delete_reservations/'.$row->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs">
                <i class="fa fa-trash"></i> حذف</a>
    </td>
    </tr>
<?php endforeach;?>
    </tbody>
</table>
<?php
	endif;
?>

                        
                        </div>
                        <div class="tab-pane fade" id="tab2default">


<?php
	if(isset($all_reserved_after) && $all_reserved_after!=null):
?>
  <table id="no-more-tables" class="table table-bordered" role="table">
        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>الحجوزات الأخري </p></caption>
        <thead>
        <tr>
            <th width="2%">#</th>
             <th width="" class="text-right">ناريخ اليوم</th>
            <th width="" class="text-right">إسم المريض</th>
              <th width="" class="text-right">رقم الهاتف</th>  
            <th width="" class="text-right">رقم الهوية</th>
            <th width="" class="text-right">الوقت</th>
             <th width="" class="text-right">إسم الطبيب </th>       
            <th width="" class="text-right">الإجراء</th>
        </tr>
        </thead>
        <tbody>
        <?php $count_=1; foreach($all_reserved_after as $rows):?>
    <tr>
    <td><?php echo $count_++; ?></td>
     <td><?php echo date('Y/m/d',$rows->reservations_date) ?></td>
    <td><?php echo $rows->patient_name ?></td>
        <td><?php echo $rows->tele?></td>
    <td><?php echo $rows->patient_national_id?></td>
    <td><?php echo date( "h:i a", $rows->reservations_time)?></td>
      <?php
  $query = $this->db->query('SELECT name FROM doctor WHERE id = '.$rows->doctor_id);
foreach ($query->result() as $doc)
{?>
  <td><?php echo $doc->name ?></td> 
<?php }
  ?>
    <td>
      <a href="<?php  echo base_url().'dashboard/update_patients_reservations/'.$rows->id?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> تعديل</a>
      <a  href="<?php  echo base_url().'dashboard/delete_reservations/'.$rows->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs">
                <i class="fa fa-trash"></i> حذف</a>
    </td>
    </tr>
<?php endforeach;?>
    </tbody>
</table>
<?php
	endif;
?>
                        
                        </div>
                        <div class="tab-pane fade" id="tab3default">Default 3</div>
               
                    </div>
                </div>
            </div>
        </div>
        </div>

<script>

    function check(date){
        var currentTime = new Date()
        var month = currentTime.getMonth() + 1
        var day = currentTime.getDate()
        var year = currentTime.getFullYear()
         var today =year + "-" + month  + "-" + day;
        if(date <today){
            alert("لابد ان يكون تاريخ الحجز بعد تاريخ اليوم !! ");
            location.reload();
        }
    }


 function doc(dep_id){
     var id = dep_id;
            var dataString = 'dep_id=' + id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>dashboard/load',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea1").html(html);
                }
            });
            return false;
 }
 function name_chek(nat_id){
     var id = nat_id;
            var dataString = 'nat_id=' + id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>dashboard/load',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea11").html(html);
                }
            });
            return false;
 }
function time_chek(reservations_time,doctor_id,reservations_date){
            var dataString ='reservations_time='+reservations_time+"&doctor_id="+doctor_id+"&reservations_date="+reservations_date;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>dashboard/load',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optin").html(html);
                }
            });
            return false;
 }
</script>



