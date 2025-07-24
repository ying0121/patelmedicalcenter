<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("includes.php"); ?>

<body class="counter-scroll header_sticky">
    <!-- Preloader -->
    <div id="loading-overlay">
        <div class="loader"></div>
    </div>
    <!-- Header -->
    <?php $this->load->view("header.php"); ?>
    <!-- Main -->
    <main>
        <!-- Parallax Image -->
        <?php $img_id = rand(0, count($HEADER_BANNER) - 1); ?>
        <div class="parallax-container w-100" style="background-image: url('<?php echo base_url() ?>assets/images/pageimgs/<?php echo $HEADER_BANNER[$img_id]['img'] ?>'); height: 500px;">
            <div class="d-flex align-items-center" style="height:100%;"></div>
        </div>
        <!-- Videos -->
        <div class="container mb-4">
            <p class="h1 my-5"><?php echo $component_text["menu_" . $page_type] ?></h1>
            <div class="owl-carousel-review owl-theme">
                <?php for ($i = 0; $i < count($videos); $i++): ?>
                    <div class="post item">
                        <a class="gallery-sec fancybox-media video-icon" style="margin-bottom:0px!important" href="<?php echo $videos[$i]['url'] ?>">
                            <div class="image-hover img-layer-slide-left-right">
                                <iframe width="385" height="300" src="<?php echo $videos[$i]['url'] ?>"></iframe>
                                <div class="layer"> <i class="fa fa-video" style="bottom:41%"></i> </div>
                            </div>
                        </a>
                    </div>
                <?php endfor ?>
            </div>
        </div>
        <!-- Documents -->
        <div class="container mb-5">
            <p class="h3 my-5"><i class="fas fa-book-open fs-3"></i>&nbsp;&nbsp;<?php echo $component_text["v_document"] ?></h1>
            <p class="lead"><?php echo $component_text["t_no_documents"] ?></p>
            <?php for ($i = 0; $i < count($docs); $i++): ?>
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-center justify-content-md-start align-items-center gap-1 gap-md-3">
                        <p class="h4 my-2"><?php echo $docs[$i]['title']; ?></p>
                        <a class="btn btn-danger btn-floating btn-lg" data-mdb-ripple-init href="<?php echo base_url() . 'local/ServeAsset/getFile?category=education&filename=' . $docs[$i]['url'] ?>" target="_blank">
                            <i class="fas fa-download"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="card-title"><?php echo $docs[$i]['desc'] ?></div>
                    </div>
                </div>
            <?php endfor ?>
        </div>
    </main>
    <!-- Footer -->
    <?php $this->load->view("footer.php") ?>
</body>
<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel();

        $('.fancybox-media').fancybox({
            helpers: {
                media: true
            }
        });
    })
</script>

</html>