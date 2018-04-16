<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Profile</title>
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
    <div class="row">
        <div class="col-sm-3">
            <font color="red">*กรุณา Logout ทุกครั้งที่มีการเปลี่ยน Student ID ของตน</font>
            <form action="<?php echo base_url();?>Login/logout" method="post">
                <input type="submit" class="btn btn-warning" name="logout" value="Logout">
            </form>
        </div>
        <div class="col-sm-6">

        <?php foreach ($profile as $row) { ?>

        <form action="<?php echo base_url();?>Main_user/profile/<?php echo $row['studentID'];?>" method="post">
        <table class="table table-bordered">
        <tr>
            <td>Student ID: </td>
            <td><input type="text" name="studentID" pattern="[0-9]{1,}" title="กรอกตัวเลขเท่านั้น" required value="<?php echo $row["studentID"];?>"></td>
        </tr>
        <tr>
            <td>First Name: </td>
            <td><input type="text" name="Fname" pattern="[ A-Za-z]{1,}" title="กรอกตัวอักษรภาษาอังกฤษเท่านั้น" required value="<?php echo $row["Fname"];?>"></td>
        </tr>
        <tr>
            <td>Last Name: </td>
            <td><input type="text" name="Lname" pattern="[ A-Za-z]{1,}" title="กรอกตัวอักษรภาษาอังกฤษเท่านั้น" required value="<?php echo $row["Lname"];?>"></td>
        </tr>
        <tr>
            <td>Faculty: </td>
            <td>
            <select name="faculty" id="faculty" class="form-control" onchange="faculty_change()">
            <option value="Informatics" <?php if("Informatics"==$row['faculty']) echo 'selected="selected"'; ?>>Informatics</option>
            <option value="Humanities and Social Sciences" <?php if("Humanities and Social Sciences"==$row['faculty']) echo 'selected="selected"'; ?>>Humanities and Social Sciences</option>
            <option value="Science" <?php if("Science"==$row['faculty']) echo 'selected="selected"'; ?>>Science</option>
            </select>
            </td>
        </tr>
        <tr>
            <td>Major: </td>
            <td>
            <select name="major" id="major" class="form-control">  
            <?php if ("Informatics"==$row['faculty']) { ?>
                <option value="Computer Science" <?php if("Computer Science"==$row['major']) echo 'selected="selected"';?>>Computer Science</option>
                <option value="Information Technology" <?php if("Information Technology"==$row['major']) echo 'selected="selected"';?>>Information Technology</option>
                <option value="Software Engineering" <?php if("Software Engineering"==$row['major']) echo 'selected="selected"';?>>Software Engineering</option>
            <?php } elseif ("Humanities and Social Sciences"==$row['faculty']) {?>
                <option value="Religions and Philosophy" <?php if("Religions and Philosophy"==$row['major']) echo 'selected="selected"';?>>Religions and Philosophy</option>
                <option value="Thai" <?php if("Thai"==$row['major']) echo 'selected="selected"';?>>Thai</option>
                <option value="Cultural Resources Management" <?php if("Cultural Resources Management"==$row['major']) echo 'selected="selected"';?>>Cultural Resources Management</option>
                <option value="Psychology" <?php if("Psychology"==$row['major']) echo 'selected="selected"';?>>Psychology</option>
            <?php } elseif ("Science"==$row['faculty']) {?>
                <option value="Biology" <?php if("Biology"==$row['major']) echo 'selected="selected"';?>>Biology</option>
                <option value="Chemistry" <?php if("Chemistry"==$row['major']) echo 'selected="selected"';?>>Chemistry</option>
                <option value="Biochemistry" <?php if("Biochemistry"==$row['major']) echo 'selected="selected"';?>>Biochemistry</option>
                <option value="Mathematics" <?php if("Mathematics"==$row['major']) echo 'selected="selected"';?>>Mathematics</option>
            <?php } ?>
            </select>
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="Update" name="Update"> <input type="reset" value="Cancel" name="reset"></td>
            <td><a class="btn btn-danger" href="<?php echo base_url();?>Main_user/delete/<?php echo $row['studentID'];?>" onclick='return confirm("Do you want to delete account?");'>Delete Account</a></td>
        </tr>
        </table>
        </form>
        <?php } ?>
        </div>
        <div class="col-sm-3"></div>
    </div> 
</body>
</html>