<?php
session_start();
if ($_SESSION["username"]) {
    $user = $_SESSION["username"];
} else {
    header("Location: login.php");
}
include "connect.php";
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://img.icons8.com/color/48/people-working-together.png">
    <title>Members PHP</title>
</head>

<body>
    <?php
    include "header.php";
    echo "<center>";
    echo "<h1>Members:</h1> <br>";
    $check = mysqli_query($connect, "SELECT * FROM users");
    $rows = mysqli_num_rows($check);

    while ($row = mysqli_fetch_assoc($check)) {
        $id = $row['id'];
        $username = $row['username'];
        echo "<a href='profile.php?id=$id'>" . $username . "<br>";
    }
    echo "</center>";
    ?>
</body>

</html>