<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User dashboard</title>
    <!-- jQuery file -->
    <script src="includes/jQuery.js"></script>
    <!-- Bootstrap file -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External css file-->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script type="text/javascript">
        $(document).ready(function(){
            $("#manage_task").click(function(){
                $("#right_sidebar").load("task.php");
            });
        });
     </script>
</head>
<body>
    <div class="row" id="header">
        <div class="col-md-12">
            <div class="col-md-4" style="display: inline-block;">
                <h3>Task Management System</h3>
            </div>
            <div class="col-md-6" style="display: inline-block; text-align:right" >
                <b>Email: </b> <?php echo $_SESSION['email']; ?>
                <span style="margin-left: 25px;"><b>Name: </b><?php echo $_SESSION['name']; ?></span>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-2" id="left_sidebar">
            <table class="table">
                <tr>
                    <td style="text-align: center;">
                        <a href="user_dashboard.php" type="button" id="logout_link">Dashboard</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a type="button" class="link" id="manage_task">Update Task</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a href="apply_leave.php" type="button" class="link" >Apply Leave</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a href="view_leave.php" type="button" class="link" >Leave Status</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a href="logout.php" type="button" id="logout_link">Logout</a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-10" id="right_sidebar">
            <h4>Instructions for Employees</h4>
            <ul style="line-height: 3em;font: size 1.2em;list-style-type:none;">
                <li>1. Complete assigned tasks promptly, prioritizing based on deadlines and urgency.</li>
                <li>2. Regularly update task statuses to keep the team informed.</li>
                <li>3. Add detailed comments when updating task statuses.</li>
                <li>4. Review and respond to notifications promptly.</li>
            </ul>
        </div>
    </div>
</body>
</html>