<div class="modal fade" id="doc_add_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ">Add Document</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class = "row">
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Title (English)</h6>
                                <input name = 'doc_en_title' id = 'doc_en_title' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Title (Español)</h6>
                                <input name = 'doc_es_title' id = 'doc_es_title' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Desc (English)</h6>
                                <textarea name = 'doc_en_desc' id = 'doc_en_desc' class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <h6>Desc (Español)</h6>
                                <textarea name = 'doc_es_desc' id = 'doc_es_desc' class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-dismiss="modal" onclick = "addDoc();">Done</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".doc_add").click(function(){
            $("#doc_add_modal").modal("show");
        });
    })
    function addDoc(){
        var fd = new FormData();
        fd.append('entitle',$("#doc_en_title").val());
        fd.append('estitle',$("#doc_es_title").val());
        fd.append('endesc',$("#doc_en_desc").val());
        fd.append('esdesc',$("#doc_es_desc").val());
        $.ajax({
            url: '<?php echo base_url() ?>local/Orientation/create',
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
                    mynotify('success','Add Success');
                }
                else{
                    mynotify('danger','Add Fail');

                }
            }
        });
    }
</script>
