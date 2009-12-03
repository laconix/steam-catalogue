<?php 
session_start();
session_regenerate_id();

if ($_SESSION['captcha'] == $_POST['captcha']) {
	echo 'damned stinkin\' human';
} else {
	echo 'damned stinkin\' robot';
}

?>