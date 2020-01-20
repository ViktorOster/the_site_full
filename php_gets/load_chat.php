<?php
require_once '../connection.php';
session_start();
$key = $_POST['key'] ;
$conn = new mysqli(host,user,password,db);
$result = $conn->query("SELECT user,comment,post_time FROM comments WHERE gamekey= $key ");
while($row = $result->fetch_row()){
	$name=$row[0];
	$comment=$row[1];
    $time=$row[2];
?>
<div class="chats"><strong><?=$name?>:</strong> <?=$comment?> <p><?=date("j/m/Y g:i:sa", strtotime($time))?></p></div>
<?php
}
$conn->close();
?>
