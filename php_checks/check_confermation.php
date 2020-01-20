<?php
    require_once '../connection.php';

    $conn = new mysqli(host,user,password,db);
    session_start();
    $gamername  =$_SESSION["username"];
    $gamemode   =$_SESSION["gamemode"];
    $key = $_SESSION["Key"];

    $query = "SELECT score From ongoing_game_list WHERE Game_Key = $key AND NOT gamername='$gamername'";
    if ($result = $conn->query($query)) {

        /* fetch object array */
        while ($row = $result->fetch_row()) {
            $_SESSION["score"] = $row[0]; 
        }

        /* free result set */
        $result->close();
    }
    $score = $_SESSION["score"];
   

    if (mysqli_connect_error()) {

        die("Connect Error(".mysqli_connect_errno().")".mysqli_connect_error());
       
    } else {
        $SELECT = "SELECT confirmation 
                    From ongoing_game_list 
                    Where gamername=? AND confirmation = 1 Limit 1";
        
        $stmt = mysqli_prepare($conn,$SELECT);
        $stmt->bind_param("s",$gamername);
        $stmt->execute();
        $stmt->bind_result($gamername);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        $_SESSION["alert"] = $rnum;
        session_abort();
        if ($_SESSION["alert"]==1){

            echo "<div class='alert alert-success mt-2' role='alert'>
                        <div class='row'>
                           Score: ".$_SESSION['score']."
                        </div>
                        <div class='row'>
                            Confirmed!
                        </div>
                    </div>";

            // print $_SESSION["sELECT"];
        }else{
            
            echo "<div class='alert alert-warning mt-2' role='alert'>
                        <div class='row'>
                        Score: ".$_SESSION["score"]."
                        </div>
                        <div class='row'>
                            Waiting for confirmation!
                        </div>
                      </div>";
        }
        
    }
    $conn->close();
    ?>