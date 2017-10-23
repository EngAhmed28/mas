<?php
  if(isset($records) && $records != null){ 
  /*  echo '<pre>';
    var_dump($records);die;*/
    ?>
    
    <table  class="table table-bordered" role="table">

        <thead>

        <tr>

            <th class="text-right">تاريخ الفاتورة  </th>
             <th class="text-right">رقم الفاتورة</th>
             
                <th class="text-right">إجمالي الفاتورة</th>
              <th class="text-right"> المدفوع  </th>
            <th  class="text-right">الباقي</th>

        </tr>

        </thead>
       </table>
    
       <div class="panel-group" style="margin-bottom: 3px;" id="accordion">
        <?php $x = 0;
              $dis = 0; 
              $start = 0;
              $end = 0;  
        
         for($z = 0 ; $z < count($records) ; $z++){ 
            $x++; 
        ?>
        <div class="panel panel-default ">
                    <div class="panel-heading btn-bnfsg" data-toggle="collapse" data-parent="#accordion" href="#<?php echo key($records) ?>">
                        <a> 
                        
                        <?php echo '<div class="col-xs-2"></div>
                                    <div class="col-xs-2">'.key($records).'</div>
                                   ';  
                                   /*
                                    <!--div class="col-xs-2 text-center">'.sprintf('%.2f',$record->total) .'</div>
                                    <div class="col-xs-2 text-left">'.sprintf('%.2f',$record->paid) .'</div>
                                    <div class="col-xs-2 text-center">'.sprintf('%.2f',$record->remain) .'</div-->
                                   */
                        
                        ?> 
                        
                        </a>
                        <br />
                        
                    </div>
                    
                    <div id="<?php echo key($records) ?>" class="panel-collapse collapse">
                    <br />
                    
                    <form name="form<?php echo $x ?>" method="post" action="edit_fatora/<?php echo $x ?>">
                    
                    <?php
                   
                    echo '<div class="col-xs-12 alert alert-warning">
                                  <div class="col-xs-2"><label class="control-label">تفاصيل الفاتورة رقم:</label></div>
                                  <div class="col-xs-8 text-right"><label class="control-label">'.key($records).'</label></div>
                              </div>
                    <div class="col-xs-12">
                                  <div class="col-xs-2"><label class="control-label">التاريخ</label></div>
                                  <div class="col-xs-3"><label class="control-label">العملية</label></div>
                                  <div class="col-xs-2"><label class="control-label">المبلغ</label></div>
                                  <div class="col-xs-2"><label class="control-label">بعد الخصم</label></div>
                                  <div class="col-xs-1"><label class="control-label">المدفوع</label></div>
                                  <div class="col-xs-2 text-center"><label class="control-label">الباقي</label></div>
                              </div>';
                     for($s = 0 ; $s < count($records[key($records)]) ; $s++){
                          echo '<div class="col-xs-12">
                                  <div class="col-xs-2">'.$records[key($records)][$s]->operation_date.'</div>
                                  <div class="col-xs-3">'.$records[key($records)][$s]->operation_id.'</div>
                                  <div class="col-xs-2">'.$records[key($records)][$s]->operation_price.'</div>
                                  <div class="col-xs-2">'.$records[key($records)][$s]->discount.'</div>
                                  <div class="col-xs-1">'.$records[key($records)][$s]->paid.'</div>
                                  <div class="col-xs-2 text-center">'.$records[key($records)][$s]->operation_date.'</div>
                              </div>';
                          }
                    ?>
                 
                    </form>
                    </div>
                    
                    </div>

        <?php
        
        next($records); 
        }
        ?>
    
    </div>
    
<?php
}else{
echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>تنبية!</strong> لا توجد فواتير للمريض
</div>';
 }?> 
 
 <style>
.panel-heading { cursor: pointer; cursor: hand; }

</style>   