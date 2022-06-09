<?php
$text = $amountToTransfer."".$fromCurrency." 
          was transferred from account Id ".$fromAccount."
          to the account Id ".$toAccount;
$date = date('m-d-Y_h-i-s_a', time());
$filename = "./Confirmation_".$date.".txt";
touch($filename);
chmod($filename, 777);
$f = file_put_contents($filename, $text, FILE_APPEND);
echo $f;
fclose();
?>