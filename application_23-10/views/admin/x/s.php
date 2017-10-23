<?php 



if($_POST['id'] == 3 && $_POST['num'] == ''){
    echo '
    
             <label for="select" class="col-lg-2 control-label"> إختر الطبيب </label>
             
           ';
       echo '   
       
        <div class="col-lg-4">

                <select id="doctor_id" name="doctor_id" class="form-control"> 
                <option value=""> إختر الطبيب</option>';
for($d=0;$d<count($doc);$d++){
    echo '

                    <option value="'.$doc[$d]->id.'">'.$doc[$d]->name.'</option>

                

                ';
}
echo'     </select>
</div>';

echo'



            <label for="select" class="col-lg-2 control-label">القسم</label>


            <div class="col-lg-4">


                <select id="dep_id" name="dep_id" class="form-control" required>

                <option value="">--قم بإختيار القسم--</option>';

            foreach($departs as $record2):

            

                echo '<option value="'.$record2->id.'">'.$record2->dep_name.'</option>';

                        

            endforeach;

      echo '  </select>



            </div><br />

            ';
}else{
    
}

?>