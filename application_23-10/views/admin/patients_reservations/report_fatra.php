<style>
.btn-mobileSelect-gen {
display:none!important;
}
#doctor_id {
display:block!important;
}
</style>

<h2 class="text-flat"><span class="text-sm"> </span></h2>
 <ul class="breadcrumb pb30">
    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> إدارة الحجوزات </a></li>
    <li class="active"><?php echo $title; ?></li>
</ul>   





<div class="well bs-component">
<fieldset>

 <div class="col-xs-4">
<div class="form-group">
  <label for="inputUser" class="control-label">إختر الطبيب </label>
  <select name="doctor_id"  class="form-control" id="doctor_id"> 
              <option>إختر</option>
               <?php foreach($doctors as $row) :?>
              <option value="<?php echo $row->id?>"><?php echo $row->name?></option>
              <?php endforeach;?>
              </select>  
 </div>
</div> 


<div class="col-xs-4" >
<div class="form-group">
  <label for="inputUser" class="control-label"> من تاريخ </label>
  <input type="date" name="date_from" id="date_from"  class="form-control" />
</div>
</div> 

<div class="col-xs-4">
<div class="form-group">
  <label for="inputUser" class="control-label">إلي تاريخ </label>
<input type="date" name="date_to" id="date_to"  class="form-control" />
</div>
</div> 



<div class="form-group ">
            <div class="col-xs-10 col-xs-pull-2">
               <button name="ADD" value="ADD" type="button" onclick="return doc($('#doctor_id').val(),$('#date_from').val(),$('#date_to').val());" class="btn btn-primary">بحث</button>
            </div>
</div>


        
       
        
        
</fieldset>



</div>
<div  class="" id="optionearea1"></div> 

<script>

 function doc(doctor_id,date_from,date_to){
            var dataString = 'doctor_id=' + doctor_id +"&date_from="+date_from+"&date_to="+date_to;
          // alert(dataString);
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>dashboard/report_doctors_fatra',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea1").html(html);
                }
            });
            return false;
 }

</script>
