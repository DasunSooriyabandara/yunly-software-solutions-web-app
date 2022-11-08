<?php session_start(); 

$server_name="localhost";
$username="root";
$password="";
$database_name="yunlydb";

$conn = mysqli_connect($server_name,$username,$password,$database_name);

if(!$conn){

	die("Connection Failed:".mysql_connect_error());
}

$errors=array();


if(isset($_POST['Register']) )
{
	$temp=$_POST['user_id'];
	$check = mysqli_query($conn, "SELECT * FROM user WHERE user_id = '{$temp}' LIMIT 1");
	$check_res = mysqli_fetch_assoc($check)['user_id'];
	
	if (mysqli_num_rows($check) > 0) {
		$errors[]='User ID is already taken.';
	}

	
if (!(strlen(trim($_POST['nic'])) ==10)) {
			$errors[]='Enter Valid NIC';
	
	}
	if (!(strlen(trim($_POST['tele_number']))==10)) {
			$errors[]='Enter Valid Telephone Number';
			
	}
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errors[]='Enter Valid Email';
			
	}
	if (empty($errors)) {
		
  $user_id=$_POST['user_id'];
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$date_of_birth=$_POST['date_of_birth'];
	$email =$_POST['email'];
	$tele_number = $_POST['tele_number'];
	$nic=$_POST['nic'];
	$address = $_POST['address'];
	$password =$_POST['password'];
	$gender= $_POST['gender'];



	$hashed_password = sha1($password);

	$sql_query = "INSERT INTO user(user_id,first_name,last_name,date_of_birth,email,tele_number,nic,address,password, gender) 
	  VALUES('{$user_id}','{$first_name}','{$last_name}','{$date_of_birth}','{$email}','{$tele_number}','{$nic}','{$address}','{$hashed_password}', '{$gender}')";

	if(mysqli_query($conn,$sql_query))
	{
		$_SESSION['username']=$email;

		header("location:../dashboard.php");
	}  
	else
	{
        echo"Error: ".mysqli_error($conn);       
	}
	mysqli_close($conn);
}
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Registration Form</title>
	<link rel="stylesheet" type="text/css" href="register2.css">
		<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

		<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
	
		<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
</head>
	

<body>
	
  <div class="container">
  	<?php 
	if (!empty($errors)) {
		echo '<div style="float:left;">';
		echo "<b>There were error(s) on your form.</b><br>";
		foreach ($errors as $error) {
			$error = ucfirst(str_replace("_", " ", $error));
			echo $error . '<br>';
		}
		echo '</div>';
	}
?>
    <div class="title">Registration</div>
    <div class="content">
      <form action="register.php" method="post">
        <div class="user-details">
          
          <div class="input-box">
            <span class="details">UserID</span>
            <input type="text" placeholder="Enter your UserID" name="user_id" required>
          </div>
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" placeholder="Enter your first name" name="first_name" required>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" placeholder="Enter your lastname" name="last_name" required>
          </div>
          <div class="input-box">
            <span class="details">Date Of Birth</span>
            <input type="date" placeholder="Enter your Birthday" name="date_of_birth" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="tele_number" required>
          </div>
          <div class="input-box">
            <span class="details">NIC</span>
            <input type="text" placeholder="Enter your NIC" name="nic" required>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" placeholder="Enter your Address" name="address" required>
          </div>

          <div class="input-box">
            <span class="details">Password</span>

				  <div class="wrapper">
				  
				      <input type="password" placeholder="Enter your password" name="password" required>
				      
				  </div>
				    <script>
				   
				   
				    
				      const passField = document.querySelector("input");
				      const showBtn = document.querySelector("span i");
				      showBtn.onclick = (()=>{
				        if(passField.type === "password"){
				          passField.type = "text";
				          showBtn.classList.add("hide-btn");
				        }else{
				          passField.type = "password";
				          showBtn.classList.remove("hide-btn");
				        }
				      });

				    </script>
    
          </div>


          <div class="input-box">
            <span class="details">Confirm Password</span>
        

				  <div class="wrapper">
				  
				      <input type="password" placeholder="confirm your password" required>
				    
				  </div>
				    <script>
				      const passField = document.querySelector("input");
				      const showBtn = document.querySelector("span i");
				      showBtn.onclick = (()=>{
				        if(passField.type === "password"){
				          passField.type = "text";
				          showBtn.classList.add("hide-btn");
				        }else{
				          passField.type = "password";
				          showBtn.classList.remove("hide-btn");
				        }
				      });
				    </script>
          </div>

        </div>

        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="Male">
          <input type="radio" name="gender" id="dot-2" value="Female">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register" name="Register">
        </div>
      </form>
    </div>
  </div>

</body>
</html>


















</body>
</html>