<?php

require 'connect.php';

if(isset($_POST['save_offender']))
{
    $Offender_Name = mysqli_real_escape_string($conn, $_POST['name']);
    $Offense_type_Id = mysqli_real_escape_string($conn, $_POST['offense_type']);
    $Police_Id = mysqli_real_escape_string($conn, $_POST['police_id']);
    $Date = mysqli_real_escape_string($conn, $_POST['date']);

    if($Offender_Name == NULL || $Offense_type_Id == NULL || $Police_Id == NULL || $Date == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO `offense_record` (`Offender_Name`,`Offense_type_Id`,`Police_Id`,`Date`) VALUES ('$Offender_Name','$Offense_type_Id','$Police_Id','$Date')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Offender Created Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Offender Not Created'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_POST['update_offender']))
{
    $Offender_Name = mysqli_real_escape_string($conn, $_POST['name']);
    $Offense_type_Id = mysqli_real_escape_string($conn, $_POST['offense_type']);
    $Police_Id = mysqli_real_escape_string($conn, $_POST['police_id']);
    $Date = mysqli_real_escape_string($conn, $_POST['date']);
    $id = mysqli_real_escape_string($conn, $_POST['offense_id']);

    // $offence_record_id = mysqli_real_escape_string($conn, $_POST['offence_record_id']);

    // $Offender_Name = mysqli_real_escape_string($conn, $_POST['name']);
    // $Offense_type_Id = mysqli_real_escape_string($conn, $_POST['type']);
    // $Police_Id = mysqli_real_escape_string($conn, $_POST['location']);
    // $Police_Id = mysqli_real_escape_string($conn, $_POST['policename']);
    // $Date = mysqli_real_escape_string($conn, $_POST['date']);

    if($Offender_Name == NULL || $Offense_type_Id == NULL || $Police_Id == NULL || $Date == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE `offense_record` SET `Offender_Name`='{$Offender_Name}', `Offense_type_Id`='{$Offense_type_Id}', `Date`='{$Date}' WHERE `id`='{$id}'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Offender Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Offender Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_GET['offender_id']))
{
    $offence_record_id = mysqli_real_escape_string($conn, $_GET['offender_id']);

    $query = "SELECT * FROM `offense_record` WHERE `id` = '$offence_record_id'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $offence_record = mysqli_fetch_assoc($query_run);

        $fetchPolice = "SELECT `Name` FROM `police` WHERE `id` = '{$offence_record["Police_Id"]}'";
        $resFetchPolice = mysqli_fetch_assoc(mysqli_query($conn, $fetchPolice));
        
        $fetchOffense = "SELECT `Name` FROM `offense_type` WHERE `id` = '{$offence_record["Offense_Type_Id"]}'";
        $resFetchOffense = mysqli_fetch_assoc(mysqli_query($conn, $fetchOffense));

        $offence_record["policeName"] = $resFetchPolice["Name"];
        $offence_record["offenseType"] = $resFetchOffense["Name"];

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
}

if(isset($_POST['delete_offender']))
{
    $offence_record_id = mysqli_real_escape_string($conn, $_POST['offender_id']);

    $query = "DELETE FROM `offense_record` WHERE `id`='{$offence_record_id}'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Offender Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Offender Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_POST["getOffenseType"])):
    $sql = "SELECT * FROM `offense_type`";
    $res = mysqli_query($conn, $sql);
    if($res):
        // Query Execution Success
        $html = '<li value="0"><a class="dropdown-item">Offense Type</a></li>';
        while($got = mysqli_fetch_assoc($res)):
            $id = $got["Id"];
            $name = $got["type_Name"];
            $html .= '<li value="'.$id.'"><a class="dropdown-item">'.$name.'</a></li>' ;
        endwhile;
        echo $html;

    else:
        // Query Execution Error
    endif;

endif;

if(isset($_POST["getPoliceName"])):
    $sql = "SELECT * FROM `police`";
    $res = mysqli_query($conn, $sql);
    if($res):
        // Query Execution Success
        $html = '<li value="0"><a class="dropdown-item">Police Name</a></li>';
        while($got = mysqli_fetch_assoc($res)):
            $id = $got["Id"];
            $name = $got["Name"];
            $html .= '<li value="'.$id.'"><a class="dropdown-item">'.$name.'</a></li>' ;
        endwhile;
        echo $html; 

    else:
        // Query Execution Error
    endif;

endif;

?>