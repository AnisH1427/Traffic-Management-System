<?php
include "connect.php";
$conn = mysqli_connect('127.0.0.1:3307', 'root', '', 'tms');
extract($_POST);

$sql = "SELECT `Id` FROM `user` WHERE `Name` = '{$Username}' AND `Password` = '{$password}' ";
$res = mysqli_query($conn, $sql);
$response = [];
if(mysqli_num_rows($res) != 0):
    // Query Execution Success
    $got = mysqli_fetch_assoc($res);
    $response[] = "Success";
    $_SESSION["userID"] = $got['user_id'];
    header("Location: ../Home.html");
else:
    // Query Execution Error
    $response[] = "Failed";
    echo "Login Invalid";
    // echo json_encode($response);
endif;

