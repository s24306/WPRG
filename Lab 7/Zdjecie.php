<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Papież na dziś</title>
</head>
<body>

<?php
include 'functions.php';
$imgDir = "./imgGallery";

if(isset($_GET['imgid'])){
    $imgid = $_GET['imgid'];
} else {
    $imgid = 0;
}

$dir = scandir($imgDir);
array_shift($dir);
array_shift($dir);
usort($dir, cmp());
$count = count($dir);

if ($imgid < 0 || $imgid >= $count || !is_Numeric($imgid)) {
    $imgid = 0;
}

$imgName = $dir["$imgid"];
$first = 0;
$last = $count - 1;
if($imgid < $count - 1) {
    $next = $imgid + 1;
} else {
    $next = $count - 1;
}
if($imgid > 0) {
    $prev = $imgid - 1;
} else {
    $prev = 0;
}
?>
<div>
    <div id="obraz" style="text-align:center">
        <?php
        echo "<img src=\"$imgDir/$imgName\" alt=\"$imgName\" />";
        ?>
    </div>
    <div id="opis" style="text-align:center">
        <?php
            $imgid++;
            echo "Obraz $imgName ($imgid z $count)";
        ?>
    </div>
    <div id="nawigacja" style="text-align:center">
        <?php
        if ($imgid > 1){
            echo "<a href='Zdjecie.php?imgid=$first'>Pierwszy</a> ";
            echo "<a href='Zdjecie.php?imgid=$prev'>Poprzedni</a> ";
        }
        if ($imgid < $count){
            echo "<a href='Zdjecie.php?imgid=$next'>Następny</a> ";
            echo "<a href='Zdjecie.php?imgid=$last'>Ostatni</a><br> ";
        }
        echo "<br>";
        echo "<button onclick=location.href='index.php'>Powrót do galerii</button> ";
        ?>
    </div>
</div>
</body>
</html>