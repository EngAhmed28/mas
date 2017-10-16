<?php


?>

    <div class="form-group">
                            <label for="exampleInputEmail1"> اسم الطبيب </label>
                            <select class="r-hospital" id="doctor_id" name="doctor_id"  required="required" onchange="return vv($('#doctor_id').val());">
                             <option value="">إختر الطبيب</option>
                                <?php foreach($all as $doctor):?>
                                <option value="<?php echo $doctor->id ?>"><?php echo $doctor->name ?></option>
                              
                                <?php endforeach;?>
                            </select>
                        </div>
                   
                   
                       <script>
                   
 function vv(id){
   var ss = 'dd='+ id  ;
if(id){
        $.ajax({
          
            type:'post',
            url: '<?php echo base_url() ?>/web/Apport',
            dataType: 'html',
            data:ss,
            cache:false,
            success: function(html){
             $("#optionearea4").html(html);
            } 
        });
    
    }else{
        $("#optionearea4").html('');
    }
        
      
 }
</script> 