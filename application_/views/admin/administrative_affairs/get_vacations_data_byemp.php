
<?php
if(!empty($all_vacations) ):


?>
    <div class="col-xs-12">
        <div class="panel-body">

            <div class="fade in active">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">م</th>
                        <th class="text-center">عدد الأيام</th>
						<th class="text-center">نوع الأجازة</th>
                        <th class="text-center">من</th>
                        <th class="text-center">إلي</th>
                        
                    </tr>
                    </thead>
                    <tbody class="text-center">
        <?php
        $v=1;
        foreach($all_vacations as  $record):
	
            ?>
            <tr>
            <td rowspan="<?php echo sizeof($record->sub_img)?>"><?php echo $v++ ?></td>
			<?php
			$diff=0;
			foreach($record->sub_img as  $row): 
			$date1 = new DateTime(date("Y-m-d", strtotime($row->from_date)));
			$date2 = new DateTime(date("Y-m-d", strtotime($row->to_date)));
			$diff += $date2->diff($date1)->format("%a");
			endforeach;
			?>
              <td rowspan="<?php echo sizeof($record->sub_img)?>"> <?php  echo $diff; ?></td>
            <?php

			foreach($record->sub_img as  $row): ?>
            <?php  if (sizeof($record->sub_img)!= 0):
			
			$vacation=array('إختر','أجازة سنوية','أجازة مرضية','أجازة بدون أجر');
			
			?>
			    <td> <?php  echo $vacation[$row->vacation_id]; ?></td>
                <td> <?php echo $row->from_date; ?></td>
				 <td> <?php  echo $row->to_date; ?></td>
				 
                </tr>

            <?php  endif; ?>

            <?php
        endforeach;?>

        <?php  endforeach ; ?>
        </tbody></table>
            </div>
        </div>
    </div>


<?php endif;?>


