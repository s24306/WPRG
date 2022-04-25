<?php
$width = 400;
$height = 200;
$flag = imagecreatetruecolor($width, $height);

$white = imagecolorallocate($flag, 255, 255, 255);
$red = imagecolorallocate($flag, 255, 0, 0);

imagefill($flag, 0, 0, $white);
imagefilledrectangle($flag, 0, $height/2, $width, $width/2, $red);

header('Content-Type: image/png');
imagepng($flag);
?>