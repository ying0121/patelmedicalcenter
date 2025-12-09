
<div class = "row my-3 p-10 bg-white border rounded">
    <div class = "col-12 mb-4 d-flex justify-content-between align-items-center my-5">
        <div><h3>Newsletter Images</h3></div>
        <div><span class = 'newsimg_add btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
        <input type="hidden" id="chosen_newsimg_id" />
    </div>
    <div class = "col-12">
        <div class="table-responsive">
            <table class="table" id="newsimg_tb">
                <thead>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th style = "width:100px;">Status</th>
                    <th style = "width: 200px;">Actions</th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="newsimg_edit_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title " style="font-weight:500;">Upload Image</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id = "updatenewsimg" action="<?php echo base_url('local/Newsletter/updateNewsletterImage'); ?>" method="post" enctype="multipart/form-data">
                    <div class = "row">
                        <div class = 'col-md-12'>
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-static">Newsletter Image Name</label>
                                <input name = 'newsimg' id = 'newsimg' type="text" class="form-control">
                            </div>
                        </div>
                        <div class = 'col-md-12'>
                            <h6>newsimg Image ( 1600*434 )</h6>
                            <div class="custom-file form-group bmd-form-group">
                                <input type="file" class="custom-file-input" id="customFile" name="file">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary newsimgeditsubmitbtn" data-dismiss="modal">Done</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        const newsimgtable = $('#newsimg_tb').DataTable({
            "autoWidth": false,
            "pagingType": "full_numbers",
            "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search image",
            },
            "ajax": {
                "url": "<?php echo base_url() ?>local/Newsletter/getNewsletterImage",
                "type": "POST",
            },
            "columns": [
                {
                    data:'id',
                    render: function(data, type, row) {
                        return `<div class="d-flex align-items-center" style="height:40px;">${row.id}</div>`
                    }
                },
                {
                    data: 'img',
                    render:function(data, type, row){
                        if (row.img) {
                            return `<img src="<?php echo base_url() ?>assets/images/newsimg/${row.img}" width="50" />`
                        } else {
                            return `<img src="<?php echo base_url() ?>assets/images/newsimg/empty-img.jpg" width="50" />`
                        }
                    }
                },
                { data: 'name' },
                {
                    data: 'status',
                    render: function(data, type, row){
                        if(row.status == 1)
                            return `<div class="text-success">Visible</div>`
                        else
                            return `<div class="text-danger">Invisible</div>`
                    }
                },
                {
                    data: 'id',
                    render: function (data, type, row) {
                        return `<div idkey="${row.id}">
                                    <span class="deletebtn newsimgdeletebtn text-danger cursor-pointer"><i class="fa fa-trash"></i></span>
                                </div>`
                    }
                }
            ],
            "order":[[2,'asc'],[0,'asc']]
        })

        $(document).on("click", ".newsimg_add", function() {
            $("#newsimg_edit_modal").modal('show')
        })

        $(".newsimgeditsubmitbtn").click(function() {
            $("#updatenewsimg").submit()
        })

        $(document).on("click",".newsimgdeletebtn",function(){
            $("#chosen_newsimg_id").val($(this).parent().attr("idkey"))
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax ({
                        url: "<?php echo base_url() ?>local/Newsletter/deleteNewsletterImage",
                        method: "POST",
                        data: {id:$("#chosen_newsimg_id").val()},
                        dataType: "text",
                        success: function (data) {
                            if(data = "ok") {
                                newsimgtable.ajax.reload()
                            }
                        }
                    })
                }
            })
        })
    })
</script>