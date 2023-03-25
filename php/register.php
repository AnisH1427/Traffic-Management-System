<?php
// $conn = mysqli_connect('127.0.0.1:3307', 'root', '', 'tms');
extract($_POST);

$sql = "INSERT INTO `user`(`Name`,`MobileNumber`, `Address`, `Gender`, `Email`, `Password`) VALUES ('{$name}','{$mobile}','{$address}','{$gender}','{$email}','{$password}')";
$res = mysqli_query($conn, $sql);
$response = [];
if($res):
    // Query Execution Success
    $response[] = "Success";
    header("Location: ../login.html");
else:
    // Query Execution Error
    $response[] = "Failed";
endif;
echo json_encode($response);

