<?php echo form_open_multipart('dashboard/add_jobs',array('class'=>"form-horizontal",'role'=>"form" ))?>
<?php

$numtel = $_POST['num'];

if($numtel!=0 && $numtel<=15)
 {
    for($i = 1 ; $i <= $numtel ; $i++){
        echo'<div class="col-sm-3"><br><label>عنوان المطلب '.$i.'</label></div>
             <div class="col-sm-3"><input type="text" name="job_requires_name'.$i.'" class="form-control" required="required" title="عنوان المطلب"/></div>
             <div class="col-sm-3"><br><label>المطلب '.$i.'</label></div>
             <div class="col-sm-3"><input type="text" name="job_requires_value'.$i.'" class="form-control" required="required" title=" المطلب"/></div>
             <br/><br/><br/>';
    }
      
 }
 else
    echo '<div class="alert alert-danger" >
              أقصى عدد 15
              </div>';

?>

<?php echo form_close()?>