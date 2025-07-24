<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('local/header'); ?>
</head>

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <?php $this->load->view('local/mobile_topmenu'); ?>
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-row flex-column-fluid page">
            <?php $this->load->view('local/menu'); ?>
            <div class="d-flex flex-column flex-row-fluid wrapper pt-20" id="kt_wrapper">
                <?php $this->load->view('local/topmenu'); ?>
                <div class="content d-flex flex-column flex-column-fluid p-10">

                    <div class="row mb-3">
                        <div class="col-12 d-flex d-flex align-items-center justify-content-end">
                            <div class="mr-1">Show:</div>
                            <div class="d-flex align-items-center"><input type="checkbox" id="staff_toggle" style="width:20px; height:20px;"></div>
                        </div>
                    </div>
                    <div class="row my-3 p-10 bg-white border rounded">
                        <div class="col-12 mb-2">
                            <h3>Staff Title and Description</h3>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <h6>Title(En)</h6>
                                <input class="form-control" id="title_en" type="text" value="<?php echo $component['t_staff_title']['en'] ?>" />
                            </div>
                            <div class="form-group">
                                <h6>Description(En)</h6>
                                <textarea class="form-control" id="desc_en" rows="4"><?php echo $component['t_staff_desc']['en'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <h6>Title(Es)</h6>
                                <input class="form-control" id="title_es" type="text" value="<?php echo $component['t_staff_title']['es'] ?>" />
                            </div>
                            <div class="form-group">
                                <h6>Description(Es)</h6>
                                <textarea class="form-control" id="desc_es" rows="4"><?php echo $component['t_staff_desc']['es'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-12 text-right">
                            <button class="btn btn-light-primary" onclick="updateStaffDesc();">Update</button>
                        </div>
                    </div>

                    <div class="row my-3 p-10 bg-white border rounded">
                        <div class="col-12 mb-4 d-flex justify-content-between align-items-center my-5">
                            <div>
                                <h3>Staffs</h3>
                            </div>
                            <div><span class='person_add btn btn-light-primary btn-icon'><i class='fa fa-plus'></i></span></div>
                            <input type="hidden" id="chosen_person_id" />
                        </div>
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table" id="person_tb">
                                    <thead>
                                        <th>Photo</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Job</th>
                                        <th>Display</th>
                                        <th>Action</th>
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
</body>
<!-- The Modal -->
<div class="modal fade" id="person_add_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ">Add User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="adduserfrom" action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h6>Full Name (EN)</h6>
                                <input name='en_name' id='en_name' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h6>Full Name (ES)</h6>
                                <input name='es_name' id='es_name' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h6>Job (EN)</h6>
                                <input name='en_job' id='en_job' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h6>Job (ES)</h6>
                                <input name='es_job' id='es_job' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h6>Account Request</h6>
                        </div>
                        <div class="col-md-2 d-flex d-flex align-items-center mb-5">
                            <div class="d-flex align-items-center"><input type="checkbox" id="type_acc_assigned" style="width:20px; height:20px;"></div>
                            <div class="mr-1">&nbsp;&nbsp;Assigned</div>
                        </div>
                        <div class="col-md-7 d-flex d-flex align-items-center mb-5">
                            <div class="d-flex align-items-center"><input type="checkbox" id="type_acc_email" style="width:20px; height:20px;"></div>
                            <div class="mr-1">&nbsp;&nbsp;Email</div>
                        </div>
                        <div class="col-md-3">
                            <h6>General Online</h6>
                        </div>
                        <div class="col-md-2 d-flex d-flex align-items-center mb-5">
                            <div class="d-flex align-items-center"><input type="checkbox" id="type_general_assigned" style="width:20px; height:20px;"></div>
                            <div class="mr-1">&nbsp;&nbsp;Assigned</div>
                        </div>
                        <div class="col-md-7 d-flex d-flex align-items-center mb-5">
                            <div class="d-flex align-items-center"><input type="checkbox" id="type_general_email" style="width:20px; height:20px;"></div>
                            <div class="mr-1">&nbsp;&nbsp;Email</div>
                        </div>
                        <div class="col-md-3">
                            <h6>Specfic Message</h6>
                        </div>
                        <div class="col-md-2 d-flex d-flex align-items-center mb-5">
                            <div class="d-flex align-items-center"><input type="checkbox" id="type_spec_assigned" style="width:20px; height:20px;"></div>
                            <div class="mr-1">&nbsp;&nbsp;Assigned</div>
                        </div>
                        <div class="col-md-7 d-flex d-flex align-items-center mb-5">
                            <div class="d-flex align-items-center"><input type="checkbox" id="type_spec_email" style="width:20px; height:20px;"></div>
                            <div class="mr-1">&nbsp;&nbsp;Email</div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <h6>Description (EN)</h6>
                                <div name='en_desc' id='en_desc'></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <h6>Full Description (EN)</h6>
                                <div name='en_fdesc' id='en_fdesc'></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <h6>Description (ES)</h6>
                                <div name='es_desc' id='es_desc'></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <h6>Full Description (ES)</h6>
                                <div name='es_fdesc' id='es_fdesc'></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h6>Status</h6>
                                <select class="form-control" name="status" id="status" style="height:36px;">
                                    <option value="1">Visible</option>
                                    <option value="0">Invisible</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary personaddbtn" data-dismiss="modal">Done</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--- end modal -->
<!-- The Modal -->
<div class="modal fade" id="person_edit_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="edituserfrom" action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h6>Full Name (EN)</h6>
                                <input name='een_name' id='een_name' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h6>Full Name (ES)</h6>
                                <input name='ees_name' id='ees_name' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <h6>Email</h6>
                                <input name='email' id='email' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <h6>Tel</h6>
                                <input name='tel' id='tel' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <h6>Ext</h6>
                                <input name='ext' id='ext' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class="col-md-3 d-flex d-flex align-items-center">
                            <div class="mr-1">Email/Tel/Ext Show:</div>
                            <div class="d-flex align-items-center"><input type="checkbox" id="email_tel_ext_toggle" style="width:20px; height:20px;"></div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h6>Title (EN)</h6>
                                <input name='een_job' id='een_job' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h6>Title (ES)</h6>
                                <input name='ees_job' id='ees_job' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h6>Account Request</h6>
                        </div>
                        <div class="col-md-2 d-flex d-flex align-items-center mb-5">
                            <div class="d-flex align-items-center"><input type="checkbox" id="etype_acc_assigned" style="width:20px; height:20px;"></div>
                            <div class="mr-1">&nbsp;&nbsp;Assigned</div>
                        </div>
                        <div class="col-md-7 d-flex d-flex align-items-center mb-5">
                            <div class="d-flex align-items-center"><input type="checkbox" id="etype_acc_email" style="width:20px; height:20px;"></div>
                            <div class="mr-1">&nbsp;&nbsp;Email</div>
                        </div>
                        <div class="col-md-3">
                            <h6>General Online</h6>
                        </div>
                        <div class="col-md-2 d-flex d-flex align-items-center mb-5">
                            <div class="d-flex align-items-center"><input type="checkbox" id="etype_general_assigned" style="width:20px; height:20px;"></div>
                            <div class="mr-1">&nbsp;&nbsp;Assigned</div>
                        </div>
                        <div class="col-md-7 d-flex d-flex align-items-center mb-5">
                            <div class="d-flex align-items-center"><input type="checkbox" id="etype_general_email" style="width:20px; height:20px;"></div>
                            <div class="mr-1">&nbsp;&nbsp;Email</div>
                        </div>
                        <div class="col-md-3">
                            <h6>Specfic Message</h6>
                        </div>
                        <div class="col-md-2 d-flex d-flex align-items-center mb-5">
                            <div class="d-flex align-items-center"><input type="checkbox" id="etype_spec_assigned" style="width:20px; height:20px;"></div>
                            <div class="mr-1">&nbsp;&nbsp;Assigned</div>
                        </div>
                        <div class="col-md-7 d-flex d-flex align-items-center mb-5">
                            <div class="d-flex align-items-center"><input type="checkbox" id="etype_spec_email" style="width:20px; height:20px;"></div>
                            <div class="mr-1">&nbsp;&nbsp;Email</div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <h6>Description (EN)</h6>
                                <div name='een_desc' id='een_desc'></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <h6>Full Description (EN)</h6>
                                <div name='een_fdesc' id='een_fdesc'></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <h6>Description (ES)</h6>
                                <div name='ees_desc' id='ees_desc'></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <h6>Full Description (ES)</h6>
                                <div name='ees_fdesc' id='ees_fdesc'></div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex d-flex align-items-center">
                            <div class="mr-1">Send Message Button Show:</div>
                            <div class="d-flex align-items-center"><input type="checkbox" id="send_message_toggle" style="width:20px; height:20px;"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h6>Status</h6>
                                <select class="form-control" name="estatus" id="estatus" style="height:36px;">
                                    <option value="1">Visible</option>
                                    <option value="0">Invisible</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Modal footer -->
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary personeditsubmitbtn" data-dismiss="modal">Done</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--- end modal -->
<!-- The Modal -->
<div class="modal fade" id="avatar_edit_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class='col-md-12'>
                        <h6>Photo(450&times;300)</h6>
                        <div class="custom-file form-group">
                            <input type="file" class="custom-file-input" id="upload_image_img" name="file">
                            <label class="custom-file-label" for="upload_image_img">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary imgeditsubmitbtn" data-dismiss="modal">Done</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--- end modal -->
<script>
    $('#en_desc').summernote({
        tabsize: 1,
        height: 150,
    });
    $('#es_desc').summernote({
        tabsize: 1,
        height: 150,
    });
    $('#en_fdesc').summernote({
        tabsize: 1,
        height: 150,
    });
    $('#es_fdesc').summernote({
        tabsize: 1,
        height: 150,
    });
    $('#een_desc').summernote({
        tabsize: 1,
        height: 150,
    });
    $('#ees_desc').summernote({
        tabsize: 1,
        height: 150,
    });
    $('#een_fdesc').summernote({
        tabsize: 1,
        height: 150,
    });
    $('#ees_fdesc').summernote({
        tabsize: 1,
        height: 150,
    });
    $(document).ready(function() {
        let persontable = $('#person_tb').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search staffs",
            },
            "ajax": {
                "url": "<?php echo base_url() ?>local/Staff/read",
                "type": "GET"
            },
            "columns": [{
                    data: 'img',
                    render: function(data, type, row) {
                        return `<img src="${"<?php echo base_url() ?>assets/images/staffs/"+row.img}" width="100" style = "max-height:70px;"/>`
                    }
                },
                {
                    data: 'en_name'
                },
                {
                    data: 'email'
                },
                {
                    data: 'en_job'
                },
                {
                    data: 'status',
                    render: function(data, type, row) {
                        if (row.status == 1)
                            return `<div class="text-success">Visible</div>`;
                        else
                            return `<div class="text-danger">Invisible</div>`;
                    }
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return `
                            <div idkey="` + row.id + `">
                                <span class="btn btn-icon btn-sm btn-light-primary personimgbtn"><i class="fas fa-image"></i></span>
                                <span class="btn btn-icon btn-sm btn-light-warning personeditbtn"><i class="fas fa-edit"></i></span>
                                <span class="btn btn-icon btn-sm btn-light-danger  persondeletebtn"><i class="fas fa-trash"></i></span>
                            </div>
                            `
                    }
                }
            ]
        });
        //person Area
        $(".person_add").click(function() {
            $('#type_acc_assigned').prop('checked', false);
            $('#type_acc_email').prop('checked', false);
            $('#type_general_assigned').prop('checked', false);
            $('#type_general_email').prop('checked', false);
            $('#type_spec_assigned').prop('checked', false);
            $('#type_spec_email').prop('checked', false);

            $("#person_add_modal").modal('show');
        });
        $(".personaddbtn").click(function() {
            var fd = new FormData();
            fd.append('en_name', $("#en_name").val());
            fd.append('es_name', $("#es_name").val());
            fd.append('en_job', $("#en_job").val());
            fd.append('es_job', $("#es_job").val());
            fd.append('type_acc_assigned', $('#type_acc_assigned').prop('checked'));
            fd.append('type_acc_email', $('#type_acc_email').prop('checked'));
            fd.append('type_general_assigned', $('#type_general_assigned').prop('checked'));
            fd.append('type_general_email', $('#type_general_email').prop('checked'));
            fd.append('type_spec_assigned', $('#type_spec_assigned').prop('checked'));
            fd.append('type_spec_email', $('#type_spec_email').prop('checked'));
            fd.append('en_desc', $("#en_desc").summernote("code"));
            fd.append('es_desc', $("#es_desc").summernote("code"));
            fd.append('en_fdesc', $("#en_fdesc").summernote("code"));
            fd.append('es_fdesc', $("#es_fdesc").summernote("code"));
            fd.append('status', $("#status").val());
            $.ajax({
                url: '<?php echo base_url() ?>local/Staff/create',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                dataType: "text",
                success: function(data) {
                    if (data == "ok") {
                        setTimeout(function() {
                            persontable.ajax.reload();
                        }, 1000);
                        mynotify('success', 'Add Success');
                    } else {
                        mynotify('danger', 'Add Fail');
                    }
                }
            });
        });
        $(document).on("click", ".personeditbtn", function() {
            $("#chosen_person_id").val($(this).parent().attr("idkey"));
            $.ajax({
                url: '<?php echo base_url() ?>local/Staff/choose',
                method: "POST",
                data: {
                    id: $("#chosen_person_id").val()
                },
                dataType: "json",
                success: function(data) {
                    $("#een_name").val(data['en_name']);
                    $("#ees_name").val(data['es_name']);
                    $("#een_job").val(data['en_job']);
                    $("#ees_job").val(data['es_job']);

                    $('#etype_acc_assigned').prop('checked', false);
                    $('#etype_acc_email').prop('checked', false);
                    $('#etype_general_assigned').prop('checked', false);
                    $('#etype_general_email').prop('checked', false);
                    $('#etype_spec_assigned').prop('checked', false);
                    $('#etype_spec_email').prop('checked', false);
                    if (data['account_request'] == 1) {
                        $('#etype_acc_assigned').prop('checked', true);
                    } else if (data['account_request'] == 2) {
                        $('#etype_acc_email').prop('checked', true);
                    } else if (data['account_request'] == 3) {
                        $('#etype_acc_assigned').prop('checked', true);
                        $('#etype_acc_email').prop('checked', true);
                    }
                    if (data['general_online'] == 1) {
                        $('#etype_general_assigned').prop('checked', true);
                    } else if (data['general_online'] == 2) {
                        $('#etype_general_email').prop('checked', true);
                    } else if (data['general_online'] == 3) {
                        $('#etype_general_assigned').prop('checked', true);
                        $('#etype_general_email').prop('checked', true);
                    }
                    if (data['spec_message'] == 1) {
                        $('#etype_spec_assigned').prop('checked', true);
                    } else if (data['spec_message'] == 2) {
                        $('#etype_spec_email').prop('checked', true);
                    } else if (data['spec_message'] == 3) {
                        $('#etype_spec_assigned').prop('checked', true);
                        $('#etype_spec_email').prop('checked', true);
                    }

                    $("#een_desc").summernote("code", data['en_desc']);
                    $("#ees_desc").summernote("code", data['es_desc']);
                    $("#een_fdesc").summernote("code", data['en_fdesc']);
                    $("#ees_fdesc").summernote("code", data['es_fdesc']);
                    $("#estatus").val(data['status']);
                    $("#email").val(data['email']);

                    $("#tel").val(data['tel']);
                    $("#ext").val(data['ext']);
                    $('#email_tel_ext_toggle').prop('checked', data['email_tel_ext_toggle'] == 1);
                    $('#send_message_toggle').prop('checked', data['send_message_toggle'] == 1);

                    $("#person_edit_modal").modal('show');
                }
            });
        });
        $(".personeditsubmitbtn").click(function() {
            var fd = new FormData();
            fd.append('id', $("#chosen_person_id").val());
            fd.append('en_name', $("#een_name").val());
            fd.append('es_name', $("#ees_name").val());
            fd.append('en_job', $("#een_job").val());
            fd.append('es_job', $("#ees_job").val());
            fd.append('etype_acc_assigned', $('#etype_acc_assigned').prop('checked'));
            fd.append('etype_acc_email', $('#etype_acc_email').prop('checked'));
            fd.append('etype_general_assigned', $('#etype_general_assigned').prop('checked'));
            fd.append('etype_general_email', $('#etype_general_email').prop('checked'));
            fd.append('etype_spec_assigned', $('#etype_spec_assigned').prop('checked'));
            fd.append('etype_spec_email', $('#etype_spec_email').prop('checked'));
            fd.append('en_desc', $("#een_desc").summernote("code"));
            fd.append('es_desc', $("#ees_desc").summernote("code"));
            fd.append('en_fdesc', $("#een_fdesc").summernote("code"));
            fd.append('es_fdesc', $("#ees_fdesc").summernote("code"));
            fd.append('status', $("#estatus").val());
            fd.append('email', $("#email").val());

            fd.append('tel', $("#tel").val());
            fd.append('ext', $("#ext").val());
            fd.append('email_tel_ext_toggle', $('#email_tel_ext_toggle').is(":checked") ? 1 : 0);
            fd.append('send_message_toggle', $('#send_message_toggle').is(":checked") ? 1 : 0);
            $.ajax({
                url: '<?php echo base_url() ?>local/Staff/update',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                dataType: "text",
                success: function(data) {
                    if (data == "ok") {
                        setTimeout(function() {
                            persontable.ajax.reload();
                        }, 1000);
                        mynotify('success', 'Update Success');
                    } else {
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
        $(document).on("click", ".persondeletebtn", function() {
            $("#chosen_person_id").val($(this).parent().attr("idkey"));
            var tmp = $(this).parent().parent().parent();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,


                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: '<?php echo base_url() ?>local/Staff/delete',
                        method: "POST",
                        data: {
                            id: $("#chosen_person_id").val()
                        },
                        dataType: "text",
                        success: function(data) {
                            if (data = "ok")
                                tmp.remove();
                        }
                    });
                }
            });
        });
        $(document).on("click", ".personimgbtn", function() {
            window.id = $(this).parent().attr("idkey");
            $("#avatar_edit_modal").modal('show');
        });
        $(".imgeditsubmitbtn").click(function() {
            var fd = new FormData();
            var img = $('#upload_image_img')[0].files;
            var id = window.id;
            if (img.length > 0) {
                fd.append('id', id);
                fd.append('img', img[0]);
            }
            $.ajax({
                url: '<?php echo base_url() ?>local/Staff/uploadImg',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                dataType: "text",
                success: function(data) {
                    if (data == "ok") {
                        setTimeout(function() {
                            $("#person_tb").DataTable().ajax.reload();
                        }, 1000);
                        mynotify('success', 'Upload Success');
                    } else {
                        mynotify('danger', 'Upload Fail');
                    }
                }
            });
        });
    });

    function updateStaffDesc() {
        title_en = $("#title_en").val();
        title_es = $("#title_es").val();
        desc_en = $("#desc_en").val();
        desc_es = $("#desc_es").val();

        $.ajax({
            url: '<?php echo base_url() ?>local/Staff/updateStaffDesc',
            method: "POST",
            data: {
                title_en: title_en,
                title_es: title_es,
                desc_en: desc_en,
                desc_es: desc_es
            },
            dataType: "text",
            success: function(data) {
                handleResponse(data);
            }
        });
    }
    handleAreaToggleBox('#staff_toggle', 'staff_area');
</script>

</html>