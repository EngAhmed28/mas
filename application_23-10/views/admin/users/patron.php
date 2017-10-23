<script>

    $(document).ready(function() {

        $("#user_pass").on('input',function(){

            data = $('#user_pass').val();

            var len = data.length;

            if(len < 3) {

                $("#validate").css('color','red');

                $("#validate").text("كلمة المرور ضعيفة");

            }else{

                $("#validate").css('color','green');

                $("#validate").text("كلمة مرور قوية");

            }

        });



        $('#user_pass_validate').on('input',function(){

            if($('#user_pass').val() != $('#user_pass_validate').val()) {

                $("#validate").css('color','red');

                $("#validate").text("كلمة المرور لا يطابق الادخال");

            } else if($('#user_pass').val() == $('#user_pass_validate').val()) {

                $("#validate").css('color','green');

                $("#validate").text("تمت المطابقة مع كلمة المرور ");

            }

        });

        ////////////////////////click event

        $('button').click(function(event){

            var button_name=$("button").attr('name');

            if(button_name=='edit_user'){



            }else{

                data = $('#user_pass').val();

                var len = data.length;

                if(len < 2) {

                    $("#validate").css('color','red');

                    $("#validate").text("كلمة المرور ضعيفة");

                    event.preventDefault();

                }

            }

            if($('#user_pass').val() != $('#user_pass_validate').val()) {

                $("#validate").css('color','red');

                $("#validate").text("الباسورد لا يطابق الادخال");

                event.preventDefault();

            }

        });



    });

</script>

<h2 class="text-flat">رئيسية التحكم <span class="text-sm"><?php echo $title; ?></span></h2>

    <ul class="breadcrumb pb30">

        <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>

        

        <li class="active"><?php echo $title; ?></li>

    </ul>

    <span id="message">

<?php

if(isset($_SESSION['message']))

    echo $_SESSION['message'];

unset($_SESSION['message']);

?>

</span>

    <div class="well bs-component" data-sr="wait 0s, then enter left and hustle 100%">

            <?php echo form_open_multipart('dashboard/patron/'.$_SESSION['user_id'],array('class'=>'form-horizontal','id'=>'addgroupform'))?>

    <fieldset>

        <legend data-sr="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>



        <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">

            <label for="inputUser" class="col-lg-2 control-label">إسم العضو </label>

            <div class="col-lg-10 input-grup">

                <i class="fa fa-user"></i>

                <input type="text" value="<?php echo $_SESSION['user_name']?>" name="user_name" class="form-control text-right" placeholder="إسم  العضو">

                <span class="help-block">يجب كتابة الإسم رباعي</span>

            </div>

        </div>

        <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">

            <label for="inputUser" class="col-lg-2 control-label">إسم المستخدم</label>

            <div class="col-lg-10 input-grup">

                <i class="fa fa-user"></i>

                <input type="text" value="<?php echo $_SESSION['user_username']?>" name="user_username" class="form-control text-right" placeholder="إسم المستخدم">

                <span class="help-block">يجب مراعاة الحروف</span>

            </div>

        </div>

        <div class="form-group" data-sr="wait 0.3s, then enter bottom and hustle 100%">

            <label for="inputPassword" class="col-lg-2 control-label">كلمة المرور </label>

            <div class="col-lg-10 input-grup">

                <i class="fa fa-lock"></i>

                <input type="password" name="user_pass" id="user_pass" class="form-control text-right" placeholder="كلمة المرور">

            </div>

        </div>

        <div class="form-group" data-sr="wait 0.3s, then enter bottom and hustle 100%">

            <label for="inputPassword" class="col-lg-2 control-label">كلمة المرور </label>

            <div class="col-lg-10 input-grup">

                <i class="fa fa-lock"></i>

                <input type="password" name="user_pass_validate" id="user_pass_validate" class="form-control text-right" placeholder="كلمة المرور">

                <span  id="validate" class="help-block"></span>



            </div>

        </div>

        <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">

            <label for="inputUser" class="col-lg-2 control-label">البريد الألكتروني </label>

            <div class="col-lg-10 input-grup">

                <i class="fa fa-at"></i>

                <input type="text" value="<?php echo $_SESSION['user_email']?>" name="user_email" class="form-control text-right" placeholder="البريد الألكتروني">

            </div>

        </div>

        <div class="form-group" data-sr="wait 0.3s, then enter bottom and hustle 100%">

            <label for="inputPassword" class="col-lg-2 control-label">رقم التليفون</label>

            <div class="col-lg-10 input-grup">

                <i class="fa fa-phone-square"></i>

                <input value="<?php echo $_SESSION['user_phone']?>" type="text" name="user_phone" class="form-control phone-number" placeholder="+966-539-044-145">

            </div>

        </div>

        <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">



            <label for="inputUser" class="col-lg-2 control-label">الصورة الشخصية </label>

            <div class="col-lg-10 input-grup">

                <input type="file" name="user_photo" class="form-control text-right" placeholder="إسم المستخدم">

                <span class="help-block">لعدم تغيير الصورة  الشخصية لا تختار أي شىء </span>

            </div>

            <div class="col-md-3 col-sm-6 col-xs-12" data-sr="wait 0s, then enter right">

                <div class="imgContent">

                    <img src="<?php echo base_url('uploads/thumbs/'.$_SESSION['user_photo'])?>" alt="الصورة الشخصية" class="img-rounded" width="10" height="10">

                    <span class="title">الصورة الشخصية</span>

                </div>

            </div>

        </div>


        <div class="form-group" data-sr="wait 0.3s, then enter bottom and hustle 100%">

            <div class="col-xs-10 col-xs-pull-2">

                <button name="edit_user" value="edit_user" type="submit" class="btn btn-primary">حفظ</button>

            </div>

        </div>

    </fieldset>

        <?php echo form_close()?>

    </div>

