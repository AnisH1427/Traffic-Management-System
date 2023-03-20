<?php
$conn = mysqli_connect('localhost', 'root', '', 'tms');
extract($_POST);

$sql = "INSERT INTO `user account`(`user_name`, `user_address`, `user_gender`, `user_email`, `user_password`) VALUES ('{$name}','{$address}','{$gender}','{$email}','{$password}')";
$res = mysqli_query($conn, $sql);
$response = [];
if($res):
    // Query Execution Success
    $response[] = "Success";
    header("Location: ../loginpage.html");
else:
    // Query Execution Error
    $response[] = "Failed";
endif;
echo json_encode($response);

