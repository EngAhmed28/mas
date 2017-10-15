<div class="well bs-component"> 
    <div class="details-resorce">
        <div class="row">
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group ">
                        <label>إختر الصنف</label>
                        <select name="ma5zon" id="ma5zon" class="required form-control" onchange="lood($('#ma5zon').val());" required>
                            <option value="">--قم بإختيار الصنف--</option>
                            <?php
                            if(isset($asnafs))
                                foreach($asnafs as $sanf)
                                    echo '<option value="'.$sanf->id.'">'.$sanf->p_name.'</option>';
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
                url: '<?php echo base_url() ?>Reports/asnaf',
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