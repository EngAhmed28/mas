 <!------------  jops  ----------->
    <div class="r-jobs">
        <div class="container">
            <div class="row r-all-job">
                <div class="col-md-3 col-sm-3 hidden-xs">
                    <img src="<?php echo base_url().'asisst/web_asset/img/'?>1303747612_192194727_1-pictures-of-free-of-cost-online-job.png" alt="">
                </div>
                <div class="col-md-9 col-sm-9 col-md-12">
                    <h1 class="text-center"><span><i class="fa fa-user-md" aria-hidden="true"></i>
                    </span> وظائف خاليه
                    </h1>
                    
                    <?php

if($recordes)

foreach($recordes as $record){
    
    $time = $record->date_s;
    echo '
    <div class="col-md-4 col-sm-6 col-xs-12 r-joo text-center">
    <a href="'.base_url().'web/job_details/'.$record->id.'">
    
  	<h3>  '.$record->job_name.'</h3>
  	<h4>مستشفى الماس</h4>
    <p>منذ '.humanTiming2($time).'</p>
  	
  </a>
  </div>';
  
  }
function humanTiming2 ($time)
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

}

?>   
                </div>
            </div>
        </div>
    </div>