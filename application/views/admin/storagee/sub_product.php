<div class="well bs-component"> 
    <?php 
    if(isset($results)):
        echo form_open_multipart('dashboard/update_sub_product/'.$results['id'],array('class'=>"",'role'=>"form" ));
    ?>
    <div class="details-resorce">
        <div class="row">
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group ">
                        <label>اختار المخزن</label>
                        <select name="p_storage_code_fk" class="form-control" required>
                            <option> - اختر - </option>
                            <?php 
                            foreach ($stores as $record):
                                if($record->id == $results['p_storage_code_fk'])
                                    $selected='selected';
                                else
                                    $selected='';
                            ?>
                            <option  value="<?php echo $record->id ?>"  <?php echo $selected ?> ><?php echo $record->storage_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group">
                        <label>كود الصنف</label>
                        <input type="text" placeholder="كود الصنف" value="<?php echo $results['p_code'] ?>" name="p_code" class="form-control col-xs-6 no-padding" readonly />
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group ">
                        <label>اختار الأصناف الرئيسية</label>
                        <select name="p_from_id_fk" class="form-control" required>
                            <option> - اختر - </option>
                            <?php 
                            foreach ($main as $record): 
                                if($record->id == $results['p_from_id_fk'])
                                    $selected='selected';
                            else
                                $selected='';
                            ?>
                            <option value="<?php echo $record->id ?>" <?php echo $selected ?>><?php echo $record->p_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group">
                        <label>نوع الصنف</label>
                        <select name="p_type_fk" class="form-control" required>
                            <?php 
                            if($results['p_type_fk']==2)
                                echo '<option value="2" selected> مركب </option>
                                      <option value="1"> عادي </option>';
                            else
                                echo '<option value="2" > مركب </option>
                                      <option value="1" selected> عادي </option>';
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group ">
                        <label>اسم الصنف الفرعي</label>
                        <input type="text" value="<?php echo $results['p_name'] ?>" placeholder="اسم الصنف الفرعي" class="form-control" name="p_name" required>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group">
                        <label>اختار الوحدة</label>
                        <select name="p_unit_fk" class="form-control"  required>
                            <option> - اختر - </option>
                            <?php 
                            foreach ($units as $record):
                                if($record->id == $results['p_unit_fk'])
                                    $selected='selected';
                                else
                                    $selected='';
                                ?>
                            <option  value="<?php echo $record->id ?>" <?php echo $selected ?>><?php echo $record->unit_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group ">
                        <label>سعر التوريد</label>
                        <input type="number" value="<?php echo $results['p_supply_price'] ?>" placeholder="سعر التوريد" class="form-control" name="p_supply_price" required>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group">
                        <label>سعر الصرف</label>
                        <input type="number" value="<?php echo $results['p_exchange_price'] ?>" placeholder="سعر الصرف" name="p_exchange_price" class="form-control col-xs-6 no-padding" />
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group ">
                        <label>رصيد اول</label>
                        <br />
                        <?php 
                        if($results['p_past_amount']==0  )
                            echo '<input type="radio" class="r-radio" value="0" onclick="show1();" name="import_type_id_fk" checked id="r-in"/> لا
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                                  <input type="radio" class="r-radio" value="1" onclick="show2();" name="import_type_id_fk" id="r-out"/> نعم';
                        else
                            echo '<input type="radio" class="r-radio" value="0" onclick="show1();" name="import_type_id_fk"  id="r-in"/> لا
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                                  <input type="radio" class="r-radio" value="1" onclick="show2();" name="import_type_id_fk" id="r-out" checked/> نعم';
                        ?>
                    </div>
                </div>
            </div>
            <?php
            if($results['p_past_amount']==0 )
                $style = 'display: none';
            else
                $style = '';
            ?>
            <div class="col-md-3" id="box" style="<?php echo $style ?>">
                <div class="layout">
                    <div class="form-group">
                        <label>الكمية</label>
                        <input type="number" placeholder="الكمية" value="<?php echo $results['p_past_amount'] ?>" name="p_past_amount" class="form-control col-xs-6 no-padding" />
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group ">
                        <label>تكلفة الوحدة</label>
                        <input type="number" value="<?php echo $results['p_past_amount_cost'] ?>" placeholder="تكلفة الوحدة" class="form-control" name="p_past_amount_cost">
                    </div>
                </div>
            </div>
            
            <br />
            <div class="col-md-3 row">
                <input type="submit" name="update" value="حفظ" class="btn btn-primary">        
            </div>
        </div>
    </div>
    <?php 
    echo form_close(); 
    else: 
        echo form_open_multipart('dashboard/add_sub_product',array('class'=>"",'role'=>"form" ));
    ?>
    <div class="details-resorce">
        <div class="row">
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group ">
                        <label>اختار المخزن</label>
                        <select name="p_storage_code_fk" class="form-control" required>
                            <option> - اختر - </option>
                            <?php foreach ($stores as $record): ?>
                            <option  value="<?php echo $record->id ?>"><?php echo $record->storage_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group">
                        <label>كود الصنف</label>
                        <input type="text" placeholder="كود الصنف" name="p_code" class="form-control col-xs-6 no-padding" readonly />
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group ">
                        <label>اختار الأصناف الرئيسية</label>
                        <select name="p_from_id_fk" class="form-control" required>
                            <option> - اختر - </option>
                            <?php foreach ($main as $record): ?>
                            <option value="<?php echo $record->id ?>"><?php echo $record->p_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group">
                        <label>نوع الصنف</label>
                        <select name="p_type_fk" class="form-control" required>
                            <option> - اختر - </option>
                            <option value="2"> مركب </option>
                            <option value="1"> عادي </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group ">
                        <label>اسم الصنف الفرعي</label>
                        <input type="text" placeholder="اسم الصنف الفرعي" class="form-control" name="p_name" required>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group">
                        <label>اختار الوحدة</label>
                        <select name="p_unit_fk" class="form-control"  required>
                            <option> - اختر - </option>
                            <?php foreach ($units as $record): ?>
                                <option  value="<?php echo $record->id ?>"><?php echo $record->unit_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group ">
                        <label>سعر التوريد</label>
                        <input type="number" placeholder="سعر التوريد" class="form-control" name="p_supply_price" required>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group">
                        <label>سعر الصرف</label>
                        <input type="number" placeholder="سعر الصرف" name="p_exchange_price" class="form-control col-xs-6 no-padding" />
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group ">
                        <label>رصيد اول</label>
                        <br />
                        <input type="radio" class="r-radio" value="0" onclick="show1();" name="import_type_id_fk" checked id="r-in"/> لا
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" class="r-radio" value="1" onclick="show2();" name="import_type_id_fk" id="r-out"/> نعم
                    </div>
                </div>
            </div>
            
            <div class="col-md-3" id="box" style="display: none">
                <div class="layout">
                    <div class="form-group">
                        <label>الكمية</label>
                        <input type="number" placeholder="الكمية" name="p_past_amount" class="form-control col-xs-6 no-padding" />
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group ">
                        <label>تكلفة الوحدة</label>
                        <input type="number" placeholder="تكلفة الوحدة" class="form-control" name="p_past_amount_cost">
                    </div>
                </div>
            </div>
            
            <br />
            <div class="col-md-3 row">
                <input type="submit" name="add" value="حفظ" class="btn btn-primary">        
            </div>
        </div>
    </div>
    <?php 
    echo form_close();
    if(isset($records)&&$records!=null):?>
    <div class="col-xs-12 r-secret-table">
        <div class="panel-body">
            <div class="fade in active">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center"> م </th>
                        <th class="text-center"> اسم المنتج الفرعي  </th>
                        <th class="text-center"> كود المنتج الفرعي </th>
                        <th class="text-center"> المخزن </th>
                        <th class="text-center"> الاجراء </th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php 
                    if(isset($records)&&$records!=null):
                        $a=1;
                        foreach ($records as $record ): ?>
                            <tr>
                                <td><?php echo $a ?> </td>
                                <td><?php echo $record->p_name; ?> </td>
                                <td> <?php echo $record->p_code; ?> </td>
                                <td>
                                <?php
                                if($record->p_storage_code_fk){
                                    $this->db->select('*');
                                    $this->db->from('stores');
                                    $this->db->where('id',$record->p_storage_code_fk);
                                    $query2 = $this->db->get();
                                    $dataa2= $query2->row_array();

                                    echo $dataa2['storage_name'] ;
                                }else{

                                }
                                ?>
                                </td>
                                <td><a href="<?php echo base_url('dashboard/delete_sub_product').'/'.$record->id ?>"> حذف </a> <span>/</span> <a href="<?php echo base_url('dashboard/update_sub_product').'/'.$record->id ?>"> تعديل </a> </td>
                            </tr>
                    <?php
                            $a++;
                        endforeach; 
                    endif; 
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php 
        endif; 
    endif; 
    ?>
</div>
<script>
    function show1(){
        document.getElementById('box').style.display ='none';
    }
    function show2(){
        document.getElementById('box').style.display = 'block';
    }
</script>