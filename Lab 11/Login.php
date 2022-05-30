<?php
session_start();

if(isset($_SESSION['loggedUserId'])){
    header("Location: userPage.php");
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
        <label for="password">Password: </label><br>
        <input type="text" id="password" name="password"><br>
        <button type="submit">Log in</button><br>
    </form>
</body>
</html>