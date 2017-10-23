<div class="well bs-component"> 
<?php
if(isset($result))
    $id = $result['id'];
 else
    $id = 0;
echo form_open_multipart('Suppliers/add_supplier/'.$id.'');
$code = $this->db->query('SELECT code FROM accounts_group WHERE from_id=
                  (SELECT id FROM accounts_group WHERE code=(SELECT code FROM settings WHERE id=1))
                  ORDER BY id DESC LIMIT 1');
$code = $code->result();
$query = $this->db->query('SELECT code FROM settings WHERE id=1');
$query = $query->result();
?>
    <div class="details-resorce">
        <div class="row">
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group ">
                        <label>كود المورد</label>
                        <input type="text" placeholder="كود المورد" name="code" value="
                        <?php 
                        if(isset($result)) 
                            echo $result['code']; 
                        else{
                            if(isset($code)) 
                                echo ($code[0]->code +1); 
                            else echo $query[0]->code.'0001';
                            }  
                        ?>" class="form-control col-xs-6 no-padding" readonly />
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group">
                        <label>إسم المورد</label>
                        <input type="text" value="<?php if(isset($result)) echo $result['name'] ?>" placeholder="إسم المورد" name="name" class="form-control col-xs-6 no-padding" required />
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group">
                        <label>عنوان المورد</label>
                        <input type="text" placeholder="عنوان المورد" name="supplier_address" value="<?php if(isset($result)) echo $result['supplier_address'] ?>" class="form-control col-xs-6 no-padding" required />
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group">
                        <label>تليفون المورد</label>
                        <input type="number" placeholder="تليفون المورد" name="supplier_phone" value="<?php if(isset($result)) echo $result['supplier_phone'] ?>" class="form-control col-xs-6 no-padding" required />
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group ">
                        <label>الفاكس</label>
                        <input type="number" placeholder="الفاكس" name="supplier_fax" value="<?php if(isset($result)) echo $result['supplier_fax'] ?>" class="form-control col-xs-6 no-padding" required />
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group">
                        <label>إسم المحاسب المختص</label>
                        <input type="text" placeholder="إسم المحاسب المختص" name="accountant_name" value="<?php if(isset($result)) echo $result['accountant_name'] ?>" class="form-control col-xs-6 no-padding" required />
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group">
                        <label>رقم التليفون</label>
                        <input type="number" placeholder="رقم التليفون" name="accountant_telephone" value="<?php if(isset($result)) echo $result['accountant_telephone'] ?>" class="form-control col-xs-6 no-padding" required />
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group">
                        <label>إجمالى الدائن</label>
                        <input type="number" placeholder="إجمالى الدائن" name="supplier_dayen" value="<?php if(isset($result)) echo $result['supplier_dayen'] ?>" class="form-control col-xs-6 no-padding" required />
                    </div>
                </div>
            </div>
            
            <br /><br /><br /><br />
            <div class="col-md-3 row">
                <input type="submit" name="add" value="حفظ" class="btn btn-primary">        
            </div>
        </div>
    </div>
    <?php if(isset($table) && $table != null){ ?>
    <div class="col-xs-12 r-secret-table">
        <div class="panel-body">
            <div class="fade in active">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center"> م </th>
                        <th class="text-center">إسم المورد</th>
                        <th class="text-center">عنوان المورد</th>
                        <th class="text-center"> رصيد أول </th>
                        <th class="text-center"> الإجراء </th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php
                    $x = 0 ;
                    foreach($table as $record){
                        echo '<tr>
                              <td>'.($x+1).'</td>
                              <td>'.$record->name.'</td>
                              <td>'.$record->supplier_address.'</td>
                              <td>'.$record->supplier_dayen.'</td>
                              <td>
                                <a href="'.base_url().'Suppliers/delete/'.$record->id.'"> حذف </a> <span>/</span>
                                <a href="'.base_url().'Suppliers/add_supplier/'.$record->id.'"> تعديل </a> 
                              </td>
                              </tr>';
                        $x++;
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php } ?>
</div>