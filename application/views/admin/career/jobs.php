<h2 class="text-flat">إدارة الوظائف <span class="text-sm"><?php echo $title; ?></span></h2>

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
    
    
     <?php echo form_open_multipart('dashboard/update_jobs/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>
       <fieldset>

            <legend data-sr="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">تاريخ الإعلان:</label>
                <div class="col-lg-10 input-grup">
                    <!--i class="fa fa-calendar-check-o"></i-->

                    <input type="date" id="start_date"  name="start_date" value="<?php echo date('Y-m-d',$result['start_date']) ?>" class="form-control text-right" placeholder="   تاريخ الإعلان" required>

                </div>
            </div>
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">تاريخ إنتهاء الإعلان:</label>
                <div class="col-lg-10 input-grup">
                    <!--i class="fa fa-calendar-times-o"></i-->

                    <input type="date" id="end_date"  name="end_date" value="<?php echo date('Y-m-d',$result['end_date']) ?>" class="form-control text-right" placeholder="   تاريخ إنتهاء الإعلان" required>

                </div>
            </div>


            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">إسم الوظيفة:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-wordpress"></i>

                    <input type="text" id="job_name"  name="job_name" value="<?php echo $result['job_name'] ?>" class="form-control text-right" placeholder="   إسم الوظيفة" required>

                </div>
            </div>
            
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">مقر العمل:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-map-marker"></i>

                    <input type="text" id="job_place"  name="job_place" value="<?php echo $result['job_place'] ?>"  class="form-control text-right" placeholder="   مقر العمل" required>

                </div>
            </div>
            
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">العمالة المطلوبة:</label>
                <div class="col-lg-10 input-grup">
                <i class="fa fa-users"></i>

                    <input type="text" id="workers"  name="workers" value="<?php echo $result['workers'] ?>"  class="form-control text-right" placeholder="   العمالة المطلوبة" required>

                </div>
            </div>
            
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">متطلبات الوظيفة:</label>
                <div class="col-lg-3 input-grup">

                    <input type="number" id="job_requires" name="job_requires" min="1" max="15" onkeyup="return lood($('#job_requires').val());" class="form-control text-right" placeholder="   أقصى عدد 15" >

                </div>
            </div>
            
            
            
            <div id="optionearea1"></div>
            
            <?php
            
            $requires=unserialize($result['job_requires']);
            $mode = current($requires);
            if($requires){
                echo '<table class="table table-bordered table-hover table-striped" cellspacing="0" " style="margin-right: 145px; width: 80%;" >
                      <thead>
                      <tr>
                      <th class="text-right">إسم المطلب</th>
                      <th class="text-right">المطلب</th>
                      <th class="text-right">التحكم</th>
                      </tr>';
                for($x = 0 ; $x < count($requires) ; $x++){
                    if(count($requires) > 1)
                    {
                        $td = '<td >
                               <a  href="'.base_url().'dashboard/delete_requires/'.$result['id'].'/'.$x.'"  class="btn btn-danger btn-xs col-lg-12">
                                حذف <i class="fa fa-trash"></i></a>
                               </td>';
                    }
                    else
                        $td = '<td class="text-right">______</td >';
                    echo '<tr class="">
                          <td>
                          <input type="text" name="requires_name_old'.$x.'" class="form-control" value="'.key($requires).'" required="required" title="إسم المطلب"/>
                          </td>
                          <td>
                          <input type="text" name="requires_value_old'.$x.'" class="form-control" value="'.$requires[key($requires)].'" required="required" title="المطلب"/>
                          </td>
                          '.$td.'
                          </tr>';
                          $mode = next($requires);
                }
                echo '</thead></table>';
            }
            ?>
            
            
            <input type="hidden" name="count_requires" value="<?php echo count($requires) ?>" />
      
            <div class="form-group" data-sr="wait 0.3s, then enter bottom and hustle 100%">

                <div class="col-xs-10 col-xs-pull-2">

                    <input type="submit"  name="update" value="حفظ" class="btn btn-primary" >
                </div>

            </div>

        </fieldset>
        

        <!-- </form>-->

        <?php echo form_close()?>

    
    
     
     
     
     
    <?php else: ?>

        <?php echo form_open_multipart('dashboard/add_jobs',array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>

            <legend data-sr="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">تاريخ الإعلان:</label>
                <div class="col-lg-10 input-grup">
                    <!--i class="fa fa-calendar-check-o"></i-->

                    <input type="date" id="start_date"  name="start_date" class="form-control text-right" placeholder="   تاريخ الإعلان" required>

                </div>
            </div>
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">تاريخ إنتهاء الإعلان:</label>
                <div class="col-lg-10 input-grup">
                    <!--i class="fa fa-calendar-times-o"></i-->

                    <input type="date" id="end_date"  name="end_date" class="form-control text-right" placeholder="   تاريخ إنتهاء الإعلان" required>

                </div>
            </div>


            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">إسم الوظيفة:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-wordpress"></i>

                    <input type="text" id="job_name"  name="job_name" class="form-control text-right" placeholder="   إسم الوظيفة" required>

                </div>
            </div>
            
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">مقر العمل:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-map-marker"></i>

                    <input type="text" id="job_place"  name="job_place" class="form-control text-right" placeholder="   مقر العمل" required>

                </div>
            </div>
            
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">العمالة المطلوبة:</label>
                <div class="col-lg-10 input-grup">
                <i class="fa fa-users"></i>

                    <input type="text" id="workers"  name="workers" class="form-control text-right" placeholder="   العمالة المطلوبة" required>

                </div>
            </div>
            
            
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">متطلبات الوظيفة:</label>
                <div class="col-lg-3 input-grup">

                    <input type="number" id="job_requires" name="job_requires" min="1" max="15" onkeyup="return lood($('#job_requires').val());" class="form-control text-right" placeholder="   أقصى عدد 15" required>

                </div>
            </div>
            
            
            <div id="optionearea1"></div>
            


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

            <th  width="20%" class="text-right">إسم الوظيفة</th>

            <th width="12%" class="text-right">تاريخ الإعلان</th>

            <th width="12%" class="text-right">تاريخ الإنتهاء</th>
            
            <th width="38%" class="text-right">التحكم</th>
            
            <th width="20%" class="text-right">الحالة</th>

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
                <td data-title=""><?php echo $record->job_name?> </td>
                
                <td  data-title=""><?php echo date('Y/m/d',$record->start_date)?></td>
                <td  data-title=""><?php echo date('Y/m/d',$record->end_date)?></td>

                <td data-title="التحكم" class="text-center">
                
                    <button type="button" class="btn btn-info btn-xs col-lg-3" data-toggle="modal" data-target="#myModal<?php echo $record->id?>"><i class="fa fa-list"></i> التفاصيل </button>

                    <a href="<?php echo base_url().'dashboard/update_jobs/'.$record->id?>" class="btn btn-warning btn-xs col-lg-3"><i class="fa fa-pencil"></i> تعديل</a>

                    <a  href="<?php echo base_url().'dashboard/delete_jobs/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-3"><i class="fa fa-trash"></i> حذف</a>

                </td>
                
                <td data-title="" class="text-center">

                    <a href="<?php echo base_url().'dashboard/suspend_job/'.$record->id.'/'.$class?>" class="btn btn-<?php echo $class ?> btn-xs col-lg-6"><?php echo $title ?> </a>

                </td>
              

            </tr>
            
            <div class="modal fade www" id="myModal<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:550px">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">التفاصيل </h4>
             </div>
             
             <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>إسم الوظيفة:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo $record->job_name?></h5>
                           </div>
                      </div>
                     <div class="row" style="margin-right:10px">
                                                           <div class="col-md-4">
                                                            <h5>تاريخ الإعلان:</h5>
                                                           </div>
                                                 <div class="col-sm-8">
                              <h5><?php echo date('Y/m/d',$record->start_date)?></h5>
                           </div>
                      </div>
             <div class="row" style="margin-right:10px">
                            <div class="col-md-4">
                                  <h5>تاريخ الإنتهاء:</h5>
                             </div>
                            <div class="col-sm-8">
                               <h5><?php echo date('Y/m/d',$record->end_date) ?></h5>
                          </div>
                      </div>
                <div class="row" style="margin-right:10px">
                                    <div class="col-md-4">
                                          <h5>مقر العمل</h5>
                                       </div>
                                      <div class="col-sm-8">
                                           <h5><?php echo $record->job_place ?></h5>
                                      </div>
                                 </div>
                        <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>العمالة المطلوبة:</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                     <h5><?php echo $record->workers ?></h5>
                                                </div>
                                           </div>
                                           
                        <div class="row" style="margin-right:10px">
                                                <div class="col-md-4">
                                                      <h5>متطلبات الوظيفة:</h5>
                                                 </div>
                                                <div class="col-sm-8">
                                                <?php
                                                $requires = unserialize($record->job_requires);
                                                $mode = current($requires);
                for($x = 1 ; $x <= count($requires) ; $x++)
                {
                    echo '<h5><b>'.key($requires).':</b></h5>'.$requires[key($requires)];
                    $mode = next($requires);
                    }
                                                
                                                ?>
                                                     
                                                </div>
                                           </div>
                                           
                    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
      </div>
    </div>
  </div>
</div>

        <?php endforeach ;?>

        </tbody>

    </table>
    
    

    

<?php endif;?>

<script>
 function lood(num){
    
    if(num)
    {
        var id = num;
        var dataString = 'num=' + id ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>/dashboard/add_jobs',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
             $('#optionearea1').html(html);
            } 
        });
    
        return false;
        }
    else
    {
        $('#optionearea1').html('');
        
    }  
 }
</script>