<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="challandetail.css">
    <title>Traffic Dashboard</title>
</head>

<body>
    <div class="container">
        <div class="navigation">
            <div class="logo">
                <img src="../images/HamroTrafficLogo.png" alt="" width="40" height="40">
            </div>
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"></ion-icon></ion-icon></span>
                        <span class="title">Hamro Traffic</span>
                    </a>
                </li>
                <li>
                    <a href="../E-challan/TrafficDashboard.html" class="active">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="man-outline"></ion-icon></span>
                        <span class="title">E-Challan</span>
                    </a>
                </li>
                <li>
                    <a href="../E-challan/challanstatus.php">
                        <span class="icon"><ion-icon name="storefront-outline"></ion-icon></span>
                        <span class="title">Challan Status</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="bar-chart-outline"></ion-icon></span>
                        <span class="title">Challan Report</span>
                    </a>
                </li> -->
                <!-- <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="albums-outline"></ion-icon></span>
                        <span class="title">Challan Log</span>
                    </a>
                </li> -->
                <li>
                    <a href="../Homepage.html">
                        <span class="icon"><ion-icon name="exit-outline"></ion-icon></span>
                        <span class="title">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- main -->
        <div class="main">
            <div class="topbar">
                <div class="toogle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <!-- Search  -->
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search challan here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
                <!-- UserImage -->
                <!-- <div class="user">
                <img src="baby.jpg">
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
            <div class="foorm">
                <header>Challan Details</header>

                <form action="#">
                    <div class="form first">
                        <div class="details personal">
                            <div class="fields">

                                <div class="input-field">
                                    <label>Issued Date</label>
                                    <input type="date" placeholder="Enter issued date" required>
                                </div>

                                <div class="input-field">
                                    <label>Liscense Number</label>
                                    <input type="text" placeholder="Enter Liscense Number" required>
                                </div>
                                <div class="input-field">
                                    <label>Vechile Number</label>
                                    <input type="text" placeholder="Enter Vechile Number" required>
                                </div>
                                <div class="input-field">
                                    <label>Offender Name</label>
                                    <input type="text" placeholder="Enter Vechile Number" required>
                                </div>

                                <div class="input-field">
                                    <label> Offender Mobile Number</label>
                                    <input type="number" placeholder="Enter Offender Mobile Number" required>
                                </div>

                                <div class="input-field">
                                    <label>Gender</label>
                                    <select required>
                                        <option disabled selected>Select gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Others</option>
                                    </select>
                                </div>

                                <div class="input-field">
                                    <label>Location of Violation</label>
                                    <input type="text" placeholder="Enter Location of Violation" required>
                                </div>
                            </div>
                        </div>

                        <div class="details ID">
                            <span class="title">Offences</span>

                            <div class="fields">
                                <div class="input-field">
                                    <label>Section</label>
                                    <input type="text" placeholder="Enter Section" required>
                                </div>

                                <div class="input-field">
                                    <label>Offenses</label>
                                    <input type="number" placeholder="Enter Offenses" required>
                                </div>
                                <div class="input-field">
                                    <label> Fine Amount</label>
                                    <input type="text" placeholder="Enter issued state" required>
                                </div>
                                <div class="input-field">
                                    <label>Expiry Date</label>
                                    <input type="date" placeholder="Enter expiry date" required>
                                </div>
                            </div>

                            <button class="nextBtn">
                                <span class="btnText">Next</span>
                                <i class="uil uil-navigator"></i>
                            </button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </form>
    </div>

    <!--<script src="script.js"></script>-->
    </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
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