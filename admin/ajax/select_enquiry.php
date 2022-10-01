<?php
 
include ("../db/db_connect.php");
$output= ' ';

    $sno=1;
// echo 'lol';
echo '
            <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

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
                <th>Company</th>
             
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
                <th>Company</th>
            
                <th>Date</th>
                   <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
     ';
    
    //  print_r($select_contact_us_row);
    $select_contact_us=mysqli_query($conn,"SELECT * FROM `inquiry` WHERE `company_id`='0' ");
              while( $select_contact_us_row=mysqli_fetch_array($select_contact_us)){
 

                             $select_employee=mysqli_query($conn,"SELECT * FROM `employee` WHERE `company_id` = '".$select_contact_us_row['company_id']."' ");
                             $select_employee_row=mysqli_fetch_array($select_employee);
     
                             echo '     <tr>
                                <td> '.$sno.' </td>
                                <td>'.$select_contact_us_row['name'].'</td>
                                <td>'.$select_contact_us_row['number'].'</td>
                                <td>'.$select_contact_us_row['email'].'</td>
                                <td>'.$select_contact_us_row['msg'].'</td>
                                <td>'.$select_contact_us_row['name'].'</td>
                               
                                <td>'.$select_contact_us_row['date'].'</td>
                                  <td><a href="ajax/inquiry-del.php?id='.$select_contact_us_row["id"].'" class="btn btn-primary">Delete</td>
                                
                            </tr>
                   '; 
        $sno++;
    }
echo '
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