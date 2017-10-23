
<!--############################## Title of the page & Time now also ##############################-->
<h2 class="text-flat">الرئيسية <span class="text-sm">الصفحة الرئيسية</span> <span class="date badge pull-left" data-toggle="tooltip" data-placement="bottom" title="UTC +2:00" id="datefull"></span></h2>
<!--##############################  breadcrumb ##############################-->
<ul class="breadcrumb pb30">
  <li><a href="<?php echo base_url('dashboard')?>">الرئيسية</a></li>
  <li class="active">الصفحة الرئيسية</li>
</ul>
<!-- Margin bottom making some space for out show's :D -->
<div class="mb50"></div>
<!-- Index Info's -->
<!--<div align="center" class="col-md-12 col-sm-12col-xs-12" data-sr="wait 0s, then enter bottom" data-toggle="tooltip" data-placement="top" >
    <img width="500" height="500" class="img-responsive" src="<?php /*echo  base_url('asisst/img/atherlogo.png')*/?>">
</div>
-->
 <div class="mb50"></div>
 
 <div class="col-md-3 col-sm-3 col-xs-12" data-sr="wait 0.2s, then enter right and hustle 100%" data-toggle="tooltip" data-placement="top" title="أضغط للمزيد">
<a href="" class="btn-info btn-block index-info">
<span class="fa fa-users icn-bk"></span>
<span class="info-tit">إحصاء عدد المستخدمين</span>
<span class="info-cont"><i class="fa fa-users"></i><span class="badge"><?php echo $users_num; ?></span></span>
<div class="clr"></div>
</a>
</div>


<div class="col-md-3 col-sm-3 col-xs-12" data-sr="wait .4s, then enter right and hustle 100%" data-toggle="tooltip" data-placement="top" title="أضغط للمزيد">
<a href="" class="btn-danger btn-block index-info">
<span class="fa fa-file-text icn-bk"></span>
<span class="info-tit">إحصاء عدد أخبار الماس</span>
<span class="info-cont"><i class="fa fa-file-text"></i><span class="badge"><?php echo $news_num; ?> </span></span>
<div class="clr"></div>
</a>
</div>

<div class="col-md-3 col-sm-3 col-xs-12" data-sr="wait .6s, then enter right and hustle 100%" data-toggle="tooltip" data-placement="top" title="أضغط للمزيد">
<a href="" class="btn-warning btn-block index-info">
<span class="fa fa-newspaper-o icn-bk"></span>
<span class="info-tit">إحصاء الماس في الصحافة</span>
<span class="info-cont"><i class="fa fa-newspaper-o"></i><span class="badge"><?php echo $journal_num; ?> </span></span>
<div class="clr"></div>
</a>
</div>

 


<div class="col-md-3 col-sm-3 col-xs-12" data-sr="wait .8s, then enter right and hustle 100%" data-toggle="tooltip" data-placement="top" title="أضغط للمزيد">
<a href="" class="btn-default btn-block index-info">
<span class="fa fa-paperclip icn-bk"></span>
<span class="info-tit">إحصاء عدد التقارير السنوية</span>
<span class="info-cont"><i class="fa fa-paperclip"></i><span class="badge"><?php echo $report_num; ?> </span></span>
<div class="clr"></div>
</a>
</div>




<div class="col-md-3 col-sm-3 col-xs-12" data-sr="wait .2s, then enter right and hustle 100%" data-toggle="tooltip" data-placement="top" title="أضغط للمزيد">
<a href="" class="btn-primary btn-block index-info">
<span class="fa fa-image icn-bk"></span>
<span class="info-tit">إحصاء عدد ألبومات الصور</span>
<span class="info-cont"><i class="fa fa-image"></i><span class="badge"><?php echo $album_num; ?> </span></span>
<div class="clr"></div>
</a>
</div>

<!--############################## Marging Bottom 50px ##############################-->

<!--############################## jQuery Setting For Chart in tabpanel ##############################-->
<script type="text/javascript">

		// Chart Full
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

	}

</script>
<!--############################## jQuery Libs For Chart in tabpanel ##############################-->
<script src="<?php echo base_url()?>asisst/js/chartjs.min.js"></script>
