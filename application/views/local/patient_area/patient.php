<div class="row my-3 p-10 bg-white border rounded">
    <div class="d-flex justify-content-end">
        <?php if ($this->session->userdata('usertype') == 1): ?>
            <div class="mx-2"><button id="btn-patient-upload" class="btn btn-primary">Upload Excel</button></div>
            <div class="mx-2"><button id="btn-patient-gather" class="btn btn-primary">From Conector</button></div>
        <?php endif ?>
    </div>
    <div class="col-12 mb-4 d-flex justify-content-between align-items-center my-5">
        <div>
            <h3>Patients</h3>
        </div>
        <div class='person_add btn btn-light-primary btn-icon'><i class='fa fa-plus'></i></div>
    </div>
    <div class="col-12">
        <input type="hidden" id="chosen_patient_id" />
        <table class="table" id="patient_tb">
            <thead>
                <th>Patient ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Gender</th>
                <th>DOB</th>
                <th style="min-width: 120px;">Action</th>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<?php if ($this->session->userdata('usertype') == 1): ?>
    <div class="modal fade" id="patient-upload-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Patient Upload Modal Header -->
                <div class="modal-header">
                    <h4 class="card-title ">Patient File</h4>
                </div>
                <!-- Patient Upload Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo base_url('local/Patient/import'); ?>" method="post" enctype="multipart/form-data">
                        <h6 class="mt-2 text-center reftrack">uid | ufname | uminitial | ulname | upPhone | umobileno | uemail | upaddress | upcity | upstate | zipcode | sex | DOB | language | ethnicity | race</h6>
                        <h6 class="mt-2 text-center wanring_title">CVS file does not allow to load data with comma.</h6>
                        <div class="row justify-content-center">
                            <div class='col-md-12'>
                                <div class="custom-file form-group dg-input">
                                    <input type="file" class="custom-file-input" id="customFile" name="file">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12 text-center">
                                <input type='submit' class='btn btn-success' value='Upload' />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="patient-gather-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Patient Gather Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Gather From Conector</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Patient Gather Modal Body -->
                <div class="modal-body">
                    <h3 class="mb-5 mx-5 text-black-50">Please confirm this api.</h3>
                    <h4 class="mb-5 mx-5 text-black-50">Conector - Medical Services of Queens | ID 10</h4>
                    <div class="col-md-12">
                        <select class="form-control" id="patient-gather-url" style="height:36px;">
                            <?php
                            $html = "";
                            for ($i = 0; $i < count($api); $i++) {
                                $html = $html . "<option value='" . $api[$i]['url'] . "'>" . $api[$i]['url'] . "</option>";
                            }
                            echo $html;
                            ?>
                        </select>
                    </div>
                </div>
                <!-- Patient Gather Modal Footer -->
                <div class="modal-footer">
                    <button id="btn-gather-modal" class="btn btn-primary" type="button">
                        <span id="gather-btn-spinner" class="spinner-border spinner-border-sm d-none" style="vertical-align: middle;" role="status" aria-hidden="true"></span>
                        <span id="gather-btn-text" class="visually-hidden">Gather</span>
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>

<div class="modal fade" id="person_add_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ">Add Patient</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="adduserfrom" action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <h6>Patient ID</h6>
                                <input id='patient_id' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h6>First Name</h6>
                                <input id='fname' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h6>Last Name</h6>
                                <input id='lname' class="form-control" type="text" />
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ">Edit Patient</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="edituserfrom" action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <h6>Patient ID</h6>
                                <input id='epatient_id' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <h6>First Name</h6>
                                <input id='efname' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <h6>Middle Name</h6>
                                <input id='emname' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <h6>Last Name</h6>
                                <input id='elname' class="form-control" type="text" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h6>Phone</h6>
                                <input id='ephone' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h6>Mobile</h6>
                                <input id='emobile' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h6>Email</h6>
                                <input id='eemail' class="form-control" type="text" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h6>Address</h6>
                                <input id='eaddress' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <h6>City</h6>
                                <input id='ecity' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <h6>State</h6>
                                <input id='estate' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <h6>Zip</h6>
                                <input id='ezip' class="form-control" type="text" />
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <h6>Gender</h6>
                                <select id='egender' class="form-control" type="text">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h6>DOB</h6>
                                <input type="date" id='edob' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <h6>Language</h6>
                                <select id="elanguage" class="form-control">
                                    <?php for ($i = 0; $i < count($languages); $i++): ?>
                                        <option value="<?php echo $languages[$i]['code'] ?>"><?php echo $languages[$i]['English'] ?></option>
                                    <?php endfor ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <h6>Ethnicity</h6>
                                <input id='eethnicity' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <h6>Race</h6>
                                <input id='erace' class="form-control" type="text" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Modal footer -->
            </form>
            <div class="modal-footer">
                <div class="d-flex w-100 justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center"><input type="checkbox" id="patient_active" style="width:24px; height:24px;"></div>
                        <div class="mr-1">&nbsp;&nbsp;Active</div>
                    </div>
                    <div>
                        <button type="button" class="btn btn-light-primary personeditsubmitbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
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
<div class="modal fade" id="vault_add_modal_1">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ">Add vault</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class='col-md-12'>
                        <div class="form-group">
                            <h6>Patient ID</h6>
                            <input type="text" class="form-control" id="add_patient_id_1">
                        </div>
                        <div class="form-group">
                            <h6>Title</h6>
                            <input type="text" class="form-control" id="add_title_1">
                        </div>
                        <div class="form-group">
                            <h6>Desc</h6>
                            <input type="text" class="form-control" id="add_desc_1">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-dismiss="modal" onclick="addVault_1();">Done</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="question_add_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ">Add Security</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <h6>Select a Question</h6>
                            <select id='question_list' class="form-control" type="text">
                            </select>
                        </div>
                    </div>
                    <div class='col-md-12'>
                        <div class="form-group">
                            <h6>Answer</h6>
                            <input type="text" class="form-control" id="question_answer">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" id="question_save">Done</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function addVault_1() {
        var patient_id = $("#add_patient_id_1").val();
        var title = $("#add_title_1").val();
        var desc = $("#add_desc_1").val();
        $.ajax({
            url: '<?php echo base_url() ?>local/Vault/create',
            method: "POST",
            data: {
                patient_id: patient_id,
                title: title,
                desc: desc
            },
            dataType: "text",
            success: function(data) {
                handleTableReload(data, '#vault_tb');
                $("#vault_document_nav").click();
            }
        });
    }
    $(document).ready(function() {
        $(document).on("click", ".add_vault_btn", function() {
            window.id = $(this).parent().attr("idkey");
            var patient_id;
            $.ajax({
                url: '<?php echo base_url() ?>local/Patient/choose',
                method: "POST",
                data: {
                    id: window.id
                },
                dataType: "json",
                success: function(data) {
                    patient_id = data['id'];
                }
            }).then(() => {
                $("#add_patient_id_1").val(patient_id);
                $("#vault_add_modal_1").modal("show");
            });

        });

        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        let patienttable = $('#patient_tb').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            serverSide: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search patients",
            },
            "ajax": {
                "url": "<?php echo base_url() ?>local/Patient/read",
                "type": "GET"
            },
            "columns": [{
                    data: 'patient_id',
                    render: function(data, type, row) {
                        return `<div class = "d-flex align-items-center" style = "height:40px;">` + row.id + `</div>`;
                    }
                },
                {
                    data: 'fname',
                    render: function(data, type, row) {
                        return (row.fname ? row.fname : "") + ' ' + (row.mname ? row.mname : "") + ' ' + (row.lname ? row.lname : "");
                    }
                },
                {
                    data: 'phone',
                    render: function(data, type, row) {
                        return row.phone == null || row.phone == undefined || row.phone == 'null' ? '' : row.phone
                    }
                },
                {
                    data: 'email',
                    render: function(data, type, row) {
                        return row.email == null || row.email == undefined ? '' : row.email
                    }
                },
                {
                    data: 'address',
                    render: function(data, type, row) {
                        return row.address == null || row.address == undefined ? '' : row.address
                    }
                },
                {
                    data: 'gender'
                },
                {
                    data: 'dob',
                    render: function(data, type, row) {
                        return new Date(row.dob) > new Date(1900, 1, 1) ? row.dob : ''
                    }
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return `
                        <div idkey="` + row.id + `" style = "min-width:100px;">
                            <span class="btn btn-icon btn-sm btn-light-primary add_vault_btn"><i class="fa fa-file"></i></span>
                            <span class="btn btn-icon btn-sm btn-light-warning personeditbtn"><i class="fas fa-edit"></i></span>
                            <span class="btn btn-icon btn-sm btn-light-primary add_security_btn"><i class="fa fa-question"></i></span>
                            <span class="btn btn-icon btn-sm btn-light-warning pwdupdatebtn"><i class="fa fa-key"></i></span>
                            <span class="btn btn-icon btn-sm btn-light-danger  persondeletebtn"><i class="fas fa-trash"></i></span>
                        </div>
                        `
                    }
                }
            ]
        });

        $(document).on("click", ".pwdupdatebtn", function() {
            window.id = $(this).parent().attr("idkey");
            $("#pwd_reset_modal").modal("show");
        });
        $(".resetpwdbtn").click(function() {
            if ($("#pwd").val() == "") {
                mynotify('danger', 'Please enter password');
            } else if ($("#pwd").val() != $("#cpwd").val()) {
                mynotify('danger', 'Please check password again');
            } else {
                $.ajax({
                    url: '<?php echo base_url() ?>local/Patient/resetpwd',
                    type: 'post',
                    data: {
                        id: window.id,
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
        $(".person_add").click(function() {
            $("#person_add_modal").modal('show');
        });
        $(".personaddbtn").click(function() {
            var data = {
                'patient_id': $("#patient_id").val(),
                'fname': $("#fname").val(),
                'lname': $("#lname").val()
            }
            $.ajax({
                url: '<?php echo base_url() ?>local/Patient/create',
                type: 'post',
                data: data,
                dataType: "text",
                success: function(data) {
                    if (data == "ok") {
                        setTimeout(function() {
                            patienttable.ajax.reload();
                        }, 1000);
                        mynotify('success', 'Add Success');
                    } else {
                        mynotify('danger', 'Add Fail');

                    }
                }
            });
        });

        $(document).on("click", ".personeditbtn", function() {
            window.id = $(this).parent().attr("idkey");
            $.ajax({
                url: '<?php echo base_url() ?>local/Patient/choose',
                method: "POST",
                data: {
                    id: window.id
                },
                dataType: "json",
                success: function(data) {
                    $("#epatient_id").val(data['patient_id']);
                    $("#efname").val(data['fname']);
                    $("#emname").val(data['mname']);
                    $("#elname").val(data['lname']);
                    $("#ephone").val(data['phone']);
                    $("#emobile").val(data['mobile']);
                    $("#eemail").val(data['email']);
                    $("#eaddress").val(data['address']);
                    $("#ecity").val(data['city']);
                    $("#estate").val(data['state']);
                    $("#ezip").val(data['zip']);
                    $("#egender").val(data['gender']);
                    $("#edob").val(data['dob']);
                    $("#elanguage").val(data['language']);
                    $("#eethnicity").val(data['ethnicity']);
                    $("#erace").val(data['race']);
                    $('#patient_active').prop('checked', data['status'] == 1 ? true : false);

                    $("#person_edit_modal").modal('show');
                }
            });
        });
        $(".personeditsubmitbtn").click(function() {
            var data = {
                id: window.id,
                patient_id: $("#epatient_id").val(),
                fname: $("#efname").val(),
                mname: $("#emname").val(),
                lname: $("#elname").val(),
                phone: $("#ephone").val(),
                mobile: $("#emobile").val(),
                email: $("#eemail").val(),
                address: $("#eaddress").val(),
                city: $("#ecity").val(),
                state: $("#estate").val(),
                zip: $("#ezip").val(),
                gender: $("#egender").val(),
                dob: $("#edob").val(),
                language: $("#elanguage").val(),
                ethnicity: $("#eethnicity").val(),
                race: $("#erace").val(),
                status: $('#patient_active').prop('checked') == true ? 1 : 0
            };
            $.ajax({
                url: '<?php echo base_url() ?>local/Patient/update',
                type: 'post',
                data: data,
                dataType: "text",
                success: function(data) {
                    handleTableReload(data, '#patient_tb');
                }
            });
        });
        $(document).on("click", ".persondeletebtn", function() {
            window.id = $(this).parent().attr("idkey");
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
                        url: '<?php echo base_url() ?>local/Patient/delete',
                        method: "POST",
                        data: {
                            id: window.id
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

        $('#btn-patient-upload').click(() => {
            $('#patient-upload-modal').modal('show')
        })

        $('#btn-patient-gather').click(() => {
            $('#patient-gather-modal').modal('show')
        })

        $('#btn-gather-modal').click(() => {
            if (!$('#patient-gather-url').val()) {
                toastr.error('Please enter the url!')
                return
            }

            $('#btn-gather-modal').prop('disabled', true)
            $('#gather-btn-spinner').removeClass('d-none')
            $('#gather-btn-text').html('Gathering ...')

            $.post({
                url: '<?php echo base_url() ?>local/PatientArea/addPatients',
                type: 'POST',
                data: {
                    url: $('#patient-gather-url').val()
                },
                dataType: 'json',
                success: function(result) {
                    if (result.status === 'success') {
                        toastr.success(`You saved ${result.total} new patients information`)
                        $('#patient-gather-modal').hide()
                    } else {
                        toastr.error(`Action failed!`)
                        $('#patient-gather-modal').hide()
                    }

                    $('#btn-gather-modal').prop('disabled', false)
                    $('#gather-btn-spinner').addClass('d-none')
                    $('#gather-btn-text').html('Gather')

                    $('#patient-gather-modal').modal('hide')
                },
                error: function(result) {
                    toastr.error(`Error was occured on server side!`)
                    $('#btn-gather-modal').prop('disabled', false)
                    $('#gather-btn-spinner').addClass('d-none')
                    $('#gather-btn-text').html('Gather')
                }
            })
        })

        $(document).on('click', '.add_security_btn', function() {
            $('#chosen_patient_id').val($(this).parent().attr("idkey"))
            $('#question_add_modal').modal('show')
        })

        // Security Questions
        $.post({
            url: '<?php echo base_url() ?>local/Security/readOnlyActive',
            type: 'POST',
            data: {},
            dataType: 'json',
            success: function(result) {
                var html = ''
                result.data.forEach(item => {
                    html += `<option value='${item.id}'>${item.en}</option>`
                })
                $('#question_list').html(html)
            }
        })

        $('#question_save').click(() => {
            $.post({
                url: '<?php echo base_url() ?>local/Security/addUserSecurity',
                type: 'POST',
                data: {
                    user_id: $('#chosen_patient_id').val(),
                    question_id: $('#question_list').val(),
                    user_type: 'patient',
                    answer: $('#question_answer').val()
                },
                dataType: 'text',
                success: function(result) {
                    if (result == 'ok') {
                        toastr.success('Action Succeed!')
                    }
                },
                error: function(err) {
                    toastr.error('Action Failed!')
                }
            })
        })
    })
</script>
<?php if ($this->session->userdata('csvupload')): ?>
    <script>
        mynotify('danger', "<?php echo $this->session->userdata('csvupload') ?>");
    </script>
    <?php $this->session->unset_userdata('csvupload'); ?>
<?php endif ?>