<?php include 'includes/header-link.php';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<div id="main-wrapper">


    <?php include 'includes/header2.php' ?>

    <?php include 'includes/dash-top-header.php' ?>

    <div class="goodup-dashboard-wrap gray px-4 py-5 graphics-container mobile_author">
        <?php include 'includes/dash-side-header.php' ?>
        <div class="goodup-dashboard-content">
            <div class="dashboard-tlbar d-block mb-5">
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12">
                        <h1 class="ft-medium"></h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                                <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="theme-cl"><?= $gtitle ?></a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="bg-white rounded mb-4">
                            <div class="jbd-01 px-4 py-4">
                                <div class="jbd-details mb-4">
                                    <h5 class="ft-bold fs-lg"><?= $gtitle ?> Menu</h5>

                                    <div class="d-block mt-3">
                                        <div class="row g-3">


                                            <?php
                                            if ($graphic != '') {

                                                // print_r($graphic);
                                                foreach ($graphic as $graph) {
                                            ?>
                                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
                                                        <div class="Goodup-sng-menu">
                                                            <div class="Goodup-sng-menu-thumb" style="border: 1px solid #e9e9e9;">
                                                                <img src="<?= base_url() ?>admin/graphicsuploads/<?= $graph['graphics']  ?>" class="img-fluid graph_imgae_frame" alt="<?= $graph['name'] ?>" />
                                                            </div>
                                                            <div class="Goodup-sng-menu-caption text-center">
                                                                <h4 class="ft-medium fs-md"><?= $graph['name'] ?></h4>
                                                                <div class="lkji-oiyt">
                                                                    <a href="<?= base_url() ?>/download-graphic/<?= encryptId($graph['id']) ?>" class="gbutton text-white">Get Graphic <i class="lni lni-arrow-right-circle"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                            <?php
                                                }
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer-bottom.php' ?>

</div>

<?php include 'includes/footer-link.php' ?>

</div>

<script>
    $(document).ready(function() {
        var element = $("#graph-design"); // global variable
        var getCanvas; // global variable

        $("#btn-Preview-Image").on("click", function() {
            html2canvas(element, {
                onrendered: function(canvas) {
                    $("#previewImage").append(canvas);
                    getCanvas = canvas;
                },
            });
        });

        $("#btn-Convert-Html2Image").on("click", function() {

            html2canvas(element, {
                onrendered: function(canvas) {
                    // $("#previewImage").append(canvas);
                    getCanvas = canvas;
                },
            });
            var imgageData = getCanvas.toDataURL("image/png");
            var newData = imgageData.replace(
                /^data:image\/png/,
                "data:application/octet-stream"
            );
            $("#btn-Convert-Html2Image")
                .attr("download", "your_pic_name.png")
                .attr("href", newData);
        });
    });
</script>