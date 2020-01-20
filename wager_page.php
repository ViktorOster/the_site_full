<?php include 'inc/header.php' ?>

<?php 
    // session_start();
    // require_once 'connection.php';
    // $conn = new mysqli(host,user,password,db);
    // $gamername = $_SESSION["username"];
    $SELECT_2 = "SELECT gamername From ongoing_game_list Where gamername = ?";
    $stmt = $conn->prepare($SELECT_2);
    $stmt->bind_param('s',$gamername); 
    $stmt->execute();
    $stmt->store_result();
    $check_3 = $stmt->num_rows;
    $stmt->close();
    
    $SELECT_2 = "SELECT gamername From wager_list Where gamername = ?";
    $stmt = $conn->prepare($SELECT_2);
    $stmt->bind_param('s',$gamername); 
    $stmt->execute();
    $stmt->store_result();
    $check_4 = $stmt->num_rows;
    $stmt->close();

    if ($_SESSION['logged_in']==FALSE)
    {
        header("Location:index.php");
    }elseif ($check_3 == 1){
        header("Location:game_page.php");
    }elseif ($check_4 == 1){
        header("Location:waiting_room.php");
    }      
        
?>

<section class="wager">
    
    <div class="container">

        <form >
            <div class="row">
                <div class="col-md-2 col-sm-12 p-0 mr-2 ml-2 mb-2 text-center">
                    <select class="form-control search-slt" id="gamemode" name="gamemode" required>
                        <option selected hidden value="">GameMode</option>
                        <option value="Fortnite Boxfight">Fortnite Boxfight</option>
                        <option value="Fortnite Buildfight">Fortnite Buildfight</option>
                    </select>
                </div>
                <div class="col-md-2 col-sm-12 p-0 mr-2 ml-2 mb-2 text-center">
                    <select class="form-control search-slt" id="vs_type" name="vs_type" required>
                        <option selected hidden value="">Vs Type</option>
                        <option value="1v1">1v1</option>
                        <option value="2v2">2v2</option>
                    </select>
                </div>
                <div class="col-md-2 col-sm-12 p-0 mr-2 ml-2 mb-2 text-center">
                    <select class="form-control search-slt" id="amount" name="amount" required>
                        <option selected hidden value="">Amount</option>
                        <option value="5">$5</option>
                        <option value="10">$10</option>
                        <option value="15">$15</option>
                        <option value="20">$20</option>
                    </select>
                </div>
                <div class="col-md-2 col-sm-12 p-0 mr-2 ml-2 mb-2 text-center">
                    <select class="form-control search-slt" id="server" name="server" required>
                        <option selected hidden value="">Server</option>
                        <option value="EU">EU</option>
                        <option value="NAE">NAE</option>
                    </select>
                </div>

                <div class="col-md-2 col-sm-12 p-0 mr-2 ml-2 mb-2 text-center">
                    <input  id="form_submit" type="submit" value="Submit" class="btn btn-danger wrn-btn" data-toggle="modal" data-target="#exampleModal">
                </div>
                
            </div>
        </form>
    </div>
</section>

<section>
    <table class="wager-table wager-table--data" align="center">
        <tr>
            <th>Wager</th>
            <th>Server</th>
            <th>Fortnite Boxfight</th>
            <th>Fortnite Buildfight</th>
        </tr>

        <?php

            foreach($conn->query("SELECT gamemode,serverr,COUNT(*) FROM   wager_list  WHERE gamemode='Fortnite Boxfight' AND serverr='EU' AND amount=5") as $row) {

                $query = "SELECT gamemode,serverr,COUNT(*) FROM   wager_list  WHERE gamemode='Fortnite Buildfight' AND serverr='EU' AND amount=5";
                
                if ($result = $conn->query($query)) {

                    /* fetch object array */
                    while ($row1 = $result->fetch_row()) {
                        $number_of_wagers_Buildfight = $row1[2];
                    }

                    /* free result set */
                    $result->close();
                }
                $number_of_wagers_Boxfight = $row['COUNT(*)'];
                echo "<tr>";
                echo "<td rowspan='2' class='font-weight-bold'>$5</td>";
                echo "<td><img src='./assets/icons/Flag_of_Europe.svg' alt=''>EU</td>";
                echo "<td data-js='heatmapped-number'>".$number_of_wagers_Boxfight. "</td>";
                echo "<td data-js='heatmapped-number'>".$number_of_wagers_Buildfight. "</td>";
                echo "</tr>"; 
            }

            foreach($conn->query("SELECT gamemode,serverr,COUNT(*) FROM   wager_list  WHERE gamemode='Fortnite Boxfight' AND serverr='NAE' AND amount=5") as $row) {

                $query = "SELECT gamemode,serverr,COUNT(*) FROM   wager_list  WHERE gamemode='Fortnite Buildfight' AND serverr='NAE' AND amount=5";
                
                if ($result = $conn->query($query)) {

                    /* fetch object array */
                    while ($row1 = $result->fetch_row()) {
                        $number_of_wagers_Buildfight = $row1[2];
                    }

                    /* free result set */
                    $result->close();
                }
                $number_of_wagers_Boxfight = $row['COUNT(*)'];
                echo "<tr>";
                echo "<td><img src='./assets/icons/Flag_of_the_U.S.svg' alt=''>NAE</td>";
                echo "<td data-js='heatmapped-number'>".$number_of_wagers_Boxfight. "</td>";
                echo "<td data-js='heatmapped-number'>".$number_of_wagers_Buildfight. "</td>";
                echo "</tr>"; 
            }


            
            foreach($conn->query("SELECT gamemode,serverr,COUNT(*) FROM   wager_list  WHERE gamemode='Fortnite Boxfight' AND serverr='EU' AND amount=10") as $row) {

                $query = "SELECT gamemode,serverr,COUNT(*) FROM   wager_list  WHERE gamemode='Fortnite Buildfight' AND serverr='EU' AND amount=10";
                
                if ($result = $conn->query($query)) {

                    /* fetch object array */
                    while ($row1 = $result->fetch_row()) {
                        $number_of_wagers_Buildfight = $row1[2];
                    }

                    /* free result set */
                    $result->close();
                }
                $number_of_wagers_Boxfight = $row['COUNT(*)'];
                echo "<tr>";
                echo "<td rowspan='2' class='font-weight-bold'>$10</td>";
                echo "<td><img src='./assets/icons/Flag_of_Europe.svg' alt=''>EU</td>";
                echo "<td data-js='heatmapped-number'>".$number_of_wagers_Boxfight. "</td>";
                echo "<td data-js='heatmapped-number'>".$number_of_wagers_Buildfight. "</td>";
                echo "</tr>"; 
            }

            foreach($conn->query("SELECT gamemode,serverr,COUNT(*) FROM   wager_list  WHERE gamemode='Fortnite Boxfight' AND serverr='NAE' AND amount=10") as $row) {

                $query = "SELECT gamemode,serverr,COUNT(*) FROM   wager_list  WHERE gamemode='Fortnite Buildfight' AND serverr='NAE' AND amount=10";
                
                if ($result = $conn->query($query)) {

                    /* fetch object array */
                    while ($row1 = $result->fetch_row()) {
                        $number_of_wagers_Buildfight = $row1[2];
                    }

                    /* free result set */
                    $result->close();
                }
                $number_of_wagers_Boxfight = $row['COUNT(*)'];
                echo "<tr>";
                echo "<td><img src='./assets/icons/Flag_of_the_U.S.svg' alt=''>NAE</td>";
                echo "<td data-js='heatmapped-number'>".$number_of_wagers_Boxfight. "</td>";
                echo "<td data-js='heatmapped-number'>".$number_of_wagers_Buildfight. "</td>";
                echo "</tr>"; 
            }


            foreach($conn->query("SELECT gamemode,serverr,COUNT(*) FROM   wager_list  WHERE gamemode='Fortnite Boxfight' AND serverr='EU' AND amount=15") as $row) {

                $query = "SELECT gamemode,serverr,COUNT(*) FROM   wager_list  WHERE gamemode='Fortnite Buildfight' AND serverr='EU' AND amount=15";
                
                if ($result = $conn->query($query)) {

                    /* fetch object array */
                    while ($row1 = $result->fetch_row()) {
                        $number_of_wagers_Buildfight = $row1[2];
                    }

                    /* free result set */
                    $result->close();
                }
                $number_of_wagers_Boxfight = $row['COUNT(*)'];
                echo "<tr>";
                echo "<td rowspan='2' class='font-weight-bold'>$15</td>";
                echo "<td><img src='./assets/icons/Flag_of_Europe.svg' alt=''>EU</td>";
                echo "<td data-js='heatmapped-number'>".$number_of_wagers_Boxfight. "</td>";
                echo "<td data-js='heatmapped-number'>".$number_of_wagers_Buildfight. "</td>";
                echo "</tr>"; 
            }

            foreach($conn->query("SELECT gamemode,serverr,COUNT(*) FROM   wager_list  WHERE gamemode='Fortnite Boxfight' AND serverr='NAE' AND amount=15") as $row) {

                $query = "SELECT gamemode,serverr,COUNT(*) FROM   wager_list  WHERE gamemode='Fortnite Buildfight' AND serverr='NAE' AND amount=15";
                
                if ($result = $conn->query($query)) {

                    /* fetch object array */
                    while ($row1 = $result->fetch_row()) {
                        $number_of_wagers_Buildfight = $row1[2];
                    }

                    /* free result set */
                    $result->close();
                }
                $number_of_wagers_Boxfight = $row['COUNT(*)'];
                echo "<tr>";
                echo "<td><img src='./assets/icons/Flag_of_the_U.S.svg' alt=''>NAE</td>";
                echo "<td data-js='heatmapped-number'>".$number_of_wagers_Boxfight. "</td>";
                echo "<td data-js='heatmapped-number'>".$number_of_wagers_Buildfight. "</td>";
                echo "</tr>"; 
            }
        ?>
    </table>
</section>

<script src="js/heatmap.js"></script>
<?php include 'inc/footer.php' ?>