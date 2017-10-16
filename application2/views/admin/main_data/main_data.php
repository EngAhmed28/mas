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
    
    
     <?php echo form_open_multipart('dashboard/update_main_data/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>
       <fieldset>

            <legend data-sr="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>


            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">إسم المستشفى:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>

                    <input type="text" id="name"  name="name" class="form-control text-right" value="<?php echo $result['name']; ?>" placeholder="   إسم المستشفى" required>

                </div>
            </div>
            
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">اللوجو:</label>
                <div class="col-lg-10 input-grup">

                    <input type="file" id="logo" name="logo" class="form-control text-right" >
                    <span class="help-block"></span>

                </div>
            </div>
            
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"></label>
                <div class="col-lg-10 input-grup">

                    <img src="<?php echo base_url('uploads/images/'.$result['logo'].''); ?>" height="200px" width="200px">
                    <span class="help-block"></span>

                </div>
            </div>
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%" id="datetimepicker6">
                <label for="inputUser" class="col-lg-2 control-label">تاريخ الإنشاء:</label>
                <div class="col-lg-10 input-grup">

                    <input type="date" id="date_construct" name="date_construct" value="<?php echo date('Y-m-d',$result['date_construct']); ?>" class="form-control text-right" placeholder="   تاريخ الإنشاء" required>


   <input type="text"  id="popupDatepicker" class=" form-control"    
               />   

                </div>
            </div>
            
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">العنوان:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>

                    <input type="text" id="address"  name="address" value="<?php echo $result['address']; ?>" class="form-control text-right" placeholder="   العنوان" required>

                </div>
            </div>
            
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">أرقام التليفون:</label>
                <div class="col-lg-2 input-grup">

                    <input type="number" id="tele_info"  name="tele_info" min="1" max="5" onkeyup="return lood($('#tele_info').val(),'#optionearea1','tele_info');" class="form-control text-right" placeholder="   أقصى عدد 5" >

                </div>
            </div>
            
            <div id="optionearea1"></div>
            
            <?php
            
            $telephone=unserialize($result['tele_info']);
            if($telephone){
                echo '<table class="table table-bordered table-hover table-striped" cellspacing="0" " style="margin-right: 191px; width: 56%;" >
                      <thead>';
                for($x = 0 ; $x < count($telephone) ; $x++){
                    if(count($telephone) > 1)
                    {
                        $td = '<td style="padding-top: 10%px;">
                               <a  href="'.base_url().'dashboard/delete/tele_info/'.$result['id'].'/'.$x.'"  class="btn btn-danger btn-xs col-lg-12">
                                حذف <i class="fa fa-trash"></i></a>
                               </td>';
                    }
                    else
                        $td = '';
                    echo '<tr class="">
                          <td>
                          <input type="number" name="phone_old'.$x.'" class="form-control" style="width: 500px;" value="'.$telephone[$x].'" required="required" title="يجب أدخال رقم للتليفون"/>
                          </td>
                          '.$td.'
                          </tr>';
                }
                echo '</thead></table>';
            }
            ?>
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">أرقام الفاكس:</label>
                <div class="col-lg-2 input-grup">

                    <input type="number" id="fax_info" name="fax_info" min="1" max="5" onkeyup="return lood($('#fax_info').val(),'#optionearea2','fax_info');" min="1" max="5" class="form-control text-right" placeholder="   أقصى عدد 5" >

                </div>
            </div>
            
            
            <div id="optionearea2"></div>
            
            <?php
            
            $fax=unserialize($result['fax_info']);
            if($fax){
                echo '<table class="table table-bordered table-hover table-striped" cellspacing="0" " style="margin-right: 191px; width: 56%;" >
                      <thead>';
                for($x = 0 ; $x < count($fax) ; $x++){
                    if(count($fax) > 1)
                    {
                        $td = '<td style="padding-top: 10%px;">
                               <a  href="'.base_url().'dashboard/delete/fax_info/'.$result['id'].'/'.$x.'"  class="btn btn-danger btn-xs col-lg-12">
                                حذف <i class="fa fa-trash"></i></a>
                               </td>';
                    }
                    else
                        $td = '';
                    echo '<tr class="">
                          <td>
                          <input type="number" name="fax_old'.$x.'" class="form-control" style="width: 500px;" value="'.$fax[$x].'" required="required" title="يجب أدخال رقم للفاكس"/>
                          </td>
                          '.$td.'
                          </tr>';
                }
                echo '</thead></table>';
            }
            ?>
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">البريد الإلكتروني:</label>
                <div class="col-lg-2 input-grup">

                    <input type="number" id="email_info"  name="email_info" min="1" max="5" onkeyup="return lood($('#email_info').val(),'#optionearea3','email_info');" class="form-control text-right" placeholder="   أقصى عدد 5" >

                </div>
            </div>
            
            <div id="optionearea3"></div>
            
            <?php
            
            $email=unserialize($result['email_info']);
            if($email){
                echo '<table class="table table-bordered table-hover table-striped" cellspacing="0" " style="margin-right: 191px; width: 56%;" >
                      <thead>';
                for($x = 0 ; $x < count($email) ; $x++){
                    if(count($email) > 1)
                    {
                        $td = '<td style="padding-top: 10%px;">
                               <a  href="'.base_url().'dashboard/delete/email_info/'.$result['id'].'/'.$x.'"  class="btn btn-danger btn-xs col-lg-12">
                                حذف <i class="fa fa-trash"></i></a>
                               </td>';
                    }
                    else
                        $td = '';
                    echo '<tr class="">
                          <td>
                          <input type="email" name="email_old'.$x.'" class="form-control" style="width: 500px;" value="'.$email[$x].'" required="required" title="يجب أدخال الإيميل"/>
                          </td>
                          '.$td.'
                          </tr>';
                }
                echo '</thead></table>';
                ;
            }
            ?>
            
            <input type="hidden" name="count_phone" value="<?php echo count($telephone) ?>" />
            <input type="hidden" name="count_fax" value="<?php echo count($fax) ?>" />
            <input type="hidden" name="count_mail" value="<?php echo count($email) ?>" />
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">إسم الموقع:</label>
                <div class="col-lg-10 input-grup">

                    <input type="text" id="web_info"  name="web_info" value="<?php echo $result['web_info']; ?>" class="form-control text-right" placeholder="   إسم الموقع" required>

                </div>
            </div>
            
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">فيس بوك:</label>
                <div class="col-lg-10 input-grup">

                    <input type="text" id="facebook"  name="facebook" value="<?php echo $result['facebook']; ?>" class="form-control text-right" placeholder="   فيس بوك" required>

                </div>
            </div>
            
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">تويتر:</label>
                <div class="col-lg-10 input-grup">

                    <input type="text" id="twitter"  name="twitter" value="<?php echo $result['twitter']; ?>" class="form-control text-right" placeholder="   تويتر" required>

                </div>
            </div>
            
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">يوتيوب:</label>
                <div class="col-lg-10 input-grup">

                    <input type="text" id="youtube"  name="youtube" value="<?php echo $result['youtube']; ?>" class="form-control text-right" placeholder="   يوتيوب" required>

                </div>
            </div>


         
                         <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">إنستجرام:</label>
                <div class="col-lg-10 input-grup">

                    <input type="text" id="insta"  name="insta" value="<?php echo $result['insta']; ?>" class="form-control text-right" placeholder="   إنستجرام" required>

                </div>
            </div>

    <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">Google+:</label>
                <div class="col-lg-10 input-grup">

                    <input type="text" id="google_plus"  name="google_plus"  value="<?php echo $result['google_plus']; ?>" class="form-control text-right" placeholder="  Google+" required>

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

        <?php echo form_open_multipart('dashboard/add_main_data',array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>

            <legend data-sr="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>


            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">إسم المستشفى:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>

                    <input type="text" id="name"  name="name" class="form-control text-right" placeholder="   إسم المستشفى" required>

                </div>
            </div>
            
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">اللوجو:</label>
                <div class="col-lg-10 input-grup">

                    <input type="file" id="logo" name="logo" class="form-control text-right" required>
                    <span class="help-block"></span>

                </div>
            </div>
            
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">تاريخ الإنشاء:</label>
                <div class="col-lg-10 input-grup">

                    <input type="date" id="date_construct"  name="date_construct" class="form-control text-right" placeholder="   تاريخ الإنشاء" required>

                </div>
            </div>
            
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">العنوان:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>

                    <input type="text" id="address"  name="address" class="form-control text-right" placeholder="   العنوان" required>

                </div>
            </div>
            
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">أرقام التليفون:</label>
                <div class="col-lg-2 input-grup">

                    <input type="number" id="tele_info"  name="tele_info" min="1" max="5" onkeyup="return lood($('#tele_info').val(),'#optionearea1','tele_info');" class="form-control text-right" placeholder="   أقصى عدد 5" required>

                </div>
            </div>
            
            <div id="optionearea1"></div>
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">أرقام الفاكس:</label>
                <div class="col-lg-2 input-grup">

                    <input type="number" id="fax_info" name="fax_info" min="1" max="5" onkeyup="return lood($('#fax_info').val(),'#optionearea2','fax_info');" min="1" max="5" class="form-control text-right" placeholder="   أقصى عدد 5" required>

                </div>
            </div>
            
            
            <div id="optionearea2"></div>
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">البريد الإلكتروني:</label>
                <div class="col-lg-2 input-grup">

                    <input type="number" id="email_info"  name="email_info" min="1" max="5" onkeyup="return lood($('#email_info').val(),'#optionearea3','email_info');" class="form-control text-right" placeholder="   أقصى عدد 5" required>

                </div>
            </div>
            
            <div id="optionearea3"></div>
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">إسم الموقع:</label>
                <div class="col-lg-10 input-grup">

                    <input type="text" id="web_info"  name="web_info" class="form-control text-right" placeholder="   إسم الموقع" required>

                </div>
            </div>
            
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">فيس بوك:</label>
                <div class="col-lg-10 input-grup">

                    <input type="text" id="facebook"  name="facebook" class="form-control text-right" placeholder="   فيس بوك" required>

                </div>
            </div>
            
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">تويتر:</label>
                <div class="col-lg-10 input-grup">

                    <input type="text" id="twitter"  name="twitter" class="form-control text-right" placeholder="   تويتر" required>

                </div>
            </div>
            
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">يوتيوب:</label>
                <div class="col-lg-10 input-grup">

                    <input type="text" id="youtube"  name="youtube" class="form-control text-right" placeholder="   يوتيوب" required>

                </div>
            </div>
                <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">إنستجرام:</label>
                <div class="col-lg-10 input-grup">

                    <input type="text" id="insta"  name="insta" class="form-control text-right" placeholder="   إنستجرام" required>

                </div>
            </div>

    <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">Google+:</label>
                <div class="col-lg-10 input-grup">

                    <input type="text" id="google_plus"  name="google_plus" class="form-control text-right" placeholder="Google+" required>

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

            <th  class="text-right">إسم المستشفى</th>

            <th width="20%" class="text-right">التحكم</th>

        </tr>

        </thead>
        <tbody>
        <?php foreach($records as $record):?>
            <tr>
                <td data-title=""><?php echo word_limiter($record->name,10)?> </td>

                <td data-title="التحكم" class="text-center">

                    <button type="button" class="btn btn-info btn-xs col-lg-5" data-toggle="modal" data-target="#myModal"><i class="fa fa-list"></i> عرض </button>

                    <a href="<?php echo base_url().'dashboard/update_main_data/'.$record->id?>" class="btn btn-warning btn-xs col-lg-5"><i class="fa fa-pencil"></i> تعديل</a>

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
              <table id="" class="table table-bordered table-hover table-striped" cellspacing="0" width="99%" style="margin-right: 6px;">
              <tr>
              <td>إسم المستشفى </td>
              <td><?php echo $record->name ?></td>
              </tr>
              
              <tr>
              <td>اللوجو</td>
              <td  style="width: 76%;"><img src="<?php echo base_url('uploads/images/'.$record->logo.''); ?>" width="15%"/></td>
              </tr>
              
              <tr>
              <td>تاريخ الإنشاء</td>
              <td><?php echo date('d-m-Y',$record->date_construct) ?></td>
              </tr>
              <tr>
              <td><h5>ارقام التليفون</h5></td>
              <td>
              <?php
                $phones = unserialize($record->tele_info);
                for($x = 0 ; $x < count($phones) ; $x++)
                    echo '<h5>'.$phones[$x].'</h5>';
              ?>
              </td>
              </tr>
              <tr>
              <td><h5>ارقام الفاكس</h5></td>
              <td>
              <?php
                $faxes = unserialize($record->fax_info);
                for($x = 0 ; $x < count($faxes)  ;$x++)
                    echo '<h5>'.$faxes[$x].'</h5>';
              ?>
              </td>
              </tr>
              <tr>
              <td><h5>الايميلات</h5></td>
              <td>
              <?php
                $emails = unserialize($record->email_info);
                for($x = 0 ; $x < count($emails) ; $x++)
                    echo '<h5>'.$emails[$x].'</h5>';  
              ?>
              </td>
              </tr>
              <tr>
              <td>العنوان</td>
              <td><?php echo $record->address ?></td>
              </tr>
              <tr>
              <td>الموقع الإلكتروني</td>
              <td><?php echo $record->web_info ?></td>
              </tr>
              <tr>
              <td>رابط الفيسبوك</td>
              <td><?php echo $record->facebook ?></td>
              </tr>
              <tr>
              <td>رابط تويتر</td>
              <td><?php echo $record->twitter ?></td>
              </tr>
              <tr>
              <td>رابط اليوتيوب</td>
              <td><?php echo $record->youtube ?></td>
              </tr>
               <tr>
              <td>رابط الإنستجرام</td>
              <td><?php echo $record->insta ?></td>
              </tr>
               <tr>
              <td>رابط Google+</td>
              <td><?php echo $record->google_plus ?></td>
              </tr>
              </table>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
      </div>
    </div>
  </div>
</div>

<script>
 function lood(num,div,page){
    var cleer = '#' + page;
    if(num != 0)
    {
        var id = num;
        var dataString = 'num=' + id + '&page=' + page;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>/dashboard/add_main_data',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
             $(div).html(html);
            } 
        });
    
        return false;
        }
    else
    {
        $(cleer).val('');
        $(div).html('');
        return false;
    }  
 }
</script>