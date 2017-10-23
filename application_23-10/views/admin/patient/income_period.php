<h2 class="text-flat">إدارة التقارير <span class="text-sm"><?php echo $title; ?></span></h2>
<ul class="breadcrumb pb30">
    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>
    <li class="active"><?php echo $title; ?></li>
</ul>

<div class="well bs-component"  ="wait 0s, then enter left and hustle 100%">

<?php echo form_open_multipart('dashboard/income_period',array('class'=>"form-horizontal",'role'=>"form" ))?>


<fieldset>
            <legend  ="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>

<div class="form-group"  ="wait 0.6s, then enter bottom and hustle 100%">
                <label for="inputUser" class="col-lg-2 control-label"> التاريخ من:</label>
                <div class="col-lg-4 input-grup">
                
                
                    <input type="date" id="popupDatepicker" onchange="return loadd($('#popupDatepicker').val(),$('#popupDatepicker2').val());" name="date_from" class="form-control text-right"  required/>
                </div>
                <label for="inputUser" class="col-lg-2 control-label"> التاريخ إلى:</label>
                <div class="col-lg-4 input-grup">
                
                
                    <input type="date" id="popupDatepicker2" onchange="return loadd($('#popupDatepicker').val(),$('#popupDatepicker2').val());" name="date_to" class="form-control text-right"  required/>
                </div>
            </div>
            
            <br />
            
            <!--div class="form-group"  ="wait 0.3s, then enter bottom and hustle 100%">
                <div class="col-xs-10 col-xs-pull-2">
                    <button class="btn btn-success" onclick="return loadd($('#popupDatepicker').val(),$('#popupDatepicker2').val());" >عرض</button>
                </div>
            </div-->
            
            <br />
            
            <div id="optionearea1" ></div>
            
            </fieldset>
            <?php echo form_close()?>
             </div>

<script>
 function loadd(date_from,date_to){
    
    if(date_from && date_to)
    {
        startDate = date_from;
        endDate = date_to;
        if (startDate > endDate){
            alert('لا يجب أن يكون تاريخ البداية بعد تاريخ النهاية أو مساو له');
            return false;}
        else{ 
            var dataString = 'date_from=' + date_from + '&date_to=' + date_to ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/dashboard/income_period',
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

