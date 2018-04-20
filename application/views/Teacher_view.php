<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Teacher</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="row">
        <div class="col-sm-3">
            
        </div>
        <div class="col-sm-6">

        <table class="table table-bordered">
            <tr> 
                <th>Teacher ID</th>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
        <?php foreach ($teacher as $row) { ?>
        <tr>
            <td><?php echo $row['teachID'];?></td>
            <td><?php echo $row['teachName'];?></td>
            <td><?php echo $row['teachSurname'];?></td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="2"><a class="btn btn-success" href="<?php echo base_url();?>Teacher/insert_teacher">Add</a></td>
        </tr>
        </table>
        
        </div>
        <div class="col-sm-3"></div>
    </div> 
</body>
</html>