<?php

if($_POST['name']) {
  if(isset($query)&&$query!=null) {
        echo '<table id="sample_1" class="table table-bordered table-hover table-striped" cellspacing="0"  width="99%" style="margin-right: 6px; direction:rtl;">
           <thead> 
            <tr>
             <th class="text-center">م</th>
             <th class="text-center">الإسم </th>
             <th class="text-center">رقم الملف  </th>
               <th class="text-center">رقم الهوية  </th>
              <th class="text-center">رقم الجوال  </th>  

            </tr>
           </thead>
           <tbody>';
        $total = 0;
        $count = 0;
        
        foreach($query as $row){
                $count++;
        
             echo '<tr>
            <td>'.$count.'</td>
            <td>'.$row->a_name.'</td>
            <td>'.$row->code.'</td>
            <td>'.$row->id_card.'</td>
                <td>'.$row->mobile.'</td>
            </tr>'; 
        }
        
    /*  for($a=0;$a<sizeof($query);$a++) {
            $count++;
        
            echo '<tr>
            <td>'.$count.'</td>
            <td>'.$query[$a]->a_name.'</td>
            <td>'.$query[$a]->code.'</td>
            <td>'.$query[$a]->id_card.'</td>
                <td>'.$query[$a]->mobile.'</td>
            </tr>';

       }*/

    }else{
        echo '<div class="alert alert-danger">لا يوجد بيانات خاصة بهذا الإسم </div>';


    }


    echo ' </tbody>
      </table>';




}
?>