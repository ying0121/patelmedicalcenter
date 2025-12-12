<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="manifest" href="<?php echo base_url() ?>manifest.json">

    <title><?php echo $meta['meta_title'] ?> </title>
    <meta name="description" content="<?php echo $meta['meta_desc'] ?>">
    <meta name="theme-color" content="#317EFB">

    <!-- Facebook Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo $meta['facebook_title'] ?>">
    <meta property="og:description" content="<?php echo $meta['facebook_desc'] ?>">
    <meta property="og:image" content="<?php echo base_url() ?>assets/images/<?php echo $result['meta_img'] ? $result['meta_img'] : 'facebook_meta.jpg' ?>">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="conecxo.com">
    <meta name="twitter:title" content="<?php echo $meta['twitter_title'] ?>">
    <meta name="twitter:description" content="<?php echo $meta['twitter_desc'] ?>">
    <meta name="twitter:image" content="<?php echo base_url() ?>assets/images/<?php echo $result['meta_img'] ? $result['meta_img'] : 'twitter_meta.jpg' ?>">

    <link rel="icon" href="<?php echo base_url() ?>assets/images/favicon.png" sizes="32x32" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- Index Css -->
    <link href="<?php echo base_url() ?>assets/css/index.css" rel="stylesheet" />
    <!-- Projects Carousel -->
    <link href="<?php echo base_url() ?>assets/css/project-carousel.css" rel="stylesheet" />
    <!-- Need Popup -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/needpopup/needpopup.min.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.theme.css">
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/9.1.0/mdb.min.css" rel="stylesheet" />
    <!-- DataTable -->
    <link href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
</head>