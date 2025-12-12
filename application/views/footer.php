<!-- Payment Modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="false" id="payment-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="payment-modal-title">Payment Modal Title</h5>
                <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row payment-container">
                    <form id="payment-form">
                        <input type="hidden" id="payment-category" />
                        <input type="hidden" id="payment-category-id" />
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="form-outline" data-mdb-input-init>
                                    <input type="text" id="payment-name" class="form-control" />
                                    <label class="form-label" for="payment-name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-outline" data-mdb-input-init>
                                    <input type="text" id="payment-email" class="form-control" />
                                    <label class="form-label" for="payment-email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-outline" data-mdb-input-init>
                                    <input type="text" id="payment-phone" class="form-control" />
                                    <label class="form-label" for="payment-phone">Your Phone</label>
                                </div>
                            </div>
                        </div>
                        <div id="payment-element"></div>
                        <div id="payment-message" class="hidden"></div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button class="d-none" id="payment-modal-close" data-mdb-ripple-init data-mdb-dismiss="modal"></button>
                <button class="payment-button" id="payment-submit">
                    <div class="spinner hidden" id="payment-pay-submit-spinner"></div>
                    <span id="payment-pay-text">Pay now</span>
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Footer -->
<footer class="bg-body-tertiary text-center">
    <!-- Grid container -->
    <div class="container p-4">
        <!-- Section: Links -->
        <section class="footer">
            <!--Grid row-->
            <div class="row">
                <!-- Medical Guide -->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0 text-md-start">
                    <h5 class="text-uppercase px-2"><?php echo $component_text['c_footer_medical_guide'] ?></h5>
                    <ul class="list-group list-group-light">
                        <li class="list-group-item px-2 border-0 py-lg-3 py-1">
                            <a href="<?php echo base_url() ?>TheClinic" title=""><?php echo $component_text['menu_the_clinic'] ?></a>
                        </li>
                        <li class="list-group-item px-2 border-0 py-lg-3 py-1">
                            <a href="<?php echo base_url() ?>AboutUs" title=""><?php echo $component_text['menu_about_us'] ?></a>
                        </li>
                        <li class="list-group-item px-2 border-0 py-lg-3 py-1">
                            <a href="<?php echo base_url() ?>Orientation" title=""><?php echo $component_text['menu_orientation'] ?></a>
                        </li>
                        <li class="list-group-item px-2 border-0 py-lg-3 py-1">
                            <a href="<?php echo base_url() ?>Insurances" title=""><?php echo $component_text['menu_insurances'] ?></a>
                        </li>
                        <li class="list-group-item px-2 border-0 py-lg-3 py-1">
                            <a href="#" title=""><?php echo $component_text['menu_newsletter'] ?></a>
                        </li>
                        <li class="list-group-item px-2 border-0 py-lg-3 py-1">
                            <a href="#" title=""><?php echo $component_text['menu_contact'] ?></a>
                        </li>
                        <li class="list-group-item px-2 border-0 py-lg-3 py-1">
                            <a href="#" title=""><?php echo $component_text['link_portal'] ?></a>
                        </li>
                    </ul>
                </div>
                <!-- Get In Touch -->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0 text-md-start">
                    <h5 class="text-uppercase px-2"><?php echo $component_text['c_footer_get_in_touch'] ?></h5>
                    <ul class="list-group list-group-light">
                        <li class="list-group-item px-2 border-0 py-lg-3 py-1 d-flex justify-content-start align-items-center gap-2">
                            <div><i class="fas fa-map-marker-alt flat-icon-footer text-success fs-4"></i></div>
                            <div><a href="#"> <?php echo $contact_info['address'] ?>, <?php echo $contact_info['city'] ?>, <?php echo $contact_info['state'] ?> <?php echo $contact_info['zip'] ?></a></div>
                        </li>
                        <li class="list-group-item px-2 border-0 py-lg-3 py-1 d-flex justify-content-start align-items-center gap-2">
                            <div><i class="fa fa-phone-alt flat-icon-footer text-success fs-4"></i></div>
                            <div><a href="#"> <?php echo $contact_info['tel'] ?></a></div>
                        </li>
                        <li class="list-group-item px-2 border-0 py-lg-3 py-1 d-flex justify-content-start align-items-center gap-2">
                            <div><i class="fa fa-fax flat-icon-footer text-success fs-4"></i></div>
                            <div><a href="#"> <?php echo $contact_info['fax'] ?></a></div>
                        </li>
                        <li class="list-group-item px-2 border-0 py-lg-3 py-1 d-flex justify-content-start align-items-center gap-2">
                            <div><i class="fas fa-envelope flat-icon-footer text-success fs-4"></i></div>
                            <div><a href="#"> <?php echo $contact_info['email'] ?></a></div>
                        </li>
                    </ul>
                </div>
                <!-- Announcements -->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0 text-md-start">
                    <h5 class="text-uppercase"><?php echo $component_text['c_footer_announcement'] ?></h5>
                    <p><?php echo $component_text['c_footer_announcement_text'] ?></p>
                    <ul class="list-group list-group-light">
                        <div class="form-outline my-1" data-mdb-input-init>
                            <input type="text" class="form-control" id="footer_first_name" name="footer_first_name" />
                            <label class="form-label" for="footer_first_name"><?php echo $component_text['placeholder_first_name']; ?></label>
                        </div>
                        <div class="form-outline my-1" data-mdb-input-init>
                            <input type="text" class="form-control" id="footer_last_name" name="footer_last_name" />
                            <label class="form-label" for="footer_last_name"><?php echo $component_text['placeholder_last_name']; ?></label>
                        </div>
                        <div class="form-outline my-1" data-mdb-input-init>
                            <input type="date" class="form-control" id="footer_dob" name="footer_dob" />
                            <label class="form-label" for="footer_dob"><?php echo $component_text['placeholder_dob']; ?></label>
                        </div>
                        <div class="form-outline my-1" data-mdb-input-init>
                            <input type="text" class="form-control" id="footer_email" name="footer_email" />
                            <label class="form-label" for="footer_email"><?php echo $component_text['placeholder_email']; ?></label>
                        </div>
                        <div class="form-outline my-1" data-mdb-input-init>
                            <input type="text" class="form-control" id="footer_phone" name="footer_phone" />
                            <label class="form-label" for="footer_phone"><?php echo $component_text['placeholder_phone']; ?></label>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <img id="footer_captcha_image" src="<?php echo base_url() . $footer_captcha_image ?>" alt="Captcha Image" />
                            <i id="footer_captcha_change" class="fa fa-lg fa-rotate-right fs-2 text-primary" style="cursor: pointer;"></i>
                        </div>
                        <div class="form-outline my-1" data-mdb-input-init>
                            <input type="password" class="form-control" id="footer_captcha" name="footer_captcha" />
                            <label class="form-label" for="footer_captcha"><?php echo $component_text['placeholder_captcha']; ?></label>
                        </div>
                        <button id="footer_singup_btn" name="action" value="submit" type="button" class="btn btn-danger" data-mdb-ripple-init><?php echo $component_text['btn_send']; ?></button>
                    </ul>
                </div>
                <!-- QR Code -->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0 text-md-start">
                    <h5 class="text-uppercase mb-2"><?php echo $component_text['t_qrcode'] ?></h5>
                    <img width="180px" height="180px" src="data:image/png;base64,<?php echo $footer_qrcode; ?>" class="mb-3" />
                    <a href="https://precisionq.com" target="_blank">
                        <img class="mb-4" src="<?php echo base_url() ?>assets/images/quality-logo-q.png" width="70%" />
                    </a>
                    <a href="https://precisionq.com" target="_blank">
                        <p class="text-primary cursor-pointer"><?php echo $component_text['c_footer_powered_by'] ?></p>
                    </a>
                </div>
            </div>
            <!--Grid row-->
        </section>
        <!-- Section: Links -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
        <div class="container d-flex justify-content-center align-items-center gap-1 gap-md-5">
            <p class="text-black-50 pt-4 text-center fs-lg-5 fs-6">
                <?php
                    $footer = str_replace('$year;', $sysinfo["year"], $component_text['t_home_footer']);
                    $footer = str_replace('$clinic_name;', $contact_info["name"], $footer);
                    $footer = str_replace('$version;', $sysinfo["word"] . " " . $sysinfo["month"] . $sysinfo["year"], $footer);
                    $footer = str_replace('$terms_of_use', "<a class='text-primary' href='" . base_url() . "Terms_of_use" . "' target='_blank'>" . $component_text['terms_of_use'] . "</a>", $footer);
                    $footer = str_replace('$privacy_policy', "<a class='text-primary' href='" . base_url() . "Privacy_policy" . "' target='_blank'>" . $component_text['privacy_policy'] . "</a>", $footer);
                    echo $footer;
                ?>
            </p>
            <!-- Section: Social media -->
            <div class="d-flex justify-content-center align-items-center">
                <!-- Facebook -->
                <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button" style="background-color: #3b5998;"><i class="fab fa-facebook-f text-white"></i></a>
                <!-- Twitter -->
                <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button" style="background-color: #55acee;"><i class="fab fa-twitter text-white"></i></a>
                <!-- Instagram -->
                <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button" style="background-color: #ac2bac;"><i class="fab fa-instagram text-white"></i></a>
                <!-- Linkedin -->
                <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button" style="background-color: #0082ca;"><i class="fab fa-linkedin-in text-white"></i></a>
            </div>
            <!-- Section: Social media -->
        </div>
    </div>
    <!-- Copyright -->
</footer>


<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
<!-- JQuery -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery.min.js"></script>
<!-- Projects Carousel -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/project-carousel.js"></script>
<!--Owl Carousel -->
<script src="<?php echo base_url() ?>assets/js/owl.carousel.js"></script>
<!-- Need Popup -->
<script src="<?php echo base_url() ?>assets/needpopup/needpopup.min.js"></script>
<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Paper JS -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/paper-full.js"></script>

<script src="https://www.google.com/recaptcha/api.js?" async defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsencrypt/3.3.2/jsencrypt.min.js" integrity="sha512-94ncgEEqkuZ4yNTFmu2dSn1TJ6Ij+ANQqpR7eLVU99kzvYzu6UjBxuVoNHtnd29R+T6nvK+ugCVI698pbyEkvQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://js.stripe.com/v3/"></script>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/9.1.0/mdb.umd.min.js"></script>
<!-- DataTable -->
<script type="text/javascript" src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.min.js"></script>

<!-- Future Splash -->
<script type="text/paperscript" canvas="canvas">
    var values = {
        friction: 0.8,
        timeStep: 0.01,
        amount: 15,
        mass: 2,
        count: 0
    };
    values.invMass = 1 / values.mass;

    var path, springs;
    var size = view.size * [1.2, 1];

    var Spring = function(a, b, strength, restLength) {
        this.a = a;
        this.b = b;
        this.restLength = restLength || 80;
        this.strength = strength ? strength : 0.55;
        this.mamb = values.invMass * values.invMass;
    };

    Spring.prototype.update = function() {
        var delta = this.b - this.a;
        var dist = delta.length;
        var normDistStrength = (dist - this.restLength) /
            (dist * this.mamb) * this.strength;
        delta.y *= normDistStrength * values.invMass * 0.2;
        if (!this.a.fixed)
            this.a.y += delta.y;
        if (!this.b.fixed)
            this.b.y -= delta.y;
    };

    function createPath(strength) {
        var path = new Path({
            fillColor: '#FFFFFF30',
            strokeColor: '#FC4C64D0',
            strokeWidth: 3
        });
        springs = [];
        for (var i = 0; i <= values.amount; i++) {
            var segment = path.add(new Point(i / values.amount, 0.985) * size);
            var point = segment.point;
            if (i == 0 || i == values.amount)
                point.y += size.height;
            point.px = point.x;
            point.py = point.y;
            // The first two and last two points are fixed:
            point.fixed = i < 2 || i > values.amount - 2;
            if (i > 0) {
                var spring = new Spring(segment.previous.point, point, strength);
                springs.push(spring);
            }
        }
        path.position.x -= size.width / 4;
        return path;
    }

    function onResize() {
        if (path)
            path.remove();
        size = view.bounds.size * [2, 1];
        path = createPath(0.1);
    }

    function onMouseMove(event) {
        var location = path.getNearestLocation(event.point);
        var segment = location.segment;
        var point = segment.point;

        if (!point.fixed && location.distance < size.height / 4) {
            var y = event.point.y;
            point.y += (y - point.y) / 6;
            var previous = segment.previous && segment.previous.point;
            var next = segment.next && segment.next.point;
            if (previous && !previous.fixed)
                previous.y += (y - previous.y) / 24;
            if (next && !next.fixed)
                next.y += (y - next.y) / 24;
        }
    }

    function onFrame(event) {
        updateWave(path);
    }

    function updateWave(path) {
        var force = 1 - values.friction * values.timeStep * values.timeStep;
        for (var i = 0, l = path.segments.length; i < l; i++) {
            var point = path.segments[i].point;
            var dy = (point.y - point.py) * force;
            point.py = point.y;
            point.y = Math.max(point.y + dy, 0);
        }

        for (var j = 0, l = springs.length; j < l; j++) {
            springs[j].update();
        }
        path.smooth({
            type: 'continuous'
        });
    }
</script>

<script>
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

    $(document).on('click', '.modal-trigger', function() {
        $('.needpopup_wrapper').css('z-index', 1031);
    })

    function setLang(lang) {
        var page_status = "<?php echo $this->session->userdata("page_status") ?>"
        let sub_url = ""
        switch (page_status) {
            case "signin":
            case "signup":
            case "help":
                sub_url = "PtLogin"
                break
            case "verify":
                sub_url = "Verify"
                break
            case "theclinic":
                sub_url = "TheClinic"
                break
            case "orientation":
                sub_url = "Orientation"
                break
            case "home":
                sub_url = "Home"
                break
            case "vault":
                sub_url = "Vault"
                break
            case "aboutus":
                sub_url = "AboutUs"
                break
            case "contact":
                sub_url = "Contact"
                break
            case "insurance":
                sub_url = "Insurances"
                break
            case "services":
                sub_url = "Services"
                break
            case "letters":
                sub_url = "Letters"
                break
            case "privacy_policy":
                sub_url = "Privacy_policy"
                break
            case "terms_of_use":
                sub_url = "Terms_of_use"
                break
            case "community_resources":
                sub_url = "CommunityResources"
                break
            default:
                sub_url = page_status
        }
        // console.log(sub_url, lang)
        // return
        $.ajax({
            url: '<?php echo base_url() ?>' + sub_url + '/setLang',
            method: "POST",
            data: {
                language: lang
            },
            dataType: "text",
            success: function(data) {
                location.reload();
            }
        });
    }

    function sendContactform() {
        const isPt = parseInt('<?php echo $patient_info['id']; ?>');

        var errors = "";
        var app_name = isPt > 0 ? '<?php echo $patient_info['fname'] . " " . $patient_info['lname']; ?>' : $("#contact_name").val()
        var app_email_address = isPt > 0 ? '<?php echo $patient_info['email']; ?>' : $("#contact_email").val()
        var app_date = isPt > 0 ? '<?php echo $patient_info['dob']; ?>' : $("#contact_dob").val()
        var app_subject = $("#contact_subject").val();
        var app_message = $("#contact_message").val();
        var app_captcha = $("#contact_captcha").val();
        var cel = isPt > 0 ? '<?php echo $patient_info['phone']; ?>' : $("#contact_cel").val()

        if (cel) {
            cel = cel.replace('-', '')
            cel = cel.replace(' ', '')
            if (cel.length > 6) {
                cel = cel.slice(0, 6) + '-' + cel.slice(6)
            }
            if (cel.length > 4) {
                cel = cel.slice(0, 4) + '-' + cel.slice(4)
            }
        }

        if (app_name.value == "") {
            errors += '<?php echo $component_text['m_invalid_name'] ?>';
        } else if (app_email_address.value == "") {
            errors += '<?php echo $component_text['m_invalid_email'] ?>';
        } else if (app_date.value == "") {
            errors += '<?php echo $component_text['m_invalid_dob'] ?>';
        } else if (app_subject.value == "") {
            errors += '<?php echo $component_text['m_invalid_subject'] ?>';
        } else if (app_message.value == "") {
            errors += '<?php echo $component_text['m_invalid_message'] ?>';
        } else if (app_captcha == "") {
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
            $("#contact-submit-btn").prop("disabled", true);
            var encrypt = new JSEncrypt();
            encrypt.setPublicKey(`<?php echo $this->config->item('public_key') ?>`);
            $.ajax({
                method: "POST",
                url: '<?php echo base_url() ?>' + 'Home/submit',
                data: {
                    contact_name: encrypt.encrypt(app_name),
                    contact_email: encrypt.encrypt(app_email_address),
                    contact_cel: encrypt.encrypt(cel),
                    contact_dob: encrypt.encrypt(app_date),
                    contact_captcha: encrypt.encrypt($("#contact_captcha").val()),
                    contact_lang: `<?php echo $this->session->userdata('language'); ?>`,
                    contact_subject: $('#contact_subject').val(),
                    contact_message: $('#contact_message').val(),
                    contact_time: $('#contact_time').val(),
                    opt_status: $('input[name="opt_status"]:checked').val(),
                    contactpttype: $('input[name="contactpttype"]:checked').val(),
                    contactusertype: $('input[name="contactusertype"]:checked').val(),
                    contactreason: $('input[name="contactreason"]:checked').val()
                },
                dataType: "json",
                success: function(data) {
                    if (data.status == 'success') {
                        Swal.fire({
                            title: '<?php echo $component_text['c_case'] ?>' + '#: ' + data.id + '<?php echo $acronym ?>',
                            text: '<?php echo $component_text['t_contact_result_success'] ?>',
                            icon: 'success',
                        });
                    } else {
                        Swal.fire({
                            title: '<?php echo $component_text['c_error'] ?>',
                            text: data.status,
                            icon: 'error',
                        });
                        $('#contact_captcha_image').attr('src', '<?php echo base_url() ?>' + data.captcha)
                    }

                    $("#contact-submit-btn").prop("disabled", false);
                },
                error: function(data) {
                    Swal.fire({
                        title: '<?php echo $component_text['c_error'] ?>',
                        icon: 'error',
                    });

                    $("#contact-submit-btn").prop("disabled", false);
                }
            });
        }
    }

    // Payment Begin //
    // This is your test publishable API key.
    const stripe = Stripe("<?php echo $this->config->item("stripe_key") ?>")
    // The items the customer wants to buy
    let payment_items = [{
        id: "xl-tshirt",
        amount: 1000
    }];
    let elements = null
    // Fetches a payment intent and captures the client secret
    async function initialize() {
        const {
            clientSecret
        } = await fetch("<?php echo base_url(); ?>Payment/createPaymentIntent", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                items: payment_items
            }),
        }).then((r) => r.json());
        elements = stripe.elements({
            clientSecret
        })
        const paymentElementOptions = {
            layout: "accordion"
        }
        const paymentElement = elements.create("payment", paymentElementOptions)
        paymentElement.mount("#payment-element")
    }
    // ------- UI helpers -------
    function showMessage(messageText) {
        const messageContainer = document.querySelector("#payment-message")

        messageContainer.classList.remove("hidden")
        messageContainer.textContent = messageText

        setTimeout(function() {
            messageContainer.classList.add("hidden")
            messageContainer.textContent = ""
        }, 4000)
    }

    // Show a spinner on payment submission
    function setLoading(isLoading) {
        if (isLoading) {
            // Disable the button and show a spinner
            document.querySelector("#payment-submit").disabled = true
            document.querySelector("#payment-pay-submit-spinner").classList.remove("hidden")
            document.querySelector("#payment-pay-text").classList.add("hidden")
        } else {
            document.querySelector("#payment-submit").disabled = false
            document.querySelector("#payment-pay-submit-spinner").classList.add("hidden")
            document.querySelector("#payment-pay-text").classList.remove("hidden")
        }
    }
    // Payment End //

    // Windows Resize Event
    window.addEventListener('resize', () => {
        // Get the computed style of the nav-bar
        var navBarHeight = window.getComputedStyle(document.getElementById("nav-bar")).height

        document.getElementById("header-height").style.height = navBarHeight
        document.getElementById("canvas").style.height = navBarHeight
        document.getElementById("header-bg-image").style.height = navBarHeight
    })

    $(document).ready(function() {
        // time table
        $("#timetable").css('height', 0);
        
        needPopup.init();

        // Get the computed style of the nav-bar
        var navBarHeight = window.getComputedStyle(document.getElementById("nav-bar")).height
        document.getElementById("header-height").style.height = navBarHeight
        document.getElementById("canvas").style.height = navBarHeight
        document.getElementById("header-bg-image").style.height = navBarHeight

        $(".owl-carousel-staff").owlCarousel({
            autoPlay: 2500,
            items: 3,
            itemsDesktop: [1199, 2],
            itemsDesktopSmall: [979, 1]
        });

        $(".owl-carousel-review").owlCarousel({
            autoPlay: 3000,
            items: 3,
            itemsDesktop: [1199, 2],
            itemsDesktopSmall: [979, 1]
        });

        function mynotify(type, message) {
            Swal.fire({
                text: message,
                icon: type,
                confirmButtonText: 'Close'
            })
        }

        $(".popup").click(() => {
            var popup = document.getElementById("alert-details")
            popup.classList.toggle("show")
        })

        $("#patient-info").click(() => {
            $("#patient-info-modal-view").click()
        })

        $("#info_edit_btn").click(() => {
            $("#epatient_id").val('<?php echo $patient_info['patient_id'] ?>')
            $("#efname").val('<?php echo $patient_info['fname'] ?>')
            $("#emname").val('<?php echo $patient_info['mname'] ?>')
            $("#elname").val('<?php echo $patient_info['lname'] ?>')
            $("#ephone").val('<?php echo $patient_info['phone'] ?>')
            $("#emobile").val('<?php echo $patient_info['mobile'] ?>')
            $("#eemail").val('<?php echo $patient_info['email'] ?>')
            $("#eaddress").val('<?php echo $patient_info['address'] ?>')
            $("#ecity").val('<?php echo $patient_info['city'] ?>')
            $("#estate").val('<?php echo $patient_info['state'] ?>')
            $("#ezip").val('<?php echo $patient_info['zip'] ?>')
            $("#egender").val('<?php echo $patient_info['gender'] ?>')
            $("#edob").val('<?php echo $patient_info['dob'] ?>')
            $("#elanguage").val('<?php echo $patient_info['language'] ?>')
            $("#eethnicity").val('<?php echo $patient_info['ethnicity'] ?>')
            $("#erace").val('<?php echo $patient_info['race'] ?>')
            $('#patient_active').prop('checked', true)

            $("#info-edit-modal-view").click()
        })

        $(".personeditsubmitbtn").click(() => {
            var data = {
                id: "<?php echo $patient_info['id'] ?>",
                patient_id: $("#epatient_id").val(),
                fname: $("#efname").val(),
                mname: $("#emname").val(),
                lname: $("#elname").val(),
                phone: $("#ephone").val(),
                mobile: $("#emobile").val(),
                email: $("#eemail").val(),
                address: $("#eaddress").val(),
                city: $("#ecity").val(),
                state: $("#estate").val(),
                zip: $("#ezip").val(),
                gender: $("#egender").val(),
                dob: $("#edob").val(),
                language: $("#elanguage").val(),
                ethnicity: $("#eethnicity").val(),
                race: $("#erace").val(),
                status: $('#patient_active').prop('checked') == true ? 1 : 0
            };
            $.ajax({
                url: '<?php echo base_url() ?>local/Patient/update',
                type: 'post',
                data: data,
                dataType: "text",
                success: function(data) {
                    if (data == 'ok') {
                        mynotify('success', 'Your information has saved successfully!');
                    } else {
                        mynotify('error', 'Action Failed!');
                    }
                }
            });
        })

        $("#info_pwd_reset_btn").click(() => {
            $("#new-password").val("")
            $("#re-password").val("")

            $("#pwd-reset-modal-view").click()
        })

        $("#info_edit_comm").click(() => {
            $("#opt-in-out-modal-view").click()
        })

        $('#pt_opt_more_info_btn').click(function(e) {
            e.preventDefault();
            if ($('#pt_opt_moreinfo').hasClass('d-none')) {
                $('#pt_opt_moreinfo').removeClass('d-none');
                $('#pt_opt_more_info_btn').text("<?php echo '<< ' . $component_text['t_opt_less_info']; ?>");
            } else {
                $('#pt_opt_moreinfo').addClass('d-none');
                $('#pt_opt_more_info_btn').text("<?php echo $component_text['t_opt_more_info'] . ' >>'; ?>");
            }
        })

        $(".resetpwdbtn").click(function() {
            if ($("#new-password").val() == "") {
                mynotify('error', 'Please enter password');
            } else if ($("#new-password").val() != $("#re-password").val()) {
                mynotify('error', 'Please check password again');
            } else {
                $.ajax({
                    url: '<?php echo base_url() ?>local/Patient/resetpwd',
                    type: 'post',
                    data: {
                        id: "<?php echo $patient_info['id'] ?>",
                        pwd: $("#new-password").val()
                    },
                    dataType: "text",
                    success: function(data) {
                        if (data == "ok") {
                            mynotify('success', 'Password Reset Success');
                        } else {
                            mynotify('error', 'Password Reset Fail');
                        }
                    }
                });
            }
        });

        $("#footer_singup_btn").click(function() {
            if (!$("#footer_first_name").val() || !$("#footer_last_name").val() || !$("#footer_dob").val()) {
                Swal.fire({
                    title: '<?php echo $component_text['c_warning'] ?> ',
                    text: '<?php echo $component_text['t_pa_ah_invalid'] ?>',
                    icon: 'warning',
                    confirmButtonText: '<?php echo $component_text['c_item_close'] ?>'
                })
                return
            }
            if (!$("#footer_email").val()) {
                Swal.fire({
                    title: '<?php echo $component_text['c_warning'] ?> ',
                    text: '<?php echo $component_text['m_invalid_email'] ?>',
                    icon: 'warning',
                    confirmButtonText: '<?php echo $component_text['c_item_close'] ?>'
                })
                return
            }

            $.post({
                url: '<?php echo base_url() ?>Home/submitSignUpForFooter',
                method: 'POST',
                data: {
                    first_name: $("#footer_first_name").val(),
                    last_name: $("#footer_last_name").val(),
                    dob: $("#footer_dob").val(),
                    email: $("#footer_email").val(),
                    phone: $("#footer_phone").val(),
                    captcha: $("#footer_captcha").val()
                },
                dataType: 'json',
                success: function(res) {
                    if (res.message == "success") {
                        Swal.fire({
                            title: '<?php echo $component_text['c_case'] ?> # : ' + res.id + res.acronym,
                            text: '<?php echo $component_text['t_pa_su_alert_success'] ?>',
                            icon: 'success',
                            confirmButtonText: '<?php echo $component_text['c_item_close'] ?>'
                        })
                    } else if (res.message == "exist") {
                        Swal.fire({
                            title: '<?php echo $component_text['c_warning'] ?>',
                            text: '<?php echo $component_text['t_pa_su_alert_exist'] ?>',
                            icon: 'warning',
                            confirmButtonText: 'OK'
                        })
                    } else if (res.message == "required") {
                        Swal.fire({
                            title: '<?php echo $component_text['c_warning'] ?>',
                            text: '<?php echo $component_text['t_invalid_info'] ?>',
                            icon: 'warning',
                            confirmButtonText: 'OK'
                        })
                    } else if (res.message == "captcha") {
                        Swal.fire({
                            title: '<?php echo $component_text['c_error'] ?>',
                            text: '<?php echo $component_text['c_alert_incorrect_captcha'] ?>',
                            icon: 'error',
                            confirmButtonText: '<?php echo $component_text['c_item_close'] ?>'
                        })
                    } else if (res.message == "error") {
                        Swal.fire({
                            title: '<?php echo $component_text['c_error'] ?>',
                            text: '<?php echo $component_text['t_pa_su_alert_failed'] ?>',
                            icon: 'error',
                            confirmButtonText: '<?php echo $component_text['c_item_close'] ?>'
                        })
                    }
                }
            })
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

        // Captcha change buttons
        $('#footer_captcha_change').click(() => {
            $.post({
                url: '<?php echo base_url() ?>Home/changeCaptchaImageForFooter',
                method: 'POST',
                data: {},
                dataType: 'text',
                success: function(res) {
                    $('#footer_captcha_image').attr('src', '<?php echo base_url() ?>' + res)
                }
            })
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

        // Payment Submit Button
        $(document).on("click", "#payment-submit", async function(e) {
            e.preventDefault()

            const name = $("#payment-name").val()
            const email = $("#payment-email").val()
            const phone = $("#payment-phone").val()

            if (!name) {
                showMessage("⚠️ Please enter your name!")
                return
            }
            if (!email) {
                showMessage("⚠️ Please enter your email!")
                return
            }
            if (!phone) {
                showMessage("⚠️ Please enter your phone number!")
                return
            }

            setLoading(true)

            const {
                error,
                paymentIntent
            } = await stripe.confirmPayment({
                elements,
                confirmParams: {
                    payment_method_data: {
                        billing_details: {
                            name: name,
                            email: email,
                            phone: phone,
                        }
                    },
                    // Make sure to change this to your payment completion page
                    return_url: "<?php echo base_url() ?>Payment",
                },
                redirect: "if_required",
            })

            // This point will only be reached if there is an immediate error when
            // confirming the payment. Otherwise, your customer will be redirected to
            // your `return_url`. For some payment methods like iDEAL, your customer will
            // be redirected to an intermediate site first to authorize the payment, then
            // redirected to the `return_url`.
            if (error) {
                if (error.type === "card_error" || error.type === "validation_error") {
                    showMessage(error.message);
                } else {
                    showMessage("An unexpected error occurred.")
                }
            } else {
                switch (paymentIntent.status) {
                    case "succeeded":
                        Swal.fire({
                            title: '<?php echo $component_text['c_success'] ?>',
                            text: '<?php echo $component_text['t_payment_success'] ?>',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        })
                        showMessage("🎉 Payment succeeded!")
                        $("#payment-modal-close").click()
                        break;
                    case "processing":
                        showMessage("⏳ Payment is processing.")
                        break;
                    case "requires_payment_method":
                        showMessage("❌ Payment failed. Please try again.")
                        break;
                    default:
                        showMessage("⚠️ Unexpected payment status: " + paymentIntent.status)
                        break;
                }

                // send to backend
                const entry = {
                    payment_id: paymentIntent.id,
                    amount: paymentIntent.amount / 100,
                    currency: paymentIntent.currency,
                    payment_method: paymentIntent.payment_method,
                    status: paymentIntent.status,
                    category: $("#payment-category").val(),
                    category_id: $("#payment-category-id").val()
                }

                $.post({
                    url: '<?php echo base_url() ?>Payment/paymentResult',
                    method: 'POST',
                    data: entry,
                    dataType: 'text',
                    success: function(res) {}
                })
            }

            setLoading(false)
        })

        // Time Table Clock
        $("#clock").click(function() {
            if (parseInt($("#timetable").css('height')) != 0)
                $("#timetable").css('height', 0);
            else {
                var height = $("#timetable_content").height() + parseInt($("#timetable_content").css('padding-top')) *
                    2;
                $("#timetable").css('height', height);
            }
        })
    })
</script>