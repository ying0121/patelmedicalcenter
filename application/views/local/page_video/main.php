<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('local/header'); ?>
    </head>

    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        <?php $this->load->view('local/mobile_topmenu'); ?>
        <div class="d-flex flex-column flex-root">
            <div class="d-flex flex-row flex-column-fluid page">
                <?php $this->load->view('local/menu'); ?>
                <div class="d-flex flex-column flex-row-fluid wrapper pt-20" id="kt_wrapper">
                    <?php $this->load->view('local/topmenu'); ?>
                    <div class="content d-flex flex-column flex-column-fluid p-10">

                        <div class = "row my-3 p-10 bg-white border rounded">
                            <div class = "col-12 mb-4 d-flex justify-content-between align-items-center my-5">
                                <div><h3>Page Videos</h3></div>
                                <div><span class = 'add_video_btn btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
                            </div>
                            <div class = "col-12">
                                <div class="table-responsive">
                                    <table class="table" id="aboutus_video_tb">
                                        <thead>
                                            <th>ID</th>
                                            <th>Video URL</th>
                                            <th>Page</th>
                                            <th>Position</th>
                                            <th>Display</th>
                                            <th style = "width: 200px;">Action</th>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php include('video_add_modal.php'); ?>
        <?php include('video_edit_modal.php'); ?>

        <?php $this->load->view('global'); ?>

        <script>
            $(document).ready(function(){
                $('#aboutus_video_tb').DataTable({
                    "autoWidth":false,
                    "pagingType": "full_numbers",
                    "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                    ],
                    responsive: true,
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Search video",
                    },
                    "ajax": {
                        "url": "<?php echo base_url() ?>local/PageVideo/read",
                        "type": "GET"
                    },
                    "columns": [
                            { data:'id', render:function(data, type, row){
                                    return `<div class = "d-flex align-items-center" style = "height:40px;">`+row.id+`</div>`;
                                }
                            },
                            { data: 'video' },
                            { data: 'page' },
                            { data: 'position' },
                            { data: 'status', render: function(data, type, row){
                                if(row.status == 1)
                                    return `<div class="text-success">Visible</div>`;
                                else
                                    return `<div class="text-danger">Invisible</div>`;
                                }
                            },
                            { data: 'id',
                                render: function (data, type, row) {
                                return `
                                    <div data-id = "`+row.id+`">
                                    <span class="btn btn-icon btn-sm btn-light-warning edit_video_btn"><i class="fas fa-edit"></i></span>
                                    <span class="btn btn-icon btn-sm btn-light-danger  delete_video_btn"><i class="fas fa-trash"></i></span>
                                    </div>
                                    `
                                } 
                            }
                        ]
                });
                $(document).on('click', '.delete_video_btn', function(){
                    var id = $(this).closest('div').attr('data-id');
                    var tmp = $(this).parent().parent().parent();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        
                        
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax ({
                                url: '<?php echo base_url() ?>local/PageVideo/delete',
                                method: "POST",
                                data: {id: id},
                                dataType: "text",
                                success: function (data) {
                                    if(data = "ok")
                                        tmp.remove();
                                }
                            });
                        }
                    });
                });
            });
        </script>
    </body>
</html>
