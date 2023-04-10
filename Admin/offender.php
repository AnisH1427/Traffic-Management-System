<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("assets/head.php"); ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

    <link rel="stylesheet" href="assets/css/offender.css">

    <title>Traffic</title>
</head>

<body>
    <div class="container">
        <?php include("assets/nav.php"); ?>
        <!-- main -->
        <!-- Main div start -->
        <div class="main">
            <div class="topbar">
                <div class="toogle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <!-- Search  -->
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
                <div class="profile" onclick="MenuToggle();">
                    <img src="../images/profile.png" alt="">
                </div>
                <div class="menu">
                    <ul>
                        <li><img src=""><a href="#">My profile</a></li>
                        <!-- <li><img src=""><a href="#">Edit profile</a></li> -->
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
            <!-- Bootstrap CSS -->
            <!-- Button trigger modal -->

            <!-- <Add Offender -->
            <div class="modal fade" id="offenderAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Challan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="saveOffender" autocomplete="off">
                            <div class="modal-body">

                                <div id="errorMessage" class="alert alert-warning d-none"></div>

                                <div class="mb-3">
                                    <label for="">Offender Name</label>
                                    <input type="text" name="name" class="form-control" />
                                </div>

                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle dropDownTitle" role="button" data-bs-toggle="dropdown" aria-expanded="false" value="0">
                                        Offense Type
                                    </a>
                                    <ul class="dropdown-menu putFromDatabase">
                                    </ul>
                                </div>
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle dropDownPoliceTitle" role="button" data-bs-toggle="dropdown" aria-expanded="false" value="0">
                                        Police Name
                                    </a>
                                    <ul class="dropdown-menu putPoliceFromDatabase">
                                    </ul>
                                </div>
                                <div class="mb-3">
                                    <label for="">Date</label>
                                    <input type="date" name="date" class="form-control" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Challan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit offender Modal -->
            <div class="modal fade" id="offenderEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit offender</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="updateOffender" value="0">
                            <div class="modal-body">

                                <div id="errorMessage" class="alert alert-warning d-none"></div>

                                <div class="mb-3">
                                    <label for="">Offender Name</label>
                                    <input type="text" id="OffenderName" name="name" class="form-control" />
                                </div>

                                <div class="dropdown">
                                    <a id="OffenseType" class="btn btn-secondary dropdown-toggle dropDownTitle" role="button" data-bs-toggle="dropdown" aria-expanded="false" value="0">
                                        Offense Type
                                    </a>
                                    <ul class="dropdown-menu putFromDatabase">
                                    </ul>
                                </div>
                                <div class="dropdown">
                                    <a id="PoliceName" class="btn btn-secondary dropdown-toggle dropDownPoliceTitle" role="button" data-bs-toggle="dropdown" aria-expanded="false" value="0">
                                        Police Name
                                    </a>
                                    <ul class="dropdown-menu putPoliceFromDatabase">
                                    </ul>
                                </div>
                                <div class="mb-3">
                                    <label for="">Date</label>
                                    <input type="date" name="date" class="form-control" id="Date" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update Offender</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- View Offender Modal -->
            <div class="modal fade" id="offenderViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">View Police</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="">Offender Name</label>
                                <p id="view_name" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="">Offense </label>
                                <p id="view_type" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="">Location</label>
                                <p id="view_location" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="">Police Name</label>
                                <p id="view_policename" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="">Date</label>
                                <p id="view_date" class="form-control"></p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Manage Offender

                                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" id="showAddForm">
                                        Add Challan
                                    </button>
                                </h4>
                            </div>
                            <div class="card-body">

                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Offender Name</th>
                                            <th>Offense Name</th>
                                            <th>Location</th>
                                            <th>Police Name</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once("../Asstes/dbConn.php");
                                        // Fetch the offender data from the offender table 
                                        $query = "SELECT * FROM offense_record";
                                        $query_run = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $offense_record) {
                                                $fetchOffenseName = "SELECT `name` FROM `offense_type` WHERE `id` = '{$offense_record['Offense_Type_Id']}'";
                                                $resFetchOffenseName = mysqli_fetch_assoc(mysqli_query($conn, $fetchOffenseName));

                                                $fetchPolice = "SELECT * FROM `police` WHERE `id` = '{$offense_record['Police_Id']}'";
                                                $resFetchPolice = mysqli_fetch_assoc(mysqli_query($conn, $fetchPolice));
                                        ?>
                                                <tr>
                                                    <td><?= $offense_record['Offender_Name']  ?></td>
                                                    <td><?= $resFetchOffenseName['name'] ?></td>
                                                    <td><?= $resFetchPolice['Location_Name'] ?></td>
                                                    <td><?= $resFetchPolice['Name'] ?></td>
                                                    <td><?= $offense_record['Date'] ?></td>
                                                    <td>
                                                        <!-- <button type="button" value=" -->
                                                        <?php
                                                        // $offense_record['Id']
                                                        ?>
                                                        <!-- " class="viewOffenseBtn btn btn-info btn-sm">View</button> -->
                                                        <button type="button" value="<?= $offense_record['Id'] ?>" class="editOffenseBtn btn btn-success btn-sm">Edit</button>
                                                        <button type="button" value="<?= $offense_record['Id'] ?>" class="deleteOffenseBtn btn btn-danger btn-sm">Delete</button>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- </body>

</html> -->
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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                $(document).ready(function() {
                    // Start_Later
                    // Show Add Form
                    $("#showAddForm").click(function() {
                        $('#offenderAddModal').modal('show');
                    });
                    // Retrive Offense Type From DB
                    $.post("offenderFunction/code1.php", {
                        "getOffenseType": true,
                    }, function(response) {
                        $(".putFromDatabase").empty().append(response);
                    });

                    // Retrive Police Name From DB
                    $.post("offenderFunction/code1.php", {
                        "getPoliceName": true,
                    }, function(response) {
                        $(".putPoliceFromDatabase").empty().append(response);
                    });

                    $(".putFromDatabase").on("click", "li", function(e) {
                        $(".dropDownTitle").html($(this).children("a").html());
                        $(".dropDownTitle").attr("value", $(this).val());
                    });

                    $(".putPoliceFromDatabase").on("click", "li", function(e) {
                        $(".dropDownPoliceTitle").html($(this).children("a").html());
                        $(".dropDownPoliceTitle").attr("value", $(this).val());
                    });

                    // End_Later

                    // Save the offender Information
                    $(document).on('submit', '#saveOffender', function(e) {
                        e.preventDefault();

                        var formData = new FormData(this);
                        formData.append("offense_type", $(".dropDownTitle").attr("value"));
                        formData.append("police_id", $(".dropDownPoliceTitle").attr("value"));
                        formData.append("save_offender", true);

                        $.ajax({
                            type: "POST",
                            url: "offenderFunction/code1.php",
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                var res = jQuery.parseJSON(response);
                                if (res.status == 422) {
                                    $('#errorMessage').removeClass('d-none');
                                    $('#errorMessage').text(res.message);
                                } else if (res.status == 200) {
                                    $('#errorMessage').addClass('d-none');
                                    alertify.set('notifier', 'poition', 'top-right');
                                    alertify.success(res.message);
                                    $('#offenderAddModal').modal('hide');
                                    $('body').removeClass('modal-open');
                                    // $('.modal-backdrop').remove();
                                    $('#saveOffender')[0].reset();


                                    $('#myTable').load(location.href + " #myTable");

                                } else if (res.status == 500) {
                                    alert(res.message);
                                }
                                $('#offenderAddModal').modal('hide');
                                $('.modal-backdrop')
                                    .find("input,textarea,select")
                                    .val('')
                                    .end()
                                    .find("input[type=checkbox], input[type=radio]")
                                    .prop("checked", "")
                                    .end();
                                $(".dropDownTitle").html("Offense Type");
                                $(".dropDownPoliceTitle").html("Police Name");

                            }
                        });

                    });

                    $(document).on('click', '.editOffenseBtn', function() {

                        var offender_id = $(this).val();

                        $.ajax({
                            type: "GET",
                            url: "offenderFunction/code1.php?offender_id=" + offender_id,
                            success: function(response) {
                                var res = jQuery.parseJSON(response);
                                if (res.status == 404) {

                                    alert(res.message);
                                } else if (res.status == 200) {
                                    console.log(res);
                                    $('#updateOffender').attr("value", res.data.Id);
                                    $('#OffenderName').val(res.data.Offender_Name);
                                    $('#OffenseType').html(res.data.offenseType);
                                    $('#OffenseType').attr("value", res.data.Offense_Type_Id);
                                    $('#PoliceName').html(res.data.PoliceName);
                                    $('#PoliceName').attr("value", res.data.Police_Id);
                                    $('#Date').val(res.data.Date);

                                    $('#offenderEditModal').modal('show');
                                }

                            }
                        });

                    });

                    $(document).on('submit', '#updateOffender', function(e) {
                        e.preventDefault();

                        var formData = new FormData(this);
                        formData.append("update_offender", true);
                        formData.append("offense_id", $('#updateOffender').attr("value"));
                        formData.append("offense_type", $("#OffenseType").attr("value"));
                        formData.append("police_id", $("#PoliceName").attr("value"));

                        $.ajax({
                            type: "POST",
                            url: "offenderFunction/code1.php",
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                var res = jQuery.parseJSON(response);
                                if (res.status == 422) {
                                    $('#errorMessageUpdate').removeClass('d-none');
                                    $('#errorMessageUpdate').text(res.message);

                                } else if (res.status == 200) {

                                    $('#errorMessageUpdate').addClass('d-none');

                                    alertify.set('notifier', 'position', 'top-right');
                                    alertify.success(res.message);

                                    // $('#offenderAddModal').modal('hide');

                                    $('#offenderEditModal').modal('hide');

                                    $('body').removeClass('modal-open');
                                    $('.modal-backdrop').remove();

                                    $('#updateOffender')[0].reset();

                                    $('#myTable').load(location.href + " #myTable");

                                } else if (res.status == 500) {
                                    alert(res.message);
                                }
                                $('#offenderEditModal').modal('hide');
                                $('.modal-backdrop')
                                    .find("input,textarea,select")
                                    .val('')
                                    .end()
                                    .find("input[type=checkbox], input[type=radio]")
                                    .prop("checked", "")
                                    .end();
                            }
                        });

                    });

                    $(document).on('click', '.viewOffenseBtn', function() {
                        var offender_id = $(this).val();
                        $.ajax({
                            type: "GET",
                            url: "offenderFunction/code1.php?offender_id=" + offender_id,
                            success: function(response) {
                                console.log(response);

                                var res = jQuery.parseJSON(response);
                                console.log(res.data)
                                if (res.status == 404) {

                                    alert(res.message);
                                } else if (res.status == 200) {

                                    $('#view_name').text(res.data.Offender_Name);
                                    $('#view_type').text(res.data.Offense_Type_Id);
                                    $('#view_location').text(res.data.Police_Id);
                                    $('#view_policename').text(res.data.Police_Id);
                                    $('#view_date').text(res.data.Date);

                                    $('#offenderViewModal').modal('show');
                                }
                            }
                        });
                    });

                    $(document).on('click', '.deleteOffenseBtn', function(e) {
                        e.preventDefault();

                        if (confirm('Are you sure you want to delete this data?')) {
                            var police_id = $(this).val();

                            $.ajax({
                                type: "POST",
                                url: "offenderFunction/code1.php",
                                data: {
                                    'delete_offender': true,
                                    'offender_id': police_id
                                },
                                success: function(response) {

                                    var res = jQuery.parseJSON(response);
                                    if (res.status == 500) {

                                        alert(res.message);
                                    } else {
                                        alertify.set('notifier', 'position', 'top-right');
                                        alertify.success(res.message);

                                        $('#myTable').load(location.href + " #myTable");
                                    }
                                }
                            });
                        }
                    });
                });
            </script>
</body>

</html>