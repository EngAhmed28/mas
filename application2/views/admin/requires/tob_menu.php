<?php $array_class=array("danger","info","primary","warning","default","success");
if(isset($this->groups) && $this->groups!=null && !empty($this->groups)){?>

<br>

<div id="bc1" style="text-align: center">
    <a href="<?php echo base_url()."Dash/home" ?>" class="btn btn-sm btn-<?php echo $array_class[1];?>">
        <i class="fa fa-home"></i> </a>
    <?php $x=0; foreach ($this->groups as $row):
        if($x==6){$x=0;}?>
        <a href="<?php echo base_url().$row->page_link?>" class="btn btn-sm btn-<?php echo $array_class[$x];?>"><i class="<?php echo $row->page_icon_code?>"></i> <?php echo $row->page_title?></a>
        <?php $x++; endforeach;?>
</div>

<br>
<?php }?>