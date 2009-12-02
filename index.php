<?php 
session_start();
include 'shared.php';
?>

<html>
<head />
<body>
<style>
table { text-align: left; border-collapse: collapse; }
tr:hover { background: lightblue; color: black; }
<?php
if ($_SESSION['loggedin'] == true) {
	echo "#loginframe { visibility:hidden; }";
	echo "#greetingframe { visibility:visible; }";
} else {
	echo "#loginframe { visibility:visible; }";
	echo "#greetingframe { visibility:hidden; }";
}
?>
</style>

<div id=loginframe>
<table align=right>
<form method=post action="login.php">
	<tr>
		<td><input style="border:1px solid gray;" name='logname' type='text'></td>
		<td><input style="border:1px solid gray;" name='logpass' type='password'></td>
	</tr>
	<tr>
		<td></td>
		<td align=right><input type='submit' value='login'></td>
	</tr>
</table>
<br><br>
</div>
<div id=greetingframe>
<table align=right>
<form method=get action="login.php?logout=true">
	<tr>
		<td>Greetings <?php echo $_SESSION['logname'] ?></td>
		<td></td>
	</tr>
	<tr>
		<td align=right><a href='usercp.php'>UserCP</a></td>
		<td align=right><input type='submit' value='logout'></td>
	</tr>
</table>
<br><br>
</div>

<table>
<tr height=17px;><th> Game </th><th> SOW </th><th width=15px> </th><th> NOW </th><th> </th></tr>

<?php
$i = 1;
foreach ($games as $game) {
	$c = 1;
	$pos = 1;
	foreach ($oldgames as $check) {
		if ($game["name"] == $check["name"]) {
			$pos = $c;
		}
		$c++;
	}
	
	echo "<tr><td>" . substr($game["name"], 0, 30) . "</td><td>$" . $oldgames[$pos]["price"] . "</td>";
	if ($game["price"] > $oldgames[$pos]["price"]) {
		echo "</td><td style='background-image:url(\"up.PNG\");'></td>";
	} elseif ($game["price"] < $oldgames[$pos]["price"]) {
		echo "</td><td style='background-image:url(\"down.PNG\");'></td>";
	} else {
		echo "</td><td style='background-image:url(\"no.PNG\");'></td>";
	}
	if ($game["sale"]) {
		echo "<td style='background:yellow;'>$" . $game["price"] . "</td><td style='background:red;'> On sale </td></tr>";
	} else {
		echo "<td>$" . $game["price"] . "</td>";
	}

	$i++;
}

?>

</table>
</body>
</html>













