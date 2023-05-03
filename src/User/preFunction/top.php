<?php
include("../Asstes/dbConn.php");
session_start();
if (!isset($_SESSION['userID'])) :
  echo "Session Not Started";
  return 0;
endif;
$userID = $_SESSION["userID"];


$userSql = "SELECT * FROM `user` WHERE `id` = '{$userID}'";
$userRes = mysqli_query($conn, $userSql);
if ($userRes) :
  $userInfo = mysqli_fetch_assoc($userRes);
else :
  echo "Query Execution Error";
  return false;
endif;

$vecSql = "SELECT * FROM `vehicle_info` WHERE `id` = '{$userInfo['owner_of']}'";
  if (mysqli_query($conn, $vecSql)) :
    $vecInfo = mysqli_fetch_assoc(mysqli_query($conn, $vecSql));
  else :
    echo "Query Execution Error";
    return false;
  endif;

  if (is_null($vecInfo)) {
    $vecInfo["Owner_Name"] = "User";
    $vecInfo["vec_num"] = "None";
  }
  
?>