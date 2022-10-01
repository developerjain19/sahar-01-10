<?php

include ("../db/db_connect.php");
$output= ' ';
$select_admin=$conn->query("SELECT * FROM `admin_data`");
    $sno=1;

$output.='
            <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

            <!-- Custom Js -->
           <!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
 <script src="js/tabletoCSV.js" type="text/javascript" charset="utf-8"></script>

          <table id="select_admin" class="table table-bordered table-hover">
          <thead>
            <tr>
                <th>SNO.</th>
                <th>Name</th>
                <th>Position</th>
                <th>Username</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
          </thead>
          <tfoot>

            <tr>
                <th>SNO.</th>
                <th>Name</th>
                <th>Position</th>
                <th>Username</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
          </tfoot>
          <tbody>
     ';
              while($select_admin_row=$select_admin->fetch_assoc()){  

                if ($select_admin_row["admin_status"] == "Active") {
                  $option_status="
                    <option value=Active>Active </option>
                    <option value=Deactive>Deactive</option>
                  ";
                }else{
                  $option_status="
                    <option value=Deactive>Deactive</option>
                    <option value=Active>Active </option>
                  ";
                }

                if ($select_admin_row["company_id"] == "0") {
                  $company_status="Main Admin";
                }else{
                   $select_company=$conn->query("SELECT * FRom `company` WHERE company_id = '".$select_admin_row['company_id']."' ");
                   $select_company_row=$select_company->fetch_assoc();     
                  $company_status=$select_company_row['company_name'];
                } 
                             
                              
               $output.='     <tr>
                                <td> '.$sno.' </td>
                                
                                <td>'.$select_admin_row["admin_name"].'</td>
                                <td>'.$company_status.' - '.$select_admin_row["admin_position"].'</td>
                                <td>'.$select_admin_row["admin_username"].'</td>
                                ';
                                if ($sno==1) {
                                  $output.='<td>-</td>';
                                }else{
                                  $output.=' 

                                  <td> 
                                    <div class="form-group">
                                        <select class="form-control show-tick" name="admin_status" id="admin_status" onmousedown="this.value=" ";" onchange="edit_admin('.$select_admin_row["admin_id"].' , this.value , id);" >
                                            '.$option_status.'
                                        </select>
                                    </div>
                                  </td>

                                  ' ;
                                }
                          $output.='      
                                <td>'.$select_admin_row["admin_created_date"].'</td>
                                
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
    
    $('#select_admin').DataTable({
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
                $("#select_admin").tableToCSV();
            });
        });
        function printData()
{
  
}
function printTable() {
    // window.print();
     var divToPrint=document.getElementById("select_admin");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
    </script>