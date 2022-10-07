<section class="cats-filters py-3">
    <div class="container">

        <form action="<?= base_url('search') ?>" method="post">
            <div class="row ">
                <div class="col-md-5">
                    <input type="text" class="form-control serchbox radius" placeholder="What are you looking for?" name="search" list="browsers" id="browser" />

                    <datalist id="browsers">

                        <?php

                        foreach ($search_category as $scategory) { ?>
                            <option value="<?= trim(strtolower($scategory['category'])) ?>">

                            <?php }
                            ?>
                            <?php
                            if ($search_company  != '') {
                                foreach ($search_company as $scompany) { ?>
                            <option value="<?= trim(strtolower($scompany['company_name'])) ?>">

                        <?php }
                            }
                        ?>
                        <?php

                        foreach ($search_subcategory as $ssubcategory) { ?>
                            <option value="<?= trim(strtolower($ssubcategory['subcategory'])) ?>">

                            <?php }
                            ?>

                            <?php

                         if ($search_product  != '') {
                            foreach ($search_product as $sproduct) {
                            ?>
                            <option value="<?= trim(strtolower($sproduct['product_title'])) ?>">

                            <?php }
                         }
                            ?>


                    </datalist>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control serchbox" placeholder="Location" name="company-location" list="browsers2" id="browser2" />

                    <datalist id="browsers2">

                        <?php

                        foreach ($search_state as $sstate) { ?>
                            <option value="<?= trim(strtolower($sstate['state_name'])) ?>">

                            <?php }
                            ?>
                            <?php
                            if ($search_company  != '') {
                                foreach ($search_company as $scompany) { ?>
                            <option value="<?= trim(strtolower($scompany['company_address'])) ?>">

                        <?php }
                            }
                        ?>
                        <?php

                        foreach ($search_cities as $scities) { ?>
                            <option value="<?= trim(strtolower($scities['name'])) ?>">

                            <?php }
                            ?>


                    </datalist>
                </div>

                <div class="col-md-2">
                    <div class="Goodup-single-drp small">
                        <div class="btn-group">
                            <button type="submit" class="btn bg-dark text-light">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>


</section>