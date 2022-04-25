<?php
$width = 400;
$height = 200;
$flag = imagecreatetruecolor($width, $height);

$white = imagecolorallocate($flag, 255, 255, 255);
$red = imagecolorallocate($flag, 255, 0, 0);
$blue = imagecolorallocate($flag, 0, 0, 255);
$yellow = imagecolorallocate($flag, 255, 255, 0);


imagefill($flag, 0, 0, $red);
imagefilledrectangle($flag, 100, 0, 150, $height, $white);
imagefilledrectangle($flag, 0, 80, $width, 120, $white);
imagefilledrectangle($flag, 110, 0, 140, $height, $blue);
imagefilledrectangle($flag, 0, 90, $width, 110, $blue);

header('Content-Type: image/png');
imagepng($flag);
?>