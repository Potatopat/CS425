<?php
	include 'header.php';
?>
		<form action="<?php if(isset($_GET['user'])) { echo ("/cs425/cs425/tables.php/?user=$user"); } else echo "/cs425/cs425/tables.php"; ?>" method="get">
			<input type="radio" name="table" value="classenrollment" id="classenrollment"/>
			<label for="classenrollment">Class Enrollment</label>
			<br>
			<input type="radio" name="table" value="course" id="course"/>
			<label for="course">Course</label>
			<br>
			<input type="radio" name="table" value="courseta" id="courseta"/>
			<label for="courseta">Course TA</label>
			<br>
			<input type="radio" name="table" value="forum" id="forum"/>
			<label for="forum">Forum</label>
			<br>
			<input type="radio" name="table" value="forumcomm" id="forumcomm"/>
			<label for="forumcomm">Forum Comment</label>
			<br>
			<input type="radio" name="table" value="igenrollment" id="igenrollment"/>
			<label for="igenrollment">Interest Group Enrollment</label>
			<br>
			<input type="radio" name="table" value="interestgroup" id="interestgroup"/>
			<label for="interestgroup">Interest Group</label>
			<br>
			<input type="radio" name="table" value="joblist" id="joblist"/>
			<label for="joblist">Job List</label>
			<br>
			<input type="radio" name="table" value="person" id="person"/>
			<label for="person">Person</label>
			<br>
			<input type="radio" name="table" value="personlogin" id="personlogin"/>
			<label for="personlogin">Person Login</label>
			<br>
			<input type="radio" name="table" value="privacy" id="privacy"/>
			<label for="privacy">Privacy</label>
			<br>
			<input type="radio" name="table" value="professor" id="professor"/>
			<label for="professor">Professor</label>
			<br>
			<input type="radio" name="table" value="student" id="student"/>
			<label for="student">Student</label>
			<br>
			<input type="radio" name="table" value="ta" id="ta"/>
			<label for="ta">TA</label>
			
			<br>
			
			<input type="submit" value="Submit" />
		</form>
		
		<?php
			if (isset($_GET['table'])) {
				$table = $_GET['table'];
				$dataBase->selectTable($table);
				$result = $dataBase->selectAny("*", $table, "1", "1");
				$a = $dataBase->resultArray();
				
				echo "<table><tr>";
				foreach ($a[0] as $j => $k) {
					echo "<th>$j</th>";
				}
				echo "</tr>";
				for ($i=0; $i < sizeof($a); $i++) {
					echo "<tr>";
					foreach ($a[$i] as $j => $k) {
						echo "<td>$k</td>";
					}
					echo "</tr>";
				}
				echo "</table>";
			}
		?>

<?php
	include 'footer.php';
?>