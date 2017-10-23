<div class="well bs-component"> 
<?php
if(isset($result)){
    $id = $result['fatora_code'];
    $dis='disabled';
    $read = 'readonly';
}
 else{
    $id = 0;
    $dis='';
    $read = '';
 }
    
$code = $this->db->query('SELECT COUNT(*) AS num FROM purchases_fatora');
$code = $code->result();
$way = array('1'=>'نقدي','2'=>'آجل','3'=>'شيك');

unset($_SESSION['sanf_addition'.$_SESSION["user_id"]]);

echo form_open_multipart('Purchases/add_purchases/'.$id.'',array('id' =>'myform'));
?>
    <div class="details-resorce">
        <div class="row">
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group ">
                        <label>كود الفاتورة</label>
                        <input type="text" placeholder="كود الفاتورة" name="fatora_code" value="<?php if(isset($result)) echo $result['fatora_code']; else echo ($code[0]->num+1); ?>" class="form-control col-xs-6 no-padding" readonly />
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group">
                        <label>تاريخ الفاتورة</label>
                        <input type="date" value="<?php if(isset($result)) echo date("Y-m-d",$result['fatora_date'])?>"name="fatora_date" id="fatora_date" class="form-control col-xs-6 no-padding" <?php  echo $dis ?> required />
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group">
                        <label>إسم المورد</label>
                        <select name="supp_code" id="supp_code" class="selectpicker form-control" <?php echo $dis ?> data-live-search="true" required>
                            <option value="">قم بإختيار إسم المورد</option>
                            <?php
                            foreach($suppliers as $supply){
                                $select = '';
                                if(isset($result))
                                    if($supply->code == $result['supplier_code'])
                                        $select = 'selected';
                                echo '<option value="'.$supply->code.'" '.$select.'>'.$supply->name.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group">
                        <label>رقم المرجع</label>
                        <input type="number" placeholder="رقم المرجع" name="marge3_num" id="marge3_num" value="<?php if(isset($result)) echo $details[0]->marge3_num ?>" class="form-control required col-xs-6 no-padding" <?php echo $read ?> required />
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row" id="basic">
            <?php 
            if(isset($result)){
                if($result['paid_type'] == 1){
                    echo '<div class="col-md-6">
                            <div class="layout">
                                <div class="form-group">
                                    <label>طريقة الدفع</label>
                                    <select name="pay_method" id="pay_method" onchange="get_pay_method($(\'#pay_method\').val(),'.$id.');" class="form-control required" '.$dis.' required>
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
                                    <select name="box_name" id="box_name" class="form-control required" '.$dis.' required>
                                        <option value="">قم بإختيار إسم الصندوق</option>';
                    foreach($box_name as $branch){
                        $select = '';
                        if($branch->code == $result['dayen'])
                            $select = 'selected';
                        echo '<option value="'.$branch->code.'" '.$select.'>'.$branch->name.'</option>';
                    }
                    echo '          </select>
                                </div>
                            </div>
                        </div>';
                }
                
                if($result['paid_type'] == 2){
                    echo '<div class="col-md-12">
                            <div class="layout">
                                <div class="form-group">
                                    <label>طريقة الدفع</label>
                                    <select name="pay_method" id="pay_method" onchange="get_pay_method($(\'#pay_method\').val(),'.$id.');" class="form-control required" '.$dis.' required>
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
                
                if($result['paid_type'] == 3){
                    echo '<div class="col-md-3">
                            <div class="layout">
                                <div class="form-group">
                                    <label>طريقة الدفع</label>
                                    <select name="pay_method" id="pay_method" onchange="get_pay_method($(\'#pay_method\').val(),'.$id.');" class="required form-control" '.$dis.' required>
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
                                    <select name="bank_name" id="bank_name" class="required form-control" '.$dis.' required>
                                        <option value="">قم بإختيار إسم البنك</option>';
                    foreach($bank_name as $branch){
                        $select = '';
                        if($branch->code == $result['dayen'])
                            $select = 'selected';
                        echo '<option value="'.$branch->code.'" '.$select.'>'.$branch->name.'</option>';
                    }
                    echo '          </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                            <div class="layout">
                                <div class="form-group">
                                    <label>رقم الشيك</label>
                                    <input type="number" value="'.$result['sheek_num'].'" placeholder="رقم الشيك" name="check_num" id="check_num" class="required form-control col-xs-6 no-padding" '.$read.' required />
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                            <div class="layout">
                                <div class="form-group">
                                    <label>قيمة الشيك</label>
                                    <input type="number" value="'.$result['sheek_value'].'" placeholder="قيمة الشيك" name="check_value" id="check_value" class="required form-control col-xs-6 no-padding" '.$read.' required />
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                            <div class="layout">
                                <div class="form-group">
                                    <label>تاريخ الإستحقاق</label>
                                    <input type="date" name="recive_date" value="'.date("Y-m-d",$result['recived_date']).'" id="recive_date" class="required form-control col-xs-6 no-padding" '.$dis.' required />
                                </div>
                            </div>
                        </div>';
                } 
            }
            else{ ?>
            <div class="col-md-12">
                <div class="layout">
                    <div class="form-group">
                        <label>طريقة الدفع</label>
                        <select name="pay_method" id="pay_method" onchange="get_pay_method($('#pay_method').val(),<?php echo $id ?>);" class="required form-control" <?php echo $dis ?> required>
                            <option value="">قم بإختيار طريقة الدفع</option>
                            <?php
                            for($x= 1 ; $x <= count($way) ; $x++){
                                $select = '';
                                if(isset($result))
                                    if($x == $details[0]->paid_type)
                                        $select = 'selected';
                                echo '<option value="'.$x.'" '.$select.'>'.$way[$x].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="layout">
                    <div class="form-group ">
                        <label>المخزن</label>
                        <select name="ma5zon" id="ma5zon" class="required form-control" onchange="lood($('#ma5zon').val(),<?php echo $id ?>);" <?php echo $dis ?> required>
                            <option value="">قم بإختيار المخزن</option>
                            <?php
                            foreach($ma5zon as $branch){
                                $select = '';
                                if(isset($result))
                                    if($branch->id == $details[0]->product_storage)
                                        $select = 'selected';
                                echo '<option value="'.$branch->id.'" '.$select.'>'.$branch->storage_name.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="layout">
                    <div class="form-group">
                        <label>إسم الصنف</label>
                        <select name="sanf" id="sanf" onchange="get_unit($('#sanf').val(),<?php echo $id ?>);" class="form-control" data-live-search="true" required>
                            <option value="">قم بإختيار الصنف</option>
                            <?php
                            if(isset($result))
                                foreach($asnaf as $sanf)
                                        echo '<option value="'.$sanf->id.'">'.$sanf->p_name.'</option>';
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="layout">
                    <div class="form-group" id="sanf_unit">
                        <label>الوحدة</label>
                        <input type="text" placeholder="الوحدة" name="unit_selected" id="unit_selected" class="form-control required col-xs-6 no-padding" readonly />
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group ">
                        <label>تكلفة الشراء الكلية</label>
                        <input type="number" placeholder="تكلفة الشراء الكلية" name="all_buy_cost" id="all_buy_cost" class="required price form-control col-xs-6 no-padding" required />
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group">
                        <label>العدد الكلي</label>
                        <input type="number" placeholder="العدد الكلي" name="amount" id="amount" class="price form-control required col-xs-6 no-padding" required />
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group">
                        <label>تكلفة شراء الوحدة</label>
                        <input type="number" placeholder="تكلفة شراء الوحدة" name="one_buy_cost" id="one_buy_cost" class="form-control required col-xs-6 no-padding" readonly />
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group">
                        <label>سعر بيع الصنف</label>
                        <input type="number" placeholder="سعر بيع الصنف" name="one_buy_sell" id="one_buy_sell" class="form-control required col-xs-6 no-padding" required />
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="layout">
                    <div class="form-group" style="margin-top: 15px;">
                        <input type="hidden" name="load" value="1" >
                        <input type="hidden" name="id" id="id" value="<?php echo $id ?>" >
                        <!--input type="button" name="add_sanf" id="add_sanf" onclick="return session(<?php echo $id ?>);" value="إضافة صنف" class="btn btn-primary col-lg-12"-->   
                        <button type="button" name="add_sanf" id="add_sanf" class="btn btn-primary col-lg-12" >إضافة صنف</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>   
    <div class="details-resorce" id="results">
    <?php
    if(isset($result)){
    foreach($details as $detail){
        $new_product['fatora_code']   = $detail->fatora_code;
        $new_product['fatora_date']   = $detail->fatora_date;
        $new_product['marge3_num']    = $detail->marge3_num;
        $new_product['sanf']          = $detail->product_code;
        $new_product['pay_method']    = $result["paid_type"];
        if($result["paid_type"] == 1)
            $new_product['box_name']     = $result['dayen'];
        $new_product['supp_code']     = $detail->supplier_code;
        $new_product['unit_selected'] = $detail->unit_selected;
        $new_product['all_buy_cost']  = $detail->all_cost_buy;
        $new_product['amount']        = $detail->big_amount; 
        $new_product['one_buy_cost']  = $detail->one_big_buy_cost;   
        $new_product['one_buy_sell']  = $detail->one_big_price; 
        if($result["paid_type"] == 3){
            $new_product['bank_name']     = $result['dayen'];
            $new_product['check_num']     = $result["check_num"];
            $new_product['check_value']   = $result["check_value"];
            $new_product['recive_date']   = $result["recive_date"];
        }
        $new_product['ma5zon']        = $detail->storage_id;
        $session_id = $_SESSION["user_id"];
        $_SESSION["sanf_addition".$session_id][$new_product['sanf']] = $new_product;
        }
        $mode = reset($_SESSION["sanf_addition".$session_id]);
        
        $table = '<div class="col-xs-12 r-secret-table">
                    <div class="panel-body">
                        <div class="fade in active">
                          <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                             <thead>
                                 <tr>
                                   <th class="text-center">م</th> 
                                   <th class="text-center">إسم الصنف</th>
                                   <th class="text-center">الوحدة</th>
                                   <th class="text-center">الكمية</th>
                                   <th class="text-center">سعر شراء الوحدة</th>
                                   <th class="text-center">تكلفة الشراء الكلية</th>
                                   <th width="10%" class="text-center">الإجراء</th>
                                 </tr>
                             </thead>
                            <tbody>';
        $all_value = 0;
        for($x = 0 ; $x < count($_SESSION["sanf_addition".$session_id]) ; $x++){
            $table .= '<tr>
                        <td>'.($x+1).'</td>          
                        <td>'.$all_asnaf[$mode['sanf']]->p_name.'</td>  
                        <td>'.$units[$all_asnaf[$mode['sanf']]->p_unit_fk]->unit_name.'</td>
                        <td>'.$mode['amount'].'</td>
                        <td>'.$mode['one_buy_cost'].'</td>
                        <td>'.$mode['all_buy_cost'].'</td>
                        <td><span class="off" data-code='.$mode['sanf'].'><i class="fa fa-trash fa-2x"></i></span></td>
                       </tr> ';
        $all_value += $mode['all_buy_cost'];
        $mode = next($_SESSION["sanf_addition".$session_id]);
        }
        
        $table .= ' </tbody>
                    </table>
                    </div>
                </div>
            </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="layout">
                                <div class="form-group">
                                    <label>إجمالي الفاتورة</label>
                                    <input type="number" readonly id="fatora_cost" class="form-control" name="fatora_cost" value="'.$all_value.'" placeholder="إجمالي الفاتورة">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="layout">
                                <div class="form-group">
                                    <label>البيان</label>
                                    <input type="text" required value="'.$result['byan_fatora'].'" id="byan_fatora" class="form-control" name="byan_fatora" placeholder="البيان">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="layout">
                                <div class="form-group" style="margin-top: 15px;">
                                    <input type="submit" role="button" name="save" value="حفظ الفاتورة" class="btn btn-primary col-lg-12" />
                                </div>
                            </div>
                        </div>
                    </div>';
    echo form_open_multipart('Purchases/add_purchases/'.$this->uri->segment(3).'');
    echo $table;
    echo form_close();
    }
    ?>
    </div> 
</div>

<script>
    function lood(num,id){
        $("#sanf").html('<option value="">قم بإختيار الصنف</option>');
        $("#unit_selected").val('');
        if(num>0 && num != '')
        {
            var dataString = 'store_id=' + num ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Purchases/add_purchases/'+id,
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#sanf").html(html);
                }
            });
            return false;
        }
    }
</script>

<script>
    function get_pay_method(method,id){
        if(method != ''){
            var dataString = 'method=' + method + '&id=' + id;

            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Purchases/add_purchases/'+id,
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#basic').html(html);
                }
            }); 
            return false;
        }
        else{
            $('#basic').html('<div class="col-md-12"><div class="layout"><div class="form-group"><label>طريقة الدفع</label><select name="pay_method" id="pay_method" onchange="get_pay_method($(\'#pay_method\').val(),'+id+');" class="form-control" required><option value="">قم بإختيار طريقة الدفع</option><option value="1">نقدي</option><option value="2">آجل</option><option value="3">شيك</option></select></div></div></div>');
            return false;
        }

    }
</script>

<script>  
    function get_unit(sanf,id){
        if(sanf != ''){
            var dataString = 'sanf_id=' + sanf + '&id=' + id;

            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Purchases/add_purchases/'+id,
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#sanf_unit').html(html);
                }
            });
            return false;
        }
        else{
            $('#sanf_unit').html('<label>الوحدة</label><input type="text" placeholder="الوحدة" value="" name="unit_selected" class="form-control col-xs-6 no-padding" readonly />');
            return false;
        }
    }
</script>

<script>     
    $('.price').keyup(function (){
     var sum_big = parseFloat($("#all_buy_cost").val()) /  parseFloat($("#amount").val()) ;    
     $('#one_buy_cost').val(sum_big);
    });
</script>

<script>
    $('#add_sanf').on('click', function() {
        //$('#myform').validate();
        //if ($("#myform").valid()) {
            var dataString = $("#myform").serialize();
              
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Purchases/add_purchases/'+$('#id').val(),
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#results').html(html);
                }
            });
            return false;
       /* }
        else {
            alert('توجد بعض الحقول غير موجوده');
        }*/
    });
</script>

<script>
$("#results").on('click', 'span.off', function(e){
		e.preventDefault(); 
		var pcode = $(this).attr("data-code"); //get product code
        var comment = $(this).parent();
        var commentContainer = comment.parent();
		commentContainer.fadeOut();
        
          var remove_code = 'remove_code=' + pcode + '&load=1';
        
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Purchases/add_purchases/'+ $('#id').val(),
                data:remove_code,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#results').html(html);
                }
            });
        e.preventDefault();
});   
</script>