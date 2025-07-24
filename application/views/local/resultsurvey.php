<!DOCTYPE html>
<?php 
    function dateDifference($start_date, $end_date)
    {
        // calulating the difference in timestamps 
        $diff = strtotime($start_date) - strtotime($end_date);
         
        // 1 day = 24 hours 
        // 24 * 60 * 60 = 86400 seconds
        return ceil(abs($diff / 86400));
    }
?>
<html lang="en">
    <head>
        <?php include('header.php'); ?>
        <style>
            p{
                font-size: 16px;
                font-weight: 500;
            }
            .expired-text{
                font-weight: 500;
            }
        </style>
    </head>
    <body>
        <div class="wrapper ">
			<div class="main-panel" style="width:100%">
                <div class="content mt-0">
                    <div class="container-fluid">
                        <div class="container">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <img src="<?php echo base_url(),'assets/images/logo.png'; ?>" alt="" width="200" />
                                        </div>
                                        <div class="col-md-12 text-center mt-5">
                                            <h4 class="text-center expired-text"><?php echo $langs[array_search('t_survey_result', array_column($langs, 'keyvalue'))]['lang'] ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
    <script>
        
    </script>
</html>
