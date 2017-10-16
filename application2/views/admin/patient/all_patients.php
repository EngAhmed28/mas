
<div id="printJS-form">
<h2 class="text-flat hidden-print" id="topage">إدارة التقارير <span class="text-sm"><?php echo $title; ?></span></h2>

<ul class="breadcrumb pb30 hidden-print ">

    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>
    <li class="active hidden-print "><?php echo $title; ?></li>
</ul>

<?php
  if(isset($all_patient) && $all_patient != null){    
    ?>
    <!--
<div style="float:left" >
<button onClick="window.print()" class="btn btn-sm  btn-success hidden-print" > 
<span class="glyphicon glyphicon-print"></span> طبـاعه </button>
</div>-->
<div style="float:left" >
<button onclick="printDiv('printJS-form')" class="btn btn-sm  btn-success hidden-print" > <span class="glyphicon glyphicon-print"></span> طبـاعه </button>
</div>
    <!--<div id="pprint">-->

       <!--   <div class="col-xs-12  visible-print " >
              <div class="col-xs-4">
              
                        <img src="<?php echo base_url();?>asisst/img/logo_sanad.png" />
                </div>
                <div class="col-xs-12">
                    <h4>مجموعه الماس الطبية  </h4>
                </div>
            </div>-->
     
     
         <div class="col-xs-12  visible-print ">
              <div class="col-xs-4">
              
                        <img src="<?php echo base_url();?>asisst/img/logo_sanad.png"  width="140px" height="100px"
                        style="margin: 0px; "
                        />
                    </div>
                <div class="col-xs-12">
                    <h4 class="" style="text-align: center;">قائمة بعملاء الماس الطبية  </h4>
                </div>
                
            </div>
    <table id="no-more-tables" class="table table-bordered" role="table" style="width: 100%;">
        <thead >
        <tr>
            <th width="%">#</th>
            <th  class="text-center">إسم العميل</th>
             <th class="text-center">رقم الملف </th>
            <th class="text-center">رقم الهوية</th>
                <th class="text-center">الجوال</th>
        </tr>

        </thead>
        <tbody>
       
       <?php
       $x=0;
          foreach($all_patient as $patient):
          $x++;
          ?>
           <tr>
           <td><?php echo $x; ?></td>
          <td><?php echo $patient->a_name;  ?></td>
          <td><?php echo $patient->code; ?></td>
          <td><?php echo $patient->id_card; ?></td>
            <td><?php echo $patient->mobile; ?></td>
          </tr>
          <?php
          endforeach;
       
       ?>

        </tbody>

    </table>

    

<?php
}else{
echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>تنبية!</strong> لا يوجد عملاء مسجلين
</div>';
 }?>
 

</div> 