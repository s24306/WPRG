<?php
session_start();
unset($_SESSION['logged']);
echo "Go touch some grass";
session_destroy();
header("Location: index.php");
?>