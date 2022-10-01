<?php include 'includes/header-link.php';
?>

<div id="main-wrapper">

    <?php include 'includes/header2.php' ?>
    <section class="gray">
        <div class="container">
            <div class="row align-items-start justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-12">

                    <div class="signup-screen-wrap">
                        <div class="signup-screen-single light">
                            <div class="text-center mb-4">
                                <h4 class="m-0 ft-medium">Phone verification</h4>

                            </div>
                            <?php
                            if ($this->session->has_userdata('msg')) {
                                echo $this->session->userdata('msg');
                                $this->session->unset_userdata('msg');
                            }
                            ?>
                            <form method="post" id="otpver">
                                <span class="ec-login-wrap">
                                    <label>Enter OTP sent to your mobile no. <?= $this->session->userdata['login_user_contact'] ?></label>
                                    <input type="text" class="form-control" name="otp" id="otpval" placeholder="****">
                                    <span id="otpmsg"></span>
                                    <br>
                                </span>
                                <span class="ec-login-wrap ec-login-btn text-center">
                                    <button class="btn btn-md full-width bg-sky text-light rounded ft-medium" type="button"  id="submitotp">Submit OTP</button>
                                    <br />
                                    <hr><br />
                                    <button type="button" id="resend" class="resendbtn btn btn-md full-width bg-sky text-light rounded ft-medium" data-contact="<?= $this->session->userdata['login_user_contact'] ?>">Resend OTP</button>
                                    <span id="resendmsg"></span>
                                </span>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php' ?>

</div>

<?php include 'includes/footer-link.php' ?>
<script>
    $(document).ready(function() {

        var countdownv = 20;
        $('#resend').hide();
        var refreshId = setInterval(function() {
            if (countdownv > 1) {
                $('#resendmsg').text('Resend in ' + countdownv + ' sec');
                countdownv--;
            } else {
                $('#resendmsg').text('');
                clearInterval(refreshId);
            }
        }, 1000);
        setTimeout(function() {
            $('#resend').show();
        }, 20000);
    });


    $('#submitotp').click(function() {
        var vid = $('#otpval').val();
       console.log(vid);
        $.ajax({
            method: "POST",
            url: "<?= base_url('checkotp') ?>",
            data: {
                vid: vid
            },
            success: function(response) {
                  console.log(response);
                if (response == '1') {
                    window.location = "<?= base_url('my-profile') ?>";
                } else {
                    $('#otpmsg').text('Enter valid OTP');
                }
            }
        });
    });
    $('#resend').click(function() {
        var vid = $(this).data('contact');
        $('#resend').prop('disabled', true);
        $('#resend').css('color', 'white');

        $.ajax({
            method: "POST",
            url: "<?= base_url('home/resendotp') ?>",
            data: {
                vid: vid
            },
            success: function(response) {
                if (response == '1') {
                    //  $('#otpver').submit();
                } else {
                    //  $('#otpmsg').text('Enter valid OTP');
                }
            }
        });
        var countdown = 20;
        var refreshId = setInterval(function() {
            if (countdown > 1) {
                $('#resendmsg').text('Resend in ' + countdown + ' sec');
                countdown--;
            } else {
                $('#resendmsg').text('');
                clearInterval(refreshId);
            }
        }, 1000);
        setTimeout(function() {
            $('#resend').prop('disabled', false);
            $('#resend').css('color', 'grey');

        }, 20000);
    });
</script>