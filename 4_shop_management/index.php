<?php
    require "dbconfig.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Welcome to Shop Management Section</title>

    <style>
        body{
            background: url('soothing_wallpaper_4.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
        }
        .headingTop,
        .mainBase{
            background-color: rgba(0,0,0,0.5);
        }
        .card-head,
        .heading2{
            background-color: rgba(12, 101, 128, 0.5);
        }
        .card{
            background-color: rgba(0,0,0,0);
        }
        label{
            color: #fff;
            margin-top: 20px;
        }
    </style>

</head>
<body>
    
    <div class="container-fluid text-white text-center p-3 mb-3 headingTop"><h1>Welcome to Shop Management</h1></div>

    <div class="alert alert-success" id="alert_msg1" style="display:none"><h4>Data Entered <strong>Successfully</strong></h4></div>
    <div class="alert alert-danger" id="alert_msg2" style="display:none"><h4><strong>Error !</strong> Data Not Saved</h4></div>
    <div class="alert alert-info" id="alert_msg3" style="display:none"><h4>Data Deleted <strong>Successfully</strong></h4></div>
    <div class="alert alert-warning" id="alert_msg4" style="display:none"><h4><strong>Error !</strong> Data Not Deleted</h4></div>
    <div class="alert alert-success" id="alert_msg5" style="display:none"><h4>Data Updated <strong>Successfully</strong></h4></div>
    <div class="alert alert-warning" id="alert_msg6" style="display:none"><h4><strong>Error !</strong> Data Not Updated</h4></div>

    <?php
        if(isset($_POST['fetch_btn'])){
            $p_id = $_POST['p_search'];
            if($p_id == ""){
                echo "<script>alert('Enter the Product ID first');</script>";
            }
            else{
                $query = "select * from product_info where p_id = '$p_id'";
                $query_run = mysqli_query($con, $query);
                if(mysqli_num_rows($query_run)>0){
                    // echo "<script>alert('Match Found');</script>";
                    @$row = mysqli_fetch_array($query_run, MYSQLI_ASSOC);
                }
                else{
                    echo "<script>alert('Match not Found !');</script>";
                }
            }
        }
    
    
    ?>


    <div class="container mainBase">
        <form action="index.php" method="POST">
            <div class="card">
                <div class="card-head p-3 mt-3">
                    <div class="container d-flex justify-content-between align-items-center pt-2">
                        <input type="submit" name="fetch_btn" class="btn btn-success mr-5" value="Search By ID">
                        <input type="text" name="p_search" placeholder="Enter ID to search" class="form-control">
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="container p-3 text-center text-white mb-3 heading2"><h3>Product Entry</h3></div>
                   <div class="container">
                        <label for="p_id">Product ID</label>
                        <input type="text" name="p_id" id="p_id" placeholder="Enter Product ID" class="form-control" value="<?php echo @$row['p_id']?>">

                        <label for="p_name">Product Name</label>
                        <input type="text" name="p_name" id="p_name" placeholder="Enter Product name" class="form-control" value="<?php echo @$row['p_name']?>">

                        <label for="p_brand">Product Brand</label>
                        <input type="text" name="p_brand" id="p_brand" placeholder="Enter Product Brand" class="form-control" value="<?php echo @$row['p_brand']?>">

                        <label for="p_cost">Product Cost</label>
                        <input type="number" name="p_cost" id="p_cost" placeholder="Enter Product Cost" class="form-control" value="<?php echo @$row['p_cost']?>">

                        <label for="p_quantity">Product Quantity</label>
                        <input type="number" name="p_quantity" id="p_quantity" placeholder="Enter Product Quantity" class="form-control" value="<?php echo @$row['p_quantity']?>">

                        <input type="submit" name="save" value="Save Product" class="btn btn-primary btn-lg my-3 mr-3">
                        <input type="submit" name="delete" value="Delete Product" class="btn btn-danger btn-lg my-3 mr-3">
                        <input type="submit" name="update" value="Update Product" class="btn btn-info btn-lg my-3 mr-3">
                        
                        


                        <?php
                            if(isset($_POST['save'])){
                                $p_id = $_POST['p_id'];
                                $p_name = $_POST['p_name'];
                                $p_brand = $_POST['p_brand'];
                                $p_cost = $_POST['p_cost'];
                                $p_quantity = $_POST['p_quantity'];

                                if($p_id=="" || $p_name=="" || $p_brand=="" || $p_cost=="" || $p_quantity==""){
                                    echo "<script>alert('Please enter complete details');</script>";
                                }
                                else{
                                    $query = "select * from product_info where p_id = '$p_id'";
                                    $query_run = mysqli_query($con, $query);
                                    if(mysqli_num_rows($query_run)>0){
                                        echo "<script>alert('Product ID already present !');</script>";
                                    }
                                   else{
                                        $query = "insert into product_info values ('$p_id', '$p_name', '$p_brand', $p_cost, $p_quantity)";
                                        $query_run = mysqli_query($con, $query);
                                        if($query_run){
                                            echo "<script>document.getElementById('alert_msg1').style.display='block';</script>";
                                        }
                                        else{
                                            echo "<script>document.getElementById('alert_msg2').style.display='block';</script>";
                                        }
                                   }
                                }
                            }
                        
                            if(isset($_POST['delete'])){
                                $p_id = $_POST['p_id'];
                                $p_name = $_POST['p_name'];
                                $p_brand = $_POST['p_brand'];
                                $p_cost = $_POST['p_cost'];
                                $p_quantity = $_POST['p_quantity'];

                                //first check if all the fields have some entry or not

                                if($p_id=="" || $p_name=="" || $p_brand=="" || $p_cost=="" || $p_quantity==""){
                                    echo "<script>alert('Please Search The correct product ID first');</script>";
                                }
                                else{
                                    $query = "select * from product_info where p_id = '$p_id'";
                                    $query_run = mysqli_query($con, $query);
                                    if(mysqli_num_rows($query_run)>0){
                                        $query = "delete from product_info where p_id = '$p_id'";
                                        $query_run = mysqli_query($con, $query);
                                        if($query_run){
                                            echo "<script>document.getElementById('alert_msg3').style.display='block';</script>";
                                        }
                                        else{
                                            echo "<script>document.getElementById('alert_msg4').style.display='block';</script>";
                                        }
                                    }
                                    else{
                                        echo "<script>alert('Product not Found !');</script>";
                                    }
                                }
                            }

                            if(isset($_POST['update'])){
                                $p_id = $_POST['p_id'];
                                $p_name = $_POST['p_name'];
                                $p_brand = $_POST['p_brand'];
                                $p_cost = $_POST['p_cost'];
                                $p_quantity = $_POST['p_quantity'];

                                //first check if all the fields have some entry or not

                                if($p_id=="" || $p_name=="" || $p_brand=="" || $p_cost=="" || $p_quantity==""){
                                    echo "<script>alert('Please Search The correct product ID first');</script>";
                                }
                                else{
                                    $query = "select * from product_info where p_id = '$p_id'";
                                    $query_run = mysqli_query($con, $query);
                                    if(mysqli_num_rows($query_run)>0){
                                        $query = "update product_info set p_name='$p_name', p_brand='$p_brand', p_cost=$p_cost, p_quantity=$p_quantity where p_id = '$p_id' ";
                                        $query_run = mysqli_query($con, $query);
                                        if($query_run){
                                            echo "<script>document.getElementById('alert_msg5').style.display='block';</script>";
                                        }
                                        else{
                                            echo "<script>document.getElementById('alert_msg6').style.display='block';</script>";
                                        }
                                    }
                                    else{
                                        echo "<script>alert('Match Not Found !');</script>";
                                    }
                                }
                            }
                        ?>


                   </div>
                </div>
            </div>
        </form>
        <a href="table.php"><button class="btn btn-warning btn-lg my-3 mr-3">Show All Product</button></a>
    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>