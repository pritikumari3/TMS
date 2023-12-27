<?php
session_start();
if(isset($_SESSION['email'])){
include('include/connection.php');
?>
<html>
    <body>
        <center><h4>Your Leave Applications</h4></center>
        <table class="table" style="background-color: whitesmoke;width:75vw;">
            <tr>
                <th>S.No</th>
                <th>Subject</th>
                <th>Reason</th>
                <th>Status</th>
            </tr>
            <?php
               $sno = 1;
               $query = "select * from leaves where uid = $_SESSION[uid]";
               $query_run = mysqli_query($connection,$query);
               while($row = mysqli_fetch_assoc($query_run)){
                ?>
                <tr>
                        <td><?php echo $sno; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                        <td><?php echo $row['Reason']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                </tr>
              <?php  
              $sno=$sno+1;
             }
            ?>
        </table>
    </body>
</html>
<?php
}
else{
    header('Location:user_login.php');
}
?>
