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

    <?php if(isset($result)): ?>
    
    
     <?php echo form_open_multipart('dashboard/updatemanager_word/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>

            <legend data-sr="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>


            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">كلمة رئيس مجلس الإدارة:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>
                    <textarea id="content"  name="content" class="form-control text-right" required="required"><?php echo $result['content']; ?></textarea>
                </div>
            </div>


            <div class="form-group" data-sr="wait 0.3s, then enter bottom and hustle 100%">

                <div class="col-xs-10 col-xs-pull-2">

                    <input type="submit"  name="update" value="حفظ" class="btn btn-primary" >
                </div>

            </div>

        </fieldset>
        

        <!-- </form>-->

        <?php echo form_close()?>

    
    
     
     
     
     
    <?php elseif(! $records): ?>

        <?php echo form_open_multipart('dashboard/addmanager_word',array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>

            <legend data-sr="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>


            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">كلمة رئيس مجلس الإدارة:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>
                    <textarea id="content"  name="content" class="form-control text-right" required="required"></textarea>
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

    
    <?php else: ?>
    
     <table id="no-more-tables" class="table table-bordered" role="table">

        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>لوحة التحكم في الإدارة.</p></caption>

        <thead>

        <tr>

            <th  class="text-right">نص الكلمة</th>

            <th width="20%" class="text-right">التحكم</th>

        </tr>

        </thead>
        <tbody>
        <?php foreach($records as $record):?>
            <tr>
                <td data-title=""><?php echo word_limiter($record->content,10)?> </td>

                <td data-title="التحكم" class="text-center">

                    <button type="button" class="btn btn-info btn-xs col-lg-5" data-toggle="modal" data-target="#myModal"><i class="fa fa-list"></i> عرض </button>

                    <a href="<?php echo base_url().'dashboard/updatemanager_word/'.$record->id?>" class="btn btn-warning btn-xs col-lg-5"><i class="fa fa-pencil"></i> تعديل</a>

                </td>

            </tr>
            
            
            <?php endforeach ;?>
            
        </tbody>

    </table>

    <div class="col-xs-12 mt30 text-center">

        <?php echo  $links?>
    </div>
    
    <?php endif?>
    
</div>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-body">
           <div class="row">
              <div class="col-md-4" style="font-size: 16px;"> كلمة رئيس مجلس الإدارة </div>
              <div class="col-sm-8"><?php echo $record->content?> </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
      </div>
    </div>
  </div>
</div>