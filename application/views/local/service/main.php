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
                                <div class="d-flex align-items-center" style="font-size:20px; font-weight:bold;">Services</div>
                                <ul class="nav nav-tabs nav-pills" data-tabs="tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#clinic_service" data-toggle="tab">Clinic Services</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#service_category" data-toggle="tab">Service Category</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#service_desc" data-toggle="tab">Service Description</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="tab-content">
                                <div class="tab-pane active" id="clinic_service">
                                    <?php include('clinic_service.php') ?>
                                </div>
                                <div class="tab-pane" id="service_category">
                                    <?php include('service_category.php') ?>
                                </div>
                                <div class="tab-pane" id="service_desc">
                                    <?php include('description.php') ?>
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