 <?php
include 'connect.php';
$id=$_GET['update_id'];
$sql="Select * from `user` where id=$id";
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$name=$row['Name'];
$email=$row['Email'];
$mobile=$row['MobileNumber'];
$address=$row['Address'];
$gender=$row['Gender'];
$password=$row['Password'];

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $address = $_POST['address'];
  $gender = $_POST['gender'];
  $password = $_POST['password'];


  $sql="update `user`set Name='$name',Email='$email',MobileNumber='$mobile',Address='$address',Gender='$gender',Password='$password' 
        where id=$id";
  $result = mysqli_query($conn,$sql);
  if($result){
    header("location::display.php"); 
  }else{
    die(mysqli_error($conn));
  }
}

?> 

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >

    <title>Update User Details</title>
  </head>
  <body>
    <div class = "container my-5">
      <form method="post">
        <!-- autocomplete="off" -->
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" placeholder ="Enter your name" name="name"
          value=<?php echo $name;?>>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" placeholder ="Enter your Email" name="email">
        </div>
        <div class="form-group">
          <label>Mobile</label>
          <input type="text" class="form-control" placeholder ="Enter your Mobile Number" name="mobile">
        </div>
        <div class="form-group">
          <label>Mobile</label>
          <input type="text" class="form-control" placeholder ="Enter your Mobile Number" name="mobile">
        </div>
        <div class="form-group">
  <span>Gender</span>
    <input type="radio" name="gender" value="male" id="male" />
    <label for="male">Male</label>
    <input type="radio" name="gender" value="female" id="female" />
    <label for="female">Female</label>
    <input type="radio" name="gender" value="other" id="other" />
    <label for="other">Other</label>
</div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" placeholder ="Enter your Password" name="password">
        </div>
        <button type="Update" class = "btn btn-primary" name="submit">Submit</button>
      </form>
    </div>
  </body>
</html>