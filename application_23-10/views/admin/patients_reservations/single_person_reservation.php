
<style>

    .table thead>tr>th {
        text-align: right;
    }

</style>


<?php if($_SESSION['role_id_fk'] == 3) {?>

    <!--------------------------------------------------------------------->

    <table class="table  table-striped table-bordered" style="margin-bottom: 0px;max-height: 220px;width: 32%;
    margin-right: 30%; margin-bottom: 3%;">
        <thead class="info">
        <th>عدد الحالات خلال اليوم</th>
        <th>عدد الحالات الأجلة</th>
        </thead>
        <tbody>
        <tr>
        <td><?php echo sizeof($all_cases_today); ?></td>
        <td><?php echo sizeof($all_cases_aftertoday); ?></td>
        </tr>
        </tbody>
    </table>

    <!-------------------------------tabs-------------------------------------->

    <div class="row">
        <div class="col-md-12">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1default" data-toggle="tab"> حالات اليوم<?php echo date("Y-m-d",time()); ?></a></li>
                        <li><a href="#tab2default" data-toggle="tab">حالات أجلة </a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1default">
                            <!---------- today ----------->

                            <?php
                            if(isset($all_cases_today) && $all_cases_today!=null):
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
                                    <?php $count=1; foreach($all_cases_today as $row):?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo $row->patient_name ?></td>
                                            <td><?php echo $row->tele ?></td>
                                            <td><?php echo $row->patient_national_id?></td>
                                            <td><?php echo date( "h:i A", $row->reservations_time)?></td>
                                        </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                                <?php
                            endif;
                            ?>


                        </div>
                        <div class="tab-pane fade" id="tab2default">


                            <?php
                            if(isset($all_cases_aftertoday) && $all_cases_aftertoday!=null):
                                ?>
                                <table id="no-more-tables" class="table table-bordered" role="table">
                                    <thead>
                                    <tr>
                                        <th width="2%">#</th>
                                        <th width="" class="text-right">تاريخ اليوم</th>
                                        <th width="" class="text-right">إسم المريض</th>
                                        <th width="" class="text-right">رقم الهاتف</th>
                                        <th width="" class="text-right">رقم الهوية</th>
                                        <th width="" class="text-right">الوقت</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $count_=1; foreach($all_cases_aftertoday as $rows):?>
                                        <tr>
                                            <td><?php echo $count_++; ?></td>
                                            <td><?php echo date('Y/m/d',$rows->reservations_date) ?></td>
                                            <td><?php echo $rows->patient_name ?></td>
                                            <td><?php echo $rows->tele?></td>
                                            <td><?php echo $rows->patient_national_id?></td>
                                            <td><?php echo date( "h:i A", $row->reservations_time)?></td>
                                        </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                                <?php
                            endif;
                            ?>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--------------------------------------------------------------------->




<? }else{
   echo '
    <br/>
    <div class="alert alert-danger alert-dismissible" role="alert" style="width: 100%;margin-top: 60px">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>تنبية!</strong>     دورك الوظيفي كغير طبيب لا يسمح لك بالإطلاع علي تلك الإدارة 
</div>
';
    
    
}
?>


