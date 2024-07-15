<?php
include('includes/connection.php');
if(isset($_POST['edit_task'])){
    $uid = $_POST['id'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $tid = $_GET['id'];

    $query = "UPDATE tasks SET uid = ?, description = ?, start_date = ?, end_date = ? WHERE tid = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("isssi", $uid, $description, $start_date, $end_date, $tid);

    if($stmt->execute()){
        echo "<script type='text/javascript'>
        alert('Task Updated Successfully...');
        window.location.href = 'admin_dashboard.php';
        </script>";
    } else {
        echo "<script type='text/javascript'>
        alert('Error... Please try again');
        window.location.href = 'admin_login.php';
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
    <title>ETMS</title>
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
            <h3> Edit the Task</h3>
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
                    <label>Select user:</label>
                    <select class="form-control" name="id" required>
                        <option>-select-</option>
                        <?php
                            $query1 = "SELECT uid, name FROM users";
                            $query_run1 = mysqli_query($connection, $query1);
                            if(mysqli_num_rows($query_run1) > 0){
                                while($row1 = mysqli_fetch_assoc($query_run1)){
                        ?>
                                    <option value="<?php echo $row1['uid']; ?>"><?php echo $row1['name']; ?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <textarea class="form-control" rows="3" cols="50" name="description" required><?php echo $row['description']; ?></textarea> 
                </div>
                <div class="form-group">
                    <label>Start Date:</label>
                    <input type="date" class="form-control" name="start_date" value="<?php echo $row['start_date']; ?>" required>
                </div>
                <div class="form-group">
                    <label>End Date:</label>
                    <input type="date" class="form-control" name="end_date" value="<?php echo $row['end_date']; ?>" required>
                </div>
                <input type="submit" class="btn btn-warning" name="edit_task" value="Update" style="margin-top: 20px;">
            </form>
            <?php 
            }
            $stmt->close();
            ?>
        </div>
    </div>
</body>
</html>
