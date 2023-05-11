<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("assets/head.php"); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

    <link rel="stylesheet" href="assets/css/Trafficpolis.css">
    <title>Traffic</title>
</head>

<body>
    <div class="container">
        <?php include("assets/nav.php"); ?>
        <!-- main -->
        <div class="main">

            <?php include("assets/top.php"); ?>
            <!-- Bootstrap CSS -->
            <!-- Button trigger modal -->

            <!-- Add Student -->
            <div class="modal fade" id="policeAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Police</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="savePolice">
                            <div class="modal-body">

                                <div id="errorMessage" class="alert alert-warning d-none"></div>

                                <div class="mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">MobileNumber</label>
                                    <input type="text" name="phone" class="form-control" pattern="[0-9]{10}" title="Please enter a valid 10-digit mobile number" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" title="please enter a valid email address" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Location_Name</label>
                                    <input type="text" name="location" class="form-control" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Police</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit Police Modal -->
            <div class="modal fade" id="policeEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Police</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="updatePolice">
                            <div class="modal-body">

                                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                                <input type="hidden" name="police_id" id="police_id">

                                <div class="mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="name" id="Name" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">MobileNumber</label>
                                    <input type="text" name="phone" id="Mobilenumber" class="form-control" pattern="[0-9]{10}" title="Please enter a valid 10-digit mobile number" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Email</label>
                                    <input type="email" name="email" id="Email" class="form-control" title="please enter a valid email address" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Location_Name</label>
                                    <input type="text" name="location" id="LocationName" class="form-control" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update Police</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- View Police Modal -->
            <div class="modal fade" id="policeViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">View Police</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="">Name</label>
                                <p id="view_name" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="">MobileNumber</label>
                                <p id="view_MobileNumber" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <p id="view_Email" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="">Location_Name</label>
                                <p id="view_LocationName" class="form-control"></p>
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
                                <h4>Manage Police

                                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#policeAddModal">
                                        Add Police
                                    </button>
                                </h4>
                            </div>
                            <div class="card-body">

                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>MobileNumber</th>
                                            <th>Email</th>
                                            <th>Location_Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once("../Asstes/dbConn.php");

                                        $query = "SELECT * FROM police";
                                        $query_run = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $police) {
                                        ?>
                                                <tr>
                                                    <td><?= $police['Id'] ?></td>
                                                    <td><?= $police['Name'] ?></td>
                                                    <td><?= $police['MobileNumber'] ?></td>
                                                    <td><?= $police['Email'] ?></td>
                                                    <td><?= $police['Location_Name'] ?></td>
                                                    <td>
                                                        <button type="button" value="<?= $police['Id'] ?>" class="viewPoliceBtn btn btn-info btn-sm">View</button>
                                                        <button type="button" value="<?= $police['Id'] ?>" class="editPoliceBtn btn btn-success btn-sm">Edit</button>
                                                        <button type="button" value="<?= $police['Id'] ?>" class="deletePoliceBtn btn btn-danger btn-sm">Delete</button>
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
                $(document).on('submit', '#savePolice', function(e) {
                    e.preventDefault();

                    var formData = new FormData(this);
                    formData.append("save_police", true);

                    $.ajax({
                        type: "POST",
                        url: "trafficFunction/code1.php",
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
                                $('#policeAddModal').modal('hide');
                                $('body').removeClass('modal-open');
                                $('.modal-backdrop').remove();
                                $('#savePolice')[0].reset();


                                $('#myTable').load(location.href + " #myTable");

                            } else if (res.status == 500) {
                                alert(res.message);
                            }
                        }
                    });

                });

                $(document).on('click', '.editPoliceBtn', function() {

                    var police_id = $(this).val();

                    $.ajax({
                        type: "GET",
                        url: "trafficFunction/code1.php?police_id=" + police_id,
                        success: function(response) {
                            var res = jQuery.parseJSON(response);
                            if (res.status == 404) {

                                alert(res.message);
                            } else if (res.status == 200) {
                                $('#police_id').val(res.data.Id);
                                $('#Name').val(res.data.Name);
                                $('#Mobilenumber').val(res.data.MobileNumber);
                                $('#Email').val(res.data.Email);
                                $('#LocationName').val(res.data.Location_Name);

                                $('#policeEditModal').modal('show');
                            }

                        }
                    });

                });

                $(document).on('submit', '#updatePolice', function(e) {
                    e.preventDefault();

                    var formData = new FormData(this);
                    formData.append("update_police", true);

                    $.ajax({
                        type: "POST",
                        url: "trafficFunction/code1.php",
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

                                $('#policeEditModal').modal('hide');
                                $('#updatePolice')[0].reset();

                                $('#myTable').load(location.href + " #myTable");

                            } else if (res.status == 500) {
                                alert(res.message);
                            }
                        }
                    });

                });

                $(document).on('click', '.viewPoliceBtn', function() {

                    var police_id = $(this).val();
                    $.ajax({
                        type: "GET",
                        url: "trafficFunction/code1.php?police_id=" + police_id,
                        success: function(response) {

                            var res = jQuery.parseJSON(response);
                            console.log(res.data)
                            if (res.status == 404) {

                                alert(res.message);
                            } else if (res.status == 200) {

                                $('#view_name').text(res.data.Name);
                                $('#view_MobileNumber').text(res.data.MobileNumber);
                                $('#view_Email').text(res.data.Email);
                                $('#view_LocationName').text(res.data.Location_Name);

                                $('#policeViewModal').modal('show');
                            }
                        }
                    });
                });

                $(document).on('click', '.deletePoliceBtn', function(e) {
                    e.preventDefault();

                    if (confirm('Are you sure you want to delete this data?')) {
                        var police_id = $(this).val();
                        $.ajax({
                            type: "POST",
                            url: "trafficFunction/code1.php",
                            data: {
                                'delete_police': true,
                                'police_id': police_id
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
            </script>
</body>

</html>