<style>
    .static-body {
        border-radius: 6px;
        box-shadow: 2px 2px 4px #00000020;
        transition: all 200ms ease-out;
    }

    .static-body:hover {
        box-shadow: 4px 4px 8px #00000040;
        transition: all 200ms ease-out;
        background-color: #FFFFFF90 !important;
    }

    .static-mark {
        border-radius: 5px;
        box-shadow: 2px 2px 7px #00000020;
        transition: all 200ms ease-out;
    }

    .p-1px {
        padding: 1px !important;
    }

    .p-2px {
        padding: 2px !important;
    }

    .p-5px {
        padding: 5px !important;
    }

    .p-10px {
        padding: 10px !important;
    }

    .p-15px {
        padding: 15px !important;
    }

    .p-20px {
        padding: 20px !important;
    }

    .p-50px {
        padding: 50px !important;
    }

    .px-20px {
        padding-left: 20px !important;
        padding-right: 20px !important;
    }

    .py-20px {
        padding-top: 20px !important;
        padding-bottom: 20px !important;
    }

    .fs-1 {
        font-size: 36px !important;
    }

    .fs-2 {
        font-size: 32px !important;
    }

    .fs-3 {
        font-size: 28px !important;
    }

    .fs-4 {
        font-size: 24px !important;
    }

    .fs-5 {
        font-size: 20px !important;
    }

    .fs-6 {
        font-size: 16px !important;
    }

    .fs-7 {
        font-size: 12px !important;
    }

    .round-5px {
        border: 1px solid #00000000;
        border-radius: 5px;
    }

    .split-line {
        height: 1px;
        background-color: gray;
    }

    .m-0 {
        margin: 0px;
    }

    .control-label {
        width: auto;
        min-width: 120px;
        margin: 0px;
        display: flex;
        justify-content: end;
        padding-right: 5px;
    }

    .control-date {
        max-width: 150px;
    }

    #contact_history_modal .modal-body {
        max-height: 500px;
        overflow-y: auto;
        scrollbar-width: thin;
    }
</style>

<div class="row my-5">
    <div class="col-3">
        <div data="0" class="w-100 h-120px bg-white static-body cursor-pointer">
            <div class="p-20px w-100 d-flex justify-content-between">
                <span class="d-inline-block round-5px">
                    <i class="p-15px fs-3 fa fa-list-ul text-primary bg-light-primary static-mark"></i>
                </span>
                <span class="d-inline-block p-2px">
                    <h4 class="d-flex justify-content-end text-black">Total Messages</h4>
                    <span id="stt-total-message" class="d-flex justify-content-end text-primary fs-5 cursor-pointer stt-number"><?php echo $statistic["total"] ?></span>
                </span>
            </div>
            <div class="px-20px">
                <hr class="m-0">
            </div>
        </div>
    </div>
    <div class="col-3">
        <div data="1" class="w-100 h-120px bg-white static-body">
            <div class="p-20px w-100 d-flex justify-content-between cursor-pointer">
                <span class="d-inline-block round-5px">
                    <i class="p-15px fs-3 fa fa-list-ul text-danger bg-light-danger static-mark"></i>
                </span>
                <span class="d-inline-block p-2px">
                    <h4 class="d-flex justify-content-end text-black">Open</h4>
                    <span id="stt-total-message" class="d-flex justify-content-end text-danger fs-5 cursor-pointer stt-number"><?php echo $statistic["open"] ?></span>
                </span>
            </div>
            <div class="px-20px">
                <hr class="m-0">
            </div>
        </div>
    </div>
    <div class="col-3">
        <div data="2" class="w-100 h-120px bg-white static-body">
            <div class="p-20px w-100 d-flex justify-content-between cursor-pointer">
                <span class="d-inline-block round-5px">
                    <i class="p-15px fs-3 fa fa-list-ul text-success bg-light-success static-mark"></i>
                </span>
                <span class="d-inline-block p-2px">
                    <h4 class="d-flex justify-content-end text-black">In Progress</h4>
                    <span id="stt-total-message" class="d-flex justify-content-end text-success fs-5 cursor-pointer stt-number"><?php echo $statistic["inprogress"] ?></span>
                </span>
            </div>
            <div class="px-20px">
                <hr class="m-0">
            </div>
        </div>
    </div>
    <div class="col-3">
        <div data="3" class="w-100 h-120px bg-white static-body">
            <div class="p-20px w-100 d-flex justify-content-between cursor-pointer">
                <span class="d-inline-block round-2px">
                    <i class="p-15px fs-3 fa fa-list-ul text-primary bg-light-primary static-mark"></i>
                </span>
                <span class="d-inline-block p-2px">
                    <h4 class="d-flex justify-content-end text-black">Closed</h4>
                    <span id="stt-total-message" class="d-flex justify-content-end text-primary fs-5 cursor-pointer stt-number"><?php echo $statistic["close"] ?></span>
                </span>
            </div>
            <div class="px-20px">
                <hr class="m-0">
            </div>
        </div>
    </div>
</div>

<div class="row my-3 p-10 bg-white border rounded">
    <div class="col-12 mb-4 d-flex justify-content-between align-items-center my-5">
        <div>
            <h3>Contact Records</h3>
        </div>
    </div>
    <div class="row mb-10">
        <div class="col-md-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="control-label">Assigned : </h5>
                <select id="contact_assigned" class="form-control">
                    <option value="all">All</option>
                    <option value="0">Nobody</option>
                    <?php for ($i = 0; $i < count($staffs); $i++): ?>
                        <option value="<?php echo $staffs[$i]['id'] ?>"><?php echo $staffs[$i]['en_name'] ?></option>
                    <?php endfor ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="control-label">Reason : </h5>
                <select id="contact_reason" class="form-control">
                    <option value="All Reason">All Reason</option>
                    <option value="Appointment Request">Appointment Request</option>
                    <option value="Letter Request">Letter Request</option>
                    <option value="Prescription Refill Request">Prescription Refill Request</option>
                    <option value="Referral Request">Referral Request</option>
                    <option value="Test Results Request">Test Results Request</option>
                    <option value="General Message">General Message</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-start align-items-center">
                <h5 class="control-label">Date Range : </h5>
                <input type="date" id="contact_start_date" class="form-control control-date" value="" />
                <h5 class="">&nbsp;&nbsp;&nbsp;~&nbsp;&nbsp;&nbsp;</h5>
                <input type="date" id="contact_end_date" class="form-control control-date" value="" />
            </div>
        </div>
    </div>
    <input type="hidden" id="chosen_id" />
    <div class="col-12">
        <table class="table w-100" id="contact_track_tb">
            <thead>
                <th>Case</th>
                <th>Assigned To</th>
                <th>Updated Time</th>
                <th>Reason</th>
                <th>From</th>
                <th>Contact</th>
                <th>Subject</th>
                <th>Turn Around</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="cview_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title " style="font-weight:500;">View Detail</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <input type="hidden" id="view_patient_id" />
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="d-flex mb-2">
                            <h6>Case :&nbsp;</h6><span id="view_case"></span> <?php echo $acronym; ?>
                        </div>
                        <div class="d-flex mb-2">
                            <h6>Date :&nbsp;</h6><span id="view_date"></span>
                        </div>
                        <div class="d-flex mb-2">
                            <h6>Reason :&nbsp;</h6><span id="view_reason"></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2 mr-15">
                            <div class="d-flex">
                                <h6>From :&nbsp;</h6><span id="view_name"></span>
                            </div>
                            <div class="d-flex">
                                <h6>DOB :&nbsp;</h6><span id="view_dob"></span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-2 mr-15">
                            <div class="d-flex">
                                <h6>Email :&nbsp;</h6><span id="view_email"></span>
                            </div>
                            <div class="d-flex">
                                <h6>Phone :&nbsp;</h6><span id="view_cel"></span>
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <h6>Language :&nbsp;</h6><span id="view_lang"></span>
                        </div>
                        <div class="d-flex mb-2">
                            <h6>Subject :&nbsp;</h6><span id="view_subject"></span>
                        </div>
                        <div class="d-flex mb-2">
                            <h6>Message :&nbsp;</h6><span id="view_message"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Assigned To <small>(required)</small></label>
                            <select name="assigneduser" id="view_assigned_to" class="form-control" required>
                                <option value="0">Nobody</option>
                                <?php for ($i = 0; $i < count($staffs); $i++): ?>
                                    <option value="<?php echo $staffs[$i]['id'] ?>"><?php echo $staffs[$i]['en_name'] ?></option>
                                <?php endfor ?>
                            </select>
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Priority <small>(required)</small></label>
                            <select name="priority" id="view_priority" class="form-control">
                                <option value="1"> Routine </option>
                                <option value="2"> Medium </option>
                                <option value="3"> Low </option>
                            </select>
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Status <small>(required)</small></label>
                            <input type="hidden" id="view_old_status" />
                            <select name="status" id="view_status" class="form-control">
                                <option value="1"> Open </option>
                                <option value="2"> In progress </option>
                                <option value="3"> Closed </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label"> Leave Comment</label>
                            <textarea class="form-control" rows="5" name='comment' id="comment"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary update_track_btn" data-dismiss="modal">Update</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--- end modal -->
<!-- The Modal -->
<div class="modal fade" id="survey_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title " style="font-weight:500;">Send Survey</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h6>CASE : #<span id="sview_case"></span></h6>
                        <h6>Date : <span id="sview_date"></span></h6>
                        <h6>Reason : <span id="sview_reason"></span></h6>
                        <h6>From : <span id="sview_name"></span></h6>
                        <h6>DOB : <span id="sview_dob"></span></h6>
                        <h6>Email : <span id="sview_email"></span></h6>
                        <h6>Cel : <span id="sview_cel"></span></h6>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Please select survey</label>
                            <select name="survey_list" id="survey_list" class="form-control">
                                <?php for ($i = 0; $i < count($survey); $i++): ?>
                                    <option value="<?php echo $survey[$i]['id'] ?>"><?php echo $survey[$i]['en_sub'] ?></option>
                                <?php endfor ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input surveyemail" type="checkbox" checked value="1"> Email
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input surveysms" type="checkbox" checked value="1"> SMS
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check form-check-radio form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input langsurvey" checked name="group1" type="radio" value="1"> ENG
                                <span class="circle">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input langsurvey" name="group1" type="radio" value="2"> SPA
                                <span class="circle">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>

                    </div>
                    <input type="hidden" id="chosen_email" />
                    <input type="hidden" id="chosen_phone" />
                </div>
            </div>
            <!-- Modal footer -->
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary sendsurveybtn" data-dismiss="modal">Done</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--- end modal -->
<!-- The Modal -->
<div class="modal fade" id="survey_multi_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title " style="font-weight:500;">Multi Send Survey</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h6>Count : <span id="survey_multi_modal_count"></span></h6>
                            <h6>Status : <span id="survey_multi_modal_status">Closed</span></h6>
                        </div>
                    </div>
                    <div class='row justify-content-center mb-5'>
                        <div class='col-md-5'>
                            <div class="form-group">
                                <input class="survey_multi_modal_check_daterange" type="checkbox" value="1"> Date Range:
                            </div>
                        </div>

                        <div class='col-md-3'>
                            <div class="form-group bmd-form-group">
                                <label class="">Start Date</label>
                                <input type="date" name='start_date' id='survey_multi_modal_start_date' class="form-control" required>
                            </div>
                        </div>
                        <div class='col-md-3'>
                            <div class="form-group bmd-form-group">
                                <label class="">End Date</label>
                                <input type="date" name='end_date' id='survey_multi_modal_end_date' class="form-control" required>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Please select survey</label>
                                <select name="survey_list" id="survey_multi_modal_survey_list" class="form-control">
                                    <?php for ($i = 0; $i < count($survey); $i++): ?>
                                        <option value="<?php echo $survey[$i]['id'] ?>"><?php echo $survey[$i]['en_sub'] ?></option>
                                    <?php endfor ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input survey_multi_modal_surveyemail" type="checkbox" checked value="1"> Email
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input survey_multi_modal_surveysms" type="checkbox" checked value="1"> SMS
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input survey_multi_modal_langsurvey" checked name="langsurvey" type="radio" value="1"> ENG
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input survey_multi_modal_langsurvey" name="langsurvey" type="radio" value="2"> SPA
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary survey_multi_modal_sendsurveybtn" data-dismiss="modal">Done</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--- end modal -->
<!-- Contact History Begin -->
<div class="modal fade" id="contact_history_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <input type="hidden" id="reply-contact_id" />
            <input type="hidden" id="reply-assigned" />
            <input type="hidden" id="reply-case_number" />
            <input type="hidden" id="reply-patient_id" />
            <!-- Modal Header -->
            <div class="modal-header">
                <div class="">
                    <h4 id="modal_history_title" class="modal-title mb-2" style="font-weight:500;">Contact History</h4>
                    <h6 id="modal_history_title_patient" style="font-size:50;"></h6>
                    <h6 id="modal_history_title_status" style="font-size:36;"></h6>
                </div>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="contact_history_panel" class="w-100">
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <textarea class="form-control mb-3 w-100" id="message-modal-input" name="message-modal-input" rows="3" placeholder="Enter your message"></textarea>
                <button type="button" class="btn btn-light-primary" id="message_modal_reply">Send Message</button>
                <button type="button" class="btn btn-light-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Contact History End -->
<script>
    var table_status = 0;

    function getTimeDiff(start, end) {
        var diff = parseInt(Math.abs(new Date(end) - new Date(start)) / 1000)
        var _str = ''
        if (parseInt(diff / (86400 * 30))) {
            _str = `more than ${parseInt(diff / (86400 * 30))} Month(s)`
        } else if (parseInt(diff / 86400)) {
            _str = `${parseInt(diff / 86400)} Day(s) ${parseInt((diff % 86400) / 3600)} Hour(s)`
        } else if (parseInt(diff / 3600)) {
            _str = `${parseInt(diff / 3600)} Hour(s) ${parseInt((diff % 3600) / 60)} Minute(s)`
        } else if (parseInt(diff / 60)) {
            _str = `${parseInt(diff / 60)} Minute(s) ${parseInt(diff % 60)} Second(s)`
        } else {
            _str = `${diff} Second(s)`
        }
        return _str
    }
    $(document).ready(function() {
        // start and end date range 
        const _curr_date = new Date(Date.now())
        $("#contact_start_date").val("2024-01-01")
        $("#contact_end_date").val(_curr_date.toISOString().substr(0, 10))

        let tracktable = $('#contact_track_tb').DataTable({
            "pagingType": "full_numbers",
            "processing": true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            "order": [
                [2, 'desc']
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            },
            "ajax": {
                "url": '<?php echo base_url() ?>' + 'Contact/getAllContacts',
                "type": "POST",
                "data": function(data) {
                    data.clinic = "<?php echo $contact_info["name"]; ?>"
                    data.status = table_status
                    data.reason = $('#contact_reason').val()
                    data.assigned = $("#contact_assigned").val()
                    data.start_date = $("#contact_start_date").val()
                    data.end_date = $("#contact_end_date").val()
                }
            },
            "columns": [{
                    data: 'case_number',
                    render: function(data, type, row) {
                        return `${row.case_number}${'<?php echo $acronym; ?>'}`
                    }
                },
                {
                    data: 'assigned_name'
                },
                {
                    data: 'date',
                    render: function(data, type, row) {
                        return new Date(row.date).toLocaleDateString('en-US', {
                            month: '2-digit',
                            day: '2-digit',
                            year: 'numeric',
                            hour: "2-digit",
                            minute: "2-digit",
                            hour12: true
                        })
                    }
                },
                {
                    data: 'reason',
                    render: function(data, type, row) {
                        if (row.msg_type == 1) {
                            return `<i class="fa fa-globe-asia"></i> ${row.reason}`
                        } else if (row.msg_type == 0) {
                            return `<i class="fa fa-person-booth"></i> ${row.reason}`
                        }
                    }
                },
                {
                    data: 'name',
                    render: function(data, type, row) {
                        return `<div>
                                    <p class='text-primary'>${row.name}</p>
                                    <p class='text-danger m-0'>${new Date(row.dob) > new Date(1900, 1, 1) ? new Date(row.dob).toLocaleString().substr(0, 10) : ''}</p>
                                </div>`
                    }
                },
                {
                    data: 'cel',
                    render: function(data, type, row) {
                        return `<div>
                                    <p class='text-danger'>${row.cel ? row.cel : ''}</p>
                                    <a href="mailto:${row.email ? row.email : 'info@doctorpimentel.com'}" class="text-primary">${row.email ? row.email : ''}</a>
                                </div>`
                    }
                },
                {
                    data: 'subject'
                },
                {
                    data: 'date',
                    render: function(data, type, row) {
                        return row.status == 3 ? getTimeDiff(row.sent, row.closed_date) : `<div class="px-5"><hr></div>`
                    }
                },
                {
                    data: 'priority',
                    render: function(data, type, row) {
                        return `<span class = '${row.priority==1?"text-danger":(row.priority==2?"text-warning":"text-success")}'>${row.priority==1?"Routine":(row.priority==2?"Medium":"Low")}</span>`
                    }
                },
                {
                    data: 'status',
                    render: function(data, type, row) {
                        return `<span class = '${row.status==1?"text-danger":(row.status==2?"text-success":"text-primary")}'>${row.status==1?"Open":(row.status==2?"In progress":"Closed")}</span>`
                    }
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return `
                        <div idkey="${row.id}" assigned="${row.assign}" patient_name="${row.patient_fname + ' ' + row.patient_lname}" patient_dob=${row.patient_dob} patient_sex=${row.patient_sex} patient_lang=${row.patient_lang} case_number="${row.case_number}" patient_id="${row.pt_emr_id}" status="${row.status}">
                            <span class='btn btn-icon mx-1 btn-sm btn-light-warning viewbtn'><i class='fa fa-eye'></i></span>
                            <span class='btn btn-icon mx-1 btn-sm btn-light-success chatbtn'><i class="fa fa-clipboard-list"></i></span>
                            ${"<?php if ($this->session->userdata('usertype') == 1) echo "<span class='btn btn-icon mx-1 btn-sm btn-light-danger  deletebtn'><i class='fa fa-trash'></i></span>" ?>"}
                        </div>
                        `
                    }
                }
            ],
            createdRow: function(row, data, dataIndex) {
                if (data.sf_unread_count > 0) {
                    $(row).addClass('bg-light-primary')
                }
            }
        })
        $(document).on("click", ".viewbtn", function() {
            window.id = $(this).parent().attr("idkey");
            $('#view_patient_id').val($(this).parent().attr('patient_id'));
            $.ajax({
                url: '<?php echo base_url() ?>' + 'Contact/viewContact',
                method: "POST",
                data: {
                    id: window.id
                },
                dataType: "json",
                success: function(data) {
                    var data = data.data
                    $("#view_case").html(data['case_number']);
                    $("#view_date").html(new Date(data['date']).toLocaleString());
                    $("#view_reason").html(data['reason']);
                    $("#view_name").html(data['name']);
                    $("#view_dob").html(new Date(data['dob']).toLocaleDateString());
                    $("#view_email").html(data['email']);
                    $("#view_cel").html(data['cel']);
                    $("#view_lang").html(data['lang'] == 'en' ? 'English' : 'Spanish');
                    $("#view_subject").html(data['subject']);
                    $("#view_message").html(data['message']);
                    $("#view_assigned_to").val(data['assign']);
                    $("#view_priority").val(data['priority']);
                    $('#view_old_status').val(data['status']);
                    $("#view_status").val(data['status']);
                    //$("#comment").val("");
                    $("#cview_modal").modal('show');
                }
            });
        })
        $(document).on('click', '.chatbtn', function() {
            $('#message-modal-input').val('')

            var id = $(this).parent().attr("idkey")

            $('#reply-contact_id').val($(this).parent().attr("idkey"))
            $('#reply-case_number').val($(this).parent().attr("case_number"))
            $('#reply-assigned').val($(this).parent().attr("assigned"))
            $('#reply-patient_id').val($(this).parent().attr('patient_id'))

            var case_number = $(this).parent().attr("case_number")
            var assign = $(this).parent().attr("assigned")
            var patient_id = $(this).parent().attr("patient_id")
            $.ajax({
                url: '<?php echo base_url() ?>' + 'local/Contacts/viewCommunicationHistory',
                method: "POST",
                data: {
                    id: id,
                    case_number: case_number,
                    assign: assign,
                    patient_id: patient_id,
                    person_type: 'patient' // read message of patient
                },
                dataType: "json",
                success: function(res) {
                    let contact = res.contact

                    var html = ''

                    // Calculate the difference in years
                    var date2 = new Date(contact['dob'])
                    var date1 = new Date(Date.now())
                    let differenceInYears = date1.getFullYear() - date2.getFullYear();

                    // Adjust for months and days
                    const monthDifference = date2.getMonth() - date1.getMonth();
                    const dayDifference = date2.getDate() - date1.getDate();

                    if (monthDifference < 0 || (monthDifference === 0 && dayDifference < 0)) {
                        differenceInYears--;
                    }

                    $('#modal_history_title').text(`Contact History | Case Number : ${contact['case_number']}<?php echo $acronym; ?>`)
                    $('#modal_history_title_patient').text(`${contact['name']} | ${new Date(contact['dob']).toLocaleDateString()} | ${contact['patient_sex']} | Age : ${differenceInYears} | Lang : ${contact['patient_lang']}`)
                    $('#modal_history_title_status').html(`<div class="d-flex">
                                                                <div style="margin-right: 30px;">Turn Around : ${contact['status'] == 3 ? getTimeDiff(contact['sent'], contact['closed_date']) : '--/--/----'}</div>
                                                                <span class = "${contact['status']==1?'text-danger':(contact['status']==2?'text-success':'text-primary')}">${contact['status']==1?"Open":(contact['status']==2?"In progress":"Closed")}</span>
                                                           </div>`)

                    var history = res.history
                    history.forEach(item => {
                        html += `<div class='w-100 mb-5'>
                                    <div class='d-flex ${item['person_type'] == 'staff' ? 'justify-content-end' : 'justify-content-start'}'>
                                        <p class='text-black-50' style='font-size: 11px;'>${item['person_type'] == 'staff' ? 'You' : contact['name']}&nbsp;&nbsp;${new Date(item['created_time']).toLocaleString()}</p>
                                    </div>
                                    <div class='d-flex ${item['person_type'] == 'staff' ? 'justify-content-end' : 'justify-content-start'}' style='margin-top: -10px;'>
                                        <div class='${item['person_type'] == 'patient' ? 'bg-light-primary' : 'bg-secondary'} rounded'>
                                            <div class='p-3' style='word-break: break-word; font-size: 15px;'>${item['message']}</div>
                                        </div>
                                        <i class="mx-2 d-flex justify-content-center align-items-center ${item['seen'] == 0 ? 'fa fa-check' : 'fa fa-check-double'} text-success"></i>
                                    </div>
                                </div>`
                    })

                    if (!history.length) {
                        html = `<div style="width: 100%; height: 120px; display: flex; justify-content: center; align-items: center;">
                                    <div style="text-align: center; font-size: xx-large; color: gray;">
                                        <i class="fa fa-folder-open" style="font-size: xx-large;"></i> No History
                                    </div>
                                </div>`
                    }
                    $('#contact_history_panel').html(html)
                    $('#contact_history_modal').modal('show')
                },
                error: function(error) {
                    toastr.error("Error!")
                }
            });
        })
        $(document).on("click", ".deletebtn", function() {
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
                    $.ajax({
                        // url: '<?php echo $this->config->item('medical_center_url') ?>' + 'api/deleteContactTrack',
                        url: '<?php echo base_url() ?>' + 'Contact/deleteContact',
                        method: "POST",
                        data: {
                            id: window.id
                        },
                        dataType: "text",
                        success: function(data) {
                            if (data == "ok")
                                tracktable.ajax.reload();
                        }
                    });
                }
            });
        })
        $(".update_track_btn").click(function() {
            var entry = {
                id: window.id,
                patient_id: $('#view_patient_id').val(),
                case_number: $('#view_case').text(),
                assign: $("#view_assigned_to").val(),
                priority: $("#view_priority").val(),
                status: $("#view_status").val(),
                old_status: $('#view_old_status').val(),
                comment: $("#comment").val(),
            }
            $.ajax({
                url: '<?php echo base_url() ?>' + 'local/Contacts/updatetrack',
                type: 'POST',
                data: entry,
                dataType: "json",
                success: function(data) {
                    if (data.status == 'ok') {
                        toastr.success('Success!')
                        tracktable.ajax.reload()
                    } else {
                        toastr.error('Failed!')
                    }
                }
            });
        })
        $('#message_modal_reply').click(function() {
            let message = $('#message-modal-input').val()
            let assign = $('#reply-assigned').val()
            let case_number = $('#reply-case_number').val()
            let patient_id = $('#reply-patient_id').val()

            if (!message) {
                toastr.warning('Please input your message')
            } else {
                var encrypt = new JSEncrypt()
                encrypt.setPublicKey(`<?php echo $this->config->item('public_key') ?>`)
                $.post({
                    url: '<?php echo base_url() ?>' + 'local/Contacts/addMessage',
                    method: "POST",
                    data: {
                        contact_id: $('#reply-contact_id').val(),
                        message: encrypt.encrypt(message),
                        patient_id: encrypt.encrypt(patient_id),
                        assign: encrypt.encrypt(assign),
                        case_number: encrypt.encrypt(case_number),
                        person_type: encrypt.encrypt('staff')
                    },
                    dataType: "json",
                    success: function(res) {
                        if (res.status == "success") {
                            toastr.success('Message has been sent successfully!')
                            tracktable.ajax.reload()
                        } else {
                            toastr.error('Failed in sending')
                        }

                        $('#contact_history_modal').modal('hide')
                    }
                })
            }
        })

        $('.static-body').click(function() {
            table_status = $(this).attr("data")
            tracktable.ajax.reload()
        })

        $('#contact_reason').change(() => {
            tracktable.ajax.reload()
        })

        $('#contact_assigned').change(() => {
            tracktable.ajax.reload()
        })

        $('#contact_start_date').change((e) => {
            if (new Date(e.target.value) > new Date($('#contact_end_date').val())) {
                $('#contact_end_date').val(e.target.value)
            }
            tracktable.ajax.reload()
        })

        $('#contact_end_date').change((e) => {
            if (new Date(e.target.value) < new Date($('#contact_start_date').val())) {
                $('#contact_end_date').val($('#contact_start_date').val())
            }
            tracktable.ajax.reload()
        })
    });
</script>