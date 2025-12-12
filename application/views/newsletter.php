<!DOCTYPE html>
<html lang="en">

<?php include('includes.php'); ?>

<style>
    .news-panel {
        border-radius: 0.5rem;
        border: 1px solid rgb(234, 236, 240);
        transition: all 0.3s ease 0s;
        max-width: 370px;
        margin: 0px auto;
        overflow: hidden;
        position: relative;
        margin-bottom: 32px;
    }
    .news-panel:hover {
        box-shadow: rgb(42 98 207 / 13%) -16px 16px 32px -12px, rgb(42 207 166 / 13%) 16px 16px 32px -12px;
    }
    .author {
        font-weight: 400;
        font-size: 0.875rem;
        line-height: 1.313rem;
        color: rgb(102, 112, 133);
        margin-bottom: 1rem;
    }
    .title {
        font-weight: 600;
        font-size: 1.125rem;
        line-height: 1.688rem;
        color: rgb(16, 24, 40);
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        margin-bottom: 0;
    }
    .content-card {
        padding: 24px;
        text-align: left;
        background: rgb(252, 252, 253);
        min-height: 140px;
    }
    .news-panel img {
        height: 180px;
        object-fit: cover;
        object-position: center;
    }
</style>

<body>
    <!-- Pre Loader -->
    <div id="loading-overlay">
        <div class="loader"></div>
    </div>
    <!-- Header -->
    <?php include('header.php') ?>
    <!-- Main -->
    <main>
        <?php $img_id = rand(0, count($HEADER_BANNER) - 1); ?>

        <div id="header-baner" style="background-image: url('<?php echo base_url() ?>assets/images/pageimgs/<?php echo $HEADER_BANNER[$img_id]['img'] ?>')">
            <div class="container d-flex align-items-center" style="height:100%;">
                <div class="p-5 col-12 col-md-8">
                    <div style="height:30%; font-size:36px;" class="d-flex align-items-center">
                        <?php echo $HEADER_BANNER[$img_id]['title']; ?>
                    </div>
                    <div style="height:70%; font-size:18px;" class="d-flex align-items-center mt-3">
                        <?php echo $HEADER_BANNER[$img_id]['desc']; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content -->
        <div id="main-content" class="site-main clearfix">
            <div id="content-wrap">
                <div id="site-content" class="site-content clearfix">
                    <div id="inner-content" class="inner-content-wrap">
                        <div class="page-content">
                            <section class="box-service-details">
                                <div class="container">
                                    <div class="row my-5">
                                        <?php for($i=0;$i < count($result);$i++): ?>
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <a href="<?php echo base_url(); ?>Newsletter/detail?id=<?php echo $result[$i]['id'] ?>" target="_blank">
                                                    <div class="news-panel">
                                                        <?php if($result[$i]['img']): ?>
                                                            <img src="<?php echo base_url(); ?>assets/images/newsimg/<?php echo $result[$i]['img'] ?>" />
                                                        <?php else: ?>
                                                            <img src="<?php echo base_url(); ?>assets/images/newsimg/wZxK74kWMG.jpg" />
                                                        <?php endif ?>
                                                        <div class="content-card">
                                                            <div class="author">
                                                                <?php echo $result[$i]['author']; ?> - <?php echo $result[$i]['published']; ?>
                                                            </div>
                                                            <h6 class="title"><?php echo $result[$i]['header']; ?></h6>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php endfor ?>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <?php include('footer.php'); ?>
</body>

</html>
