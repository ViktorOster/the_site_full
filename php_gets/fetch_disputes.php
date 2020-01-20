<?php

//fetch_user.php

require_once '../connection.php';
session_start();
$conn = new mysqli(host,user,password,db);

$output = '
<table class="table table-bordered table-striped" id="myTable">
 <tr>
  <td>KEY</td>
  <td>Communicate</td>
 </tr>
';
$i=1;
foreach($conn->query("SELECT DISTINCT Game_Key FROM ongoing_game_list WHERE dispute=1 ORDER BY dispute_time")  as $row)
{
// $gamername = $row['gamername'];
// $admin = $_SESSION['username'];
$gamekey = $row['Game_Key'];

 $output .= '
 <tr>
  <td>'.$row['Game_Key'].'</td>
  <td><button type="button" class="btn btn-info btn-xs start_chat" id="start_chat_'.$i.'" onclick="adminchat('.$i.')" data-key_'.$i.'="'.$gamekey.'"id="start_chat_'.$i.'"  data-toggle="modal" data-target="#exampleModal">Start Chat</button></td>
 </tr>
 ';
 $i=1+$i;
}



$output .= '</table>';

echo $output;
$conn->close();

?>

   