<?php
include("../../Asstes/dbConn.php");
$response[0] = "Failed";
if (isset($_POST["getChallenNo"])) :
    $response[0] = "Success";
    $sql = "SELECT `offense_Id` FROM `offense_record` WHERE `vehicle_id` = '{$_POST['id']}'";
    $res = (mysqli_query($conn, $sql));
    $html = '';
    while ($got = mysqli_fetch_assoc($res)) :
        $html .= '<a href="test2.php?id=' . $got["offense_Id"] . '">' . $got["offense_Id"] . '</a>';
    endwhile;
    $response[1] = $html;

elseif (isset($_POST["sendFile"])) :

    /* Getting file name */
    $filename = $_FILES['file']['name'];

    /* Location */
    $location = '../../uploads/' . $_FILES["file"]['name'];

    /* Extension */
    $extension = pathinfo($location, PATHINFO_EXTENSION);
    $extension = strtolower($extension);

    /* Allowed file extensions */
    $allowed_extensions = array("jpg", "jpeg", "png", "pdf");

    $response = array();
    $status = 0;

    /* Check file extension */
    if (in_array(strtolower($extension), $allowed_extensions)) {

        /* Upload file */
        if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
            $status = 1;
            $sql = "UPDATE `offense_record` SET `Status`='Paid' WHERE `offense_Id` = '{$_POST['challenId']}'";
            $response['progress'] = "Failed";
            if (mysqli_query($conn, $sql)) {
                $response['progress'] = "Success";
            }
        } else {
            $err = 1;
        }
    }

    $response['status'] = $status;

endif;

echo json_encode($response);
