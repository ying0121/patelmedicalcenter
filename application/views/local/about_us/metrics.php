<style>
    .viewmeasurebtn{
        position: relative;
    }
    .viewmeasure{
        position: absolute;
        top: -7px;
        border: 1px solid #FFF;
        right: -5px;
        font-size: 9px;
        background: #f44336;
        color: #FFFFFF;
        min-width: 20px;
        padding: 0px 5px;
        height: 20px;
        border-radius: 10px;
        text-align: center;
        line-height: 19px;
        vertical-align: middle;
        display: block;
    }
</style>
<div class="row m-3">
    <div class = "col-12 d-flex d-flex align-items-center justify-content-end">
        <div class = "mr-1">Show:</div>
        <div class = "d-flex align-items-center"><input type = "checkbox" id = "metrics_toggle" style = "width:20px; height:20px;"></div>
    </div>
</div>
<div class = "row my-3 p-10 bg-white border rounded">
    <div class = "col-12 mb-2"><h3>Metrics Title and Description</h3></div>
    <div class = "col-6">
        <div class = "form-group">
            <h6>Title(En)</h6>
            <input class="form-control" id="metrics_title_en" type="text" value = "<?php echo $component['t_quality_metrics_title']['en']?>"/>
        </div>
        <div class = "form-group">
            <h6>Description(En)</h6>
            <textarea class="form-control" id="metrics_desc_en" rows = "4"><?php echo $component['t_quality_metrics_desc']['en']?></textarea>
        </div>
    </div>
    <div class = "col-6">
        <div class = "form-group">
            <h6>Title(Es)</h6>
            <input class="form-control" id="metrics_title_es" type="text" value = "<?php echo $component['t_quality_metrics_title']['es']?>"/>
        </div>
        <div class = "form-group">
            <h6>Description(Es)</h6>
            <textarea class="form-control" id = "metrics_desc_es" rows = "4"><?php echo $component['t_quality_metrics_desc']['es']?></textarea>
        </div>
    </div>
    <div class="col-12 text-right">
        <button class="btn btn-light-primary" id = "metrics_desc_update">Update</button>
    </div>
</div>
<div class = "row my-3 p-10 bg-white border rounded">
    <div class = "col-12 mb-4 d-flex justify-content-between align-items-center my-5">
        <div><h3>Quality Categories</h3></div>
        <div style = "padding:10px 20px 10px 20px;" class = 'qcat_add btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></div>
        <input type="hidden" id="chosen_qcat_id" />
    </div>
    <div class = "col-12">
      
            <table class="table" id="qcat_tb">
                <thead>
                    <th>English</th>
                    <th>Español</th>
                    <th>Display</th>
                    <th>Action</th>
                </thead>
                <tbody>
                </tbody>
            </table>
   
    </div>
</div>
<div class="modal fade" id="qcat_add_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Add Category</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>English</h6>
                                <input name = 'en_qcat' id = 'en_qcat' class="form-control" type="text" />
                            </div>
                        </div>
                        <div class = "col-md-12">
                            <div class="form-group">
                                <h6>Español</h6>
                                <input name = 'es_qcat' id = 'es_qcat' class="form-control" type="text" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary qcataddbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
</div>
<div class="modal fade" id="qcat_edit_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                    <h4 class="modal-title ">Edit Category</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class = "row">
                    <div class = "col-md-12">
                        <div class="form-group">
                            <h6>English</h6>
                            <input name = 'een_qcat' id = 'een_qcat' class="form-control" type="text" />
                        </div>
                    </div>
                    <div class = "col-md-12">
                        <div class="form-group">
                            <h6>Español</h6>
                            <input name = 'ees_qcat' id = 'ees_qcat' class="form-control" type="text" />
                        </div>
                    </div>
                    <div class = "col-md-12">
                        <div class="form-group">
                            <h6>Status</h6>
                            <select class="form-control" name="eqcatstatus" id="eqcatstatus" style="height:36px;">
                                <option value="1">Visible</option>
                                <option value="0">Invisible</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            </form>
            <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary qcateditsubmitbtn" data-dismiss="modal">Done</button>
                    <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#metrics_desc_update").click(function(){

            title_en = $("#metrics_title_en").val();
            title_es = $("#metrics_title_es").val();
            desc_en = $("#metrics_desc_en").val();
            desc_es = $("#metrics_desc_es").val();

            $.ajax({
                url: '<?php echo base_url() ?>local/AboutUs/updateMetricsDesc',
                method: "POST",
                data: {title_en: title_en, title_es: title_es, desc_en: desc_en, desc_es: desc_es},
                dataType: "text",
                success: function (data) {
                    handleResponse(data);
                }
            });
        });
        
        let qcattable = $('#qcat_tb').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
            ],
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            },
            "ajax": {
                "url": "<?php echo base_url() ?>local/AboutUs/readQualityCategories",
                "type": "GET"
            },
            "columns": [
                { data: 'en_name' },
                { data: 'es_name' },
                { data: 'status',
                    render: function (data, type, row) {
                        return `<span class = '${row.status==1?"text-success":"text-danger"}'>${row.status==1?"Visible":"Invisible"}</span>`
                    } 
                },
                { data: 'id',
                    render: function (data, type, row) {
                        return `
                        <div idkey="`+row.id+`">
                            <a href="${'<?php echo base_url() ?>local/AboutUs/MeasureByCategory?id='+row.id}" target="_blank">
                                <span class="btn btn-icon btn-sm btn-light-primary viewmeasurebtn">
                                    <span class="viewmeasure">${row.cnt}</span>
                                    <i class="fa fa-list-alt"></i>
                                </span>
                            </a>
                            <span class="btn btn-icon btn-sm btn-light-warning qcateditbtn"><i class="fas fa-edit"></i></span>
                            <span class="btn btn-icon btn-sm btn-light-danger  qcatdeletebtn"><i class="fas fa-trash"></i></span>
                        </div>
                        `
                    } 
                }
            ]
        });
        $(".qcat_add").click(function(){
            $("#qcat_add_modal").modal('show');
        });
        $(".qcataddbtn").click(function(){
            $.ajax ({
                url: '<?php echo base_url() ?>local/AboutUs/createQualityCategory',
                method: "POST",
                data: {en:$("#en_qcat").val(),es:$("#es_qcat").val()},
                dataType: "text",
                success: function (data) {
                    if(data == "ok"){
                        setTimeout( function () {
                            qcattable.ajax.reload();
                        }, 1000 );
                        mynotify('success','Add Success');
                    }
                    else{
                        mynotify('danger','Add Fail');

                    }
                }
            });
        });
        $(document).on("click",".qcateditbtn",function(){
            $("#chosen_qcat_id").val($(this).parent().attr("idkey"));
            $.ajax ({
                url: '<?php echo base_url() ?>local/AboutUs/chooseQualityCategory',
                method: "POST",
                data: {id:$("#chosen_qcat_id").val()},
                dataType: "json",
                success: function (data) {
                    $("#een_qcat").val(data['en_name']);
                    $("#ees_qcat").val(data['es_name']);
                    $("#eqcatstatus").val(data['status']);
                    $("#qcat_edit_modal").modal('show');
                }
            });
        });
        $(".qcateditsubmitbtn").click(function(){
            $.ajax ({
                url: '<?php echo base_url() ?>local/AboutUs/updateQualityCategory',
                method: "POST",
                data: {id:$("#chosen_qcat_id").val(),en:$("#een_qcat").val(),es:$("#ees_qcat").val(),status:$("#eqcatstatus").val()},
                dataType: "text",
                success: function (data) {
                    if(data == "ok"){
                        setTimeout( function () {
                            qcattable.ajax.reload();
                        }, 1000 );
                        mynotify('success','Update Success');
                    }
                    else{
                        mynotify('danger','Update Fail');
                    }
                }
            });
        });
        $(document).on("click",".qcatdeletebtn",function(){
            $("#chosen_qcat_id").val($(this).parent().attr("idkey"));
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
                        url: '<?php echo base_url() ?>local/AboutUs/deleteQualityCategory',
                        method: "POST",
                        data: {id:$("#chosen_qcat_id").val()},
                        dataType: "text",
                        success: function (data) {
                            if(data = "ok")
                                tmp.remove();
                        }
                    });
                }
            });
        });
        handleAreaToggleBox('#metrics_toggle', 'aboutus_metrics');
    });
</script>