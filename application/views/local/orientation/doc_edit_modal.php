<div class="modal fade" id="doc_edit_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ">Edit Document</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class = "row">
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Title (English)</h6>
                                <input name = 'edoc_en_title' id = 'edoc_en_title' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Title (Español)</h6>
                                <input name = 'edoc_es_title' id = 'edoc_es_title' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Desc (English)</h6>
                                <textarea name = 'edoc_en_desc' id = 'edoc_en_desc' class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Desc (Español)</h6>
                                <textarea name = 'edoc_es_desc' id = 'edoc_es_desc' class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-dismiss="modal" onclick = "updateDoc();">Done</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(document).on("click",".doceditbtn",function(){
            window.id = $(this).parent().attr("idkey");
            $.ajax ({
                url: '<?php echo base_url() ?>local/Orientation/choose',
                method: "POST",
                data: {id:window.id},
                dataType: "json",
                success: function (data) {
                    $("#edoc_page").val(data['page']);
                    $("#edoc_en_title").val(data['en_title']);
                    $("#edoc_es_title").val(data['es_title']);
                    $("#edoc_en_desc").val(data['en_desc']);
                    $("#edoc_es_desc").val(data['es_desc']);
                    $("#doc_edit_modal").modal('show');
                }
            });
        });
    })
    function updateDoc(){
        var fd = new FormData();
        fd.append('id', window.id);
        fd.append('entitle',$("#edoc_en_title").val());
        fd.append('estitle',$("#edoc_es_title").val());
        fd.append('endesc',$("#edoc_en_desc").val());
        fd.append('esdesc',$("#edoc_es_desc").val());
        $.ajax({
            url: '<?php echo base_url() ?>local/Orientation/update',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            dataType: "text",
            success: function (data) {
                if(data == "ok"){
                    setTimeout( function () {
                        $("#doc_tb").DataTable().ajax.reload();
                    }, 1000 );
                    mynotify('success','Update Success');
                }
                else{
                    mynotify('danger','Update Fail');
                }
            }
        });
    }
</script>