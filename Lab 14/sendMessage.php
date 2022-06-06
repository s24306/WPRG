<?php
session_start();

if(!isset($_POST['contents']) || !isset($_SESSION['userData'])){
    header("Location: index.php");
}

include 'dbConn.php';

$sql = "INSERT INTO messages(from_user_id, to_user_id, contents, sent)
VALUES (".$_SESSION['messageFromId']['user_id'].",
         ".$_SESSION['messageToId']['user_id'].",
          '".$_POST['contents']."',
           datetime('now'))";
var_dump($sql);
$db->exec($sql);

header("Location: conversation.php?user=".$_SESSION['messageToId']['username']);
