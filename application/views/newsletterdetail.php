<!DOCTYPE html>
<html lang="en">

<?php include('includes.php'); ?>

<style>
    .author {
        font-weight: 500;
        font-size: 14px;
        line-height: 1.313rem;
        color: rgb(102, 112, 133);
        margin-bottom: 0;
    }
    .desc {
        font-weight: 400;
        font-size: 16px;
        line-height: 1.313rem;
        margin-bottom: 1rem;
    }
</style>

<body>
    <!-- Pre Loader -->
    <div id="loading-overlay">
        <div class="loader"></div>
    </div>
    <!-- Header -->
    <?php include('header.php') ?>
    <!-- Main -->
    <main>
        <?php if (isset($result["img"])): ?>
            <div id="header-baner" style="background-image: url('<?php echo base_url() ?>assets/images/newsimg/<?php echo $result['img'] ?>'); height: 450px;">
            </div>
        <?php endif ?>
        <!-- Main Content -->
        <div class="container mt-5 mb-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-start align-items-center gap-4 flex-wrap">
                        <span style="font-size:xx-large;"><?php echo $result['header'] ?></span>
                        <?php if ($result["show_contact"] == 1): ?>
                            <span style="font-size:x-large;">&nbsp;&nbsp;|&nbsp;&nbsp;</span><a style="font-size:x-large;" href="javascript:;" id="show-contact-form"><?php echo $component_text["menu_contact"]; ?></a>
                        <?php endif ?>
                    </div>
                </div>
                <?php if ($result["show_contact"] == 1): ?>
                <div class="col-md-12">
                     <div id="contact_form" style="border-bottom: 1px;" class="d-none">
                        <p class="error" id="error" style="display:none;"></p>
                        <p class="success" id="success" style="display:none;"></p>
                        <form class="content-form wow fadeInUp" id="appointment_form" action="#" method="post" accept-charset="utf-8" novalidate="novalidate" style="visibility: visible; animation-name: fadeInUp;">
                            <div style="text-align: left;">
                                <div style="font-size:18px; color:black; margin:10px;"><?php echo $component_text['t_contact_user_desc'] ?> (*):</div>
                                <input type="radio" value="1" class="contactusertype" name="contactusertype" checked><span style="font-size:18px; color:black; "> <?php echo $component_text['t_contact_option_patient'] ?></span>
                                <input type="radio" value="2" class="contactusertype" name="contactusertype" class="ml-2"><span style="font-size:18px; color:black; "> <?php echo $component_text['t_contact_option_business'] ?></span><br>
                                <input type="radio" value="1" class="contactpttype-patient" name="contactpttype" checked><span class="contactpttype-patient" style="font-size:18px; color:black; "> <?php echo $component_text['t_contact_option_existing'] ?></span>
                                <input type="radio" value="2" class="contactpttype-patient" name="contactpttype" class="ml-2"><span class="contactpttype-patient" style="font-size:18px; color:black; "> <?php echo $component_text['t_contact_option_new'] ?></span>
                                <input type="radio" value="3" class="contactpttype-institution" name="contactpttype"><span class="contactpttype-institution" style="font-size:18px; color:black; "> <?php echo $component_text['t_contact_option_patient'] ?></span>
                                <input type="radio" value="4" class="contactpttype-institution" name="contactpttype" class="ml-2"><span class="contactpttype-institution" style="font-size:18px; color:black; "> <?php echo $component_text['t_contact_option_generalmsg'] ?></span><br>

                                <div style="font-size:18px; color:black; margin:10px;"><?php echo $component_text['t_contact_reason'] ?> (*) :</div>
                                <input type="radio" value="Appointment Request" name="contactreason" checked><span style="font-size:18px; color:black; "> <?php echo $component_text['t_contact_reason_1'] ?></span><br>
                                <input type="radio" value="Letter Request" name="contactreason"><span style="font-size:18px; color:black; "> <?php echo $component_text['t_contact_reason_2'] ?></span><br>
                                <input type="radio" value="Prescription Refill Request" name="contactreason"><span style="font-size:18px; color:black; "> <?php echo $component_text['t_contact_reason_3'] ?></span><br>
                                <input type="radio" value="Referral Request" name="contactreason"><span style="font-size:18px; color:black; "> <?php echo $component_text['t_contact_reason_4'] ?></span><br>
                                <input type="radio" value="Test Results Request" name="contactreason"><span style="font-size:18px; color:black; "> <?php echo $component_text['t_contact_reason_5'] ?></span><br>
                                <input type="radio" value="General Message" name="contactreason"><span style="font-size:18px; color:black; "> <?php echo $component_text['t_contact_reason_6'] ?></span><br><br>
                            </div>
                            <div class="row" id="contact_pt_info">
                                <div class="col-lg-3 col-sm-12">
                                    <input class="input-contact" id="contact_name" type="text" name="contact_name" placeholder="<?php echo $component_text['placeholder_your_name']; ?>" required>
                                </div>
                                <div class="col-lg-3 col-sm-12">
                                    <input class="input-contact" id="contact_email" type="text" name="contact_email" placeholder="<?php echo $component_text['placeholder_email_address']; ?>" required>
                                </div>
                                <div class="col-lg-3 col-sm-12">
                                    <input class="input-contact" id="contact_cel" type="text" name="contact_cel" placeholder="<?php echo $component_text['placeholder_phone_number']; ?>" required>
                                </div>
                                <div class="col-lg-3 col-sm-12">
                                    <input class="input-contact" id="contact_dob" type="date" name="contact_dob" placeholder="<?php echo $component_text['placeholder_dob']; ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <input class="input-contact" id="contact_subject" name="contact_subject" type="text" placeholder="<?php echo $component_text['placeholder_subject']; ?>">
                                </div>
                                <div class="col-12">
                                    <textarea class="input-contact" id="contact_message" name="contact_message" placeholder="<?php echo $component_text['placeholder_message']; ?>" style="height:160px;"></textarea>
                                </div>
                                <div class="col-12">
                                    <input class="input-contact" id="contact_time" name="contact_time" type="text" placeholder="<?php echo $component_text['placeholder_besttime']; ?>">
                                </div>
                                <div class="col-12">
                                    <p class="my-1 text-black"><?php echo $component_text['t_opt_in_out_header']; ?></p>
                                </div>
                                <div class="col-12">
                                    <div class="my-1">
                                        <input type="radio" name="opt_status" id="home_opt_in" value="1" checked />
                                        <label for="home_opt_in" class="text-black"><?php echo $component_text['t_opt_in_out_in']; ?></label>
                                    </div>
                                    <div class="my-1">
                                        <input type="radio" name="opt_status" id="home_opt_out" value="0" />
                                        <label for="home_opt_out" class="text-black"><?php echo $component_text['t_opt_in_out_out']; ?></label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p class="my-1 text-black pb-0"><?php echo $component_text['t_opt_in_out_footer']; ?></p>
                                </div>
                                <div class="col-12 d-none" id="home_opt_moreinfo">
                                    <p class="text-black pt-0"><?php echo $component_text['t_opt_in_out_more']; ?></p>
                                </div>
                                <div class="col-12 mb-1">
                                    <a href="#" id="home_opt_more_info_btn" class="text-black"><?php echo $component_text['t_opt_more_info']; ?> >></a>
                                </div>
                                <div class="col-5"></div>
                                <div class="col-7 mb-3">
                                    <div class="row justify-content-center align-items-center gap-2">
                                        <div class="col-4">
                                            <img id="contact_captcha_image" src="<?php echo base_url() . $captcha_image ?>" alt="Captcha Image" class="w-100" />
                                        </div>
                                        <div class="col-1" style="padding: 0px; font-size: 32px;">
                                            <i id="captcha_change" class="fa fa-lg fa-rotate-right text-primary" style="transform:translateY(50%); cursor: pointer;"></i>
                                        </div>
                                        <div class="col-7">
                                            <input tabindex="3" id="contact_captcha" name="captcha" value="" class="input-contact mb-0 pb-0" type="text" placeholder="<?php echo $component_text['placeholder_captcha']; ?>" autocomplete="new-captcha">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="contact_lang" id="contact_lang">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="themesflat-button bg-accent btn-submit" onClick="sendContactform();"><span><?php echo $component_text['btn_send']; ?></span></button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php endif ?>
            </div>
        </div>
        <div class="welcome-three mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="desc"><?php echo $result['desc'] ?></div>
                        <div class="author"><?php echo $result['author']; ?> - <?php echo $result['published']; ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-100 d-flex justify-content-center align-items-center mt-3 mb-5">
            <img src="data:image/png;base64,<?php echo $qrcode; ?>" width="320px" height="320px" />
        </div>
    </main>
    <!-- Footer -->
    <?php include('footer.php'); ?>
</body>

<script>
    $(document).ready(function () {
        const isPt = parseInt('<?php echo $patient_info['id']; ?>');
        if (isPt > 0) {
            $("#contact_pt_info").addClass("d-none");
        } else {
            $("#contact_pt_info").removeClass("d-none");
        }

        $('#contact_captcha_image').height($('#contact_captcha').outerHeight())

        $('.contactpttype-institution').addClass('d-none')
        $('.contactusertype').click((e) => {
            if (e.target.value == 1) {
                $('.contactpttype-patient').removeClass('d-none')
                $('.contactpttype-institution').addClass('d-none')
            } else if (e.target.value == 2) {
                $('.contactpttype-patient').addClass('d-none')
                $('.contactpttype-institution').removeClass('d-none')
            }
        })

        $("#show-contact-form").click(function() {
            if ($("#contact_form").hasClass("d-none")) {
                $("#contact_form").removeClass("d-none")
            } else {
                $("#contact_form").addClass("d-none")
            }
        });

        $('#home_opt_more_info_btn').click(function(e) {
            e.preventDefault();
            if ($('#home_opt_moreinfo').hasClass('d-none')) {
                $('#home_opt_moreinfo').removeClass('d-none');
                $('#home_opt_more_info_btn').text("<?php echo '<< ' . $component_text['t_opt_less_info']; ?>");
            } else {
                $('#home_opt_moreinfo').addClass('d-none');
                $('#home_opt_more_info_btn').text("<?php echo $component_text['t_opt_more_info'] . ' >>'; ?>");
            }
        })

        $('#captcha_change').click(() => {
            $.post({
                url: '<?php echo base_url() ?>PtLogin/changeCaptchaImage',
                method: 'POST',
                data: {},
                dataType: 'text',
                success: function(res) {
                    $('#contact_captcha_image').attr('src', '<?php echo base_url() ?>' + res)
                }
            })
        })
    })
</script>

</html>
