<?php
include "../../Asstes/dbConn.php";

if(isset($_POST['getOwnerName'])):
    $sql = "SELECT `Name`, `Id` FROM user";
    $result = $conn->query($sql);
    $html = '<option value="0">Select Vehicle\'s Owner</option>';

    // Retrieve the list of user names
    while ($row = $result->fetch_assoc()) {
        $html .= '<option value="' . $row['Id'] . '">' . $row['Name'] . '</option>';
    }
    echo $html;
    return;

elseif(isset($_POST['saveVehicle'])):
    $licensePlateNo = mysqli_real_escape_string($conn, $_POST['License_Plate_No']);
    $ownerId = mysqli_real_escape_string($conn, $_POST['Owner_Name']);
    $ownerName = mysqli_real_escape_string($conn, $_POST['owner_namee']);
    $vehicleType = mysqli_real_escape_string($conn, $_POST['Vehicle_Type']);
    $manufacturer = mysqli_real_escape_string($conn, $_POST['Manufacturer']);
    $vehicleNo = mysqli_real_escape_string($conn, $_POST['vehicleNo']);

    if($vehicleNo == NULL || $licensePlateNo == NULL || $ownerName == NULL || $vehicleType == NULL || $manufacturer == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO `vehicle_info`(`vec_num`, `Owner_Name`, `License_Plate_No`, `Vehicle_Type`, `Manufacturer`) VALUES ('{$vehicleNo}','{$ownerName}','{$licensePlateNo}','{$vehicleType}','{$manufacturer}')";
    $query_run = mysqli_query($conn, $query);

    $updateUserSql = "UPDATE `user` SET `owner_of`= (SELECT MAX(Id) FROM `vehicle_info`) WHERE `Id`='{$ownerId}'";
    $runQuery = mysqli_query($conn, $updateUserSql);

    if($query_run && $runQuery)
    {
        $res = [
            'status' => 200,
            'message' => 'Vehicle Created Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Vehicle Not Created'
        ];
        echo json_encode($res);
        return;
    }

elseif(isset($_POST['deleteVehicle'])):

    $vehicleId = mysqli_real_escape_string($conn, $_POST['vehicleId']);

    $query = "DELETE FROM `vehicle_info` WHERE `Id`='{$vehicleId}'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Vehicle Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Vehicle Not Deleted'
        ];
        echo json_encode($res);
        return;
    }

elseif(isset($_GET["vehicleIdd"])):
    $vehicleId = mysqli_real_escape_string($conn, $_GET['vehicleIdd']);

    $query = "SELECT * FROM `vehicle_info` WHERE `Id` = '$vehicleId'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $offence_record = mysqli_fetch_assoc($query_run);

        $res = [
            'status' => 200,
            'message' => 'Offender Fetch Successfully by id',
            'data' => $offence_record
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Offender Id Not Found'
        ];
        echo json_encode($res);
        return;
    }

elseif(isset($_POST['updateVehicle'])):
    $vehicleNum = mysqli_real_escape_string($conn, $_POST['vehicleNum']);
    $ownerId = mysqli_real_escape_string($conn, $_POST['Owner_Name']);
    $ownerName = mysqli_real_escape_string($conn, $_POST['owner_namee']);
    $liscenceNo = mysqli_real_escape_string($conn, $_POST['liscenceNo']);
    $vehicleType = mysqli_real_escape_string($conn, $_POST['Vehicle_Type']);
    $manufacturer = mysqli_real_escape_string($conn, $_POST['manufacturer']);
    $vehicleId = mysqli_real_escape_string($conn, $_POST['id']);
    $ownerId = mysqli_real_escape_string($conn, $_POST['Owner_Name']);

    if($vehicleNum == NULL || $ownerName == NULL || $liscenceNo == NULL || $vehicleType == NULL || $manufacturer == NULL || $vehicleId == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE `vehicle_info` SET `vec_num`='{$vehicleNum}',`Owner_Name`='{$ownerName}',`License_Plate_No`='{$liscenceNo}',`Vehicle_Type`='{$vehicleType}',`Manufacturer`='{$manufacturer}' WHERE `Id`='{$vehicleId}'";
    $query_run = mysqli_query($conn, $query);

    $updateUserSql = "UPDATE `user` SET `owner_of`= '{$vehicleId}' WHERE `Id`='{$ownerId}'";
    $runQuery = mysqli_query($conn, $updateUserSql);

    if($query_run && $runQuery)
    {
        $res = [
            'status' => 200,
            'message' => 'Vehicle Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Vehicle Not Updated'
        ];
        echo json_encode($res);
        return;
    }
    
endif;

echo json_encode($response);
