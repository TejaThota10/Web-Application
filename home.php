<?php
    session_start();
    include("php/config.php");
    if(!isset($_SESSION['valid']))
    {
        header("location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible"content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="nav">
    <p><a href ="home.php">LOGO</a></p>
    </div>
    <div class="right-links">

     <?php
        $id=$_SESSION['id'];
        $query=mysqli_query($connect,"SELECT *FROM users WHERE Id=$id");

        while($result=mysqli_fetch_assoc($query))
        {
            $res_Uname=$result['Username'];
            $res_Email=$result['Email'];
            $res_id=$result['Id'];
        }
        print("<a href='edit.php?Id=$res_id'></a>");
     
     ?>
        <a href="php/logout.php"><button class="btn">Log Out</button></a>

    </div>
    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Hello <b> User</b>,Welcome</p>
                </div>
                <div class="box">
                    <p>your email is <b>.......@gmail.com</b></p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <p>And you are <b>..... years old</b>.</p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>