
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
                        <span><i class="fa fa-phone" aria-hidden="true"></i></span>للتواصل معنا</h2>
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
                                <h4>الاسم بالكامل </h4>
                                <input type="text" name="name" required="required" class="form-control">
                            </div>
                            <div class="form-group">
                                <h4>البريد الالكتروني</h4>
                                <input type="email" name="email" required="required" class="form-control">
                            </div>
                            <div class="form-group">
                                <h4>عنوان الرسالة</h4>
                                <input type="text" name="title" required="required" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9 col-sm-10 col-xs-11">
                            <div class="form-group text-left">
                                <h4>رسالتك</h4>
                                <textarea class="form-control" name="content" required="required"></textarea>
                            </div>
                           
 
                  	<input class="btn btn-block" style="color: #fff; background: #45B29D" type="submit" name="send" value="إرسل" />
                        </div>
                    </div>
                    	</form>
                </div>
                <?php 
                  

                $telephone=unserialize($data[0]->tele_info);

                $fax=unserialize($data[0]->fax_info);

                $email=unserialize($data[0]->email_info);

                ?>
             
                <div class="col-md-4 col-sm-10 col-xs-11">
                    <div class="cont">
                        <div class="col-md-12">
                            <h2 class="text-center">جهات الاتصال</h2>
                        </div>
                        <div class="row  text-center">
                        
                        <?php
                        
                         for($x = 0 ; $x < count($telephone) ; $x++){

                        if($x == 0)

                            echo '<p> جوال : '.$telephone[$x];

                        else

                            echo '</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$telephone[$x].'';

                    }
                        
                        ?>
                          
                        </div>
                        
                        <div class="row  text-center">
                      <?php
                      
                            for($x = 0 ; $x < count($fax) ; $x++){

                        if($x == 0)

                            echo '<p>الفاكس : '.$fax[$x];

                        else

                            echo '</p><p></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$fax[$x].'';

                    }

                      ?>
                        </div>
                        <div class="row text-center">
                        
                        <?php 
                        
                        
                    for($x = 0 ; $x < count($email) ; $x++){

                        if($x == 0)

                            echo '<p>البريد الإلكتروني : '.$email[$x];

                        else

                            echo '</p><p></p><p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;'.$email[$x].'';

                    }

                    

                    ?>
                        
                        
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------->
