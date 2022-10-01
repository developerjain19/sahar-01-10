<?php

include "../db/db_connect.php";
$output = ' ';
$select_category = $conn->query("SELECT * FROM `company_category` WHERE `category_status` != '2' ");
$sno = 1;

$output .= '
            <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

          
      <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
      <script src="js/tabletoCSV.js" type="text/javascript" charset="utf-8"></script>

          <table id="select_company_category" class="table table-bordered table-hover">
          <thead>
            <tr>
                <th>SNO.</th>
                <th>Date</th>
                <th>Category</th>
               
                <th>Status</th>
                <th>Featured</th>
                <th>Action</th>
                

            </tr>
          </thead>
          <tfoot>

            <tr>
                <th>SNO.</th>
                <th>Date</th>
                <th>Category</th>
                <th>Status</th>
                <th>Featured</th>
                  <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
     ';
while ($select_category_row = $select_category->fetch_assoc()) {
	if ($select_category_row["category_status"] == "0") {
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
	if($select_category_row["premium"] == "0"){
	    	$featured_status = "
                                <option value=0>Yes</option>
                                <option value=1>No</option>
                              ";
	}else{
	    $featured_status = "
                                <option value=1>No</option>
                                <option value=0>Yes</option>
                              ";
	}	    
	$output .= '     <tr>
                                <td> ' . $sno . ' </td>
                               
                                <td>' . $select_category_row["date"] . '</td>
                                <td>' . $select_category_row["category"] . '</td>
                                <td>
                                  <div class="form-group">
                                      <select class="form-control show-tick" name="category_status" id="category_status" onmousedown="this.value=" ";" onchange="edit_category(' . $select_category_row["cate_id"] . ' , this.value , id);" >
                                          ' . $option_status . '
                                      </select>
                                  </div>
                                </td>
                                <td>
                                <div class="form-group">
                                      <select class="form-control show-tick" name="premium" id="premium" onmousedown="this.value=" ";" onchange="edit_featured(' . $select_category_row["cate_id"] . ' , this.value , id);" >
                                          ' . $featured_status . '
                                      </select>
                                  </div>
                                </td>
                             
                              <td><a href="ajax/category-del.php?id='.$select_category_row["cate_id"].'" class="btn btn-primary">Delete</td>
                            </tr>
                   ';
	$sno++;
}

// <button class="btn btn-danger btn_delete" name="delete_btn" data-sid2="' . $select_category_row["company_id"] . '"><i class="fa fa-trash"></i> Delete </button>
$output .= '
          </tbody>
        </table>

          ';

echo $output;
?>

<script>
  $(function () {

    $('#select_company_category').DataTable({
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
                $("#select_company_category").tableToCSV();
            });
        });
        function printData()
{

}
function printTable() 
{
   var divToPrint=document.getElementById("select_company_category");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
function defult_image(company_logo_table) {
    $('#'+company_logo_table).attr('src', 'images/default-img.gif');
    
}
    </script>