<?php

    require_once '../connection.php';

    $conn = new mysqli(host,user,password,db);
    session_start();
    $gamername              =   $_SESSION["username"];
    $gamemode               =   $_POST["gamemode"];
    $vs_type               =   $_POST["vs_type"];
    $amount                 =   $_POST["amount"];
    $serverr                =   $_POST["server"];



    $SELECT = "SELECT gamername From wager_list Where gamername = ?";
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param('s',$gamername); 
    $stmt->execute();
    $stmt->store_result();
    $check_2 = $stmt->num_rows;
    $stmt->close();

    $SELECT_2 = "SELECT gamername From ongoing_game_list Where gamername = ?";
    $stmt = $conn->prepare($SELECT_2);
    $stmt->bind_param('s',$gamername); 
    $stmt->execute();
    $stmt->store_result();
    $check_3 = $stmt->num_rows;
    $stmt->close();

    $check = "SELECT gamemode,vs_type,serverr,amount From wager_list WHERE gamemode = ? AND vs_type=? AND serverr=? AND amount=?";
    $stmt = $conn->prepare($check);
    $stmt->bind_param("sssi",$gamemode,$vs_type,$serverr,$amount); 
    $stmt->execute();
    $stmt->store_result();
    $check = $stmt->num_rows;
    $stmt->close();

    if (!empty($gamername) || !empty($gamemode) || !empty($vs_type) ||!empty($serverr) || !empty($amount)) {

        if (mysqli_connect_error()) {

            die("Connect Error(".mysqli_connect_errno().")".mysqli_connect_error());

            } else {
                    if($check_3>0){
                            $_SESSION['print']=4;
                    }elseif($check_2>0){
                            $_SESSION['print']=3;
                    }elseif($check==1){
                            // players are matched up and moced to the ongoing gane list 
                            // this loop will insert the matched up players into the ongoing game db With an additional colum to give them a uniuqe lable inorder to identify them as being ingaged in a game
                            $rand     = rand(0, 500000000);
                            $_SESSION["Key"]=$rand;

                            $INSERT_1 = "INSERT INTO ongoing_game_list (gamername, gamemode, vs_type, serverr, amount, Game_Key) values(?,?,?,?,?,?)";
                            $DELETE_1 = "DELETE FROM wager_list WHERE gamemode=? AND vs_type=? AND serverr=? AND amount=?";
                            // $INSERT_3 = "INSERT INTO ongoing_game_list (gamemode, vs_type, serverr, amount,Game_Key) SELECT gamemode, vs_type, serverr, amount FROM wager_list WHERE Game_Key=? AND gamemode=? AND vs_type=? AND serverr=? AND amount=?";

                            $INSERT_3 = "INSERT INTO ongoing_game_list (gamername, gamemode, vs_type, serverr, amount, Game_Key) SELECT gamername,gamemode, vs_type, serverr, amount, ? FROM wager_list WHERE gamemode=? AND vs_type=? AND serverr=? AND amount=?";


                            $stmt = $conn->prepare($INSERT_1);
                            $stmt->bind_param("ssssii",$gamername,$gamemode,$vs_type,$serverr,$amount,$rand);
                            $stmt->execute();
                            $stmt->close();

                            $stmt = $conn->prepare($INSERT_3);
                            $stmt->bind_param("isssi",$rand,$gamemode,$vs_type,$serverr,$amount);
                            $stmt->execute();
                            $stmt->close();

                            $stmt = $conn->prepare($DELETE_1);
                            $stmt->bind_param("sssi",$gamemode,$vs_type,$serverr,$amount);
                            $stmt->execute();
                            $stmt->close();

                            $_SESSION['print'] = 1;

                            // header('Location: http://localhost/the_site/game_page.php');
                            // echo "window.location = 'http://localhost/the_site/game_page.php';";
                            
                    }elseif($check==0 || $check_2==0){
                            $INSERT = "INSERT INTO wager_list (gamername, gamemode, vs_type, serverr, amount) values(?,?,?,?,?)";

                            $stmt = $conn->prepare($INSERT);
                            $stmt->bind_param("ssssi",$gamername,$gamemode,$vs_type,$serverr,$amount);
                            $stmt->execute();
                            $stmt->close();

                            $_SESSION['print'] = 2;
                    }

        }
    }

    if ($_SESSION['print']==1){
        echo "Game Mode Activated Sucessfully!";
    }
    if ($_SESSION['print']==2){
        echo "Player in que!!";
    }
    if ($_SESSION['print']==3){
        echo "Someone with the entered gamer tag is already in que!";
    }
    if ($_SESSION['print']==4){
        echo "Someone with the entered gamer tag is already in game!!";
    }
    // if ($_SESSION['print']>0)

?>