<div class="well bs-component"> 
    <?php 
    if(isset($results)):
        echo form_open_multipart('dashboard/update_storage/'.$results['id'],array('class'=>"",'role'=>"form" ));
    ?>
    <div class="details-resorce">
        <div class="row">
            <div class="col-md-6">
                <div class="layout">
                    <div class="form-group ">
                        <label>كود المخزن</label>
                        <input type="text" class="form-control col-xs-6 no-padding" value="<?php echo $results['id'] ?>" readonly >
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="layout">
                    <div class="form-group">
                        <label>اسم المخزن</label>
                        <input type="text" placeholder="اسم المخزن" name="storage_name" value="<?php echo $results['storage_name'] ?>" class="form-control col-xs-6 no-padding" required="required"/>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="col-md-3">
            <input type="submit" name="update" value="حفظ" class="btn btn-primary">        
        </div>
    </div>
    <?php 
    echo form_close();
    else: 
        echo form_open_multipart('dashboard/add_storage',array('class'=>"",'role'=>"form" ));
    ?>
    <div class="details-resorce">
        <div class="row">
            <div class="col-md-6">
                <div class="layout">
                    <div class="form-group ">
                        <label>كود المخزن</label>
                        <input type="text" class="form-control col-xs-6 no-padding" 
                          value="<?php
                                if($last ==null) 
                                    echo   $last=1;
                                else{
                                    $a= $last[0]->id;
                                    echo $a+1;
                                }
                                ?>" readonly >
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="layout">
                    <div class="form-group">
                        <label>اسم المخزن</label>
                        <input type="text" placeholder="اسم المخزن" name="storage_name" class="form-control col-xs-6 no-padding" required="required"/>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="col-md-3 row">
            <input type="submit" name="add" value="حفظ" class="btn btn-primary">        
        </div>
    </div>
    <?php 
    echo form_close();
    if(isset($records)&&$records!=null):
    ?>
    <div class="col-xs-12 r-secret-table">
        <div class="panel-body">
            <div class="fade in active">
                <table id="example" class="display table table-bordered table-striped table-hover dataTable no-footer" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center"> م </th>
                        <th class="text-center"> كود المخزن </th>
                        <th class="text-center"> اسم المخزن </th>
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
                                <td>  <?php echo $record->id; ?> </td>
                                <td>  <?php echo $record->storage_name; ?> </td>
                                <td><a href="<?php echo base_url('dashboard/delete_storage').'/'.$record->id ?>"> حذف </a> <span>/</span> <a href="<?php echo base_url('dashboard/update_storage').'/'.$record->id ?>"> تعديل </a> </td>
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