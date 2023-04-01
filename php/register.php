<?php
$conn = mysqli_connect('localhost', 'root', '', 'tms');
extract($_POST);

$sql = "INSERT INTO `user`(`Name`, `MobileNumber`, `Address`, `Email`, `Gender`,'Password') VALUES ('{$name}','{$mobileNumber}','{$address}','{$email}','{$gender}','{$password}')";
$res = mysqli_query($conn, $sql);
$response = [];
if($res):
    // Query Execution Success
    $response[] = "Success";
    header("Location: ../Login.html ");
else:
    // Query Execution Error
    $response[] = "Failed";
endif;
echo json_encode($response);