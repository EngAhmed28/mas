<?php


if($_SESSION['role_id_fk'] == 3)
{
    




	if(isset($patients) && $patients!=null):
?>
  <table id="no-more-tables" class="table table-bordered" role="table">
        <thead>
        
        <tr>
       <th class="text-center" colspan="3"> اسم الطبيب <?php echo $patients[0]->d_name ?></th>
       
       <th class="text-center" colspan="3"> عدد الحالات <?php echo sizeof($patients)  ?> حالة</th>
       </tr>
       
        
        <tr>
            <th width="2%">#</th>
            <th width="" class="text-right">إسم المريض</th>
             <th width="" class="text-right"> التاريخ</th>
             <th width="" class="text-right">رقم الهاتف</th>
            <th width="" class="text-right">رقم الهوية</th>
            <th width="" class="text-right">الوقت</th>
        </tr>
        </thead>
        <tbody>
        
        <?php $count=1; foreach($patients as $row):?>
  
       
       
   
        
    <tr>
    <td><?php echo $count++; ?></td>
    <td><?php echo $row->patient_name ?></td>
     <td><?php echo date('Y/m/d',$row->reservations_date) ?></td>
        <td><?php echo $row->tele ?></td>
    <td><?php echo $row->patient_national_id?></td>
    <td><?php echo date( "h:i A", $row->reservations_time) ?></td>
    
    </tr>
<?php endforeach;?>
    </tbody>
</table>

<?php else:
    echo '
    <br/>
    <div class="alert alert-danger" >
      لا يوجد حجوزات
          </div>';
    	endif;

}else{
   echo '
    <br/>
    <div class="alert alert-danger" >
    دورك الوظيفي كغير طبيب لا يسمح لك بالإطلاع علي تلك الإدارة 
          </div>';  
    
    
}
?>


