<!DOCTYPE html>
<html lang="ar" >
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title><?php echo $title;?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="<?php echo $metakeyword;?>" name="description"/>
	<meta content="<?php echo $metadiscription;?>" name="author"/>
	<!--############################## Global Style Sheets ##############################-->
 	<link href="<?php echo base_url()?>asisst/layout/strap.css" rel="stylesheet" type="text/css">
 	<link href="<?php echo base_url()?>asisst/layout/strap-toggle.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url()?>asisst/layout/layout.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url()?>asisst/layout/font-awesome.css" rel="stylesheet" type="text/css">
	<!--############################## Favicon Link ##############################-->
	<link rel="shortcut icon" href="<?php echo base_url()?>asisst/img/favicon.png"/>
</head>
<body style="background: #797979">
	<div class="container" ><!-- Container Start -->
		<div class="row" ><!-- Row Start -->
			<div class="col-md-6 col-md-pull-3 col-sm-12 col-xs-12" ><!-- The main responsive layout of Login Box -->
				<div class="loginBody" ><!-- LoginBody Start -->
					<h3  class="text-center">مجمع الماس الطبي </h3><!-- The Name of the main site -->
					<div class="loginBox"><!-- LoginBox -->
						<?php if(isset($response)):?>
						<h5 class="alert alert-danger text-center rtl"><i class="fa fa-lock fa-fw fa-spin icn-xs"></i><?php echo $response;?></h5>
						<?php endif?>
						<h2>تسجيل الدخول بحسابك</h2>
							<?php echo form_open('login/check_login',array('role'=>'form'))?>
							<div class="login-group">
								<i class="fa fa-user"></i>
								<input name="user_name" type="text" id="username" placeholder="أسم المستخدم"><!-- UserName Input -->
							</div>
							<div class="login-group">
								<i class="fa fa-lock"></i>
								<input name="user_pass" type="password" id="password" placeholder="كلمة المرور"><!-- Password Input -->
							</div>
							<!--############################## You Can Add More Input if u like with the code bottom ##############################-->
							<!-- <div class="login-group">
								<i class="fa fa-...."></i>
								<input type="...." id="...." placeholder="....">
							</div> -->
							<div class="login-group">
								<div class="checkbox">
									 <input name="remember_me" type="checkbox" data-style="android" data-size="small" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="نعم تذكرنى" data-off="تذكرنى !" data-width="100">
								</div>
								<button name="login" type="submit">دخول</button>
							</div><!-- Login-group end -->
                          <?php echo form_close()?>
						<div class="line"></div>
                        
                      <div class="login-group">
                           <div class="btn btn-sm btn-success">
                        
                        <a href="https://al-mamlakh.com/">
                       <h6 style="color: white !important;">بوابة المملكة الطبية </h6> 
                        </a>
 
                        </a>
                        </div>  

                         <div class="btn btn-sm btn-warning">
                         <a href="<?php echo base_url()?>">
                       <h6 style="color: white !important;">الرئيسية </h6> 
                        
                          </div>  
                        </div>
                        <!-- Line Padding -->
						<!--<div class="login-group">
							<h5 class="text-right text-flat mt20">تسجيل الدخول بواسطة</h5>
							<a href="#" class="login-soci facebook"><i class="fa fa-facebook"></i>فيس بوك</a>
							<a href="#" class="login-soci twitter"><i class="fa fa-twitter"></i> تويتر</a>
							<a href="#" class="login-soci google"><i class="fa fa-google"></i> جوجل +</a>
						</div><!-- End of login-group of Soci Login system -->
						<div class="login-group text-xs">
							<h5 class="text-right text-flat mt20">هل نسيت كلمة المرور !</h5>
							لا تقلق يمكنك استرجاع كلمة المرور بواسطة 
							<a href="#">هذا النموذج</a>.
						</div><!-- End of login-group Password Forget System -->

						<!--<div class="login-group text-xs">
							<h5 class="text-right text-flat mt20">ليس لديك حساب حتى الان !</h5>
							يمكنك تسجيل عضوية جديدة من خلال 
							<a href="#">هذا النموذج</a>.
						</div><!-- End of login-group New Register System -->
					</div>
					<h4 class="text-center text-sm text-flat rtl">جميع الحقوق محفوظة لـشركة الاثير الجديد لتقنية المعلومات.</h4><!-- CopyRight or a Small Note @ loginbox footer -->
				</div><!-- LoginMain end -->
			</div><!-- Main Responsive end -->
		</div><!-- Row end -->
	</div><!-- Container end -->
    
    </body>
</html>
	<!-- Global javascript & jquery Files -->
	<!--############################## Jquery Libs ##############################-->
	<script src="<?php echo base_url()?>asisst/js/jquery.min.js" type="text/javascript"></script>
	<!--############################## BootStrap Libs ##############################-->
	<script src="<?php echo base_url()?>asisst/js/strap.min.js" type="text/javascript"></script>
	<!--############################## BootStrap CheckBoxs Libs ##############################-->
	<script src="<?php echo base_url()?>asisst/js/strap-toggle.min.js" type="text/javascript"></script>
	<!--############################## Scroll Animation ##############################-->
	<script src="<?php echo base_url()?>asisst/js/scrollReveal.min.js" type="text/javascript"></script>
	<!--############################## Custom jQuery Codes ##############################-->
	<script src="<?php echo base_url()?>asisst/js/custom.min.js" type="text/javascript"></script>

