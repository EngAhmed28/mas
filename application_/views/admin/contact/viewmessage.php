<h2 class="text-flat">إدارة الرسائل <span class="text-sm"><?php echo $title; ?></span></h2>
<ul class="breadcrumb pb30">
    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>
    <li><a href="#">إدارة الرسائل</a></li>
    <li class="active"><?php echo $title; ?></li>
</ul>
<span id="message">

<?php

if(isset($_SESSION['message']))

    echo $_SESSION['message'];

unset($_SESSION['message']);

?>
    </span>

<?php
if($_SESSION['role_id_fk'] == 1){
?>
<div class="col-md-12 col-sm-12 col-xs-12 ">
    <div class="row text-right" data-sr="wait 0s">
        
        
        <h2 class="text-right">
            <div class="col-md-3">
            <a  data-toggle="tooltip" data-placement="top" title="التاريخ">:التاريخ</a></div>
            <div class="col-md-8"> <?php echo date("a h:i:s - Y/m/d",$result['date_s'])?></div>
            
        </h2>
        
        <h2 class="text-right">
<div class="col-md-3">
            <a  data-toggle="tooltip" data-placement="top" title="الإسم">:الإسم</a></div>
            <div class="col-md-8"><?php echo $result['name']?> </div>
        </h2>
        
        <h2 class="text-right">
<div class="col-md-3">
            <a  data-toggle="tooltip" data-placement="top" title="الإيميل">:الإيميل</a></div>
            <div class="col-md-8"><?php echo $result['email']?> </div>
        </h2>
        
        <h2 class="text-right">
<div class="col-md-3">
            <a  data-toggle="tooltip" data-placement="top" title="عنوان المحتوي">:الموضوع</a></div>
            <div class="col-md-8"><?php echo $result['title']?> </div>
        </h2>
        
        </div>
        <br /><hr /><br />
        <div class="text-right">
          <p><?php echo $result["content"]?></p>
        </div>
    
    
</div>

<div class="row  text-center">

<a href="<?php echo base_url().'dashboard/contact'?>" class="btn btn-primary btn-xs col-lg-12"><i class="fa fa-reply"></i> الرجوع للرسائل الواردة</a>
</div>

<?php
}
if($_SESSION['role_id_fk'] == 3){
?>


<div class="col-md-12 col-sm-12 col-xs-12 ">
    <div class="row text-right" data-sr="wait 0s">
        
        
        <h2 class="text-right">
            <div class="col-md-3">
            <a  data-toggle="tooltip" data-placement="top" title="التاريخ">:التاريخ</a></div>
            <div class="col-md-8"> <?php echo date("a h:i:s - Y/m/d",$result['date_s'])?></div>
            
        </h2>
        
        <h2 class="text-right">
<div class="col-md-3">
            <a  data-toggle="tooltip" data-placement="top" title="الإسم">:الإسم</a></div>
            <div class="col-md-8"><?php echo $result['name']?> </div>
        </h2>
        
        <h2 class="text-right">
<div class="col-md-3">
            <a  data-toggle="tooltip" data-placement="top" title="الإيميل">:الإيميل</a></div>
            <div class="col-md-8"><?php echo $result['email']?> </div>
        </h2>
     
        
        </div>
        <br /><hr /><br />
        <div class="text-right">
          <p><?php echo $result["question"]?></p>
        </div>
    
    <br /><br />
</div>

<div class="col-md-6">
 <?php
 
 if($result["answer"])
 {
    $button = '<button type="button" data-toggle="modal" data-target="#myModal'.$result["id"] .'" class="btn btn-success btn-xs col-lg-6 text-center"><i class="fa fa-reply"></i> تعديل الرد</button>';
    $replay = $result["answer"];
    }
 else{
  $button = '<button type="button" data-toggle="modal" data-target="#myModal'.$result["id"] .'" class="btn btn-success btn-xs col-lg-6 text-center"><i class="fa fa-reply"></i>رد على السؤال</button>';
  $replay = '';
  }
 ?>   

<a href="<?php echo base_url().'dashboard/contact'?>" class="btn btn-primary btn-xs col-lg-6 text-center"><i class="fa fa-undo"></i> الرجوع للرسائل الواردة</a>

<?php echo $button; ?>

</div>

<?php if($result["answer"]){ ?>
<div class="col-md-12 ">
    <div class="row text-right" data-sr="wait 0s">
<br /><hr />
<h4 class="alert alert-info ">تم الرد والتفاصيل هي:</h4>
<br />
          <h5><?php echo $result["answer"]?></h5>
        </div> </div>
        
        <?php } ?>


<form method="post" action="<?php echo base_url('dashboard/send_answer/') ?>/<?php echo $result["id"] ?>">
 <div class="modal fade" id="myModal<?php echo $result["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:550px">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">الرد على السؤال</h4>
             </div>
 
                        <div class="row" style="margin-right:10px">
                                                <div class="col-md-3">
                                                      <h5>نص الرسالة:</h5>
                                                 </div>
                                                 <br />
                                                <div class="col-sm-9">
                                                    <textarea rows="9" cols="30" name="replay<?php echo $result["id"] ?>" ><?php echo $replay ?></textarea>
                                                </div>
                                           </div>
                    <div class="modal-footer">
                    <button type="submit" name="submit<?php echo $result["id"] ?>" class="btn btn-primary" >إرسال</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
        
      </div>
    </div>
  </div>
</div>
</form>
<?php
}
?>

