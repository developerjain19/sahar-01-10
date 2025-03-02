<?php include 'includes/header-link.php'; ?>

<div id="main-wrapper">


    <?php include 'includes/header2.php' ?>

    <?php include 'includes/dash-top-header.php' ?>

    <div class="goodup-dashboard-wrap gray px-4 py-5 mobile_author">
        <?php include 'includes/dash-side-header.php' ?>
        <div class="goodup-dashboard-content">
            <div class="dashboard-tlbar d-block mb-5">
                <div class="row">
                    <div class="colxl-9 col-lg-9 col-md-9">
                        <h1 class="ft-medium">Section List</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                                <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="theme-cl">Section</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="colxl-3 col-lg-3 col-md-3">
                        <a href="<?= base_url('section-add') ?>" class="btn btn-success">Add Section</a>
                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">
                <div class="row">
                    <div class="col-xl-12 col-lg-2 col-md-12 col-sm-12">

                        <?php if ($msg = $this->session->flashdata('msg')) :
                            $msg_class = $this->session->flashdata('msg_class') ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert  <?= $msg_class; ?>"><?= $msg; ?></div>
                                </div>
                            </div>
                        <?php
                            $this->session->unset_userdata('msg');
                        endif; ?>
                        <br>
                        <div class="goodup-dashboard-grouping-list invoices with-icons">

                            <ul>
                                <?php
                                if ($sectiondata) {
                                    foreach ($sectiondata as $row) {
                                        $category = getRowById('section_category', 'sec_id', $row['section_category']);
                                ?>
                                        <li><span><img src="<?= base_url() ?>uploads/section/<?= $row['section_image'] ?>" class="product-img"></span>
                                            <strong><?= $row['section_title'] ?></strong>
                                            <ul>
                                                <li class="unpaid">Category : <?= $category[0]['name'] ?></li>

                                            </ul>
                                            <ul>
                                                <li>description : <?= substr($row['description'], 0, 200) ?>...</li>
                                            </ul>
                                            <div class="buttons-to-right">
                                                <a href="<?= base_url('update-section/' . encryptId($row['section_id'])) ?>" class="button btn-primary" onclick="return confirm('Are You Sure?')"><i class="fa fa-edit"></i></a>
                                                <a href="<?= base_url('section-list') ?>?BdID=<?= $row['section_id'] ?>" class="button btn-danger" onclick="return confirm('Are You Sure?')"><i class="fa fa-trash"></i></a>
                                            </div>
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



    <?php include 'includes/footer-bottom.php' ?>

</div>

<?php include 'includes/footer-link.php' ?>