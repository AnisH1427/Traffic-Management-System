<?php 
include("preFunction/top.php");
?>
<!DOCTYPE html>
<html>

<head>
  <title>User Dashboard</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: "Raleway", sans-serif
    }

    /* Create two equal columns that floats next to each other */
    .column {
      float: left;
      width: 50%;
      padding: 10px;
      height: 300px;
      /* Should be removed. Only for demonstration */
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    .challan {
      padding: 5px;
    }
  </style>
</head>

<body class="w3-light-grey w3-content" style="max-width:1600px">



  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <?php include('preFunction/userInfo.php');?>
    <div class="w3-bar-block">
      <a href="#home" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-th-large fa-fw w3-margin-right"></i>Home</a>
      <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>ABOUT</a>
      <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>CONTACT</a>
      <span onclick="logout()" class="w3-bar-item w3-button w3-padding"><i class="fas fa-sign-out-alt w3-margin-right"></i>LOG OUT</a>
    </div>

  </nav>

  <!-- Overlay effect when opening sidebar on small screens -->
  <!-- <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div> -->

  

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:300px">

    <!-- Header -->
    <header id="home">
      <a href="#"><img src="/w3images/avatar_g2.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
      <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
      <div class="w3-container">
        <h1><b>Traffic Management System</b></h1>
        <div class="w3-section w3-bottombar w3-padding-16">
          <!-- <span class="w3-margin-right">Filter:</span> -->
          <button class="w3-button w3-black" onclick="window.location.href = 'test.php'">ALL</button>
          <button class="w3-button w3-white" onclick="window.location.href = 'test2.php'"><i class="fa fa-inr w3-margin-between"></i> Payment</button>
          <!-- <button class="w3-button w3-white" onclick="window.location.href = 'test3.php'"><i class="fas fa-file-alt w3-margin-between"></i> Rules</button> -->
          <button class="w3-button w3-white" onclick="window.location.href = 'test4.php'"><i class="fa fa-comments w3-margin-between"></i> Community</button>
        </div>
      </div>
    </header>

    <?php
    $challanSql = "SELECT * FROM `offense_type` JOIN `offense_record` JOIN `police` JOIN `user` ON `offense_type`.`Id` = `offense_record`.`Offense_Type_Id` AND `offense_record`.`Police_Id` = `police`.`Id` AND `user`.`owner_of` = '{$userInfo['owner_of']}' AND `offense_record`.`vehicle_id` = '{$userInfo['owner_of']}'  AND `user`.`Id` = '{$userID}'";

    ?>

    <!-- First Challan Grid-->
    <div class="w3-row-padding">
      <?php
      $challanRes = mysqli_query($conn, $challanSql);
      if (mysqli_num_rows($challanRes) != 0) :
        while ($challanInfo = mysqli_fetch_assoc($challanRes)) :
      ?>
          <div class="w3-third w3-container w3-margin-bottom" onclick="window.location.href = 'test2.php?id=<?= $challanInfo['offense_Id'] ?>'" style="cursor:pointer">
            
          <div class="w3-container w3-white">
            <p style="float:right">
            <?php if($challanInfo["Status"] == "Paid"):?>
              <i class="fa fa-circle" style="color:#009432"></i>
              <?php elseif($challanInfo["Status"] == "Pending"):?>
                <i class="fa fa-circle" style="color:#ee5253"></i>
              <?php endif;?>
          
          </p>
              <p><b><u>Challan No : <?= $challanInfo["offense_Id"] ?></u></b></p>
              <span><b>Offender : </b><?= $challanInfo["Offender_Name"] ?></span><br>
              <span><b>Location : </b> <?= $challanInfo["Location_Name"] ?></span><br>
              <span><b>Offenses : </b> <?= $challanInfo["type_Name"] ?></span> <br>
              <span><b>Offense Time : </b> <?= $challanInfo["time"] ?></span> <br>
              <span><b>Offense Date : </b> <?= $challanInfo["Date"] ?></span> <br>
              <span><b>Payment Status : </b> <?= $challanInfo["Status"] ?></span> <br>
              <p></p>
            </div>
          </div>
        <?php
        endwhile;
      else :
        ?>
        <div class="w3-row-padding w3-padding-large">
          <h4><b>No Challan Yet</b></h4>
        </div>
      <?php
      endif;
      ?>
    </div>
    <?php
    $calcPending = "SELECT COUNT('Status') AS `PENDING` FROM `offense_record` WHERE `vehicle_id` = '{$userInfo['owner_of']}' AND `Status` = 'Pending'";
    $calcPaid = "SELECT COUNT('Status') AS `PAID` FROM `offense_record` WHERE `vehicle_id` = '{$userInfo['owner_of']}' AND `Status` = 'Paid'";
    $pendingRes = mysqli_fetch_assoc(mysqli_query($conn, $calcPending))["PENDING"];
    $paidRes = mysqli_fetch_assoc(mysqli_query($conn, $calcPaid))["PAID"];
    $pendingPer = $paidPer = 0;
    if (!($pendingRes == 0 && $paidRes == 0)) {
      $pendingPer = floor(($pendingRes / ($pendingRes + $paidRes)) * 100);
      $paidPer = floor(($paidRes / ($pendingRes + $paidRes)) * 100);
    }
    ?>
    
    <div class="w3-row-padding w3-padding-large">
      <h4><b>Payments</b></h4>
      <p>Paid Payments</p>
      <div class="w3-grey">
        <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:<?= $paidPer . '%'; ?>"><?= $paidPer . '%'; ?></div>
      </div>
      <p>Pending Payments</p>
      <div class="w3-grey">
        <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:<?= $pendingPer . '%'; ?>"><?= $pendingPer . '%'; ?></div>
      </div>
    </div>

    <div class="w3-row-padding w3-padding-16" id="about">
    <div class="w3-col m6">
      <img src="images/trafficSings.jpg" alt="Me" style="width:100%">
    </div>
    <div class="w3-col m6">
      <img src="images/roadSings.jpg" alt="Me" style="width:100%">
    </div>
  </div>

    <div class="w3-container w3-padding-large" style="margin-bottom:32px" id="about">
      <h4><b>About Us</b></h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia consequuntur adipisci vel! Voluptas eos labore delectus repellendus tenetur, cupiditate nam velit consequatur modi beatae a minima explicabo repellat ullam adipisci optio mollitia exercitationem.</p>
      <hr>

      <!-- Contact Section -->
      <div class="w3-container w3-padding-large w3-grey" id="contact">
        <h4><b>Contact Us</b></h4>
        <div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -16px">
          <div class="w3-third w3-dark-grey">
            <p><i class="fa fa-envelope w3-xxlarge w3-text-light-grey"></i></p>
            <p>hamrotraffic@gmail.com</p>
          </div>
          <div class="w3-third w3-teal">
            <p><i class="fa fa-map-marker w3-xxlarge w3-text-light-grey"></i></p>
            <p>Naxal, Herald College Kathmandu</p>
          </div>
          <div class="w3-third w3-dark-grey">
            <p><i class="fa fa-phone w3-xxlarge w3-text-light-grey"></i></p>
            <p>1234567890</p>
          </div>
        </div>
        <hr class="w3-opacity">
        <form action="" target="_blank" autocomplete="off">
          <div class="w3-section">
            <label>Name</label>
            <input class="w3-input w3-border" type="text" name="Name" required>
          </div>
          <div class="w3-section">
            <label>Email</label>
            <input class="w3-input w3-border" type="text" name="Email" required>
          </div>
          <div class="w3-section">
            <label>Message</label>
            <input class="w3-input w3-border" type="text" name="Message" required>
          </div>
          <button type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-paper-plane w3-margin-right"></i>Send Message</button>
        </form>
      </div>

      <!-- Footer -->
      <footer class="w3-container w3-padding-32 w3-dark-grey row">
        <!-- <div class="row"> -->
        <div class="column">
          <h3>FOOTER</h3>
          <p>
          We save time for both of the User and administration.
          Offender can be penalized and notice online and If same person is user,
          than they can submit the fine paid proof from Home
          Usually what happens is, Chalan is applied on the spot, 
          but this problem has been minimized by us.
          </p>
        </div>

        <div class="column">
          <h3>Mini Map</h3>
          <div id="map" style="height: 85%; border-radius: 5px;"></div>
        </div>

        <!-- </div> -->
      </footer>
      
      <!-- End page content -->
    </div>
    <div class="w3-black w3-center w3-padding-24">Developed by <a href="https://heraldcollege.edu.np/" target="_blank" class="w3-hover-opacity">Herald Students</a></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places"></script>
    <script>
      initMap();

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {
            lat: 27.7172,
            lng: 85.3240
          },
          zoom: 10
        });

        var trafficLayer = new google.maps.TrafficLayer();
        trafficLayer.setMap(map);

        var input = document.getElementById('search');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        var searchButton = document.getElementById('search-button');
        searchButton.addEventListener('click', function() {
          var place = autocomplete.getPlace();
          if (place.geometry) {
            map.setCenter(place.geometry.location);
            map.setZoom(15);
          } else {
            alert('Location not found');
          }
        });
      }
    </script>
    <script>
      // Script to open and close sidebar

      function logout(){
          
        window.location.href =  "http://localhost:3000" ;
      }
      function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
      }

      function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
      }
    </script>

</body>

</html>