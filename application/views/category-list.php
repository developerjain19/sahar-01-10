<?php include 'includes/header-link.php' ?>
<div id="main-wrapper">

    <?php include 'includes/header2.php' ?>
    <div class="clearfix"></div>
    <section class="cats-filters py-3">
        <div class="container">
            <div class="row justify-content-between align-items-center">

                <div class="col-xl-4 col-lg-4 col-md-4 col-8">

                    <input class="form-control serchbox myInput" type="search" placeholder="Search" aria-label="Search" id="browser" list="browsers">
                    <datalist id="browsers">

                        <?php
                        if ($category != '') {
                            foreach ($category as $row1) {

                        ?> <option value="<?= $row1['category']; ?>">
                            <?php
                            }
                        }
                            ?>
                    </datalist>


                </div>

                <div class="col-xl-8 col-lg-8 col-md-8 col-4">

                    <div class="Goodup-single-drp small">
                        <div class="btn-group">
                            <button type="button" class="btn bg-dark text-light">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <div class="clearfix"></div>

    <section class="space min gray">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="sec_title position-relative text-center mb-5">
                        <h6 class="mb-0 theme-cl">Popular Categories</h6>
                        <h2 class="ft-bold">Browse Top Categories</h2>
                    </div>
                </div>
            </div>

            <div class="row align-items-center" id="mytable">


                <?php
                if ($category != '') {
                    foreach ($category as $row1) {

                ?>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6" >
                            <div class="cats-wrap text-center">
                                <a href="<?= base_url() ?>browse_service?category=<?= encryptId($row1['cate_id']) ?>" class="Goodup-catg-wrap">
                                    <div class="Goodup-catg-caption">
                                        <h4 class="fs-md mb-0 ft-medium m-catrio">
                                            <?= $row1['category']; ?></h4>
                                        <?php
                                        $num = getNumRows('company_subcategory', array('category_id' => $row1['cate_id']));
                                        echo '<span class="text-muted">' . $num . ' Listings</span>';
                                        ?>
                                    </div>
                                </a>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>

                </ul>
                .
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php' ?>
</div>

<?php include 'includes/footer-link.php' ?>

<script>
    $(document).ready(function() {
        $(".myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#mytable div").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>