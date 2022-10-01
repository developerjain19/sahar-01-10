<?php
session_start();
include "../db/db_connect.php";
$output = ' ';
if ($_SESSION['ecard_company_id'] == "0") {
  $select_employee = $conn->query("SELECT * FROM `employee` WHERE `employee_status` != '2' ");

}else{
  $select_employee = $conn->query("SELECT * FROM `employee` WHERE `employee_status` != '2' AND `company_id` = '".$_SESSION['ecard_company_id']."' ");
}
$sno = 1;

$output .= '
            <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

            <!-- Custom Js -->
           <!-- DataTables -->
      <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
      <script src="js/tabletoCSV.js" type="text/javascript" charset="utf-8"></script>

          <table id="select_employees" class="table table-bordered table-hover">
          <thead>
            <tr>
                <th>SNO.</th>
                <th>Logo</th>
                <th>Title</th>
                <th>Address</th>
                <th>Status</th>
                <th>Action</th>
                <th>Date</th>

            </tr>
          </thead>
          <tfoot>

            <tr>
                <th>SNO.</th>
                <th>Logo</th>
                <th>Title</th>
                <th>Address</th>
                <th>Status</th>
                <th>Action</th>
                <th>Date</th>
            </tr>
          </tfoot>
          <tbody>
     ';
while ($select_employee_row = $select_employee->fetch_assoc()) {
	if ($select_employee_row["employee_status"] == "0") {
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

                                <td><img src="../img/employee/' . $select_employee_row["employee_logo"] . '?v=Date("Y.m.d.G.i.s")" width="100" height="70" alt="employee Logo" id="employee_logo'.$select_employee_row['employee_id'].'" onerror="defult_image(id);" /></td>


                                <td><a target="_blank" href="'.website_url.''.$select_employee_row['employee_web_url'].'">' . $select_employee_row["employee_name"] . '</a></td>
                                


                                <td>' . $select_employee_row["employee_address"] . '</td>
                                

                                <td>
                                  <div class="form-group">
                                      <select class="form-control show-tick" name="employee_status" id="employee_status" onmousedown="this.value=" ";" onchange="edit_employee(' . $select_employee_row["employee_id"] . ' , this.value , id);" >
                                          ' . $option_status . '
                                      </select>
                                  </div>
                                </td>
                                <td>
                                    <button class="btn btn-warning btn_edit" name="edit_btn" data-sid3="' . $select_employee_row["employee_id"] . '"><i class="fa fa-edit"></i> Edit </button>
                                </td>
                                <td>' . $select_employee_row["created_date"] . '</td>
                            </tr>
                   ';
	$sno++;
}

// <button class="btn btn-danger btn_delete" name="delete_btn" data-sid2="' . $select_employee_row["employee_id"] . '"><i class="fa fa-trash"></i> Delete </button>
$output .= '
          </tbody>
        </table>

          ';

echo $output;
?>

<script>
  $(function () {

    $('#select_employees').DataTable({
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
                $("#select_employees").tableToCSV();
            });
        });
        function printData()
{

}
function printTable() {
    // window.print();
     var divToPrint=document.getElementById("select_employees");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
function defult_image(employee_logo_table) {
    $('#'+employee_logo_table).attr('src', 'images/default-img.gif');
    
}
    </script>