

<h2 class="text-flat">إدارة الفيديوهات<span class="text-sm"><?php echo $title; ?></span></h2>

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
        <?php echo form_open_multipart('dashboard/update_video/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>

        <fieldset>

            <legend data-sr="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>



        <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">إسم الفيديو</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-wordpress"></i>

                    <input type="text" id="name"  name="name" value="<?php echo $result['name']; ?>"  class="form-control text-right" placeholder="إسم الفيديو" required >

                </div>
            </div>
              
                
         
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">تفاصيل الفيديو</label>
           
                    
                      <div class="col-lg-10 input-grup">
                    <i class="fa fa-list"></i>
                    <textarea type="text" id="details"  name="details"   class="form-control text-right" placeholder="  تفاصيل العمل"><?php echo $result['details']; ?></textarea>
                </div>

                
            </div>

            

             <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">رابط الفيديو</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-youtube-play"></i>

                    <input type="text" id="link"  name="link"  value="https://www.youtube.com/watch?v=<?php echo $result['link']; ?>" class="form-control text-right" required >

                </div>
            </div>

            <div class="form-group" data-sr="wait 0.3s, then enter bottom and hustle 100%">

                <div class="col-xs-10 col-xs-pull-2">

                    <input type="submit" name="update" value="حفظ" class="btn btn-primary" >
                </div>

            </div>

        </fieldset>


        <?php echo form_close()?>

    <?php else: ?>

        <?php echo form_open_multipart('dashboard/add_video',array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>

            <legend data-sr="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>
     
        <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">إسم الفيديو</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-wordpress"></i>

                    <input type="text" id="name"  name="name" class="form-control text-right" placeholder="إسم الفيديو" required >

                </div>
            </div>
    
    
                        <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">تفاصيل الفيديو</label>
           
                    
                      <div class="col-lg-10 input-grup">
                    <i class="fa fa-list"></i>
                    <textarea type="text" id="details"  name="details" class="form-control text-right" placeholder="  تفاصيل الفيديو"></textarea>
                </div>

                
            </div>

             <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">رابط الفيديو</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-youtube-play"></i>

                    <input type="text" id="link"  name="link" class="form-control text-right" placeholder="رابط الفيديو" required>

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

        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>لوحة التحكم في الإدرة.</p></caption>

        <thead>

        <tr>

            <th width="2%">#</th>
            <th  class="text-center">إسم الفيديو</th>
            <th  class="text-center">تفاصيل الفيديو</th>
            <th width="30%" class="text-center">التحكم</th>

        </tr>

        </thead>
        <tbody>
        <?php 

        $serial = 0;
        foreach($records as $record):?>

            
            <tr>
                <td data-title="#"><span class="badge"><?php echo $serial++?></span></td>
                  <td data-title="#"><span ><?php echo $record->name?></span></td>
           
                <td data-title="#"><span ><?php echo character_limiter(strip_tags($record->details), 10) ;?></span></td>

                <td data-title="التحكم" class="text-center">
 
                    <a href="<?php echo base_url().'dashboard/update_video/'.$record->id?>" class="btn btn-warning btn-xs col-lg-3"><i class="fa fa-pencil"></i> تعديل</a>

                    <a  href="<?php echo base_url().'dashboard/delete_video/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-3"><i class="fa fa-trash"></i> حذف</a>

                </td>
                
                      

            </tr>
        

        <?php endforeach ;?>

        </tbody>

    </table>

 

<?php endif;?>



