<?php
    require "dbconfig.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Add Students</title>
</head>
<body>

    <div class="container">

        <header class="bg-primary text-center p-3 text-white my-3">
            <h1>Student Attendance App</h1>
        </header>

        <div class="alert alert-success" role="alert" id="alert_msg1" style="display:none">
            Data entered <strong>Successfully</strong>
        </div>

        <div class="alert alert-danger" role="alert" id="alert_msg2" style="display:none">
            Some <strong>error</strong> occured !!
        </div>

        <div class="card">
            <div class="card-header">
                <a href="index.php" class="btn btn-success">Attendance Portal</a>
                <a href="view_all.php" class="btn btn-info float-right">View All</a>
            </div>
            <div class="card-body">
                <form action="add.php" method='POST'>
                    <div class="form-group">
                        <label for="name">Student Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Student Name" required>
                    </div>
                    <div class="form-group">
                        <label for="roll">Student Roll No.</label>
                        <input type="text" name="roll" id="roll" class="form-control" placeholder="Enter Student Roll No." required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary mt-3" value="Submit">
                    </div>

                    <?php
                        if(isset($_POST['submit'])){

                            $student_name = $_POST['name'];
                            $roll_no = $_POST['roll'];

                            $query = "insert into attendance (student_name, roll_number) values ('$student_name', '$roll_no')";
                            $query_run = mysqli_query($con, $query);

                            if($query_run){
                                echo "<script>document.getElementById('alert_msg1').style.display='block';</script>";
                            }
                            else{
                                echo "<script>document.getElementById('alert_msg2').style.display='block';</script>";
                            }
                        }
                    ?>

                </form>
            </div>
        </div>
    </div>

    




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>