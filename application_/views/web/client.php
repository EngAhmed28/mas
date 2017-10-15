 <div class="n-new" style="min-height: 420px;">
        <div class="container">
            <div class="row ">
                <a href="#">
                    <h1>
                         <span><i class="fa fa-pencil-square" aria-hidden="true"></i>
                         </span>عملائنا 
                   </h1>
                </a>
            </div>
            
                      <div class="row ">
                      
                      <?php 
                                if(is_array($records7)){      
                                
                                for($e=0;$e<count($records7);$e++){
                                    
                                    if($e==0){
                                        $ee="active";
                                    }else{
                                          $ee=""; 
                                    }
                                    
                                    echo '  <div class="item '.$ee.'">
                                            <div class="col-md-3 ">
                                              <img style="width: 250px; height: 220px;" src = "'. base_url()  .'/uploads/images/'.$records7[$e]->img.'" class="img-thumbnail">
                                                <div class="text-center">'.$records7[$e]->name.'</div>
                                            </div>
                                        </div>
                                        
                                                                 
                         ';
                                    
                                }
                                }?>
            
             
           
              
            </div>


        </div>
    </div>
    
              <div class="text-center">

            

            <?php

                

                

                    echo $links;

                

                

                

            ?>

            

            </div>