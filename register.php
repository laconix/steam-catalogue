<?php 
session_start();
?>
<html>
<head />
<body>
<style>
table { text-align: left; border-collapse: collapse; }
tr:hover { background: lightblue; color: black; }
.center { margin-left: 28%; }
.nohover { background: white !important; color: black !important; }
</style>
<span class="center">
	Create a new user:
	<form method="post" action="newuser.php" class="center">
		<input type="text" name="newname">
		<input type="password" name="newpass"><br>
		<img src="captcha.php"><br>
		<input type="text" name="captcha">
		<input type="submit" value="create">
	</form>
	<?php
	if ($_GET['exists']) {
		echo 'That username is already taken, choose a new one!';
	} elseif ($_GET['robot']) { 
		echo 'Get outta here you damn stinkin\' robot. >:(';
	} else {
		echo 'Enter a user/pass then write the numbers in the box below them.';
	}
	?>
</span>
</body>
</html>
