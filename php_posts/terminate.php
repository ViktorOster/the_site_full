<?php
    session_start();
    require_once '../connection.php';

    $conn = new mysqli(host,user,password,db);
    
    $gamername  =$_SESSION["username"];
    if(isset($_POST['gamername'])){
        if (mysqli_connect_error()) {
            die("Connect Error(".mysqli_connect_errno().")".mysqli_connect_error());
            } else {
            
            
            
            
            $DELETE = "DELETE FROM ongoing_game_list WHERE Game_Key = ?";
            $INSERT_3 = "INSERT INTO terminated_game_list (gamername, gamemode, vs_type, serverr, amount, Game_Key, confirmation, dispute, score) 
                        SELECT gamername, gamemode, vs_type, serverr, amount, Game_Key,confirmation, dispute, score 
                        FROM ongoing_game_list 
                        WHERE Game_Key=?";
            
            $stmt = $conn->prepare($INSERT_3);
            $stmt->bind_param("i",$_SESSION["Key"]);
            $stmt->execute();
            $stmt->close();

            $stmt = $conn->prepare($DELETE);
            $stmt->bind_param("i",$_SESSION["Key"]);
            $stmt->execute();
            $stmt->close();
            header('Location: wager_insert.php'); 

            }
    }elseif(isset($_POST['username'])){
        $query = "SELECT Game_Key FROM ongoing_game_list WHERE gamername='$username'";
                
                if ($result = $conn->query($query)) {

                    /* fetch object array */
                    while ($row = $result->fetch_row()) {
                        $_SESSION["Key"]= $row[0];
                    }

                    /* free result set */
                    $result->close();
                }

                /* close connection */
                // echo $query;
                $key = $_SESSION["Key"];

        if (mysqli_connect_error()) {
            die("Connect Error(".mysqli_connect_errno().")".mysqli_connect_error());
            } else {
            
            
            
            
            $DELETE = "DELETE FROM ongoing_game_list WHERE Game_Key = ?";
            $INSERT_3 = "INSERT INTO terminated_game_list (id,gamername, gamemode, vs_type, serverr, amount, Game_Key, confirmation, dispute, score) 
                        SELECT id,gamername, gamemode, vs_type, serverr, amount, Game_Key,confirmation, dispute, score 
                        FROM ongoing_game_list 
                        WHERE Game_Key=?";
            
            $stmt = $conn->prepare($INSERT_3);
            $stmt->bind_param("i",$_SESSION["Key"]);
            $stmt->execute();
            $stmt->close();

            $stmt = $conn->prepare($DELETE);
            $stmt->bind_param("i",$_SESSION["Key"]);
            $stmt->execute();
            $stmt->close();
            header('Location: wager_insert.php'); 
            $conn->close();
            

            }
    }
    
    ?>