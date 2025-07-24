<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("includes.php"); ?>
    <style>
        .fs-1 {
            font-size: 4rem;
        }

        .fs-2 {
            font-size: 3.5rem;
        }

        .fs-3 {
            font-size: 3rem;
        }

        .fs-4 {
            font-size: 2.5rem;
        }

        .fs-5 {
            font-size: 2rem;
        }

        .fs-6 {
            font-size: 1.5rem;
        }

        .fs-xxl {
            font-size: 12rem;
        }

        .fs-xl {
            font-size: 9rem;
        }

        .fs-lg {
            font-size: 6rem;
        }
    </style>
</head>

<body class="counter-scroll header_sticky">
    <!-- Preloader -->
    <div id="loading-overlay">
        <div class="loader"></div>
    </div>
    <div class="wrapper">
        <div id="page">
            <?php $this->load->view("header.php"); ?>
            <?php $img_id = rand(0, count($HEADER_BANNER) - 1); ?>
            <div id="header-baner" style="background-image: url('<?php echo base_url() ?>assets/images/pageimgs/<?php echo $HEADER_BANNER[$img_id]['img'] ?>')">
                <div class="container d-flex align-items-center" style="height:100%;"></div>
            </div>
            <!-- Main Content -->
            <div id="main-content" class="site-main clearfix">
                <div id="content-wrap">
                    <div id="site-content" class="site-content clearfix">
                        <div id="inner-content" class="inner-content-wrap">
                            <div class="page-content">
                                <section class="box-service-details">
                                    <div class="container">
                                        <div id="demo">
                                            <div class="container my-5">
                                                <h1 class="title-heading title-post-heading mb-5"><?php echo $component_text["menu_pulmonary_disease"] ?></h1>
                                                <?php if (count($docs) == 0): ?>
                                                    <div class="w-100 my-10">
                                                        <div class="d-flex justify-content-center align-items-center my-10">
                                                            <div>
                                                                <p class="text-center mb-4"><i class="fa fa-book-open fs-lg"></i></p>
                                                                <h1 class="text-center fs-4"><?php echo $component_text["t_no_documents"] ?></h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <?php for ($i = 0; $i < count($docs); $i++): ?>
                                                        <div class="bg-white p-0 rounded" style="border:1px solid #152847; box-shadow: 0 1px 22px rgb(157 184 209 / 50%)">
                                                            <div class="d-flex justify-content-center px-2 py-2 flex-lg-row flex-column align-items-center rounded-top" style="color:white; background-color:#152847;">
                                                                <div style="text-align:center; font-size:20px; font-family: 'Jost', sans-serif; font-weight:bold">
                                                                    <i class="fa-lg fas fa-file-alt mr-2"></i><?php echo $docs[$i]['title'] ?>
                                                                </div>
                                                                <a class="themesflat-button small pr-1 d-flex align-items-center" href="<?php echo base_url() . 'local/ServeAsset/getFile?category=education&filename=' . $docs[$i]['url'] ?>" target="_blank">
                                                                    <i class="fas fa-arrow-circle-down fa-lg mr-1"></i>
                                                                    <?php echo $component_text['t_download']; ?>
                                                                </a>
                                                            </div>
                                                            <div class="p-4 text-color-title-sidebar text-center" style="background-color:white;">
                                                                <?php echo $docs[$i]['desc'] ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="themesflat-spacer clearfix" data-desktop="50" data-mobile="20" data-smobile="20" style="height:120px"></div>
                                                        </div>
                                                    <?php endfor ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view("footer.php") ?>

        </div>
    </div>
</body>

</html>