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
        <!-- About Us -->
        <?php if ($area_toggle['aboutus_aboutclinic'] == 1): ?>
            <div class="container mb-5 pt-5">
                <div class="row">
                    <div class="col-md-6 px-3">
                        <img src="assets/images/pageimgs/<?php echo $CENTRAL[rand(0, count($CENTRAL) - 1)]['img'] ?>" alt="image" width="95%" />
                    </div>
                    <div class="col-md-6 d-flex justify-content-start align-items-center px-3">
                        <div>
                            <p class="h1"><?php echo $component_text['menu_about_us']; ?></p>
                            <div class="lead"><?php echo $component_text['t_about_clinic_desc']; ?></div>
                            <div class="lead"><?php echo $component_text['t_about_clinic_fdesc']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <!-- Quality Metrics -->
        <div class="container mb-5">
            <!-- Quality Metrics Title -->
            <div class="mb-4">
                <p class="h1 text-center"><?php echo $component_text['t_quality_metrics_title']; ?></p>
                <div class="fs-5 text-center"><?php echo $component_text['t_quality_metrics_desc']; ?></div>
            </div>
            <!-- Quality Metrics Tab -->
            <!-- Tabs navs -->
            <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
                <?php $first = true; ?>
                <?php for ($i = 0; $i < count($qualities); $i++): ?>
                    <?php if (!isset($qualities[$i + 1]['id']) || $qualities[$i + 1]['id'] != $qualities[$i]['id']): ?>
                        <li class="nav-item" role="presentation">
                            <a data-mdb-tab-init
                                class="nav-link <?php if ($first) {
                                                    echo 'active';
                                                    $first = false;
                                                } ?>"
                                id="ex3-tab-<?php echo $i + 1; ?>"
                                href="#ex3-tabs-<?php echo $i + 1; ?>"
                                role="tab"
                                aria-controls="ex3-tabs-<?php echo $i + 1; ?>"
                                aria-selected="<?php if ($first == true) echo true;
                                                else echo false; ?>">
                                <?php echo $qualities[$i]['catname']; ?>
                            </a>
                        </li>
                    <?php endif ?>
                <?php endfor ?>
            </ul>
            <!-- Tabs navs -->
            <!-- Tabs content -->
            <div class="tab-content" id="ex2-content">
                <?php $first = true; ?>
                <?php for ($i = 0; $i < count($qualities); $i++): ?>
                    <?php if (!isset($qualities[$i + 1]['id']) || $qualities[$i + 1]['id'] != $qualities[$i]['id']): ?>
                        <div class="tab-pane fade <?php if ($first == true) {
                                                        echo "show active";
                                                        $first = false;
                                                    }; ?>" id="ex3-tabs-<?php echo $i + 1; ?>" role="tabpanel" aria-labelledby="ex3-tab-<?php echo $i + 1; ?>">
                            <div class="card">
                                <div class="card-body">
                                    <p class="h1 my-4 ms-4"><?php echo $qualities[$i]['measurename']; ?></p>
                                    <p class="lead mb-3 ms-2"><?php echo $qualities[$i]['mdesc'] ?></p>
                                    <div class="w-100 px-1">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="d-none d-md-block text-primary mb-2"><?php echo $qualities[$i]['sdate'], '~', $qualities[$i]['edate']; ?></p>
                                            <p class="d-none d-md-block text-primary mb-2"><?php echo 'Denominator: ', $qualities[$i]['denominator']; ?></p>
                                            <p class="d-none d-md-block text-primary mb-2"><?php echo 'Numerator: ', $qualities[$i]['numerator']; ?></p>
                                            <p class="text-primary mb-2"><?php echo round($qualities[$i]['numerator'] / $qualities[$i]['denominator'] * 100) ?>%</p>
                                        </div>
                                        <div class="progress rounded rounded-pill" style="height: 15px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated rounded rounded-pill bg-success"
                                                role="progressbar"
                                                aria-valuenow="<?php echo round($qualities[$i]['numerator'] / $qualities[$i]['denominator'] * 100) ?>"
                                                aria-valuemin="0"
                                                aria-valuemax="100"
                                                style="width: <?php echo round($qualities[$i]['numerator'] / $qualities[$i]['denominator'] * 100) ?>%;">
                                            </div>
                                        </div>
                                    </div>
                                    <p class="lead">
                                        <?php echo $qualities[$i]['mfdesc'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                <?php endfor ?>
            </div>
            <!-- Tabs content -->
        </div>
    </main>

    <!-- Footer -->
    <?php include('footer.php'); ?>
</body>

</html>