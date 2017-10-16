
<h2 class="text-flat">إدارة التقارير  <span class="text-sm"><?php echo $title; ?></span></h2>

<ul class="breadcrumb pb30">

    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>



    <li class="active"><?php echo $title; ?></li>

</ul>



<?php if(isset($reports) && $reports != null){ ?>


     
<table id="no-more-tables" class="table table-bordered" role="table">

    <thead>
       <tr>
    <th class="text-center" colspan="4">إجمالي عدد  العملاء  <?php echo count($reports) ?> عميل </th>
       </tr>
    <tr>
        <th  class="text-center"># </th>
        <th  class="text-center">اسم العميل</th>
          <th  class="text-center">رقم الجوال</th>
        <th  class="text-center">إجمالي المديونية</th>

    </tr>
    </thead>
    <tbody>
    <?php
        $all = 0;
      /*  echo '<pre/>';
        print_r($reports);
          echo '<pre/>';*/
          
 
        
    for($x = 0 ; $x < count($reports) ; $x++){



        
        ?>


        <tr>
            <td data-title="#"><span class="badge"><?php echo ($x+1) ?></span></td>

            <td><?php echo key($reports) ?></td>
            <td>
            <?php
               $DB1 = $this->load->database('kingdom', TRUE);
                            $DB1->select('*');
                            $array = array('id'=>$reports[key($reports)][key($reports[key($reports)])]->patient_id);
                            $DB1->where($array);
                             $query = $DB1->get('patient');
                               if ($query->num_rows() > 0) {
                                 $row = $query->row(); 
                                       echo $row->mobile;
                                
                               }
            ?>
            </td>
            <?php
            $total = 0;
            for($z = 0 ; $z < count($reports[key($reports)]) ; $z++){
                $total += $reports[key($reports)][key($reports[key($reports)])]->remain;
                next($reports[key($reports)]);
                
            }
            ?>
            <td><?php echo sprintf("%.2f",$total) ?></td>

        </tr>

        <?php
        $all += $total;
    next($reports);
    }
    echo '<tr class="alert-info"><td colspan="3">المجموع الكلي</td><td>'.sprintf("%.2f",$all).'</td></tr>';
    
    ?>
    
    </tbody>
</table>

<?php
    }
    else
        echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
  <strong>تنبية!</strong> لا توجد مديونيات
</div>'; 
?>
