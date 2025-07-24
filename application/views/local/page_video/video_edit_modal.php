<div class="modal fade" id="video_edit_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                    <h4 class="modal-title ">Edit Video</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class = "row">
                    <div class = 'col-md-12'>
                        <div class="form-group">
                            <h6>Video URL</h6>
                            <input class="form-control" id="edit_video_url" type="text">
                        </div>
                        <div class="form-group">
                            <h6>Page</h6>
                            <select class="form-control" id="edit_video_page">
                            </select>
                        </div>
                        <div class="form-group">
                            <h6>Position</h6>
                            <select class="form-control" id="edit_video_position">
                            </select>
                        </div>
                        <div class="form-group">
                            <h6>Status</h6>
                            <select class="form-control" id="edit_video_status" style="height:36px;">
                                <option value="1">Visible</option>
                                <option value="0">Invisible</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary" data-dismiss="modal" onclick = "updateVideo();">Done</button>
                    <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var keys = Object.keys(VIDEO_POSITION);
        $("#edit_video_page").html("");
        for(i = 0 ; i < keys.length ; i++)
            $("#edit_video_page").append("<option value='"+keys[i]+"'>"+keys[i]+"</option>");
        for(i = 0 ; i < VIDEO_POSITION[keys[0]].length ; i++)
            $("#edit_video_position").append("<option value='"+VIDEO_POSITION[keys[0]][i]+"'>"+VIDEO_POSITION[keys[0]][i]+"</option>");

        $("#edit_video_page").change(function(){
            $("#edit_video_position").html("");
            var page = $("#edit_video_page").val();
            for(i = 0 ; i < VIDEO_POSITION[page].length ; i++)
                $("#edit_video_position").append("<option value='"+VIDEO_POSITION[page][i]+"'>"+VIDEO_POSITION[page][i]+"</option>");
        });

        $(document).on('click', '.edit_video_btn', function(){
            var id = $(this).closest('div').attr('data-id');
            var page, position, status;
            $.ajax({
                url: '<?php echo base_url() ?>local/Pagevideo/choose',
                method: "POST",
                data: {id: id},
                dataType: "json",
                success: function (data) {
                    page = data['page'];
                    position = data['position'];
                    status = data['status'];
                }
            }).then(() => {
                window.id = id;
                $("#edit_video_page").val(page);
                $("#edit_video_position").html("");
                for(i = 0 ; i < VIDEO_POSITION[page].length ; i++)
                    $("#edit_video_position").append("<option value='"+VIDEO_POSITION[page][i]+"'>"+VIDEO_POSITION[page][i]+"</option>");
                $("#edit_video_position").val(position);
                $("#edit_video_status").val(status);
                $("#video_edit_modal").modal('show');
            });
        });
    });
    
    function updateVideo(){
        var id = window.id;
        var video = $("#edit_video_url").val();
        var page = $("#edit_video_page").val();
        var position = $("#edit_video_position").val();
        var status = $("#edit_video_status").val();
        
        $.ajax ({
            url: '<?php echo base_url() ?>local/PageVideo/update',
            method: "POST",
            data: {id: id, video: video, page:page, position:position, status: status},
            dataType: "text",
            success: function (data) {
                handleTableReload(data, '#aboutus_video_tb');
            }
        });
    }
</script>