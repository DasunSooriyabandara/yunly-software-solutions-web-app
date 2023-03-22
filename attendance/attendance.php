<?php 
    session_start(); 
    require_once('../connection.php');
    $user_id = $_SESSION['user_id'];
    

?>


<!-- <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
 
    <link rel="stylesheet" href="attendance.css">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet"  href="/">
   </head> -->
<!-- <body> -->
  
  
    <div class="hme-content">
        <div >
        <h1 class="hea" style="margin-left: 50px;
  margin-top: 50px;
  font-size: 40px;">
              Attendance
          </h1> 
       <!--  <input type="text" name="in_time">
                <input type="submit" name="in_time_submit"> -->
         </div>
      <div class="sales-boxes" style="">
          <h4 class="head">Daily Activities</h4>
        <div class="today-punch" >
            <form action="dashboard.php" method="POST">
            <label class="note" style="margin-left:80px ;">Punch In at :
                
                <input style="height: 50%;
                         
                           margin-top: 24px;
                           margin-left: 0px;
                           margin-right: 0px;
                           padding: 0px 5px 0px 5px;
                           border-radius: 5px;
                           border: none;
                           color: #fff;
                           font-size: 15px;
                           font-weight: 600;
                           letter-spacing: 1.5px;
                           cursor: pointer;
                           transition: all 0.3s ease;
                           background: linear-gradient(135deg, #606c88, #3f4c6b); 
                           align: center; 
                           cursor: pointer;" type="submit" name="in_time_submit" value="Mark As Attend">
            </label> 
                <label class="note1" style="font-size:27px;padding-top: 300px; margin-left:80px;">Punch Out at :
                
                <input style="height: 50%;
                      
                           margin-top: 25px;
                           margin-left: px;
                           margin-right: 0px;
                           padding: 0px 5px 0px 5px;
                           border-radius: 4px;
                           border: none;
                           color: #fff;
                           font-size: 15px;
                           font-weight: 500;
                           letter-spacing: 1.5px;
                           cursor: pointer;
                           transition: all 0.3s ease;
                           background: linear-gradient(135deg, #606c88, #3f4c6b); 
                           align: center; 
                           cursor: pointer;"type="submit" name="out_time_submit" value="Mark As Leave">
            </label>
            </form>
        </div>
         
         </div>
        

<table class="styled-table">

    <thead>
        <tr>
            <th>USER ID</th>
            <th>Punch In</th>
            <th>Punch Out</th>
            <th>Half Day/Full Day</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
            $output = '';

            $res = mysqli_query($connection, "SELECT * FROM barcode WHERE user_id = '{$user_id}'");

            if ($res) {
                while ($d = mysqli_fetch_array($res)) {
                    $output .= '<tr>
                                    <td>'.$d['user_id'].'</td>
                                    <td>'.$d['time_in'].'</td>
                                    <td>'.$d['time_out'].'</td>
                                    <td>'.$d['status'].'</td>
                                </tr>';
                }

                echo $output;
            }
        ?>
    </tbody>
</table>

        
      </div>
    </div>
  </section>

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
 </script>
<!-- 
</body>
</html> -->

