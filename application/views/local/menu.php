<?php
$tmpmenu = json_decode($this->session->userdata('chosen_menu'));
if ($tmpmenu == NULL)
    $tmpmenu = array();
?>
<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <div class="brand flex-column-auto mt-5" id="kt_brand">
        <a href="#" class="brand-logo">
            <img class="logo-img" alt="Logo" src="<?php echo base_url() ?>assets/images/logo.png" style="width:100%;" />
        </a>
    </div>
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
            <ul class="menu-nav">
                <?php if (in_array("Home", $tmpmenu)): ?>
                    <li class="menu-item <?php echo $sideitem == 'home' ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
                        <a href="<?php echo base_url(); ?>local/Home" class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-home" style="font-size:inherit; color:inherit"></i>
                            </span>
                            <span class="menu-text">Home</span>
                        </a>
                    </li>
                <?php endif ?>
                <?php if (in_array("Clinic", $tmpmenu)): ?>
                    <li class="menu-item <?php echo $sideitem == 'the_clinic' ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
                        <a href="<?php echo base_url(); ?>local/TheClinic" class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-medkit" style="font-size:inherit; color:inherit"></i>
                            </span>
                            <span class="menu-text">The Clinic</span>
                        </a>
                    </li>
                <?php endif ?>
                <?php if (in_array("About Us", $tmpmenu)): ?>
                    <li class="menu-item <?php echo $sideitem == 'about_us' ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
                        <a href="<?php echo base_url(); ?>local/AboutUs" class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-book" style="font-size:inherit; color:inherit"></i>
                            </span>
                            <span class="menu-text">About Us</span>
                        </a>
                    </li>
                <?php endif ?>
                <?php if (in_array("Insurance", $tmpmenu)): ?>
                    <li class="menu-item <?php echo $sideitem == 'insurance' ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
                        <a href="<?php echo base_url(); ?>local/Insurance" class="menu-link">
                            <span class="menu-icon">
                                <i class="fa fa-hospital" style="font-size:inherit; color:inherit"></i>
                            </span>
                            <span class="menu-text">Insurance</span>
                        </a>
                    </li>
                <?php endif ?>
                <?php if (in_array("Orientation", $tmpmenu)): ?>
                    <li class="menu-item <?php echo $sideitem == 'orientation' ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
                        <a href="<?php echo base_url(); ?>local/Orientation" class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-star" style="font-size:inherit; color:inherit"></i>
                            </span>
                            <span class="menu-text">Orientation</span>
                        </a>
                    </li>
                <?php endif ?>
                <?php if (in_array("Services", $tmpmenu)): ?>
                    <li class="menu-item <?php echo $sideitem == 'services' ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
                        <a href="<?php echo base_url(); ?>local/Services" class="menu-link">
                            <span class="menu-icon">
                                <i class="fa fa-hand-holding" style="font-size:inherit; color:inherit"></i>
                            </span>
                            <span class="menu-text">Services</span>
                        </a>
                    </li>
                <?php endif ?>
                <?php if (in_array("Letter", $tmpmenu)): ?>
                    <li class="menu-item <?php echo $sideitem == 'letter' ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
                        <a href="<?php echo base_url(); ?>local/Letters" class="menu-link">
                            <span class="menu-icon">
                                <i class="fa fa-newspaper" style="font-size:inherit; color:inherit"></i>
                            </span>
                            <span class="menu-text">Letters</span>
                        </a>
                    </li>
                <?php endif ?>
                <?php if (in_array("Education", $tmpmenu)): ?>
                    <li class="menu-item <?php echo $sideitem == 'education' ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
                        <a href="<?php echo base_url(); ?>local/Education" class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-school" style="font-size:inherit; color:inherit"></i>
                            </span>
                            <span class="menu-text">Educations</span>
                        </a>
                    </li>
                <?php endif ?>
                <?php if (in_array("Contacts", $tmpmenu)): ?>
                    <li class="menu-item <?php echo $sideitem == 'contacts' ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
                        <a href="<?php echo base_url(); ?>local/Contacts" class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-list" style="font-size:inherit; color:inherit"></i>
                            </span>
                            <span class="menu-text">Contacts</span>
                        </a>
                    </li>
                <?php endif ?>
                <?php if (in_array("Doctors", $tmpmenu)): ?>
                    <li class="menu-item <?php echo $sideitem == 'doctor' ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
                        <a href="<?php echo base_url(); ?>local/Doctor" class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-stethoscope" style="font-size:inherit; color:inherit"></i>
                            </span>
                            <span class="menu-text">Doctors</span>
                        </a>
                    </li>
                <?php endif ?>
                <?php if (in_array("Staffs", $tmpmenu)): ?>
                    <li class="menu-item <?php echo $sideitem == 'staff' ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
                        <a href="<?php echo base_url(); ?>local/Staff" class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-users" style="font-size:inherit; color:inherit"></i>
                            </span>
                            <span class="menu-text">Staffs</span>
                        </a>
                    </li>
                <?php endif ?>
                <?php if (in_array("Patient Reviews", $tmpmenu)): ?>
                    <li class="menu-item <?php echo $sideitem == 'patient_review' ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
                        <a href="<?php echo base_url(); ?>local/PatientReview" class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-thumbs-up" style="font-size:inherit; color:inherit"></i>
                            </span>
                            <span class="menu-text">Patient Reviews</span>
                        </a>
                    </li>
                <?php endif ?>
                <?php if (in_array("Page Images", $tmpmenu)): ?>
                    <li class="menu-item <?php echo $sideitem == 'page_images' ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
                        <a href="<?php echo base_url(); ?>local/PageImage" class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-image" style="font-size:inherit; color:inherit"></i>
                            </span>
                            <span class="menu-text">Page Images</span>
                        </a>
                    </li>
                <?php endif ?>
                <?php if (in_array("Page Videos", $tmpmenu)): ?>
                    <li class="menu-item <?php echo $sideitem == 'page_videos' ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
                        <a href="<?php echo base_url(); ?>local/PageVideo" class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-video" style="font-size:inherit; color:inherit"></i>
                            </span>
                            <span class="menu-text">Page Videos</span>
                        </a>
                    </li>
                <?php endif ?>
                <?php if (in_array("Patient Area", $tmpmenu)): ?>
                    <li class="menu-item <?php echo $sideitem == 'patient_area' ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
                        <a href="<?php echo base_url(); ?>local/PatientArea" class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-wheelchair" style="font-size:inherit; color:inherit"></i>
                            </span>
                            <span class="menu-text">Patient Area</span>
                        </a>
                    </li>
                <?php endif ?>
                <?php if (in_array("Setting", $tmpmenu)): ?>
                    <li class="menu-item <?php echo $sideitem == 'setting' ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
                        <a href="<?php echo base_url(); ?>local/Setting" class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-cogs" style="font-size:inherit; color:inherit"></i>
                            </span>
                            <span class="menu-text">Setting</span>
                        </a>
                    </li>
                <?php endif ?>
                <?php if ($this->session->userdata('usertype') == 1): ?>
                    <li class="menu-item <?php echo $sideitem == 'manager' ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
                        <a href="<?php echo base_url(); ?>local/Manager" class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-user" style="font-size:inherit; color:inherit"></i>
                            </span>
                            <span class="menu-text">Managers</span>
                        </a>
                    </li>
                <?php endif ?>
                <?php if (in_array("Alert", $tmpmenu)): ?>
                    <li class="menu-item <?php echo $sideitem == 'alert' ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
                        <a href="<?php echo base_url(); ?>local/Alert" class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-bell" style="font-size:inherit; color:inherit"></i>
                            </span>
                            <span class="menu-text">Alert</span>
                        </a>
                    </li>
                <?php endif ?>
                <hr>
                <?php if (in_array("Survey", $tmpmenu)): ?>
                    <li class="menu-item <?php echo $sideitem == 'surveylist' ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
                        <a href="<?php echo base_url(); ?>local/Survey/list" class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-chart-bar" style="font-size:inherit; color:inherit"></i>
                            </span>
                            <span class="menu-text">Survey</span>
                        </a>
                    </li>
                <?php endif ?>
                <?php if (in_array("Newsletter", $tmpmenu)): ?>
                    <li class="menu-item <?php echo $sideitem == 'newsletter' ? 'menu-item-active' : ''; ?>" aria-haspopup="true">
                        <a href="<?php echo base_url(); ?>local/Newsletter" class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-newspaper" style="font-size:inherit; color:inherit"></i>
                            </span>
                            <span class="menu-text">Newsletter</span>
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</div>
<script>
    $(document).ready(async () => {
        // sub menu
        document.querySelectorAll('.menu-item-rel > .menu-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault(); // Prevent default link behavior
                const submenu = this.nextElementSibling; // Get the submenu
                if (submenu) {
                    submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block'; // Toggle display
                }
            });
        });

        setInterval(() => {
            localStorage.setItem('once_logged_in', 'false')

            var login_time = '<?php echo json_encode($this->session->userdata('login_time')) ?>'
            var expired_time = '<?php echo json_encode($this->session->userdata('expired_time')) ?>'
            var current_time = Math.floor(Date.now() / 1000)

            if (current_time - login_time > expired_time * 60) {
                var tag = document.createElement('a')
                tag.href = "<?php echo base_url() ?>admin/logout"

                // Append to the body
                document.body.appendChild(tag)

                // Set localStorage item
                localStorage.setItem("once_logged_in", "false")

                // Trigger the click event
                tag.click()

                document.body.removeChild(tag)
            }
        }, 5000)
    })
</script>