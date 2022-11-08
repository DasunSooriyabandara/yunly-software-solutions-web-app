<?php
session_start();
include('inc/connection.php');



$output = '';

$result=mysqli_query($connection,"SELECT * FROM asset_request WHERE status = 'Pending'");

if(mysqli_num_rows($result)>0)
{
    
    while($asset = mysqli_fetch_array($result)){
      $output .= '<tr>
                 
                  <td>'.$asset['user_id'].'</td>
                  <td>'.$asset['asset_name'].'</td>
                  <td>'.$asset['from_date'].'</td>
                  <td>'.$asset['to_date'].'</td>
                  <td>'.$asset['notes'].'</td>
                  <td><button id="approvebtn" type="submit" name="approveBtn" value="'.$asset['asset_request_id'].'">Approve</button></td>
                  <td><button id="rejectbtn" type="submit" name="rejectbtn" value="'.$asset['asset_request_id'].'">Reject</button></td>
                  </tr>';
    }
    
}
   else{
    $output .= 'asset not requested';
   }

   

   
 ?>

 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <title></title>
   <link rel="stylesheet" href="../css/nicepage.css" media="screen">
   <link rel="stylesheet" href="../adminleave/adminleave.css" media="screen">
   <link rel="stylesheet" href="adminasset.css" media="screen">
 </head>
 <body>




 
    <section class="u-clearfix u--5 u-section-1" id="sec-8141" style="margin-left:50px;" style="background-color:#000;">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h6><a href="../admindash.php" style="background-color:#DCDCDC; padding:4px; border-radius: 4px;">< Back to Dashboard</a></h6>
        <h2 class="u-text u-text-default u-text-palette-4-dark-2 u-text-1">Assets</h2>
        <a  href="addasset.php" class="u-btn u-btn-round u-button-style u-hover-palette-4-dark-1 u-palette-4-dark-2 u-radius-50 u-btn-1" style="margin-right:200px; margin-bottom:13px ;"> + ADD ASSET </a>
        <a href="../companyasset.php" class="u-btn u-btn-round u-button-style u-hover-palette-4-dark-1 u-palette-4-dark-2 u-radius-50 u-btn-1"> + EDIT ASSET</a>
        <div class="u-container-style u-grey-5 u-group u-radius-10 u-shape-round u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <h3 class="u-text u-text-default u-text-2">Approved</h3>
            <h4 class="u-text u-text-default u-text-3">
              <?php
                $ra = mysqli_query($connection, "SELECT COUNT(*) as count FROM asset_request WHERE status = 'Approved'");
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
                $rr = mysqli_query($connection, "SELECT COUNT(*) as count FROM asset_request WHERE status = 'Rejected'");
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
                $rp = mysqli_query($connection, "SELECT COUNT(*) as count FROM asset_request WHERE status = 'Pending'");
                $rpd = mysqli_fetch_assoc($rp);
                echo $rpd['count'];
              ?>
            </h4>
          </div>
        </div>
        <div class="u-table u-table-responsive u-table-1">
          <table class="u-table-entity">
            <colgroup>
              <col width="10.4%">
              <col width="19.3%">
              <col width="16.8%">
              <col width="13.9%">
              <col width="14%">
              <col width="12.4%">
              <col width="13.2%">
            </colgroup>
            <tbody class="u-table-alt-palette-1-light-3 u-table-body">
              
              <tr style="height: 68px;">
                <td class="u-table-cell">EMP ID</td>
                <td class="u-table-cell">Asset Name</td>
                <td class="u-table-cell">From</td>
                <td class="u-table-cell">To</td>
                <td class="u-table-cell">Description</td>
                <td class="u-table-cell">Status</td>
                <td class="u-table-cell">Status</td>
              </tr>

              <form action="adminasset.php" method="POST">
              <?php echo $output;

              if (isset($_POST['approveBtn'])) {
                $as = $_POST['approveBtn'];
                $r = mysqli_query($connection, "UPDATE asset_request SET status = 'Approved' WHERE asset_request_id = '{$as}'");
                header("location: adminasset.php");

              }

               if (isset($_POST['rejectbtn'])) {
                $as = $_POST['rejectbtn'];
                $r = mysqli_query($connection, "UPDATE asset_request SET status = 'Rejected' WHERE asset_request_id = '{$as}'");
                 header("location: adminasset.php");
               }
   ?> 
              <!-- <tr style="height: 68px;"> -->
            </form>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    
   
 </body>
 </html>