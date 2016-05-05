<?php
	include 'connect.php';
	
	$dataBase = new connect('localhost', 'root', 'password', 'cs425');
	$dataBase->selectTable('person');
	$dataBase->json();
?>

<html>
	<style>
		table, th, td {
		    border: 1px solid black;
		    border-collapse: collapse;
		}
	</style>
	<body>
		<?php
			if(isset($_GET['sql'])) {
				$result = $dataBase->queryAny($_GET['sql']);
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
		?>
		<form method="get">
			<label for="sql">Query Literally Anything SQL: </label>
			<input type="text" id="sql" name="sql"/>
			<input type="submit" value="Submit"/>
		</form>
		<?php
			if(isset($_GET['user'])) {
				$user = $_GET['user'];
				$dataBase->selectTable('person');
				$result = $dataBase->selectAnyMult("f_name, l_name", "person", "id=" . $user . "");
				$a = $dataBase->resultArray();
				echo "<p>Welcome " . $a[0]['f_name'] . " " . $a[0]['l_name'] . "!</p>";
			}
		?>
		<div id="head">
			<ul style="position: inline-block;">
				<li><a href="
					<?php 
						if(isset($_GET['user'])) {
							echo ("/cs425/cs425/?user=$user");
						}
						else echo "/cs425/cs425";
					?>
				">Home</a></li>
				<li><a href="
					<?php 
						if(isset($_GET['user'])) {
							echo ("/cs425/cs425/tables.php/?user=$user");
						}
						else echo "/cs425/cs425/tables.php";
					?>
				">View All Tables</a></li>
				<li><a href="
					<?php 
						if(isset($_GET['user'])) {
							echo ("/cs425/cs425/profile.php/?user=$user");
						}
						else echo "/cs425/cs425/profile.php";
					?>
				">Profile</a></li>
			</ul>
			
		</div>
