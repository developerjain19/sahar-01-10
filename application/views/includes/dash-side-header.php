<div class="goodup-dashboard-wrap gray px-4 py-5 col-xl-3 col-lg-4 col-md-12 col-sm-12">
    <a class="mobNavigation" data-bs-toggle="collapse" href="#MobNav" role="button" aria-expanded="false" aria-controls="MobNav">
        <i class="fas fa-bars me-2"></i>Dashboard Navigation
    </a>
    <div class="collapse" id="MobNav">
        <div class="goodup-dashboard-nav sticky-top">
            <?php
            $get_pro = runQuery("SELECT * FROM company WHERE rgid = '" . sessionId('login_user_id') . "' ");
            ?>

            <div class="goodup-dashboard-inner dash-nav <?= (($get_pro[0]['vacrd_style'] == '') ? "disable" : ""); ?>">
                <?php
                if ($get_pro[0]['vacrd_style'] == '') {
                ?>
                    <div class="disable-msg">
                        <i class="lni lni-lock-alt"></i>
                        <p>Complete your profile to unlock your dashboard</p>
                    </div>
                <?php
                }
                ?>
                <div class="nav-head d-flex justify-content-between align-items-center "><span>Main Navigation</span>
                </div>
                <ul data-submenu-title="Main Navigation">
                    <li class=""><a href="<?= base_url('dashboard') ?>"><i class="lni lni-dashboard me-2"></i>Dashboard</a></li>
                </ul>
                 <div class="nav-head d-flex justify-content-between align-items-center border-top"><span>Vcard/Website</span>
                    <div id="website-toggle" class="fas fa-plus"></div>
                </div>
                <ul data-submenu-title="Vcard/Website" class="website">
                    <li><a href="<?= base_url('choose-vcard') ?>"><i class="lni lni-postcard me-2"></i>Vcard Theme</a></li>
                    <li><a href="<?= base_url('bank-details') ?>"><i class="lni lni-money-protection me-2"></i>Add Bank Details </a></li>
                    <li><a href="<?= base_url('online-payment') ?>"><i class="lni lni-money-protection me-2"></i>Add Online Payment Details </a></li>
                    <li><a href="<?= base_url('section-category') ?>"><i class="lni lni-menu me-2"></i>Section Category</a></li>
                    <li><a href="<?= base_url('section-list') ?>"><i class="lni lni-more me-2"></i>Section List</a></li>
                </ul>
                <div class="nav-head d-flex justify-content-between align-items-center border-top"><span>My Business</span>
                    <div id="business-toggle" class="fas fa-plus"></div>
                </div>
                <ul data-submenu-title="My Business" class="business">
                    <li><a href="<?= base_url('about') ?>"><i class="lni lni-information me-2"></i>About Us</a></li>
                    <li><a href="<?= base_url('product-list') ?>"><i class="lni lni-files me-2"></i>My Product/Services</a></li>
                    <li><a href="<?= base_url('gallery') ?>"><i class="lni lni-image me-2"></i>Gallery</a></li>
                    <li><a href="<?= base_url('video') ?>"><i class="lni lni-backward me-2"></i>Videos</a></li>
                    <li><a href="<?= base_url('enquiry') ?>"><i class="lni lni-list me-2"></i>Enquiry</a></li>
                    <li><a href="<?= base_url('reviews') ?>"><i class="lni lni-star me-2"></i>Reviews</a></li>
                </ul>




                <div class="nav-head d-flex justify-content-between align-items-center border-top"><span>Social Graphics</span>
                    <div id="banner-toggle" class="fas fa-plus"></div>
                </div>
                <ul data-submenu-title="Banners" class="banner">
                    <li><a href=""><i class="lni lni-files me-2"></i>Festive</a></li>
                    <li><a href="<?= base_url('graphics-motivational') ?>"><i class="lni lni-files me-2"></i>Motivational</a></li>
                    <li><a href=""><i class="lni lni-files me-2"></i>Business</a></li>
                </ul>
                <div class="nav-head d-flex justify-content-between align-items-center border-top "><span>My Account</span>
                    <div id="account-toggle" class="fas fa-plus"></div>
                </div>
                <ul data-submenu-title="My Accounts" class="account">
                    <li><a href="<?= base_url('my-profile') ?>"><i class="lni lni-user me-2"></i>My Profile </a></li>
                    <li><a href="<?= base_url('changePassword') ?>"><i class="lni lni-lock-alt me-2"></i>Change Password</a></li>
                    <li><a href="<?= base_url('logout') ?>"><i class="lni lni-power-switch me-2"></i>Log Out</a></li>
                </ul>
            </div>
        </div>
    </div>

</div>