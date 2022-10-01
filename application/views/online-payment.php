<?php include 'includes/header-link.php'; ?>

<div id="main-wrapper">


    <?php include 'includes/header2.php' ?>

    <?php include 'includes/dash-top-header.php' ?>

    <div class="goodup-dashboard-wrap gray px-4 py-5">
        <?php include 'includes/dash-side-header.php' ?>
        <div class="goodup-dashboard-content">
            <div class="dashboard-tlbar d-block mb-5">
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12">
                        <h1 class="ft-medium"><?= $tag ?> Online Payment</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                                <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="theme-cl"><?= $tag ?> Online Payment</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">
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
                <div class="row">
                    <div class="dash-card-body overflow-xs" style="padding: 10px;">
                        <div class="col-xl-12 col-lg-2 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="dash-card-body overflow-xs" style="padding: 10px;">
                                    <form method="post" class="row" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <label class="mb-1">QR Name</label>
                                                <input class="form-control rounded" type="text" name="qr_name" value="<?= (($tag == 'Edit') ? $payment_details_list['0']['qr_name'] : '') ?>" placeholder="Ex: Paytm" required>

                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <label class="mb-1">QR Number</label>
                                                <input class="form-control rounded" type="text" name="qr_no" value="<?= (($tag == 'Edit') ? $payment_details_list['0']['qr_no'] : '') ?>" required placeholder="Ex: ****@ybl or number">

                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <label class="mb-1">QR Code (Only: JPG PNG and JPEG)</label>
                                                <?php if ($tag == 'Edit') { ?>
                                                    <input type="file" class="form-control rounded" name="qr_temp" accept=".png,.jpg,.jpeg" />
                                                    <input type="hidden" class="form-control" name="qr" value="<?= $payment_details_list[0]['qr']  ?>" />
                                                    <img src="<?= base_url() ?>uploads/payment/<?= $payment_details_list[0]['qr'] ?>" width="100px" />
                                                <?php
                                                } else {
                                                ?>
                                                    <input type="file" class="form-control rounded" name="qr" accept=".png,.jpg,.jpeg" />
                                                <?php } ?>

                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <br>
                                            <div class="form-group">
                                                <button type="submit" class="btn theme-bg text-light rounded"><?= (($tag == 'Edit') ? 'Save Changes' : 'Add  Online Payment') ?> </button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>



                        <div class="dashboard-widg-bar d-block mt-40">

                            <div class="col-md-12 col-sm-12">
                                <div class="dash-card">
                                    <div class="dash-card-header">
                                        <h4 class="mb-0">Online Payment</h4>
                                    </div>
                                    <div class="dash-card-body overflow-xs" style="padding: 10px;">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">QR Name</th>
                                                    <th scope="col">QR No.</th>
                                                    <th scope="col">QR Code</th>
                                                    <th scope="col">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 0;
                                                if ($payment) {
                                                    foreach ($payment as $roww) {
                                                        $i = $i + 1;
                                                ?>
                                                        <tr>
                                                            <th scope="row"><?= $i ?></th>
                                                            <td><?= $roww['qr_name']; ?></td>
                                                            <td><?= $roww['qr_no']; ?></td>
                                                            <td><img src="<?= base_url() ?>uploads/payment/<?= $roww['qr'] ?>" height="130px"></td>

                                                            <td> <a href="<?= base_url('update-online-payment/' . encryptId($roww['pay_id'])) ?>" class="button action_btn" onclick="return confirm('Are You Sure?')"><i class="fa fa-edit text-success"></i></a>
                                                                &nbsp;
                                                                <a onclick="return confirm('Are You Sure?')" href="<?= base_url('online-payment') ?>?BdID=<?= $roww['pay_id'] ?>" class="button action_btn"><i class="fa fa-trash text-danger"></i></a>
                                                            </td>
                                                        </tr>

                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <a id="tops-button" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>



            <?php include 'includes/footer-bottom.php' ?>

        </div>

        <?php include 'includes/footer-link.php' ?>