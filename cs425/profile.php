<?php
	include 'header.php';
?>

		<?php
			if(isset($_GET['user'])) {
				$dataBase->selectTable('person');
				$result = $dataBase->selectAnyMult("f_name, l_name", "person", "id=" . $user . "");
				$a = $dataBase->resultArray();
				//echo "<p>Welcome " . $a[0]['f_name'] . " " . $a[0]['l_name'] . "!</p>";
				
				$result = $dataBase->queryAny('CALL FindPublicDetails(`' . $a[0]['f_name'] . " " . $a[0]['l_name'] . '`)');
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
				echo "</table><br><br>";
			}
			else {
				echo "Please Login";
			}
		?>

<?php
	include 'footer.php';
?>