<div class = "row my-3 p-10 bg-white border rounded">
    <div class = "col-12 d-flex d-flex align-items-center justify-content-end">
        <div class = "mr-1">Show:</div>
        <div class = "d-flex align-items-center"><input type = "checkbox" id = "working_hour_toggle" style = "width:20px; height:20px;"></div>
    </div>
    <div class = "col-12 mb-4 d-flex justify-content-between align-items-center my-5 my-5">
        <div><h3>Working Hours</h3></div>
        <div class = 'working_hour_add_btn btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></div>
    </div>
    <div class = "col-12">
        <div class="table-responsive">
            <table class="table" id="working_hour_tb">
                <thead>
                    <th>Weekday</th>
                    <th>Time</th>
                    <th>Action</th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class = "row my-3 p-10 bg-white border rounded">
    <div class = "col-12 d-flex d-flex align-items-center justify-content-end">
        <div class = "mr-1">Show:</div>
        <div class = "d-flex align-items-center"><input type = "checkbox" id = "after_hours_toggle" style = "width:20px; height:20px;"></div>
    </div>
    <div class = "col-12 mb-2"><h3>After Hours</h3></div>
    <div class = "col-md-6">
        <div class="form-group">
            <h6>After Hours(EN)</h6>
            <div id = 'after_hours_en'></div>
        </div>
    </div>
    <div class = "col-md-6">
        <div class="form-group">
            <h6>After Hours (ES)</h6>
            <div id = 'after_hours_es'></div>
        </div>
    </div>
    <div class="col-12 text-right">
        <button class="btn btn-light-primary pull-right" onclick = 'updateAfterHours();'>Update</button>
    </div>
</div>

<div class="modal fade" id="working_hour_add_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ">Add Time</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class = "row"> 
                    <div class = "col-md-6">
                        <div class="form-group">
                            <h6>Day ( En )</h6>
                            <input name = 'en_worktime_day' id = 'en_worktime_day' class="form-control" type="text" />
                        </div>
                    </div>
                    <div class = "col-md-6">
                        <div class="form-group">
                            <h6>Day ( Es )</h6>
                            <input name = 'es_worktime_day' id = 'es_worktime_day' class="form-control" type="text" />
                        </div>
                    </div>
                    <div class = "col-md-6">
                        <div class="form-group">
                            <h6>Time ( En )</h6>
                            <input name = 'en_worktime_time' id = 'en_worktime_time' class="form-control" type="text" />
                        </div>
                    </div>
                    <div class = "col-md-6">
                        <div class="form-group">
                            <h6>Time ( Es )</h6>
                            <input name = 'es_worktime_time' id = 'es_worktime_time' class="form-control" type="text" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary add_working_hour_confirm" data-dismiss="modal">Done</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="working_hour_edit_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ">Edit Time</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class = "row">
                    <div class = "col-md-6">
                        <div class="form-group">
                            <h6>Day ( En )</h6>
                            <input name = 'een_worktime_day' id = 'een_worktime_day' class="form-control" type="text" />
                        </div>
                    </div>
                    <div class = "col-md-6">
                        <div class="form-group">
                            <h6>Day ( Es )</h6>
                            <input name = 'ees_worktime_day' id = 'ees_worktime_day' class="form-control" type="text" />
                        </div>
                    </div>
                    <div class = "col-md-6">
                        <div class="form-group">
                            <h6>Time ( En )</h6>
                            <input name = 'een_worktime_time' id = 'een_worktime_time' class="form-control" type="text" />
                        </div>
                    </div>
                    <div class = "col-md-6">
                        <div class="form-group">
                            <h6>Time ( Es )</h6>
                            <input name = 'ees_worktime_time' id = 'ees_worktime_time' class="form-control" type="text" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary edit_working_hour_confirm" data-dismiss="modal">Done</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        let working_hour_tb = $('#working_hour_tb').DataTable({
            "pagingType": "full_numbers",
            "order": [[ 2, 'asc' ]],
            "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search working hour",
            },
            "ajax": {
                "url": "<?php echo base_url() ?>local/TheClinic/readWorkingHour",
                "type": "GET"
            },
            "columns": [
                { data: 'en_name',
                    render: function (data, type, row) {
                        return `${row.en_name}&nbsp;&nbsp;<small>${row.es_name}</small>`
                    } 
                },
                { data: 'es_time',
                    render: function (data, type, row) {
                        return `${row.en_time}&nbsp;&nbsp;<small>${row.es_time}</small>`
                    } 
                },
                { data: 'id',
                    render: function (data, type, row) {
                        return `
                        <div idkey="`+row.id+`">
                            <span class="btn btn-icon btn-sm btn-light-warning edit_working_hour_btn"><i class="fas fa-edit"></i></span>
                            <span class="btn btn-icon btn-sm btn-light-danger  delete_working_hour_btn"><i class="fas fa-trash"></i></span>
                        </div>
                        `
                    } 
                }
            ]
        });
        $(".working_hour_add_btn").click(function(){
            $("#working_hour_add_modal").modal('show');
        });
        $(".add_working_hour_confirm").click(function(){
            $.ajax ({
                url: '<?php echo base_url() ?>local/TheClinic/createWorkingHour',
                method: "POST",
                data: {en_day:$("#en_worktime_day").val(),es_day:$("#es_worktime_day").val(),en_time:$("#en_worktime_time").val(),es_time:$("#es_worktime_time").val()},
                dataType: "text",
                success: function (data) {
                    if(data == "ok"){
                        setTimeout( function () {
                            $('#working_hour_tb').DataTable().ajax.reload();
                        }, 1000 );
                        mynotify('success','Add Success');
                    }
                    else{
                        mynotify('danger','Add Fail');
                    }
                }
            });
        });
        $(document).on("click",".edit_working_hour_btn",function(){
            window.id = $(this).parent().attr("idkey");
            $.ajax ({
                url: '<?php echo base_url() ?>local/TheClinic/chooseWorkingHour',
                method: "POST",
                data: {id: window.id},
                dataType: "json",
                success: function (data) {
                    $("#een_worktime_day").val(data['en_name']);
                    $("#ees_worktime_day").val(data['es_name']);
                    $("#een_worktime_time").val(data['en_time']);
                    $("#ees_worktime_time").val(data['es_time']);
                    $("#working_hour_edit_modal").modal('show');
                }
            });
        });
        $(".edit_working_hour_confirm").click(function(){
            $.ajax ({
                url: '<?php echo base_url() ?>local/TheClinic/updateWorkingHour',
                method: "POST",
                data: {id: window.id, en_day:$("#een_worktime_day").val(),es_day:$("#ees_worktime_day").val(),en_time:$("#een_worktime_time").val(),es_time:$("#ees_worktime_time").val()},
                dataType: "text",
                success: function (data) {
                    handleTableReload(data, '#working_hour_tb');
                }
            });
        });
        $(document).on("click",".delete_working_hour_btn",function(){
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
                        url: '<?php echo base_url() ?>local/TheClinic/deleteWorkingHour',
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
        handleAreaToggleBox('#working_hour_toggle', 'clinic_workinghour');
        handleAreaToggleBox('#after_hours_toggle', 'clinic_afterhours');
    });

    $('#after_hours_en').summernote({
        tabsize: 1,
        height: 150,
    });
    $('#after_hours_es').summernote({
        tabsize: 1,
        height: 150,
    });
    $("#after_hours_en").summernote("code",`<?php echo $component['t_after_hours']['en']?>`);
    $("#after_hours_es").summernote("code",`<?php echo $component['t_after_hours']['es']?>`);

    function updateAfterHours(){
        after_hours_en = $("#after_hours_en").summernote("code");
        after_hours_es = $("#after_hours_es").summernote("code");
        $.ajax({
            url: '<?php echo base_url() ?>local/TheClinic/updateAfterHour',
            method: "POST",
            data: {after_hours_en: after_hours_en, after_hours_es: after_hours_es},
            dataType: "text",   
            success: function (data) {
                handleResponse(data);
            }
        });
    }
</script>