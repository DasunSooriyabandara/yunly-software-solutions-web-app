<?php
session_start();
include('inc/connection.php');
$user_id = $_SESSION['user_id'];
$output = '';
$result=mysqli_query($connection,"SELECT * FROM leaves WHERE user_id='{$user_id}'");
if(mysqli_num_rows($result)>0)
{
    while($leave = mysqli_fetch_array($result)){
 $output .= '<tr>

  <td>'.$leave['user_id'].'</td>
  <td>'.$leave['leave_type'].'</td>
  <td style="width:150px;">'.$leave['leave_start_date'].'</td>
  <td style="width:150px;">'.$leave['leave_end_date'].'</td>
  <td>'.$leave['description'].'</td>
  <td>'.$leave['status'].'</td>


 </tr>';
   


    }
}
   else{
    $output .= 'leave is not applied';
    

   }
 ?>


  

    <div class="hme-cnt">
        <div class="heading"><h1>Leave Details</h1></div>
        
      <div>
         <button class="leave-button"><a href="leave/leave.php"><div style="color:#fff">+Apply Leave</div></a></button>
      </div>
     
      
<table class="styled-table" style="width: 92%;">

    
    <thead>
        <tr>
            <th>EMP Id</th>
            <th>Leave Type</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Description</th>
            <th>Status</th>
            
        </tr>
    </thead>
    <tbody>
<?php echo $output;?>


        
    </tbody>
</table>
 </div>

    
 

 

