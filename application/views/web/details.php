
    <!-------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------->
    <div class="offer-details " style="min-height: 420px;">
        <div class="container">
            <div class="row tab">
                <a href="#">
                    <h1>
                         <span><i class="fa fa-bookmark" aria-hidden="true"></i>
                         </span>تفاصيل العروض 
                   </h1>
                </a>
            </div>
            <?php 
            if(is_array($records2)){ 
                foreach($records2 as $record):

                ?> 
            <div class="row tab">
                <div class="col-md-2 col-sm-5">
                
                <?php
                
                  $photo=unserialize($record->image);


                    echo '<img style="width: 150px; height: 150px;"  src="'.base_url('uploads/images/'.$photo[0].'').'"  alt="" class="img-responsive">';

                ?>
                </div>
                <div class="col-md-8 col-sm-7">
                   <a href="<?php echo base_url('web').'/details/'.$record->id.'/'.$record->type ?>">   <h6 > <?php echo $record->title?></h6></a>
                    <h6>بتاريخ <?php echo $record->date?></h6>
                 
            
              <p><?php echo word_limiter($record->content,20)?></p>
             
                
                </div>
            </div>
           
<?php  endforeach;
} ?>

        </div>
    </div>
    <!-------------------------------------------------------------------------------------->
    
                <div class="text-center">

            

            <?php

                

                

                    echo $links;

                

                

                

            ?>

            

            </div>
    <!-------------------------------------------------------------------------------------->

    <!-- logos -->
  
    <!-- logos -->

    <!-- footer -->
