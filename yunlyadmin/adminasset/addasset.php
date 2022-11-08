<?php
 require_once("inc/connection.php");

if(isset($_POST['add']))
{

     
$assetname=$_POST['name'];
$brand=$_POST['brand'];  
$quantity=$_POST['quantity'];
$date=$_POST['date'];  


  $sql_query = "INSERT INTO assets(asset_name,asset_brand,quantity,date_purchased) 
  VALUES('{$assetname}','{$brand}','{$quantity}','{$date}')";

 $result = mysqli_query($connection,$sql_query);
 if($result == TRUE){
    
    echo "<div class='alert alert=success' role='alert'>Asset has been added</div>";
    
 }else{
    echo "<div class='alert alert=success' role='alert'>Please try again!!</div>".mysqli_error($connection);
 }
           
  }      


  ?>

<!DOCTYPE html>
<html>
  <head>
    <title>ADD ASSET</title>
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
      background: #afc2cb;
      box-shadow: 0 0 20px 0 #333; 
      color:#81d4fa;
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
      background-color: #000051; 
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
      background: #000051;
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
      <form action="addasset.php" method="post">
        <div class="banner">
          <h1>ADD ASSET</h1>
        </div>

         <div class="item">
          <p>Asset Name<p>
             <input type="text" name="name" placeholder="Enter Asset Name" />       
         </div>

         <div class="item">
          <p>Asset brand<p>
             <input type="text" name="brand" placeholder="Enter Asset brand" />       
         </div>

        <div class="item">
          <p>Quantity</p>
          <input type="text" name="quantity" />
        </div>
   
        <div class="item">
          <p>Date Purchased</p>
          <input type="date" name="date" />
          <i class="fas fa-calendar-alt"></i>
        </div>

        <div class="btn-block">
          <button type="submit" href="#" name="add" >ADD</button>
        </div>
      </form>
    </div>
  </body>
</html>