<?php
    require_once '../connection.php';

    $conn = new mysqli(host,user,password,db);
    session_start();
    $gamername  =$_SESSION["username"];
    $key  =$_SESSION["Key"];
    $conf           = 0;

    if (mysqli_connect_error()) {

        die("Connect Error(".mysqli_connect_errno().")".mysqli_connect_error());
       
    } else {
        $SELECT = "SELECT dispute 
                    From ongoing_game_list 
                    Where NOT gamername=? AND dispute = 1 AND Game_Key = ? Limit 1";
        
        $stmt = mysqli_prepare($conn,$SELECT);
        $stmt->bind_param("si",$gamername,$key);
        $stmt->execute();
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        $stmt->close();
        
        $_SESSION["alert"] = $rnum;
        if ($_SESSION["alert"]==1){

            echo "<div class='alert alert-danger mt-2' role='alert' style='height:5rem; width:10rem'>Dispute Risen!</div>";

            // print $_SESSION["sELECT"];
        }else{
            
            echo "<div class='alert alert-warning mt-2' role='alert'>
            No Dispute!
                      </div>";
        }
        
    }
    $conn->close();
    ?>