<?php
include('../Asstes/dbConn.php');
//fetch the count of records in the respective table and store it in the given variables
$fetchPolice = "SELECT COUNT(*) AS `totalPoliceCount` FROM `police`";
$fetchPoliceRes = mysqli_fetch_assoc(mysqli_query($conn, $fetchPolice))["totalPoliceCount"];

$fetchOffense = "SELECT COUNT(*) AS `fetchOffenseCount` FROM `offense_record`";
$fetchOffenseRes = mysqli_fetch_assoc(mysqli_query($conn, $fetchOffense))["fetchOffenseCount"];

$fetchVehicle = "SELECT COUNT(*) AS `fetchVehicleCount` FROM `vehicle_info`";
$fetchVehicleRes = mysqli_fetch_assoc(mysqli_query($conn, $fetchVehicle))["fetchVehicleCount"];

$fetchPaidOffense = "SELECT COUNT(*) AS `fetchPaidOffenseCount` FROM `offense_record` WHERE `Status` = 'Paid'";
$fetchPaidOffenseRes = mysqli_fetch_assoc(mysqli_query($conn, $fetchPaidOffense))["fetchPaidOffenseCount"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("assets/head.php"); ?>
  <link rel="stylesheet" href="assets/css/AdminDashboard.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/mysql@2.18.1/dist/mysql.min.js"></script> -->
  <title>Admin Dashboard</title>
</head>

<body>
  <div class="container">
    <?php include("assets/nav.php"); ?>
    <!-- main -->
    <div class="main">
      <?php include("assets/top.php"); ?>


      <!-- cards -->
      <div class="cardBox">
        <div class="card">
          <div>
            <div class="numbers"><?= $fetchPoliceRes; ?></div>
            <div class="cardName">Total Police</div>
          </div>
          <!-- <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div> -->
        </div>
        <div class="card">
          <div>
            <div class="numbers"><?= $fetchOffenseRes; ?></div>
            <div class="cardName">Total Challan</div>
          </div>
          <!-- <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div> -->
        </div>
        <div class="card">
          <div>
            <div class="numbers"><?= $fetchVehicleRes; ?></div>
            <div class="cardName">Total Vehicles</div>
          </div>
          <!-- <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div> -->
        </div>
        <div class="card">
          <div>
            <div class="numbers"><?= $fetchPaidOffenseRes; ?> / <?= $fetchOffenseRes; ?></div>
            <div class="cardName">Paid Challan</div>
          </div>
          <!-- <div class="iconBx">
                    </div> -->
        </div>

      </div>
      <?php
      // establish a connection to the database
      $conn = mysqli_connect('localhost', 'root', '', 'tms');
      if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
      }
      // query the offense record table to get the number of offenses in each status
      $query = "SELECT Status, COUNT(*) AS Count FROM offense_record GROUP BY Status";
      $result = mysqli_query($conn, $query);
      if (!$result) {
        die('Query failed: ' . mysqli_error($conn));
      }
      // generate the chart data
      // generate the chart data and set the bar colors
      $labels = array();
      $data = array();
      $colors = array();
      while ($row = mysqli_fetch_assoc($result)) {
        array_push($labels, $row['Status']);
        array_push($data, $row['Count']);
        if ($row['Status'] == 'Open') {
          array_push($colors, 'red');
        } elseif ($row['Status'] == 'Pending') {
          array_push($colors, 'orange');
        } elseif ($row['Status'] == 'Closed') {
          array_push($colors, 'green');
        } else {
          array_push($colors, 'blue');
        }
      }

      // log the fetched data to the console
      echo '<script>console.log("Labels: ' . json_encode($labels) . '");</script>';
      echo '<script>console.log("Data: ' . json_encode($data) . '");</script>';

      // configure the chart options for the bar chart
      $bar_options = array(
        'type' => 'bar',
        'data' => array(
          'labels' => $labels,
          'datasets' => array(
            array(
              'label' => 'Number of Offenses',
              'data' => $data,
              'backgroundColor' => array('green', 'blue', 'orange', 'purple', 'yellow', 'pink')
            )
          )
        ),
        'options' => array(
          'scales' => array(
            'y' => array(
              'beginAtZero' => true,
              'precision' => 0
            )
          )
        )
      );

      // configure the chart options for the line chart
      $line_options = array(
        'type' => 'line',
        'data' => array(
          'labels' => $labels,
          'datasets' => array(
            array(
              'label' => 'Number of Offenses',
              'data' => $data,
              'borderColor' => 'red',
              'fill' => false
            )
          )
        ),
        'options' => array(
          'scales' => array(
            'y' => array(
              'beginAtZero' => true,
              'precision' => 0
            )
          )
        )
      );
      ?>
      <div style="width: 50%; float: left;">
        <canvas id="barChart"></canvas>
      </div>
      <div style="width: 40%; float: left;">
        <canvas id="lineChart"></canvas>
      </div>
      <script>
        const bar_options = <?php echo json_encode($bar_options); ?>;
        const line_options = <?php echo json_encode($line_options); ?>;
        const bar_ctx = document.getElementById('barChart').getContext('2d');
        const line_ctx = document.getElementById('lineChart').getContext('2d');
        const bar_chart = new Chart(bar_ctx, bar_options);
        const line_chart = new Chart(line_ctx, line_options);
      </script>
    </div>
  </div>

  <?php include("assets/script.php"); ?>
  <script>
    // MenuToggle
    let toggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation');
    let main = document.querySelector('.main');

    toggle.onclick = function() {
      navigation.classList.toggle('active');
    }
    // add hovered class in selected list item
    let list = document.querySelectorAll('.navigation li');

    function activeLink() {
      list.forEach((item) =>
        item.classList.remove('hovered'));
      this.classList.add('hovered');

    }
    list.forEach((item) =>
      item.addEventListener('mouseover', activeLink));
  </script>
</body>

</html>