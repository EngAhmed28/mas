<?php
$session_id = $_SESSION["user_id"];

if(isset($_POST['fatora_code'])){
    foreach($_POST as $key => $value){
    $new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new product array
 }

if(isset($_POST["pay_method"])){

    $new_product['fatora_code']   = $_POST['fatora_code'] ;
    $new_product['fatora_date']   = strtotime($_POST["fatora_date"]);
    $new_product['marge3_num']    = $_POST["marge3_num"];
    $new_product['sanf']          = $_POST["sanf"];
    $new_product['pay_method']    = $_POST["pay_method"];
    if($_POST["pay_method"] == 1)
        $new_product['box_name']     = $_POST["box_name"];
    $new_product['supp_code']     = $_POST["supp_code"];
    $new_product['unit_selected'] = $_POST["unit_selected_id"];
    $new_product['all_buy_cost']  = $_POST["all_buy_cost"];
    $new_product['amount']        = $_POST["amount"]; 
    $new_product['one_buy_cost']  = $_POST["one_buy_cost"];   
    $new_product['one_buy_sell']  = $_POST["one_buy_sell"]; 
    if($_POST["pay_method"] == 3){
        $new_product['bank_name']     = $_POST["bank_name"];
        $new_product['check_num']     = $_POST["check_num"];
        $new_product['check_value']   = $_POST["check_value"];
        $new_product['recive_date']   = $_POST["recive_date"];
    }
    $new_product['ma5zon']        = $_POST["ma5zon"];
 }
 elseif(!(isset($_POST['pay_method']))){
    $mode = current($_SESSION["sanf_addition".$session_id]);

    $new_product['fatora_code']   = $_POST['fatora_code'] ;
    $new_product['fatora_date']   = strtotime($mode["fatora_date"]);
    $new_product['marge3_num']    = $mode["marge3_num"];
    $new_product['sanf']          = $_POST["sanf"];
    $new_product['pay_method']    = $mode["pay_method"];
    if($mode["pay_method"] == 1)
        $new_product['box_name']     = $mode["box_name"];
    $new_product['supp_code']     = $mode["supp_code"];
    $new_product['unit_selected'] = $_POST["unit_selected_id"];
    $new_product['all_buy_cost']  = $_POST["all_buy_cost"];
    $new_product['amount']        = $_POST["amount"]; 
    $new_product['one_buy_cost']  = $_POST["one_buy_cost"];   
    $new_product['one_buy_sell']  = $_POST["one_buy_sell"]; 
    if($mode["pay_method"] == 3){
        $new_product['bank_name']     = $mode["bank_name"];
        $new_product['check_num']     = $mode["check_num"];
        $new_product['check_value']   = $mode["check_value"];
        $new_product['recive_date']   = strtotime($mode["recive_date"]);
    }
    $new_product['ma5zon']        = $mode["ma5zon"];
 }
 
    if(isset($_SESSION["sanf_addition".$session_id])){  //if session var already exist
        if(isset($_SESSION["sanf_addition".$session_id][$new_product['sanf']])) //check item exist in products array
        {
            unset($_SESSION["sanf_addition".$session_id][$new_product['sanf']]); //unset old item
        }			
    }

    $_SESSION["sanf_addition".$session_id][$new_product['sanf']] = $new_product;	//update products with new item array

echo '<script>
          $("#sanf").val("").selectpicker("refresh");
          $("#unit_selected").val("");
          $("#all_buy_cost").val("");
          $("#amount").val("");
          $("#one_buy_cost").val("");
          $("#one_buy_sell").val("");
          
          document.getElementById("marge3_num").readonly    = true;
          document.getElementById("ma5zon").disabled        = true;  
          document.getElementById("fatora_date").disabled   = true;
          document.getElementById("supp_code").disabled     = true;
          document.getElementById("pay_method").disabled    = true;
          document.getElementById("box_name").disabled      = true;
          document.getElementById("bank_name").disabled     = true;
          document.getElementById("check_num").readonly     = true;
          document.getElementById("check_value").readonly   = true;
          document.getElementById("recive_date").readonly   = true;
      </script>';
 }

if(isset($_POST["remove_code"]) && isset($_SESSION["sanf_addition".$session_id]))
 {
	$product_code = filter_var($_POST["remove_code"], FILTER_SANITIZE_STRING); //get the product code to remove

	if(isset($_SESSION["sanf_addition".$session_id][$product_code]))
	{
		unset($_SESSION["sanf_addition".$session_id][$product_code]);
	}
     if($_SESSION["sanf_addition".$session_id] == null){
        echo '<script> 
                  $("#sanf").val("").selectpicker("refresh");
                  $("#unit_selected").val("");
                  $("#all_buy_cost").val("");
                  $("#amount").val("");
                  $("#one_buy_cost").val("");
                  $("#one_buy_sell").val("");
              </script>';
        echo '<script>
                  document.getElementById("marge3_num").readonly    = false;
                  document.getElementById("ma5zon").disabled        = false;  
                  document.getElementById("fatora_date").disabled   = false;
                  document.getElementById("supp_code").disabled     = false;
                  document.getElementById("pay_method").disabled    = false;
                  document.getElementById("box_name").disabled      = false;
                  document.getElementById("bank_name").disabled     = false;
                  document.getElementById("check_num").readonly     = false;
                  document.getElementById("check_value").readonly   = false;
                  document.getElementById("recive_date").readonly   = false;
              </script>'; 
     }
 }
    
if(isset($_SESSION["sanf_addition".$session_id]) && $_SESSION["sanf_addition".$session_id] != null){

        $mode = reset($_SESSION["sanf_addition".$session_id]);
        $table = '<div class="col-xs-12 r-secret-table">
                    <div class="panel-body">
                        <div class="fade in active">
                          <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                             <thead>
                                 <tr>
                                   <th class="text-center">م</th> 
                                   <th class="text-center">إسم الصنف</th>
                                   <th class="text-center">الوحدة</th>
                                   <th class="text-center">الكمية</th>
                                   <th class="text-center">سعر شراء الوحدة</th>
                                   <th class="text-center">تكلفة الشراء الكلية</th>
                                   <th width="10%" class="text-center">الإجراء</th>
                                 </tr>
                             </thead>
                            <tbody>';
        $all_value = 0;
        for($x = 0 ; $x < count($_SESSION["sanf_addition".$session_id]) ; $x++){
            $table .= '<tr>
                        <td>'.($x+1).'</td>          
                        <td>'.$all_asnaf[$mode['sanf']]->p_name.'</td>  
                        <td>'.$units[$all_asnaf[$mode['sanf']]->p_unit_fk]->unit_name.'</td>
                        <td>'.$mode['amount'].'</td>
                        <td>'.$mode['one_buy_cost'].'</td>
                        <td>'.$mode['all_buy_cost'].'</td>
                        <td><span class="off" data-code='.$mode['sanf'].'><i class="fa fa-trash fa-2x"></i></span></td>
                       </tr> ';
        $all_value += $mode['all_buy_cost'];
        $mode = next($_SESSION["sanf_addition".$session_id]);
        }
        
        $table .= ' </tbody>
                    </table>
                    </div>
                </div>
            </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="layout">
                                <div class="form-group">
                                    <label>إجمالي الفاتورة</label>
                                    <input type="number" readonly id="fatora_cost" class="form-control" name="fatora_cost" value="'.$all_value.'" placeholder="إجمالي الفاتورة">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="layout">
                                <div class="form-group">
                                    <label>البيان</label>
                                    <input type="text" required id="byan_fatora" class="form-control" name="byan_fatora" placeholder="البيان">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="layout">
                                <div class="form-group" style="margin-top: 15px;">
                                    <input type="submit" role="button" name="save" value="حفظ الفاتورة" class="btn btn-primary col-lg-12" />
                                </div>
                            </div>
                        </div>
                    </div>';
    echo form_open_multipart('Purchases/add_purchases/'.$this->uri->segment(3).'');
    echo $table;
    echo form_close();
 }

?>