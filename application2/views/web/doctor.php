
<body id="page-top" data-spy="scroll" data-target="" class="flexcroll">
<!-- start bottom button -->
<div class="bottom-button">
    <a id="to-top" class="btn btn-lg btn-inverse page-scroll" href="#page-top"> <span class="sr-only">Toggle to Top Navigation</span> <i class="fa fa-chevron-up"></i> </a>
</div>

<section id="doctorsec">
    <div class="background">
        <img src="<?php echo base_url()  .'/asisst/img/fft191_mf3728282.png'?>">
    </div>
    <div class="person-photo">
        <img src="<?php echo base_url()  .'/uploads/images/'?><? echo $records['img']?>">
    </div>


    <div class="container">
        <div class="details">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">بيانات الطبيب </a></li>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in  active" id="home">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <div class="right">
                                <blockquote>
                                    <h4>معلومات شخصية </h4>
                                    <ul class="list-unstyled">
                                        <li><label>الاسم :</label><? echo $records['name'];?></li>
                                        <li><label>رقم التليفون :</label><? echo  $records['phone'];?> </li>
                                        <li><label>الإيميل :</label><? echo  $records['email'];?></li>
                                        <li><label>الوظيفة :</label> طبيب أسنان</li>

                                    </ul>
                                </blockquote>
                            </div>
                        </div>
                        <? if (!empty($booking)):?>
                            <div class="col-sm-6 col-xs-12">
                                <div class="right">
                                    <blockquote>
                                        <h4>مواعيد العمل </h4>
                                        <ul class="list-unstyled">

                                            <? foreach ($booking as $row):
                                                $days =array('السبت','الأحد','الأثنين','الثلاثاء','الأربعاء ','الخميس');
                                                ?>
                                                <li><label>اليوم :</label>&nbsp;&nbsp;<? echo $days[1]; ?>&nbsp;&nbsp;<? echo $row->time;?></li>
                                            <? endforeach;?>
                                        </ul>
                                    </blockquote>
                                </div>
                            </div>
                        <?   endif;?>


                    </div>
                </div>

            </div>

        </div>
    </div>


</section>













