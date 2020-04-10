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
    <title>homepage</title>
</head>
<body>
    <h1>Welcome 
    <?php
        echo $_SESSION['username'];
    ?>
    </h1>
</body>
</html>