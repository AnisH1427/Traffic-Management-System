<?php
session_start(); // Start the session
$conn = mysqli_connect('localhost', 'root', '', 'tms');

// Use mysqli_real_escape_string to sanitize user input
$username = mysqli_real_escape_string($conn, $_POST['Username']);
$password = mysqli_real_escape_string($conn, $_POST['Password']);
$user_type = mysqli_real_escape_string($conn, $_POST['user_type']);

$sql = "SELECT `Id` FROM `{$user_type}` WHERE (`Email` = '{$username}' OR `Name` = '{$username}') AND `Password` = '{$password}'";
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {
    // Query Execution Success
    $got = mysqli_fetch_assoc($res);
    $_SESSION["userID"] = $got['Id'];

    if ($user_type === 'user') {
        echo "<script>window.location.href = '../User/test.php';</script>";
    } elseif ($user_type === 'admin') {
        echo "<script>window.location.href = '../Admin/adminDashboard.php';</script>";
    }
    exit();
} else {
    // Query Execution Error or Login Failed
    echo "<div id='login-error'>";
    echo "<h2>Login Error</h2>";
    echo "<ul>";
    echo "<li>Invalid username or password.</li>";
    echo "<li>Your account may not have access to the requested page.</li>";
    echo "<li>Please make sure you are entering the correct credentials.</li>";
    echo "</ul>";
    echo "</div>";
}
