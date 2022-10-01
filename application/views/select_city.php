<?php
?>
<option value=""> Select City </option>
<?php
    foreach ($city as $row) {
    ?>
        <option value="<?= $row['id'] ?>" <?php if ($datacomrow != '') { ?> <?= (($datacomrow['0']['company_city'] ==  $row['id']) ? 'Selected' : '') ?> <?php } ?>><?= $row['name'] ?></option>
    <?php
    }
    ?> 