
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
                    <label class="control-label">منذ فترة</label>
                    <input type="date" class="form-control docs-date" name="date_from"  id="date_from" placeholder="شهر/يوم/سنة " required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">إلي فترة</label>
                    <input type="date" class="form-control docs-date" name="date_to"  id="date_to" placeholder="شهر/يوم/سنة " required>
                </div>
            </div>


            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">نوع الأجازة</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="">إختر  </option>
                        <option value="1">أجازة سنوية </option>
                        <option value="2"> أجازة مرضية </option>
                        <option value="3"> أجازة بدون أجر </option>
                        <option value="4"> الكل </option>
                    </select>
                </div>
            </div>

        </div>
        <div class="row" id="optionearea1"></div>

        <div class="form-group"  >
            <div class="col-xs-8 col-xs-pull-4">
                <button type="button"  name="add" class="btn btn-primary" onclick="return lood();">بحث</button>
            </div>
        </div>
        <br>

    </fieldset>
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
                url: '<?php echo base_url() ?>Administrative_affairs/all_vacations_period',
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

