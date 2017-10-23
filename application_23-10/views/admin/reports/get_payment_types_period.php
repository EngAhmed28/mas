<?php if(isset($records) && $records != null && !empty($type)){?>
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
            
    <table id="no-more-tables"  class="table table-bordered"  role="table" style="margin-top: 25px;width: 50%; margin-right: 340px !important;">
    <thead>
      <tr class="text-center">
        <th class="text-center">طريقة الدفع</th>
        <th class="text-center">عدد المرات</th>
        <th class="text-center">الإجمالي</th>
      </tr>
    </thead>
    <tbody>
    <?php if($type =='CASH' || $type =='All' ):?>
      <tr style="background: #128f76;color: white;" >
        <td class="text-center">Cash</td>
        <td class="text-center" ><?php echo sizeof($cash); ?></td>
        <td class="text-center"><?php echo $cash_sum; ?></td>
      </tr>
        <?php endif;?>
    <?php if($type =='ATM' || $type =='All'):?>
      <tr style="background: #e46f62;color: white;">
        <td>ATM</td>
        <td><?php echo sizeof($atm); ?></td>
        <td><?php echo $atm_sum; ?></td>
      </tr>
    <?php endif;?>
    <?php if($type =='CARD' || $type =='All'):?>
      <tr style="background: #d08600;color: white;">
        <td>Card</td>
        <td><?php echo sizeof($card); ?></td>
        <td><?php echo $card_sum; ?></td>
      </tr>
    <?php endif;?>
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
            <?php if($type =='CASH' || $type =='All' ):?> <th class="text-center">Cash</th> <?php endif;?>
            <?php if($type =='CARD' || $type =='All' ):?>  <th class="text-center">Card</th> <?php endif;?>
            <?php if($type =='ATM' || $type =='All' ):?>   <th class="text-center">ATM</th><?php endif;?>
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
           <?php if($type =='CASH' || $type =='All' ):?> <td><?php echo $patient->cash; ?></td> <?php endif;?>
           <?php if($type =='CARD' || $type =='All' ):?>  <td><?php echo $patient->card; ?></td> <?php endif;?>
           <?php if($type =='ATM' || $type =='All' ):?>   <td><?php echo $patient->atm; ?></td><?php endif;?>
          </tr>
          <?php
          endforeach;
       ?>
        </tbody>
    </table>
    
<?php
}else{
echo '<div class="alert alert-danger alert-dismissible" role="alert" style="width: 100%;margin-top: 60px">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>تنبية!</strong> لا يوجد عملاء مسجلين
</div>';
 }?>
 