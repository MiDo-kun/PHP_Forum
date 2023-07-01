<?php

?>
<html lang="en">

<head>
    <title>Register Account</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://img.icons8.com/color/48/people-working-together.png">
</head>

<body>
    <form action="register.php" method="POST">
        Username: <input type="text" name="username" value="">
        <br> Password: <input type="password" name="password" value="">
        <br> Confirm Password: <input type="text" name="repassword" value="">
        <br> Email: <input type="text" name="email" value="">
        <br> <input type="submit" name="submit" value="Register">
        or <a href="login.php"> Log In </a>
    </form>
</body>

</html>

<?php
include 'connect.php';

$username = @$_POST['username'];
$password = @$_POST['password'];
$repass = @$_POST['repassword'];
$email = @$_POST['email'];
$date = date("Y-m-d");
$pass_en = sha1($password);

if (isset($_POST['submit'])) {

    if ($username && $password && $repass && $email) {
        if (strlen($username) >= 5 && strlen($username) < 25 && strlen($password)  > 6) {
            if ($repass == $password) {
                if ($query = mysqli_query($connect, "INSERT INTO members ( id, username, password, email, date) VALUES ('', '$username', '$pass_en', '$email', '$date')")) {
                    echo "You have been registered as $username. Click <a href='login.php'>here</a> to log in.";
                } else {
                    echo "fail";
                }
            } else {
                echo "Password and confirm password do not match";
            }
        } else {
            if (strlen($username) < 5 || strlen($username) > 25) {
                echo "The username must be greater than 5 and lower than 25.";
            }

            if (strlen($password) < 6) {
                echo "The password must be greater than 6.";
            }
        }
    } else {
        echo "Please fill it up!";
    }

    echo "<br>" . $username;
    echo "<br>" . $password;
    echo "<br>" . $repass;
    echo "<br>" . $email;
    //     if($query= mysqli_query ($connect, "INSERT INTO members ( id, username, password, email) VALUES ('', '$username', '$password', '$email')" ));
    //         echo "Success!";
    // }
    //     else{
    //         echo "fail";
}
?>