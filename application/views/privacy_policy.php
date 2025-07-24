<!DOCTYPE html>
<html lang="en">

<?php include('includes.php'); ?>

<body>
    <!-- Pre Loader -->
    <div id="loading-overlay">
        <div class="loader"></div>
    </div>
    <!-- Header -->
    <?php include('header.php') ?>
    <!-- Main -->
    <div class="wrapper">
        <div id="page">
            <div class="row bg-light-gray" style="padding-top: 4rem; padding-bottom: 4rem;">
                <div class="col-md-2"></div>
                <div class="col-md-8 bg-white p-5">
                    <div class="p-3">
                        <?php
                        $desc = $info['desc'];
                        if ($desc) {
                            $desc = str_replace('$clinic_name', $contact_info['name'], $desc);
                            $desc = str_replace('$contact_phone', $contact_info['tel'], $desc);
                            $desc = str_replace('$contact_email', $contact_info['email'], $desc);
                            $desc = str_replace('$contact_address', $contact_info['address'], $desc);
                            $desc = str_replace('$last_updated_date', "03/30/2025", $desc);
                            echo $desc;
                        } else {
                            echo "";
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include('footer.php'); ?>
</body>

</html>