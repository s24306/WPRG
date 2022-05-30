<?php
session_start();
$id = $_SESSION['carId'];
$make = $_POST['make'];
$model = $_POST['model'];
$price = $_POST['price'];
$year = $_POST['year'];
$description = $_POST['description'];
echo $id, $make, $model, $price, $year, $description;

$db = new SQLite3('LocalDB.db');

$results = $db->query("UPDATE cars
                             SET make ='".$make."',
                             model ='".$model."',
                             price =".$price.",
                             year =".$year.",
                             description ='".$description."'
                             WHERE id=".$id." ");
header("Location: index.php");
?>
