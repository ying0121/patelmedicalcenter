<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top no-print">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <h6 class = "no-print" style = "font-size: 16px;">
                Welcome <?php echo $this->session->userdata('userfullname'); ?>
            </h6>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form d-none">
                <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                    <i class="material-icons">search</i>
                    <div class="ripple-container"></div>
                </button>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>central/phone">
                        <i class="material-icons">phone</i>
                        <p class="d-lg-none d-md-block">
                        Phone
                        </p>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                        <p class="d-lg-none d-md-block">
                            Account
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="<?php echo base_url(); ?>central/logout">Log out</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <input type = 'hidden' class = 'base_url' value = "<?php echo base_url(); ?>" />
</nav>
