<div class="well bs-component"> 

<?php if(isset($table) && $table != null){ ?>
    <div class="col-xs-12 r-secret-table">
        <div class="panel-body">
            <div class="fade in active">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">م</th>
                        <th class="text-center">رقم الفاتورة</th>
                        <th class="text-center">تاريخ الفاتورة</th>
                        <th class="text-center">الاجمالي</th>
                        <th class="text-center">تفاصيل الفاتورة </th>
                        <th class="text-center">الإجراء </th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php
                    $x = 0;
                    foreach($table as $record){
                        echo '<tr>
                              <td>'.($x+1).'</td>
                              <td>'.$record->fatora_code.'</td>
                              <td>'.date("Y-m-d",$record->fatora_date).'</td>
                              <td>'.$record->fatora_cost.'</td>
                              <td>
                              <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal'.$record->fatora_code.'"><span class="glyphicon glyphicon-list"></span> تفاصيل الفاتورة </button> 
                              </td>
                              <td>
                                <a href="'.base_url().'Purchases/delete/'.$record->fatora_code.'"> حذف </a> <span>/</span>
                                <a href="'.base_url().'Purchases/add_purchases/'.$record->fatora_code.'"> تعديل </a> 
                              </td>
                              </tr>';
                        $x++;
                    }
                    ?>
                    </tbody>
                </table>
                <?php 
                for($x = 0 ; $x < count($details) ; $x++){
                    echo '<div class="modal fade" id="myModal'.key($details).'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content" >
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h5 class="modal-title">تفاصيل فاتورة رقم ('.key($details).') , 
                                        المورد : '.$suppliers[$details[key($details)][0]->supplier_code]->name.'</h5>
                                    </div>
                                    <div class="row" style="width:550px;margin-right:15px">
                                        <table  class="table table-bordered" ">
                                            <thead>
                                                <tr>
                                                    <th class="text-right">مسلسل</th>
                                                    <th class="text-right">إسم الصنف</th>
                                                    <th class="text-right">الكمية</th>
                                                    <th class="text-right">السعر</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                    $total = 0;
                    for($z = 0 ; $z < count($details[key($details)]) ; $z++){
                        echo '<tr>
                                <td>'.($z+1).'</td>
                                <td>'.$all_asnaf[$details[key($details)][$z]->product_code]->p_name.'</td>
                                <td>'.$details[key($details)][$z]->amount_buy.'</td>
                                <td>'.$details[key($details)][$z]->all_cost_buy.'</td>
                              </tr>';
                        $total += $details[key($details)][$z]->all_cost_buy;
                    }
                    echo '                      <tr>
                                                    <td colspan="3">الإجمالي</td>
                                                    <td>'.$total.'</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>';  
                    next($details);                 
                }
                ?>
            </div>
        </div>
    </div>
<?php 
}
else
    echo '<div class="alert alert-danger text-center"><h1>لا توجد فواتير</h1></div>';
?>
    
</div>


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
    
    $('.price').keyup(function (){
     var sum_big = parseFloat($("#all_buy_cost").val()) /  parseFloat($("#amount").val()) ;    
     $('#one_buy_cost').val(sum_big);
    });
    
    function session(id,form){
        if(form.inputfield.value == ""){
          form.inputfield.focus();
          return false;
        }
        else{
            var dataString = $("#myform").serialize();
              
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Purchases/add_purchases/'+id,
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#results').html(html);
                }
            });
        }
    }
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