<?php
spl_autoload_register(function ($Car) {
    include $Car . '.php';
});

$imgDir = "./imgGallery";

$dir = scandir($imgDir);
array_shift($dir);
array_shift($dir);

$cars = [];
$f = fopen("./cars.csv", "r");
while (($line = fgetcsv($f)) !== FALSE) {
    $car = Car($line[0], $line[1], $line[2], $line[3], $line[4], $line[5], $imgDir."/".$line[0]);
    array_push($cars, $car);
}
var_dump($cars);

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
foreach ($dir as $index=>$value){
    $index += 1;
    echo "<a href='car.php?imgid=$index'>
                <img src=\"$imgDir/$index\" alt=\"$index\" style='height: 200px; width: 200px'/>
                </a><br>";
}
echo "<br>";
?>
</body>
</html>
