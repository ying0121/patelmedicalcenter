<header>
    <nav id="nav-bar" class="navbar navbar-expand-lg bg-body-tertiary fixed-top py-0">
        <div id="header-bg-image" class="w-100" style="position: fixed; background-image: url(<?php echo base_url() ?>assets/images/navbar-bg.png); background-position: center; background-repeat: no-repeat; background-size: cover;"></div>
        <canvas id="canvas" resize hidpi="off" style="position: fixed; height: 112px; z-index: 1;"></canvas>
        <div class="w-100" style="z-index: 2;">
            <div class="d-md-flex justify-content-md-around gap-md-3 px-3">
                <div class="d-flex justify-content-center align-items-center">
                    <a href="/" class="navbar-brand">
                        <img src="<?php echo base_url() ?>assets/images/logo.png" alt="image" class="system-logo-w">
                    </a>
                </div>
                <div class="py-2 d-flex justify-content-stretch align-items-center flex-wrap">
                    <div class="container d-flex justify-content-around align-items-center flex-wrap gap-1 gap-md-2 w-100 mt-2">
                        <div class="d-flex justify-content-center align-items-center flex-wrap">
                            <div>
                                <i class="fa fa-phone text-primary fs-5"></i>&nbsp;:&nbsp;
                                <a href="tel:<?php echo $contact_info['tel'] ?>" class="text-white"><?php echo $contact_info['tel'] ?></a>
                            </div>
                            <div>
                                &nbsp;&nbsp;|&nbsp;
                                <i class="fa fa-fax text-info fs-5"></i>&nbsp;:&nbsp;<a href="tel:<?php echo $contact_info['tel'] ?>" class="text-white"><?php echo $contact_info['tel'] ?>
                                </a>
                            </div>
                            <div class="text-white">
                                &nbsp;&nbsp;|&nbsp;
                                <?php echo $component_text['t_topbar_emergency_call'] ?>
                            </div>
                            <?php if ($contact_info['email']): ?>
                                <div>
                                    <span class="d-none d-md-inline">&nbsp;&nbsp;|&nbsp;&nbsp;</span><i class="fa fa-envelope text-success fs-5"></i>&nbsp;:&nbsp;
                                    <a href="mailto:<?php echo $contact_info['email'] ?>" class="text-white"><?php echo $contact_info['email'] ?></a>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="d-flex align-items-center">
                            <?php if ($contact_info["portal_show"] == 1): ?>
                                <a href="#" class="themesflat-button font-default process px-3 mx-1 text-white"><span><?php echo $component_text['link_portal'] ?></span></a>
                            <?php endif ?>
                            <?php if ($area_toggle['vault_area']): ?>
                                <?php if ($this->session->userdata('patient_id') == '' || $this->session->userdata('patient_name') == null): ?>
                                    <a href="<?php echo base_url() ?>PtLogin"
                                        class="themesflat-button font-default process px-3 mx-1 text-white"><span><?php echo $component_text['link_sign_in']; ?></span></a>
                                <?php else: ?>
                                    <a href="<?php echo base_url() ?>PtLogin/logout"
                                        class="themesflat-button font-default process px-3 mx-1 text-white"><span><?php echo $component_text['link_sign_out']; ?></span></a>
                                <?php endif ?>
                            <?php endif ?>
                            <div class="d-flex align-items-center gap-1">
                                <div class="btn btn-secondary p-1 langbtn <?php echo $this->session->userdata('language') == 'en' ? 'active' : '' ?>"
                                    onclick="setLang('en');">
                                    <img src="<?php echo base_url() ?>assets/images/flags/en.png"
                                        style="width: 20px; height: 20px;" />
                                </div>
                                <div class="btn btn-secondary p-1 langbtn <?php echo $this->session->userdata('language') == 'en' ? '' : 'active' ?>"
                                    onclick="setLang('es');">
                                    <img src="<?php echo base_url() ?>assets/images/flags/es.png"
                                        style="width: 20px; height: 20px;" />
                                </div>
                                <?php if ($this->session->userdata('patient_id') > 0): ?>
                                    <div class="d-flex justify-content-center align-items-center mx-3">
                                        <button class="d-none" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#info-manage-modal" id="patient-info-modal-view"></button>
                                        <div id="patient-info" class="text-white bg-primary d-flex justify-content-center align-items-center rounded rounded-pill fs-3" style="width: 36px; height: 36px; cursor: pointer;">
                                            <?php echo $patient_info['fname'][0] ?>
                                        </div>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid d-flex justify-content-center align-items-center flex-wrap mx-0">
                        <div class="collapse navbar-collapse" id="page-navbar">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 flex-wrap">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="<?php echo base_url() ?>"><?php echo $component_text['menu_home'] ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="<?php echo base_url() ?>TheClinic"><?php echo $component_text['menu_the_clinic'] ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="<?php echo base_url() ?>AboutUs"><?php echo $component_text['menu_about_us'] ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="<?php echo base_url() ?>Services"><?php echo $component_text['menu_services'] ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="<?php echo base_url() ?>Letters"><?php echo $component_text['menu_letters'] ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="<?php echo base_url() ?>Orientation"><?php echo $component_text['menu_orientation'] ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="<?php echo base_url() ?>CommunityResources"><?php echo $component_text['menu_community_resources'] ?></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a data-mdb-dropdown-init class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" aria-expanded="false">
                                        <?php echo $component_text['menu_education'] ?>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="<?php echo base_url() ?>Education?p=asthma"><?php echo $component_text['menu_asthma'] ?></a></li>
                                        <li><a class="dropdown-item" href="<?php echo base_url() ?>Education?p=aye_vision"><?php echo $component_text['menu_aye_vision'] ?></a></li>
                                        <li><a class="dropdown-item" href="<?php echo base_url() ?>Education?p=cholesterol"><?php echo $component_text['menu_cholesterol'] ?></a></li>
                                        <li><a class="dropdown-item" href="<?php echo base_url() ?>Education?p=diabietes"><?php echo $component_text['menu_diabietes'] ?></a></li>
                                        <li><a class="dropdown-item" href="<?php echo base_url() ?>Education?p=drug_abuse"><?php echo $component_text['menu_drug_abuse'] ?></a></li>
                                        <li><a class="dropdown-item" href="<?php echo base_url() ?>Education?p=nutrition"><?php echo $component_text['menu_nutrition'] ?></a></li>
                                        <li><a class="dropdown-item" href="<?php echo base_url() ?>Education?p=pain"><?php echo $component_text['menu_pain'] ?></a></li>
                                        <li><a class="dropdown-item" href="<?php echo base_url() ?>Education?p=pain_back"><?php echo $component_text['menu_pain_back'] ?></a></li>
                                        <li><a class="dropdown-item" href="<?php echo base_url() ?>Education?p=pulmonary_disease"><?php echo $component_text['menu_pulmonary_disease'] ?></a></li>
                                        <li><a class="dropdown-item" href="<?php echo base_url() ?>Education?p=tobacco_treatment"><?php echo $component_text['menu_tobacco_treatment'] ?></a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="<?php echo base_url() ?>Insurances"><?php echo $component_text['menu_insurances'] ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="<?php echo base_url() ?>Contact"><?php echo $component_text['menu_contact'] ?></a>
                                </li>
                                <?php if (($this->session->userdata('patient_id') != '' && $this->session->userdata('patient_name') != null)): ?>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="<?php echo base_url() ?>Vault"><?php echo $component_text['menu_vault'] ?></a>
                                    </li>
                                <?php endif ?>
                            </ul>
                        </div>
                        <button data-mdb-collapse-init class="navbar-toggler text-white px-0" type="button" data-mdb-target="#page-navbar" aria-controls="page-navbar" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Alert -->
            <?php if (count($alerts) > 0): ?>
                <div class="container mt-2">
                    <?php
                    $cookie_data = json_decode(get_cookie('alert'), true);
                    if ($cookie_data && ($cookie_data['title'] == $alerts[0]['title'] && $cookie_data['id'] == $alerts[0]['id']) && $alerts[0]['type'] == 'once'):
                    ?>
                    <?php elseif (date('Y-m-d H:i:s', strtotime($alerts[0]['end'])) >= date('Y-m-d H:i:s') && $alerts[0]['status'] == 1): ?>
                        <p class="h4 text-danger fw-bold mb-0">
                            <?php if (count($alerts) > 0) {
                                if ($this->session->userdata('language') == "en") echo $alerts[0]['title'];
                                else echo $alerts[0]['title_es'];
                            } ?>
                        </p>
                        <div class="d-flex justify-content-center justify-content-md-start align-items-center gap-3">
                            <span class="text-danger">
                                <?php if (count($alerts) > 0) {
                                    if ($this->session->userdata('language') == "en") echo $alerts[0]['message'];
                                    else echo $alerts[0]['message_es'];
                                } ?>
                            </span>
                            <div class="btn-group">
                                <button class="btn btn-link d-none d-sm-inline" type="button" data-mdb-dropdown-init data-mdb-ripple-init aria-expanded="false">
                                    <?php echo $component_text['btn_read_more'] ?> >>
                                </button>
                                <ul class="dropdown-menu p-3 rounded rounded-3" style="background-color: #303030C0; min-width: 420px;">
                                    <div class="bg-image mb-3">
                                        <?php if ($alerts[0]["image"] != ""): ?>
                                            <img src="<?php echo base_url() ?>/assets/images/alerts/<?php echo $alerts[0]["image"] ?>" class="w-100" />
                                        <?php endif ?>
                                        <div class="mask">
                                            <div class="d-flex justify-content-center align-items-center h-100">
                                                <div class="text-center">
                                                    <p class="text-white h3 my-4">
                                                        <?php if ($this->session->userdata('language') == "en") echo $alerts[0]["title"];
                                                        else echo $alerts[0]["title_es"];
                                                        ?>
                                                    </p>
                                                    <p class="text-white h4">
                                                        <?php if ($this->session->userdata('language') == "en") echo $alerts[0]["message"];
                                                        else echo $alerts[0]["message_es"];
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="h5 text-white">
                                        <?php if ($this->session->userdata('language') == "en") echo $alerts[0]["description"];
                                        else echo $alerts[0]["description_es"];
                                        ?>
                                    </p>
                                </ul>
                            </div>
                        </div>
                    <?php endif ?>
                    <?php
                    $expireTime = (new DateTime($alerts[0]['end']))->getTimestamp() - time();
                    $this->input->set_cookie(array(
                        "name" => "alert",
                        "value" => json_encode(array(
                            "title" => $alerts[0]['title'],
                            "message" => $alerts[0]['message'],
                            "id" => $alerts[0]['id'],
                        )),
                        "expire" => $expireTime,
                        "domain" => "",
                        "path" => "/",
                        "prefix" => "",
                        "secure" => false
                    ));
                    ?>
                </div>
            <?php endif ?>
        </div>
    </nav>
    <div id="header-height" style="height: 112px;"></div>
</header>
<div style="position:relative;">
    <div id="timetable_wrapper">
        <div id="timetable">
            <div id="timetable_content">
                <p class="h4 my-3 ms-4"><?php echo $component_text['t_working_hour'] ?></p>
                <?php for ($i = 0; $i < count($working_hours); $i++): ?>
                    <div class="mx-4 text-black">
                        <i class="fa fa-check text-success mx-3 fs-4"></i><?php echo $working_hours[$i]['name']; ?> :
                        <?php echo $working_hours[$i]['time']; ?>
                        <hr class="my-3">
                    </div>
                <?php endfor ?>
                <div class="mx-4 text-black">
                    <hr class="my-3">
                </div>
            </div>
        </div>
        <div id="clock">
            <img src="<?php echo base_url() ?>assets/images/timetable-menu.png">
        </div>
    </div>
</div>

<?php if ($this->session->userdata('patient_id') > 0): ?>
    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="info-manage-modal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12 d-flex justify-content-center" style="margin-bottom: 42px;">
                            <h6 class="p-2"><?php echo $patient_info['email'] ?></h6>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center mb-3">
                            <span class="bg-success text-white d-flex justify-content-center align-items-center fs-1 rounded rounded-pill" style="width: 72px; height: 72px;">
                                <?php echo $patient_info['fname'][0] ?>
                            </span>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center" style="margin-bottom: 42px;">
                            <h3><?php echo $component_text['c_item_hello'] ?> <?php echo $patient_info['fname'] . ' ' . $patient_info['lname'] ?></h3>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                            <button class="d-none" id="info-edit-modal-view" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#person_info_modal"></button>
                            <button type="button" class="btn btn-link fs-6" id="info_edit_btn" data-mdb-ripple-init data-mdb-dismiss="modal"><?php echo $component_text['c_item_edit_info'] ?></button>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                            <button class="d-none" id="pwd-reset-modal-view" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#pwd_reset_modal"></button>
                            <button type="button" class="btn btn-link fs-6" id="info_pwd_reset_btn" data-mdb-ripple-init data-mdb-dismiss="modal"><?php echo $component_text['c_item_reset_pwd'] ?></button>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                            <button class="d-none" id="opt-in-out-modal-view" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#opt_in_out_modal"></button>
                            <button type="button" class="btn btn-link fs-6" id="info_edit_comm" data-mdb-ripple-init data-mdb-dismiss="modal"><?php echo $component_text['c_item_edit_comm'] ?></button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-mdb-ripple-init data-mdb-dismiss="modal"><?php echo $component_text['c_item_close'] ?></button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="person_info_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo $component_text['c_item_edit_info'] ?></h4>
                    <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3 mb-4">
                            <div class="form-outline" data-mdb-input-init data-mdb-input-initialized="true">
                                <input type="text" id="epatient_id" class="form-control" />
                                <label class="form-label" for="epatient_id"><?php echo $component_text["t_contact_option_patient"] ?> ID</label>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="efname" class="form-control" required />
                                <label class="form-label" for="efname"><?php echo $component_text["placeholder_first_name"] ?></label>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="emname" class="form-control" />
                                <label class="form-label" for="emname"><?php echo $component_text["placeholder_middle_name"] ?></label>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="elname" class="form-control" required />
                                <label class="form-label" for="elname"><?php echo $component_text["placeholder_last_name"] ?></label>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="ephone" class="form-control" />
                                <label class="form-label" for="ephone"><?php echo $component_text["placeholder_phone_number"] ?></label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="emobile" class="form-control" />
                                <label class="form-label" for="emobile"><?php echo $component_text["placeholder_mobile_number"] ?></label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="eemail" class="form-control" required />
                                <label class="form-label" for="eemail"><?php echo $component_text["placeholder_email_address"] ?></label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="eaddress" class="form-control" />
                                <label class="form-label" for="eaddress"><?php echo $component_text["placeholder_address"] ?></label>
                            </div>
                        </div>
                        <div class="col-md-2 mb-4">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="ecity" class="form-control" />
                                <label class="form-label" for="ecity"><?php echo $component_text["placeholder_city"] ?></label>
                            </div>
                        </div>
                        <div class="col-md-2 mb-4">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="estate" class="form-control" />
                                <label class="form-label" for="estate"><?php echo $component_text["placeholder_state"] ?></label>
                            </div>
                        </div>
                        <div class="col-md-2 mb-4">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="ezip" class="form-control" />
                                <label class="form-label" for="ezip"><?php echo $component_text["placeholder_zip"] ?></label>
                            </div>
                        </div>

                        <div class="col-md-2 mb-4" data-mdb-select-init class="form-outline">
                            <select id="egender" class="form-select">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="date" id="edob" class="form-control" required />
                                <label class="form-label" for="edob"><?php echo $component_text["placeholder_dob"] ?></label>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4" data-mdb-select-init class="form-outline">
                            <select id='elanguage' class="form-select">
                                <?php for ($i = 0; $i < count($languages); $i++): ?>
                                    <option value="<?php echo $languages[$i]['code'] ?>"><?php echo $languages[$i]['English'] ?></option>
                                <?php endfor ?>
                            </select>
                            <label class="form-label select-label"><?php echo $component_text["placeholder_lang"] ?></label>
                        </div>
                        <div class="col-md-2 mb-4">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="eethnicity" class="form-control" />
                                <label class="form-label" for="eethnicity"><?php echo $component_text["placeholder_eth"] ?></label>
                            </div>
                        </div>
                        <div class="col-md-2 mb-4">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="erace" class="form-control" />
                                <label class="form-label" for="erace"><?php echo $component_text["placeholder_rate"] ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <div class="d-flex w-100 justify-content-between">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="patient_active" />
                            <label class="form-check-label" for="patient_active"><?php echo $component_text["placeholder_active"]; ?></label>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary personeditsubmitbtn" data-mdb-ripple-init data-mdb-dismiss="modal"><?php echo $component_text['c_item_done'] ?></button>
                            <button type="button" class="btn btn-danger" data-mdb-ripple-init data-mdb-dismiss="modal"><?php echo $component_text['c_item_close'] ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="pwd_reset_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo $component_text['c_item_reset_pwd'] ?></h4>
                    <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="new-password" class="form-control form-control-lg" required />
                                <label class="form-label" for="new-password"><?php echo $component_text["c_item_new_pwd"] ?></label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="re-password" class="form-control form-control-lg" required />
                                <label class="form-label" for="re-password"><?php echo $component_text["placeholder_confirm_password"] ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary resetpwdbtn" data-mdb-ripple-init data-mdb-dismiss="modal"><?php echo $component_text['c_item_done'] ?></button>
                    <button type="button" class="btn btn-danger" data-mdb-ripple-init data-mdb-dismiss="modal"><?php echo $component_text['c_item_close'] ?></button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="opt_in_out_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title "><?php echo $component_text['c_item_comm'] ?></h4>
                    <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="my-1"><?php echo $component_text['t_opt_in_out_header']; ?></p>
                        </div>
                        <div class="col-md-12">
                            <div class="form-check my-1">
                                <input class="form-check-input" type="radio" value="1" name="opt_opt_status" id="pt_opt_in" checked />
                                <label class="form-check-label" for="pt_opt_in"><?php echo $component_text['t_opt_in_out_in']; ?></label>
                            </div>
                            <div class="form-check my-1">
                                <input class="form-check-input" type="radio" value="0" name="opt_opt_status" id="pt_opt_out" />
                                <label class="form-check-label" for="pt_opt_in"><?php echo $component_text['t_opt_in_out_out']; ?></label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p class="my-1 pb-0"><?php echo $component_text['t_opt_in_out_footer']; ?></p>
                        </div>
                        <div class="col-md-12 d-none" id="pt_opt_moreinfo">
                            <p><?php echo $component_text['t_opt_in_out_more']; ?></p>
                        </div>
                        <div class="col-md-12 mb-1 pt-0">
                            <a href="#" id="pt_opt_more_info_btn"><?php echo $component_text['t_opt_more_info']; ?> >></a>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary" data-mdb-ripple-init data-mdb-dismiss="modal"><?php echo $component_text['c_item_done'] ?></button>
                    <button type="button" class="btn btn-danger" data-mdb-ripple-init data-mdb-dismiss="modal"><?php echo $component_text['c_item_close'] ?></button>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>