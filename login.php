<?php 
    session_start();
    include 'connect.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login with your account</title>
</head>
<body>
    <form action="login.php" method="post">
        Username: <input type="text" name="username" id=""> <br>
        Password: <input type="password" name="password" id=""> <br>
        <input type="submit" value="Login" name="submit">
    </form>
</body>
</html>

<?php 
    if(isset($_POST["submit"])){
        $username = @$_POST['username'];
        $password = @$_POST['password'];
        
        // echo $username. "<br>";
        // echo $password. "<br>";
        if($username &&  $password){
            $check = mysqli_query($connect, "SELECT * FROM users WHERE username ='$username'");
            $rows = mysqli_num_rows($check);

            if($rows != 0){
                while($row = mysqli_fetch_assoc($check)){
                    $db_username= $row['username'];
                    $db_password= $row['password'];
                    
                    if ($username == $db_username && sha1($password) == $db_password){
                        $_SESSION["username"] = $username;
                        header("Location: index.php");
                    }
                    else{
                        echo "Error: Email or Password is not correct.";
                    }
                }
            }
            else{
                echo "Couldn't find the username!";
            }
        }
        else{
            echo "Please Fill The Input Box.";
        }
    }
?>