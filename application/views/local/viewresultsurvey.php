<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('header.php'); ?>
        <style>
            .h-2 {
                height: 0.5rem !important;
            }
            .label-info {
                background: #0774f8;
                color: #fff;
            }
            .tag {
                font-size: 0.75rem;
                color: #25252a;
                border-radius: 3px;
                padding: 0 .5rem;
                line-height: 2em;
                display: -ms-inline-flexbox;
                display: inline-flex;
                cursor: default;
                font-weight: 400;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                margin-top: 2px;
            }
            
        </style>
    </head>
    <body>
        <div class="wrapper ">
			<div class="main-panel" style="width: 100%;">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <h3  style="font-weight:600;">
                                    <?php echo $result[0]; ?>
                                </h3>
                                <h3 >
                                    <span class="text-primary font-weight-bold" style="font-size: 1.6rem;"><?php echo $result[1]; ?></span> responses (<?php echo $result[3]["minDate"]; ?> ~ <?php echo $result[3]["maxDate"]; ?>)
                                    <?php if(isset($result[2]) && count($result[2]) > 0): ?>
                                        <div style="right: 10px;position: absolute;display: inline;font-size: 1rem;">
                                            <span class="btn btn-sm btn-success togglesurveybtn">ToggleView</span>
                                            <span class="btn btn-sm btn-info emailsurveybtn">Email</span>
                                            <span class="btn btn-sm btn-warning printsurveybtn">Print</span>
                                            <span class="btn btn-sm btn-danger clearsurveybtn">Reset</span>

                                        </div>
                                    <?php endif ?>
                                </h3>
                            </div>
                        </div>
                        <?php 
                            if($view == "table"){
                                include('viewresultsurvey_table.php');
                            }
                            else{
                                include('viewresultsurvey_card.php');
                            }
                         ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="chosen_id" value="<?php echo $id; ?>" />
        <!-- The Modal -->
        <div class="modal fade" id="survey_result_email_modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                            <h4 class="modal-title " style="font-weight:500;">Send Survey Result Email</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Please select Users</label>
                                    <select name="survey_email" id = "survey_email" class="form-control">
                                        <?php for($i=0;$i<count($emails);$i++): ?>
                                            <option value = "<?php echo trim($emails[$i]['email']) ?>"><?php echo $emails[$i]['name'] ?> - <?php echo $emails[$i]['email'] ?></option>
                                        <?php endfor ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group bmd-form-group">
                                    <input name = 'email_list' id = 'email_list' class="form-control" type="text" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary submitemailbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--- end modal -->
    </body>
    <script>
       
        $(document).ready(function() {
            var survey_id = "<?php echo $id; ?>";
            //$('#email_list').tagsinput();
            $(".clearsurveybtn").click(function(){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax ({
                            url: '<?php echo base_url() ?>local/survey/deletedata',
                            method: "POST",
                            data: {id:$("#chosen_id").val()},
                            dataType: "text",
                            success: function (data) {
                                if(data = "ok")
                                    location.reload();
                            }
                        });
                    }
                });
            })
            $(".printsurveybtn").click(function(){
                window.print();
            });
            $(".togglesurveybtn").click(function(){
                <?php  if($view == "table"):?>
                    window.location.href="<?php echo base_url() ?>local/survey/viewresultsurvey?view=card&id=<?php echo $id; ?>";
                <?php else: ?>
                    window.location.href="<?php echo base_url() ?>local/survey/viewresultsurvey?view=table&id=<?php echo $id; ?>";
                <?php endif ?>
                
            });

            $(document).on("click",".emailsurveybtn",function(){
                $("#survey_result_email_modal").modal("show");
            });
            $("#survey_email").change(function(){
                $("#email_list").tagsinput('add', $("#survey_email").val());
            });
            $(".submitemailbtn").click(function(){
                Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        
                        
                        confirmButtonText: 'Yes, send it!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax ({
                            url: '<?php echo base_url() ?>local/survey/sendemail_surveyresult',
                            method: "POST",
                            data: {
                                id: survey_id,
                                emails:$("#email_list").val()},
                            dataType: "text",
                            success: function (data) {
                                if(data == "ok"){
                                    $.notify({
                                        icon: "add_alert",
                                        message: "Action Successfully"

                                        }, {
                                        type: 'info',
                                        timer: 1000,
                                        placement: {
                                            from: 'top',
                                            align: 'center'
                                        }
                                    });
                                }
                                else{
                                    $.notify({
                                        icon: "add_alert",
                                        message: "Action failed"

                                        }, {
                                        type: 'info',
                                        timer: 1000,
                                        placement: {
                                            from: 'top',
                                            align: 'center'
                                        }
                                    });
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
</html>
