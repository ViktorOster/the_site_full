<?php
    require_once '../connection.php';

    $conn = new mysqli(host,user,password,db);
    session_start();
    $gamername  =$_SESSION["username"];

    $conf           = 0;

    if (mysqli_connect_error()) {

        die("Connect Error(".mysqli_connect_errno().")".mysqli_connect_error());
       
    } else {
        $SELECT = "SELECT gamername 
                    From terminated_game_list 
                    Where Game_Key=?";
        
        $stmt = mysqli_prepare($conn,$SELECT);
        $stmt->bind_param("i",$_SESSION["Key"]);
        $stmt->execute();
        $stmt->bind_result($_SESSION["Key"]);
        $stmt->store_result();
        $rnum_ter = $stmt->num_rows;
        $stmt->close();
        $_SESSION["terminate_number"] = $rnum_ter
        
        if ($rnum_ter==2){
            header('Location: http://localhost/the_site/wager_page.php');
        }
        
    }
    $conn->close();
    ?>