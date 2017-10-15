
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
    </span>
<div class="well bs-component">
    <fieldset>
        <legend></legend>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">الفترة من</label>
                    <input type="date" name="debt_date_from"  id="debt_date_from" class="form-control docs-date" required="required"   placeholder="شهر / يوم / سنة ">
                </div>
            </div>



<div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">الفترة الى</label>
                    <input type="date" name="debt_date_to" id="debt_date_to"  class="form-control " required="required"   placeholder="شهر / يوم / سنة ">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">الحالة</label>
                    <select name="type" id="type"  class="form-control" required="required">
                        <option value="">إختر</option>
                        <option value="3">الكل</option>
                        <option value="1">الموافق</option>
                        <option value="2">المرفوض</option>
                        <option value="0">لم يتم الاجراء</option>
                    </select>
                </div>
            </div>


          <div class="form-group"  >
            <div class="col-xs-8 col-xs-pull-4">
                <button type="button"  name="report" class="btn btn-primary" onclick="return lood();">بحث</button>
            </div>
        </div>   

        </div>
        <div class="row" id="optionearea2"></div>

       
        <br>

    </fieldset>
</div>

<script>
    function lood(){
        var date_t=$("#debt_date_to").val();
        var date_f=$("#debt_date_from").val();
        var type=$("#type").val();
        //    alert(1);
        if(date_f !='' && type != '' && date_t!='')
        {
            //    alert(2);
            var dataString = 'debt_date_to=' + date_t +"&debt_date_from="+date_f+"&type="+type;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Administrative_affairs/EmployeesDebtsReport',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea2").html(html);
                }
            });
            return false;
        }
    }
</script>

