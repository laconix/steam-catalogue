<?php 
session_start();
session_regenerate_id();


if ($_GET['logout'] != true) {
	$userslist = @fopen('users','r');
	if ($userslist) {
		$i = 1;
		while (!feof($userslist)) {
			$buf = fgetcsv($userslist, 0, ':');
			$users[$i]['logname'] = $buf[0];
			$users[$i]['pass'] = $buf[1];
			$i++;
		}
		fclose($userslist);
	}

	foreach ($users as $user) {
		if (($user['logname'] == $_POST['logname']) && ($user['pass'] == md5($_POST['logpass']))) {
			$_SESSION['loggedin'] = true;
			$_SESSION['logname'] = $user['logname'];
		} else {
			$_SESSION['loggedin'] = false;
		}
	}
} else {
	session_destroy();
}
header('Location: /index.php');

?>
