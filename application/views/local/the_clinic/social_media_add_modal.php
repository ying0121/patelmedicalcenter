<div class="modal fade" id="social_media_add_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ">Add Social Media</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class = "row">
                    <div class = "col-md-12">
                        <div class="form-group">
                            <h6>Social Media URL</h6>
                            <input class="form-control" id = "add_social_media_url" type="text">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-dismiss="modal" onclick = "createSocialMedia();">Done</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".add_social_media_btn").click(function(){
            $("#social_media_add_modal").modal('show');
        });
    })
    function createSocialMedia(){
        url = $("#add_social_media_url").val();
        $.ajax ({
            url: '<?php echo base_url() ?>local/TheClinic/createSocialMedia',
            method: "POST",
            data: {url: url},
            dataType: "text",
            success: function (data) {
                if(data == "ok"){
                    setTimeout( function () {
                        $("#social_media_tb").DataTable().ajax.reload();
                    }, 1000 );
                    mynotify('success','Add Success');
                }
                else
                    mynotify('danger','Add Fail');
            }
        });
    }
</script>