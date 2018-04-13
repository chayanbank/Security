<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Picture Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
        <?php echo $error; ?> 
        <form action="<?php echo base_url();?>Main_admin/do_upload" method="post" enctype="multipart/form-data">
        <table class="table table-bordered">
        <tr>
            <td>Select image to upload:</td>
            <td><input type="file" name="image" size="20"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Upload" name="Upload"> <input type="reset" value="Cancel" name="reset"></td>
        </tr>
        </table>
        </form>
        <div class="col-sm-3"></div>
    </div> 
</body>
</html>