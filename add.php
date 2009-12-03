<?php 
session_start();
if ($_SESSION['loggedin'] != true) {
	header('Location: /index.php');
}
include 'shared.php';

$exists = false;
if ($tracked) {
	$trackfile = @fopen('./track/' . $_SESSION['logname'], 'w');
	foreach ($tracked as $track) {
		if (trim($track) == $_POST['toadd']) {
			$exists = true;
		} else {
			fputs($trackfile, $track);
		}
	}
}


if ($exists) {
	$_SESSION['result'] = false;
} else {
	$_SESSION['result'] = true;
	file_put_contents('./track/' . $_SESSION['logname'], $_POST['toadd'] . "\n",FILE_APPEND);
}
header('Location: /usercp.php');
?>
