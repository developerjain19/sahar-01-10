<?php

include "../db/db_connect.php";
$output = ' ';
$emp=array();$feedback=array();$inquiry =array();
 $r = "SELECT `employee`.`emp_id` as eid, `employee`.`company_id` as cid, `create_date`, `emp_name`, `employee_web_url`, `emp_email`, `image`, `emp_no`, `employee_pass`, `emp_address`, `emp_whatsapp_no`, `emp_designation`, `emp_whastapp`, `emp_fb`, `emp_insta`, `emp_linkdin`, `emp_status`,
 
 `id`, `package_id`,   `coupon_id`, `pur_type`, `package_purchased`.`emp_id`, `order_id`, `pur_date`, `exp_date`, `status`, `mid`, `txnid`, `amount`, `payment_mode`, `payment_status`, `banktxn_id`
 
 FROM `employee` INNER JOIN `package_purchased` ON `employee`.`emp_id`=`package_purchased`.`emp_id` 
                WHERE `package_purchased`.`status` = '0' AND `pur_type`='employee'  ";
                // echo $r;
$select_company = $conn->query($r);
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
                <th>Employee name</th>
                <th>Company name</th>
                <th> State</th>
                <th> District</th>
                <th>City</th>
                <th>Category/sub category</th> 
                <th>Package name/price</th> 
                 
            </tr>
          </thead>
          <tfoot>

            <tr>
                 <th>SNO.</th>
                <th>Employee name</th>
                <th>Company name</th>
                <th> State</th>
                <th> District</th>
                <th>City</th>
                <th>Category/sub category</th> 
                <th>Package name/price</th> 
            </tr>
          </tfoot>
          <tbody>
     ';
while ($select_company_row = $select_company->fetch_assoc()) {
    // print_r($select_company_row);
 $select_emp = $conn->query("SELECT * FROM `company` WHERE `company_id`= '".$select_company_row["cid"]."'");
 $select_emp_c = $select_emp->fetch_assoc();
 
 $select_category = $conn->query("SELECT * FROM `company_category` WHERE `cate_id`= '".$select_emp_c["company_category"]."'");
 $select_cat = $select_category->fetch_assoc();
 
 $select_subcategory = $conn->query("SELECT * FROM `company_subcategory` WHERE `subcat_id`= '".$select_emp_c["company_subcategory"]."'");
 $select_subcat = $select_subcategory->fetch_assoc();
 
 $select_package = $conn->query("SELECT * FROM `package` WHERE `id`= '".$select_company_row["package_id"]."'");
 $select_package_v = $select_package->fetch_assoc();
 

 
 
	$output .= '     <tr>
                                <td> ' . $sno . ' </td>
                                <td> ' . $select_company_row["emp_name"] . ' </td>
                                <td> ' . $select_emp_c["company_name"] . ' </td>
                                <td> ' . $select_emp_c["company_state"] . ' </td>
                                <td> ' . $select_emp_c["company_district"] . ' </td>
                                <td> ' . $select_emp_c["company_city"] . ' </td>
                                <td> ' . $select_cat["category"] . ' /  ' . $select_subcat["subcategory"] . '</td>
                                <td> ' . $select_package_v["package_name"] . ' / Rs. ' . $select_package_v["package_price"] . ' /- </td>
                                
                            </tr>
                   ';
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
  $(function () {

    $('#select_companys').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>

<script>
        $(function(){
            $("#export").click(function(){
                $("#select_companys").tableToCSV();
            });
        });
        function printData()
{

}
function printTable() {
    // window.print();
     var divToPrint=document.getElementById("select_companys");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
function defult_image(company_logo_table) {
    $('#'+company_logo_table).attr('src', 'images/default-img.gif');
    
}
    </script>