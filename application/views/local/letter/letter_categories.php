<div class="row my-3 p-10 bg-white border rounded">
    <div class="col-12 mb-4 d-flex justify-content-between align-items-center my-5">
        <div class="d-flex justify-content-start align-items-center">
            <h3 class="m-0 mr-5">Letter Categories</h3>
            <div class="mr-5">
                <select class="form-control" id="letter_category_lang_filter"></select>
            </div>
        </div>
        <div><span class='add_letter_category_btn btn btn-light-primary btn-icon'><i class='fa fa-plus'></i></span></div>
    </div>
    <div class="col-12">
        <table class="table" id="letter_category_tb">
            <thead>
                <th>Language</th>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="letter_category_add_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ">Edit Letter Categories</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <input type="hidden" id="chosen_letter_category_id" />
            <input type="hidden" id="modal_letter_category" />
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <h6>Language</h6>
                            <select class="form-control" id="letter_category_lang"></select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h6>Name</h6>
                            <input type="text" class="form-control" id="letter_category_name" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h6>Description</h6>
                            <input type="text" class="form-control" id="letter_category_desc" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h6>Status</h6>
                            <select class="form-control" id="letter_category_status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" id="letter_category_save" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

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
                $("#letter_category_lang").html(html)
                $("#letter_category_lang_filter").html("<option value='0'>All Languages</option>" + filter_html)
            }
        })

        const letter_category_tb = $('#letter_category_tb').DataTable({
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search letter_category",
            },
            "ajax": {
                "url": "<?php echo base_url() ?>local/Letters/readLetterCategory",
                "type": "POST",
                "data": function(d) {
                    d.lang = $("#letter_category_lang_filter").val() ? $("#letter_category_lang_filter").val() : 0
                }
            },
            "columns": [{
                    data: 'language'
                }, {
                    data: 'name'
                },
                {
                    data: 'desc'
                },
                {
                    data: 'status',
                    render: function(data, type, row) {
                        return `<span class='btn mx-1 ${row.status == 1 ? 'btn-light-success' : 'btn-light-danger'}'>${row.status == 1 ? 'Active' : 'Inactive'}</span>`
                    }
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return `<div data-id = "${row.id}">
                                    <span class="btn btn-icon btn-sm btn-light-warning letter_category_edit"><i class="fas fa-edit"></i></span>
                                    <span class="btn btn-icon btn-sm btn-light-danger  letter_category_delete"><i class="fas fa-trash"></i></span>
                                </div>`
                    }
                }
            ],
        })

        $(".add_letter_category_btn").click(function() {
            $("#letter_category_name").val("")
            $("#letter_category_desc").val("")
            $("#modal_letter_category").val("0")
            $("#letter_category_add_modal").modal("show")
        })

        $(document).on('click', '.letter_category_edit', function() {
            const id = $(this).parent().attr('data-id')
            $("#chosen_letter_category_id").val(id)
            $("#modal_letter_category").val("1")

            $.ajax({
                url: '<?php echo base_url() ?>local/Letters/chosenLetterCategory',
                method: "POST",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    $("#letter_category_lang").val(data.lang)
                    $("#letter_category_name").val(data.name)
                    $("#letter_category_desc").val(data.desc)
                    $("#letter_category_status").val(data.status)

                    $("#letter_category_add_modal").modal("show")
                }
            })
        })

        $(document).on('click', '.letter_category_delete', function() {
            var id = $(this).parent().attr('data-id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: '<?php echo base_url() ?>local/Letters/deleteLetterCategory',
                        method: "POST",
                        data: {
                            id: id
                        },
                        dataType: "text",
                        success: function(data) {
                            if (data == "ok") {
                                letter_category_tb.ajax.reload()
                                toastr.success("Deleted Successfully!")
                            }
                        }
                    });
                }
            });
        })

        $("#letter_category_save").click(function() {
            const type = $("#modal_letter_category").val()
            const entry = {
                id: $("#chosen_letter_category_id").val(),
                lang: $("#letter_category_lang").val(),
                name: $("#letter_category_name").val(),
                desc: $("#letter_category_desc").val(),
                status: $("#letter_category_status").val(),
            }
            $.ajax({
                url: `<?php echo base_url() ?>local/Letters/${type == 0 ? "addLetterCategory" : "editLetterCategory"}`,
                method: "POST",
                data: entry,
                dataType: "text",
                success: function(data) {
                    if (data == "ok") {
                        letter_category_tb.ajax.reload()
                        toastr.success("Saved Successfully!")
                    }
                }
            })
        })

        // filters
        $(document).on('change', "#letter_category_lang_filter", function() {
            letter_category_tb.ajax.reload()
        })
    })
</script>