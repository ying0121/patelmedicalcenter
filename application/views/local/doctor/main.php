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
                                <div class = "d-flex align-items-center"><input type = "checkbox" id = "doctor_toggle" style = "width:20px; height:20px;"></div>
                            </div>
                        </div>
                        <div class = "row mb-3 p-10 bg-white border rounded">
                            <div class = "col-12 mb-2"><h3>Doctor Title and Description</h3></div>
                            <div class = "col-6">
                                <div class = "form-group">
                                    <h6>Job(En)</h6>
                                    <input class="form-control" id="title_en" type="text" value = "<?php echo $component['t_doctor_title']['en']?>"/>
                                </div>
                                <div class = "form-group">
                                    <h6>Description(En)</h6>
                                    <textarea class="form-control" id="desc_en" rows = "4"><?php echo $component['t_doctor_desc']['en']?></textarea>
                                </div>
                            </div>
                            <div class = "col-6">
                                <div class = "form-group">
                                    <h6>Job(Es)</h6>
                                    <input class="form-control" id="title_es" type="text" value = "<?php echo $component['t_doctor_title']['es']?>"/>
                                </div>
                                <div class = "form-group">
                                    <h6>Description(Es)</h6>
                                    <textarea class="form-control" id = "desc_es" rows = "4"><?php echo $component['t_doctor_desc']['es']?></textarea>
                                </div>
                            </div>
                            <div class="col-12 text-right">
                                <button class="btn btn-light-primary" onclick = "updateDoctorDesc();">Update</button>
                            </div>
                        </div>
                        <div class = "row my-3 p-10 bg-white border rounded">
                            <div class = "col-12 mb-4 d-flex justify-content-between align-items-center my-5">
                                <div><h3>Doctors</h3></div>
                                <div><span class = 'add_doctor_btn btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
                                <input type="hidden" id="chosen_person_id" />
                            </div>
                            <div class = "col-12">
                                <div class="table-responsive">
                                    <table class="table" id="doctor_tb">
                                        <thead>
                                            <th>Photo</th>
                                            <th>Full Name</th>
                                            <th>Job</th>
                                            <th>Display</th>
                                            <th>Action</th>
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
        <?php include('doctor_add_modal.php') ?>
        <?php include('doctor_edit_modal.php') ?>
        <?php include('doctor_upload_modal.php') ?>
        <script>
            $(document).ready(function() {
                $('#doctor_tb').DataTable({
                    "pagingType": "full_numbers",
                    "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                    ],
                    responsive: false,
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Search records",
                    },
                    "ajax": {
                        "url": "<?php echo base_url() ?>local/Doctor/read",
                        "type": "GET"
                    },
                    "columns": [
                        { data: 'img',
                            render: function (data, type, row) {
                                return `<img src="${"<?php echo base_url() ?>assets/images/doctors/"+row.img}" width="100" />`;
                            } 
                        },
                        { data: 'en_name' },
                        { data: 'en_job' },
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
                                <div idkey="`+row.id+`">
                                    <span class="btn btn-icon btn-sm btn-light-primary upload_photo_btn"><i class="fas fa-image"></i></span>
                                    <span class="btn btn-icon btn-sm btn-light-warning edit_doctor_btn"><i class="fas fa-edit"></i></span>
                                    <span class="btn btn-icon btn-sm btn-light-danger  delete_doctor_btn"><i class="fas fa-trash"></i></span>
                                </div>
                                `
                            } 
                        }
                    ]
                });


                $(document).on("click",".delete_doctor_btn",function(){
                    $("#chosen_person_id").val($(this).parent().attr("idkey"));
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
                                url: '<?php echo base_url() ?>local/Doctor/delete',
                                method: "POST",
                                data: {id:$("#chosen_person_id").val()},
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
            function updateDoctorDesc(){
                title_en = $("#title_en").val();
                title_es = $("#title_es").val();
                desc_en = $("#desc_en").val();
                desc_es = $("#desc_es").val();

                $.ajax({
                    url: '<?php echo base_url() ?>local/Doctor/updateDoctorDesc',
                    method: "POST",
                    data: {title_en: title_en, title_es: title_es, desc_en: desc_en, desc_es: desc_es},
                    dataType: "text",
                    success: function (data) {
                        handleResponse(data);
                    }
                });
            }
            handleAreaToggleBox('#doctor_toggle', 'doctor_area');
        </script>
    </body>
</html>
