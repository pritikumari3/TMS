<?php
include('../include/connection.php');
if(isset($_POST['edit_task']))
{
    $query = "update tasks set uid = $_POST[id],description =' $_POST[description]',start_date =' $_POST[start_date]',end_date =' $_POST[end_date]' where tid = $_GET[id]";

    $query_run = mysqli_query($connection,$query);
    if($query_run)
    {
        echo "<script type='text/javascript'>
        alert('Task Updated Succesfully.');
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
    <title>TMS|Edit Task</title>
    <!-- jQuery file -->
    <script src="../include/jquery_latest.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- External CSS File -->
    <link rel="stylesheet" href="../style.css">
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
            <h3 style="color:white;">Edit the Task</h3><br>
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
                   <label>Select User</label>
                   <select class="form-control" name="id" required>
                   <option>-Select-</option>
                   <?php
                   $query1 ="Select uid,name from users";
                   $query_run1 = mysqli_query($connection,$query1);
                   if(mysqli_num_rows($query_run1)){
                     while($row1 = mysqli_fetch_assoc($query_run1)){
                    ?>
                    <option value="<?php echo $row1['uid'];?>"><?php echo $row1['name']?></option>
                    <?php
                   }
                }
                ?>
                </select>
                <div class="form-group">
                <label for="">Description</label>
                    <textarea name="description" id="" cols="30" rows="3" class="form-control" required><?php echo $row['description'];?></textarea>
                    <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" class="form-control" name="start_date" value="<?php echo $row['start_date']; ?>" required>
                </div>
                <div class="form-group">
                    <label>End Date</label>
                    <input type="date" class="form-control" name="end_date" value="<?php echo $row['end_date']; ?>" required>
                </div><br>
                <input type="submit" class="btn btn-warning" name="edit_task" value="Update">
                </div>
            </form>
            <?php
              }
            ?>
        </div>
      </div>
      <!-- Header Code Ends -->
</body>
</html>