<?php
session_start();

if(isset($_SESSION['logged'])){
    header("Location: AdminPage.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
</head>
<body>
    <form action="checkCredentials.php" method="post">
        <label for="login">Login: </label><br>
        <input type="text" id="login" name="login"><br>
        <label for="password">Hasło: </label><br>
        <input type="text" id="password" name="password"><br>
        <button type="submit">Zaloguj</button><br>
    </form>
</body>
</html>