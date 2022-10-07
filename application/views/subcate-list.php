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
                        if ($subcategory != '') {
                            foreach ($subcategory as $row1) {

                        ?> <option value="<?= $row1['subcategory']; ?>">
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


            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 filter_div">
                    <div class="bg-white rounded mb-4 under_filter">
                        <div class="bg-white rounded mb-4 fliter-box">

                            <div class="sidebar_header d-flex align-items-center justify-content-between px-4 py-3 br-bottom">
                                <h4 class="ft-medium fs-lg mb-0">Filter</h4>
                                <div class="ssh-header">
                                    <a href="javascript:void(0);" class="clear_all ft-medium text-muted">Clear All</a>
                                    <a href="#search_open" data-bs-toggle="collapse" aria-expanded="false" role="button" class="collapsed _filter-ico ml-2"><i class="lni lni-text-align-right"></i></a>
                                </div>
                            </div>

                            <!-- Find New Property -->
                            <div class="sidebar-widgets collapse miz_show" id="search_open" data-bs-parent="#search_open">
                                <div class="search-inner">

                                    <div class="side-filter-box">
                                        <div class="side-filter-box-body">
                                            <div class="inner_widget_link">
                                                <h6 class="ft-medium">categories</h6>
                                                <form action="" method="GET">
                                                    <ul class="no-ul-list filter-list category-list">
                                                        <?php
                                                        $i = 0;
                                                        if ($category != '') {
                                                            foreach ($category as $cate) {
                                                                $i = $i + 1;
                                                        ?>

                                                                <li>
                                                                    <input id="<?= $i ?>" value="<?php echo $cate['cate_id']; ?>" class="common_selector checkbox-custom category" type="checkbox" <?= (($cate['cate_id'] == $cateid) ? 'Checked' : '')  ?>>
                                                                    <label for="<?= $i ?>" class="checkbox-custom-label"><?php echo $cate['category']; ?></label>

                                                                    <?php
                                                                    $num = getNumRows('company_subcategory', array('category_id' => $cate['cate_id']));

                                                                    echo '<label class="text-muted">' . $num . '</label>';
                                                                    ?>

                                                                </li>

                                                        <?php
                                                            }
                                                        }
                                                        ?>

                                                    </ul>
                                            </div>
                                            <div class="form-group filter_button">
                                                <button type="submit" class="btn theme-bg text-light rounded full-width">Show</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12">
                    <div class="row" id="filter_data">
                    </div>
                </div>

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
            $("#filter_data div").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    $(document).ready(function() {

        filter_data();

        function filter_data() {
            $('#filter_data').html('<div id="loading" style="" ></div>');
            var action = 'fetch_data';


            var category = get_filter('category');

            console.log(category);

            $.ajax({
                url: "<?= base_url('Home/filterData') ?>",
                method: "POST",
                data: {
                    category: category
                },
                beforeSend: function() {
                    $("#filter_data").text("").html("Loading.. <i class='fa fa-spin fa-spinner'></i>").attr('disabled', true);
                },
                success: function(data) {
                    // console.log(data);
                    $('#filter_data').html(data);
                }
            });
        }

        function get_filter(class_name) {
            var filter = [];
            $('.' + class_name + ':checked').each(function() {
                filter.push($(this).val());
            });
            return filter;
        }

        $('.common_selector').click(function() {
            filter_data();
        });

    });
</script>