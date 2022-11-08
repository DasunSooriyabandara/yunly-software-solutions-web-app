<?php
include('inc/connection.php');

$output = '';

$result=mysqli_query($connection,"SELECT * FROM leaves");

if(mysqli_num_rows($result)>0)
{
    while($leave = mysqli_fetch_array($result)){
      $output .= '<tr>
                  <td>'.$leave['user_id'].'</td>
                  <td>'.$leave['leave_type'].'</td>
                  <td>'.$leave['leave_start_date'].'</td>
                  <td>'.$leave['leave_end_date'].'</td>
                  <td>'.$leave['description'].'</td>
                  <td><input id="approvebtn" type="submit" name="approveBtn" value="Approve"></td>
                  <td><input id="rejectbtn" type="submit" name="rejectBtn" value="Reject"></td>
                 </tr>';
    }
} else{
    $output .= 'No leave is requested';
   }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>



</body>
</html>

  
    <section class="u-clearfix u--10 u-section-1" id="sec-8141" style="margin-left:50px;">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-text u-text-default u-text-palette-4-dark-2 u-text-1">Leaves</h2>
        <div class="u-container-style u-grey-5 u-group u-radius-10 u-shape-round u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <h3 class="u-text u-text-default u-text-2">Approved</h3>
            <h4 class="u-text u-text-default u-text-3">12</h4>
          </div>
        </div>
        <div class="u-container-style u-grey-5 u-group u-radius-10 u-shape-round u-group-2">
          <div class="u-container-layout u-valign-top u-container-layout-2">
            <h3 class="u-text u-text-default u-text-4">Rejected</h3>
            <h4 class="u-text u-text-default u-text-5">12</h4>
          </div>
        </div>
        <div class="u-container-style u-grey-5 u-group u-radius-10 u-shape-round u-group-3">
          <div class="u-container-layout u-valign-top u-container-layout-3">
            <h3 class="u-text u-text-default u-text-6">Pending</h3>
            <h4 class="u-text u-text-default u-text-7">12</h4>
          </div>
        </div>
        <div class="u-table u-table-responsive u-table-1">
          <table class="u-table-entity">
            <colgroup>
              <col width="7.8%">
              <col width="17.9%">
              <col width="14.6%">
              <col width="9.3%">
              <col width="8.7%">
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

              <?php echo $output;?>
              <tr style="height: 65px;">
                
              
        
            </tbody>
          </table>
        </div>
    </section>
    
  