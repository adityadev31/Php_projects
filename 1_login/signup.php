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
    <title>Signup Page</title>
</head>
<body>
    <div class="main-box">
        <form action="signup.php" method="POST">
            <label for="username" class="signup-labels">User Name</label>
            <input type="text" name="username" class="signup-inputs" placehoder="Enter user name"><br>
            <label for="password" class="signup-labels">Password</label>
            <input type="password" name="password" class="signup-inputs" placehoder="Enter password"><br>
            <label for="cpassword" class="signup-labels">Confirm-Password</label>
            <input type="password" name="cpassword" class="signup-inputs" placehoder="Confirm password"><br>
            <input type="submit" class="signup-btn-1" name="signup" value="Sign-Up">
            <a href="login.php" class="login-btn-1"><input type="button" value="Log-In"></a>
        </form>

        <?php
            if(isset($_POST['signup'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $cpassword = $_POST['cpassword'];

                if($cpassword == $password){
                    $query = "select * from user WHERE username = '$username'";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0){      // duplicate username (invalid)
                        echo "<script>alert('Username already exixts...Try another one');</script>";
                    }
                    else{
                        $query = "insert into user values('$username', '$password')";
                        $query_run = mysqli_query($con, $query);
                        if($query_run){
                            echo "<script>alert('Registration Successful');</script>";    
                            header('location:login.php');
                        }
                        else{
                            echo "<script>alert('Error!!');</script>";    
                        }
                    }
                }
                else{
                    echo "<script>alert('Confirmed Password does not match');</script>";
                }
            }
        ?>

    </div>
</body>
</html>