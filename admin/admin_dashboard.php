<?php
session_start();
include('../include/connection.php');
  if(isset($_POST['create_task'])){
    $query = "insert into tasks values(null,$_POST[id],'$_POST[description]','$_POST[start_date]','$_POST[end_date]','Not Started')";
    $query_run = mysqli_query($connection,$query);
    if($query_run){
        echo "<script type='text/javascript'>
        alert('Task Created Succesfully.');
        window.location.href = 'admin_dashboard.php';
        </script>";
    }
    else
    {
        echo "<script type='text/javascript'>
        alert('Error...Please Try Again!!!');
        window.location.href = 'admin_dashboard.php';
        </script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard Page</title>
    <!-- jQuery file -->
    <script src="../include/jquery_latest.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- External CSS File -->
    <link rel="stylesheet" href="../style.css">
    <!-- jQuery code -->
    <script type="text/javascript">
          $(document).ready(function(){
            $("#create_task").click(function(){
                $("#right_sidebar").load("create_task.php");
            });
          });
          $(document).ready(function(){
            $("#manage_task").click(function(){
                $("#right_sidebar").load("manage_task.php");
            });
          });
          $(document).ready(function(){
            $("#view_leave").click(function(){
                $("#right_sidebar").load("view_leave.php");
            });
          });
    </script>
</head>
<body>
   <!-- Header Code Start -->
   <div class="row" id="header">
    <div class="col-md-12">
        <div class="col-md-4" style= "display: inline-block;">
            <h3>Task Management System</h3>
        </div>
        <div class="col-md-6" style= "display: inline-block;text-align: right";>
           <b>Email: </b><?php echo $_SESSION['email']; ?>
            <span style= "margin-left: 25px;"><b>Name: </b><?php echo $_SESSION['name']; ?></span>
        </div>
    </div>
   </div>
   <!-- Header code ends here -->
   <div class="row">
    <div class="col-md-2" id="left_sidebar">
           <table class="table">
            <tr>
                <td>
                    <a href="admin_dashboard.php" type="button" id="logout_link">Dashboard</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a type="button" class="link" id="create_task">Create Task</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a type="button" class="link" id="manage_task">Manage Task</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a type="button" class="link" id="view_leave">Leave Applications</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="../logout.php" type="button" id="logout_link">Logout</a>
                </td>
            </tr>
           </table>
    </div>
    <div class="col-md-10" id="right_sidebar">
        <h4>Instructions for Admins</h4>
        <ul style="line-height: 3em;font-size: 1.2em;list-style-type: none;">
            <li>1. Employee attendance records should be diligently maintained by the administration team.</li>
            <li>2. It is imperative for the administration team to ensure that assigned tasks are efficiently distributed and completed in a timely manner.</li>
            <li>3. The administration team is responsible for upholding a professional atmosphere within the office premises.</li>
            <li>4. The administration is tasked with overseeing and ensuring the cleanliness and organization of the office space, including individual work areas.</li>
        </ul>
    </div>
   </div>
</body>
</html>