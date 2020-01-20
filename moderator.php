<?php
session_start();
if ($_SESSION['logged_in']==FALSE)
{
    header("Location: login_admin.hpp");
}else{
    require_once 'connection.php';

    $conn = new mysqli(host,user,password,db);

?>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
    <script type="text/javascript" src="js/chat_js.js"></script>



</head>

<body>
    <div class="row">
        <div class="col-md-6">
            
            <br />

            <h3 align="center">Dispute Room</a></h3><br />
            <br />

            <div class="table-responsive">
                <h4 align="center">List of disputes allocated to you</h4>
                <p align="right">Hi - <?php echo $_SESSION['username'];  ?> - <a href="logout.php">Logout</a></p>
                <div id="user_details"></div>
                    <!-- Modal -->
            <!-- Modal -->
            </div>
            
        </div>
        
        <div class="col-md-6">
            <div id="body" class="table-responsive">
                
            </div>
        </div>
    </div>
 
</body>

</html>



<?php
}
?>