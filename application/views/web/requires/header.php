<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="<?php echo base_url().'asisst/web_asset/css/'  ?>bootstrap-arabic-theme.min.css" />
    <link rel="stylesheet" href="<?php echo base_url().'asisst/web_asset/css/'  ?>bootstrap-arabic.min.css" />
    <link rel="stylesheet" type="text/css" href="http://www.fontstatic.com/f=cairo" />
    <link rel="stylesheet" href="<?php echo base_url().'asisst/web_asset/css/'  ?>custome.css">
    <link rel="stylesheet" href="<?php echo base_url().'asisst/web_asset/css/'  ?>font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'asisst/web_asset/css/'  ?>style.css">
    
    <link href="<?php echo base_url().'asisst/web_asset/css/'  ?>bootstrap-datetimepicker.min.css" rel="stylesheet" >
    
    
    <title>مجمع الماس الطبى المتخصص</title>
    <link href="img/fave.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <!-- Important Owl stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url().'asisst/web_asset/css/'  ?>owl.carousel.css">

    <!-- Default Theme -->
    <link rel="stylesheet" href="<?php echo base_url().'asisst/web_asset/css/'  ?>owl.theme.css">
    <style>
        /* code for animated blinking cursor */

        .typed-cursor {
            opacity: 1;
            font-weight: 100;
            -webkit-animation: blink 0.7s infinite;
            -moz-animation: blink 0.7s infinite;
            -ms-animation: blink 0.7s infinite;
            -o-animation: blink 0.7s infinite;
            animation: blink 0.7s infinite;
        }

        @-keyframes blink {
            0% {
                opacity: 1;
            }
            50% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @-webkit-keyframes blink {
            0% {
                opacity: 1;
            }
            50% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @-moz-keyframes blink {
            0% {
                opacity: 1;
            }
            50% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @-ms-keyframes blink {
            0% {
                opacity: 1;
            }
            50% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @-o-keyframes blink {
            0% {
                opacity: 1;
            }
            50% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
    </style>
</head>

<body>


    <!-- Navbar -->
    <nav class="navbar navbar-default  navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                  <?php
                 $img = base_url('uploads/images').'/'. $this->header[0]->logo; ?>

                <a class="navbar-brand"  href="<?php echo base_url('web/index');?>"><img src="<?php echo $img;  ?>" /></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active">
                       <a href="<?php echo base_url('web/index');?>">الرئيسية <span class="sr-only">(current)</span></a>
                    </li>

                      			<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">عن مجمع الماس الطبى <span class="caret"></span></a>
							<ul class="dropdown-menu">


								<li>
									<a href="<?php echo base_url('web/about/3');?>">نبذة عن  مجمع الماس</a>
								</li>
								<li>
									<a href="<?php echo base_url('web/about/1');?>">الرؤية والرسالة </a>
								</li>
								<li>
									<a href="<?php echo base_url('web/manager_word');?>">كلمة رئيس مجلس الإدارة</a>
								</li>
								<li>
									<a href="<?php echo base_url('web/about/2');?>">قالو عن الماس</a>
								</li>


							</ul>
						</li>
                	<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">أقسام عيادات الماس<span class="caret"></span></a>
							<ul class="dropdown-menu">
                                <li class="dropdown-submenu">
                                    <?php



                                    if($this->header2) {
                                        foreach ($this->header2 as $data) {

                                            //   var_dump($data->id)   ;
                                            echo '	
     
     
	 <a tabindex="-1" href="' . base_url('web') . '/departs/' . $data->id . '">' . $data->name . '</a>
								';   ?>


                                    <?
                                        }
                                    }
                                    ?>


                                </li>



							</ul>
						</li>


                    		<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">خدمات  المراجعين<span class="caret"></span></a>
							<ul class="dropdown-menu">
                                <li class="dropdown-submenu">
                                    <a tabindex="-1" href="#">الأطباء</a>
                                    <ul class="dropdown-menu">
                                        <? if (!empty($this->doctor )):
                                                $a=0;
                                            foreach ($this->doctor as $row):
                                                $a++;
                                            ?>
                                        <li><a href="<?php echo base_url().'web/doctor/'?><? echo$row->id;  ?>"><? echo $row->name?></a></li>
                                        <?  endforeach; endif;?>
                                    </ul>

                                </li>
								<li>
									<a href="<?php echo base_url('web/doctors');?>">ابحث عن طبيبك</a>
								</li>
								<li>
									<a href="<?php echo base_url('web/ask_doctor/0');?>">إسأل طبيبك</a>
								</li>
                                <li>
									<a href="<?php echo base_url('web/Apport');?>">إحجز موعدك</a>
								</li>
                                  <li>
									<a href="#">الخدمات الطبية المساعدة </a>
								</li>
                                  <li>
								<a href="<?php echo base_url('web/shakwa');?>">المقترحات الشكاوي</a>
								</li>
							</ul>
						</li>
            	<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">المركز الإعلامي<span class="caret"></span></a>
							<ul class="dropdown-menu">

								<li>
									<a href="<?php echo base_url('web/all_news');?>">أخبار مجمع الماس الطبى</a>
								</li>
								<li>
									<a href="<?php echo base_url('web/all_images');?>">مكتبة الصور</a>
								</li>
								<li>
									<a href="<?php echo base_url('web/all_vedio');?>">مكتبة الفيديو</a>
								</li>
								<li>
									<a href="<?php echo base_url('web/news/1');?>">الماس في الصحافة</a>
								</li>
							</ul>
						</li>
                   	<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">الوظائف<span class="caret"></span></a>
							<ul class="dropdown-menu">

								<li>
									<a href="<?php echo base_url('web/jobs');?>">إعلان وظيفة</a>
								</li>
								<li>
									<a href="<?php echo base_url('web/career');?>">طلب وظيفة</a>
								</li>
							</ul>
						</li>
                 <li>
                       <a href="<?php echo base_url('web/contact');?>">تواصل معنا</a>
                    </li>

                       <li>
                       <a href="https://al-mamlakh.com/">بوابة المملكة</a>
                    </li>


                      <li>
                       <a href="<?php echo base_url();?>/login">تسجيل الدخول</a>
                    </li>



                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
        <div class="slidershadow">
            &nbsp;
        </div>
    </nav>

    <!-- Navbar -->
