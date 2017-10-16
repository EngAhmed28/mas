
<style>



.contact .cont {
    border: 3px solid #45B29D;
    margin-top: 150px;
    padding-top: 20px;
    padding-bottom: 20px;
    border-radius: 35px;
}

.contact .cont h2 {
    background-color: #45B29D;
    color: #fff;
    margin-top: -47px;
    padding-top: 10px;
    padding-bottom: 10px;
    border-radius: 50px;
    border: 3px solid #fff;
}

.contact .cont p {
    font-size: 20px;
    color: #45B29D;
    line-height: 30px;
}


</style>
    <!-------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------->
    <div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <div class="row ">
                        <h2 > 
                        <span><i class="glyphicon glyphicon-phone-alt" aria-hidden="true"></i></span>الشكاوي والإقتراحات</h2>
                    </div>
                    
                    <span id="message">



<?php



if(isset($_SESSION['message']))



    echo $_SESSION['message'];



unset($_SESSION['message']);



?>

    </span>   
                    	 <form role="form" action="" method="POST">
                    <div class="row">
                        <div class="col-md-9 col-sm-10 col-xs-11 ">
                            <div class="form-group text-left">
                                <h4>عنوان الشكوي</h4>
                                <input type="text" name="title" required="required" class="form-control">
                            </div>
                            
                              <div class="form-group">
                                <h4>نوع الشكوي</h4>
             <input type="radio" name="status" value="1"> شكوي   &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
             <input type="radio" name="status" value="2"> مقترح 
                            </div>
                            
                            <div class="form-group">
                                <h4>البريد الالكتروني</h4>
                                <input type="email" name="email" required="required" class="form-control">
                            </div>
                            <div class="form-group">
                                <h4>رقم الجوال</h4>
                                <input type="text" name="phone" required="required" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9 col-sm-10 col-xs-11">
                            <div class="form-group text-left">
                                <h4>التفاصيل</h4>
                                <textarea class="form-control" name="content" required="required"></textarea>
                            </div>
                           
 
                  	<input class="btn btn-block" style="color: #fff; background: #45B29D" type="submit" name="send" value="إرسل" />
                        </div>
                    </div>
                    	</form>
                </div>
            <div class="col-md-3  hidden-sm hidden-xs">
               <img src="<?php echo base_url().'asisst/web_asset/img/'?>doctor_PNG16007.png" alt="" style="width: 150%;height:600px; margin-top: 50px;">
                </div>
            
            </div>
        </div>
    </div>
     
    
    <!-------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------->
