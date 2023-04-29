<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("assets/head.php"); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

    <link rel="stylesheet" href="assets/css/Trafficpolis.css">
    <title>Vehicles</title>
</head>

<body>
    <div class="container">
        <?php include("assets/nav.php"); ?>
        <!-- main -->
        <div class="main">

            <?php include("assets/top.php"); ?>
            <!-- Bootstrap CSS -->
            <!-- Button trigger modal -->

            <!-- Add Vehicle -->
            <div class="modal fade" id="vehicleAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Vehicles</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="" id="addVehicle">
                            <div class="modal-body">

                                <div id="errorMessage" class="alert alert-warning d-none"></div>

                                <div class="mb-3">
                                    <label for="">Vehicle No</label>
                                    <input type="text" name="vehicleNo" class="form-control" />
                                </div>

                                <div class="mb-3">
                                    <label for="">License Plate No</label>
                                    <input type="text" name="License_Plate_No" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Owner Name</label>
                                    <select class="form-control putOwnerNames" name="Owner_Name">

                                    </select>
                                </div>
                                <div class="dropdown mb-3">
                                    <label for="">Vehicle Type</label>
                                    <select class="form-control" name="Vehicle_Type">
                                        <option value="">Select Vehicle</option>
                                        <option value="Two-Wheelers">Two-Wheelers</option>
                                        <option value="Three-Wheelers">Three-Wheelers</option>
                                        <option value="Four-Wheelers">Four-Wheelers</option>
                                        <option value="Six-Wheelers">Six-Wheelers</option>
                                        <option value="Eight-Wheelers">Eight-Wheelers</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Manufacturer</label>
                                    <input type="text" name="Manufacturer" class="form-control" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="saveVehicle">Save Vehicle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Edit Vehicle Modal -->
            <div class="modal fade" id="vehicleEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Vehicles</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="updateVehicle">
                            <div class="modal-body">

                                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                                <input type="hidden" name="police_id" id="police_id">
                                <div class="mb-3">
                                    <label for="">Vehicle No</label>
                                    <input type="text" name="vehicleNum" class="form-control editVehicleNo" />
                                </div>
                                <div class="mb-3">
                                    <label for="" class="editOwnerName">Select Owner Name</label>
                                    <select class="form-control putOwnerNames" name="Owner_Name">

                                    </select>
                                </div>

                                <!-- <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle dropDownTitle editOwnerName" role="button" data-bs-toggle="dropdown" aria-expanded="false" value="0">
                                        Owner Name
                                    </a>
                                    <ul class="dropdown-menu putOwnerNames">
                                    </ul>
                                </div> -->
                                <div class="mb-3">
                                    <label for="">Liscence Plate no</label>
                                    <input type="text" name="liscenceNo" class="form-control editLicensePlateNo" />
                                </div>
                                <div class="dropdown mb-3">
                                    <label for="thisVehicleType" class="editVehicleType">Vehicle Type</label>
                                    <select class="form-control" name="Vehicle_Type" id="thisVehicleType">
                                        <option value="">Select Vehicle</option>
                                        <option value="Two-Wheelers">Two-Wheelers</option>
                                        <option value="Three-Wheelers">Three-Wheelers</option>
                                        <option value="Four-Wheelers">Four-Wheelers</option>
                                        <option value="Six-Wheelers">Six-Wheelers</option>
                                        <option value="Eight-Wheelers">Eight-Wheelers</option>
                                    </select>
                                </div>
                                <br>
                                <div class="mb-3">
                                    <label for="">Manufacturer</label>
                                    <input type="text" name="manufacturer" class="form-control editManufacturer" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update Vehicles</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Vehicle Information

                                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#vehicleAddModal">
                                        Add Vehicles
                                    </button>
                                </h4>
                            </div>
                            <div class="card-body">

                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Vehicle<br>No</th>
                                            <th>License<br>Plate No</th>
                                            <th>Owner <br>Name</th>
                                            <th>Vehicle<br>Type</th>
                                            <th>Manufacturer</th>
                                            <!-- <th>Location</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once("../asstes/dbConn.php");

                                        $query = "SELECT * FROM vehicle_info";
                                        $query_run = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $vehicle) {
                                        ?>
                                                <tr>
                                                    <td><?= $vehicle['Id'] ?></td>
                                                    <td><?= $vehicle['vec_num'] ?></td>
                                                    <td><?= $vehicle['License_Plate_No'] ?></td>
                                                    <td><?= $vehicle['Owner_Name'] ?></td>
                                                    <td><?= $vehicle['Vehicle_Type'] ?></td>
                                                    <td><?= $vehicle['Manufacturer'] ?></td>

                                                    <td>
                                                        <button type="button" value="<?= $vehicle['Id'] ?>" class="editVehicleBtn btn btn-success btn-sm">Edit</button>
                                                        <button type="button" value="<?= $vehicle['Id'] ?>" class="deleteVehicleBtn btn btn-danger btn-sm">Delete</button>
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

            <?php include("assets/script.php"); ?>
            <!-- </body>
    </html> -->
            <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
            <script>
                // MenuToggle
                let toggle = document.querySelector('.toggle');
                let navigation = document.querySelector('.navigation');
                let main = document.querySelector('.main');

                // toggle.onclick = function() {
                //     navigation.classList.toggle('active');
                // }
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
                    $.post("vehicleFunction/code1.php", {
                        'getOwnerName': true,
                    }, function(response) {
                        $('.putOwnerNames').empty().append(response);
                    });

                    // Add Vehicle
                    $(document).on('submit', '#addVehicle', function(e) {
                        e.preventDefault();

                        var formData = new FormData(this);
                        formData.append("saveVehicle", true);
                        formData.append("owner_namee", $('#addVehicle .putOwnerNames').find(":selected").html());
                        $.ajax({
                            type: "POST",
                            url: "vehicleFunction/code1.php",
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
                                    $('#vehicleAddModal').modal('hide');
                                    $('body').removeClass('modal-open');
                                    $('.modal-backdrop').remove();
                                    $('#addVehicle')[0].reset();
                                    $('#myTable').load(location.href + " #myTable");

                                } else if (res.status == 500) {
                                    alert(res.message);
                                }
                            }
                        });

                    });

                    // Edit Vehicle
                    $(document).on('click', '.editVehicleBtn', function() {

                        var vehicleId = $(this).val();

                        localStorage.setItem('tmpVehicleID', vehicleId);

                        $.ajax({
                            type: "GET",
                            url: "vehicleFunction/code1.php?vehicleIdd=" + vehicleId,
                            success: function(response) {
                                var res = jQuery.parseJSON(response);
                                if (res.status == 404) {
                                    alert(res.message);
                                } else if (res.status == 200) {
                                    $('.editVehicleNo').val(res.data.vec_num);
                                    $('.putOwnerNames option:contains("' + res.data.Owner_Name + '")').prop('selected', true);
                                    $('#thisVehicleType option:contains("' + res.data.Vehicle_Type + '")').prop('selected', true);
                                    $('.editManufacturer').val(res.data.Manufacturer);
                                    $('.editLicensePlateNo').val(res.data.License_Plate_No);

                                    $('#vehicleEditModal').modal('show');
                                }

                            }
                        });

                    });

                    // Delete Vehicle
                    $(document).on('click', '.deleteVehicleBtn', function(e) {
                        e.preventDefault();
                        var vehicleId = $(this).val();

                        if (confirm('Are you sure you want to delete this data?')) {
                            $.ajax({
                                type: "POST",
                                url: "vehicleFunction/code1.php",
                                data: {
                                    'deleteVehicle': true,
                                    'vehicleId': vehicleId
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

                    // Update Vehicle
                    $(document).on('submit', '#updateVehicle', function(e) {
                        e.preventDefault();
                        var formData = new FormData(this);
                        formData.append("updateVehicle", true);
                        formData.append("id", localStorage.getItem('tmpVehicleID'));
                        formData.append("owner_namee", $('#updateVehicle .putOwnerNames').find(":selected").html());
                        localStorage.clear();

                        $.ajax({
                            type: "POST",
                            url: "vehicleFunction/code1.php",
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

                                    $('#vehicleEditModal').modal('hide');
                                    $('#updateVehicle')[0].reset();

                                    $('#myTable').load(location.href + " #myTable");

                                } else if (res.status == 500) {
                                    alert(res.message);
                                }
                            }
                        });

                    });


                });
            </script>
</body>

</html>