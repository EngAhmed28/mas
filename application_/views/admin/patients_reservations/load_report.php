<?php
	if(isset($patients) && $patients!=null):
?>
  <table id="no-more-tables" class="table table-bordered" role="table">
        <thead>
        <tr>
            <th width="2%">#</th>
            <th width="" class="text-right">إسم المريض</th>
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
        <td><?php echo $row->tele?></td>
    <td><?php echo $row->patient_national_id?></td>
    <td><?php
    echo date( "h:i A", $row->reservations_time) ?></td>
    
    </tr>
<?php endforeach;?>
    </tbody>
</table>

<?php else:
    echo '
    <br/>
    <div class="alert alert-danger" >
      لا يوجد حجوزات خلال اليوم
          </div>';
    	endif;
?>