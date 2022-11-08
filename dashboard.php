<?php session_start(); 
   require_once('connection.php');
   include 'barcode/barcode128.php';

   if(!isset($_SESSION['username'])){
      header("location: login/login.php");
   }

   $user_nic = '';
   $user_id = '';


$email=$_SESSION['username'];
$result=mysqli_query($connection,"SELECT user_id, nic FROM user WHERE email='{$email}'");
if(mysqli_num_rows($result)>0){
    $user=mysqli_fetch_assoc($result);
    $user_id=$user['user_id'];
    $user_nic = $user['nic'];
    $_SESSION['user_id']=$user_id;
}

  if (isset($_POST['in_time_submit'])) {
    date_default_timezone_set('Asia/Colombo');
    $date = date('Y-m-d H:i:s');

    $status = '';

    if(time() >= strtotime('08:00:00')) {
      $status = "Half Day";
    }else {
      $status = "Full Day";
    }

    $r = mysqli_query($connection, "INSERT INTO barcode (time_in, user_id, status) VALUES ('{$date}', '{$user_id}', '{$status}')");

    if ($r) {
      echo "<script>console.log('Successful.')</script>";
    }else {
      echo "<script>console.log('".mysqli_error($connection)."')</script>";
    }
  }

  if (isset($_POST['out_time_submit'])) {
    date_default_timezone_set('Asia/Colombo');
    $barcodeId = '';
    $date = date('Y-m-d H:i:s');

    $rr = mysqli_query($connection, "SELECT barcode_id FROM barcode ORDER BY barcode_id DESC LIMIT 1");
    $fa = mysqli_fetch_assoc($rr);
    $barcodeId = $fa['barcode_id'];

    $rrr = mysqli_query($connection, "UPDATE barcode SET time_out = '{$date}' WHERE barcode_id = '{$barcodeId}'");
  }

  $inTime = '';

  $re = mysqli_query($connection, "SELECT time_in FROM barcode WHERE user_id = '{$user_id}' ORDER BY barcode_id DESC LIMIT 1");

  if ($re) {
    $rre = mysqli_fetch_assoc($re);
    if ($rre > 0) {
      $inTime = $rre['time_in'];
    }
    
  }
  

 ?>
  
 



<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">

    <link rel="stylesheet" href="attendance/attendance.css" media="screen">
    <link rel="stylesheet" href="asset/assetdetails.css" media="screen">
    <link rel="stylesheet" href="leave/dashboardtesting.css" media="screen">
    <link rel="stylesheet" type="text/css" href="chat/chat.css" media="screen">

 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <!--<i class="logo"> <img src="yunly.png"></i> -->
      <span class="logo_name">Yunly Software Solutions</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a id="attendance_tab" href="">
            <i class='bx bx-box' ></i>
            <span class="links_name">Attendance</span>
          </a>
        </li>
        <li>
          <a id="leave_tab" href="">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Leave</span>
          </a>
        </li>
        <li>
          <a id="asset_tab" href="">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Assets</span>
          </a>
        </li>
        <li>
          <a id="chat_tab" href="">
            <i class=' bx bx-message' ></i>
            <span class="links_name">Chat</span>
          </a>
        </li>
        <!-- <li>
          <a href="#">
            <i class='bx bx-user' ></i>
            <span class="links_name">Emails</span>
          </a>
        </li> -->
        <li>
          <a id="calender_tab" href="">
            <i class=' bx bx-book-alt' ></i>
            <span class="links_name">Calender</span>
          </a>
        </li>
        <li>
            <a id="terms_tab" href="">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Terms and conditions</span>
          </a>
        </li>
       <!--  <li>
          <a href="#">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Favourites</span>
          </a>
        </li> -->
        <!-- <li>
          <a href="#">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Settings</span>
          </a>
        </li> -->
        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Welcome </span>
      </div>
      <div class="search-box">
      <!--   <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
        <i class='bx bx-search' ></i>
        <i class='bx bx-heart' ></i> -->
      </div>
      <div class="profile-details">
        <!--<img src="lahiru.jpg" alt="">-->
        <span class="admin_name"><?php echo $_SESSION['username']; ?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>


    <div id="main_container" class="home-content">
      <div class="overview-boxes" >

           <div style="margin-left: 840px; background-color:#00BFFF; padding: 2px; border-radius:5px;"><h4>Learn More From w3school</h4></div>

        <div class="box" style="background-color: #A9A9A9  ;" >
          <div class="right-side" >
            <div class="box-topic"></div>
            <div class="number"> Let's take less vacations and work more </div>
          </div>
       <div class="">
         	<button class="button" type="submit" name="submit"><a href="leave/leave.php" style="color: #fff;" >Apply leaves</a></button>
       </div>
        </div>



        <div class="box" style="background-color: #A9A9A9  ;">
          <div class="right-side">
            <div class="box-topic">  </div>
            <div class="number">Make it your absolute duty to protect the resources of the organization</div>
            </div>
              <div class="butt">
          <button class="button" type="submit" name="submit"><a href="asset/assetapplyform.php" style="color: #fff;" >Apply Asset</a></button>
              </div>
          </div>
         

          <!--   <div style="color:#B22222;font-size:35px; font-family:cursive; text-align: center;">We <br>
                  Code Your</div>


              <div style="color: #00BFFF ;font-size:45px;font-family:cursive;">Dream</div> 
              <div>to</div>
              <div style="color: #FFD700  ;font-size:37px; font-family:cursive;" >Reality</div>
               -->

          <div class="box" style="background-color: #A9A9A9  ;">
          <div >
            <img src="img/we.gif" width="230px">
           </div>
          </div>



 

    <div class="box" style="background-color: #A9A9A9  ;">

       

            
           <div style="padding-left:px;"><a href="https://www.w3schools.com/python/default.asp"><img src="img/p.gif" width="50px"></a></div>

            <div style="display: inline-block; padding-left: 4px;"><a href="https://www.w3schools.com/php/"><img src="img/a.jpg" width="80px"></a></div>

          
            <div style="margin-top:px; padding-left: 4px;"><a href="https://www.w3schools.com/sql/default.Asp"><img src="img/sq.gif" width="100px"></a></div>
           <!--  <div><a href=""><img src="img/an.gif" width="80px"></a></div> -->
          
             
     </div>


     

      </div>

      <div class="sales-boxes">
        
        <div class="recent-sales box" style="margin-bottom: 20px;">
          <div class="title" style="padding:7px;"> Upcoming Holidays & Events</div>
          <div class="sales-details" style="padding:9px;">
            <ul class="details">
              
              <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23ffffff&ctz=Asia%2FColombo&src=ZGF5b25lY2xpcHNAZ21haWwuY29t&src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&src=ZW4ubGsjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&color=%23039BE5&color=%2333B679&color=%237986CB&showTitle=0&showNav=0&showPrint=0&showTabs=0&showCalendars=0&showTz=0&mode=AGENDA" style="border-width:0" width="660" height="250" frameborder="0" scrolling="no"></iframe>


            </ul>
          </div>
        </div>
        <div class="top-sales box" style="margin-bottom: 20px;">
            <div style="text-align: center;">
            <div style="margin-top:20px; margin-bottom:px; background-color:#DCDCDC; height:110px; border-radius:10px;">
              <div class="title" style="padding-bottom:15px;"> Your Barcode </div>
                <ul class="top-sales-details">
                    <div style="margin-left: 110px"><?php echo bar128($user_nic); ?></div>
            </div>
                    <div class="pls" style="margin-top:20px; margin-bottom:10px; background-color:#DCDCDC; height:110px; border-radius:10px;">
                      <h1  style="padding-bottom:15px;padding-top:5px ;">Today In Time</h1>
                      <?php echo $inTime; ?>
                    </div>

                </ul>
           </div>
          </div>
      </div>
    </div>
  
  </section>

  <script>
//    let sidebar = document.querySelector(".sidebar");
// let sidebarBtn = document.querySelector(".sidebarBtn");
// sidebarBtn.onclick = function() {
//   sidebar.classList.toggle("active");
//   if(sidebar.classList.contains("active")){
//   sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
// }else
//   sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
// }
$(document).ready(function() {
      $("a#attendance_tab").click(function(e) {
        e.preventDefault();
        $("#main_container").load('attendance/attendance.php');
      });

      $("a#leave_tab").click(function(e) {
        e.preventDefault();
        $("#main_container").load('leave/dashboardtesting.php');
      });

      $("a#asset_tab").click(function(e) {
        e.preventDefault();
        $("#main_container").load('asset/assetdetails.php');
      });

      $("a#chat_tab").click(function(e) {
        e.preventDefault();
        $("#main_container").load('chat/chat.php');
      });

       $("a#calender_tab").click(function(e) {
        e.preventDefault();
        $("#main_container").load('calender/calender.html');
      });

      $("a#terms_tab").click(function(e) {
        e.preventDefault();
        $("#main_container").load('condition/condition.html');
      });

      // $("a#chat_tab").click(function(e) {
      //   e.preventDefault();
      //   $("#main_container").load('chat/chat.php');
      // });

    });

 </script>

</body>
</html>

