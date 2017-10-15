
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
        <?php  echo form_open_multipart('Administrative_affairs/emp_attendance')?>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">البحث عن موظف </label>
                            <select name="emp_id" id="emp_id"  class="selectpicker no-padding form-control" required  data-show-subtext="true" data-live-search="true" >
                                <option value="">إختر</option>
                                <?php
                                if(isset($emps) && $emps != null)
                                    for($x = 0 ; $x < count($emps) ; $x++)
                                        echo '<option value="'.$emps[$x]->id.'">'.$emps[$x]->employee.'</option>';
                                ?>
                            </select>

                    </div>
                </div>
                <div class="col-md-3" style="margin-top: 25px">
                    <div class="form-group"  >
                        <div class="col-xs-8 col-xs-pull-4" >
                            <button name="save" value="add" type="submit" class="btn btn-primary">إثبات حضور</button>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <?php echo form_close()?>



    </fieldset>
</div>


<?php


if(isset($table) && $table !=null  ):?>
    <table id="no-more-tables" class="table table-bordered" role="table">
        <thead>
        <tr>
            <th class="text-center">م</th>
            <th class="text-center">إسم الموظف</th>
            <th class="text-center">التاريخ</th>
            <th class="text-center">الحضور الفعلي</th>
            <th class="text-center">الإنصراف الفعلي</th>
            <th class="text-center">عدد ساعات الحضور</th>
        </tr>
        </thead>
        <tbody class="text-center">


        <?php
        for($x = 0 ; $x < count($table) ; $x++){
            if($table[$x]->dissuasion == '')
                $dissuasion = '<a href="'.base_url().'/Administrative_affairs/dissuasion/'.$table[$x]->id.'"><button class="btn btn-sm btn btn-danger">إثبات إنصراف</button></a>';
            else
                $dissuasion = $table[$x]->dissuasion;

                                    echo '<tr>
                                            <td>'.($x+1).'</td>
                                            <td>'.$table[$x]->employee.'</td>
                                            <td>'.date("Y-m-d",$table[$x]->date).'</td>
                                            <td>'.$table[$x]->presence.'</td>
                                            <td>'.$dissuasion.'</td>
                                            <td>'.$table[$x]->diff.'</td>
                                          </tr>';
                                          }
                                              ?>
                                        </tbody>
                                    </table>
                                <?php endif;?>


