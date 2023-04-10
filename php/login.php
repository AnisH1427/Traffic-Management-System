
<!-- 
session_start(); // Start the session
$conn = mysqli_connect('127.0.0.1:3307', 'root', '', 'tms');

// Use mysqli_real_escape_string to sanitize user input
$username = mysqli_real_escape_string($conn, $_POST['Username']);
$password = mysqli_real_escape_string($conn, $_POST['Password']);

$sql = "SELECT `Id` FROM `admin` WHERE `Name` = '{$username}' AND `Password` = '{$password}' ";
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {
    // Query Execution Success
    $got = mysqli_fetch_assoc($res);
    $_SESSION["userID"] = $got['Id'];
    header("Location: ../Admin/AdminDashboard.html");
    exit();
} else {
    // Query Execution Error
    echo "Login Failed. Please check your credentials.";
    exit();
}
 -->


<?php
// enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start(); // Start the session
$conn = mysqli_connect('127.0.0.1:3307', 'root', '', 'tms');

// Use mysqli_real_escape_string to sanitize user input
$username = mysqli_real_escape_string($conn, $_POST['Username']);
$password = mysqli_real_escape_string($conn, $_POST['Password']);
$user_type = mysqli_real_escape_string($conn, $_POST['user_type']);

if ($user_type === 'user') {
    $sql = "SELECT `Id` FROM `user` WHERE `Name` = '{$username}' AND `Password` = '{$password}' ";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        // Query Execution Success
        $got = mysqli_fetch_assoc($res);
        $_SESSION["userID"] = $got['Id'];
        header("Location: ../User/UserDashboard.html");
        exit();
    } else {
        // Query Execution Error
        echo "Login Failed. Please check your credentials.";
        exit();
    }
} elseif ($user_type === 'admin') {
    $sql = "SELECT `Id` FROM `admin` WHERE `Name` = '{$username}' AND `Password` = '{$password}' ";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        // Query Execution Success
        $got = mysqli_fetch_assoc($res);
        $_SESSION["userID"] = $got['Id'];
        header("Location: ../Admin/AdminDashboard.html");
        // header("Location: ../Homepage.html");
        exit();
    } else {
        // Query Execution Error
        echo "Login Failed. Please check your credentials.";
        exit();
    }
} else {
    // Invalid user type
    echo "Invalid user type.";
    exit();
}
?>