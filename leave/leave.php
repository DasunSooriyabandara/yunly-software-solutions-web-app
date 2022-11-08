<?php
session_start();
require_once("inc/connection.php");

$user_id = $_SESSION['user_id'];

if(isset($_POST['apply']))
{

//$userid=$_POST['id'];   
//$leaveid=$_POST['leaveid'];  
$leavetype=$_POST['leavetype'];
$fromdate=$_POST['from'];  
$todate=$_POST['to'];
$description=$_POST['description']; 

  
  $today = date("Y-m-d");

  if ($fromdate < $today) {
    echo "<script>
            alert('Incorrect date. Choose today or future date.');
            window.location.href = 'leave.php';
          </script>";
    return;
  }

  if ($fromdate > $todate) {
    echo "<script>
            alert('Incorrect date. Choose date after from date.');
            window.location.href = 'leave.php';
          </script>";
    return;
  }


  $sql_query = "INSERT INTO leaves(user_id,leave_type,leave_end_date,leave_start_date,description,status) 
  VALUES('{$user_id}','{$leavetype}','{$fromdate}','{$todate}','{$description}','Pending')";

 $result = mysqli_query($connection,$sql_query);
 if($result){
    echo "Leave applied successfully";
    header("location: ../dashboard.php");
 }else{
    echo "Something went wrong!".mysqli_error($connection);
 }
           
  }      


  ?>


<!DOCTYPE html>
<html>
  <head>
    <title>Leave Apply Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, textarea, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
      h1 {
      position: absolute;
      margin: 0;
      font-size: 36px;
      color: #fff;
      z-index: 2;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      }
      form {
      width: 100%;
      padding: 20px;
      border-radius: 6px;
      background: #D3D3D3;
      box-shadow: 0 0 20px 0 #333; 
      }
      .banner {
      position: relative;
      height: 210px;
    
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.4); 
      position: absolute;
      width: 100%;
      height: 100%;
      }
      input, textarea, select {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      select {
      width: 100%;
      padding: 7px 0;
      background: transparent;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
      color: #333;
      }
      .item input:hover, .item select:hover, .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 6px 0 #333;
      color: #333;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      color: #a9a9a9;
      }
      .item i {
      right: 1%;
      top: 30px;
      z-index: 1;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      right: 0;
      z-index: 2;
      opacity: 0;
      cursor: pointer;
      }

      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background: #444;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background: #666;
      }

    </style>


  </head>
  <body>
    <div class="testbox">
      <form action="leave.php" method="post">
        <div class="banner">
          <h1>Leave Apply Form</h1>
        </div>
        <div class="item">
          <p>User ID</p>
          <div class="name-item">
            <input type="text" name="id" disabled value="<?php echo $user_id; ?>" />
            <!-- <input type="text" name="namel" placeholder="Last" /> -->
          </div>
        </div>

         <div class="item">
          <p>Leave Type<p>
        
          <select name="leavetype" style="background-color:#fff;">
              <option value="">select leave type</option>
              <option value="Annual">Annual</option>
              <option value="Casual">Casual</option>
              <option value="Medical">Medical</option>
              
  
            </select>
             </div>
   
        <div class="item">
          <p>Leave Start Date</p>
          <input type="date" name="from" />
          <i class="fas fa-calendar-alt"></i>
        </div>
        <div class="item">
          <p>Leave End Date</p>
          <input type="date" name="to" />
          <i class="fas fa-calendar-alt"></i>
        </div>
        
        <div class="item">
          <label>Description</label>    
          <textarea type="textarea1" name="description" ></textarea>
        </div>
        <div class="btn-block">
          <button type="submit" href="#" name="apply" >APPLY</button>
        </div>
      </form>
    </div>
  </body>
</html>