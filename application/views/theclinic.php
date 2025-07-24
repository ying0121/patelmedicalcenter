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
        <!-- Parallax Image -->
        <?php $img_id = rand(0, count($HEADER_BANNER) - 1); ?>
        <div class="parallax-container w-100" style="background-image: url('<?php echo base_url() ?>assets/images/pageimgs/<?php echo $HEADER_BANNER[$img_id]['img'] ?>'); height: 500px;">
            <div class="d-flex align-items-center" style="height:100%;">
                <div class="p-5 col-12 col-md-8">
                    <div style="height:30%; font-size:36px;" class="d-flex align-items-center">
                        <?php echo $HEADER_BANNER[$img_id]['title']; ?>
                    </div>
                    <div style="height:70%; font-size:18px;" class="d-flex align-items-center mt-3">
                        <?php echo $HEADER_BANNER[$img_id]['desc']; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- The Clinic -->
        <div class="container">
            <div class="row py-5 pb-4">
                <div class="col-md-6">
                    <p class="h1"><?php echo $component_text['menu_the_clinic']; ?></p>
                    <?php if ($area_toggle['clinic_desc'] == 1): ?>
                        <p class="lead"><?php echo $component_text['t_location_desc']; ?></p>
                    <?php endif ?>
                </div>
                <div class="col-md-6">
                    <?php if ($area_toggle['clinic_contact'] == 1): ?>
                        <div class="d-flex align-items-center my-4 text-warning">
                            <i class="fas fa-map-marker-alt mx-2 fs-4"></i>
                            <div href="#"><?php echo ' ' . $contact_info['address'] . " " . $contact_info['city'] . " " . $contact_info['state'] . " " . $contact_info['zip'] ?></div>
                        </div>
                        <div class="d-flex align-items-center my-4 text-info">
                            <i class="fa fa-phone-alt mx-2 fs-4"></i>
                            <div href="#"><?php echo ' ' . $contact_info['tel'] ?></div>
                        </div>
                        <div class="d-flex align-items-center my-4 text-danger">
                            <i class="fas fa-fax mx-2 fs-4"></i>
                            <div href="#"><?php echo ' ' . $contact_info['fax'] ?></div>
                        </div>
                        <div class="d-flex align-items-center my-4 text-primary">
                            <i class="fas fa-envelope mx-2 fs-4"></i>
                            <div href="#"><?php echo ' ' . $contact_info['email'] ?></div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <!-- Clinic Map -->
        <?php if ($area_toggle['clinic_map'] == 1): ?>
            <div class="w-100 mb-5">
                <iframe
                    id="preview"
                    width="100%"
                    height="480px"
                    style="border:0"
                    loading="lazy"
                    allowfullscreen
                    src="https://www.google.com/maps/embed/v1/place?key=<?php echo $this->config->item('google_api_key') ?>&q=<?php echo $contact_info['address']; ?> <?php echo $contact_info['city']; ?> <?php echo $contact_info['state']; ?> <?php echo $contact_info['zip']; ?>">
                </iframe>
            </div>
        <?php endif ?>

        <!-- Clinic Additional Information -->
        <div class="container mb-3">
            <!-- Mission & Vision -->
            <?php if ($area_toggle['clinic_additional_1'] == 1): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="card-title h4 fw-bold"><?php echo $component_text['t_clinic_additional_1_title'] ?></div>
                        <div class="card-text"><?php echo $component_text['t_clinic_additional_1_desc'] ?></div>
                    </div>
                </div>
            <?php endif ?>
            <!-- Facilities & Amenities -->
            <?php if ($area_toggle['clinic_additional_2'] == 1): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="card-title h4 fw-bold"><?php echo $component_text['t_clinic_additional_2_title'] ?></div>
                        <div class="card-text"><?php echo $component_text['t_clinic_additional_2_desc'] ?></div>
                    </div>
                </div>
            <?php endif ?>
            <!-- Patient-Centric Approach -->
            <?php if ($area_toggle['clinic_additional_3'] == 1): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="card-title h4 fw-bold"><?php echo $component_text['t_clinic_additional_3_title'] ?></div>
                        <div class="card-text"><?php echo $component_text['t_clinic_additional_3_desc'] ?></div>
                    </div>
                </div>
            <?php endif ?>
            <!-- Quality & Accrediation -->
            <?php if ($area_toggle['clinic_additional_4'] == 1): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="card-title h4 fw-bold"><?php echo $component_text['t_clinic_additional_4_title'] ?></div>
                        <div class="card-text"><?php echo $component_text['t_clinic_additional_4_desc'] ?></div>
                    </div>
                </div>
            <?php endif ?>
            <!-- Appointment Scheduling -->
            <?php if ($area_toggle['clinic_additional_5'] == 1): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="card-title h4 fw-bold"><?php echo $component_text['t_clinic_additional_5_title'] ?></div>
                        <div class="card-text"><?php echo $component_text['t_clinic_additional_5_desc'] ?></div>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </main>
    <!-- Footer -->
    <?php include('footer.php'); ?>
</body>

</html>