<?php include 'includes/header-link.php';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        // $('#btn-Convert-Html2Image').attr('href', 'javascript:void(0)');

        var element = $("#graph-design"); // global variable
        var getCanvas; // global variable


        $("#btn-Convert-Html2Image").on("click", function() {
            // $("#btn-Convert-Html2Image").removeAttr("href", '#')
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
            $("#btn-Convert-Html2Image").attr("href", newData);
        });
    });
</script>

<div id="main-wrapper">


    <?php include 'includes/header2.php' ?>

    <?php include 'includes/dash-top-header.php' ?>

    <div class="goodup-dashboard-wrap gray px-4 py-5 graphics-container">
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
                                <li class="breadcrumb-item"><a href="#" class="theme-cl">Download Graphic</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <form method="POST" id="myform" enctype="multipart/form-data">


                            <div class="submit-form">

                                <div class="dashboard-list-wraps bg-white rounded mb-4">
                                    <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                        <div class="dashboard-list-wraps-flx">
                                            <h4 class="mb-0 ft-medium fs-md"><i class="lni lni-postcard me-2 theme-cl fs-sm"></i>Select Your Graphic</h4>
                                        </div>
                                    </div>

                                    <div class="dashboard-list-wraps-body py-3 px-3">

                                        <div class="graphics_wrapper">
                                            <div>
                                                <div class="graph_style_1 graph-design" id="graph-design">
                                                    <img src="<?= base_url() ?>admin/graphicsuploads/<?= $graph[0]['graphics']  ?>" alt="graphics" class="bg_img">
                                                    <div class="logo">
                                                        <img src="<?= base_url() ?>assets/images/sagar.png" alt="">
                                                    </div>
                                                    <div class="graph_quote"></div>
                                                    <div class="graph_footer">
                                                        <div class="line_1">
                                                            <a href=""><i class="fas fa-phone-alt"></i> 6265965711</a>
                                                            <a href=""><i class="fas fa-envelope"></i> sagarthakur6947@gmail.com</a>
                                                        </div>
                                                        <div class="line_2">
                                                            <a href=""><i class="fa-solid fa-earth-africa"></i> webangeltech.com</a>
                                                            <a href=""><i class="fa-solid fa-location-dot"></i>Bhopal, Madhya Pradesh</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a id="btn-Convert-Html2Image" download="your_pic_name.png" class="btn btn-success download_btn">Download</a>
                                            </div>





                                            <div class="graph_style_2 graph-design">
                                                <img src="<?= base_url() ?>admin/graphicsuploads/<?= $graph[0]['graphics']  ?>" alt="graphics" class="bg_img">
                                                <div class="logo">
                                                    <img src="<?= base_url() ?>assets/images/sagar.png" alt="">
                                                </div>
                                                <div class="graph_quote">

                                                </div>
                                                <div class="graph_footer">
                                                    <div class="line_1">
                                                        <a href=""><i class="fas fa-phone-alt"></i> 6265965711</a>
                                                        <a href="" class="mail"><i class="fas fa-envelope"></i> sagarthakur6947@gmail.com</a>
                                                    </div>
                                                    <div class="line_2">
                                                        <a href="" class="web"><i class="fa-solid fa-earth-africa"></i> webangeltech.com</a>
                                                        <a href=""><i class="fa-solid fa-location-dot"></i> Bhopal, Madhya Pradesh</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="graph_style_3 graph-design">
                                                <img src="<?= base_url() ?>admin/graphicsuploads/<?= $graph[0]['graphics']  ?>" alt="graphics" class="bg_img">
                                                <div class="logo">
                                                    <img src="<?= base_url() ?>assets/images/sagar.png" alt="">
                                                </div>
                                                <div class="graph_quote">

                                                </div>
                                                <div class="graph_footer">
                                                    <div class="line_1">
                                                        <a href=""><i class="fas fa-phone-alt"></i> 6265965711</a>
                                                        <a href="" class="mail"><i class="fas fa-envelope"></i> sagarthakur6947@gmail.com</a>
                                                    </div>
                                                    <div class="line_2">
                                                        <a href="" class="web"><i class="fa-solid fa-earth-africa"></i> webangeltech.com</a>
                                                        <a href="" class="location"><i class="fa-solid fa-location-dot"></i> Bhopal, Madhya Pradesh</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer-bottom.php' ?>

</div>

<?php include 'includes/footer-link.php' ?>

</div>