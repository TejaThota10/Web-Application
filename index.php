<?php
    session_start();
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
    <div class="container">
         <div class="box form-box">

            <?php
                include("php/config.php");
                if(isset($_POST['submit']))
                {
                    $email= mysqli_real_escape_string($connect,$_POST['email']);
                    $password= mysqli_real_escape_string($connect,$_POST['password']);

                    $result=mysqli_query($connect,"SELECT * FROM users WHERE email='$email' AND Password='$password'") or die("select error");
                    $row=mysqli_fetch_assoc($result);
                    if(is_array($row)&& !empty($row))
                    {
                        $_SESSION['valid']=$row['Email'];
                        $_SESSION['username']=$row['Username'];
                        $_SESSION['id']=$row['Id'];
                    }else
                    {
                        print("<div class='message'>
                        <p>wrong username or password</p>
                         </div> <br>");
                        print("<a href='index.php'><button class ='btn'>Go Back</button>");
                    }
                    if(isset($_SESSION['valid']))
                    {
                        header("location:home.php");
                    }
                }else{
            ?>

            <header>Login Form</header>
            <form action=""method="post">
                <div class="field input">
                    <label for="email">email</label>
                    <input type="text"name="email"id="email"required> 
                </div> 

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password"name="password"id="password"required> 
                </div>  

                <div class="field">
        
                    <input type="submit"class="btn"name="submit"value="Login"required> 
                </div> 
                <div class="links">
                    Don't have account?<a href="register.php">Register Now</a>
                </div>          
        </div>
        <?php }?>
    </div>
</body>
</html>