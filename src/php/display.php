<?php
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >

</head>
<body>
   <div class = "container">
    <button class="btn btn-primary my-5"><a href="user.php" class="text-light">Add User</a></button>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sl no</th>
      <th scope="col">Name</th>
      <th scope="col">Mobile</th>
      <th scope="col">Address</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Password</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>

  <?php
$sql="Select * from `user`";
$result=mysqli_query($conn,$sql);
if($result){
   while( $row=mysqli_fetch_assoc($result)){
    $id = $row['Id'];
    $name=$row['Name'];
    $mobile=$row['MobileNumber'];
    $address=$row['Address'];
    $email=$row['Email'];
    $gender = $row['Gender'];
    $password=$row['Password'];
    echo '<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$name.'</td>
        <td>'.$mobile.'</td>
        <td>'.$address.'</td>
        <td>'.$email.'</td>
        <td>'.$gender.'</td>
        <td>'.$password.'</td>
        <td>
        <button class ="btn btn-primary"><a href="update.php? update_id='.$id.'" class="text-light">Update</a></button>
        <button class ="btn btn-danger"><a href="delete.php? delete_id='.$id.'" class="text-light">Delete</a></button>
        </td>
        </tr>';
   }
}

?>
  
  </tbody>
</table>
</div>

</body>
</html>