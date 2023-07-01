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
    <title>Account PHP</title>
    <link rel="shortcut icon" href="https://img.icons8.com/color/48/people-working-together.png">
</head>

<body>
    <?php
    include "header.php";
    ?>
    <?php
    $check = mysqli_query($connect, "SELECT * FROM users");
    $rows = mysqli_num_rows($check);

    while ($row = mysqli_fetch_assoc($check)) {
        $username = $row['username'];
        $id = $row['id'];
        $email = $row['email'];
        $date = $row['date'];
        $replies = $row['replies'];
        $score = $row['score'];
        $topic = $row['topics'];
        $pic = $row['profile_pic'];
    }
    ?>

    <center>
        <?php echo "<img src='$pic' width='70px' height='70px'>" ?> <br>
        Username: <?php echo $username; ?> <br>
        ID: <?php echo $id; ?> <br>
        Email: <?php echo $email;  ?> <br>
        Date Registered: <?php echo $date; ?> <br>
        Replies: <?php echo $replies; ?> <br>
        Score(scr): <?php echo $score; ?> <br>
        Topic: <?php echo $topic; ?> <br><br>
        <a href="account.php?action=cp ">"Change Password"</a> <br>
        <a href="account.php?action=ci ">"Change Profile"</a>
    </center>

</body>

</html>

<?php
if (@$_GET['action'] == "ci") {
    echo    "<center>
                <form action='account.php?action=ci' method='POST' enctype='multipart/form-data'>
                    Select image to upload: <br>
                    <div class='filetoUpload'>
                        <input type='file' name='file'> <br>
                    </div>
                    <div class='submit'>
                        <input type='submit' value='Upload' name='submit'>
                    </div>
                </form>
            </center>";

    if (isset($_POST['submit'])) {
        $file = $_FILES['file'];
        // print_r($file);
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 4000000) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = 'images/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    if ($query = mysqli_query($connect, "UPDATE users SET profile_pic='images/$fileNameNew' WHERE username='$user'")) {
                        header("Location: account.php");
                    }
                } else {
                    echo "Your file is too big, limit is 40MB";
                }
            } else {
                echo "There was an error please try again!";
            }
        } else {
            echo "You connot upload files of this type!";
        }
    }
}

if (@$_GET['action'] == "cp") {
    echo "<form action='account.php?action=cp' method='POST'><center>";
    echo "
            Current Password: <input type='text' name='curr_pass'> <br>
            New Password: <input type='text' name='new_pass'> <br>
            Re-type Password: <input type='text' name='re_pass'> <br>
            <input type='submit' name='change_pass' value='Change Password'>
            <br>";
    echo "</center></form>";
}

$cur_pass = @$_POST['curr_pass'];
$new_pass = @$_POST['new_pass'];
$re_pass = @$_POST['re_pass'];
$pass = " ";
$pass_en = sha1($cur_pass);

if (isset($_POST['change_pass'])) {
    echo "<center>";

    $check = mysqli_query($connect, "SELECT * FROM users WHERE username ='$user'");
    $rows = mysqli_num_rows($check);
    while ($row = mysqli_fetch_assoc($check)) {
        $password = $row['password'];
    }

    if ($new_pass !=  $re_pass) {
        echo  "Your New Password and New Type Password Do Not Match <br>";
    }
    if ($new_pass ==  $re_pass) {
        $pass = $new_pass;
        if (strlen($pass) < 6) {
            echo "The password must be greater than 6.";
        }
    } else  if (empty($cur_pass && $new_pass && $re_pass)) {
        echo "Please Input Some of The requirements <br>";
    } else if ($pass_en != $password) {
        echo  "Your Password and Current Password Do Not Match <br>";
    }

    if ($pass_en == $password && $new_pass ==  $re_pass) {
        $updated_pass = sha1($pass);
        if (mysqli_query($connect, "UPDATE users SET password='$updated_pass' WHERE username='$user'")) {
            header("Location: login.php");
        }
    }
}
?>