<?php
include('include/connection.php');
if(isset($_POST['update']))
{
    $query = "update tasks set status = '$_POST[status]' where tid = $_GET[id]";

    $query_run = mysqli_query($connection,$query);
    if($query_run)
    {
        echo "<script type='text/javascript'>
        alert('Status Updated Succesfully.');
        window.location.href = 'user_dashboard.php';
        </script>";
    }
    else
    {
        echo "<script type='text/javascript'>
        alert('Error...Please Try Again!!!');
        window.location.href = 'user_dashboard.php';
        </script>";
    
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TMS|Update Task</title>
    <!-- jQuery file -->
    <script src="../include/jquery_latest.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- External CSS File -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
      <!-- Header Code Start -->
      <div class="row" id="header";>
        <div class="col-md-12">
            <h3><i class="fa fa-solid fa-list" style="padding-right:15px;"></i>Task Management System</h3>
        </div>
      </div><br><br>
      <div class="row">
        <div class="col-md-6 m-auto" style="color:white;">
            <h3 style="color:white;">Update the Task</h3><br>
            <?php 
              $query = "select * from tasks where tid = $_GET[id]";
              $query_run = mysqli_query($connection,$query);
              while($row = mysqli_fetch_assoc($query_run)){
                ?>
                <form action="" method="post">
                <div class="form-group">
                    <input type="hidden" name="id" class="form-control" value="" required>
                </div>
                <div class="form-group">
                   <select name="status" id="" class="form-control">
                    <option>-Select-</option>
                    <option>Not Started</option>
                    <option>In-Progress</option>
                    <option>Complete</option>
                   </select>
                </div>
                <input type="submit" class="btn btn-warning" name="update" value="Update">
            </form>
            <?php
              }
            ?>
        </div>
      </div>
      <!-- Header Code Ends -->
</body>
</html>