<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "tms";

// Establish a connection to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validate the form data
  $name = clean_input($_POST["name"]);
  $address = clean_input($_POST["address"]);
  $mobile = clean_input($_POST["mobile"]);
  $email = clean_input($_POST["email"]);
  $gender = clean_input($_POST["gender"]);
  $password = clean_input($_POST["password"]);
  $confirm_password = clean_input($_POST["confirm-password"]);

  // Check if all fields are filled
  if (empty($name) || empty($address) || empty($mobile) || empty($email) || empty($gender) || empty($password) || empty($confirm_password)) {
    die("Please fill all fields");
  }

  // Check if mobile number is valid
  if (!preg_match("/^[0-9]{10}$/", $mobile)) {
    die("Please enter a valid 10-digit mobile number");
  }

  // Check if email address is valid
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Please enter a valid email address");
  }

  // Check if password and confirm password match
  if ($password != $confirm_password) {
    die("Passwords do not match");
  }

  // Insert the data into the user table
  $sql = "INSERT INTO user (Name, mobilenumber, address, email, gender, password) VALUES ('$name', '$mobile', '$address', '$email', '$gender', '$password')";

  if ($conn->query($sql) === TRUE) {
    echo "Account created successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the database connection
  $conn->close();
}

// Function to sanitize input data
function clean_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
