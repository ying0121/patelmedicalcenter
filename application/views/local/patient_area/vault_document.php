<div class="row my-3 p-10 bg-white border rounded">
    <div class="col-12 mb-4 d-flex justify-content-between align-items-center my-5">
        <div>
            <h3>Vault Documents</h3>
        </div>
        <div><span class='add_vault_btn btn btn-light-primary btn-icon'><i class='fa fa-plus'></i></span></div>
    </div>
    <div class="col-12">
        <table class="table" id="vault_tb">
            <thead>
                <th>Patient ID</th>
                <th>Patient Name</th>
                <th>Title</th>
                <th>Desc</th>
                <th>Document</th>
                <th>Submit Date</th>
                <th>Action</th>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<?php include('vault_add_modal.php') ?>
<?php include('vault_edit_modal.php') ?>
<?php include('vault_upload_modal.php') ?>
<script>
    $(document).ready(function() {
        var vault_tb = $('#vault_tb').DataTable({
            "autoWidth": false,
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search vault",
            },
            "ajax": {
                "url": "<?php echo base_url() ?>local/Vault/read",
                "type": "POST",
            },
            "columns": [{
                    data: 'patient_id',
                    render: function(data, type, row) {
                        return `<div class = "d-flex align-items-center" style = "height:40px;">` + row.patient_id + `</div>`;
                    }
                },
                {
                    data: 'fname',
                    render: function(data, type, row) {
                        return '<span>' + row.fname + ' ' + row.mname + ' ' + row.lname + '</span>'
                    }
                },
                {
                    data: 'title'
                },
                {
                    data: 'desc'
                },
                {
                    data: 'document',
                    render: function(data, type, row) {
                        if (row.document != null)
                            return `
                            <a href="<?php echo base_url() ?>local/ServeAsset/getFile?category=vault&filename=${row.document}" target="_blank">${row.document}</a>
                            `
                        else
                            return "";
                    }
                },
                {
                    data: 'submit_date'
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return `
                        <div data-id = "${row.id}">
                            <span class="btn btn-icon btn-sm btn-light-primary upload_vault_btn"><i class="fa fa-file"></i></span>
                            <span class="btn btn-icon btn-sm btn-light-warning edit_vault_btn"><i class="fas fa-edit"></i></span>
                            <span class="btn btn-icon btn-sm btn-light-danger  delete_vault_btn"><i class="fas fa-trash"></i></span>
                        </div>
                        `
                    }
                }
            ],
            "order": [
                [5, 'desc'],
                [0, 'asc']
            ]
        });
        $(document).on('click', '.upload_vault_btn', function() {
            var id = $(this).closest('div').attr('data-id');
            $.ajax({
                url: '<?php echo base_url() ?>local/Vault/choose',
                method: "POST",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    position = data['position'];
                }
            }).then(() => {
                window.id = id;
                $("#vault_upload_modal").modal('show');
            });
        });
        $(document).on('click', '.delete_vault_btn', function() {
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
                        url: '<?php echo base_url() ?>local/Vault/delete',
                        method: "POST",
                        data: {
                            id: id
                        },
                        dataType: "text",
                        success: function(data) {
                            if (data = "ok")
                                tmp.remove();
                        }
                    });
                }
            });
        });
    });
</script>