<div class="row my-3 p-10 bg-white border rounded">
    <div class="col-12 mb-4 d-flex justify-content-between align-items-center my-5">
        <h3>Service Categories</h3>
        <div class='btn btn-light-primary btn-icon' id="service_category_add"><i class='fa fa-plus'></i></div>
    </div>
    <div class="row w-100">
        <div class="col-12">
            <table class="table w-100" id="service_category_table">
                <thead>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="service_category_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ">Service Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <input type="hidden" id="service_category_modal_type" />
            <input type="hidden" id="service_category_chosen_id" />
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <h6>Category Name</h6>
                            <input id="service_category_name" class=" form-control" type="text" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <h6 class="mb-3">Description</h6>
                            <textarea class="form-control" id="service_category_desc" type="text" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h6>Status</h6>
                            <select class="form-control" id="service_category_status">
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" id="service_category_save_btn" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(async function() {
        const service_category_table = $("#service_category_table").DataTable({
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
                "url": '<?php echo base_url() ?>' + 'local/Services/getServiceCategory',
                "type": "GET",
                "data": function(data) {}
            },
            "columns": [{
                data: 'name'
            }, {
                data: 'desc'
            }, {
                data: 'status',
                render: function(data, type, row) {
                    if (row.status == 1)
                        return `<div class="text-success">Active</div>`;
                    else
                        return `<div class="text-danger">Inactive</div>`;
                }
            }, {
                data: 'id',
                render: function(data, type, row) {
                    return `<div idkey="${row.id}">
                                <span class="btn btn-icon btn-sm btn-light-warning service_category_edit"><i class="fas fa-edit"></i></span>
                                <span class="btn btn-icon btn-sm btn-light-danger service_category_delete"><i class="fas fa-trash"></i></span>
                            </div>`
                }
            }]
        })

        $("#service_category_add").click(function() {
            $("#service_category_modal_type").val("0")
            $("#service_category_name").val("")
            $("#service_category_desc").val("")
            $("#service_category_modal").modal("show")
        })

        $("#service_category_save_btn").click(function() {
            const type = $("#service_category_modal_type").val()

            const entry = {
                id: $("#service_category_chosen_id").val(),
                name: $("#service_category_name").val(),
                desc: $("#service_category_desc").val(),
                status: $("#service_category_status").val()
            }

            $.ajax({
                url: '<?php echo base_url() ?>' + `local/Services/${type == 0 ? "addServiceCategory" : "updateServiceCategory"}`,
                method: "POST",
                data: entry,
                dataType: "text",
                success: function(data) {
                    if (data == "ok") {
                        toastr.success("Saved Successfully!");
                        service_category_table.ajax.reload();
                    }
                }
            });
        })

        $(document).on("click", ".service_category_edit", function() {
            const id = $(this).parent().attr("idkey")
            $("#service_category_chosen_id").val(id)
            $("#service_category_modal_type").val("1")

            $.ajax({
                url: '<?php echo base_url() ?>' + 'local/Services/chosenServiceCategory',
                method: "POST",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    const result = data.data
                    $("#service_category_name").val(result.name)
                    $("#service_category_desc").val(result.desc)
                    $("#service_category_status").val(result.status)

                    $("#service_category_modal").modal("show")
                }
            })
        })

        $(document).on("click", ".service_category_delete", function() {
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
                        url: '<?php echo base_url() ?>' + 'local/Services/deleteServiceCategory',
                        method: "POST",
                        data: {
                            id: id
                        },
                        dataType: "text",
                        success: function(data) {
                            if (data == "ok") {
                                toastr.success("Deleted Successfully!")
                                service_category_table.ajax.reload()
                            }
                        }
                    })
                }
            });
        })
    })
</script>