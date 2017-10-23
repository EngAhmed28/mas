<span id="message">



<?php



if(isset($_SESSION['message']))



    echo $_SESSION['message'];



unset($_SESSION['message']);



?>

    </span>
    <form action="" method="post">
    <div class="doctor-details">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 hidden-xs">
                    <img src="<?php echo base_url().'asisst/web_asset/img/'?>doctor_PNG16007.png" alt="">
                </div>
                <div class="col-md-9 col-sm-9">
                    <h2 class="text-center"> لسؤال طبيبك والاستفسار  </h2>
                    
                        <div class="form-group">
                            <label for="exampleInputEmail1">الاسم بالكامل</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="الاسم">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">العنوان بالتفصيل </label>
                            <input type="text" name="city" class="form-control" id="exampleInputEmail1" placeholder="الاسم">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> البريد الالكتروني </label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="البريد الالكتروني">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> رقم التليفون </label>
                            <input type="number"  name="phone" class="form-control" id="exampleInputEmail1" placeholder=" رقم التليفون">
                        </div>
                        <div class="form-group sec">
                            <label for="exampleInputEmail1"> اترك استفسارك </label>
                            <textarea class="form-control"  name="question"> </textarea>
                        </div>

                        <input  type="submit" name="send" class="btn btn-default center-block bat" value="ارسال" />
                  
                </div>
            </div>
        </div>
    </div>
  </form>