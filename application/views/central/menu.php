
<div class="sidebar no-print" data-color="purple" data-background-color="white" data-image="<?php echo base_url(),'adminassets/img/sidebar-1.jpg'; ?>">
    <div class="logo"><a href="#" class="simple-text logo-normal">
    <img src="<?php echo base_url(),'assets/images/logo.png'; ?>" alt="" width="200">
    </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item <?php echo $sideitem=='content'?'active':'';?>">
                <a class="nav-link" href="<?php echo base_url(); ?>central/content">
                    <i class="material-icons">library_books</i>
                    <p>Content Management</p>
                </a>
            </li>
            <li class="nav-item <?php echo $sideitem=='insurance'?'active':'';?>">
                <a class="nav-link" href="<?php echo base_url(); ?>central/insurance">
                    <i class="material-icons">local_hospital</i>
                    <p>Insurances</p>
                </a>
            </li>
            <li class="nav-item <?php echo $sideitem=='settings'?'active':'';?>">
                <a class="nav-link" href="<?php echo base_url(); ?>central/settings">
                    <i class="material-icons">settings</i>
                    <p>Settings</p>
                </a>
            </li>
        </ul>
    </div>
</div>