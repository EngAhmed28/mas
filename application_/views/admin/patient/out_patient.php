<!--<h2 class="text-flat">إدارة المرضى والكشوفات<span class="text-sm"><?php echo $title; ?></span></h2>
-->
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
<div class="well bs-component" >
 <fieldset>
<ul class="breadcrumb pb30">
    <li><a href="#"><i class="fa fa-home"></i>خروج مريض </a></li>
</ul>
<?php if(isset($records4) && $records4 != null){  ?>
<table  class="table table-bordered" role="table">
        <thead>
        <tr>
            <th class="text-right" width="10%">#</th>
            <th width="15%" class="text-right">التاريخ</th>
            <th width="25%" class="text-right">إسم المريض</th>
            <th width="16%" class="text-right">رقم البطاقة</th>
            <th width="25%" class="text-right">تاريخ الميلاد</th>
            <th width="20%" class="text-right">الجنسية</th>
            <!--th  class="text-right">القسم</th -->
        </tr>
        </thead>
       </table>
       <div class="panel-group" style="margin-bottom: 3px;" id="accordion">
        <?php $x = 0;
              $dis = 0; 
              $start = 0;
              $end = 0;  
         for($t = 0 ; $t < count($records4) ; $t++){ 
            if($records4[key($records4)][key($records4[key($records4)])][0]->operation_date != date("Y-m-d"))
                $cc = "rgb(34, 47, 65)";
            else
                $cc = "none";
            $x++; 
        ?>
        <div class="panel panel-default <?php echo $cc; ?>">
                    <div class="panel-heading" style="background: <?php echo $cc ?>;" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $records4[key($records4)][key($records4[key($records4)])][0]->id_card ?>">
                        <a> 
                        <?php echo '<div class="col-xs-1 text-right"><span class="badge">'.$x.'</span></div>
                                    <div class="col-xs-2">'.$records4[key($records4)][key($records4[key($records4)])][0]->operation_date.'</div><div class="col-xs-3">'. 
                                   $records4[key($records4)][key($records4[key($records4)])][0]->a_name.'</div><div class="col-xs-2">'. 
                                   $records4[key($records4)][key($records4[key($records4)])][0]->id_card.'</div><div class="col-xs-3">'. 
                                   $records4[key($records4)][key($records4[key($records4)])][0]->birth_date.'</div><div class="col-xs-1">'. 
                                   $records4[key($records4)][key($records4[key($records4)])][0]->nationality.'</div>';  
                        ?> 
                        </a>
                        <br />
                    </div>
                    <div id="<?php echo $records4[key($records4)][key($records4[key($records4)])][0]->id_card ?>" class="panel-collapse collapse">
                    <br />
                    <form name="form<?php echo $t ?>" method="post" action="exitt/<?php echo $t ?>">
                    <?php
                    $total = 0;
                    $total_paid = 0;
                    $frist_payd=0;
                    $data = '';
                    $paid='';
                    $op_id=0;
                    $patient_id = $records4[key($records4)][key($records4[key($records4)])][0]->p_id;
                    for($d = 0 ; $d < count($records4[key($records4)]) ; $d++){
                        if($records4[key($records4)][key($records4[key($records4)])][0]->to_dep != 0)
                            $to_dep = $departs[$records4[key($records4)][key($records4[key($records4)])][0]->to_dep]->dep_name;
                        else
                            $to_dep = '-';
                    echo '<div class="col-xs-12 alert alert-warning">
                                  <div class="col-xs-1"><label class="control-label">القسم:</label></div><div class="col-xs-8">'.$departs[key($records4[key($records4)])]->dep_name.'</div>
                                  <div class="col-xs-2"><label class="control-label">التحويل إلى قسم:</label></div>'.$to_dep.'
                              </div>
                    <div class="col-xs-12">
                                  <div class="col-xs-2"><label class="control-label">التاريخ</label></div>
                                  <div class="col-xs-3"><label class="control-label">العملية</label></div>
                                  <div class="col-xs-2"><label class="control-label">المبلغ</label></div>
                                  <div class="col-xs-2"><label class="control-label">المدفوع</label></div>
                                  <div class="col-xs-1"><label class="control-label">الباقي</label></div>
                                  <div class="col-xs-2 text-center"><label class="control-label">بعد الخصم</label></div>
                              </div>';
                    $start = $dis+1;
                    for($s = 0 ; $s < count($records4[key($records4)][key($records4[key($records4)])]) ; $s++){
                        $dis++;
echo '<div class="col-xs-12">
      <div class="col-xs-2">'.$records4[key($records4)][key($records4[key($records4)])][$s]->operation_date.'</div>
      <div class="col-xs-3">'.$operation[$records4[key($records4)][key($records4[key($records4)])][$s]->operation_id]->operation.'</div>
      <div class="col-xs-2">'.sprintf("%.2f",($records4[key($records4)][key($records4[key($records4)])][$s]->operation_price * $records4[key($records4)][key($records4[key($records4)])][$s]->opretion_amuont)).'</div>
      <div class="col-xs-2" style="color:blue;">'.sprintf("%.2f",$records4[key($records4)][key($records4[key($records4)])][$s]->paid).'</div>
      <div class="col-xs-1">
      <input type="text" style="height:10px;width:85px;color:red;" id="same'.$dis.'" class="form-control" readonly value="'.sprintf("%.2f",((($records4[key($records4)][key($records4[key($records4)])][$s]->operation_price * $records4[key($records4)][key($records4[key($records4)])][$s]->opretion_amuont) - $records4[key($records4)][key($records4[key($records4)])][$s]->discount_op  ) - $records4[key($records4)][key($records4[key($records4)])][$s]->paid)).'" />
      </div>
      <div class="col-xs-2 text-left"  style="padding-left:30px;">
      <input type="text" style="height:10px;width:85px;" name="after_dis'.$dis.'" id="after_dis'.$dis.'" class="form-control" readonly value="'.sprintf("%.2f",( (($records4[key($records4)][key($records4[key($records4)])][$s]->operation_price * $records4[key($records4)][key($records4[key($records4)])][$s]->opretion_amuont) - $records4[key($records4)][key($records4[key($records4)])][$s]->discount_op  ) -$records4[key($records4)][key($records4[key($records4)])][$s]->paid)).'" />
      </div>
  </div>';
   $total += ($records4[key($records4)][key($records4[key($records4)])][$s]->operation_price * $records4[key($records4)][key($records4[key($records4)])][$s]->opretion_amuont) - $records4[key($records4)][key($records4[key($records4)])][$s]->discount_op  ;

                        $op_id=$records4[key($records4)][key($records4[key($records4)])][$s]->id;
                        if($records4[key($records4)][key($records4[key($records4)])][$s]->first_paid >0 ){
        $op_id=$records4[key($records4)][key($records4[key($records4)])][$s]->id;
     }
  $frist_payd+=$records4[key($records4)][key($records4[key($records4)])][$s]->first_paid;
    
$data.=$records4[key($records4)][key($records4[key($records4)])][$s]->id.'-';
$paid .= $dis.'-';
$fatora = $records4[key($records4)][key($records4[key($records4)])][$s]->fatora_num;
}
next($records4[key($records4)]);
}
$dis++;
$end = $dis;
$sc = "location.href='".base_url()."dashboard/exitt/2/".$data."/".$paid."/patient#tab3default';";
echo '<div class="col-xs-12 alert-info">
  <div class="col-xs-5"><label class="control-label">الإجمـــالي</label></div>
  <div class="col-xs-2"><label class="control-label">'.sprintf("%.2f",$total).'</label></div>
  <div class="col-xs-2"><label class="control-label">'.sprintf("%.2f",$total_paid).'</label></div>
  <div class="col-xs-1">
  <input type="text" style="height:10px;width:85px;color:red;" class="form-control" id="same'.$dis.'" readonly value="'.sprintf("%.2f",($total-$total_paid)).'" />
  </div>
  <div class="col-xs-2 text-left" style="padding-left:30px;">
  <input type="text" style="height:10px;width:85px;" class="form-control" name="after_dis'.$dis.'" id="after_dis'.$dis.'" readonly value="'.sprintf("%.2f",($total-$total_paid)).'" />
  </div>
  </div>


<div class="col-xs-12"><br />
<div calss="col-xs-3" style="width:20%;float: right; ">
  <input type="checkbox" id="check_percent'.$t.'" onchange="return enabel('.$t.');" >
  <label for="inputUser" class="control-label">تحديد نسبة الخصم</label>
  <input type="text" class="form-control text-center" onkeyup="discount('.$start.','.$end.','.$t.');paid('.$end.','.$t.');" onkeypress="return isNumberKey(event)" name="percentage'.$t.'" id="percentage'.$t.'" style="height:10px;width:100px;margin-right:15px" placeholder="%" readonly />
</div>

<div calss="col-xs-3" style="width:20%;float: right; ">
  <input type="checkbox" id="check_paid'.$t.'" onchange="return enabel2('.$t.');" >
  <label for="inputUser" class="control-label">تحديد المبلغ المدفوع</label>
  <input type="text" class="form-control text-center" onkeyup="return paid('.$end.','.$t.');" onkeypress="return isNumberKey(event)" name="payment'.$t.'" id="payment'.$t.'" value="'.sprintf("%.2f",0).'" style="height:10px;width:100px;margin-right:15px" readonly />
</div>

<div calss="col-xs-3" style="width:20%;float: right;margin-top:4px; ">
  <label for="inputUser" style="margin-right:20px" class="control-label">المدفوع مقدما</label>
  <input type="number" class="form-control text-center" onkeyup="return paid('.$end.','.$t.');" name="first_paid'.$t.'" id="first_paid'.$t.'" value="'.sprintf("%.2f",($frist_payd)).'" style="height:10px;width:100px;"  />
 <input type="hidden" name="operation_id'.$t.'" id="" value="'.$op_id.'"/>
</div>

  <div calss="col-xs-3" style="width:20%;float: right;margin-top:4px; ">
   <input type="checkbox" id="check_other_medical'.$t.'" onchange="return enabel3('.$t.');" >
  <label for="inputUser" style="margin-right:20px" class="control-label">كشوفات اخرى</label>
  <input type="number" class="form-control text-center" onkeyup="return paid('.$end.','.$t.');" name="other_medical'.$t.'" id="other_medical'.$t.'" value="'.sprintf("%.2f",0).'" style="height:10px;width:100px;" readonly="" />
</div>



  <!------------------------>
  <div calss="col-xs-3" style="width:20%;float: right;margin-top:4px; ">
  <label for="inputUser" style="margin-right:20px" class="control-label">المتبقى</label>
  <input type="text" class="form-control text-center" name="remains'.$t.'" id="remains'.$t.'" value="'.sprintf("%.2f",($total-$total_paid - $frist_payd)).'" style="height:10px;width:100px;" readonly />
  </div>

  <!------------------------>
</div><br /><br />
                       
                       
                         <div class="col-xs-12" style=" display:flow-root !important; ">
                         <label for="inputUser" style="margin-right:20px" class="control-label">طريقة الدفع</label>
                <select class="form" id="" name="paid_method" data-msid="777656" style="/* display: none; */">
      <option value="0">--قم بإختيار الدفع--</option>
        <option value="1">كاش</option>
         <option value="2">كارت ATM </option>
             <option value="3">كارت</option>
      </select>
   <div class="col-xs-3" style="width:25%;float: right;margin-top:4px; ">
   <label for="inputUser" style="margin-right:20px" class="control-label">كاش</label>
    <input type="text" class="form-control text-center" name="cash" id="cash" value="0"  /> 
   </div>
    <div class="col-xs-3" style="width:25%;float: right;margin-top:4px; ">
   <label for="inputUser" style="margin-right:20px" class="control-label">كارت  (ATM)</label>
    <input type="text" class="form-control text-center" name="atm" id="atm" value="0"  /> 
   </div>                        
         <div class="col-xs-3" style="width:25%;float: right;margin-top:4px; ">
   <label for="inputUser" style="margin-right:20px" class="control-label">كارت</label>
    <input type="text" class="form-control text-center" name="card" id="card" value="0"  /> 
   </div>                      
                          <button type="submit" name="add'.$t.'" onclick="'.$sc.'" class="btn btn-danger" ><i class="fa fa-sign-out fa-lg"></i> خروج</button>
                          <input type="hidden" name="data'.$t.'" value="'.$data.'" />
                          <input type="hidden" name="paid'.$t.'" value="'.$paid.'" />
                          <input type="hidden" name="total'.$t.'" value="'.$end.'" />
                          <input type="hidden" name="total_paid'.$t.'" value="'.$total_paid.'" />
                          <input type="hidden" name="patient_id'.$t.'" value="'.$patient_id.'" />
                          <input type="hidden" name="check" value="2" />
                          <input type="hidden" name="fatora_num'.$t.'" value="'.$fatora.'" />
                          <input type="hidden" name="page" value="out_patient" />
                          <!--a href="'.base_url().'dashboard/exitt/2/'.$data.'/'.$paid.'/out_patient" class="btn btn-danger btn-xs col-lg-2"><i class="fa fa-sign-out"></i> خروج</a-->
                          </div>
                          ';
        /*    echo ' 
             <div class="form-">
  <label  class=" control-label" > الدفع </label>                     
<select class="form" id="doc_id" name="doc_id"  style="display: none;">
      <option value="">--قم بإختيار الدفع--</option> 
      </select>
      </div>
      '     ;*/
                    ?>
                    </form>
                    </div>
                    </div>
        <?php 
        next($records4);
        } ?>
    </div>
    <?php }else {?>
        <?php echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
  <strong>تنبية!</strong> لا يوجد مرضى
</div>'; } 
?>
</fieldset>
</div>
<script>
function enabel(id){
        var put = '#check_percent'+id;
        var put2 = '#percentage'+id;
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
function enabel2(id){
        var put = '#check_paid'+id;
        var put2 = '#payment'+id;
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
function enabel3(id){
        var put = '#check_other_medical'+id;
        var put2 = '#other_medical'+id;
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
function discount(start,end,id){
    var put2 = '#percentage'+id;
    var put3 = '#remains'+id;
    if($(put2).val() > 0 && $(put2).val() <= 100){
        for (i = start; i <= end; i++) { 
            put = '#after_dis' + i;
            same = '#same' + i;
            cal = $(same).val() - parseFloat(($(same).val() * $(put2).val()) / 100);
            $(put).val(cal);
            $(put3).val(cal);
        
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
        }
    }
}
</script>
<script>
function paid(end,id){
    var put2 = '#payment'+id;
    var put = '#after_dis' + end;
    var put3 = '#remains'+id;
    var put4 = '#other_medical'+id;
    var put5 = '#first_paid'+id;
     //  alert($(put5).val());
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