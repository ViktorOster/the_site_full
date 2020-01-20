<?php
session_start();
if ($_SESSION['logged_in']==FALSE)
{
    header("Location:login_admin.php");
}else{
    require_once 'connection.php';

    $conn = new mysqli(host,user,password,db);
    
    $Game_key   = $_POST['gamekey'];
    $_SESSION['gamekey'] = $_POST['gamekey'];
    $username   = $_SESSION['username'];

    $query = "SELECT gamername From ongoing_game_list Where Game_Key = $Game_key";
    
    $result = $conn->query($query);
    
    /* numeric array */
    $row = $result->fetch_array(MYSQLI_ASSOC);

    $gamername  = $row["gamername"];

    $query ="SELECT `gamername`, `score`, `image` FROM `ongoing_game_list` WHERE `Game_Key` = $Game_key AND `gamername`='$gamername'";
    
        if ($result = $conn->query($query)) {

            /* fetch object array */
            while ($row = $result->fetch_row()) {
                $_SESSION["gamername_1"] = $row[0]; 
                $_SESSION["score_1"] = $row[1];
                $_SESSION["image_1"] = $row[2];
            }

            /* free result set */
            $result->close();
        }


    $query1 ="SELECT `gamername`, `score`, `image` FROM `ongoing_game_list` WHERE `Game_Key` = $Game_key AND NOT `gamername`='$gamername'";
    
        if ($result1 = $conn->query($query1)) {

            /* fetch object array */
            while ($row1 = $result1->fetch_row()) {
                $_SESSION["gamername_2"] = $row1[0]; 
                $_SESSION["score_2"] = $row1[1];
                $_SESSION["image_2"] = $row1[2];
            }

            /* free result set */
            $result1->close();
        }

        /* close connection */
        $conn->close();

    ?>


    <link rel="stylesheet" href="css/search_css.css" />
    <script type="text/javascript" src="js/js.js"></script>
    <script type="text/javascript" src="js/chat_js.js"></script>
    <script>
        $(document).ready(function () {
            $('#score_admin_update').submit(function () {
                
                var score_update = $("#score_update").val();

                $.ajax({
                        type: 'POST',
                        url: 'php_posts/admin_update.php',
                        data: $(this).serialize(),
                        success: function (result) {

                            alert(result);
                        }
                    })

                    .fail(function () {

                        // just in case posting your form failed
                        alert("Posting failed.");

                    });

                // to prevent refreshing the whole page page
                return false;

            });
        });
    </script>

    <div class="modal-body">
        <div id="result">

        </div>
    </div>

    <div class="modal-header">

        <div>
            <div class="col-md-4">
                <?php
                echo $_SESSION["score_1"];
                ?>
            </div>
            <div class="col-md-8">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">ScreenShot</button>

                <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                        <img src="<?php echo $_SESSION["image_1"];?>">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div>
            <div class="col-md-4">
                <?php
                echo $_SESSION["score_2"];
                ?>
            </div>
            <div class="col-md-8">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl1_1">ScreenShot</button>

                <div class="modal fade bd-example-modal-xl_1" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                        <img src="<?php echo $_SESSION["image_2"];?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="col-md-4">
            Your Name: <input type="text" value="<?= $_SESSION['username'] ?>" class="session-text" disabled>
            </div>
            <div class="col-md-8">
                <form id="score_admin_update" method="POST" onsubmit="myButton.disabled = true; return true;">
                    <input type="text" name="score_update" required>
                    <input id="submit_butt" type="submit" class="btn btn-danger wrn-btn" name="myButton" value="Submit" />
                </form>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <div class="col-md-12">
            <form method='post' action="#" onsubmit="return post();" id="my_form" name="my_form">
                <div id="form-container">
                    <div class="form-text">
                        <input type="text" style="display:none" id="username" name="username"
                            value="<?= $_SESSION['username'] ?>">
                        <input type="text" style="display:none" id="key" name="key" value="<?= $_SESSION['gamekey'] ?>">
                        <input type="text" name="comment" id="comment">
                    </div>
                    <div class="form-btn">
                        <input type="submit" value="Submit" id="btn" name="btn" />
                    </div>
                </div>
            </form>
        </div>
    </div>



<?php
    }
?>