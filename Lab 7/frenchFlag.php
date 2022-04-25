<?php
$width = 400;
$height = 200;
$flag = imagecreatetruecolor($width, $height);

$white = imagecolorallocate($flag, 255, 255, 255);
$red = imagecolorallocate($flag, 255, 0, 0);
$blue = imagecolorallocate($flag, 0, 0, 255);


imagefill($flag, 0, 0, $blue);
imagefilledrectangle($flag, $width/3, 0, ($width/3)*2, $width, $white);
imagefilledrectangle($flag, ($width/3)*2, 0, $width, $width, $red);


header('Content-Type: image/png');
imagepng($flag);
?>