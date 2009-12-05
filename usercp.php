<?php 
session_start();
if ($_SESSION['loggedin'] != true) {
	header('Location: index.php');
}
include 'shared.php';
$games = load_newgames();
$oldgames = load_oldgames();
$tracked = load_trackedgames($_SESSION['name']);
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
if ($_SESSION['result'] === false) {
	echo '<span class="center" style="font-size:small;">Game was successfully deleted</span>';
} elseif ($_SESSION['result'] == true) {
	echo '<span class="center" style="font-size:small;">Game was successfully added</span>';
} else {
	//do nothing
}
$_SESSION['result'] = NULL;
?>
	
<table class="center">
<tr class="nohover">
<th>
	<form method="post" action="add.php">
		<select name="toadd">
		
		<?php
		sort($games);
		foreach ($games as $game) {
			echo '<option value="' . $game['name'] . '">' . $game['name'] . '</option>';
		}
		?>
		
		</select>
		<input type="submit" value="Add/Delete">
	</form>	
</th>
</tr>
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













