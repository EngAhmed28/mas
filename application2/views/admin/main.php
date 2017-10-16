<!--############################## Title of the page & Time now also ##############################-->
<!--##############################  breadcrumb ##############################-->
<ul class="breadcrumb pb30">
	<li><a href="<?php // echo base_url('dashboard')?>">الرئيسية</a></li>
	<li class="active">الصفحة الرئيسية</li>
</ul>
<!-- Margin bottom making some space for out show's :D -->
<!-- Index Info's -->
<!--<div align="center" class="col-md-12 col-sm-12col-xs-12" data-sr="wait 0s, then enter bottom" data-toggle="tooltip" data-placement="top" >
    <img width="500" height="500" class="img-responsive" src="<?php /*echo  base_url('asisst/img/atherlogo.png')*/?>">
</div>
-->
<?php $arr_color=array("yellow","orange","blue","purple","yellow","green");
if(isset($main_groups) && $main_groups!=null && !empty($main_groups)){
/*
echo '<pre/>';

print_r($main_groups);
echo '<pre/>';*/
?>


<div id="page-inner">
	<div class="col-xs-12 text-center">
		<?php  $coun_secound=0; $count_num=0;$r=0;
		     foreach ($main_groups as $row):
				if($count_num % 4 ==0){$coun_secound=0; }
				 if($r ==6){$r=0; }   ?>
		<div class="col-md-3 col-sm-4 col-xs-6 padding-4 " data-sr="wait <?php echo  ($coun_secound/10) ?>s, then enter right" >
			<div class="div-square">
				<a href="<?php  echo  base_url()."Dash/mian_group/".$row->sub[0]->page_id?>">
					<i class="<?php echo  $row->sub[0]->page_icon_code?> fa-5x text-<?php echo $arr_color[$r];?>"></i>
					<h4 class="ca"><?php echo  $row->sub[0]->page_title?></h4>
				</a>
			</div>
		</div>
	<?php   $r++;$coun_secound+=2;$count_num++;
			 endforeach;?>
	</div>
</div>
<?php }?>
<!--############################## Marging Bottom 50px ##############################-->
<!--############################## jQuery Setting For Chart in tabpanel ##############################-->
<script type="text/javascript">
	// Chart Full
    /*
	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
	var lineChartData = {
		labels : ["January","February","March","April","May","June","July"],
		datasets : [
			{
				label: "My First dataset",
				fillColor : "rgba(220,220,220,0.2)",
				strokeColor : "rgba(220,220,220,1)",
				pointColor : "rgba(220,220,220,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(220,220,220,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			},
			{
				label: "My Second dataset",
				fillColor : "rgba(151,187,205,0.2)",
				strokeColor : "rgba(151,187,205,1)",
				pointColor : "rgba(151,187,205,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(151,187,205,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			}
		]
	}
	window.onload = function(){
		// Chart Full
		var ctx = document.getElementById("Chart-Full").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
	}*/
</script>
<!--############################## jQuery Libs For Chart in tabpanel ##############################-->
<script src="<?php echo base_url()?>asisst/js/chartjs.min.js"></script>