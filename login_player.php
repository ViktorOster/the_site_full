<?php 

    require_once 'connection.php';
    session_start();
    $conn = new mysqli(host,user,password,db);

    $email  =   $_POST['Email'];
    $password  =   $_POST['password'];

    $sql="SELECT `email`, `password` FROM `users` WHERE `email`=? AND `password`=?";
    $stmt_2 = $conn->prepare($sql);
    $stmt_2->bind_param("ss",$email,md5($password));
    $stmt_2->execute();
    $stmt_2->bind_result($email,md5($password));
    $stmt_2->store_result();
    $rnum_2 = $stmt_2->num_rows;

    if($rnum_2==1){

        //Start a session.
        //........some processing
        
        //After you have checked that the username is correct.
        $_SESSION['Email'] = $email;
        $_SESSION['logged_in'] = TRUE;
        //Save some other things you might need like login key.
        // $_SESSION['login_key'] = user_login_key;
        $query = "SELECT `gamername` FROM `users` WHERE `email`='".$email."' AND `password`='".md5($password)."'";
            if ($result = $conn->query($query)) {

                /* fetch object array */
                while ($row = $result->fetch_row()) {
                    $_SESSION["username"] = $row[0];
                }

                /* free result set */
                $result->close();
            }

        /* close connection */
        $conn->close();

        header('Location: wager_page.php');

    }
    else{
        echo " You Have Entered Incorrect Password";
        //After you have checked that the username is correct.
        $_SESSION['logged_in'] = FALSE;
        header('Location: index.php');
        $conn->close();
        exit();
    }

?>