<?php
include "connect.php";
if(isset($_GET['delete_id'])){
    $id=$_GET['delete_id'];

    $sql="delete from `user` where id=$id";
    $result = mysqli_query($conn,$sql);
    if($result){
        // echo "Deleted successfully";
        header('location:display.php');
    }else{
        die(mysqli_error($conn));   
    }
}

?>