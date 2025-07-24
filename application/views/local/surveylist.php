<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('header.php'); ?>
        <style>
            .btn-group, .btn-group-vertical {
                margin: 0!important;
            }
            .btn-group-survey{
                position: absolute;
                right: 30px;
                top: 20px;
            }
            .btn-group-survey i{
                cursor: pointer;
            }
            .bootstrap-tagsinput{
                width:100%!important;
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

    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        <?php $this->load->view('local/mobile_topmenu'); ?>
        <div class="d-flex flex-column flex-root">
            <div class="d-flex flex-row flex-column-fluid page">
                <?php $this->load->view('local/menu'); ?>
                <div class="d-flex flex-column flex-row-fluid wrapper pt-20" id="kt_wrapper">
                    <?php $this->load->view('local/topmenu'); ?>
                    <div class="content d-flex flex-column flex-column-fluid p-10">
                        <div class = "row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-icon card-header-primary no-print">
                                        <div class = 'row'>
                                            <div class = 'col-md-12 text-right'><span class = 'survey_add btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
                                            <input type="hidden" id="chosen_survey_id" />
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table" id="survey_tb">
                                                <thead>
                                                    <th>Subject</th>
                                                    <th style="width:800px;">Description</th>
                                                    <th class = "actionth">Action</th>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
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
    <!-- The Modal -->
	<div class="modal fade" id="survey_add_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Add Survey</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h6>Subject (En)</h6>
                                <input name = 'survey_sub_en' id = 'survey_sub_en' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <h6>Subject (Es)</h6>
                                <input name = 'survey_sub_es' id = 'survey_sub_es' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <h6>Description (En)</h6>
                                <div name = 'survey_desc_en' id = 'survey_desc_en'></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <h6>Description (Es)</h6>
                                <div name = 'survey_desc_es' id = 'survey_desc_es'></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary surveyaddbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="survey_edit_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Edit Survey</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form id = "edituserfrom" action="" method="post" enctype="multipart/form-data">
                        <div class = "row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h6>Subject (En)</h6>
                                    <input name = 'esurvey_sub_en' id = 'esurvey_sub_en' class="form-control" type="text" required />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h6>Subject (Es)</h6>
                                    <input name = 'esurvey_sub_es' id = 'esurvey_sub_es' class="form-control" type="text" required />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h6>Description (En)</h6>
                                    <div name = 'esurvey_desc_en' id = 'esurvey_desc_en'></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h6>Description (Es)</h6>
                                    <div name = 'esurvey_desc_es' id = 'esurvey_desc_es'></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary surveyeditsubmitbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="survey_email_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Send Survey Email</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Please select patients</label>
                                <select name="survey_email" id = "survey_email" class="form-control">
                                    <?php for($i=0;$i<count($emails);$i++): ?>
                                        <option value = "<?php echo trim($emails[$i]['email']) ?>"><?php echo $emails[$i]['name'] ?> - <?php echo $emails[$i]['email'] ?></option>
                                    <?php endfor ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <input name = 'email_list' id = 'email_list' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input emaillangsurvey" checked name="emaillangsurvey" type="radio" value="1"> ENG
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input emaillangsurvey" name="emaillangsurvey" type="radio" value="2"> SPA
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
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
    <!-- The Modal -->
	<div class="modal fade" id="survey_phone_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Send Survey SMS</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Please select patients</label>
                                <select name="survey_phone" id = "survey_phone" class="form-control">
                                    <?php for($i=0;$i<count($phones);$i++): ?>
                                        <option value = "<?php echo trim($phones[$i]['cel']) ?>"><?php echo $phones[$i]['name'] ?> - <?php echo $phones[$i]['cel'] ?></option>
                                    <?php endfor ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <input name = 'phone_list' id = 'phone_list' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input phonelangsurvey" checked name="phonelangsurvey" type="radio" value="1"> ENG
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input phonelangsurvey" name="phonelangsurvey" type="radio" value="2"> SPA
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary submitphonebtn" data-dismiss="modal">Done</button>
                    <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <script>
        $(document).ready(function() {
            $('#survey_desc_en').summernote({
                tabsize: 1,
                height: 150,
            });
            $('#survey_desc_es').summernote({
                tabsize: 1,
                height: 150,
            });
            $('#esurvey_desc_en').summernote({
                tabsize: 1,
                height: 150,
            });
            $('#esurvey_desc_es').summernote({
                tabsize: 1,
                height: 150,
            });
            //$('#email_list').tagsinput();
            //$('#phone_list').tagsinput();
            let surveytable = $('#survey_tb').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search survey",
                },
                "ajax": {
                    "url": "<?php echo base_url() ?>local/Survey/getsurvey",
                    "type": "GET"
                },
                "columns": [
                    { data: 'en_sub'},
                    { data: 'en_desc' },
                    { data: 'id',
                        render: function (data, type, row) {
                            return `
                            <div idkey="`+row.id+`">
                                <span class="btn btn-icon btn-sm btn-light-primary sendsmsbtn"><i class="fa fa-mobile"></i></span><span class="btn btn-icon btn-sm btn-light-primary sendemailbtn"><i class="fa fa-envelope"></i></span>
                                <a href=${"<?php echo base_url() ?>local/survey?id=" + row.id} target="_blank"><span class="btn btn-icon btn-sm btn-light-primary"><i class="fa fa-question-circle "></i></span></a>
                                <a href=${"<?php echo base_url() ?>local/survey/viewresultsurvey?id=" + row.id} target="_blank"><span class="btn btn-icon btn-sm btn-light-primary"><i class="fa fa-eye"></i></span></a>
                                <span class="btn btn-icon btn-sm btn-light-warning surveyeditbtn"><i class="fas fa-edit"></i></span>
                                <span class="btn btn-icon btn-sm btn-light-danger  surveydeletebtn"><i class="fas fa-trash"></i></span>
                            </div>
                            `
                        } 
                    }
                ]
            });
            //survey Area
            $(".survey_add").click(function(){
                $("#survey_add_modal").modal('show');
            });
            $(".surveyaddbtn").click(function(){
                var fd = new FormData();
                fd.append('en_sub',$("#survey_sub_en").val());
                fd.append('es_sub',$("#survey_sub_es").val());
                fd.append('en_desc',$("#survey_desc_en").summernote("code"));
                fd.append('es_desc',$("#survey_desc_es").summernote("code"));
                $.ajax({
                    url: '<?php echo base_url() ?>local/survey/addsurvey',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                surveytable.ajax.reload();
                            }, 1000 );
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
            });
            $(document).on("click",".surveyeditbtn",function(){
                $("#chosen_survey_id").val($(this).parent().attr("idkey"));
                $.ajax ({
                    url: '<?php echo base_url() ?>local/survey/chosensurvey',
                    method: "POST",
                    data: {id:$("#chosen_survey_id").val()},
                    dataType: "json",
                    success: function (data) {
                        $("#esurvey_sub_en").val(data['en_sub']);
                        $("#esurvey_sub_es").val(data['es_sub']);
                        $("#esurvey_desc_en").summernote("code",data['en_desc']);
                        $("#esurvey_desc_es").summernote("code",data['es_desc']);
                        $("#survey_edit_modal").modal('show');
                    }
                });
            });
            $(".surveyeditsubmitbtn").click(function(){
                var fd = new FormData();
                fd.append('id',$("#chosen_survey_id").val());
                fd.append('en_sub',$("#esurvey_sub_en").val());
                fd.append('es_sub',$("#esurvey_sub_es").val());
                fd.append('en_desc',$("#esurvey_desc_en").summernote("code"));
                fd.append('es_desc',$("#esurvey_desc_es").summernote("code"));
                $.ajax({
                    url: '<?php echo base_url() ?>local/survey/editsurvey',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                surveytable.ajax.reload();
                            }, 1000 );
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
            });
            $(document).on("click",".surveydeletebtn",function(){
                $("#chosen_survey_id").val($(this).parent().attr("idkey"));
                var tmp = $(this).parent().parent().parent();
                Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        
                        
                        confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax ({
                            url: '<?php echo base_url() ?>local/survey/deletesurvey',
                            method: "POST",
                            data: {id:$("#chosen_survey_id").val()},
                            dataType: "text",
                            success: function (data) {
                                if(data = "ok")
                                    tmp.remove();
                            }
                        });
                    }
                });
            });
            $(document).on("click",".sendemailbtn",function(){
                $("#chosen_survey_id").val($(this).parent().attr("idkey"));
                $("#survey_email_modal").modal("show");
            });
            $(document).on("click",".sendsmsbtn",function(){
                $("#chosen_survey_id").val($(this).parent().attr("idkey"));
                $("#survey_phone_modal").modal("show");
            });
            $("#survey_email").change(function(){
                $("#email_list").tagsinput('add', $("#survey_email").val());
            });
            $("#survey_phone").change(function(){
                $("#phone_list").tagsinput('add', $("#survey_phone").val());
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
                            url: '<?php echo base_url() ?>local/survey/sendemail',
                            method: "POST",
                            data: {id:$("#chosen_survey_id").val(),emails:$("#email_list").val(),lang:$(".emaillangsurvey:checked").val()},
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
            })
            $(".submitphonebtn").click(function(){
                Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        
                        
                        confirmButtonText: 'Yes, send it!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax ({
                            url: '<?php echo base_url() ?>local/survey/sendsms',
                            method: "POST",
                            data: {id:$("#chosen_survey_id").val(),phones:$("#phone_list").val(),lang:$(".phonelangsurvey:checked").val()},
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
