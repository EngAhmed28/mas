<ul class="breadcrumb pb30">
    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> إدارة الملف الإلكتروني للمرضى</a></li>
    <li class="active"><?php echo $title; ?></li>
</ul>
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
    </span>


<?php if(isset($result) && $result!=null):?>
<!------------------------------------ EDITE --------------------------------------------------------------------------->
<div class="well bs-component" >

<table  class="table table-bordered" role="table">
        <thead>
        <tr>
            <th class="text-right" width="10%">#</th>
            <th width="15%" class="text-right">التاريخ</th>
            <th width="25%" class="text-right">إسم المريض</th>
            <th width="16%" class="text-right">رقم البطاقة</th>
            <th width="20%" class="text-right">الجنسية</th>
        </tr>
        </thead>
        <tbody>
        <tr>
           <td><span class="badge"> 1 </span> </td>
           <td><?php echo $result[0]->file_date ?></td>
           <td><?php echo $result[0]->a_name ?></td>
           <td><?php echo $result[0]->id_card ?></td>
           <td> <?php echo $result[0]->nationality ?></td>
        </tr>
        </tbody>
       </table>

<table  class="table table-bordered" role="table">
        <thead>
        <tr>
            <th class="text-right" width="10%">التاريخ</th>
            <th width="10%" class="text-right">العملية</th>
            <th width="10%" class="text-right">التكلفة</th>
            <th width="10%" class="text-right">الكمية</th>
            <th width="15%" class="text-right"> قيمة خصم كل عملية</th>
             <th width="20%" class="text-right">الاجمالى</th>
            <th width="20%" class="text-right">بعد الخصم</th>
        </tr>
        </thead>
        <tbody>
<!--
<div class="col-xs-12">
  <div class="col-xs-2"><label class="control-label">التاريخ</label></div>
  <div class="col-xs-2"><label class="control-label">العملية</label></div>
  <div class="col-xs-2"><label class="control-label">التكلفة</label></div>
  <div class="col-xs-1"><label class="control-label">العدد</label></div>
  <div class="col-xs-2"><label class="control-label">الخصم لكل عملية</label></div> 
  <div class="col-xs-2"><label class="control-label">الاجمالى</label></div>
  <div class="col-xs-1 text-center"><label class="control-label">بعد الخصم</label></div>
</div> -->

   <?php echo form_open_multipart('dashboard/UpdatePayment/'.$result[0]->id."/".$result[0]->sub_fat[0]->fatora_num);?>

<?php
    $x = 0; 
    $dis = 0; 
    $total = 0;
    $total_op = 0;
  
   
  $total_op_price=0;
  $total_after_des=0;
  foreach($result[0]->sub_op as $row_op):
    $dis++;
    
    $percentage_discount= (($row_op->operation_price * $row_op->opretion_amuont)- $row_op->discount_op ) * ($row_op->discount / 100);
   //  $percentage_discount=0;

 echo '<tr>
        <td>'.$row_op->operation_date.'</td>
        <td>'.$row_op->op_name.'</td>
        <td>'.sprintf("%.2f",$row_op->operation_price  ).'</td>
        <td style="color:blue;">'. $row_op->opretion_amuont.'</td>
        <td style="color:blue;">'. $row_op->discount_op.'</td>
        <td><input type="text" style="height:10px;width:100px;color:red;" id="same'.$dis.'" class="form-control" readonly value="'.sprintf("%.2f",((($row_op->operation_price * $row_op->opretion_amuont)  ))).'" /></td>
        <td><input type="text" style="height:10px;width:100px;" name="after_dis'.$dis.'" id="after_dis'.$dis.'" class="form-control" readonly value="'.sprintf("%.2f",( (($row_op->operation_price * $row_op->opretion_amuont)- $row_op->discount_op  )-$percentage_discount )).'" /></td>
       </tr>'; 

/*
echo '<div class="row">
      <div class="col-xs-2">'.$row_op->operation_date.'</div>
      <div class="col-xs-2">'.$row_op->op_name.'</div>
      <div class="col-xs-2">'.sprintf("%.2f",$row_op->operation_price  ).'</div>
      <div class="col-xs-1" style="color:blue;">'. $row_op->opretion_amuont.'</div>
       <div class="col-xs-2" style="color:blue;">'. $row_op->discount_op.'</div>
      <div class="col-xs-2">
      <input type="text" style="height:10px;color:red;" id="same'.$dis.'" class="form-control" readonly value="'.sprintf("%.2f",((($row_op->operation_price * $row_op->opretion_amuont)  ))).'" />
      </div>
      <div class="col-xs-1 text-left"  style="padding-left:30px;">
      <input type="text" style="height:10px;" name="after_dis'.$dis.'" id="after_dis'.$dis.'" class="form-control" readonly value="'.sprintf("%.2f",( (($row_op->operation_price * $row_op->opretion_amuont)- $row_op->discount_op  )-$percentage_discount )).'" />
      </div>
  </div>';
  */
    $total += ($row_op->operation_price ) ;
    $total_op+=$row_op->opretion_amuont;
    $total_op_price +=($row_op->operation_price * $row_op->opretion_amuont);
    $total_after_des +=( (($row_op->operation_price * $row_op->opretion_amuont)- $row_op->discount_op  )-$percentage_discount );
                  $fatora = $row_op->fatora_num;
                  $frist_payd = 0;
                  $op_id = $row_op->id;
                    if( $row_op->first_paid > 0 ){
                        $frist_payd=$row_op->first_paid ;
                         $op_id =$row_op->id ;
                    }                      
                        
endforeach;

echo '<tr>
       <td colspan="2"> الإجمـــالي</td>
       <td>'.sprintf("%.2f",$total).' </td>
       <td> '.$total_op.'</td>
       <td> --</td>
        <td><input type="text" style="height:10px;width:100px;color:red;" class="form-control" id="same"  value="'.sprintf("%.2f",($total_op_price)).'"  readonly=""/> </td>
         <td><input type="text" style="height:10px;width:100px;" class="form-control" name="after_dis" id="after_dis"  value="'.sprintf("%.2f",($total_after_des)).'" readonly=""/> </td>
      </tr>';


echo '  </tbody>
       </table>';



/*
echo '<div class="row alert-info">
<div class="col-xs-4"><label class="control-label">الإجمـــالي</label></div>
<div class="col-xs-2"><label class="control-label">'.sprintf("%.2f",$total).'</label></div>
<div class="col-xs-2"><label class="control-label">'.$total_op.'</label></div>
<div class="col-xs-1">
<input type="text" style="height:10px;width:85px;color:red;" class="form-control" id="same"  value="'.sprintf("%.2f",($total_op_price)).'"  readonly=""/>
</div>
<div class="col-xs-2 text-left" style="padding-left:30px;">
<input type="text" style="height:10px;width:85px;" class="form-control" name="after_dis" id="after_dis"  value="'.sprintf("%.2f",($total_after_des)).'" readonly=""/>
</div>
</div>';
*/



echo '
<div class="row"><br />
<div calss="col-xs-3" style="width:20%;float: right;">
 <!--   <input type="checkbox" id="check_percent" onchange="return enabel();"> -->
<label for="inputUser" class="control-label"> نسبة الخصم</label>

<input type="text" class="form-control text-center" value="'.$result[0]->sub_op[0]->discount.'" onkeyup=" discount(1,'.$dis.'); paid();" onkeypress="return isNumberKey(event)" name="percentage" id="percentage" style="height:10px;width:100px;margin-right:15px" placeholder="%"  /> 
</div>

<div calss="col-xs-3" style="width:20%;float: right; ">
 <!-- <input type="checkbox" id="check_paid" onchange="return enabel2();" checked="" /> -->
<label for="inputUser" class="control-label"> المبلغ المدفوع</label>

<input type="text" class="form-control text-center" value="'.$result[0]->sub_fat[0]->paid.'"   onkeyup="return paid();" onkeypress="return isNumberKey(event)" name="payment" id="payment" style="height:10px;width:100px;margin-right:15px"  /> 
</div>


           
   <div calss="col-xs-3" style="width:20%;float: right;margin-top:4px; ">
     <label for="inputUser" style="margin-right:20px" class="control-label">المدفوع مقدما</label>
     <input type="number" class="form-control text-center" onkeyup="return paid();" name="first_paid" id="first_paid" value="'.sprintf("%.2f",($frist_payd)).'" style="height:10px;width:100px;"  /> 
      <input type="hidden" name="operation_id" id="" value="'.$op_id.'"/>
   </div>
                          
   <div calss="col-xs-3" style="width:20%;float: right;margin-top:4px; ">
     <!-- <input type="checkbox" id="check_other_medical" onchange="return enabel3();" > -->
     <label for="inputUser" style="margin-right:20px" class="control-label">كشوفات اخرى</label>
     <input type="number" class="form-control text-center" onkeyup="return paid();" name="other_medical" id="other_medical" value="'.sprintf("%.2f",$result[0]->sub_fat[0]->other_medical).'" style="height:10px;width:100px;" /> 
   </div>                       
           
           <div calss="col-xs-3" style="width:20%;float: right;margin-top:4px; ">
<label for="inputUser" style="margin-right:20px" class="control-label">المتبقى</label>
<input type="text" class="form-control text-center" name="remains" id="remains" value="'.sprintf("%.2f",($result[0]->sub_fat[0]->remain)).'" style="height:10px;width:100px;"  /> 
</div>
           
                          
                          
                       </div>
                                         
                         <div class="row" style=" display:flow-root !important;; ">
                         <label for="inputUser" style="margin-right:20px" class="control-label">طريقة الدفع</label>';
  echo ' <select class="form" id="" name="paid_method" data-msid="777656" style="/* display: none; */">';
  $arr=array("--قم بإختيار الدفع--","كاش","كارت ATM ","كارت");
  foreach( $arr as $key=>$value){
     $selected=''; if($key == $result[0]->sub_fat[0]->paid_method) {$selected="selected";}
    echo ' <option value="'.$key.'"  '.$selected.'>'.$value.'</option>'; 
                 }
   echo'  </select>';
                      
echo'                     
                         
   <div class="col-xs-3" style="width:25%;float: right;margin-top:4px; ">
   <label for="inputUser" style="margin-right:20px" class="control-label">كاش</label>
    <input type="text" class="form-control text-center" name="cash" id="cash" value="'.$result[0]->sub_fat[0]->cash.'"  /> 
   </div>
                         
    <div class="col-xs-3" style="width:25%;float: right;margin-top:4px; ">
   <label for="inputUser" style="margin-right:20px" class="control-label">كارت  (ATM)</label>
    <input type="text" class="form-control text-center" name="atm" id="atm" value="'.$result[0]->sub_fat[0]->atm.'"  /> 
   </div>                        
                         
                         
         <div class="col-xs-3" style="width:25%;float: right;margin-top:4px; ">
   <label for="inputUser" style="margin-right:20px" class="control-label">كارت</label>
    <input type="text" class="form-control text-center" name="card" id="card" value="'.$result[0]->sub_fat[0]->card.'"  /> 
   </div>            
       
                          <input type="submit" name="ADD"  class="btn btn-danger" value="خروج"/>
                         </div>';  

?>

 <?php echo form_close()?>

</div>
<!------------------------------------ ALL FATORA ---------------------------------------------------------------------->
<?php else:?>
<?php if(isset($all_fatora) && $all_fatora!=null){?>
<div class="well bs-component" >
<table  class="table table-bordered" role="table">
        <thead>
        <tr>
            <th  class="text-right" width="10%">#</th>
            <th  class="text-right">رقم الفاتورة</th>
            <th  class="text-right">إسم المريض</th>
            <th  class="text-right">رقم بطاقة المريض </th>
            <th  class="text-right">قيمة الفاتورة</th>
            <th  class="text-right">تاريخ الفاتورة</th>
            <th  class="text-right">الأجراء</th>
        </tr>
        </thead>
        <tbody>
      <?php $count=1; foreach($all_fatora as $row): ?>
        <tr>
          <td> <?php echo $count++?></td>
          <td><?php echo $row->fatora_num?></td>
          <td><?php echo $row->a_name?></td>
          <td><?php echo $row->id_card?></td>
          <td><?php echo $row->total?></td>
          <td><?php echo $row->out_date?></td>
          <td>
           <a href="<?php echo base_url()."dashboard/UpdatePayment/".$row->p_id."/".$row->fatora_num?>" class="btn btn-warning btn-xs">
           <i class="fa fa-pencil"></i> تعديل</a>
           </td>
        </tr>
     <?php endforeach; ?>   
        </tbody>
       </table>
<?php }else{
    echo '<div class="alert alert-danger" >
     لايوجد فواتير
          </div>';
}?>


</div>
<?php	endif?>




<script>
function enabel(){
    
        var put = '#check_percent';
        var put2 = '#percentage';
        
            if(! $(put).prop('checked'))
                $(put2).attr("readonly", true);
            else{
                $(put2).attr("readonly", false);
                $(put2).focus();
            }
       
     return false;
   
}
</script>
<script>
function enabel3(){
        var put = '#check_other_medical';
        var put2 = '#other_medical';
            if(! $(put).prop('checked'))
                $(put2).attr("readonly", true);
            else{
                
                $(put2).attr("readonly", false);
                $(put2).focus();
               }
     return false;
}
</script>

<script>
function enabel2(){
    
        var put = '#check_paid';
        var put2 = '#payment';
        
            if(! $(put).prop('checked'))
                $(put2).attr("readonly", true);
            else{
                $(put2).attr("readonly", false);
                $(put2).focus();
            }
       
     return false;
   
}
</script>

<script>
function paid(){
   
     var put2 = '#payment';
    var put = '#after_dis';
    var put3 = '#remains';
    var put4 = '#other_medical';
    var put5 = '#first_paid';
    // alert($(put5).val());
      //  if(parseFloat($(put2).val()) > 0){
        if(parseFloat($(put2).val()) > parseFloat($(put).val()) ){
            alert("لا يجب أن تكون القيمة المدفوعة أكبر من أو تساوي القيمة المدفوعة");
            $(put2).val("");
            $(put3).val($(put).val());
        }
        else{
            cal = ( parseFloat($(put).val()) + parseFloat($(put4).val() )) - parseFloat($(put5).val()) - parseFloat($(put2).val()) ;
            $(put3).val(cal);
        }
  //  }
   /* else{
        $(put2).val("");
        $(put3).val($(put).val());
    } */
}
</script>

<script>
function discount(start,end){
    var put2 = '#percentage';
    var put3 = '#remains';
    if($(put2).val() >= 0 && $(put2).val() <= 100){
         //-----------------
            put_all = '#after_dis' ;
            same_all = '#same' ;
            cal = $(same_all).val() - parseFloat(($(same_all).val() * $(put2).val()) / 100);
             $(put_all).val(cal);
         //-----------------
        for (i = start; i <= end; i++) { 
            put = '#after_dis' + i;
            same = '#same' + i;
            cal = $(same).val() - parseFloat(($(same).val() * $(put2).val()) / 100);
            $(put).val(cal);
            $("#payment").val(0);
            $("#remains").val(0);
            $("#cash").val(0);
            $("#atm").val(0);
            $("#card").val(0);
            
        }
    }
    else{
        alert("لا يجوز أن تكون القيمة فارغة أو صفرا أو أكبر من 100%");
        for (i = start; i <= end; i++) { 
            same = '#same' + i;
            put = '#after_dis' + i;
            cal = $(same).val();
            $(put).val(cal);
            $(put3).val(cal);
            $(put2).val('');
             $("#payment").val(0);
             $("#remains").val(0);
             $("#cash").val(0);
             $("#atm").val(0);
             $("#card").val(0);
        }
    }
}
</script>