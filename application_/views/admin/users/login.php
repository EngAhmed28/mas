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
<style>
 .loginBody {
            padding-top: 0!important;
        }
        
        .loginBody .loginBox {
            border: none;
            background: rgba(255, 255, 255, 0.6);
            width: 93%;
        }
        
        .loginBody .loginBox .login-group button {
            background: #18bc9c !important;
            padding: 6px 0;
            left: 3px;
            float: left;
            color: #fff;
            font-weight: bold
        }
        
        .loginBody .loginBox h2 {
            color: #18bc9c;
            font-weight: bold;
            margin-bottom: 20px;
        }
        
        .loginBody .loginBox .login-group .checkbox {
            margin: 0;
        }
        
        .loginBody .loginBox .login-group>i {
            color: rgba(24, 188, 156, 0.81);
            right: 2px;
        }
        
        .r-top {
            margin-top: 30px;
        }
        
        .r-back-img {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            width: 100%;
            height: 100%;
          /*  z-index: -5;*/
        }

</style>


<body >
	<div class="container" ><!-- Container Start -->
		<div class="row" >
        

 <img src="<?php echo base_url() ?>asisst/img/back.jpg" alt="" class="r-back-img">

  <div class="col-md-5 col-sm-8 col-xs-12">
				<div class="loginBody" ><!-- LoginBody Start -->
					<h3  class="text-center">مجمع بانوراما الطبي</h3><!-- The Name of the main site -->
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
							
							<div class="login-group">
								<div class="checkbox">
									 <input name="remember_me" type="checkbox" data-style="android" data-size="small" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="نعم تذكرنى" data-off="تذكرنى !" data-width="100">
								</div>
								<button name="login" type="submit">دخول</button>
							</div>
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
                        
                        
                        
                        
                        
                   
					<!--	<div class="login-group text-xs">
							<h5 class="text-right text-flat mt20">هل نسيت كلمة المرور !</h5>
							لا تقلق يمكنك استرجاع كلمة المرور بواسطة 
							<a href="#">هذا النموذج</a>.
						</div>-->
					</div>
			
            <a href="http://alatheertech.com/">
            
            
       
            
            	<h4 class="text-center text-sm text-flat rtl">جميع الحقوق محفوظة لـشركة الاثير الجديد لتقنية المعلومات.</h4><!-- CopyRight or a Small Note @ loginbox footer -->
			
                </a> 
            
            
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

