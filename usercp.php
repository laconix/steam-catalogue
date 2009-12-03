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
.center { margin-left: 28%; }
.nohover { background: white !important; color: black !important; }
</style>

<h3 class="center"><a href="index.php">home</a> > Games being tracked</h3>
<?php 
if ($_SESSION['track_exists'] == true) {
	$_SESSION['track_exists'] = false;
	echo '<span class="center">Sorry, you already added that game.</span>';
}
?>

<table class="center">
<tr class="nohover">
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

<table style="margin-left: 30%;">
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













