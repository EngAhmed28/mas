<?php

$ci=&get_instance();

$ci->load->model('Roles');

$grouparr=$ci->Roles->selectgroups();

?>

<h2 class="text-flat">رئيسية التحكم <span class="text-sm"><?php echo $title; ?></span></h2>

    <ul class="breadcrumb pb30">

        <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>

        

        <li class="active"><?php echo $title; ?></li>

    </ul>

    <span id="message">

<?php

if(isset($_SESSION['message']))

    echo $_SESSION['message'];

unset($_SESSION['message']);

?>

</span>

    <div class="well bs-component" data-sr="wait 0s, then enter left and hustle 100%">

<?php if(isset($role_data)):?>

       <!-- <form class="form-horizontal">-->

            <?php echo form_open('dashboard/update_role/'.$role_data['role_id_pk'],array('class'=>'form-horizontal','id'=>'addgroupform'))?>

    <fieldset>

        <legend data-sr="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>

        <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">

            <label for="inputUser" class="col-lg-2 control-label">إسم الدور</label>

            <div class="col-lg-10 input-grup">

                <i class="fa fa-sitemap"></i>

                <input type="text" id="role_name" value="<?php echo $role_data['role_name']?>" name="role_name" class="form-control text-right" placeholder="إسم  الدور">

                <span class="help-block">هذة الأدوار لتحديد صلاحيات مشتركي النظام فيجب كتابتها بعناية</span>

            </div>

        </div>

        <legend data-sr="wait 0.3s, then enter bottom and hustle 100%">صلاحيات الدور</legend>

        <div class="form-group" data-sr="wait 0.3s, then enter bottom and hustle 100%">

            <div class="col-lg-12">

                <?php $permetedpages=$ci->Roles->get_permted_pages($role_data['role_id_pk']);

                ?>

                <?php foreach($grouparr as $group):?>

                    <div class="checkbox">

                        <div class="mt50 alert alert-success" style="margin-top: 0px;padding: 10px;margin-bottom: 10px;">

                            <p><?php echo $group->group_title?></p>

                        </div>

                        <?php $pagesarr=$ci->Roles->selectpages($group->group_id);?>

                        <?php foreach($pagesarr as $page):?>

                            <label><?php echo $page->page_title?></label>

                                <input type="checkbox"   name="page_id_fk[]" value="<?php echo $page->page_id?>" data-style="android" data-size="mini" data-toggle="toggle" data-onstyle="danger" data-offstyle="default" data-on="تفعيل" data-off="تعطيل" data-width="70">

                        <?php endforeach?>

                    </div>

                <?php endforeach?>

            </div>

        </div>

        <div class="form-group" data-sr="wait 0.3s, then enter bottom and hustle 100%">

            <div class="col-xs-10 col-xs-pull-2">

                <button type="reset" class="btn btn-default">إبدأ من جديد ؟</button>

                <button type="submit" name="edit_role" value="edit" class="btn btn-primary">حفظ</button>

            </div>

        </div>

    </fieldset>       <!-- </form>-->

        <?php echo form_close()?>

        <?php else: ?>

        <?php echo form_open('dashboard/create_role',array('class'=>'form-horizontal'))?>

        <fieldset>

            <legend data-sr="wait 0.3s, then enter left and hustle 100%"><?php echo $title; ?></legend>

            <div class="form-group" data-sr="wait 0.6s, then enter bottom and hustle 100%">

                <label for="inputUser" class="col-lg-2 control-label">إسم الدور</label>

                <div class="col-lg-10 input-grup">

                    <i class="fa fa-sitemap"></i>

                    <input type="text" id="role_name" name="role_name" class="form-control text-right" placeholder="إسم  الدور">

                    <span class="help-block">هذة الأدوار لتحديد صلاحيات مشتركي النظام فيجب كتابتها بعناية</span>

                </div>

            </div>

        <legend data-sr="wait 0.3s, then enter bottom and hustle 100%">صلاحيات الدور</legend>

        <div class="form-group" data-sr="wait 0.3s, then enter bottom and hustle 100%">

            <div class="col-lg-12">

                <?php foreach($grouparr as $group):?>

           <div class="checkbox">

               <div class="mt50 alert alert-success" style="margin-top: 0px;padding: 10px;margin-bottom: 10px;">

                   <p><?php echo $group->group_title?></p>

               </div>

               <?php

               $pagesarr=$ci->Roles->selectpages($group->group_id);

               foreach($pagesarr as $page):

               ?>

                        <label><?php echo $page->page_title?></label>

                        <input type="checkbox"  name="page_id_fk[]" value="<?php echo $page->page_id?>" data-style="android" data-size="mini" data-toggle="toggle" data-onstyle="danger" data-offstyle="default" data-on="تفعيل" data-off="تعطيل" data-width="70">

               <?php endforeach?>

           </div>

        <?php endforeach?>

            </div>

        </div>

        <div class="form-group" data-sr="wait 0.3s, then enter bottom and hustle 100%">

            <div class="col-xs-10 col-xs-pull-2">

                <button type="reset" class="btn btn-default">إبدأ من جديد ؟</button>

                <button type="submit" name="add_role" value="add" class="btn btn-primary">حفظ</button>

            </div>

        </div>

    </fieldset>

        <!-- </form>-->

        <?php echo form_close()?>

        <?php endif?>

    </div>

<?php if($roles !=''):?>

    <table id="no-more-tables" class="table table-bordered" role="table">

        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>مجموعات لوحة التحكم</p></caption>

        <thead>

        <tr>

            <th width="2%">#</th>

            <th width="50%" class="text-right">العنوان</th>

            <th width="20%" class="text-right">التحكم</th>

        </tr>

        </thead>

        <tbody>

        <?php
        
        $x=0;
         foreach($roles as $role):
         
         $x++;
         ?>

        <tr>

            <td data-title="#"><span class="badge"><?php echo $x?></span></td>

            <td data-title="العنوان"> <?php echo $role->role_name?> </td>

            <td data-title="التحكم" class="text-center">

                <a href="<?php echo base_url().'dashboard/update_role/'.$role->role_id_pk?>" class="btn btn-warning btn-xs col-lg-4"><i class="fa fa-pencil"></i> تعديل</a>

                <a  href="<?php echo base_url().'dashboard/deleteRole/'.$role->role_id_pk?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs col-lg-4"><i class="fa fa-trash"></i> حذف</a>

            </td>

        </tr>

        <?php endforeach ;?>

        </tbody>

    </table>



<?php endif;?>

