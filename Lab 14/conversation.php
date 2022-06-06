<?php
session_start();

if(!isset($_SESSION['loggedIn'])){
    header("Location: index.php");
}

include 'dbConn.php';

$loggedUser = $_SESSION['userData']['username'];
$sql = "SELECT user_id, username FROM users WHERE username='".$loggedUser."'";
$loggedUserId = $db->query($sql)->fetchArray(1);
$_SESSION['messageFromId'] = $loggedUserId;

$recipient = $_GET['user'];
$sql = "SELECT user_id, username FROM users WHERE username='".$recipient."'";
$recipientId = $db->query($sql)->fetchArray(1);
$_SESSION['messageToId'] = $recipientId;

echo "<h3>Conversation with ".$recipient."</h3>";

$sql = "SELECT * FROM messages
        WHERE (from_user_id=".$loggedUserId['user_id']."
        AND to_user_id=".$recipientId['user_id'].")
        OR (from_user_id=".$recipientId['user_id']."
        AND to_user_id=".$loggedUserId['user_id'].")
        ORDER BY sent";

$messages = $db->query($sql);

?>

<div style="height:400px;width:700px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
    <?php
    while ($message = $messages->fetchArray(1)){
        echo "<p style='color: gray; display: inline-block; margin-bottom: -.5em;'>".$message['sent']."</p>
    <p style='color: red; display: inline-block; margin-bottom: -.5em;'>".
            $db->query("SELECT username FROM users WHERE user_id=".$message['from_user_id'])
                ->fetchArray(1)['username']."</p>:
    <p style='display: inline-block; margin-bottom: -.5em;'>".$message['contents']."</p></br>";
    }
    ?>
</div>

<form action="sendMessage.php" method="post">
    <label for="contents">Message:</label>
    <input type="text" id="contents" name="contents">
    <input type="submit" value="Send">
</form>


<a href="index.php">Leave conversation</a>
