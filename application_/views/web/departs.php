
    <!-------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------->
 
 <?php if($records){
    
  ?>
    <div class="news-details">
        <div class="container">
            <div class="row">
                <a href="#">
                    <h1>
                         <span><i class="fa fa-newspaper-o" aria-hidden="true"></i>
                         </span> تفاصيل   <?php echo($records['name'])?> </h1>
                </a>
            </div>
            <div class="row">
                <div class="col-md-7 col-sm-7 ">
                    <a href="">
                        <h3></h3>
                        <h6></h6>
        
                        <img style="width:100%; height: 250px;" src="<?php echo base_url('uploads/images').'/'.$records['img'].'' ?>" alt="" width="400" class="img-responsive">
                    </a>
                    <p> <?php echo $records['content']; ?> </p>
                   
                </div>
                <div class="col-md-1 col-sm-1"></div>
                <div class="col-md-4 col-sm-4">
                    <div class="row head text-center">
                        <h3> أقسام تهمك</h3>
                    </div>
                    <div class="row box">
                    
                    <?php 
                    if($records3){
                        
                    
                    
                    foreach($records3 as $data):
                  
                    ?>
                        <div class="row ">
                            <div class="titel col-md-4 col-sm-4 col-xs-4">
                                <img src="<?php echo base_url('uploads/images').'/'.$data->img.'' ?>" alt="" class="img-thumbnail">
                            </div>
                            <div class="titel col-md-8 col-sm-8 col-xs-8">
                        
                                <a href="<?php echo base_url('web').'/departs/'.$data->id.''?>"><?php echo $data->name ?></a>
                              <?php echo word_limiter($data->content,15); ?>
                            </div>
                        </div>
                     
                      <?php
                        endforeach;
                      }else{
                        
                      }
                     
                      ?>
                      
                    
                    </div>
                </div>
                <div class="row">

                </div>
            </div>
        </div>
    </div>
    <?php
    
    }else{
        
    }
    ?>
    <!-------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------->

