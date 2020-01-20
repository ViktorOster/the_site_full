<?php

    require_once '../connection.php';

    $conn = new mysqli(host,user,password,db);
    session_start();
    $admin  =$_SESSION["username"];
    $key = $_SESSION["gamekey"];
    
    if (mysqli_connect_error()) {
        die("Connect Error(".mysqli_connect_errno().")".mysqli_connect_error());
        } else {
            $score = $_POST["score_update"];
            $UPDATE = "UPDATE `ongoing_game_list` SET `score`=? WHERE `Game_Key`=?";
            $stmt = $conn->prepare($UPDATE);
            $stmt->bind_param("ii",$score,$key);
            $stmt->execute();
            $stmt->close();

            $INSERT_3 = "INSERT INTO setteled (gamername,gamekey,score,admin) SELECT gamername,Game_Key,score,? From ongoing_game_list Where Game_Key = ?";
            $stmt = $conn->prepare($INSERT_3);
            $stmt->bind_param("si",$_SESSION["username"],$key);
            $stmt->execute();
            $stmt->close();

            // insert into winnig db

            // delete from ongoing game
        }
        $conn->close();
        

    ?>