<?php
include("preFunction/top.php");
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
      margin: 30px 0;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      border-radius: 5px;
      border: 2px dashed #6990F2;
    }

    #form :where(i, p) {
      color: #6990F2;
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
      <a href="#"><img src="/w3images/avatar_g2.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
      <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
      <div class="w3-container">
        <h1><b>Traffic Management System</b></h1>
        <div class="w3-section w3-bottombar w3-padding-16">
          <!-- <span class="w3-margin-right">Filter:</span> -->
          <button class="w3-button w3-white" onclick="window.location.href = 'test.php'">ALL</button>
          <button class="w3-button w3-white" onclick="window.location.href = 'test2.php'"><i class="fa fa-inr w3-margin-between"></i> Payment</button>
          <!-- <button class="w3-button w3-black" onclick="window.location.href = 'test3.php'"><i class="fas fa-file-alt w3-margin-between"></i> Rules</button> -->
          <button class="w3-button w3-white" onclick="window.location.href = 'test4.php'"><i class="fa fa-comments w3-margin-between"></i> Community</button>
        </div>
      </div>
    </header>

    <!-- <hr> -->
    <!-- <h2 class="w3-center">Forms and Lists</h2> -->
  </div>

  <!-- <div class="w3-container"> -->
  <div class="w3-main" style="margin-left:300px">
    <hr>

    <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
      <img src="/w3images/avatar2.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
      <span class="w3-right w3-opacity">1 min</span>
      <h4>John Doe</h4><br>
      <hr class="w3-clear">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <div class="w3-row-padding" style="margin:0 -16px">
        <div class="w3-half">
          <img src="/w3images/lights.jpg" style="width:100%" alt="Northern Lights" class="w3-margin-bottom">
        </div>
        <div class="w3-half">
          <img src="/w3images/nature.jpg" style="width:100%" alt="Nature" class="w3-margin-bottom">
        </div>
      </div>
      <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button>
      <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>
    </div>

    <div class="w3-black w3-center w3-padding-24">Developed by <a href="https://heraldcollege.edu.np/" title="W3.CSS" target="_blank" class="w3-hover-opacity">Herald Students</a></div>
  </div>


  <!-- End page content -->
  </div>

  <script>
    const form = document.querySelector("#form"),
      fileInput = document.querySelector(".file-input"),
      progressArea = document.querySelector(".progress-area"),
      uploadedArea = document.querySelector(".uploaded-area");

    // form click event
    form.addEventListener("click", () => {
      fileInput.click();
    });

    fileInput.onchange = ({
      target
    }) => {
      let file = target.files[0]; //getting file [0] this means if user has selected multiple files then get first one only
      if (file) {
        let fileName = file.name; //getting file name
        if (fileName.length >= 12) { //if file name length is greater than 12 then split it and add ...
          let splitName = fileName.split('.');
          fileName = splitName[0].substring(0, 13) + "... ." + splitName[1];
        }
        uploadFile(fileName); //calling uploadFile with passing file name as an argument
      }
    }

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
      let data = new FormData(form); //FormData is an object to easily send form data
      xhr.send(data); //sending form data
    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places"></script>
  <script>
    initMap();

    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        center: {
          lat: 27.7172,
          lng: 85.3240
        },
        zoom: 10
      });

      var trafficLayer = new google.maps.TrafficLayer();
      trafficLayer.setMap(map);

      var input = document.getElementById('search');
      var autocomplete = new google.maps.places.Autocomplete(input);
      autocomplete.bindTo('bounds', map);

      var searchButton = document.getElementById('search-button');
      searchButton.addEventListener('click', function() {
        var place = autocomplete.getPlace();
        if (place.geometry) {
          map.setCenter(place.geometry.location);
          map.setZoom(15);
        } else {
          alert('Location not found');
        }
      });
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