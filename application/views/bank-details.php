<?php include 'includes/header-link.php'; ?>

<div id="main-wrapper">


    <?php include 'includes/header2.php' ?>

    <?php include 'includes/dash-top-header.php' ?>

    <div class="goodup-dashboard-wrap gray px-4 py-5 mobile_author">
        <?php include 'includes/dash-side-header.php' ?>
        <div class="goodup-dashboard-content">
            <div class="dashboard-tlbar d-block mb-5">
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12">
                        <h1 class="ft-medium"> Bank Details</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                                <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="theme-cl"> Bank Details</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            

            <div class="dashboard-widg-bar d-block">
                <div class="row">
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
                    <div class="dash-card-body overflow-xs" style="padding: 10px;">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="dash-card-body overflow-xs" style="padding: 10px;">

                                    <form method="post" class="row" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label class="mb-1">Bank Name</label>
                                                    <input type="text" class="form-control rounded" name="bank" value="<?= (($bank != '') ? $bank['0']['bank'] : '') ?>" placeholder="Enter Bank name" />
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label class="mb-1">Account holder</label>
                                                    <input type="text" class="form-control rounded"   placeholder="Ex : John" name="acc_holder" value="<?= (($bank != '') ? $bank['0']['acc_holder'] : '') ?>" />
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label class="mb-1">Account No</label>
                                                    <input type="number" class="form-control rounded"  placeholder="Ex:75523100058" name="acc_no" value="<?= (($bank != '') ? $bank['0']['acc_no'] : '') ?>" />
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label class="mb-1">IFSC</label>
                                                    <input type="text" class="form-control rounded" maxlength="18" placeholder="IFSC" name="ifsc" value="<?= (($bank != '') ? $bank['0']['ifsc'] : '') ?>" />
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label class="mb-1">Account Type</label>

                                                    <select name="acc_type" class="form-control" required>
                                                        <option value="">Select Type</option>
                                                        <option value="Current" <?php if ($bank != '') { ?> <?= (($bank['0']['acc_type'] ==  'Current') ? 'Selected' : '') ?> <?php } ?>>Current</option>
                                                        <option value="Saving" <?php if ($bank != '') { ?> <?= (($bank['0']['acc_type'] ==  'Saving') ? 'Selected' : '') ?> <?php } ?>>Saving </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                <br>
                                                <div class="form-group">
                                                    <button type="submit" class="btn theme-bg text-light rounded"> Submit Details</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <a id="tops-button" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
                <?php include 'includes/footer-bottom.php' ?>

            </div>

            <?php include 'includes/footer-link.php' ?>