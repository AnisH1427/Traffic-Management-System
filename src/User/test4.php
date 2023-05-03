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
</head>

<body class="w3-light-grey w3-content" style="max-width:1600px">

  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px; text-align:center;" id="mySidebar"><br>
    <?php include('preFunction/userInfo.php'); ?>
    <hr>
    <div class="w3-container">
      <!-- <div class="w3-col"> -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container w3-padding">
          <h6 class="w3-opacity">Your post will be visible for all users</h6>
          <form action="" id="sendMsg" autocomplete="off">

            <p><input class="w3-input w3-border" type="text" placeholder="Aa" id="postMsg" minlength="5" required></p><br>
            <!-- <p contenteditable="true" class="w3-border w3-padding"></p><br> -->
            <button type="submit" class="w3-button w3-black"><i class="fa fa-paper-plane w3-margin-right"></i>Post</button>

          </form>
        </div>
      </div>
    </div>
    </div>
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
          <button class="w3-button w3-white" onclick="window.location.href = 'test2.php'"><i class="fa fa-inr w3-margin-between"></i> Payment</button>
          <!-- <button class="w3-button w3-white" onclick="window.location.href = 'test3.php'"><i class="fas fa-file-alt w3-margin-between"></i> Rules</button> -->
          <button class="w3-button w3-black" onclick="window.location.href = 'test4.php'"><i class="fa fa-comments w3-margin-between"></i> Community</button>
        </div>
      </div>
    </header>

    <!-- <hr> -->
    <!-- <h2 class="w3-center">Forms and Lists</h2> -->
  </div>

  <!-- <div class="w3-container"> -->
  <div class="w3-main postPost" style="margin-left:300px">
  </div>
  <!-- End page content -->
  </div>

  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#sendMsg').submit(function(e) {
        e.preventDefault();
        var msg = $('#postMsg').val();
        $.post("postFunction/post.php", {
          'setPosts': 'true',
          'msg': msg,
          'id': <?= $userID ?>
        }, function(response) {
          if (response == "Success") {
            console.log("succ");
            location.reload();

          } else if (response == "Failed") {

          }
        });
      });

      

      $(".postPost").on('click', '.deletePst', function() {
        var getRes = confirm("Do You Want To Delete ?");
        if (getRes) {
          $.post("postFunction/post.php", {
            'deletePosts': 'true',
            'userId': <?= $userID ?>,
            'pstId': $(this).siblings("img").data("pstid"),
          }, function(response) {
            if (response == "Success") {
              getPost();
            } else if (response == "Failed") {
              alert("Sorry !! Deletion Failed");
            }
          });
        } else {
          // console.log(getRes, "Failed");
        }
      }).on('click', '#agree', function() {
        $.post("postFunction/post.php", {
          'agreePosts': 'true',
          'userId': <?= $userID ?>,
          'pstId': $(this).siblings("img").data("pstid"),
        }, function(response) {
          if (response == "Success") {
            getPost();
          } else if (response == "Failed") {
            alert("Sorry !! Something went wrong");
          }
        });
      }).on('click', '#disAgree', function() {

        $.post("postFunction/post.php", {
          'disAgreePosts': 'true',
          'userId': <?= $userID ?>,
          'pstId': $(this).siblings("img").data("pstid"),
        }, function(response) {
          if (response == "Success") {
            getPost();
          } else if (response == "Failed") {
            alert("Sorry !! Something went wrong");
          }
        });
        console.log("Disagree");
      });

      function getPost() {
        $.post("postFunction/post.php", {
          'getPosts': 'true',
          'id': <?= $userID ?>
        }, function(response) {
          if (response == "Failed") {

          } else {
            $(".postPost").empty().append(response);
          }
        });
      }

      getPost();

    });
  </script>
</body>

</html>