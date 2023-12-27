<?php
  session_start();
  if(isset($_SESSION['email'])){
    include('include/connection.php');
  include('include/connection.php');
  if(isset($_POST['submit_leave'])){
    $query = "insert into leaves values(null,$_SESSION[uid],'$_POST[subject]','$_POST[Reason]','Not Started')";
    $query_run = mysqli_query($connection,$query);
    if($query_run){
        echo "<script type='text/javascript'>
        alert('Application Submitted Succesfully.');
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
    <title>User Dashboard Page</title>
    <script src="include/jquery_latest.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- External CSS File -->
    <link rel="stylesheet" href="style.css">
     <!-- jQuery code -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#manage_task").click(function(){
            $("#right_sidebar").load("task.php");
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#apply_leave").click(function(){
            $("#right_sidebar").load("leaveForm.php");
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#leave_status").click(function(){
            $("#right_sidebar").load("leave_status.php");
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
           <b>Email: </b> <?php echo $_SESSION['email'];?>
            <span style= "margin-left: 25px;"><b>Name: </b><?php echo $_SESSION['name'];?></span>
        </div>
    </div>
   </div>
   <!-- Header code ends here -->
   <div class="row">
    <div class="col-md-2" id="left_sidebar">
           <table class="table">
            <tr>
                <td>
                    <a href="user_dashboard.php" type="button" id="logout_link">Dashboard</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a type="button" class="link" id="manage_task" >Update Task</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a type="button" class="link" id="apply_leave">Apply Leave</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a type="button" class="link" id="leave_status">Leave status</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="logout.php" type="button" id="logout_link">Logout</a>
                </td>
            </tr>
           </table>
    </div>
    <div class="col-md-10" id="right_sidebar">
        <h4>Instructions for Employees</h4>
        <ul style="line-height: 3em;font-size: 1.2em;list-style-type: none;">
            <li>1. Every employee is expected to record their daily attendance.</li>
            <li>2. All individuals are required to fulfill the tasks assigned to them.</li>
            <li>3. Please ensure the maintenance of a professional atmosphere within the office premises.</li>
            <li>4. Maintain cleanliness and tidiness in the office and your respective work areas, please.</li>
        </ul>
    </div>
   </div>
</body>
</html>
<?php
}
else{
    header('Location:user_login.php');
}
?>
