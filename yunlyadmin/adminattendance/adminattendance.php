<?php 
  require_once('../../connection.php');
?>

    <section class="u-align-center u-clearfix u-section-1" id="sec-742d" style="margin-left:50px;">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-text u-text-default u-text-palette-4-dark-2 u-text-1">Attendance</h2>
        <div><button style="margin-right: 1000px; margin-top: 10px;background-color:#DCDCDC; border-radius: 4px;color:#fff; padding: 2px;"><a href="adminattendance/print.php">Generate Report</a></button></div>

        <div class="u-table u-table-responsive u-table-1">
            <div class="search-box" >
                <input id="search" type="text" placeholder="Enter Employee ID" style="background-color:#DCDCDC; border-width: 1px; border-radius: 5px;">
               <i class='bx bx-search' ></i>
                <!-- <i class='bx bx-search' ></i>
                <i class='bx bx-heart' ></i> -->
              </div>        
          <table class="styled-table" style="background-color: #FFFAFA;">
            <thead class="adminatt">
              <th>Employee ID</th>
              <th>Employee First Name</th>
              <th>Employee Last Name</th>
              <th>Time In</th>
              <th>Time Out</th>

            </thead>
            <tbody>
              <div id="searchContainer"></div>
              <?php   
                $out = '';

                $r = mysqli_query($connection, "SELECT * FROM barcode");

                if ($r) {
                  while ($d = mysqli_fetch_array($r)) {
                    $rr = mysqli_query($connection, "SELECT first_name, last_name FROM user WHERE user_id = '{$d['user_id']}'");
                    $rd = mysqli_fetch_assoc($rr);

                    $out .= '<tr>
                                <td>'.$d['user_id'].'</td>
                                <td>'.$rd['first_name'].'</td>
                                <td>'.$rd['last_name'].'</td>
                                <td>'.$d['time_in'].'</td>
                                <td>'.$d['time_out'].'</td>
                              </tr>';
                  }

                  echo $out;
                }

              ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    
    <script>
    $(document).ready(function() {
      $("#search").keyup(function() {
        var keyword = $("#search").val();

        $.get("adminattendance/search-data.php?search=" + keyword, function(data, status) {
          $("#searchContainer").html(data);
        });
      });
    });
  </script>
  