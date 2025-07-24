<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('local/header'); ?>
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
                            <?php foreach($comments as $comments_array): ?>
                            <div class = "col-md-12 mb-2">
                                <div class = "row">
                                    <div class = 'col-auto'>
                                        <img width = "80"  class="avatar-img" src="<?php echo base_url(),'assets/images/common/avatar.png'; ?>">
                                    </div>
                                    <div class = 'col'>
                                        <p><?php echo $comments_array['fname']." ".$comments_array['lname']; ?></p>
                                        <h6 class = 'text-success'><?php echo date("D, M j Y H:i A",strtotime($comments_array['created'])); ?></h6>
                                        <p><?php echo $comments_array['comment']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
