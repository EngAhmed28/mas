<div class="well bs-component"> 
    <div class="details-resorce">
        <div class="row">
            <div class="col-md-4">
                <div class="layout">
                    <div class="form-group ">
                        <label>إختر الحركة</label>
                        <select name="type" id="type" class="form-control" required>
                            <option value="">--قم بإختيار الحركة--</option>
                            <option value="1">المشتريات</option>
                            <option value="2">الصرف</option>
                            <option value="3">التشغيل</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="layout">
                    <div class="form-group ">
                        <label>التاريخ من</label>
                        <input type="date" class="form-control" name="date_from" id="date_from" required>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="layout">
                    <div class="form-group ">
                        <label>التاريخ إلى</label>
                        <input type="date" class="form-control" name="date_to" id="date_to" required>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="layout">
                    <div class="form-group" id="sanf">
                        <input type="submit" role="button" name="add" value=" بحث " onclick="return lood();" class="btn btn-primary col-lg-12" />
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="layout">
                    <div class="form-group" id="optionearea1">
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function lood(){
        var num1=   $('#date_from').val();
        var num2=   $('#date_to').val();
        var type=   $('#type').val();
          if( num1 != '' && num2 != '' && type != ''){
              var dataString = 'form_date=' + num1 + '&to_date=' + num2 + '&type=' + type;
              $.ajax({
                  type:'post',
                  url: '<?php echo base_url() ?>Reports/index',
                  data:dataString,
                  dataType: 'html',
                  cache:false,
                  success: function(html){
                      $("#optionearea1").html(html);
                  }
              });
              return false;
          }
    }
</script>