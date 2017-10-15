<!--
<h2 class="text-flat">إدارة المرضى والكشوفات<span class="text-sm"><?php echo $title; ?></span></h2>
-->


<ul class="breadcrumb pb30">

    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> إدارة الملف الإلكتروني للمرضى </a></li>



    <li class="active"><?php echo $title; ?></li>

</ul>

<span id="message">

<?php

if(isset($_SESSION['message']))

    echo $_SESSION['message'];

unset($_SESSION['message']);


?>
    </span>


       
        <?php echo form_open_multipart('dashboard/for_doctor/',array('class'=>"form-horizontal",'role'=>"form" ))?>
        
<div class="well bs-component" >

 <fieldset>
<ul class="breadcrumb pb30">
    <li><a href="#"><i class="fa fa-home"></i> قائمة بالكشوفات </a></li>

</ul>
        
    <?php
    
    
    

      
    
    if($_SESSION['role_id_fk'] == 3 ){
        
        $all_data = $records_for_doc;
        
    }elseif($_SESSION['role_id_fk'] == 1){
      
        
         $all_data = $records;
        
    }
   
    ?> 
             
        
        
        
        
            
<?php if(isset($all_data) && $all_data != null){  ?>

 <table  class="table table-bordered" role="table">

        <thead>

        <tr>

            <th width="10%" class="text-right">#</th>
            
            <th  width="15%" class="text-right">التاريخ</th>

            <th  width="25%" class="text-right">إسم المريض</th>

            <th width="15%" class="text-right">رقم البطاقة</th>

            <th width="25%" class="text-right">تاريخ الميلاد</th>
            
            <?php if($_SESSION['dep_id'] == 0)
                    echo '<th width="20%" class="text-right">القسم</th>';
                   else
                    echo '<th width="20%" class="text-right">الجنسية</th>'; ?>

        </tr>

        </thead>
</table>
       <div class="panel-group" style="margin-bottom: 3px;" id="accordion">
        <?php $xs = 0; 
         foreach($all_data as $record){ 
              $xs++; 
            if($record->operation_date != date("Y-m-d"))
                $cc = "rgb(34, 47, 65)";
            else
                $cc = "none";
                
            if($_SESSION['dep_id'] == 0)
                $td = $departs[$record->dep_id]->dep_name;
            else
                $td = $record->nationality;
          
        ?>
            

                <div class="panel panel-default <?php echo $cc; ?>">
                    <div class="panel-heading" style="background: <?php echo $cc ?>;" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $record->id ?>">
                        <a> 
                        
                        <?php echo '<div class="col-xs-1 text-right"><span class="badge">'.$xs.'</span></div>
                                    <div class="col-xs-2">'.$record->operation_date.'</div><div class="col-xs-3">'. 
                                   $record->a_name.'</div><div class="col-xs-2">'. 
                                   $record->id_card.'</div><div class="col-xs-2">'. 
                                   $record->birth_date.'</div><div class="col-xs-2">'. 
                                   $td.'</div>';    
                        
                        ?> 
                        
                        </a>
                        <br />
                        
                    </div>
                    
                    <div id="<?php echo $record->id ?>" class="panel-collapse collapse">
                    <form name="<?php echo $record->id ?>" method="post">
                        <div class="panel-body">
                        
                        <div class="col-xs-12" style="margin-bottom: 10px;">
                          
                            <div class="col-xs-2">
                              <label for="inputUser" class="control-label">تحديد التاريخ:</label>
                             <span>
                             <input type="checkbox" onclick="return checkb(<?php echo $record->id ?>);" id="check<?php echo $record->id ?>" name="check"></span>
                            
                          
                            </div>
                            <div class="col-xs-3">
                            <input type="date" class="form-control text-center" value="<?php echo date("Y-m-d"); ?>" name="operation_date<?php echo $record->id ?>" id="operation_date<?php echo $record->id ?>" readonly required >
                            </div>
                            
                            <div class="col-xs-2"></div>
                            <div class="col-xs-2">
                          <label for="inputUser" class="col-lg-1 control-label">الإجمالي:</label>
                          </div>
                          
                          <div class="col-xs-3">
                            <input type="hidden" class="form-control pricepop" step="any" value="0" id="total<?php echo $record->id ?>" name="total<?php echo $record->id ?>" readonly />
                          <input type="hidden" class="form-control pricepop" step="any" value="0" id="total_des<?php echo $record->id ?>" name="total_des<?php echo $record->id ?>" readonly/>
                     
                          <input type="number"   class="form-control" step="any" value="0" id="total_after<?php echo $record->id ?>" readonly="readonly" />
        
                        </div>
                          
                          
                           </div>
                        
                        
                        
                        <div class="col-xs-12">
                        <div class="col-xs-1">
                        <label for="inputUser" class="control-label">العمليات:</label>
                        </div>
                        <div class="col-xs-3">
                        
                        <input id="searchInput<?php echo $record->id ?>" onkeypress="return search(<?php echo $record->id ?>);" class="form-control" placeholder="البحث..">
                        </div>
                        
                        <br />
                         
                         
                         <table id="example" class="table table-striped table-bordered  " cellspacing="0" width="100%">
                        <thead>
                <tr>
                    <th class="text-right">#</th>
                    <th class="text-right">كود العملية</th>
                    <th class="text-right">العملية</th>
                    <th class="text-right">السعر</th>
                    <th class="text-right">الكمية</th>
                    <th class="text-right"> نسبة الخصم</th>
                </tr>
            </thead>
            <tbody id="fbody<?php echo $record->id ?>">
            
                        
                        <?php 
                        $script = '';
                        if(isset($operations[$record->dep_id])){
                            $x=0;
                        foreach($operations[$record->dep_id] as $operation){  ?>
                        
                      <tr>  
           
                            
<td><input type="checkbox" 
onclick="myFunction(<?php echo $record->id ?>,<?php echo $x ?>);calculate_price(<?php echo sizeof($operations[$record->dep_id])?>,<?php echo $record->id ?>);" 
value="<?php echo $operation->price ?>" 
id="operation<?php echo $operation->id ?>" name="operation[<?php echo $operation->id ?>]" class="<?php echo $record->id ?>" /></td> 
                <td><?php echo $operation->code ?></td>            
            <td><?php echo $operation->operation ?> </td>
            <td><?php echo $operation->price ?> </td> 
           <!------------------------------------------------------->
           <td> 
           <input type="number" value="0" readonly=""
              class="form-control input-sm  pull-right" 
              name="opretion_amuont<?php echo $operation->id ?><?php echo $record->id ?>"
              id="opretion_amuont<?php echo $x.$record->id;?>" 
               onkeyup="calculate_price(<?php echo sizeof($operations[$record->dep_id])?>,<?php echo $record->id ?>);"  />
           </td>
           <!-------------------------------------------------------->
            <td>
            
             <input type="number" id="dis_per<?php echo $x.$record->id;?>" name="dis_per<?php echo $operation->id ?><?php echo $record->id ?>" 
       onkeyup="clac(<?php echo sizeof($operations[$record->dep_id])?>,<?php echo $record->id ?>);"
     class="form-control input-sm  pull-right"  value="0" rel="3" step="any" readonly="readonly" />
            
          <input type="hidden"  name="pri<?php echo $x.$record->id;?>" id="pri<?php echo $x.$record->id;?>"  value="<?php echo $operation->price ?> " />  
          <input type="hidden"  name="dis_<?php echo $operation->id ?><?php echo $record->id ?>" id="dis_<?php echo $x.$record->id;?>" />  
          
            
            
            
            
            
            
             </td>                 
                          </tr>
                          <?php $x++; }
                          $script = 'onclick ="return checc('.$record->id.');"';
                          } ?>  
                
                
                </tbody>
            </table>
                          
 <label for="inputUser" class="control-label">تحديد القسم المحول إليه:</label>                         
<input type="checkbox" style="margin-right: 10px;" onchange="return enabel(<?php echo $record->id ?>);" id="transform<?php echo $record->id ?>" name="transform<?php echo $record->id ?>" class="<?php echo $record->id ?>">

<div class=" col-lg-9 input-grup">
		          <select class="form-control sele<?php echo $record->id ?>" id="to_dep" name="to_dep" required disabled >
                  <option value="">--قم بإختيار القسم--</option>
                  <?php
                  
                  if(isset($departs2)){
                    foreach($departs2 as $depart)
                        echo '<option value="'.$depart->id.'">'.$depart->dep_name.'</option>';
                  }
                  
                  ?>
                  </select>
				
                </div>
                
                
                
                
                
                
                          
                          </div>
                         <div class="col-xs-12">
                         
                          
                           <!--div class="col-xs-12" style="margin-bottom: 10px;">
                          
                            <div class="col-xs-3">
                              <label for="inputUser" class="control-label">تحديد التاريخ:</label>
                             <span>
                             <input type="checkbox" onclick="return checkb(<?php echo $record->id ?>);" id="check<?php echo $record->id ?>" name="check"></span>
                            
                          
                            </div>
                            <div class="col-xs-4">
                            <input type="date" class="form-control text-center" value="<?php echo date("Y-m-d"); ?>" name="operation_date<?php echo $record->id ?>" id="operation_date<?php echo $record->id ?>" readonly required >
                            </div>
                          
                           </div-->
                         
                          <br />
                          <div class="col-xs-12" >
                          <div class="col-xs-3">
                          <label for="inputUser" class="col-lg-1 control-label">التشخيص:</label>
                          </div>
                          
                           <div class="col-xs-9">
                          <input type="text" class="form-control" id="details<?php echo $record->id ?>" name="details<?php echo $record->id ?>"  >
                          </div>
                          
                          </div>
                          
                          
                          <div class="col-xs-12" style="margin-bottom: 10px;">
                          <!--div class="col-xs-2">
                          <label for="inputUser" class="col-lg-1 control-label">الإجمالي:</label>
                          </div>
                          
                          <div class="col-xs-3">
                          
                          <input type="text" class="form-control" value="0" id="total<?php echo $record->id ?>" name="total<?php echo $record->id ?>" readonly>
                          </div>
                          <div class="col-xs-5"></div-->
                          <div class="col-xs-2">
                    <input type="hidden" name="id" id="id" value="<?php echo $record->id ?>" />
                    <input type="hidden" name="dep_id" id="dep_id" value="<?php echo $record->dep_id ?>" />
                    <input type="hidden" name="petient_id" id="petient_id" value="<?php echo $record->petient_id ?>" />
                    <input type="hidden" name="fatora_num" id="fatora_num" value="<?php echo $record->fatora_num ?>" />
                    <input type="submit" name="add<?php echo $record->id ?>" value="حفظ" <?php echo $script; ?> class="btn btn-primary" >
                    
                          </div>
                          </div>
                      
                        </div>
                        
                        
                        </div>
                        
                        </form>
                        
                        
                    </div>
                    
                    
                    
                    
                </div>
                
                
            
        


        <?php } ?>

 
</div>

    <?php }else {?>
    
        <?php echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
  <strong>تنبية!</strong> لا يوجد مرضى
</div>'; } ?>



</fieldset>
</div>

 <?php echo form_close()?>

<style>
    
    .panel {
        box-shadow: none;
    }
</style>   


<script>
function clac(max,id) {
  kar= max;
  totalSum = 0;
          for (i = 0; i < kar; i++) { 
  per= parseFloat(  ($("#dis_per"+i+id).val()) );
  val_pric =($("#pri"+i+id).val());
  end = per ;
  $("#dis_"+i+id).val(end);
  totalSum +=  parseFloat(end);
  }           
   $("#total_des"+id).val(totalSum);


 var total_amount2 = parseFloat($("#total"+id).val()) - parseFloat($("#total_des"+id).val()) ;
       $("#total_after"+id).val(total_amount2);
 
}       
//---calculate_price
function calculate_price(max,id) {
  kar= max;
  totalSum = 0;
  //alert("a7a");
          for (i = 0; i < kar; i++) { 
  amount= parseFloat(  ($("#opretion_amuont"+i+id).val()) );
  val_pric =($("#pri"+i+id).val());
 //alert(amount);
  end = parseFloat(val_pric) * parseFloat(amount)  ;

  totalSum +=  parseFloat(end);
  }           
   $("#total"+id).val(totalSum);


 var total_amount2 = parseFloat($("#total"+id).val()) - parseFloat($("#total_des"+id).val()) ;
       $("#total_after"+id).val(total_amount2);
 
}
//--------------------------------------------------------------
function myFunction(row_id,x_value) {
    if(document.getElementById("dis_per"+x_value+row_id).readOnly == true){
         document.getElementById("dis_per"+x_value+row_id).readOnly = false;
         document.getElementById("opretion_amuont"+x_value+row_id).readOnly = false;
          $("#opretion_amuont"+x_value+row_id).val(1);
    }else{
        document.getElementById("dis_per"+x_value+row_id).readOnly = true;
        document.getElementById("opretion_amuont"+x_value+row_id).readOnly = true;  
        $("#opretion_amuont"+x_value+row_id).val(0);
        $("#dis_"+x_value+row_id).val(0);  
        $("#dis_per"+x_value+row_id).val(0);        
    }
}              
</script>






<script>
/*
function total_sum(id,op,price,max){ 
    var put2 = '#total'+id;
    var put1 = '.'+id+':checked';
    var put3 = '#dis_'+op+id;
    var clas = '.dis_'+id
    var put4 = '#operation'+op;
    var put5 = '#'
     $(put2).val(function() {
      var sum = 0;  
      $(put1).each(function() {
                sum += ~~$(this).val();    
      }); 
      return sum ;
    }).parent().show();
    
    
  
    
    
  kar= max;
  totalSum = 0;
          for (i = 0; i < kar; i++) { 
   per= parseFloat(  ($("#dis_per"+i+id).val()) );
  //val_pric =($("#pri"+i+id).val());
  end = per ;
  $("#dis_"+i+id).val(end);
  totalSum +=  parseFloat(end);
  }           
   $("#total_des"+id).val(totalSum);
  
  
  var total_amount2 = parseFloat($("#total"+id).val()) - parseFloat($("#total_des"+id).val()) ;
       $("#total_after"+id).val(total_amount2);
 
    
}
*/
</script>


<style>

input[type=date]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    display: none;
}

input[type=date]::-webkit-calendar-picker-indicator {
    -webkit-appearance: none;
    display: none;
}

</style>

<script>

function checkb(id){
    var put2 = '#check'+id;
    var put1 = '#operation_date'+id;
    $(put2).change(function() {
    							
           if(! $(this).prop('checked'))
                $(put1).attr("readonly", true);
           else
                $(put1).attr("readonly", false);
    });
} 

</script>

<style>
.panel-heading { cursor: pointer; cursor: hand; }

</style>


<script>

function checc(id){
    var checked=false;
	var elements = "."+id;
	for(var i=0; i < $(elements).length; i++){
		if($(elements)[i].checked) {
			checked = true;
		}
	}
	if (!checked) {
		alert('يجب على الأقل إختيار عملية واحدة');
	}
	return checked;  
}

</script>

<style>
.btn-mobileSelect-gen {
display:none!important;
}

#to_dep {
display:block!important;
}

</style>

<script>
function enabel(id){
    //$(function() {
        var put = '#transform'+id;
        var put2 = '.sele'+id;
        
        //$(put).change(function() {
            if(! $(put).prop('checked'))
                $(put2).attr("disabled", true);
            else
                $(put2).attr("disabled", false);
        //});
     return false;
     //})
}
</script>


<!--script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script-->
    
    
     <script src="<?php echo base_url()?>asisst/datatable/js/custom.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
    
   <script type="text/javascript">
   function search (id){
    var put = '#searchInput'+id;
    var put2 = '#fbody'+id;
    $(put).keyup(function () {
    var rows = $(put2).find("tr").hide();
    if (this.value.length) {
        var data = this.value.split(" ");
        $.each(data, function (i, v) {
            rows.filter(":contains('" + v + "')").show();
        });
    } else rows.show();
});
}
</script>