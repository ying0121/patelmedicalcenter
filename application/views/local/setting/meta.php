<div class="row my-3 p-10 bg-white border rounded">
    <div class="col-12 my-3">
        <h3>Meta Info</h3>
    </div>
    <div class="col-12">
        <div class="form-group">
            <h6 class="mb-3">Meta Title</h6>
            <input class="form-control" id="meta_title" type="text" value="<?php echo $meta['meta_title'] ?>" />
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <h6 class="mb-3">Meta Description</h6>
            <textarea class="form-control" id="meta_desc" type="text" rows="5"><?php echo $meta['meta_desc'] ?></textarea>
        </div>
    </div>
    <div class="col-12 text-right">
        <button class="btn btn-light-primary" onclick="updateMetaDesc();">Update</button>
    </div>
</div>

<div class="row my-3 p-10 bg-white border rounded">
    <div class="col-12 my-3">
        <h3>Facebook Meta Info</h3>
    </div>
    <div class="col-6">
        <img src="<?php echo base_url() ?>assets/images/facebook_meta.jpg" style="width:100%;">
        <div class="text-center">
            <span class="btn btn-light-primary mt-10" onclick="window.filename = 'facebook_meta.jpg'; $('#meta_upload_modal').modal('show');">Upload</span>
            <span class="btn btn-light-primary mt-10"><a href="<?php echo base_url() . 'local/Setting/getMetaFile?filetype=facebook' ?>" target="_blank">Download</a></span>
        </div>
    </div>
    <div class="row col-6">
        <div class="col-12">
            <div class="form-group">
                <h6 class="mb-3">Facebook Meta Title</h6>
                <input class="form-control" id="facebook_title" type="text" value="<?php echo $meta['facebook_title'] ?>" />
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <h6 class="mb-3">Facebook Meta Description</h6>
                <textarea class="form-control" id="facebook_desc" type="text" rows="5"><?php echo $meta['facebook_desc'] ?></textarea>
            </div>
        </div>
    </div>
    <div class="col-12">
        <button class="btn btn-light-primary" onclick="updateFacebookDesc();">Update</button>
    </div>
</div>

<div class="row my-3 p-10 bg-white border rounded">
    <div class="col-12 my-3">
        <h3>Twitter Meta Info</h3>
    </div>
    <div class="col-6">
        <img src="<?php echo base_url() ?>assets/images/twitter_meta.jpg" style="width:100%;">
        <div class="text-center">
            <span class="btn btn-light-primary mt-10" onclick="window.filename = 'twitter_meta.jpg'; $('#meta_upload_modal').modal('show');">Upload</span>
            <span class="btn btn-light-primary mt-10"><a href="<?php echo base_url() . 'local/Setting/getMetaFile?filetype=twitter' ?>" target="_blank">Download</a></span>
        </div>
    </div>
    <div class="row col-6">
        <div class="col-12">
            <div class="form-group">
                <h6 class="mb-3">Twitter Meta Title</h6>
                <input class="form-control" id="twitter_title" type="text" value="<?php echo $meta['twitter_title'] ?>" />
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <h6 class="mb-3">Twitter Meta Description</h6>
                <textarea class="form-control" id="twitter_desc" type="text" rows="5"><?php echo $meta['twitter_desc'] ?></textarea>
            </div>
        </div>
    </div>

    <div class="col-12 text-right">
        <button class="btn btn-light-primary" onclick="updateTwitterDesc();">Update</button>
    </div>
</div>


<div class="modal fade" id="meta_upload_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ">Upload Image</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class='col-md-12'>
                        <h6>Image</h6>
                        <div class="custom-file form-group">
                            <input type="file" class="custom-file-input" id="upload_image_img" name="upload_image_img">
                            <label class="custom-file-label" for="upload_image_img">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-dismiss="modal" onclick="uploadMetaImage();">Done</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function uploadMetaImage() {
        var fd = new FormData();
        var img = $('#upload_image_img')[0].files;
        if (img.length > 0) {
            fd.append('img', img[0]);
        }
        fd.append('filename', window.filename)
        $.ajax({
            url: '<?php echo base_url() ?>local/Setting/uploadMetaImage',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(data) {
                if (data.status == "success") {
                    location.reload();
                    mynotify('success', 'Upload Success');
                } else {
                    mynotify('danger', 'Upload Fail');
                }
            }
        });
    }

    function updateMetaDesc() {
        meta_title = $("#meta_title").val();
        meta_desc = $("#meta_desc").val();
        $.ajax({
            url: '<?php echo base_url() ?>local/Setting/updateMeta',
            method: "POST",
            data: {
                meta_title: meta_title,
                meta_desc: meta_desc
            },
            dataType: "json",
            success: function(data) {
                if (data.status == "success")
                    mynotify('success', 'Update Success');
                else
                    mynotify('danger', 'Update Fail');
            }
        });
    }

    function updateFacebookDesc() {
        facebook_title = $("#facebook_title").val();
        facebook_desc = $("#facebook_desc").val();
        $.ajax({
            url: '<?php echo base_url() ?>local/Setting/updateFacebook',
            method: "POST",
            data: {
                facebook_title: facebook_title,
                facebook_desc: facebook_desc
            },
            dataType: "json",
            success: function(data) {
                if (data.status == "success")
                    mynotify('success', 'Update Success');
                else
                    mynotify('danger', 'Update Fail');
            }
        });
    }

    function updateTwitterDesc() {
        twitter_title = $("#twitter_title").val();
        twitter_desc = $("#twitter_desc").val();
        $.ajax({
            url: '<?php echo base_url() ?>local/Setting/updateTwitter',
            method: "POST",
            data: {
                twitter_title: twitter_title,
                twitter_desc: twitter_desc
            },
            dataType: "json",
            success: function(data) {
                if (data.status == "success")
                    mynotify('success', 'Update Success');
                else
                    mynotify('danger', 'Update Fail');
            }
        });
    }
</script>