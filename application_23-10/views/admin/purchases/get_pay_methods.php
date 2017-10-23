<?php
$way = array('1'=>'نقدي','2'=>'آجل','3'=>'شيك');

if(isset($_POST['method']) && $_POST['method'] != null){
    if($_POST['method'] == 1){
        echo '<div class="col-md-6">
                <div class="layout">
                    <div class="form-group">
                        <label>طريقة الدفع</label>
                        <select name="pay_method" id="pay_method" onchange="get_pay_method($(\'#pay_method\').val(),'.$_POST['id'].');" class="form-control" required>
                            <option value="">قم بإختيار طريقة الدفع</option>';
        for($x= 1 ; $x <= count($way) ; $x++){
            $select = '';
            if($x == 1)
                $select = 'selected';
            echo '<option value="'.$x.'" '.$select.'>'.$way[$x].'</option>';
        }
        echo '           </select>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="layout">
                    <div class="form-group">
                        <label>إسم الصندوق</label>
                        <select name="box_name" id="box_name" class="form-control" required>
                            <option value="">قم بإختيار إسم الصندوق</option>';
        foreach($box_name as $branch)
            echo '<option value="'.$branch->code.'" '.$select.'>'.$branch->name.'</option>';
        echo '          </select>
                    </div>
                </div>
            </div>';
    }
    
    if($_POST['method'] == 2){
        echo '<div class="col-md-12">
                <div class="layout">
                    <div class="form-group">
                        <label>طريقة الدفع</label>
                        <select name="pay_method" id="pay_method" onchange="get_pay_method($(\'#pay_method\').val(),'.$_POST['id'].');" class="form-control" required>
                            <option value="">قم بإختيار طريقة الدفع</option>';
        for($x= 1 ; $x <= count($way) ; $x++){
            $select = '';
            if($x == 2)
                $select = 'selected';
            echo '<option value="'.$x.'" '.$select.'>'.$way[$x].'</option>';
        }
        echo '           </select>
                    </div>
                </div>
            </div>';
    }
    
    if($_POST['method'] == 3){
        echo '<div class="col-md-3">
                <div class="layout">
                    <div class="form-group">
                        <label>طريقة الدفع</label>
                        <select name="pay_method" id="pay_method" onchange="get_pay_method($(\'#pay_method\').val(),'.$_POST['id'].');" class="form-control" required>
                            <option value="">قم بإختيار طريقة الدفع</option>';
        for($x= 1 ; $x <= count($way) ; $x++){
            $select = '';
            if($x == 3)
                $select = 'selected';
            echo '<option value="'.$x.'" '.$select.'>'.$way[$x].'</option>';
        }
        echo '           </select>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group">
                        <label>إسم البنك</label>
                        <select name="bank_name" id="bank_name" class="form-control" required>
                            <option value="">قم بإختيار إسم البنك</option>';
        foreach($bank_name as $branch)
            echo '<option value="'.$branch->code.'" '.$select.'>'.$branch->name.'</option>';
        echo '          </select>
                    </div>
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="layout">
                    <div class="form-group">
                        <label>رقم الشيك</label>
                        <input type="number" placeholder="رقم الشيك" name="check_num" id="check_num" class="form-control col-xs-6 no-padding" required />
                    </div>
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="layout">
                    <div class="form-group">
                        <label>قيمة الشيك</label>
                        <input type="number" placeholder="قيمة الشيك" name="check_value" id="check_value" class="form-control col-xs-6 no-padding" required />
                    </div>
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="layout">
                    <div class="form-group">
                        <label>تاريخ الإستحقاق</label>
                        <input type="date" name="recive_date" id="recive_date" class="form-control col-xs-6 no-padding" required />
                    </div>
                </div>
            </div>';
    }
}

if(isset($_POST['sanf_id']) && $_POST['sanf_id'] != null){
    echo '<label>الوحدة</label>
          <input type="text" placeholder="الوحدة" value="'.$unit_name[0]->unit_name.'" name="unit_selected" id="unit_selected" class="form-control col-xs-6 no-padding" readonly />
          <input type="hidden" value="'.$unit_name[0]->id.'" name="unit_selected_id" />';
}

if(isset($_POST['store_id']) && $_POST['store_id'] != null){
    echo '<option value="">قم بإختيار الصنف</option>';
    if(isset($asnafs))
        foreach($asnafs as $sanf)
            echo '<option value="'.$sanf->id.'">'.$sanf->p_name.'</option>';
}
?>