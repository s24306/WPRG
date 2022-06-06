<?php
session_start();

if(isset($_SESSION['InvalidLogin'])){
    echo $_SESSION['InvalidLogin']."</br>";
}

if(isset($_SESSION['loggedIn'])){
    header("Location: index.php");
}

?>
    <form action="checkCredentials.php" method="post">
        <label for="login">Login: </label><br>
        <input type="text" id="login" name="login"><br>
        <label for="password">Password: </label><br>
        <input type="password" id="password" name="password"><br>
        <button type="submit">Login</button><br>
    </form>
