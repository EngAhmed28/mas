<style>
    .bs-component .btn-default {
        padding: 9px 15px;
    }

</style>
<ul class="breadcrumb pb30">
    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>
    <li class="active"><?php echo $title; ?></li>
</ul>

<div class="well bs-component"  >

<fieldset>
    <legend> </legend>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label"> التاريخ من:</label>
        <input type="date"  name="date_from" id="date_from" class="form-control text-right"  required=""/>
    </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label"> التاريخ إلى:</label>
        <input type="date"  name="date_to" id="date_to" class="form-control text-right"  required/>
    </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">إسم الطبيب :</label>
            <select name="doctor_id" class="form-control selectpicker" id="doctor_id"  data-live-search="true">
                <option value=""> إختر الطبيب </option>
                <option value="ALL">الكل </option>
                <?php foreach ($doctors as $row):?>
                <option value="<?php echo $row->id ?>"> <?php echo $row->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
          <br/>
             <button type="submit" name="SEARCH" value="SEARCH" onclick="load();"  class="btn btn-primary">حفظ</button>
        </div>
    </div>

    <div class="row" id="optionearea1" ></div>

</fieldset>

</div>

<script>
    function load(){
        var date_from=$("#date_from").val();
        var date_to=$("#date_to").val();
        var doctor_id=$("#doctor_id").val();

 
        if(date_from && date_to && doctor_id)
        {
            startDate = date_from;
            endDate = date_to;
            if (startDate > endDate){
                alert('لا يجب أن يكون تاريخ البداية بعد تاريخ النهاية أو مساو له');
                return false;}
            else{
                var dataString = 'date_from=' + date_from + '&date_to=' + date_to + '&doctor_id=' + doctor_id ;
                $.ajax({
                    type:'post',
                    url: '<?php echo base_url() ?>dashboard/ReportDoctorsState',
                    data:dataString,
                    dataType: 'html',
                    cache:false,
                    success: function(html){
                        $("#optionearea1").html(html);
                    }
                });
            }

            return false;

        }

    }
</script>

