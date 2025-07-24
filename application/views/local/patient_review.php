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

                        <div class = "row my-3 p-10 bg-white border rounded">
                            <div class = "col-12 mb-4 d-flex justify-content-between align-items-center my-5">
                                <div><h3>Patient Reviews</h3></div>
                                <div><span class = 'person_add btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
                            </div>
                            <div class = "col-12">
                                <div class="table-responsive">
                                    <table class="table" id="person_tb">
                                        <thead>
                                            <th>Photo</th>
                                            <th>Full Name</th>
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
	<div class="modal fade" id="person_add_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Add Staff</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form id = "adduserfrom" action="" method="post" enctype="multipart/form-data">
                        <div class = "row">
                            <div class = "col-md-6">
                                <div class="form-group">
                                    <h6>Full Name (EN)</h6>
                                    <input name = 'en_name' id = 'en_name' class="form-control" type="text" required />
                                </div>
                            </div>
                            <div class = "col-md-6">
                                <div class="form-group">
                                    <h6>Full Name (ES)</h6>
                                    <input name = 'es_name' id = 'es_name' class="form-control" type="text" required />
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
                                    <h6>Description (ES)</h6>
                                    <div name = 'es_desc' id = 'es_desc'></div>
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
                        <h4 class="modal-title ">Edit Staff</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form id = "edituserfrom" action="" method="post" enctype="multipart/form-data">
                        <div class = "row">
                            <div class = "col-md-6">
                                <div class="form-group">
                                    <h6>Full Name (EN)</h6>
                                    <input name = 'een_name' id = 'een_name' class="form-control" type="text" required />
                                </div>
                            </div>
                            <div class = "col-md-6">
                                <div class="form-group">
                                    <h6>Full Name (ES)</h6>
                                    <input name = 'ees_name' id = 'ees_name' class="form-control" type="text" required />
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
                                    <h6>Description (ES)</h6>
                                    <div name = 'ees_desc' id = 'ees_desc'></div>
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
                                    <h6>Full Description (ES)</h6>
                                    <div name = 'ees_fdesc' id = 'ees_fdesc'></div>
                                </div>
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
                        <button type="button" class="btn btn-light-primary personeditsubmitbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
	<div class="modal fade" id="avatar_edit_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Upload Photo</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = 'col-md-12'>
                            <h6>Photo(100&times;100)</h6>
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
                    searchPlaceholder: "Search reviews",
                },
                "ajax": {
                    "url": "<?php echo base_url() ?>local/PatientReview/read",
                    "type": "GET"
                },
                "columns": [
                    { data: 'img',
                        render: function (data, type, row) {
                            if(row.img != null)
                                return `
                                <img src="${"<?php echo base_url() ?>assets/images/patient_review/"+row.img}" width="100" />
                                `
                            else
                                return `
                                <img src="${"<?php echo base_url() ?>assets/images/patient_review/empty-img.jpg"}" width="100" />
                                `
                        } 
                    },
                    { data: 'en_name' },
                    { data: 'status', render: function(data, type, row){
                            if(row.status == 1)
                                return `<div class="text-success">Visible</div>`;
                            else
                                return `<div class="text-danger">Invisible</div>`;
                        }
                    },
                    { data: 'id',
                        render: function (data, type, row) {
                            return `
                            <div idkey="`+row.id+`">
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
            $(".person_add").click(function(){
                $("#person_add_modal").modal('show');
            });
            $(".personaddbtn").click(function(){
                var fd = new FormData();
                fd.append('en_name',$("#en_name").val());
                fd.append('es_name',$("#es_name").val());
                fd.append('en_desc',$("#en_desc").summernote("code"));
                fd.append('es_desc',$("#es_desc").summernote("code"));
                fd.append('en_fdesc',$("#en_fdesc").summernote("code"));
                fd.append('es_fdesc',$("#es_fdesc").summernote("code"));
                fd.append('status',$("#status").val());
                $.ajax({
                    url: '<?php echo base_url() ?>local/PatientReview/create',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                persontable.ajax.reload();
                            }, 1000 );
                            mynotify('success','Add Success');
                        }
                        else{
                            mynotify('danger','Add Fail');

                        }
                    }
                });
            });
            $(document).on("click",".personeditbtn",function(){
                window.id = $(this).parent().attr("idkey");
                $.ajax ({
                    url: '<?php echo base_url() ?>local/PatientReview/choose',
                    method: "POST",
                    data: {id: window.id},
                    dataType: "json",
                    success: function (data) {
                        $("#een_name").val(data['en_name']);
                        $("#ees_name").val(data['es_name']);
                        $("#een_desc").summernote("code",data['en_desc']);
                        $("#ees_desc").summernote("code",data['es_desc']);
                        $("#een_fdesc").summernote("code",data['en_fdesc']);
                        $("#ees_fdesc").summernote("code",data['es_fdesc']);
                        $("#estatus").val(data['status']);
                        $("#person_edit_modal").modal('show');
                    }
                });
            });
            $(".personeditsubmitbtn").click(function(){
                var fd = new FormData();
                fd.append('id', window.id);
                fd.append('en_name',$("#een_name").val());
                fd.append('es_name',$("#ees_name").val());
                fd.append('en_desc',$("#een_desc").summernote("code"));
                fd.append('es_desc',$("#ees_desc").summernote("code"));
                fd.append('en_fdesc',$("#een_fdesc").summernote("code"));
                fd.append('es_fdesc',$("#ees_fdesc").summernote("code"));
                fd.append('status',$("#estatus").val());
                $.ajax({
                    url: '<?php echo base_url() ?>local/PatientReview/update',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                persontable.ajax.reload();
                            }, 1000 );
                            mynotify('success','Update Success');
                        }
                        else{
                            mynotify('danger','Update Fail');

                        }
                    }
                });
            });
            $(document).on("click",".persondeletebtn",function(){
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
                        $.ajax ({
                            url: '<?php echo base_url() ?>local/PatientReview/delete',
                            method: "POST",
                            data: {id: window.id},
                            dataType: "text",
                            success: function (data) {
                                if(data = "ok")
                                    tmp.remove();
                            }
                        });
                    }
                });
            });
            $(document).on("click",".personimgbtn",function(){
                window.id = $(this).parent().attr("idkey");
                $("#avatar_edit_modal").modal('show');
            });
            $(".imgeditsubmitbtn").click(function(){
                var fd = new FormData();
                var img = $('#upload_image_img')[0].files;
                var id = window.id;
                if(img.length > 0 ){
                    fd.append('id', id);
                    fd.append('img',img[0]);
                }
                $.ajax({
                    url: '<?php echo base_url() ?>local/PatientReview/uploadImg',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            setTimeout( function () {
                                $("#person_tb").DataTable().ajax.reload();
                            }, 1000 );
                            mynotify('success','Upload Success');
                        }
                        else{
                            mynotify('danger','Upload Fail');
                        }
                    }
                });
            });
            
        });
    </script>
</html>
