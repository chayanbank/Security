
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Photo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<table border="0">
    <tr>
        <td>
            <form action="<?php echo base_url();?>Picture_user/picture/<?php echo $stuID;?>" method="post">
                <input type="submit" class="btn btn-primary" name="Upload" value="Upload">
            </form>
        </td>
    </tr>
    <tr>
        <td><img src="../../uploads/<?php foreach ($pic as $row) {  
                                            if ($row['picture'] != NULL) { 
                                                echo $row['picture'];
                                            }else{
                                                echo 'user.png';
                                            }
                                        } ?>" /></td>
    </tr>
</table>
</body>
</html>