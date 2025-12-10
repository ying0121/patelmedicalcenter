<!DOCTYPE html>
<html lang="en">

<?php include('includes.php'); ?>

<body>
    <!-- Preloader -->
    <div id="loading-overlay">
        <div class="loader"></div>
    </div>
    <!-- Header -->
    <?php include('header.php') ?>
    <!-- Main -->
    <main>
        <input type="hidden" name="contact_lang" id="contact_lang">
        <!-- Contact Title -->
        <div class="container my-4">
            <p class="h1"><?php echo $component_text['menu_contact']; ?></p>
            <?php if ($area_toggle['clinic_desc'] == 1): ?>
                <p class="lead"><?php echo $component_text['t_contact_desc']; ?></p>
            <?php endif ?>
        </div>
        <!-- Contact Container -->
        <div class="container mb-5">
            <div class="w-100 p-4 border porder-1 border-info rounded rounded-3 mb-4">
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="h5 text-info"><?php echo $component_text['t_contact_user_desc'] ?> (*):</p>
                            </div>
                            <div class="col-md-6 contactusertype mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="contactusertype" id="contactusertype" value="1" checked />
                                    <label class="form-check-label" for="contactusertype"> <?php echo $component_text['t_contact_option_patient'] ?> </label>
                                </div>
                            </div>
                            <div class="col-md-6 contactusertype mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="contactusertype" id="contactusertype1" value="2" />
                                    <label class="form-check-label" for="contactusertype1"> <?php echo $component_text['t_contact_option_business'] ?> </label>
                                </div>
                            </div>
                            <div class="col-md-6 contactpttype-patient mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="contactpttype" id="contactpttype" value="1" checked />
                                    <label class="form-check-label" for="contactpttype"> <?php echo $component_text['t_contact_option_existing'] ?> </label>
                                </div>
                            </div>
                            <div class="col-md-6 contactpttype-patient mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="contactpttype" id="contactpttype1" value="2" checked />
                                    <label class="form-check-label" for="contactpttype1"> <?php echo $component_text['t_contact_option_new'] ?> </label>
                                </div>
                            </div>
                            <div class="col-md-6 contactpttype-institution mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="contactpttype" id="contactpttype2" value="3" />
                                    <label class="form-check-label" for="contactpttype2"> <?php echo $component_text['t_contact_option_patient'] ?> </label>
                                </div>
                            </div>
                            <div class="col-md-6 contactpttype-institution mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="contactpttype" id="contactpttype3" value="4" />
                                    <label class="form-check-label" for="contactpttype3"> <?php echo $component_text['t_contact_option_generalmsg'] ?> </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="h5 text-info"><?php echo $component_text['t_contact_reason'] ?> (*):</p>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="contactreason" id="contactreason1" value="Appointment Request" checked />
                                    <label class="form-check-label" for="contactreason1"> <?php echo $component_text['t_contact_reason_1'] ?> </label>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="contactreason" id="contactreason2" value="Letter Request" />
                                    <label class="form-check-label" for="contactreason2"> <?php echo $component_text['t_contact_reason_2'] ?> </label>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="contactreason" id="contactreason3" value="Prescription Refill Request" />
                                    <label class="form-check-label" for="contactreason3"> <?php echo $component_text['t_contact_reason_3'] ?> </label>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="contactreason" id="contactreason4" value="Referral Request" />
                                    <label class="form-check-label" for="contactreason4"> <?php echo $component_text['t_contact_reason_4'] ?> </label>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="contactreason" id="contactreason5" value="Test Results Request" />
                                    <label class="form-check-label" for="contactreason5"> <?php echo $component_text['t_contact_reason_5'] ?> </label>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="contactreason" id="contactreason6" value="General Message" />
                                    <label class="form-check-label" for="contactreason6"> <?php echo $component_text['t_contact_reason_6'] ?> </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row" id="contact_pt_info">
                            <div class="col-md-6 col-lg-3 mb-4">
                                <div class="form-outline" data-mdb-input-init>
                                    <input type="text" id="contact_name" class="form-control form-control-lg" name="contact_name" required />
                                    <label class="form-label" for="contact_name"><?php echo $component_text['placeholder_your_name']; ?></label>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 mb-4">
                                <div class="form-outline" data-mdb-input-init>
                                    <input type="text" id="contact_email" class="form-control form-control-lg" name="contact_email" required />
                                    <label class="form-label" for="contact_email"><?php echo $component_text['placeholder_email_address']; ?></label>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 mb-4">
                                <div class="form-outline" data-mdb-input-init>
                                    <input type="text" id="contact_cel" class="form-control form-control-lg" name="contact_cel" required />
                                    <label class="form-label" for="contact_cel"><?php echo $component_text['placeholder_phone_number']; ?></label>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 mb-4">
                                <div class="form-outline" data-mdb-input-init>
                                    <input type="date" id="contact_dob" class="form-control form-control-lg" name="contact_dob" required />
                                    <label class="form-label" for="contact_dob"><?php echo $component_text['placeholder_dob']; ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="form-outline" data-mdb-input-init>
                                    <input type="text" id="contact_subject" class="form-control form-control-lg" name="contact_subject" />
                                    <label class="form-label" for="contact_subject"><?php echo $component_text['placeholder_subject']; ?></label>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="form-outline" data-mdb-input-init>
                                    <textarea class="form-control" id="contact_message" rows="6" name="contact_message"></textarea>
                                    <label class="form-label" for="contact_message"><?php echo $component_text['placeholder_message']; ?></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-outline" data-mdb-input-init>
                                    <input type="text" id="contact_time" class="form-control form-control-lg" name="contact_time" />
                                    <label class="form-label" for="contact_time"><?php echo $component_text['placeholder_besttime']; ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
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
                <div class="col-md-12 mb-3">
                    <a href="#" id="home_opt_more_info_btn"><?php echo $component_text['t_opt_more_info']; ?> >></a>
                </div>
            </div>
            <div class="d-sm-flex justify-content-between align-items-center mb-3 gap-3">
                <div class="d-flex justify-content-between align-items-center gap-2 my-1">
                    <img id="contact_captcha_image" src="<?php echo base_url() . $captcha_image ?>" alt="Captcha Image" width="250px" />
                    <i id="captcha_change" class="fa fa-lg fa-rotate-right fs-1 text-primary" style="cursor: pointer;"></i>
                </div>
                <div class="form-outline my-1" data-mdb-input-init>
                    <input type="text" id="contact_captcha" class="form-control form-control-lg" name="captcha" />
                    <label class="form-label" for="contact_captcha"><?php echo $component_text['placeholder_captcha']; ?></label>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="button" class="btn btn-lg btn-danger" type="button" onClick="sendContactform();" data-mdb-ripple-init id="contact-submit-btn">
                    <i class="fas fa-paper-plane me-2"></i>
                    <?php echo $component_text['btn_send'] ?>
                </button>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <?php include('footer.php'); ?>
</body>

<script>
    $(document).ready(function() {
        const isPt = parseInt('<?php echo $patient_info['id']; ?>');
        if (isPt > 0) {
            $("#contact_pt_info").addClass("d-none");
        } else {
            $("#contact_pt_info").removeClass("d-none");
        }
    })
</script>

</html>