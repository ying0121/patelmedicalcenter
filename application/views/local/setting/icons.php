<style>
    .icon-wrapper {
        width: 112px;
        height: 112px;
        border-radius: 12px;
        cursor: pointer;
        box-shadow: 2px 2px 4px #00000020;
        transition: all 200ms ease-out;
    }

    .icon-wrapper:hover {
        box-shadow: 4px 4px 8px #00000040;
        transition: all 200ms ease-out;
        background-color: #FFFFFF90 !important;
    }
</style>

<div class="row px-5 py-10 border rounded">
    <div class="col-12 my-3 d-flex justify-content-between align-items-center my-5">
        <div class="d-flex justify-content-center align-items-center">
            <div>
                <h2 class="m-0 mr-5" style="width: 150px;">Usage Icons</h2>
            </div>
            <input class="form-control" id="icon-name-filter" type="text" placeholder="Filter">
        </div>
        <div><span id="icon-add" class='btn btn-light-primary btn-icon'><i class='fa fa-plus'></i></span></div>
    </div>
    <div class="col-md-12 my-5">
        <div id="icons-container"></div>
    </div>
</div>

<div class="modal fade" id="icon-item-modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <input type="hidden" id="icon-chosen-id" />
            <input type="hidden" id="icon-modal-type" />
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Icon</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 my-5 text-center" style="height: 96px;">
                        <i style="font-size: 96px;" class="" id="icon-preview"></i>
                    </div>
                    <div class="col-md-12 mt-5">
                        <div class="form-group">
                            <input class="form-control" id="icon-name" type="text" placeholder="Icon Name">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <div class="w-100 d-flex justify-content-between align-items-center">
                    <div class="w-100">
                        <button type="button" class="btn btn-light-danger" id="icon-delete">Delete</button>
                    </div>
                    <div class="d-flex justify-content-start align-items-center">
                        <button type="button" class="btn btn-light-primary mx-2" id="icon-save">Save</button>
                        <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const roadIcons = filter => {
        $.ajax({
            url: '<?php echo base_url() ?>local/Setting/readIcons',
            method: "POST",
            data: {
                name: filter,
            },
            dataType: "json",
            success: function(res) {
                let html = ""
                res.forEach(item => {
                    html += `<div class="p-4 d-flex justify-content-center align-items-center">
                                <div class="p-4 bg-white d-flex justify-content-center align-items-center icon-wrapper icon-item" data-id="${item.id}" data-name="${item.name}">
                                    <div class="">
                                        <div class="mb-4 text-center"><i class="fa fa-${item.name}" style="font-size: 36px;"></i></div>
                                        <div class="text-center" style="font-size: 12px;">${item.name}</div>
                                    </div>
                                </div>
                            </div>`
                })
                html = `<div class="w-100 d-flex justify-content-start align-items-center flex-wrap">${html}</div>`
                $("#icons-container").html(html)
            }
        })
    }
    $(document).ready(function() {
        roadIcons($("#icon-name-filter").val())

        $("#icon-add").click(function() {
            $("#icon-modal-type").val("0")
            $("#icon-delete").addClass("d-none")

            $("#icon-preview").attr("class", "")
            $("#icon-name").val("")

            $("#icon-item-modal").modal("show")
        })

        $(document).on("click", ".icon-item", function() {
            const id = $(this).attr("data-id")
            const name = $(this).attr("data-name")

            $("#icon-chosen-id").val(id)
            $("#icon-modal-type").val("1")
            $("#icon-delete").removeClass("d-none")

            $("#icon-preview").attr("class", "")
            $("#icon-preview").addClass(`fa fa-${name}`)
            $("#icon-name").val(name)

            $("#icon-item-modal").modal("show")
        })

        $("#icon-name").on("input", function(e) {
            $("#icon-preview").attr("class", "")
            $("#icon-preview").addClass(`fa fa-${e.target.value}`)
        })

        $("#icon-save").click(function() {
            const id = $("#icon-chosen-id").val()
            const name = $("#icon-name").val()
            const type = $("#icon-modal-type").val()

            $.ajax({
                url: `<?php echo base_url() ?>local/Setting/${type == "0" ? "addIcon" : "updateIcon"}`,
                method: "POST",
                data: {
                    id: id,
                    name: name
                },
                dataType: "json",
                success: function(res) {
                    if (res.status == "ok") {
                        toastr.success('Saved Successfully!')
                        $("#icon-item-modal").modal("hide")

                        roadIcons($("#icon-name-filter").val())
                    } else if (res.status == "existed") {
                        toastr.info("Already Existed!")
                    } else {
                        toastr.error('Action Failed!')
                    }
                }
            })
        })

        $("#icon-delete").click(function() {
            $.ajax({
                url: '<?php echo base_url() ?>local/Setting/deleteIcon',
                method: "POST",
                data: {
                    id: $("#icon-chosen-id").val()
                },
                dataType: "json",
                success: function(res) {
                    if (res.status == "ok") {
                        toastr.success('Deleted Successfully!')
                        $("#icon-item-modal").modal("hide")

                        roadIcons($("#icon-name-filter").val())
                    } else {
                        toastr.error('Action Failed!')
                    }
                }
            })
        })

        $("#icon-name-filter").on("input", function(e) {
            roadIcons(e.target.value)
        })
    })
</script>