<?php

require_once '../connection.php';
session_start();
$conn = new mysqli(host,user,password,db);
if (mysqli_connect_error()) {

    die("Connect Error(".mysqli_connect_errno().")".mysqli_connect_error());

    } else {
        $result = array();
        $messege = htmlspecialchars($_POST['messege'], ENT_QUOTES,'UTF-8');
        $from = isset($_POST['from'])?$_POST['from'] : null;
        $key = $_POST['key'] ;
        if (!empty($messege) && !empty($from)){
            $insert=("INSERT into comments (gamekey,user,comment,post_time) values(?,?,?,CURRENT_TIMESTAMP)");
            $stmt = $conn->prepare($insert);
            $stmt->bind_param("iss",$key,$from,$messege);
            $stmt->execute();
            $stmt->close();
        }
    }
    $conn->close();

?>