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
    <title>Sign-Up</title>
</head>
<body>
    <div style="display:none" id="success_alert"><h1>registeration successful</h1></div>
    <form action="signup.php" method="POST">
        <label for="username">User Name</label>
        <input type="text" name="username" id="username" placeholder="Enter your name" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter password" required>
        <label for="cpassword">Confirm Password</label>
        <input type="password" name="cpassword" id="cpassword" placeholder="Confirm password" required>
        <input type="submit" value="Submit" name="signup">
        <a href="login.php"><input type="button" value="Login-Page"></a>
    </form>
    <?php
        if(isset($_POST['signup'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];

            if($cpassword == $password){
                $query = "select * from user WHERE username = '$username'";
                $query_run = mysqli_query($con, $query);
                if(mysqli_num_rows($query_run)>0){
                    echo "<script>alert('username is already taken!! Try another one');</script>";
                }
                else{
                    $query = "insert into user values('$username','$password')";
                    $query_run = mysqli_query($con, $query);
                    if($query_run){
                        // echo "<script>alert('Registeration Sussessful !!');</script>";
                        echo "<script>document.getElementById('success_alert').style.display='block';
                        </script>";
                    }
                    else{
                        echo "<script>alert('Some error orrucrred !!');</script>";
                    }
                }
            }
            else{
                echo "<script>alert('Passwords did not match');</script>";
            }
        }
    ?>
</body>
</html>