<?php
    require_once '../connection.php';

    $conn = new mysqli(host,user,password,db);
    session_start();
    $gamername  =$_SESSION["username"];
    $gamemode   =$_SESSION["gamemode"];
    session_abort();

    $conf           = 0;

    if (mysqli_connect_error()) {

        die("Connect Error(".mysqli_connect_errno().")".mysqli_connect_error());
       
    } else {
        $SELECT = "SELECT confirmation 
                    From ongoing_game_list 
                    Where NOT gamername=? AND confirmation = 1 Limit 1";
        
        $stmt = mysqli_prepare($conn,$SELECT);
        $stmt->bind_param("s",$gamername);
        $stmt->execute();
        $stmt->bind_result($gamername);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        $stmt->close();
        
        session_start();
        $_SESSION["alert"] = $rnum;
        session_abort();
        if ($_SESSION["alert"]==1){

            echo "<div class='alert alert-success mt-2' role='alert'>Confirmed!</div>";

            // print $_SESSION["sELECT"];
        }else{
            
            echo "<div class='alert alert-warning mt-2' role='alert'>
            Waiting for confirmation!
                      </div>";
        }
        
    }
    $conn->close();
    ?>