<?php 
session_start();
require_once 'connection.php';

$conn = new mysqli(host,user,password,db);
if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="SELECT `User`, `Pass` FROM `loginform` WHERE `User`=? AND `Pass`=? AND `admin`=1";
    $stmt_2 = $conn->prepare($sql);
    $stmt_2->bind_param("ss",$uname,$password);
    $stmt_2->execute();
    $stmt_2->bind_result($uname,$password);
    $stmt_2->store_result();
    $rnum_2 = $stmt_2->num_rows;

    if($rnum_2==1){

        //Start a session.
        //........some processing
        
        //After you have checked that the username is correct.
        $_SESSION['username'] = $uname;
        
        $_SESSION['logged_in'] = TRUE;
        //Save some other things you might need like login key.
        // $_SESSION['login_key'] = user_login_key;

        header('Location: moderator.php');

        exit();
    }
    else{
        //After you have checked that the username is correct.
        $_SESSION['logged_in'] = FALSE;
        header('Location: index.php');

        exit();
    }
        
}
?>