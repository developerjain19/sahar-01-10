<?php include 'includes/header-link.php';
?>
<script src="<?= base_url() ?>assets/html2canvas.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

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
                                            <h4 class="mb-0 ft-medium fs-md"><i
                                                    class="lni lni-postcard me-2 theme-cl fs-sm"></i>Select Your Graphic
                                            </h4>
                                        </div>
                                    </div>

                                    <div class="dashboard-list-wraps-body py-3">

                                        <div class="graphics_wrapper">
                                            <div class="graph_box">
                                                <div class="graph_style_1 graph-design" id="about1">
                                                    <img src="<?= base_url() ?>admin/graphicsuploads/<?= $graph[0]['graphics']  ?>"
                                                        alt="graphics" class="bg_img">
                                                    <div class="logo">
                                                        <img src="<?= base_url() ?>assets/images/sagar.png" alt="">
                                                    </div>
                                                    <div class="graph_quote"></div>
                                                    <div class="graph_footer">
                                                        <div class="line_1">
                                                            <a href=""><img
                                                                    src="<?= base_url() ?>assets/icons/call/call_3.png"
                                                                    alt=""> 6265965711</a>
                                                            <a href=""><img
                                                                    src="<?= base_url() ?>assets/icons/mail/mail_1.png"
                                                                    alt=""> sagarthakur6947@gmail.com</a>
                                                            <a href=""><img
                                                                    src="<?= base_url() ?>assets/icons/web/web_2.png"
                                                                    alt=""> webangeltech.com</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button onclick="doCapture('1')" type="button" class="btn btn-success download_btn">Download</button>
                                            </div>


                                            <div class="graph_box">
                                                <div class="graph_style_2 graph-design" id="about2">
                                                    <img src="<?= base_url() ?>admin/graphicsuploads/<?= $graph[0]['graphics']  ?>"
                                                        alt="graphics" class="bg_img">
                                                    <div class="logo">
                                                        <img src="<?= base_url() ?>assets/images/sagar.png" alt="">
                                                    </div>
                                                    <div class="graph_quote">

                                                    </div>
                                                    <div class="graph_footer">
                                                        <div class="line_1">
                                                            <a href=""><img
                                                                    src="<?= base_url() ?>assets/icons/call/call_1.png"
                                                                    alt=""> 6265965711</a>
                                                            <a href="" class="mail"><img
                                                                    src="<?= base_url() ?>assets/icons/mail/mail_4.png"
                                                                    alt=""> sagarthakur6947@gmail.com</a>
                                                        </div>
                                                        <div class="line_2">
                                                            <a href="" class="web"><img
                                                                    src="<?= base_url() ?>assets/icons/web/web_4.png"
                                                                    alt=""> webangeltech.com</a>
                                                            <a href=""><img
                                                                    src="<?= base_url() ?>assets/icons/map/map_3.png"
                                                                    alt=""> Bhopal, Madhya Pradesh</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button onclick="doCapture('2')" type="button"
                                                    class="btn btn-success download_btn">Download</button>
                                            </div>


                                            <!-- <div class="graph_box">
                                                <div class="graph_style_3 graph-design">
                                                    <img src="<?= base_url() ?>admin/graphicsuploads/<?= $graph[0]['graphics']  ?>" alt="graphics" class="bg_img">
                                                    <div class="logo">
                                                        <img src="<?= base_url() ?>assets/images/sagar.png" alt="">
                                                    </div>
                                                    <div class="graph_quote">
                                                    </div>
                                                    <div class="graph_footer">
                                                        <div class="line_1">
                                                            <a href=""><img src="<?= base_url() ?>assets/icons/call/call_5.png" alt=""> 6265965711</a>
                                                            <a href="" class="mail"><img src="<?= base_url() ?>assets/icons/mail/mail_5.png" alt=""> sagarthakur6947@gmail.com</a>
                                                        </div>
                                                        <div class="line_2">
                                                            <a href="" class="web"><img src="<?= base_url() ?>assets/icons/web/web_5.png" alt=""> webangeltech.com</a>
                                                            <a href="" class="location"><img src="<?= base_url() ?>assets/icons/map/map_5.png" alt=""> Bhopal, Madhya Pradesh</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a id="btn-Convert-Html2Image" download="your_pic_name.png" class="btn btn-success download_btn">Download</a>
                                            </div> -->


                                            <div class="graph_box">
                                                <div class="graph_style_3 graph-design" id="about" data-id="3">
                                                    <img src="<?= base_url() ?>admin/graphicsuploads/<?= $graph[0]['graphics']  ?>"
                                                        alt="graphics" class="bg_img">
                                                    <div class="logo">
                                                        <img src="<?= base_url() ?>assets/images/sagar.png" alt="">
                                                    </div>
                                                    <div class="graph_quote">
                                                    </div>
                                                    <div class="graph_footer">
                                                        <div class="line_1">
                                                            <a href=""><img
                                                                    src="<?= base_url() ?>assets/icons/call/call_5.png"
                                                                    alt=""> 6265965711</a>
                                                            <a href="" class="mail"><img
                                                                    src="<?= base_url() ?>assets/icons/web/web_5.png"
                                                                    alt=""> webangeltech.com</a>
                                                        </div>
                                                        <div class="line_2">
                                                            <a href="" class="web"><img
                                                                    src="<?= base_url() ?>assets/icons/map/map_5.png"
                                                                    alt=""> Bhopal, Madhya Pradesh</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button onclick="doCapture()" type="button"
                                                    class="btn btn-success download_btn">Download</button>
                                            </div>


                                            <div class="graph_box">
                                                <div class="graph_style_4 graph-design" id="graph-design">
                                                    <img src="<?= base_url() ?>admin/graphicsuploads/<?= $graph[0]['graphics']  ?>"
                                                        alt="graphics" class="bg_img">
                                                    <div class="logo">
                                                        <img src="<?= base_url() ?>assets/images/sagar.png" alt="">
                                                    </div>
                                                    <div class="graph_quote"></div>
                                                    <div class="graph_footer">
                                                        <div class="line_1">
                                                            <a href=""><img
                                                                    src="<?= base_url() ?>assets/icons/call/call_2.png"
                                                                    alt=""> 6265965711</a>
                                                            <a href=""><img
                                                                    src="<?= base_url() ?>assets/icons/mail/mail_3.png"
                                                                    alt=""> sagarthakur6947@gmail.com</a>
                                                        </div>
                                                        <div class="line_2">
                                                            <a href=""><img
                                                                    src="<?= base_url() ?>assets/icons/web/web_4.png"
                                                                    alt=""> webangeltech.com</a>
                                                            <a href=""><img
                                                                    src="<?= base_url() ?>assets/icons/map/map_3.png"
                                                                    alt="">Bhopal, Madhya Pradesh</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a id="btn-Convert-Html2Image" download="your_pic_name.png"
                                                    class="btn btn-success download_btn">Download</a>
                                            </div>

                                            <div class="graph_box">
                                                <div class="graph_style_5 graph-design" id="graph-design">
                                                    <img src="<?= base_url() ?>admin/graphicsuploads/<?= $graph[0]['graphics']  ?>"
                                                        alt="graphics" class="bg_img">
                                                    <div class="logo">
                                                        <img src="<?= base_url() ?>assets/images/sagar.png" alt="">
                                                    </div>
                                                    <div class="graph_quote"></div>
                                                    <div class="graph_footer">
                                                        <div class="line_1">
                                                            <a href="" class="call_icon"><img
                                                                    src="<?= base_url() ?>assets/icons/call/calll_6.png"
                                                                    alt=""> 6265965711</a>
                                                            <a href="" class="email"><img
                                                                    src="<?= base_url() ?>assets/icons/mail/mail_6.png"
                                                                    alt=""> sagarthakur6947@gmail.com </a>
                                                        </div>
                                                        <div class="line_2">
                                                            <a href="" class="web_icon"><img
                                                                    src="<?= base_url() ?>assets/icons/web/web_7.png"
                                                                    alt=""> webangeltech.com </a>
                                                            <a href="" class="map"><img
                                                                    src="<?= base_url() ?>assets/icons/map/map_6.png"
                                                                    alt=""> Bhopal, Madhya Pradesh </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a id="btn-Convert-Html2Image" download="your_pic_name.png"
                                                    class="btn btn-success download_btn">Download</a>
                                            </div>

                                            <div class="graph_box">
                                                <div class="graph_style_6 graph-design" id="graph-design">
                                                    <img src="<?= base_url() ?>admin/graphicsuploads/<?= $graph[0]['graphics']  ?>"
                                                        alt="graphics" class="bg_img">
                                                    <div class="logo">
                                                        <img src="<?= base_url() ?>assets/images/sagar.png" alt="">
                                                    </div>
                                                    <div class="graph_quote"></div>
                                                    <div class="graph_footer">
                                                        <span class="black_overlay">
                                                            <span class="tan_overlay"></span>
                                                        </span>

                                                        <span class="tan_circle"></span>
                                                        <div class="line_1">
                                                            <a href="" class="call_icon"><img
                                                                    src="<?= base_url() ?>assets/icons/call/calll_6.png"
                                                                    alt=""> 6265965711</a>
                                                            <div class="mail_web">
                                                                <a href="" class="email"><img
                                                                        src="<?= base_url() ?>assets/icons/mail/mail_6.png"
                                                                        alt=""></a>
                                                                <div class="text">
                                                                    <span>sagarthakur6947@gmail.com</span>
                                                                    <span>Webangeltech.com</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="line_2">
                                                            <a href="" class="map"><img
                                                                    src="<?= base_url() ?>assets/icons/map/map_6.png"
                                                                    alt=""> Bhopal, Madhya Pradesh </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a id="btn-Convert-Html2Image" download="your_pic_name.png"
                                                    class="btn btn-success download_btn">Download</a>
                                            </div>

                                            <div class="graph_box">
                                                <div class="graph_style_7 graph-design" id="graph-design">
                                                    <img src="<?= base_url() ?>admin/graphicsuploads/<?= $graph[0]['graphics']  ?>"
                                                        alt="graphics" class="bg_img">
                                                    <div class="logo">
                                                        <img src="<?= base_url() ?>assets/images/sagar.png" alt="">
                                                    </div>
                                                    <div class="graph_quote"></div>
                                                    <div class="graph_footer">
                                                        <div class="line_1">
                                                            <a href="" class="mail"><img
                                                                    src="<?= base_url() ?>assets/icons/mail/mail_4.png"
                                                                    alt=""> sagarthakur6947@gmail.com</a>
                                                            <a href="" class="mobile"><img
                                                                    src="<?= base_url() ?>assets/icons/call/call_3.png"
                                                                    alt=""> 6265965711</a>
                                                            <a href="" class="web"><img
                                                                    src="<?= base_url() ?>assets/icons/web/web_8.png"
                                                                    alt=""> webangeltech.com</a>
                                                        </div>
                                                        <div class="line_2">
                                                            <div class="social">
                                                                <img src="<?= base_url() ?>assets/icons/social/facebook.png"
                                                                    alt="">
                                                                <img src="<?= base_url() ?>assets/icons/social/instagram.png"
                                                                    alt="">
                                                                <img src="<?= base_url() ?>assets/icons/social/twitter.png"
                                                                    alt="">
                                                                <img src="<?= base_url() ?>assets/icons/social/youtube.png"
                                                                    alt="">
                                                                <img src="<?= base_url() ?>assets/icons/social/linkedin.png"
                                                                    alt="">
                                                            </div>
                                                            <a href=""><img
                                                                    src="<?= base_url() ?>assets/icons/map/map_3.png"
                                                                    alt=""> Bhopal, Madhya Pradesh</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a id="btn-Convert-Html2Image" download="your_pic_name.png"
                                                    class="btn btn-success download_btn">Download</a>
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
<script>
    function doCapture(id) {
        window.scrollTo(0, 0);
        // alert('Downloading graphics.');
        var nid = document.getElementById("about" + id);

        html2canvas(nid).then(function (canvas) {
            var ajax = new XMLHttpRequest();
            ajax.open("POST", "<?= base_url('home/save_capture') ?>", true);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.send("image=" + canvas.toDataURL("image/jpeg", 0.9));

            html2canvas(document.getElementById("about"+id)).then((canvas) => {
                const bgimg = canvas.toDataURL("image/jpeg", 0.9);
                console.log(bgimg);
                var canvas = document.getElementById("mcanvas");
                var link = document.createElement('a');
             
                link.download = "my-image.png";
                link.href = bgimg;
                link.click();
            });
        });
    }
</script>
</div>