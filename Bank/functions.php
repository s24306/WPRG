<?php

function redirectIfCustomerNotLogged(){
    if(!isset($_SESSION['loggedCustomerData'])){
        header('Location: login.php');
    }
}

function generateConfirmationOfPayment($amountToTransfer, $fromCurrency, $fromAccount, $toAccount){
    umask(0002);
    $text = $amountToTransfer."".$fromCurrency." 
          was transferred from account Id ".$fromAccount."
          to the account Id ".$toAccount;
    $date = date('m-d-Y_h-i-s_a', time());
    $filename = "./Confirmation_".$date.".txt";
    $f = fopen($filename, 'w+');
    chmod($filename, 777);
    file_put_contents($filename, $text, FILE_APPEND);
    fclose($f);
    if (file_exists($filename)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($filename));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filename));
        ob_clean();
        flush();
        readfile($filename);
        exit;
    }
}
?>