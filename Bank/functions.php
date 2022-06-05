<?php

function redirectIfCustomerNotLogged(){
    if(!isset($_SESSION['loggedCustomerData'])){
        header('Location: login.php');
    }
}

?>