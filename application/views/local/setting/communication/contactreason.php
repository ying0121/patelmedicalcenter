
<div class = "row my-3 p-10 bg-white border rounded">
    <div class = "col-12 mb-4 d-flex justify-content-between align-items-center my-5">
        <div class = "col-12 mb-4 d-flex justify-content-between align-items-center my-5">
            <h3>Contact Reason</h3>
            <div><span id="setting_contact_reason_add" class = 'btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
        </div>
        <input type="hidden" id="contact_reason_chosen_id" />
    </div>
    <div class="col-12">
        <table class="table" id="setting_contact_reason_table">
            <thead>
                <th>English</th>
                <th>Spanish</th>
                <th style="min-width:150px;">Action</th>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="contactreason_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <input type="hidden" id="contactreason_type" />
            <!-- Modal Header -->
            <div class="modal-header">
                    <h4 class="modal-title ">Contact Reason</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class = "row">
                    <div class = 'col-md-12'>
                        <div class="form-group">
                            <h6>English</h6>
                            <input class="form-control" id="contact_en_name" type="text">
                        </div>
                        <div class="form-group">
                            <h6>Spanish</h6>
                            <input class="form-control" id="contact_sp_name" type="text">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                    <button type="button" id="contactreason_modal_save" class="btn btn-light-primary" data-dismiss="modal">Done</button>
                    <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        let setting_contact_reason_table = $('#setting_contact_reason_table').DataTable({
            "pagingType": "full_numbers",
            "order": [[ 0, 'desc' ]],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            },
            "ajax": {
                "url": '<?php echo base_url()?>' + 'local/ContactReason/read',
                "type": "GET",
                "data": function(data) {
                }
            },
            "columns": [
                { data: 'en_name' },
                { data: 'sp_name' },
                { data: 'id',
                    render: function (data, type, row) {
                        return `
                        <div idkey="`+row.id+`">
                            <span class='btn btn-icon mx-1 btn-sm btn-light-warning contact_reason_edit_btn'><i class='fas fa-edit'></i></span>
                            <span class='btn btn-icon mx-1 btn-sm btn-light-danger contact_reason_delete_btn'><i class='fa fa-trash'></i></span>
                        </div>
                        `
                    } 
                }
            ]
        });
        
        $(document).on('click', '.contact_reason_edit_btn', function() {
            var en_name = '', sp_name = '';

            var id = $(this).parent().attr('idkey');
            $('#contact_reason_chosen_id').val(id);
            $('#contactreason_type').val('1');

            $.ajax({
                url: '<?php echo base_url() ?>local/ContactReason/choose',
                method: "POST",
                data: {id: id},
                dataType: "json",
                success: function (data) {
                    if (data.data.length) {
                        $('#contact_en_name').val(data.data[0]['en_name']);
                        $('#contact_sp_name').val(data.data[0]['sp_name']);
                    }
                }
            }).then(() => {
                $("#contactreason_modal").modal('show');
            });
        });

        $('#contactreason_modal_save').click(function () {
            var id = $('#contact_reason_chosen_id').val();
            var type = $('#contactreason_type').val();

            var en_name = $('#contact_en_name').val();
            var sp_name = $('#contact_sp_name').val();

            if (!en_name) {
                toastr.info('Please enter english reason!');
                return;
            }
            if (!sp_name) {
                toastr.info('Please enter spanish reason!');
                return;
            }

            $.ajax({
                url: type == 1 ? '<?php echo base_url() ?>local/ContactReason/update' : '<?php echo base_url() ?>local/ContactReason/add',
                method: 'POST',
                data: {
                    id: id,
                    en_name: en_name,
                    sp_name: sp_name
                },
                dataType: 'text',
                success: function (data) {
                    var data = JSON.parse(data);
                    if (data.status == 'success') {
                        toastr.success('Action Success!');
                        setting_contact_reason_table.ajax.reload();
                    } else if (data.status == 'exist') {
                        toastr.warning('The reason is existed!');
                    } else {
                        toastr.error('Action Failed!');
                    }
                }
            })
        });

        $('#setting_contact_reason_add').click(function() {
            $('#contactreason_type').val('0');
            $('#contactreason_modal').modal('show');
        });

        $(document).on('click', '.contact_reason_delete_btn', function () {
            var id = $(this).parent().attr('idkey');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax ({
                        url: '<?php echo base_url() ?>local/ContactReason/delete',
                        method: "POST",
                        data: {id: id},
                        dataType: "text",
                        success: function (data) {
                            var result = JSON.parse(data)
                            if(result.status == "ok") {
                                toastr.success('Action Success!');
                                setting_contact_reason_table.ajax.reload();
                            } else {
                                toastr.error('Action Failed!');
                            }
                        }
                    });
                }
            });
        });
    });
</script>
