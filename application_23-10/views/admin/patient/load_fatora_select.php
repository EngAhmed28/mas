<div class="col-xs-2 text-right">
        
            <label for="inputPassword" class="control-label" >رقم الفاتورة</label>
        
        </div>
        
            <div class="col-xs-4">
            
                <select name="fatora_num" id="fatora_num" class="form-control" data-style="btn-primary" onchange="get_code2($('#fatora_num').val())">
                        
                        <option value="">--قم بإختيار الفاتورة--</option>
                <?php
            
            if(isset($records) && $records != null)
                foreach($records as $record)
                    echo '<option style="text-align: right" value="'.$record->fatora_num.'">'.$record->fatora_num.'</option>';
            
            ?>
                    
                </select>
            
            </div>
            
<div class="col-xs-12" id="optionearea2" style="margin-top: 20px;">
        
        </div>
