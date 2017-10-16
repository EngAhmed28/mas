

<span id="message">

<?php

if(isset($_SESSION['message']))

	echo $_SESSION['message'];

unset($_SESSION['message']);

?>
    </span>

		<!-- start section career-->
<section class="career">
<h3 class="text-center">طلب توظيف</h3>
<div class="container">
	<div class="row">
		<div class="col-sm-4 ">
	
		<img src="<?php echo base_url()?>asisst/web_asset/img/careers_icon.png" style="margin-top: 65px; width: 100%;" >
     
        	<img src="<?php echo base_url()?>asisst/web_asset/img/16830584_1243172455778964_635491068_n.png" style="margin-top: 160px;margin-right:-50px;height:900px;width:120%;">	

		</div>
		<div class="col-sm-8 col-xs-12 ">
			<div class="col-xs-12">

			<!--Begin New Application Form-->
				<?php echo form_open_multipart('web/career',array('class'=>"form-horizontal",'role'=>"form" ))?>
				<fieldset>

				<div class="panel panel-primary">
			                <div class="panel-heading">معلومات عامة</div>
			                <div class="panel-body">
			                    <p>من فضلك إملأ هذه البيانات كاملة.</p>
			                    <div class="form-group">
			                        <label class="control-label">إسم الوظيفة</label>
			                        <input type="text" class="form-control" id="job_name" name="job_name" placeholder="إسم الوظيفة" required/>
			                    </div>
			                    <div class="form-group">
			                        <label class="control-label">الإسم</label>
			                        <input type="text" class="form-control" id="name" name="name" placeholder="أحمد محمد ...." required/>
			                    </div>
			                    <div class="form-group">
			                        <label class="control-label">تليفون #1</label>
			                        <input class="form-control" type="number" name="phone" placeholder="مثال:+2 22222"  />
			                    </div>
			                    <div class="form-group">
			                        <label class="control-label">تليفون #2</label>
			                        <input class="form-control" type="number" id="tele" name="tele" placeholder="مثال:+2 22222" />
			                    </div>
			                    <div class="form-group">
			                        <label class="control-label">البريد الإلكترونى</label>
			                        <input class="form-control" type="email" id="email" name="email" placeholder="مثال : info@gmail.com" />
			                    </div>
			                </div>
			            </div>
			            <div class="panel panel-success">
			                <div class="panel-heading">العنوان</div>
			                <div class="panel-body">
			                    <p>املأ بيانات الإقامة الحالية.</p>
			                    <div class="row">
			                    <div class="form-group col-md-3">
			                        <label class="control-label">رقم</label>
			                        <input class="form-control" type="number" id="flat_num" name="flat_num" placeholder="123" />
			                    </div>
			            
			                    <div class="form-group col-md-4">
			                        <label class="control-label">اسم الشارع</label>
			                        <input class="form-control" type="text" id="street" name="street" placeholder="...." />
			                    </div>
			                 
			                    <div class="form-group col-md-3">
			                        <label class="control-label">عمارة</label>
			                        <input class="form-control" type="number" id="unit" name="unit" placeholder="2" />
			                    </div>
			                </div>
			                    <div class="form-group">
			                        <label class="control-label">المدينة</label>
			                        <input class="form-control" type="text" placeholder="الرياض..." id="city" name="city" />
			                    </div>
			                  
			                    <div class="form-group">
			                        <label class="control-label">عنوان #2</label>
			                        <input class="form-control" type="text" id="address" name="address" placeholder="مدينة ..."  />
			                    </div>
			              
			                </div>
			            </div>
			         
			            <div class="panel panel-info">
			                <div class="panel-heading">خبرات و مهارات</div>
			                <div class="panel-body">
			                    <p>اكتب ما لديك.</p>
			                    <div class="form-group">
			                        <label class="control-label">مهاراتك:</label>
			                         <textarea class="form-control" placeholder="....و....و....و..." id="skills" name="skills" ></textarea>
			                    </div>
			                    <div class="form-group">
			                        <label class="control-label">خبراتك السابقة:</label>
			                        <textarea class="form-control" placeholder="..." id="ex_job" name="ex_job" ></textarea>
			                    </div>
			                </div>
			            </div>
			            <div class="panel panel-primary">
			                <div class="panel-heading">ارفاق السيرة الذاتية</div>
			                <div class="panel-body">
			                    <div class="form-group">
			                        <label class="control-label">ارفق الملف</label>
			                        <input class="form-control" type="file" name="file" id="file"  />
			                    </div>
			                </div>
			            </div>

			          <!--     <div class="panel panel-danger">
			            <div class="panel-heading">شروط </div>
			            <div class="panel-body center">
			                <p>......................................</p>
			                <div class="form-group">
			                    <label class="checkbox-inline">
			                        <input type="checkbox" name="verify" value="1" required ><strong>نعم</strong>
			                    </label>
			                </div>
			            </div>
			        </div>-->
			        <div class="text-center">
			            <input type="submit" class="btn btn-lg btn-info btn-responsive " name="send" value="إرسل" style="padding:10px 50px ;margin-bottom: 10px; background-color: #45B29D;" />
			        </div>
					</fieldset>

					<?php echo form_close()?>

			<!--End New Application Form-->
			  

			</div>

		</div>
	</div>
	</div>
</section>
	
		<!-- End section career -->




		
		<!-- logos -->















