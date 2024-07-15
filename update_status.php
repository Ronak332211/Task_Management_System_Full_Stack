<?php
include('includes/connection.php');
if(isset($_POST['update'])){
    $status = $_POST['status'];
    $tid = $_GET['id'];

    $query = "UPDATE tasks SET status = ? WHERE tid = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("si", $status, $tid);

    if($stmt->execute()){
        echo "<script type='text/javascript'>
        alert('Status Updated Successfully...');
        window.location.href = 'user_dashboard.php';
        </script>";
    } else {
        echo "<script type='text/javascript'>
        alert('Error... Please try again');
        window.location.href = 'user_dashboard.php';
        </script>";
    }
    $stmt->close();
    $connection->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Task</title>
    <!-- jQuery file -->
    <script src="includes/jQuery.js"></script>
    <!-- Bootstrap file -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External css file-->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <div class="row" id="header">
        <div class="col-md-12">
            <div class="col-md-4" style="display: inline-block;">
                <h3>Task Management System</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 m-auto"><br>
            <h3> Update the Task</h3>
            <?php 
            $query = "SELECT * FROM tasks WHERE tid = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("i", $_GET['id']);
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
            ?>
            <form action="" method="post">
                <div class="form-group">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $row['uid']; ?>" required>
                </div>
                <div class="form-group">
                    <select class="form-control" name="status" required>
                        <option value="">-select-</option>
                        <option value="In-Progress">In-Progress</option>
                        <option value="Complete">Complete</option>
                    </select>
                </div>
                <input type="submit" class="btn btn-warning" name="update" value="Update" style="margin-top: 20px;">
            </form>
            <?php 
            }
            $stmt->close();
            ?>
        </div>
    </div>
</body>
</html>
