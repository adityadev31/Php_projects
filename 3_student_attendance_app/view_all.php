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
            Attendance <strong>Successfully</strong> Updated
        </div>

        <div class="alert alert-danger" role="alert" id="alert_msg2" style="display:none">
            Some <strong>error</strong> occured !!
        </div>

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <a href="add.php" class="btn btn-success">Add Student</a>
                <a href="index.php" class="btn btn-info">Back to Home</a>
            </div>
            <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>SNo.</th>
                                <th>Dates</th>
                                <th>Show Attendance</th>
                            </tr>
                        </thead>

                        <?php
                            $query = "select distinct date from attendance_records";
                            $query_run = mysqli_query($con, $query);
                            $serial_number = 0;
                            

                            while($row = mysqli_fetch_array($query_run)){
                                $serial_number++;

                        ?>
                                <tr>
                                    <td> <?php echo $serial_number; ?></td>
                                    <td> <?php echo $row['date']; ?></td>
                                    <td>
                                        <form action="show_attendance.php">
                                            <input type="hidden" name="date" value="<?php echo $row['date']; ?>">
                                            <input type="submit" class="btn btn-primary" value="Show Attendance">
                                        </form>
                                    </td>
                                </tr>
                            <?php 
                            
                            }
                            ?>
                    </table>
            </div>
        </div>
    </div>

    




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>