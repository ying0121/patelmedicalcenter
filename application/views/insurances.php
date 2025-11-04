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
        <!-- Insurance Title -->
        <div class="container my-5">
            <p class="h1"><?php echo $component_text['t_ins_title']; ?></p>
            <p class="lead"><?php echo $component_text['t_ins_desc']; ?> <a class="text-danger" href="<?php echo base_url() ?>Contact"><em><?php echo $component_text['menu_contact'] ?></em></a></p>
        </div>
        <!-- Insurance Logos -->
        <div class="container mb-5">
            <div class="row">
                <?php for ($i = 0; $i < count($insurances); $i++): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 cursor-pointer mb-3">
                        <div class="card h-100">
                            <img src="<?php echo base_url(); ?>assets/images/insurance/<?php echo $insurances[$i]['img']; ?>" class="m-2" alt="<?php echo $insurances[$i]['name']; ?>" height="100" />
                            <div class="card-body">
                                <h5 class="card-title" style="flex-grow: 1;" data-text="<?php echo $insurances[$i]['name']; ?>"><?php echo $insurances[$i]['name']; ?></h5>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <span><a href="javascript:;" class="text-success fs-6"><?php echo $insurances[$i]['phone']; ?></a></span>
                                    <span><a href="javascript:;" class="text-info fs-6"><?php echo $insurances[$i]['address']; ?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endfor ?>
            </div>
        </div>
        <!-- Footer -->
        <?php include('footer.php'); ?>
</body>

</html>