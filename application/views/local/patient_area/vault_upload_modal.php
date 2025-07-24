<div class="modal fade" id="vault_upload_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ">Upload Document</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class='col-md-12'>
                        <div class="custom-file form-group">
                            <input type="file" accept=".doc, .docx, .pdf" class="custom-file-input" id="upload_vault_document" name="upload_vault_document">
                            <label class="custom-file-label" for="upload_vault_document">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" onclick="uploadVault();">Done</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    });

    function uploadVault() {
        var fd = new FormData();
        var document = $('#upload_vault_document')[0].files;
        var id = window.id;
        if (document.length > 0) {
            fd.append('id', id);
            fd.append('document', document[0]);
        }
        $.ajax({
            url: '<?php echo base_url() ?>local/Vault/upload',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            dataType: "text",
            success: function(data) {
                if (data == "ok") {
                    setTimeout(function() {
                        $("#vault_tb").DataTable().ajax.reload();
                    }, 1000);
                    mynotify('success', 'Upload Success');
                    $("#vault_upload_modal").modal("hide")
                } else {
                    mynotify('danger', 'Upload Fail');
                }
            }
        });
    }
</script>