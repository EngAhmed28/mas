<div class="col-xs-12 r-side-table">
    <div class="col-sm-9">
        <h4> <span> <i class="fa fa-briefcase" aria-hidden="true"></i></span> إعدادات الأصناف  </h4>
    </div>
    <div class="col-sm-3">
        <h5> <?php echo $_SESSION['user_username']?></h5>
        <h5>   اخر دخول  :  <?php echo date("Y-m-d",$_SESSION['last_login'])?></h5>
    </div>
</div>
<div class="col-xs-12 r-bottom">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <?php $arr=array("add_unit"=>"إضافة وحدات الأصناف",
                'add_main_product'=>"فئات الأصناف الرئيسية",
                "add_sub_product"=>"فئات الأصناف الفرعية"
              //  "add_vacation"=>"إضافة أجازة",
              //  "emp_attendance"=>"الحضور والإنصراف",
              //  "attendance_upload"=>"رفع ملف الحضور والإنصراف"
            );

            ?>

            <?php foreach($arr as $key=>$value):
                $active='';
                if(isset($update_link) && $update_link !=null){
                    if($update_link == $key){ $active='class="active"';}
                }else{
                    if($this->uri->segment(2)== $key){ $active='class="active"';}
                }
                ?>
                <li <?php echo $active;?>  ><a  href="<?php echo base_url()."dashboard/".$key?>">
                        <?php echo $arr[$key]; ?> </a></li>
            <?php endforeach; ?>

             </ul>
    </div>

    <?php
    if(isset($_SESSION['message']))
        echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>


</div>