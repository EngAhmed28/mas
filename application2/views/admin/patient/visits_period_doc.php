
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
                    <label class="control-label">الطبيب </label>
                    <select name="doctor" id="doctor" class="form-control" required>
                        <option value="">إختر  </option>
                        <?php  if(!empty($all_doctors)):
                            foreach ($all_doctors as $row):?>
                                <option value="<?php echo $row->id;?>"><?php echo $row->name;?>  </option>
                            <?php endforeach; endif;?>
                    </select>
                </div>
            </div>

        </div>
        <div class="form-group hidden-print"  >
            <div class="col-xs-8 col-xs-pull-4">
                <button type="button"  name="report" class="btn btn-primary" onclick="return lood();">بحث</button>
            </div>
        </div>
        <div class="row" id="optionearea1"></div>


        <br>

    </fieldset>
</div>



<script>
    function lood(){
        var num1=   $('#date_from').val();
        var num2=   $('#date_to').val();
        var doctor=   $('#doctor').val();
        if( num1 != '' && num2 != '' && doctor != ''){
            if (num1 > num2){
                alert('لا يجب أن يكون تاريخ البداية بعد تاريخ النهاية أو مساو له');
                return false;
            }else{
                var dataString = 'form_date=' + num1 + '&to_date=' + num2 + '&doctor=' + doctor;
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url() ?>dashboard/visits_period_doc',
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

