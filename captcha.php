<?php 
session_start();
session_regenerate_id();
header('Content-type: image/png');

$img = ImageCreate(100,20);
$captcha = gettimeofday();
$_SESSION['captcha'] = $captcha['usec'];
$bg = imagecolorallocate($img, 255,255,255);
$fc[1] = imagecolorallocate($img, 70,85,rand(30,120));
$fc[2] = imagecolorallocate($img, 70,85,rand(30,120));
$lines = rand(3,6);
for ($i=1; $i <= $lines; $i++) {
	imageline($img, rand(1,100),rand(1,20), rand(1,100),rand(1,20), $fc[rand(1,2)]);
}
imagestring($img, 5, 22, 4, substr($captcha['usec'],0,3), $fc[1]);
imagestring($img, 5, 50, 4, substr($captcha['usec'],3), $fc[2]);

imagepng($img);
imagedestroy($img);
?>