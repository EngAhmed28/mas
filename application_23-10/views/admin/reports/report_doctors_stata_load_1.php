
<?php if(isset($all_doctors) && !empty($all_doctors) && $all_doctors!=null){?>
    <?php  $count_visit=0;$count_total=0; foreach($all_doctors as  $key):
        $count_visit+= sizeof($key->patient_on_date);
            foreach($key->patient_on_date as  $keys):
                $count_total +=$keys->patient_total_paid;

            endforeach;
        endforeach;
        ?>
    <table id="no-more-tables" class="table table-bordered hidden-print" role="table" style="width: 30%; margin-right: 500px">
        <thead >
        <tr>

            <th class="text-right">عدد الحالات  </th>
            <th class="text-right"> إجمالى الايرادات  </th>
        </tr>

        </thead>
        <tbody>
        <tr>

            <td class=""><?php echo $count_visit?> </td>
            <td class=""><?php echo $count_total?>  </td>
        </tr>
        </tbody>
    </table>




    <table id="sample_1" class="table table-bordered table-hover table-striped" cellspacing="0"  width="99%" style="margin-right: 6px; direction:rtl;">
        <thead>
        <tr>
            <th width="">#</th>
            <th width="" class="text-right">تاريخ اليوم </th>
            <th width="" class="text-right">إسم المريض </th>
            <th width="" class="text-right">المدفوع </th>
        </tr>
        </thead>
        <tbody>
        <?php  $count=1; foreach($all_doctors as  $key):?>
            <tr>
            <td rowspan="<?php echo sizeof($key->patient_on_date)?>"><?php echo $count++ ?></td>
            <td rowspan="<?php echo sizeof($key->patient_on_date)?>" data-toggle="modal" data-target="#myModal"><?php echo $key->operation_date ;?></td>
            <?php foreach($key->patient_on_date as  $keys): ?>
                <td> <?php echo $keys->patient_name ?></td>
                <td> <?php echo $keys->patient_total_paid ?> </td>

                </tr>

            <?php endforeach;?>
        <?php endforeach;?>

        </tbody>
    </table>
<?php }else{
 echo '<div class="alert alert-danger">
  <strong>لا يوجد !</strong>حلات  خلال الفترة .
</div>';
}?>