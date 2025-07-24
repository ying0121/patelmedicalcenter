<div class="modal fade" id="social_media_upload_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                    <h4 class="modal-title ">Upload Logo</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class = "row">
                    <div class = 'col-md-12'>
                        <h6>Logo</h6>
                        <div class="custom-file form-group">
                            <input type="file" class="custom-file-input" id="upload_social_media_img">
                            <label class="custom-file-label" for="upload_social_media_img">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary" data-dismiss="modal" onclick = "uploadImage();">Done</button>
                    <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(document).on('click', '.upload_social_media_btn', function(){
            window.id = $(this).closest('div').attr('data-id');
            $("#social_media_upload_modal").modal('show');
        });
    })
    function uploadImage(){
        var fd = new FormData();
        var img = $('#upload_social_media_img')[0].files;
        if(img.length > 0 ){
            fd.append('id', window.id);
            fd.append('img',img[0]);
        }
        $.ajax({
            url: '<?php echo base_url() ?>local/TheClinic/uploadSocialMedia',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            dataType: "text",
            success: function (data) {
                if(data == "ok"){
                    setTimeout( function () {
                        $("#social_media_tb").DataTable().ajax.reload();
                    }, 1000 );
                    mynotify('success','Upload Success');
                }
                else{
                    mynotify('dagner','Upload Fail');
                }
            }
        });
    }
</script>