<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script>
            function faculty_change() {
    	let faculty_list = document.getElementById('faculty');
    	let major_list = document.getElementById('major');
    	let sel_faculty = faculty_list.options[faculty_list.selectedIndex].value;
    	let major_in_faculty = {};
    	let index = [1, 4, 8];
    
    	major_in_faculty["Informatics"] = [
    		'Information Technology', 
    		'Computer Science',
    		'Software Engineering'
    	];
    	major_in_faculty["Humanities and Social Sciences"] = [
    		'Religions and Philosophy',
    		'Thai',
    		'Cultural Resources Management',
    		'Psychology'
    	];
    	major_in_faculty["Science"] = [
    		'Biology',
    		'Chemistry',
    		'Biochemistry',
    		'Mathematics'
    	];
  
  	  while (major_list.options.length) {
          major_list.remove(0);
      }
      let faculties = major_in_faculty[sel_faculty];
      if(faculties) {
      	for(i = 0; i < faculties.length; i++) {
      		let faculty = new Option(faculties[i], faculties[i]);
      		major_list.options.add(faculty);
      	}
      }
    }
        </script>
    </head>
<body>
<div class="container">
  <h2>Sign Up Form</h2>
  <form class="form-horizontal" method="post" action="<?php echo base_url();?>Main/sign_up/">
  <div class="form-group">
        <label for="stuID">Student ID:</label>
        <input type="text" class="form-control" name="studentID" placeholder="Enter student ID" pattern="[0-9]{1,}" title="กรอกตัวเลขเท่านั้น" required maxlength=8>
    </div>
    <div class="form-group">
        <label for="pwd">Username:</label>
        <input type="text" class="form-control" name="username" placeholder="Enter username" pattern="[ A-Za-z0-9]{1,}" title="กรอกตัวอักษรหรือตัวเลขเท่านั้น" required>
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" name="pwd" placeholder="Enter password" required minlength=8>
    </div>
    <div class="form-group">
        <label for="FirstName">First Name:</label>
        <input type="text" class="form-control" name="fname" placeholder="Enter first name" pattern="[ A-Za-z]{1,}" title="กรอกตัวอักษรภาษาอังกฤษเท่านั้น" required>
    </div>
    <div class="form-group">
        <label for="LastName">Last Name:</label>
        <input type="text" class="form-control" name="lname" placeholder="Enter last name" pattern="[ A-Za-z]{1,}" title="กรอกตัวอักษรภาษาอังกฤษเท่านั้น" required>
    </div>
    <div class="form-group">
        <label for="faculty">Faculty:</label>
        <select name="faculty" id="faculty" class="form-control" onchange="faculty_change()">
            <option value="Informatics">Informatics</option>
            <option value="Humanities and Social Sciences">Humanities and Social Sciences</option>
            <option value="Science">Science</option>
        </select>
    </div>
    <div class="form-group">
        <label for="major">Major:</label>
        <select name="major" id="major" class="form-control">  
            <option value="Computer Science">Computer Science</option>
            <option value="Information Technology">Information Technology</option>
            <option value="Software Engineering">Software Engineering</option>
        </select>
    </div>
    <input type="submit" class="btn btn-default" name="signUp" value="Sign Up">
  </form>
</div>

</body>
</html>