
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
                    <label class="control-label">إسم الموظف</label>
                    <select name="emp" id="emp" class="form-control" required>
                        <option value="">إختر  </option>
                        <?php  if(!empty($emp)):
                            foreach ($emp as $row):?>
                                <option value="<?php echo $row->id;?>"><?php echo $row->employee;?>  </option>
                            <?php endforeach; endif;?>
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
        var emp=   $('#emp').val();
        if( num1 != '' && num2 != '' && emp != ''){
            var dataString = 'form_date=' + num1 + '&to_date=' + num2 + '&emp=' + emp;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Administrative_affairs/all_vacations_emp',
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

