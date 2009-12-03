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

<form method="post" action="newuser.php">
	<input type="text" name="newname">
	<input type="password" name="newpass"><br>
	<img src="captcha.php"><br>
	<input type="text" name="captcha">
	<input type="submit" value="create">
</form>

</body>
</html>
