<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("assets/head.php"); ?>
    <link rel="stylesheet" href="assets/css/userAnalytics.css">
    <title>User | Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
    <div class="container">
        <?php include("assets/nav.php"); ?>
        <div class="main">
            <?php include("assets/top.php"); ?>
            <div class="cardBox">
                <div class="card">
                    <canvas id="myChart"></canvas>
                </div>

            </div>
        </div>
    </div>
    <?php include("assets/script.php"); ?>

    <script>
        const xValues = [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000];

        new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    data: [860, 1140, 1060, 1060, 1070, 1110, 1330, 2210, 7830, 2478],
                    borderColor: "red",
                    fill: false
                }, {
                    data: [1600, 1700, 1700, 1900, 2000, 2700, 4000, 5000, 6000, 7000],
                    borderColor: "green",
                    fill: false
                }, {
                    data: [300, 700, 2000, 5000, 6000, 4000, 2000, 1000, 200, 100],
                    borderColor: "blue",
                    fill: false
                }]
            },
            options: {
                legend: {
                    display: false
                }
            }
        });
    </script>

</body>

</html>