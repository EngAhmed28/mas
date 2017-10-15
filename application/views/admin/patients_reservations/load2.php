<?php
	
    if($patient!=null  && !empty($patient)){
        $phone =$patient[0]->tele;
    echo '<div class="form-group">
  <label for="inputUser" class="control-label">إسم المريض </label>
  <input type="text"  value="'.$patient[0]->patient_name.'" class="form-control" readonly="readonly" />
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
    
?>