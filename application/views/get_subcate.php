<?php
if ($all_data != '') {
    foreach ($all_data as $serv) {

?>

        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
            <div class="cats-wrap text-center boxshadow">
                <a href="<?= base_url() ?>listing?subcate=<?= encryptId($serv['subcat_id']) ?>&category=<?= encryptId($serv['category_id']) ?>" class="Goodup-catg-wrap">
                    <div class="Goodup-catg-icon"><i class="fas fa-th-large"></i></div>
                    <div class="Goodup-catg-caption">
                        <h4 class="fs-md mb-0 ft-medium m-catrio"><?php echo $serv['subcategory']; ?></h4>
                        <?php
                        // $num = getNumRows('company', array('company_subcategory' => $serv['subcat_id']));
                        // echo '<span class="text-muted">' . $num . ' Listings</span>';
                        ?>
                    </div>
                </a>
            </div>
        </div>

<?php
    }
} else {
    echo '<h3 class="text-danger">No Result Found</h3>';
}
?>