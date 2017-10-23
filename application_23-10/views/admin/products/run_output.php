<div class="well bs-component"> 
<?php
if(isset($result))
    $id = $result['id'];
else
    $id = 0;
echo form_open_multipart('Products/index/'.$id.'',array('class'=>"myform"));
?>
    <div class="details-resorce">
        <div class="row">    
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group ">
                        <label>تاريخ اليوم:</label>
                        <input type="date" class="form-control col-xs-6 no-padding" name="date" 
                        <?php
                        if(isset($result))
                            echo 'value="'.date("Y-m-d",$result['date']).'"';
                        ?> 
                        id="date" required>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group ">
                        <label>اختر المنتج:</label>
                        <select name="composite_p" id="composite_p" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                            <option value="">--قم بالإختيار--</option>
                            <?php
                            if(isset($composite_p))
                                for($x = 0 ; $x < count($composite_p) ; $x++){
                                    if(isset($result) && $composite_p[$x]->id == $result['product_main_code_fk'])
                                        $selected = 'selected';
                                    else
                                        $selected = '';
                                    echo '<option value="'.$composite_p[$x]->id.'" '.$selected.'>'.$composite_p[$x]->p_name.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group ">
                        <label>الكمية:</label>
                        <input type="number" class="form-control" name="amount" <?php if(isset($result)) {echo 'value="'.$result['product_main_amount'].'"'; } ?>  required>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group ">
                        <label>وصف العملية:</label>
                        <input type="text" class="form-control" name="note" <?php if(isset($result)) {echo 'value="'.$result['note'].'"';} ?>  required>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">    
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group ">
                    <?php if(isset($result)) {?>
                            <input type="submit" role="button" name="update" value="تعديل البيانات" class="btn btn-primary col-lg-12" />
                    <?php }else{?>
                        <input type="submit" role="button" name="save" value="حفظ البيانات" class="btn btn-primary col-lg-12" />
                    <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <?php
     if(isset($records) && $records!= null){
     ?>
        <div class="col-xs-12 r-secret-table">
            <div class="panel-body">
                <div class="fade in active">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-right">م</th>
                                <th class="text-right">تالايخ اليوم</th>
                                <th class="text-right">أسم المنتج</th>
                                <th class="text-right">الكمية</th>
                                <th class="text-right">الاجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        foreach ($records as $record):
                            $x=0;
                        ?>
                            <tr>
                                <td><?php echo ++$x;?></td>
                                <td> <?php echo date("Y-m-d", $record->date);?></td>
                                <td><?php echo $products[$record->product_main_code_fk]->p_name?></td>
                                <td><?php echo $record->product_main_amount; ?></td>
                                <td>
                                    <a href="<?php echo base_url().'Products/index/'.$record->id?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</a>
                                    <a  href="<?php echo base_url().'Products/delete/'.$record->id?>"  onclick="return confirm('هل انت متأكد من عملية الحذف ؟');"><i class="fa fa-trash" aria-hidden="true"></i> حذف</a>
                                </td>
                            </tr>
                     <?php endforeach; ?>
                     </tbody>
                </table>
            </div>
        </div>
     </div>
     <?php 
     }
     ?>
</div>