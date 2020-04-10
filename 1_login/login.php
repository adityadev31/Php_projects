<?php
    session_start();
    require "dbconfig/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css">
    <title>Login Page</title>
</head>
<body>
    <div class="main-box">
        <form action="login.php" method="POST">
            <label for="username" class="login-labels">User Name</label>
            <input type="text" name="username" class="login-inputs" placehoder="Enter user name" required><br>
            <label for="password" class="login-labels">Password</label>
            <input type="password" name="password" class="login-inputs" placehoder="Enter password" required><br>
            <input type="submit" class="login-btn" name="login" value="Log-in">
            <a href="signup.php" class="signup-btn"><input type="button" value="Sign-Up"></a>
        </form>

        <?php
            if(isset($_POST['login'])){
                $username = $_POST['username'];
                $password = $_POST['password'];

                $query = "select * from user WHERE username = '$username' AND password = '$password' ";
                $query_run = mysqli_query($con, $query);

                if(mysqli_num_rows($query_run) > 0){    // valid
                    $_SESSION['username'] = $username;
                    echo "<script>alert('Login-Successful');</script>";
                    header('location:homepage.php');
                }
                else{
                    echo "<script>alert('Incorrect Username or Password');</script>";
                }
            }
        ?>

    </div>
</body>
</html>