


    <!-- News -->

    <!-------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------->
    <div class="n-new" style="min-height: 420px;">
        <div class="container">
            <div class="row ">
                <a href="#">
                    <h1>
                         <span><i class="fa  fa-newspaper-o" aria-hidden="true"></i>
                         </span>ألماس فى الصحافة
                   </h1>
                </a>
            </div>
            <br />
            <div class="row">
                <div class="col-md-12 col-sm-12">
                
                <?php
                
                      if(is_array($records)){ 
                 foreach($records as $newss): ?>
              
                   <?php  
                   
                //   var_dump($newss->image);
                   $photo=unserialize($newss->image);
       $img = base_url('uploads/images').'/'.$photo[0]; ?>
       
                
                   <div class="row">
                        <div class="col-md-2 col-sm-6">
                            <img style="width: 150px; height: 150px;" src="<?php echo  base_url('uploads/images').'/'.$newss->logo?>" alt="" class="img-responsive">
                        </div>

                        <div class="col-md-8 col-sm-6">
                            <a   href="<?php echo base_url('web').'/news_details/'. $newss->id.'/'. $newss->type?>">
                                <h3><?php echo $newss->title?></h3> </a>
                             <p> بتاريخ  :   <?php echo $newss->date?></p>
                                <p><?php echo word_limiter($newss->content,20)?>
                                </p>
                        </div>
                    </div>
                    <br />
                <?php endforeach;
                
                }?>
                 
                
                </div>
            </div>
        </div>
    </div>
    <!-------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------->
              <div class="text-center">

            

            <?php

                

                

                    echo $links;

                

                

                

            ?>

            

            </div>
