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
            <!-- Top bar Start -->
            <div class="topbar">
                <div class="toogle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <!-- Search  -->
                <!-- <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div> -->

                <div class="profile" onclick="MenuToggle();">
                    <img src="../images/profile.png" alt="">
                </div>
                <div class="menu">
                    <ul>
                        <li><img src=""><a href="#">My profile</a></li>
                        <li><img src=""><a href="#">Edit profile</a></li>
                        <li><img src=""><a href="#">logout</a></li>
                    </ul>
                </div>

                <script>
                    function MenuToggle() {
                        const toggleMenu = document.querySelector('.menu');
                        toggleMenu.classList.toggle('active')
                    }
                </script>
            </div>

            <!-- cards -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">10</div>
                        <div class="cardName">Total Police</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">10</div>
                        <div class="cardName">Total Offender</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">10</div>
                        <div class="cardName">Total Vechiles</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">10</div>
                        <div class="cardName">Total challan</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
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