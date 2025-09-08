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
                                    <?php if ($sideitem == 'home'): ?>
                                        Home
                                    <?php else: ?>
                                        Patient Area
                                    <?php endif ?>
                                </div>
                                <ul class="nav nav-tabs nav-pills" data-tabs="tabs">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#invoice" data-toggle="tab">
                                            Invoice
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#payment" data-toggle="tab">
                                            Paid Request
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#contact" data-toggle="tab">
                                            Online Requests
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#report" data-toggle="tab">
                                            Request Reports
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#patient" data-toggle="tab">
                                            Patients
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#vault_document" id="vault_document_nav" data-toggle="tab">
                                            Vault Documents
                                        </a>
                                    </li>
                                    <?php if ($sideitem != 'home'): ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#vault_description" data-toggle="tab">
                                                Descriptions
                                            </a>
                                        </li>
                                    <?php endif ?>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="tab-content">
                                <div class="tab-pane" id="invoice">
                                    <?php include('invoice.php') ?>
                                </div>
                                <div class="tab-pane" id="payment">
                                    <?php include('payment.php') ?>
                                </div>
                                <div class="tab-pane active" id="contact">
                                    <?php include('contact.php') ?>
                                </div>
                                <div class="tab-pane" id="report">
                                    <?php include('request_report.php') ?>
                                </div>
                                <div class="tab-pane" id="patient">
                                    <?php include('patient.php') ?>
                                </div>
                                <div class="tab-pane" id="vault_document">
                                    <?php include('vault_document.php') ?>
                                </div>
                                <div class="tab-pane" id="vault_description">
                                    <?php include('vault_description.php') ?>
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