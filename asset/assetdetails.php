<?php
session_start();
include('inc/connection.php');
$user_id = $_SESSION['user_id'];
$output = '';
$result=mysqli_query($connection,"SELECT * FROM asset_request WHERE user_id='{$user_id}'");
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


  
  
    <div class="home-contentt">
        <div class="heading" ><h1>Asset Details</h1></div>
        <div>
        <button class="assets-button" ><a href="asset/assetapplyform.php"><div style="color:#fff">+Apply Assets</div></a></button>
        </div>
         
     

<table class="styled-table">

    
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
 
  


