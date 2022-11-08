<?php session_start(); 
require_once('../inc/connection.php'); ?>


<?php 

 
if(isset($_POST['submit'])){
if (!isset($_POST['user'])|| strlen(trim($_POST['user']))<1) {
	$errors[]='Username is missing/Invalid';

}

	if (!isset($_POST['Password'])|| strlen(trim($_POST['Password']))<1) {
	$errors[]='password is missing/Invalid';
	
}

if(empty($errors)){

	$username= mysqli_real_escape_string($connection,$_POST['user']);
	$password= mysqli_real_escape_string($connection,$_POST['Password']);
	$hashed_password= sha1($password);

	$query="SELECT * FROM user WHERE email='{$username}' AND password='{$hashed_password}' LIMIT 1";
	$result_set=mysqli_query($connection,$query);

	if($result_set){
		if(mysqli_num_rows($result_set)==1){
			if ($r =  mysqli_fetch_assoc($result_set)) {
				$SESSION['user_id'] = $r['user_id'];
			}
			$_SESSION['username'] = $username;
			
			header("location: ../dashboard.php");
		}else{
			$errors[]='Invalid username/password';

		}

	}else{
		$errors[]='Database query failed';
	}
	
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Form</title>

		<link rel="stylesheet" type="text/css" href="login.css">
		<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
	
		<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<?php 
	if (!empty($errors)) {
		echo '<div class="errmsg">';
		echo "<b>There were error(s) on your form.</b><br>";
		foreach ($errors as $error) {
			$error = ucfirst(str_replace("_", " ", $error));
			echo $error . '<br>';
		}
		echo '</div>';
	}
?>

<body>
	<div class="container">
		<div class="login-form">
			<h1>Login</h1>
			<form action="login.php" method="post">

				<p>User Name</p>
				<input type="text" name="user" placeholder="User Name">
				<p>Password</p>
				<input id="pswrd" type="Password" name="Password" placeholder="Password">
			


				<h6><a class="two" href="#" style="float: right; "></a></h6>
				<button type="submit" name="submit">Login</button>
				<h5>Dont have an account ? <a href="../registration/register.php">  Register</a></h5>
			</form>
		</div>




		<script >
			/*function show() {
				var pswrd = document.getElementById('pswrd');
				var icon = document.querySelector('.fas');
				if (pswrd.type === "password") {
					pwsrd.type = "text";
					pswrd.style.marginTop = "20px" ;
					icon.style.color = "#7f2092";
				}else{
					pwsrd.type = "password";
					icon.style.color = "grey";
				}
			}
		</script>




	</div>
</body>
</html>
<?php mysqli_close($connection); ?>