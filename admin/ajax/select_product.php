<?php
session_start();
include "../db/db_connect.php";
$output = ' ';
if ($_SESSION['ecard_company_id'] == "0") {
  $select_product=$conn->query("SELECT * FROM `product` WHERE `product_status` != 'delete' ");
}else{
  $select_product=$conn->query("SELECT * FROM `product` WHERE `product_status` != 'delete' AND `company_id` = '".$_SESSION['ecard_company_id']."'");
}
$sno = 1;

$output .= '
            <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

            <!-- Custom Js -->
           <!-- DataTables -->
      <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
      <script src="js/tabletoCSV.js" type="text/javascript" charset="utf-8"></script>

          <table id="select_products" class="table table-bordered table-hover">
          <thead>
            <tr>
                 <th>SNO.</th>
                <th>Title</th>
                <th>Description</th>
                <th>Company</th>
                <th>Status</th>
                <th>Action</th>
                <th>Date</th>

            </tr>
          </thead>
          <tfoot>

            <tr>
                <th>SNO.</th>
                <th>Title</th>
                <th>Description</th>
                <th>Company</th>
                <th>Status</th>
                <th>Action</th>
                <th>Date</th>
            </tr>
          </tfoot>
          <tbody>
     ';
while ($select_product_row = $select_product->fetch_assoc()) {
	if ($select_product_row["product_status"] == "Active") {
		$option_status = "
                                <option value=Active>Active </option>
                                <option value=Deactive>Deactive</option>
                              ";
	} else {
		$option_status = "
                                <option value=Deactive>Deactive</option>
                                <option value=Active>Active </option>
                              ";
	}  
  $select_company=$conn->query("SELECT * FRom `company` WHERE company_id = '".$select_product_row['company_id']."' ");
 $select_company_row=$select_company->fetch_assoc(); 
	$output .= '     <tr>
                                <td> ' . $sno . ' </td>
                                <td>' . $select_product_row["product_title"] . '</td>
                                <td>' . $select_product_row["product_description"] . '</td>
                                <td>' . $select_company_row["company_name"] . '</td>

                                <td>
                                  <div class="form-group">
                                      <select class="form-control show-tick" name="product_status" id="product_status" onmousedown="this.value=" ";" onchange="edit_product(' . $select_product_row["product_id"] . ' , this.value , id);" >
                                          ' . $option_status . '
                                      </select>
                                  </div>
                                </td>
                                <td>
                                    <button class="btn btn-danger btn_delete" name="delete_btn" data-sid2="' . $select_product_row["product_id"] . '"><i class="fa fa-trash"></i> Delete </button>
                                    <button class="btn btn-warning btn_edit" name="edit_btn" data-sid3="' . $select_product_row["product_id"] . '"><i class="fa fa-edit"></i> Edit </button>
                                </td>
                                <td>' . $select_product_row["product_created_date"] . '</td>
                            </tr>
                   ';
	$sno++;
}
$output .= '
          </tbody>
        </table>

          ';

echo $output;
?>

<script>
  $(function () {

    $('#select_products').DataTable({
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
                $("#select_products").tableToCSV();
            });
        });
        function printData()
{

}
function printTable() {
    // window.print();
     var divToPrint=document.getElementById("select_products");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
    </script>