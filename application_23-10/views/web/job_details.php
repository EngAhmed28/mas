<div class=" r-job-details">
        <div class="container">
            <div class="row">
            
               <?php
            
            function humanTiming ($time)
{

    $time = time() - $time; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'سنة',
        2592000 => 'شهر',
        604800 => 'أسبوع',
        86400 => 'يوم',
        3600 => 'ساعة',
        60 => 'دقيقة',
        1 => 'ثانية'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'':'');
    }

}?>
        <div class="col-md-8 col-sm-8 col-xs-12 r-detail-joo">
                    <h2> <span class="r-mark"><i class="fa fa-briefcase" aria-hidden="true"></i>
                         </span> تفاصيل الوظيفه
                    </h2>
                    <img src="<?php echo base_url().'asisst/web_asset/img/'  ?>20150805_140002_8427.jpg-300x200.png" alt="" class="r-img">       
   <?         if($recordes){
            
                $time = $recordes['date_s'];
                
                
                ?>
             
                    <h3> مطلوب :<?php echo $recordes['job_name'] ?></h3>
                    <p>
                        <span class="r-mark"><i class="fa fa-map-marker" aria-hidden="true"></i></span> مقر العمل
                        <span class="r-space"> :  </span> <?  echo $recordes['job_place'] ?>
                    </p>
                    <p>
                        <span class="r-mark"><i class="fa fa-calendar" aria-hidden="true"></i>
                        </span> تاريخ الاعلان
                        <span class="r-space"> :  </span> : منذ <?  echo humanTiming($time) ?>
                    </p>
                    <p>
                        <span class="r-mark"><i class="fa fa-briefcase" aria-hidden="true"></i></span>العمالة المطلوبة
                        <span class="r-space"> :  </span> <? echo $recordes['workers'] ?>
                    </p>
                
                    <h3>   متطلبات العمل</h3>
                    <? 
                    $requires=unserialize($recordes['job_requires']);
            $mode = current($requires);
            $y = 0;
                    for($x = 1 ; $x <= count($requires) ; $x++){
                        
                        if( $y == 0 || $y % 3 == 0){
					echo	' <p>';
                            }
						echo '
                        
                          <span class="r-mark"><i class="fa fa-bookmark" aria-hidden="true"></i></span> '.key($requires).'
                          <span class="r-space"> :  </span> '.$requires[key($requires)].'
                        
								';
					if($x % 3 == 0 || $x == count($requires)){		
						echo '	</p>';
                            }
                            next($requires);
                            $y++;
                            }
                    
                    ?>
                  <div class="text-center">
                  <a href="<?php echo base_url('web/career');?>">
                        <button class="btn btn-default " type="submit"> طلب الوظيفه</button>
                        </a>
                    </div>
<? 

}
?>
                </div>
                
                
                
                 <div class="col-md-4 col-sm-4 col-xs-12 r-n">
                    <h6 class="text-center"> وظائف اخري</h6>
                         <?php
                if($recordes2)
                {
                foreach($recordes2 as $record){
                    
                    $time = $record->date_s;
                echo '<div class="row r-news">
		
                    <a href="'.base_url().'web/job_details/'.$record->id.'">
                        <div class="col-md-6 col-sm-6 r-new-img text-center">
                                <img src="'.base_url().'asisst/web_asset/img/20150805_140002_8427.jpg-300x200.png" alt="">
                            </div>
                            <div class="col-md-6 col-sm-6 text-center">
                                <h5>'.$record->job_name.'</h5>
                               <h5> '.$record->job_place.'</h5>
                              	<p>منذ '.humanTiming($time).'</p>  <p> الجيزه</p>
                            </div>
					
					
                  </a>
                    </div>

	
				<hr>';
                }
                }
                else
                    echo '<br /><div class="alert alert-danger">لا توجد وظائف مشابهة</div>';
                
                ?>
				
                    
                      
                        
                            
                     
                    
                   
             
                </div>
            </div>
        </div>
    </div>
                