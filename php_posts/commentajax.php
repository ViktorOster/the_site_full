<?php

require_once '../connection.php';

$conn = new mysqli(host,user,password,db);
session_start();

if(!empty($_POST['comment']) && !empty($_SESSION['username']))
{
  $comment=htmlspecialchars($_POST['comment'], ENT_QUOTES,'UTF-8');
  $name=$_SESSION['username'];
  $key = $_POST['key'];
  $insert=("INSERT into comments (gamekey,user,comment,post_time) values(?,?,?,CURRENT_TIMESTAMP)");
  $stmt = $conn->prepare($insert);
  $stmt->bind_param("iss",$key,$name,$comment);
  $stmt->execute();
  $stmt->close();
  // echo 1;
}

?>