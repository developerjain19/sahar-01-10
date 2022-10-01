<?php include 'includes/header-link.php';
?>

<div id="main-wrapper">


    <?php include 'includes/header2.php' ?>

    <?php include 'includes/dash-top-header.php' ?>

    <div class="goodup-dashboard-wrap gray px-4 py-5">
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
                                <li class="breadcrumb-item"><a href="#" class="theme-cl">Motivational</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <form method="POST" id="myform" enctype="multipart/form-data">
                            <?php
                            if ($this->session->has_userdata('msg')) {
                                echo $this->session->userdata('msg');
                                $this->session->unset_userdata('msg');
                            }

                            echo $this->session->has_userdata('msg');
                            echo $this->session->userdata('msg');
                            echo $this->session->unset_userdata('msg');
                            ?>

                            <div class="submit-form">

                                <div class="dashboard-list-wraps bg-white rounded mb-4">
                                    <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                        <div class="dashboard-list-wraps-flx">
                                            <h4 class="mb-0 ft-medium fs-md"><i class="lni lni-postcard me-2 theme-cl fs-sm"></i>Select theme</h4>
                                        </div>
                                    </div>

                                    <div class="dashboard-list-wraps-body py-3 px-3">

                                        <div class="graphics_wrapper">
                                            <div class="graph_style_1" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),  url(<?= base_url() ?>assets/images/second-slide.jpg); background-position: center; background-size: cover;">
                                                <div class="logo">
                                                    <img src="<?= base_url() ?>assets/images/logo-white.png" alt="">
                                                </div>
                                                <div class="graph_quote">
                                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum unde molestias rem accusamus quod aliquam, quaerat recusandae, totam nisi sint in quos possimus aliquid hic perspiciatis! Alias nemo asperiores et.
                                                </div>
                                                <div class="graph_footer">
                                                    <div class="line_1">
                                                        <a href=""><i class="fas fa-phone-alt"></i> +6265965711</a>
                                                        <a href=""><i class="fas fa-envelope"></i> sagarthakur6947@gmail.com</a>
                                                    </div>
                                                    <div class="line_2">
                                                        <a href=""><i class="fa-solid fa-earth-africa"></i> webangeltech.com</a>
                                                        <a href=""><i class="fa-solid fa-location-dot"></i> 789, M.p. nagar, Bhopal, Madhya Pradesh 462003</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="graph_style_1" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),  url(<?= base_url() ?>assets/images/second-slide.jpg); background-position: center; background-size: cover;">
                                                <div class="logo">
                                                    <img src="<?= base_url() ?>assets/images/logo-white.png" alt="">
                                                </div>
                                                <div class="graph_quote">
                                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum unde molestias rem accusamus quod aliquam, quaerat recusandae, totam nisi sint in quos possimus aliquid hic perspiciatis! Alias nemo asperiores et.
                                                </div>
                                                <div class="graph_footer">
                                                    <div class="line_1">
                                                        <a href=""><i class="fas fa-phone-alt"></i> +6265965711</a>
                                                        <a href=""><i class="fas fa-envelope"></i> sagarthakur6947@gmail.com</a>
                                                    </div>
                                                    <div class="line_2">
                                                        <a href=""><i class="fa-solid fa-earth-africa"></i> webangeltech.com</a>
                                                        <a href=""><i class="fa-solid fa-location-dot"></i> 789, M.p. nagar, Bhopal, Madhya Pradesh 462003</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="graph_style_1" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),  url(<?= base_url() ?>assets/images/second-slide.jpg); background-position: center; background-size: cover;">
                                                <div class="logo">
                                                    <img src="<?= base_url() ?>assets/images/logo-white.png" alt="">
                                                </div>
                                                <div class="graph_quote">
                                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum unde molestias rem accusamus quod aliquam, quaerat recusandae, totam nisi sint in quos possimus aliquid hic perspiciatis! Alias nemo asperiores et.
                                                </div>
                                                <div class="graph_footer">
                                                    <div class="line_1">
                                                        <a href=""><i class="fas fa-phone-alt"></i> +6265965711</a>
                                                        <a href=""><i class="fas fa-envelope"></i> sagarthakur6947@gmail.com</a>
                                                    </div>
                                                    <div class="line_2">
                                                        <a href=""><i class="fa-solid fa-earth-africa"></i> webangeltech.com</a>
                                                        <a href=""><i class="fa-solid fa-location-dot"></i> 789, M.p. nagar, Bhopal, Madhya Pradesh 462003</a>
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


<script>
    //  $('#active_link').hide();
    $('.form-control').keyup(function() {
        runval();
    });
    $('#check').click(function() {
        runval();
    });

    function runval() {
        if (!$('#web_company_name').val()) {

            $('#web_company_name_msg').text('Company web name is required');
        } else {
            var str = $('#web_company_name').val();
            str = str.replace(/\W$/, '-');
            $('#web_company_name').val(str);

            $('#web_company_name').text('');
            //  $('#active_link').show(500);
            $.ajax({
                url: "<?= base_url('home/getvalue') ?>",
                method: "POST",
                data: {
                    nm: str
                },
                success: function(data) {
                    console.log(data)
                    if (data == 'Y') {
                        $('#web_company_name_msgs').text('Username is Available');
                        $('#web_company_name_msg').text('');
                        $('#url_pre').text(str);
                    } else {

                        $('#web_company_name_msg').text('Username Not Available');
                        $('#web_company_name_msgs').text('');
                    }

                }
            });

        }

    }
</script>
<?php include 'includes/footer-link.php' ?>