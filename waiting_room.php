<?php 
    session_start();
    require_once 'connection.php';
    $conn = new mysqli(host,user,password,db);
    $gamername = $_SESSION["username"];

    $SELECT = "SELECT gamername From wager_list Where gamername = ?";
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param('s',$gamername); 
    $stmt->execute();
    $stmt->store_result();
    $check_2 = $stmt->num_rows;
    $stmt->close();

    if ($_SESSION['logged_in']==FALSE)
    {
        header("Location:http://localhost/the_site/login.html");
    }elseif ($check_2 == 1){
        
        
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> 


    <link rel="stylesheet" href="css/search_css.css" />
    <script type="text/javascript" src="js/js.js"></script>


</head>

<body>
    <!------ Include the above in your HEAD tag ---------->
    <section class="wager">
        
        <div class="row align-items-center">
            <div class="card col-md-6 align-self-center justify-content-center text-center" >
                <img src="img/ava.jpg" class="card-img-top" style="width: 18rem;" alt="...">
                <div class="card-body text-center mt-2 align-self-center justify-content-center">
                    <h5 class="card-title"><?php echo $_SESSION["username"]; ?></h5>
                    <p class="btn btn-primary" align="right">Hi - <?php echo $_SESSION['username'];  ?> - <a href="logout.php">Logout</a></p>
                </div>
            </div>
            <div class="card col-md-6" >
            <form id="cancel_wager"  method="POST" onsubmit="myButton.disabled = true; return true;">
                    
                    <input type="submit" class="btn btn-primary" type="submit" name="myButton" value="Cancel Wager">  
            </form>
            </div>
        </div>
    </section>
    <table class='table table-bordered'>
        <tr>
            <th>Game Mode</th><th>Number of Players</th><th>Server</th><th>Amount</th>
        </tr>
        
        <?php

            foreach($conn->query("SELECT gamemode,serverr,amount,COUNT(*) FROM   wager_list  WHERE gamemode='Fortnite Boxfight' AND serverr='EU' AND  amount=5") as $row) {
                echo "<tr>";
                echo "<td>" . $row['gamemode'] . "</td>";
                echo "<td>" . $row['COUNT(*)'] . "</td>";
                echo "<td>" . $row['serverr'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "</tr>"; 
            }

            foreach($conn->query("SELECT gamemode,serverr,amount,COUNT(*) FROM   wager_list  WHERE gamemode='Fortnite Boxfight' AND serverr='EU' AND  amount=10") as $row) {
                echo "<tr>";
                echo "<td>" . $row['gamemode'] . "</td>";
                echo "<td>" . $row['COUNT(*)'] . "</td>";
                echo "<td>" . $row['serverr'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "</tr>"; 

            }

            foreach($conn->query("SELECT gamemode,serverr,amount,COUNT(*) FROM   wager_list  WHERE gamemode='Fortnite Boxfight' AND serverr='EU' AND  amount=15") as $row) {
                echo "<tr>";
                echo "<td>" . $row['gamemode'] . "</td>";
                echo "<td>" . $row['COUNT(*)'] . "</td>";
                echo "<td>" . $row['serverr'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "</tr>"; 

            }

            foreach($conn->query("SELECT gamemode,serverr,amount,COUNT(*) FROM   wager_list  WHERE gamemode='Fortnite Boxfight' AND serverr='NAE' AND  amount=5") as $row) {
                echo "<tr>";
                echo "<td>" . $row['gamemode'] . "</td>";
                echo "<td>" . $row['COUNT(*)'] . "</td>";
                echo "<td>" . $row['serverr'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "</tr>"; 
            }

            foreach($conn->query("SELECT gamemode,serverr,amount,COUNT(*) FROM   wager_list  WHERE gamemode='Fortnite Boxfight' AND serverr='NAE' AND  amount=10") as $row) {
                echo "<tr>";
                echo "<td>" . $row['gamemode'] . "</td>";
                echo "<td>" . $row['COUNT(*)'] . "</td>";
                echo "<td>" . $row['serverr'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "</tr>"; 

            }

            foreach($conn->query("SELECT gamemode,serverr,amount,COUNT(*) FROM   wager_list  WHERE gamemode='Fortnite Boxfight' AND serverr='NAE' AND  amount=15") as $row) {
                echo "<tr>";
                echo "<td>" . $row['gamemode'] . "</td>";
                echo "<td>" . $row['COUNT(*)'] . "</td>";
                echo "<td>" . $row['serverr'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "</tr>"; 

            }


            foreach($conn->query("SELECT gamemode,serverr,amount,COUNT(*) FROM   wager_list  WHERE gamemode='Fortnite Buildfight' AND serverr='EU' AND  amount=5") as $row) {
                echo "<tr>";
                echo "<td>" . $row['gamemode'] . "</td>";
                echo "<td>" . $row['COUNT(*)'] . "</td>";
                echo "<td>" . $row['serverr'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "</tr>"; 
            }

            foreach($conn->query("SELECT gamemode,serverr,amount,COUNT(*) FROM   wager_list  WHERE gamemode='Fortnite Buildfight' AND serverr='EU' AND  amount=10") as $row) {
                echo "<tr>";
                echo "<td>" . $row['gamemode'] . "</td>";
                echo "<td>" . $row['COUNT(*)'] . "</td>";
                echo "<td>" . $row['serverr'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "</tr>"; 

            }

            foreach($conn->query("SELECT gamemode,serverr,amount,COUNT(*) FROM   wager_list  WHERE gamemode='Fortnite Buildfight' AND serverr='EU' AND  amount=15") as $row) {
                echo "<tr>";
                echo "<td>" . $row['gamemode'] . "</td>";
                echo "<td>" . $row['COUNT(*)'] . "</td>";
                echo "<td>" . $row['serverr'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "</tr>"; 

            }

            foreach($conn->query("SELECT gamemode,serverr,amount,COUNT(*) FROM   wager_list  WHERE gamemode='Fortnite Buildfight' AND serverr='NAE' AND  amount=5") as $row) {
                echo "<tr>";
                echo "<td>" . $row['gamemode'] . "</td>";
                echo "<td>" . $row['COUNT(*)'] . "</td>";
                echo "<td>" . $row['serverr'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "</tr>"; 
            }

            foreach($conn->query("SELECT gamemode,serverr,amount,COUNT(*) FROM   wager_list  WHERE gamemode='Fortnite Buildfight' AND serverr='NAE' AND  amount=10") as $row) {
                echo "<tr>";
                echo "<td>" . $row['gamemode'] . "</td>";
                echo "<td>" . $row['COUNT(*)'] . "</td>";
                echo "<td>" . $row['serverr'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "</tr>"; 

            }

            foreach($conn->query("SELECT gamemode,serverr,amount,COUNT(*) FROM   wager_list  WHERE gamemode='Fortnite Buildfight' AND serverr='NAE' AND  amount=15") as $row) {
                echo "<tr>";
                echo "<td>" . $row['gamemode'] . "</td>";
                echo "<td>" . $row['COUNT(*)'] . "</td>";
                echo "<td>" . $row['serverr'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "</tr>"; 

            }

        ?>
        </tbody>
    </table>

</body>

</html>
<?php
}else{
    header('Location: http://localhost/the_site/wager_page.php');
}
?>