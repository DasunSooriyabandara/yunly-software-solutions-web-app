<?php
	 require_once('connection.php');

	 if (isset($_GET['search'])) {
	 	$term = $_GET['search'];

	 	$out = '';

                $r = mysqli_query($connection, "SELECT * FROM leaves WHERE user_id = '{$term}'");

                if (mysqli_num_rows($r) > 0) {
                  while ($d = mysqli_fetch_array($r)) {
                    $rr = mysqli_query($connection, "SELECT first_name, last_name FROM user WHERE user_id = '{$d['user_id']}'");
                    $rd = mysqli_fetch_assoc($rr);

                    $out .= '<tr>
                                <td style="padding:15px;">'.$d['user_id'].'</td>
                                <td style="padding:15px;">'.$rd['first_name'].' '.$rd['last_name'].'</td>
                                <td style="padding:15px;">'.$d['leave_type'].'</td>
                                <td style="padding:15px;">'.$d['leave_start_date'].'</td>
                                <td style="padding:15px;">'.$d['leave_end_date'].'</td>
                                <td style="padding:15px;">'.$d['description'].'</td>
                                <td>'.$d['status'].'</td>
                              </tr>';
                  }

                  echo $out;
                }else {
                  echo "No result found.";
                }
	 }
?>