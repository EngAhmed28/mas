<?php
/*	
    if($patient!=null  && !empty($patient)){
    echo '<div class="form-group">
  <label for="inputUser" class="control-label">إسم المريض </label>
  <input type="text"  value="'.$patient[0]->patient_name.'" class="form-control" readonly="readonly" />
</div>

<div class="form-group">
  <label for="inputUser" class="control-label">رقم الهاتف </label>
  <input type="text"  value="'.$patient[0]->tele.'" class="form-control" readonly="readonly" />
</div>


';    
    }else {
        
        echo '<div class="form-group">
  <label for="inputUser" class="control-label">إسم المريض </label>
  <input type="text" name="patient_name" class="form-control" />
</div>

<div class="form-group">
  <label for="inputUser" class="control-label">رقم الهاتف </label>
  <input type="text" name="tele" class="form-control" />
</div>

';
        
        
    }
    */
    
    //-----------15-10-2017----------------------------------------------------------
    if($patient!=null  && !empty($patient)){
        $phone =$patient[0]->mobile;
    echo '<div class="form-group">
  <label for="inputUser" class="control-label">إسم المريض </label>
  <input type="text"  value="'.$patient[0]->a_name.'" class="form-control" readonly="readonly" />
</div>';
        echo"<script > $('#tele').val('$phone'); document.getElementById('tele').readOnly = true;</script>";
   }else {
        
        echo '<div class="form-group">
  <label for="inputUser" class="control-label">إسم المريض </label>
  <input type="text" name="patient_name" class="form-control" />
</div>
';
        echo"<script> $('#tele').val(''); document.getElementById('tele').readOnly = false </script >";
        
    }
    
   //-----------15-10-2017----------------------------------------------------------  
    
?>