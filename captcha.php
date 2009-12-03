<?php 
session_start();
session_regenerate_id();
header('Content-type: image/png');

$img = ImageCreate(100,20);
$captcha = gettimeofday();
$_SESSION['captcha'] = $captcha['usec'];
$bg = imagecolorallocate($img, 41,49,52);
$tc = imagecolorallocate($img, 70,85,85);
$lc = imagecolorallocate($img, 100,80,80);
$lines = rand(3,6);
for ($i=1; $i <= $lines; $i++) {
	imageline($img, rand(1,100),rand(1,20), rand(1,100),rand(1,20), $lc);
}
imagestring($img, 5, 22, 4, $captcha['usec'], $tc);

imagepng($img);
imagedestroy($img);
?>