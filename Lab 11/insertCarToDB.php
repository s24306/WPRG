<?php
session_start();

$db = new SQLite3('LocalDB.db');

$make = $_POST["make"];
$model = $_POST["model"];
$price = $_POST["price"];
$year = $_POST["year"];
$description = $_POST["description"];
$userID = $_SESSION['loggedUserId'];
$results = $db->query("INSERT INTO cars (make, model, price, year, description, user_id)
                             VALUES ('".$make."', '".$model."', $price, $year, '".$description."', $userID)");
header("Location: userPage.php");
?>