<style>
    .icon-font {
        font-size: 24px;
    }

    .custom-selection {
        position: relative;
        background-color: #ffffffff;
        background-clip: padding-box;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        border: 1px solid #e4e6ef;
        border-radius: 0.5rem;
        box-shadow: none;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
        margin-bottom: 1.75rem;
        color: #3F4254;
    }

    .custom-select-selected {
        background-color: #ffffffff;
        background-clip: padding-box;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        border-radius: 0.5rem;
        box-shadow: none;
        padding: 10px;
        cursor: pointer;
    }

    .custom-select-items div,
    .custom-select-selected {
        color: black;
        padding: 8px 16px;
        cursor: pointer;
        user-select: none;
    }

    .custom-select-items {
        position: absolute;
        background-color: #ffffffff;
        background-clip: padding-box;
        border: 1px solid #3699FF;
        border-radius: 6px;
        z-index: 99;
        width: 100%;
        height: 400px;
        overflow-y: scroll;
    }

    .custom-select-items-container {
        padding-left: 0 !important;
        padding-right: 0 !important;
    }

    .custom-select-items-container div:hover {
        background-color: #3699FF;
        color: white;
    }

    .custom-select-hide {
        display: none;
    }
</style>

<div class="row my-3 p-10 bg-white border rounded">
    <div class="col-12 mb-4 d-flex justify-content-between align-items-center my-5">
        <div class="d-flex justify-content-start align-items-center">
            <h3 class="m-0 mr-5">Letters</h3>
            <div class="mr-5">
                <select class="form-control" id="letters_category_filter">
                </select>
            </div>
            <div>
                <select class="form-control" id="letters_language_filter">
                </select>
            </div>
        </div>
        <div class='btn btn-light-primary btn-icon' id="letters_add"><i class='fa fa-plus'></i></div>
    </div>
    <div class="row w-100">
        <div class="col-12">
            <table class="table w-100" id="letters_table">
                <thead>
                    <th>Icon</th>
                    <th>Language</th>
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

<div class="modal fade" id="letters_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Letter</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <input type="hidden" id="letters_modal_type" />
            <input type="hidden" id="letters_chosen_id" />
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <h6>Language</h6>
                            <select class="form-control" id="letters_language">
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h6>Icon</h6>
                        <div class="custom-selection">
                            <div class="custom-select-selected">Select an option</div>
                            <div class="custom-select-items custom-select-hide" data-value="0" id="letters_icon">
                                <div class="w-100 p-1">
                                    <input type="text" class="form-control custom-select-items-filter" />
                                </div>
                                <div class="custom-select-items-container"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h6>Category</h6>
                            <select class="form-control" id="letters_category">
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h6 class="mb-3">Title <span class="text-danger">*</span></h6>
                            <input id="letters_title" class="form-control" type="text" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h6 class="mb-3">Short Description</h6>
                            <div class="letter_summernote" id="letters_short_desc"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h6 class="mb-3">Long Description</h6>
                            <div class="letter_summernote" id="letters_long_desc"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h6>Status</h6>
                            <select class="form-control" id="letters_status">
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h6 class="mb-3">Cost <span class="text-danger"></span></h6>
                            <input id="letters_cost" class="form-control" type="number" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center"><input type="checkbox" id="letters_request" style="width:24px; height:24px;"></div>
                            <div class="mr-1 fs-2">&nbsp;Request Letters</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center"><input type="checkbox" id="letters_payment" style="width:24px; height:24px;"></div>
                            <div class="mr-1 fs-2">&nbsp;Online Payment</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" id="letters_save_btn">Save</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="letters_file_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="letters_file_modal_title">Upload File</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <input type="hidden" id="letters_file_modal_type" />
            <input type="hidden" id="letters_file_chosen_id" />
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-5">
                        <h6 class=" mb-3" id="letters_file_modal_label">File URL</h6>
                        <div class="custom-file form-group mb-5">
                            <input type="file" accept="*.*" class="custom-file-input" id="letters_file" name="letters_file">
                            <label class="custom-file-label" for="letters_file">File URL</label>
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
                <button type="button" class="btn btn-light-primary" id="letters_file_save_btn">Upload</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    const _icons = []
    $(document).ready(async function() {
        $('.letter_summernote').summernote({
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
                $("#letters_language").html(html)
                $("#letters_desc_language_filter").html(html)
                $("#letters_language_filter").html("<option value='0'>All Languages</option>" + filter_html)
            }
        })

        // service category
        $.ajax({
            url: '<?php echo base_url() ?>' + 'local/Letters/readLetterCategory',
            method: "POST",
            dataType: "json",
            success: function(data) {
                const result = data.data
                let html = ""
                let html1 = ""
                result.forEach(item => {
                    html += `<option value="${item.id}">${item.name}</option>`
                    if (item.lang == 17) {
                        html1 += `<option value="${item.id}">${item.name}</option>`
                    }
                })
                $("#letters_category").html(html1)
                $("#letters_category_filter").html("<option value='0'>All Categories</option>" + html)
            }
        })

        // icon
        $.ajax({
            url: '<?php echo base_url() ?>' + 'local/Setting/readIcons',
            method: "POST",
            dataType: "json",
            success: function(result) {
                let html = ""
                result.forEach(item => {
                    html += `<div value="${item.name}"><i class="fa fa-${item.name}" value="${item.name}"></i> ${item.name}</div>`
                    _icons.push(item.name)
                })
                $(".custom-select-items-container").html(html)

                // events
                document.querySelectorAll('.custom-select-items-container div').forEach(item => {
                    item.addEventListener('click', function() {
                        document.querySelector('.custom-select-selected').innerHTML = this.innerHTML

                        $("#letters_icon").attr("data-value", $(document.querySelector('.custom-select-selected').innerHTML).attr("value"))

                        this.parentNode.parentNode.classList.add('custom-select-hide')
                    })
                })
            }
        })

        const letters_table = $("#letters_table").DataTable({
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
                "url": '<?php echo base_url() ?>' + 'local/Letters/readLetters',
                "type": "POST",
                "data": function(data) {
                    data.category = $("#letters_category_filter").val() ? $("#letters_category_filter").val() : 0
                    data.language = $("#letters_language_filter").val() ? $("#letters_language_filter").val() : 0
                }
            },
            "columns": [{
                data: 'icon',
                render: function(data, type, row) {
                    return `<icon class="fa fa-${row.icon} icon-font"></icon>`
                }
            }, {
                data: 'language_name'
            }, {
                data: 'title'
            }, {
                data: 'short_desc'
            }, {
                data: 'image',
                render: function(data, type, row) {
                    return row.image ? `<img src="<?php echo base_url() ?>assets/letter/image/${row.image}" width="140px" />` : ""
                }
            }, {
                data: 'video',
                render: function(data, type, row) {
                    return row.video ? `<a href="<?php echo base_url() ?>assets/letter/video/${row.video}" class="text-primary" target="_blank">${row.video}</a>` : ""
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
                                <span class="btn btn-icon btn-sm btn-light-warning letters_edit"><i class="fas fa-edit"></i></span>
                                <span class="btn btn-icon btn-sm btn-light-primary letters_image"><i class="fas fa-image"></i></span>
                                <span class="btn btn-icon btn-sm btn-light-success letters_video"><i class="fas fa-video"></i></span>
                                <span class="btn btn-icon btn-sm btn-light-danger letters_delete"><i class="fas fa-trash"></i></span>
                            </div>`
                }
            }]
        })

        $("#letters_add").click(function() {
            $("#letters_modal_type").val("0")
            $("#letters_title").val("")
            $("#letters_short_desc").val("")
            $("#letters_long_desc").val("")
            $("#letters_image").val("")
            $("#letters_video").val("")
            $("#letters_cost").val("")
            $("#letters_modal").modal("show")
        })

        $("#letters_save_btn").click(function() {
            const type = $("#letters_modal_type").val()

            const entry = {
                id: $("#letters_chosen_id").val(),
                language: $("#letters_language").val(),
                icon: $("#letters_icon").attr("data-value"),
                category: $("#letters_category").val(),
                title: $("#letters_title").val(),
                short_desc: $("#letters_short_desc").summernote('code'),
                long_desc: $("#letters_long_desc").summernote('code'),
                status: $("#letters_status").val(),
                request_letter: $("#letters_request").prop("checked") == true ? 1 : 0,
                online_payment: $("#letters_payment").prop("checked") == true ? 1 : 0,
                cost: $("#letters_cost").val()
            }

            if (!entry.title) {
                toastr.info("Please enter title!")
                return
            }

            $.ajax({
                url: '<?php echo base_url() ?>' + `local/Letters/${type == 0 ? "addLetters" : "updateLetters"}`,
                method: "POST",
                data: entry,
                dataType: "text",
                success: function(data) {
                    if (data == "ok") {
                        toastr.success("Saved Successfully!");
                        letters_table.ajax.reload();
                    }
                    $("#letters_modal").modal("hide")
                }
            });
        })

        $("#letters_file_save_btn").click(function() {
            var fd = new FormData();

            const type = $("#letters_file_modal_type").val()

            var service_file = $('#letters_file')[0].files;

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
                fd.append("id", $("#letters_file_chosen_id").val());
                fd.append("type", type);

                $("#letters_file_save_btn").prop("disabled", true);
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
                    url: '<?php echo base_url() ?>' + `local/Letters/uploadLetterFile`,
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: fd,
                    dataType: "text",
                    success: function(data) {
                        if (data == "ok") {
                            toastr.success("Saved Successfully!");
                            letters_table.ajax.reload();
                            $("#letters_file_modal").modal("hide")
                        } else {
                            toastr.warning("Upload Failed!");
                        }
                        $("#letters_file_save_btn").prop("disabled", false);
                    },
                    error: function(error) {
                        if (error) {
                            toastr.error(error.statusText);
                        } else {
                            toastr.error("Error!");
                        }
                        $("#letters_file_save_btn").prop("disabled", false);
                    }
                });
            }, 1000)
        })

        $(document).on("click", ".letters_edit", function() {
            const id = $(this).parent().attr("idkey")
            $("#letters_chosen_id").val(id)
            $("#letters_modal_type").val("1")

            $.ajax({
                url: '<?php echo base_url() ?>' + 'local/Letters/chosenLetters',
                method: "POST",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    const result = data.data
                    $("#letters_category").val(result.category)
                    $("#letters_language").val(result.language)

                    $(".custom-select-selected").html(`<i class="fa fa-${result.icon}" value="${result.icon}"></i> ${result.icon}`)
                    $("#letters_icon").attr("data-value", result.icon)

                    $("#letters_title").val(result.title)
                    $("#letters_short_desc").summernote("code", result.short_desc)
                    $("#letters_long_desc").summernote("code", result.long_desc)
                    $("#letters_status").val(result.status)
                    $("#letters_request").prop("checked", result.request_letter == 0 ? false : true)
                    $("#letters_payment").prop("checked", result.online_payment == 0 ? false : true)
                    $("#letters_cost").val(result.cost)

                    $("#letters_modal").modal("show")
                }
            })
        })

        $(document).on("click", ".letters_image", function() {
            const id = $(this).parent().attr("idkey")
            $("#letters_file_chosen_id").val(id)
            $("#letters_file_modal_type").val("image")
            $("#letters_file").prop("accept", "image/*")
            $("#letters_file_modal_title").text("Upload Image (400 * 267)")
            $("#letters_file_modal_label").text("Please select an image")

            $('#progressbar-file').val(0);
            $('#progress-percentage-file').text(Math.round(0) + '%');

            $("#letters_file_modal").modal("show")
        })

        $(document).on("click", ".letters_video", function() {
            const id = $(this).parent().attr("idkey")
            $("#letters_file_chosen_id").val(id)
            $("#letters_file_modal_type").val("video")
            $("#letters_file").prop("accept", "video/*")
            $("#letters_file_modal_title").text("Upload Video")
            $("#letters_file_modal_label").text("Please select a video")

            $('#progressbar-file').val(0);
            $('#progress-percentage-file').text(Math.round(0) + '%');

            $("#letters_file_modal").modal("show")
        })

        $(document).on("click", ".letters_delete", function() {
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
                        url: '<?php echo base_url() ?>' + 'local/Letters/deleteLetters',
                        method: "POST",
                        data: {
                            id: id
                        },
                        dataType: "text",
                        success: function(data) {
                            if (data == "ok") {
                                toastr.success("Deleted Successfully!")
                                letters_table.ajax.reload()
                            }
                        }
                    })
                }
            });
        })

        $("#letters_language").change(e => {
            $.ajax({
                url: '<?php echo base_url() ?>' + 'local/Letters/readLetterCategory',
                method: "POST",
                dataType: "json",
                data: {
                    lang: e.target.value
                },
                success: function(data) {
                    const result = data.data
                    let html = ""
                    result.forEach(item => {
                        html += `<option value="${item.id}">${item.name}</option>`
                    })
                    $("#letters_category").html(html)
                }
            })
        })

        // filters
        $(document).on('change', "#letters_category_filter", function() {
            letters_table.ajax.reload()
        })

        $(document).on('change', "#letters_language_filter", function() {
            letters_table.ajax.reload()
        })

        // events
        document.querySelector('.custom-select-selected').addEventListener('click', function() {
            this.nextElementSibling.classList.toggle('custom-select-hide')
        })

        $(".custom-select-items-filter").on("input", function(e) {
            let html = ""
            if (e.target.value) {
                _icons.forEach(item => {
                    if (item.search(e.target.value) > -1) {
                        html += `<div value="${item}"><i class="fa fa-${item}" value="${item}"></i> ${item}</div>`
                    }
                })
            } else {
                _icons.forEach(item => {
                    html += `<div value="${item}"><i class="fa fa-${item}" value="${item}"></i> ${item}</div>`
                })
            }
            $(".custom-select-items-container").html(html)

            // events
            document.querySelectorAll('.custom-select-items-container div').forEach(item => {
                item.addEventListener('click', function() {
                    document.querySelector('.custom-select-selected').innerHTML = this.innerHTML

                    $("#letters_icon").attr("data-value", $(document.querySelector('.custom-select-selected').innerHTML).attr("value"))

                    this.parentNode.parentNode.classList.add('custom-select-hide')
                })
            })
        })
    })
</script>