
<span id="message hidden-print">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
    </span>
<div class="well bs-component ">
    <fieldset>
        <legend></legend>
        <div class="row hidden-print">
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
                    <label class="control-label">خيارات البحث </label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="">إختر </option>
                        <option value="All">الكل </option>
                        <option value="ATM">ATM </option>
                        <option value="CARD">CARD </option>
                        <option value="CASH">CASH </option>
                    </select>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="form-group">
                    <br />
                    <button type="button"  name="report" class="btn btn-primary" onclick="return lood();">بحث</button>
                </div></div>




        </div>
        <div class="row" id="optionearea1"></div>
        <br>

    </fieldset>
</div>



<script>
    function lood(){
        var num1=   $('#date_from').val();
        var num2=   $('#date_to').val();
        var type=   $('#type').val();
        if( num1 != '' && num2 != '' && type != ''){
            if (num1 > num2){
                alert('لا يجب أن يكون تاريخ البداية بعد تاريخ النهاية أو مساو له');
                return false;
            }else{
                var dataString = 'form_date=' + num1 + '&to_date=' + num2 + '&type=' + type;
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url() ?>dashboard/payment_types_period',
                    data: dataString,
                    dataType: 'html',
                    cache: false,
                    success: function (html) {
                        $("#optionearea1").html(html);
                    }
                });
                return false;
            }
        }
    }
</script>

