



<div class="slider">

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          

    <!-- Wrapper for slides -->

    <div class="carousel-inner" >





        <?php

        if(is_array($imgs)) {
 $item=0;
foreach ($imgs as $img)
       {
        if($item==0){
 $active="active";
 }else{
    $active="";
 }
     echo '<div class="item  '.$active.' " >
  <img  width:100%;" src = "'. base_url()  .'/uploads/images/'.$img->img.'" >

 <div class="carousel-caption">
                        <h3>
                      </h3>
                    </div>
</div >';
      $item++;
 }
  }
 ?>



    </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
    </div>
    </div>
    <!-- slider -->

    <!-- News -->
    <div class="news-Ticker ">
        <div class="container-fluid news">
            <div class="container">
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                    <h4 class="text-center">خبر عاجل</h4>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                 <marquee behavior="scroll" direction="right">
                    
                         <?php
                         if(is_array($records)) {

                        foreach($records as $record):

                            echo '<span>'.$record->title.'</span>';

                        endforeach ;
}else{
    
}
                        ?>
                         </marquee>
                    </div>
                  
            </div>
        </div>
    </div>
    <!-- News -->

    <!-------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------->
    <div class="details">
        <div class="container">
            <!-------- العروض ------>
            <div class="row ff">
              <?php  
              echo '  <a href="'.base_url('web').'/all_details">';
              ?>
                    <h1 class="text-center"> 
                   <span><i class="fa fa-bookmark" aria-hidden="true"></i>
                   </span> 
                   عروض مجمع الماس الطبى 
                 
                   </h1>
                </a>
          
                       <?php
 if(is_array($records3)) {
            foreach($records3 as $record):


    

                           
            echo'    <div  class="col-md-3 col-sm-6">
                    <div  class="row">
                        <div  class="col-md-12 text-center block ">
                              <a href="'.base_url('web').'/details/'.$record->id.'/'.$record->type.'">
                                <h2>'.$record->title.'</h2>
                                <div class="offer"> ';
                                

    $photo=unserialize($record->image);
   $img = base_url('uploads/images').'/'.$photo[0];

    echo '

       <img  src="'.$img.'" alt="" width="150" height="170">

        

     ';
         echo'      <p >'. word_limiter( $record->content,10).'</p>
         
                                  </br>  
                                </div>
                                <button class="btn" type="submit">
                                        <a href="'.base_url('web').'/details/'.$record->id.'/'.$record->type.'">عرض المزيد</a>
                                    </button>

                            </a>
                        </div>
                    </div>
                </div>
      ';
         endforeach ; }
         else{
            
         } ?> 
             
            </div>

            <!-------- الاخبار -------->

     
     <div class="nnn">
     <div class="row">
                <?php  
              echo '  <a href="'.base_url('web').'/all_news">';
              ?>
                   <h1 class="text-center">
                         <span><i class="fa fa-newspaper-o" aria-hidden="true"></i>
                         </span>اخر الاخبار</h1>
                </a>
            </div>
            
                <div class="row new">
       <?php 
       if(is_array($news)){
       foreach($news as $record_news):
         $photo=unserialize($record_news->image);
   $img = base_url('uploads/images').'/'.$photo[0]; ?>
       
            
                <div class="col-md-6 col-sm-6" style="margin-top: 30px;">
                    <div class="col-md-4 col-sm-4">
                        <img style="width: 100%; height: 120px;" src="<?php echo $img ;?>" alt="" width="250" class="img-thumbnail">
                    </div>
                    <div class="col-md-8 col-sm-8">
                          <a   href="<?php echo base_url('web').'/news_details/'.$record_news->id.'/'.$record_news->type?>"><?php echo $record_news->title?></a>
                        <p><?php echo $record_news->date ;?>
                            <br><?php  echo word_limiter( $record_news->content , 10);?>
                        </p>
                    </div>
                </div>
            
            
          <?php endforeach;}?>
  </div>
  </div>
  
     <!----------- الصور ---------->
<div class="n-new" style="min-height: 420px;" >
        <div class="container">
            <div class="row ">
                <?php  
              echo '  <a href="'.base_url('web').'/all_images">';
              ?>
                    <h1 class="text-center">
                         <span><i class="fa fa-picture-o" aria-hidden="true"></i>
                         </span>معرض الصور
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
                            
                               
                                 $all_conunt =  count($array);
                               $result_c = $all_conunt -8 ;
                                  
                                 if($all_conunt > 8)
                                 {
                                    $myvar = $all_conunt - $result_c ;
                                 }elseif($all_conunt < 8)
                                 { $myvar = $all_conunt + $result_c ;
                                    
                                 }   
                                   
                                     
                                    
                             //   $t=0;
                                for($t=0;$t<($myvar);$t++){
                                 
                                    echo'
                                        
                   <div class="col-md-3 col-sm-6">
                    <div class="thumbnail">
                        
                        <img  src = "'. base_url()  .'/uploads/images/'.$array[$t].'"  alt="" class="img-thumbnail">
                    </div>
                </div>
                
                                        ';
                                }
                               echo'
                               ';
                                   }              
                                ?>       
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
                                       
                          
                          
           
              
            </div>


        </div>
        </div>
    </div>
    
    
            <!----------- فيديو ----------->
            <!----------- فيديو ----------->
            
           <div class="vv">
            <div class="row">
              <?php  
              echo '  <a href="'.base_url('web').'/all_vedio">';
              ?>
                    <h1 class="text-center"> 
                   <span><i class="fa fa-video-camera" aria-hidden="true"></i>
                   </span>  فيديوهات </h1>
                </a>
            </div>
              <div class="vid">
            <div class="row ">
            
              <?php
              
              if(is_array($records5)){
               foreach($records5  as $vedio):?>
                 <div class="col-md-3 col-sm-6">
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
  <!------------->
  <!-- logos -->
       <div class="cc">
                <div class="row">
                      <?php  
              echo '  <a href="'.base_url('web').'/all_t2meen">';
              ?>
                        <h1 class="text-center"> 
                   <span><i class="fa fa-pencil-square" aria-hidden="true"></i>
                   </span>  شركات التامين </h1>
                    </a>
                </div>
    <div class="container-fluid logo-container text-center" style="background-color: #fff; margin-right: -20px; ">
        
        <div class="container ">
            <div id="owl-demo2" class="owl-carousel owl-theme">
                
                
                 <?php                    if($records7){  
                                for($j=0;$j<count($records7);$j++){?>
                                    
                <div class="item"><img src = "<?php echo base_url()  .'/uploads/images/'.$records7[$j]->img ?>" class="img-responsive " title="" style="width:90%;" />
                </div>
                           <?
                           }
                           }else{
                            
                           }?>      
                
               

            </div>
        </div>
    </div>
    <!-- logos -->
            <!--------- عملائنا ---------->

            <div class="cl ">
                <div class="row ">
                     <?php  
              echo '  <a href="'.base_url('web').'/client">';
              ?>
                        <h1 class="text-center"> 
                   <span><i class="fa fa-user" aria-hidden="true"></i>
                   </span>  عملائنا </h1>
                    </a>
                </div>
                <div class="row client text-center">
                
                <?php
                    if(is_array($records8)){  
 for($q=0;$q<count($records8);$q++){
    
    echo'<div class="col-md-3">
                        <img src = "'. base_url()  .'/uploads/images/'.$records8[$q]->img.'" alt="">
                    </div>';
    
 }
 }
 
                
                ?>
                    
                </div>
            </div>
        </div>
    </div>

    <!-------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------->
