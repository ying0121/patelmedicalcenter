
<div class = "row my-3 p-10 bg-white border rounded">
    <div class = "col-12 mb-4 d-flex justify-content-between align-items-center my-5">
        <div class = "col-12 mb-4 d-flex justify-content-between align-items-center my-5">
            <h3>Security Questions</h3>
            <div><span id="setting_security_add" class = 'btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
        </div>
        <input type="hidden" id="security_chosen_id" />
    </div>
    <div class="col-12">
        <table class="table" id="setting_security_table">
            <thead>
                <th>English</th>
                <th>Español</th>
                <th style="width:50px !important;">Status</th>
                <th style="width:100px !important;">Action</th>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="security_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <input type="hidden" id="security_type" />
            <!-- Modal Header -->
            <div class="modal-header">
                    <h4 class="modal-title ">Manage Security Question</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class = "row">
                    <div class = 'col-md-12'>
                        <div class="form-group">
                            <h6>English</h6>
                            <input class="form-control" id="security_en" type="text" placeholder="Please input a security question">
                        </div>
                        <div class="form-group">
                            <h6>Español</h6>
                            <input class="form-control" id="security_es" type="text" placeholder="Por favor ingrese una pregunta de seguridad">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <div class="d-flex w-100 justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center"><input type="checkbox" id="security_status" style="width:24px; height:24px;"></div>
                        <div class="mr-1">&nbsp;&nbsp;Active</div>
                    </div>
                    <div>
                        <button type="button" id="security_modal_save" class="btn btn-light-primary" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(async () => {
        let setting_security_table = $('#setting_security_table').DataTable({
            "pagingType": "full_numbers",
            "order": [[ 0, 'desc' ]],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            },
            "ajax": {
                "url": '<?php echo base_url()?>' + 'local/Security/read',
                "type": "GET",
                "data": function(data) {
                }
            },
            "columns": [
                { data: 'en' },
                { data: 'es' },
                { data: 'status',
                    render: function(data, type, row) {
                        return `<span class='btn mx-1 ${row.status == 1 ? 'btn-light-success' : 'btn-light-danger'}'>${row.status == 1 ? 'Active' : 'Inactive'}</span>`
                    }
                },
                { data: 'id',
                    render: function (data, type, row) {
                        return `
                        <div idkey="`+row.id+`">
                            <span class='btn btn-icon mx-1 btn-sm btn-light-warning security_edit_btn'><i class='fas fa-edit'></i></span>
                            <span class='btn btn-icon mx-1 btn-sm btn-light-danger security_delete_btn'><i class='fa fa-trash'></i></span>
                        </div>
                        `
                    } 
                }
            ]
        })

        $('#setting_security_add').click(() => {
            $('#security_type').val('0')
            $('#security_modal').modal('show')
        })

        $(document).on('click', '.security_edit_btn', function () {
            var id = $(this).parent().attr('idkey')
            $('#security_chosen_id').val(id)
            $('#security_type').val('1')

            $.ajax({
                url: '<?php echo base_url() ?>local/Security/choose',
                method: "POST",
                data: {id: id},
                dataType: "json",
                success: function (data) {
                    if (data.data.length) {
                        $('#security_en').val(data.data[0]['en'])
                        $('#security_es').val(data.data[0]['es'])
                        $('#security_status').prop('checked', data.data[0]['status']  == 1 ? true : false)
                    }
                }
            }).then(() => {
                $("#security_modal").modal('show')
            })
        })

        $('#security_modal_save').click(function () {
            var id = $('#security_chosen_id').val()
            var type = $('#security_type').val()

            var security_en = $('#security_en').val()
            var security_es = $('#security_es').val()
            var security_status = $('#security_status').prop('checked')

            if (!security_en) {
                toastr.info('Please enter English Question!')
                return
            }

            $.ajax({
                url: type == 1 ? '<?php echo base_url() ?>local/Security/update' : '<?php echo base_url() ?>local/Security/add',
                method: 'POST',
                data: {
                    id: id,
                    en: security_en,
                    es: security_es,
                    status: security_status == true ? 1 : 0
                },
                dataType: 'text',
                success: function (data) {
                    var data = JSON.parse(data);
                    if (data.status == 'success') {
                        toastr.success('Action Success!')
                        setting_security_table.ajax.reload()
                    } else if (data.status == 'exist') {
                        toastr.warning('The email is existed!')
                    } else {
                        toastr.error('Action Failed!')
                    }
                }
            })
        })

        $(document).on('click', '.security_delete_btn', function () {
            var id = $(this).parent().attr('idkey')
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax ({
                        url: '<?php echo base_url() ?>local/Security/delete',
                        method: "POST",
                        data: {id: id},
                        dataType: "text",
                        success: function (data) {
                            var result = JSON.parse(data)
                            if(result.status == "ok") {
                                toastr.success('Action Success!')
                                setting_security_table.ajax.reload()
                            } else {
                                toastr.error('Action Failed!')
                            }
                        }
                    })
                }
            })
        })
    })
</script>
