<?php
session_start();
include 'dbConn.php';

$sql = "SELECT * FROM users";

$users = $db->query($sql);

if(isset($_SESSION['loggedIn'])){
    echo "Welcome: ".$_SESSION['userData']['username']." ";
    echo "<a href='logout.php'>Logout</a></br>";
} else {
    echo "<a href='login.php'>Login</a></br>";
}

while ($user = $users->fetchArray(1)){
    if($user['username'] == $_SESSION['userData']['username']){
        continue;
    } else {
        echo "<a href='conversation.php?user=".$user['username']."'>".$user['username']."</a></br>";
    }
}