<div class="modal fade" id="image_edit_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                    <h4 class="modal-title ">Edit image</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class = "row">
                    <div class = "col-12">
                        <div class="form-group">
                            <h6>ID</h6>
                            <input type="text" class="form-control" id="edit_id">
                        </div>
                    </div>
                    <div class = "col-12">
                        <div class="form-group">
                            <h6>Page</h6>
                            <select class="form-control" id="edit_image_page">
                            </select>
                        </div>
                    </div>
                    <div class = "col-12">
                        <div class="form-group">
                            <h6>Position</h6>
                            <select class="form-control" id="edit_image_position">
                            </select>
                        </div>
                    </div>
                    <div class = "col-6">
                        <div class = "form-group">
                            <h6 class="mb-3">Image Title(EN)</h6>
                            <div id="edit_title_en"></div>
                        </div>
                    </div>
                    <div class = "col-6">
                        <div class = "form-group">
                            <h6 class="mb-3">Image Title(ES)</h6>
                            <div id="edit_title_es"></div>
                        </div>
                    </div>
                    <div class = "col-6">
                        <div class = "form-group">
                            <h6 class="mb-3">Image Description</h6>
                            <div id="edit_desc_en"></div>
                        </div>
                    </div>
                    <div class = "col-6">
                        <div class = "form-group">
                            <h6 class="mb-3">Image Description(ES)</h6>
                            <div id="edit_desc_es"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h6>Status</h6>
                        <select class="form-control" id = "edit_image_status" style="height:36px;">
                            <option value="1">Visible</option>
                            <option value="0">Invisible</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary" data-dismiss="modal" onclick = "updateImage();">Done</button>
                    <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#edit_title_en').summernote({
            toolbar: [
                ['color', ['color']],
                ['codeview']
            ],
            tabsize: 1,
            height: 100,
        });
        $('#edit_desc_en').summernote({
            toolbar: [
                ['color', ['color']],
                ['codeview']
            ],
            tabsize: 1,
            height: 150,
        });
        $('#edit_title_es').summernote({
            toolbar: [
                ['color', ['color']],
                ['codeview']
            ],
            tabsize: 1,
            height: 100,
        });
        $('#edit_desc_es').summernote({
            toolbar: [
                ['color', ['color']],
                ['codeview']
            ],
            tabsize: 1,
            height: 150,
        });

        var keys = Object.keys(IMAGE_POSITION);
        $("#edit_image_page").html("");
        for(i = 0 ; i < keys.length ; i++)
            $("#edit_image_page").append("<option value='"+keys[i]+"'>"+keys[i]+"</option>");
        for(i = 0 ; i < IMAGE_POSITION[keys[0]].length ; i++)
            $("#edit_image_position").append("<option value='"+IMAGE_POSITION[keys[0]][i]+"'>"+IMAGE_POSITION[keys[0]][i]+"</option>");

        $("#edit_image_page").change(function(){
            $("#edit_image_position").html("");
            var page = $("#edit_image_page").val();
            for(i = 0 ; i < IMAGE_POSITION[page].length ; i++)
                $("#edit_image_position").append("<option value='"+IMAGE_POSITION[page][i]+"'>"+IMAGE_POSITION[page][i]+"</option>");
        });

        $(document).on('click', '.edit_image_btn', function(){
            var id = $(this).closest('div').attr('data-id');
            var page, position, status;
            $.ajax({
                url: '<?php echo base_url() ?>local/PageImage/choose',
                method: "POST",
                data: {id: id},
                dataType: "json",
                success: function (data) {
                    page = data['page'];
                    position = data['position'];
                    status = data['status'];
                    title_en = data['title_en'];
                    desc_en = data['desc_en'];
                    title_es = data['title_es'];
                    desc_es = data['desc_es'];
                }
            }).then(() => {
                window.id = id;
                $("#edit_id").val(id);
                $("#edit_image_page").val(page);
                $("#edit_image_position").html("");
                for(i = 0 ; i < IMAGE_POSITION[page].length ; i++)
                    $("#edit_image_position").append("<option value='"+IMAGE_POSITION[page][i]+"'>"+IMAGE_POSITION[page][i]+"</option>");
                $("#edit_image_position").val(position);
                $("#edit_image_status").val(status);

                $("#edit_title_en").summernote("code", title_en);
                $("#edit_desc_en").summernote("code", desc_en);
                $("#edit_title_es").summernote("code", title_es);
                $("#edit_desc_es").summernote("code", desc_es);

                $("#image_edit_modal").modal('show');
            });
        });
    });
    function updateImage(){
        var original_id = window.id;
        var id = $("#edit_id").val();
        var page = $("#edit_image_page").val();
        var position = $("#edit_image_position").val();
        var status = $("#edit_image_status").val();

        var title_en = $("#edit_title_en").summernote("code");
        var desc_en = $("#edit_desc_en").summernote("code");
        var title_es = $("#edit_title_es").summernote("code");
        var desc_es = $("#edit_desc_es").summernote("code");

        $.ajax ({
            url: '<?php echo base_url() ?>local/PageImage/update',
            method: "POST",
            data: {original_id: original_id, id: id, page: page, position: position, title_en: title_en, desc_en: desc_en, title_es: title_es, desc_es: desc_es, status: status},
            dataType: "text",
            success: function (data) {
                handleTableReload(data,'#page_image_tb');
            }
        });
    }
</script>