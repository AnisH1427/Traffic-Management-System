<?php
include("preFunction/top.php");
if (isset($_GET['id'])) :
  $challanSql = "SELECT * FROM `offense_type` JOIN `offense_record` JOIN `police` JOIN `user` ON `offense_record`.`offense_Id` =  '{$_GET["id"]}' AND `offense_type`.`Id` = `offense_record`.`Offense_Type_Id` AND `offense_record`.`Police_Id` = `police`.`Id` AND `user`.`owner_of` = '{$userInfo['owner_of']}' AND `offense_record`.`vehicle_id` = '{$userInfo['owner_of']}'  AND `user`.`Id` = '{$userID}'";
  $res = mysqli_fetch_assoc(mysqli_query($conn, $challanSql));
else :
  $res["offense_Id"] = 'XXXX';
  $res["Offender_Name"] = 'XXXX';
  $res["Location_Name"] = 'XXXX';
  $res["type_Name"] = 'XXXX';
  $res["time"] = 'XXXX';
  $res["Date"] = 'XXXX';
  $res["Status"] = 'XXXX';
endif;
?>
<!DOCTYPE html>
<html>

<head>
  <title>User Dashboard</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: "Raleway", sans-serif
    }

    /* Create two equal columns that floats next to each other */
    .column {
      float: left;
      width: 50%;
      padding: 10px;
      height: 300px;
      /* Should be removed. Only for demonstration */
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    .challan {
      padding: 5px;
    }

    .dropdown {
      display: grid;
      overflow: hidden;
    }

    .dropdown .dropbtn {
      font-size: 16px;
      border: none;
      outline: none;
      /* color: white; */
      padding: 14px 16px;
      background-color: inherit;
      font-family: inherit;
      margin: 0;
    }

    .navbar a:hover,
    .dropdown:hover .dropbtn {
      background-color: black;
      color: white;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      margin: 55px 0px 0px 95px;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .dropdown-content a {
      float: none;
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }

    .dropdown-content a:hover {
      background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }
  </style>

  <style>
    /* Import Google font - Poppins */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    /* body {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      background: #6990F2;
    } */

    /* ::selection {
      color: #fff;
      background: #6990F2;
    } */

    .wrapper {
      background: #fff;
      border-radius: 5px;
      padding: 0px 30px;
      box-shadow: 7px 7px 12px rgba(0, 0, 0, 0.05);
    }

    .wrapper #form {
      height: 167px;
      display: flex;
      cursor: pointer;
      margin-bottom: 30px;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      border-radius: 5px;
      border: 2px dashed black;
    }

    #form :where(i, p) {
      color: black;
    }

    #form i {
      font-size: 50px;
    }

    #form p {
      margin-top: 15px;
      font-size: 16px;
    }

    /* section .row {
      margin-bottom: 10px;
      background: #E9F0FF;
      list-style: none;
      padding: 15px 20px;
      border-radius: 5px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    } */

    /* section .row i {
      color: #6990F2;
      font-size: 30px;
    } */

    /* section .details span {
      font-size: 14px;
    } */

    .progress-area .row .content {
      width: 100%;
      margin-left: 15px;
    }

    .progress-area .details {
      display: flex;
      align-items: center;
      margin-bottom: 7px;
      justify-content: space-between;
    }

    .progress-area .content .progress-bar {
      height: 6px;
      width: 100%;
      margin-bottom: 4px;
      background: #fff;
      border-radius: 30px;
    }

    .content .progress-bar .progress {
      height: 100%;
      width: 0%;
      background: #6990F2;
      border-radius: inherit;
    }

    .uploaded-area {
      max-height: 232px;
      overflow-y: scroll;
    }

    .uploaded-area.onprogress {
      max-height: 150px;
    }

    .uploaded-area::-webkit-scrollbar {
      width: 0px;
    }

    .uploaded-area .row .content {
      display: flex;
      align-items: center;
    }

    .uploaded-area .row .details {
      display: flex;
      margin-left: 15px;
      flex-direction: column;
    }

    .uploaded-area .row .details .size {
      color: #404040;
      font-size: 11px;
    }

    .uploaded-area i.fa-check {
      font-size: 16px;
    }
  </style>
</head>

<body class="w3-light-grey w3-content" style="max-width:1600px">
  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;text-align:center;" id="mySidebar"><br>
    <?php include('preFunction/userInfo.php'); ?>
  </nav>

  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:300px">

    <!-- Header -->
    <header id="home">
      <div class="w3-container">
        <h1><b>Traffic Management System</b></h1>
        <div class="w3-section w3-bottombar w3-padding-16">
          <!-- <span class="w3-margin-right">Filter:</span> -->
          <button class="w3-button w3-white" onclick="window.location.href = 'test.php'">ALL</button>
          <button class="w3-button w3-black" onclick="window.location.href = 'test2.php'"><i class="fa fa-inr w3-margin-between"></i> Payment</button>
          <!-- <button class="w3-button w3-white" onclick="window.location.href = 'test3.php'"><i class="fas fa-file-alt w3-margin-between"></i> Rules</button> -->
          <button class="w3-button w3-white" onclick="window.location.href = 'test4.php'"><i class="fa fa-comments w3-margin-between"></i> Community</button>
        </div>
      </div>
    </header>

    <!-- <hr> -->
    <!-- <h2 class="w3-center">Forms and Lists</h2> -->
  </div>

  <!-- <div class="w3-container"> -->
  <div class="w3-main" style="margin-left:300px">
    <div class="w3-row-padding">
      <div class="w3-half">
        <div class="w3-card-4 w3-container">
          <h2>Details</h2>
          <ul class="w3-ul w3-margin-bottom challenInfo">
            <li><b> Challen No : </b><?= $res["offense_Id"] ?></li>
            <!-- <li><b>Offender : </b><?= $res["Offender_Name"] ?></li> -->
            <li><b>Location : </b><?= $res["Location_Name"] ?></li>
            <li><b>Offenses : </b><?= $res["type_Name"] ?></li>
            <li><b>Offense Time : </b><?= $res["time"] ?></li>
            <li><b>Offense Date : </b><?= $res["Date"] ?></li>
            <li><b>Payment Status : </b><?= $res["Status"] ?></li>
            <li></li>
          </ul>
          <br>
        </div>
      </div>

      <div class="w3-half">
        <form class="w3-container w3-card-4 uploadForm">
          <h3 style="text-align: center;">Upload Payment Document</h3>
          <div class="w3-section">

            <div class="wrapper">
              <div class="dropdown">
                <button class="dropbtn">Challen No
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content challenDrop">
                </div>
              </div>
              <input class="file-input" type="file" id="fileUpload" name="file" hidden>
              <div action="" id="form">
                <?php if ($res["Status"] == "Pending") : ?>
                  <i class="fas fa-cloud-upload-alt upload"></i>
                  <p class="upload">Browse File to Upload</p>
                <?php elseif ($res["Status"] == "Paid") : ?>
                  <p style="color:green;"><b>Already Paid</b></p><br>
                  <i class="fas fa-check-circle"></i>
                <?php else : ?>
                  <p><b>Please Select Challen No</b></p><br>
                  <i class="fas fa-smile"></i>
                  <!-- <i class="fas fa-window-close"></i> -->
                <?php endif; ?>
              </div>
              <section class="progress-area"></section>
              <section class="uploaded-area"></section>
            </div>
          </div>
          <div class="w3-section">
            <!-- <textarea id="w3review" name="w3review" rows="5" cols="45" placeholder="Any Comments for Admin ?"></textarea> -->
          </div>
          <?php if ($res["Status"] == "Pending") : ?>
            <button type="submit" class="w3-button w3-black w3-margin-bottom sendFile" style="float: right;"><i class="fa fa-paper-plane w3-margin-right"></i>Send Payment</button>
          <?php endif; ?>
        </form>
      </div>
    </div>
    <hr>

    <div class="w3-black w3-center w3-padding-24">Developed by <a href="https://heraldcollege.edu.np/" title="W3.CSS" target="_blank" class="w3-hover-opacity">Herald Students</a></div>
  </div>


  <!-- End page content -->
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $.post("preFunction/challenNo.php", {
        'getChallenNo': 'true',
        'id': <?= $userInfo['owner_of'] ?>,
      }, function(response) {
        response = $.parseJSON(response);
        if (response[0] == "Success") {
          console.log(response);
          $('.challenDrop').empty().append(response[1]);
          $('.challenDrop').siblings('button').html('Challan No: ' + <?= $res["offense_Id"] ?> + ' <i class="fa fa-caret-down"></i>');

        } else if (response[0] == "Failed") {
          $('.challenDrop').empty().append('<a href="">Server Failed</a>');
        }
      });

      let fileName = "";
      document.querySelector(".file-input").onchange = ({
        target
      }) => {
        let file = target.files[0]; //getting file [0] this means if user has selected multiple files then get first one only
        if (file) {
          fileName = file.name; //getting file name
          let splitName = "";
          const legal = ['png', 'jpg', 'jpeg', 'pdf'];
          splitName = fileName.split('.');
          if (fileName.length >= 12) { //if file name length is greater than 12 then split it and add ...
            fileName = splitName[0].substring(0, 13) + "... ." + splitName[1];
          }
          if (!(legal.includes(splitName[1]))) {
            fileName = "Invalid Format";
            $('.file-input').val("");
            var html = `<p><b class="upload">` + fileName + `</b></p><br><i class="fas fa-window-close pendingUpload" style="color:red"></i>`;
          } else {

            var html = `<p><b class="upload">` + fileName + `</b></p><br><i class="fas fa-times-circle pendingUpload" style="color:red"></i>`;
          }
          $('#form').empty().append(html);
          // uploadFile(fileName); //calling uploadFile with passing file name as an argument
        }
      }

      $('#form').on('click', '.pendingUpload', function() {
        $('.file-input').val("");
        var html = `<i class="fas fa-cloud-upload-alt upload"></i><p class="upload">Browse File to Upload</p>`;
        $('#form').empty().append(html);
      }).on('click', '.upload', function() {
        $('.file-input').click();
      });

      $('.uploadForm').submit(function(e) {
        e.preventDefault();
        var fd = new FormData();
        var files = $('#fileUpload')[0].files;
        // Check file selected or not
        if (files.length > 0) {

          fd.append('file', files[0]);
          fd.append('sendFile', 'true');
          fd.append('challenId', <?= $res["offense_Id"] ?>);

          $.ajax({
            url: 'preFunction/challenNo.php',
            type: 'post',
            data: fd,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(response) {
              console.log(response.status);
              if (response.status == 1) {
                location.reload();

              } else {
                alert('File not uploaded');
              }
            }
          });
        } else {
          alert("Please select a file.");
        }
      });
    });
  </script>

  <script>
    // file upload function
    function uploadFile(name) {
      let xhr = new XMLHttpRequest(); //creating new xhr object (AJAX)
      xhr.open("POST", "php/upload.php"); //sending post request to the specified URL
      xhr.upload.addEventListener("progress", ({
        loaded,
        total
      }) => { //file uploading progress event
        let fileLoaded = Math.floor((loaded / total) * 100); //getting percentage of loaded file size
        let fileTotal = Math.floor(total / 1000); //gettting total file size in KB from bytes
        let fileSize;
        // if file size is less than 1024 then add only KB else convert this KB into MB
        (fileTotal < 1024) ? fileSize = fileTotal + " KB": fileSize = (loaded / (1024 * 1024)).toFixed(2) + " MB";
        let progressHTML = `<li class="row">
                          <i class="fas fa-file-alt"></i>
                          <div class="content">
                            <div class="details">
                              <span class="name">${name} • Uploading</span>
                              <span class="percent">${fileLoaded}%</span>
                            </div>
                            <div class="progress-bar">
                              <div class="progress" style="width: ${fileLoaded}%"></div>
                            </div>
                          </div>
                        </li>`;
        // uploadedArea.innerHTML = ""; //uncomment this line if you don't want to show upload history
        uploadedArea.classList.add("onprogress");
        progressArea.innerHTML = progressHTML;
        if (loaded == total) {
          progressArea.innerHTML = "";
          let uploadedHTML = `<li class="row">
                            <div class="content upload">
                              <i class="fas fa-file-alt"></i>
                              <div class="details">
                                <span class="name">${name} • Uploaded</span>
                                <span class="size">${fileSize}</span>
                              </div>
                            </div>
                            <i class="fas fa-check"></i>
                          </li>`;
          uploadedArea.classList.remove("onprogress");
          // uploadedArea.innerHTML = uploadedHTML; //uncomment this line if you don't want to show upload history
          uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML); //remove this line if you don't want to show upload history
        }
      });
      // let data = new FormData(form); //FormData is an object to easily send form data
      // xhr.send(data); //sending form data
    }
  </script>
  <script>
    // Script to open and close sidebar
    function w3_open() {
      document.getElementById("mySidebar").style.display = "block";
      document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
      document.getElementById("mySidebar").style.display = "none";
      document.getElementById("myOverlay").style.display = "none";
    }
  </script>

</body>

</html>