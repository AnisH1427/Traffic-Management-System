<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("assets/head.php"); ?>
    <link rel="stylesheet" href="assets/css/userDashboard.css">
    <title>User | Dashboard</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
    <div class="container">
        <?php include("assets/nav.php"); ?>
        <div class="main">
            <?php include("assets/top.php"); ?>
            <div class="cardBox">
                <div class="card">
                    <!-- <div>
                        <div class="numbers">10</div>
                        <div class="cardName">Total Police</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div> -->
                    <div id="map" style="height: 400px; width: 100%;"></div>
                </div>

            </div>
        </div>
    </div>
    <?php include("assets/script.php"); ?>
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

</body>

</html>