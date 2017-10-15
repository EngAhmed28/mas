<?php
if($all_data){
    $all="";
  for($x=0;$x<count($all_data);$x++){
    
    $data =$all_data[$x]->time;
    $all .=$data.'<br/>';

  }
echo($all);

}else{
       echo '<div class="alert alert-danger" >
              لا يوجد مواعيد متاحة لهذا الطبيب
              </div>';
}
?>