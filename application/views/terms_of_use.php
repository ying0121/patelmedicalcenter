<html lang="en">

<?php include('includes.php'); ?>

<body>
    <div class="row" style="padding-top: 4rem; padding-bottom: 4rem;">
        <div class="col-md-2"></div>
        <div class="col-md-8">
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
        <div class="col-md-2"></div>
    </div>
</body>

<script>
</script>

</html>