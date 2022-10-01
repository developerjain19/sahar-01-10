<?php

include "../db/db_connect.php";
$output = ' ';
$emp = array();
$feedback = array();
$inquiry = array();
$select_company = $conn->query("SELECT * FROM `company` WHERE `company_status` != '2' ORDER BY `company_id` DESC");
$sno = 1;

$output .= '
            <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

          
      <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
      <script src="js/tabletoCSV.js" type="text/javascript" charset="utf-8"></script>

          <table id="select_companys" class="table table-bordered table-hover">
          <thead>
            <tr>
                <th>SNO.</th>
                <th>Type</th>
                <th>Logo</th>
                <th>Title</th>
                <th> Count</th>
                <th>Address</th>
                <th>Package</th>
                <th>Status</th>
                 <th>Date</th>
                 <th>Action</th>

            </tr>
          </thead>
          <tfoot>

            <tr>
                <th>SNO.</th>
                 <th>Type</th>
                 <th>Logo</th>
                <th>Title</th>
                <th>Count</th>
                <th>Address</th>
                <th>Package</th>
                <th>Status</th>
                 
                <th>Date</th>
                 <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
     ';
while ($select_company_row = $select_company->fetch_assoc()) {
  $select_emp = $conn->query("SELECT count(company_id) as coun FROM `employee` WHERE `company_id`= '" . $select_company_row['company_id'] . "' ");
  $emp = $select_emp->fetch_array();
  $select_inquiry = $conn->query("SELECT count(company_id) as coun FROM `inquiry` WHERE `company_id`= '" . $select_company_row['company_id'] . "' ");
  $inquiry = $select_inquiry->fetch_array();
  $select_feedback = $conn->query("SELECT count(company_id) as coun FROM `feedback` WHERE `company_id`= '" . $select_company_row['company_id'] . "' ");
  $feedback = $select_feedback->fetch_array();
  $select_category = $conn->query("SELECT * FROM `company_category` WHERE `cate_id`= '" . $select_company_row['company_category'] . "' ");
  $category = $select_category->fetch_array();
  $select_password = $conn->query("SELECT * FROM `tbl_registration` WHERE `rgid`= '" . $select_company_row['rgid'] . "' ");
  $password = $select_password->fetch_array();
   

  $select_package = $conn->query("SELECT * FROM `package` JOIN `package_purchased` ON `package_purchased`.`package_id` = `package`.`id` WHERE `package_purchased`.`company_id`= '" . $select_company_row['company_id'] . "' AND `package_purchased`.`status` ='0' AND `package_purchased`.`payment_status` = 'TXN_SUCCESS' ");
  if (mysqli_num_rows($select_package) > 0) {
    $package = $select_package->fetch_array();
  }
  // print_r($inquiry);
  if ($select_company_row["company_status"] == "0") {

    $option_status = "
                                <option value=0>Active </option>
                                <option value=1>Deactive</option>
                              ";
  } else {
    $option_status = "
                                <option value=1>Deactive</option>
                                <option value=0>Active </option>
                              ";
  }
  $output .= '     <tr>
                                <td> ' . $sno . ' </td>
                                <td> ' . (($select_company_row["company_type"] == 0)? 'Company':'Individual') . ' </td>
                               
                                <td><img src="../img/company/' . $select_company_row["company_logo"] . '?v=Date("Y.m.d.G.i.s")" width="100" height="70" alt="Company Logo" id="company_logo' . $select_company_row['company_id'] . '" onerror="defult_image(id);" /></td>


                                
                                <td><a target="_blank" href="' . website_url . 'sahar/' .clean(strtolower(trim($select_company_row["company_city"]))).'/' .clean(strtolower(trim($category["category"]))).'/'. $select_company_row['company_web_title'] . '">
                              
                                
                            ' .     (($select_company_row["company_type"] == 0)? $select_company_row["company_name"] :  $select_company_row["company_person"])   .'
                                
                               </a>
                                
                                
                                
                                <br>
                               
                                <a target="_blank" href="' . website_url . 'sahar/' .clean(strtolower(trim($select_company_row["company_city"]))).'/' .clean(strtolower(trim($category["category"]))).'/'. $select_company_row['company_web_title'] . '">
                                
                                
                                City URL  ' .     (($select_company_row["company_type"] == 0)? $select_company_row["company_name"] :  $select_company_row["company_person"])   .'</a><br>
                                
                                
                                
                                <p>Username: ' . $select_company_row["company_contact"] . '<br>Password : ' . $password["password"] . '</p></td>

                                <td>Employee : ' . $emp['coun'] . ' <br>Feedback : ' . $feedback['coun'] . ' <br>Enquiry : ' . $inquiry['coun'] . ' <br></td>
                                <td>' . wordwrap($select_company_row["company_city"], 30, "<br>") . '</td>
                                <td> ' . ((!isset($package["package_price"])) ? '' : 'Rs. ' . $package["package_price"]) . ' ' . ((!isset($package["package_day"])) ? '' : ' / ' . $package["package_day"] . ' days') . '</td>
                                <td>
                                  <div class="form-group">
                                      <select class="form-control show-tick" name="company_status" id="company_status" onmousedown="this.value=" ";" onchange="edit_company(' . $select_company_row["company_id"] . ' , this.value , id);" >
                                          ' . $option_status . '
                                      </select>
                                  </div>
                                </td>';





  $output .= '  <td>' . $select_company_row["created_date"] . '</td>
                                
                                <td><a href="ajax/company-del.php?id=' . $select_company_row["rgid"] . '" class="btn btn-primary">Delete</td>
                               
                            </tr>';
  $sno++;
}



// <button class="btn btn-danger btn_delete" name="delete_btn" data-sid2="' . $select_company_row["company_id"] . '"><i class="fa fa-trash"></i> Delete </button>
$output .= '
          </tbody>
        </table>

          ';

echo $output;
?>

<script>
  $(function() {

    $('#select_companys').DataTable({
      'paging': true,
      'lengthChange': true,
      'searching': true,
      'ordering': true,
      'info': true,
      'autoWidth': true
    })
  })
</script>

<script>
  $(function() {
    $("#export").click(function() {
      $("#select_companys").tableToCSV();
    });
  });

  function printData() {

  }

  function printTable() {
    // window.print();
    var divToPrint = document.getElementById("select_companys");
    newWin = window.open("");
    newWin.document.write(divToPrint.outerHTML);
    newWin.print();
    newWin.close();
  }

  function defult_image(company_logo_table) {
    $('#' + company_logo_table).attr('src', 'images/default-img.gif');

  }
</script>