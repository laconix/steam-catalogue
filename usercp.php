<?php 
session_start();
if ($_SESSION['loggedin'] != true) {
	header('Location: /index.php');
}
include 'shared.php';
?>

<html>
<head />
<body>
<style>
table { text-align: left; border-collapse: collapse; }
tr:hover { background: lightblue; color: black; }
</style>
<h3>Games being tracked</h3>
<?php 
if ($_SESSION['track_exists'] == true) {
	$_SESSION['track_exists'] = false;
	echo 'Sorry, you already added that game.';
}
?>

<table>
<tr>
<th>
	<form method="post" action="add.php">
		<select name="toadd">
		
		<?php
		
		foreach ($games as $game) {
			echo '<option value="' . $game['name'] . '">' . $game['name'] . '</option>';
		}
		
		?>
		
		</select>
		<input type="submit" value="Add">
	</form>
</table>

<table>
<tr><th>Games</th></tr>
<?php
if ($tracked) {
	foreach ($tracked as $track) {
		echo '<tr><td>' . $track . '</td></tr>';
	}
}
?>

</table>
</body>
</html>













