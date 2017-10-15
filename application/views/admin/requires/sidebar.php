



	</div><!-- /col-9 -->



	</div><!-- /padding -->



</div>



<!-- /main -->



<!-- sidebar -->



<div class="column col-md-3 col-xs-12" id="sidebar" style="width: 20% !important;">



	<i class="text-center text-xs"></i>



	<br><br>



	<p class="text-center text-xs">مستشفى بانوراما</p>
	<p class="text-center text-xs">نظام التحكم في موقع مستشفى بانوراما</p>







	



	<ul class="sideBar">



		<li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-home fa-5x"></i> الرئيسية </a></li>



		<?php foreach(getgroups($_SESSION['role_id_fk']) as $group):?>



			<?php if($group->group_link =='#'):?>



		<li class="menu" style="padding: 10px 10px !important; font-size: 13px !important;"><i  class="<?php echo $group->group_icon_code?>"></i>

        

        <i style="left: -16px !important;" class="fa fa-chevron-down pull-left sideDown"></i>



			<?php echo $group->group_title?>



			<ul class="sideChild" style="width: 112% !important;">







                <?php //$pages=$ci->Permission->get_all_pages($_SESSION['role_id_fk'],$group->group_id);?>



				<?php foreach(getpages($_SESSION['role_id_fk'],$group->group_id) as $page):?>



				<li><a style="font-size: 13px !important;" href="<?php echo base_url($page->page_link)?>"><i class="<?php echo $page->page_icon_code?>"></i> <?php echo $page->page_title?> </a></li>



			<?endforeach?>



				</ul>



		</li>



			<?php else:?>



				<li><a href="<?echo base_url($group->group_link)?>"><i class="<?php echo $group->group_icon_code?>"></i><i class="fa fa-chevron-left pull-left sideDown"></i><?php echo $group->group_title?> </a></li>



			<?php endif?>



		<?endforeach?>



	



	</ul>



	<h6 class="text-center text-flat text-lg">الدعم الفنى</h6>



	<p class="text-center text-xs">support@alatheertech.com</p>



	<p class="text-center text-xs"><a target="_blank" href="http://alatheertech.com/" class="btn btn-xs btn-blink tahoma">
    <img  class="img-responsive" src="<?php echo base_url("asisst/img/atherlogo.png")?>" width="150" height="150"></a></p>



	<p class="text-center text-xs">شركة الأثير تك لتقنية المعلومات</p>



</div>



<!-- /sidebar -->