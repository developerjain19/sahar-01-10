<?php include 'includes/header-link.php' ?>
<div id="main-wrapper">

    <?php include 'includes/header2.php' ?>
    <div class="clearfix"></div>

    <?php include 'search-box.php' ?>
    <div class="clearfix"></div>

    <section class="gray py-5">
        <div class="container">
            <div class="row">

                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 filter_div">
                    <div class="bg-white rounded mb-4 under_filter">
                        <div class="bg-white rounded mb-4 fliter-box">

                            <div class="sidebar_header d-flex align-items-center justify-content-between px-4 py-3 br-bottom">
                                <h4 class="ft-medium fs-lg mb-0">Filter</h4>
                                <div class="ssh-header">
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

                                                <ul class="no-ul-list filter-list category-list">
                                                    <?php
                                                    $i = 0;
                                                     $j =   0;
                                                    if ($category != '') {
                                                        foreach ($category as $cate) {
                                                            $i = $i + 1;
                                                    ?>
                                                            <li>
                                                                <input id="<?= $i ?>" value="<?php echo $cate['cate_id']; ?>" 
                                                                class="common_selector checkbox-custom category" 
                                                                type="checkbox" <?= (($cate['cate_id'] == $cateid) ? 'Checked' : '')  ?>>
                                                                <?php
                                                                $num = getNumRows('company_subcategory', array('category_id' => $cate['cate_id']));
                                                                $sub_cat = getRowById('company_subcategory', 'category_id', $cate['cate_id']);
                                                                ?>
                                                                <label for="<?= $i ?>" class="checkbox-custom-label "><?php echo $cate['category']; ?> <span class="text-danger">(<?= $num ?>)</span></label>

                                                                <label class="filter_toggle text-muted fas fa-plus" data-id="<?= $i ?>"></label>

                                                                <ul class="subcate_ul subcate_ul<?= $i ?>  <?= (($cate['cate_id'] == $cateid) ? 'active' : '')  ?>"  >


                                                                    <?php
                                                                    
                                                                   
                                                                    $subcate = getRowById('company_subcategory', 'category_id', $cate['cate_id']);

                                                                    if (!empty($subcate)) {
                                                                        foreach ($subcate as $subcat_row) {

                                                                        ++$j; 
                                                                    ?>


                                                                            <li>
                                                                                <input id="subcatte<?= $subcat_row['subcat_id'] ?><?= $j ?>" value="<?= $subcat_row['subcat_id'] ?>" <?= (($subcat_row['subcat_id'] == $subcateid) ? 'Checked' : '')  ?> class="common_selector checkbox-custom subcategory" type="checkbox">
                                                                                <label for="subcatte<?= $subcat_row['subcat_id'] ?><?= $j ?>" class="checkbox-custom-label"><?= $subcat_row['subcategory'] ?> </label>
                                                                            </li>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>




                                                                </ul>

                                                            </li>
                                                    <?php
                                                        }
                                                    }
                                                    ?>

                                                </ul>
                                            </div>

                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">

                    <!-- row -->
                    <div class="row justify-content-center g-2">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                            <div class="d-block grouping-listings">
                                <div class="d-block grouping-listings-title">
                                    <h5 class="ft-medium mb-3">Listing Results</h5>
                                </div>
                                 <div id="filter_data"></div>



                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>
<?php include 'includes/footer.php' ?>

<?php include 'includes/footer-link.php' ?>


<script>

  $(document).ready(function() {

        filter_data();

        function filter_data() {
            $('#filter_data').html('<div id="loading" style="" ></div>');
            var action = 'fetch_data';
            
          

            var category = get_filter('category');
            var subcategory = get_filter('subcategory');
            
            console.log(category);
             console.log(subcategory);
            

            $.ajax({
                url: "<?= base_url('Home/filterDatacompany') ?>",
                method: "POST",
                data: {
                    category: category,
                    subcategory: subcategory
                   
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



    $(document).on("click", ".filter_toggle", function() {

        $(this).addClass("active");
        var id = $(this).data("id");
        $(".subcate_ul" + id).addClass("active");
    });


    $(document).on("click", ".filter_toggle.active", function() {

        $(this).removeClass("active");
        var id = $(this).data("id");
        $(".subcate_ul" + id).removeClass("active");
    });
</script>