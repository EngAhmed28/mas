
        <div class="col-sm-11 col-xs-12">
          
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <div class="col-xs-12">





                        <div class="panel-body">
                            <div class="fade in active">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th class="text-center">م</th>
                                        <th class="text-center">اسم الموظف </th>
                                      
                                        
                                        <th class="text-center">الراتب الأساسي</th>
                                           <th class="text-center"> بدل نقل  </th>
                                              <th class="text-center">بدل منصب اشرافي </th>
                                           <th class="text-center">بدل طبيعة عمل   </th>
                                      <th class="text-center">بدل اتصالات  </th>
                                        <th class="text-center">خصم تأمينات  </th>  
                                           <th class="text-center">إجمالي الراتب  </th>
                                           <th class="text-center">مكافأة  </th>
                                            <th class="text-center">خصم  </th>    
                                        
                                        <th class="text-center">صافي الراتب  </th>   

                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php
                                    $a=1;

                              
                              

                                    foreach ($datas as $record ):
                                    
                                //   echo $record['employee'];
                                
  $query = $this->db->query("SELECT * FROM mon_rewards WHERE emp_id =" .$record['emp_code']);                              
    $rewards = 0;                            
  foreach ($query->result() as $row)
{
        $rewards+=  $row->value;
}  


  $query_kasm = $this->db->query("SELECT * FROM penalty WHERE emp_id =" .$record['emp_code'] .' and  penalty_type = 1');                              
    $kasm = 0;                            
  foreach ($query_kasm->result() as $row)
{
        $kasm+=  $row->value;
}                              
    


$total_salary = $record['salary'] + $record['b_naql'] + $record['b_eshraf'] + $record['b_amal'] + $record['b_etislat'] - $record['k_tamen'];

$safi_salary = $total_salary + $rewards - $kasm;
  ?>
       
       
       
       
       
                                    
                                    
<tr>
<td><?php echo $a ?></td>
<td><? echo $record['employee'];?></td>

<td><? echo $record['salary'];?></td>
<td><? echo $record['b_naql'];?></td>
<td><? echo $record['b_eshraf'];?></td>
<td><? echo $record['b_amal'];?></td>
<td><? echo $record['b_etislat'];?></td>
<td><? echo ( $record['k_tamen'] ) ?></td>

<td><? echo $total_salary; ?></td>

<td><?php echo $rewards; ?></td>
<td><?php echo $kasm; ?></td>

<td><?php echo $safi_salary; ?></td>




</tr>
                                        <?php
                                        $a++;
                                    endforeach;  ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>









         <!--               <div class="panel-body">
                            <div class="fade in active">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th class="text-center">م</th>
                                        <th class="text-center">اسم الموظف </th>
                                        <th class="text-center">الراتب </th>
                                           <th class="text-center"> التامين  </th>
                                              <th class="text-center">العلاوة </th>
                                           <th class="text-center">خصومات  </th>
                                      <th class="text-center">الصافي  </th>
                                        

                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php
                                    $a=1;

                                    echo '<pre/>';
                                    print_r($datas);
                                     echo '<pre/>';
                                 
                                    foreach ($salaries as $record ):?>
                                        <tr>
                                <td><?php echo $a ?></td>
                                <td><? echo $record->name;?></td>
                                <td><? echo $record->salary;?></td>
                                <td><? echo $record->tamen;?></td>
                                <td><? echo $record->elawa;?></td>
                                <td><? echo $record->kasem;?></td>
                                <td><? echo (  $record->salary + $record->elawa  ) - ( $record->kasem  + $record->tamen   ) ?></td>


                                        </tr>
                                        <?php
                                        $a++;
                                    endforeach;  ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

-->





                    </div>
                </div>

            </div>
        </div>

