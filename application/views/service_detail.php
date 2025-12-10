<!DOCTYPE html>
<html lang="en">

<?php include('includes.php'); ?>

<body>
    <!-- Pre Loader -->
    <div id="loading-overlay">
        <div class="loader"></div>
    </div>
    <!-- Header -->
    <?php include('header.php') ?>
    <!-- Main -->
    <main>
        <!-- Service Detail title -->
        <div class="container my-5">
            <p class="h1"><?php echo $service['title']; ?></p>
        </div>
        <div class="container mb-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="w-100 bg-image hover-zoom mb-3 mb-md-0">
                        <img src="<?php echo base_url(); ?>assets/service/image/<?php echo $service['image']; ?>" class="w-100 rounded rounded-5" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="w-100 d-flex justify-content-center justify-content-md-start align-items-center flex-wrap gap-3 mb-3">
                        <?php if ($service["cost"] == 0): ?>
                            <div class="w-100 fs-2"><?php echo $component_text["c_eligible_health_plan"]; ?></div>
                        <?php else: ?>
                            <div class="w-100 fs-2">$ <?php echo $service['cost']; ?></div>
                        <?php endif ?>
                        <button data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#payment-modal" class="d-none" id="show-service-payment-modal-btn"></button>
                        <button data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#service_request_modal" class="d-none" id="show-service-modal-btn"></button>
                        <button data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#service_friend_modal" class="d-none" id="show-service-friend-modal-btn"></button>
                        <button id="request_service" type="button" class="btn btn-lg btn-danger" data-mdb-ripple-init data-title="<?php echo $service['title']; ?>"><?php echo $component_text['c_service_request']; ?></button>
                        <button id="send_friend" type="button" class="btn btn-lg btn-info" data-mdb-ripple-init><?php echo $component_text['c_service_send_friend']; ?></button>
                    </div>
                    <div class="d-flex justify-content-center justify-content-md-start align-items-center flex-wrap">
                        <img src="data:image/png;base64,<?php echo $qrcode; ?>" style="margin-left: -5px;" />
                    </div>
                </div>
            </div>
        </div>
        <!-- Service Details -->
        <div class="container mb-5">
            <div class="mb-3 service-desc text-black"><?php echo $service['short_desc'] ?></div>
            <div class="mb-3 service-desc text-black"><?php echo $service['long_desc'] ?></div>
        </div>
    </main>
    <!-- Service Request Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="service_request_modal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <input type="hidden" id="service_name" />
                <div class="modal-header">
                    <div>
                        <p class="h4 m-0 mx-1 mb-1" id="service_title"><?php echo $component_text['t_request_service']; ?></p>
                        <div id="service_request_price"></div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="fname" class="form-control form-control-lg" required />
                                <label class="form-label" for="fname"><?php echo $component_text['placeholder_first_name']; ?></label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="lname" class="form-control form-control-lg" required />
                                <label class="form-label" for="lname"><?php echo $component_text['placeholder_last_name']; ?></label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="date" id="dob" class="form-control form-control-lg" required />
                                <label class="form-label" for="dob"><?php echo $component_text['placeholder_dob']; ?></label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="email" class="form-control form-control-lg" required />
                                <label class="form-label" for="email"><?php echo $component_text['placeholder_email']; ?></label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="phone" class="form-control form-control-lg" required />
                                <label class="form-label" for="phone"><?php echo $component_text['placeholder_phone']; ?></label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-outline" data-mdb-input-init>
                                <textarea class="form-control" id="message" rows="5"></textarea>
                                <label class="form-label" for="message"><?php echo $component_text['placeholder_message']; ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <hr class="my-3" />
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <p class="fs-6 my-1"><?php echo $component_text['t_opt_in_out_header']; ?></p>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="opt_status" id="opt_in" value="1" checked />
                                    <label class="form-check-label" for="opt_in"> <?php echo $component_text['t_opt_in_out_in'] ?> </label>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="opt_status" id="opt_out" value="0" />
                                    <label class="form-check-label" for="opt_out"> <?php echo $component_text['t_opt_in_out_out'] ?> </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p class="fs-6 m-0"><?php echo $component_text['t_opt_in_out_more']; ?></p>
                            </div>
                            <div class="col-md-12 d-none" id="service_opt_moreinfo">
                                <p class="fs-6"><?php echo $component_text['t_opt_in_out_footer']; ?></p>
                            </div>
                            <div class="col-md-12">
                                <a href="#" id="service_opt_more_info_btn"><?php echo $component_text['t_opt_more_info']; ?> >></a>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <div class="row justify-content-start align-items-center">
                            <div class="col-md-4">
                                <div class="d-flex justify-content-between align-items-center gap-1">
                                    <img id="captcha_image" src="<?php echo base_url() . $captcha_image ?>" alt="Captcha Image" class="w-100 h-100" />
                                    <i id="captcha_change" class="fa fa-lg fa-rotate-right fs-2 text-primary" style="cursor: pointer;"></i>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-outline" data-mdb-input-init>
                                    <input type="text" id="captcha" class="form-control form-control-lg" />
                                    <label class="form-label" for="captcha"><?php echo $component_text['placeholder_captcha']; ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="service_request_modal_send" data-mdb-ripple-init><?php echo $component_text['t_request'] ?></button>
                    <button type="button" class="btn btn-danger" id="service_request_modal_close" data-mdb-ripple-init data-mdb-dismiss="modal"><?php echo $component_text['c_item_close'] ?></button>
                </div>
            </div>
        </div>
    </div>
    <!-- Sending Friend Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="service_friend_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <input type="hidden" id="friend_service_name" />
                <div class="modal-header py-3">
                    <h3 class="my-2" style="font-size: 16px;" id="friend_service_title"><?php echo $component_text['t_request_service'] ?></h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="friend_name" class="form-control form-control-lg" required />
                                <label class="form-label" for="friend_name"><?php echo $component_text['placeholder_your_name']; ?></label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="friend_email" class="form-control form-control-lg" required />
                                <label class="form-label" for="friend_email"><?php echo $component_text['placeholder_email']; ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between align-items-center gap-1">
                                <img id="friend_captcha_image" src="<?php echo base_url() . $captcha_image ?>" alt="Captcha Image" class="w-100 h-100" />
                                <i id="friend_captcha_change" class="fa fa-lg fa-rotate-right fs-2 text-primary" style="cursor: pointer;"></i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="friend_captcha" class="form-control form-control-lg" />
                                <label class="form-label" for="friend_captcha"><?php echo $component_text['placeholder_captcha']; ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="service_friend_modal_send" data-mdb-ripple-init><?php echo $component_text['t_request'] ?></button>
                    <button type="button" class="btn btn-danger" id="service_friend_modal_close" data-mdb-ripple-init data-mdb-dismiss="modal"><?php echo $component_text['c_item_close'] ?></button>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include('footer.php'); ?>
</body>

<script>
    const id = "<?php echo $service['id']; ?>"
    $(document).ready(function() {
        // request service
        $("#request_service").click(function() {
            const title = $(this).attr("data-title")
            $.ajax({
                url: '<?php echo base_url(); ?>' + 'Services/getCost',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: "json",
                success: function(res) {
                    const cost = parseFloat(res.cost)
                    if (cost > 0) { // payment modal
                        $("#payment-modal-title").text(title + ` - $${cost}`)
                        $("#service_request_price").html(`<span class="badge badge-success fs-4">$ <?php echo $services[$i]["cost"]; ?></span>`)

                        $("#show-service-payment-modal-btn").click()

                        // initialize payment form
                        $("#payment-category").val("service")
                        $("#payment-category-id").val(id)
                        
                        payment_items = [{
                            id: title,
                            amount: cost * 100.0
                        }]
                        initialize()
                    } else { // request modal
                        $("#service_request_price").html(`<span class="badge badge-success fs-6"><?php echo $component_text["c_eligible_health_plan"]; ?></span>`)
                        // if login
                        const isLogged = "<?php echo $this->session->userdata('patient_id') > 0 ?>"
                        if (isLogged == 1) {
                            $("#fname").val("<?php echo $patient_info['fname']; ?>")
                            $("#lname").val("<?php echo $patient_info['lname']; ?>")
                            $("#phone").val("<?php echo $patient_info['phone']; ?>")
                            $("#dob").val("<?php echo $patient_info['dob']; ?>")
                            $("#email").val("<?php echo $patient_info['email']; ?>")
                        } else {
                            $("#fname").val("")
                            $("#lname").val("")
                            $("#dob").val("")
                            $("#email").val("")
                            $("#phone").val("")
                        }
                        $("#message").val("")
                        $("#captcha").val("")

                        $("#service_name").val(title)
                        $("#service_title").text(`<?php echo $component_text['t_request_service']; ?> - ${title}`)

                        $("#show-service-modal-btn").click()
                    }
                }
            })
        })

        $("#service_request_modal_send").click(function() {
            const entry = {
                fname: $("#fname").val(),
                lname: $("#lname").val(),
                dob: $("#dob").val(),
                email: $("#email").val(),
                phone: $("#phone").val(),
                subject: "Service Category",
                contact_reason: $("#service_name").val(),
                message: $("#message").val(),
                captcha: $("#captcha").val(),
                opt_status: $('input[name="service_opt_status"]:checked').val()
            }

            var errors = "";
            if (entry.fname == "" || entry.lname == "") {
                errors += '<?php echo $component_text['m_invalid_name'] ?>';
            } else if (entry.dob == "") {
                errors += '<?php echo $component_text['m_invalid_dob'] ?>';
            } else if (entry.email == "") {
                errors += '<?php echo $component_text['m_invalid_email'] ?>';
            } else if (entry.phone == "") {
                errors += '<?php echo $component_text['m_invalid_phone'] ?>';
            } else if (entry.subject == "") {
                errors += '<?php echo $component_text['m_invalid_subject'] ?>';
            } else if (entry.message == "") {
                errors += '<?php echo $component_text['m_invalid_message'] ?>';
            } else if (entry.captcha == "") {
                errors += '<?php echo $component_text['m_invalid_captcha'] ?>';
            }
            if (errors) {
                Swal.fire({
                    title: '<?php echo $component_text['t_invalid_info'] ?>',
                    text: errors,
                    icon: 'warning',
                    confirmButtonText: 'Cool'
                })
                return false;
            } else {
                const encrypt = new JSEncrypt();
                encrypt.setPublicKey(`<?php echo $this->config->item('public_key') ?>`);

                $.post({
                    method: "POST",
                    url: '<?php echo base_url() ?>' + 'Home/submit',
                    data: {
                        contact_name: encrypt.encrypt(entry.fname + " " + entry.lname),
                        contact_email: encrypt.encrypt(entry.email),
                        contact_cel: encrypt.encrypt(entry.phone),
                        contact_dob: encrypt.encrypt(entry.dob),
                        contact_captcha: encrypt.encrypt(entry.captcha),
                        contact_lang: `<?php echo $this->session->userdata('language'); ?>`,
                        contact_subject: entry.subject,
                        contact_message: entry.message,
                        contact_time: "Anytime",
                        opt_status: entry.opt_status,
                        contactpttype: "",
                        contactusertype: "Patient",
                        contactreason: entry.contact_reason
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.status == 'success') {
                            Swal.fire({
                                title: '<?php echo $component_text['c_case'] ?>' + '#: ' + data.id + '<?php echo $acronym ?>',
                                text: '<?php echo $component_text['t_contact_result_success'] ?>',
                                icon: 'success',
                            });

                            $("#service_request_modal_close").click()
                        } else {
                            Swal.fire({
                                title: '<?php echo $component_text['c_error'] ?>',
                                text: data.status,
                                icon: 'error',
                            });
                            $('#captcha_image').attr('src', '<?php echo base_url() ?>' + data.captcha)
                        }
                    }
                });
            }
        })

        $("#captcha_change").click(function() {
            $.post({
                url: '<?php echo base_url() ?>Home/changeCaptchaImageForFooter',
                method: 'POST',
                data: {},
                dataType: 'text',
                success: function(res) {
                    $('#captcha_image').attr('src', '<?php echo base_url() ?>' + res)
                }
            })
        })

        // send friend
        $("#send_friend").click(function() {
            $("#friend_name").val("")
            $("#friend_email").val("")
            $("#friend_captcha").val("")

            $("#friend_service_title").text(`<?php echo $component_text['c_service_send_friend']; ?> - <?php echo $service['title'] ?>`)

            $("#show-service-friend-modal-btn").click()
        })

        $("#friend_captcha_change").click(function() {
            $.post({
                url: '<?php echo base_url() ?>Home/changeCaptchaImageForFooter',
                method: 'POST',
                data: {},
                dataType: 'text',
                success: function(res) {
                    $('#friend_captcha_image').attr('src', '<?php echo base_url() ?>' + res)
                }
            })
        })

        $("#service_friend_modal_send").click(function() {
            const entry = {
                name: $("#friend_name").val(),
                email: $("#friend_email").val(),
                captcha: $("#friend_captcha").val(),
                id: id
            }

            var errors = "";
            if (entry.name == "") {
                errors += '<?php echo $component_text['m_invalid_name'] ?>';
            } else if (entry.email == "") {
                errors += '<?php echo $component_text['m_invalid_email'] ?>';
            } else if (entry.captcha == "") {
                errors += '<?php echo $component_text['m_invalid_captcha'] ?>';
            }
            if (errors) {
                Swal.fire({
                    title: '<?php echo $component_text['t_invalid_info'] ?>',
                    text: errors,
                    icon: 'warning',
                    confirmButtonText: 'Cool'
                })
                return false;
            } else {
                const encrypt = new JSEncrypt();
                encrypt.setPublicKey(`<?php echo $this->config->item('public_key') ?>`);

                $.post({
                    method: "POST",
                    url: '<?php echo base_url() ?>' + 'Services/sendEmailToFriend',
                    data: {
                        name: encrypt.encrypt(entry.name),
                        email: encrypt.encrypt(entry.email),
                        captcha: encrypt.encrypt(entry.captcha),
                        id: id,
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.status == 'success') {
                            Swal.fire({
                                title: '<?php echo $component_text['c_success'] ?>',
                                icon: 'success',
                            });

                            $("#service_friend_modal_close").click()

                            $('#friend_captcha_image').attr('src', '<?php echo base_url() ?>' + data.captcha)
                        } else {
                            Swal.fire({
                                title: '<?php echo $component_text['c_error'] ?>',
                                icon: 'error',
                            });
                            $('#friend_captcha_image').attr('src', '<?php echo base_url() ?>' + data.captcha)
                        }
                    }
                });
            }
        })

        $('#service_opt_more_info_btn').click(function(e) {
            e.preventDefault();
            if ($('#service_opt_moreinfo').hasClass('d-none')) {
                $('#service_opt_moreinfo').removeClass('d-none');
                $('#service_opt_more_info_btn').text("<?php echo '<< ' . $component_text['t_opt_less_info']; ?>");
            } else {
                $('#service_opt_moreinfo').addClass('d-none');
                $('#service_opt_more_info_btn').text("<?php echo $component_text['t_opt_more_info'] . ' >>'; ?>");
            }
        })
    })
</script>

</html>