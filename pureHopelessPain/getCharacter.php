<?php
    session_start();
    include 'connect.php';
    $res = mysqli_fetch_assoc(mysqli_query($_SESSION['mysqli'], "SELECT * FROM characters WHERE character_name_id = " . "'" . $_POST["character"] . "';" ));
    echo $res['character_element'];

?>