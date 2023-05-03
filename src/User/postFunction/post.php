<?php
include('../../Asstes/dbConn.php');
if (isset($_POST["getPosts"])) :
    $sql = "SELECT * , `user`.`id` as `userIdd` FROM `tblpst` JOIN `user` ON `tblpst`.`pstFrom` = `user`.`id` ORDER BY `tblpst`.`pstId` DESC";
    $res = mysqli_query($conn, $sql);
    if ($res) :
        $html = '';
        while ($got = mysqli_fetch_assoc($res)) :

            $countAgree = "SELECT count(*) as 'agree' FROM `tblextpst` WHERE `extPstAction` = 'Agree' AND `extPstId` = '{$got['pstId']}'";
            $countDisagree = "SELECT count(*) as 'disagree' FROM `tblextpst` WHERE `extPstAction` = 'Disagree' AND `extPstId` = '{$got['pstId']}'";
            $totAgree = mysqli_fetch_assoc(mysqli_query($conn, $countAgree))['agree'];
            $totDisagree = mysqli_fetch_assoc(mysqli_query($conn, $countDisagree))['disagree'];

            $ret = $got;
            $html .= '<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
            <img src="' . $got["pic"] . '" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px" data-pstID="' . $got["pstId"] . '">';

            if ($_POST["id"] == $got["userIdd"])
                $html .= '<span class="w3-right w3-opacity deletePst" style="cursor: pointer"><i class="fa fa-close"></i></span>';

            $html .= '<h4>' . $got["Name"] . '</h4><br>
            <hr class="w3-clear">
            <p>' . $got["pstMsg"] . '</p>
            <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom" id="agree"';

            $checkAgree = "SELECT count(*) as 'check' FROM `tblextpst` WHERE `extPstAction` = 'Agree' AND `extPstUserId` = '{$_POST['id']}' AND `extPstId` = '{$got['pstId']}'";
            $checkRes = mysqli_fetch_assoc(mysqli_query($conn, $checkAgree))["check"];

            if ($checkRes != 0)
                $html .= ' style="color:#009432"';

            $html .= '><i class="fa fa-thumbs-up"></i> Agree (' . $totAgree . ')</button>
                <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom" id="disAgree"';
            
                $checkDisagree = "SELECT count(*) as 'check' FROM `tblextpst` WHERE `extPstAction` = 'Disagree' AND `extPstUserId` = '{$_POST['id']}' AND `extPstId` = '{$got['pstId']}'";
            $checkRes = mysqli_fetch_assoc(mysqli_query($conn, $checkDisagree))["check"];

            if ($checkRes != 0)
                $html .= ' style="color:#ee5253"';

            $html .= '><i class="fa fa-thumbs-down"></i> DisAgree (' . $totDisagree . ')</button>
          </div>';
        endwhile;
        $html .= '<div class="w3-black w3-center w3-padding-24">Developed by <a href="https://heraldcollege.edu.np/" title="W3.CSS" target="_blank" class="w3-hover-opacity">Herald Students</a></div>';
        echo ($html);
    else :
        echo "Failed";
    endif;

elseif (isset($_POST["setPosts"])) :
    $sql = "INSERT INTO `tblpst`(`pstFrom`, `pstMsg`) VALUES ('{$_POST['id']}', '{$_POST['msg']}')";
    $res = mysqli_query($conn, $sql);
    if ($res) :
        echo "Success";
    else :
        echo "Failed";
    endif;

elseif (isset($_POST["deletePosts"])) :
    extract($_POST);
    $sql = "DELETE FROM `tblpst` WHERE `pstId` = '{$pstId}'";
    $res = mysqli_query($conn, $sql);
    if ($res) :
        echo "Success";
    else :
        echo "Failed";
    endif;
elseif (isset($_POST["agreePosts"])) :
    extract($_POST);
    $checkUserAction = "SELECT * FROM `tblextpst` WHERE `extPstUserId` = '{$userId}' AND `extPstId` = '{$pstId}'";
    $runCheck = mysqli_query($conn, $checkUserAction);
    if (mysqli_num_rows($runCheck) != 0) :
        $sql = "UPDATE `tblextpst` SET `extPstAction`='Agree' WHERE `extPstUserId` = '{$userId}' AND `extPstId` = '{$pstId}'";
    else :
        $sql = "INSERT INTO `tblextpst`(`extPstId`, `extPstUserId`, `extPstAction`) VALUES ('{$pstId}','{$userId}','Agree')";
    endif;
    $res = mysqli_query($conn, $sql);
    if ($res) :
        echo "Success";
    else :
        echo "Failed";
    endif;
elseif (isset($_POST["disAgreePosts"])) :
    extract($_POST);
    $checkUserAction = "SELECT * FROM `tblextpst` WHERE `extPstUserId` = '{$userId}' AND `extPstId` = '{$pstId}'";
    $runCheck = mysqli_query($conn, $checkUserAction);
    if (mysqli_num_rows($runCheck) != 0) :
        $sql = "UPDATE `tblextpst` SET `extPstAction`='Disagree' WHERE `extPstUserId` = '{$userId}' AND `extPstId` = '{$pstId}'";
    else :
        $sql = "INSERT INTO `tblextpst`(`extPstId`, `extPstUserId`, `extPstAction`) VALUES ('{$pstId}','{$userId}','Disagree')";
    endif;
    $res = mysqli_query($conn, $sql);
    if ($res) :
        echo "Success";
    else :
        echo "Failed";
    endif;

endif;
