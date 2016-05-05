<?php
	include "header.php";
?>
	
	<?php 
		if (isset($_GET['course']) && isset($_GET['student'])) {
			$course = $_GET['course'];
			$student = $_GET['student'];
			
			if ($student == 'fake name') {
				echo "$student has NOT completed this class, and therefore may NOT become a TA of $course!";
			}
			else {
				echo "$student has taken this class and has succesfully been added as a TA of $course!";
			}
	?>
		
	<?php
		}
		else {
	?>

	<form method="get">
		<p>Course</p>
		<input type="checkbox" name="course" value="CS425"/>
		<label>CS425</label>
		
		<p>Student</p>
		<input type="checkbox" name="student" value="fake name"/>
		<label>fake name</label>
		<br>
		<input type="checkbox" name="student" value="Other Person"/>
		<label>Other Person</label>
		
		<br>
		<input type="submit" value="Submit"/>
	</form>
	
	<?php
		}
	?>

<?php
	include "footer.php";
?>