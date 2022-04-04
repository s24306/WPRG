<?php
if(!isset($_COOKIE['BestPapież']) && !isset($_POST['papiez'])){
    include("header.html");
    include("CookieMain.php");
    include("footer.html");
} else if(isset($_COOKIE['BestPapież'])){
    include("header.html");
    echo "Najlepszy papież już został wybrany, powodzenia następnym razem<br>";
    echo "<a href='CookieMain.php'>Powrót do ankiety<a/>";
    include("footer.html");
} else {
    setcookie('BestPapież', $_POST['papiez'], time()+15);
    include("header.html");
    echo "Dziękujemy za głosowanie na {$_POST['papiez']} <br>";
    echo "<a href='CookieMain.php'>Powrót do ankiety<a/>";
    include("footer.html");
}