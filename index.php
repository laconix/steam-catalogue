<?php 
session_start();
include 'shared.php';
$games = load_newgames();
$oldgames = load_oldgames();
$tracked = load_trackedgames($_SESSION['name']);
?>

<html>
<head>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript"> 
$(document).ready(function(){
	$("#gamecatalogue table").load("loadgames.php");
});
</script>
<body>
<style>
table { text-align: left; border-collapse: collapse; }
tr:hover { background: lightblue; color: black; }
.nohover { background: white !important; color: black !important; }
a { font-size:small; }
</style>

<table style="margin-left: 9%;">
<tr class="nohover">
<td class="nohover" width="50%">
	<div id="gamecatalogue">
		<table>
		</table>
		loading...
	</div>
</td>
<td width="100%" valign="top" align="left" class="nohover">
	<table>
		<tr style="color: red;">				
		<td class="nohover" align="right" colspan=4>
			<?php
			$login = '<form method="post" action="login.php?login=true">' .
				'<input style="border:1px solid gray;" name="name" type="text">' .
				'<input style="border:1px solid gray;" name="pass" type="password">' .
				'<input type="submit" value="login"><br>' .
			'<a href="register.php">register</a></form>';
			
			$loggedin = '<form style="font-size:small;" method="post" action="login.php?logout=true">' .
				'Greetings ' . $_SESSION['name'] . ': ' .
				'<a href="usercp.php">usercp</a> - ' .
				'<input type="submit" value="logout">' .
			'</form>';
			if (isset($_SESSION['loggedin'])) {
				echo $loggedin;
			} else {
				echo $login;
			}
			?>
		</td>
		</tr>
		<tr align="left" class="tracking">
			<th align="center" colspan="5">
				<u>Games being tracked</u>
			</th>
		</tr>
		<tr height="17px" class="tracking">
			<th width="305px"> Game </th>
			<th> SOW </th>
			<th style="padding:8px;"> </th>
			<th> NOW </th>
			<th style="padding-right:35px;"> </th>
		</tr>
		<?php
		if ($tracked && $_SESSION['loggedin']) {
			echo '';
			foreach ($games as $game) {
				$c = 1;
				$pos = -1;
				$match = false;
				foreach ($tracked as $track) {
						if ($game['name'] == trim($track)) {
						foreach ($oldgames as $check) {
							if ($game['name'] == $check['name']) {
								$pos = $c;
							}
							$c++;
						}
						echo '<tr><td>' . substr($game['name'], 0, 30) . '</td><td>$' . $oldgames[$pos]['price'] . '</td>';
						if ($game['price'] > $oldgames[$pos]['price']) {
							echo '</td><td style="background-image:url(up.PNG);"></td>';
						} elseif ($game['price'] < $oldgames[$pos]['price']) {
							echo '</td><td style="background-image:url(down.PNG);"></td>';
						} else {
							echo '</td><td style="background-image:url(no.PNG);"></td>';
						}
						if ($game['sale']) {
							echo '<td style="background:yellow;">$' . $game['price'] . '</td><td style="background:red;"> sale </td></tr>';
						} else {
							echo '<td>$' . $game['price'] . '</td>';
						}
					}
				}
			}
		} else {
			echo '<td colspan="5"> Not tracking any games </td>';
		}
	?>
	</table>
	<br><br>	
</td>
</tr>
</table>
</body>
</html>









