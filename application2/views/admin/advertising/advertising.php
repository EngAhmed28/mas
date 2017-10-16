<h2 class="text-flat">إدارة ألبوم الصور <span class="text-sm"><?php echo $title; ?></span></h2>

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

        <?php echo form_open_multipart('dashboard/updateadver/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>

        <fieldset>

            <legend data-sr="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>


            <label for="inputUser" class="col-lg-2 control-label">صورة الإعلان</label>

            <div class="col-lg-10 input-grup">

                <input type="file" name="image" class="form-control text-right" placeholder="صورة الإعلان">

                  <span class="help-block">لعدم تغيير الصورة  لا تختار اى شىء </span>

              </div>

            <div class="col-md-3 col-sm-6 col-xs-12" data-sr="wait 0s, then enter right">

                <div class="imgContent">

                    <img src="<?php echo base_url('uploads/thumbs/'.$result['image'])?>" alt="صورة الإعلان" class="img-rounded" width="10" height="10">

                    <span class="title">صورة الإعلان</span>

                </div>

            </div>

     



            <div class="form-group" data-sr="wait 0.3s, then enter bottom and hustle 100%">

                <div class="col-xs-10 col-xs-pull-2">

                    <input type="submit" name="update_adver" value="حفظ" class="btn btn-primary" >
                </div>

            </div>

        </fieldset>


        <?php echo form_close()?>

    <?php else: ?>

        <?php echo form_open_multipart('dashboard/addadver',array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>

            <legend data-sr="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">

            <label for="inputUser" class="col-lg-2 control-label">صورة الإعلان</label>

            <div class="col-lg-10 input-grup">
                <input type="file" name="img" class="form-control text-right" placeholder="صورة الإعلان" required>
          </div>

        </div>
            <div class="form-group" data-sr="wait 0.3s, then enter bottom and hustle 100%">

                <div class="col-xs-10 col-xs-pull-2">

                    <button type="reset" class="btn btn-default">أبدء من جديد ؟</button>

                    <input type="submit"  name="add_adver" value="حفظ" class="btn btn-primary" >
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

            <th width="10%" style="text-align: center;">#</th>

            <th  width="35%"  style="text-align: center;">صورة الإعلان</th>

            <th width="20%"  style="text-align: center;">التحكم</th>
            
         

        </tr>

        </thead>
        <tbody>
        <?php $x = 0; ?>
        <?php foreach($records as $record):?>
        <?php 
            $x++; 

        ?>
            <tr>
                <td data-title="#" ><span class="badge " style="margin-right: 186px;" ><?php echo $x?></span></td>
                           <td data-title="صورة الإعلان"       style=" padding-right: 150px;"><img width="100" height="100" src="<?php echo base_url('uploads/thumbs/'.$record->image)?>"/></td>

                <td data-title="التحكم" class="text-center">

                    <a href="<?php echo base_url().'dashboard/updateadver/'.$record->id?>" class="btn btn-warning btn-xs col-lg-5"><i class="fa fa-pencil"></i> تعديل</a>

                    <a  href="<?php echo base_url().'dashboard/deleteadver/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs col-lg-5"><i class="fa fa-trash"></i> حذف</a>

                </td>
      
            </tr>

        <?php endforeach ;?>

        </tbody>

    </table>

    <div class="col-xs-12 mt30 text-center">

        <?php echo  $links?>
    </div>

<?php endif;?>

