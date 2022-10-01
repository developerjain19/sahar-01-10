<?php error_reporting(0);

$active = $_SERVER["PHP_SELF"];
$nav = "/secard/admin";

?>

<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->


      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php if ($active == $nav . "/dashboard.php") {echo "active";}?>">
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="<?php if ($active == $nav . "/company_category.php") {echo "active";}?>" >
          <a href="company_category.php">
            <i class="fa fa-address-book"></i> <span> Category</span>
          </a>
        </li>
        <li class="<?php if ($active == $nav . "/company-subactegory.php") {echo "active";}?>" >
          <a href="company-subactegory.php">
            <i class="fa fa-address-book"></i> <span> Sub Category</span>
          </a>
        </li>
         <li class="<?php if ($active == $nav . "/add-company.php") {echo "active";}?>" >
          <a href="add-company.php">
            <i class="fa fa-address-book"></i> <span>Add Company</span>
          </a>
        </li>
        <li class="<?php if ($active == $nav . "/company.php") {echo "active";}?>" >
          <a href="company.php">
            <i class="fa fa-address-book"></i> <span>Company Details</span>
          </a>
        </li>
        
        <li class="<?php if ($active == $nav . "/user-details.php") {echo "active";}?>" >
          <a href="user-details.php">
            <i class="fa fa-address-book"></i> <span>User Details</span>
          </a>
        </li>
        
        <li class="<?php if ($active == $nav . "/feedback.php") {echo "active";}?>"  style="display:none;">
          <a href="feedback.php">
            <i class="fa fa-star"></i> <span>My Feedback</span>
          </a>
        </li>
        <li class="<?php if ($active == $nav . "/enquiry.php") {echo "active";}?>"  style="display:none;">
          <a href="enquiry.php">
            <i class="fa fa-address-book"></i> <span>My  Enquiry</span>
          </a>
        </li>
        <li class="<?php if ($active == $nav . "/package.php") {echo "active";}?>" >
          <a href="package.php">
            <i class="fa fa-address-book"></i> <span>My  packages</span>
          </a>
        </li>
        
          <li class="<?php if ($active == $nav . "/package_summary.php") {echo "active";}?>" >
          <a href="package_summary.php">
            <i class="fa fa-address-book"></i> <span>Packages Summary</span>
          </a>
        </li>
         <li class="<?php if ($active == $nav . "/graphics.php") {echo "active";}?>" >
          <a href="graphics.php">
            <i class="fa fa-address-book"></i> <span>Graphics/Daily quote </span>
          </a>
        </li>
        <li class="treeview <?php if ($active == $nav . "/coupon.php") {echo "active";}?> <?php if ($active == $nav . "/coupon_view.php") {echo "active";}?>">
          <a href="#">
            <i class="fa fa-tags"></i>
            <span>Coupon</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" >
            <li class="<?php if ($active == $nav . "/coupon.php") {echo "active";}?>" ><a href="coupon.php"><i class="fa fa-circle-o"></i>Add Coupon</a></li>
            <li class="<?php if ($active == $nav . "/coupon_view.php") {echo "active";}?>" ><a href="coupon_view.php"><i class="fa fa-circle-o"></i>View Coupon</a></li>
          </ul>
        </li>
           <li class="<?php if ($active == $nav . "/happy_clients.php") {echo "active";}?>" >
          <a href="happy_clients.php">
            <i class="fa fa-address-book"></i> <span>happy clients</span>
          </a>
        </li>
        <li class="<?php if ($active == $nav . "/blog.php") {echo "active";}?>" >
          <a href="blog.php">
            <i class="fa fa-address-book"></i> <span>Blog</span>
          </a>
        </li>
        <li class="<?php if ($active == $nav . "/banner.php") {echo "active";}?>" >
          <a href="banner.php">
            <i class="fa fa-address-book"></i> <span>Banner</span>
          </a>
        </li>
        
          <li class="<?php if ($active == $nav . "/defaults.php") {echo "active";}?>" >
          <a href="defaults.php">
            <i class="fa fa-address-book"></i> <span>Default Banner/logo</span>
          </a>
        </li>
        
         
          <li class="<?php if ($active == $nav . "/social-links.php") {echo "active";}?>" >
          <a href="social-links.php">
            <i class="fa fa-address-book"></i> <span>Social Links/Contacts</span>
          </a>
        </li>
        
        <li class="<?php if ($active == $nav . "/web_feedback.php") {echo "active";}?>" >
          <a href="web_feedback.php">
            <i class="fa fa-address-book"></i> <span>Website Feedback</span>
          </a>
        </li>
        <li class="<?php if ($active == $nav . "/terms.php") {echo "active";}?>" >
          <a href="terms.php">
            <i class="fa fa-address-book"></i> <span>Terms and condition</span>
          </a>
        </li>
        <li class="<?php if ($active == $nav . "/disclaimer.php") {echo "active";}?>" >
          <a href="disclaimer.php">
            <i class="fa fa-address-book"></i> <span>Disclaimer</span>
          </a>
        </li>
        <li class="<?php if ($active == $nav . "/privacy_policy.php") {echo "active";}?>" >
          <a href="privacy_policy.php">
            <i class="fa fa-address-book"></i> <span>Privacy Policy</span>
          </a>
        </li>
        
         <li class="<?php if ($active == $nav . "/about-us.php") {echo "active";}?>" >
          <a href="about-us.php">
            <i class="fa fa-address-book"></i> <span>About Us</span>
          </a>
        </li>
        
        <li class="<?php if ($active == $nav . "/refund_policy.php") {echo "active";}?>" >
          <a href="refund_policy.php">
            <i class="fa fa-address-book"></i> <span>Refund Policy</span>
          </a>
        </li>
        <li class="treeview <?php if ($active == $nav . "/payment_company.php") {echo "active";}?> <?php if ($active == $nav . "/payment_employee.php") {echo "active";}?>">
          <a href="#">
            <i class="fa fa-tags"></i>
            <span>Payment Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" >
            <li class="<?php if ($active == $nav . "/payment_company.php") {echo "active";}?>" ><a href="payment_company.php"><i class="fa fa-circle-o"></i>Company</a></li>
            <li class="<?php if ($active == $nav . "/payment_employee.php") {echo "active";}?>" ><a href="payment_employee.php"><i class="fa fa-circle-o"></i>Employee</a></li>
          </ul>
        </li>
        <!-- <li class="treeview <?php if ($active == $nav . "/product.php") {echo "active";}?> <?php if ($active == $nav . "/gallery.php") {echo "active";}?>">
          <a href="#">
            <i class="fa fa-tags"></i>
            <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" >
            <li class="<?php if ($active == $nav . "/product.php") {echo "active";}?>" ><a href="product.php"><i class="fa fa-circle-o"></i>Product</a></li>
            <li class="<?php if ($active == $nav . "/gallery.php") {echo "active";}?>" ><a href="gallery.php"><i class="fa fa-circle-o"></i>Gallery</a></li>
          </ul>
        </li>

        <li class="<?php if ($active == $nav . "/employee.php") {echo "active";}?>" >
          <a href="employee.php">
            <i class="fa fa-users"></i> <span>Employee</span>
          </a>
        </li> -->
        <?php if ($_SESSION['ecard_company_id'] == "0" ) {
         ?>
        <li class="<?php if ($active == $nav . "/company.php") {echo "active";}?>" >
          <a href="company.php">
            <i class="fa fa-building"></i> <span>Company</span>
          </a>
        </li>

          <li class="<?php if ($active == $nav . "/company_category.php") {echo "active";}?>" >
          <a href="company_category.php">
            <i class="fa fa-users"></i> <span>Company Category</span>
          </a>
        </li>

            <li class="<?php if ($active == $nav . "/company-subactegory.php") {echo "active";}?>" >
          <a href="company-subactegory.php">
            <i class="fa fa-users"></i> <span>Company Sub-Category</span>
          </a>
        </li>

        <li class="<?php if ($active == $nav . "/admin.php") {echo "active";}?>" >
          <a href="admin.php">
            <i class="fa fa-user-secret"></i> <span>Admin</span>
          </a>
        </li>
        <?php 
      } 
        ?>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>