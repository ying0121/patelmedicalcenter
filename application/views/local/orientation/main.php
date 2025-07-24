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

                        <div class="row mb-3">
                            <div class = "col-12 d-flex d-flex align-items-center justify-content-end">
                                <div class = "mr-1">Show:</div>
                                <div class = "d-flex align-items-center"><input type = "checkbox" id = "orientation_toggle" style = "width:20px; height:20px;"></div>
                            </div>
                        </div>
                        <div class = "row my-3 p-10 bg-white border rounded">
                            <div class = "col-12 mb-2"><h3>Orientation Title and Description</h3></div>
                            <div class = "col-6">
                                <div class = "form-group">
                                    <h6>Title(En)</h6>
                                    <input class="form-control" id="title_en" type="text" value = "<?php echo $component['t_orientation_title']['en']?>"/>
                                </div>
                                <div class = "form-group">
                                    <h6>Description(En)</h6>
                                    <textarea class="form-control" id="desc_en" rows = "5"><?php echo $component['t_orientation_desc']['en']?></textarea>
                                </div>
                            </div>
                            <div class = "col-6">
                                <div class = "form-group">
                                    <h6>Title(Es)</h6>
                                    <input class="form-control" id="title_es" type="text" value = "<?php echo $component['t_orientation_title']['es']?>"/>
                                </div>
                                <div class = "form-group">
                                    <h6>Description(Es)</h6>
                                    <textarea class="form-control" id = "desc_es" rows = "5"><?php echo $component['t_orientation_desc']['es']?></textarea>
                                </div>
                            </div>
                            <div class="col-12 text-right">
                                <button class="btn btn-light-primary pull-right" onclick = "updateOrientationDesc();">Update</button>
                            </div>
                        </div>
                        <div class = "row my-3 p-10 bg-white border rounded">
                            <div class = "col-12 mb-4 d-flex justify-content-between align-items-center my-5">
                                <div><h3>Orientation Documents</h3></div>
                                <div class = 'doc_add btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></div>
                            </div>
                            <div class = "col-12">
                                <div class="table-responsive">
                                    <table class="table" id="doc_tb">
                                        <thead>
                                            <th>Page</th>
                                            <th>English</th>
                                            <th>Español</th>
                                            <th>English Doc</th>
                                            <th>Español Doc</th>
                                            <th style="width:150px;">Action</th>
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
        <?php include('doc_add_modal.php'); ?>
        <?php include('doc_edit_modal.php'); ?>
        <?php include('doc_upload_modal.php'); ?>
        <script>
        $(document).ready(function(){
            let doctable = $('#doc_tb').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                },
                "ajax": {
                    "url": "<?php echo base_url() ?>local/Orientation/read",
                    "type": "GET"
                },
                "columns": [
                    { data: 'id' },
                    { data: 'en_title' },
                    { data: 'es_title'},
                    { data: 'en_doc',
                        render: function (data, type, row) {
                            if(row.en_doc != null)
                                return `
                            <a href="<?php echo base_url() ?>assets/documents/${row.en_doc}" target="_blank">${row.en_doc}</a>
                            `
                            else
                                return "";
                        }
                    },
                    { data: 'es_doc',
                        render: function (data, type, row) {
                            if(row.es_doc != null)
                                return `
                            <a href="<?php echo base_url() ?>assets/documents/${row.es_doc}" target="_blank">${row.es_doc}</a>
                            `
                            else
                                return "";
                        }
                    },
                    { data: 'id',
                        render: function (data, type, row) {
                            return `
                            <div idkey="`+row.id+`">
                                <span class="btn btn-icon btn-sm btn-light-primary upload_document_btn"><i class="fa fa-file"></i></span>
                                <span class="btn btn-icon btn-sm btn-light-warning doceditbtn"><i class="fas fa-edit"></i></span>
                                <span class="btn btn-icon btn-sm btn-light-danger  docdeletebtn"><i class="fas fa-trash"></i></span>
                            </div>
                            `
                        }
                    }
                ]
            });

            $(document).on("click",".docdeletebtn",function(){
                window.id = $(this).parent().attr("idkey");
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
                            url: '<?php echo base_url() ?>local/Orientation/delete',
                            method: "POST",
                            data: {id: window.id},
                            dataType: "text",
                            success: function (data) {
                                if(data = "ok")
                                    tmp.remove();
                            }
                        });
                    }
                });
            });
            handleAreaToggleBox('#orientation_toggle', 'orientation_area');
        });
        function updateOrientationDesc(){
            title_en = $("#title_en").val();
            title_es = $("#title_es").val();

            desc_en = $("#desc_en").val();
            desc_es = $("#desc_es").val();
            $.ajax({
                url: '<?php echo base_url() ?>local/Orientation/updateOrientationDesc',
                method: "POST",
                data: {title_en: title_en, title_es: title_es, desc_en: desc_en, desc_es: desc_es},
                dataType: "text",
                success: function (data) {
                    handleResponse(data);
                }
            });
        }
    </script>
    </body>
</html>
