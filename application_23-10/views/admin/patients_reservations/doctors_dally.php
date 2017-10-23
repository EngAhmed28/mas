<h2 class="text-flat"><span class="text-sm"> </span></h2>
 <ul class="breadcrumb pb30">
    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> إدارة الحجوزات </a></li>
    <li class="active"><?php echo $title; ?></li>
</ul>   


</span>
<div class="well bs-component">
<fieldset>
<?php
	if(isset($records) && $records!=null):
?>



  <table id="no-more-tables" class="table table-bordered" role="table">
    <?php $count=1; foreach($records as $row_main):?>    
    <thead>
      <tr>
       <th colspan="3" class="text-center">إسم الطبيب</th> 
       <th colspan="3" class="text-center"><?php //echo $row_main->sub[0]->d_name;
       //echo $row_main->doctor_id;

        $query = $this->db->query('SELECT name FROM doctor WHERE id = '. $row_main->doctor_id);
foreach ($query->result() as $doc)
{
   echo $doc->name;
  }
        ?></th> 
       </tr>
        </thead>
        <tr  style=" background: #20b49c;color: white;">
            <th width="2%">#</th>
            <th width="" class="text-right">إسم المريض</th>
               <th width="" class="text-right">رقم الهاتف</th>
            <th width="" class="text-right">رقم الهوية</th>
            <th width="" class="text-right">الوقت</th>
        </tr>
        
        <tbody>
        <?php 
        if(!empty($row_main->sub)){
        $count=1; foreach($row_main->sub as $row):?>
    <tr>
    <td><?php echo $count++; ?></td>
    <td><?php echo $row->patient_name ?></td>
      <td><?php echo $row->tele ?></td>
    <td><?php echo $row->patient_national_id?></td>
    <td><?php echo date( "h:i A", $row->reservations_time) //echo $row->reservations_time ?></td>
    </tr>
    
<?php endforeach; } ?>
    </tbody>
  <?php endforeach;?>  
</table>

<?php
	endif;
?>













</fieldset>
</div>
