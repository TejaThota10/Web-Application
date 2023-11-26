<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible"content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
         <div class="box form-box">

            <?php
            include ("php/config.php");
            if(isset($_POST['submit']))
            {
                $username=$_POST['username'];
                $email=$_POST['email'];
                $password=$_POST['password'];
            //verfying unique email
            $verify_query = mysqli_query($connect,"SELECT Email FROM users WHERE Email='$email'");
            if (mysqli_num_rows($verify_query)!=0)
            {
                print ("<div class='message'>
                            <p>This email is used , try another one please!</p>
                     </div> <br>");
                print("<a href='javascript:self.history.back()'><button class ='btn'>Go Back</button>");
            }
            else
            {
                mysqli_query($connect,"INSERT INTO users(username,Email,password)VALUES('$username','$email','$password')")or die("error occured");
                print("<div class='message'>
                        <p>Regestration Succefully!</p>
                        </div> <br>");
                 print("<a href='index.php'><button class ='btn'>Login Now</button>");
            }
            }else{
            ?>

            <header>Registration Form</header>
            <form action=""method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text"name="username"autocomplete="off"required> 
                </div> 

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text"name="email"autocomplete="off" required> 
                </div>
                
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password"name="password"autocomplete="off"required> 
                </div>  

                <div class="field">
                    <input type="submit"class="btn"name="submit"value="Register"required> 
                </div> 
                <div class="links">
                    Already a member?<a href="index.php">Log In</a>
                </div>          
        </div>
        <?php } ?>
    </div>
</body>
</html>