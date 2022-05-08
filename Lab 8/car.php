<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fura</title>
</head>
<body>

<?php
$imgDir = "./imgGallery";

if(isset($_GET['imgid'])){
    $imgid = $_GET['imgid'];
} else {
    $imgid = 1;
}

$dir = scandir($imgDir);
array_shift($dir);
array_shift($dir);
$count = count($dir);

if ($imgid < 1 || $imgid - 1 >= $count || !is_Numeric($imgid)) {
    $imgid = 1;
}

$imgName = $dir[$imgid-1];
$first = 1;
$last = $count;
if($imgid < $count) {
    $next = $imgid+1;
} else {
    $next = $imgid;
}
if($imgid > 1) {
    $prev = $imgid-1;
} else {
    $prev = $imgid;
}
?>
<div>
    <div id="obraz" style="text-align:center">
        <?php
        echo "<img src=\"$imgDir/$imgid\" alt=\"$imgName\" />";
        ?>
    </div>
    <div id="opis" style="text-align:center">
        <?php
        echo "Obraz $imgName ($imgid z $count)";
        ?>
    </div>
    <div id="nawigacja" style="text-align:center">
        <?php
        if ($imgid > 1){
            echo "<a href='car.php?imgid=$first'>Pierwszy</a> ";
            echo "<a href='car.php?imgid=$prev'>Poprzedni</a> ";
        }
        if ($imgid < $count){
            echo "<a href='car.php?imgid=$next'>Następny</a> ";
            echo "<a href='car.php?imgid=$last'>Ostatni</a><br> ";
        }
        echo "<br>";
        echo "<button onclick=location.href='index.php'>Powrót do galerii</button> ";
        ?>
    </div>
</div>
</body>
</html>