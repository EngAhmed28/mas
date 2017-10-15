<style>
    ul {
        list-style: none;
        padding-right: 20px;
    }

    .treeview li>input {
        height: 16px;
        width: 16px;
    }

</style>

<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</span>
<div class="well bs-component">
    <?php if(isset($user_data)):
        $out['form']='dashboard/update_role/'.$user_data['user_id'];
        $out['user_id']=$user_data["user_id"];
        $out['DES']='disabled="disabled"';//user_permations
        $user_per=$user_permations;
       $out['hidden']=' <input type="hidden" name="user_id" value="'.$user_data['user_id'].'">';
        $out['input']='   <button type="submit" name="edit_role" value="edit" class="btn btn-primary">تعديل</button>';
    else:
        $out['form']='dashboard/create_role';
        $out['user_id']="";
        $out['DES']='';
       $out['hidden']='';
        $user_per=array(0);
        $out['input']='<button type="submit" name="add_role" value="add" class="btn btn-primary">حفظ</button>';
    endif;?>


    <fieldset>
        <legend ></legend>
        <?php echo form_open_multipart($out['form'])?>

        <div class="row form-group">
            <label for="inputUser" class="col-lg-2 control-label">إسم المستخدم  </label>
            <div class="col-lg-10 input-grup">
                <select name="user_id" class="form-control"  <?php echo $out['DES'];?> required="required" >
                    <?php foreach ($users as $user) {
                       $select="";   if(isset($user_data)){
                            if($user->user_id ==  $out['user_id'] ){$select='selected="selected"';}
                        }
                        if(isset($user_in)){
                           if(in_array( $user->user_id,$user_in )) {continue;}
                        }
                        ?>
                        <option value="<?php echo $user->user_id?>"  <?php echo $select?>  > <?php echo $user->user_username?></option>
                    <?php }?>
                </select>
                <?php  echo $out['hidden'];?>
            </div>
        </div>
<!-------------------------------------------------  ------------------------------------------------------------->
<div class="row">
        <?php    foreach ($results_main as $main_row):
          $main_checked="";  if(in_array($main_row->page_id ,$user_per)){ $main_checked='checked="checked"';}
            ?>
        <div class=" col-md-3  pull-right">
        <div class="panel panel-success ">
            <div class="panel-heading">
                <h3 class="panel-title">		<?php  echo  $main_row->page_title?> </h3>
            </div>
<div class="panel-body">
<div id="page-wrap">
    <ul class="treeview">
        <li>
            <input type="checkbox" name="select-all[]" value="<?php  echo  $main_row->page_id."-".$main_row->level?>" <?php  echo  $main_checked?> >
            <label for="tall" class="custom-unchecked"><?php echo  $main_row->page_title?> </label>
            <?php if(sizeof($main_row->sub) >0){?>
                <ul>
                <?php foreach ($main_row->sub as $sub_row ){
                    $sub_checked="";  if(in_array($sub_row->page_id ,$user_per)){ $sub_checked='checked="checked"';}    ?>
                    <li>
                        <input type="checkbox" name="select-all[]" value="<?php echo $sub_row->page_id."-".$sub_row->level?>" <?php  echo  $sub_checked?> >
                        <label for="tall-2" class="custom-unchecked"><?php echo  $sub_row->page_title?></label>
                        <?php if(sizeof($sub_row->sub) >0){ ?>
                            <ul>
                                <?php foreach ($sub_row->sub as $sub_sub_row ){
                                    $sub_sub_checked="";  if(in_array($sub_row->page_id ,$user_per)){ $sub_sub_checked='checked="checked"';}         ?>
                                    <li>
                                        <input type="checkbox"name="select-all[]" value="<?php echo $sub_sub_row->page_id."-".$sub_sub_row->level?>" <?php  echo  $sub_sub_checked?> >
                                        <label for="tall-2-1" class="custom-unchecked" ><?php echo  $sub_sub_row->page_title?></label>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </li>
                <?php } ?>
                </ul>
            <?php } ?>
    </ul>
</div>

            </div>
        </div>
        </div>
        <?php endforeach;?>
</div>
<!-------------------------------------------------------------------------------------------------------------->
        <div class=" form-group" >
            <div class="col-xs-10 col-xs-pull-2">
                <button type="reset" class="btn btn-default">إبدأ من جديد ؟</button>
                <?php echo $out['input'];?>
            </div>
        </div>

        <?php echo form_close()?>
    </fieldset>
</div>
<?php if(isset($per_table) && !empty($per_table)):?>
    <table id="no-more-tables" class="table table-bordered" role="table">
        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>مجموعات لوحة التحكم</p></caption>
        <thead>
        <tr>
            <th width="2%">#</th>
            <th width="50%" class="text-right">المستخدم</th>
            <th width="20%" class="text-right">التحكم</th>
        </tr>
        </thead>
        <tbody>
        <?php $count=1; foreach($per_table as $role):?>
            <tr>
                <td data-title="#"><span class="badge"><?php echo $count++?></span></td>
                <td data-title="العنوان"> <?php if(isset($user_name[$role->user_id])){echo $user_name[$role->user_id];}else{'غير معرف';} ?> </td>
                <td data-title="التحكم" class="text-center">
                    <a href="<?php echo base_url().'dashboard/update_role/'.$role->user_id?>" class="btn btn-warning btn-xs col-lg-4"><i class="fa fa-pencil"></i> تعديل</a>
                    <a  href="<?php echo base_url().'dashboard/deleteRole/'.$role->user_id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs col-lg-4"><i class="fa fa-trash"></i> حذف</a>
                </td>
            </tr>
        <?php endforeach ;?>
        </tbody>
    </table>
<?php endif;?>

<script>
    $(function() {

        $('input[type="checkbox"]').change(checkboxChanged);

        function checkboxChanged() {
            var $this = $(this),
                checked = $this.prop("checked"),
                container = $this.parent(),
                siblings = container.siblings();

            container.find('input[type="checkbox"]')
                .prop({
                    indeterminate: false,
                    checked: checked
                })
                .siblings('label')
                .removeClass('custom-checked custom-unchecked custom-indeterminate')
                .addClass(checked ? 'custom-checked' : 'custom-unchecked');

            checkSiblings(container, checked);
        }

        function checkSiblings($el, checked) {
            var parent = $el.parent().parent(),
                all = true,
                indeterminate = false;

            $el.siblings().each(function() {
                return all = ($(this).children('input[type="checkbox"]').prop("checked") === checked);
            });

            if (all && checked) {
                parent.children('input[type="checkbox"]')
                    .prop({
                        indeterminate: false,
                        checked: checked
                    })
                    .siblings('label')
                    .removeClass('custom-checked custom-unchecked custom-indeterminate')
                    .addClass(checked ? 'custom-checked' : 'custom-unchecked');

                checkSiblings(parent, checked);
            } else if (all && !checked) {
                indeterminate = parent.find('input[type="checkbox"]:checked').length > 0;

                parent.children('input[type="checkbox"]')
                    .prop("checked", checked)
                    .prop("indeterminate", indeterminate)
                    .siblings('label')
                    .removeClass('custom-checked custom-unchecked custom-indeterminate')
                    .addClass(indeterminate ? 'custom-indeterminate' : (checked ? 'custom-checked' : 'custom-unchecked'));

                checkSiblings(parent, checked);
            } else {
                $el.parents("li").children('input[type="checkbox"]')
                    .prop({
                        indeterminate:false ,
                        checked: true
                    })
                    .siblings('label')
                    .removeClass('custom-checked custom-unchecked custom-indeterminate')
                    .addClass('custom-indeterminate');
            }
        }
    });

</script>
