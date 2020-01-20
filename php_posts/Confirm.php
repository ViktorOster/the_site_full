<?php

    require_once '../connection.php';

    $conn = new mysqli(host,user,password,db);
    session_start();
    $gamername  =$_SESSION["username"];

    $confirm   =$_POST["confirm"];

    if (mysqli_connect_error()) {
        die("Connect Error(".mysqli_connect_errno().")".mysqli_connect_error());
        } else {
        $UPDATE = "UPDATE `ongoing_game_list` SET `confirmation` = 1 WHERE `gamername`=?";
        $stmt = $conn->prepare($UPDATE);
        $stmt->bind_param("s",$gamername);
        $stmt->execute();
        $stmt->close();
        }

    ?>