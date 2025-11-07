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
        <!-- Contact Title -->
        <div class="container my-4">
            <p class="h1"><?php echo $component_text['menu_letters']; ?></p>
            <p class="lead"><?php echo $component_text['t_letter_desc']; ?></p>
        </div>
        <!-- Letters -->
        <div class="container mb-4">
            <div class="row">
                <?php for ($i = 0; $i < count($letters); $i++): ?>
                    <div class="col-md-4 col-lg-3 p-2">
                        <div class="card">
                            <div class="w-100">
                                <div class="text-center mt-4">
                                    <i class="fa fa-<?php echo $letters[$i]['icon']; ?>" style="font-size: 120px;"></i>
                                </div>
                                <div class="d-flex justify-content-end align-items-center h-25 px-3">
                                    <?php if ($letters[$i]["cost"] > 0): ?>
                                        <span class="badge <?php if ($letters[$i]["status"] == 0) echo "bg-secondary"; else echo "badge-danger"; ?> fs-6">$ <?php echo $letters[$i]["cost"]; ?></span>
                                    <?php else: ?>
                                        <span class="badge <?php if ($letters[$i]["status"] == 0) echo "bg-secondary"; else echo "badge-success"; ?> fs-6"><?php echo $component_text["c_eligible_health_plan"]; ?></span>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $letters[$i]["title"]; ?></h5>
                                <p class="card-text"><?php echo $letters[$i]["short_desc"]; ?></p>
                            </div>
                            <div class="card-footer d-flex justify-content-around align-items-center">
                                <button data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#payment-modal" class="d-none" id="show-letter-payment-modal-btn"></button>
                                <button data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#letter_request_modal" class="d-none" id="show-letter-modal-btn"></button>
                                <a href="javascript:;" class="text-primary letter_request fs-5" data-id="<?php echo $letters[$i]['id']; ?>" data-title="<?php echo $letters[$i]['title']; ?>"><?php echo $component_text['t_request'] ?></a>
                                <a href="<?php echo base_url(); ?>Letters/detail?s=<?php echo $letters[$i]['id']; ?>" class="fs-5 text-info" target="_blank"><?php echo $component_text['btn_read_more']; ?></a>
                            </div>
                        </div>
                    </div>
                <?php endfor ?>
            </div>
        </div>
    </main>
    <!-- Letter Request Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="letter_request_modal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <input type="hidden" id="letter_name" />
                <div class="modal-header">
                    <p class="h4 m-0 mx-1" id="letter_title"><?php echo $component_text['t_request_letter']; ?></p>
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
                            <div class="col-md-12 d-none" id="letter_opt_moreinfo">
                                <p class="fs-6"><?php echo $component_text['t_opt_in_out_footer']; ?></p>
                            </div>
                            <div class="col-md-12">
                                <a href="#" id="letter_opt_more_info_btn"><?php echo $component_text['t_opt_more_info']; ?> >></a>
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
                    <button type="button" class="btn btn-primary" id="letter_request_modal_send" data-mdb-ripple-init><?php echo $component_text['t_request'] ?></button>
                    <button type="button" class="btn btn-danger" id="letter_request_modal_close" data-mdb-ripple-init data-mdb-dismiss="modal"><?php echo $component_text['c_item_close'] ?></button>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include('footer.php'); ?>
</body>

<script>
    const lang = "<?php echo $this->session->userdata("language") ?>"
    $(document).ready(function() {

        $(document).on("click", ".letter_request", function() {
            const id = $(this).attr("data-id")
            const title = $(this).attr("data-title")
            $.ajax({
                url: '<?php echo base_url(); ?>' + 'Letters/getCost',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    const cost = parseFloat(res.cost)
                    if (cost > 0) {
                        $("#payment-modal-title").text(title + ` - $${cost}`)

                        $("#show-letter-payment-modal-btn").click()

                        // initialize payment form
                        $("#payment-category").val("letter")
                        $("#payment-category-id").val(id)

                        payment_items = [{
                            id: title,
                            amount: cost * 100.0
                        }]
                        initialize()
                    } else {
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

                        $("#letter_name").val(title)
                        $("#letter_title").text(`<?php echo $component_text['t_request_letter']; ?> - ${title}`)

                        $("#show-letter-modal-btn").click()
                    }
                }
            })
        })

        $("#letter_request_modal_send").click(function() {
            const entry = {
                fname: $("#fname").val(),
                lname: $("#lname").val(),
                dob: $("#dob").val(),
                email: $("#email").val(),
                phone: $("#phone").val(),
                subject: "letter Category",
                contact_reason: $("#letter_name").val(),
                message: $("#message").val(),
                captcha: $("#captcha").val(),
                opt_status: $('input[name="opt_status"]:checked').val()
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

                            $("#letter_request_modal_close").click()
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

        $('#letters_opt_more_info_btn').click(function(e) {
            e.preventDefault();
            if ($('#letters_opt_moreinfo').hasClass('d-none')) {
                $('#letters_opt_moreinfo').removeClass('d-none');
                $('#letters_opt_more_info_btn').text("<?php echo '<< ' . $component_text['t_opt_less_info']; ?>");
            } else {
                $('#letters_opt_moreinfo').addClass('d-none');
                $('#letters_opt_more_info_btn').text("<?php echo $component_text['t_opt_more_info'] . ' >>'; ?>");
            }
        })
    })
</script>

</html>