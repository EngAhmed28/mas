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

 <div class="form-group">
            <label for="inputUser" class="col-lg-2 control-label">إختر إسم الطبيب</label>
            <div class="col-lg-10 input-grup">
              <select name="doctor_id"  class="form-control" id="doctor_id" onchange="return doc($('#doctor_id').val());"> 
              <option>إختر</option>
               <?php foreach($doctors as $row) :?>
              <option value="<?php echo $row->id?>"><?php echo $row->name?></option>
              <?php endforeach;?>
              </select>  
            </div>
        </div>
        <br />
    <div id="optionearea1"></div>    
        
        
</fieldset>
</div>
<script>

 function doc(doctor_id){
    
     var id = doctor_id;
    //    alert(id);
            var dataString = 'doctor_id=' + id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>dashboard/report_one_doctors_dally',
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
