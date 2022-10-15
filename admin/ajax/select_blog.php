<?php

include "../db/db_connect.php";
$output = ' ';

$select_blog = $conn->query("SELECT * FROM `blog`");
$sno = 1;

$output .= '
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

          
      <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
      <script src="js/tabletoCSV.js" type="text/javascript" charset="utf-8"></script>

          <table id="select_blogs" class="table table-bordered table-hover">
          <thead>
            <tr>
                <th>SNO.</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Date</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>SNO.</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Date</th>
            </tr>
          </tfoot>
          <tbody>
     ';
while ($select_blog_row = $select_blog->fetch_assoc()) {

  if ($select_blog_row["status"] == "0") {

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
                                <td><img src="../uploads/blogs/' . $select_blog_row["blog_logo"] . '" width="100" alt="blog Logo" id="blog_logo' . $select_blog_row['blog_id'] . '" onerror="defult_image(id);" /></td>


                                
                                <td><a target="_blank" href="' . website_url . '' . $select_blog_row['blog_name'] . '">' . $select_blog_row["blog_name"] . '</a></td>

                                 <td>' . wordwrap($select_blog_row["blog_content"], 30, "<br>") . '</td>
                                 <td>
                                  <div class="form-group">
                                      <select class="form-control show-tick" name="status" id="blog_status" onmousedown="this.value=" ";" onchange="edit_blog(' . $select_blog_row["blog_id"] . ' , this.value , id);" >
                                          ' . $option_status . '
                                      </select>
                                  </div>
                                </td>
  <td>
      <a class="btn btn-warning btn_edit" href="blog-edit.php?id=' . $select_blog_row["blog_id"] . '"><i class="fa fa-edit"></i> Edit </a>
  </td>';
  $output .= '  <td>' . $select_blog_row["created_date"] . '</td>
                            </tr>
                   ';
  $sno++;
}

// <button class="btn btn-danger btn_delete" name="delete_btn" data-sid2="' . $select_blog_row["blog_id"] . '"><i class="fa fa-trash"></i> Delete </button>
$output .= '
          </tbody>
        </table>

          ';

echo $output;
?>

<script>
  $(function() {

    $('#select_blogs').DataTable({
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
      $("#select_blogs").tableToCSV();
    });
  });

  function printData() {

  }

  function printTable() {
    // window.print();
    var divToPrint = document.getElementById("select_blogs");
    newWin = window.open("");
    newWin.document.write(divToPrint.outerHTML);
    newWin.print();
    newWin.close();
  }

  function defult_image(blog_logo_table) {
    $('#' + blog_logo_table).attr('src', 'images/default-img.gif');

  }
</script>