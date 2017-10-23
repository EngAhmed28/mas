<!--<h2 class="text-flat">إدارة المرضى والكشوفات<span class="text-sm"><?php echo $title; ?></span></h2>
-->
<ul class="breadcrumb pb30">

    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> <?php echo $metakeyword; ?> </a></li>



    <li class="active"><?php echo $title; ?></li>

</ul>

<span id="message">

<?php

if(isset($_SESSION['message']))

    echo $_SESSION['message'];

unset($_SESSION['message']);


?>
    </span>
    
<?php echo form_open_multipart('dashboard/sanad_sarf/',array('class'=>"form-horizontal",'role'=>"form" ))?>
<section class="col-md-12 col-xs-12" style="padding-bottom: 200px;">

<div class="well bs-component" data-sr="wait 0s, then enter left and hustle 100%">

 <fieldset>
 
    <div class="form-group col-xs-12" data-sr="wait 0.3s, then enter bottom and hustle 100%">
            
        <div class="col-xs-12">
         <div class="col-xs-1">
            <div class="checkbox">     
            
                <input type="checkbox" id="check" onchange="return dis();" data-style="android" data-size="mini" data-toggle="toggle" data-onstyle="danger" data-offstyle="success" data-on="تعطيل" data-off="تفعيل" data-width="70">
		 
            </div>	
        </div>
         <div class="col-xs-2 text-left">
	      
            <label for="inputPassword" class="control-label" >تحديد التاريخ </label>
  
        </div>
        <div class="col-xs-3">
            	
                		
       	    <input type="date" onkeydown="return false" class="datepicker form-control text-center" value="<?php echo date("Y-m-d"); ?>" name="out_date" id="out_date" readonly />
		        
            
        </div>  
          
        <div class="col-xs-2 text-left">
        
            <label for="inputPassword" class="control-label" >إسم العميل</label>
        
        </div>
           
        <div class="col-xs-4">
        
            <select name="patient_id" id="patient_id" class="selectpicker form-control" data-style="btn-info" data-live-search="true" style="width:100%;" onchange="get_code($('#patient_id').val())">
                
                <option data-tokens="ketchup mustard" style="text-align: right" value=" ">--قم بإختيار العميل--</option>
            
            <?php
            
            if(isset($patients) && $patients != null)
                foreach($patients as $patient)
                    echo '<option data-tokens="ketchup mustard" style="text-align: right" value="'.$patient->petient_id.'">'.$patient->a_name.'</option>';
            
            ?>
            
            </select>
        
        </div>
        </div>
        
        <div class="col-xs-12" id="optionearea1" style="margin-top: 20px;">
        <div class="col-xs-2 text-right">
        
            <label for="inputPassword" class="control-label" >رقم الفاتورة</label>
        
        </div>
        
            <div class="col-xs-4">
            
                <select name="fatora_num" id="fatora_num" class="form-control" data-style="btn-primary" onchange="get_code2($('#fatora_num').val())">
                        
                        <option value=" ">--قم بإختيار الفاتورة--</option>
                    
                </select>
            
            </div>
            
            <div class="col-xs-12" id="optionearea2" style="margin-top: 20px;">
        
        </div>
        
            </div>
            
        <input type="hidden" name="today" id="today" value="<?php echo date('Y-m-d')?>" >
    
    </div>
 
 </fieldset>
 
</div>
	
</section>
<?php echo form_close(); ?>


<script>                  
$(function() {
    $('#check').change(function() {
    							
           if(! $(this).prop('checked'))
                $('#out_date').attr("readonly", true);
           else
                $('#out_date').attr("readonly", false);
    });
        
    return false;
 })
</script>

<style>
.btn-mobileSelect-gen {
display:none!important;
}

#patient_id {
display:block!important;
}
#fatora_num {
display:block!important;
}
</style>

<script type="text/javascript">
    $('.selectpicker').selectpicker({
      });
</script>

<style>

.bootstrap-select{
    width: 100% !important;
}

</style>

<script>

function get_code(patient_id){

  if(patient_id != ' '){
      var dataString = 'patient_id='+ patient_id ;
      $.ajax({
          type:'post',
          url: '<?php echo base_url() ?>/dashboard/sanad_sarf',
          data:dataString,
          dataType: 'html',
          cache:false,
          success: function(html){
              $("#optionearea1").html(html);
          }
      });
  }
  if(patient_id == ' '){
    $("#optionearea1").html('<div class="col-xs-2 text-right"><label for="inputPassword" class="control-label" >رقم الفاتورة</label></div><div class="col-xs-4"><select name="fatora_num" id="fatora_num" class="form-control" data-style="btn-primary" onchange="get_code2($("#fatora_num").val())"><option value=" ">--قم بإختيار الفاتورة--</option></select></div>');
    $("#optionearea2").html('');
    }
}
</script>

<script>

function get_code2(fatora_num){
    
  if(fatora_num != ''){
      var dataString = 'fatora_num='+ fatora_num ;
      $.ajax({
          type:'post',
          url: '<?php echo base_url() ?>/dashboard/sanad_sarf',
          data:dataString,
          dataType: 'html',
          cache:false,
          success: function(html){
              $("#optionearea2").html(html);
          }
      });
  }
  else
    $("#optionearea2").html('');
}
</script>

<script>
document.getElementById("out_date").max = $('#today').val();
/*$(function(){
    $('[type="date"]').prop('max', function(){
        return new Date().toJSON().split('T')[0];
    });
});*/
</script>

<script>

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

</script>

<script>
function paidd(p){
    remain = $("#remain").val();
    if(parseInt(p) > parseInt(remain) || parseInt(p) == 0){
        alert("لا يجوز أن تكون القيمة المدفوعة أكبر من المتبقي أو تساوي صفراً");
        $("#payment").val('');
    }
}
</script>