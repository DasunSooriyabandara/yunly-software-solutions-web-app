<?php session_start(); 
   require_once('connection.php');

   if(!isset($_SESSION['admin_username'])){
      header("location: login/adminlogin.php");
   }

   if (isset($_POST['approveBtn'])) {
	    // $as = $_POST['approveBtn'];
	    // $r = mysqli_query($connection, "UPDATE asset_request SET status = 'Approved' WHERE asset_request_id = '{$as}'");
	    echo "<script>alert('Approved')</script>";

	  }

	   if (isset($_POST['rejectbtn'])) {
	     echo "<script>alert('Rejected.')</script>";
	   }


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="" href="css/admindash.css">


	<link rel="stylesheet" href="css/nicepage.css" media="screen">
	<link rel="stylesheet" href="adminattendance/adminattendance.css" media="screen">
		
	<link rel="stylesheet" href="adminleave/adminleave.css" media="screen">
	<link rel="stylesheet" href="adminasset/adminasset.css" media="screen">
	<!-- <link rel="stylesheet" href="condition/condition.css" media="screen"> -->

	<link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
	
	
</head>
<body>
	<input type="checkbox" id="checkbox">
	<header class="header">
	
			<label for="checkbox">
				<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
		  </label>
		<h2 class="u-name" style="font-size:30px">YUNLY SOFTWARE <b>SOLUTIONS</b></h2>
	
		<label class="log"><i class="fa fa-user" aria-hidden="true"><?php echo $_SESSION['admin_username']; ?></i></label>
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				<img src="img/yunly.jpg">
				<h2></h2>
			</div>
			<ul>
				<li>
				  <a href="#" class="active">
						<i class="fa fa-desktop" aria-hidden="true"></i>
						<span>DASHBOARD</span>
					</a>
				</li>
				<li>
					<a id="attendance_tab" href="">
						<i class="fa fa-blind" aria-hidden="true"></i>
						<span>ATTENDANCE</span>
					</a>
				</li>
				<li>
					<a id="leave_tab" href="adminleave/adminleave.php">
						<i class="fa fa-wheelchair" aria-hidden="true"></i>
						<span>LEAVE REQUESTS</span>
					</a>
				</li>
				<li>
					<a id="assets_tab" href="adminasset/adminasset.php">
						<i class="fa fa-inbox" aria-hidden="true"></i>
						<span>ASSET REQUESTS</span>
					</a>
				</li>
				<!-- <li>
					<a id="chat_tab" href="">
						<i class="fa fa-comment-o" aria-hidden="true"></i>
						<span>CHAT</span>
					</a>
				</li> -->
				<li>
					<a id="calender_tab" href="">
						<i class="fa fa-calendar-o" aria-hidden="true"></i>
						<span>CALENDER</span>
					</a>
				</li>
				<li>
					<a id="terms_tab" href="">
						<i class="fa fa-newspaper-o" aria-hidden="true"></i>
						<span>TERMS & CONDITIONS</span>
					</a>
				</li>
			<!-- 		<li>
					<a id="settings_tab" href="">
						<i class="fa fa-cog" aria-hidden="true"></i>
						<span>SETTINGS</span>
					</a>
				</li> -->
				<li>
					<a href="logout.php">
						<i class="fa fa-power-off" aria-hidden="true"></i>
						<span>LOG OUT</span>
					</a>
				</li>
			</ul>
		</nav>

		<section class="section-1">
	
			<!-- <p>WELCOME ADMIN</p> -->

		<div id="main_container"  class="home-content" style="background-color:;">
			
			<div style="margin-left: 50px;"><h3><b>Welcome Admin</b></h3></div>
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Employee Leave History</div>
            <div class="number">---------------------</div>
          </div>
       <div class="">
         	<button class="button" type="submit" name="submit" > <a href="dashboardtesting.php" style="color: #fff;">Show</a></button>
       </div>
        </div>



        <div class="box">
          <div class="right-side">
            <div class="box-topic">Employee Asset History</div>
            <div class="number">---------------------</div>
            </div>
              <div class="butt">
         	<button class="button" type="submit" name="submit"><a href="assetdetails.php" style="color: #fff;" >Show</a></button>
              </div>
          </div>
         


 		<div class="box">
          <div class="right-side">
            <div class="box-topic">Company Assets</div>
            <div class="number">---------------------</div>
            </div>
              <div class="butt">
         	<button class="button" type="submit" name="submit" style="background-colo"><a href="companyasset.php" style="color: #fff;" >Show</a></button>
       	      </div>
          </div>


		<div class="box">
          <div class="right-side">
            <div class="box-topic">Print Attendance Report</div>
            <div class="number">---------------------</div>
            </div>
              <div class="butt">
         	<button class="button" type="submit" name="submit" style="background-colo"><a href="adminattendance/print.php" style="color: #fff;" >Show</a></button>
       	      </div>
          </div>

      </div>

      <div class="sales-boxes" >
    
          <div class="recent-sales box" style="height: 300px;">
          <div class="title" style="padding-bottom:2px;"> Upcoming Holidays & Events</div>
      
           <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23ffffff&ctz=Asia%2FColombo&src=ZGF5b25lY2xpcHNAZ21haWwuY29t&src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&src=ZW4ubGsjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&color=%23039BE5&color=%2333B679&color=%237986CB&showTitle=0&showNav=0&showPrint=0&showTabs=0&showCalendars=0&showTz=0&mode=AGENDA" style="border-width:0" width="600" height="220" frameborder="0" scrolling="no"></iframe>

        </div>



         <div class="top-sales">
           
           <div style="margin-left:60px ;">
            <img src="img/c.gif">
           </div>

            <div style="margin-left:60px ;">
            <img src="img/l.gif">
           </div>

          </div>

        </div>


        




       
      </div>
    </div>
		</section>
	</div>

	 <script>

$(document).ready(function() {
			$("a#attendance_tab").click(function(e) {
				e.preventDefault();
				$("#main_container").load('adminattendance/adminattendance.php');
			});

			// $("a#leave_tab").click(function(e) {
			// 	e.preventDefault();
			// 	$("#main_container").load('adminleave/adminleave.php');
			// });

			// $("a#assets_tab").click(function(e) {
			// 	e.preventDefault();
			// 	$("#main_container").load('adminasset/adminasset.php');
			// });

			$("a#chat_tab").click(function(e) {
				e.preventDefault();
				$("#main_container").load('');
			});

			$("a#email_tab").click(function(e) {
				e.preventDefault();
				$("#main_container").load('');
			});

			$("a#calender_tab").click(function(e) {
				e.preventDefault();
				$("#main_container").load('calender/calendr.html');
			});

			$("a#terms_tab").click(function(e) {
				e.preventDefault();
				$("#main_container").load('condition/condition.html');
			});


			$("a#settings_tab").click(function(e) {
				e.preventDefault();
				$("#main_container").load('');
			});

		});


 </script>

</body>
</html>
<?php mysqli_close($connection);?>