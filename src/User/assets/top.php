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