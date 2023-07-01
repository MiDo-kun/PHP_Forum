<?php
if ($_SESSION["username"]) {
  $user = $_SESSION["username"];
} else {
  header("Location: login.php");
}
include "connect.php";


?>
<html lang="en">

<head>
  <style>
    ul li {
      display: inline;
      padding: 10px;
      list-style-type: none;

    }

    a {
      color: black;
      text-decoration: none;
    }
  </style>
</head>

<body>
  <?php
  $check = mysqli_query($connect, "SELECT * FROM members WHERE username ='$user'");
  $rows = mysqli_num_rows($check);

  while ($row = mysqli_fetch_assoc($check)) {
    $id = $row['id'];
  }
  ?>
  <ul>
    <li> <a href="index.php">Homepage</a></li>
    <li> <a href="account.php">My Account</a></li>
    <li> <a href="members.php">Members</a></li>
    <li> <a href="profile.php?id=<?php echo $id; ?>"> Logged In As "<?php echo $user; ?>" </a></li>
    <li> <a href="logout.php">Logout</a></li>
  </ul>
</body>

</html>