<?php
include "../../Asstes/dbConn.php";

if(isset($_POST['save_police']))
{
    $Name = mysqli_real_escape_string($conn, $_POST['name']);
    $MobileNumber = mysqli_real_escape_string($conn, $_POST['phone']);
    $Email = mysqli_real_escape_string($conn, $_POST['email']);
    $Location_Name = mysqli_real_escape_string($conn, $_POST['location']);

    if($Name == NULL || $MobileNumber == NULL || $Email == NULL || $Location_Name == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO police (Name,MobileNumber,Email,Location_Name) VALUES ('$Name','$MobileNumber','$Email','$Location_Name')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Police Created Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Police Not Created'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_POST['update_police']))
{
    $police_id = mysqli_real_escape_string($conn, $_POST['police_id']);

    $Name = mysqli_real_escape_string($conn, $_POST['name']);
    $MobileNumber = mysqli_real_escape_string($conn, $_POST['phone']);
    $Email = mysqli_real_escape_string($conn, $_POST['email']);
    $Location_Name = mysqli_real_escape_string($conn, $_POST['location']);

    if($Name == NULL || $MobileNumber == NULL || $Email == NULL || $Location_Name == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE police SET Name='$Name', MobileNumber='$MobileNumber', Email='$Email', Location_Name='$Location_Name' 
                WHERE id='$police_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Police Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Police Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_GET['police_id']))
{
    $police_id = mysqli_real_escape_string($conn, $_GET['police_id']);

    $query = "SELECT * FROM police WHERE id='$police_id'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $police = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Police Fetch Successfully by id',
            'data' => $police
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Police Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_police']))
{
    $police_id = mysqli_real_escape_string($conn, $_POST['police_id']);

    $query = "DELETE FROM police WHERE id='$police_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Police Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Police Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

?>