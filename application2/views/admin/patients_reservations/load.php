



<?php


	if(!empty($doctors) && $doctors !=null){
?><div class="form-group">
  <label for="inputUser" class="control-label">الطبيب </label>
<select name="doctor_id"  id="doctor_id" class="form-control"> 
 <?php foreach($doctors as $row):

  ?>
  <option value="<?php echo $row->id?>"> <?php echo $row->name?></option> 
  <?php endforeach ?>
   </select>
</div>
<?php
	}else{
	   
       echo '<div class="form-group">
  <label for="inputUser" class="control-label">الطبيب </label>
<select name="doctor_id"  id="doctor_id"  class="form-control"> 
  <option value=""> لم يتم إضافة أطباء للقسم بعد</option> 
  <?php endforeach ?>
   </select>
</div>';
	}
?>


