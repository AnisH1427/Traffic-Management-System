<?php
session_start(); // Start the session
$conn = mysqli_connect('localhost', 'root', '', 'tms');

// Use mysqli_real_escape_string to sanitize user input
$username = mysqli_real_escape_string($conn, $_POST['Username']);
$password = mysqli_real_escape_string($conn, $_POST['Password']);
$user_type = mysqli_real_escape_string($conn, $_POST['user_type']);

$sql = "SELECT `Id` FROM `{$user_type}` WHERE `Email` = '{$username}' OR `Name` = '{$username}' AND `Password` = '{$password}'";
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {
    // Query Execution Success
    $got = mysqli_fetch_assoc($res);
    session_start();
    $_SESSION["userID"] = $got['Id'];
    if ($user_type === 'user')
        header("Location: ../User/test.php");
    elseif ($user_type === 'admin')
        header("Location: ../Admin/adminDashboard.php");
    // exit();
} else {
    // Query Execution Error
    echo "Login Failed. Please check your credentials.";
    exit();
}
