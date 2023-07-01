<?php
session_start();
include "connect.php";

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $date = date("Y-m-d");
  $passwordHash = sha1($password);

  // Insert user into the database
  $query = "INSERT INTO users (username, password, email, date) VALUES ('$username', '$passwordHash', '$email', '$date')";
  $result = mysqli_query($connect, $query);

  if ($result) {
    // User registration successful
    echo "Registration successful! You can now login with your credentials.";
  } else {
    // Error occurred during registration
    echo "Error: " . mysqli_error($connect);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
  <link rel="shortcut icon" href="https://img.icons8.com/color/48/people-working-together.png">
  </head>

<body>
  <h2>Signup</h2>
  <form action="signup.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" required><br>

    <input type="submit" name="submit" value="Signup">
  </form>
  <p>After signing in you can login <a href="login.php">here</a>.</p>
</body>

</html>