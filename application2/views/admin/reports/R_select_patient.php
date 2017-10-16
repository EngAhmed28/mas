

<style>
.btn-mobileSelect-gen {
display:none!important;
}
#doctor_id {
display:block!important;
}
#depart_id{
    display:block!important;
}

.btn-default {
    color: white;
    background-color: #128f76 !important;
}
.filter-option {
     color: white !important;
}
</style>



<ul class="breadcrumb pb30 hidden-print">
    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>
    <li class="active"><?php echo $title; ?></li>
</ul>

<?php echo form_open_multipart('dashboard/R_select_patient',array('class'=>"form-horizontal",'role'=>"form" ))?>

<fieldset>
<div class="well bs-component"  style="padding-bottom: 500px;" >
          

    <div class="row">
    <div class="col-lg-6">
            <div class="form-group" >
                <label for="inputUser"  class="control-label">قم بإخنيار المريض:</label>
                
                            <select name="account_code" id="account_code"  class="selectpicker form-control" onchange="return account($('#account_code').val());" data-live-search="true" style="width:100%;" >
                                <option style="color: white !important;" value="">قم بإختيار المريض</option>
                          <?php 
                          foreach($query_admin as $row1){

                              if( sizeof($query_dep) >0){
                                  echo'<option data-tokens="ketchup mustard"  value="'.$row1->id.'"  disabled>'.$row1->a_name.'</option>';
                              }else{
                                 echo'<option data-tokens="ketchup mustard"  value="'.$row1->id.'"  >'.$row1->a_name.'</option>';
                              }
                              //=
                          foreach($query_dep[$row1->id] as $row2){

                              if( sizeof($query_dep[$row2->id]) >0){
                                  echo'<option data-tokens="ketchup mustard"  value="'.$row2->id.'"  disabled>'.$row2->a_name.'</option>';
                              }else{
                                  echo'<option data-tokens="ketchup mustard"  value="'.$row2->id.'"  >'.$row2->a_name.'</option>';
                              }
                              //==
                              foreach($query_dep[$row2->id] as $row3){
                                  if(sizeof($query_dep[$row3->id]) >0){
                                      echo'<option data-tokens="ketchup mustard"  value="'.$row3->id.'"  disabled>'.$row3->a_name.'</option>';
                                  }else{
                                      echo'<option data-tokens="ketchup mustard"  value="'.$row3->id.'"  >'.$row3->a_name.'</option>';
                                  }
                                 //===
                                  foreach($query_dep[$row3->id] as $row4){
                                      if(sizeof($query_dep[$row4->id]) >0){
                                          echo'<option data-tokens="ketchup mustard"  value="'.$row4->id.'"  disabled>'.$row4->a_name.'</option>';
                                      }else{
                                          echo'<option data-tokens="ketchup mustard"  value="'.$row4->id.'"  >'.$row4->a_name.'</option>';
                                      }
                                     //====
                                      foreach ($query_dep[$row4->id] as $row5){
                                          if(sizeof($query_dep[$row5->id]) >0){
                                              echo'<option data-tokens="ketchup mustard"  value="'.$row5->id.'"  disabled>'.$row5->a_name.'</option>';
                                          }else{
                                              echo'<option data-tokens="ketchup mustard"  value="'.$row5->id.'"  >'.$row5->a_name.'</option>';
                                          }
                                          //=====
                                      }//row5
                                  }//$row4
                           }//$row3
                          }//$row2
                          }//$row1
                          ?>
                            </select>
                </div>
            </div>


            </div>
            <div id="optionearea2"></div>
            </div>
            
            </fieldset>
            
            <?php echo form_close()?>

<script>
    function account(account_code)
    {
        if(account_code)
        {
            var dataString = 'account_code=' + account_code;

            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/dashboard/R_select_patient',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#optionearea2').html(html);
                }
            });
            return false;
        }
        else
        {
            $('#optionearea2').html('');
            return false;
        }

    }
</script>