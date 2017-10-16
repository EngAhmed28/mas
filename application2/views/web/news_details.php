
    <!-------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------->
    <div class="news-details" style="min-height: 420px;">
        <div class="container">
            <div class="row">
                <a href="#">
                    <h1>
                         <span><i class="fa fa-newspaper-o" aria-hidden="true"></i>
                         </span>تفاصيل الخبر  </h1>
                        
                </a>
            </div>
            <?php   if(is_array($records)){ ?>
            <div class="row">
                <div class="col-md-7 col-sm-7 ">
                    <a href="">
                        <h3> <?php echo($records[0]->title)?></h3>
                        <h6>  بتاريخ : <?php echo($records[0]->date)?></h6>
                        <br/>
                        <?php
                        
                      
  $photo=unserialize($records[0]->image);
  
   $img = base_url('uploads/images').'/'.$photo[0];
             ?>
                        
                        <img  style="width: 100%; height: 250px;" src="<?php echo $img?>" alt="" width="450" class="img-responsive">
                    </a>
                    <p>
                    <?php echo $records[0]->content?>
                   </p>
                   
                         <?php if(count($photo) > 1){
        
      for($x=1;$x<count($photo);$x++){
           $img2 = base_url('uploads/images').'/'.$photo[$x]; 
           echo '<img  style="height:100% !important;" src="'.$img2.'" alt="" class="im">' ;
        }
       
      }else{
       // echo ' <img src="" width="100%" height="300">';
      }     
      
      } ?>           
           
            </div>
          
                <div class="col-md-1 col-sm-1"></div>
                <div class="col-md-4 col-sm-4">
                    <div class="row head text-center">
                        <h3> اخبار تهمك</h3>
                    </div>
                    <div class="row box">
                    <?php  
                      if(is_array($records3)){ 
                    foreach($records3 as $others):
                    if($others->type == 1){
              
  
       $imgd = base_url('uploads/images').'/'.$others->logo;
                    }else{
                                $photod=unserialize($others->image);
  
       $imgd = base_url('uploads/images').'/'.$photod[0];
                    }
            
                    ?>
                        <div class="row ">
                            <div class="titel col-md-4 col-sm-5 col-xs-4">
                                <img  src="<?php echo $imgd?>" alt="" class="img-thumbnail">
                            </div>
                            <div class="titel col-md-8 col-sm-8 col-xs-8">
                                <a  href="<?php echo base_url('web').'/news_details/'.$others->id.'/'.$others->type?>"><?php echo $others->title?></a>
                                
                                         <h6>  بتاريخ : <?php echo($others->date)?></h6>
                                            <h6>  <?php echo word_limiter($others->content,10); ?></h6>
                              
                            
                            </div>
                        </div>
                    
                      <?php endforeach;
                      }?>
                     
                    
                    </div>
                </div>
                <div class="row">

                </div>
            </div>
        </div>
    </div>


 