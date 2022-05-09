<?php

require "Car.php";
session_start();

$imgDir = "./imgGallery";

$dir = scandir($imgDir);
array_shift($dir);
array_shift($dir);

$cars = [];
$f = fopen("./cars.csv", "r");
while (($line = fgetcsv($f)) !== FALSE) {
    $car = new Car($line[0], $line[1], $line[2], $line[3], $line[4], $line[5], $imgDir."/".$line[0]);
    array_push($cars, $car);
}
$_SESSION['cars'] = $cars;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Najlepsze fury by Przemo</title>
</head>
<body>
<?php
foreach ($cars as $car){
    echo "<a href='car.php?imgid=".$car->getid()."'>
                <img src=\"$imgDir/".$car->getid()."\" alt=\"".$car->getid()."\" style='height: 200px; width: 200px'/>
                </a><br>";
}
echo "<br>";
?>
</body>
</html>
