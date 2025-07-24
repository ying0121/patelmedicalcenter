<div class="modal fade" id="doc_upload_modal">
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
                                <h6>File (English)</h6>
                                <div class="custom-file form-group">
                                    <input type="file" class="custom-file-input" id="edoc_en_file" name="edoc_en_file">
                                    <label class="custom-file-label" for="edoc_en_file" id="edoc_en_file_label"></label>
                                </div>
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>File (Español)</h6>
                                <div class="custom-file form-group">
                                    <input type="file" class="custom-file-input" id="edoc_es_file" name="edoc_es_file">
                                    <label class="custom-file-label" for="edoc_es_file" id="edoc_es_file_label"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-dismiss="modal" onclick = "uploadDoc();">Done</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(document).on("click",".upload_document_btn",function(){
            window.id = $(this).parent().attr("idkey");
            $.ajax ({
                url: '<?php echo base_url() ?>local/Orientation/choose',
                method: "POST",
                data: {id: window.id},
                dataType: "json",
                success: function (data) {
                    $("#edoc_es_file").val('');
                    $("#edoc_es_file").val('');
                    $("#edoc_en_file_label").html('');
                    $("#edoc_es_file_label").html('');
                    $("#doc_upload_modal").modal('show');
                }
            });
        });
    })
    function uploadDoc(){
        var fd = new FormData();
        var enfile = $('#edoc_en_file')[0].files;
        var esfile = $('#edoc_es_file')[0].files;
        if(enfile.length > 0 ){
            fd.append('enfile',enfile[0]);
        }
        if(esfile.length > 0 ){
            fd.append('esfile',esfile[0]);
        }
        fd.append('id', window.id);
        $.ajax({
            url: '<?php echo base_url() ?>local/Orientation/uploadDocument',
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