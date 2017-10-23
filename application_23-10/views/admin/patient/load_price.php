<?php

if(isset($price)&&$price!=null){
    echo '<i class="fa fa-money"></i>
<input type="text" id="price" value="'.$price[0]->price.'"  name="price"  class="form-control text-right" placeholder=" السعر" readonly required>
<input type="hidden" value="'.$price[0]->id.'" name="operation_id">';
    
}
else
    echo '<i class="fa fa-money"></i>
<input type="text" id="price"  name="price"  class="form-control text-right" placeholder=" السعر" readonly required>
				';


?>