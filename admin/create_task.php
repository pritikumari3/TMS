<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETMS| Create Task</title>
</head>
<body>
    <h3>Create a new Task</h3>
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="form-group">
                   <label>Select User</label>
                   <select class="form-control" name="id">
                   <option>-Select-</option>
                   <?php
                   include('../include/connection.php');
                   $query ="Select uid,name from users";
                   $query_run = mysqli_query($connection,$query);
                   if(mysqli_num_rows($query_run)){
                     while($row = mysqli_fetch_assoc($query_run)){
                    ?>
                    <option value="<?php echo $row['uid'];?>"><?php echo $row['name']?></option>
                    <?php
                   }
                }
                ?>
                </select>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" id="" cols="30" rows="3" class="form-control" placeholder="Mention the Task"></textarea>
                </div>
                <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" class="form-control" name="start_date">
                </div>
                <div class="form-group">
                    <label>End Date</label>
                    <input type="date" class="form-control" name="end_date">
                </div><br>
                <input type="submit" class="btn btn-warning" name="create_task" value="Create">
            </form>
        </div>
    </div>
</body>
</html>