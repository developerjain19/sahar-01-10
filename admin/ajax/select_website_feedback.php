<?php
// error_reporting(0);
include ("../db/db_connect.php");
$output= ' ';
 
// if ($_SESSION['ecard_company_id'] == "0") {
//   $select_feedback = mysqli_query($conn,"SELECT * FROM `feedback`");
//   // $select_feedback=$conn->query("SELECT * FROM `feedback`");
// }else{
//   // $select_feedback=$conn->query("SELECT * FROM `feedback` WHERE `company_id` = '".$_SESSION['ecard_company_id']."'");
//   $select_feedback = mysqli_query($conn,"SELECT * FROM `feedback`");

// }
    $sno=1;

$output.='
            <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

            <!-- Custom Js -->
           <!-- DataTables -->
			<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
			<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
 			<script src="js/tabletoCSV.js" type="text/javascript" charset="utf-8"></script>

          <table id="select_propertys" class="table table-bordered table-hover">
          <thead>
            <tr>
                <th>SNO.</th>
                
                <th>Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Message</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
          </thead>
          <tfoot>

            <tr>
                <th>SNO.</th>
                
                <th>Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Message</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
     ';
  $select_feedback = mysqli_query($conn,"SELECT * FROM `website_feedback` ");

              while($select_feedback_row=mysqli_fetch_array($select_feedback)){
                if ($select_feedback_row["status"] == "0") {
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
                          
               $output.='     <tr>
                                <td> '.$sno.' </td>
                                 
                                <td>'.$select_feedback_row['name'].'</td>
                                <td>'.$select_feedback_row['contact'].'</td>
                                <td>'.$select_feedback_row['email'].'</td>
                                <td>'.$select_feedback_row['msg'].'</td>
                                 <td> <div class="form-group">
                                 <select class="form-control show-tick" name="status" id="status" onmousedown="this.value=" ";" onchange="edit_feedback(' . 
                                 $select_feedback_row["id"] . ' , this.value , id);" >
                                     ' . $option_status . '
                                 </select>
                             </div>
                             </td>
                                <td>'.$select_feedback_row['date'].'</td>
                            
                              <td><a href="ajax/web-feedback-del.php?id='.$select_feedback_row["id"].'" class="btn btn-primary">Delete</td></tr>
                   '; 
        $sno++;
    }
$output.='
          </tbody>
        </table>
        
          ';
     
echo $output;
?>

<script>
  $(function () {
    
    $('#select_propertys').DataTable({
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
                $("#select_propertys").tableToCSV();
            });
        });
        function printData()
{
  
}
function printTable() {
    // window.print();
     var divToPrint=document.getElementById("select_propertys");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
    </script>