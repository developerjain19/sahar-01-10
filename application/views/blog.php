<?php include 'includes/header-link.php' ?>
<div id="main-wrapper">

    <?php include 'includes/header2.php' ?>

    <section class="middle">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="sec_title position-relative text-center mb-5">
                        <h6 class="theme-cl mb-0">Blogs</h6>
                        <h2 class="ft-bold">View Recent Updates</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                <?php
                if ($blogs != '') {
                    foreach ($blogs as $blog) {
                ?>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="gup_blg_grid_box">
                                <div class="gup_blg_grid_thumb">
                                    <a href="blog-detail/<?php echo $blog['blog_id']; ?>"><img src="uploads/blogs/<?php echo 'blog-min.jpg'; ?>" class="img-fluid" alt=""></a>
                                </div>
                                <div class="gup_blg_grid_caption">

                                    <div class="blg_title">
                                        <h4><a href="blog-detail/<?php echo $blog['blog_id']; ?>"><?php echo $blog['blog_name']; ?></a></h4>
                                    </div>
                                    <div class="blg_desc">
                                        <p><?php echo $blog['blog_content']; ?></p>
                                    </div>
                                </div>
                                <div class="crs_grid_foot">
                                    <div class="crs_flex br-top px-3 py-2">
                                        <div class="crs_fl_last">
                                            <div class="foot_list_info">
                                                <ul class="blog_ul">
                                                    <li>
                                                        <div class="elsio_ic"><i class="fa fa-eye text-success"></i></div>
                                                        <a href="blog-detail/<?php echo $blog['blog_id']; ?>">Read More</a>
                                                    </li>
                                                    <li class="text-right">
                                                        <div class="elsio_ic"><i class="fa fa-clock text-warning"></i></div>
                                                        <div class="elsio_tx"><?php echo date_format(date_create($blog['created_date']), 'd M ,Y') ?></div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>


        </div>

</div>
</section>



<?php include 'includes/footer.php' ?>
</div>

<?php include 'includes/footer-link.php' ?>