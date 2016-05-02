<?php
	include 'connect.php';
	
	$dataBase = new connect('localhost', 'root', 'password', 'cs425');
	$dataBase->selectTable('test');
	$dataBase->json();
?>

<html>
	<body>
		<?php
			if(isset($_GET['user'])) {
				$user = $_GET['user'];
				$dataBase->selectTable('Person');
				$result = $dataBase->selectAnyMult("first_name, last_name", "Person", "'id'='" . $user . "'");
				
			}
		?>
		<div id="head">
			<ul style="position: inline-block;">
				<li><a href="/">Home</a></li>
				<li><a href=""></a></li>
			</ul>
			
		</div>
