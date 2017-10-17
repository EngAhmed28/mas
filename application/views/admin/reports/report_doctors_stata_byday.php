


 <?


 echo'<pre>';

 var_dump($row->doc_detals_paid);
 echo'</pre>';

 ?>
 <?php if(isset($all_doctors) && !empty($all_doctors) && $all_doctors!=null){?>
    <?php $count_visit=0;$count_total=0 ; foreach ($all_doctors as $row):
        $count_visit +=$row->doc_detals_num;
        $count_total  +=$row->doc_detals_paid;
        ?>

<?  $num =$count_visit;
        if($_SESSION['role_id_fk']==3){
        $num =sizeof($all_doctors);
    }?>

    <?php endforeach; ?>
    <table id="no-more-tables" class="table table-bordered hidden-print" role="table" style="width: 30%; margin-right: 450px">
        <thead >
        <tr>

            <th class="text-right">عدد الحالات  </th>
            <th class="text-right"> إجمالى الايرادات  </th>
        </tr>

        </thead>
        <tbody>
        <tr>

            <td class=""><?php echo $num ?> </td>
            <td class=""><?php echo $count_total?>  </td>
        </tr>
        </tbody>
    </table>



<?  if($_SESSION['role_id_fk']==3):?>
    <table id="no-more-tables" class="table table-bordered" role="table" style="width: 100%;">
        <thead >
        <tr>
            <th class="text-right" width="%">#</th>
            <th  class="text-right">إسم المريض </th>
            <th class="text-right">تاريخ الزيارة </th>
        </tr>

        </thead>
        <tbody>
        <?php $cout=1; foreach ($all_doctors as $row):?>
            <tr>
                <td><?php echo $cout++;?></td>
                <td><?php echo $row->patient_name ?></td>
                <td><?php echo $row->operation_date ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
        <? endif;?>
    <!--------------------------------------------------------------------->
    <?  if($_SESSION['role_id_fk']==1 ||$_SESSION['role_id_fk']==2):?>

        <table id="no-more-tables" class="table table-bordered" role="table" style="width: 100%;">
            <thead >
            <tr>
                <th class="text-right" width="%">#</th>
                <th  class="text-right">إسم الطبيب </th>
                <th class="text-right">عدد الحالات </th>
                <th class="text-right"> إجمالى الايرادات  </th>
            </tr>

            </thead>
            <tbody>
            <?php $cout=1; foreach ($all_doctors as $row):?>
                <tr>
                    <td><?php echo $cout++;?></td>
                    <td><?php echo $row->doc_name?></td>
                    <td><?php echo $row->doc_detals_num ?></td>
                    <td><?php echo $row->doc_detals_paid?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>


    <? endif;?>
    <!--------------------------------------------------------------------->
<?php }else{

    echo '<div class="alert alert-danger">
  <strong>لا يوجد !</strong>حلات  خلال اليوم .
</div>';
}?>