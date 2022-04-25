<?php
$width = 400;
$height = 200;
$flag = imagecreatetruecolor($width, $height);

$white = imagecolorallocate($flag, 255, 255, 255);
$red = imagecolorallocate($flag, 255, 0, 0);
$blue = imagecolorallocate($flag, 0, 0, 255);
$yellow = imagecolorallocate($flag, 255, 255, 0);


imagefill($flag, 0, 0, $yellow);
imagefilledrectangle($flag, 0, 0, 100, 80, $blue);
imagefilledrectangle($flag, 0, 120, 100, $height, $blue);
imagefilledrectangle($flag, 140, 0, $width, 80, $blue);
imagefilledrectangle($flag, 140, 120, $width, $height, $blue);


header('Content-Type: image/png');
imagepng($flag);
?>