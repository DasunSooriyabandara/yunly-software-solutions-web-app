<?php 
  require_once('../../connection.php');
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- <title>Yunly Software Solutions - Attendance Report</title> -->
	<link rel="stylesheet" href="../../leave/dashboardtesting.css">
</head>
<body>

  <div style="padding:10px;"><button onclick="window.print()" style="background-color:#C0C0C0; border-radius:4px"> Print Report</button></div>

  <h1 style="text-align:center;"> Yunly Software Solutions - Attendance Report </h1>

	

 <div class="u-table u-table-responsive u-table-1">
                 
          <table class="styled-table" style="background-color: #FFFAFA;width:1200px;">
            <thead class="adminatt">
              <th>Employee ID</th>
              <th>Employee First Name</th>
              <th>Employee Last Name</th>
              <th>Time In</th>
              <th>Time Out</th>

            </thead>
            <tbody>
              <?php   
                $out = '';

                $r = mysqli_query($connection, "SELECT * FROM barcode");

                if ($r) {
                  while ($d = mysqli_fetch_array($r)) {
                    $rr = mysqli_query($connection, "SELECT first_name, last_name FROM user WHERE user_id = '{$d['user_id']}'");
                    $rd = mysqli_fetch_assoc($rr);

                    $out .= '<tr>
                                <td>'.$d['user_id'].'</td>
                                <td>'.$rd['first_name'].'</td>
                                <td>'.$rd['last_name'].'</td>
                                <td>'.$d['time_in'].'</td>
                                <td>'.$d['time_out'].'</td>
                              </tr>';
                  }

                  echo $out;
                }

              ?>
            </tbody>
          </table>
        </div>





</body>
</html>