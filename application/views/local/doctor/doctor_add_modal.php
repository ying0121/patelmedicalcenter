<div class="modal fade" id="add_doctor_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                    <h4 class="modal-title ">Add Doctor</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id = "adduserfrom" action="" method="post" enctype="multipart/form-data">
                    <div class = "row">
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Name (EN)</h6>
                                <input name = 'en_name' id = 'en_name' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Name (ES)</h6>
                                <input name = 'es_name' id = 'es_name' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Job (EN)</h6>
                                <input name = 'en_job' id = 'en_job' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Job (ES)</h6>
                                <input name = 'es_job' id = 'es_job' class="form-control" type="text" required />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Description (EN)</h6>
                                <div name = 'en_desc' id = 'en_desc'></div>
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Full Description (EN)</h6>
                                <div name = 'en_fdesc' id = 'en_fdesc'></div>
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Description (ES)</h6>
                                <div name = 'es_desc' id = 'es_desc'></div>
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Full Description (ES)</h6>
                                <div name = 'es_fdesc' id = 'es_fdesc'></div>
                            </div>
                        </div>
                        <div class = "col-md-6">
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
                    <button type="button" class="btn btn-light-primary add_doctor_confirm" data-dismiss="modal">Done</button>
                    <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
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
        $(".add_doctor_btn").click(function(){
            $("#add_doctor_modal").modal('show');
        });
        $(".add_doctor_confirm").click(function(){
            var fd = new FormData();
            fd.append('en_name',$("#en_name").val());
            fd.append('es_name',$("#es_name").val());
            fd.append('en_job',$("#en_job").val());
            fd.append('es_job',$("#es_job").val());
            fd.append('en_desc',$("#en_desc").summernote("code"));
            fd.append('es_desc',$("#es_desc").summernote("code"));
            fd.append('en_fdesc',$("#en_fdesc").summernote("code"));
            fd.append('es_fdesc',$("#es_fdesc").summernote("code"));
            fd.append('status',$("#status").val());
            $.ajax({
                url: '<?php echo base_url() ?>local/Doctor/create',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                dataType: "text",
                success: function (data) {
                    if(data == "ok"){
                        setTimeout( function () {
                            $('#doctor_tb').DataTable().ajax.reload();
                        }, 1000 );
                        mynotify('success','Add Success');
                    }
                    else{
                        mynotify('danger','Add Fail');

                    }
                }
            });
        });
    });
</script>

