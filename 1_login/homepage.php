<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css">
    <title>Welcome | Home</title>
</head>
<body>
    <h1>Welcome</h1>
    <h4>
        <?php
            echo $_SESSION['username'];
        ?>
    </h4>
    <a href="login.php"><button>LOGIN</button></a>
</body>
</html>