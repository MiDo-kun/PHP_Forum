<?php 
    session_start();
    if($_SESSION["username"]){
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
    <title>Profile PHP</title>
</head>
<body>

<?php 
    echo "<center>";
    include "header.php";
    
    if($_GET['id']){
        $check = mysqli_query($connect, "SELECT * FROM users WHERE id ='".$_GET['id']."' ");
        $rows = mysqli_num_rows($check);

        if($rows != 0){
            while($row = mysqli_fetch_assoc($check)){
                echo "<h1>". $row['username']."</h1>"."<img src='".$row['profile_pic']."' width='70px' height='70px'></img><br>";
                echo "Date registered: ".$row['date']. "<br>";
                echo "Email: " .$row['email']. "<br>";
                echo "Replies: " .$row['replies']. "<br>";
                echo "Topics created: " .$row['topics']. "<br>";
                echo "Score(scr): " .$row['score']. "<br>";
            }
        }
        else {
            echo "ID not found";
        }
    }
    else{
        header("Location: members.php");
    }   
    echo "</center>";
?>


</body>
</html>

