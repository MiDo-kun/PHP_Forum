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
    <title>Index PHP</title>
</head>

<body>
    <center>
        <?php
        include "header.php";
        ?>
        <a href="post.php"><button>Post Topic</button></a>



        <?php echo "<table border='1px;'>"; ?>
        <br><br>
        <tr>
            <td style="text-align:center;">
                <span>ID</span>
            </td>
            <td width="400px;" style="text-align:center;">
                <span>Name</span>
            </td>
            <td width="80px;" style="text-align:center;">
                <span>Views</span>
            </td>
            <td width="80px;" style="text-align:center;">
                <span>Creator</span>
            </td>
            <td width="80px;" style="text-align:center;">
                <span>Date</span>
            </td>
        </tr>
    </center>
</body>

</html>

<?php
$check = mysqli_query($connect, "SELECT * FROM topic");
if (!@$_GET['date']) {

    if (mysqli_num_rows($check) != 0) {
        while ($row = mysqli_fetch_assoc($check)) {
            $id = $row['topic_id'];
            echo "<tr><td style='text-align:center;'>" . $row['topic_id'] . "</td>";
            echo "<td style='text-align:center;'> <a href='topic.php?id=$id'>" . $row['topic_name'] . "</a></td>";
            echo "<td style='text-align:center;'>" . $row['views'] . "</td>";
            $check_u = mysqli_query($connect, "SELECT * FROM users WHERE username='" . $row['content_creator'] . "'");
            while ($row_u = mysqli_fetch_assoc($check_u)) {
                $user_id = $row_u['id'];
            }
            echo "<td style='text-align:center;'> <a href='profile.php?id=$user_id'>" . $row['content_creator'] . "</a></td>";
            $get_date = $row['date'];
            echo "<td style='text-align:center;'><a href='index.php?date=$get_date'>" . $row['date'] . "</a></td>";
        }
    } else {
        echo "Null?";
    }
}
if (@$_GET['date']) {
    $check_d = mysqli_query($connect, "SELECT * FROM topic WHERE date='" . $_GET['date'] . "'");
    while ($row_d = mysqli_fetch_assoc($check_d)) {
        $id = $row_d['topic_id'];
        echo "<tr><td style='text-align:center;'>" . $row_d['topic_id'] . "</td>";
        echo "<td style='text-align:center;'> <a href='topic.php?id=$id'>" . $row_d['topic_name'] . "</a></td>";
        echo "<td style='text-align:center;'>" . $row_d['views'] . "</td>";
        $check_u = mysqli_query($connect, "SELECT * FROM users WHERE username='" . $row_d['content_creator'] . "'");
        while ($row_u = mysqli_fetch_assoc($check_u)) {
            $user_id = $row_u['id'];
        }
        echo "<td style='text-align:center;'> <a href='profile.php?id=$user_id'>" . $row_d['content_creator'] . "</a></td>";
        $get_date = $row_d['date'];
        echo "<td style='text-align:center;'><a href='index.php?date=$get_date'>" . $row_d['date'] . "</a></td>";
        echo "</table'>";
    }
}
?>