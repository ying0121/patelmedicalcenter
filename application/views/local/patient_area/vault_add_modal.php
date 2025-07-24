<style>

</style>
<div class="modal fade" id="vault_add_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ">Add vault</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class='col-md-12'>
                        <div class="form-group">
                            <h6>Search for Patient</h6>
                            <input type="text" class="form-control mb-3" id="add_search_value" placeholder="Start typing...">
                            <select class="form-control" id="add_search_select"></select>
                        </div>
                        <div class="form-group">
                            <h6>Title</h6>
                            <input type="text" class="form-control" id="add_title">
                        </div>
                        <div class="form-group">
                            <h6>Description</h6>
                            <input type="text" class="form-control" id="add_desc">
                        </div>
                        <div class="custom-file form-group">
                            <input type="file" accept=".doc, .docx, .pdf" class="custom-file-input" id="add_vault_document" name="add_document">
                            <label class="custom-file-label" for="add_vault_document">Upload Document</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-dismiss="modal" onclick="addVault();">Done</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".add_vault_btn").click(function() {
            $("#vault_add_modal").modal('show');
        });


        $("#add_search_value").on("input", e => {
            $("#suggestions").html("")
            if (e.target.value.length > 2) {
                $.post({
                    url: '<?php echo base_url() ?>local/Patient/filter',
                    mothod: "POST",
                    data: {
                        value: e.target.value
                    },
                    dataType: "json",
                    success: function(res) {
                        let html = ""
                        res.forEach(info => {
                            html += `<option class="m-1" value="${info.id}">
                                <div>${info.id} : ${info.fname} ${info.lname}, ${new Date(info.dob).toLocaleDateString().substr(0, 10)}, ${info.email}</div>
                            </option>`
                        })
                        $("#add_search_select").html(html)
                    }
                })
            } else {
                $("#add_search_select").html("")
            }
        })
    });

    function addVault() {
        var patient_id = $("#add_search_select").val();
        var title = $("#add_title").val();
        var desc = $("#add_desc").val();

        var fd = new FormData();
        var document = $('#add_vault_document')[0].files;
        if (document.length > 0) {
            fd.append('patient_id', patient_id);
            fd.append('title', title);
            fd.append('desc', desc);
            fd.append('document', document[0]);

            $.ajax({
                url: '<?php echo base_url() ?>local/Vault/create',
                method: "POST",
                data: fd,
                contentType: false,
                processData: false,
                dataType: "text",
                success: function(data) {
                    handleTableReload(data, '#vault_tb');
                }
            });
        } else {
            toastr.warning('Please select a document file!');
        }
    }
</script>