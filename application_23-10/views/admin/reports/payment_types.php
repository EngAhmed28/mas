<?php

//echo $cash_atm;

?>








<?php

 if(isset($records) && $records != null){    
    ?>







<div style="float:left" >
<button onclick="printDiv('printJS-form')" class="btn btn-sm  btn-success hidden-print" > <span class="glyphicon glyphicon-print"></span> طبـاعه </button>
</div>

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
            
          <!------------------- الجدول الاحصائي ------------>
            
            <table id="no-more-tables"  class="table table-bordered"  role="table" style="width: 50%; margin-right: 340px !important;">
    <thead>
      <tr class="text-center">
        <th class="text-center">طريقة الدفع</th>
        <th class="text-center">عدد المرات</th>
        <th class="text-center">الإجمالي</th>
      </tr>
    </thead>
    <tbody>
      <tr style="background: #128f76;color: white;" >
        <td class="text-center">Cash</td>
        <td class="text-center" ><?php echo sizeof($cash); ?></td>
        <td class="text-center"><?php echo $cash_sum; ?></td>
      </tr>
      <tr style="background: #e46f62;color: white;">
        <td>ATM</td>
        <td><?php echo sizeof($atm); ?></td>
        <td><?php echo $atm_sum; ?></td>
      </tr>
      <tr style="background: #d08600;color: white;">
        <td>Card</td>
        <td><?php echo sizeof($card); ?></td>
        <td><?php echo $card_sum; ?></td>
      </tr>
    </tbody>
  </table>

            
            
            
            
            
            
            
            <!------------------------------------------>
            
            
            
    <table id="no-more-tables" class="table table-bordered" role="table" style="width: 100%;">
        <thead >
        
        <tr>
    <th class="text-center" colspan="7">إجمالي عدد الزيارات  <?php echo sizeof($records) ?> زيارة </th>
       </tr>
        
        
        <tr>
            <th width="%">#</th>
            <th  class="text-center">إسم العميل</th>     
                <th class="text-center">الجوال</th>
                <th class="text-center">تاريخ الزيارة</th>
                
                 <th class="text-center">Cash</th>
                  <th class="text-center">Card</th>
                   <th class="text-center">ATM</th>
                 
        </tr>

        </thead>
        <tbody>
       
       <?php
       $x=0;
          foreach($records as $patient):
          $x++;
          ?>
           <tr>
           <td><?php echo $x; ?></td>
          <td><?php echo $patient->a_name;  ?></td>
          <td><?php echo $patient->mobile; ?></td>
           <td><?php  echo date('Y/m/d',$patient->date)  ?></td>
        
            
             <td><?php echo $patient->cash; ?></td>
              <td><?php echo $patient->card; ?></td>
               <td><?php echo $patient->atm; ?></td>
            
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
 