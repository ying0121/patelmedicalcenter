<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('local/header'); ?>
        <style>
            .btn-group, .btn-group-vertical {
                margin: 0!important;
            }
            .card{
                margin-top:0;
            }
        </style>
    </head>
    <body>
        <div class="wrapper ">
			<div class="main-panel" style="width:100%">
                <div class = "loading-bg"><div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>
                <div class="content">
                    <div class="container-fluid">
                        <div class = "row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-icon card-header-primary no-print">
                                        <div class = 'row'>
                                            <div class="col-12 text-center">
                                                <h2 class="text-center"><?php echo $topics[array_search($catid, array_column($topics, 'id'))]['en_name']; ?></h2>
                                            </div>
                                            <div class = "col-md-12 text-right"><span class = 'qcatmeasure_add btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
                                            <input type="hidden" id="chosen_qcatmeasure_id" />
                                            <input type="hidden" id="catid" value="<?php echo $catid; ?>" />
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table" id="qcatmeasure_tb">
                                            <thead>
                                                <th>Measure</th>
                                                <th style="max-width:800px;">Description</th>
                                                <th>Denominator</th>
                                                <th>Numerator</th>
                                                <th>Percentage</th>
                                                <th>Status</th>
                                                <th style="width:100px;">Action</th>
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
        </div>
        <div class="modal fade" id="add_modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title ">Add Measure(<?php echo $topics[array_search($catid, array_column($topics, 'id'))]['en_name']; ?>)</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class = "row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Measure (En)</label>
                                    <input class="form-control" id="measure_en" name="measure_en" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Measure (Es)</label>
                                    <input class="form-control" id="measure_es" name="measure_es" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Denominator</label>
                                    <input class="form-control" id="denominator" name="denominator" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Numerator</label>
                                    <input class="form-control" id="numerator" name="numerator" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input class="form-control datepicker" id="sdate" name="sdate" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input class="form-control datepicker" id="edate" name="edate" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h6 style="font-size: 16px;">Description</h6>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div id="desc_en"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div id="desc_es"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h6 style="font-size: 16px;">Full Description</h6>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div id="fdesc_en"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div id="fdesc_es"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                            <button type="button" class="btn btn-light-primary addbtn" data-dismiss="modal">Done</button>
                            <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="edit_modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                            <h4 class="modal-title ">Edit Measure</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class = "row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Measure (En)</label>
                                    <input class="form-control" id="emeasure_en" name="emeasure_en" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Measure (Es)</label>
                                    <input class="form-control" id="emeasure_es" name="emeasure_es" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Topics</label>
                                    <select name = 'etopic' id = 'etopic' class="form-control">
                                        <?php foreach($topics as $topic_array): ?>
                                            <option value="<?php echo $topic_array['id']; ?>"><?php echo $topic_array['en_name']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Denominator</label>
                                    <input class="form-control" id="edenominator" name="edenominator" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Numerator</label>
                                    <input class="form-control" id="enumerator" name="enumerator" />
                                </div>
                            </div>
                            <div class="col-md-4 d-flex align-items-center">
                                Percentage: <span id="percent"></span>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input class="form-control datepicker" id="esdate" name="esdate" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input class="form-control datepicker" id="eedate" name="eedate" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h6 style="font-size: 16px;">Description</h6>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div id="edesc_en"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div id="edesc_es"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h6 style="font-size: 16px;">Full Description</h6>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div id="efdesc_en"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div id="efdesc_es"></div>
                                </div>
                            </div>
                            <div class = "col-md-12">
                                <div class="form-group">
                                    <h6>Status</h6>
                                    <select class="form-control" name="measurestatus" id="measurestatus" style="height:36px;">
                                        <option value="1">Visible</option>
                                        <option value="0">Invisible</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                            <button type="button" class="btn btn-light-primary updatebtn" data-dismiss="modal">Done</button>
                            <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--- end modal -->
        <script>
            $('#desc_en').summernote({
                tabsize: 1,
                height: 150
            });
            $('#desc_es').summernote({
                tabsize: 1,
                height: 150
            });
            $('#fdesc_en').summernote({
                tabsize: 1,
                height: 250
            });
            $('#fdesc_es').summernote({
                tabsize: 1,
                height: 250
            });
            $('#edesc_en').summernote({
                tabsize: 1,
                height: 150
            });
            $('#edesc_es').summernote({
                tabsize: 1,
                height: 150
            });
            $('#efdesc_en').summernote({
                tabsize: 1,
                height: 250
            });
            $('#efdesc_es').summernote({
                tabsize: 1,
                height: 250
            });
            $(document).ready(function() {
        
                let measuretable = $('#qcatmeasure_tb').DataTable({
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
                        "url": "<?php echo base_url() ?>local/AboutUs/readMeasures",
                        "type": "POST",
                        "data":{id:$("#catid").val()} 
                    },
                    "columns": [
                        { data: 'measure_en',
                            render: function (data, type, row) {
                                return `
                                <p class="mb-2">${row.measure_en}</p>
                                <small>${row.measure_es}</small>
                                `
                            } 
                        },
                        { data: 'desc_en',
                            render: function (data, type, row) {
                                return `
                                <p class="mb-2">${row.desc_en}</p>
                                <small>${row.desc_es}</small>
                                `
                            } 
                        },
                        { data: 'denominator'},
                        { data: 'numerator'},
                        { data: 'numerator',
                            render: function (data, type, row) {
                                return parseInt(row.numerator/row.denominator*100) + '%';
                            }
                        },
                        { data: 'status',
                            render: function (data, type, row) {
                                return `<span class = '${row.status==1?"text-success":"text-danger"}'>${row.status==1?"Visible":"Invisible"}</span>`
                            } 
                        },
                        { data: 'id',
                            render: function (data, type, row) {
                                return `
                                <div idkey="`+row.id+`">
                                    <span class="btn btn-icon btn-sm btn-light-warning editbtn"><i class="fas fa-edit"></i></span><span class="btn btn-icon btn-sm btn-light-danger  deletebtn"><i class="fas fa-trash"></i></span>
                                </div>
                                `
                            } 
                        }
                    ]
                });
                $(".qcatmeasure_add").click(function(){
                    $("#add_modal").modal("show");
                });
                $(".addbtn").click(function(){
                    let entry = {
                        id:$("#catid").val(),
                        measure_en:$("#measure_en").val(),
                        measure_es:$("#measure_es").val(),
                        denominator:$("#denominator").val(),
                        numerator:$("#numerator").val(),
                        edate:$("#edate").val(),
                        sdate:$("#sdate").val(),
                        desc_en:$("#desc_en").summernote("code"),
                        desc_es:$("#desc_es").summernote("code"),
                        fdesc_en:$("#fdesc_en").summernote("code"),
                        fdesc_es:$("#fdesc_es").summernote("code")
                    }
                    $.ajax ({
                        url: '<?php echo base_url() ?>local/AboutUs/createMeasure',
                        method: "POST",
                        data: entry,
                        dataType: "text",
                        success: function (data) {
                            if(data == "ok"){
                                setTimeout( function () {
                                    measuretable.ajax.reload();
                                }, 1000 );
                                mynotify('success','Add Success');
                            }
                            else{
                                mynotify('danger','Add Fail')
                            }
                        }
                    });
                });
                $(document).on("click",".deletebtn",function(){
                    $("#chosen_qcatmeasure_id").val($(this).parent().attr("idkey"));
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
                                url: '<?php echo base_url() ?>local/AboutUs/deleteMeasure',
                                method: "POST",
                                data: {id:$("#chosen_qcatmeasure_id").val()},
                                dataType: "text",
                                success: function (data) {
                                    if(data = "ok")
                                        tmp.remove();
                                }
                            });
                        }
                    });
                });
                $(document).on("click",".editbtn",function(){
                    $("#chosen_qcatmeasure_id").val($(this).parent().attr("idkey"));

                    $.ajax ({
                        url: '<?php echo base_url() ?>local/AboutUs/chooseMeasure',
                        method: "POST",
                        data: {id:$("#chosen_qcatmeasure_id").val()},
                        dataType: "json",
                        success: function (data) {
                            $("#emeasure_en").val(data['measure_en']);
                            $("#emeasure_es").val(data['measure_es']);
                            $("#etopic").val(data['catid']);
                            $("#edenominator").val(data['denominator']);
                            $("#enumerator").val(data['numerator']);
                            $("#esdate").val(data['sdate']);
                            $("#eedate").val(data['edate']);
                            $("#edesc_en").summernote("code",data['desc_en']);
                            $("#edesc_es").summernote("code",data['desc_es']);
                            $("#efdesc_en").summernote("code",data['fdesc_en']);
                            $("#efdesc_es").summernote("code",data['fdesc_es']);
                            $("#measurestatus").val(data['status']);
                            $("#percent").html($("#enumerator").val()/$("#edenominator").val()*100 + '%');
                            $("#edit_modal").modal('show');
                        }
                    });
                });
                $(".updatebtn").click(function(){
                    let entry = {
                        id:$("#chosen_qcatmeasure_id").val(),
                        measure_en:$("#emeasure_en").val(),
                        measure_es:$("#emeasure_es").val(),
                        topic:$("#etopic").val(),
                        denominator:$("#edenominator").val(),
                        numerator:$("#enumerator").val(),
                        edate:$("#eedate").val(),
                        sdate:$("#esdate").val(),
                        status:$("#measurestatus").val(),
                        desc_en:$("#edesc_en").summernote("code"),
                        desc_es:$("#edesc_es").summernote("code"),
                        fdesc_en:$("#efdesc_en").summernote("code"),
                        fdesc_es:$("#efdesc_es").summernote("code")
                    }
                    $.ajax ({
                        url: '<?php echo base_url() ?>local/AboutUs/updateMeasure',
                        method: "POST",
                        data: entry,
                        dataType: "text",
                        success: function (data) {
                            if(data == "ok"){
                                setTimeout( function () {
                                    measuretable.ajax.reload();
                                }, 1000 );
                                mynotify('success','Update Success');
                            }
                            else{
                                mynotify('success','Update Fail');
                            }
                        }
                    });
                });
            });
        </script>
    </body>
    <!-- The Modal -->
</html>
