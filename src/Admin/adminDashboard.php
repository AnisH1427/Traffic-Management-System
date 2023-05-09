<?php
include('../Asstes/dbConn.php');
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