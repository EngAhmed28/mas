<div class="well bs-component"> 
<?php
if(isset($result))
    $id = $result[0]->product_main_code_fk;
 else
    $id = 0;
echo form_open_multipart('Products/standard/'.$id.'',array('class'=>"myform"))?>
<div class="details-resorce">
    <div class="row">
        <div class="col-md-3">
            <div class="layout">
                <div class="form-group ">
                    <label>إختر الصنف المركب</label>
                    <select name="product_main_code_fk" id="product_main_code_fk" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                        <option value="">--قم بالإختيار--</option>
                        <?php
                        if(isset($result) && $result != null)
                            echo '<option value="'.$result[0]->product_main_code_fk.'" selected>'.$all_products[$result[0]->product_main_code_fk]->p_name.'</option>';
                        if(isset($main) && !(isset($result)))
                            for($x = 0 ; $x < count($main) ; $x++)
                                    echo '<option value="'.$main[$x]->id.'">'.$main[$x]->p_name.'</option>';
                        ?>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="layout">
                <div class="form-group ">
                    <label>إسم الصنف:</label>
                    <select name="product_sub_code_fk" id="product_sub_code_fk" onchange="return lood($('#product_sub_code_fk').val(),<?php echo $id ?>);" class="no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                        <option value="">--قم بالإختيار--</option>
                        <?php
                        if(isset($products))
                            for($x = 0 ; $x < count($products) ; $x++)
                                echo '<option value="'.$products[$x]->id.'">'.$products[$x]->p_name.'</option>';
                        ?>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="layout">
                <div class="form-group" id="optional">
                    <label>الوحدة:</label>
                    <input type="text" class="form-control col-xs-6 no-padding " name="unite" id="unite" readonly />
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="layout">
                <div class="form-group" id="optional">
                    <label>الكمية:</label>
                    <input type="text" onkeypress="return isNumberKey(event)" class="form-control col-xs-6 no-padding " name="product_sub_amount" id="product_sub_amount" required />
                </div>
            </div>
        </div>
        
        <br /><br /><br /><br />
        <div class="col-md-3 row">
            <input type="hidden" name="load" id="load"  value="10" />
            <input type="submit" role="button" name="add" value="إضافة الصنف" onclick="return session(<?php echo $id; ?>);" class="btn btn-primary" />
        </div>
    </div>
</div>
<?php echo form_close()?>
    <div class="row" id="results">
        <?php
        if(isset($result) && $result != null){
            echo form_open_multipart('Products/standard/'.$id.'');
            echo '<div class="col-xs-12 r-inner-details">
                    <div class="panel-body">
                        <div class="fade in active">
                          <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                             <thead>
                                 <tr>
                                   <th class="text-right">م</th> 
                                   <th class="text-right">إسم الصنف</th>
                                   <th class="text-right">الوحدة</th>
                                   <th class="text-right">الكمية</th>
                                   <th width="10%" class="text-center">حذف</th>
                                 </tr>
                             </thead>
                            <tbody>';
            $all_value = 0;
            for($x = 0 ; $x < count($result) ; $x++){
                $new_product['product_main_code_fk'] = $result[$x]->product_main_code_fk;
                $new_product['product_sub_code_fk']  = $result[$x]->product_sub_code_fk;
                $new_product['product_sub_amount']   = $result[$x]->product_sub_amount;
                
                $_SESSION["standard_addtion".$_SESSION["user_id"]][$new_product['product_sub_code_fk']] = $new_product;
                
                echo '<tr>
                            <td>'.($x+1).'</td>          
                            <td>'.$all_products[$new_product['product_sub_code_fk']]->p_name.'</td>  
                            <td>'.$units[$all_products[$new_product['product_sub_code_fk']]->p_unit_fk]->unit_name.'</td>
                            <td>'.$new_product['product_sub_amount'].'</td>                              
                            <td><span class="off" onclick="return del('.$id.','.$new_product['product_sub_code_fk'].');" data-code='.$new_product['product_sub_code_fk'].'><i class="fa fa-trash fa-2x"></i></span></td>
                       </tr> ';
            }
            echo ' </tbody>
                    </table>
                    </div>
                    
                    <div class="col-xs-3 r-inner-btn" style="padding-top: 20px;">
                        <input type="submit" role="button" name="save" value="حفظ معيار المنبع" class="btn btn-primary" />
                    </div>
                    
                    </div>
                    </div>';
            echo form_close();
        }
        ?>
    </div>
</div>

<script>
    function lood(num,id){
        if(num>0 && num != '')
        {
            var dataString = 'product_id=' + num ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Products/standard/'+id,
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optional").html(html);
                }
            });
            return false;
        }
        else
            $("#unite").val('');
    }
</script>

<script>
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>

<script>
    function session(id)
    {
        if($('#product_main_code_fk').val() && $('#product_sub_code_fk').val() 
        && $('#product_sub_amount').val()){
          var dataString = $(".myform").serialize();
            
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Products/standard/'+id,
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#results').html(html);
                }
            });
            return false;
          }
    }
</script>

<script>
function del(id,code){
        var comment = $(".off").parent();
        var commentContainer = comment.parent();
		commentContainer.fadeOut(); 
          
          var remove_code = 'remove_code=' + code + '&load=10' + '&id=' + id;
        
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Products/standard/'+id,
                data:remove_code,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#results').html(html);
                }
            });
}    
</script>