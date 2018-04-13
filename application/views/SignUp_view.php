<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </head>
<body>
<div class="container">
  <h2>Sign Up Form</h2>
  <form class="form-horizontal" method="post" action="<?php echo base_url();?>Main/sign_up/">
  <div class="form-group">
        <label for="stuID">Student ID:</label>
        <input type="text" class="form-control" name="studentID" placeholder="Enter student ID" pattern="[0-9]{1,}" title="กรอกตัวเลขเท่านั้น" required>
    </div>
    <div class="form-group">
        <label for="pwd">Username:</label>
        <input type="text" class="form-control" name="username" placeholder="Enter username" required>
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" name="pwd" placeholder="Enter password" required>
    </div>
    <div class="form-group">
        <label for="FirstName">First Name:</label>
        <input type="text" class="form-control" name="fname" placeholder="Enter first name" pattern="[A-Za-zก-ฮ ]{1,}" title="กรอกตัวอักษรเท่านั้น" required>
    </div>
    <div class="form-group">
        <label for="LastName">Last Name:</label>
        <input type="text" class="form-control" name="lname" placeholder="Enter last name" pattern="[A-Za-zก-ฮ ]{1,}" title="กรอกตัวอักษรเท่านั้น" required>
    </div>
    <div class="form-group">
        <label for="faculty">Faculty:</label>
        <input type="text" class="form-control" name="faculty" placeholder="Enter faculty" pattern="[A-Za-zก-ฮ ]{1,}" title="กรอกตัวอักษรเท่านั้น" required>
    </div>
    <div class="form-group">
        <label for="major">Major:</label>
        <input type="text" class="form-control" name="major" placeholder="Enter major" pattern="[A-Za-zก-ฮ ]{1,}" title="กรอกตัวอักษรเท่านั้น" required>
    </div>
    <input type="submit" class="btn btn-default" name="signUp" value="Sign Up">
  </form>
</div>

</body>
</html>