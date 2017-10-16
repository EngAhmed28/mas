<!--<h2 class="text-flat">إدارة المرضى والكشوفات<span class="text-sm"><?php echo $title; ?></span></h2>
-->
<!--<ul class="breadcrumb pb30">
    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الملف الإلكتروني للمرضى </a></li>
    <li class="active"><?php echo $title; ?></li>
</ul>

-->
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
    </span>
    <?php
 /* $today = date('YmdHi');
$startDate = date('YmdHi', strtotime('-10 days'));
$range = $today - $startDate;
$rand = rand(0, $range);
//echo "$rand and " . ($startDate + $rand);
    echo $rand;
    */
    /*echo $random = substr(number_format(time() * rand(),0,'',''),0,10);*/
    ?>
<div class="col-md-12">
        <div class="panel with-nav-tabs panel-default">
            <div class="panel-heading">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#tab0default" data-toggle="tab">إضافة كشف</a></li>
                    <li><a href="#tab1default" data-toggle="tab">كشوفات اليوم</a></li>
                    <li><a href="#tab2default" data-toggle="tab">جميع الكشوفات</a></li>
                    <li><a href="#tab4default" data-toggle="tab">الكشوفات المنتهية اليوم</a></li>
                    <li><a href="#tab3default" data-toggle="tab">الحساب النهائي للمريض</a></li>
                      <li><a href="#tab5default" data-toggle="tab">البحث</a></li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
     <div class="tab-pane fade" id="tab5default">
<div class="well bs-component" >
 <fieldset>
  <!--        
      <div class="well bs-component" >
    <?php echo form_open_multipart('dashboard/search',array('class'=>"form-horizontal",'role'=>"form", 'id' => 'myform' ))?>
    <fieldset>
<div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="inputUser" class="control-label">الإسم  </label>
                <input type="text" id="name"  name="name"    class="form-control text-right" placeholder="الإسم" />
            </div>
        </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="inputUser" class="control-label">البحث</label>
            <input type="hidden"  class="btn btn-success" name="action" value="search" />
  <input type="submit"  onclick="
                       Name = ($('#name').val());
                        if (Name == '' ){
                        alert('لا بد من كتابه الإسم حتي تتمكن من البحث');
                        return false;}
                        else{
      return results($('#name').val()
      )};" name="add" value="عرض" class="btn btn-primary"  >
            </div>
            </div>
</div>
    </fieldset>
    <?php echo form_close()?>
    <div id="results"></div>
</div>
-->
    <div class="something">
         <label for="inputUser" class="control-label">البحث بالإسم   </label>
     <input name="search_data" id="search_data" type="text"  placeholder="من فضلك أدخل الإسم الذي تريد البحث عنه" 
                class="form-control text-right"  onkeyup="ajaxSearch();">
     <div id="suggestions">
         <div id="autoSuggestionsList"></div>
     </div>
</div>
<script type="text/javascript">
function ajaxSearch()
{
    var input_data = $('#search_data').val();
    if (input_data.length === 0)
    {
        $('#suggestions').hide();
    }
    else
    {
        var post_data = {
            'search_data': input_data,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>/dashboard/autocomplete/",
            data: post_data,
            success: function (data) {
                // return success
                if (data.length > 0) {
                    $('#suggestions').show();
                    $('#autoSuggestionsList').addClass('auto_list');
                    $('#autoSuggestionsList').html(data);
                }
            }
         });
     }
 }
</script>
</fieldset>
</div>
     </div>



<!------ نهاية الكشف الخاص بمريض --------------------->




 <div class="tab-pane fade in active col-xs-12" id="tab0default">
    <?php if(isset($result)):?>
        <?php echo form_open_multipart('dashboard/update_patient/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>
            <section class="col-md-8 col-xs-12">
	<div class="well bs-component"  data-sr="wait 0s, then enter left and hustle 100%">
       

             
          
       <fieldset>
            <legend></legend>

   
  
     <div class="row"  data-sr="wait 0.6s, then enter bottom and hustle 100%" >  
      
            
   <div class="col-md-3">
    <div class="form-group">
       <i class="fa fa-barcode"></i>
        <label class="control-label">رقم الملف</label>
  <input type="text" id="code" value="<?php echo $result['code'] ?>" name="code" onkeypress="return isNumberKey(event)"  placeholder="رقم الملف" class="form-control text-right" readonly >
   
   
    </div>
</div>
  
 
 
    <div class="col-md-3">
    <div class="form-group">
       <i class="fa fa-barcode"></i>
        <label class="control-label">تاريخ الملف</label>
          <input type="date" id="file_date" value="<?php echo $result['file_date']; ?>" name="file_date" class="form-control text-left" readonly >
    
   
    </div>
</div> 
  
  
  
    <div class="col-md-3">
    <div class="form-group">
       <i class="fa fa-barcode"></i>
        <label class="control-label">النوع</label>
<input type="checkbox" name="gender" id="gender" data-style="android" data-size="small" data-toggle="toggle" data-onstyle="info" data-offstyle="primary" data-on="آنثي &lt;i class='fa fa-female'&gt;&lt;/i&gt;" data-off="ذكر &lt;i class='fa fa-male'&gt;&lt;/i&gt;" data-width="90">
      
    </div>
</div> 
    
  
  
  
    <div class="col-md-3">
    <div class="form-group">
       <i class="fa fa-barcode"></i>
        <label class="control-label">الصورة</label>

   <input type="file" id="img" onchange="readURL(this);" name="img" class="form-control text-right"  >
        
    </div>
</div> 
    
    
  
  
  
  
  </div>
 <div class="row"  data-sr="wait 0.6s, then enter bottom and hustle 100%" >  
  
    <div class="col-md-3">
    <div class="form-group">
       <i class="fa fa-user"></i>
        <label class="control-label">الإسم بالعربي</label>
  
        <input type="text" id="a_name" onblur="return replac($('#a_name').val());" value="<?php echo $result['a_name'] ?>" name="a_name" class="form-control text-right" placeholder="الإسم بالعربي" required>
  
      
    </div>
</div>  

    <div class="col-md-3">
    <div class="form-group">
    <i class="fa fa-user"></i>
        <label class="control-label">الإسم بالإنجليزي</label>
     
        <input type="text" id="e_name" onblur="return lower($('#e_name').val());" name="e_name" value="<?php echo $result['e_name'] ?>" class="form-control text-right" placeholder="الإسم بالإنجليزي" >
   
       
      
    </div>
</div>  


   
   
          <?php
$var_year = 1438 -  $result['birth_year'];
?> 

    <div class="col-md-3">
    <div class="form-group">
   <i class="fa fa-birthday-cake"></i>
        <label class="control-label">العمر</label>
     
   <input type="text" id="someInput" value="<?php echo $var_year ?>"  name="birth_years" class="form-control text-right" placeholder="  " />
               
       
      
    </div>
</div> 

    <div class="col-md-3">
    <div class="form-group">
     <i class="fa fa-calendar"></i>
        <label class="control-label">سنة الميلاد </label>
  
                      <input type="text" id="age3" value="<?php echo $result['birth_year'] ; ?>"  name="birth_year" class="form-control text-right" placeholder="  " readonly>
            

      
    </div>
</div> 






 
  <script>
    $('#someInput').bind('change', function() {
        //var today = new Date().getFullYear();
        var today = 1438;
        var date = $('#someInput').val();
       var age =  today- date;
        $('#age3').val(age);
    });
</script> 


     
        
        
 </div>


 <div class="row"  data-sr="wait 0.6s, then enter bottom and hustle 100%" >  
 
     <div class="col-md-3">
    <div class="form-group">
     <i class="fa fa-edit"></i>
        <label class="control-label">  الحالة الإجتماعية</label>

                    <input type="text" id="social"  name="social" value="<?php echo $result['social'] ?>" class="form-control text-right" placeholder="الحالة الإجتماعية" >
              
    </div>
</div> 

 
 
 

     <div class="col-md-3">
    <div class="form-group">
     <i class="fa fa-edit"></i>
        <label class="control-label">  الجنسية</label>

     <i class="fa fa-globe"></i>
                    <input type="text" id="nationality" value="<?php echo $result['nationality'] ?>" name="nationality" class="form-control text-right" placeholder="الجنسية" >
              
   
    </div>
</div> 

 
 
 
 
 
     <div class="col-md-3">
    <div class="form-group">
    <i class="fa fa-address-card-o"></i>
        <label class="control-label">  نوع البطاقة</label>


                    <input type="text" id="card_type" value="<?php echo $result['card_type'] ?>" name="card_type" class="form-control text-right" placeholder=" نوع البطاقة" >
               
               
               
   
    </div>
</div> 

 
     <div class="col-md-3">
    <div class="form-group">
      <i class="fa fa-address-card-o"></i>
        <label class="control-label"> رقم البطاقة</label>



                    <input type="text" id="id_card" autocomplete="off" onblur="return search();" value="<?php echo $result['id_card'] ?>" name="id_card" onkeypress="return isNumberKey(event)" class="form-control text-right" placeholder=" رقم البطاقة" required>
                
                
               
   
    </div>
</div> 
 
</div>
 <div class="row"  data-sr="wait 0.6s, then enter bottom and hustle 100%" >  
 
      <div class="col-md-3">
    <div class="form-group">
      <i class="fa fa-address-card-o"></i>
        <label class="control-label"> الجوال</label>


          <i class="fa fa-mobile"></i>
                    <input type="text" id="mobile" value="<?php echo $result['mobile'] ?>" name="mobile" onkeypress="return isNumberKey(event)" class="form-control text-right" placeholder="الجوال" required>
               
               
   
    </div>
</div> 
 
 
 
 
 
       <div class="col-md-3">
    <div class="form-group">
         <i class="fa fa-phone"></i>
        <label class="control-label"> هاتف المنزل</label>



                    <input type="text" id="phone" value="<?php echo $result['phone'] ?>" name="phone" onkeypress="return isNumberKey(event)" class="form-control text-right" placeholder="هاتف المنزل" >
               
               
               
   
    </div>
</div> 
 
 
 
        <div class="col-md-3">
    <div class="form-group">
        <i class="fa fa-home"></i>
        <label class="control-label"> العنوان</label>

  
                    <input type="text" id="address" value="<?php echo $result['address'] ?>" name="address" class="form-control text-right" placeholder=" العنوان" >
                

               
   
    </div>
</div> 
 
 
         <div class="col-md-3">
    <div class="form-group">
          <i class="fa fa-heartbeat"></i>
        <label class="control-label"> الحالة الصحية</label>



                    <input type="text" id="health" value="<?php echo $result['health'] ?>" name="health" class="form-control text-right" placeholder=" الحالة الصحية" >
                
                

               
   
    </div>
</div> 
 
 
 
 </div>

 <div class="row"  data-sr="wait 0.6s, then enter bottom and hustle 100%" >  
          <div class="col-md-3">
    <div class="form-group">
  <i class="fa fa-wrench"></i>
        <label class="control-label"> الوظيفة</label>

                    <input type="text" id="work" value="<?php echo $result['work'] ?>" name="work" class="form-control text-right" placeholder=" الوظيفة" >
               


               
   
    </div>
</div> 
 
 
 
 
           <div class="col-md-3">
    <div class="form-group">
     <i class="fa fa-phone"></i>
        <label class="control-label"> هاتف العمل</label>

       

                    <input type="text" id="work_phone" value="<?php echo $result['work_phone'] ?>" name="work_phone" onkeypress="return isNumberKey(event)" class="form-control text-right" placeholder=" هاتف العمل" >
               

               
   
    </div>
</div> 
 
 
 
</div>


  
  
<!------------------------------------------------------------------------------------>  
  
  
  <!--
  
    <div class="form-group"         ="wait 0.6s, then enter bottom and hustle 100%">
    
    <label for="inputUser" class="col-lg-2 control-label">رقم الملف:</label>
    <div class="col-lg-3 input-grup">
    <i class="fa fa-barcode"></i>
        <input type="text" id="code" value="<?php echo $result['code'] ?>" name="code" onkeypress="return isNumberKey(event)"  placeholder="رقم الملف" class="form-control text-right" readonly >
   
   
    </div>
  
  
    <label for="inputUser" class="col-lg-2 control-label">تاريخ الملف:</label>
    <div class="col-lg-3 input-grup">
    <i class="fa fa-calendar"></i>
        <input type="date" id="file_date" value="<?php echo $result['file_date']; ?>" name="file_date" class="form-control text-left" readonly >
    
    
    </div>
</div>







<div class="form-group"="wait 0.6s, then enter bottom and hustle 100%">
<input type="hidden" id="gen" value="<?php echo $result['gender'] ?>"/>
    <label for="inputPassword" class="col-lg-2 control-label">النوع: </label>
  <div class="col-lg-4">
    <div class="checkbox">
      <input type="checkbox" name="gender" id="gender" data-style="android" data-size="small" data-toggle="toggle" data-onstyle="info" data-offstyle="primary" data-on="آنثي &lt;i class='fa fa-female'&gt;&lt;/i&gt;" data-off="ذكر &lt;i class='fa fa-male'&gt;&lt;/i&gt;" data-width="90">
      
      
      	قم بالأختيار
    </div>
  
  
  </div>
  <label for="inputUser" class="col-lg-2 control-label">الصورة:</label>
    <div class="col-lg-4 input-grup">
        <input type="file" id="img" onchange="readURL(this);" name="img" class="form-control text-right"  >
    
    
    </div>
</div>
<div class="form-group"="wait 0.6s, then enter bottom and hustle 100%">
    <label for="inputUser" class="col-lg-2 control-label">الإسم بالعربي:</label>
    <div class="col-lg-4 input-grup">
    <i class="fa fa-user"></i>
        <input type="text" id="a_name" onblur="return replac($('#a_name').val());" value="<?php echo $result['a_name'] ?>" name="a_name" class="form-control text-right" placeholder="الإسم بالعربي" required>
  
    </div>
    <label for="inputUser" class="col-lg-2 control-label">الإسم بالإنجليزي:</label>
    <div class="col-lg-4 input-grup">
    <i class="fa fa-user"></i>
        <input type="text" id="e_name" onblur="return lower($('#e_name').val());" name="e_name" value="<?php echo $result['e_name'] ?>" class="form-control text-right" placeholder="الإسم بالإنجليزي" >
   
   
    </div>
</div>
-->




<!--  <div class="form-group"="wait 0.6s, then enter bottom and hustle 100%">
<label for="inputUser" class="col-lg-2 control-label">تاريخ الميلاد:</label>
    <div class="col-lg-4 input-grup">
    <i class="fa fa-birthday-cake"></i>
        <input type="date" id="birth_date" onblur="return _calculateAge();" value="<?php echo $result['birth_date'] ?>" name="birth_date" class="form-control text-left" required>
    </div>
 
             
             
             <?php
       /*       
  $birthDate = $result['birth_date'];
  //explode the date to get month, day and year
  $birthDate = explode("-", $birthDate);
  //get age from date or birthdate
  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
    ? ((date("Y") - $birthDate[0]) - 1)
    : (date("Y") - $birthDate[0]));
    $bday = new DateTime($result['birth_date']);
// $today = new DateTime('00:00:00'); - use this for the current date
$today = new DateTime(''.date("Y-m-d").' 00:00:00'); // for testing purposes
$diff = $today->diff($bday);
*/
              ?>
              <label for="inputUser" class="col-lg-2 control-label">العمر:</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-calendar"></i>
                    <input type="text" id="age" value="<?php printf('%d سنة, %d شهر, %d يوم', $diff->y, $diff->m, $diff->d); ?>" name="age" class="form-control text-right" readonly>
                </div>
            </div>
            -->
            <!----------------------------------------------------------------->
   
   <!--
   
    <div class="form-group"="wait 0.6s, then enter bottom and hustle 100%">
          <?php
$var_year = 1438 -  $result['birth_year'];
?>  
            <label for="inputUser" class="col-lg-2 control-label">العمر </label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-birthday-cake"></i>
                      <input type="text" id="someInput" value="<?php echo $var_year ?>"  name="birth_years" class="form-control text-right" placeholder="  " >
               
               
                </div>
              <label for="inputUser" class="col-lg-2 control-label">سنة الميلاد :</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-calendar"></i>
                      <input type="text" id="age3" value="<?php echo $result['birth_year'] ; ?>"  name="birth_year" class="form-control text-right" placeholder="  " readonly>
                </div>
            </div>        
  <script>
    $('#someInput').bind('change', function() {
        //var today = new Date().getFullYear();
        var today = 1438;
        var date = $('#someInput').val();
       var age =  today- date;
        $('#age3').val(age);
    });
</script>              
           
            <div class="form-group"="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">الحالة الإجتماعية:</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-edit"></i>
                    <input type="text" id="social"  name="social" value="<?php echo $result['social'] ?>" class="form-control text-right" placeholder="الحالة الإجتماعية" >
              
              
                </div>
                <label for="inputUser" class="col-lg-2 control-label">الجنسية:</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-globe"></i>
                    <input type="text" id="nationality" value="<?php echo $result['nationality'] ?>" name="nationality" class="form-control text-right" placeholder="الجنسية" >
              
              
                </div>
            
            </div>
            <div class="form-group"="wait 0.6s, then enter bottom and hustle 100%">
            <label for="inputUser" class="col-lg-2 control-label">نوع البطاقة:</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-address-card-o"></i>
                    <input type="text" id="card_type" value="<?php echo $result['card_type'] ?>" name="card_type" class="form-control text-right" placeholder=" نوع البطاقة" >
               
               
               
                </div>
            <label for="inputUser" class="col-lg-2 control-label">رقم البطاقة:</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-address-card-o"></i>
                    <input type="text" id="id_card" autocomplete="off" onblur="return search();" value="<?php echo $result['id_card'] ?>" name="id_card" onkeypress="return isNumberKey(event)" class="form-control text-right" placeholder=" رقم البطاقة" required>
                
                
                </div>
            </div>
            <div class="form-group"="wait 0.6s, then enter bottom and hustle 100%">
            <label for="inputUser" class="col-lg-2 control-label">الجوال:</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-mobile"></i>
                    <input type="text" id="mobile" value="<?php echo $result['mobile'] ?>" name="mobile" onkeypress="return isNumberKey(event)" class="form-control text-right" placeholder="الجوال" required>
               
               
                </div>
                <label for="inputUser" class="col-lg-2 control-label">هاتف المنزل:</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-phone"></i>
                    <input type="text" id="phone" value="<?php echo $result['phone'] ?>" name="phone" onkeypress="return isNumberKey(event)" class="form-control text-right" placeholder="هاتف المنزل" >
               
               
                </div>
            </div>
            <div class="form-group"="wait 0.6s, then enter bottom and hustle 100%">
            <label for="inputUser" class="col-lg-2 control-label">العنوان:</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-home"></i>
                    <input type="text" id="address" value="<?php echo $result['address'] ?>" name="address" class="form-control text-right" placeholder=" العنوان" >
                
                
                
                </div>
                <label for="inputUser" class="col-lg-2 control-label">الحالة الصحية:</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-heartbeat"></i>
                    <input type="text" id="health" value="<?php echo $result['health'] ?>" name="health" class="form-control text-right" placeholder=" الحالة الصحية" >
                
                
                
                </div>
            </div>
            <div class="form-group"="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">الوظيفة:</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-wrench"></i>
                    <input type="text" id="work" value="<?php echo $result['work'] ?>" name="work" class="form-control text-right" placeholder=" الوظيفة" >
               
                </div>
                <label for="inputUser" class="col-lg-2 control-label">هاتف العمل:</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-phone"></i>
                    <input type="text" id="work_phone" value="<?php echo $result['work_phone'] ?>" name="work_phone" onkeypress="return isNumberKey(event)" class="form-control text-right" placeholder=" هاتف العمل" >
               
               
                </div>
            </div>
            -->
        </fieldset>
        </div>
</section>



<section class="col-md-2 col-xs-12">
<div class="well bs-component"="wait 0.6s, then enter left and hustle 100%" style="padding: 0px 10px;">
 <fieldset>
              <div id="post_img" class="imgContent" style="min-height: 100px;">
              <img id="blah" src="<?php echo base_url('uploads/thumbs/'.$result['img'])?>" alt="الصورة الشخصية" style="" class="img-rounded" style="width: 5px;">
              </div>
            </fieldset>
	</div> 
</section>












<section class="col-md-4 col-xs-12">
<div class="well bs-component"="wait 0.6s, then enter left and hustle 100%">

 <fieldset>
   <div class="row">
  
    <div class="col-md-6">
        
              <label for="inputPassword" class="col-lg-7 control-label" >تحديد التاريخ </label>
              <div class="checkbox col-lg-5">
		          <input type="checkbox" id="check" onchange="return dis();" data-style="android" data-size="mini" data-toggle="toggle" data-onstyle="danger" data-offstyle="success" data-on="تعطيل" data-off="تفعيل" data-width="70">
                </div>
		    
           
             <div class="col-lg-12 input-grup" >	
		          	<input type="date" class="form-control text-right" value="<?php echo date("Y-m-d"); ?>" name="operation_date" id="operation_date" readonly />
		      </div>  
    
    </div>
   
 
 
 
     <div class="col-md-6">
        
            <div class="form-group">
     <i class="fa fa-user-md"></i>
          <label class="control-label">    الطبيب   </label>   
            <select class="form-control" id="doc_id" name="doc_id">
      <option value="">--قم بإختيار الطبيب--</option> 
 <?php
                  if(isset($doctors)){
                    foreach($doctors as $doctor)
                        echo '<option value="'.$doctor->id.'">'.$doctor->name.'</option>';
                  }
                  ?>
</select> 
               
    </div>
    
    </div>
     
   
   
   
   
    </div>
 
 
 
  <div class="row">
  

  
    <div class="col-md-6">
      <div class="form-group">
     <i class="fa fa-money"></i>
          <label class="control-label">    مدفوع مقدما    </label>   

<input type="number" class="form-control text-center" value="" step="any" name="first_paid" required="required" />		        


               
    </div>
   
  
  </div>
      <div class="col-md-6">
      <div class="form-group">
     <i class="fa fa-folder-open-o"></i>
          <label class="control-label">    القسم   </label>   

   <select class="form-control" id="dep_id" name="dep_id" onchange="return pricee();" data-style="btn-bnfsg" data-title="إختر قسم" required >
                  <option value="">--قم بإختيار القسم--</option>
                  <?php
                  if(isset($departs)){
                    foreach($departs as $depart)
                        echo '<option value="'.$depart->id.'">'.$depart->dep_name.'</option>';
                  }
                  ?>
                  </select>



               
    </div>
   
  
  </div>
  
  </div>
         
  <div class="row">

  
  
  
      <div class="col-md-6">
      
          
              <label for="inputPassword" class="col-lg-7 control-label" >تحديد السعر </label>
          
		          <input type="checkbox" id="check2" onchange="return dis2();" data-style="android" data-size="mini" data-toggle="toggle" data-onstyle="danger" data-offstyle="success" data-on="تعطيل" data-off="تفعيل" data-width="70">
             
		
            <div class="form-group"="wait 0.3s, then enter bottom and hustle 100%">
              <div class=" col-lg-12 input-grup" id="optionearea2">
                    <i class="fa fa-money"></i>
		          <input type="text" id="price"  name="price"  class="form-control text-right" placeholder=" السعر" readonly required />
                </div>
		    </div>
          
          
          
          
            <div class="form-group"="wait 0.3s, then enter bottom and hustle 100%">
                <div class="col-lg-12 input-grup" ><br />
                    <input type="submit"  name="update" onclick="if(! $('#price').val()){alert('لم يتم تحديد سعر للكشف');return false;}" value="حفظ" class="btn btn-primary" >
                </div>
            </div>
      
      
      </div>
  
  
  
  </div>
  
  
 
 
 
 

          
          
      <!--    
  <div class="form-group">
  <label  class="col-lg-12 control-label" style="margin-top: 10px;"> الطبيب </label>                     
     <select class="form-control" id="doc_id" name="doc_id">
      <option value="">قم بإختيار الطبيب</option> 
 <?php
                  if(isset($doctors)){
                    foreach($doctors as $doctor)
                        echo '<option value="'.$doctor->id.'">'.$doctor->name.'</option>';
                  }
                  ?>
</select>
</div>
  <div class="form-group">
  <label  class="col-lg-12 control-label" style="margin-top: 10px;"> دفعة علي الحساب  </label>                     
<input type="number" class="form-control text-center" value="" step="any" name="first_paid" required="required" />		        
</div>    
            <div class="form-group"="wait 0.3s, then enter bottom and hustle 100%">
              <label for="inputPassword" class="col-lg-12 control-label" style="margin-top: 10px;">تحديد القسم </label>
              <div class="checkbox col-lg-12">
		          <select class="form-control" id="dep_id" onchange="return pricee();" name="dep_id" data-style="btn-bnfsg" required >
                  <option value="">قم بإختيار القسم</option>
                  <?php
                  if(isset($departs)){
                    foreach($departs as $depart)
                        echo '<option value="'.$depart->id.'">'.$depart->dep_name.'</option>';
                  }
                  ?>
                  </select>
                </div>
		    </div>
            <div class="form-group"="wait 0.3s, then enter bottom and hustle 100%">
              <label for="inputPassword" class="col-lg-7 control-label" >تحديد السعر </label>
              <div class="checkbox col-lg-5">
		          <input type="checkbox" id="check2" onchange="return dis2();" data-style="android" data-size="mini" data-toggle="toggle" data-onstyle="danger" data-offstyle="success" data-on="تعطيل" data-off="تفعيل" data-width="70">
                </div>
		    </div>
            <div class="form-group"="wait 0.3s, then enter bottom and hustle 100%">
              <div class=" col-lg-12 input-grup" id="optionearea2">
                    <i class="fa fa-money"></i>
		          <input type="text" id="price"  name="price"  class="form-control text-right" placeholder=" السعر" readonly required />
                </div>
		    </div>
            <div class="form-group"="wait 0.3s, then enter bottom and hustle 100%">
                <div class="col-lg-12 input-grup" ><br />
                    <input type="submit"  name="update" onclick="if(! $('#price').val()){alert('لم يتم تحديد سعر للكشف');return false;}" value="حفظ" class="btn btn-primary" >
                </div>
            </div>
            
            
            -->
            
            
            
            
            </fieldset>
     </div>
</section>





        <?php echo form_close()?>
    <?php else: ?>
        <?php echo form_open_multipart('dashboard/patient',array('class'=>"",'role'=>"form" ))?>
            <section class="col-md-8 col-xs-12">
	<div class="well bs-component"  data-sr="wait 0s, then enter left and hustle 100%">
       

             
          
       <fieldset>
            <legend></legend>
   
   <!--
   
   <div class="col-md-9">
   
      <div class="col-md-4">
    <div class="form-group">
     
        <label class="control-label">رقم الملف</label>
                     <input type="text" id="code"  name="code"
                     placeholder="رقم الملف" class="form-control text-right" required > 
    </div>
</div>



   <div class="col-md-4">
    <div class="form-group">
        <i class="fa fa-calendar"></i>
        <label class="control-label"> تاريخ الملف</label>
    
        <input type="date" id="file_date" value="<?php echo date("Y-m-d"); ?>" name="file_date" class="form-control text-left" readonly >
   
    </div>
</div>


   <div class="col-md-4">
    <div class="form-group">
      
        <label class="control-label"> النوع</label>
      
        <div class="checkbox">
		          <input type="checkbox" name="gender" id="gender" data-style="android" data-size="small" data-toggle="toggle" data-onstyle="info" data-offstyle="primary" data-on="آنثي &lt;i class='fa fa-female'&gt;&lt;/i&gt;" data-off="ذكر &lt;i class='fa fa-male'&gt;&lt;/i&gt;" data-width="90">
		          
		        </div>
     
    </div>
</div>
   
  
 <div class="col-md-4">
    <div class="form-group">
        <label class="control-label"> الصورة</label>
  <input type="file" id="img" onchange="readURL(this);" name="img" class="form-control text-right" accept="image/*" >
             
     
    </div>
</div>     
  
  
   <div class="col-md-4">
    <div class="form-group">
       <i class="fa fa-user"></i>
        <label class="control-label"> الإسم بالعربي</label>
          <input type="text" id="a_name" onblur="return replac($('#a_name').val());" name="a_name" class="form-control text-right" placeholder="الإسم بالعربي" required>
                
     
    </div>
</div>              
  
  
  
   <div class="col-md-4">
    <div class="form-group">
       <i class="fa fa-user"></i>
        <label class="control-label"> الإسم بالإنجليزي</label>

                    <input type="text" id="e_name" onblur="return lower($('#e_name').val());" name="e_name" class="form-control text-right" placeholder="الإسم بالإنجليزي" >

    </div>
</div>  

  
   
   
   
   
   </div>
   
     <div class="col-xs-3">
   <div class="well bs-component"="wait 0.6s, then enter left and hustle 100%" style="padding: 0px 0px;">
 <fieldset>
              <div id="post_img" class="imgContent" style="min-height: 153px;">
              <img id="blah" src="<?php echo base_url('uploads/thumbs/user.png')?>" alt="الصورة الشخصية" style="" class="img-rounded" style="width: 5px;">
              </div>
            </fieldset>
	</div> 
   
   </div> 
   
   -->
   
   
   
   
     <div class="row"  data-sr="wait 0.6s, then enter bottom and hustle 100%" >  
      
      
      
               
   <div class="col-md-3">
    <div class="form-group">
       <i class="fa fa-barcode"></i>
        <label class="control-label">رقم الملف</label>
                     <input type="text" id="code"  name="code"
                     placeholder="رقم الملف" class="form-control text-right" required > 
    </div>
</div>



   <div class="col-md-3">
    <div class="form-group">
        <i class="fa fa-calendar"></i>
        <label class="control-label"> تاريخ الملف</label>
    
        <input type="date" id="file_date" value="<?php echo date("Y-m-d"); ?>" name="file_date" class="form-control text-left" readonly >
   
    </div>
</div>


   <div class="col-md-3">
    <div class="form-group">
      
        <label class="control-label"> النوع</label>
      
        <div class="checkbox">
		          <input type="checkbox" name="gender" id="gender" data-style="android" data-size="small" data-toggle="toggle" data-onstyle="info" data-offstyle="primary" data-on="آنثي &lt;i class='fa fa-female'&gt;&lt;/i&gt;" data-off="ذكر &lt;i class='fa fa-male'&gt;&lt;/i&gt;" data-width="90">
		          
		        </div>
     
    </div>
</div>
   
  
 <div class="col-md-3">
    <div class="form-group">
        <label class="control-label"> الصورة</label>
  <input type="file" id="img" onchange="readURL(this);" name="img" class="form-control text-right" accept="image/*" >
             
     
    </div>
</div>     
   
 
 <!--  
      <div class="col-md-3">
    <div class="form-group">
      <div id="post_img" class="imgContent" style="min-height: 153px;">
              <img id="blah" src="<?php echo base_url('uploads/thumbs/user.png')?>" alt="الصورة الشخصية" style="" class="img-rounded" style="width: 5px;">
              </div>   
     
    </div>
</div>     
     
 -->

   
    
    
               
 </div>
 
 
 
 
 
 
 
 
 
         
       <div class="row"  data-sr="wait 0.6s, then enter bottom and hustle 100%">           

 <div class="col-md-3">
    <div class="form-group">
       <i class="fa fa-user"></i>
        <label class="control-label"> الإسم بالعربي</label>
          <input type="text" id="a_name" onblur="return replac($('#a_name').val());" name="a_name" class="form-control text-right" placeholder="الإسم بالعربي" required>
                
     
    </div>
</div>              
  
  
  
   <div class="col-md-3">
    <div class="form-group">
       <i class="fa fa-user"></i>
        <label class="control-label"> الإسم بالإنجليزي</label>

                    <input type="text" id="e_name" onblur="return lower($('#e_name').val());" name="e_name" class="form-control text-right" placeholder="الإسم بالإنجليزي" >

    </div>
</div>  




   <div class="col-md-3">
    <div class="form-group">
      <i class="fa fa-birthday-cake"></i>
        <label class="control-label"> العمر</label>
     
                      <input type="text" id="someInput"  name="birth_years" class="form-control text-right" placeholder="  " >
              
    </div>
</div>  




   <div class="col-md-3">
    <div class="form-group">
        <i class="fa fa-calendar"></i>
        <label class="control-label"> سنةالميلاد </label>
   
                      <input type="text" id="age2"  name="birth_year" class="form-control text-right" placeholder="  " readonly>
                
                
  
    </div>
</div>         
       
       
       
       
  </div>  
  
  
  
<div class="row"  data-sr="wait 0.6s, then enter bottom and hustle 100%">
   <div class="col-md-3">
    <div class="form-group">
    <i class="fa fa-edit"></i>
        <label class="control-label"> الحالة الإجتماعية </label>
      
        <input type="text" id="social"  name="social" class="form-control text-right" placeholder="الحالة الإجتماعية" >
                    
    </div>
</div>         
  
  
       
   <div class="col-md-3">
    <div class="form-group">
     <i class="fa fa-globe"></i>
        <label class="control-label"> الجنسية </label>
         
                    <input type="text" id="nationality"  name="nationality" class="form-control text-right" placeholder="الجنسية" >
                        
    </div>
</div>         
       
   <div class="col-md-3">
    <div class="form-group">
         <i class="fa fa-address-card-o"></i>
        <label class="control-label">      نوع البطاقة   </label>
         

                    <input type="text" id="card_type" name="card_type" class="form-control text-right" placeholder=" نوع البطاقة" >
                
                    
    </div>
</div>         
       

   <div class="col-md-3">
    <div class="form-group">
        <i class="fa fa-address-card-o"></i>
        <label class="control-label">  رقم البطاقة   </label>
              
                    <input type="text" id="id_card" onblur="return search();" autocomplete="off" name="id_card" onkeypress="return isNumberKey(event)" class="form-control text-right" placeholder=" رقم البطاقة" required>
<span style="font-size: 15px !important;" class="label label-warning label-as-badge"><?php echo $random = substr(number_format(time() * rand(),0,'',''),0,10); ?> </span>
              
      

                    
    </div>
</div>         
       






</div>  
  
  
  <div class="row"  data-sr="wait 0.6s, then enter bottom and hustle 100%" >
     <div class="col-md-3">
    <div class="form-group">
       <i class="fa fa-mobile"></i>
        <label class="control-label">  الجوال   </label>
     
  
                    <input type="text" id="mobile"  name="mobile" onkeypress="return isNumberKey(event)" class="form-control text-right" placeholder="الجوال" required>
               
                    
    </div>
</div>         
       
     <div class="col-md-3">
    <div class="form-group">
       <i class="fa fa-phone"></i>
        <label class="control-label">  هاتف المنزل   </label>
     
         
                    <input type="text" id="phone"  name="phone" onkeypress="return isNumberKey(event)" class="form-control text-right" placeholder="هاتف المنزل" >
              
              
                    
    </div>
</div>         
       
  
 
 
 
      <div class="col-md-3">
    <div class="form-group">
        <i class="fa fa-home"></i>
        <label class="control-label">  العنوان   </label>
     
           
                    <input type="text" id="address"  name="address" class="form-control text-right" placeholder=" العنوان" >
                  
                    
    </div>
</div>         
  
  
  
        <div class="col-md-3">
    <div class="form-group">
     <i class="fa fa-heartbeat"></i>
        <label class="control-label">    الحالة الصحية   </label>
        
                    <input type="text" id="health"  name="health" class="form-control text-right" placeholder=" الحالة الصحية" >
               
               
    </div>
</div>         
        
        
  
  </div>
  
  <div class="row"  data-sr="wait 0.6s, then enter bottom and hustle 100%">
          <div class="col-md-3">
    <div class="form-group">
       <i class="fa fa-wrench"></i>
        <label class="control-label">    الوظيفة   </label>
      
                    <input type="text" id="work"  name="work" class="form-control text-right" placeholder=" الوظيفة" >
              
    </div>
</div>         
 
 
 
           <div class="col-md-3">
    <div class="form-group">
       <i class="fa fa-phone"></i>
        <label class="control-label">    هاتف العمل   </label>

                    <input type="text" id="work_phone"  name="work_phone" onkeypress="return isNumberKey(event)" class="form-control text-right" placeholder=" هاتف العمل" >
               
               
    </div>
</div>           
  

  
  </div>
  
  
  
  
  
     

       
         
           <!--     
                <div class="form-group"="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-md-2 control-label">رقم الملف:</label>
                <div class="col-md-2 input-grup">
                <i class="fa fa-barcode"></i>
             
                     <input type="text" id="code"  name="code"
                     placeholder="رقم الملف" class="form-control text-right" required > 
                </div>
                <label for="inputUser" class="col-md-2 control-label">تاريخ الملف:</label>
                <div class="col-md-2 input-grup">
                <i class="fa fa-calendar"></i>
                    <input type="date" id="file_date" value="<?php echo date("Y-m-d"); ?>" name="file_date" class="form-control text-left" readonly >
               
               
                </div>
            </div>
            
            -->
            
            
           <!-- <div class="form-group"="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputPassword" class="col-lg-2 control-label">النوع: </label>
		      <div class="col-lg-4">
		        <div class="checkbox">
		          <input type="checkbox" name="gender" id="gender" data-style="android" data-size="small" data-toggle="toggle" data-onstyle="info" data-offstyle="primary" data-on="آنثي &lt;i class='fa fa-female'&gt;&lt;/i&gt;" data-off="ذكر &lt;i class='fa fa-male'&gt;&lt;/i&gt;" data-width="90">
		          	قم بالأختيار
		        </div>
		      </div>
              <label for="inputUser" class="col-lg-2 control-label">الصورة:</label>
                <div class="col-lg-4 input-grup">
                    <input type="file" id="img" onchange="readURL(this);" name="img" class="form-control text-right" accept="image/*" >
                </div>
            </div>
            
            
            
            <div class="form-group"="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">الإسم بالعربي:</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-user"></i>
                    <input type="text" id="a_name" onblur="return replac($('#a_name').val());" name="a_name" class="form-control text-right" placeholder="الإسم بالعربي" required>
               
                </div>
                <label for="inputUser" class="col-lg-2 control-label">الإسم بالإنجليزي:</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-user"></i>
                    <input type="text" id="e_name" onblur="return lower($('#e_name').val());" name="e_name" class="form-control text-right" placeholder="الإسم بالإنجليزي" >
               
               
                </div>
            </div>-->
           <!-- <div class="form-group"="wait 0.6s, then enter bottom and hustle 100%">
            <label for="inputUser" class="col-lg-2 control-label">تاريخ الميلاد:</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-birthday-cake"></i>
                    <input type="date" id="birth_date" onblur="return _calculateAge();"  name="birth_date" class="form-control text-left" required>
                </div>
              <label for="inputUser" class="col-lg-2 control-label">العمر:</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-calendar"></i>
                    <input type="text" id="age"  name="age" class="form-control text-right" readonly>
                </div>
            </div>
            -->
      <!--------------------------------------------------------------------->      
               <!--  <div class="form-group"="wait 0.6s, then enter bottom and hustle 100%">
            <label for="inputUser" class="col-lg-2 control-label">العمر </label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-birthday-cake"></i>
                      <input type="text" id="someInput"  name="birth_years" class="form-control text-right" placeholder="  " >
              
                </div>
              <label for="inputUser" class="col-lg-2 control-label">سنةالميلاد </label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-calendar"></i>
                      <input type="text" id="age2"  name="birth_year" class="form-control text-right" placeholder="  " readonly>
                
                
                </div>
            </div>-->
<script>
    $('#someInput').bind('change', function() {
        //var today = new Date().getFullYear();
        var today = 1438;
        var date = $('#someInput').val();
       var age =  today- date;
        $('#age2').val(age);
    });
</script>       
            <!----------------------------------------------------------------->
          
          
       <!--   
            <div class="form-group">
                <label for="inputUser" class="col-lg-2 control-label">الحالة الإجتماعية:</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-edit"></i>
                    <input type="text" id="social"  name="social" class="form-control text-right" placeholder="الحالة الإجتماعية" >
              
              
                </div>
                <label for="inputUser" class="col-lg-2 control-label">الجنسية:</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-globe"></i>
                    <input type="text" id="nationality"  name="nationality" class="form-control text-right" placeholder="الجنسية" >
               
               
                </div>
            </div>
            <div class="form-group"="wait 0.6s, then enter bottom and hustle 100%">
            <label for="inputUser" class="col-lg-2 control-label">نوع البطاقة:</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-address-card-o"></i>
                    <input type="text" id="card_type" name="card_type" class="form-control text-right" placeholder=" نوع البطاقة" >
                
                
                </div>
            <label for="inputUser" class="col-lg-2 control-label">رقم البطاقة:</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-address-card-o"></i>
                    <input type="text" id="id_card" onblur="return search();" autocomplete="off" name="id_card" onkeypress="return isNumberKey(event)" class="form-control text-right" placeholder=" رقم البطاقة" required>
<span style="font-size: 15px !important;" class="label label-warning label-as-badge"><?php echo $random = substr(number_format(time() * rand(),0,'',''),0,10); ?> </span>
              
              
              
              
                </div>
           
           
           
           
            </div>
            <div class="form-group"="wait 0.6s, then enter bottom and hustle 100%">
            <label for="inputUser" class="col-lg-2 control-label">الجوال:</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-mobile"></i>
                    <input type="text" id="mobile"  name="mobile" onkeypress="return isNumberKey(event)" class="form-control text-right" placeholder="الجوال" required>
               
               
                </div>
<label for="inputUser" class="col-lg-2 control-label">هاتف المنزل:</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-phone"></i>
                    <input type="text" id="phone"  name="phone" onkeypress="return isNumberKey(event)" class="form-control text-right" placeholder="هاتف المنزل" >
              
              
              
                </div>
            </div>
            <div class="form-group"="wait 0.6s, then enter bottom and hustle 100%">
            <label for="inputUser" class="col-lg-2 control-label">العنوان:</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-home"></i>
                    <input type="text" id="address"  name="address" class="form-control text-right" placeholder=" العنوان" >
              
              
                </div>
                <label for="inputUser" class="col-lg-2 control-label">الحالة الصحية:</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-heartbeat"></i>
                    <input type="text" id="health"  name="health" class="form-control text-right" placeholder=" الحالة الصحية" >
               
               
                </div>
            </div>
            <div class="form-group"="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label">الوظيفة:</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-wrench"></i>
                    <input type="text" id="work"  name="work" class="form-control text-right" placeholder=" الوظيفة" >
              
              
                </div>
                <label for="inputUser" class="col-lg-2 control-label">هاتف العمل:</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-phone"></i>
                    <input type="text" id="work_phone"  name="work_phone" onkeypress="return isNumberKey(event)" class="form-control text-right" placeholder=" هاتف العمل" >
               
               
                </div>
            </div>-->
        </fieldset>
        </div>
</section>

   
<section class="col-md-2 col-xs-12">

<div class="well bs-component"="wait 0.6s, then enter left and hustle 100%" style="padding: 0px 10px;">
 <fieldset>
              <div id="post_img" class="imgContent" style="min-height: 100px;">
              <img id="blah" src="<?php echo base_url('uploads/thumbs/user.png')?>" alt="الصورة الشخصية" style="" class="img-rounded" style="width: 5px;">
              </div>
            </fieldset>
	</div> 

</section>



<section class="col-md-4 col-xs-12">
<div class="well bs-component"="wait 0.6s, then enter left and hustle 100%">
 <fieldset>
   
<legend></legend>





  <div class="row">
  
    <div class="col-md-6">

              <label for="inputPassword" class="col-lg-7 control-label" >تحديد التاريخ </label>
    
		          <input type="checkbox" id="check" onchange="return dis();" data-style="android" data-size="mini" data-toggle="toggle" data-onstyle="danger" data-offstyle="success" data-on="تعطيل" data-off="تفعيل" data-width="70">
            

      
           
           
           
            <div class="form-group"="wait 0.3s, then enter bottom and hustle 100%">
             <div class="col-lg-12 input-grup" >	
		          	<input type="date" class="form-control text-center" value="<?php echo date("Y-m-d"); ?>" name="operation_date" id="operation_date" readonly />
		      </div>
          </div>
  
  
 </div> 
 
  <div class="col-md-6">
      <div class="form-group">
     <i class="fa fa-user-md"></i>
          <label class="control-label">    الطبيب   </label>   
            <select class="form-control" id="doc_id" name="doc_id">
      <option value="">--قم بإختيار الطبيب--</option> 
 <?php
                  if(isset($doctors)){
                    foreach($doctors as $doctor)
                        echo '<option value="'.$doctor->id.'">'.$doctor->name.'</option>';
                  }
                  ?>
</select> 
               
    </div>
   
  
  </div>
 
 
 
  
     </div> 
  
  
  <div class="row">
  

  
    <div class="col-md-6">
      <div class="form-group">
     <i class="fa fa-money"></i>
          <label class="control-label">    مدفوع مقدما    </label>   

<input type="number" class="form-control text-center" value="" step="any" name="first_paid" required="required" />		        


               
    </div>
   
  
  </div>
      <div class="col-md-6">
      <div class="form-group">
     <i class="fa fa-folder-open-o"></i>
          <label class="control-label">    القسم   </label>   

   <select class="form-control" id="dep_id" name="dep_id" onchange="return pricee();" data-style="btn-bnfsg" data-title="إختر قسم" required >
                  <option value="">--قم بإختيار القسم--</option>
                  <?php
                  if(isset($departs)){
                    foreach($departs as $depart)
                        echo '<option value="'.$depart->id.'">'.$depart->dep_name.'</option>';
                  }
                  ?>
                  </select>



               
    </div>
   
  
  </div>
  
  </div>
         
  <div class="row">

  
  
  
      <div class="col-md-6">
      
          
              <label for="inputPassword" class="col-lg-7 control-label" >تحديد السعر </label>
          
		          <input type="checkbox" id="check2" onchange="return dis2();" data-style="android" data-size="mini" data-toggle="toggle" data-onstyle="danger" data-offstyle="success" data-on="تعطيل" data-off="تفعيل" data-width="70">
             
		
          
              <div class=" col-lg-12 input-grup" id="optionearea2">
                    <i class="fa fa-money"></i>
		          <input type="text" id="price"  name="price"  class="form-control text-right" placeholder=" السعر" readonly required />
                </div>
	
          
          
          
          
            <div class="form-group"="wait 0.3s, then enter bottom and hustle 100%">
                <div class="col-lg-12 input-grup" ><br />
                    <input type="submit"  name="add" onclick="if(! $('#price').val()){alert('لم يتم تحديد سعر للكشف');return false;}" value="حفظ" class="btn btn-primary" >
                </div>
            </div>
      
      
      </div>
  
  
  
  </div>
  
  
  
  
  
  
  <!--
  <div class="form-group">
  <label  class="col-lg-2 control-label" style="margin-top: 10px;"> الطبيب </label>                     
     <select class="form-control" id="doc_id" name="doc_id">
      <option value="">قم بإختيار الطبيب</option> 
 <?php
                  if(isset($doctors)){
                    foreach($doctors as $doctor)
                        echo '<option value="'.$doctor->id.'">'.$doctor->name.'</option>';
                  }
                  ?>
</select>
</div>
  <div class="form-group">
  <label  class="col-lg-12 control-label" style="margin-top: 10px;"> مدفوع مقدما  </label>                     
<input type="number" class="form-control text-center" value="" step="any" name="first_paid" required="required" />		        



</div>    
   
            <div class="form-group"="wait 0.3s, then enter bottom and hustle 100%">
              <label for="inputPassword" class="col-lg-12 control-label" style="margin-top: 10px;"> القسم </label>
              <div class=" col-lg-12 input-grup">
		          <select class="form-control" id="dep_id" name="dep_id" onchange="return pricee();" data-style="btn-bnfsg" data-title="إختر قسم" required >
                  <option value="">قم بإختيار القسم</option>
                  <?php
                  if(isset($departs)){
                    foreach($departs as $depart)
                        echo '<option value="'.$depart->id.'">'.$depart->dep_name.'</option>';
                  }
                  ?>
                  </select>
                </div>
		    </div>
            
            
          
            
            
            
            
            
            <div class="form-group"="wait 0.3s, then enter bottom and hustle 100%">
              <label for="inputPassword" class="col-lg-7 control-label" >تحديد السعر </label>
              <div class="checkbox col-lg-5">
		          <input type="checkbox" id="check2" onchange="return dis2();" data-style="android" data-size="mini" data-toggle="toggle" data-onstyle="danger" data-offstyle="success" data-on="تعطيل" data-off="تفعيل" data-width="70">
                </div>
		    </div>
            <div class="form-group"="wait 0.3s, then enter bottom and hustle 100%">
              <div class=" col-lg-12 input-grup" id="optionearea2">
                    <i class="fa fa-money"></i>
		          <input type="text" id="price"  name="price"  class="form-control text-right" placeholder=" السعر" readonly required />
                </div>
		    </div>
          
          
          
          
            <div class="form-group"="wait 0.3s, then enter bottom and hustle 100%">
                <div class="col-lg-12 input-grup" ><br />
                    <input type="submit"  name="add" onclick="if(! $('#price').val()){alert('لم يتم تحديد سعر للكشف');return false;}" value="حفظ" class="btn btn-primary" >
                </div>
            </div>
          
          
          
          -->
          
          
          
            </fieldset>
            </div>
</section>
        <?php echo form_close()?>
    <?php endif?>
<section class="col-md-12 col-xs-12">
<div id="optionearea1">
</div>
</section>
</div>

<!------ نهاية الكشف الخاص بمريض --------------------->







     <div class="tab-pane fade" id="tab1default">
<div class="well bs-component" >
 <fieldset>
            <legend >حجوزات اليوم</legend>
<?php if(isset($records1) && $records1 != null){  ?>
<table  class="table table-bordered" role="table">
        <thead>
        <tr>
            <th width="2%">#</th>
            <th  class="text-right">إسم المريض</th>
            <th class="text-right">رقم البطاقة</th>
            <th width="20%" class="text-right">تاريخ الميلاد</th>
            <th width="20%" class="text-right">القسم</th>
         <!--   <th width="20%" class="text-right">التحكم</th>-->
        </tr>
        </thead>
        <tbody>
        <?php $x = 0; 
        $hash1 = '#tab1default';
         foreach($records1 as $record){ 
            $x++; 
        ?>
            <tr >
                <td ><span class="badge"><?php echo $x?></span></td>
                <td ><?php echo $record->a_name ?> </td>
                <td ><?php echo $record->id_card ?></td>
                <td ><?php echo $record->birth_date ?></td>
                <td ><?php echo $departs[$record->dep_id]->dep_name ?></td>
                <!--<td >
                <a  href="<?php echo base_url().'dashboard/delete_operation/'.$record->id.'/'.$hash1?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-9"><i class="fa fa-trash"></i> حذف</a>
                </td>-->
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php }else {?>
        <?php echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
  <strong>تنبية!</strong> لا توجد حجوزات تمت بتاريخ اليوم
</div>'; } ?>
</fieldset>
</div>
     </div>
     <div class="tab-pane fade" id="tab2default">
<div class="well bs-component" >
 <fieldset>
            <legend >جميع الحجوزات</legend>
<?php if(isset($records2) && $records2 != null){  ?>
<table  class="table table-bordered" role="table">
        <thead>
        <tr>
            <th width="2%">#</th>
            <th  class="text-right">التاريخ</th>
            <th  class="text-right">إسم المريض</th>
            <th class="text-right">رقم البطاقة</th>
            <th width="20%" class="text-right">تاريخ الميلاد</th>
            <th width="20%" class="text-right">القسم</th>
        <!--    <th width="20%" class="text-right">التحكم</th>-->
        </tr>
        </thead>
        <tbody>
        <?php $x = 0; 
        $hash2 = '#tab2default';
         foreach($records2 as $record){ 
            if($record->operation_date != date("Y-m-d"))
                $cc = "info";
            else
                $cc = "";
            $x++; 
        ?>
            <tr class="<?php echo $cc ?>">
                <td ><span class="badge"><?php echo $x?></span></td>
                <td ><?php echo $record->operation_date ?> </td>
                <td ><?php echo $record->a_name ?> </td>
                <td ><?php echo $record->id_card ?></td>
                <td ><?php echo $record->birth_date ?></td>
                <td ><?php echo $departs[$record->dep_id]->dep_name ?></td>
               <!-- <td >
                <a  href="<?php echo base_url().'dashboard/delete_operation/'.$record->id.'/'.$hash2?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   col-lg-9"><i class="fa fa-trash"></i> حذف</a>
                </td>-->
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php }else {?>
        <?php echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
  <strong>تنبية!</strong> لا توجد حجوزات
</div>'; } ?>
</fieldset>
</div>
     </div>
     <div class="tab-pane fade" id="tab3default">
<div class="well bs-component" >
 <fieldset>
            <legend >خروج مريض</legend>
<?php if(isset($records4) && $records4 != null){  ?>
<table  class="table table-bordered" role="table">
        <thead>
        <tr>
            <th class="text-right" width="10%">#</th>
            <th width="15%" class="text-right">التاريخ</th>
            <th width="25%" class="text-right">إسم المريض</th>
            <th width="16%" class="text-right">رقم البطاقة</th>
            <th width="25%" class="text-right">تاريخ الميلاد</th>
            <th width="20%" class="text-right">الجنسية</th>
            <!--th  class="text-right">القسم</th -->
        </tr>
        </thead>
       </table>
       <div class="panel-group" style="margin-bottom: 3px;" id="accordion">
        <?php $x = 0;
              $dis = 0; 
              $start = 0;
              $end = 0;  
         for($t = 0 ; $t < count($records4) ; $t++){ 
            if($records4[key($records4)][key($records4[key($records4)])][0]->operation_date != date("Y-m-d"))
                $cc = "rgb(34, 47, 65)";
            else
                $cc = "none";
            $x++; 
        ?>
        <div class="panel panel-default <?php echo $cc; ?>">
                    <div class="panel-heading" style="background: <?php echo $cc ?>;" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $records4[key($records4)][key($records4[key($records4)])][0]->id_card ?>">
                        <a> 
                        <?php echo '<div class="col-xs-1 text-right"><span class="badge">'.$x.'</span></div>
                                    <div class="col-xs-2">'.$records4[key($records4)][key($records4[key($records4)])][0]->operation_date.'</div><div class="col-xs-3">'. 
                                   $records4[key($records4)][key($records4[key($records4)])][0]->a_name.'</div><div class="col-xs-2">'. 
                                   $records4[key($records4)][key($records4[key($records4)])][0]->id_card.'</div><div class="col-xs-3">'. 
                                   $records4[key($records4)][key($records4[key($records4)])][0]->birth_date.'</div><div class="col-xs-1">'. 
                                   $records4[key($records4)][key($records4[key($records4)])][0]->nationality.'</div>';  
                        ?> 
                        </a>
                        <br />
                    </div>
                    <div id="<?php echo $records4[key($records4)][key($records4[key($records4)])][0]->id_card ?>" class="panel-collapse collapse">
                    <br />
                    <form name="form<?php echo $t ?>" method="post" action="exitt/<?php echo $t ?>">
                    <?php
                    $total = 0;
                    $total_paid = 0;
                    $data = '';
                    $paid='';
                    $patient_id = $records4[key($records4)][key($records4[key($records4)])][0]->p_id;
                    for($d = 0 ; $d < count($records4[key($records4)]) ; $d++){
                        if($records4[key($records4)][key($records4[key($records4)])][0]->to_dep != 0)
                            $to_dep = $departs[$records4[key($records4)][key($records4[key($records4)])][0]->to_dep]->dep_name;
                        else
                            $to_dep = '-';
                    echo '<div class="col-xs-12 alert alert-warning">
                                  <div class="col-xs-1"><label class="control-label">القسم:</label></div><div class="col-xs-8">'.$departs[key($records4[key($records4)])]->dep_name.'</div>
                                  <div class="col-xs-2"><label class="control-label">التحويل إلى قسم:</label></div>'.$to_dep.'
                              </div>
                    <div class="col-xs-12">
                                  <div class="col-xs-2"><label class="control-label">التاريخ</label></div>
                                  <div class="col-xs-3"><label class="control-label">العملية</label></div>
                                  <div class="col-xs-2"><label class="control-label">المبلغ</label></div>
                                  <div class="col-xs-2"><label class="control-label">المدفوع</label></div>
                                  <div class="col-xs-1"><label class="control-label">الباقي</label></div>
                                  <div class="col-xs-2 text-center"><label class="control-label">بعد الخصم</label></div>
                              </div>';
                    $start = $dis+1;
                    for($s = 0 ; $s < count($records4[key($records4)][key($records4[key($records4)])]) ; $s++){
                        $dis++;
                        echo '<div class="col-xs-12">
                                  <div class="col-xs-2">'.$records4[key($records4)][key($records4[key($records4)])][$s]->operation_date.'</div>
                                  <div class="col-xs-3">'.$operation[$records4[key($records4)][key($records4[key($records4)])][$s]->operation_id]->operation.'</div>
                                  <div class="col-xs-2">'.sprintf("%.2f",$records4[key($records4)][key($records4[key($records4)])][$s]->operation_price).'</div>
                                  <div class="col-xs-2" style="color:blue;">'.sprintf("%.2f",$records4[key($records4)][key($records4[key($records4)])][$s]->paid).'</div>
                                  <div class="col-xs-1">
                                  <input type="text" style="height:10px;width:85px;color:red;" id="same'.$dis.'" class="form-control" readonly value="'.sprintf("%.2f",($records4[key($records4)][key($records4[key($records4)])][$s]->operation_price-$records4[key($records4)][key($records4[key($records4)])][$s]->paid)).'" />
                                  </div>
                                  <div class="col-xs-2 text-left"  style="padding-left:30px;">
                                  <input type="text" style="height:10px;width:85px;" name="after_dis'.$dis.'" id="after_dis'.$dis.'" class="form-control" readonly value="'.sprintf("%.2f",($records4[key($records4)][key($records4[key($records4)])][$s]->operation_price-$records4[key($records4)][key($records4[key($records4)])][$s]->paid)).'" />
                                  </div>
                              </div>';
                        $total += $records4[key($records4)][key($records4[key($records4)])][$s]->operation_price;
                        $total_paid += $records4[key($records4)][key($records4[key($records4)])][$s]->paid;
                        $data.=$records4[key($records4)][key($records4[key($records4)])][$s]->id.'-';
                        //$paid.=$records4[key($records4)][key($records4[key($records4)])][$s]->operation_price.'-';
                        $paid .= $dis.'-';
                        $fatora = $records4[key($records4)][key($records4[key($records4)])][$s]->fatora_num;
                    }
                    next($records4[key($records4)]);
                    }
                    $dis++;
                    $end = $dis;
                    $sc = "location.href='".base_url()."dashboard/exitt/2/".$data."/".$paid."/patient#tab3default';";
                    echo '<div class="col-xs-12 alert-info">
                          <div class="col-xs-5"><label class="control-label">الإجمـــالي</label></div>
                          <div class="col-xs-2"><label class="control-label">'.sprintf("%.2f",$total).'</label></div>
                          <div class="col-xs-2"><label class="control-label">'.sprintf("%.2f",$total_paid).'</label></div>
                          <div class="col-xs-1">
                          <input type="text" style="height:10px;width:85px;color:red;" class="form-control" id="same'.$dis.'" readonly value="'.sprintf("%.2f",($total-$total_paid)).'" />
                          </div>
                          <div class="col-xs-2 text-left" style="padding-left:30px;">
                          <input type="text" style="height:10px;width:85px;" class="form-control" name="after_dis'.$dis.'" id="after_dis'.$dis.'" readonly value="'.sprintf("%.2f",($total-$total_paid)).'" />
                          </div>
                          </div>
                          <div class="col-xs-12"><br />
                          <div calss="col-xs-3" style="width:25%;float: right; ">
                          <input type="checkbox" id="check_percent'.$t.'" onchange="return enabel('.$t.');" >
                          <label for="inputUser" class="control-label">تحديد نسبة الخصم</label>
                          <!--/div>
                          <div calss="col-xs-3"  style="width:15%;float: right; "-->
                          <input type="text" class="form-control text-center" onkeyup="return discount('.$start.','.$end.','.$t.');" onkeypress="return isNumberKey(event)" name="percentage'.$t.'" id="percentage'.$t.'" style="height:10px;width:100px;margin-right:15px" placeholder="%" readonly /> 
                          </div>
                          <div calss="col-xs-3" style="width:25%;float: right; ">
                          <input type="checkbox" id="check_paid'.$t.'" onchange="return enabel2('.$t.');" >
                          <label for="inputUser" class="control-label">تحديد المبلغ المدفوع</label>
                          <!--/div>
                          <div calss="col-xs-3"  style="width:15%;float: right; "-->
                          <input type="text" class="form-control text-center" onkeyup="return paid('.$end.','.$t.');" onkeypress="return isNumberKey(event)" name="payment'.$t.'" id="payment'.$t.'" style="height:10px;width:100px;margin-right:15px" readonly /> 
                          </div>
                          <div calss="col-xs-3" style="width:25%;float: right;margin-top:4px; ">
                          <label for="inputUser" style="margin-right:20px" class="control-label">المتبقى</label>
                          <input type="text" class="form-control text-center" name="remains'.$t.'" id="remains'.$t.'" value="'.sprintf("%.2f",($total-$total_paid)).'" style="height:10px;width:100px;" readonly /> 
                          </div>
                          <div calss="col-xs-6 input-grup"  style="float: left; ">
                          <button type="submit" name="add'.$t.'" onclick="'.$sc.'" class="btn btn-danger" ><i class="fa fa-sign-out fa-lg"></i> خروج</button>
                          <input type="hidden" name="data'.$t.'" value="'.$data.'" />
                          <input type="hidden" name="paid'.$t.'" value="'.$paid.'" />
                          <input type="hidden" name="total'.$t.'" value="'.$end.'" />
                          <input type="hidden" name="total_paid'.$t.'" value="'.$total_paid.'" />
                          <input type="hidden" name="patient_id'.$t.'" value="'.$patient_id.'" />
                          <input type="hidden" name="check" value="2" />
                          <input type="hidden" name="fatora_num'.$t.'" value="'.$fatora.'" />
                          <input type="hidden" name="page" value="patient#tab3default" />
                          <!--a href="'.base_url().'dashboard/exitt/2/'.$data.'/'.$paid.'/patient#tab3default" class="btn btn-danger btn-xs col-lg-2"><i class="fa fa-sign-out"></i> خروج</a-->
                          </div>
                          </div>';
                    ?>
                    </form>
                    </div>
                    </div>
        <?php 
        next($records4);
        } ?>
    </div>
    <?php }else {?>
        <?php echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
  <strong>تنبية!</strong> لا يوجد مرضى
</div>'; } 
?>
</fieldset>
</div>
     </div>
<div class="tab-pane fade" id="tab4default">
<div class="well bs-component" >
 <fieldset>
            <legend >الكشوفات المنتهية بتاريخ اليوم</legend>
<?php if(isset($records5) && $records5 != null){ 
    //var_dump($records5); ?>
     <table  class="table table-bordered" role="table">
        <thead>
        <tr>
            <th class="text-right" width="10%">#</th>
            <th width="25%" class="text-right">إسم المريض</th>
            <th width="25%" class="text-right">الجوال</th>
            <th width="16%" class="text-right">المبلغ المدفوع</th>
            <!--th  class="text-right">القسم</th -->
        </tr>
        </thead>
        <tbody>
            <tr>
            <?php
            $total3 = 0;
            for($b = 0 ; $b < count($records5) ; $b++){
                $val = 0;
                $pay2 = 0;
                echo '<tr>
                      <td>'.($b+1).'</td>
                      <td>'.$records5[key($records5)][key($records5[key($records5)])][0]->a_name.'</td>
                      <td>'.$records5[key($records5)][key($records5[key($records5)])][0]->mobile.'</td>';
                for($a = 0 ; $a < count($records5[key($records5)]) ; $a++){
                    for($z = 0 ; $z < count($records5[key($records5)][key($records5[key($records5)])]) ; $z++){
                        if($records5[key($records5)][key($records5[key($records5)])][$z]->status == 0)
                                $val += $records5[key($records5)][key($records5[key($records5)])][$z]->paid;
                        else{
                            $DB1 = $this->load->database('kingdom', TRUE);
                            $h = $DB1->get_where('payment',array(
                                                 'patient_id'=>$records5[key($records5)][key($records5[key($records5)])][$z]->p_id,
                                                 'hospital_id'=>2,
                                                 'out_date'=>date("Y-m-d"),
                                                 'fatora_num'=>$records5[key($records5)][key($records5[key($records5)])][$z]->fatora_num));
                            $pay = $h->row_array();
                            $pay2 = $pay['paid'];
                        }
                        next($records5[key($records5)][key($records5[key($records5)])]);
                    }
                    $val += $pay2;
                    $pay2 = 0;
                    next($records5[key($records5)]);
                }
                echo '<td>'.sprintf('%.2f',$val).'</td>
                      </tr>';
                next($records5);
                $total3 += $val;
            }
            echo '<tr class="alert alert-success">
                  <td colspan="3">الإجمـــــالي</td>
                  <td>'.sprintf('%.2f',$total3).'</td>
                  </tr>';
            ?>
            </tr>
        </tbody>
     </table>
     <?php }else {?>
        <?php echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
  <strong>تنبية!</strong> لا توجد كشوفات حصلت بتاريخ اليوم
</div>'; } 
?>
</fieldset>
</div>
     </div>
            </div>
        </div>
    </div>
</div>
<script>
function _calculateAge() { 
    /*var today = new Date();
    var birthDate = new Date($('#birth_date').val());
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) 
    {
        age--;
    }
    $('#age').val(age);*/
    if($('#birth_date').val()){
     var now = new Date();
  var today = new Date(now.getYear(),now.getMonth(),now.getDate());
  var yearNow = now.getYear();
  var monthNow = now.getMonth();
  var dateNow = now.getDate();
  var dateString = $('#birth_date').val(); 
  var dob = new Date(dateString.substring(0,4),
                     dateString.substring(5,7)-1,
                     dateString.substring(8,10)          
                     );
  var yearDob = dob.getYear();
  var monthDob = dob.getMonth();
  var dateDob = dob.getDate();
  var age = {};
  var ageString = "";
  var yearString = "";
  var monthString = "";
  var dayString = "";
  yearAge = yearNow - yearDob;
  if (monthNow >= monthDob)
    var monthAge = monthNow - monthDob;
  else {
    yearAge--;
    var monthAge = 12 + monthNow -monthDob;
  }
  if (dateNow >= dateDob)
    var dateAge = dateNow - dateDob;
  else {
    monthAge--;
    var dateAge = 31 + dateNow - dateDob;
    if (monthAge < 0) {
      monthAge = 11;
      yearAge--;
    }
  }
  age = {
      years: yearAge,
      months: monthAge,
      days: dateAge
      };
  if ( age.years > 1 ) yearString = " سنة";
  else yearString = " سنة";
  if ( age.months> 1 ) monthString = " شهر";
  else monthString = " شهر";
  if ( age.days > 1 ) dayString = " يوم";
  else dayString = " يوم";
  if ( (age.years > 0) && (age.months > 0) && (age.days > 0) )
    ageString = age.years + yearString + ", " + age.months + monthString + ", " + age.days + dayString ;
  else if ( (age.years == 0) && (age.months == 0) && (age.days > 0) )
    ageString = "فقط " + age.days + dayString ;
  else if ( (age.years > 0) && (age.months == 0) && (age.days == 0) )
    ageString = age.years + yearString + " عيد ميلاد سعيد!!";
  else if ( (age.years > 0) && (age.months > 0) && (age.days == 0) )
    ageString = age.years + yearString + " و " + age.months + monthString ;
  else if ( (age.years == 0) && (age.months > 0) && (age.days > 0) )
    ageString = age.months + monthString + " و " + age.days + dayString ;
  else if ( (age.years > 0) && (age.months == 0) && (age.days > 0) )
    ageString = age.years + yearString + " و " + age.days + dayString ;
  else if ( (age.years == 0) && (age.months > 0) && (age.days == 0) )
    ageString = age.months + monthString ;
  else alert("تنبيه، لا يمكن حساب تاريخ الميلاد .. برجاء كتابته صحيحاً.");
  $('#age').val(ageString);
 }
 }
</script>
<script>
$(function() {
    $('#check').change(function() {
           if(! $(this).prop('checked'))
                $('#operation_date').attr("readonly", true);
           else
                $('#operation_date').attr("readonly", false);
    });
    if($('#gen').val() == 0)
        $('#gender').bootstrapToggle('on');
    else
        $('#gender').bootstrapToggle('off');
    return false;
 })
</script>
<script>
$(function() {
    $('#check2').change(function() {
           if(! $(this).prop('checked'))
                $('#price').attr("readonly", true);
           else
                $('#price').attr("readonly", false);
    });
    return false;
 })
</script>
<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#blah')
        .attr('src', e.target.result)
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
<script>
 function search(){
    if($("#id_card").val() != ''){
        var id = $("#id_card").val();
        var dataString = 'num=' + id ;
        $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/dashboard/patient',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea1").html(html);
                } 
        });
        return false;
    }
 }
</script>
<script>
 function pricee(){
    if($("#dep_id").val() != ''){
        var id = $("#dep_id").val();
        var dataString = 'id=' + id ;
        $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/dashboard/patient',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea2").html(html);
                } 
        });
        return false;
    }
 }
</script>
<style>
input[type=date]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    display: none;
}
input[type=date]::-webkit-calendar-picker-indicator {
    -webkit-appearance: none;
    display: none;
}
</style>
<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
<style>
.btn-mobileSelect-gen {
display:none!important;
}
#dep_id {
display:block!important;
}
#doc_id {
display:block!important;
}
</style>
<script>
$(function() {
$('#myTab a').click(function(e) {
  e.preventDefault();
  $(this).tab('show');
});
// store the currently selected tab in the hash value
$("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
  var id = $(e.target).attr("href").substr(1);
  window.location.hash = id;
});
// on load of the page: switch to the currently selected tab
var hash = window.location.hash;
$('#myTab a[href="' + hash + '"]').tab('show');
 })
</script>
<style>
    .panel {
        box-shadow: none;
    }
</style>  
<style>
.panel-heading { cursor: pointer; cursor: hand; }
</style>
<script>
function replac(str){
    str = str.trim();
    str = str.replace(/ +(?= )/g,'');
    var letter = str.replace(/أ/g , "ا");
    var letter2 = letter.replace(/إ/g , "ا");
    var letter3 = letter2.replace(/آ/g , "ا");
    var letter4 = letter3.replace(/ى/g , "ي");
    var letter5 = letter4.replace(/ة/g , "ه");
    var letter6 = letter5.replace(/عبدا/g , "عبد ا");
    $("#a_name").val(letter6);
    return false;
}
</script>
<script>
function lower(word){
    word = word.trim();
    word = word.replace(/ +(?= )/g,'');
    word = word.replace(/_/g,' ');
    word = word.replace(/-/g,' ');
    $('#e_name').val(word.toLowerCase());
    return false;
}
</script>
<script>
function enabel(id){
        var put = '#check_percent'+id;
        var put2 = '#percentage'+id;
            if(! $(put).prop('checked'))
                $(put2).attr("readonly", true);
            else{
                $(put2).attr("readonly", false);
                $(put2).focus();
            }
     return false;
}
</script>
<script>
function enabel2(id){
        var put = '#check_paid'+id;
        var put2 = '#payment'+id;
            if(! $(put).prop('checked'))
                $(put2).attr("readonly", true);
            else{
                $(put2).attr("readonly", false);
                $(put2).focus();
            }
     return false;
}
</script>
<script>
function discount(start,end,id){
    var put2 = '#percentage'+id;
    var put3 = '#remains'+id;
    if($(put2).val() > 0 && $(put2).val() <= 100){
        for (i = start; i <= end; i++) { 
            put = '#after_dis' + i;
            same = '#same' + i;
            cal = $(same).val() - Math.floor(($(same).val() * $(put2).val()) / 100);
            $(put).val(cal);
            $(put3).val(cal);
        }
    }
    else{
        alert("لا يجوز أن تكون القيمة فارغة أو صفرا أو أكبر من 100%");
        for (i = start; i <= end; i++) { 
            same = '#same' + i;
            put = '#after_dis' + i;
            cal = $(same).val();
            $(put).val(cal);
            $(put3).val(cal);
            $(put2).val('');
        }
    }
}
</script>
<script>
function paid(end,id){
    var put2 = '#payment'+id;
    var put = '#after_dis' + end;
    var put3 = '#remains'+id;
    if(parseInt($(put2).val()) > 0){
        if(parseInt($(put2).val()) >= parseInt($(put).val()) ){
            alert("لا يجب أن تكون القيمة المدفوعة أكبر من أو تساوي القيمة المدفوعة");
            $(put2).val("");
            $(put3).val($(put).val());
        }
        else{
            cal = $(put).val()-$(put2).val();
            $(put3).val(cal);
        }
    }
    else{
        $(put2).val("");
        $(put3).val($(put).val());
    }
}
</script>