<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
  
  
  
  
    <span id="message">

<?php

if(isset($_SESSION['message']))

	echo $_SESSION['message'];

unset($_SESSION['message']);

?>
    </span>
    <!-- Navbar -->
    <div class="r-time">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 hidden-xs">
                    <img src="<?php echo base_url()?>asisst/web_asset/img/standing-dr.png" alt="">
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <h1 class="text-center">
                       احجز موعدك الان 
                   </h1>
                <?php echo form_open_multipart('web/Apport',array('class'=>"form-horizontal",'role'=>"form" ))?>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> الاسم الاول </label>
                            <input type="text" class="form-control" name="first_name" id="exampleInputEmail1" placeholder="الاسم الاول"  required="required" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">اسم العائله </label>
                            <input type="text" class="form-control" name="last_name" id="exampleInputEmail1" placeholder="اسم العائله" 
                            >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">العنوان </label>
                            <input type="text" class="form-control" name="address" id="exampleInputEmail1" placeholder="العنوان"  >
                        </div>

               
                            <label for="exampleInputEmail1"> الجنس </label>
                            <br>
                            <input type="radio" name="gender" value="1" class="r-sel"> ذكر
                            <input type="radio" name="gender" value="2" class="r-sel"> انثي
                      
                        <div class="form-group">
                            <label for="exampleInputEmail1"> البريد الالكتروني </label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="البريد الالكتروني"  >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> رقم التليفون </label>
                            <input type="" class="form-control" name="phone" id="exampleInputEmail1" placeholder=" رقم التليفون" required="required">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> رقم الهوية </label>
                            <input type="" class="form-control" name="n_file" id="exampleInputEmail1" placeholder=" رقم الهوية" required="required">
                        </div>



                        <div class="form-group">
                            <label for="exampleInputEmail1">اسم العياده </label>
                            <select class="r-hospital" id="depart_id" name="depart_id" required="required" onchange="return ss($('#depart_id').val());">
                            <option value="">إختر العيادة</option>
                               <?php foreach($depart_id as $depart):?>
                                <option value="<?php echo $depart->id ?>"><?php echo $depart->name ?></option>
                              
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div id="optionearea3"></div>
                        
                          <div class="form-group">
                            <label for="exampleInputEmail1">الطبيب متاح خلال</label>
                             <div id="optionearea4"></div>
                            </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    

                        <div class="form-group">
                            <label for="exampleInputEmail1"> ميعاد الكشف </label>




                            <!--div class="controls input-append date form_datetime"  data-date-format="yyyy-m-d - HH:ii p" data-link-field="dtp_input1"-->
                            <div class="controls input-append date form_datetime" data-date-format="yyyy/m/d - HH:ii p" data-link-field="dtp_input1">
                                <input placeholder="اضغط لادخال التاريخ"  name="times" size="16" type="text" value="" readonly>
                                <span class="add-on"><i class="icon-remove"></i></span>
                                <span class="add-on"><i class="icon-th"></i></span>
                            </div>
                        </div>

                        <button type="submit" name="add_apport" value="إرسل" class="btn btn-default center-block bat">احجز</button>
                 	<?php echo form_close()?>
                </div>
            </div>
        </div>
    </div>


<script>
 function ss(id){
   var num = 'num='+ id;
   if(id){
        $.ajax({
          
            type:'post',
            url: '<?php echo base_url() ?>/web/Apport',
            dataType: 'html',
            data:num,
            cache:false,
            success: function(html){
             $("#optionearea3").html(html);
            } 
        });
    }else{
         $("#optionearea3").html('');
    }
    
        
      
 }
</script>





