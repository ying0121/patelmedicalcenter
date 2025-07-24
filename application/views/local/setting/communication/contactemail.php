<style>
    .fs-3 {
        font-size: 1.5rem;
    }

    .fs-4 {
        font-size: 1.25rem;
    }
</style>

<div class="row my-3 p-10 bg-white border rounded">
    <div class="col-12 mb-4 d-flex justify-content-between align-items-center my-5">
        <div class="col-12 mb-4 d-flex justify-content-between align-items-center my-5">
            <h3>Contact Email</h3>
            <div><span id="setting_contact_email_add" class='btn btn-light-primary btn-icon'><i class='fa fa-plus'></i></span></div>
        </div>
        <input type="hidden" id="contact_email_chosen_id" />
    </div>
    <div class="col-12">
        <table class="table" id="setting_contact_email_table">
            <thead>
                <th>Contact Name</th>
                <th>Email</th>
                <th>Account Request</th>
                <th>General Online</th>
                <th>Specific Online</th>
                <th>Payment Email</th>
                <th style="min-width:150px;">Action</th>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="contactemail_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <input type="hidden" id="contactemail_type" />
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ">Contact Emails</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class='col-md-12'>
                        <div class="form-group">
                            <h6>Contact Name</h6>
                            <input class="form-control" id="contact_name" type="text">
                        </div>
                        <div class="form-group">
                            <h6>Contact Email</h6>
                            <input class="form-control" id="email" type="text">
                        </div>
                    </div>
                    <div class="col-md-6 d-flex d-flex align-items-center mb-5">
                        <input type="checkbox" name="type" id="account_request" style="width:21px; height:21px;">
                        <label class="m-0 mx-3 fs-4" for="account_request">Account Request</label>
                    </div>
                    <div class="col-md-6 d-flex d-flex align-items-center mb-5">
                        <input type="checkbox" name="type" id="general_online" style="width:21px; height:21px;">
                        <label class="m-0 mx-3 fs-4" for="general_online">General Online</label>
                    </div>
                    <div class="col-md-6 d-flex d-flex align-items-center mb-5">
                        <input type="checkbox" name="type" id="specific_online" style="width:21px; height:21px;">
                        <label class="m-0 mx-3 fs-4" for="specific_online">Specific Online</label>
                    </div>
                    <div class="col-md-6 d-flex d-flex align-items-center mb-5">
                        <input type="checkbox" name="type" id="payment_email" style="width:21px; height:21px;">
                        <label class="m-0 mx-3 fs-4" for="payment_email">Payment Email</label>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" id="contactemail_modal_save" class="btn btn-light-primary" data-dismiss="modal">Done</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        let setting_contact_email_table = $('#setting_contact_email_table').DataTable({
            "pagingType": "full_numbers",
            "order": [
                [0, 'desc']
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            },
            "ajax": {
                "url": '<?php echo base_url() ?>' + 'local/ContactEmail/read',
                "type": "GET",
                "data": function(data) {}
            },
            "columns": [{
                    data: 'contact_name'
                },
                {
                    data: 'email'
                },
                {
                    data: 'account_request',
                    render: function(data, type, row) {
                        if (data == 1) {
                            return `<span class="btn btn-light-primary">True</span>`
                        } else {
                            return `<span class="btn btn-light-danger">False</span>`
                        }
                    }
                },
                {
                    data: 'general_online',
                    render: function(data, type, row) {
                        if (data == 1) {
                            return `<span class="btn btn-light-primary">True</span>`
                        } else {
                            return `<span class="btn btn-light-danger">False</span>`
                        }
                    }
                },
                {
                    data: 'specific_online',
                    render: function(data, type, row) {
                        if (data == 1) {
                            return `<span class="btn btn-light-primary">True</span>`
                        } else {
                            return `<span class="btn btn-light-danger">False</span>`
                        }
                    }
                },
                {
                    data: 'payment_email',
                    render: function(data, type, row) {
                        if (data == 1) {
                            return `<span class="btn btn-light-primary">True</span>`
                        } else {
                            return `<span class="btn btn-light-danger">False</span>`
                        }
                    }
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return `
                        <div idkey="` + row.id + `">
                            <span class='btn btn-icon mx-1 btn-sm btn-light-warning contact_email_edit_btn'><i class='fas fa-edit'></i></span>
                            <span class='btn btn-icon mx-1 btn-sm btn-light-danger contact_email_delete_btn'><i class='fa fa-trash'></i></span>
                        </div>
                        `
                    }
                }
            ]
        });

        $('#setting_contact_email_add').click(function() {
            $('#contactemail_type').val('0');

            $('#contact_name').val('')
            $('#email').val('')

            $('#contactemail_modal').modal('show');
        });

        $(document).on('click', '.contact_email_delete_btn', function() {
            var id = $(this).parent().attr('idkey');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: '<?php echo base_url() ?>local/ContactEmail/delete',
                        method: "POST",
                        data: {
                            id: id
                        },
                        dataType: "text",
                        success: function(data) {
                            var result = JSON.parse(data)
                            if (result.status == "ok") {
                                toastr.success('Action Success!');
                                setting_contact_email_table.ajax.reload();
                            } else {
                                toastr.error('Action Failed!');
                            }
                        }
                    });
                }
            });
        });

        $(document).on('click', '.contact_email_edit_btn', function() {
            var contact_name = '', email = '';

            var id = $(this).parent().attr('idkey');
            $('#contactemail_type').val('1');
            $('#contact_email_chosen_id').val(id);

            $.ajax({
                url: '<?php echo base_url() ?>local/ContactEmail/choose',
                method: "POST",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    const result = data.data[0]
                    if (data.data.length) {
                        $('#contact_name').val(result.contact_name);
                        $('#email').val(result.email);
                        $("#account_request").prop("checked", result.account_request == 1 ? true : false);
                        $("#general_online").prop("checked", result.general_online == 1 ? true : false);
                        $("#specific_online").prop("checked", result.specific_online == 1 ? true : false);
                        $("#payment_email").prop("checked", result.payment_email == 1 ? true : false);
                    }
                }
            }).then(() => {
                $("#contactemail_modal").modal('show');
            });
        });

        $('#contactemail_modal_save').click(function() {
            const id = $('#contact_email_chosen_id').val();
            const type = $('#contactemail_type').val();

            const contact_name = $('#contact_name').val();
            const email = $('#email').val();
            const account_request = $("#account_request").prop("checked") === true ? 1 : 0
            const general_online = $("#general_online").prop("checked") === true ? 1 : 0
            const specific_online = $("#specific_online").prop("checked") === true ? 1 : 0
            const payment_email = $("#payment_email").prop("checked") === true ? 1 : 0

            if (!contact_name) {
                toastr.info('Please enter contact name!');
                return;
            }
            if (!email) {
                toastr.info('Please enter contact email!');
                return;
            }

            $.ajax({
                url: type == 1 ? '<?php echo base_url() ?>local/ContactEmail/update' : '<?php echo base_url() ?>local/ContactEmail/add',
                method: 'POST',
                data: {
                    id: id,
                    contact_name: contact_name,
                    email: email,
                    account_request: account_request,
                    general_online: general_online,
                    specific_online: specific_online,
                    payment_email: payment_email
                },
                dataType: 'text',
                success: function(data) {
                    var data = JSON.parse(data);
                    if (data.status == 'success') {
                        toastr.success('Action Success!');
                        setting_contact_email_table.ajax.reload();
                    } else if (data.status == 'exist') {
                        toastr.warning('That is existed!');
                    } else {
                        toastr.error('Action Failed!');
                    }
                }
            })
        });
    });
</script>