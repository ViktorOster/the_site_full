<?php
    require_once '../connection.php';

    $conn = new mysqli(host,user,password,db);
    session_start();
    $gamername  =$_SESSION["username"];
    $score   =$_POST["score"];

    if (!empty($score)){

        if (mysqli_connect_error()) {
            die("Connect Error(".mysqli_connect_errno().")".mysqli_connect_error());
           } else {
            $UPDATE = "UPDATE `ongoing_game_list` SET `score` = ? WHERE `gamername`=?";
            $stmt = $conn->prepare($UPDATE);
            $stmt->bind_param("is",$score,$gamername);
            $stmt->execute();
            $stmt->close();
           }
    }
    ?>