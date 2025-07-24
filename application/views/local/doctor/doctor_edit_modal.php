<div class="modal fade" id="edit_doctor_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                    <h4 class="modal-title ">Edit Doctor</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id = "edituserfrom" action="" method="post" enctype="multipart/form-data">
                    <div class = "row">
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Name (EN)</h6>
                                <input name = 'een_name' id = 'een_name' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Name (ES)</h6>
                                <input name = 'ees_name' id = 'ees_name' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class = "col-md-3">
                            <div class="form-group">
                                <h6>Email</h6>
                                <input name = 'email' id = 'email' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class = "col-md-3">
                            <div class="form-group">
                                <h6>Tel</h6>
                                <input name = 'tel' id = 'tel' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class = "col-md-3">
                            <div class="form-group">
                                <h6>Ext</h6>
                                <input name = 'ext' id = 'ext' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class = "col-md-3 d-flex d-flex align-items-center">
                            <div class = "mr-1">Email/Tel/Ext Show:</div>
                            <div class = "d-flex align-items-center"><input type = "checkbox" id = "email_tel_ext_toggle" style = "width:20px; height:20px;"></div>
                        </div>

                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>NPI</h6>
                                <input id = 'npi' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Specialty</h6>
                                <input id = 'specialty' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-3">
                            <div class="form-group">
                                <h6>License</h6>
                                <input id = 'license' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-3">
                            <div class="form-group">
                                <h6>License State</h6>
                                <input id = 'license_state' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = 'col-md-3 d-flex align-items-end'>
                            <div class="form-group">
                                <label class="bmd-label-static">License Start Date</label>
                                <input type="date" id = 'license_start' class="form-control">
                            </div>
                        </div>
                        <div class = 'col-md-3 d-flex align-items-end'>
                            <div class="form-group">
                                <label class="bmd-label-static">License End Date</label>
                                <input type="date" id = 'license_end' class="form-control">
                            </div>
                        </div>

                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>DEA</h6>
                                <input id = 'dea' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = 'col-md-3 d-flex align-items-end'>
                            <div class="form-group">
                                <label class="bmd-label-static">DEA Start Date</label>
                                <input type="date" id = 'dea_start' class="form-control">
                            </div>
                        </div>
                        <div class = 'col-md-3 d-flex align-items-end'>
                            <div class="form-group">
                                <label class="bmd-label-static">DEA End Date</label>
                                <input type="date" id = 'dea_end' class="form-control">
                            </div>
                        </div>

                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Job (EN)</h6>
                                <input name = 'een_job' id = 'een_job' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Job (ES)</h6>
                                <input name = 'ees_job' id = 'ees_job' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Description (EN)</h6>
                                <div name = 'een_desc' id = 'een_desc'></div>
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Full Description (EN)</h6>
                                <div name = 'een_fdesc' id = 'een_fdesc'></div>
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Description (ES)</h6>
                                <div name = 'ees_desc' id = 'ees_desc'></div>
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Full Description (ES)</h6>
                                <div name = 'ees_fdesc' id = 'ees_fdesc'></div>
                            </div>
                        </div>
                        <div class = "col-md-6 d-flex d-flex align-items-center">
                            <div class = "mr-1">Send Message Button Show:</div>
                            <div class = "d-flex align-items-center"><input type = "checkbox" id = "send_message_toggle" style = "width:20px; height:20px;"></div>
                        </div>
                        <div class = "col-md-6">
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
                    <button type="button" class="btn btn-light-primary edit_doctor_confirm" data-dismiss="modal">Done</button>
                    <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
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

        $(document).on("click",".edit_doctor_btn",function(){
            $("#chosen_person_id").val($(this).parent().attr("idkey"));
            $.ajax ({
                url: '<?php echo base_url() ?>local/Doctor/choose',
                method: "POST",
                data: {id:$("#chosen_person_id").val()},
                dataType: "json",
                success: function (data) {
                    $("#een_name").val(data['en_name']);
                    $("#ees_name").val(data['es_name']);
                    $("#een_job").val(data['en_job']);
                    $("#ees_job").val(data['es_job']);
                    $("#een_desc").summernote("code",data['en_desc']);
                    $("#ees_desc").summernote("code",data['es_desc']);
                    $("#een_fdesc").summernote("code",data['en_fdesc']);
                    $("#ees_fdesc").summernote("code",data['es_fdesc']);
                    $("#estatus").val(data['status']);
                    $("#email").val(data['email']);
                    $("#tel").val(data['tel']);
                    $("#ext").val(data['ext']);
                    $('#email_tel_ext_toggle').prop('checked', data['email_tel_ext_toggle'] == 1);
                    $('#send_message_toggle').prop('checked', data['send_message_toggle'] == 1);

                    $("#npi").val(data['npi']);
                    $("#specialty").val(data['specialty']);
                    $("#license").val(data['license']);
                    $("#license_state").val(data['license_state']);
                    $("#license_start").val(data['license_start']);
                    $("#license_end").val(data['license_end']);
                    $("#dea").val(data['dea']);
                    $("#dea_start").val(data['dea_start']);
                    $("#dea_end").val(data['dea_end']);

                    $("#edit_doctor_modal").modal('show');
                }
            });
        });
        $(".edit_doctor_confirm").click(function(){
            var fd = new FormData();
            fd.append('id',$("#chosen_person_id").val());
            fd.append('en_name',$("#een_name").val());
            fd.append('es_name',$("#ees_name").val());
            fd.append('en_job',$("#een_job").val());
            fd.append('es_job',$("#ees_job").val());
            fd.append('en_desc',$("#een_desc").summernote("code"));
            fd.append('es_desc',$("#ees_desc").summernote("code"));
            fd.append('en_fdesc',$("#een_fdesc").summernote("code"));
            fd.append('es_fdesc',$("#ees_fdesc").summernote("code"));
            fd.append('status',$("#estatus").val());
            fd.append('email',$("#email").val());
            fd.append('tel',$("#tel").val());
            fd.append('ext',$("#ext").val());
            fd.append('email_tel_ext_toggle',$('#email_tel_ext_toggle').is(":checked") ? 1 : 0);
            fd.append('send_message_toggle',$('#send_message_toggle').is(":checked") ? 1 : 0);

            fd.append('npi',$("#npi").val());
            fd.append('specialty',$("#specialty").val());
            fd.append('license',$("#license").val());
            fd.append('license_state',$("#license_state").val());
            fd.append('license_start',$("#license_start").val());
            fd.append('license_end',$("#license_end").val());
            fd.append('dea',$("#dea").val());
            fd.append('dea_start',$("#dea_start").val());
            fd.append('dea_end',$("#dea_end").val());

            $.ajax({
                url: '<?php echo base_url() ?>local/Doctor/update',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                dataType: "text",
                success: function (data) {
                    handleTableReload(data, '#doctor_tb');
                }
            });
        });
    });
</script>