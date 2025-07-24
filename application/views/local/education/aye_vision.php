<div class="row my-3 p-10 bg-white border rounded">
    <div class="col-12 mb-4 d-flex justify-content-between align-items-center my-10">
        <div>
            <h3>Aye and Vision Documents</h3>
        </div>
        <div><span class='add_aye_vision_document_btn btn btn-light-primary btn-icon'><i class='fa fa-plus'></i></span></div>
    </div>
    <div class="col-12">
        <table class="table" id="aye_vision_document_tb">
            <thead>
                <th>Title(EN)</th>
                <th>Title(ES)</th>
                <th>URL(EN)</th>
                <th>URL(ES)</th>
                <th>Actions</th>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="aye_vision_document_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <input type="hidden" id="modal_document_type" />
            <input type="hidden" id="chosen_document_id" />
            <div class="modal-header">
                <h4 class="modal-title ">Edit Aye and Vision</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class='col-md-12'>
                        <div class="form-group">
                            <h6>Title (EN)</h6>
                            <input type="text" class="form-control" id="av_title_document_en">
                        </div>
                    </div>
                    <div class='col-md-12'>
                        <div class="form-group">
                            <h6>Title (ES)</h6>
                            <input type="text" class="form-control" id="av_title_document_es">
                        </div>
                    </div>
                    <div class='col-md-12'>
                        <div class="form-group">
                            <h6>Description (EN)</h6>
                            <textarea class="form-control" id="av_desc_document_en" style="height:100px;"></textarea>
                        </div>
                    </div>
                    <div class='col-md-12'>
                        <div class="form-group">
                            <h6>Description (ES)</h6>
                            <textarea class="form-control" id="av_desc_document_es" style="height:100px;"></textarea>
                        </div>
                    </div>
                    <div class='col-md-12'>
                        <div class="form-group">
                            <select id="av_document_status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" id="aye_vision_document_save">Save</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="aye_vision_upload_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <input type="hidden" id="modal_video_type" />
            <input type="hidden" id="chosen_video_id" />
            <div class="modal-header">
                <h4 class="modal-title ">Upload Document</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class='col-md-12 mb-5'>
                        <h6>Document (EN)</h6>
                        <div class="custom-file form-group">
                            <input type="file" accept=".doc, .docx, .pdf" class="custom-file-input" id="av_video_status_en" name="av_video_status_en">
                            <label class="custom-file-label" for="av_video_status_en">Choose file</label>
                        </div>
                    </div>
                    <div class='col-md-12'>
                        <h6>Document (ES)</h6>
                        <div class="custom-file form-group">
                            <input type="file" accept=".doc, .docx, .pdf" class="custom-file-input" id="av_video_status_es" name="av_video_status_es">
                            <label class="custom-file-label" for="av_video_status_es">Choose file</label>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary" id="aye_vision_upload_save">Save</button>
                    <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        // Document
        var aye_vision_document_tb = $('#aye_vision_document_tb').DataTable({
            "autoWidth": false,
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search ...",
            },
            "ajax": {
                "url": "<?php echo base_url() ?>local/Education/readDocument",
                "type": "POST",
                "data": {
                    "tag": "aye_vision"
                }
            },
            "columns": [{
                    data: 'title_en'
                },
                {
                    data: 'title_es',
                },
                {
                    data: 'url_en'
                },
                {
                    data: 'url_es'
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return `
                        <div data-id = "` + row.id + `">
                            <span class="btn btn-icon btn-sm btn-light-primary edit_aye_vision_document_btn"><i class="fas fa-edit"></i></span>
                            <span class="btn btn-icon btn-sm btn-light-warning upload_aye_vision_document_btn"><i class="fas fa-upload"></i></span>
                            <span class="btn btn-icon btn-sm btn-light-danger  delete_aye_vision_document_btn"><i class="fas fa-trash"></i></span>
                        </div>
                        `
                    }
                }
            ]
        })

        $(".add_aye_vision_document_btn").click(function() {
            $("#modal_document_type").val("0")

            $("#av_title_document_en").val("")
            $("#av_title_document_es").val("")
            $("#av_desc_document_en").val("")
            $("#av_desc_document_es").val("")
            $("#av_document_status").val(1)

            $("#aye_vision_document_modal").modal("show")
        })

        $(document).on('click', '.edit_aye_vision_document_btn', function() {
            $("#chosen_document_id").val($(this).closest('div').attr('data-id'))
            $.ajax({
                url: `<?php echo base_url() ?>local/Education/readDocumentById`,
                method: "POST",
                data: {
                    id: $(this).closest('div').attr('data-id')
                },
                dataType: "json",
                success: function(data) {
                    if (data) {
                        $("#av_title_document_en").val(data.title_en)
                        $("#av_title_document_es").val(data.title_es)
                        $("#av_desc_document_en").val(data.desc_en)
                        $("#av_desc_document_es").val(data.desc_es)
                        $("#av_document_status").val(data.status)
                    }
                    $("#modal_document_type").val("1")
                    $("#aye_vision_document_modal").modal("show")
                },
                error: function(error) {
                    toastr.error("Error was occurred on the server!")
                }
            });
        })

        $(document).on('click', '#aye_vision_document_save', function() {
            const type = $("#modal_document_type").val()

            const data = {
                id: $("#chosen_document_id").val(),
                title_en: $("#av_title_document_en").val(),
                title_es: $("#av_title_document_es").val(),
                desc_en: $("#av_desc_document_en").val(),
                desc_es: $("#av_desc_document_es").val(),
                status: $("#av_document_status").val(),
                tag: "aye_vision"
            }

            $.ajax({
                url: `<?php echo base_url() ?>local/Education/${type == 0 ? "addDocument" : "updateDocument"}`,
                method: "POST",
                data: data,
                dataType: "text",
                success: function(data) {
                    if (data = "ok") {
                        toastr.success("Saved Successfully!")
                        aye_vision_document_tb.ajax.reload()
                    } else {
                        toastr.success("Action Failed!")
                    }
                    $("#aye_vision_document_modal").modal("hide")
                },
                error: function(error) {
                    toastr.error("Error was occurred on the server!")
                }
            });
        })

        $(document).on('click', '.upload_aye_vision_document_btn', function() {
            $("#chosen_document_id").val($(this).closest('div').attr('data-id'))
            $("#aye_vision_upload_modal").modal("show")
        })

        $(document).on('click', '.delete_aye_vision_document_btn', function() {
            var id = $(this).closest('div').attr('data-id');
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
                        url: '<?php echo base_url() ?>local/Education/deleteDocument',
                        method: "POST",
                        data: {
                            id: id,
                            tag: "aye_vision"
                        },
                        dataType: "text",
                        success: function(data) {
                            if (data = "ok") {
                                toastr.success("Deleted Successfully!")
                                aye_vision_document_tb.ajax.reload()
                            } else {
                                toastr.success("Action Failed!")
                            }
                        },
                        error: function(error) {
                            toastr.error("Error was occurred on the server!")
                        }
                    });
                }
            });
        })

        // upload file
        $("#aye_vision_upload_save").click(function() {
            var fd = new FormData()

            var file_en = $('#av_video_status_en')[0].files
            var file_es = $('#av_video_status_es')[0].files

            var id = $("#chosen_document_id").val()
            fd.append('id', id)

            if (file_en.length > 0) {
                fd.append('file_en', file_en[0])
            }
            if (file_es.length > 0) {
                fd.append('file_es', file_es[0])
            }

            $.ajax({
                url: '<?php echo base_url() ?>local/Education/uploadFiles',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(data) {
                    if (data.msg == "ok") {
                        setTimeout(function() {
                            $("#aye_vision_document_tb").DataTable().ajax.reload()
                        }, 1000);
                        mynotify('success', 'Saved Successfully.')
                        $("#aye_vision_upload_modal").modal("hide")
                    } else {
                        mynotify('danger', 'Upload Failed!')
                    }
                }
            })
        })
    });
</script>