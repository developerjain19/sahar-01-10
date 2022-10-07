<?php include 'includes/header-link.php';
$social = getAllRow('social_links');

?>
<div id="main-wrapper">

    <?php include 'includes/header2.php' ?>
    <div class="clearfix"></div>
    <?php include 'search-box.php' ?>
    <div class="clearfix"></div>

    <?php
    $cate = getRowById('company_category', 'cate_id', $row[0]['company_category']);
    ?>
    <section class="featured-wraps black" style="background:red url(<?= (($row[0]['company_card_background'] != '') ? base_url() . 'uploads/company/' . $row[0]['company_card_background'] : base_url() . 'assets/images/default-banner.png') ?>) no-repeat; background-position: center;
background-size: cover;">
        <?php
        if ($row[0]['vacrd_style'] != '') {
        ?>
            <div class="abs-list-sec right_pos"><a href="<?= base_url() ?>sahar/<?= url_title($city[0]['name']) ?>/<?= url_title(strtolower($cate[0]['category'])); ?>/<?= $row[0]['company_web_title'] ?>" class="add-list-btn" target="_blank"><i class="fas fa-id-card me-2"></i>Company Website</a></div>
        <?php
        }
        ?>
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-12">
                    <div class="Goodup-ops-bhriol">

                        <div class="author_card_wrapper">
                            <div class="logo">
                                <img src="<?= base_url() ?>uploads/company/<?= $row[0]['company_logo']; ?>" alt="">
                            </div>
                            <div class="name">
                                <i class="fas fa-user"></i>
                                <h4><?= $row[0]['company_name']; ?></h4>
                            </div>
                            <div class="contact_detials">
                                <?php
                                if ($row[0]['company_contact'] != '') {
                                ?>
                                    <a class="call" href="tel:<?= $row[0]['company_contact'] ?>">
                                        <i class="fas fa-phone-alt"></i>
                                        <h5>+91 <?= $row[0]['company_contact'] ?></h5>
                                    </a>
                                <?php
                                }
                                ?>
                                <?php
                                if ($row[0]['company_whatsapp'] != '') {
                                ?>
                                    <a class="whatsapp" href="https://api.whatsapp.com/send?phone=+91 <?= $row[0]['company_whatsapp'] ?> &text=Hello..." target="_blank">
                                        <i class="lni lni-whatsapp"></i>
                                        <h5>+91 <?= $row[0]['company_whatsapp'] ?></h5>
                                    </a>
                                <?php
                                }
                                ?>
                                <?php
                                if ($row[0]['company_email'] != '') {
                                ?>
                                    <a class="mail" href="mailto:<?= $row[0]['company_email'] ?>" target="_blank">
                                        <i class="fas fa-envelope"></i>
                                        <h5><?= $row[0]['company_email'] ?></h5>
                                    </a>
                                <?php
                                }
                                ?>
                                <?php
                                if ($row[0]['company_address'] != '') {
                                ?>
                                    <a class="website" href="<?= $row[0]['company_address'] ?>" target="_blank">
                                        <i class="fa-solid fa-map-marker"></i>
                                        <h5><?= $row[0]['company_address'] ?></h5>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="social_icon">

                                <a href="<?= (($row[0]['company_facebook'] != '') ? $row[0]['company_facebook'] : $social[0]['fb']) ?>" target="_blank"><i class="lni lni-facebook-filled"></i></a>
                                <a href="<?= (($row[0]['company_instagram'] != '') ? $row[0]['company_instagram'] : $social[0]['insta'])  ?>" target="_blank"><i class="lni lni-instagram"></i></a>
                                <a href="<?= (($row[0]['company_twitter'] != '') ? $row[0]['company_twitter'] : $social[0]['twitter'])  ?>" target="_blank"><i class="lni lni-twitter-filled"></i></a>
                                <a href="<?= (($row[0]['company_linkedin'] != '') ? $row[0]['company_linkedin'] : $social[0]['linkedin'])  ?>" target="_blank"><i class="lni lni-linkedin"></i></a>
                                <a href="<?= (($row[0]['company_youtube'] != '') ? $row[0]['company_youtube'] : $social[0]['youtube'])  ?>" target="_blank"><i class="lni lni-youtube"></i></a>
                                <a href="<?= (($row[0]['company_telegram'] != '') ? $row[0]['company_telegram'] : $social[0]['telegram'])  ?>" target="_blank"><i class="lni lni-telegram"></i></a>



                            </div>
                        </div>

                        <!-- <div class="Goodup-lkp-flex d-flex align-items-start justify-content-start bg-white author-bg">
<div class="Goodup-lkp-thumb">

    <?php
    if ($row[0]['company_logo'] != '') {

    ?>
        <img src="<?= base_url() ?>uploads/company/<?= $row[0]['company_logo']; ?>" class="img-fluid" alt="company-logo" width="90" />
    <?php

    } else {
    ?>
        <img src="<?php echo base_url() . 'assets/images/user_logo.png' ?>" class="img-fluid" alt="company-logo" width="90" />
    <?php
    }
    ?>


</div>
<div class="Goodup-lkp-caption ps-3">
    <div class="Goodup-lkp-title">
        <h1 style="color: #000;" class="mb-0 ft-bold text-black"><?= $row[0]['company_name']; ?></h4>
    </div>
    <div style="color: #000" class="Goodup-location text-black"><i class="fas fa-phone me-1 theme-cl"></i> +91 <?= $row[0]['company_contact'] ?> </div>
    <div class="Goodup-location text-black"><i class="fas fa-envelope me-1 theme-cl"></i> <?= $row[0]['company_email'] ?> </div>

    <div class="Goodup-location text-black"><i class="fas fa-map-marker-alt me-1 theme-cl"></i> <?= $row[0]['company_address'] ?></div>
</div>
</div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="gray py-5 position-relative listing_margin_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                    <?php
                    $gallery = getRowById('company_gallery', 'company_id', $row[0]['rgid']);

                    if ($gallery > 0) {
                    ?>
                        <div class="featured-slick mb-4 boxshadow">
                            <div class="featured-gallery-slide">

                                <?php foreach ($gallery as $roww) { ?>
                                    <div class="dlf-flew auto"><a href="<?= base_url() ?>uploads/gallery/<?= $roww['image'] ?>" class="mfp-gallery"><img src="<?= base_url() ?>uploads/gallery/<?= $roww['image'] ?>" class="img-fluid mx-auto gal-img" alt="<?= $roww['title'] ?>" /></a></div>

                                <?php
                                }
                                ?>


                            </div>
                        </div>

                    <?php
                    } ?>


                    <?php

                    if ($row[0]['company_about'] != '') {
                    ?>
                        <div class="bg-white rounded mb-4">
                            <div class="jbd-01 px-4 py-4">
                                <div class="jbd-details">
                                    <h5 class="ft-bold fs-lg">About the Business</h5>

                                    <div class="d-block mt-3">
                                        <p> <?= $row[0]['company_about'] ?>
                                        </p>

                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    $product = getRowById('product', 'company_id', $row[0]['rgid']);

                    if ($product > 0) {
                    ?>

                        <div class="dashboard-widg-bar d-block">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="dashboard-list-wraps bg-white rounded mb-4">
                                        <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                            <div class="dashboard-list-wraps-flx">
                                                <h5 class="ft-bold fs-lg"> Our Product</h5>
                                            </div>
                                        </div>

                                        <div class="dashboard-list-wraps-body py-3 px-3">
                                            <div class="dashboard-listing-wraps">

                                                <?php foreach ($product as $pro) { ?>

                                                    <div class="dsd-single-listing-wraps row">
                                                        <div class="dsd-single-lst-thumb col-sm-3"> <img src="<?= base_url() ?>uploads/product/<?= $pro['product_image'] ?>" class="img-fluid" alt="" /></div>


                                                        <div class="dsd-single-lst-caption col-sm-9">
                                                            <div class="dsd-single-lst-title">

                                                                <h5>
                                                                    <?= $pro['product_title'] ?>
                                                                </h5>

                                                            </div>
                                                            <?php if ($pro['product_price'] != '') { ?>
                                                                <div class="lkji-oiyt"><span>Old Price </span>
                                                                    <del>
                                                                        <h5 class="theme-cl ft-bold fs-sm">Rs.
                                                                            <?= $pro['product_price'] ?>
                                                                        </h5>
                                                                    </del>
                                                                </div> <br>
                                                            <?php
                                                            }
                                                            ?>
                                                            <div class="lkji-oiyt"><span>Offer Price </span>
                                                                <h5 class="theme-cl ft-bold">Rs.
                                                                    <?= $pro['offer_price'] ?>
                                                                </h5>
                                                            </div>
                                                            <div class="ico-content">
                                                                <div class="Goodup-ft-first">
                                                                    <?= $pro['product_description'] ?>
                                                                </div>
                                                            </div>
                                                            <div class="dsd-single-lst-footer">
                                                                <a <a target="_blank" href="https://api.whatsapp.com/send?phone=+91 <?= $row[0]['company_whatsapp'] ?>&text=Hi, I have query about - *<?= $pro['product_title'] ?>.*" class="btn btn-edit mr-1">Query Now </a>

                                                            </div>

                                                        </div>
                                                    </div>



                                                <?php
                                                } ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                    <?php
                    } ?>
                    <div class="bg-white rounded mb-4">
                        <div class="jbd-01 px-4 py-4">
                            <div class="jbd-details mb-4">
                                <h5 class="ft-bold fs-lg">Location & Hours</h5>
                                <div class="Goodup-lot-wrap d-block">
                                    <div class="row g-4">
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="list-map-lot">
                                                <!--<iframe width="100%" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" -->
                                                <!--src="https://maps.google.it/maps?q=<?php echo $row[0]['company_address'] . ' ' . $row[0]['pin_code'] .  ' ' . $city[0]['name'] . ' ' . $state[0]['state_name'] ?>&output=embed"></iframe>-->


                                                <iframe width="100%" height="250" style="border:0" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCPkme9OgttArZPoPiib-_7uk8U6IegnAs
                                                &q=<?php echo $row[0]['company_address'] . ' ' . $row[0]['pin_code'] .  ' ' . $city[0]['name'] . ' ' . $state[0]['state_name'] ?>">
                                                </iframe>



                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    // $review = getRowById('reviews', 'compasny_id', $row[0]['rgid']);
                    $review = runQuery("SELECT * FROM `reviews` where company_id = " . $row[0]['rgid'] . "  order by `rid` DESC LIMIT 5");

                    if ($review > 0) {
                    ?>

                        <div class="bg-white rounded mb-4">
                            <div class="jbd-01 px-4 py-4">
                                <div class="jbd-details mb-4">
                                    <h5 class="ft-bold fs-lg">Our Reviews</h5>
                                    <div class="reviews-comments-wrap">

                                        <?php foreach ($review as $rev) { ?>
                                            <!-- reviews-comments-item -->
                                            <div class="reviews-comments-item">
                                                <div class="review-comments-avatar">
                                                    <img src="<?= base_url() ?>assets/images/default_user.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="reviews-comments-item-text">



                                                    <h4 class="mob_view_review"><a href="#"><?= $rev['name'] ?></a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl me-1"></i><?= convertDatedmy($rev['create_date']); ?></span></h4>

                                                    <div class="listing-rating high">
                                                        <?php
                                                        switch ($rev['rating']) {
                                                            case "1":
                                                        ?>
                                                                <i class="fas fa-star active"></i>
                                                                <i class="fas fa-star "></i><i class="fas fa-star "></i>
                                                                <i class="fas fa-star "></i><i class="fas fa-star "></i>
                                                            <?php
                                                                break;
                                                            case "2":
                                                            ?>
                                                                <i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star "></i><i class="fas fa-star "></i><i class="fas fa-star "></i>
                                                            <?php
                                                                break;
                                                            case "3":
                                                            ?>
                                                                <i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star "></i><i class="fas fa-star "></i>
                                                            <?php
                                                                break;
                                                            case "4":
                                                            ?>
                                                                <i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star "></i>
                                                            <?php
                                                                break;
                                                            case "5":
                                                            ?>
                                                                <i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i>
                                                            <?php
                                                                break;
                                                            default:
                                                            ?>
                                                                <i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <p style="word-break: break-all;">" <?= $rev['review'] ?> "</p>

                                                    <!-- <p class="review_tag"><?= ($rev['type'] == 0) ? "Company" : "Vcard/website" ?></p> -->
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <!-- Drop Your Review -->
                    <div class="bg-white rounded mb-4">
                        <div class="jbd-01 px-4 py-4">
                            <div class="jbd-details mb-4">
                                <h5 class="ft-bold fs-lg">Drop Your Review</h5>
                                <!-- <p class="text-danger">Please fill all the details </p> -->
                                <div class="review-form-box form-submit mt-3">
                                    <form name="formsubmit" action="<?= base_url('Home/review_submit') ?>" method="POST">
                                        <?php
                                        if ($this->session->has_userdata('rmsg')) {
                                            echo $this->session->userdata('rmsg');
                                            $this->session->unset_userdata('rmsg');
                                        }
                                        ?>

                                        <div class="row">

                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <label class="ft-medium small mb-1">Rate Us *</label>
                                                <div class="feedback">
                                                    <div class="rating">
                                                        <input type="radio" name="rating" id="rating-5" value="5" checked>
                                                        <label for="rating-5"></label>
                                                        <input type="radio" name="rating" id="rating-4" value="4">
                                                        <label for="rating-4"></label>
                                                        <input type="radio" name="rating" id="rating-3" value="3">
                                                        <label for="rating-3"></label>
                                                        <input type="radio" name="rating" id="rating-2" value="2">
                                                        <label for="rating-2"></label>
                                                        <input type="radio" name="rating" id="rating-1" value="1">
                                                        <label for="rating-1"></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="hidden" class="form-control b-0 ps-2" name="company_id" value="<?= $row[0]['rgid'] ?>">
                                            <input type="hidden" class="form-control b-0 ps-2" name="type" value="0">

                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label class="ft-medium small mb-1">Name</label>
                                                    <input class="form-control rounded" type="text" name="name" placeholder="Your Name" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label class="ft-medium small mb-1">Email</label>
                                                    <input class="form-control rounded" type="email" name="email" placeholder="Your Email" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label class="ft-medium small mb-1">Review</label>
                                                    <textarea class="form-control rounded ht-140" maxlength="160" name="review" placeholder="Review" required></textarea>
                                                    <div id="the-count" style="text-align: right;">
                                                        <span id="current">0</span>
                                                        <span id="maximum">/ 160</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn theme-bg text-light rounded">Submit Review</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Sidebar -->
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">

                    <!-- order Booking -->
                    <div class="jb-apply-form bg-white rounded py-4 px-4 mb-4">
                        <h4 class="ft-bold mb-1">Enquiry Now</h4>
                        <!-- <p class="text-danger">Please fill all the details </p> -->

                        <br>

                        <form class="_apply_form_form" name="form_submit" method="POST" action="<?= base_url('Home/enquiry_submit') ?>">
                            <?php
                            if ($this->session->has_userdata('msg')) {
                                echo $this->session->userdata('msg');
                                $this->session->unset_userdata('msg');
                            }
                            ?>

                            <input type="hidden" class="form-control b-0 ps-2" name="company_id" value="<?= $row[0]['company_id'] ?>">
                            <input type="hidden" class="form-control b-0 ps-2" name="type" value="0">

                            <div class="form-group">
                                <div class="side-search-item">
                                    <input type="text" class="form-control b-0 ps-2" name="name" placeholder="Enter Your Name" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="side-search-item">
                                    <input type="tel" class="form-control b-0 ps-2" name="number" placeholder="Enter Number" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="side-search-item">
                                    <!--<input class="form-control b-0 ps-2" maxlength="160" name="msg" id="enquirytext" placeholder="Enter Message(160 Words)" required>-->
                                    <textarea class="form-control b-0 ps-2" maxlength="160" name="msg" id="enquirytext" placeholder="Enter Message(160 Words)" required style="height: 49px !important; margin-top: 0px;"></textarea>

                                </div>
                                <div id="sthe-count" style="text-align: right;">
                                    <span id="scurrent">0</span>
                                    <span id="smaximum">/ 160</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn btn-md rounded theme-bg text-light ft-medium fs-sm full-width">
                            </div>
                        </form>
                    </div>

                    <div class="jb-apply-form bg-white rounded py-4 px-4 mb-4">
                        <div class="uli-list-info">
                            <ul>
                                <li>
                                    <div class="list-uiyt">
                                        <div class="list-iobk"><i class="fas fa-envelope"></i></div>
                                        <div class="list-uiyt-capt">
                                            <h5>Drop a Mail</h5>
                                            <p><?= $row[0]['company_email'] ?></p>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="list-uiyt">
                                        <div class="list-iobk"><i class="fas fa-phone"></i></div>
                                        <div class="list-uiyt-capt">
                                            <h5>Call Us</h5>
                                            <p>+91 <?= $row[0]['company_contact'] ?> </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-uiyt">
                                        <div class="list-iobk"><i class="fas fa-map-marker-alt"></i></div>
                                        <div class="list-uiyt-capt">
                                            <h5>Get Directions</h5>
                                            <p><?= $row[0]['company_address'] ?> , <?= $row[0]['pin_code'] ?> <?= $city[0]['name'] ?> <?= $state[0]['state_name'] ?></p>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php include 'includes/footer.php' ?>
</div>

<?php include 'includes/footer-link.php' ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script>
    $('#enquirytext').keyup(function() {

        var scharacterCount = $(this).val().length,
            scurrent = $('#scurrent'),
            smaximum = $('#smaximum'),
            stheCount = $('#sthe-count');

        scurrent.text(scharacterCount);


        /*This isn't entirely necessary, just playin around*/
        if (scharacterCount < 70) {
            scurrent.css('color', '#666');
        }
        if (scharacterCount > 70 && scharacterCount < 90) {
            scurrent.css('color', '#6d5555');
        }
        if (scharacterCount > 90 && scharacterCount < 100) {
            scurrent.css('color', '#793535');
        }
        if (scharacterCount > 100 && scharacterCount < 120) {
            scurrent.css('color', '#841c1c');
        }
        if (scharacterCount > 120 && scharacterCount < 139) {
            scurrent.css('color', '#8f0001');
        }

        if (scharacterCount >= 140) {
            smaximum.css('color', '#8f0001');
            scurrent.css('color', '#8f0001');
            stheCount.css('font-weight', 'bold');
        } else {
            smaximum.css('color', '#666');
            stheCount.css('font-weight', 'normal');
        }


    });

    $('textarea').keyup(function() {

        var characterCount = $(this).val().length,
            current = $('#current'),
            maximum = $('#maximum'),
            theCount = $('#the-count');

        current.text(characterCount);


        /*This isn't entirely necessary, just playin around*/
        if (characterCount < 70) {
            current.css('color', '#666');
        }
        if (characterCount > 70 && characterCount < 90) {
            current.css('color', '#6d5555');
        }
        if (characterCount > 90 && characterCount < 100) {
            current.css('color', '#793535');
        }
        if (characterCount > 100 && characterCount < 120) {
            current.css('color', '#841c1c');
        }
        if (characterCount > 120 && characterCount < 139) {
            current.css('color', '#8f0001');
        }

        if (characterCount >= 140) {
            maximum.css('color', '#8f0001');
            current.css('color', '#8f0001');
            theCount.css('font-weight', 'bold');
        } else {
            maximum.css('color', '#666');
            theCount.css('font-weight', 'normal');
        }


    });
    $(document).ready(function() {
        $(".myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#mytable div").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    $("form[name='form_submit']").validate({

        errorClass: "error fail-alert",
        validClass: "valid success-alert",
        submitHandler: function(form) {
            $(".btn").text("").html("Loading.. <i class='fa fa-spin fa-spinner'></i>").attr('disabled', true);
            form.submit();
        }
    });
    $("form[name='formsubmit']").validate({

        errorClass: "error fail-alert",
        validClass: "valid success-alert",
        submitHandler: function(form) {
            $(".btn").text("").html("Loading.. <i class='fa fa-spin fa-spinner'></i>").attr('disabled', true);
            form.submit();
        }
    });
</script>