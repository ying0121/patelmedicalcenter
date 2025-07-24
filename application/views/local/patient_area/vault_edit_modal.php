<div class="modal fade" id="vault_edit_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                    <h4 class="modal-title ">Edit vault</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class = "row">
                    <div class = 'col-md-12'>
                        <div class="form-group">
                            <h6>Patient ID</h6>
                            <input type="text" class="form-control" id="edit_patient_id">
                        </div>
                        <div class="form-group">
                            <h6>Title</h6>
                            <input type="text" class="form-control" id="edit_title">
                        </div>
                        <div class="form-group">
                            <h6>Desc</h6>
                            <input type="text" class="form-control" id="edit_desc">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary" data-dismiss="modal" onclick = "updateVault();">Done</button>
                    <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(document).on('click', '.edit_vault_btn', function(){
            var id = $(this).closest('div').attr('data-id');
            var patient_id, title, desc;
            $.ajax({
                url: '<?php echo base_url() ?>local/Vault/choose',
                method: "POST",
                data: {id: id},
                dataType: "json",
                success: function (data) {
                    patient_id = data['patient_id'];
                    title = data['title'];
                    desc = data['desc'];
                }
            }).then(() => {
                window.id = id;
                $("#edit_patient_id").val(patient_id);
                $("#edit_title").val(title);
                $("#edit_desc").val(desc);
                $("#vault_edit_modal").modal('show');
            });
        });
    });
    function updateVault(){
        var id = window.id;
        var patient_id = $("#edit_patient_id").val();
        var title = $("#edit_title").val();
        var desc = $("#edit_desc").val();
        $.ajax ({
            url: '<?php echo base_url() ?>local/Vault/update',
            method: "POST",
            data: {id: id, patient_id: patient_id, title: title, desc: desc},
            dataType: "text",
            success: function (data) {
                handleTableReload(data, '#vault_tb');
            }
        });
    }
</script>