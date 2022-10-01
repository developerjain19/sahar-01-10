<?php

include "../db/db_connect.php";
$output = ' ';

$select_banner = $conn->query("SELECT * FROM `banner`");
$sno = 1;

$output .= '
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

          
      <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
      <script src="js/tabletoCSV.js" type="text/javascript" charset="utf-8"></script>

          <table id="select_banner" class="table table-bordered table-hover">
          <thead>
            <tr>
                <th>SNO.</th>
                <th>Image</th>
                <th>Show at</th>
                <th>Title</th>
                <th>company</th>
                
                <th>Date</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>SNO.</th>
                <th>Image</th>
                <th>Show at</th>
                <th>Title</th>
                <th>company</th>
                
                <th>Date</th>
            </tr>
          </tfoot>
          <tbody>
     ';
while ($select_banner_row = $select_banner->fetch_assoc()) {
    $comnm = [];

    $om = explode(',', $select_banner_row["banner_content"]);
    foreach ($om as $com) {
        $select_company = $conn->query("SELECT * FROM `company` WHERE `company_id` =  '" . $com . "'");
        while ($select_company_row = $select_company->fetch_assoc()) {
            $comnm[] = $select_company_row['company_name'];
        }
    }
    if ($select_banner_row["status"] == "0") {

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
                                <td><img src="../uploads/advertise/' . $select_banner_row["banner_logo"] . '" width="100" height="70" alt="banner Logo" id="banner_logo' . $select_banner_row['banner_id'] . '" onerror="defult_image(id);" /></td>

                                <td>' . (($select_banner_row["location"] == 0)? 'Top':'Bottom'). '</td>
                                
                                <td><a target="_blank" href="' . website_url . '' . $select_banner_row['banner_name'] . '">' . $select_banner_row["banner_name"] . '</a></td>

                                 <td>' . implode(',',$comnm) . '</td>
                                 ';
    //  <td>
    //   <div class="form-group">
    //       <select class="form-control show-tick" name="banner_status" id="banner_status" onmousedown="this.value=" ";" onchange="edit_banner(' . $select_banner_row["banner_id"] . ' , this.value , id);" >
    //           ' . $option_status . '
    //       </select>
    //   </div>
    // </td>
    // <td>
    //     <button class="btn btn-warning btn_edit" name="edit_btn" data-sid3="' . $select_banner_row["banner_id"] . '"><i class="fa fa-edit"></i> Edit </button>
    // </td>
    $output .= '  <td>' . $select_banner_row["created_date"] . '</td>
                            </tr>
                   ';
    $sno++;
}

// <button class="btn btn-danger btn_delete" name="delete_btn" data-sid2="' . $select_banner_row["banner_id"] . '"><i class="fa fa-trash"></i> Delete </button>
$output .= '
          </tbody>
        </table>

          ';

echo $output;
?>

<script>
    $(function() {

        $('#select_banner').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true
        })
    })
</script>

<script>
    $(function() {
        $("#export").click(function() {
            $("#select_banner").tableToCSV();
        });
    });

    function printData() {

    }

    function printTable() {
        // window.print();
        var divToPrint = document.getElementById("select_banner");
        newWin = window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }

    function defult_image(banner_logo_table) {
        $('#' + banner_logo_table).attr('src', 'images/default-img.gif');

    }
</script>