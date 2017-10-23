
<ul class="breadcrumb pb30">
    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الأطباء</a></li>
    <li class="active"><?php echo $title; ?></li>
</ul>
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
    </span>
<div class="well bs-component" >
    <?php if(isset($result)):?>
        <?php echo form_open_multipart('dashboard/update_doctor/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ,'enctype'=>"multipart/form-data"))?>
        <fieldset>
         
            <?
            /*$this->db->select('*');
            $this->db->from('departments');
            $this->db->where('id',$result['main_dep_f_id']);
            $query = $this->db->get();
            $dataa= $query->row_array();


            $this->db->select('*');
            $this->db->from('departments');
            $this->db->where('main_dep_f_id',$dataa['id']);
            $query2 = $this->db->get();
            $dataa2= $query2->result();*/

            ?>


               <!----------------------------------->
            <div class="form-group">
            
                <label for="inputUser" class="col-lg-2 control-label">إسم الطبيب</label>
                <div class="col-lg-4 input-grup">
                    <input type="text"   name="name"    value="<? echo $result['name'] ;?>"  class="form-control text-right" placeholder="إسم الطبيب" >
                </div>
            </div>

     <div class="form-group">
             
                <label for="inputUser" class="col-lg-2 control-label">إسم القسم :</label>
                <div class="col-lg-4 input-grup">
              <select id="depart_id" name="depart_id" class="form-control text-right" required >
                      
                    <?php
                    
                    if(isset($departs))
                        foreach($departs as $depart){
                            if(isset($result['depart_id']) && $result['depart_id'] == $depart->id)
                                $select = 'selected';
                            else
                                $select = '';
                            echo '<option value="'.$depart->id.'" '.$select.'>'.$depart->dep_name.'</option>';
                        }
                    
                    ?>
                    </select>

                </div>
            </div>







            <div class="form-group">
                <label for="inputUser" class="col-lg-2 control-label">رقم الهوية :</label>
                <div class="col-lg-4 input-grup">
                    <input type="number"   name="id_card"  id="id_card"  value="<? echo $result['id_card'] ;?>" class="form-control text-right" placeholder="رقم الهوية" onkeyup="return num($('#id_number').val());" class="form-control"  >
                </div>
                <label for="inputUser" class="col-lg-2 control-label">تاريخ إنتهاء الهوية :</label>
                <div class="col-lg-4 input-grup">
                    <input type="date" id="popupDatepicker11"  name="id_number_date" value="<?php echo $result['id_number_date']; ?>"  class="form-control text-right" >
                </div>
            </div>
            <div id="optioneareazx"></div>
                <div class="form-group"  >
                    <label for="inputUser" class="col-lg-2 control-label">صورة الهوية :</label>
                    <div class="col-lg-10 input-grup">
                        <div class='col-lg-5'>
                        
                        <?php echo set_value($result['id_number_img'])?>
                            <input type="file" id="id_number_img" name="id_number_img"
                           
                             style="height: auto;" class="form-control text-right"/>
                        </div>
                       
                        <div class='col-lg-5' >
                            <img src="<?php echo base_url('uploads/images/'.$result['id_number_img'].''); ?>" height="50px" width="200px">
                        </div>

                        <span class="help-block"></span>
                    </div>
                </div>

            <div class="form-group">
                <label for="inputUser" class="col-lg-2 control-label">تاريخ الميلاد :</label>
                <div class="col-lg-4 input-grup">
                    <input type="date" id="popupDatepicker12"  name="birth_date" value="<?php echo $result['birth_date']; ?>"  class="form-control text-right"  >
                </div>
                <label for="inputUser" class="col-lg-2 control-label">العنوان :</label>
                <div class="col-lg-4 input-grup">
                    <input type="text"   name="address"  value="<?php echo $result['address']; ?>"   class="form-control text-right" placeholder="العنوان" >
                </div>
            </div>

            <div class="form-group">
                <label for="inputUser" class="col-lg-2 control-label">رقم الهاتف :</label>
                <div class="col-lg-4 input-grup">
                    <input type="number"   name="phone"   value="<?php echo $result['phone']; ?>"   class="form-control text-right" placeholder="رقم الهاتف" >
                </div>
                <label for="inputUser" class="col-lg-2 control-label">البريد الالكتروني :</label>
                <div class="col-lg-4 input-grup">
                    <input type="email"   name="email"   value="<?php echo $result['email']; ?>"   class="form-control text-right" placeholder="البريد الالكتروني" >
                </div>
            </div>

            <div class="form-group">
               
                <label for="inputUser" class="col-lg-2 control-label">تاريخ إنهاء العمل :</label>
                <div class="col-lg-4 input-grup">
                    <input type="date" id="popupDatepicker2"  name="date_end_job" value="<?php echo $result['date_end_job'];?>" class="form-control text-right" >
                </div>
            </div>

            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">قرار انهاء العمل :</label>
                <div class="col-lg-10 input-grup">
                    <div class='col-lg-5'>
                        <input type="file" id="decision_end_job"  style="height: auto" name="decision_end_job" class="form-control text-right"/>
                    </div>
                    <div class='col-lg-5' >
                        <img src="<?php echo base_url('uploads/images/'.$result['decision_end_job'].''); ?>" height="50px" width="200px">
                    </div>

                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">سبب إنهاء العمل:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>
                    <textarea type="text" id="reason_end_job"  name="reason_end_job" class="form-control text-right" placeholder="سبب إنهاء العمل" ><?php echo $result['reason_end_job']; ?></textarea>
                </div>
            </div>
                <div class="form-group"  >
                    <label for="inputUser" class="col-lg-2 control-label">صورة قرار التأمين الطبي :</label>
                    <div class="col-lg-10 input-grup">
                        <div class='col-lg-5'>
                            <input type="file" id="medical_insurance_img" name="medical_insurance_img" style="height: auto;" class="form-control text-right"/>
                        </div>
                        <div class='col-lg-5' >
                            <img src="<?php echo base_url('uploads/images/'.$result['medical_insurance_img'].''); ?>" height="50px" width="200px">

                        </div>

                        <span class="help-block"></span>
                    </div>
                </div>
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">التأمين الطبي :</label>
                <div class="col-lg-10 input-grup">
                    <div class='col-lg-5'>
                        <input type="date" id="popupDatepicker3"  name="medical_insurance_from"  value="<?php echo $result['medical_insurance_from']; ?>" class="form-control text-right" placeholder="من" >
                    </div>
                    <div class='col-lg-5'>
                        <input type="date" id="popupDatepicker4"  name="medical_insurance_to"  value="<?php echo $result['medical_insurance_from']; ?>" class="form-control text-right" placeholder="إلي" >
                    </div>
                </div>
            </div>

            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">تأمين ترخيص مزاولة المهنة :</label>
                <div class="col-lg-10 input-grup">
                    <div class='col-lg-5'>
                        <input type="date" id="popupDatepicker9"  name="insurance_professional_practice_from" value="<?php echo $result['insurance_professional_practice_from']; ?>" class="form-control text-right" placeholder="من" >
                    </div>
                    <div class='col-lg-5'>
                        <input type="date" id="popupDatepicker10"  name="insurance_professional_practice_to" value="<?php echo $result['insurance_professional_practice_to']; ?>" class="form-control text-right" placeholder="إلي" >
                    </div>
                </div>
            </div>
                <div class="form-group"  >
                    <label for="inputUser" class="col-lg-2 control-label">صورة قرار تأمين ترخيص مزاولة المهنة :</label>
                    <div class="col-lg-10 input-grup">
                        <div class='col-lg-5'>
                            <input type="file" id="insurance_professional_practice_img" style="height: auto;" name="insurance_professional_practice_img" class="form-control text-right"/>
                        </div>
                        <div class='col-lg-5' >
                            <img src="<?php echo base_url('uploads/images/'.$result['insurance_professional_practice_img'].''); ?>" height="50px" width="200px">

                        </div>

                        <span class="help-block"></span>
                    </div>
                </div>
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">الملف المرفق :</label>
                <div class="col-lg-10 input-grup">
                    <div class='col-lg-5'>
                        <input type="file" id="insurance_professional_practice_attachment" style="height: auto" name="insurance_professional_practice_attachment" class="form-control text-right"/>
                    </div>
                    <div class='col-lg-5' style="margin-top: 12px;">
                        <a  href="<?echo $result['insurance_professional_practice_attachment'] ;?>" >download</a>
                    </div>

                    <span class="help-block"></span>
                </div>
            </div>


            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">تأمين إنتهاء بطاقة التصنيف المهني :</label>
                <div class="col-lg-10 input-grup">
                    <div class='col-lg-5'>
                        <input type="date" id="popupDatepicker5"  name="insurance_risk_from" value="<?php echo $result['insurance_risk_from']; ?>" class="form-control text-right" placeholder="من" >
                    </div>
                    <div class='col-lg-5'>
                        <input type="date" id="popupDatepicker6"  name="insurance_risk_to" value="<?php echo $result['insurance_risk_to']; ?>" class="form-control text-right" placeholder="إلي" >
                    </div>
                </div>
            </div>
                <div class="form-group"  >
                    <label for="inputUser" class="col-lg-2 control-label">صورة قرار إنتهاء بطاقة التصنيف المهني :</label>
                    <div class="col-lg-10 input-grup">
                        <div class='col-lg-5'>
                            <input type="file" id="insurance_risk_img" name="insurance_risk_img" style="height: auto;" class="form-control text-right"/>
                        </div>
                        <div class='col-lg-5' >
                            <img src="<?php echo base_url('uploads/images/'.$result['insurance_risk_img'].''); ?>" height="50px" width="200px">
                        </div>

                        <span class="help-block"></span>
                    </div>
                </div>


            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">بطاقة المهن الطبية :</label>
                <div class="col-lg-10 input-grup">
                    <div class='col-lg-5'>
                        <input type="date" id="popupDatepicker7"  name="medical_professional_card_from" value="<?php echo $result['medical_professional_card_from']; ?>" class="form-control text-right" placeholder="من" >
                    </div>
                    <div class='col-lg-5'>
                        <input type="date" id="popupDatepicker8"  name="medical_professional_card_to"  value="<?php echo $result['medical_professional_card_to']; ?>"  class="form-control text-right" placeholder="إلي" >
                    </div>
                </div>
            </div>
                <div class="form-group">
                    <label for="inputUser" class="col-lg-2 control-label">تاريخ إنتهاءعقد العمل:</label>
                    <div class="col-lg-10 input-grup">
                    <div class="col-lg-5 input-grup">
                        <input type="date" id="popupDatepicker14"  name="job_contract_end_date" value="<?php echo $result['date_end_job']; ?>"  class="form-control text-right" >
                    </div></div>
                </div>
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">عقد العمل :</label>
                <div class="col-lg-10 input-grup">
                    <div class='col-lg-5'>
                        <input type="file" id="job_contract" name="job_contract"  style="height: auto;" class="form-control text-right"/>
                    </div>
                    <div class='col-lg-5' style="margin-top: 12px;" >
                        <a  href="<?echo $result['job_contract'] ;?>">download</a>
                    </div>

                    <span class="help-block"></span>
                </div>
            </div>
                <div class="form-group"  >
                    <label for="inputUser" class="col-lg-2 control-label">صورة قرار إنتهاء عقد العمل :</label>
                    <div class="col-lg-10 input-grup">
                        <div class='col-lg-5'>
                            <input type="file" id="job_contract_img" name="job_contract_img" style="height: auto;" class="form-control text-right"/>
                        </div>
                        <div class='col-lg-5' >
                            <img src="<?php echo base_url('uploads/images/'.$result['job_contract'].''); ?>" height="50px" width="200px">
                        </div>

                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group"  >
                    <label for="inputUser" class="col-lg-2 control-label">صورة شهادة التصنيف:</label>
                    <div class="col-lg-10 input-grup">
                        <div class='col-lg-5'>
                            <input type="file" id="rating_img" name="rating_img" style="height: auto;" class="form-control text-right"/>
                        </div>
                        <div class='col-lg-5' >
                            <img src="<?php echo base_url('uploads/images/'.$result['rating_img'].''); ?>" height="50px" width="200px">
                        </div>

                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputUser" class="col-lg-2 control-label">تاريخ إنتهاءالترخيص :</label>
                    <div class="col-lg-10 input-grup">
                    <div class="col-lg-5 input-grup">
                        <input type="date" id="popupDatepicker15"  name="license_end_date" value="<?echo $result['license_end_date'] ;?>" class="form-control text-right" placeholder="تاريخ إنتهاءالترخيص" >
                    </div></div>
                </div>
                <div class="form-group"  >
                    <label for="inputUser" class="col-lg-2 control-label">صورة قرار  إنتهاءالترخيص :</label>
                    <div class="col-lg-10 input-grup">
                        <div class='col-lg-5'>
                            <input type="file" id="license_end_img" name="license_end_img" style="height: auto;" class="form-control text-right"/>
                        </div>
                        <div class='col-lg-5'>
                            <img src="<?php echo base_url('uploads/images/'.$result['license_end_img'].''); ?>" height="50px" width="200px">
                        </div>

                        <span class="help-block"></span>
                    </div>
                </div>
            <!------------------------------->


            <div class="form-group" >
                <div class="col-xs-10 col-xs-pull-2">
                    <input type="submit" name="update" value="حفظ" class="btn btn-primary" >
                </div>
            </div>
        </fieldset>
        <?php echo form_close()?>
    <?php else: ?>
        <?php echo form_open_multipart('dashboard/add_doctor',array('class'=>"form-horizontal",'enctype'=>"multipart/form-data" ))?>
    
   
        <fieldset>
            <legend ><?php echo $title; ?></legend>
            
            <div class="form-group">
             
                <label for="inputUser" class="col-lg-2 control-label">إسم الطبيب :</label>
                <div class="col-lg-4 input-grup">
                    <input type="text"   name="name"    class="form-control text-right" placeholder="إسم الطبيب" >
                </div>
            </div>


     <div class="form-group">
             
                <label for="inputUser" class="col-lg-2 control-label">إسم القسم :</label>
                <div class="col-lg-4 input-grup">
                     <select class="form-control" id="depart_id" name="depart_id"  required />
                  <option value="">--قم بإختيار القسم--</option>
                  <?php
                  if(isset($departs)){
                    foreach($departs as $depart)
                        echo '<option value="'.$depart->id.'">'.$depart->dep_name.'</option>';
                  }
                  ?>
                  </select>

                </div>
            </div>




            <div class="form-group">
                <label for="inputUser" class="col-lg-2 control-label">رقم الهوية :</label>
                <div class="col-lg-4 input-grup">
                    <input type="number"   name="id_card"  id="id_card"  class="form-control text-right" placeholder="رقم الهوية" onkeyup="return num($('#id_number').val());" class="form-control"  >
                </div>
                <div class="input-grup">
                    <label for="inputUser" class="col-lg-2 control-label">تاريخ إنتهاء الهوية :</label>
                    <div class="col-lg-4 input-grup">
                        <input type="date" id="popupDatepicker11"  name="id_number_date" class="form-control text-right" placeholder="تاريخ إنتهاء الهوية" >
                    </div>
                </div>
            </div>
            <div id="optioneareazx"></div>
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">صورة الهوية :</label>
                <div class="col-lg-10 input-grup">
                    <div class='col-lg-5'>
                        <input type="file" id="id_number_img" name="id_number_img"  class="form-control text-right"/>
                    </div>
                    <div class='col-lg-5' style="margin-top: 10px;color: red">
                        <p>برجاء إرفاق صورة </p>
                    </div>

                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label for="inputUser" class="col-lg-2 control-label">تاريخ الميلاد :</label>
                <div class="col-lg-4 input-grup">
                    <input type="date" id="popupDatepicker12"  name="birth_date" class="form-control text-right" placeholder="تاريخ الميلاد" >
                </div>
                <label for="inputUser" class="col-lg-2 control-label">العنوان :</label>
                <div class="col-lg-4 input-grup">
                    <input type="text"   name="address"    class="form-control text-right" placeholder="العنوان" >
                </div>
            </div>

            <div class="form-group">
                <label for="inputUser" class="col-lg-2 control-label">رقم الهاتف :</label>
                <div class="col-lg-4 input-grup">
                    <input type="number"   name="phone"    class="form-control text-right" placeholder="رقم الهاتف" >
                </div>
                <label for="inputUser" class="col-lg-2 control-label">البريد الالكتروني :</label>
                <div class="col-lg-4 input-grup">
                    <input type="email"   name="email"    class="form-control text-right" placeholder="البريد الالكتروني" >
                </div>
            </div>
           <div class="form-group">
              
                <label for="inputUser" class="col-lg-2 control-label">تاريخ إنهاء العمل :</label>
                <div class="col-lg-4 input-grup">
                    <input type="date" id="popupDatepicker2"  name="date_end_job" class="form-control text-right" placeholder="تاريخ إنهاء العمل" >
                </div>
            </div>
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">قرار انهاء العمل :</label>
                <div class="col-lg-10 input-grup">
                    <div class='col-lg-5'>
                        <input type="file" id="decision_end_job" name="decision_end_job" style="height: auto;" class="form-control text-right"/>
                    </div>
                    <div class='col-lg-5' style="margin-top: 10px;color: red">
                        <p>برجاء إرفاق صورة </p>
                    </div>

                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">سبب إنهاء العمل:</label>
                <div class="col-lg-10 input-grup">
                    <i class="fa fa-newspaper-o"></i>
                    <textarea type="text" id="reason_end_job"  name="reason_end_job" class="form-control text-right" placeholder="نبذة مختصرة" ></textarea>
                </div>
            </div>
<div class="form-group"  >
<label for="inputUser" class="col-lg-2 control-label">صورة قرار التأمين الطبي :</label>
<div class="col-lg-10 input-grup">
    <div class='col-lg-5'>
        <input type="file" id="medical_insurance_img" name="medical_insurance_img" class="form-control text-right"/>
    </div>
    <div class='col-lg-3' style="margin-top: 10px;color: red">
        <p>برجاء إرفاق صورة </p>
    </div>

    <span class="help-block"></span>
</div>
</div>






            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">التأمين الطبي :</label>
                <div class="col-lg-10 input-grup">
                    <div class='col-lg-5'>
                        <input type="date" id="popupDatepicker3"  name="medical_insurance_from" class="form-control text-right" placeholder="من" >
                    </div>
                    <div class='col-lg-5'>
                        <input type="date" id="popupDatepicker4"  name="medical_insurance_to" class="form-control text-right" placeholder="إلي" >
                    </div>
                </div>
            </div>


            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">تأمين ترخيص مزاولة المهنة :</label>
                <div class="col-lg-10 input-grup">
                    <div class='col-lg-5'>
                        <input type="date" id="popupDatepicker9"  name="insurance_professional_practice_from" class="form-control text-right" placeholder="من" >
                   

				   </div>
                    <div class='col-lg-5'>
                        <input type="date" id="popupDatepicker10"  name="insurance_professional_practice_to" class="form-control text-right" placeholder="إلي" >
                  
				  </div>
                </div>
            </div>
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">صورة قرار تأمين ترخيص مزاولة المهنة :</label>
                <div class="col-lg-10 input-grup">
                    <div class='col-lg-5'>
                        <input type="file" id="insurance_professional_practice_img" style="height: auto;" name="insurance_professional_practice_img" class="form-control text-right"/>
                    </div>
                    <div class='col-lg-5' style="margin-top: 10px;color: red">
                        <p>برجاء إرفاق صورة </p>
                    </div>

                    <span class="help-block"></span>
                </div>
            </div>
<div class="form-group"  >
<label for="inputUser" class="col-lg-2 control-label">الملف المرفق :</label>
<div class="col-lg-10 input-grup">
<div class='col-lg-5'>
<input type="file" id="insurance_professional_practice_attachment" style="height: auto;"  name="insurance_professional_practice_attachment" class="form-control text-right"/>
</div>
<div class='col-lg-5' style="margin-top: 10px;color: red">
<p>برجاء إدخال ملف ( PDF ) </p>
</div>

<span class="help-block"></span>
</div>
</div>
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">تأمين إنتهاء بطاقة التصنيف المهني :</label>
                <div class="col-lg-10 input-grup">
                    <div class='col-lg-5'>
                        <input type="date" id="popupDatepicker5"  name="insurance_risk_from" class="form-control text-right" placeholder="من" >
                    </div>
                    <div class='col-lg-5'>
                        <input type="date" id="popupDatepicker6"  name="insurance_risk_to" class="form-control text-right" placeholder="إلي" >
                    </div>
                </div>
            </div>
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">صورة قرار إنتهاء بطاقة التصنيف المهني :</label>
                <div class="col-lg-10 input-grup">
                    <div class='col-lg-5'>
                        <input type="file" id="insurance_risk_img" name="insurance_risk_img" style="height: auto;" class="form-control text-right"/>
                    </div>
                    <div class='col-lg-5' style="margin-top: 10px;color: red">
                        <p>برجاء إرفاق صورة </p>
                    </div>

                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">بطاقة المهن الطبية :</label>
                <div class="col-lg-10 input-grup">
                    <div class='col-lg-5'>
                        <input type="date" id="popupDatepicker7"  name="medical_professional_card_from" class="form-control text-right" placeholder="من" >
                    </div>
                    <div class='col-lg-5'>
                        <input type="date" id="popupDatepicker8"  name="medical_professional_card_to" class="form-control text-right" placeholder="إلي" >
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="inputUser" class="col-lg-2 control-label">تاريخ إنتهاءعقد العمل:</label>
                <div class="col-lg-10 input-grup">
                <div class="col-lg-5 input-grup">
                    <input type="date" id="popupDatepicker14"  name="job_contract_end_date" class="form-control text-right" placeholder="تاريخ إنتهاءعقد العمل" >
                </div>
                </div>
            </div>
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">عقد العمل :</label>
                <div class="col-lg-10 input-grup">
                    <div class='col-lg-5'>
                        <input type="file" id="job_contract" name="job_contract" style="height: auto;" class="form-control text-right"/>
                    </div>
                    <div class='col-lg-5' style="margin-top: 10px;color: red">
                        <p>برجاء إدخال ملف ( PDF ) </p>
                    </div>

                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">صورة قرار إنتهاء عقد العمل :</label>
                <div class="col-lg-10 input-grup">
                    <div class='col-lg-5'>
                        <input type="file" id="job_contract_img" name="job_contract_img" style="height: auto;" class="form-control text-right"/>
                    </div>
                    <div class='col-lg-5' style="margin-top: 10px;color: red">
                        <p>برجاء إرفاق صورة </p>
                    </div>

                    <span class="help-block"></span>
                </div>
            </div>
            
            
            
            
            
            

            
            
            
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">صورة شهادة التصنيف:</label>
                <div class="col-lg-10 input-grup">
                    <div class='col-lg-5'>
                        <input type="file" id="rating_img" name="rating_img" style="height: auto;" class="form-control text-right"/>
                    </div>
                    <div class='col-lg-5' style="margin-top: 10px;color: red">
                        <p>برجاء إرفاق صورة </p>
                    </div>

                    <span class="help-block"></span>
                </div>
            </div>
                <div class="form-group">
                    <label for="inputUser" class="col-lg-2 control-label">تاريخ إنتهاءالترخيص :</label>
                    <div class="col-lg-10 input-grup">
                    <div class="col-lg-5 input-grup">
                        <input type="date" id="popupDatepicker15"  name="license_end_date" class="form-control text-right" placeholder="تاريخ إنتهاءالترخيص" >
                    </div></div>
                </div>
            
            <div class="form-group"  >
                <label for="inputUser" class="col-lg-2 control-label">صورة قرار  إنتهاءالترخيص :</label>
                <div class="col-lg-10 input-grup">
                    <div class='col-lg-5'>
                        <input type="file" id="license_end_img" name="license_end_img" style="height: auto;" class="form-control text-right"/>
                    </div>
                    <div class='col-lg-5' style="margin-top: 10px;color: red">
                        <p>برجاء إرفاق صورة </p>
                    </div>

                    <span class="help-block"></span>
                </div>
            </div>
            <!------------------------------->
            <br><br><br>
            <div class="form-group" >
                <div class="col-xs-10 col-xs-pull-2">
                    <button type="reset" class="btn btn-default">أبدء من جديد ؟</button>
                    <input type="submit"  name="add" value="حفظ"  class="btn btn-primary" >
                </div>
            </div>
        </fieldset>
        <?php echo form_close()?>
    <?php endif?>
</div>
<?php if(isset($records)&&$records!=null):?>
    <table id="no-more-tables" class="table table-bordered" role="table">
        <caption class="text-right text-success"><i class="fa fa-table fa-fw"></i>لوحة التحكم في الإدارة.</p></caption>
        <thead>
        <tr>
            <th width="2%">#</th>
            <th  width="30%"class="text-right">اسم الطبيب</th>
            <th width="20%" class="text-right">التحكم</th>
           
            <th width="20" class="text-right">التفاصيل</th>
        </tr>
        </thead>
        <tbody>
        <?php $serial = 0; ?>
        <?php foreach($records as $record):
            $serial++;
            if($record->suspend == 1)
            {
                $class = 'success';
                $title = 'نشط';
            }
            else
            {
                $class = 'danger';
                $title = 'غير نشط';
            }
            ?>

            <tr>
                <td data-title="#"><span class="badge"><?php echo $serial?></span></td>

                    <td ><? echo $record->name; ?></td>
                <td data-title="التحكم" class="text-center">
                    <a href="<?php echo base_url().'dashboard/update_doctor/'.$record->id?>" class="btn btn-warning btn-xs "><i class="fa fa-pencil"></i> تعديل</a>
                    <a  href="<?php echo base_url().'dashboard/delete_doc/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   "><i class="fa fa-trash"></i> حذف</a>
                </td>
             <!--   <td data-title="" class="text-center">
                    <a href="<?php echo base_url().'dashboard/suspend_employ/'.$record->id.'/'.$class?>" class="btn btn-<?php echo $class ?> btn-xs col-lg-6"><?php echo $title ?> </a>
                </td>-->
                <td> <button type="button" class="btn btn-info btn-xs " data-toggle="modal" data-target="#myModal<?php echo $record->id?>"><i class="fa fa-list"></i> التفاصيل </button></td>

            </tr>
            <div class="modal fade" id="myModal<?php echo $record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">تفاصيل الطبيب : ( <? echo $record->name; ?>)</h4>
                        </div>
                        <div class="row" style="margin-right:10px">
                            <div class="col-sm-3">
                                <h5> إسم الطبيب:</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5><? echo $record->name; ?></h5>
                            </div>
                        </div>
                    
                    <!--  <div class="row" style="margin-right:10px">
                            <div class="col-sm-3">
                                <h5>إسم القسم:</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5><? echo $employ_sub_depart[$record->sub_dep_f_id][0]->sub_dep_name; ?></h5>
                            </div>
                        </div>-->
                    

                        <div class="row" style="margin-right:10px">
                            <div class="col-sm-3">
                                <h5>رقم الهوية:</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5><? echo $record->id_card; ?></h5>
                            </div>
                        </div>
                        <div class="row" style="margin-right:10px">
                            <div class="col-sm-3">
                                <h5>تاريخ الميلاد:</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5><? echo $record->birth_date; ?></h5>
                            </div>
                        </div>
                        <div class="row" style="margin-right:10px">
                            <div class="col-sm-3">
                                <h5>العنوان:</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5><? echo $record->address; ?></h5>
                            </div>
                        </div>
                        <div class="row" style="margin-right:10px">
                            <div class="col-sm-3">
                                <h5>رقم الهاتف:</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5><? echo $record->phone; ?></h5>
                            </div>
                        </div>
                        <div class="row" style="margin-right:10px">
                            <div class="col-sm-3">
                                <h5>البريد الإلكتروني:</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5><? echo $record->email; ?></h5>
                            </div>
                        </div>
                     
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach ;?>
        </tbody>
    </table>
    <div class="col-xs-12 mt30 text-center">
        <?php echo  $links?>
    </div>
<?php endif;?>
<!--------------------------------------------->
<script>
    function rent(valu)
    {
        if(valu)
        {
            var dataString = 'valu=' + valu;

            $.ajax({

                type:'post',
                url: '<?php echo base_url() ?>/dashboard/add_doctors',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#optionearea2').html(html);
                }
            });
            return false;
        }
        else
        {
            $('#optionearea2').html('');
            return false;
        }

    }
</script>
<!--------------------------------------------->
<script>


    function go(values)
    {
        if(values != '0')
        {
            var dataString = 'values=' + values;

            $.ajax({

                type:'post',
                url: '<?php echo base_url() ?>/dashboard/add_doctors',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#optionearea3').html(html);
                }
            });
            return false;
        }
        else
        {
            $('#optionearea3').html('');
            return false;
        }

    }
</script>
<!---------------------------------------------->
<script>


    function num(numbers)
    {
        if(numbers)
        {
            var dataString = 'numbers=' + numbers;

            $.ajax({

                type:'post',
                url: '<?php echo base_url() ?>/dashboard/add_doctors',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#optioneareazx').html(html);
                }
            });
            return false;
        }
        else
        {
            $('#optioneareazx').html('');
            return false;
        }

    }
</script>