<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }

        .navBar{
            display: inline;
            float:right;
            margin-right: 1em;
        }
    </style>
    <title>The Bill Bank</title>
</head>
<body>
<div>
    <a class="navBar" href="aboutUs.php">About Us </a>
    <a class="navBar" href="contactUs.php"> Contact Us</a>
</div><br>
<div>
    <ul>
        <li><a href="index.php">Home</a></li>
        <?php
        if(!isset($_SESSION['loggedIn'])){?>
            <li style="float:right"><a href="login.php">Login</a></li>
        <?php }else{?>
            <li style="float:right"><a href="customerPage.php">My account</a></li>
        <?php }
        ?>
        <li style="float:right"><a href="customerCreation.php">Create an account</a></li>
    </ul>
</div>
<br>
