	<?php
	include 'shared.php';
	$games = load_newgames();
	$oldgames = load_oldgames();
	?>
	<tr height="17px">
		<th> Game </th>
		<th> SOW </th>
		<th style="padding:8px;"> </th>
		<th> NOW </th>
		<th> </th>
	</tr>
	<?php
	foreach ($games as $game) {
		$c = 1;
		$pos = -1;
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
	?>