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
                                <div class="d-flex align-items-center" style="font-size:20px; font-weight:bold;">Setting</div>
                                <ul class="nav nav-tabs nav-pills" data-tabs="tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#home" data-toggle="tab">
                                            Home
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#communication" data-toggle="tab">
                                            Communication
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#language" data-toggle="tab">
                                            Language Component
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#metrics" data-toggle="tab">
                                            Meta Language
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#api" data-toggle="tab">
                                            API
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#patientarea" data-toggle="tab">
                                            Patient Area
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#icons" data-toggle="tab">
                                            Icons
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#security" data-toggle="tab">
                                            Security
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#system" data-toggle="tab">
                                            System
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#payment" data-toggle="tab">
                                            Payment
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#newsletterimg" data-toggle="tab">
                                            Newsletter Images
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="tab-content">
                                <div class="tab-pane active" id="home">
                                    <?php include('home.php') ?>
                                </div>
                                <div class="tab-pane" id="communication">
                                    <?php include('communication.php') ?>
                                </div>
                                <div class="tab-pane" id="language">
                                    <?php include('language.php') ?>
                                </div>
                                <div class="tab-pane" id="metrics">
                                    <?php include('meta.php') ?>
                                </div>
                                <div class="tab-pane" id="api">
                                    <?php include('api.php') ?>
                                </div>
                                <div class="tab-pane" id="patientarea">
                                    <?php include('patientarea.php') ?>
                                </div>
                                <div class="tab-pane" id="icons">
                                    <?php include('icons.php') ?>
                                </div>
                                <div class="tab-pane" id="security">
                                    <?php include('security.php') ?>
                                </div>
                                <div class="tab-pane" id="system">
                                    <?php include('systeminfo.php') ?>
                                </div>
                                <div class="tab-pane" id="payment">
                                    <?php include('payment.php') ?>
                                </div>
                                <div class="tab-pane" id="newsletterimg">
                                    <?php include('newsletterimg.php') ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php include('modals/language_edit_modal.php'); ?>
</body>

</html>