<?php

//var_dump($_SESSION);

$array_class=array("danger","info","primary","warning","default","success");   ?>

<br>
<div id="bc1" style="text-align: center">
    <a href="<?php echo base_url()."Dash/home" ?>" class="btn btn-sm btn-<?php echo $array_class[1];?>">
        <i class="fa fa-home"></i> </a>
    <?php $x=0; foreach ($sub_groups as $row):
        if($x==6){$x=0;}
       /* if($row->level == 2){
            $e_link="Login/sub_sub_main/".$row->id;
        }elseif($row->level == 3){
            $e_link=;
        }*/
        ?>
        <a href="<?php echo base_url().$row->page_link ?>" class="btn btn-sm btn-<?php echo $array_class[$x];?>">
            <i class="<?php echo $row->page_icon_code?>"></i> <?php echo $row->page_title?></a>
        <?php $x++; endforeach;?>
</div>

<br>
