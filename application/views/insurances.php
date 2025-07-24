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
        <div class="project-carousel">
            <div class="carousel-container">
                <div class="carousel-track">
                    <?php for ($i = 0; $i < count($insurances); $i++): ?>
                        <div class="carousel-card">
                            <div class="card-image-container">
                                <img src="<?php echo base_url(); ?>assets/images/insurance/<?php echo $insurances[$i]['img']; ?>" alt="<?php echo $insurances[$i]['name']; ?>" class="card-image" height="200px;" width="330px" style="object-fit:contain;">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title text-xl font-bold text-cyan-400" data-text="<?php echo $insurances[$i]['name']; ?>"><?php echo $insurances[$i]['name']; ?></h3>
                                <div class="card-progress">
                                    <div class="progress-value" style="width:65%"></div>
                                </div>
                                <div class="card-stats">
                                    <span><a href="#" class="text-success fs-6"><?php echo $insurances[$i]['phone']; ?></a></span>
                                    <span><a href="#" class="text-info fs-6"><?php echo $insurances[$i]['address']; ?></a></span>
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
                    <?php for ($i = 0; $i < count($insurances) - 1; $i++): ?>
                        <div class="indicator"></div>
                    <?php endfor ?>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php include('footer.php'); ?>
</body>

</html>