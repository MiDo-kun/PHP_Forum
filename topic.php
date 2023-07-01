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
    <title>Topic PHP</title>
    <link rel="shortcut icon" href="https://img.icons8.com/color/48/people-working-together.png">
</head>

<body>
    <center>
        <?php
        include "header.php";
        ?>
        <br><br>

        <?php
        if ($_GET['id']) {

            $check = mysqli_query($connect, "SELECT * FROM topic WHERE topic_id='" . $_GET['id'] . "'");
            if (mysqli_num_rows($check)) {

                while ($row = mysqli_fetch_assoc($check)) {
                    $check_u = mysqli_query($connect, "SELECT * FROM members WHERE username='" . $row['content_creator'] . "'");
                    while ($row_u = mysqli_fetch_assoc($check_u)) {
                        $user_id = $row_u['id'];
                    }
                    echo "<h1>" . $row['topic_name'] . "</h1>";
                    echo "<h3>" . "<a href='profile.php?id=$user_id'>" . "By: " . $row['content_creator'] . "</a>" . "</h3>";
                    echo "<h5>" . "Date: " . $row['date'] . "</h5>" . "<br>";
                    echo "<h5>" . $row['topic_content'] . "</h5>";
                }
            } else {
                header("Location: index.php");
            }
        } else {
            header("Location: index.php");
        }
        ?>
    </center>
</body>

</html>