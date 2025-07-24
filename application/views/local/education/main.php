<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('local/header'); ?>
    <style>
        .nav-link {
            color: white !important;
        }
    </style>
</head>

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <?php $this->load->view('local/mobile_topmenu'); ?>
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-row flex-column-fluid page">
            <?php $this->load->view('local/menu'); ?>
            <div class="d-flex flex-column flex-row-fluid wrapper pt-20" id="kt_wrapper">
                <?php $this->load->view('local/topmenu'); ?>
                <div class="content d-flex flex-column flex-column-fluid p-10">

                    <div class="row">
                        <div class="col-md-12 bg-primary p-2 mb-2 text-white">
                            <div class="d-flex justify-content-around">
                                <div class="d-flex align-items-center" style="font-size:20px; font-weight:bold;">
                                    Educations
                                </div>
                                <ul class="nav nav-tabs nav-pills" data-tabs="tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#asthma" data-toggle="tab">
                                            Asthma
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#aye_vision" data-toggle="tab">
                                            Aye and Vision
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#cholesterol" data-toggle="tab">
                                            Cholesterol
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#diabietes" data-toggle="tab">
                                            Diabietes
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#drug_abuse" data-toggle="tab">
                                            Drug Abuse
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#nutrition" data-toggle="tab">
                                            Nutrition
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#pain" data-toggle="tab">
                                            Pain
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#pain_back" data-toggle="tab">
                                            Pain Back
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#pulmonary_disease" data-toggle="tab">
                                            Pulmonary Disease
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tobacco_treatment" data-toggle="tab">
                                            Tobacco Treatment
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="tab-content">
                                <div class="tab-pane active" id="asthma">
                                    <?php include('asthma.php') ?>
                                </div>
                                <div class="tab-pane" id="aye_vision">
                                    <?php include('aye_vision.php') ?>
                                </div>
                                <div class="tab-pane" id="cholesterol">
                                    <?php include('cholesterol.php') ?>
                                </div>
                                <div class="tab-pane" id="diabietes">
                                    <?php include('diabietes.php') ?>
                                </div>
                                <div class="tab-pane" id="drug_abuse">
                                    <?php include('drug_abuse.php') ?>
                                </div>
                                <div class="tab-pane" id="nutrition">
                                    <?php include('nutrition.php') ?>
                                </div>
                                <div class="tab-pane" id="pain">
                                    <?php include('pain.php') ?>
                                </div>
                                <div class="tab-pane" id="pain_back">
                                    <?php include('pain_back.php') ?>
                                </div>
                                <div class="tab-pane" id="pulmonary_disease">
                                    <?php include('pulmonary_disease.php') ?>
                                </div>
                                <div class="tab-pane" id="tobacco_treatment">
                                    <?php include('tobacco_treatment.php') ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>