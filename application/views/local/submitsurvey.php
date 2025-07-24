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
	    <link href="<?php echo base_url(),'adminassets/css/material-bootstrap-wizard.css'; ?>" rel="stylesheet" />
        <style>
            p{
                font-size: 20px;
                font-weight: 500;
            }
            .expired-text{
                font-weight: 500;
            }
            .wizard-card {
                box-shadow: none!important;
            }
            .form-check-label {
                font-size: 17px;
            }
            .circle {
                top: 5px !important;
            }
            .form-check-radio {
                padding-left: 6px;
                border: 1px solid rgba(0, 0, 0, .54);
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

                                        <input type="hidden" id="surveyid"  value = "<?php echo $id; ?>"/>
                                        <div class="col-md-12 text-center mt-2 mb-1" style="font-size: 1.125rem; font-weight: bold;">
                                            <span><?php echo ($result['sub'])?></span>
                                        </div>
                                        <?php if(dateDifference($result['created'], date("Y-m-d")) <= 14): ?>
                                        <div class="col-md-12 text-center mt-1 mb-1" style="font-size: 1.125rem; font-weight: bold;">
                                            <span id="step-number">1</span>
                                            <span>/</span>
                                            <span><?php echo count($result['quiz'])?></span>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-5">
                                            <div class="wizard-container pt-0">
                                                <div class="wizard-card" data-color="primary" id="wizardProfile">
                                                    <div style="display:none" class="wizard-navigation no-print">
                                                        <ul style = "line-height: 40px;">
                                                            <?php for($i=0;$i<count($result['quiz']);$i++): ?>
                                                                <li><a href="#step<?php echo $i ?>" data-toggle="tab">STEP <?php echo $i+1 ?></a></li>
                                                            <?php endfor ?>
                                                        </ul>
                                                    </div>
                                                    <div class="tab-content">
                                                        <?php for($i=0;$i<count($result['quiz']);$i++): ?>
                                                            <div class="tab-pane" id="step<?php echo $i ?>">
                                                            <form>  
                                                            <p class="mt-4 quiztag" key="<?php echo $result['quiz'][$i]['id'] ?>"><?php echo $result['quiz'][$i]['quiz'] ?></p>
                                                            <?php $tmpresArr = explode(",",$result['res'][$i]['res']); ?>
                                                            <?php if(count($tmpresArr) == 1 && $tmpresArr[0] == ""): ?>
                                                                <div class="restag" key="<?php echo $result['res'][$i]['id'] ?>">
                                                                    <textarea class="form-control resvalue" rows="3"></textarea>
                                                                </div>
                                                            <?php else: ?>
                                                                <div class="restag" key="<?php echo $result['res'][$i]['id'] ?>">
                                                                <?php for($j=0;$j<count($tmpresArr);$j++): ?>
                                                                    <div class="form-check form-check-radio">
                                                                        <label class="form-check-label">
                                                                            <input class="form-check-input resvalue" value="<?php echo $j ?>" type="radio" name="<?php echo $result['quiz'][$i]['id']."_".$result['res'][$i]['id']."_option" ?>"> <?php echo $tmpresArr[$j]; ?>
                                                                            <span class="circle">
                                                                                <span class="check"></span>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                <?php endfor ?>
                                                                </div>
                                                            <?php endif ?>
                                                            </form>  
                                                            </div>
                                                        <?php endfor ?>
                                                    </div>
                                                    <div class="wizard-footer">
                                                        <div class="pull-right">
                                                            <input type='button' class='btn btn-next btn-fill btn-info btn-wd' name='next' value='Next' />
                                                            <input type='submit' class='btn btn-finish btn-fill btn-success btn-wd submitbtn' name='finish' value='Submit' />
                                                        </div>
                                                        <div class="pull-left">
                                                            <input type='button' class='btn btn-previous btn-fill btn-danger btn-wd' name='previous' value='Previous' />
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php else: ?>
                                            <div class="col-md-12 text-center mt-5">
                                                <h4 class="text-center expired-text"><?php echo $langs[array_search('t_survey_expired', array_column($langs, 'keyvalue'))]['lang'] ?></h4>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
    <script src="<?php echo base_url(),'adminassets/js/bootstrap.min.js'; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url(),'adminassets/js/jquery.bootstrap.js'; ?>" type="text/javascript"></script>
    <!--  Plugin for the Wizard -->
	<script src="<?php echo base_url(),'adminassets/js/material-bootstrap-wizard.js'; ?>"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
    <script src="<?php echo base_url(),'adminassets/js/jquery.validate.min.js'; ?>"></script>
    <script>
        var quizCount = <?php echo count($result['quiz'])?>;
        getStepNumber();
        function getStepNumber(){
            setTimeout(function (){
                var pane_list = $('.tab-pane');
                var stepNumber = 0;
                for(let i = 0; i < pane_list.length; i++){
                    if($(pane_list[i]).hasClass('active')){
                        stepNumber = i+1;
                        break;
                    }
                }
                $('#step-number').html(stepNumber);
                var width = parseInt((stepNumber - 1) * 100 /quizCount);
                $('.progress-bar').css('width', width + '%');
            }, 300);

        }
        $(".submitbtn").click(function(){
            var questionArr = [];
            var responseArr = [];
            var responsevalueArr = [];
            for(var i = 0;i < $(".quiztag").length;i++){
                questionArr.push($($(".quiztag")[i]).attr("key"));
                responseArr.push($($(".restag")[i]).attr("key"));
                if($($(".restag")[i]).find(".resvalue").length == 1)
                    responsevalueArr.push($($(".restag")[i]).find(".resvalue").val());
                else
                    responsevalueArr.push($($(".restag")[i]).find(".resvalue:checked").val());
            }
            $('body').append("<form id = 'surveysubmitform' action='<?php echo base_url('local/survey/resultsurvey'); ?>' method='post' target='_blank'><input type = 'hidden' name = 'id' value = '"+$("#surveyid").val()+"' /><input type = 'hidden' name = 'quiz' value = '"+JSON.stringify(questionArr)+"' /><input type = 'hidden' name = 'res' value = '"+JSON.stringify(responseArr)+"' /><input type = 'hidden' name = 'value' value = '"+JSON.stringify(responsevalueArr)+"' /></form>");
            $('#surveysubmitform').submit();
            window.close();
        });
        $(".btn-next").click(function(){
            getStepNumber();
        });
        $(".btn-previous").click(function(){
            getStepNumber();


        });
    </script>
</html>
