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
                    <div class="row my-3 p-10 bg-white border rounded">
                        <div class="col-12 mb-4 d-flex justify-content-between align-items-center my-5">
                            <div>
                                <h3>Alert Table</h3>
                            </div>
                            <div class='btn btn-light-primary' id="alert_add"><i class='fa fa-plus'></i> Add New</div>
                        </div>
                        <div class="col-12">
                            <div class="table">
                                <table class="table" id="alert_table">
                                    <thead>
                                        <th>Title</th>
                                        <th>Message</th>
                                        <th>Alert Range</th>
                                        <th>Status</th>
                                        <th>Alert Type</th>
                                        <th>Send Status</th>
                                        <th>Created By</th>
                                        <th style="width:150px;">Action</th>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert Modal Begin -->
    <div class="modal fade" id="alert_modal">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <input type="hidden" id="alert-chosen_id" />
                <input type="hidden" id="alert-modal_type" />
                <div class="modal-header">
                    <h4 class="modal-title" style="font-weight:500;">Alert Editor</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-5">
                            <div class="ml-3">
                                <h5>Alert Title(EN)</h5>
                            </div>
                            <input class="form-control" id="alert-title" />
                        </div>
                        <div class="col-md-6 mb-5">
                            <div class="ml-3">
                                <h5>Alert Title(ES)</h5>
                            </div>
                            <input class="form-control" id="alert-title-es" />
                        </div>
                        <div class="col-md-6 mb-5">
                            <div class="ml-3">
                                <h5>Alert Message(EN)</h5>
                            </div>
                            <div id="alert-message" class="alert-summernote"></div>
                        </div>
                        <div class="col-md-6 mb-5">
                            <div class="ml-3">
                                <h5>Alert Message(ES)</h5>
                            </div>
                            <div id="alert-message-es" class="alert-summernote"></div>
                        </div>
                        <div class="col-md-6 mb-5">
                            <div class="ml-3">
                                <h5>Alert Description(EN)</h5>
                            </div>
                            <div id="alert-description" class="alert-summernote"></div>
                        </div>
                        <div class="col-md-6 mb-5">
                            <div class="ml-3">
                                <h5>Alert Description(ES)</h5>
                            </div>
                            <div id="alert-description-es" class="alert-summernote"></div>
                        </div>
                        <div class="col-md-8 mb-5">
                            <div class="ml-3">
                                <h5>Alert Range</h5>
                            </div>
                            <div class="d-flex justify-content-center">
                                <input class="form-control mr-3" type="datetime-local" id="alert-start" />
                                <input class="form-control ml-3" type="datetime-local" id="alert-end" />
                            </div>
                        </div>
                        <div class="col-md-4 mb-5">
                            <div class="ml-3">
                                <h5>Status</h5>
                            </div>
                            <select class="form-control" id="alert-status">
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-12 mx-5 mb-7 d-flex justify-content-start align-items-center">
                            <input type="checkbox" style="width: 24px; height: 24px;" id="alert-image-status" class="align-items-center mx-1" />
                            <label for="alert-image-status" class="align-items-center m-0">&nbsp;&nbsp;Upload Image</label>
                        </div>
                        <div class="col-md-4 mb-5 image-component d-none">
                            <div class="custom-file form-group">
                                <label class="custom-file-label" for="alert-image">Select an image</label>
                                <input type="file" accept="image/*" class="custom-file-input mx-3" id="alert-image" />
                            </div>
                        </div>
                        <div class="col-md-8 mb-5 image-component d-none">
                            <div class="custom-file form-group d-flex justify-content-start align-items-center">
                                <h6 id="alert-image-path"></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row w-100">
                        <div class="col-md-4">
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox" style="width: 24px; height: 24px;" id="alert-type" class="mx-1" />
                                <label for="alert-type" class="align-items-center m-0">
                                    <h6 class="m-0">&nbsp;&nbsp;Only Once</h6>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-8 d-flex justify-content-end">
                            <button type="button" class="btn btn-primary mr-2" id="alert_modal_submit_btn">Submit</button>
                            <button type="button" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Alert Modal End -->
</body>
<script>
    $(document).ready(function() {
        $('.alert-summernote').summernote({
            tabsize: 1,
            height: 120,
        })

        var alertTable = $("#alert_table").DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search alerts",
            },
            "ajax": {
                "url": "<?php echo base_url() ?>local/Alert/read",
                "type": "GET"
            },
            "columns": [{
                    data: "title"
                },
                {
                    data: "message"
                },
                {
                    data: "start",
                    render: function(data, type, row) {
                        return `<div class="start-date">${new Date(row.start).toLocaleDateString('en-US', {month: '2-digit', day: '2-digit', year: 'numeric', hour:"2-digit", minute:"2-digit", hour12: true})}</div>
                        <div class="start-date">${new Date(row.end).toLocaleDateString('en-US', {month: '2-digit', day: '2-digit', year: 'numeric', hour:"2-digit", minute:"2-digit", hour12: true})}</div>`
                    }
                },
                {
                    data: "status",
                    render: function(data, type, row) {
                        return row.status == 0 ? `<span class="text-danger">In Active</span>` : `<span class="text-primary">Active</span>`
                    }
                },
                {
                    data: "type",
                    render: function(data, type, row) {
                        return row.type == "once" ? `<span class="bg-light-primary text-primary p-2 rounded">Only Once</span>` : `<span class="bg-light-success text-success p-2 rounded">Always</span>`
                    }
                },
                {
                    data: "sent",
                    render: function(data, type, row) {
                        return row.sent == 0 ? `<span class="text-primary">No</span>` : `<span class="text-danger">Yes</span>`
                    }
                },
                {
                    data: "created_by",
                    render: function(data, type, row) {
                        return row.fname + " " + row.lname
                    }
                },
                {
                    data: "id",
                    render: function(data, type, row) {
                        return `<div idkey="${row.id}">
                            <span class="btn btn-icon btn-sm btn-light-primary alert_edit_btn"><i class="fas fa-edit"></i></span>
                            <span class="btn btn-icon btn-sm btn-light-danger  alert_delete_btn"><i class="fas fa-trash"></i></span>
                        </div>`
                    }
                }
            ]
        })

        $("#alert_add").click(() => {
            $("#alert-modal_type").val("0")

            $("#alert-title").val("")
            $("#alert-message").summernote("code", "")
            $("#alert-description").summernote("code", "")
            $("#alert-title-es").val("")
            $("#alert-message-es").summernote("code", "")
            $("#alert-description-es").summernote("code", "")
            $("#alert-start").val("")
            $("#alert-end").val("")
            $("#alert-status").val(0)
            $("#alert-type").prop("checked", false)

            $("#alert-image-status").prop("checked", false)
            $(".image-component").addClass("d-none")
            $("#alert-image-path").text("")

            $("#alert_modal").modal("show")
        })

        $("#alert_modal_submit_btn").click(() => {
            var fd = new FormData()
            fd.append("id", $("#alert-chosen_id").val())
            fd.append("title", $("#alert-title").val())
            fd.append("message", $("#alert-message").summernote('code').replace(/<[^>]*>/g, ''))
            fd.append("description", $("#alert-description").summernote('code').replace(/<[^>]*>/g, ''))
            fd.append("title_es", $("#alert-title-es").val())
            fd.append("message_es", $("#alert-message-es").summernote('code').replace(/<[^>]*>/g, ''))
            fd.append("description_es", $("#alert-description-es").summernote('code').replace(/<[^>]*>/g, ''))
            fd.append("start", $("#alert-start").val())
            fd.append("end", $("#alert-end").val())
            fd.append("status", $("#alert-status").val())
            fd.append("type", $("#alert-type").prop("checked") == true ? "once" : "always")
            fd.append("created_by", "<?php echo $this->session->userdata("userid") ?>")
            fd.append("image_actived", $("#alert-image-status").prop("checked"))
            if ($("#alert-image-status").prop("checked") == true) {
                var image = $('#alert-image')[0].files
                fd.append("img", image[0])
                fd.append("img_length", image.length)
            }
            $.post({
                url: $("#alert-modal_type").val() == "0" ? "<?php echo base_url() ?>local/Alert/add" : "<?php echo base_url() ?>local/Alert/update",
                method: "POST",
                data: fd,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(res) {
                    if (res.status == "success") {
                        toastr.success("Action Success!")
                    } else {
                        toastr.error("Action Failed!")
                    }
                    $("#alert_modal").modal("hide")
                    alertTable.ajax.reload()
                },
                error: function(error) {
                    toastr.error("An error was occured on the server!")
                }
            })
        })

        $(document).on("click", ".alert_edit_btn", function() {
            $("#alert-modal_type").val("1")
            $("#alert-chosen_id").val($(this).parent().attr("idkey"))
            $.post({
                url: "<?php echo base_url() ?>local/Alert/chosen",
                method: "POST",
                data: {
                    id: $(this).parent().attr("idkey")
                },
                dataType: "json",
                success: function(res) {
                    $("#alert-title").val(res.title)
                    $("#alert-message").summernote("code", res.message)
                    $("#alert-description").summernote("code", res.description)
                    $("#alert-title-es").val(res.title_es)
                    $("#alert-message-es").summernote("code", res.message_es)
                    $("#alert-description-es").summernote("code", res.description_es)
                    $("#alert-start").val(res.start)
                    $("#alert-end").val(res.end)
                    $("#alert-status").val(res.status)
                    $("#alert-image-status").prop("checked", res.image_actived == 1 ? true : false)
                    if (res.image_actived == 1) {
                        $(".image-component").removeClass("d-none")
                    } else {
                        $(".image-component").addClass("d-none")
                    }
                    res.type == "once" ? $("#alert-type").prop("checked", true) : $("#alert-type").prop("checked", false)
                    $("#alert-image-path").text(res.image)

                    $("#alert_modal").modal("show")
                },
                error: function(error) {
                    toastr.error("An error was occurred on the server!")
                }
            })
        })

        $(document).on("click", ".alert_delete_btn", function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: '<?php echo base_url() ?>local/Alert/delete',
                        method: "POST",
                        data: {
                            id: $(this).parent().attr("idkey")
                        },
                        dataType: "json",
                        success: function(res) {
                            if (res.status == "success") {
                                toastr.success("Action Success!")
                            } else {
                                toastr.error("Action Failed!")
                            }
                            $("#alert_modal").modal("hide")
                            alertTable.ajax.reload()
                        },
                        error: function(error) {
                            toastr.error("An error was occured on the server!")
                        }
                    });
                }
            });
        })

        $("#alert-image-status").on("change", function() {
            if ($(this).prop("checked") == true) {
                $(".image-component").removeClass("d-none")
            } else {
                $(".image-component").addClass("d-none")
            }
        })
    })
</script>

</html>