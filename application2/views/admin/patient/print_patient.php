<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asisst/layout/bootstrap-arabic.min.css">
<style>
    table,
    th,
    td {
        border: 1px solid #ccc;
        padding: 10px 20px;
        font-size: 15px;
        text-align: center;
    }

    .result {
        font-weight: bold;
    }

    .col-xs-12 {
        padding-bottom: 20px;
    }

    hr {
        width: 100%;
        border: 1px dotted #999;
    }

    .col-xs-6 {
        padding-right: 0;
    }

    .bottom {
        padding-bottom: 0;
    }
</style>


<div id="printdiv"  class="header " >
    <div class="container">
        <br>
        
        <?php foreach ($prints as $print): ?>
        <div class="col-xs-12">
            <div class="col-xs-12">
                <h4 > التاريخ : <span> <?php echo date("Y/m/d") ?> </span></h4>
            </div>

            <div class="col-xs-12">
                <h4> الاسم : <span>  <?php echo $print->a_name ?></span></h4>
            </div>
            <div class="col-xs-12">
                <h4> القسم : <span>  <?php echo $print->dep_name ?> </span></h4>
            </div>
            <div class="col-xs-12">
                <h4> المبلغ : <span>   <?php echo $print->paid ?>  </span></h4>
            </div>
        </div>
<?php endforeach;  ?>

        <hr>
        <br>

    </div>
</div>


<script>
    //Get the HTML of div
    var divElements = document.getElementById("printdiv").innerHTML;
    //Get the HTML of whole page
    var oldPage = document.body.innerHTML;
    //Reset the page's HTML with div's HTML only
    document.body.innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    //Print Page
    window.print();
    //Restore orignal HTML
    // document.body.innerHTML = oldPage;
    setTimeout(function () {location.replace("<?php echo base_url('dashboard/patient')?>");}, 500);
</script>
