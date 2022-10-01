<?php

include "../db/db_connect.php";
$output = ' ';
$select_subcategory = $conn->query("SELECT * FROM `company_subcategory` JOIN company_category ON `company_category`.`cate_id` = `company_subcategory`.`category_id` ");
$sno = 1;

$output .= '
            <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

          
      <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
      <script src="js/tabletoCSV.js" type="text/javascript" charset="utf-8"></script>

          <table id="select_company_subcategory" class="table table-bordered table-hover">
          <thead>
            <tr>
                <th>SNO.</th>
                <th>Date</th>
                <th>Subcategory</th>
                <th>Category</th>
                <th>Status</th>
                  <th>Action</th>
           
                

            </tr>
          </thead>
          <tfoot>

            <tr>
                <th>SNO.</th>
                <th>Date</th>
                <th>Subcategory</th>
                <th>Category</th>
                <th>Status</th>
                  <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
     ';
while ($select_subcategory_row = $select_subcategory->fetch_assoc()) {
	if ($select_subcategory_row["status"] == "0") {
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
                               
                                <td>' . $select_subcategory_row["date"] . '</td>
                                 <td>' . $select_subcategory_row["category"] . '</td>
                                <td>' . $select_subcategory_row["subcategory"] . '</td>
                                <td>
                                  <div class="form-group">
                                      <select class="form-control show-tick" name="status" id="status" onmousedown="this.value=" ";" onchange="edit_subcategory(' . 
                                      $select_subcategory_row["subcat_id"] . ' , this.value , id);" >
                                          ' . $option_status . '
                                      </select>
                                  </div>
                                </td>
                              <td><a href="ajax/category-del.php?id='.$select_category_row["cate_id"].'" class="btn btn-primary">Delete</td>
                              
                            </tr>
                   ';
	$sno++;
}

// <button class="btn btn-danger btn_delete" name="delete_btn" data-sid2="' . $select_subcategory_row["company_id"] . '"><i class="fa fa-trash"></i> Delete </button>
$output .= '
          </tbody>
        </table>

          ';

echo $output;
?>

<script>
  $(function () {

    $('#select_company_subcategory').DataTable({
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
                $("#select_company_subcategory").tableToCSV();
            });
        });
        function printData()
{

}
function printTable() 
{
   var divToPrint=document.getElementById("select_company_subcategory");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
function defult_image(company_logo_table) {
    $('#'+company_logo_table).attr('src', 'images/default-img.gif');
    
}
    </script>