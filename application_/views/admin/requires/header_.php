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

	<!-- Global Style Sheets -->
	<link href="<?php echo base_url()?>asisst/layout/screen.css" rel="stylesheet" type="text/css"><!-- Some Reset Css For Everything -->
 	<link href="<?php echo base_url()?>asisst/layout/strap.css" rel="stylesheet" type="text/css"><!-- BootStrap Css Libs -->
 	<link href="<?php echo base_url()?>asisst/layout/strap-select.min.css" rel="stylesheet" type="text/css"><!-- BootStrap Select Element -->
 	<link href="<?php echo base_url()?>asisst/layout/strap-toggle.min.css" rel="stylesheet" type="text/css"><!-- BootStrap CheckBoxs Element -->
 	<link href="<?php echo base_url()?>asisst/layout/bootstrap-formhelpers.css" rel="stylesheet" type="text/css"><!-- BootStrap Multi Purp. Element -->
 	<link href="<?php echo base_url()?>asisst/layout/checkBo.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url()?>asisst/layout/layout.css" rel="stylesheet" type="text/css"><!-- The Main Css -->
	<link href="<?php echo base_url()?>asisst/layout/content.css" rel="stylesheet" type="text/css"><!-- The Main Css For Content Page -->
	<link href="<?php echo base_url()?>asisst/layout/font-awesome.css" rel="stylesheet" type="text/css"><!-- Font Awesome Icons -->
	<link href="<?php echo base_url()?>asisst/layout/morris.css" rel="stylesheet" type="text/css"><!-- Chart Css Libs -->
	<link href="<?php echo base_url()?>asisst/layout/media.css" rel="stylesheet" type="text/css"><!-- The Main Css For Media Pages -->
	<link href="<?php echo base_url()?>asisst/layout/style_plugin.css" rel="stylesheet" type="text/css"><!-- The Main Css For Media Pages -->
	<link href="<?php echo base_url()?>asisst/layout/style_admin.css" rel="stylesheet" type="text/css">

	<!-- Favicon Link -->
	<link rel="shortcut icon" href="<?php echo base_url()?>asisst/img/favicon.png"/>
	<!-- Jquery Lib -->
  <!--  datatable  -->
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/layout/tables/jquery.dataTables.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/layout/tables/buttons.dataTables.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/layout/tables/table.css">
	<!--  datatable  -->

	<!--panal -->
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/layout/panel/github.css"/>
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/layout/panel/documentation.css"/>
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/layout/panel/lobipanel.min.css"/>
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/layout/panel/demo.css"/>
	<!--panal -->




	<!--
	<script src="<?php echo base_url()?>asisst/js/jquery.min.js" type="text/javascript"></script>-->

	<script src="<?php echo base_url()?>asisst/js/jq1-12.js"></script>

	<script src="<?php echo base_url()?>asisst/js/ajax_plugn.js"></script><!-- ckEditor -->
	<script src="<?php echo base_url()?>asisst/js/pagination.js"></script><!-- ckEditor -->
	<script src="<?php echo base_url()?>asisst/ckeditor/ckeditor.js"></script><!-- ckEditor -->
	<script src="<?php echo base_url()?>asisst/js/jQuery.print.js"></script><!-- ckEditor -->
	<style>
	/*	@media print {
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
            


		}*/
        
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
            
           /* .topHead {
                display: none !important;
                z-index: 0 !important;
            }
            #pprint{
                position: relative;
                top: -50px;
                z-index: 999999999999;
              
            }*/

		}


	</style>
    
    
    
    <!--           DATATABLE             -->
    
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/datatable/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">

    
    <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
    
    <!--
      <link rel="stylesheet" href="<?php echo base_url()?>asisst/web_asset/css/tables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/web_asset/css/tables/buttons.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/web_asset/css/tables/table.css"> -->
    
  
    <!--link href="<?php echo base_url()?>asisst/datatable/css/bootstrap-arabic.min.css" rel="stylesheet" type="text/css"><!-- The Main Css For Media Pages -->
    <!--link href="<?php echo base_url()?>asisst/datatable/css/bootstrap-arabic-theme.min.css" rel="stylesheet" type="text/css"--><!-- The Main Css For Media Pages -->
   
    
    
</head>
<body>
	<!-- Top Head -->
	<header class="topHead hidden-print" style="z-index: 1 !important; padding: 0px !important;">
		<div class="prl10">
			<div class="row">
				<div class="col-sm-4 col-xs-12 " style="padding-right:3%">
					<h1 class="logo ">لوحة التحكم</h1><!-- The Main Name -->
				</div> <!-- col-xs-6 -->
				<div class="col-sm-8 col-xs-12 topNav">
					<!-- Logout Button -->
					<div class="btn-group user-infos">
						<a href="<?php echo base_url('login/logout')?>" class="topA text-red" data-toggle="tooltip" data-placement="right" title="تسجيل الخروج"><span class="fa fa-power-off fa-fw"></span></a>
					</div>
					<!-- User DropMenu -->
					<div class="btn-group user-infos">
						<a href="#" class="btn btn-sm btn-primary text-xs hidden-xs"><i class="fa fa-user fa-fw"></i>أهلا <?php echo $_SESSION['user_name']?> </a>
						<a class="btn btn-sm btn-primary dropdown-toggle text-xs" data-toggle="dropdown"><span class="fa fa-chevron-down fa-fw hidden-xs"></span><span class="fa fa-user power-off fa-fw hidden-lg hidden-md hidden-sm"></span></a>
						<ul class="dropdown-menu text-right global-drop">
							<li role="presentation" class="dropdown-header text-right">وصول سريع</li>
							<li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home"></i>الصفحة الرئيسية</a></li>
							<li class="divider"></li>
							<li role="presentation" class="dropdown-header text-right">تحكم سريع</li>
							<li><a href="<?php echo base_url('dashboard/patron')?>"><i class="fa fa-edit"></i>تعديل بياناتي</a></li>
<!--							<li><a href="#"><i class="fa fa-cog"></i>اعدادت الموقع</a></li>
-->							<li class="divider"></li>
							<li class="logout"><a href="<?php echo base_url('login/logout')?>"><i class="fa fa-power-off"></i>تسجيل الخروج</a></li>
						</ul>
					</div>
					
					<!-- btn-group -->
					<!-- Messsage DropMenu -->
					<div class="btn-group user-infos" >
						<a href="#" class="topA btn-primary pull-left dropdown-toggle" data-toggle="dropdown">
                        <span class="fa fa-paper-plane-o fa-fw"></span><i class="badge"><?php if($_SESSION['role_id_fk'] == 1) echo count($this->mass);
                        else echo count($this->mass2)?></i></a>
						<ul class="dropdown-menu text-right message-drop">
								<li role="presentation" class="dropdown-header text-right">أخر رسائل غير مقرؤه</li>
									<ul class="ul-scroll">
                                         <?php if($_SESSION['role_id_fk'] == 1){
                                         if(!empty($this->mass)){ ?>
										<?php //foreach($messsages as $message):
                                        for($aa = 0 ; $aa < count($this->mass) ; $aa++)
                                             {
											?>
										<li class="text-right">
											<a href="<?php echo base_url('dashboard/viewmessage').'/'.$this->mass[$aa]['id']?>">
												<i class="fa fa-envelope"></i> <?php echo $this->mass[$aa]['name'] ?>
												<p><?php echo $this->mass[$aa]['title'] ?></p>
												<p class="text-right p-date"><i class="label label-danger"><?php //echo $user['user_name']?></i></p>
											</a>
										</li>
										<?php } ?>
									</ul>
							<?php }else { ?>
								<li role="presentation" class="dropdown-header text-right">لاتوجد رسائل غير مقروئة حاليا</li>

							<?php } 
                            }?>
                            
                            
                            <?php if($_SESSION['role_id_fk'] == 2){
                                         if(!empty($this->mass2)){ ?>
										<?php //foreach($messsages as $message):
                                        for($aa = 0 ; $aa < count($this->mass2) ; $aa++)
                                             {
											?>
										<li class="text-right">
											<a href="<?php echo base_url('dashboard/viewmessage').'/'.$this->mass2[$aa]['id']?>">
												<i class="fa fa-envelope"></i> <?php echo $this->mass2[$aa]['name'] ?>
												<p><?php echo $this->mass2[$aa]['email'] ?></p>
												<p class="text-right p-date"><i class="label label-danger"><?php //echo $user['user_name']?></i></p>
											</a>
										</li>
										<?php } ?>
									</ul>
							<?php }else { ?>
								<li role="presentation" class="dropdown-header text-right">لاتوجد رسائل غير مقروئة حاليا</li>

							<?php } 
                            }?>
                            
                            
                            

<!--								<li class="text-center last-li"><a href="#">عرض جميع الرسائل</a></li>
-->						</ul>
					</div>
				
					<div class="btn-group user-infos">
						<a href="#" class="topA res-menu btn-primary hidden-md hidden-lg text-center"><span class="fa fa-bars fa-fw"></span></a>
					</div>
				</div> <!-- col-xs-6 -->
			</div> <!-- Row -->
		</div> <!-- Container -->
	</header>
	<!-- MainBody -->
	<div class="box">
	    <div class="row">
				<!-- main -->
				<div class="column col-md-12 col-sm-12" id="main" style="width: 100% ;">
					<div class="padding">
						<div class="full col-md-12">
						<!-- content -->

