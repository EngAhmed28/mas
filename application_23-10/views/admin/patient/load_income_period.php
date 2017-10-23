<?php if(isset($records)&&$records!=null || isset($records2)&&$records2!=null){

?>



    <table id="no-more-tables" class="table table-bordered" role="table">

        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>لوحة التحكم في الإدارة.</p></caption>

        <thead>

        <tr>

            <th width="2%">#</th>
            
            <th  class="text-right">التاريخ</th>

            <th  class="text-right">إسم العميل</th>
            
            <th class="text-right">المدفوع</th>

        </tr>

        </thead>
        <tbody>
        
        <?php
        
function is_assoc($var)
{
    return is_array($var) && array_diff_key($var,array_keys(array_keys($var)));
}
        
 function merge(array $a1, array $a2)
{
    $result = array();
    for ($i = 0, $total = func_num_args(); $i < $total; $i++)
    {
        // Get the next array
        $arr = func_get_arg($i);
 
        // Is the array associative?
        $assoc = is_assoc($arr);//Arr::is_assoc($arr);
 
        foreach ($arr as $key => $val)
        {
            if (isset($result[$key]))
            {
                if (is_array($val) AND is_array($result[$key]))
                {
                    if (is_assoc($val)/*Arr::is_assoc($val)*/)
                    {
                        // Associative arrays are merged recursively
                        $result[$key] = merge($result[$key], $val);//Arr::merge($result[$key], $val);
                    }
                    else
                    {
                        // Find the values that are not already present
                        $diff = array_diff($val, $result[$key]);
 
                        // Indexed arrays are merged to prevent duplicates
                        $result[$key] = array_merge($result[$key], $diff);
                    }
                }
                else
                {
                    if ($assoc)
                    {
                        // Associative values are replaced
                        $result[$key] = $val;
                    }
                    elseif ( ! in_array($val, $result, TRUE))
                    {
                        // Indexed values are added only if they do not yet exist
                        $result[] = $val;
                    }
                }
            }
            else
            {
                // New values are added
                $result[$key] = $val;
            }
        }
    }
 
    return $result;
}
        if(isset($records)&&$records!=null && isset($records2)&&$records2!=null)
            $result = merge($records,$records2);
        else{
            if(isset($records)&&$records!=null)
                $result =$records;
            if(isset($records2)&&$records2!=null)
                $result =$records2;
        }
        
     
       
        $total = 0;
        for($x = 0 ; $x < count($result) ; $x++){
            $total_day = 0; 
            //$totalTickets = array_sum(array_map("count", $result[key($result)]));
            echo '<tr>
                  <td rowspan="'.count($result[key($result)]).'">'.($x+1).'</td>
                  <td rowspan="'.count($result[key($result)]).'">'.key($result).'</td>';
            for($z = 0 ; $z < count($result[key($result)]) ; $z++){
                $total_person = 0;
                echo '<td>'.key($result[key($result)]).'</td>';
                for($a = 0 ; $a < count($result[key($result)][key($result[key($result)])]) ; $a++){
                    $total_day += $result[key($result)][key($result[key($result)])][$a];
                    $total_person += $result[key($result)][key($result[key($result)])][$a];
                }
                echo '<td>'.sprintf('%.2f',$total_person).'</td></tr>';
                next($result[key($result)]);
            }
            $total += $total_day;
            echo '<tr class="alert alert-success">
                  <td colspan="3">إجمالي اليوم</td>
                  <td>'.sprintf('%.2f',$total_day).'</td>
                  </tr>';
            next($result);
            
        }
        echo '<tr class="alert alert-info">
              <td colspan="3">الإجمالي</td>
              <td>'.sprintf('%.2f',$total).'</td>
              </tr>';

        ?>
        
</tbody>

    </table>

    

<?php 
 }
else
echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>تنبية!</strong> لا توجد إيرادات تمت خلال تلك الفترة
</div>';

?>
