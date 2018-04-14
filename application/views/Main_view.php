<html>
    <head>
        <title>Student</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
<body>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url();?>Main">Student</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url();?>Main/about">About us <span class="sr-only">(current)</span></a></li>
      </ul>
      <form class="navbar-form navbar-left" action="<?php echo base_url();?>Main/search" method="post">
        <div class="form-group">
          <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Search ID, First, Last">
        </div>
        <input type="submit" name="search" class="btn btn-default" value="Submit">
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url();?>Login">Sign in</a></li>
        <li><a href="<?php echo base_url();?>Main/sign_up/">Sign up</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Faculty</th>
      <th scope="col">Major</th>
    </tr>
  </thead> 
  <?php foreach ($main as $row) { ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['studentID'];?></th>
      <td><?php echo $row['Fname'];?></td>
      <td><?php echo $row['Lname'];?></td>
      <td><?php echo $row['faculty'];?></td>
      <td><?php echo $row['major'];?></td>
    </tr>
  </tbody>
  <?php } ?>
</table>


</body>
</html>