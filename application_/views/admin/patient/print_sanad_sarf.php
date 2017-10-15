<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asisst/layout/bootstrap-arabic.min.css">
<style>
    .col-xs-12 {
        padding-left: 0;
        padding-right: 0;
    }
    
    .col-xs-6 {
        padding-left: 0;
    }
    
    hr {
        width: 100%;
        border: 1px solid #999;
    }
    
    img {
        width: 50%;
        margin-top: -9px;
    }
    
    h3 {
        font-weight: bold;
        margin-top: 15px;
    }
    
    h5 span {
        padding-left: 26px;
        padding-right: 9px;
    }
    
    h5 {
        margin-bottom: 0;
    }
    
    .one {
        padding-bottom: 10px;
    }
    
    .all {
        padding-top: 50px;
        padding-bottom: 50px;
    }
</style>

<?php

if(isset($print) && $print != null){ 

echo'<div id="printdiv" class="header">
        <div class="container">
            <div class="col-xs-12 all">
                <div class="col-xs-12 one">
                    <div class="col-xs-4">
                        <img src="'.base_url().'asisst/img/logo_sanad.png">
                    </div>
                    <div class="col-xs-4">
                        <h3 class="text-center"> سند قبض </h3>
                    </div>
                    <div class="col-xs-4 text-right">
                        <div class="col-xs-12 ">
                            <h5> التاريخ الدفع : <span> '.$print[0]->out_date.' </span></h5>
                        </div>
                        <!--div class="col-xs-12">
                            <h5> التاريخ الطباعة : <span> '.date("Y/m/d").' </span></h5>
                        </div-->
                    </div>
                </div>
                <div class="col-xs-12">
                    <h5> استلمنا من / <span> '.$print[0]->a_name.' </span></h5>
                    <h5> مبلغ قدرة / <span> '.sprintf("%.2f",$print[0]->paid).' فقط '.$arabic.' ريال</span></h5>
                    <div class="col-xs-12">
                        <h5> البيان / رقم الفاتوره / <span> '.$print[0]->fatora_num.' </span>، رقم السند /  <span> '.$print[0]->id.' </span></h5>
                    </div>
                </div>
                <div class="col-xs-12 ">
                    <div class="col-xs-8"></div>
                    <div class="col-xs-4 bottom">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h5 class="text-right"> توقيع المحاسب  :</h5>
                            </div>
                            <div class="col-xs-6">
                                <h5> ................................. </h5>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h5 class="text-right"> توقيع المستلم    :  </h5>
                            </div>
                            <div class="col-xs-6">
                                <h5> ................................. </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <hr>
            
            <div class="col-xs-12 all">
                <div class="col-xs-12 one">
                    <div class="col-xs-4">
                        <img src="'.base_url().'asisst/img/logo_sanad.png" alt="">
                    </div>
                    <div class="col-xs-4">
                        <h3 class="text-center"> سند قبض </h3>
                    </div>
                    <div class="col-xs-4 text-right">
                        <div class="col-xs-12 ">
                            <h5> التاريخ الدفع : <span> '.$print[0]->out_date.' </span></h5>
                        </div>
                        <!--div class="col-xs-12">
                            <h5> التاريخ الطباعة : <span> '.date("Y/m/d").' </span></h5>
                        </div-->
                    </div>
                </div>
                <div class="col-xs-12">
                    <h5> استلمنا من / <span> '.$print[0]->a_name.' </span></h5>
                    <h5> مبلغ قدرة / <span> '.sprintf("%.2f",$print[0]->paid).' فقط '.$arabic.' ريال</span></h5>
                    <div class="col-xs-12">
                        <h5> البيان / رقم الفاتوره / <span> '.$print[0]->fatora_num.' </span>، رقم السند /  <span> '.$print[0]->id.' </span></h5>
                    </div>
                </div>
                <div class="col-xs-12 ">
                    <div class="col-xs-8"></div>
                    <div class="col-xs-4 bottom">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h5 class="text-right"> توقيع المحاسب  :</h5>
                            </div>
                            <div class="col-xs-6">
                                <h5> ................................. </h5>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h5 class="text-right"> توقيع المستلم    :  </h5>
                            </div>
                            <div class="col-xs-6">
                                <h5> ................................. </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <hr>
    </div>
</div>';

 }?>

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
    setTimeout(function () {location.replace("<?php echo base_url('dashboard/sanad_sarf')?>");}, 500);
</script>
