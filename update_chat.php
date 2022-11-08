<?php 
	session_start();
	require_once('inc/connection.php');

	if (!isset($_SESSION['username'])) {
    	header('location: index.php');
  	}

  	//$asc_id = $_SESSION['asc_id'];

  
if (isset($_POST['view'])) {
 //  	if($_POST["view"] != '')
	// {
	//    $update_query = "UPDATE request_details SET request_status = 0 WHERE hospital_id = '{$hospital_id}' AND notification_status = 1";
	//    mysqli_query($connection, $update_query);
	// }

	$query = "SELECT * FROM chat";
	$result = mysqli_query($connection, $query);

	$output = '';
	$count = 0;

	if(mysqli_num_rows($result) > 0) {
		$count = mysqli_num_rows($result);

		while($row = mysqli_fetch_array($result)) {
					$output .= '
						<li class="userName">'.$row['user_id'].'</li>
						<li class="msg">'.$row['msg'].'</li>
					';
		}
	} else {
	    $output .= '<li>No Messages.</li>';
	}

	$data = array(
	   'notification' => $output,
	   'unseen_notification'  => $count
	);
	echo json_encode($data);
}

?>
