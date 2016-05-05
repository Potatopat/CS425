<?php
	include 'header.php';
?>

	<?php
		if (isset($_GET['forum'])) {
			$forum = $_GET['forum'];
			echo "<h1>$forum</h1>";
			if(isset($user) && $user == '2') {
				echo "<h2>You are a TA and may modify posts</h2>";
			}
			if($forum == "CS425") {
		?>
			<h3>Final Presentation</h3>
			<p>Created by: fake name</p>
			<h4>This is so kool</h4>
			<p>Posted by: fake name</p>
			<h4><?php if(isset($_GET['comment'])) { echo $_GET['comment']; } ?></h4>
		<?php
			}
			else {
				echo "<h3>Raydio</h3><p>Created by: Professor Awesome</p><h4>I like radio head</h4><p>Posted by: Professor Awesome</p>";
			}
		?>
			<form method="get">
				<input type="text" name="comment" <?php if($forum == "WIIT") {echo ('placeholder="Not a part of this interest group" disabled'); } ?>/>
				<input type="submit" value="Submit"/>
				<input type="hidden" name="forum" value="<?php echo $forum; ?>"/>
			</form>
		<?php
		}
		else {
	?>
		<form method="get">
			<p>Pick a forum</p>
			<input type="radio" name="forum" value="CS425"/>
			<label>CS425</label>
			<br>
			<input type="radio" name="forum" value="WIIT"/>
			<label>WIIT</label>
			<br>
			<input type="submit" value="Submit"/>
		</form>
	<?php
		}
	?>
<?php
	include 'footer.php';
?>