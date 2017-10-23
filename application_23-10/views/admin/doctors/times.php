
<h3 class="text-center"> مواعيد الطبيب :</h3>
<?php
 $days=array('السبت','الأحد','الأثنين','الثلاثاء','الأربعاء ','الخميس');

 ?>
        <div class="form-group" >
          
          <?php 
          
         
          for($x=0;$x<count($days);$x++){
            
          ?>
            <label for="inputUser" class="col-lg-2 control-label"> <?php echo $days[$x]?> :</label>
            <div class="col-lg-4 input-grup">
                <i class="glyphicon glyphicon-time"></i>
                <input type="text" id="<?php echo $x?>"  name="days<?php echo $x?>" class="form-control text-right" placeholder="<?php echo $days[$x]?>" >
            </div>
        
            
            <?php
            }
            ?>
        </div>
        
      
