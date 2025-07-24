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
        <!-- Orientation -->
        <div class="container">
            <div class="row my-5">
                <div class="col-md-12">
                    <p class="h1"><?php echo $component_text['t_orientation_title']; ?></p>
                    <?php if ($area_toggle['clinic_desc'] == 1): ?>
                        <p class="lead"><?php echo $component_text['t_orientation_desc']; ?></p>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <!-- Orientataion Documents -->
        <div class="container mb-3">
            <?php for ($i = 0; $i < count($documents); $i++): ?>
                <div class="card mb-4">
                    <div class="card-header">
                        <p class="h4 my-2"><?php echo $documents[$i]['title']; ?></p>
                    </div>
                    <div class="card-body">
                        <div class="card-title"><?php echo $documents[$i]['desc'] ?></div>
                    </div>
                    <div class="card-footer text-center">
                        <a class="btn btn-link btn-danger text-white" data-mdb-ripple-init href="<?php echo base_url() . 'assets/documents/' . $documents[$i]['document'] ?>" target="_blank">
                            <i class="fas fa-download me-2"></i>
                            <?php echo $component_text['t_download'] ?> (<?php echo $documents[$i]['size'] ?>)
                        </a>
                    </div>
                </div>
            <?php endfor ?>
        </div>
    </main>
    <!-- Footer -->
    <?php include('footer.php'); ?>
</body>

</html>