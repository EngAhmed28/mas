<div class="well bs-component"> 
    <?php 
    if(isset($results)):
        echo form_open_multipart('dashboard/update_unit/'.$results['id'],array('class'=>"",'role'=>"form" ));
    ?>
    <div class="details-resorce">
        <div class="row">
            <div class="col-md-6">
                <div class="layout">
                    <div class="form-group ">
                        <label>اسم الوحدة</label>
                        <input type="text" name="unit_name" value="<?php echo $results['unit_name'] ?>" placeholder="اسم الوحدة" class="form-control col-xs-6 no-padding" required >
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group ">
                        <br />
                        <input type="submit" name="update" value="حفظ" class="btn btn-primary"> 
                    </div>
                </div>   
            </div>
        </div>
    </div>  
    <?php 
    echo form_close();
    else: 
        echo form_open_multipart('dashboard/add_unit',array('class'=>"",'role'=>"form" ));
    ?>
    <div class="details-resorce">
        <div class="row">
            <div class="col-md-6">
                <div class="layout">
                    <div class="form-group ">
                        <label>اسم الوحدة</label>
                        <input type="text" name="unit_name" placeholder="اسم الوحدة" class="form-control col-xs-6 no-padding" required >
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="layout">
                    <div class="form-group ">
                        <br />
                        <input type="submit" name="add" value="حفظ" class="btn btn-primary"> 
                    </div>
                </div>   
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
                            <th class="text-center"> اسم الوحدة </th>
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
                                    <td>  <?php echo $record->unit_name; ?> </td>
                                    <td><a href="<?php echo base_url('dashboard/delete_unit').'/'.$record->id ?>"> حذف </a> <span>/</span> <a href="<?php echo base_url('dashboard/update_unit').'/'.$record->id ?>"> تعديل </a> </td>
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