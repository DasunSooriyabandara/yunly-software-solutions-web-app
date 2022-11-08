<?php
session_start();
include('inc/connection.php');

$_SESSION['asset_id'] = '';


$output = '';

$result=mysqli_query($connection,"SELECT * FROM assets");

if(mysqli_num_rows($result)>0)
{
    
    while($assets = mysqli_fetch_array($result)){
      $output .= '<tr>
                 
                
                  <td>'.$assets['asset_name'].'</td>
                  <td>'.$assets['asset_brand'].'</td>
                  <td>'.$assets['quantity'].'</td>
                  <td>'.$assets['date_purchased'].'</td>
                  <td><button style="width:60px;color:#000;border-radius:5px;"name="editBtn" value="'.$assets["asset_id"].'" >Edit</button></td>
                  </tr>';
    }
    
}
   else{
    $output .= 'No available assets';
   }

   if (isset($_POST['editBtn'])) {
       $clickedAssetId = $_POST['editBtn'];
       $_SESSION['asset_id'] = $clickedAssetId;
       header("location: edit_asset.php");
   }

   
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <h3><a href="adminasset/adminasset.php" style="color: #1E90FF;">< Back to Dashboard</a></h3>
    <title>Company Asset Details </title>
    <link rel="stylesheet" href="../leave/dashboardtesting.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet"  href="/">
   </head>
<body>


  <h1 class="heading" style="text-align: center; margin-bottom:25px; color:#008080; ">Company Asset Details </h1>
  




 
    <section class="u-clearfix u--5 u-section-1" id="sec-8141" style="margin-left:50px;" style="background-color:#000;">
      <div class="u-clearfix u-sheet u-sheet-1">
      
        

              <form action="companyasset.php" method="POST">
            <div class="hme-cnt">
        <!-- div class="heading"><h1>Leave Details</h1></div> -->
        
      <!-- <div>
         <button class="leave-button"><a href="leave/leave.php"><div style="color:#fff">+Apply Leave</div></a></button>
      </div>
      -->
      
<table class="styled-table" style="width: 90%;">

    
    <thead>
        <tr>
           
            <th>Asset Name</th>
            <th>Asset Brand</th>
            <th>Quantity</th>
            <th>Date Purchased</th>
            <th>Edit</th>
            
             <!-- <tr style="height: 68px;"> -->
            
        </tr>
    </thead>
    <tbody>
<?php echo $output;?>


        
    </tbody>
</table>
 </div>


               
              
            </form> 
           
          </table>
        
      
    </section>
    
   
 </body>
 </html>