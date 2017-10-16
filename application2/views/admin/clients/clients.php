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
        <?php echo form_open_multipart('dashboard/update_client/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>

        <fieldset>

            <legend data-sr="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>


            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">إسم العميل:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-user"></i>

                    <input type="text" id="name"  value="<?php echo $result['name']; ?>" name="name" class="form-control text-right" placeholder="   إسم العميل" required>

                </div>
            </div>


            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">الصورة:</label>
                <div class="col-lg-10 input-grup">

                    <input type="file" id="img" name="img" class="form-control text-right" >
                    <span class="help-block"></span>

                </div>
            </div>
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"></label>
                <div class="col-lg-10 input-grup">

                    <img src="<?php echo base_url('uploads/thumbs/'.$result['img'])?>" alt="الصورة" class="img-rounded" width="150" height="150">
                    <span class="help-block"></span>

                </div>
            </div>
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">التفاصيل:</label>
           
                    
                      <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>
                    <textarea type="text" id="content"  name="content" class="form-control text-right"><?php echo $result['content']; ?></textarea>
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

        <?php echo form_open_multipart('dashboard/add_client',array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>

            <legend data-sr="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>


            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">إسم العميل:</label>
                <div class="col-lg-10 input-grup">
                <i class="fa fa-user"></i>

                    <input type="text" id="name"  name="name" class="form-control text-right" placeholder=" إسم العميل" required>

                </div>
            </div>
            

            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">الصورة:</label>
                <div class="col-lg-10 input-grup">

                    <input type="file" id="img" name="img" class="form-control text-right" required>
                    <span class="help-block"></span>

                </div>
            </div>
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">التفاصيل:</label>
           
                    
                      <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>
                    <textarea type="text" id="content"  name="content" class="form-control text-right"></textarea>
                </div>

                
            </div>


            <div class="form-group" data-sr="wait 0.3s, then enter bottom and hustle 100%">

                <div class="col-xs-10 col-xs-pull-2">

                    <button type="reset" class="btn btn-default">إبدأ من جديد ؟</button>

                    <input type="submit"  name="add" value="حفظ" class="btn btn-primary" >
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

            <th  class="text-right">إسم العميل</th>

            <th class="text-right">التفاصيل</th>

            <th width="20%" class="text-right">التحكم</th>
            
            <th class="text-right">حالة العميل</th>

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
                <td data-title=""><?php echo $record->name?> </td>
                <td  data-title=""><?php echo word_limiter($record->content,7)?></td>

                <td data-title="التحكم" class="text-center">

                    <a href="<?php echo base_url().'dashboard/update_client/'.$record->id?>" class="btn btn-warning btn-xs col-lg-5"><i class="fa fa-pencil"></i> تعديل</a>

                    <a  href="<?php echo base_url().'dashboard/delete_client/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-5"><i class="fa fa-trash"></i> حذف</a>

                </td>
                
                <td data-title="" class="text-center">

                    <a href="<?php echo base_url().'dashboard/suspend_client/'.$record->id.'/'.$class?>" class="btn btn-<?php echo $class ?> btn-xs col-lg-6"><?php echo $title ?> </a>

                </td>

            </tr>

        <?php endforeach ;?>

        </tbody>

    </table>

    

<?php endif;?>

