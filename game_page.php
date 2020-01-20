<?php

//require_once 'connection.php';
include 'inc/header.php';

$conn = new mysqli(host,user,password,db);

// obtain the username of the opponent
session_start();


/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();}


        $key =isset($_SESSION['Key'])?$_SESSION['Key'] : null;
        $username = $_SESSION["username"];
        if (empty($key)){
                $query = "SELECT Game_Key FROM ongoing_game_list WHERE gamername='$username'";
                
                if ($result = $conn->query($query)) {

                    /* fetch object array */
                    while ($row = $result->fetch_row()) {
                        $_SESSION["Key"]= $row[0];
                    }

                    /* free result set */
                    $result->close();
                }
                $query = "SELECT gamername,gamemode,vs_type,amount,Game_Key FROM ongoing_game_list WHERE Game_Key = $key AND NOT gamername='$username'";
                    if ($result = $conn->query($query)) {
    
                        /* fetch object array */
                        while ($row = $result->fetch_row()) {
                            $_SESSION["value"] = $row[0]; 
                            $_SESSION["gamemode"] = $row[1];
                            $_SESSION["vs_type"] = $row[2];
                            $_SESSION["amount"] = $row[3];
                            $_SESSION["Key"]= $row[4];
                        }
    
                        /* free result set */
                        $result->close();
                    }

                /* close connection */
                $conn->close();
            }else{
                $query = "SELECT Game_Key FROM ongoing_game_list WHERE gamername='$username'";
                
                if ($result = $conn->query($query)) {

                    /* fetch object array */
                    while ($row = $result->fetch_row()) {
                        $_SESSION["Key"]= $row[0];
                    }

                    /* free result set */
                    $result->close();
                }

                /* close connection */
                // echo $query;
                $key = $_SESSION["Key"];

                $query = "SELECT gamername,gamemode,vs_type,amount,Game_Key FROM ongoing_game_list WHERE Game_Key = $key AND NOT gamername='$username'";
                if ($result = $conn->query($query)) {

                    /* fetch object array */
                    while ($row = $result->fetch_row()) {
                        $_SESSION["value"] = $row[0]; 
                        $_SESSION["gamemode"] = $row[1];
                        $_SESSION["vs_type"] = $row[2];
                        $_SESSION["amount"] = $row[3];
                        $_SESSION["Key"]= $row[4];
                    }

                    /* free result set */
                    $result->close();
                }

                /* close connection */
                $conn->close();
                
        }


// if(!empty($_SESSION["value"]) && !empty($_SESSION["gamemode"])){

?>

<p  align="right">Hi - <?php echo $_SESSION['username'];  ?> - <a class="btn btn-primary" href="logout.php">Logout</a></p>
<div class="row justify-content-md-center">
    <div class="col-md-2"></div>
    <div class="card col-md-2" style="width: 18rem;">
        <img src="img/ava.jpg" class="card-img-top" alt="...">
        <div class="card-body text-center mt-2">
            <h5 class="card-title"><?php echo $_SESSION["username"]; ?></h5>
        </div>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>
    <div class="card col-md-2" style="width: 18rem;">
        <img src="img/ava.jpg" class="card-img-top" alt="...">
        <div class="card-body text-center">
            <h5 class="card-title"><?php echo $_SESSION["value"]; ?></h5>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>

<div class="row justify-content-center align-items-center mt-5 mb-5">
    <div class="col-md-2"></div>
    <div class="card col-md-2 align-items-center text-center">
        <form id="score" method="POST" onsubmit="myButton.disabled = true; return true;">
            <input type="text" name="score" required>
            <input id="submit_butt" type="submit" class="btn btn-danger wrn-btn" name="myButton" value="Submit" />
        </form>
    </div>
    <div class="col-md-4 text-center">
        <h5 class="card-title">Score</h5>
    </div>


    <!-- This script reffers to the server every 1s to check if the other player has confermed the score entered -->
    <div id="conf" class="card col-md-2 align-items-center text-center"></div>

    <div class="col-md-2"></div>
</div>

<div class="row justify-content-center align-items-center mt-5 mb-5">
    <div class="col-md-2"></div>

    <!-- This script reffers to the server every 1s to check if the other player has confermed the score entered -->

    <div id="conf_1" class="card col-md-2 align-items-center text-center">


    </div>



    <div class="col-md-4 justify-content-md-center text-center">
        <form id="Dispute" method="POST" onsubmit="dispute.disabled = true; return true;">
            <input id="Dispute_butt" type="submit" onclick="dispute(<?php echo $_SESSION['Key'] ?>)"  class="btn btn-danger wrn-btn" name="dispute" value="Dispute" />
        </form>
    </div>
    <div class="card text-center col-md-2">
        <form id="Confirm" method="POST" onsubmit="confirm.disabled = true; return true;">

            <input id="Confirm_butt" type="submit" class="btn btn-danger wrn-btn" name="confirm" value="Confirm" />
        </form>
    </div>
    <div class="col-md-2"></div>
</div>

<div class="row justify-content-center align-items-center mt-5 mb-5">
    <div class="col-md-2"></div>


    <div class="card col-md-2 align-items-center text-center">
        
    <form method="post" action="" enctype="multipart/form-data" id="myform">
            
            <div >
                <input type="file" id="file" name="file" />
                <input type="button" class="button" value="Upload" id="but_upload">
            </div>
        </form>

    </div>



    <div class="col-md-4 justify-content-md-center text-center">

    </div>
    
    <div class="card text-center col-md-2">

    </div>
    <div class="col-md-2"></div>
</div>


<div class="row justify-content-center align-items-center mt-5 mb-5">
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>

    <div id="conf_2" class="card col-md-4 align-items-center text-center"></div>
    <div class="col-md-2">
        <form id="terminate" method="POST">
            <input id="terminate_butt" type="submit" class="btn btn-danger wrn-btn" name="terminate"
                value="Terminate" onclick="deleteAllCookies()" />
        </form>
    </div>
    <div id="terminater" class="col-md-2"></div>
</div>



<div class="row justify-content-center align-items-center mt-5 mb-5">
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>

    <div class="card col-md-4 align-items-center text-center">
        <div id="chatbox"></div>

        <form name="message" action="">
            <input id="messege" name="usermsg" type="text" id="usermsg" size="63" />
            <input name="submitmsg" type="submit" id="submitmsg" value="Send" />
        </form>
    </div>
    <div class="col-md-2">
    </div>
    <div id="terminater" class="col-md-2"></div>
</div>


<script type="text/javascript" src="js/js.js"></script>
<script type="text/javascript" src="js/chat_js.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>

<script>
var from = '<?php echo $_SESSION["username"]; ?>',
    key = <?php echo $_SESSION["Key"]; ?> ;
$(document).ready(function () {
    // from = prompt('name');
    $('form').submit(function (e) {
        $.post('php_posts/chat_insert.php', {
            messege: $('#messege').val(),
            from: from,
            key: key
        });
        $('#messege').val()
        return false;

    })
});

function load() {
    $.post('php_gets/load_chat.php', {
        key: key
    }, function (result) {
        $('#chatbox').html(result);
    });
}
setInterval(function () {
    load();
}, 1000);
</script>
<script type="text/javascript">

$(document).ready(function(){

    $("#but_upload").click(function(){

        var fd = new FormData();

        var files = $('#file')[0].files[0];

        fd.append('file',files);

        $.ajax({
            url:'php_posts/upload_img.php',
            type:'post',
            data:fd,
            contentType: false,
            processData: false,
            success:function(response){
                if(response != 0){
                    $("#img").attr("src",response);
                    alert(response);
                }else{
                    alert('File not uploaded');
                }
            }
        });
    });
});

</script>

<?php include 'inc/footer.php' ?>
