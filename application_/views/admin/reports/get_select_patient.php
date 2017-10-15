<?php 
/*
echo '<pre>';
print_r($records);
echo '</pre>';*/
?>

<?php
  if(isset($records) && $records != null){    
    ?>
    
    
     <table id="no-more-tables" class="table table-bordered" role="table" style="width: 100%;">
        <thead >
              
            <th width="%">#</th>
            <th class="text-center">تاريخ اليوم  </th>
             <th class="text-center">رقم الفاتورة</th>
              <th class="text-center">نوع الدفع</th>
             
                <th class="text-center">إجمالي الفاتورة</th>
              <th class="text-center"> المدفوع  </th>
            <th  class="text-center">الباقي</th>
            
           

        </tr>

        </thead>
        <tbody>
       
       <?php
       $x=0;
          foreach($records as $record):
          $x++;
          ?>
        

         
           <tr>
           <td><?php echo $x; ?></td>
          <td><?php  echo date("Y-m-d",$record->date);  ?></td>
          <td><?php echo $record->fatora_num; ?></td>
            <td><?php 
            /** cash - atm  card **/
            
            if($record->cash == 0){
              $paid_method1 = '';  
            }else{
               $paid_method1 = 'كاش';      
            }
           if($record->card == 0){
                $paid_method2 = '';       
            }else{
               $paid_method2 = 'كارت';       
            }
            if($record->atm == 0){
                $paid_method3 = '';      
                
            }else{
               $paid_method3 = '  كارت (ATM)';       
            }
          
            echo $paid_method1 .'-' . $paid_method2 . '-'. $paid_method3;
            
            
             ?></td>
          
          <td><?php echo $record->total; ?></td>
          <td><?php echo $record->paid; ?></td>
          <td><?php echo $record->remain; ?></td>
          
          
  
          </tr>
          <?php
          endforeach;
       
       ?>
        </tbody>
    </table>   
    
    
    
      
    
    
    
<?php
}else{
echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>تنبية!</strong> لا يوجد 
</div>';
 }?>    