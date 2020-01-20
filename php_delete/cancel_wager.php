<?php

    require_once '../connection.php';

    $conn = new mysqli(host,user,password,db);
    session_start();
    $gamername = $_SESSION["username"];
    $DELETE = "DELETE FROM `wager_list` WHERE gamername=?";
    $stmt = $conn->prepare($DELETE);
    $stmt->bind_param("s",$gamername);
    $stmt->execute();
    $stmt->close();

    echo 1;
    // header('Location: http://localhost/the_site/wager_page.php');