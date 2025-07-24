<div class="modal fade" id="social_media_edit_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ">Edit URL</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class = "row">
                    <div class = 'col-md-12'>
                        <div class="form-group">
                            <h6>URL</h6>
                            <input class="form-control" id = "edit_social_media_url" type="text">
                        </div>
                        <div class="form-group">
                            <h6>Status</h6>
                            <select class="form-control" id = "edit_social_media_status" style="height:36px;">
                                <option value="1">Visible</option>
                                <option value="0">Invisible</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary" data-dismiss="modal" onclick = "updateSocialMedia();">Done</button>
                    <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(document).on('click', '.edit_social_media_btn', function(){
            window.id = $(this).closest('div').attr('data-id');
            var url, status;
            $.ajax({
                url: '<?php echo base_url() ?>local/TheClinic/chooseSocialMedia',
                method: "POST",
                data: {id: window.id},
                dataType: "json",
                success: function (data) {
                    url = data['url'];
                    status = data['status'];
                }
            }).then(() => {
                $("#edit_social_media_url").val(url);
                $("#edit_social_media_status").val(status);

                $("#social_media_edit_modal").modal('show');
            });
        });
    });
    function updateSocialMedia(){
        url = $("#edit_social_media_url").val();
        status = $("#edit_social_media_status").val();
        $.ajax ({
            url: '<?php echo base_url() ?>local/TheClinic/updateSocialMedia',
            method: "POST",
            data: {id: window.id, url: url, status: status},
            dataType: "text",
            success: function (data) {
                handleTableReload(data, '#social_media_tb');
            }
        });
    }
</script>