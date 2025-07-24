<?php for($i=0;$i<count($result[2]);$i++): ?>
    <div class="row" style="justify-content:center">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><?php echo $result[2][$i]['quiz'] ?></h5>
                </div>
                <div class="card-body p-4">
                    <?php for($j=0;$j<count($result[2][$i]['result']);$j++): ?>
                    <p class="mt-2 mb-1"><?php echo $result[2][$i]['result'][$j]['name'] ?><span class="text-success" style="font-size:1.2rem; font-weight:500; margin-left:20px"><?php echo $result[2][$i]['result'][$j]['counts'] ?></span><span class="text-info" style="margin-left:20px;font-weight:500;font-size: 1.1rem;
"><?php echo round($result[2][$i]['result'][$j]['counts']/$result[1]*100) ?>%</span></p>
                    <div class="progress h-2">
                        <div class="progress-bar bg-primary" role="progressbar" style="width:<?php echo round($result[2][$i]['result'][$j]['counts']/$result[1]*100) ?>%;background: #0774f8!important;"></div>
                    </div>
                    <?php endfor ?>
                </div>
            </div>
        </div>
    </div>
<?php endfor ?>