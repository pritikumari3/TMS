<?php
include('../include/connection.php');
?>
<!DOCTYPE html>
<body>
   <center><h3>All Leave Applications</h3></center><br>
   <table class="table" style="background-color: whitesmoke; width: 75vw;">
   <tr>
      <th>S.No</th>
      <th>User</th>
      <th>Subject</th>
      <th style="width: 40%;">Reason</th>
      <th>Status</th>
      <th>Action</th>
   </tr>
   <?php
        $query = "select * from leaves";
        $query_row = mysqli_query($connection,$query);
        $sno = 1;
        while($row = mysqli_fetch_assoc($query_row)){
            ?>
            <tr>
                <td><?php echo $sno; ?></td>
                 <?php
                 $query1 ="select name from users where uid = $row[uid]";
                 $query_run1 = mysqli_query($connection,$query1);
                 while($row1 = mysqli_fetch_assoc($query_run1)){
                    ?>
                    <td><?php echo $row1['name']; ?></td>
                    <?php
                    }
                    ?>
                    <td><?php echo $row['subject']; ?></td>
                    <td><?php echo $row['Reason']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><a href="approve_leave.php?id=<?php echo $row['lid']; ?>">Approve</a>|<a href="reject_leave.php?id=<?php echo $row['lid']; ?>">Reject</a></td>
            </tr>
          <?php  
          $sno=$sno+1;
        }
    ?>
   </table>
</body>
</html>
