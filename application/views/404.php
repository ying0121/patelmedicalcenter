<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="manifest" href="<?php echo base_url() ?>manifest.json">

    <title>404</title>
    <meta name="description" content="<?php echo $meta['meta_desc'] ?>">
    <meta name="theme-color" content="#317EFB">

    <!-- Facebook Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo $meta['facebook_title'] ?>">
    <meta property="og:description" content="<?php echo $meta['facebook_desc'] ?>">
    <meta property="og:image" content="<?php echo base_url() ?>assets/images/facebook_meta.jpg">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="conecxo.com">
    <meta name="twitter:title" content="<?php echo $meta['twitter_title'] ?>">
    <meta name="twitter:description" content="<?php echo $meta['twitter_desc'] ?>">
    <meta name="twitter:image" content="<?php echo base_url() ?>assets/images/twitter_meta.jpg">

    <link rel="icon" href="<?php echo base_url() ?>assets/images/favicon.png" sizes="32x32" />
    <body style="padding: 0; margin: 0">
        <div style="width: 100%; height: 100vh; display: flex; justify-content: center; align-items: center;">
            <div>
                <div style="display: flex; justify-content: center; align-itmes: center;">
                    <div style="margin-top: 10px; margin-bottom: 10px;">
                        <img alt="LOGO" src="<?php echo base_url() ?>assets/images/logo.png" width="360px" />
                    </div>
                </div>
                <div style="display: flex; justify-content: center; align-itmes: center;">
                    <h1>Oops! This Page Not Found!</h1>
                </div>
            </div>
        </div>
    </body>
</head>