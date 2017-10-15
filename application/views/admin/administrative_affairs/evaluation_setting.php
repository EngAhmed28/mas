

<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
    </span>
<div class="well bs-component">
    <fieldset>
        <legend></legend>
        <?php
        if(isset($result) && $result!=null && !empty($result)){
            $out['title']=$result['title'];
            $out['grade']=$result['grade'];
            $out['input']='<input type="submit" role="button" name="UPDATE" value="تعديل" class="btn btn-primary">';
            $out['form']='Administrative_affairs/UpdateEvaluationSetting/'.$result['id'];
        }else{
            $out['title']='';
            $out['grade']='';
            $out['input']='<input type="submit" role="button" name="ADD" value="حفظ" class="btn btn-primary">';
            $out['form']='Administrative_affairs/EvaluationSetting';
        }
        ?>
        <div class="row">
            <div class="col-md-3">
                <?php  echo form_open_multipart($out['form']);?>
                <div class="form-group">
                    <label class="control-label">عنصر التقييم</label>
                    <input type="text" class="r-inner-h4 form-control" name="title" value="<?php echo $out['title'];?>" />
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">درجة النهاية العظمى</label>
                    <input type="number" class="r-inner-h4 form-control" name="grade" value="<?php echo $out['grade'];?>" />

                </div>
            </div>
        </div>
        <div class="form-group"  >
            <div class="col-xs-8 col-xs-pull-4">
                <?php echo  $out['input']?>
            </div>
        </div>
        <br>
        <?php echo form_close()?>
    </fieldset>
</div>
<?php if(isset($records)&& $records!=null && !empty($records) ):?>
<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th class="text-center">م</th>
        <th class="text-center">عنصر التقييم</th>
        <th class="text-center">درجة النهاية العظمى</th>
        <th class="text-center">الاجراء</th>
    </tr>
    </thead>
    <tbody class="text-center">
    <?php
    $a=1;
    foreach ($records as $record ):?>
<tr>
<td><?php echo $a ?></td>
<td><? echo $record->title;?></td>
<td><? echo $record->grade;?></td>
<td><!-- <a href="<?php  echo base_url().'Administrative_affairs/DeleteEvaluationSetting/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
<i class="fa fa-trash" aria-hidden="true"></i> </a> <span> /
</span>--> 
 <a href="<?php echo base_url().'Administrative_affairs/UpdateEvaluationSetting/'.$record->id ?>"
  class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> تعديل</a> </a></td>
</tr>
        <?php
        $a++;
    endforeach;  ?>
    </tbody>
</table>
<?php  endif; ?>
</div>