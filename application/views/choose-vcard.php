<?php include 'includes/header-link.php'; 

$cate = getRowById('company_category', 'cate_id', $getcard[0]['company_category']);
$cityfetch = getRowById('tbl_cities', 'id', $getcard[0]['company_city']);
?>
<style>
    input[type="radio"][id^="myCheckbox"] {
        display: none;
    }

    .theme-label {
        border: 1px solid #fff;
        padding: 10px;
        display: block;
        position: relative;
        margin: 10px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .theme-label:before {
        background-color: red;
        color: white;
        content: " ";
        display: block;
        border-radius: 50%;
        border: 1px solid grey;
        position: absolute;
        top: -5px;
        left: -5px;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 28px;
        transition-duration: 0.4s;
        transform: scale(0);
    }

    .theme-label img {
        width: 200px;
        transition-duration: 0.2s;
        transform-origin: 50% 50%;
    }

    :checked+.theme-label {
        border-color: #ddd;
    }

    :checked+.theme-label:before {
        content: "\f00c";
        background-color: green;
        transform: scale(1);
    }

    :checked+.theme-label img {
        transform: scale(0.9);
        /* box-shadow: 0 0 5px #333; */
        z-index: 999;
    }
</style>

<div id="main-wrapper">


    <?php include 'includes/header2.php' ?>

    <?php include 'includes/dash-top-header.php' ?>

    <div class="goodup-dashboard-wrap gray px-4 py-5 mobile_author">
        <?php include 'includes/dash-side-header.php' ?>
        <div class="goodup-dashboard-content">
            <div class="dashboard-tlbar d-block mb-5">
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12">
                        <h1 class="ft-medium"><?= sessionId('sahar') ? "Choose Vcard Theme" : "Choose Vcard/Website"; ?></h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                                <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="theme-cl">Vcard/website Theme</a></li>
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
                                <!-- Listing Info -->
                                <div class="dashboard-list-wraps bg-white rounded mb-4">
                                    <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                        <div class="dashboard-list-wraps-flx">
                                            <h4 class="mb-0 ft-medium fs-md"><i class="fa fa-file me-2 theme-cl fs-sm"></i>Vcard/website URL Details</h4>
                                        </div>
                                    </div>

                                    <div class="dashboard-list-wraps-body py-3 px-3">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label class="mb-1">Your Vcard/website URL ( Note : Only Use (A-Z),(a-z),(0-9),(_) ) <i><span style="color:red;font-size:12px;" id="web_company_name_msg"></span><span style="color:green;font-size:12px;" id="web_company_name_msgs"></span></i></label>
                                                    <input type="text" class="form-control rounded" placeholder="Ex: yourcompany-name" name="company_web_title" id="web_company_name" value="<?= (($getcard != '') ? (url_title($getcard['0']['company_web_title'], 'dash', true)) : '') ?>" <?= (($getcard['0']['company_web_title'] != '') ? 'readonly' : '') ?> autocomplete="off" />

                                                     <?= (($getcard['0']['company_web_title'] != '') ? '<p class=""> If you want to change your Vcard Url Please Chat with us on <a target="_blank" href="https://api.whatsapp.com/send?phone=+917419272427&text=Hi, I Want to Change my vcard url" class="commonbutton text-success"><i class="lni lni-whatsapp"></i> Whatsapp</a></p>' : '') ?>
                                                    <?php
                                                    if($getcard['0']['company_web_title'] == ''){
                                                    ?>
                                                    <a id="active_link" style="word-break: break-all;"><span class="text-danger">Your website URL:</span> <?= base_url() ?>sahar/<?= url_title($cityfetch['0']['name']) ?>/<?= url_title(strtolower($cate[0]['category'])); ?>/<span id="url_pre"></span></a>
                                                    <?php
                                                    }else{
                                                    ?>
                                                     <a id="active_link" style="word-break: break-all;"><span class="text-danger">Your website URL:</span> <?= base_url() ?>sahar/<?= url_title($cityfetch['0']['name']) ?>/<?= url_title(strtolower($cate[0]['category'])); ?>/<?= $getcard['0']['company_web_title'] ?><span id="url_pre"></span></a>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="dashboard-list-wraps bg-white rounded mb-4">
                                    <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                        <div class="dashboard-list-wraps-flx">
                                            <h4 class="mb-0 ft-medium fs-md"><i class="lni lni-postcard me-2 theme-cl fs-sm"></i>Select theme</h4>
                                        </div>
                                    </div>

                                    <div class="dashboard-list-wraps-body py-3 px-3">
                                        <div class="row">


                                            <?php
                                            $i = 0;
                                            if ($vcard != '') {
                                                foreach ($vcard as $row) {
                                                    $i = $i + 1;
                                            ?>

                                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                                        <div class="form-group d-flex align-items-center flex-column">
                                                            <span class="mb-1">Style<?= $i ?></span>
                                                            <input type="radio" name="vacrd_style" value="<?= $row['did'] ?>" id="myCheckbox<?= $i ?>" <?php if ($getcard != '') { ?> 
                                                            <?= (($getcard['0']['vacrd_style'] ==  $row['did']) ? 'Checked' : (($i == '1') ? 'Checked' : '')) ?> <?php } ?> />
                                                            <label for="myCheckbox<?= $i ?>" class="theme-label fa fa-check"></i>
                                                                <img src="<?= base_url() ?>assets/images/vcard/<?= $row['design'] ?>" /></label>
                                                        </div>
                                                    </div>


                                            <?php
                                                }
                                            }
                                            ?>

                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn theme-bg text-light rounded">Save</button>
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
            str = str.replace(/[^\w_]/gi, '-');
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