<?php
session_start();
include 'header.php'
?>
    <form action="checkCredentials.php" method="post">
        <label for="login">Login: </label><br>
        <input type="text" id="login" name="login"><br>
        <label for="password">Password: </label><br>
        <input type="password" id="password" name="password"><br>
        <button type="submit">Login</button><br>
    </form>
<?php
include 'footer.php'
?>
