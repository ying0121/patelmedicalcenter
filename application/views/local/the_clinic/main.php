<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('local/header'); ?>
        <style>
            .nav-link{
                color:white !important;
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
                        
                        <div class = "row">
                            <div class="col-md-12 bg-primary p-2 mb-2 text-white">
                                <div class="d-flex justify-content-around">
                                    <div class = "d-flex align-items-center" style = "font-size:20px; font-weight:bold;">The Clinic</div>
                                    <ul class="nav nav-tabs nav-pills" data-tabs="tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#contact_info" data-toggle="tab">
                                                Contact info
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#working_hour" data-toggle="tab">
                                                Working Hours
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#additional_info" data-toggle="tab">
                                                Additional Info
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="contact_info">
                                        <?php include('contact_info.php')?>
                                    </div>
                                    <div class="tab-pane" id="working_hour">
                                        <?php include('working_hour.php')?>
                                    </div>
                                    <div class="tab-pane" id="additional_info">
                                        <?php include('additional_info.php')?>
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
