<?php
session_start();
include('../include/connection.php');
if(isset($_POST['adminLogin']))
{
    $query = "select email,password,name from admins where email = '$_POST[email]' AND password= '$_POST[password]' ";
    $query_run = mysqli_query($connection,$query);
    if(mysqli_num_rows($query_run))
    {
        while($row = mysqli_fetch_assoc($query_run)){
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
        }
        echo "<script type='text/javascript'>
        window.location.href = 'admin_dashboard.php';
        </script>";
    }
    else
    {
        echo "<script type='text/javascript'>
        alert('Please Enter Correct Detail');
        window.location.href = 'admin_login.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TMS| Admin Login Page</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- External CSS File -->
    <link rel="stylesheet" href="../style.css">
</head>
<body>
   <div class="row">
    <div class="col-md-4 m-auto" id="login_home_page">
        <center><h4 style="background-color:#5A8F7B;padding: 5px; width:15vw;">Admin Login</h4></center>
        <form action="" method="post">
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
        </div>
       <center> <div class="form-group">
            <input type="submit" name="adminLogin" value="Login"  class="btn btn-warning">
        </div></center>
        </form> <br>
       <center> <a href="../index.php" class="btn btn-danger">Go To Home</a></center>
    </div>
 </div>
</body>
</html>
