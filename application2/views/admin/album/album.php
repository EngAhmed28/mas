

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

        <!-- <form class="form-horizontal">-->
        <?php echo form_open_multipart('dashboard/update_album/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>

        <fieldset>

            <legend data-sr="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>


           
            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">الصور</label>
                <div class="col-lg-2 input-grup">
                 

                    <input type="number" id="photo_num"  name="photo_num" min="1" max="10" onkeyup="return lood($('#photo_num').val());" class="form-control text-right" placeholder="   عدد الصور" >

                </div>
            </div>
            
            <div id="optionearea1"></div>
            
            <?php
            
            $photo=unserialize($result['img']);
            if($photo){
                echo '<table class="table table-bordered table-hover table-striped" cellspacing="0" " style="margin-right: 191px; width: 56%;" >
                      <thead>';
                for($x = 0 ; $x < count($photo) ; $x++){
                    if(count($photo) > 1)
                    {
                        $td = '<td style="padding-top: 10%px;">
                               <a  href="'.base_url().'dashboard/delete_photo_album/'.$result['id'].'/'.$x.'"  class="btn btn-danger btn-xs col-lg-12">
                                حذف <i class="fa fa-trash"></i></a>
                               </td>';
                    }
                    else
                        $td = '';
                    
                    $img = base_url('uploads/images').'/'.$photo[$x];
                    echo '<tr class="">
                          <td class="text-center">
                          <img src="'.$img.'" height="200px" width="200px">
                          </td>
                          '.$td.'
                          </tr>';
                }
                echo '</thead></table>';
            }
            ?>



            <div class="form-group" data-sr="wait 0.3s, then enter bottom and hustle 100%">

                <div class="col-xs-10 col-xs-pull-2">

                    <input type="submit" name="update_album" value="حفظ" class="btn btn-primary" >
                </div>

            </div>

        </fieldset>

        <!-- </form>-->



        <!-- </form>-->

        <?php echo form_close()?>

    <?php else: ?>

        <?php echo form_open_multipart('dashboard/add_album',array('class'=>"form-horizontal",'role'=>"form" ))?>
        <fieldset>

            <legend data-sr="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>



            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">الصور</label>
                <div class="col-lg-2 input-grup">
                 

                    <input type="number" id="photo_num"  name="photo_num" min="1" max="10" onkeyup="return lood($('#photo_num').val());" class="form-control text-right" placeholder="   عدد الصور" required>

                </div>
            </div>
            
            <div id="optionearea1"></div>

  



            <div class="form-group" data-sr="wait 0.3s, then enter bottom and hustle 100%">

                <div class="col-xs-10 col-xs-pull-2">

                    <button type="reset" class="btn btn-default">إبدأ من جديد ؟</button>

                    <input type="submit"  name="add_album" value="حفظ" class="btn btn-primary" >
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

            <th  class="text-center">الصور</th>


            <th width="30%" class="text-center">التحكم</th>
            

        </tr>

        </thead>
        <tbody>
        <?php $serial = 0; ?>
        <?php foreach($records as $record):?>
        <?php 
            $serial++; 
    $photo=unserialize($record->img);
     $img='';
     
    for($x=0;$x<count($photo);$x++){
       
        $img = base_url('uploads/images').'/'.$photo[$x];
 
    }
         
        ?>
            <tr>
                <td data-title="#"><span class="badge"><?php echo $serial?></span></td>
                <td data-title="صورة الإعلان" style=" padding-right: 150px;">
                <div id="myCarouse<?php echo $record->id?>" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner" role="listbox">';
                 
    <?php
    $photo=unserialize($record->img);
    for($x=0;$x<count($photo);$x++){
        if($x==0){
            $active='active';
        }else{
            $active='';
        }
        $img = base_url('uploads/images').'/'.$photo[$x];
    echo '
      <div class="item '.$active.'" >
        <img src="'.$img.'" alt="صور المكتبة" style="width:100px;height:100px;">
      </div>';
    }
    ?>
    
    </div>
    <a class="left carousel-control" href="#myCarouse<?php echo $record->id?>" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarouse<?php echo $record->id?>" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    </div>
                </td>
              
                <td data-title="التحكم" class="text-center">
 <button type="button" class="btn btn-info btn-xs col-lg-4" data-toggle="modal" data-target="#myModal<?php echo $record->id?>"><i class="fa fa-list"></i> التفاصيل </button>
                    <a href="<?php echo base_url().'dashboard/update_album/'.$record->id?>" class="btn btn-warning btn-xs col-lg-3"><i class="fa fa-pencil"></i> تعديل</a>

                    <a  href="<?php echo base_url().'dashboard/delete_album/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-3"><i class="fa fa-trash"></i> حذف</a>

                </td>
                
       
              

            </tr>
                        <div class="modal fade" id="myModal<?php echo $record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">مكتبة الصور</h4>
      </div>
      <br />
      


       
      <div class="modal-body">
      <div class="col-sm-2" style="font-size: 16px;">الصور</div>
      <div class="col-sm-10">
        <div class="row">
         <div id="myCarousel<?php echo $record->id?>" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner" role="listbox">';
                 
    <?php
    $photo=unserialize($record->img);
    for($x=0;$x<count($photo);$x++){
        if($x==0){
            $active='active';
        }else{
            $active='';
        }
        $img = base_url('uploads/images').'/'.$photo[$x];
    echo '
      <div class="item '.$active.'">
        <img src="'.$img.'" alt="صور المكتبة">
      </div>';
    }
    ?>
    
    </div>
    <a class="left carousel-control" href="#myCarousel<?php echo $record->id?>" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel<?php echo $record->id?>" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    </div>
  </div>
  
  <br/><br /> 
        </div>
        
 
         <div class="col-md-3" style="font-size: 16px;"></div>
        <div class="col-md-9"></div>
        <br /><br />

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
  

        <?php endforeach ;?>

        </tbody>

    </table>

    <div class="col-xs-12 mt30 text-center">

        <?php echo  $links?>
    </div>

<?php endif;?>

<script>
 function lood(num){
    if(num>0)
    {
        var id = num;
        var dataString = 'num=' + id ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>/dashboard/add_album',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
             $("#optionearea1").html(html);
            } 
        });
    
        return false; 
        } 
        else{
            $("#optionearea1").html('');
        }
 }
</script>

<style>
          .carousel-inner > .item > img,
          .carousel-inner > .item > a > img {
              width: 70%;
              margin: auto;
          }
  </style>
