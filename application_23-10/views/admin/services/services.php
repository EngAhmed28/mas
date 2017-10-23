<h2 class="text-flat">إدارة البيانات الأساسية <span class="text-sm"><?php echo $title; ?></span></h2>

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

    <?php if(isset($result)):?>

        <!-- <form class="form-horizontal">-->
        <?php echo form_open_multipart('dashboard/update_service/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>

        <fieldset>

            <legend data-sr="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>


            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">اسم القائل:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>

                    <input type="text" id="title"  value="<?php echo $result['title']; ?>" name="title" class="form-control text-right" placeholder="اسم القائل">

                </div>
            </div>


            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">صورة :</label>
                <div class="col-lg-10 input-grup">
                    <!--i class="fa fa-newspaper-o"></i-->

                    <input type="file" id="img" name="img" class="form-control text-right">
                    <span class="help-block"></span>

                </div>
            </div>
             <?php if($result['img'] == 0){
                
            ?>
            <?php
            
            }else{?>
                   <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"></label>
                <div class="col-lg-10 input-grup">

                    <img src="<?php echo base_url('uploads/images/'.$result['img'].''); ?>" height="200px" width="200px">
                    <span class="help-block"></span>

                </div>
            </div>
            <?}?>
            <!--<div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"></label>
                <div class="col-lg-10 input-grup">

                    <img src="<?php //echo base_url('uploads/images/'.$result['img'].''); ?>" height="200px" width="200px">
                    <span class="help-block"></span>

                </div>
            </div>--!>


            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">تفاصيل :</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>
                    <textarea type="text" id="content"  name="content" class="form-control text-right" placeholder="   تفاصيل " ><?php echo $result['content']; ?></textarea>
                </div>
            </div>



            <div class="form-group" data-sr="wait 0.3s, then enter bottom and hustle 100%">

                <div class="col-xs-10 col-xs-pull-2">

                    <input type="submit" name="update" value="حفظ" class="btn btn-primary" >
                </div>

            </div>

        </fieldset>

        <!-- </form>-->



        <!-- </form>-->

        <?php echo form_close()?>

    <?php else: ?>

        <?php echo form_open_multipart('dashboard/add_service',array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>

            <legend data-sr="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>


            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">اسم القائل:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>

                    <input type="text" id="title"  name="title" class="form-control text-right" placeholder=" اسم القائل" required>

                </div>
            </div>


            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">صورة :</label>
                <div class="col-lg-10 input-grup">
                    <!--i class="fa fa-newspaper-o"></i-->

                    <input type="file" id="img" name="img" class="form-control text-right" >
                    <span class="help-block"></span>

                </div>
            </div>


            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">تفاصيل :</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>
                    <textarea id="content"  name="content" class="form-control text-right" required="required"></textarea>
                </div>
            </div>


            <div class="form-group" data-sr="wait 0.3s, then enter bottom and hustle 100%">

                <div class="col-xs-10 col-xs-pull-2">

                    <button type="reset" class="btn btn-default">أبدء من جديد ؟</button>

                    <input type="submit"  name="add_about" value="حفظ" class="btn btn-primary" >
                </div>

            </div>

        </fieldset>
        

        <!-- </form>-->

        <?php echo form_close()?>

    <?php endif?>
</div>



<?php if(isset($records)&&$records!=null):?>



    <table id="no-more-tables" class="table table-bordered" role="table">

        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>لوحة التحكم في الإدارة.</p></caption>

        <thead>

        <tr>

            <th width="2%">#</th>

            <th  class="text-right">اسم القائل</th>

            <th class="text-right">تاريخ الإضافة</th>

            <th width="20%" class="text-right">التحكم</th>
            
            <th width="15%"class="text-right">الحالة</th>

        </tr>

        </thead>
        <tbody>
        <?php $x = 0; ?>
        <?php foreach($records as $record):?>
        <?php 
            $x++; 
            if($record->suspend == 1)
            {
                $class = 'success';
                $title = 'نشط';
            }
            else
            {
                $class = 'danger';
                $title = 'غير نشط';
            }
        ?>
            <tr>
                <td data-title="#"><span class="badge"><?php echo $x?></span></td>
                <td data-title="اسم القائل"><?php echo $record->title?> </td>
                <td  data-title="تاريخ الإضافة"><?php echo date('Y/m/d',$record->date)?></td>

                <td data-title="التحكم" class="text-center">

                    <a href="<?php echo base_url().'dashboard/update_service/'.$record->id?>" class="btn btn-warning btn-xs col-lg-5"><i class="fa fa-pencil"></i> تعديل</a>

                    <a  href="<?php echo base_url().'dashboard/delete_service/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-5"><i class="fa fa-trash"></i> حذف</a>

                </td>
                
                <td data-title="الحالة" class="text-center">

                    <a href="<?php echo base_url().'dashboard/suspend_service/'.$record->id.'/'.$class?>" class="btn btn-<?php echo $class ?> btn-xs col-lg-5"><?php echo $title ?> </a>

                </td>

            </tr>

        <?php endforeach ;?>

        </tbody>

    </table>


<?php endif;?>

