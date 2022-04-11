<?php
include "MyFirstSiteCMS.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS</title>
</head>
<body>
<form action="MyFirstSiteCMS.php" method="get">
    <p>Co chcesz zmienić wariacie?</p>
    <div>
        <h3>Main site</h3>
        <label for="MainSiteName">Main site name</label><br>
        <input type="text" name="MainSiteName" id="MainSiteName" value='<?php echo $sitesList[0][0]; ?>'><br>
        <label for="MainSiteContent">Main site content</label><br>
        <input name="MainSiteContent" id="MainSiteContent" value='<?php
        echo $sitesList[0][2]
        ?>'>
    </div>

    <div>
        <h3>Second site</h3>
        <label for="SecondSiteName">Second site name</label><br>
        <input type="text" name="SecondSiteName" id="SSecondSiteName" value='<?php
        echo $sitesList[1][0]
        ?>'><br>
        <label for="SecondSiteContent">Second site content</label><br>
        <input name="SecondSiteContent" id="SecondSiteContent" value='<?php
        echo $sitesList[1][2]
        ?>'>
    </div>

    <div>
        <h3>Third site</h3>
        <label for="ThirdSiteName">Third site name</label><br>
        <input type="text" name="ThirdSiteName" id="ThirdSiteName" value='<?php
        echo $sitesList[2][0]
        ?>'><br>
        <label for="ThirdSiteContent">Third site content</label><br>
        <input name="ThirdSiteContent" id="ThirdSiteContent" value='<?php
        echo $sitesList[2][2]
        ?>'>
    </div><br>

    <div>
        <button type="submit">Update sites</button>
    </div>
</form>
</body>
</html>