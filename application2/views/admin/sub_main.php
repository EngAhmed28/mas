<?php

//var_dump($_SESSION);

$array_class=array("danger","info","primary","warning","default","success");   ?>

<ul class="breadcrumb pb30">
    <li><a href="<?php  echo base_url()."Dash/home"?>">الرئيسية</a></li>
    <li class="active"><?php echo $title_name?></li>
</ul>
<?php $arr_color=array("yellow","orange","blue","purple","yellow","green");
  if (isset($groups) && $groups!=null && !empty($groups)){

?>
<div id="page-inner">
    <div class="col-xs-12 text-center">
        <?php  $coun_secound=0; $count_num=0;$r=0;
        foreach ($groups as $row):
            if($count_num % 4 ==0){$coun_secound=0; }
            if($r ==6){$r=0; }   ?>
          <!--  <div class="col-md-3 col-sm-4 col-xs-6 padding-4 " data-sr="wait <?php echo  ($coun_secound/10) ?>s, then enter right">
              
              --> 
                <div class="col-md-3 col-sm-4 col-xs-6 padding-4 "  data-sr="wait <?php echo  ($coun_secound/10) ?>s, then enter right" >
                <div class="div-square">
                    <?php  if($row->level == 2){
                        $e_link="Dash/sub_sub_main/".$row->page_id;
                    }elseif($row->level == 3){
                        $e_link=$row->page_link;
                    }?>

                    <a href="<?php echo  base_url().$e_link?>">


                        <i class="<?php echo  $row->page_icon_code?> fa-5x text-<?php echo $arr_color[$r];?>"></i>
                        <h4 class="ca"><?php echo  $row->page_title?></h4>
                    </a>
                </div>
            </div>
            <?php   $r++;$coun_secound+=2;$count_num++;
        endforeach;?>
    </div>
</div>
<?php } ?>

