<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Telephone</title>
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

        <form action="<?php echo base_url();?>AdminTel/insert_tel_user/<?php echo $stuID;?>" method="post">
        <table class="table table-bordered">
        <tr>
            <td>Telephone: </td>
            <td><input type="text" name="tel" pattern="[0-9]{1,}" title="กรอกตัวเลขเท่านั้น" required maxlength="10">
                <?php if(isset($tel)) echo $tel;?></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Add Tel" name="Insert"> <input type="reset" value="Cancel" name="reset"></td>
        </tr>
        </table>
        </form>

        </div>
        <div class="col-sm-3"></div>
    </div> 
</body>
</html>