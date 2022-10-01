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
                <th>Rating</th>
                <th>Name</th>
                <th>Message</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
          </thead>
          <tfoot>

            <tr>
                <th>SNO.</th>
                <th>Rating</th>
                <th>Name</th>
                <th>Message</th>
                 
                <th>Date</th>
                <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
     ';
  $select_feedback = mysqli_query($conn,"SELECT * FROM `feedback` WHERE `company_id` ='0'");

              while($select_feedback_row=mysqli_fetch_array($select_feedback)){
                            
                            $select_employee=mysqli_query($conn,"SELECT * FRom `employee` WHERE `company_id` = '".$select_feedback_row['company_id']."' ");
                             $select_employee_row=mysqli_fetch_array($select_employee);

                            // $select_company=$conn->query("SELECT * FRom `company` WHERE company_id = '".$select_employee_row['company_id']."' ");
                            //  $select_company_row=$select_company->fetch_assoc();     
               $output.='     <tr>
                                <td> '.$sno.' </td>
                                <td>'.$select_feedback_row['rating'].'</td>
                                <td>'.$select_feedback_row['name'].'</td>
                                <td>'.$select_feedback_row['msg'].'</td>
                                 
                                <td>'.$select_feedback_row['date'].'</td>
                                   <td><a href="ajax/feedback-del.php?id='.$select_feedback_row["id"].'" class="btn btn-primary">Delete</td>
                            </tr>
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