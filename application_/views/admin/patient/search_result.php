
<?php if(isset($records)&&$records!=null):
/*echo '<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
  <strong>تنبية!</strong> النتائج المطابقة لهذا البحث
</div>';*/

?>
<div class="modal fade in" id="myModal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!--button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button-->
                 <h4 class="modal-title">
                 
                     <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                          <strong>تنبية!</strong> النتائج المطابقة لهذا البحث
                     </div>
                 
                 </h4>

            </div>
            <div class="modal-body">
            
            
    <table  class="table table-bordered" role="table">

        <thead>

        <tr>

            <th width="2%">#</th>

            <th  class="text-right">إسم المريض</th>

            <th class="text-right">السجل المدني</th>

            <th width="20%" class="text-right">تاريخ الميلاد</th>
            
            <th width="20%" class="text-right">الجوال</th>
            
            <th width="15%" class="text-right">العنوان</th>

        </tr>

        </thead>
        <tbody>
        <?php $x = 0; ?>
        <?php foreach($records as $record): 
            $x++; 
        ?>
        
            <tr onclick="document.location = '<?php echo base_url().'dashboard/update_patient/'.$record->id?>';">
                
                
                <td ><span class="badge"><?php echo $x?></span></td>
                <td ><?php echo $record->a_name?> </td>
                <td ><?php echo $record->id_card?></td>
                <td ><?php echo $record->birth_date?></td>
                <td ><?php echo $record->mobile?></td>
                <td ><?php echo $record->address?></td>

                
            </tr>
           

        <?php endforeach ;?>

        </tbody>

    </table>



</div>
            <!--div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div-->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

    <br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br>
    <?php else :?>
    
        <?php echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>تنبية!</strong> لاتوجد نتائج مطابقة لهذا البحث
</div>'?>

<?php endif; ?>

<style>
td { cursor: pointer; cursor: hand; }

</style>

<script>
$('#myModal').modal('show');
//$('#myModal').modal({backdrop: 'static', keyboard: false});
</script>