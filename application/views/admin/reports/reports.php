<h2 class="text-flat">إدارة التقارير السنوية <span class="text-sm"><?php echo $title; ?></span></h2>

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
        <?php echo form_open_multipart('dashboard/updatereports/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>

        <fieldset>

            <legend data-sr="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>


            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">عنوان التقرير:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-wordpress"></i>

                    <input type="text" id="name"  value="<?php echo $result['title']; ?>" name="title" class="form-control text-right" placeholder="   عنوان التقرير">

                </div>
            </div>

 <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
            <label for="inputUser" class="col-lg-2 control-label">الملف المرفق </label>

            <div class="col-lg-5 input-grup">
                
                <input type="file" name="filee"  value="<?php echo $result['attached']; ?>" class="form-control text-right" placeholder="اسم المستخدم" >
               
              </div>
            <div class="col-lg-5 input-grup">
                <input type="text"  value="<?php echo $result['attached']; ?>"  class="form-control text-right" readonly>
            </div>

        </div>



            <div class="form-group" data-sr="wait 0.3s, then enter bottom and hustle 100%">

                <div class="col-xs-10 col-xs-pull-2">

                    <input type="submit" name="update_report" value="حفظ" class="btn btn-primary" >
                </div>

            </div>

        </fieldset>

        <!-- </form>-->



        <!-- </form>-->

        <?php echo form_close()?>

    <?php else: ?>

        <?php echo form_open_multipart('dashboard/addreports',array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>

            <legend data-sr="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>


            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">عنوان التقرير:</label>
                <div class="col-lg-10 input-grup">
                <i class="fa fa-wordpress"></i>

                    <input type="text" id="title"  name="title" class="form-control text-right" placeholder=" عنوان التقرير" required>

                </div>
            </div>
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">

            <label for="inputUser" class="col-lg-2 control-label">الملف المرفق</label>

            <div class="col-lg-10 input-grup">
                <input type="file" name="filee" class="form-control text-right" placeholder="الملف المرفق" required>
          </div>

        </div>
            <div class="form-group" data-sr="wait 0.3s, then enter bottom and hustle 100%">

                <div class="col-xs-10 col-xs-pull-2">

                    <button type="reset" class="btn btn-default">إبدأ من جديد ؟</button>

                    <input type="submit"  name="add_report" value="حفظ" class="btn btn-primary" >
                </div>

            </div>

        </fieldset>
        

        <!-- </form>-->

        <?php echo form_close()?>

    <?php endif?>
</div>



<?php if(isset($records)&&$records!=null):?>



    <table id="no-more-tables" class="table table-bordered text-center" role="table">

        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>لوحة التحكم في الإدارة.</p></caption>

        <thead>

        <tr>

            <th width="2%">#</th>

            <th  class="text-center">عنوان التقرير</th>
              <th  class="text-center">الملف</th>

            <th width="20%" class="text-center">التحكم</th>
            
            <th class="text-center">حالة التقرير</th>

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
            <tr class="text-center">
                <td data-title="#"><span class="badge"><?php echo $x?></span></td>
                <td data-title=""><?php echo $record->title?> </td>
             
                   <td class="text-center">
                       <?php   
                       $name ='';
                        if($record->attached == "0"){
                         $name ='no file found ';  
                        
                        }elseif($record->attached != "0"){
                            
                          $name = $record->attached;      
                       
                        }
                       ?>
                       
                      
                       <?php 
                        
                       if($record->attached == "0"){ 
                        echo $name;
                        }
                        else{
                            
                        ?>
                      <a href="<?php echo base_url().'dashboard/download/'.$record->attached?>" class="btn btn-sm btn-info col-lg-11"><i class="fa fa-cloud-download"></i> تحميل الملف </a>
                       <?php 
                       
                       }
                       // echo base_url('uploads/files').'/'.$record->attached 
                       //force_download(base_url('uploads/files').'/'.$record->attached, '')
                       ?>
                   </td>

                <td data-title="التحكم" class="text-center">

                    <a href="<?php echo base_url().'dashboard/updatereports/'.$record->id?>" class="btn btn-warning btn-xs col-lg-5"><i class="fa fa-pencil"></i> تعديل</a>

                    <a  href="<?php echo base_url().'dashboard/deletereports/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-5"><i class="fa fa-trash"></i> حذف</a>

                </td>
                
                <td data-title="" class="text-center">

                    <a href="<?php echo base_url().'dashboard/suspendreports/'.$record->id.'/'.$class?>" class="btn btn-<?php echo $class ?> btn-xs col-lg-6"><?php echo $title ?> </a>

                </td>

            </tr>

        <?php endforeach ;?>

        </tbody>

    </table>

    <div class="col-xs-12 mt30 text-center">

        <?php echo  $links?>
    </div>
    

<?php endif;?>
