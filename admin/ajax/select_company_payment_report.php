<?php

include "../db/db_connect.php";
$output = ' ';
$emp=array();$feedback=array();$inquiry =array();
 $r = "SELECT * FROM `company` INNER JOIN `package_purchased` ON `company`.`company_id`=`package_purchased`.`company_id` 
                WHERE `package_purchased`.`status` = '0' AND `pur_type`='company'  ";
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
                <th>Company name</th>
                <th>State</th>
                <th> District</th>
                <th>City</th>
                <th>Category/sub category</th> 
                <th>Package name/price</th> 
                <th>Coupon details</th>
                <th>Total employee</th> 
                
                <th>Package for employee</th>
            </tr>
          </thead>
          <tfoot>

            <tr>
                <th>SNO.</th>
                <th>Company name</th>
                <th>State</th>
                <th> District</th>
                <th>City</th>
                <th>Category/sub category</th> 
                <th>Package name/price</th> 
                <th>Coupon details</th>
                <th>Total employee</th>
                
                <th>Package for employee</th>
            </tr>
          </tfoot>
          <tbody>
     ';
while ($select_company_row = $select_company->fetch_assoc()) {
 $select_category = $conn->query("SELECT * FROM `company_category` WHERE `cate_id`= '".$select_company_row["company_category"]."'");
 $select_cat = $select_category->fetch_assoc();
 
 $select_subcategory = $conn->query("SELECT * FROM `company_subcategory` WHERE `subcat_id`= '".$select_company_row["company_subcategory"]."'");
 $select_subcat = $select_subcategory->fetch_assoc();
 
 $select_package = $conn->query("SELECT * FROM `package` WHERE `id`= '".$select_company_row["package_id"]."'");
 $select_package_v = $select_package->fetch_assoc();
 
 $select_emp = $conn->query("SELECT * FROM `employee` WHERE `company_id`= '".$select_company_row["id"]."'");
 $select_emp_c = mysqli_num_rows($select_emp);
 
 $select_coupon = $conn->query("SELECT * FROM `coupon` WHERE `id`= '".$select_company_row["coupon_id"]."'");
 $select_coupon_view = mysqli_num_rows($select_coupon);
 if($select_coupon_view > 0){
     $select_coupon_get = $select_coupon->fetch_assoc();
     $coupon = 'Coupon Applied - <i>'.$select_coupon_get['coupon_nm'].'</i><br> Amt Paid - Rs.'.$select_company_row['amount'].' /-';
 }else{
     $coupon='';
 }
 
 
	$output .= '     <tr>
                                <td> ' . $sno . ' </td>
                                <td> ' . $select_company_row["company_name"] . ' </td>
                                <td> ' . $select_company_row["company_state"] . ' </td>
                                <td> ' . $select_company_row["company_district"] . ' </td>
                                <td> ' . $select_company_row["company_city"] . ' </td>
                                <td> ' . $select_cat["category"] . ' /  ' . $select_subcat["subcategory"] . '</td>
                                <td> ' . $select_package_v["package_name"] . ' / Rs. ' . $select_package_v["package_price"] . ' /-</td>
                                <td> ' . $coupon . ' </td>
                                <td> ' . $select_emp_c . ' </td>'
                                ;
                                // <td>
                                //     <button class="btn btn-warning btn_edit" name="edit_btn" data-sid3="' . $select_company_row["company_id"] . '"><i class="fa fa-edit"></i> Edit </button>
                                // </td>
                                $output .= '  <td> </td>
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