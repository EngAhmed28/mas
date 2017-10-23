<div class="well bs-component"> 
    <div class="details-resorce">
        <div class="row">
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group ">
                        <label>إختر المخزن</label>
                        <select name="ma5zon" id="ma5zon" class="required form-control" onchange="lood($('#ma5zon').val());" required>
                            <option value="">--قم بإختيار المخزن--</option>
                            <option value="all">كل الأصناف بالمخازن</option>
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
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="layout">
                    <div class="form-group" id="sanf">
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function lood(num){
        $("#sanf").html('');
        if(num != '')
        {
            var dataString = 'store_id=' + num ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Reports/all_products',
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