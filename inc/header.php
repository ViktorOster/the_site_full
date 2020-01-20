<?php
    session_start();
    require_once 'connection.php';
    $conn = new mysqli(host,user,password,db);
    if(!isset($_SESSION['logged_in'])) {
        $_SESSION['logged_in'] = false;
    } 
    //$gamername = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/search_css.css" />    
    <link rel="stylesheet" href="css/main.css">
    <!-- <link rel="stylesheet" href="css/chat_css.css" /> -->

    <title>Loyal Wagers</title>
</head>

<body>

    <nav class="navbar">
        <div class="container">
            <a href="./index.php">
                <div class="navbar__logo">
                    <!-- Loyal <br> Wagers -->
                    <img src="./assets/loyalwagers_logo_yellow.svg" alt="">
                </div>
            </a>

            <ul class="nav-links">
                <li><a href="./index.php">Home</a></li>
                <li><a href="./wager_page.php">Wagers</a></li>
                <li><a href="./help.php">Help</a></li>
                <li><a href="./contact.php">Contact</a></li>
            </ul>
            <div class="ml-auto">
                <?php 
                    if($_SESSION['logged_in']) {
                        echo '<span class="nav__username">Welcome ' . $_SESSION["username"] . '!</span>';
                        echo '
                            <a href="logout.php">
                                <button class="button button--main button--square">Log Out</button>
                            </a>
                        ';
                    }
                    else {
                        echo '
                            <a href="login_admin.php" class="mr-3">
                            <button class="button button--outline">Admin Login</button>
                            </a>
                            <a href="login.php" class="mr-3">
                                <button class="button button--outline">Login</button>
                            </a>
                            <a href="register.php">
                                <button class="button button--main button--square">Sign Up</button>
                            </a>
                        ';
                    }
                ?>
                
               
            </div>

        </div>
    </nav>

    <nav class="navbar-mobile">
        <div class="container">
            <a href="./index.php">
                <div class="navbar__logo">
                    <!-- Loyal <br> Wagers -->
                    <img src="./assets/loyalwagers_logo_yellow.svg" alt="">
                </div>
            </a>

            <div class="text-right">
                <div id="hamburger">
                    <div id="hamburger__line-1"></div>
                    <div id="hamburger__line-2"></div>
                    <div id="hamburger__line-3"></div>
                </div>
            </div>
        </div>


        <ul id="navbar-mobile__links nav-links" class="ml-auto mr-auto">
            <li><a href="./index.php">Home</a></li>
            <li><a href="./wagers.php">Wagers</a></li>
            <li><a href="./help.php">Help</a></li>
            <li><a href="./contact.php">Contact</a></li>
        </ul>
    </nav>

    <main>