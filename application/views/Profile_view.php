<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">

        <?php foreach ($profile as $row) { ?>

        <form action="<?php echo base_url();?>Main_user/profile" method="post">
        <table class="table table-bordered">
        <tr>
            <td>Student ID: </td>
            <td><input type="text" name="studentID" value="<?php echo $row["studentID"];?>"></td>
        </tr>
        <tr>
            <td>First Name: </td>
            <td><input type="text" name="Fname" value="<?php echo $row["Fname"];?>"></td>
        </tr>
        <tr>
            <td>Last Name: </td>
            <td><input type="text" name="Lname" value="<?php echo $row["Lname"];?>"></td>
        </tr>
        <tr>
            <td>Faculty: </td>
            <td><input type="text" name="faculty" value="<?php echo $row["faculty"];?>"></td>
        </tr>
        <tr>
            <td>Major: </td>
            <td><input type="text" name="major" value="<?php echo $row["major"];?>"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Update" name="Update"> <input type="reset" value="Cancel" name="reset"></td>
        </tr>
        </table>
        </form>
        <?php } ?>
        </div>
        <div class="col-sm-3"></div>
    </div> 
</body>
</html>