<?php
$site1 = ['name' => 'Strona główna', 'link' => 'mainsite', 'content' => 'This is a main site'];
$site2 = ['name' => 'Strona druga', 'link' => 'secondsite', 'content' => 'This is a secondary site'];
$site3 = ['name' => 'Strona trzecia', 'link' => 'thirdsite', 'content' => 'This is a 3 site'];
$sitesList = [$site1, $site2, $site3];
$pageLink = $_GET['link'];
$siteArr = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyFirstSite :)</title>
</head>
<body>
    <?php
        if(isset($pageName)){
            foreach($sitesList as $sites){
                if($sites['link'] == $pageLink){?>
                    <h1><?php $sites['name']; ?></h1><br/>
                    <?php $siteArr = key($sites);
                }
            }
        }
        foreach($sitesList as $sites){?>
            <a href="MyFirstSite.php?link=<?php $sites['link']; ?>"><?php $sites['name']; ?></a><br/>
                <?php $siteArr = key($sites);
            }
        if(isset($pageName)){ ?>
            <p><?php $sitesList[$siteArr]['content']; ?><p/>
            <?php
        }

    ?>
</body>
</html>
