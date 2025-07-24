<div class="modal fade" id="image_upload_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                    <h4 class="modal-title ">Upload Image</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class = "row">
                    <div class = 'col-md-12'>
                        <h6>Photo<span id="img_size"></span></h6>
                        <div class="custom-file form-group">
                            <input type="file" class="custom-file-input" id="upload_image_img" name="upload_image_img">
                            <label class="custom-file-label" for="upload_image_img">Choose file</label>
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
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    });
    function uploadImage(){
        var fd = new FormData();
        var img = $('#upload_image_img')[0].files;
        var id = window.id;
        if(img.length > 0 ){
            fd.append('id', id);
            fd.append('img',img[0]);
        }
        $.ajax({
            url: '<?php echo base_url() ?>local/PageImage/upload',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            dataType: "text",
            success: function (data) {
                if(data == "ok"){
                    setTimeout( function () {
                        $("#page_image_tb").DataTable().ajax.reload();
                    }, 1000 );
                    mynotify('success','Upload Success');
                }
                else{
                    mynotify('danger','Upload Fail');
                }
            }
        });
    }
</script>