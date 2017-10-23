<?php	if($chek == true){ ?>
	 <span style="color:#F00 ;"> هذا التوقيت غير متاح</span>  
	<script>
		document.getElementById("button").type = "button";
	</script>
	
<?php	}elseif($chek ==false){ ?>
	    <span style="color:green ;"> هذا التوقيت متاح</span>
	<script>
		document.getElementById("button").type = "submit";
	</script>
<?php 	}?>