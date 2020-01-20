<?php

    require_once '../connection.php';

    $conn = new mysqli(host,user,password,db);
    session_start();
    $gamername  =$_SESSION["username"];
    $key = $_SESSION["Key"];
    if (empty($key)){
        $query = "SELECT Game_Key FROM ongoing_game_list WHERE gamername='$gamername'";
                    
            if ($result = $conn->query($query)) {

                /* fetch object array */
                while ($row = $result->fetch_row()) {
                    $_SESSION["Key"]= $row[0];
                }

                /* free result set */
                $result->close();
            }

            /* close connection */
            $key = $_SESSION["Key"];
        }
    
    if (mysqli_connect_error()) {
        die("Connect Error(".mysqli_connect_errno().")".mysqli_connect_error());
        } else {
        $UPDATE = "UPDATE ongoing_game_list SET dispute = 1 Where Game_Key = ?";
        $stmt = $conn->prepare($UPDATE);
        $stmt->bind_param("i",$key);
        $stmt->execute();
        $stmt->close();
        }
        $conn->close();
    
    ?>