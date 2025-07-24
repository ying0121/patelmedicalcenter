<div class = "row my-3 p-10 bg-white border rounded">
    <div class = "col-12 mb-4 d-flex justify-content-between align-items-center my-5">
        <div><h3>Language</h3></div>
    </div>
    <div class = "col-12">
        <div class="table-responsive">
            <table class="table" id="lang_tb">
                <thead>
                    <th>Keyvalue</th>
                    <th>English</th>
                    <th>Spanish</th>
                    <th style = "width: 200px;">Action</th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
           
<div class="modal fade" id="language_edit_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                    <h4 class="modal-title ">Text Edit</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class = "row">
                    <div class = 'col-md-12'>
                        <div class="form-group">
                            <h6>English</h6>
                            <input class="form-control" id="en" type="text">
                        </div>
                        <div class="form-group">
                            <h6>Spanish</h6>
                            <input class="form-control" id="es" type="text">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                    <button id="language-update" type="button" class="btn btn-light-primary" data-dismiss="modal">Done</button>
                    <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#lang_tb').DataTable({
            "autoWidth":false,
            "pagingType": "full_numbers",
            "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search text",
            },
            "ajax": {
                "url": "<?php echo base_url() ?>local/Language/read",
                "type": "GET"
            },
            "columns": [
                    { data: 'keyvalue' },
                    { data: 'en' },
                    { data: 'es' },
                    { data: 'id',
                        render: function (data, type, row) {
                        return `
                            <div data-id = "`+row.id+`">
                            <span class="btn btn-icon btn-sm btn-light-warning edit_language_btn"><i class="fas fa-edit"></i></span>
                            </div>
                            `
                        } 
                    }
                ]
        });

        $(document).on('click', '.edit_language_btn', function(){
            var id = $(this).closest('div').attr('data-id');
            var keyvalue, en, es;
            $.ajax({
                url: '<?php echo base_url() ?>local/Language/choose',
                method: "POST",
                data: {id: id},
                dataType: "json",
                success: function (data) {
                    keyvalue = data['keyvalue'];
                    en = data['en'];
                    es = data['es'];
                }
            }).then(() => {
                window.keyvalue = keyvalue;
                $("#en").val(en);
                $("#es").val(es);
                $("#language_edit_modal").modal('show');
            });
        });

        $('#language-update').click(function() {
            var id = window.id;
            var en = $("#en").val();
            var es = $("#es").val();
        
            $.ajax ({
                url: '<?php echo base_url() ?>local/Language/update',
                method: "POST",
                data: {keyvalue: window.keyvalue, en: en, es: es},
                dataType: "text",
                success: function (data) {
                    handleTableReload(data, '#lang_tb');
                }
            });
        })
    });
</script>



            