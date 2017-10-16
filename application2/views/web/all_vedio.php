 <div class="n-new" style="min-height: 420px;">
        <div class="container">
            <div class="row ">
                <a href="#">
                    <h1>
                         <span><i class="fa fa-video-camera" aria-hidden="true"></i>
                         </span> الفديوهات
                   </h1>
                </a>
            </div>
            <br/>
                      <div class="row ">
            
              <?php
              
                 if(is_array($all_vedio)){ 
                    foreach($all_vedio  as $vedio):?>
                 <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="video">
                        <iframe width="255" height="250" src="https://www.youtube.com/embed/<?php echo $vedio->link ?>" frameborder="0" allowfullscreen class="center-block">
                        </iframe>
                       
                            <h5 class="text-center"><?php echo $vedio->name?></h5>
                       
                    </div>
                </div>
              <?endforeach;
              }?>
             
             
           
              
            </div>


        </div>
    </div>
                    <div class="text-center">

            

            <?php

                

                

                    echo $links;

                

                

                

            ?>

            

            </div>