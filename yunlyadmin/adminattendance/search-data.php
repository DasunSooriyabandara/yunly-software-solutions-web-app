<?php
	 require_once('../../connection.php');

	 if (isset($_GET['search'])) {
	 	$term = $_GET['search'];

	 	$out = '';

                $r = mysqli_query($connection, "SELECT * FROM barcode WHERE user_id = '{$term}'");

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
	 }
?>