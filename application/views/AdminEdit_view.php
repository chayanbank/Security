<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Edit User's Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">

        <?php foreach ($account as $row) { ?>

        <form action="<?php echo base_url();?>Main_admin/edit_user/<?php echo $row['studentID'];?>" method="post">
        <table class="table table-bordered">
        <tr>
            <td>Student ID: </td>
            <td><input type="text" name="stuID" pattern="[0-9]{1,}" title="กรอกตัวเลขเท่านั้น" required value="<?php echo $row["studentID"];?>"></td>
        </tr>
        <tr>
            <td>First Name: </td>
            <td><input type="text" name="Fname" pattern="[A-Za-zก-ฮ ]{1,}" title="กรอกตัวอักษรเท่านั้น" required value="<?php echo $row["Fname"];?>"></td>
        </tr>
        <tr>
            <td>Last Name: </td>
            <td><input type="text" name="Lname" pattern="[A-Za-zก-ฮ ]{1,}" title="กรอกตัวอักษรเท่านั้น" required value="<?php echo $row["Lname"];?>"></td>
        </tr>
        <tr>
            <td>Faculty: </td>
            <td><input type="text" name="faculty" pattern="[A-Za-zก-ฮ ]{1,}" title="กรอกตัวอักษรเท่านั้น" required value="<?php echo $row["faculty"];?>"></td>
        </tr>
        <tr>
            <td>Major: </td>
            <td><input type="text" name="major" pattern="[A-Za-zก-ฮ ]{1,}" title="กรอกตัวอักษรเท่านั้น" required value="<?php echo $row["major"];?>"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Edit" name="Edit"> <input type="reset" value="Cancel" name="reset"></td>
        </tr>
        </table>
        </form>
        <?php } ?>
        </div>
        <div class="col-sm-3"></div>
    </div> 
</body>
</html>