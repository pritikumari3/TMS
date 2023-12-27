<?php
include('include/connection.php');
if(isset($_POST['userRegistration']))
{
    $query = "insert into users values(null,'$_POST[name]','$_POST[email]','$_POST[password]',$_POST[mobile])";
    $query_run = mysqli_query($connection,$query);
    if($query_run)
    {
        echo "<script type='text/javascript'>
        alert('User Registered Succesfully.');
        window.location.href = 'index.php';
        </script>";
    }
    else
    {
        echo "<script type='text/javascript'>
        alert('Error...Please Try Again!!!');
        window.location.href = 'register.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TMS| Register Page</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- External CSS File -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="row">
    <div class="col-md-4 m-auto" id="register_home_page">
        <center><h5 style="background-color:#5A8F7B;padding: 5px; width:15vw;">User Registration</h5></center>
        <form action="" method="post">
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
        </div>
        <div class="form-group">
            <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile No." required>
        </div>
       <center> <div class="form-group">
            <input type="submit" name="userRegistration" value="Register"  class="btn btn-warning">
        </div></center>
        </form> <br>
       <center> <a href="index.php" class="btn btn-danger">Go To Home</a></center>
    </div>
</div>
</body>
</html>
