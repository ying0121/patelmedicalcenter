<!DOCTYPE html>
<html lang="en">

<?php include('includes.php'); ?>

<body>
    <!-- Preloader -->
    <div id="loading-overlay">
        <div class="loader"></div>
    </div>
    <!-- Header -->
    <?php include('header.php'); ?>
    <!-- Main -->
    <main>
        <!-- Hero Carousel -->
        <div id="carouselMaterialStyle" class="carousel slide carousel-fade" data-mdb-ride="carousel" data-mdb-carousel-init style="position: relative;">
            <!-- Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="0" class="active" aria-current="true"
                    aria-label="Slide 1"></button>
                <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <!-- Inner -->
            <div class="carousel-inner rounded-5 shadow-4-strong">
                <?php for ($i = 0; $i < count($HEADER_BANNER); $i++): ?>
                    <!-- Single item -->
                    <div class="carousel-item active">
                        <img src="<?php echo base_url() ?>assets/images/pageimgs/<?php echo $HEADER_BANNER[$i]['img']; ?>" class="d-block" style="min-height: 240px;"
                            alt="<?php echo $HEADER_BANNER[$i]['title']; ?>" />
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?php echo $HEADER_BANNER[$i]['title']; ?></h5>
                            <p><?php echo $HEADER_BANNER[$i]['desc']; ?></p>
                        </div>
                    </div>
                <?php endfor ?>
            </div>
            <!-- Inner -->

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- Make an Appointment -->
        <div class="container d-flex justify-content-start gap-3" style="margin-top: -36px; position: absolute; z-index: 1;">
            <a class="btn btn-danger" data-mdb-collapse-init data-mdb-ripple-init href="#home-make-appointment" role="button" aria-expanded="false" aria-controls="home-make-appointment">
                <i class="fas fa-handshake"></i>
                <span class="d-none d-md-inline"><?php echo $component_text['t_make_an_appointment'] ?></span>
            </a>
        </div>
        <div class="collapse" id="home-make-appointment">
            <div class="container my-4">
                <div class="w-100 p-3 border porder-1 border-info rounded rounded-3 mb-3">
                    <div class="row">
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
                                        <input class="form-check-input" type="radio" name="contactpttype" id="contactpttype1" value="2" />
                                        <label class="form-check-label" for="contactpttype1"> <?php echo $component_text['t_contact_option_new'] ?> </label>
                                    </div>
                                </div>
                                <div class="col-md-6 contactpttype-institution mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="contactpttype" id="contactpttype2" value="3" checked />
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
                                <div class="col-md-6 mb-2">
                                    <div class="form-outline" data-mdb-input-init>
                                        <input type="text" id="contact_name" class="form-control form-control-lg" name="contact_name" required />
                                        <label class="form-label" for="contact_name"><?php echo $component_text['placeholder_your_name']; ?></label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-outline" data-mdb-input-init>
                                        <input type="text" id="contact_email" class="form-control form-control-lg" name="contact_email" required />
                                        <label class="form-label" for="contact_email"><?php echo $component_text['placeholder_email_address']; ?></label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-outline" data-mdb-input-init>
                                        <input type="text" id="contact_cel" class="form-control form-control-lg" name="contact_cel" required />
                                        <label class="form-label" for="contact_cel"><?php echo $component_text['placeholder_phone_number']; ?></label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-outline" data-mdb-input-init>
                                        <input type="date" id="contact_dob" class="form-control form-control-lg" name="contact_dob" required />
                                        <label class="form-label" for="contact_dob"><?php echo $component_text['placeholder_dob']; ?></label>
                                    </div>
                                </div>
                            </div>
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
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="fs-6 my-1"><?php echo $component_text['t_opt_in_out_header']; ?></p>
                    </div>
                    <div class="col-md-12 mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="opt_status" id="home_opt_in" value="1" checked />
                            <label class="form-check-label" for="home_opt_in"> <?php echo $component_text['t_opt_in_out_in'] ?> </label>
                        </div>
                    </div>
                    <div class="col-md-12">
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
                <hr class="my-1 mb-2" />
                <div class="d-sm-flex justify-content-between align-items-center mb-3 gap-3">
                    <div class="d-flex justify-content-between align-items-center mb-2 mb-md-0 gap-1">
                        <img id="contact_captcha_image" src="<?php echo base_url() . $captcha_image ?>" alt="Captcha Image" width="250px" />
                        <i id="captcha_change" class="fa fa-lg fa-rotate-right fs-2 text-primary" style="cursor: pointer;"></i>
                    </div>
                    <div class="form-outline" data-mdb-input-init>
                        <input type="text" id="contact_captcha" class="form-control form-control-lg" name="captcha" />
                        <label class="form-label" for="contact_captcha"><?php echo $component_text['placeholder_captcha']; ?></label>
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-lg btn-danger" onClick="sendContactform();" data-mdb-ripple-init id="contact-submit-btn">
                        <i class="fas fa-paper-plane me-2"></i>
                        <?php echo $component_text['btn_send'] ?>
                    </button>
                </div>
            </div>
        </div>
        <!-- Service Carousel -->
        <?php if (count($services) > 0): ?>
            <div class="project-carousel">
                <div class="carousel-container">
                    <div class="carousel-track">
                        <?php for ($i = 0; $i < count($services); $i++): ?>
                            <div class="carousel-card">
                                <div class="card-image-container">
                                    <img src="<?php echo base_url(); ?>assets/service/image/<?php echo $services[$i]['image']; ?>" alt="<?php echo $services[$i]['title']; ?>" class="card-image">
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title text-xl font-bold text-cyan-400" data-text="<?php echo $services[$i]['title']; ?>"><?php echo $services[$i]['title']; ?></h3>
                                    <div class="card-progress">
                                        <div class="progress-value" style="width:65%"></div>
                                    </div>
                                    <div class="card-stats">
                                        <button data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#payment-modal" class="d-none" id="show-service-payment-modal-btn"></button>
                                        <button data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#service_request_modal" class="d-none" id="show-service-modal-btn"></button>
                                        <span><a href="javascript:;" class="text-primary service_request" style="font-size: 18px;" data-id="<?php echo $services[$i]['id']; ?>" data-title="<?php echo $services[$i]['title']; ?>"><?php echo $component_text['t_request'] ?></a></span>
                                        <span><a href="<?php echo base_url(); ?>Services/detail?s=<?php echo $services[$i]['id']; ?>" target="_blank" style="font-size: 18px;"><?php echo $component_text['btn_read_more']; ?></a></span>
                                    </div>
                                </div>
                            </div>
                        <?php endfor ?>
                    </div>

                    <button class="carousel-button prev">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                    </button>
                    <button class="carousel-button next">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>

                    <div class="carousel-indicators">
                        <div class="indicator active"></div>
                        <?php for ($i = 0; $i < count($services) - 1; $i++): ?>
                            <div class="indicator"></div>
                        <?php endfor ?>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <!-- Meet Our Doctor -->
        <?php if ($area_toggle['doctor_area'] == 1): ?>
            <div class="container my-4">
                <p class="h1"><?php echo $component_text['t_doctor_title']; ?></p>
                <p class="lead"><?php echo $component_text['t_doctor_desc']; ?></p>

                <div id="doctor-carousel" class="carousel slide carousel-fade" data-mdb-ride="carousel" data-mdb-carousel-init>
                    <div class="carousel-indicators">
                        <?php for ($i = 0; $i < count($doctors); $i++): ?>
                            <button
                                type="button"
                                data-mdb-target="#doctor-carousel"
                                data-mdb-slide-to="<?php echo $i; ?>"
                                class="active"
                                aria-current="true"
                                aria-label="Slide <?php echo $i + 1; ?>"></button>
                        <?php endfor ?>
                    </div>
                    <div class="carousel-inner">
                        <?php for ($i = 0; $i < count($doctors); $i++): ?>
                            <div class="row justify-content-center">
                                <div class="col-md-3">
                                    <div class="bg-image hover-zoom">
                                        <img src="<?php echo base_url() ?>assets/images/doctors/<?php echo $doctors[$i]['img'] ?>" alt="image" class="w-100">
                                    </div>
                                </div>
                                <div class="col-md-9 px-3">
                                    <h2 class="name text-left text-color-title-sidebar"><a href="#"><?php echo $doctors[$i]['name'] ?></a></h2>
                                    <div style="text-align:left;" class="p-3 pdt-8"><?php echo $doctors[$i]['desc'] ?></div>
                                    <div class="flat-read-more text-left p-3">
                                        <a href="#" class="modal-trigger themesflat-button font-default process" data-needpopup-show="#doctor_detail_modal_<?php echo $i ?>">
                                            <span><?php echo $component_text['btn_read_more']; ?><i class="fa fa-arrow-right"></i> </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endfor ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <?php for ($i = 0; $i < count($doctors); $i++): ?>
                    <div id='doctor_detail_modal_<?php echo $i ?>' class="needpopup">
                        <?php echo $doctors[$i]['fdesc'] ?>
                    </div>
                <?php endfor ?>
            </div>
        <?php endif ?>

        <!-- Our Staffs -->
        <?php if ($area_toggle['staff_area'] == 1): ?>
            <div class="container my-4 mb-5">
                <p class="h1"><?php echo $component_text['t_staff_title']; ?></p>
                <p class="lead"><?php echo $component_text['t_staff_desc']; ?></p>

                <div class="owl-carousel-staff owl-theme">
                    <?php for ($i = 0; $i < count($staffs); $i++): ?>
                        <div class="card m-3">
                            <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                                <img src="<?php echo base_url() ?>assets/images/staffs/<?php echo $staffs[$i]['img'] ?>" class="img-fluid" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $staffs[$i]['name'] ?></h5>
                                <p class="card-text"><?php echo $staffs[$i]['desc'] ?></p>
                                <a href="#!" class="btn btn-danger" data-mdb-ripple-init data-needpopup-show="#staff_detail_modal_<?php echo $i ?>">
                                    <?php echo $component_text['btn_read_more']; ?> <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    <?php endfor ?>
                </div>

                <?php for ($i = 0; $i < count($staffs); $i++): ?>
                    <div id='staff_detail_modal_<?php echo $i ?>' class="needpopup">
                        <div>Name: <?php echo $staffs[$i]['name'] ?></div>
                        <div>Job: <?php echo $staffs[$i]['job'] ?></div>
                        <?php if ($staffs[$i]['email_tel_ext_toggle'] == 1): ?>
                            <div>Email: <?php echo $staffs[$i]['email'] ?></div>
                            <div class="row">
                                <div class="col-12 col-md-6">Tel: <?php echo $staffs[$i]['tel'] ?></div>
                                <div class="col-12 col-md-6">Ext: <?php echo $staffs[$i]['ext'] ?></div>
                            </div>
                        <?php endif ?>
                        <br>
                        <?php echo $staffs[$i]['fdesc'] ?>
                    </div>
                <?php endfor ?>
            </div>
        <?php endif ?>

        <!-- Patient Reviews -->
        <div class="container my-4">
            <p class="h1"><?php echo $component_text['t_patient_review_title']; ?></p>
            <div class="owl-carousel-review owl-theme">
                <?php for ($i = 0; $i < count($patient_reviews); $i++): ?>
                    <div class="card m-3 p-3">
                        <div class="d-flex justify-content-start flex-wrap align-items-center gap-2">
                            <img src="<?php echo base_url() ?>assets/images/patient_review/<?php echo $patient_reviews[$i]['img'] ?>" class="img-fluid" width="100px" height="100px" />
                            <h5 class="card-title"><?php echo $patient_reviews[$i]['name'] ?></h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><?php echo $patient_reviews[$i]['desc'] ?></p>
                        </div>
                    </div>
                <?php endfor ?>
            </div>
        </div>
    </main>
    <!-- Javascript -->

    <!-- Modals -->
    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="service_request_modal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <input type="hidden" id="service_name" />
                <div class="modal-header">
                    <p class="h4 m-0 mx-1" id="service_title"><?php echo $component_text['t_request_service']; ?></p>
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

        $(document).on("click", ".service_request", function() {
            const id = $(this).attr("data-id")
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
    })
</script>

</html>