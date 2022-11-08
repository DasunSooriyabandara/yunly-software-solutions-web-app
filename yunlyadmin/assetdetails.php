<?php
session_start();
include('inc/connection.php');

$output = '';
$result=mysqli_query($connection,"SELECT * FROM asset_request");
if(mysqli_num_rows($result)>0)
{
    while($asset = mysqli_fetch_array($result)){
 $output .= '<tr>

  <td>'.$asset['user_id'].'</td>
  <td>'.$asset['asset_name'].'</td>
  <td>'.$asset['from_date'].'</td>
  <td>'.$asset['to_date'].'</td>
  <td>'.$asset['notes'].'</td>
  <td>'.$asset['status'].'</td>


 </tr>';
   


    }
}
   else{
    $output .= 'Asset is not applied';
    

   }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <h3><a href="admindash.php" style="color: #1E90FF;">< Back to Dashboard</a></h3>
    <div style="color:  #008080;"><title> Requested Asset History </title></div>
    <link rel="stylesheet" href="../leave/dashboardtesting.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet"  href="/">
   </head>
<body>


  <h1 class="heading" style="text-align:center;color:#008080;">Requested Asset History </h1>
  
        
     

<table class="styled-table" style="width:1200px;">

    
    <thead>
        <tr>
            <th>EMP Id</th>
            <th>Asset Name</th>
            <th>From</th>
            <th>To</th>
            <th>Description</th>
            <th>Status</th>
            
        </tr>
    </thead>
    <tbody>
<?php echo $output;?>


        
    </tbody>
</table>

        <!-- <div class="recent-sales box">
         
          <div class="title">Recent Sales</div>
          <div class="sales-details">
            <ul class="details">
              <li class="topic">EMP ID</li>
              <li><a href="#">02 Jan 2021</a></li>
              <li><a href="#">02 Jan 2021</a></li>
              <li><a href="#">02 Jan 2021</a></li>
              <li><a href="#">02 Jan 2021</a></li>
              <li><a href="#">02 Jan 2021</a></li>
              <li><a href="#">02 Jan 2021</a></li>
              <li><a href="#">02 Jan 2021</a></li>
            </ul>
          <ul class="details">
              <li class="topic">Leave Type</li>
              <li><a href="#">Alex Doe</a></li>
              <li><a href="#">David Mart</a></li>
              <li><a href="#">Roe Parter</a></li>
              <li><a href="#">Diana Penty</a></li>
              <li><a href="#">Martin Paw</a></li>
              <li><a href="#">Doe Alex</a></li>
              <li><a href="#">Aiana Lexa</a></li>
          
          </ul>
          <ul class="details">
              <li class="topic">From</li>
              <li><a href="#">Delivered</a></li>
              <li><a href="#">Pending</a></li>
              <li><a href="#">Returned</a></li>
              <li><a href="#">Delivered</a></li>
              <li><a href="#">Pending</a></li>
              <li><a href="#">Returned</a></li>
              <li><a href="#">Delivered</a></li>
            
          </ul>
          <ul class="details">
              <li class="topic">To</li>
              <li><a href="#">$204.98</a></li>
              <li><a href="#">$24.55</a></li>
              <li><a href="#">$25.88</a></li>
              <li><a href="#">$170.66</a></li>
              <li><a href="#">$56.56</a></li>
              <li><a href="#">$44.95</a></li>
              <li><a href="#">$67.33</a></li>
          
          </ul>
           <ul class="details">
              <li class="topic">Discription</li>
              <li><a href="#">02 Jan 2021</a></li>
              <li><a href="#">02 Jan 2021</a></li>
              <li><a href="#">02 Jan 2021</a></li>
              <li><a href="#">02 Jan 2021</a></li>
              <li><a href="#">02 Jan 2021</a></li>
              <li><a href="#">02 Jan 2021</a></li>
              <li><a href="#">02 Jan 2021</a></li>
            </ul>
            <ul class="details">
              <li class="topic">Status</li>
              <li><a href="#">02 Jan 2021</a></li>
              <li><a href="#">02 Jan 2021</a></li>
              <li><a href="#">02 Jan 2021</a></li>
              <li><a href="#">02 Jan 2021</a></li>
              <li><a href="#">02 Jan 2021</a></li>
              <li><a href="#">02 Jan 2021</a></li>
              <li><a href="#">02 Jan 2021</a></li>
            </ul>
            
          </div>
          <div class="button">
            <a href="#">See All</a>
          </div>
        </div> -->
        
      </div>
 
  


