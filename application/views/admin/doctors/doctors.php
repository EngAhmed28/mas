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
    <?php echo form_open_multipart('dashboard/update_Doctors/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>
    <fieldset>
        <legend data-sr="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>

        <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
            <label for="inputUser" class="col-lg-2 control-label">إسم الطبيب:</label>
            <div class="col-lg-10 input-grup">
                <i class="fa fa-user"></i>
                <input type="text" id="name"  name="name" value="<?php echo $result['name']; ?>" class="form-control text-right" placeholder=" إسم الطبيب" required>
            </div>
        </div>

        <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
            <label for="inputUser" class="col-lg-2 control-label">الصورة:</label>
            <div class="col-lg-10 input-grup">
                <img src="<?php echo base_url('uploads/thumbs/'.$result['img'])?>" alt="الصورة" class="img-rounded" width="150" height="150">
                <input type="file" id="img" name="img" class="form-control text-right" >
                <span class="help-block"></span>
            </div>
        </div>


        <div class="form-group"  >
            <label for="select" class="col-lg-2 control-label">القسم </label>
            <div class="col-lg-10">
                <select id="depart_id" name="depart_id" class="form-control">
                
                <?php
                print_r($sections);
                ?>
                    <?foreach($sections as $section):
                    echo $result['departments'];
                    echo 'sadfsdfsdfsdfsdfsdf';
                    
                        $selected='';
                        if ($section->id == $result['depart_id']):
                            $selected='selected';
                        endif?>
                        <option value="<?php echo $section->id?>" 
                        <?php echo $selected ;?> ><?php echo $section->dep_name?> </option>
                    <?endforeach?>
                </select>
            </div>
        </div>



        <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
            <label for="inputUser" class="col-lg-2 control-label">رقم الجوال:</label>
            <div class="col-lg-10 input-grup">
                <input type="number" id="phone"  name="phone"  value="<?php echo $result['phone']; ?>" class="form-control text-right" placeholder=" رقم الجوال" required>
            </div>
        </div>

        <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
            <label for="inputUser" class="col-lg-2 control-label">التخصص:</label>
            <div class="col-lg-10 input-grup">
                <input type="text" id="major"  name="major" value="<?php echo $result['major']; ?>" class="form-control text-right" placeholder=" التخصص" required>
            </div>
        </div>


        <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
            <label for="inputUser" class="col-lg-2 control-label">البريد الألكترونى:</label>
            <div class="col-lg-10 input-grup">
                <input type="email" id="email"  name="email" value="<?php echo $result['email']; ?>" class="form-control text-right" placeholder=" البريد الألكترونى" required>
            </div>
        </div>

        <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
            <label for="inputUser" class="col-lg-2 control-label">تفاصيل اخري:</label>
            <div class="col-lg-10 input-grup">
                <i class="fa fa-newspaper-o"></i>
                <textarea  id="other"  name="other" class="form-control text-right"><?php echo $result['other']; ?></textarea>
            </div>
        </div>

<?php
  //var_dump($times);
    
if($times != ''){?>

<?php
    $satr="";
 $satr1="";
 $satr2="";
 $satr3="";
 $satr4="";
 $satr5="";
for($x=0;$x<count($times);$x++){
    //var_dump($times[$x]->time);

   if($times[$x]->day == "0"){
    $satr =$times[$x]->time ;
   }
  
     if($times[$x]->day == "1"){
    $satr1 =$times[$x]->time ;
   }
   
        if($times[$x]->day == "2"){
    $satr2 =$times[$x]->time ;
    }
          if($times[$x]->day == "3"){
    $satr3 =$times[$x]->time ;
   }
   
         if($times[$x]->day == "4"){
    $satr4 =$times[$x]->time ;
   }
          if($times[$x]->day == "5"){
    $satr5 =$times[$x]->time ;
   }
   }



?>
<h3 class="text-center"> مواعيد الطبيب :</h3>
   <div class="form-group" >
   
     <label for="inputUser" class="col-lg-2 control-label"> السبت :</label>
            <div class="col-lg-4 input-grup">
                <i class="glyphicon glyphicon-time"></i>
                <input type="text" id="0"  name="days0" value="<?php echo $satr?>" class="form-control text-right" placeholder="السبت " >
            </div>
               <label for="inputUser" class="col-lg-2 control-label"> الأحد :</label>
            <div class="col-lg-4 input-grup">
                <i class="glyphicon glyphicon-time"></i>
                <input type="text" id="1"  name="days1" value="<?php echo $satr1?>" class="form-control text-right" placeholder="الاحد " >
            </div>
            
                <label for="inputUser" class="col-lg-2 control-label"> الأثنين  :</label>
            <div class="col-lg-4 input-grup">
                <i class="glyphicon glyphicon-time"></i>
                <input type="text" id="2"  name="days2" value="<?php echo $satr2?>" class="form-control text-right" placeholder="الأثنين " >
            </div>
                  <label for="inputUser" class="col-lg-2 control-label"> الثلاثاء  :</label>
            <div class="col-lg-4 input-grup">
                <i class="glyphicon glyphicon-time"></i>
                <input type="text" id="3"  name="days3" value="<?php echo $satr3?>" class="form-control text-right" placeholder="الثلاثاء " >
            </div>
                    <label for="inputUser" class="col-lg-2 control-label"> الأربعاء  :</label>
            <div class="col-lg-4 input-grup">
                <i class="glyphicon glyphicon-time"></i>
                <input type="text" id="4"  name="days4" value="<?php echo $satr4?>" class="form-control text-right" placeholder="الأربعاء " >
            </div>
                      <label for="inputUser" class="col-lg-2 control-label"> الخميس  :</label>
            <div class="col-lg-4 input-grup">
                <i class="glyphicon glyphicon-time"></i>
                <input type="text" id="5"  name="days5" value="<?php echo $satr5?>" class="form-control text-right" placeholder="الخميس " >
            </div>
</div>
           
         <?   }else{?>
      
      
      
<h3 class="text-center"> مواعيد الطبيب :</h3>
<?php
 $days=array('السبت','الأحد','الأثنين','الثلاثاء','الأربعاء ','الخميس');

 ?>
        <div class="form-group" >
          
          <?php 
          
         
          for($x=0;$x<count($days);$x++){
            
          ?>
            <label for="inputUser" class="col-lg-2 control-label"> <?php echo $days[$x]?> :</label>
            <div class="col-lg-4 input-grup">
                <i class="glyphicon glyphicon-time"></i>
                <input type="text" id="<?php echo $x?>"  name="days<?php echo $x?>" class="form-control text-right" placeholder="<?php echo $days[$x]?>" >
            </div>
        
            
            <?php
            }
            ?>
        </div>
<?}?>





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
    <?php echo form_open_multipart('dashboard/add_doctors',array('class'=>"form-horizontal",'role'=>"form" ))?>
    <fieldset>
        <legend data-sr="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>


        <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
            <label for="inputUser" class="col-lg-2 control-label">إسم الطبيب:</label>
            <div class="col-lg-10 input-grup">
                <i class="fa fa-user"></i>
                <input type="text" id="name"  name="name" class="form-control text-right" placeholder=" إسم الطبيب" required>
            </div>
        </div>

        <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
            <label for="inputUser" class="col-lg-2 control-label">الصورة:</label>
            <div class="col-lg-10 input-grup">
                <input type="file" id="img" name="img" class="form-control text-right" required>
                <span class="help-block"></span>
            </div>
        </div>


        <div class="form-group"  >
            <label for="select" class="col-lg-2 control-label">القسم </label>
            <div class="col-lg-10">
                <select id="depart_id" name="depart_id" class="form-control">
                    <?foreach($sections as $section):?>
                        <option value="<?php echo $section->id?>"><?php echo $section->dep_name?> </option>
                    <?endforeach?>
                </select>
            </div>
        </div>

        <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
            <label for="inputUser" class="col-lg-2 control-label">رقم الجوال:</label>
            <div class="col-lg-10 input-grup">
                <input type="number" id="phone"  name="phone" class="form-control text-right" placeholder=" رقم الجوال" required>
            </div>
        </div>

        <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
            <label for="inputUser" class="col-lg-2 control-label">التخصص:</label>
            <div class="col-lg-10 input-grup">
                <input type="text" id="major"  name="major" class="form-control text-right" placeholder=" التخصص" required>
            </div>
        </div>


        <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
            <label for="inputUser" class="col-lg-2 control-label">البريد الألكترونى:</label>
            <div class="col-lg-10 input-grup">
                <input type="email" id="email"  name="email" class="form-control text-right" placeholder=" البريد الألكترونى" required>
            </div>
        </div>

        <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
            <label for="inputUser" class="col-lg-2 control-label">تفاصيل اخري:</label>
            <div class="col-lg-10 input-grup">
                <i class="fa fa-newspaper-o"></i>
                <textarea  id="other"  name="other" class="form-control text-right"></textarea>
            </div>
        </div>
        
           <div class="form-group" data-sr="wait 0.3s, then enter bottom and hustle 100%">
            <div  id="optionearea3" >
         
         
         </div>
            
 
        </div>
        
        

        <div class="form-group" data-sr="wait 0.3s, then enter bottom and hustle 100%">
            <div class="col-xs-10 col-xs-pull-2">
                <button type="reset" class="btn btn-default">إبدأ من جديد ؟</button>
                <input type="submit"  name="add" value="حفظ" class="btn btn-primary" >
                <input type="button" name="add_times" value="تعيين المواعيد" class="btn btn-warning" onclick="return ss();">
                
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

            <th  class="text-right">إسم الطبيب</th>

            <th class="text-right">التخصص</th>

            <th width="20%" class="text-right">التحكم</th>

            <th width="20%" class="text-right">التفاصيل</th>

            <th class="text-right">حالة الطبيب</th>
        
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
                 foreach($sections as $dep):
                if($dep->id == $record->depart_id)
                    $depart = $dep->dep_name;
            endforeach;
            ?>
            <tr>
                <td data-toggle="modal" data-target="#myModall<?php echo $record->id ?>"><span class="badge"><?php echo $x?></span></td>
                <td data-toggle="modal" data-target="#myModall<?php echo $record->id ?>"><?php echo $record->name?> </td>
                <td  data-toggle="modal" data-target="#myModall<?php echo $record->id ?>">
                <?php echo $depart ?> </td>

                <td data-title="التحكم" class="text-center">

                    <a href="<?php echo base_url().'dashboard/update_Doctors/'.$record->id?>" class="btn btn-warning btn-xs col-lg-5"><i class="fa fa-pencil"></i> تعديل</a>

                    <a  href="<?php echo base_url().'dashboard/delete_Doctors/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-5"><i class="fa fa-trash"></i> حذف</a>

                </td>
                <td data-toggle="modal" data-target="#myModall<?php echo $record->id ?>">
                    <a class=" btn btn-sm btn-info btn-xs col-lg-7"><?php echo 'تفاصيل' ?> </a>
                </td>
                <td data-title="" class="text-center">

                    <a href="<?php echo base_url().'dashboard/suspend_doctors/'.$record->id.'/'.$class?>" class="btn btn-<?php echo $class ?> btn-xs col-lg-6"><?php echo $title ?> </a>

                </td>

        

            </tr>

            <div class="modal fade" id="myModall<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">



                <div class="modal-dialog" role="document">



                    <div class="modal-content" style="width:550px">



                        <div class="modal-header">



                            <button type="button" class="close" data-dismiss="modal">&times;</button>



                            <h4 class="modal-title">تفاصيل الطبيب</h4>



                        </div>






                        <?php if(isset($record->name)&&$record->name!=null):?>
                            <div class="row" style="margin-right:10px">
                                <div class="col-md-4">
                                    <h5>إسم المتطوع	 :</h5>
                                </div>
                                <div class="col-sm-8">
                                    <h5><?php echo $record->name?></h5>
                                </div>
                            </div>
                        <?php endif;  ?>


                        <?php if(isset($sec[$record->depart_id])&&$sec[$record->depart_id]!=null):?>
                            <div class="row" style="margin-right:10px">
                                <div class="col-md-4">
                                    <h5>القسم :</h5>
                                </div>
                                <div class="col-sm-8">
                                    <h5><?php echo $sec[$record->depart_id] ?></h5>
                                </div>
                            </div>
                        <?php endif;  ?>

                        <?php if(isset($record->phone)&&$record->phone!=null):?>
                            <div class="row" style="margin-right:10px">
                                <div class="col-md-4">
                                    <h5>رقم الجوال:</h5>
                                </div>
                                <div class="col-sm-8">
                                    <h5><?php echo $record->phone ?></h5>
                                </div>
                            </div>
                        <?php endif; ?>


                        <?php if(isset($record->major)&&$record->major!=null):?>
                            <div class="row" style="margin-right:10px">
                                <div class="col-md-4">
                                    <h5>التخصص:</h5>
                                </div>

                                <div class="col-sm-8">
                                    <h5><?php echo $record->major ?></h5>
                                </div>
                            </div>
                        <?php endif; ?>





                        <?php if(isset($record->email)&&$record->email!=null):?>

                            <div class="row" style="margin-right:10px">
                                <div class="col-md-4">
                                    <h5>البريد الألكترونى:</h5>
                                </div>

                                <div class="col-sm-8">
                                    <h5><?php echo $record->email ?></h5>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if(isset($record->other)&&$record->other!=null):?>

                            <div class="row" style="margin-right:10px">
                                <div class="col-md-4">
                                    <h5>تفاصيل اخري:</h5>
                                </div>

                                <div class="col-sm-8">
                                    <h5><?php echo $record->other ?></h5>
                                </div>
                            </div>
                        <?php endif; ?>




                        <?php //echo $div; ?>
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



<style>

    td { cursor: pointer; cursor: hand; }


.btn-mobileSelect-gen {
display:none!important;
}

#depart_id {
display:block!important;
}



</style>


<script>
 function ss(){
   var num = 'num=1';
        $.ajax({
          
            type:'post',
            url: '<?php echo base_url() ?>/dashboard/add_doctors',
            dataType: 'html',
            data:num,
            cache:false,
            success: function(html){
             $("#optionearea3").html(html);
            } 
        });
    
    
        
      
 }
</script>
