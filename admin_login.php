<?php
    session_start();
    include('includes/connection.php');
    if(isset($_POST['adminLogin'])){
        $query = "select email,password,name from admins where email = '$_POST[email]' AND password = '$_POST[password]'";
        $query_run = mysqli_query($connection,$query);
        if(mysqli_num_rows($query_run)){
                while($row = mysqli_fetch_assoc($query_run)){
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['name'] = $row['name'];
                }
            echo "<script type='text/javascript'>
            window.location.href = 'admin_dashboard.php';
            </script>
            ";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Please enter correct details');
            window.location.href = 'admin_login.php';
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
        <div class="col-md-3 m-auto" id="login-home-page">
            <form action="" method="post">
            <center><h3 style="background-color:blanchedalmond;padding:5px;width:25vh" >Admin Login</h3></center><br>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" style="margin-bottom: 20px" required >
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" style="margin-bottom: 20px" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="adminLogin" value="Login" class="btn btn-warning">
                </div>
            </form>
            <center><a href="index.php" class="btn btn-danger" style="margin-top: 40px;">Home</a></center>
        </div>
    </div>
</body>
</html>