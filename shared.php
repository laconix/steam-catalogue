<?php
	/* load list of all steam games (hourly) */
function load_newgames() {
	$file = @fopen('steam_new', 'r');
	if ($file) {
		$i = 1;
		while (!feof($file)) {
			$buf = fgetcsv($file, 0, '|');
			if ($buf[0]) {
				$games[$i] = array('name' =>$buf[0], 'price' => $buf[1], 'sale' => $buf[2]);
				$i++;
			}
		}
		fclose($file);
	}
	return $games;
}

	/* load list of all steam games (weekly) */
function load_oldgames() {
	$oldfile = @fopen('steam_old', 'r');
	if ($oldfile) {
		$i = 1;
		while (!feof($oldfile)) {
			$buf = fgetcsv($oldfile, 0, '|');
			if ($buf[0]) {
				$oldgames[$i] = array('name' =>$buf[0], 'price' => $buf[1], 'sale' => $buf[2]);
				$i++;
			}
		}
		fclose($oldfile);
	}
	return $oldgames;
}
	
	/* load list of all steam games user is tracking */
function load_trackedgames() {
	$trackfile = @fopen('./track/' . $_SESSION['logname'], 'r');
	if ($trackfile) {
		$i = 1;
		while (!feof($trackfile)) {
			$buf = fgets($trackfile);
			if ($buf) {
				$tracked[$i] = $buf;
				$i++;
			}
		}
		fclose($trackfile);
	}
	return $tracked;
}
?>