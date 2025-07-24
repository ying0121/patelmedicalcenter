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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon card-header-primary no-print">
                                    <div class='row'>
                                        <div class='col-md-12 text-right'><span class="person_add btn btn-light-primary btn-icon"><i class='fa fa-plus'></i></span></div>
                                        <input type="hidden" id="chosen_person_id" />
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="person_tb">
                                            <thead>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Type</th>
                                                <th class="actionth">Action</th>
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
<div class="modal fade" id="person_add_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ">Add Manager</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="adduserfrom" action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h6>First Name</h6>
                                <input name='fname' id='fname' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h6>Last Name</h6>
                                <input name='lname' id='lname' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h6>Email</h6>
                                <input name='email' id='email' class="form-control" type="email" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h6>Type</h6>
                                <select class="form-control" name="type" id="type" style="height:36px;">
                                    <option value="1">Admin</option>
                                    <option value="2">Manager</option>
                                    <option value="3">Staff</option>
                                </select>
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
<div class="modal fade" id="person_edit_modal">
    <div class="modal-dialog">
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
                                <h6>First Name</h6>
                                <input name='efname' id='efname' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h6>Last Name</h6>
                                <input name='elname' id='elname' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h6>Email</h6>
                                <input name='eemail' id='eemail' class="form-control" type="email" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h6>Type</h6>
                                <select class="form-control" name="etype" id="etype" style="height:36px;">
                                    <option value="1">Admin</option>
                                    <option value="2">Manager</option>
                                    <option value="3">Staff</option>
                                </select>
                            </div>
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
<div class="modal fade" id="pwd_reset_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ">Reset Password</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <h6>Password</h6>
                            <input name='pwd' id='pwd' class="form-control" type="password" required autocomplete="new-password" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h6>Confirm Password</h6>
                            <input name='cpwd' id='cpwd' class="form-control" type="password" required autocomplete="new-password" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary resetpwdbtn" data-dismiss="modal">Done</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="security_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ">Set Security Question</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <h6>Questions</h6>
                            <select class="form-control" id="questions">
                                <?php for ($i = 0; $i < count($answers); $i++): ?>
                                    <option value="<?php echo $answers[$i]['id'] ?>"><?php echo $answers[$i]['en'] ?></option>
                                <?php endfor ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h6>Ansser</h6>
                            <input name='answer' id='answer' class="form-control" type="password" required />
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary securitybtn" data-dismiss="modal">Done</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--- end modal -->
<div class="modal fade" id="manager_menu_edit_modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Define User Access</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 menu_area row">
                        <div class="d-flex my-3 align-items-center col-4">
                            <input type="checkbox" style="width:20px; height:20px;" id="Home" class="mx-1"> Home
                        </div>
                        <div class="d-flex my-3 align-items-center col-4">
                            <input type="checkbox" style="width:20px; height:20px;" id="Clinic" class="mx-1"> Clinic
                        </div>
                        <div class="d-flex my-3 align-items-center col-4">
                            <input type="checkbox" style="width:20px; height:20px;" id="About Us" class="mx-1"> About Us
                        </div>
                        <div class="d-flex my-3 align-items-center col-4">
                            <input type="checkbox" style="width:20px; height:20px;" id="Insurance" class="mx-1"> Insurance
                        </div>
                        <div class="d-flex my-3 align-items-center col-4">
                            <input type="checkbox" style="width:20px; height:20px;" id="Orientation" class="mx-1"> Orientation
                        </div>
                        <div class="d-flex my-3 align-items-center col-4">
                            <input type="checkbox" style="width:20px; height:20px;" id="Services" class="mx-1"> Services
                        </div>
                        <div class="d-flex my-3 align-items-center col-4">
                            <input type="checkbox" style="width:20px; height:20px;" id="Letter" class="mx-1"> Letter
                        </div>
                        <div class="d-flex my-3 align-items-center col-4">
                            <input type="checkbox" style="width:20px; height:20px;" id="Education" class="mx-1"> Education
                        </div>
                        <div class="d-flex my-3 align-items-center col-4">
                            <input type="checkbox" style="width:20px; height:20px;" id="Contacts" class="mx-1"> Contacts
                        </div>
                        <div class="d-flex my-3 align-items-center col-4">
                            <input type="checkbox" style="width:20px; height:20px;" id="Doctors" class="mx-1"> Doctors
                        </div>
                        <div class="d-flex my-3 align-items-center col-4">
                            <input type="checkbox" style="width:20px; height:20px;" id="Staffs" class="mx-1"> Staffs
                        </div>
                        <div class="d-flex my-3 align-items-center col-4">
                            <input type="checkbox" style="width:20px; height:20px;" id="Patient Reviews" class="mx-1"> Reviews
                        </div>
                        <div class="d-flex my-3 align-items-center col-4">
                            <input type="checkbox" style="width:20px; height:20px;" id="Page Images" class="mx-1"> Page Images
                        </div>
                        <div class="d-flex my-3 align-items-center col-4">
                            <input type="checkbox" style="width:20px; height:20px;" id="Page Videos" class="mx-1"> Page Videos
                        </div>
                        <div class="d-flex my-3 align-items-center col-4">
                            <input type="checkbox" style="width:20px; height:20px;" id="Patient Area" class="mx-1"> Patient Area
                        </div>
                        <div class="d-flex my-3 align-items-center col-4">
                            <input type="checkbox" style="width:20px; height:20px;" id="Setting" class="mx-1"> Setting
                        </div>
                        <div class="d-flex my-3 align-items-center col-4">
                            <input type="checkbox" style="width:20px; height:20px;" id="Alert" class="mx-1"> Alert
                        </div>
                        <div class="d-flex my-3 align-items-center col-4">
                            <input type="checkbox" style="width:20px; height:20px;" id="Survey" class="mx-1"> Survey
                        </div>
                        <div class="d-flex my-3 align-items-center col-4">
                            <input type="checkbox" style="width:20px; height:20px;" id="Newsletter" class="mx-1"> Newsletter
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary setmenucheckbtn" data-dismiss="modal">Done</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="qr_modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">QR Code for <span id="qr_title"></span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body text-center">
                <img id="qr_img" src="" alt="QR Code">
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
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
                searchPlaceholder: "Search manager",
            },
            "ajax": {
                "url": "<?php echo base_url() ?>local/Manager/read",
                "type": "GET"
            },
            "columns": [{
                    data: 'fname',
                    render: function(data, type, row) {
                        return `${row.fname+" "+row.lname}`
                    }
                },
                {
                    data: 'email'
                },
                {
                    data: 'type',
                    render: function(data, type, row) {
                        return `<span class = '${row.type==1?"text-success":(row.type==2?"info-color":"text-danger")}'>${row.type==1?"Admin":(row.type==2?"Manager":"Staff")}</span>`
                    }
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return `
                            <div idkey="` + row.id + `">
                            <span class="manager_menu_edit btn btn-light-primary btn-sm btn-icon shadow rounded-5"><i class="fa fa-cog"></i></span>
                            <span class="pwdupdatebtn btn btn-light-warning btn-sm btn-icon shadow rounded-5"><i class="fa fa-key"></i></span>
                            <span class="questionbtn btn btn-light-success btn-sm btn-icon shadow rounded-5"><i class="fa fa-question"></i></span>
                            <span class="personeditbtn btn-icon btn-sm btn-light-warning btn btn-warning btn-sm btn-icon shadow rounded-5"><i class="fas fa-edit"></i></span>
                            <span class="persondeletebtn btn-icon btn-sm btn-light-danger  btn btn-danger btn-sm btn-icon shadow rounded-5"><i class="fas fa-trash"></i></span>
                            <span class="getqrbtn btn btn-light-dark btn-sm btn-icon shadow rounded-5"><i class="fa fa-qrcode"></i></span>
                            </div>
                            `
                    }
                }
            ]
        });
        // Add Person
        $(".person_add").click(function() {
            $("#person_add_modal").modal('show');
        });
        $(".personaddbtn").click(function() {
            var fd = new FormData();
            fd.append('fname', $("#fname").val());
            fd.append('lname', $("#lname").val());
            fd.append('email', $("#email").val());
            fd.append('type', $("#type").val());
            fd.append('status', $("#status").val());
            $.ajax({
                url: '<?php echo base_url() ?>local/Manager/create',
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
        // Edit Person
        $(document).on("click", ".personeditbtn", function() {
            $("#chosen_person_id").val($(this).parent().attr("idkey"));
            $.ajax({
                url: '<?php echo base_url() ?>local/Manager/choose',
                method: "POST",
                data: {
                    id: $("#chosen_person_id").val()
                },
                dataType: "json",
                success: function(data) {
                    $("#efname").val(data['fname']);
                    $("#elname").val(data['lname']);
                    $("#eemail").val(data['email']);
                    $("#etype").val(data['type']);
                    $("#estatus").val(data['status']);
                    $("#person_edit_modal").modal('show');
                }
            });
        });
        $(".personeditsubmitbtn").click(function() {
            var fd = new FormData();
            fd.append('id', $("#chosen_person_id").val());
            fd.append('fname', $("#efname").val());
            fd.append('lname', $("#elname").val());
            fd.append('email', $("#eemail").val());
            fd.append('type', $("#etype").val());
            fd.append('status', $("#estatus").val());
            $.ajax({
                url: '<?php echo base_url() ?>local/Manager/update',
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
                        mynotify('danger', 'Update Fail');

                    }
                }
            });
        });
        // Delete Person
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
                        url: '<?php echo base_url() ?>local/Manager/delete',
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
        // Pasword Reset
        $(document).on("click", ".pwdupdatebtn", function() {
            $("#chosen_person_id").val($(this).parent().attr("idkey"));
            $("#pwd_reset_modal").modal("show");
        });
        $(".resetpwdbtn").click(function() {
            if ($("#pwd").val() == "") {
                mynotify('danger', 'Please enter password');
            } else if ($("#pwd").val() != $("#cpwd").val()) {
                mynotify('danger', 'Please check password again');
            } else {
                $.ajax({
                    url: '<?php echo base_url() ?>local/Manager/resetpwd',
                    type: 'post',
                    data: {
                        id: $("#chosen_person_id").val(),
                        pwd: $("#pwd").val()
                    },
                    dataType: "text",
                    success: function(data) {
                        if (data == "ok") {
                            mynotify('success', 'Password Reset Success');
                        } else {
                            mynotify('danger', 'Password Reset Fail');
                        }
                    }
                });
            }
        });
        // Permission
        $(document).on("click", ".manager_menu_edit", function() {
            $("#chosen_person_id").val($(this).parent().attr("idkey"));

            $.ajax({
                url: '<?php echo base_url() ?>local/Manager/choose',
                method: "POST",
                data: {
                    id: $("#chosen_person_id").val()
                },
                dataType: "json",
                success: function(data) {
                    var idsToCheck = data['access_rights'];

                    $(".menu_area input[type='checkbox']").each(function() {
                        if (idsToCheck.includes(this.id)) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });
                    $('#manager_menu_edit_modal').modal('show');
                }
            });
        });
        $(".setmenucheckbtn").click(function() {
            var checkedIds = [];
            $(".menu_area input[type='checkbox']:checked").each(function() {
                checkedIds.push(this.id);
            });
            $.ajax({
                url: '<?php echo base_url() ?>local/Manager/updateAccessRights',
                method: "POST",
                data: {
                    id: $("#chosen_person_id").val(),
                    access_rights: JSON.stringify(checkedIds)
                },
                dataType: "text",
                success: function(data) {
                    handleResponse(data);
                }
            });
        });
        // QR Code
        $(document).on("click", ".getqrbtn", function() {
            var name, email;
            $("#chosen_person_id").val($(this).parent().attr("idkey"));
            $.ajax({
                url: '<?php echo base_url() ?>local/Manager/choose',
                method: "POST",
                data: {
                    id: $("#chosen_person_id").val()
                },
                dataType: "json",
                success: function(data) {
                    name = data['fname'] + ' ' + data['lname'];
                    email = data['email'];
                }
            }).then(function() {
                $.ajax({
                    url: '<?php echo base_url() ?>local/manager/getQRCode',
                    type: 'POST',
                    data: {
                        name: name,
                        email: email
                    },
                    success: function(response) {
                        $('#qr_title').html(name);
                        $('#qr_img').attr('src', response);
                    }
                });
            });
            $("#qr_modal").modal('show');
        });
        // Security
        $(document).on('click', '.questionbtn', function() {
            $("#chosen_person_id").val($(this).parent().attr("idkey"));
            $("#security_modal").modal("show");
        })
        $(document).on('click', '.securitybtn', function() {
            $.post({
                url: "<?php echo base_url() ?>local/Manager/setSecurity",
                method: 'POST',
                data: {
                    id: $("#chosen_person_id").val(),
                    question_id: $('#questions').val(),
                    answer: $('#answer').val()
                },
                dataType: 'text',
                success: function(res) {
                    if (res == 'ok') {
                        toastr.success('Security has been saved successfully!')
                    } else {
                        toastr.error('Action has been failed!')
                    }
                }
            })
        })
    });
</script>

</html>