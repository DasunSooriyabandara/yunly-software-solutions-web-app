<?php
session_start();
include('inc/connection.php');


$output = '';


$result=mysqli_query($connection,"SELECT * FROM leaves WHERE status = 'Pending'");

if(mysqli_num_rows($result)>0)
{

    while($leave = mysqli_fetch_array($result)){
      $output .= '<tr>

                  <td>'.$leave['user_id'].'</td>
                  <td>'.$leave['leave_type'].'</td>
                  <td>'.$leave['leave_start_date'].'</td>
                  <td>'.$leave['leave_end_date'].'</td>
                  <td>'.$leave['description'].'</td>
                  <td><button id="approvebtn" type="submit" name="approveBtn" value="'.$leave['leave_id'].'">Approve</button></td>
                  <td><button id="rejectbtn" type="submit" name="rejectbtn" value="'.$leave['leave_id'].'">Reject</button></td>
                 </tr>';
    }

}
    else{
    $output .= 'No leave is requested';
   }


?>

<!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <title></title>
   <link rel="stylesheet" href="../css/nicepage.css" media="screen">
   <link rel="stylesheet" href="../adminleave/adminleave.css" media="screen">
   <link rel="stylesheet" href="adminleave.css" media="screen">
 </head>
 <body>

  
    <section class="u-clearfix u--10 u-section-1" id="sec-8141" style="margin-left:50px;">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h6 ><a href="../admindash.php" style="background-color:#DCDCDC; padding:4px; border-radius: 4px;">< Back to Dashboard</a></h6>
        <h2 class="u-text u-text-default u-text-palette-4-dark-2 u-text-1">Leaves</h2>
        <div class="u-container-style u-grey-5 u-group u-radius-10 u-shape-round u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <h3 class="u-text u-text-default u-text-2">Approved</h3>
            <h4 class="u-text u-text-default u-text-3">
            <?php
                $ra = mysqli_query($connection, "SELECT COUNT(*) as count FROM leaves WHERE status = 'Approved'");
                $rad = mysqli_fetch_assoc($ra);
                echo $rad['count'];
              ?>
              </h4>
          </div>
        </div>
        <div class="u-container-style u-grey-5 u-group u-radius-10 u-shape-round u-group-2">
          <div class="u-container-layout u-valign-top u-container-layout-2">
            <h3 class="u-text u-text-default u-text-4">Rejected</h3>
            <h4 class="u-text u-text-default u-text-5">
            <?php
                $rr = mysqli_query($connection, "SELECT COUNT(*) as count FROM leaves WHERE status = 'Rejected'");
                $rrd = mysqli_fetch_assoc($rr);
                echo $rrd['count'];
              ?>
            </h4>
          </div>
        </div>
        <div class="u-container-style u-grey-5 u-group u-radius-10 u-shape-round u-group-3">
          <div class="u-container-layout u-valign-top u-container-layout-3">
            <h3 class="u-text u-text-default u-text-6">Pending</h3>
            <h4 class="u-text u-text-default u-text-7">
            <?php
                $rp = mysqli_query($connection, "SELECT COUNT(*) as count FROM leaves WHERE status = 'Pending'");
                $rpd = mysqli_fetch_assoc($rp);
                echo $rpd['count'];
              ?>
            </h4>
          </div>
        </div>
        <div class="u-table u-table-responsive u-table-1">
          <table class="u-table-entity" style="margin-left:20px">
            <colgroup>
              <col width="7.8%">
              <col width="17.9%">
              <col width="14.6%">
              <col width="9.3%">
              <col width="20%">
              <col width="16.3%">
              <col width="12.400000000000011%">
              <col width="13.300000000000011%">
            </colgroup>
            <tbody class="u-table-alt-palette-1-light-3 u-table-body">
              <tr style="height: 65px;">
                <td class="u-table-cell">EMP ID</td>
                <td class="u-table-cell">Leave Type</td>
                <td class="u-table-cell">From</td>
                <td class="u-table-cell">To</td>
                <td class="u-table-cell">Description</td>
                <td class="u-table-cell">Status</td>
                <td class="u-table-cell">Status</td>
              </tr>
               
              <form action="adminleave.php" method="POST">
              <?php echo $output;

              if (isset($_POST['approveBtn'])) {
                $as = $_POST['approveBtn'];
                $r = mysqli_query($connection, "UPDATE leaves SET status = 'Approved' WHERE leave_id = '{$as}'");
                echo "<script>window.location.href = 'adminleave.php';</script>";

              }

               if (isset($_POST['rejectbtn'])) {
                $as = $_POST['rejectbtn'];
                $r = mysqli_query($connection, "UPDATE leaves SET status = 'Rejected' WHERE leave_id = '{$as}'");
                 echo "<script>window.location.href = 'adminleave.php';</script>";
               }
   ?>

            </form>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    

    </body>
 </html>
  