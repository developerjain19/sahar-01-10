<?php
foreach ($subcat as $row) {
?>
    <option value="<?= $row['subcat_id'] ?>" <?php if ($datacomrow != '') { ?> <?= (($datacomrow['0']['company_subcategory'] ==  $row['subcat_id']) ? 'Selected' : '') ?> <?php } ?>><?= $row['subcategory'] ?></option>
<?php
}
?>