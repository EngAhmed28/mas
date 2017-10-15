
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta charset="UTF-8">
	<title><?php echo $title;?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="<?php if(isset($metakeyword))echo $metakeyword;?>" name="keywords"/>
	<meta content="<?php if(isset($metadiscription)) echo $metadiscription;?>" name="description"/>
	<meta content="<?php if(isset($title)) echo $title;?>" name="author"/>





	<link href="<?php echo base_url()?>asisst/layout/screen.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url()?>asisst/layout/strap.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url()?>asisst/layout/strap-select.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url()?>asisst/layout/strap-toggle.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url()?>asisst/layout/bootstrap-formhelpers.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url()?>asisst/layout/checkBo.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url()?>asisst/layout/layout.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url()?>asisst/layout/content.css" rel="stylesheet" type="text/css">
	<link  href="<?php echo base_url()?>asisst/layout/font-awesome-animation.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url()?>asisst/layout/font-awesome.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url()?>asisst/layout/morris.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url()?>asisst/layout/media.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url()?>asisst/layout/style_plugin.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url()?>asisst/layout/style_admin.css" rel="stylesheet" type="text/css">

	<link rel="shortcut icon" href="<?php echo base_url()?>asisst/img/favicon.png"/>



	<script src="<?php echo base_url()?>asisst/js/jq1-12.js"></script>
	<script src="<?php echo base_url()?>asisst/js/ajax_plugn.js"></script>
	<script src="<?php echo base_url()?>asisst/js/pagination.js"></script>
	<script src="<?php echo base_url()?>asisst/ckeditor/ckeditor.js"></script>
	<script src="<?php echo base_url()?>asisst/js/jQuery.print.js"></script>
	
    
    
    <style>
	
		@media print {
			table#example{
				width: 96% !important;
				margin: auto;
				border:1px solid #999 !important;
			}
			table.table-print td,th{
				font-size: xx-small;
				font-style: normal;
				font-family: "Arial Black";
			}
			table.table-print tbody tr td{
				padding: 1px 1px 0px 1px;
			}
			thead { display: table-header-group; }
			tfoot { display: table-footer-group; }
			a[href]:after {
				content: "";
			}
			#main{
				width: 100% !important;
			}
	
		}
	</style>

	<link rel="stylesheet" href="<?php echo base_url()?>asisst/datatable/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">

	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/web_asset/css/tables/jquery.dataTables.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/web_asset/css/tables/buttons.dataTables.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/web_asset/css/tables/table.css">





</head>
<body>
<div class="top-navbar">
	<div class="col-md-3">
    
	<!--	<a href="#"><img src="<?php echo base_url()?>asisst/web_asset/img/logo.png" class="logo img-responsive"></a>
	-->
    </div>
	<div class="col-md-3 ">
		<form role="search" class="app-search hidden-xs">
			<input type="text" placeholder="Search..." class="form-control">
			<a href="" class="active"><i class="fa fa-search"></i></a>
		</form>

	</div>
	<div class="col-md-6">
		<div class="left-nav">
			<ul class="list-unstyled ul-buttons">
				<li class="dropdown head-dpdn">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-bell-o faa-ring animated" aria-hidden="true"></i> <span class="badge blue">4</span></a>
					<ul class="dropdown-menu">
						<li>
							<div class="notification_header">
								<h3>ما من رسائل حديثة </h3>
							</div>
						</li>
						<li><a href="#">
								<div class="user_img"><img src="<?php echo base_url() ?>img/persons/a3.jpg" alt=""></div>
								<div class="notification_desc">
									<h6> على</h6>
									<p>تفاصيل التفاصيل بتاعت التفاصيل</p>
									<p><span>منذ ساعة</span></p>
								</div>
								<div class="clearfix"></div>
							</a></li>
						<li class="odd"><a href="#">
								<div class="user_img"><img src="<?php echo base_url() ?>img/persons/a3.jpg" alt=""></div>
								<div class="notification_desc">
									<h6>احمد على</h6>
									<p>تفاصيل التفاصيل بتاعت التفاصيل</p>
									<p><span>منذ ساعة</span></p>
								</div>
								<div class="clearfix"></div>
							</a></li>
						<li><a href="#">
								<div class="user_img"><img src="<?php echo base_url() ?>img/persons/a3.jpg" alt=""></div>
								<div class="notification_desc">
									<h6>احمد على</h6>
									<p>تفاصيل التفاصيل بتاعت التفاصيل</p>
									<p><span>منذ ساعة</span></p>
								</div>
								<div class="clearfix"></div>
							</a></li>
						<li><a href="#">
								<div class="user_img"><img src="<?php echo base_url() ?>img/persons/a3.jpg" alt=""></div>
								<div class="notification_desc">
									<h6>احمد على</h6>
									<p>تفاصيل التفاصيل بتاعت التفاصيل</p>
									<p><span>منذ ساعة</span></p>
								</div>
								<div class="clearfix"></div>
							</a></li>
						<li>
							<div class="notification_bottom">
								<a href="#">اظر باقى التنبيهات</a>
							</div>
						</li>
					</ul>
				</li>
				<li class="dropdown head-dpdn">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-envelope-o faa-horizontal animated" aria-hidden="true"></i> <span class="badge blue">4</span></a>
					<ul class="dropdown-menu">
						<li>
							<div class="notification_header">
								<h3>ما من رسائل حديثة </h3>
							</div>
						</li>
						<li><a href="#">
								<div class="user_img"><img src="<?php echo base_url() ?>img/persons/a3.jpg" alt=""></div>
								<div class="notification_desc">
									<h6>احمد على</h6>
									<p>تفاصيل التفاصيل بتاعت التفاصيل</p>
									<p><span>منذ ساعة</span></p>
								</div>
								<div class="clearfix"></div>
							</a></li>
						<li class="odd"><a href="#">
								<div class="user_img"><img src="<?php echo base_url() ?>img/persons/a3.jpg" alt=""></div>
								<div class="notification_desc">
									<h6>احمد على</h6>
									<p>تفاصيل التفاصيل بتاعت التفاصيل</p>
									<p><span>منذ ساعة</span></p>
								</div>
								<div class="clearfix"></div>
							</a></li>
						<li><a href="#">
								<div class="user_img"><img src="<?php echo base_url() ?>img/persons/a3.jpg" alt=""></div>
								<div class="notification_desc">
									<h6>احمد على</h6>
									<p>تفاصيل التفاصيل بتاعت التفاصيل</p>
									<p><span>منذ ساعة</span></p>
								</div>
								<div class="clearfix"></div>
							</a></li>
						<li><a href="#">
								<div class="user_img"><img src="<?php echo base_url() ?>img/persons/a3.jpg" alt=""></div>
								<div class="notification_desc">
									<h6>احمد على</h6>
									<p>تفاصيل التفاصيل بتاعت التفاصيل</p>
									<p><span>منذ ساعة</span></p>
								</div>
								<div class="clearfix"></div>
							</a></li>
						<li>
							<div class="notification_bottom">
								<a href="#">أنظر باقى الرسائل</a>
							</div>
						</li>
					</ul>
				</li>
				<li class="dropdown head-dpdn">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-tasks"></i> <span class="badge blue">4</span></a>
					<ul class="dropdown-menu">
						<li>
							<div class="notification_header">
								<h3>لديك 4 مهمات تحت التنفيذ</h3>
							</div>
						</li>
						<li><a href="#">
								<div class="task-info">
									<span class="task-desc">تحديث أول</span><span class="percentage">40%</span>
									<div class="clearfix"></div>
								</div>
								<div class="progress progress-striped active">
									<div class="bar yellow" style="width:40%;"></div>
								</div>
							</a></li>
						<li><a href="#">
								<div class="task-info">
									<span class="task-desc">تحديث أول</span><span class="percentage">90%</span>
									<div class="clearfix"></div>
								</div>
								<div class="progress progress-striped active">
									<div class="bar green" style="width:90%;"></div>
								</div>
							</a></li>
						<li><a href="#">
								<div class="task-info">
									<span class="task-desc">تحديث أولp</span><span class="percentage">33%</span>
									<div class="clearfix"></div>
								</div>
								<div class="progress progress-striped active">
									<div class="bar red" style="width: 33%;"></div>
								</div>
							</a></li>
						<li><a href="#">
								<div class="task-info">
									<span class="task-desc">تحديث أول</span><span class="percentage">80%</span>
									<div class="clearfix"></div>
								</div>
								<div class="progress progress-striped active">
									<div class="bar  blue" style="width: 80%;"></div>
								</div>
							</a></li>
						<li>
							<div class="notification_bottom">
								<a href="#">انظر باقى المهمات</a>
							</div>
						</li>
					</ul>
				</li>
				<li class="dropdown no-border">
					<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src=" <?php echo  base_url('asisst/web_asset/img/persons/a3.jpg')?>"
                    
                    
        width="36" class="img-circle"><b class="hidden-xs"><?= $_SESSION['user_name'] ?> </b> </a>
					<ul class="dropdown-menu dropdown-user  ">
						<li><a href="#"><i class="ti-user"></i> الصفحة الشخصية</a></li>
						<li><a href="#"><i class="ti-wallet"></i> الحساب</a></li>
						<li><a href="#"><i class="ti-email"></i> الرسائل</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="#"><i class="ti-settings"></i> اعدادات الحساب</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="<?php echo base_url('login/logout')?>"><i class="fa fa-power-off"></i> الخروج</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>

<!-- MainBody -->
<div class="box">
	<div class="row">
		<!-- main -->
		<div class="column col-md-12 col-sm-12" id="main" style="width: 100% ;">
			<div class="padding">
				<div class="full col-md-12">
					<!-- content -->
