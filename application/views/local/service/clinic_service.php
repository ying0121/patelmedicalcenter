<div class="row my-3 p-10 bg-white border rounded">
    <div class="col-12 mb-4 d-flex justify-content-between align-items-center my-5">
        <div class="d-flex justify-content-start align-items-center">
            <h3 class="m-0 mr-5">Clinic Services</h3>
            <div class="mr-5">
                <select class="form-control" id="clinic_service_category_filter">
                </select>
            </div>
            <div>
                <select class="form-control" id="clinic_service_language_filter">
                </select>
            </div>
        </div>
        <div class='btn btn-light-primary btn-icon' id="clinic_service_add"><i class='fa fa-plus'></i></div>
    </div>
    <div class="row w-100">
        <div class="col-12">
            <table class="table w-100" id="clinic_service_table">
                <thead>
                    <th>Title</th>
                    <th>Short Description</th>
                    <th>Image</th>
                    <th>Video</th>
                    <th>Status</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="clinic_service_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Clinic Service</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <input type="hidden" id="clinic_service_modal_type" />
            <input type="hidden" id="clinic_service_chosen_id" />
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <h6>Language</h6>
                            <select class="form-control" id="clinic_service_language">
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h6>Category</h6>
                            <select class="form-control" id="clinic_service_category">
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <h6 class="mb-3">Title <span class="text-danger">*</span></h6>
                            <input id="clinic_service_title" class="form-control" type="text" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <h6 class="mb-3">Short Description</h6>
                            <div class="serivce_summernote" id="clinic_service_short_desc"></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <h6 class="mb-3">Long Description</h6>
                            <div class="serivce_summernote" id="clinic_service_long_desc"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h6>Status</h6>
                            <select class="form-control" id="clinic_service_status">
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h6 class="mb-3">Cost <span class="text-danger"></span></h6>
                            <input id="clinic_service_cost" class="form-control" type="number" />
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center"><input type="checkbox" id="clinic_service_request" style="width:24px; height:24px;"></div>
                            <div class="mr-1 fs-2">&nbsp;Request Services</div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center"><input type="checkbox" id="clinic_service_payment" style="width:24px; height:24px;"></div>
                            <div class="mr-1 fs-2">&nbsp;Online Payment</div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center"><input type="checkbox" id="clinic_service_home" style="width:24px; height:24px;"></div>
                            <div class="mr-1 fs-2">&nbsp;Home Page</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" id="clinic_service_save_btn">Save</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="clinic_service_file_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="clinic_service_file_modal_title">Upload File</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <input type="hidden" id="clinic_service_file_modal_type" />
            <input type="hidden" id="clinic_service_file_chosen_id" />
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-5">
                        <h6 class=" mb-3" id="clinic_service_file_modal_label">File URL</h6>
                        <div class="custom-file form-group mb-5">
                            <input type="file" accept="*.*" class="custom-file-input" id="clinic_service_file" name="clinic_service_file">
                            <label class="custom-file-label" for="clinic_service_file">File URL</label>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex justify-content-center align-items-center"
                        id="progress-wrapper-file">
                        <progress class="w-100 mr-3" id="progressbar-file" value="0" max="100" style="height: 21px;"></progress>
                        <span id="progress-percentage-file">0%</span>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" id="clinic_service_file_save_btn">Upload</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(async function() {
        $('.serivce_summernote').summernote({
            tabsize: 1,
            height: 150,
        });

        // language
        $.ajax({
            url: '<?php echo base_url() ?>' + 'local/Language/getAll',
            method: "POST",
            dataType: "json",
            success: function(data) {
                const result = data.data
                let html = ""
                let filter_html = ""
                result.forEach(item => {
                    if (item.English) {
                        if (item.code == 'en') {
                            html += `<option value="${item.id}" selected>${item.English}</option>`
                        } else {
                            html += `<option value="${item.id}">${item.English}</option>`
                        }
                        filter_html += `<option value="${item.id}">${item.English}</option>`
                    }
                })
                $("#clinic_service_language").html(html)
                $("#clinic_service_language_filter").html("<option value='0'>All Languages</option>" + filter_html)
            }
        })
        // service category
        $.ajax({
            url: '<?php echo base_url() ?>' + 'local/Services/getServiceCategory',
            method: "POST",
            dataType: "json",
            success: function(data) {
                const result = data.data
                let html = ""
                result.forEach(item => {
                    html += `<option value="${item.id}">${item.name}</option>`
                })
                $("#clinic_service_category").html(html)
                $("#clinic_service_category_filter").html("<option value='0'>All Categories</option>" + html)
            }
        })

        const clinic_service_table = $("#clinic_service_table").DataTable({
            "pagingType": "full_numbers",
            "processing": true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            "order": [
                [0, 'asc']
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            },
            "ajax": {
                "url": '<?php echo base_url() ?>' + 'local/Services/getClinicService',
                "type": "POST",
                "data": function(data) {
                    data.category = $("#clinic_service_category_filter").val() ? $("#clinic_service_category_filter").val() : 0
                    data.language = $("#clinic_service_language_filter").val() ? $("#clinic_service_language_filter").val() : 0
                }
            },
            "columns": [{
                data: 'title'
            }, {
                data: 'short_desc'
            }, {
                data: 'image',
                render: function(data, type, row) {
                    return row.image ? `<img src="<?php echo base_url() ?>assets/service/image/${row.image}" width="140px" />` : ""
                }
            }, {
                data: 'video',
                render: function(data, type, row) {
                    return row.video ? `<a href="<?php echo base_url() ?>assets/service/video/${row.video}" class="text-primary" target="_blank">${row.video}</a>` : ""
                }
            }, {
                data: 'status',
                render: function(data, type, row) {
                    if (row.status == 1)
                        return `<div class="text-success">Active</div>`
                    else
                        return `<div class="text-danger">Inactive</div>`
                }
            }, {
                data: 'id',
                render: function(data, type, row) {
                    return `<div idkey="${row.id}">
                                <span class="btn btn-icon btn-sm btn-light-warning clinic_service_edit"><i class="fas fa-edit"></i></span>
                                <span class="btn btn-icon btn-sm btn-light-primary clinic_service_image"><i class="fas fa-image"></i></span>
                                <span class="btn btn-icon btn-sm btn-light-success clinic_service_video"><i class="fas fa-video"></i></span>
                                <span class="btn btn-icon btn-sm btn-light-danger clinic_service_delete"><i class="fas fa-trash"></i></span>
                            </div>`
                }
            }]
        })

        $("#clinic_service_add").click(function() {
            $("#clinic_service_modal_type").val("0")
            $("#clinic_service_title").val("")
            $("#clinic_service_short_desc").val("")
            $("#clinic_service_long_desc").val("")
            $("#clinic_service_image").val("")
            $("#clinic_service_video").val("")
            $("#clinic_service_cost").val("")
            $("#clinic_service_modal").modal("show")
        })

        $("#clinic_service_save_btn").click(function() {
            const type = $("#clinic_service_modal_type").val()

            const entry = {
                id: $("#clinic_service_chosen_id").val(),
                language: $("#clinic_service_language").val(),
                category: $("#clinic_service_category").val(),
                title: $("#clinic_service_title").val(),
                short_desc: $("#clinic_service_short_desc").summernote('code'),
                long_desc: $("#clinic_service_long_desc").summernote('code'),
                status: $("#clinic_service_status").val(),
                request_service: $("#clinic_service_request").prop("checked") == true ? 1 : 0,
                online_payment: $("#clinic_service_payment").prop("checked") == true ? 1 : 0,
                home_page: $("#clinic_service_home").prop("checked") == true ? 1 : 0,
                cost: $("#clinic_service_cost").val()
            }

            if (!entry.title) {
                toastr.info("Please enter title!")
                return
            }

            $.ajax({
                url: '<?php echo base_url() ?>' + `local/Services/${type == 0 ? "addClinicService" : "updateClinicService"}`,
                method: "POST",
                data: entry,
                dataType: "text",
                success: function(data) {
                    if (data == "ok") {
                        toastr.success("Saved Successfully!");
                        clinic_service_table.ajax.reload();
                    }
                    $("#clinic_service_modal").modal("hide")
                }
            });
        })

        $("#clinic_service_file_save_btn").click(function() {
            var fd = new FormData();

            const type = $("#clinic_service_file_modal_type").val()

            var service_file = $('#clinic_service_file')[0].files;

            let w, h
            if (service_file.length > 0) {
                if (type == 'image') {
                    const reader = new FileReader()
                    reader.onload = function(e) {
                        const img = new Image()
                        img.src = e.target.result

                        img.onload = function() {
                            w = img.width
                            h = img.height
                        }
                    }
                    reader.readAsDataURL(service_file[0])
                }

                fd.append("file", service_file[0]);
            } else {
                toastr.info("Please select a file");
                return
            }
            setTimeout(function() {
                if (type == 'image') {
                    if (w > 1024 || w > 768) {
                        toastr.info("This image is too large.")
                        return;
                    }
                }
                fd.append("id", $("#clinic_service_file_chosen_id").val());
                fd.append("type", type);

                $("#clinic_service_file_save_btn").prop("disabled", true);
                $.ajax({
                    xhr: function() {
                        let xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(event) {
                            if (event.lengthComputable) {
                                let percentComplete = event.loaded / event.total * 100;
                                $('#progressbar-file').val(percentComplete);
                                $('#progress-percentage-file').text(Math.round(percentComplete) + '%');
                            }
                        }, false);
                        return xhr;
                    },
                    url: '<?php echo base_url() ?>' + `local/Services/uploadServiceFile`,
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: fd,
                    dataType: "text",
                    success: function(data) {
                        if (data == "ok") {
                            toastr.success("Saved Successfully!");
                            clinic_service_table.ajax.reload();
                            $("#clinic_service_file_modal").modal("hide")
                        } else {
                            toastr.warning("Upload Failed!");
                        }
                        $("#clinic_service_file_save_btn").prop("disabled", false);
                    },
                    error: function(error) {
                        if (error) {
                            toastr.error(error.statusText);
                        } else {
                            toastr.error("Error!");
                        }
                        $("#clinic_service_file_save_btn").prop("disabled", false);
                    }
                });
            }, 1000)
        })

        $(document).on("click", ".clinic_service_edit", function() {
            const id = $(this).parent().attr("idkey")
            $("#clinic_service_chosen_id").val(id)
            $("#clinic_service_modal_type").val("1")

            $.ajax({
                url: '<?php echo base_url() ?>' + 'local/Services/chosenClinicService',
                method: "POST",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    const result = data.data
                    $("#clinic_service_category").val(result.category)
                    $("#clinic_service_language").val(result.language)
                    $("#clinic_service_title").val(result.title)
                    $("#clinic_service_short_desc").summernote("code", result.short_desc)
                    $("#clinic_service_long_desc").summernote("code", result.long_desc)
                    $("#clinic_service_status").val(result.status)
                    $("#clinic_service_request").prop("checked", result.request_service == 0 ? false : true)
                    $("#clinic_service_payment").prop("checked", result.online_payment == 0 ? false : true)
                    $("#clinic_service_home").prop("checked", result.home_page == 0 ? false : true)
                    $("#clinic_service_cost").val(result.cost)

                    $("#clinic_service_modal").modal("show")
                }
            })
        })

        $(document).on("click", ".clinic_service_image", function() {
            const id = $(this).parent().attr("idkey")
            $("#clinic_service_file_chosen_id").val(id)
            $("#clinic_service_file_modal_type").val("image")
            $("#clinic_service_file").prop("accept", "image/*")
            $("#clinic_service_file_modal_title").text("Upload Image (400 * 267)")
            $("#clinic_service_file_modal_label").text("Please select an image")

            $('#progressbar-file').val(0);
            $('#progress-percentage-file').text(Math.round(0) + '%');

            $("#clinic_service_file_modal").modal("show")
        })

        $(document).on("click", ".clinic_service_video", function() {
            const id = $(this).parent().attr("idkey")
            $("#clinic_service_file_chosen_id").val(id)
            $("#clinic_service_file_modal_type").val("video")
            $("#clinic_service_file").prop("accept", "video/*")
            $("#clinic_service_file_modal_title").text("Upload Video")
            $("#clinic_service_file_modal_label").text("Please select a video")

            $('#progressbar-file').val(0);
            $('#progress-percentage-file').text(Math.round(0) + '%');

            $("#clinic_service_file_modal").modal("show")
        })

        $(document).on("click", ".clinic_service_delete", function() {
            const id = $(this).parent().attr("idkey")
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: '<?php echo base_url() ?>' + 'local/Services/deleteClinicService',
                        method: "POST",
                        data: {
                            id: id
                        },
                        dataType: "text",
                        success: function(data) {
                            if (data == "ok") {
                                toastr.success("Deleted Successfully!")
                                clinic_service_table.ajax.reload()
                            }
                        }
                    })
                }
            });
        })

        // filters
        $(document).on('change', "#clinic_service_category_filter", function() {
            clinic_service_table.ajax.reload()
        })

        $(document).on('change', "#clinic_service_language_filter", function() {
            clinic_service_table.ajax.reload()
        })
    })
</script>