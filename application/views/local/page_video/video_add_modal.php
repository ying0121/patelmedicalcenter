<div class="modal fade" id="video_add_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                    <h4 class="modal-title ">Add Video</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class = "row">
                    <div class = 'col-md-12'>
                        <div class="form-groupp">
                            <h6>Video URL</h6>
                            <input type="text" class="form-control" id="add_video_url" name="video">
                        </div>
                        <div class="form-group">
                            <h6>Page</h6>
                            <select class="form-control" id="apage">
                            </select>
                        </div>
                        <div class="form-group">
                            <h6>Position</h6>
                            <select class="form-control" id="aposition">
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary" data-dismiss="modal" onclick = "addVideo();">Done</button>
                    <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var keys = Object.keys(VIDEO_POSITION);
        $("#apage").html("");
        for(i = 0 ; i < keys.length ; i++)
            $("#apage").append("<option value='"+keys[i]+"'>"+keys[i]+"</option>");
        for(i = 0 ; i < VIDEO_POSITION[keys[0]].length ; i++)
            $("#aposition").append("<option value='"+VIDEO_POSITION[keys[0]][i]+"'>"+VIDEO_POSITION[keys[0]][i]+"</option>");

        $("#apage").change(function(){
            $("#aposition").html("");
            var page = $("#apage").val();
            for(i = 0 ; i < VIDEO_POSITION[page].length ; i++)
                $("#aposition").append("<option value='"+VIDEO_POSITION[page][i]+"'>"+VIDEO_POSITION[page][i]+"</option>");
        })

        $(".add_video_btn").click(function(){
            $("#video_add_modal").modal('show');
        });

    });
    function addVideo(){
        var video = $("#add_video_url").val();
        var page = $("#apage").val();
        var position = $("#aposition").val();
        $.ajax ({
            url: '<?php echo base_url() ?>local/PageVideo/create',
            method: "POST",
            data: {video: video, page:page, position:position},
            dataType: "text",
            success: function (data) {
                setTimeout( function () {
                    $("#aboutus_video_tb").DataTable().ajax.reload();
                }, 1000 );
                mynotify('success','Add Success');

            }
        });
    }
</script>