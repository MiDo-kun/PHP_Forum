<?php 
    session_start();
    if ($_SESSION["username"]){
        $user= $_SESSION["username"];
    }
    else{
        header("Location: login.php");
    }
    include "connect.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index PHP</title>
</head> 
<body>
    <title>Home Page</title>
        <center>
            <?php 
                include "header.php"; 
            ?>
            <form action="post.php" method="POST">
                Topic Name: <br>
                    <input type="text" name="topic_name" id="" style="width: 400px"><br>
                Content: <br> 
                    <textarea rows="" cols="" name="con" style=" resize: none; width: 400px; height: 300px;"></textarea>
                <br>
                <br>
                <input type="submit" value="POST" name="submit" style="width: 400px;">
            </form>
        </center>
</body>
</html>
 <?php
    $t_name= @$_POST['topic_name'];
    $content= @$_POST['con'];
    $date = date("Y-m-d");

    if (isset($_POST["submit"])){
        if($t_name && $content){
            if(strlen($t_name) >= 10 && strlen($t_name) <= 70){
                if($query= mysqli_query ($connect, "INSERT INTO topic ( topic_id, topic_name, topic_content, content_creator, date) 
                                                    VALUES ( '', '$t_name', '$content', '$user', '$date')")){
                    echo "success!";
                }
                else{
                    echo "Error please fix the bug!";
                }
            }
            else {
                echo "Topic must be between 10 and 70 characters long.";
            }
        }
        else {
            echo "Please Fill in The Fields.";
        }
    }
 ?>