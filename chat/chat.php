<?php 
	session_start(); 
	require_once('../inc/connection.php');


	$output = '';

	$query="SELECT * FROM chat";
	$result_set=mysqli_query($connection,$query);

	if ($result_set) {
		while($result = mysqli_fetch_array($result_set)) {
			

			$user_id = $result['user_id'];

			$q = "SELECT first_name FROM user WHERE user_id = '{$user_id}'";
			$res = mysqli_query($connection,$q);

			if ($res) {
				if ($r = mysqli_fetch_assoc($res)) {
					$output .= '
						<li class="userName">'.$r['first_name'].'</li>
						<li class="msg">'.$result['msg'].'</li>
					';
				}
			}
		}
	}

	if (isset($_POST['sendmsg'])) {
		$user_id = $_SESSION['user_id'];
		$msg = $_POST['message'];

		$msgQuery = "INSERT INTO chat (user_id, msg) VALUES ('{$user_id}', '$msg')";
		$msgResult = mysqli_query($connection,$msgQuery);

		if ($msgResult) {
			
			header("location: ../dashboard.php");
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Group Chat</title>

	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
	<!-- <link rel="stylesheet" type="text/css" href="chat/chat.css"> -->

</head>
<body>

	<ul class="msg_list">
		<li class="msg_col"></li>
		<?php echo $output; ?>
	</ul>

	<form class="form" action="chat/chat.php" method="POST" id="msgForm">

		<input class="msgg" type="text" name="message" placeholder="Enter your message...">
		<input id="send" class="but" type="submit" name="sendmsg" value="Send">
	</form>

	<style type="text/css">
			.userName {
			font-size: 20px;
			font-weight: bold;
			color: initial;#2F4F4F;
			margin-left:7px;
		}

		ul {list-style: none;}

		.msg{
			font-size: 15px;
			font-weight: bold;
			margin: 20px ;
			margin-right: 5px;
			padding: 10px 15px;
			width: 95%;
			border-radius: 0px 10px 9px 9px;
			border: 0;
			background:  /*#4682B4 */ /*#20B2AA*/ /*#447373*/ #569191 ;
			color: #fff;
			cursor: pointer;
		}

		/*.msg_list .msg_col{
			background-color: #708090 ;
			height: 35px;
			padding-top: 10px;
			padding-left: 10px;
			border-radius: 15px;

		}*/
		.form{
			margin-top: 170px;
			padding-top: 1%;
			padding-bottom: 1%;
			padding-left: 100px;
			/*padding-right: 50px;*/
			background-color: #778899 ;
			border-radius: 5px;
		}

		.form .but{
			font-size: 18px;
			font-weight: bold;
			margin: 20px ;
			margin-right: 5px;
			padding: 10px 15px;
			width: 10%;
			border-radius: 5px;
			border: 0.5;
			border-color: #FFF8DC	;
			background: linear-gradient(-135deg, #606c88, #3f4c6b);
			color: #fff;
			cursor: pointer;
		}

		.form .but:hover{
 
			  background: linear-gradient(-135deg, #606c88, #3f4c6b);

			}

		.form .msgg{
			font-size: 20px;
			font-weight: bold;
			/*margin: 20px 0;*/
			padding: 10px 15px;
			width: 80%;
			border-radius: 5px;
			border: 5px;
		}


	</style>

	<!-- <script type="text/javascript" src="../notification.js"></script> -->
	
</body>
</html>