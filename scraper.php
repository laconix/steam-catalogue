<html>
<head />
<body>

<?php

$pages = 38;

file_put_contents("steam_new","");
for ($i = 1; $i <= $pages; $i++) {
	set_time_limit(180);
	$data = file_get_contents("http://store.steampowered.com/search/?sort_by=&sort_order=ASC&category1=998&price=0%2C1000000&page=" . $i);
	preg_match_all('/<div class="global_area_tabs_item_txt"><h3>(.*?)<\/h3>.*?<div class="global_area_tabs_item_price">(.*?)<\/div>/s', $data, $games, PREG_SET_ORDER);
	foreach ($games as $game) {
	$cost =  $game[2];
	if (strlen($game[2]) > 20) {
		$sale = 1;
		$cost = substr($game[2], stripos($game[2], "<br>")+9);
	} else {
		$sale = 0;
		$cost = substr($game[2], 5);
	}
	
		file_put_contents("steam_new", $game[1] . "|" . $cost . "|" . $sale . "\n",FILE_APPEND);
	}
}	

?>

</body>
</html>