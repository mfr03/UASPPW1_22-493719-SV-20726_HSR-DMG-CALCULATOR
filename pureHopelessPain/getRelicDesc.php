<?php
    session_start();
    include 'connect.php';
    $res = mysqli_fetch_assoc(mysqli_query($_SESSION['mysqli'], "SELECT * FROM relics WHERE relics_id = " . "'" . $_POST["name"] ."';" ));
    
    echo json_encode(array(
        "two_piece_bonus" => $res['two_piece_set_bonus'],
        "four_piece_bonus" => $res['four_piece_set_bonus'],
    ));
?>