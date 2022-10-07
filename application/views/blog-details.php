<?php include 'includes/header-link.php' ?>
<div id="main-wrapper">

    <?php include 'includes/header2.php' ?>



    <section>

        <div class="container">
            <div class="row">

                <div class="col-lg-2 col-md-12 col-sm-12 col-12"></div>
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="article_detail_wrapss single_article_wrap format-standard">
                        <div class="article_body_wrap">

                            <div class="article_featured_image">
                                <img class="img-fluid" src="<?= base_url() ?>uploads/blogs/<?= $blog[0]['blog_logo'] ?>" alt="<?= $blog[0]['blog_name'] ?>" width="100%">
                            </div>

                            <div class="article_top_info">
                                <ul class="article_middle_info">
                                    <li><a href="#"><span class="icons"><i class="ti-calender"></i></span><?php echo date_format(date_create($blog[0]['created_date']), 'd--M--Y') ?></a></li>
                                </ul>
                            </div>
                            <h2 class="post-title"><?= $blog[0]['blog_name'] ?></h2>
                            <p><?= $blog[0]['blog_content'] ?></p>

                        </div>
                    </div>


                </div>



            </div>
        </div>

    </section>



    <?php include 'includes/footer.php' ?>
</div>

<?php include 'includes/footer-link.php' ?>