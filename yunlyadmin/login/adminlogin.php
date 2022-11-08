<?php session_start(); 
require_once('connection.php'); ?>


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
  

  $query="SELECT * FROM admin WHERE email='{$username}' AND password='{$password}' LIMIT 1";
  $result_set=mysqli_query($connection,$query);

  if($result_set){
    if(mysqli_num_rows($result_set)==1){
      $_SESSION['admin_username'] = $username;
      header("location: ../admindash.php");
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
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Leave ​Apply Fo​​​​​​rm">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Admin Login</title>

    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="adminlogin.css" media="screen">

    <!-- <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script> -->
    <meta name="generator" content="Nicepage 3.17.5, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    
    
    <meta property="og:title" content="Home">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
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


  <body class="u-body u-palette-2-base">
    <section class="u-align-center u-clearfix u-grey-15 u-section-1" id="carousel_6556">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-text u-text-1">Admin <span style="font-weight: 700;"></span>Login<span style="font-weight: 700;">
            <span style="font-weight: 400;">
              <span style="font-weight: 700;">
                <span style="font-weight: 400;">
                  <span style="font-weight: 700;">
                    <span style="font-weight: 400;"></span>
                  </span>
                </span>
              </span>
            </span>
          </span>
        </h1>
        <div class="u-form u-form-1">
          <form action="adminlogin.php" method="POST" class="u-clearfix u-form-spacing-15 u-form-vertical u-inner-form" style="padding: 0;" source="custom" name="form">
             <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-3">
              <label for="email-f2a8" class="u-label u-label-3">User Name</label>
              <input type="text" placeholder="Enter a valid email address"  name="user" class="u-border-2 u-border-grey-75 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle" required="">
            </div>
            <div class="u-form-group u-form-name u-form-partition-factor-2 u-form-group-2">
              <label for="name-417f" class="u-label u-label-2">Password</label>
              <input type="Password" placeholder="Enter your password" id="pswrd" name="Password" class="u-border-2 u-border-grey-75 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle" required="">
            </div>
           
            <div class="u-align-center u-form-group u-form-submit u-form-group-8">
              <a href="#" ><button type="submit" name="submit" class="u-btn u-btn-round u-btn-submit u-button-style u-hover-grey-40 u-palette-5-dark-1 u-radius-12 u-btn-1" >Login</button></a>
              <!-- <input type="submit" name="submit" class="u-form-control-hidden">-->
            </div> 
            <input type="hidden" value="" name="recaptchaResponse">
          </form>
        </div>
      </div>
    </section>
    
  </body>
</html>
<?php mysqli_close($connection); ?>