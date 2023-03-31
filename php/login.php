<?php
$conn = mysqli_connect('localhost', 'root', '', 'tms');
extract($_POST);

$sql = "SELECT `user_id` FROM `user` WHERE `Name` = '{$Username}' AND `user_password` = '{$Password}' ";
$res = mysqli_query($conn, $sql);
$response = [];
if(mysqli_num_rows($res) != 0):
    // Query Execution Success
    $got = mysqli_fetch_assoc($res);
    $response[] = "Success";
    $_SESSION["userID"] = $got['user_id'];
    header("Location: ../Dashboard.html");
else:
    // Query Execution Error
    $response[] = "Failed";
    echo json_encode($response);
endif;