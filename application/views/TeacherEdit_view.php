<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Edit Teacher</title>
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

        <form action="<?php echo base_url();?>Teacher/insert_teacher" method="post">
        <table class="table table-bordered">
        <tr>
            <td>Teacher ID: </td>
            <td><input type="text" name="teachID" pattern="[A-Z0-9]{1,}" required></td>
        </tr>
        <tr>
            <td>First Name: </td>
            <td><input type="text" name="teachName" pattern="[ A-Za-z]{1,}" title="กรอกตัวอักษรภาษาอังกฤษเท่านั้น" required></td>
        </tr>
        <tr>
            <td>Last Name: </td>
            <td><input type="text" name="teachSurname" pattern="[ A-Za-z]{1,}" title="กรอกตัวอักษรภาษาอังกฤษเท่านั้น" required></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Insert" name="Insert"> <input type="reset" value="Cancel" name="reset"></td>
        </tr>
        </table>
        </form>
 
        </div>
        <div class="col-sm-3"></div>
    </div> 
</body>
</html>