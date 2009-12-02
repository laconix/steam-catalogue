<?php 
session_start();
if ($_SESSION['loggedin'] != true) {
	header("Location: /index.php");
}
include 'shared.php';

$exists = false;

if ($tracked) {
	foreach ($tracked as $track) {
		if (trim($track) == $_POST['toadd']) {
			$exists = true;
		}
	}
}
	
if ($exists) {
	$_SESSION['track_exists'] = true;
} else {
	file_put_contents("./track/" . $_SESSION["logname"], $_POST['toadd'] . "\n",FILE_APPEND);
}

header("Location: /usercp.php");
?>
