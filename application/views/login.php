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
        <div id="intro" class="bg-image shadow-2-strong parallax-container">
            <div class="mask d-flex align-items-center min-h-100" style="background-color: rgba(0, 0, 0, 0.8);">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-md-8 bg-white rounded shadow-5-strong p-4">
                            <!-- Title -->
                            <div class="text-center text-info fs-1">
                                <?php if ($this->session->userdata('page_status') == 'signin'): ?>
                                    <i class="me-3 fas fa-lock"></i><?php echo $component_text['t_pa_si_signin']; ?>
                                <?php elseif ($this->session->userdata('page_status') == 'signup'): ?>
                                    <i class="me-3 fas fa-user-plus"></i><?php echo $component_text['t_pa_su_signup']; ?>
                                <?php elseif ($this->session->userdata('page_status') == 'help'): ?>
                                    <i class="me-3 fas fa-mail-bulk"></i><?php echo $component_text['t_pa_su_account']; ?>
                                <?php endif ?>
                            </div>
                            <!-- Desc -->
                            <div class="fw-bold mb-2 mx-3">
                                <?php if ($this->session->userdata('page_status') == 'help'): ?>
                                    <?php echo $component_text['t_pa_ah_hques'] ?>
                                <?php elseif ($this->session->userdata('page_status') == 'verify'): ?>
                                    <?php echo $component_text['t_pa_ah_rpheader'] ?>
                                <?php else: ?>
                                    <?php echo $component_text['t_pa_si_welcome'] ?>
                                <?php endif ?>
                            </div>
                            <!-- Alert Begin -->
                            <?php if ($this->session->userdata('loginresult')): ?>
                                <div class="alert alert-danger" data-mdb-alert-init>
                                    <?php echo $this->session->userdata('loginresult')[$this->session->userdata('language')] ?><?php echo $this->session->userdata('loginresult')['count'] ?>
                                </div>
                                <?php $this->session->unset_userdata('loginresult'); ?>
                            <?php endif ?>
                            <?php if ($this->session->userdata('helpresult')): ?>
                                <?php if ($this->session->userdata('page_status') == 'help'): ?>
                                    <div class="alert alert-danger" data-mdb-alert-init><?php echo $this->session->userdata('helpresult') ?></div>
                                    <?php $this->session->unset_userdata('helpresult'); ?>
                                <?php endif ?>
                            <?php endif ?>
                            <?php if ($this->session->userdata('signupresult')): ?>
                                <?php if ($this->session->userdata('page_status') == 'signup'): ?>
                                    <div class="alert alert-danger" data-mdb-alert-init><?php echo $this->session->userdata('signupresult') ?></div>
                                    <?php $this->session->unset_userdata('signupresult') ?>
                                <?php endif ?>
                            <?php endif ?>

                            <?php if ($this->session->userdata('alert_message')): ?>
                                <script>
                                    $(document).ready(() => {
                                        showAlert('<?php echo $this->session->userdata('case_number') ?><?php echo $this->session->userdata('acronym') ?>', '<?php echo $this->session->userdata('alert_message') ?>', '<?php echo $this->session->userdata('alert_status') ?>')
                                    })
                                </script>
                                <?php $this->session->unset_userdata('alert_message') ?>
                                <?php $this->session->unset_userdata('alert_status') ?>
                            <?php endif ?>
                            <!-- Alert End -->
                            <!-- Form Begin -->
                            <?php if ($this->session->userdata('page_status') == 'signin'): ?>
                                <?php if ($security == 0): ?>
                                    <form action="<?php base_url() ?>PtLogin/login" method="post">
                                        <!-- Email input -->
                                        <div class="form-outline mb-4" data-mdb-input-init>
                                            <input type="text" name="email" id="name" class="form-control form-control-lg" />
                                            <label class="form-label" for="name"><?php echo $component_text['placeholder_login_name']; ?></label>
                                        </div>
                                        <!-- Password input -->
                                        <div class="form-outline mb-4" data-mdb-input-init>
                                            <input type="password" name="password" id="password" class="form-control form-control-lg" />
                                            <label class="form-label" for="password"><?php echo $component_text['placeholder_password']; ?></label>
                                        </div>
                                        <!-- Submit button -->
                                        <button name="action" value="signin" class="btn btn-danger btn-block py-3" data-mdb-ripple-init><?php echo $component_text['btn_login']; ?></button>
                                        <!-- Help Buttons -->
                                        <div class="row pt-4">
                                            <div class="col-md-12 d-flex justify-content-end">
                                                <button name="action" value="help" class="btn btn-link text-danger" role="button"><?php echo $component_text['t_pa_ah_help']; ?></button>
                                                <button name="action" value="signup" class="btn btn-link text-danger" role="button"><span><?php echo $component_text['btn_signup']; ?></span></button>
                                            </div>
                                        </div>
                                    </form>
                                <?php elseif ($security == 1): ?>
                                    <form action="<?php base_url() ?>checkSecurity" method="post">
                                        <!-- Answer input -->
                                        <div class="form-outline mb-4" data-mdb-input-init>
                                            <input type="text" name="answer" id="password" class="form-control form-control-lg" />
                                            <label class="form-label" for="password"><?php echo $component_text['placeholder_answer_security']; ?></label>
                                        </div>
                                        <!-- Submit button -->
                                        <button name="submit" id="submit" class="btn btn-danger btn-block py-3" data-mdb-ripple-init><?php echo $component_text['btn_login']; ?></button>
                                    </form>
                                <?php endif ?>
                            <?php elseif ($this->session->userdata('page_status') == 'help'): ?>
                                <form action="<?php base_url() ?>submitToHelp" method="post" class="needs-validation" novalidate>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Forgot Account Radio -->
                                            <div class="form-check mb-4">
                                                <input class="form-check-input forgot_type" type="radio" value="1" name="forgot_type" id="forgot_account" checked />
                                                <label class="form-check-label" for="forgot_account"><?php echo $component_text['t_pa_ah_facc'] ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Forgot Pasword Radio -->
                                            <div class="form-check mb-4">
                                                <input class="form-check-input forgot_type" type="radio" value="2" name="forgot_type" id="forgot_password" />
                                                <label class="form-check-label" for="forgot_password"><?php echo $component_text['t_pa_ah_fpwd'] ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 forgot-account">
                                            <!-- First Name Input -->
                                            <div class="form-outline mb-4" data-mdb-input-init>
                                                <input type="text" name="first_name" id="first_name" class="form-control form-control-lg" />
                                                <label class="form-label" for="first_name"><?php echo $component_text['placeholder_first_name']; ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 forgot-account">
                                            <!-- Last Name Input -->
                                            <div class="form-outline mb-4" data-mdb-input-init>
                                                <input type="text" name="last_name" id="last_name" class="form-control form-control-lg" />
                                                <label class="form-label" for="last_name"><?php echo $component_text['placeholder_last_name']; ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 forgot-account">
                                            <!-- Birthday Input -->
                                            <div class="form-outline mb-4" data-mdb-input-init>
                                                <input type="date" name="dob" id="dob" class="form-control form-control-lg" />
                                                <label class="form-label" for="dob"><?php echo $component_text['placeholder_dob']; ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 forgot-password d-none">
                                            <!-- Email input -->
                                            <div class="form-outline mb-4" data-mdb-input-init>
                                                <input type="text" name="email" id="name" class="form-control form-control-lg" />
                                                <label class="form-label" for="name"><?php echo $component_text['placeholder_login_name']; ?></label>
                                            </div>
                                        </div>
                                        <!-- Image Captcha -->
                                        <div class="col-md-12 forgot-password d-none mb-4">
                                            <div class="row justify-content-start align-items-center">
                                                <div class="col-md-6">
                                                    <div class="d-flex justify-content-between align-items-center gap-1">
                                                        <img id="help_captcha_image" src="<?php echo base_url() . $captcha_image ?>" alt="Captcha Image" class="w-100 h-100" />
                                                        <i id="captcha_change" class="fa fa-lg fa-rotate-right fs-2 text-primary" style="cursor: pointer;"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-outline" data-mdb-input-init>
                                                        <input type="password" id="captcha" name="captcha" class="form-control form-control-lg" />
                                                        <label class="form-label" for="contact_captcha"><?php echo $component_text['placeholder_captcha']; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Submit button -->
                                    <button name="action" value="submit" class="btn btn-danger btn-block py-3" role="button" data-mdb-ripple-init><?php echo $component_text['btn_submit']; ?></button>
                                    <!-- Help Buttons -->
                                    <div class="row pt-4">
                                        <div class="col-md-12 d-flex justify-content-end">
                                            <button name="action" value="signin" class="btn btn-link text-danger" role="button" data-mdb-ripple-init><span><?php echo $component_text['link_sign_in']; ?></span></button>
                                        </div>
                                    </div>
                                </form>
                            <?php elseif ($this->session->userdata('page_status') == 'signup'): ?>
                                <form action="<?php base_url() ?>submitSignUp" method="post">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!-- First Name Input -->
                                            <div class="form-outline mb-4" data-mdb-input-init>
                                                <input type="text" name="first_name" id="first_name" class="form-control form-control-lg" />
                                                <label class="form-label" for="first_name"><?php echo $component_text['placeholder_first_name']; ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <!-- Last Name Input -->
                                            <div class="form-outline mb-4" data-mdb-input-init>
                                                <input type="text" name="last_name" id="last_name" class="form-control form-control-lg" />
                                                <label class="form-label" for="last_name"><?php echo $component_text['placeholder_last_name']; ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <!-- Birthday Input -->
                                            <div class="form-outline mb-4" data-mdb-input-init>
                                                <input type="date" name="dob" id="dob" class="form-control form-control-lg" />
                                                <label class="form-label" for="dob"><?php echo $component_text['placeholder_dob']; ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Email input -->
                                            <div class="form-outline mb-4" data-mdb-input-init>
                                                <input type="text" name="email" id="name" class="form-control form-control-lg" />
                                                <label class="form-label" for="name"><?php echo $component_text['placeholder_email']; ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Phone input -->
                                            <div class="form-outline mb-4" data-mdb-input-init>
                                                <input type="text" name="phone" id="phone" class="form-control form-control-lg" />
                                                <label class="form-label" for="phone"><?php echo $component_text['placeholder_phone']; ?></label>
                                            </div>
                                        </div>
                                        <!-- Image Captcha -->
                                        <div class="col-md-12 mb-4">
                                            <div class="row justify-content-start align-items-center">
                                                <div class="col-md-6">
                                                    <div class="d-flex justify-content-between align-items-center gap-1">
                                                        <img id="help_captcha_image" src="<?php echo base_url() . $captcha_image ?>" alt="Captcha Image" class="w-100 h-100" />
                                                        <i id="captcha_change" class="fa fa-lg fa-rotate-right fs-2 text-danger" style="cursor: pointer;"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-outline" data-mdb-input-init>
                                                        <input type="password" id="captcha" name="captcha" class="form-control form-control-lg" />
                                                        <label class="form-label" for="contact_captcha"><?php echo $component_text['placeholder_captcha']; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Opt In & Out -->
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
                                    </div>
                                    <!-- Submit button -->
                                    <button name="action" id="submit" class="btn btn-danger btn-block py-3" data-mdb-ripple-init><?php echo $component_text['btn_submit']; ?></button>
                                    <!-- Help Buttons -->
                                    <div class="row pt-4">
                                        <div class="col-md-12 d-flex justify-content-end">
                                            <button name="action" value="signin" class="btn btn-link text-danger" role="button" data-mdb-ripple-init><span><?php echo $component_text['link_sign_in']; ?></span></button>
                                        </div>
                                    </div>
                                </form>
                            <?php elseif ($this->session->userdata('page_status') == 'verify'): ?>
                                <form action="<?php base_url() ?>/verify/<?php echo $verify_link ?>/submit" method="post">
                                    <!-- Password input -->
                                    <div class="form-outline mb-4" data-mdb-input-init>
                                        <input type="password" name="password" id="password" class="form-control form-control-lg" />
                                        <label class="form-label" for="password"><?php echo $component_text['placeholder_password']; ?></label>
                                    </div>
                                    <!-- Re-Password input -->
                                    <div class="form-outline mb-4" data-mdb-input-init>
                                        <input type="password" name="repassword" id="repassword" class="form-control form-control-lg" />
                                        <label class="form-label" for="repassword"><?php echo $component_text['placeholder_confirm_password']; ?></label>
                                    </div>
                                    <ul class="list-group list-group-light mb-4">
                                        <li class="list-group-item border-0 py-1">
                                            <span><i id="verify_pwd_length" class="verify-icons fa fa-warning text-warning"></i></span>
                                            <span class="text-info"><?php if ($this->session->userdata('language') == 'en') echo "8 to 72 characters";
                                                                    else echo "De 8 a 72 caracteres"; ?></span>
                                        </li>
                                        <li class="list-group-item border-0 py-1">
                                            <span><i id="verify_pwd_lower" class="verify-icons fa fa-warning text-warning"></i></span>
                                            <span class="text-info"><?php if ($this->session->userdata('language') == 'en') echo "At least one Lowercase letter (a,b,c...)";
                                                                    else echo "Al menos una letra minúscula (a,b,c...)"; ?></span>
                                        </li>
                                        <li class="list-group-item border-0 py-1">
                                            <span><i id="verify_pwd_upper" class="verify-icons fa fa-warning text-warning"></i></span>
                                            <span class="text-info"><?php if ($this->session->userdata('language') == 'en') echo "At least one Uppercase letter (A,B,C...)";
                                                                    else echo "Al menos una letra mayúscula (A,B,C...)"; ?></span>
                                        </li>
                                        <li class="list-group-item border-0 py-1">
                                            <span><i id="verify_pwd_number" class="verify-icons fa fa-warning text-warning"></i></span>
                                            <span class="text-info"><?php if ($this->session->userdata('language') == 'en') echo "At least one Number (1,2,3...)";
                                                                    else echo "Al menos un número (1,2,3...)"; ?></span>
                                        </li>
                                        <li class="list-group-item border-0 py-1">
                                            <span><i id="verify_pwd_special" class="verify-icons fa fa-warning text-warning"></i></span>
                                            <span class="text-info"><?php if ($this->session->userdata('language') == 'en') echo "At least one Special character (@,_,#,*...)";
                                                                    else echo "Al menos un carácter especial (@,_,#,*...)"; ?></span>
                                        </li>
                                        <li class="list-group-item border-0 py-1">
                                            <span><i id="verify_pwd_sequential" class="verify-icons fa fa-warning text-warning"></i></span>
                                            <span class="text-info"><?php if ($this->session->userdata('language') == 'en') echo "Not be sequential numbers";
                                                                    else echo "No sean números secuenciales"; ?></span>
                                        </li>
                                        <li class="list-group-item border-0 py-1">
                                            <span><i id="verify_pwd_repeat" class="verify-icons fa fa-warning text-warning"></i></span>
                                            <span class="text-info"><?php if ($this->session->userdata('language') == 'en') echo "Not be repeating numbers, letters, special characters";
                                                                    else echo "No repetir números, letras, caracteres especiales"; ?></span>
                                        </li>
                                        <li class="list-group-item border-0 py-1">
                                            <span><i id="verify_pwd_match" class="verify-icons fa fa-warning text-warning"></i></span>
                                            <span class="text-info"><?php if ($this->session->userdata('language') == 'en') echo "Matched password";
                                                                    else echo "Contraseña coincidente"; ?></span>
                                        </li>
                                    </ul>
                                    <!-- Submit button -->
                                    <button name="submit" id="submit" class="btn btn-danger btn-block py-3" status="disable" disabled data-mdb-ripple-init><?php echo $component_text['btn_submit']; ?></button>
                                    <!-- Help Buttons -->
                                    <div class="row pt-4">
                                        <div class="col-md-12 d-flex justify-content-end">
                                            <button name="action" value="signin" class="btn btn-link text-danger" role="button" data-mdb-ripple-init><span><?php echo $component_text['link_sign_in']; ?></span></button>
                                        </div>
                                    </div>
                                </form>
                            <?php endif ?>
                            <!-- Form End -->
                            <hr class="my-1" />
                            <p class="m-0 mt-3"><?php echo $component_text['t_pa_pr_footer'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <?php include('footer.php'); ?>
</body>
<script>
    function showAlert(title, message, type) {
        if (title) {
            Swal.fire({
                title: "<?php echo $component_text['c_case'] ?> #: " + title,
                text: message,
                icon: type,
                confirmButtonText: 'Close'
            })
        } else {
            Swal.fire({
                text: message,
                icon: type,
                confirmButtonText: 'Close'
            })
        }
    }

    $(document).ready(function() {
        $('#help_captcha_image').height($('#captcha').outerHeight())

        $('#captcha').val('')

        $('.forgot_type').change(function() {
            const selectedValue = $(this).val()
            if (selectedValue === '1') {
                $('.forgot-password').addClass('d-none')
                $('.forgot-account').removeClass('d-none')
            } else if (selectedValue === '2') {
                $('.forgot-password').removeClass('d-none')
                $('.forgot-account').addClass('d-none')
            }
        })

        $('#eye').click(() => {
            if ($('#password').attr('type') === 'password') {
                $('#password').attr('type', 'text')
                $('#eye').html(`<i class="fa fa-lg fa-eye-slash"></i>`)
            } else {
                $('#password').attr('type', 'password')
                $('#eye').html(`<i class="fa fa-lg fa-eye"></i>`)
            }
        })

        $('#eye2').click(() => {
            if ($('#repassword').attr('type') === 'password') {
                $('#repassword').attr('type', 'text')
                $('#eye2').html(`<i class="fa fa-lg fa-eye-slash"></i>`)
            } else {
                $('#repassword').attr('type', 'password')
                $('#eye2').html(`<i class="fa fa-lg fa-eye"></i>`)
            }
        })

        $('#captcha_change').click(() => {
            $.post({
                url: '<?php echo base_url() ?>PtLogin/changeCaptchaImage',
                method: 'POST',
                data: {},
                dataType: 'text',
                success: function(res) {
                    $('#help_captcha_image').attr('src', '<?php echo base_url() ?>' + res)
                }
            })
        })

        $(document).on('input', '#password', e => {
            var password = e.target.value
            if (password.length == 0) {
                $('.verify-icons').addClass("fa-warning text-warning")
                $('.verify-icons').removeClass("fa-check text-success")

                $('#password_submit').attr("status", "disable")
                $('#password_submit').prop("disabled", true)
            } else {
                const length = password.length
                const numberCount = (password.match(/[0-9]/g) || []).length
                const lowerCaseCount = (password.match(/[a-z]/g) || []).length
                const upperCaseCount = (password.match(/[A-Z]/g) || []).length
                const specCharacterCount = (password.match(/[^a-zA-Z0-9]/g) || []).length
                const sequentialCharacter = /(?:01|12|23|34|45|56|67|78|89)/i.test(password)
                const repeatCharacter = /(.)\1{1,}/.test(password)

                if (length >= 8 && length <= 72) { // password length
                    $('#verify_pwd_length').removeClass("fa-warning text-warning")
                    $('#verify_pwd_length').addClass("fa-check text-success")
                } else {
                    $('#verify_pwd_length').addClass("fa-warning text-warning")
                    $('#verify_pwd_length').removeClass("fa-check text-success")
                }
                if (numberCount >= 1) { // more than one number
                    $('#verify_pwd_number').removeClass("fa-warning text-warning")
                    $('#verify_pwd_number').addClass("fa-check text-success")
                } else {
                    $('#verify_pwd_number').addClass("fa-warning text-warning")
                    $('#verify_pwd_number').removeClass("fa-check text-success")
                }
                if (lowerCaseCount >= 1) { // more than one lowercase letter
                    $('#verify_pwd_lower').removeClass("fa-warning text-warning")
                    $('#verify_pwd_lower').addClass("fa-check text-success")
                } else {
                    $('#verify_pwd_lower').addClass("fa-warning text-warning")
                    $('#verify_pwd_lower').removeClass("fa-check text-success")
                }
                if (upperCaseCount >= 1) { // more than one uppercase letter
                    $('#verify_pwd_upper').removeClass("fa-warning text-warning")
                    $('#verify_pwd_upper').addClass("fa-check text-success")
                } else {
                    $('#verify_pwd_upper').addClass("fa-warning text-warning")
                    $('#verify_pwd_upper').removeClass("fa-check text-success")
                }
                if (specCharacterCount >= 1) { // more than one special character
                    $('#verify_pwd_special').removeClass("fa-warning text-warning")
                    $('#verify_pwd_special').addClass("fa-check text-success")
                } else {
                    $('#verify_pwd_special').addClass("fa-warning text-warning")
                    $('#verify_pwd_special').removeClass("fa-check text-success")
                }
                if (sequentialCharacter == false) { // sequential numbers
                    $('#verify_pwd_sequential').removeClass("fa-warning text-warning")
                    $('#verify_pwd_sequential').addClass("fa-check text-success")
                } else {
                    $('#verify_pwd_sequential').addClass("fa-warning text-warning")
                    $('#verify_pwd_sequential').removeClass("fa-check text-success")
                }
                if (repeatCharacter == false) { // repeat characters
                    $('#verify_pwd_repeat').removeClass("fa-warning text-warning")
                    $('#verify_pwd_repeat').addClass("fa-check text-success")
                } else {
                    $('#verify_pwd_repeat').addClass("fa-warning text-warning")
                    $('#verify_pwd_repeat').removeClass("fa-check text-success")
                }

                // change button status
                if ((length >= 8 && length <= 72) && numberCount >= 1 && lowerCaseCount >= 1 && upperCaseCount >= 1 && specCharacterCount >= 1 && sequentialCharacter == false && repeatCharacter == false) {
                    $('#password_submit').attr("status", "enable")
                } else {
                    $('#password_submit').attr("status", "disable")
                }

                // enable or disable submit button
                if ($('#password_submit').attr("status") == "enable" && $("#repassword").val() == password) {
                    $('#password_submit').prop("disabled", false)
                } else {
                    $('#password_submit').prop("disabled", true)
                }

                // match with repassword
                if ($('#repassword').val() == password) {
                    $('#verify_pwd_match').removeClass("fa-warning fa-times-circle text-danger text-warning")
                    $('#verify_pwd_match').addClass("fa-check text-success")
                } else {
                    $('#verify_pwd_match').addClass("fa-warning fa-times-circle text-danger text-warning")
                    $('#verify_pwd_match').removeClass("fa-check text-success")
                    if ($('#repassword').val().length == 0) {
                        $('#verify_pwd_match').removeClass("fa-check fa-times-circle text-danger text-success")
                        $('#verify_pwd_match').addClass("fa-warning text-warning")
                    }
                }
            }
        })

        $(document).on('input', '#repassword', e => {
            var password = e.target.value
            if (password.length == 0) {
                $('#verify_pwd_match').removeClass("fa-check fa-times-circle text-danger text-success")
                $('#verify_pwd_match').addClass("fa-warning text-warning")
                $('#password_submit').prop("disabled", true)
            } else if ($('#password').val() == password) {
                $('#verify_pwd_match').removeClass("fa-warning fa-times-circle text-danger text-warning")
                $('#verify_pwd_match').addClass("fa-check text-success")
                if ($('#password_submit').attr("status") == "enable") {
                    $('#password_submit').prop("disabled", false)
                } else {
                    $('#password_submit').prop("disabled", true)
                }
            } else {
                $('#verify_pwd_match').addClass("fa-warning fa-times-circle text-danger text-warning")
                $('#verify_pwd_match').removeClass("fa-check text-success")

                $('#password_submit').prop("disabled", true)
            }
        })

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

        $('#password').keydown(function(event) {
            if (event.which === 13) { // Enter key
                event.preventDefault(); // Prevent the default action (if needed)
            }
        });
    })
</script>

</html>