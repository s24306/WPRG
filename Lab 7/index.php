<?php
include 'functions.php';
$imgDir = "./imgGallery";
$dir = scandir($imgDir);
array_shift($dir);
array_shift($dir);
usort($dir, cmp());
$imgid = 0;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>2 JP2 Najlepszy</title>
</head>
<body>
    <?php
    foreach ($dir as $d){
        $imgName = $dir["$imgid"];
        echo "<a href='Zdjecie.php?imgid=$imgid'>
                <img src=\"$imgDir/$imgName\" alt=\"$imgName\" style='height: 200px; width: 200px'/>
                </a>";
        $imgid++;
    }
    ?>
</body>
</html>
