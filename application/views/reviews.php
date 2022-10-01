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
                        <h1 class="ft-medium">Reviews</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-muted"><a href="<?= base_url() ?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="#" class="theme-cl">Reviews</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="dash-card">
                            <div class="dash-card-header">
                                <h4 class="mb-0">Reviews </h4>
                            </div>
                            <div class="dash-card-body overflow-xs" style="padding: 10px;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">S no.</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <!--<th scope="col">Rating</th>-->
                                            <th scope="col">Review</th>
                                            <th scope="col">Rating</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $reviews = $this->CommonModal->getRowByIdInOrder('reviews', array('company_id' => $company[0]['company_id']), 'rid', 'DESC');
                                        $i = 0;
                                        if (!empty($reviews)) {
                                            foreach ($reviews as $row) {
                                                $i = $i + 1;
                                        ?>
                                                <tr>
                                                    <th scope="row"><?= $i ?></th>
                                                    <td><?= ($row['type'] == 0) ? "Company" : "Vcard/website" ?></td>
                                                    <td><?= $row['name'] ?></td>
                                                    <td><?= $row['email'] ?></td>
                                                    <td><?= $row['review'] ?></td>
                                                    <td><i class="fa fa-star gold"></i>&nbsp;<?= $row['rating'] ?></td>

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
<!-- All Jquery -->
<?php include 'includes/footer-link.php' ?>