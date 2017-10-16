<?php
if(isset($_POST['product_id']))
    echo '<label>الوحدة:</label>
          <input type="text" class="form-control col-xs-6 no-padding" value="'.$units[$product[0]->p_unit_fk]->unit_name.'" name="unite" id="unite" readonly />';die;
?>
