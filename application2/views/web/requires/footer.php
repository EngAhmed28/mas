    <footer>
        <div class="container">
            <div class="col-xs-12 ,col-sm-12 col-md-8 ">
              
              <?php
                 $img = base_url('uploads/images').'/'. $this->footer[0]->logo; ?>
       
              
              
                <img src="<?php echo base_url().'asisst/web_asset/img/almas.png';//$img?>" width="160" alt="">

            </div>

            <div class="col-xs-12 ,col-sm-12 col-md-4">
                  <a href="http://<?php echo $this->footer[0]->facebook; ?>" class="inline" target="_blank">

					<i class="fa fa-facebook"></i>

					</a>
               	<a href="http://<?php echo $this->footer[0]->twitter; ?>" class="inline" target="_blank">

					<i class="fa fa-twitter"></i>

					</a>
               	<a href="http://<?php echo $this->footer[0]->google_plus; ?>" class="inline">
                    <i class="fa fa-google-plus"></i>
                </a>
               	<a href="http://<?php echo $this->footer[0]->insta; ?>" class="inline">
                    <i class="fa fa-instagram"></i>
                </a>
               
              	<a href="http://<?php echo $this->footer[0]->youtube; ?>" class="inline" target="_blank">

					<i class="fa fa-youtube"></i>

					</a>
             

            </div>
        </div>

    </footer>
    <div class="container-fluid copy-write">
        <a href="http://alatheertech.com/">
        	&copy; جميع الحقوق محفوظ لشركة الأثير
        </a>
    </div>
    <!-- footer -->

    <!-- Include the jQuery library -->
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

    <script src="<?php echo base_url().'asisst/web_asset/js/'  ?>bootstrap-arabic.min.js"></script>
    <script src="<?php echo base_url().'asisst/web_asset/js/'  ?>custome.js"></script>
    <script src="<?php echo base_url().'asisst/web_asset/js/'  ?>typed.min.js"></script>
    <script src="<?php echo base_url().'asisst/web_asset/js/'  ?>owl.carousel.min.js"></script>
    <script src="<?php echo base_url().'asisst/web_asset/js/'  ?>js.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url().'asisst/web_asset/js/'  ?>bootstrap-datetimepicker.js" ></script>
<script type="text/javascript" src="<?php echo base_url().'asisst/web_asset/js/'  ?>bootstrap-datetimepicker.fr.js" ></script>

    
    <script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });

</script>

</body>

</html>