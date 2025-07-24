<!DOCTYPE html>
<html lang="en">

<?php include('includes.php'); ?>

<body class="counter-scroll header_sticky">
    <!-- Preloader -->
    <div id="loading-overlay">
        <div class="loader"></div>
    </div>
    <!-- Header -->
    <?php include('header.php') ?>
    <!-- Main -->
    <main>
        <div class="container my-5">
            <div class="d-flex justify-content-start align-items-center flex-wrap gap-3 mb-3">
                <p class="h3 m-0"><?php echo $component_text['t_vault_title'] ?></p>
                <p class="h3 m-0 text-danger"><?php echo $patient_info['fname'] . ' ' . $patient_info['lname'] ?></p>
                <p class="h4 m-0">
                    <i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php $dob = new DateTime($patient_info['dob']);
                                                                echo $dob->format('m/d/Y') ?>
                </p>
                <p class="h4 m-0"><?php echo $component_text['v_acc_no'] ?> : <?php echo $patient_info['id'] ?></p>
                <button class="d-none" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#view_appt_info_modal" id="appt-info-modal-view"></button>

                <button class="btn btn-tertiary text-primary fs-5" btn btn-tertiary id="view_appt_info">
                    <?php echo $component_text['btn_appt_info'] ?>
                </button>
            </div>
            <div class="d-flex justify-content-start align-items-center flex-wrap gap-3 mb-3">
                <p class="h5">
                    <i class="fa fa-location-arrow"></i>&nbsp;&nbsp;<?php if ($patient_info['address']) echo $patient_info['address'] . ', ' . $patient_info['state'] . ' ' . $patient_info['zip']; ?>
                </p>
                <p class="h5">
                    <i class="fa fa-phone"></i>&nbsp;&nbsp;<?php if ($patient_info['phone']) echo $patient_info['phone'];
                                                            else echo ""; ?>&nbsp;|&nbsp;
                    <i class="fa fa-fax"></i>&nbsp;&nbsp;<?php if ($patient_info['mobile']) echo $patient_info['mobile'];
                                                            else echo ""; ?>
                </p>
                <p class="h5">
                    <i class="fa fa-envelope"></i>&nbsp;&nbsp;<?php if ($patient_info['email']) echo $patient_info['email'];
                                                                else echo ""; ?>
                </p>
            </div>
            <p class="lead"><?php echo $component_text['t_pa_v_htext'] ?></p>
        </div>
        <div class="container mb-5">
            <!-- Tabs navs -->
            <ul class="nav nav-tabs mb-3" id="ex-with-icons" role="tablist">
                <li class="nav-item" role="presentation">
                    <a data-mdb-tab-init class="nav-link active fs-6" id="ex-with-icons-tab-1" href="#ex-with-icons-tabs-1" role="tab"
                        aria-controls="ex-with-icons-tabs-1" aria-selected="true"><i class="fa fa-envelope"></i> <?php echo $component_text['v_inbox'] ?></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a data-mdb-tab-init class="nav-link fs-6" id="ex-with-icons-tab-2" href="#ex-with-icons-tabs-2" role="tab"
                        aria-controls="ex-with-icons-tabs-2" aria-selected="false"><i class="fa fa-file-signature"></i> <?php echo $component_text['v_compose'] ?></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a data-mdb-tab-init class="nav-link fs-6" id="ex-with-icons-tab-3" href="#ex-with-icons-tabs-3" role="tab"
                        aria-controls="ex-with-icons-tabs-3" aria-selected="false"><i class="fa fa-file"></i> <?php echo $component_text['v_document'] ?></a>
                </li>
            </ul>
            <!-- Tabs navs -->
            <!-- Tabs content -->
            <div class="tab-content" id="ex-with-icons-content">
                <div class="tab-pane fade show active" id="ex-with-icons-tabs-1" role="tabpanel" aria-labelledby="ex-with-icons-tab-1">
                    <div class="card p-4">
                        <div class="table-responsive">
                            <button class="d-none" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#history_modal" id="history-modal-view"></button>
                            <table class="table table-hover" id="inbox_table">
                                <th scope="col">Action</th>
                                <th scope="col">Case</th>
                                <th scope="col">Updated Time</th>
                                <th scope="col">Reason</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Assigned</th>
                                <th scope="col">Priority</th>
                                <th scope="col">Status</th>
                                <th scope="col">Turn Around</th>
                            </table>
                            <tbody></tbody>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="ex-with-icons-tabs-2" role="tabpanel" aria-labelledby="ex-with-icons-tab-2">
                    <div class="card p-4">
                        <form class="content-form" id="contact_form" action="#" method="post" accept-charset="utf-8" novalidate="novalidate">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="h5"><?php echo $component_text['t_contact_reason'] ?> (*):</p>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="contactreason" id="t_contact_reason_1" value="Appointment Request" checked />
                                        <label class="form-check-label" for="t_contact_reason_1"> <?php echo $component_text['t_contact_reason_1'] ?> </label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="contactreason" id="t_contact_reason_2" value="Letter Request" />
                                        <label class="form-check-label" for="t_contact_reason_2"> <?php echo $component_text['t_contact_reason_2'] ?> </label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="contactreason" id="t_contact_reason_3" value="Prescription Refill Request" />
                                        <label class="form-check-label" for="t_contact_reason_3"> <?php echo $component_text['t_contact_reason_3'] ?> </label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="contactreason" id="t_contact_reason_4" value="Referral Request" />
                                        <label class="form-check-label" for="t_contact_reason_4"> <?php echo $component_text['t_contact_reason_4'] ?> </label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="contactreason" id="t_contact_reason_5" value="Test Results Request" />
                                        <label class="form-check-label" for="t_contact_reason_5"> <?php echo $component_text['t_contact_reason_5'] ?> </label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="contactreason" id="t_contact_reason_6" value="General Message" />
                                        <label class="form-check-label" for="t_contact_reason_6"> <?php echo $component_text['t_contact_reason_6'] ?> </label>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4" />
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="form-outline" data-mdb-input-init>
                                        <input type="text" id="contact_subject" class="form-control form-control-lg" name="contact_subject" />
                                        <label class="form-label" for="contact_subject"><?php echo $component_text['placeholder_subject']; ?></label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <div class="form-outline" data-mdb-input-init>
                                        <textarea class="form-control" id="contact_message" rows="4" name="contact_message"></textarea>
                                        <label class="form-label" for="contact_message"><?php echo $component_text['placeholder_message']; ?></label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <div class="form-outline" data-mdb-input-init>
                                        <input type="text" id="contact_time" class="form-control form-control-lg" name="contact_time" />
                                        <label class="form-label" for="contact_time"><?php echo $component_text['placeholder_besttime']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-3" />
                            <div class="row mb-3">
                                <div class="col-md-12 mb-3">
                                    <p class="fs-6 my-1"><?php echo $component_text['t_opt_in_out_header']; ?></p>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="opt_status" id="home_opt_in" value="1" checked />
                                        <label class="form-check-label" for="home_opt_in"> <?php echo $component_text['t_opt_in_out_in'] ?> </label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="opt_status" id="home_opt_out" value="0" />
                                        <label class="form-check-label" for="home_opt_out"> <?php echo $component_text['t_opt_in_out_out'] ?> </label>
                                    </div>
                                </div>
                                <div class="col-md-12 d-none" id="home_opt_moreinfo">
                                    <p class="fs-6"><?php echo $component_text['t_opt_in_out_footer']; ?></p>
                                </div>
                                <div class="col-md-12">
                                    <p class="fs-6 m-0"><?php echo $component_text['t_opt_in_out_more']; ?></p>
                                </div>
                                <div class="col-md-12">
                                    <a href="#" id="home_opt_more_info_btn"><?php echo $component_text['t_opt_more_info']; ?> >></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button id="btn_submit_contact" type="button" class="btn btn-primary btn-lg w-100" data-mdb-ripple-init><?php echo $component_text['btn_send']; ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="ex-with-icons-tabs-3" role="tabpanel" aria-labelledby="ex-with-icons-tab-3">
                    <div class="card p-4">
                        <p class="fs-6"><?php echo $component_text['t_pa_v_desc'] ?></p>
                        <?php for ($i = 0; $i < count($vault); $i++): ?>
                            <div class="card mb-4">
                                <div class="card-header">
                                    <p class="h4 my-2"><?php echo $vault[$i]['title'] ?> (<?php echo $vault[$i]['submit_date'] ?>)</p>
                                </div>
                                <div class="card-body">
                                    <div class="card-title"><?php echo $vault[$i]['desc'] ?></div>
                                </div>
                                <div class="card-footer text-center">
                                    <a class="btn btn-link text-white" data-mdb-ripple-init style="background-color: #55acee;" href="<?php echo base_url() . 'local/ServeAsset/getFile?category=vault&filename=' . $vault[$i]['document'] ?>" target="_blank">
                                        <i class="fas fa-download me-2"></i>
                                        <?php echo $component_text['t_download'] ?> (<?php echo $vault[$i]['size'] ?>)
                                    </a>
                                </div>
                            </div>
                        <?php endfor ?>
                    </div>
                </div>
            </div>
            <!-- Tabs content -->
        </div>
    </main>
    <!-- Footer -->
    <?php include('footer.php'); ?>
    </div>

    <div class="modal fade" tabindex="-1" aria-hidden="true" id="history_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <input type="hidden" id="reply-contact_id" />
                <input type="hidden" id="reply-assigned" />
                <input type="hidden" id="reply-case_number" />
                <input type="hidden" id="reply-patient_id" />
                <div class="modal-header">
                    <div class="">
                        <h4 id="modal_history_title" class="modal-title fs-6 mb-2"><?php echo $component_text['c_item_contact_history'] ?></h4>
                        <h6 id="modal_history_title_patient" class="fs-6"></h6>
                        <h6 id="modal_history_title_status" class="fs-6"></h6>
                    </div>
                </div>
                <div class="modal-body">
                    <div id="contact_history_panel" class="w-100"></div>
                </div>
                <div class="modal-footer">
                    <div class="form-outline mb-3">
                        <textarea class="form-control w-100" id="message-modal-input" name="message-modal-input" data-mdb-input-init></textarea>
                        <label class="form-label" for="message-modal-input"><?php echo $component_text['c_item_msg_placeholder'] ?></label>
                    </div>
                    <button type="button" class="btn btn-primary" id="message_modal_reply" data-mdb-ripple-init data-mdb-dismiss="modal"><?php echo $component_text['c_item_send_msg'] ?></button>
                    <button type="button" class="btn btn-danger" data-mdb-ripple-init data-mdb-dismiss="modal"><?php echo $component_text['c_item_close'] ?></button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" aria-hidden="true" id="view_appt_info_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mb-2"><?php echo $component_text['btn_appt_info'] ?></h4>
                </div>
                <div class="modal-body">
                    <div id="contact_history_panel" class="w-100"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-mdb-ripple-init data-mdb-dismiss="modal"><?php echo $component_text['c_item_close'] ?></button>
                </div>
            </div>
        </div>
    </div>

    <script>
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
            let inbox_table = $('#inbox_table').DataTable({
                'pagingType': 'full_numbers',
                'order': [
                    [2, 'desc']
                ],
                'lengthMenu': [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All']
                ],
                responsive: true,
                language: {
                    serach: '_INPUT_',
                    searchPlaceholder: 'Search Records'
                },
                'ajax': {
                    'url': '<?php echo base_url() ?>Vault/getContacts',
                    'type': 'POST',
                    'data': function(data) {
                        data.patient_id = '<?php echo $patient_info['id'] ?>'
                        data.pt_emr_id = '<?php echo $patient_info['patient_id'] ?>'
                    }
                },
                'columns': [{
                        data: 'case_number',
                        render: function(data, type, row) {
                            return `<div idkey="${row.id}" assigned="${row.assign}" assigned_name="${row.assigned_name}" case_number="${row.case_number}" patient_id="${row.pt_emr_id}" status="${row.status}">
                                        <button type="button" class="btn btn-outline-success btn-floating historybtn" data-mdb-ripple-init data-mdb-ripple-color="dark">
                                            <i class='fa fa-comment'></i>
                                        </button>
                                    </div>`
                        }
                    },
                    {
                        data: 'case_number',
                        render: function(data, type, row) {
                            return row.case_number + '<?php echo $acronym ?>'
                        }
                    },
                    {
                        data: 'date',
                        render: function(data, type, row) {
                            var date = new Date(row.date)
                            return date.toLocaleDateString('en-US', {
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
                        data: 'reason'
                    },
                    {
                        data: 'subject'
                    },
                    {
                        data: 'assign',
                        render: function(data, type, row) {
                            return row.assign > 0 ? row.assigned_name : 'NoBody'
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
                        data: 'date',
                        render: function(data, type, row) {
                            return row.status == 3 ? getTimeDiff(row.sent, row.closed_date) : `<div class="px-5"><hr></div>`
                        }
                    },
                ],
                createdRow: function(row, data, dataIndex) {
                    if (data.pt_unread_count > 0) {
                        $(row).addClass('bg-light-primary')
                    }
                }
            })

            $('select[name="inbox_table_length"]').removeClass('custom-select')
            $('select[name="inbox_table_length"]').addClass('mb-0')
            $('select[name="inbox_table_length"]').css({
                'height': 'calc(2.25rem + 2px)'
            })
            $('input[type="search"]').css({
                'margin-bottom': '0px',
                'height': 'calc(2.25rem + 2px)'
            })

            $('#inbox_compose').click(() => {
                $('#vault_contact_modal').modal('show')
            })

            $('#btn_submit_contact').click(() => {
                var errors = ""
                var app_subject = document.getElementById("contact_subject")
                var app_message = document.getElementById("contact_message")
                if (app_subject.value == "") {
                    errors += '<?php echo $component_text['m_invalid_subject'] ?>'
                } else if (app_message.value == "") {
                    errors += '<?php echo $component_text['m_invalid_message'] ?>'
                }
                if (errors) {
                    Swal.fire({
                        title: '<?php echo $component_text['t_invalid_info'] ?>',
                        text: errors,
                        icon: 'warning',
                        confirmButtonText: 'Cool'
                    })
                    return false
                } else {
                    $("#contactsubmitbtn").prop("disabled", true)

                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url() ?>' + 'Vault/submitContact',
                        data: {
                            patient_id: '<?php echo $patient_info['id'] ?>',
                            patient_name: "<?php echo $patient_info['fname'] ?>" + ' ' + "<?php echo $patient_info['lname'] ?>",
                            patient_dob: '<?php echo $patient_info['dob'] ?>',
                            patient_phone: '<?php echo $patient_info['phone'] ?>',
                            patient_email: '<?php echo $patient_info['email'] ?>',
                            reason: $('input[name="contactreason"]:checked').val(),
                            subject: $('#contact_subject').val(),
                            message: $('#contact_message').val(),
                            best_time: $('#contact_time').val()
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data.status == 'success') {
                                Swal.fire({
                                    title: '<?php echo $component_text['c_case'] ?>' + ' # : ' + data.id + '<?php echo $acronym ?>',
                                    text: '<?php echo $component_text['t_pa_v_alert_success'] ?>',
                                    icon: 'success',
                                })
                                inbox_table.ajax.reload()
                            } else if (data.status == 'failed') {
                                Swal.fire({
                                    title: '<?php echo $component_text['c_error'] ?>',
                                    text: '<?php echo $component_text['t_pa_v_alert_failed'] ?>',
                                    icon: 'error',
                                })
                            } else {
                                Swal.fire({
                                    title: '<?php echo $component_text['c_error'] ?>',
                                    text: data.status,
                                    icon: 'error',
                                })
                            }
                            $("#contact_form")[0].reset()
                        }
                    })
                }
            })

            $(document).on('click', '.historybtn', function() {
                $('#message-modal-input').val('')

                $('#reply-contact_id').val($(this).parent().attr("idkey"))
                $('#reply-assigned').val($(this).parent().attr("assigned"))
                $('#reply-case_number').val($(this).parent().attr("case_number"))
                $('#reply-patient_id').val($(this).parent().attr('patient_id'))

                var id = $(this).parent().attr("idkey")
                var case_number = $(this).parent().attr("case_number")
                var assign = $(this).parent().attr("assigned")
                var patient_id = $(this).parent().attr("patient_id")
                $.ajax({
                    url: '<?php echo base_url() ?>' + 'Vault/viewCommunicationHistory',
                    method: "POST",
                    data: {
                        id: id,
                        case_number: case_number,
                        assign: assign,
                        patient_id: patient_id,
                        person_type: 'staff' // read message of staff
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

                        $('#modal_history_title').text(`<?php echo $component_text['c_item_contact_history'] ?> | <?php echo $component_text['c_item_case_num'] ?> : ${contact['case_number']}<?php echo $acronym; ?>`)
                        $('#modal_history_title_patient').text(`${contact['name']} | ${new Date(contact['dob']).toLocaleDateString()} | ${contact['patient_sex'] == 'Male' ? '<?php echo $component_text['c_item_male'] ?>' : '<?php echo $component_text['c_item_female'] ?>'} | <?php echo $component_text['c_item_age'] ?> : ${differenceInYears} | Lang : ${contact['patient_lang']}`)
                        $('#modal_history_title_status').html(`<div class="d-flex">
                                                                <div style="margin-right: 30px;"><?php echo $component_text['c_item_time_around'] ?> : ${contact['status'] == 3 ? getTimeDiff(contact['sent'], contact['closed_date']) : '--/--/----'}</div>
                                                                <span class = "${contact['status']==1?'text-danger':(contact['status']==2?'text-success':'text-primary')}">${contact['status']==1?"Open":(contact['status']==2?"In progress":"Closed")}</span>
                                                            </div>`)
                        var history = res.history
                        history.forEach(item => {
                            html += `<div class='w-100 mb-3'>
                                        <div class='d-flex ${item['person_type'] == 'patient' ? 'justify-content-end' : 'justify-content-start'}'>
                                            <p class='text-black-50' style='font-size: 12px;'>${item['person_type'] == 'patient' ? 'You' : contact['staff_name']}&nbsp;&nbsp;${new Date(item['created_time']).toLocaleString()}</p>
                                        </div>
                                        <div class='d-flex ${item['person_type'] == 'patient' ? 'justify-content-end' : 'justify-content-start'}' style='margin-top: -5px;'>
                                            <div class='${item['person_type'] == 'patient' ? 'bg-light' : 'bg-light-info'} rounded'>
                                                <div class='p-2 fs-6' style='word-break: break-word;'>${item['message']}</div>
                                            </div>
                                            <i class="mx-2 d-flex justify-content-center align-items-center ${item['seen'] == 0 ? 'fa fa-check' : 'far fa-eye'} text-success"></i>
                                        </div>
                                    </div>`
                        })

                        if (!history.length) {
                            html = `<div style="font-size: 32px; width: 100%; height: 120px; display: flex; justify-content: center; align-items: center;">
                                    <div style="text-align: center;">
                                        <i class="fa fa-folder-open"></i> <?php echo $component_text['c_item_no_history'] ?>
                                    </div>
                                </div>`
                        }

                        $('#contact_history_panel').html(html)

                        $("#history-modal-view").click()
                    }
                })
            })

            $('#message_modal_reply').click(function() {
                let message = $('#message-modal-input').val()
                let assign = $('#reply-assigned').val()
                let case_number = $('#reply-case_number').val()
                let patient_id = $('#reply-patient_id').val()

                if (!message) {
                    Swal.fire({
                        text: 'Please input your message',
                        icon: 'warning',
                        confirmButtonText: 'Close'
                    })
                } else {
                    var encrypt = new JSEncrypt()
                    encrypt.setPublicKey(`<?php echo $this->config->item('public_key') ?>`)
                    $.post({
                        url: '<?php echo base_url() ?>' + 'Vault/addMessage',
                        method: "POST",
                        data: {
                            contact_id: $('#reply-contact_id').val(),
                            message: encrypt.encrypt(message),
                            patient_id: encrypt.encrypt(patient_id),
                            assign: encrypt.encrypt(assign),
                            case_number: encrypt.encrypt(case_number),
                            person_type: encrypt.encrypt('patient')
                        },
                        dataType: "json",
                        success: function(res) {
                            if (res.status == "success") {
                                inbox_table.ajax.reload()
                                Swal.fire({
                                    text: 'Message has been sent successfully!',
                                    icon: 'success',
                                    confirmButtonText: 'Close'
                                })
                            } else {
                                Swal.fire({
                                    text: 'Failed in sending',
                                    icon: 'error',
                                    confirmButtonText: 'Close'
                                })
                            }
                        }
                    })
                }
            })

            window.addEventListener('resize', () => {
                $('#inbox_table').css({
                    'width': '100%',
                    'table-layout': 'auto'
                })
            })

            $("#view_appt_info").click(function() {
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() ?>' + 'Vault/getApptInfo',
                    data: {
                        patient_id: '<?php echo $patient_info['patient_id'] ?>'
                    },
                    dataType: 'json',
                    success: function(res) {
                        console.log(res)
                    }
                })

                $("#appt-info-modal-view").click()
            })
        })
    </script>
</body>

</html>