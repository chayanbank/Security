<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </head>
<body>
<div class="container">
  <h2>Login Form</h2>
  <form class="form-horizontal" method="post" action="<?php echo base_url();?>Login/index">
    <div class="form-group">
        <label for="pwd">Username:</label>
        <input type="text" class="form-control" name="username" placeholder="Enter username" pattern="[ A-Za-z0-9]{1,}" title="กรอกตัวอักษรหรือตัวเลขเท่านั้น">
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" name="pwd" placeholder="Enter password">
    </div>
    <input type="submit" class="btn btn-default" name="login" value="Login">
  </form>
  <?php echo $this->session->flashdata('msg'); ?>
</div>
</body>
</html>