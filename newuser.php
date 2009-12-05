<?php 
session_start();
session_regenerate_id();
include 'shared.php';
$users = load_userlist();

if ($_SESSION['captcha'] == $_POST['captcha']) {
	//damned stinkin' human
	foreach ($users as $user) {
		if ($user['name'] == $_POST['newname']) {
			header('Location: register.php?exists=true');
		}
	}
	file_put_contents('users', $_POST['newname'] . ':' . md5($_POST['newpass']) . "\n", FILE_APPEND);
	header('Location: index.php?newuser=true');
} else {
	header('Location: register.php?robot=true');
}

?>