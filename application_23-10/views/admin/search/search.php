<!--<h2 class="text-flat">أوامر الصرف و القبض<span class="text-sm"><?php echo $title; ?></span></h2>-->
<ul class="breadcrumb pb">
    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>
    <li class="active"><?php echo $title; ?></li>
</ul>
<span id="message">
<?php
if(isset($_SESSION['message']))
 echo $_SESSION['message'];
unset($_SESSION['message']);
?>
    </span>
<div class="well bs-component" >

    <?php echo form_open_multipart('dashboard/search',array('class'=>"form-horizontal",'role'=>"form", 'id' => 'myform' ))?>
    <fieldset>
        <legend ><?php echo $title; ?></legend>
<div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="inputUser" class="control-label">الإسم  </label>
                <input type="text" id="name"  name="name"    class="form-control text-right" placeholder="الإسم" />
            </div>
        </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="inputUser" class="control-label">البحث</label>
            <input type="hidden"  class="btn btn-success" name="action" value="search" />
  <input type="submit"  onclick="
                       Name = ($('#name').val());
                        if (Name == '' ){
                        alert('لا بد من كتابه الإسم حتي تتمكن من البحث');
                        return false;}
                        else{
      return results($('#name').val()
      )};" name="add" value="عرض" class="btn btn-primary"  >
            </div>
            </div>
</div>
    </fieldset>
    <?php echo form_close()?>
    <div id="results"></div>
</div>

<!---------------------------------------------------------------------->
<!---------------------------------------------------------------------->
<script>
    function results(name){
        var dataString='name='+ name;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/dashboard/search',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#results').html(html);
                }
            });
            return false;
    }
</script>
