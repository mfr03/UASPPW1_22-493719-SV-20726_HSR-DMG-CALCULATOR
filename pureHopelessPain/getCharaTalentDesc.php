<?php
    session_start();
    include 'connect.php';
    $res = mysqli_fetch_assoc(mysqli_query($_SESSION['mysqli'], "SELECT * FROM character_talent WHERE character_talent_id = " . "'" . $_POST["name"] ."';" ));
    
    echo $res['talent_desc'];
?>