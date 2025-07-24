<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('header.php'); ?>
    </head>
    <body>
        <div class="wrapper ">
            <?php include('menu.php'); ?>
			<div class="main-panel">
                <div class = "loading-bg"><div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>
                <div class="content">
                    <div class="container-fluid">
                        <?php include('topmenu.php'); ?>
                        <div class = "row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-icon card-header-primary no-print">
                                        <div class = 'row'>
                                            <div class = 'col-md-12 text-right'><span class = 'insurance_add btn btn-light-primary btn-icon' ><i class = 'fa fa-plus'></i></span></div>
                                            <input name = 'chosen_insurance_id' id = 'chosen_insurance_id' type="hidden" class="form-control">
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table" id="insurance_tb">
                                                <thead>
                                                    <th>Image</th>
                                                    <th>Insurance Name</th>
                                                    <th>Status</th>
                                                    <th class = "actionth">Action</th>
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
        </div>
    </body>
    <!-- The Modal -->
	<div class="modal fade" id="insurance_add_modal">
        <div class="modal-dialog">
                <div class="modal-content">
                
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title">Add Insurance</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <form id = 'insuranceaddform' action="<?php echo base_url('central/insurance/addinsurance'); ?>" method="post">
                        <div class = 'row'>
                            <div class = 'col-md-6'>
                                <div class="form-group">
                                    <label class="bmd-label-static">Insurance Name</label>
                                    <input name = 'insurance_name' id = 'insurance_name' type="text" class="form-control">
                                </div>
                            </div>
                            <div class = 'col-md-6'>
                                <div class="form-group">
                                    <label class="bmd-label-static">Email</label>
                                    <input name = 'insurance_email' id = 'insurance_email' type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class = 'row mt-2'>
                            <div class = 'col-md-6'>
                                <div class="form-group">
                                    <label class="bmd-label-static">Phone</label>
                                    <input name = 'insurance_phone' id = 'insurance_phone' type="text" class="form-control">
                                </div>
                            </div>
                            <div class = 'col-md-6'>
                                <div class="form-group">
                                    <label class="bmd-label-static">Fax</label>
                                    <input name = 'insurance_fax' id = 'insurance_fax' type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class = 'row mt-2'>
                            <div class = 'col-md-12'>
                                <div class="form-group">
                                    <label class="bmd-label-static">Address</label>
                                    <input name = 'insurance_address' id = 'insurance_address' type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class = 'row mt-2'>
                            <div class = 'col-md-6'>
                                <div class="form-group">
                                    <label class="bmd-label-static">City</label>
                                    <input name = 'insurance_city' id = 'insurance_city' type="text" class="form-control">
                                </div>
                            </div>
                            <div class = 'col-md-6'>
                                <div class="form-group">
                                    <label class="bmd-label-static">State</label>
                                    <select name = 'insurance_state' id = 'insurance_state' class="form-control" style = 'height:36px;'>
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value="CA">California</option>
                                            <option value="NV">Nevada</option>
                                            <option value="OR">Oregon</option>
                                            <option value="WA">Washington</option>
                                        </optgroup>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="UT">Utah</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value="AL">Alabama</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TX">Texas</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="WI">Wisconsin</option>
                                        </optgroup>
                                        <optgroup label="Eastern Time Zone">
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="IN">Indiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NY" selected>New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="OH">Ohio</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WV">West Virginia</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class = 'row mt-2'>
                            <div class = 'col-md-6'>
                                <div class="form-group">
                                    <label class="bmd-label-static">Zip</label>
                                    <input name = 'insurance_zip' id = 'insurance_zip' type="text" class="form-control">
                                </div>
                            </div>
                            <div class = 'col-md-6'>
                            <div class="form-group">
                                <label class="bmd-label-static">Status</label>
                                <select name = 'insurance_status' id = 'insurance_status' class="form-control" style = 'height:36px;'>
                                    <option value="1">Visible</option>
                                    <option value="0">Invisible</option>
                                </select>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary insuranceaddbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
     <!-- The Modal -->
	<div class="modal fade" id="insurance_edit_modal">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title">Edit Insurance</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form id = 'editinsuranceform' action="<?php echo base_url('central/insurance/editinsurance'); ?>" method="post">
                        <input id="chosen_id" name="chosen_id" type="hidden" />
                        <div class = 'row'>
                            <div class = 'col-md-6'>
                                <div class="form-group">
                                    <label class="bmd-label-static">Insurance Name</label>
                                    <input name = 'einsurance_name' id = 'einsurance_name' type="text" class="form-control">
                                </div>
                            </div>
                            <div class = 'col-md-6'>
                                <div class="form-group">
                                    <label class="bmd-label-static">Email</label>
                                    <input name = 'einsurance_email' id = 'einsurance_email' type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class = 'row mt-2'>
                            <div class = 'col-md-6'>
                                <div class="form-group">
                                    <label class="bmd-label-static">Phone</label>
                                    <input name = 'einsurance_phone' id = 'einsurance_phone' type="text" class="form-control">
                                </div>
                            </div>
                            <div class = 'col-md-6'>
                                <div class="form-group">
                                    <label class="bmd-label-static">Fax</label>
                                    <input name = 'einsurance_fax' id = 'einsurance_fax' type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class = 'row mt-2'>
                            <div class = 'col-md-12'>
                                <div class="form-group">
                                    <label class="bmd-label-static">Address</label>
                                    <input name = 'einsurance_address' id = 'einsurance_address' type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class = 'row mt-2'>
                            <div class = 'col-md-6'>
                                <div class="form-group">
                                    <label class="bmd-label-static">City</label>
                                    <input name = 'einsurance_city' id = 'einsurance_city' type="text" class="form-control">
                                </div>
                            </div>
                            <div class = 'col-md-6'>
                                <div class="form-group">
                                    <label class="bmd-label-static">State</label>
                                    <select name = 'einsurance_state' id = 'einsurance_state' class="form-control" style = 'height:36px;'>
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value="CA">California</option>
                                            <option value="NV">Nevada</option>
                                            <option value="OR">Oregon</option>
                                            <option value="WA">Washington</option>
                                        </optgroup>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="UT">Utah</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value="AL">Alabama</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TX">Texas</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="WI">Wisconsin</option>
                                        </optgroup>
                                        <optgroup label="Eastern Time Zone">
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="IN">Indiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NY" selected>New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="OH">Ohio</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WV">West Virginia</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class = 'row mt-2'>
                            <div class = 'col-md-6'>
                                <div class="form-group">
                                    <label class="bmd-label-static">Zip</label>
                                    <input name = 'einsurance_zip' id = 'einsurance_zip' type="text" class="form-control">
                                </div>
                            </div>
                            <div class = 'col-md-6'>
                            <div class="form-group">
                                <label class="bmd-label-static">Status</label>
                                <select name = 'einsurance_status' id = 'einsurance_status' class="form-control" style = 'height:36px;'>
                                    <option value="1">Visible</option>
                                    <option value="0">Invisible</option>
                                </select>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary insuranceeditsubmitbtn">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <!-- The Modal -->
	<div class="modal fade" id="avatar_edit_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h4 class="modal-title ">Edit Insurance</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form id = "updateimgfrom" action="<?php echo base_url('central/insurance/updateimg'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="chosen_ins_img_id" name="chosen_ins_img_id">
                        <div class = "row">
                            <div class = 'col-md-12'>
                                <h6>Insurance Image ( 270*100 )</h6>
                                <div class="custom-file form-group">
                                    <input type="file" class="custom-file-input" id="customFile" name="file">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                </form>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary imgeditsubmitbtn" data-dismiss="modal">Done</button>
                        <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</div>
    <!--- end modal -->
    <script>
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        $(document).ready(function() {
            let insurancetable = $('#insurance_tb').DataTable({
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
                    "url": "<?php echo base_url() ?>central/Insurance/getinsurance",
                    "type": "GET"
                },
                "columns": [
                    { data: 'img',
                        render: function (data, type, row) {
                            if(row.img != null)
                                return `
                                <img src="${"<?php echo base_url() ?>assets/images/insurance/"+row.img}" width="50" />
                                `
                            else
                                return `
                                <img src="${"<?php echo base_url() ?>assets/images/insurance/empty-img.jpg"}" width="50" />
                                `
                        } 
                    },
                    { data: 'name' },
                    { data: 'status',
                        render: function (data, type, row) {
                            return `
                            <div idkey="`+row.id+`">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input insurancestatus" type="checkbox" ${row.status==1?"checked":""}>
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            `
                        } 
                    },
                    { data: 'id',
                        render: function (data, type, row) {
                            return `
                            <div idkey="`+row.id+`">
                                <span class="btn btn-icon btn-sm btn-light-primary insuranceimgbtn"><i class="fas fa-image"></i></span><span class="btn btn-icon btn-sm btn-light-warning insuranceeditbtn"><i class="fas fa-edit"></i></span><span class="btn btn-icon btn-sm btn-light-danger  insurancedeletebtn"><i class="fas fa-trash"></i></span>
                            </div>
                            `
                        } 
                    }
                ]
            });
            //insurance Area
            $(".insurance_add").click(function(){
                $("#insurance_add_modal").modal('show');
            });
            $(".insuranceaddbtn").click(function(){
                $("#insuranceaddform").submit();
            });
            $(document).on("click",".insuranceeditbtn",function(){
                $("#chosen_insurance_id").val($(this).parent().attr("idkey"));
                $("#chosen_id").val($(this).parent().attr("idkey"));
                $.ajax ({
                    url: '<?php echo base_url() ?>central/insurance/choseninsurance',
                    method: "POST",
                    data: {id:$("#chosen_insurance_id").val()},
                    dataType: "json",
                    success: function (data) {
                        $("#einsurance_name").val(data['name']);
                        $("#einsurance_email").val(data['email']);
                        $("#einsurance_phone").val(data['phone']);
                        $("#einsurance_fax").val(data['fax']);
                        $("#einsurance_address").val(data['address']);
                        $("#einsurance_city").val(data['city']);
                        $("#einsurance_state").val(data['state']);
                        $("#einsurance_zip").val(data['zip']);
                        $("#einsurance_status").val(data['status']);
                        $("#insurance_edit_modal").modal('show');
                    }
                });
            });
            $(".insuranceeditsubmitbtn").click(function(){
                $("#editinsuranceform").submit();
            });
            $(document).on("click",".insurancedeletebtn",function(){
                $("#chosen_insurance_id").val($(this).parent().attr("idkey"));
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
                            url: '<?php echo base_url() ?>central/insurance/deleteinsurance',
                            method: "POST",
                            data: {id:$("#chosen_insurance_id").val()},
                            dataType: "text",
                            success: function (data) {
                                if(data = "ok")
                                    tmp.remove();
                            }
                        });
                    }
                });
            });
            $(document).on("click",".insurancestatus",function(){
                var tmpcheck = 0;
                if($(this).prop("checked")){
                    tmpcheck = 1;
                }
                else{
                    tmpcheck = 0;
                }
                $.ajax ({
                    url: '<?php echo base_url() ?>central/insurance/editinsurancestatus',
                    method: "POST",
                    data: {id:$(this).parent().parent().parent().attr("idkey"),value:tmpcheck},
                    dataType: "text",
                    success: function (data) {
                        if(data == "ok"){
                            $.notify({
                                icon: "add_alert",
                                message: "Action Successfully"

                                }, {
                                type: 'info',
                                timer: 1000,
                                placement: {
                                    from: 'top',
                                    align: 'center'
                                }
                            });
                        }
                        else{
                            $.notify({
                                icon: "add_alert",
                                message: "Action failed"

                                }, {
                                type: 'info',
                                timer: 1000,
                                placement: {
                                    from: 'top',
                                    align: 'center'
                                }
                            });
                        }
                    }
                });
            });
            $(document).on("click",".insuranceimgbtn",function(){
                $("#chosen_ins_img_id").val($(this).parent().attr("idkey"));
                $("#avatar_edit_modal").modal('show');
            });
            $(".imgeditsubmitbtn").click(function(){
                $("#updateimgfrom").submit();
            });
            
        });
    </script>
</html>
