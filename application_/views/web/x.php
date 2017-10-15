

<?php
if($all != null){
   
  foreach($all as $alls){
     //var_dump();
   
 // $img = ;
echo '<div class="col-md-3 col-sm-6 col-xs-12 soo">
                    <img src="'.base_url('uploads/images').'/'.$alls->img.'" alt="">
                    <h3> '.$alls->name.'</h3>
                    <button  class="btn btn-default" type="submit" data-target="#myModal'.$alls->id.'" data-toggle="modal">البيانات</button>
                
                    <a href="'.base_url().'web/ask_doctor/'.$alls->id.''.'" class="btn btn-warning" style="background-color: #f0ad4e !important;" >اسال طبيبك</a>
                    <div class="modal fade" id="myModal'.$alls->id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                </div>
                                <div class="modal-body">
                                    <img src="'.base_url('uploads/images').'/'.$alls->img.'" alt="">
                                    
                                    <h3> الأسم :'.$alls->name.'</h3>
                                   
                                    <h3> الجوال :'.$alls->phone.'</h3>
                                   
                                     <h3> التخصص :'.$alls->major.'</h3>
                                    
                                     <h3> الإيميل :'.$alls->email.'</h3>
                                    
                                     <h3> تفاصيل أخري :'.$alls->other.'</h3>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
  
}


}else{
    
}

?>