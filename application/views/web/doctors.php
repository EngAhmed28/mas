

    <!-------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------->
    <div class="doctor" style="min-height: 420px;">
        <div class="container">
            <div class="row sear">
                <div class="col-md-3">
               <img src="<?php echo base_url().'asisst/web_asset/img/'?>doctor_PNG16007.png" alt="">
                </div>
           
                <div class="col-md-9 text-center ">

                    <h1> ابحث عن طبيبك</h1>
                    <select  id="doctor_id" name="doctor_id" required > 
                    <option value="">إختر طبيبك </option>
                    <?php foreach($all as $doc):?>
                        <option value="<?php echo $doc->id?>" ><?php echo $doc->name?></option>
                    <?php endforeach?>
                    
                     
                    </select>

                    <div class="row soo">
                        <button class="btn btn-default"  onclick="return ss($('#doctor_id').val());" type="submit">إبحث</button>
                    </div>

                </div>
            
            </div>
            <div class="row  text-center fff" id="optionearea3">

              
      

            </div>

        </div>
    </div>

    <!-------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------->
<script>
 function ss(id){
    if(id){
    var dataString = 'id='+ id ;
        $.ajax({
          
            type:'post',
            url: '<?php echo base_url() ?>/web/doctors',
          data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
             $("#optionearea3").html(html);
            } 
        });
    }
    
        
      
 }
</script>
