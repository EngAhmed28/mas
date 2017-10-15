<h2 class="text-flat">إدارة الرسائل <span class="text-sm"><?php echo $title; ?></span></h2>
<ul class="breadcrumb pb30">
    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>
    <li><a href="#">إدارة الرسائل</a></li>
    <li class="active"><?php echo $title; ?></li>
</ul>
<div class="col-md-12 col-sm-12 col-xs-12 ">
    <div class="row text-right" data-sr="wait 0s">


        <h2 class="text-right">
            <div class="col-md-3">
                <a  data-toggle="tooltip" data-placement="top" title="عنوان المحتوي">:اسم الوظيفة</a></div>
            <div class="col-md-8"><?php echo $result['job_name']?> </div>
        </h2>

        <h2 class="text-right">
            <div class="col-md-3">
                <a  data-toggle="tooltip" data-placement="top" title="التاريخ">:التاريخ</a></div>
            <div class="col-md-8"> <?php echo date("a h:i:s - Y/m/d",$result['date'])?></div>

        </h2>
    </div>
    <br /><hr /><br />


    <div class="col-md-3">
        <a  data-toggle="tooltip" data-placement="top" title="الإسم">:الإسم</a></div>
    <div class="col-md-8"><?php echo $result['name']?> </div>
    <div class="col-md-3">
        <a  data-toggle="tooltip" data-placement="top" title="الإيميل">:الإيميل</a></div>
    <div class="col-md-8"><?php echo $result['email']?> </div>
    <div class="col-md-3">
        <a  data-toggle="tooltip" data-placement="top" title="الإسم">:جوال1</a></div>
    <div class="col-md-8"><?php echo $result['phone']?> </div>
    <div class="text-right">
        <div class="col-md-3">
            <a  data-toggle="tooltip" data-placement="top" title="الإسم">:جوال2</a></div>
        <div class="col-md-8"><?php echo $result['tele']?> </div>    </div>
    <div class="col-md-3">
        <a  data-toggle="tooltip" data-placement="top" title="الإيميل">:عنوان1</a></div>
    <div class="col-md-8"><?php echo $result['flat_num']?>  <?php echo $result['unit']?>    <?php echo $result['street']?>  <?php echo $result['city']?>  </div>
    <div class="text-right">
        <div class="col-md-3">
        <a  data-toggle="tooltip" data-placement="top" title="الإيميل">:عنوان #2</a></div>
    <div class="col-md-8"><?php echo $result['address']?> </div>
    </div>
    <div class="text-right">
        <div class="col-md-3">
            <a  data-toggle="tooltip" data-placement="top" title="الإيميل">:مهاراته</a></div>
        <div class="col-md-8"><?php echo $result['skills']?> </div>
    </div>
    <div class="text-right">
        <div class="col-md-3">
            <a  data-toggle="tooltip" data-placement="top" title="الإيميل">:خبرات سابقة</a></div>
        <div class="col-md-8"><?php echo $result['ex_job']?> </div>
    </div>
    <div class="text-right">
        <div class="col-md-3">
            <a  data-toggle="tooltip" data-placement="top" title="الإيميل">:ملف مرفق</a></div>
        <div class="col-md-8"><?php
            $name ='';
            if($result['file'] == "0"){
                $name ='no file found ';
            }elseif($result['file']  != "0"){
                $name = $result['file'] ;
            }
            ?>
            <?php
            if($result['file']  == "0"){

                echo $name;
            }else{
                ?>
                <h5><?php echo $result['file']  ?></h5>
                <a href="<?php echo base_url().'dashboard/download/'.$result['file'] ?>" class="btn btn-sm btn-info"><i class="fa fa-cloud-download"></i>   تحميل الملف  </a>
                <?php
            }
            ?> </div>
        <br /><hr /><br />
        <br /><hr /><br />
    </div>

    <br /><hr /><br />
</div>

<div class="row  text-center">

    <a href="<?php echo base_url().'dashboard/career'?>" class="btn btn-primary btn-xs col-lg-12"><i class="fa fa-reply"></i> الرجوع للرسائل الواردة</a>
</div>