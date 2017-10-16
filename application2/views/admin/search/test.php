
    <ul class="breadcrumb pb30">

    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الملف الإلكتروني للمرضى </a></li>

    <li class="active"><?php echo $title; ?></li>

</ul>
    
    <div class="something">
         <label for="inputUser" class="control-label">البحث بالإسم   </label>
     <input name="search_data" id="search_data" type="text"  placeholder="من فضلك أدخل الإسم الذي تريد البحث عنه" 
                class="form-control text-right"  onkeyup="ajaxSearch();">
     <div id="suggestions">
         <div id="autoSuggestionsList"></div>
     </div>
</div>


<script type="text/javascript">

function ajaxSearch()
{
    var input_data = $('#search_data').val();
    if (input_data.length === 0)
    {
        $('#suggestions').hide();
    }
    else
    {

        var post_data = {
            'search_data': input_data,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>/dashboard/autocomplete/",
            data: post_data,
            success: function (data) {
                // return success
                if (data.length > 0) {
                    $('#suggestions').show();
                    $('#autoSuggestionsList').addClass('auto_list');
                    $('#autoSuggestionsList').html(data);
                }
            }
         });

     }
 }
</script>