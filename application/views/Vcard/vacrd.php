<?php
$menu = '';
$cate = getRowById('company_category', 'cate_id', $website[0]['company_category']);

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$view = $website[0]['website_views'];
$view = $view + 1;

updateRowById('company', 'company_id', $website[0]['company_id'], array('website_views' => $view));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300&family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/vcard/vcard-style-<?= $website[0]['vacrd_style'] ?>.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v14.0" nonce="T4bzSPEK"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/vcardstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <link rel="icon" href="<?php if (!empty($website[0]['company_logo'])) {
                                echo base_url() . 'uploads/company/' . $website[0]['company_logo'];
                            } else {
                                echo base_url() . 'assets/images/user_logo.png';
                            }  ?>" type="image/png" />


    <meta property="og:image" itemprop="image" content="<?php if (!empty($website[0]['company_logo'])) {
                                                            echo base_url() . 'uploads/company/' . $website[0]['company_logo'];
                                                        } else {
                                                            echo base_url() . 'uploads/company/' . $website[0]['company_banner'];
                                                        } ?>" />
    <meta property="og:type" content="website" />


    <meta property="og:description" content="<?= $website[0]['company_name'] ?> (<?= $website[0]['company_tagline'] ?>)" />


    <?php if ($website[0]['company_type'] == '1') { ?>

        <title><?= $website[0]['company_person'] ?> | <?= $website[0]['company_designation'] ?> </title>

    <?php

    } else {
    ?>
        <title><?= $website[0]['company_name'] ?> | <?= (($website[0]['company_tagline'] == '') ? '' : '( ' . $website[0]['company_designation'] . ' )') ?> </title>


    <?php
    }
    ?>

    <link rel="icon" href="<?php if (!empty($website[0]['company_logo'])) {
                                echo base_url() . 'uploads/company/' . $website[0]['company_logo'];
                            } else {
                                echo base_url() . 'assets/images/user_logo.png';
                            } ?>" type="image/png" />
</head>

<body>
    <?php if (!empty($website[0]['company_banner'])) {  ?>
        <div class="vcard-wrapper two">

            <div class="grid">
                <img src="<?= base_url() ?>uploads/company/<?= $website[0]['company_banner'] ?>" alt="<?= $website[0]['company_name'] ?>" width="100%" height="50%" />
            </div>

        </div>
    <?php  }
    ?>

    <div class="vcard-wrapper">

        <div class="vcard-style-<?= (($website[0]['vacrd_style'] != '') ? $website[0]['vacrd_style'] : '') ?>" id="home">
            <?php
            if ($website[0]['vacrd_style'] == '10') {
            ?>
                <div class="white_layer"></div>
            <?php
            }
            ?>
            <div class="logo grid">
                <img src="<?php if (!empty($website[0]['company_logo'])) {
                                echo base_url() . 'uploads/company/' . $website[0]['company_logo'];
                            } else {
                                echo base_url() . 'assets/images/user_logo.png';
                            } ?>" alt="<?= $website[0]['company_name'] ?>">
            </div>
            <div class="person">
                <i class="fa-solid fa-user"></i>
                <div class="name">
                    <h4><?= $website[0]['company_person'] ?></h4>
                    <span><?= $website[0]['company_name'] ?></span>
                </div>
            </div>
            <div class="side_icons" <?= ($website[0]['vacrd_style'] == 7) ? "style='display: none;'" : "" ?>>
                <a target="_blank" href="tel:<?= $website[0]['company_contact'] ?>"><i class="fa-solid fa-phone"></i></a>
                <a target="_blank" href="https://api.whatsapp.com/send?phone=+91 <?= $website[0]['company_whatsapp'] ?> &text=Hello..."><i class="fa-brands fa-whatsapp"></i></a>
                <a target="_blank" href="mailto:<?= $website[0]['company_email'] ?>"><i class="fa-solid fa-envelope"></i></a>
                <?php if ($website[0]['company_website_url'] != '') { ?>
                    <a target="_blank" href="<?= $website[0]['company_website_url'] ?>"><i class="fa-solid fa-earth-africa"></i></a>
                <?php } else {
                ?>
                    <a target="_blank" href="<?= $actual_link ?>"><i class="fa-solid fa-earth-africa"></i></a>
                <?php
                }
                ?>
                <a target="_blank" href=""><i class="fa-solid fa-location-dot"></i></a>
            </div>

            <?php
            if ($website[0]['vacrd_style'] == 7) {
            ?>

                <?php

                ?>

                <div class="side_icons">

                    <a target="_blank" href="tel:<?= $website[0]['company_contact'] ?>"><i class="fa-solid fa-phone"></i> <br> <span>+91 <?= $website[0]['company_contact'] ?></span></a>
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=+91<?= $website[0]['company_whatsapp'] ?>&text=Hello..."><i class="fa-brands fa-whatsapp"></i><br> <span>+91 <?= $website[0]['company_whatsapp'] ?></span></a>
                    <a target="_blank" href="mailto:<?= $website[0]['company_email'] ?>"><i class="fa-solid fa-envelope"></i><br> <span><?= $website[0]['company_email'] ?></span></a>
                    <?php if ($website[0]['company_website_url'] != '') { ?>
                        <a target="_blank" href="<?= $website[0]['company_website_url'] ?>"><i class="fa-solid fa-earth-africa"></i><br> <span><?= $website[0]['company_website_url'] ?></span></a>
                    <?php
                    } else {
                    ?>
                        <a target="_blank" href="<?= $actual_link ?>"><i class="fa-solid fa-earth-africa"></i><br> <span><?= substr($actual_link, 0, 30) ?>...</span></a>

                    <?php
                    }
                    ?>
                    <a target="_blank" href=""><i class="fa-solid fa-location-dot"></i><br> <span><?= $website[0]['company_address'] ?></span></a>
                </div>
            <?php
            }
            ?>

            <ul class="person-details" <?= ($website[0]['vacrd_style'] == 7) ? "style='display: none;'" : "" ?>>
                <!--<li class="mob-no"><a href="tel:<?= $website[0]['company_contact'] ?>"> <?= (($website[0]['company_contact'] == '') ? 'Not Provided' : '+91 ' . $website[0]['company_contact']) ?></a></li>-->
                <li class="mob-no"><a target="_blank" href="tel:<?= $website[0]['company_contact'] ?>"> <?= (($website[0]['company_contact'] == '') ? 'Not Provided' : '+91 ' . substr($website[0]['company_contact'], 0, 5) . ' ' . substr($website[0]['company_contact'], 5)) ?></a></li>
                <li class="whatsapp"><a target="_blank" href="https://api.whatsapp.com/send?phone=+91 <?= $website[0]['company_whatsapp'] ?>&text=Hello...">+91 <?= substr($website[0]['company_whatsapp'], 0, 5) . ' ' . substr($website[0]['company_whatsapp'], 5) ?></a></li>
                <li class="mail"><a target="_blank" href="mailto:<?= $website[0]['company_email'] ?>"><?= $website[0]['company_email'] ?></a></li>
                <?php if ($website[0]['company_website_url'] != '') { ?>
                    <li class="website"><a target="_blank" href="<?= $website[0]['company_website_url'] ?>"><?= $website[0]['company_website_url'] ?></a></li>
                <?php
                } else {
                ?>
                    <li class="website"><a target="_blank" href="<?= $actual_link ?>"><?= substr($actual_link, 0, 30) ?>...</a></li>
                <?php
                }
                ?>

                <?php
                if ($website[0]['vacrd_style'] == 4) {
                ?>
                    <div class="add">
                        <li class="address"><a href=""><span><?= $website[0]['company_address'] ?></span></a></li>
                    </div>
                <?php
                } else {
                ?>
                    <li class="address"><a href=""><span><?= $website[0]['company_address'] ?></span></a></li>
                <?php
                }
                ?>

            </ul>




            <?php
            if ($website[0]['vacrd_style'] == 5) {
            ?>
                <div class="address">
                    <h5>Location</h5>
                    <p><?= $website[0]['company_address'] ?></p>
                </div>
            <?php
            }
            ?>



            <ul class="footer-links">




                <li><a target="_blank" href="<?= (($website[0]['company_facebook'] != '') ? $website[0]['company_facebook'] : $link[0]['fb']) ?>"><i class="fa-brands fa-facebook-f"></i></a></li>


                <li><a target="_blank" href="<?= (($website[0]['company_instagram'] != '') ? $website[0]['company_instagram'] :  $link[0]['instagram']) ?>"> <i class="fa-brands fa-instagram"></i></a></li>


                <li><a target="_blank" href="<?= (($website[0]['company_twitter'] != '') ? $website[0]['company_twitter'] : $link[0]['twitter']) ?>"><i class="fa-brands fa-twitter"></i></a></li>


                <li> <a target="_blank" href="<?= (($website[0]['company_linkedin'] != '') ? $website[0]['company_linkedin'] : $link[0]['linkedin']) ?>"><i class="fa-brands fa-linkedin-in"></i></a></li>

                <li> <a target="_blank" href="<?= (($website[0]['company_telegram'] != '') ? $website[0]['company_telegram'] : $link[0]['telegram']) ?>"><i class="fa-brands fa-telegram"></i></a></li>


                <li> <a target="_blank" href="<?= (($website[0]['company_youtube'] != '') ? $website[0]['company_youtube'] : $link[0]['youtube']) ?>"><i class="fa-brands fa-youtube"></i></a></li>


            </ul>
        </div>

        <div class="vcard-body-wrapper">
            <h3>Share Your Vcard</h3>
            <div class="row">
                <div class="col-sm-6 border whatsapp_wrapper">
                    <span class="c__code">+91</span>
                    <input type="tel" id="phonenum" class=" wp" placeholder="Enter whatsapp number" style="" maxlength="10" />
                </div>
                <div class="col-sm-6 bg-success wa_share_btn" style="padding: 10px 0;">
                    <a class="whatsapp-button text-white" style="margin-left: 10px; font-size: 14px" href="" id="whatsappshare" target="_blank">
                        <i class="fa-brands fa-whatsapp" style="background:none;font-size:18px; color: #fff"></i> &nbsp; Share on Whatsapp
                    </a>
                </div>
                <div class="col-sm-12 mt-3" style="padding: 10px 0;">
                    <a class="btn text-white addtophone" style="width: 100%; padding: 10px; font-size: 14px;" href="<?= base_url() ?>get_company_vcontact?id=<?= $website[0]['company_id'] ?>">
                        <i class="fa fa-arrow-circle-down" style="background:none;font-size:18px; color: #fff"></i> &nbsp; Add To Phone
                    </a>
                </div>

                <div class="col-sm-6 bg-success d-none" style="padding: 10px 0;">
                    <a class="btn btn-success text-white" style="margin-left: 10px" href="" id="whatsappshare" target="_blank">
                        <i class="fa fa-share-alt" style="background:none;font-size:18px; color: #fff"></i> &nbsp; Share
                    </a>
                </div>


                <div class="social-share">
                    <label class="toggle" for="toggle">
                        <input type="checkbox" id="toggle" />
                        <div class="btns">
                            <i class="fas fa-share-alt"></i>
                            <i class="fas fa-times"></i>
                            <div class="social">
                                <a href=whatsapp://send?text=<?= $actual_link ?>" data-action="share/whatsapp/share" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on whatsapp" class="whatsapp""><i class=" fab fa-whatsapp"></i></a>


                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $actual_link ?>&t=<?= $website[0]['company_name'] ?>" onclick="javascript:window.open(this.href, '',
    'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook"><i class="fab fa-facebook"></i>
                                </a>


                                <a href="https://twitter.com/intent/tweet?text=<?= $actual_link ?>" target="_blank" >
                                    <i class=" fab fa-twitter"></i>

                                </a>
                            </div>
                        </div>
                    </label>
                </div>


            </div>
        </div>






        <?php
        if ($website[0]['company_about'] == '') {
        } else {
            $menu .= '<li><a href="#about"><i class="material-icons">About</i></a></li>';
        ?>

            <div class="vcard-body-wrapper" id="about">
                <h3>About Us</h3>
                <p><?= $website[0]['company_about'] ?>
                </p>

            </div>

        <?php
        }
        ?>



        <?php

        $banner1 = getRowById('banner', 'location', '0');

        if ($banner1 != '') {
            foreach ($banner1 as $ban) {

                $om = explode(',', $ban["banner_content"]);
                foreach ($om as $com) {
                    if ($com == $website[0]['company_id']) {
        ?>

                        <div class="vcard-body-wrapper">

                            <a href="<?= $ban['banner_name'] ?>" target="_blank"><img src="<?= base_url() ?>uploads/advertise/<?= $ban['banner_logo'] ?>" class="img-responsive" /></a>

                        </div>

        <?php
                    }
                }
            }
        }

        ?>





        <?php

        $pro =  getRowById('product', 'company_id',  $website[0]['rgid']);
        if ($pro > 0) {

            $menu .= '<li><a href="#product"><i class="material-icons">Product</i></a></li>';
        ?>

            <div class="vcard-body-wrapper mobile_view" id="product">
                <h3>Product</h3>
                <?php
                foreach ($pro as $product) {
                ?>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="Goodup-author-wrap ">

                            <div class="Goodup-author-thumb dlf-flew grid"><img src="<?= base_url() ?>uploads/product/<?= $product['product_image']  ?>" class="img-fluid circle" alt="<?= $product['product_title'] ?>"></div>
                            <div class="Goodup-author-caption">
                                <h4 class="fs-md mb-0 ft-medium m-catrio vmtop vmtop"><?= $product['product_title'] ?></h4>
                                <div class="lkji-oiyt">
                                    <h5 class="theme-cl ft-bold fs-sm cgreen">₹<?= $product['offer_price'] ?> /-
                                        <span class="oldprice"><del> ₹<?= $product['product_price'] ?> </del></span>
                                    </h5>

                                </div>
                                <p class="pd-5"><?= $product['product_description'] ?></p>
                            </div>
                            <div class="Goodup-author-links">
                                <ul class="Goodup-social colored">
                                    <a target="_blank" href="https://api.whatsapp.com/send?phone=+91 <?= $website[0]['company_whatsapp'] ?>&text=Hi, I have query about - *<?= $product['product_title'] ?>.*" class="commonbutton">Query Now</a>
                                </ul>
                            </div>
                        </div>
                    </div>

                <?php }
                ?>
            </div>

        <?php
        }
        ?>








        <?php

        $section_category =  getRowByIdwithlimit('section_category', 'company_id',  $website[0]['rgid'],  4);
        if ($section_category > 0) {
            foreach ($section_category as $section_row) {
                if ($section_row['name'] != '') {
                    $menu .= '<li><a href="#' . url_title($section_row['name']) . '"><i class="material-icons">' . $section_row['name'] . '</i></a></li>';
                }

        ?>

                <div class="vcard-body-wrapper mobile_view" id="<?= url_title($section_row['name']) ?>">

                    <h3><?= $section_row['name'] ?></h3>
                    <?php

                    $sec = getRowById('section', 'section_category', $section_row['sec_id']);
                    if ($sec != '') {
                        foreach ($sec as $section_fetch) {
                    ?>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="Goodup-author-wrap ">

                                    <div class="Goodup-author-thumb dlf-flew grid pt-20">
                                        <img src="<?= base_url() ?>uploads/section/<?= $section_fetch['section_image'] ?>" class="img-fluid" alt="<?= $section_fetch['section_title'] ?>">
                                        <div class="Goodup-author-caption">
                                            <h4 class="fs-md mb-0 ft-medium m-catrio vmtop"><?= $section_fetch['section_title'] ?> </h4>
                                            <p class="ps"> <?= strip_tags($section_fetch['description']) ?></p>
                                        </div>
                                    </div>

                                    <!--<div class="Goodup-author-links">-->
                                    <!--    <ul class="Goodup-social colored">-->
                                    <!--        <a target="_blank" href="https://api.whatsapp.com/send?phone=+91 <?= $website[0]['company_whatsapp'] ?>&text=Hi, I have query about <?= $section_fetch['section_title'] ?>." class="commonbutton">Query Now</a>-->
                                    <!--    </ul>-->
                                    <!--</div>-->
                                </div>
                            </div>

                    <?php }
                    }
                    ?>



                </div>

        <?php
            }
        }
        ?>

        <?php

        $gallery =  getRowByIdwithlimit('company_gallery', 'company_id',  $website[0]['rgid'],  6);
        if ($gallery > 0) {

            $menu .= '<li><a href="#gallery"><i class="material-icons">Gallery</i></a></li>';

        ?>


            <div class="vcard-body-wrapper grid mobile_view" id="gallery">
                <h3>Gallery</h3>
                <?php
                foreach ($gallery as $gallery_fetch) {
                ?>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="Goodup-author-wrap grid">
                            <img src="<?= base_url() ?>uploads/gallery/<?= $gallery_fetch['image'] ?>" alt="<?= $gallery_fetch['title'] ?>" height="200px" />
                            <?= (($gallery_fetch['title'] == '') ? '' : ' <h4 class="fs-md mb-0 ft-medium m-catrio vmtop text-center">' . $gallery_fetch['title'] . '</h4>')  ?>
                        </div>
                    </div>
                    <hr class="hrclass">

                <?php
                }
                ?>
            </div>


        <?php
        }
        ?>


        <?php

        $bann = getRowById('banner', 'location', '1');

        if ($bann != '') {
            foreach ($bann as $baner) {

                $omm = explode(',', $baner["banner_content"]);
                foreach ($omm as $com) {
                    if ($com == $website[0]['company_id']) {
        ?>

                        <div class="vcard-body-wrapper mobile_view">
                            <a href="<?= $baner['banner_name'] ?>" target="_blank">
                                <img src="<?= base_url() ?>uploads/advertise/<?= $baner['banner_logo'] ?>" class="img-responsive" />
                            </a>

                        </div>

        <?php
                    }
                }
            }
        }

        ?>


        <?php

        $vid =  getRowById('company_video', 'company_id',  $website[0]['rgid']);
        if ($vid > 0) {

            $menu .= '<li><a href="#video"><i class="material-icons">Video</i></a></li>';
        ?>

            <div class="vcard-body-wrapper mobile_view" id="video">
                <h3>Video</h3>
                <?php
                foreach ($vid as $video) {
                ?>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="Goodup-author-wrap ">

                            <div class="Goodup-author-thumb dlf-flew ">


                                <iframe width="100%" height="200px" class="col-12" src="<?= str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", $video['video_path']); ?>">
                                </iframe>

                                <?= (($video['title'] == '') ? '' : ' <h4 class="fs-md mb-0 ft-medium m-catrio vmtop">' . $video['title'] . '</h4>')  ?>



                            </div>


                        </div>
                    </div>
                    <hr class="hrclass">

                <?php }
                ?>



            </div>

        <?php
        }
        ?>

        <?php

        $pay =  getRowById('payment_details', 'company_id',  $website[0]['rgid']);
        $bank =  getRowById('bank_details', 'company_id',  $website[0]['rgid']);
        if ($pay > 0 ||  $bank > 0) {

            $menu .= '<li><a href="#payment"><i class="material-icons">Payment</i></a></li>';
        ?>

            <div class="vcard-body-wrapper mobile_view" id="payment">
                <h3>Payment Info</h3>
                <?php
                if ($pay != '') {
                    foreach ($pay as $payment) {
                ?>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="Goodup-author-wrap ">

                                <div class="Goodup-author-thumb dlf-flew grid pt-20">
                                    <div class="Goodup-author-caption">
                                        <h4 class="fs-md mb-0 ft-medium m-catrio vmtop"><?= $payment['qr_name'] ?> QR </h4>
                                        <h6 class="ft-medium m-catrio qrno"><?= $payment['qr_name'] ?> QR No. : <?= $payment['qr_no'] ?></h6>
                                    </div>
                                    <img src="<?= base_url() ?>uploads/payment/<?= $payment['qr'] ?>" class="img-fluid" alt="<?= $payment['qr_name'] ?>">

                                </div>
                            </div>
                            <div class="text-center">

                                <a href="<?= base_url() ?>uploads/payment/<?= $payment['qr'] ?>" class="commonbutton" download>Download</a>
                            </div>
                        </div></br></br>

                <?php }
                }
                ?>



                <?php
                if ($bank != '') {
                    foreach ($bank as $payment_fetch) {
                ?>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <table class="table st_border">

                                <tbody>
                                    <tr>

                                        <td colspan="2">Bank name</td>
                                        <td><b><?= $payment_fetch['bank'] ?></b></td>

                                    </tr>
                                    <tr>

                                        <td colspan="2">Holder name</td>
                                        <td><b><?= $payment_fetch['acc_holder'] ?></b></td>

                                    </tr>
                                    <tr>
                                        <td colspan="2">Account No.</td>
                                        <td><b><?= $payment_fetch['acc_no'] ?></b></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">IFSC Code</td>
                                        <td><b><?= $payment_fetch['ifsc'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Account Type</td>
                                        <td><b><?= $payment_fetch['acc_type'] ?></b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                <?php }
                }
                ?>



            </div>

        <?php
        }
        ?>

        <?php

        // $quote =  getRowByMoreId('company_graphics', array('status' => '1', 'type' => '2'));
        $quote = getRowsByMoreIdWithOrder('company_graphics', array('status' => '1', 'type' => '2'), 'id', 'desc');
        if ($quote > 0) {

            $menu .= '<li><a href="#quote"><i class="material-icons">Quotes</i></a></li>';

        ?>


            <div class="vcard-body-wrapper mobile_view grid" id="quote">
                <h3>Daily Quotes</h3>

                <?php

                foreach ($quote as $daily) {

                    $date = $daily['show_date'];
                    $ldate = date('Y-m-d', strtotime($date));


                    $cdate = date('Y-m-d');
                    // print_r($daily);
                    if ($cdate == $ldate) {
                ?>
                        <img src="<?= base_url() ?>admin/graphicsuploads/<?= $daily['graphics'] ?>" alt="<?= $daily['name'] ?>" height="200px" />
                        <hr>


                <?php
                    }
                }
                ?>
            </div>


        <?php
        }
        ?>


        <div class="vcard-body-wrapper mobile_view inquryform">
            <h3>Inquiry Form</h3>
            <?php
            $menu .= '<li><a href="#inquiry"><i class="material-icons">Inquiry</i></a></li>';
            ?>
            <form method="POST" action="<?= base_url('Home/enquiry_submit') ?>" id="inquiry">

                <?php
                if ($this->session->has_userdata('msg')) {
                    echo  $this->session->userdata('msg');

                    // echo "<script>alert('Thank you for enquiry . We will contact you soon')</script>";
                    $this->session->unset_userdata('msg');
                }
                ?>

                <input type="hidden" class="form-control b-0 ps-2" name="company_id" value="<?= $website[0]['company_id'] ?>">
                <input type="hidden" class="form-control b-0 ps-2" name="type" value="1">
                <label for="name">Name</label><br>
                <input type="text" name="name" placeholder="Enter Full Name" required><br>

                <label for="name">Phone</label><br>
                <input type="tel" class="form-control b-0 ps-2" name="number" placeholder="Enter Number" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                <label for="name">Inquiry Message</label><br>
                <textarea name="msg" rows="5" id="enquirytext" placeholder="Enter Message (160 Words)" maxlength="160" required></textarea>
                <div id="sthe-count" style="text-align: right;">
                    <span id="scurrent">0</span>
                    <span id="smaximum">/ 160</span>
                </div>
                <input type="submit" value="Submit">
            </form>
        </div>
        <div class="vcard-body-wrapper mobile_view inquryform">
            <h3>Write Reviews</h3>
            <?php
            $menu .= '<li><a href="#review"><i class="material-icons">Reviews</i></a></li>';
            ?>
            <form method="POST" action="<?= base_url('Home/review_submit') ?>" id="review">
                <?php
                if ($this->session->has_userdata('rmsg')) {

                    echo $this->session->userdata('rmsg');

                    // echo "<script>alert('Thank You for Rating us')</script>";
                    $this->session->unset_userdata('rmsg');
                }
                ?>
                <div class="feedback">
                    <div class="rating">
                        <input type="radio" name="rating" id="rating-5" value="5" required>
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
                <input type="hidden" class="form-control b-0 ps-2" name="company_id" value="<?= $website[0]['company_id'] ?>">
                <input type="hidden" class="form-control b-0 ps-2" name="type" value="1">
                <input type="text" name="name" placeholder="Your Name" required><br>
                <input type="email" name="email" placeholder="Your Email" required><br>
                <textarea name="review" id="" maxlength="160" rows="5" placeholder="Enter Your Feedback" required></textarea>
                <div id="the-count" style="text-align: right;">
                    <span id="current">0</span>
                    <span id="maximum">/ 160</span>
                </div>
                <input type="submit" value="Submit Your Review">
            </form>
        </div>
        <div class="vcard-body-wrapper  views">
            <h4><i class="fa-solid fa-eye"></i> Views: <?= $website[0]['website_views'] ?></h4>
        </div>
        <div class="vcard-body-wrapper bottom-buttons">
            <a href="<?= base_url('Home/register') ?>" target="_blank">
                <h4>Create Your Business Card</h4>
            </a>
        </div>
        <div class="vcard-body-wrapper bottom-buttons1">
            <h4>&copy; <?= date("Y"); ?> sahardirectory.com </h4>
        </div>

    </div>


    <?php

    $adver = getRowById('banner', 'location', '2');

    if ($adver != '') {
        foreach ($adver as $advertise) {

            $ad = explode(',', $advertise["banner_content"]);
            foreach ($ad as $ac) {
                if ($ac == $website[0]['company_id']) {
    ?>

                    <div class="vcard-body-wrapper">
                        <a href="<?= $advertise['banner_name'] ?>" target="_blank">

                            <img src="<?= base_url() ?>uploads/advertise/<?= $advertise['banner_logo'] ?>" class="img-responsive" />
                        </a>

                    </div>

    <?php
                }
            }
        }
    }

    ?>


    <div class="footer-fixed">
        <footer class="red lighten-2">
            <nav class="z-depth-0">
                <div class="nav-wrapper">
                    <ul class="justify">


                        <li><a href="#home"><i class="material-icons">Home</i></a></li>

                        <?php echo $menu; ?>

                    </ul>
                </div>
            </nav>
        </footer>
    </div>
    <div id="lightbox">
        <img id="lightbox-img">
    </div>



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
            // TABS
            $('ul.tabs').tabs();
        });
        $("#phonenum").keyup(function() {

            var bla = $('#phonenum').val();
            // console.log(bla);
            $("#whatsappshare").attr("href", "https://wa.me/" + 91 + bla + "?text=Hello, my name is <?= $website[0]['company_person']  ?> and I have listed my business. You can contact me on my business profile -  <?= $actual_link ?>This business profile is powered by Sahar Directory.Click to register your business - <?= base_url() ?>");
        });
    </script>

    <script>
        $('input').attr('autocomplete', 'off');

        $(function() {
            $("input[name='number']").on('input', function(e) {
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
            });
        });
    </script>

    <script>
        const gridImages = document.querySelectorAll(".grid > img");
        const lightbox = document.getElementById("lightbox");
        const lightboxImg = document.getElementById("lightbox-img");

        gridImages.forEach((img) => {
            img.addEventListener("click", () => {
                // To open lightbox
                lightbox.classList.add("active");
                // set the image clicked as the image of the lightbox
                lightboxImg.src = img.src;
            });
        });

        // To close lightbox
        lightbox.addEventListener("click", (e) => {
            // if the clicked element is not the dark overlay don't close it
            if (e.target !== e.currentTarget) return;
            // if it was the overlay it will close it
            lightbox.classList.remove("active");
        });

        var string = $website[0]['company_contact'];
        var phone = [string.slice(0, 3), " ", string.slice(3, 7), " ", string.slice(7)].join('');
        console.log(phone);
    </script>
    <script src="<?= base_url() ?>assets/js/lightbox.js"></script>


</body>

</html>