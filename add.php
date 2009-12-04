<?php 
session_start();
if ($_SESSION['loggedin'] != true) {
	header('Location: /index.php');
}
include 'shared.php';
$tracked = load_trackedgames($_SESSION['name']);

$exists = false;
if ($tracked) {
	$trackfile = @fopen('./track/' . $_SESSION['name'], 'w');
	foreach ($tracked as $track) {
		if (trim($track) == trim($_POST['toadd'])) {
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
	file_put_contents('./track/' . $_SESSION['name'], $_POST['toadd'] . "\n",FILE_APPEND);
}
header('Location: /usercp.php');
?>
