<?php
	include 'header.php';
?>
		
		<?php
			
			if (isset($_GET['course'])) {
				$course = $_GET['course'];
				die ("DONE!");
				$sql = "INSERT INTO igenrollment VALUES($user, $course)";
				$sql = mysqli_real_escape_string($dataBase->getCon(), $sql);
				$result = $dataBase->queryAny($sql);
				
				if($result === FALSE) {
					die ('Done!');
				}
				
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
			else {
				$result = $dataBase->queryAny("SELECT course_name, ig_name FROM course, classenrollment WHERE classenrollment.id=$user AND `classenrollment`.`course_id`=course.id");
				
				if($result === FALSE) {
					die (mysqli_error($this->con));
				}
				
				$a = $dataBase->resultArray();
				
				echo '<form method="get">';
				for ($i=0; $i < sizeof($a); $i++) {
					echo ('<input type="radio" value="' . $a[$i]['ig_name'] . '" name="course"/>');
					echo ("<label>" . $a[$i]['course_name'] . "</label>");
					echo ('<input type="hidden" name="user" value="' . $user . '"/>');
				}
				echo '<br><br><input type="submit" value="Submit"/>';
			}
		?>
		
<?php
	include 'footer.php';
?>
