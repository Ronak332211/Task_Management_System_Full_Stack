<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h3>Create Task Here!</h3>
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="form-group">
                    <label>Select user:</label>
                    <select class="form-control" name="id">
                        <option>-select-</option>
                        <?php 
                            include('includes/connection.php');
                            $query = "select uid,name from users";
                            $query_run = mysqli_query($connection,$query);
                            if(mysqli_num_rows($query_run)){
                                while($row = mysqli_fetch_assoc($query_run)){
                                    ?>
                                    <option value="<?php echo $row['uid']; ?>"><?php echo $row['name']; ?></option>
                                    <?php
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <textarea class="form-control" rows="3" cols="50" name="description" placeholder="Mention the task"></textarea>
                </div>
                <div class="form-group">
                    <label>Start Date:</label>
                    <input  type="date" class="form-control" name="start_date" placeholder="Start Date">
                </div>
                <div class="form-group">
                    <label>End Date:</label>
                    <input  type="date" class="form-control" name="end_date" placeholder="End Date">
                </div>
                <input type="submit" class="btn btn-warning" name="create_task" value="Create" style="margin-top: 20px;">
            </form>
        </div>
    </div>
</body>
</html>