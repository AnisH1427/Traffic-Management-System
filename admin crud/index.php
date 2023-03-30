<?php
    session_start();
    require 'connect.php';
?>  
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>TMS CRUD</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Polis Details
                            <a href="student-create.php" class="btn btn-primary float-end">Add Polis</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>MobileNumber</th>
                                    <th>Email</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM `police`";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $police)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $police['Id']; ?></td>
                                                <td><?= $police['Name']; ?></td>
                                                <td><?= $police['MobileNumber']; ?></td>
                                                <td><?= $police['Email']; ?></td>
                                                <td><?= $police['Location_Id']; ?></td>
                                                <td>
                                                    <!-- <a href="#?id=<?= $police['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="#?id=<?= $police['id']; ?>" class="btn btn-success btn-sm">Edit</a> -->
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <!-- <button type="submit" name="delete_student" value="<?=$police['id'];?>" class="btn btn-danger btn-sm">Delete</button> -->
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>