<?php 
	session_start();
	include('inc/connection.php');

	$assetId = $_SESSION['asset_id'];

	$res = mysqli_query($connection, "SELECT * FROM assets WHERE asset_id = '{$assetId}'");

	$assetDetails = mysqli_fetch_assoc($res);

	if (isset($_POST['save'])) {
		$assetname=$_POST['name'];
		$brand=$_POST['brand'];  
		$quantity=$_POST['quantity'];
		$date=$_POST['date'];  


	  $sql_query = "UPDATE assets SET asset_name = '{$assetname}', asset_brand = '{$brand}', quantity = '{$quantity}', date_purchased = '{$date}'  WHERE asset_id = '{$assetId}'";

	 $result = mysqli_query($connection,$sql_query);
	 if($result){
	    
	    //echo "<div class='alert alert=success' role='alert'>Asset details updated.</div>";
	    echo "<script>window.location.href = 'companyasset.php';</script>";
	    
	 }else{
	    echo "<div class='alert alert=success' role='alert'>Please try again!!</div>".mysqli_error($connection);
	 }
	           
	  } 
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Edit Asset</title>
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
      <form action="edit_asset.php" method="post">
        <div class="banner">
          <h1>EDIT ASSET</h1>
        </div>

         <div class="item">
          <p>Asset Name<p>
             <input type="text" name="name" value="<?php echo $assetDetails['asset_name']; ?>" />       
         </div>

         <div class="item">
          <p>Asset brand<p>
             <input type="text" name="brand" value="<?php echo $assetDetails['asset_brand']; ?>"/>       
         </div>

        <div class="item">
          <p>Quantity</p>
          <input type="text" name="quantity" value="<?php echo $assetDetails['quantity']; ?>"/>
        </div>
   
        <div class="item">
          <p>Date Purchased</p>
          <input type="date" name="date"  value="<?php echo $assetDetails['date_purchased']; ?>" />
          <i class="fas fa-calendar-alt"></i>
        </div>

        <div class="btn-block">
          <button type="submit" href="#" name="save" >SAVE</button>
        </div>
      </form>
    </div>

</body>
</html>