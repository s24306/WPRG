
<?php

if(!isset($amountToTransfer)){
    header('Location: index.php');
}

header("Content-type: image/png");
$string = $amountToTransfer."".$fromCurrency." 
          was transferred from account Id ".$fromAccount."
          to the account Id ".$toAccount;
$im     = imagecreatefrompng("images/Confirmation.png");
$orange = imagecolorallocate($im, 220, 210, 60);
$px     = (imagesx($im) - 7.5 * strlen($string)) / 2;
imagestring($im, 3, $px, 9, $string, $orange);
$date = date('m-d-Y_h-i-s a', time());
imagepng($im, $file = "Confirmation_".$date.".png");
imagedestroy($im);

?>
