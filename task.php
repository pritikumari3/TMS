<?php
session_start();
include('include/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery file -->
    <script src="include/jquery_latest.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- External CSS File -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <center><h4>Your Assigned Task</h4></center><br>
    <table class="table" style="background-color: whitesmoke;width: 75vw;">
        <center>
        <tr>
            <th>S.No</th>
            <th>Task ID</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </center>
        <?php
          $query = "select * from tasks where uid = $_SESSION[uid]";
          $sno = 1;
          $query_run = mysqli_query($connection,$query);
          while($row = mysqli_fetch_assoc($query_run))
          {
            ?>
            <tr>
                <td><?php echo $sno; ?></td>
                <td><?php echo $row['tid']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['start_date']; ?></td>
                <td><?php echo $row['end_date']; ?></td>
                <td><?php echo $row['status']; ?></td>
               <td><a href="update_status.php?id=<?php echo $row['tid']; ?>">Update</a></td>
            </tr>
            <?php
            $sno = $sno+1;
          }
          ?>
    
    </table>
</body>
</html>