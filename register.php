<?php
    include('includes/connection.php');
    if(isset($_POST['userRegistration'])){
        $query = "insert into users values(null,'$_POST[name]','$_POST[email]','$_POST[password]',$_POST[mobile])";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
            echo "<script type='text/javascript'>
            alert('User registered successfully...');
            window.location.href = 'index.php';
            </script>
            ";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Error...Please try again');
            window.location.href = 'register.php';
            </script>
            ";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task MS</title>
    <!-- jQuery file -->
    <script src="includes/jQuery.js"></script>
    <!-- Bootstrap file -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External css file-->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <div class="row">
        <div class="col-md-3 m-auto" id="register-home-page">
            <form action="" method="post">
            <center><h3 style="background-color:blanchedalmond;padding:5px;width:35vh" >User Registration</h3></center><br>
            <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" style="margin-bottom: 20px" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" style="margin-bottom: 20px" required >
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" style="margin-bottom: 20px" required>
                </div>
                <div class="form-group">
                    <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" style="margin-bottom: 20px" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="userRegistration" value="Register" class="btn btn-warning">
                </div>
            </form>
            <center><a href="index.php" class="btn btn-danger" style="margin-top: 40px;">Home</a></center>
        </div>
    </div>
</body>
</html>