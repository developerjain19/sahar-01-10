<?php include 'includes/header-link.php' ?>
<div id="main-wrapper">

    <?php include 'includes/header2.php' ?>
    <div class="clearfix"></div>

    <?php include 'search-box.php' ?>
    <div class="clearfix"></div>

    <section class="space min gray">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="sec_title position-relative text-center mb-5 search_title">

                    </div>
                </div>
            </div>
            <?php
            if ($listing) {
            ?>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="row justify-content-center g-2">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                <div class="d-block grouping-listings">
                                    <div class="d-block grouping-listings-title">
                                        <h5 class="ft-medium mb-3">Listing Results</h5>
                                    </div>

                                    <div class="row">
                                        <?php

                                        foreach ($listing as $row) {
                                            $state = getRowById('tbl_state', 'state_id', $row['company_state']);
                                            $city = getRowById('tbl_cities', 'id', $row['company_city']);
                                            $cate = getRowById('company_category', 'cate_id', $row['company_category']);
                                            $sub_tag = getRowById('company_subcategory', 'subcat_id', $row['company_subcategory']);
                                        ?>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                                <div class="Goodup-grid-wrap">
                                                    <div class="Goodup-grid-upper">
                                                        <div class="Goodup-pos ab-left">
                                                        </div>
                                                        <div class="Goodup-grid-thumb">
                                                            <a href="<?= base_url() ?>listing/<?= url_title($city[0]['name']) ?>/<?= url_title(strtolower($cate[0]['category'])); ?>/<?= url_title($row['company_name']) ?>/<?= encryptId($row['company_id']) ?>" class="d-block text-center m-auto"><img src="uploads/company/<?= $row['company_banner'] ?>" class="img-fluid" alt=""></a>
                                                        </div>

                                                    </div>
                                                    <div class="Goodup-grid-fl-wrap">
                                                        <div class="Goodup-caption px-3 py-2">
                                                            <div class="Goodup-author">
                                                                <?php if ($row['company_logo']  != '') { ?>
                                                                    <img src="<?= base_url() ?>uploads/company/<?= $row['company_logo'] ?>" class="img-fluid circle" alt="<?= $row['company_name'] ?>" style="object-fit: cover; height: 100%;" />
                                                                <?php
                                                                } else {
                                                                    echo '<img src="' . base_url() . 'assets/images/user_logo.png" class="img-fluid circle" alt="Sahar Directory" style="object-fit: contain;" />';
                                                                }
                                                                ?>



                                                            </div>
                                                            <div class="Goodup-cates multi"><a href="" class="cats-1"><?= $cate[0]['category'] ?></a><a href="" class="cats-2"><?= $sub_tag[0]['subcategory'] ?></a></div>
                                                            <h4 class="mb-0 ft-medium medium"><a href="<?= base_url() ?>listing/<?= url_title($city[0]['name']) ?>/<?= url_title(strtolower($cate[0]['category'])); ?>/<?= url_title($row['company_name']) ?>/<?= encryptId($row['company_id']) ?>" class="text-dark fs-md"><?php echo $row['company_name']; ?></a></h4>
                                                            <div class="Goodup-location"><i class="fas fa-map-marker-alt me-1 theme-cl"></i><?= $row['company_address'] ?></div>
                                                            <div class="Goodup-middle-caption mt-3">
                                                                <?php
                                                                if ($row['company_about'] != '') {
                                                                ?>
                                                                    <?= strip_tags(substr($row['company_about'], 0, 70)) ?>...
                                                                <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="Goodup-grid-footer py-2 px-3">
                                                            <div class="Goodup-ft-first">
                                                                <a href="<?= base_url() ?>listing/<?= url_title($city[0]['name']) ?>/<?= url_title(strtolower($cate[0]['category'])); ?>/<?= url_title($row['company_name']) ?>/<?= encryptId($row['company_id']) ?>" class="Goodup-cats-wrap">
                                                                    <div class="cats-ico bg-5"><i class="lni lni-eye"></i></div><span class="cats-title">View Detials</span>
                                                                </a>
                                                            </div>
                                                            <div class="Goodup-ft-last">
                                                                <div class="Goodup-inline">
                                                                    <!--<a href="<?= base_url() ?>listing/<?= url_title($city[0]['name']) ?>/<?= url_title(strtolower($cate[0]['category'])); ?>/<?= url_title($row['company_name']) ?>/<?= encryptId($row['company_id']) ?>">-->
                                                                    <a href="https://api.whatsapp.com/send?phone=+91 <?= $row['company_whatsapp'] ?> &text=Hello..."" " target="_blank">

                                                                        <div class="Goodup-bookmark-btn"><button type="button"><i class="lni lni-whatsapp position-absolute"></i></button></div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        <?php
                                        }

                                        

                                        ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php

            } else {
                echo '<h2 class="ft-bold text-center"> ☹️ Sorry!.. No Result Found</h2>';
            }

            ?>




        </div>
    </section>



    <?php include 'includes/footer.php' ?>

</div>
<?php include 'includes/footer-link.php' ?>