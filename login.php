<?php 
session_start();
session_regenerate_id();
include 'shared.php';
$users = load_userlist();

if ($_GET['logout']) {
	session_destroy();
} 
if ($_GET['login']) {
	foreach ($users as $user) {
		if (($user['name'] == $_POST['name']) && ($user['pass'] == md5($_POST['pass']))) {
			$_SESSION['loggedin'] = true;
			$_SESSION['name'] = $user['name'];
		}
	}
}

header('Location: index.php');
?>
