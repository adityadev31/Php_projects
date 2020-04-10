<?php
    require "dbconfig.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Product List</title>

    <style>
        html{
            width: 100vw !important;
            overflow-x: hidden;
        }
        body{
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('corona_del_mar_newport_beach-1280x720.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .card{
            background: rgba(0,0,0,0);
        }
        .card-head{
            background-color: rgba(23,162,184,0.6);
        }
        .headingTop1{
            background-color: rgba(95, 11, 145, 0.555);
            width: 100vw !important;
        }
        table{
            background-color: rgba(247, 246, 248, 0.747);
        }
        
    </style>

</head>
<body style="width:100vw; overflow-x: hidden; min-height: 100vh;" id="body2">

    <div class="rotation_alert">
        <div>
            <h3>Please rotate your device to landscape mode</h3>
        </div>
    </div>
    
    <div class="container-fluid text-white text-center p-3 mb-3 headingTop1"><h1>Welcome to Shop Management</h1></div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-head p-3">
                <div class="container d-flex justify-content-between align-items-center">
                    <h4 class="text-white">All Products</h4>
                    <a href="index.php"><button class="btn btn-warning">Back</button></a>
                </div>
            </div>    
            <div class="card-body px-0">
                <div class="alert alert-warning" id="alert" style="display:none"><strong>WARNING !</strong> No product present</div>
                <form action="">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th>Sno.</th>
                                <th>ID.</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Cost</th>
                                <th>Quantity</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $serial = 0;
                                $amount=0;
                                $total_amount=0;
                                $query = "select * from product_info";
                                $query_run = mysqli_query($con, $query);
                                if(mysqli_num_rows($query_run)>0){
                                    while($serial < mysqli_num_rows( $query_run)){
                                        $row = mysqli_fetch_array($query_run, MYSQLI_ASSOC);
                                        $amount = ($row['p_cost']*$row['p_quantity']);
                                        $total_amount +=  $amount;
                            ?>
                                        <tr>
                                            <td><?php echo ++$serial?></td>             
                                            <td><?php echo $row['p_id']?></td>
                                            <td><?php echo $row['p_name']?></td>
                                            <td><?php echo $row['p_brand']?></td>
                                            <td>&#8377;<?php echo $row['p_cost']?></td>
                                            <td><?php echo $row['p_quantity']?></td>
                                            <td>&#8377;<?php echo $amount?></td>
                                        </tr>
                            <?php
                                        // $serial+1;   its done above in <td><?php echo ++$serial></td>   
                                    }
                            ?>
                                        <tr>
                                            <th colspan="6" class="text-right">TOTAL</th>
                                            <th>&#8377;<?php echo $total_amount?></th>
                                        </tr>
                            <?php
                                }
                                else{
                                    echo "<script>
                                        document.getElementById('alert').style.display='block';
                                        document.getElementById('table').style.display='none';
                                    </script>";
                                }
                            ?>
                                
                            
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>