<div id="kt_header" class="header header-fixed">
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <div class="header-menu-wrapper container-fluid header-menu-wrapper-left d-flex align-items-center">
            <h5 class="text-dark font-weight-bold">Welcome <?php echo $this->session->userdata('userfullname'); ?></h5>
        </div>
        <div class="topbar container-fluid d-flex justify-content-end">
            <div class="dropdown">
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
                <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                    <ul class="navi navi-hover py-4">
                        <li class="navi-item">
                            <a href="<?php echo base_url() ?>admin/logout" class="navi-link" onclick="localStorage.setItem('once_logged_in','false');">
                                <span class="">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>