<?php
    session_start();
    require "dbconfig/db_con.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login page</title>
</head>
<body>
<form action="login.php" method="POST">
        <label for="username">User Name</label>
        <input type="text" name="username" id="username" placeholder="Enter your name" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter password" required>
        <input type="submit" value="Submit" name="login">
        <a href="signup.php"><input type="button" value="Sign Up-Page"></a>
    </form>
    <?php
        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = "select * from user WHERE username = '$username' and password = '$password'";
            $query_run = mysqli_query($con, $query);

            if(mysqli_num_rows($query_run)>0){
                $_SESSION['username'] = $username;
                echo "<script>alert('Successful Login');</script>";
                header('location:home.php');
            }
            else{
                echo "<script>alert('Wrong Credentials !!');</script>";
            }
        }
    ?>
</body>
</html>