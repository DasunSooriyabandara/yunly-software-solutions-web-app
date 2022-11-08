<?php
session_start();
include('inc/connection.php');
//$user_id = $_SESSION['user_id'];
$output = '';
$result=mysqli_query($connection,"SELECT * FROM leaves");
if(mysqli_num_rows($result)>0)
{
    while($leave = mysqli_fetch_array($result)){
         $rr = mysqli_query($connection, "SELECT first_name, last_name FROM user WHERE user_id = '{$leave['user_id']}'");
         $rd = mysqli_fetch_assoc($rr);

         $output .= '<tr>
                      <td>'.$leave['user_id'].'</td>
                      <td>'.$rd['first_name'].' '.$rd['last_name'].'</td>
                      <td>'.$leave['leave_type'].'</td>
                      <td>'.$leave['leave_start_date'].'</td>
                      <td>'.$leave['leave_end_date'].'</td>
                      <td>'.$leave['description'].'</td>
                      <td>'.$leave['status'].'</td>
                     </tr>';

    }
}
   else{
    $output .= 'leave is not applied';
    

   }
 ?>

        
  
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <h3><a href="admindash.php" style="color: #1E90FF;">< Back to Dashboard</a></h3>
    <title> Requested Leave History </title>
    <link rel="stylesheet" href="../leave/dashboardtesting.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet"  href="/">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
   </head>
<body>
  
         
      <h1 class="heading" style="text-align: center; color:#008080;">Leave History </h1>

      <div class="search-box" >
        <input id="search" type="text" placeholder="Enter Employee ID" style="background-color:#DCDCDC; border-width: 1px; border-radius: 5px;
                                                          height: 40px;
                                                          width:px;
                                                          margin-top: 10px;
                                                          margin-left: 10px;
                                                          margin-bottom: 40px;
                                                          border-radius: 6px;
                                                          line-height: 40px;
                                                          text-align: center;
                                                          color: #696969;
                                                          font-size: 20px;
                                                          transition: all 0.4 ease;
                                                        ">
        <i class='bx bx-search' ></i>
        <!-- <i class='bx bx-search' ></i>
        <i class='bx bx-heart' ></i> -->
      </div> 

<table class="styled-table" style="width:1200px;">

    <thead>
        <tr>
            <th>EMP Id</th>
            <th>Employee Name</th>
            <th>Leave Type</th>
            <th>From</th>
            <th>To</th>
            <th>Description</th>
            <th>Status</th>
            
        </tr>
    </thead>
    <tbody>

        <div id="searchContainer" style="">
            <?php echo $output;?>
        </div>




        
    </tbody>
</table>
 </div>

 <script>
    $(document).ready(function() {
      $("#search").keyup(function() {
        var keyword = $("#search").val();

        $.get("leave-data.php?search=" + keyword, function(data, status) {
          $("#searchContainer").html(data);
        });
      });
    });
  </script>

<!--   </section>

  <script>
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script> -->

</body>
</html>

 

