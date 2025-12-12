
<div class = "row my-3 p-10 bg-white border rounded">
    <div class = "col-12 mb-4 d-flex justify-content-between align-items-center my-5">
        <div><h3>Newsletter Images</h3></div>
        <div><span class = 'newsimg_add btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
        <input type="hidden" id="chosen_newsimg_id" />
    </div>
    <div class = "col-12">
        <div class="table-responsive">
            <table class="table" id="newsimg_tb">
                <thead>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th style = "width:100px;">Status</th>
                    <th style = "width: 200px;">Actions</th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="newsimg_edit_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title " style="font-weight:500;">Upload Image</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div classd="row">
                    <!-- Title -->
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-static">Newsletter Image Name</label>
                            <input name = 'newsimg' id = 'newsimg' type="text" class="form-control" />
                        </div>
                    </div>
                    <!-- Background Image -->
                    <div class="col-md-12 mb-5">
                        <h6>Background Image ( 1600*434 )</h6>
                        <div class="custom-file form-group bmd-form-group">
                            <input type="file" class="custom-file-input" id="customFile" name="file" />
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <small id="backgroundImageSize" class="form-text" style="display:none;"></small>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="newsimgeditsubmitbtn">Done</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        const newsimgtable = $('#newsimg_tb').DataTable({
            "autoWidth": false,
            "pagingType": "full_numbers",
            "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search image",
            },
            "ajax": {
                "url": "<?php echo base_url() ?>local/Newsletter/getNewsletterImage",
                "type": "POST",
            },
            "columns": [
                {
                    data:'id',
                    render: function(data, type, row) {
                        return `<div class="d-flex align-items-center">${row.id}</div>`
                    }
                },
                {
                    data: 'img',
                    render:function(data, type, row){
                        if (row.img) {
                            return `<img src="<?php echo base_url() ?>assets/images/newsimg/${row.img}" width="200" />`
                        } else {
                            return `<img src="<?php echo base_url() ?>assets/images/newsimg/empty-img.jpg" width="200" />`
                        }
                    }
                },
                { data: 'name' },
                {
                    data: 'status',
                    render: function(data, type, row){
                        if(row.status == 1)
                            return `<div class="text-success">Visible</div>`
                        else
                            return `<div class="text-danger">Invisible</div>`
                    }
                },
                {
                    data: 'id',
                    render: function (data, type, row) {
                        return `<div idkey="${row.id}">
                                    <span class="btn btn-icon btn-sm newsimgdeletebtn btn-light-danger"><i class="fa fa-trash"></i></span>
                                </div>`
                    }
                }
            ],
            "order":[[2,'asc'],[0,'asc']]
        })

        $(document).on("click", ".newsimg_add", function() {
            $("#newsimg_edit_modal").modal('show')
            // Reset form
            $("#newsimg").val('')
            $("#customFile").val('')
            $("#metaFile").val('')
            $(".custom-file-label").html('Choose file')
            $("#backgroundImageSize").hide()
            $("#metaImageSize").hide()
        })

        // Display image size when file is selected
        $("#customFile").on("change", function() {
            var fileName = $(this).val().split("\\").pop()
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName)
            
            var file = this.files[0]
            if (file) {
                const imgObj = new Image()
                const objectURL = URL.createObjectURL(file)
                
                imgObj.onload = function() {
                    var sizeText = "Image size: " + imgObj.width + " x " + imgObj.height
                    if (imgObj.width <= 1600 && imgObj.height <= 434) {
                        $("#backgroundImageSize").removeClass("text-danger").addClass("text-success").text(sizeText + " ✓").show()
                    } else {
                        $("#backgroundImageSize").removeClass("text-success").addClass("text-danger").text(sizeText + " (Required: 1600 x 434 or less)").show()
                    }
                    URL.revokeObjectURL(objectURL)
                }
                
                imgObj.src = objectURL
            } else {
                $("#backgroundImageSize").hide()
            }
        })

        $(document).on("click",".newsimgdeletebtn",function() {
            $("#chosen_newsimg_id").val($(this).parent().attr("idkey"))
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax ({
                        url: "<?php echo base_url() ?>local/Newsletter/deleteNewsletterImage",
                        method: "POST",
                        data: {id:$("#chosen_newsimg_id").val()},
                        dataType: "text",
                        success: function (data) {
                            if(data == "ok") {
                                toastr.success('Deleted Successfully!')
                                newsimgtable.ajax.reload()
                            } else {
                                toastr.error('Deleted Failed!')
                            }
                        },
                        error: function() {
                            toastr.error('An error was occurred on the server!')
                        }
                    })
                }
            })
        })

        $("#newsimgeditsubmitbtn").click(function() {
            var backgroundFile = $("#customFile")[0].files[0]
            var validationResults = {
                background: { checked: !backgroundFile, valid: true, error: "" },
            }
            var submitted = false

            // Function to check if all validations are complete
            function checkAndSubmit() {
                if (submitted) return // Prevent double submission
                var allChecked = true
                var hasErrors = false
                var errorMessages = []

                if (backgroundFile && !validationResults.background.checked) {
                    allChecked = false
                }

                if (!allChecked) {
                    return // Wait for all validations to complete
                }

                // Check if there are any validation errors
                if (backgroundFile && !validationResults.background.valid) {
                    hasErrors = true
                    errorMessages.push(validationResults.background.error)
                }

                if (hasErrors) {
                    toastr.error(errorMessages.join("\n"))
                    return
                }

                submitted = true // Mark as submitted to prevent double submission

                // All validations passed, proceed with submission
                var formData = new FormData()
                formData.append("newsimg", $("#newsimg").val())
                if (backgroundFile) {
                    formData.append("file", backgroundFile)
                }

                $.ajax({
                    url: "<?php echo base_url() ?>local/Newsletter/updateNewsletterImage",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if(data == "ok") {
                            newsimgtable.ajax.reload()
                            toastr.success('Uploaded Successfully!')
                        } else {
                            toastr.error('Upload Failed!')
                        }
                        $("#newsimg_edit_modal").modal('hide')
                    },
                    error: function() {
                        toastr.error('An error was occurred on the server!')
                    }
                })
            }

            // Validate background image if file is selected
            if (backgroundFile) {
                const bgImgObj = new Image()
                const bgObjectURL = URL.createObjectURL(backgroundFile)
                
                bgImgObj.onload = function() {
                    if (bgImgObj.width > 1600 || bgImgObj.height > 434) {
                        validationResults.background.valid = false
                        validationResults.background.error = "Background Image must be 1600 x 434 pixels or less. Current size: " + bgImgObj.width + " x " + bgImgObj.height
                    } else {
                        validationResults.background.valid = true
                    }
                    validationResults.background.checked = true
                    URL.revokeObjectURL(bgObjectURL)
                    checkAndSubmit()
                }
                
                bgImgObj.onerror = function() {
                    validationResults.background.valid = false
                    validationResults.background.error = "Failed to load background image"
                    validationResults.background.checked = true
                    URL.revokeObjectURL(bgObjectURL)
                    checkAndSubmit()
                }
                
                bgImgObj.src = bgObjectURL
            }

            checkAndSubmit()
        })
    })
</script>