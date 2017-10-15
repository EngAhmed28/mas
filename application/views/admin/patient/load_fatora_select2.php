<?php if(isset($records2)&&$records2!=null){

?>



    <table id="no-more-tables" class="table table-bordered" role="table">

        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>الأقساط المسددة.</p></caption>

        <thead>

        <tr>

            <th width="2%">#</th>
            
            <th  class="text-right">التاريخ</th>

            <th  class="text-right">اللإجمالي</th>
            
            <th class="text-right">المدفوع</th>
            
            <th class="text-right">المتبقي</th>
            
            <th class="text-right">التحكم</th>

        </tr>

        </thead>
        <tbody>
        
        <?php
        
        $total = 0;
        $paid = 0;
        $remain = 0;
        $last_date = ""; // target="_blank"
        
        for($x = 0 ; $x < count($records2) ; $x++){
            if($x < (count($records2)-1) || $x == 0)
                $control = '';
            elseif($x == (count($records2)-1))
                $control = '<a  href="'.base_url().'dashboard/delete_payment/'.$records2[$x]->id.'" onclick="return confirm(\'هل انت متأكد من عملية الحذف ؟\');" class="btn btn-danger btn-xs col-lg-5"><i class="fa fa-trash"></i> حذف</a>';
            echo '<tr>
                  <td>'.($x+1).'</td>
                  <td>'.$records2[$x]->out_date.'</td>
                  <td>'.sprintf('%.2f',$records2[$x]->total).'</td>
                  <td>'.sprintf('%.2f',$records2[$x]->paid).'</td>
                  <td>'.sprintf('%.2f',$records2[$x]->remain).'</td>
                  <td>
                  <a href="'.base_url().'dashboard/print_sanad_sarf/'.$records2[$x]->id.'" class="btn btn-warning btn-xs col-lg-5"><i class="fa fa-print"></i> طباعة سند أمر</a>
                  '.$control.'
                  </td>
                  </tr>';
            $total = $records2[0]->total;
            $paid += $records2[$x]->paid;
            $remain = $records2[(count($records2)-1)]->remain;
            $last_date = $records2[(count($records2)-1)]->out_date;  
        }
        if($remain != 0)
            $class = "alert-danger";
        else
            $class = "alert-success";
        echo '<tr class="'.$class.'">
              <td colspan="2">الإجمالي</td>
              <td>'.sprintf('%.2f',$total).'</td>
              <td>'.sprintf('%.2f',$paid).'</td>
              <td colspan="2">'.sprintf('%.2f',$remain).'</td>
              </tr>';
        
        ?>
        
</tbody>

    </table>
    
    <?php if($remain != 0){ ?>
    
<div class="col-xs-2 text-left">
        
            <label for="inputPassword" class="control-label" >المبلغ المدفوع</label>
        
        </div>
           
        <div class="col-xs-4">
                <input type="hidden" name="last_date" id="last_date" value="<?php echo $last_date ?>" />
                <input type="hidden" name="remain" id="remain" value="<?php echo $remain ?>" />
            <input class="form-control" name="paid" id="payment" onkeyup="return paidd($('#payment').val());" onkeypress="return isNumberKey(event)" />
        </div>
        
        <div class="col-xs-6 text-center">
                <input type="submit" onclick="if($('#last_date').val()> $('#out_date').val()){alert('لا يمكن السداد بتاريخ يسبق آخر تاريخ تم الدفع فيه');return false;}" name="add" value="حفظ" class="btn btn-primary" >
        </div>
    

<?php 
 }
}
?>
