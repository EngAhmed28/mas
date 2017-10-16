 <div class="n-new" style="min-height: 420px;" >
        <div class="container">
            <div class="row ">
                <a href="#">
                    <h1>
                         <span><i class="fa fa-picture-o" aria-hidden="true"></i>
                         </span> معرض الصور
                   </h1>
                </a>
            </div>
            <br/>
                <div class="photo-details">
                      <div class="row ">
            
              <?php 
            
                                if($photos){  
                               for($x=0;$x<count($photos);$x++){
                                $arr=unserialize($photos[$x]->img);
                               for($r=0;$r<count($arr);$r++){
                                $ww=$arr[$r];
                                $array[] =$ww ;
                               
                               }
                               }
                             //  var_dump($array);
                                    echo'';
                                $it=0;
                                for($t=0;$t<count($array);$t++){
                                  
                                    echo' 
                                        
                                        
                     <div class="col-md-3 col-sm-6">
                    <div class="thumbnail">
                        
                        <img  src = "'. base_url()  .'/uploads/images/'.$array[$t].'" alt="" class="img-thumbnail">
                    </div>
                </div>
                                       
                                       
               <div tabindex="-1" class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" type="button" data-dismiss="modal">×</button>
                        
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
                                       
                                         ';
                                }
                               echo'
                               ';
                               }?>
           
              
            </div>


        </div>
        </div>
    </div>
    
                  <div class="text-center">

            

            <?php

                

                

                    echo $links;

                

                

                

            ?>

            

            </div>