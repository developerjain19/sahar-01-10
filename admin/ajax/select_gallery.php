<?php
session_start();
include "../db/db_connect.php";
$output = ' ';
if ($_SESSION['ecard_company_id'] == "0") {
  $select_product_gallery = $conn->query("SELECT * FROM product_gallery WHERE `product_id` IN (SELECT `product_id` FROM `product` WHERE `product_status`='Active' ) ORDER BY `product_gallery`.`product_id` DESC ");
}else{
  $select_product_gallery = $conn->query("SELECT * FROM product_gallery WHERE `product_id` IN (SELECT `product_id` FROM `product` WHERE `product_status`='Active' AND `company_id` = '".$_SESSION['ecard_company_id']."' ) ORDER BY `product_gallery`.`product_id` DESC ");
}
$sno = 1;

$output .= '
            <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

            <!-- Custom Js -->
           <!-- DataTables -->
			<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
			<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
 			<script src="js/tabletoCSV.js" type="text/javascript" charset="utf-8"></script>
 <input type="file" id="upload_image" accept="image/gif, image/jpeg, image/png"  style="display: none" />

          <table id="select_product_gallerys" class="table table-bordered table-hover">
          <thead>
            <tr>
                 <th>SNO.</th>
                <th>Product</th>
                <th>Image</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>

            </tr>
          </thead>
          <tfoot>

            <tr>
                <th>SNO.</th>
                <th>Product</th>
                <th>Image</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
     ';
while ($select_product_gallery_row = $select_product_gallery->fetch_assoc()) {
	$product_id = $select_product_gallery_row['product_id'];
	$select_product = $conn->query("SELECT `product`.* , `company`.`company_name` FROM `product` , `company` WHERE `product`.`company_id`=`company`.`company_id` AND `product`.`product_id`='$product_id' ");
	$select_product_row = $select_product->fetch_assoc();
	$product_name = $select_product_row["product_title"].' - '.$select_product_row["company_name"];

	if ($select_product_gallery_row["product_gallery_status"] == "Active") {
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

	$output .= '     <tr>
                                <td> ' . $sno . ' </td>
                                <td>' . $product_name . '</td>
                                <td><img src="../img/product/' . $select_product_gallery_row["product_gallery_url"] . '?v=Date("Y.m.d.G.i.s")" width="100" height="70" alt="Gallery" /> <br><br> <button class="btn btn-sm btn-warning" onclick="change_image(' . $select_product_gallery_row["product_gallery_id"] . ');"><i class="fa fa-edit"></i> Edit</button> </td>
                                <td>' . $select_product_gallery_row["product_gallery_created_date"] . '</td>
                                <td>
                                  <div class="form-group">
                                      <select class="form-control show-tick" name="product_gallery_status" id="product_gallery_status" onmousedown="this.value=" ";" onchange="edit_product_gallery(' . $select_product_gallery_row["product_gallery_id"] . ' , this.value , id);" >
                                          ' . $option_status . '
                                      </select>
                                  </div>
                                </td>
                                <td>
                                    <button class="btn btn-danger btn_delete" name="delete_btn" data-sid2="' . $select_product_gallery_row["product_gallery_id"] . '"><i class="fa fa-trash"></i> Delete </button>

                                </td>
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

    $('#select_product_gallerys').DataTable({
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
                $("#select_product_gallerys").tableToCSV();
            });
        });
        function printData()
{

}
function printTable() {
    // window.print();
     var divToPrint=document.getElementById("select_product_gallerys");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
    </script>