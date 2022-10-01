<?php
session_start();
include "../db/db_connect.php";
$output = ' ';

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
         <th>Type</th>
         <th>Name</th>
        <th>Image</th>
        <th>Status</th>
        <th>Date</th>
        <th>Action</th>

    </tr>
  </thead>
  <tfoot>

    <tr>
        <th>SNO.</th>
         <th>Type</th>
         <th>Name</th>
        <th>Image</th>
        <th>Status</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
  </tfoot>
  <tbody>
';
$select_product = $conn->query("SELECT * FROM `company_graphics` ");
while ($select_product_gallery_row = $select_product->fetch_assoc()) {

$output .= '     <tr>
                         <td> ' . $sno . ' </td>   <td>';
                         
                        
                         if($select_product_gallery_row['type'] == 1)
                         {
                          $output .= 'Graphic';   
                         }
                          else
                         {
                          $output .= 'Quote';   
                         }
                         
                         
                         
   $output .= '          </td>            <td> ' . $select_product_gallery_row['name'] . ' </td>
                          <td><img src="graphicsuploads/' . $select_product_gallery_row["graphics"] . '" width="100" height="70" alt="Gallery" /> </td>
                        <td><button onclick="edit_graphic(' . $select_product_gallery_row["id"] . ',' . (($select_product_gallery_row["status"] == '1')? '0':'1') . ')" >' . (($select_product_gallery_row["status"] == '1')? 'Active':'Inactive') . '</button></td>
                        <td>
                          ' . $select_product_gallery_row["date"] . '
                        </td>
                        <td>
                            <button class="btn btn-danger btn_delete" name="delete_btn" onclick="delete_graphic(' . $select_product_gallery_row["id"] . ')"><i class="fa fa-trash"></i> Delete </button>

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
 