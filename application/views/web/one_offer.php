<?php


?>

    <!-------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------->
    <div class="one-offer" style="min-height: 420px;">
        <div class="container">
            <div class="row">
                <h1>
                         <span><i class="fa fa-bookmark" aria-hidden="true"></i>
                         </span>تفاصيل العروض 
                </h1>
                

            </div>
            
            

            <div class="row">
                <div class="col-md-7  col-sm-7">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div id="carousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                       <ol class="carousel-indicators">

<?php   

if($records){ 


        
        $datas=unserialize($records[0]->image);
       
        for($w=0;$w<count($datas);$w++){
            if($w == 0){

        $activeas="active";

        }else{

        $activeas="";

        }
        
            echo'  <li data-target="#carousel-example-generic" data-slide-to="'.($w+1).'" class="'.$activeas.'"></li>';
        }
        
        }?>



    </ol>


                                <!-- Wrapper for slides -->
                                <div class="carousel-inner text-center" role="listbox">
                                            <?php 
                                            
                                            if(is_array($records)){ 
          $potos=  unserialize($records[0]->image);
            for($x=0;$x<count($potos);$x++){
               if($x==0){
          $active="active";
        }else{
                 $active="";
       }
   echo '<div class="item  '.$active.' " >
      <img  style="width: 100%; height: 250px;"  src = "'. base_url()  .'/uploads/images/'.$potos[$x].'"  alt="...">
    </div >
    ';
    }    
    ?>
                                </div>

                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                                <a class="right carousel-control" href="#carousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h3><?php echo $records[0]->title?></h3>
                         <h3><?php echo $records[0]->date?></h3>
                        <p>
                  <?php echo $records[0]->content?>  </p>
                    </div>
                </div>
                <?php }?>
                <div class="col-md-1  col-sm-1"></div>
                <div class="col-md-4 col-sm-4 off">
                    <div class="row">
                        <div class="col-md-12 text-center  ">
                            <a href="#">
                                <h2>عروض المستشفي</h2>
                            </a>
                        </div>
                          <?php 
                          
                           if(is_array($records3)){ 
                          foreach($records3 as $other):
                        
                      echo'  <div class="row">
                        
                            <div class="col-md-4 col-sm-4 col-xs-4">';
                      
       $photo=unserialize($other->image);
   $img = base_url('uploads/images').'/'.$photo[0];

    echo '

       <img  src="'.$img.'" class="img-responsive">

                            </div>
                         
                            <div class="col-md-8 col-sm-8 col-xs-8">
                                <a href="'.base_url('web').'/details/'.$other->id.'/'.$other->type.'">  <p>'. $other->title .'</p></a>
                                 <p style="margin:0px;">'.$other->date.' </p>
                               <p  style="margin:0px;"> '.word_limiter($other->content,10).'</p>
                            </div>
                        </div>
                        <br />

     ';
                        ?>
                        
                        <?php endforeach;
                        }?>
                     

                  

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-------------------------------------------------------------------------------------->

