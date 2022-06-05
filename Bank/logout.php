<?php
session_start();
session_destroy();
setcookie("loggedIn", "", time()-3600);
header("Location: index.php");
?>
