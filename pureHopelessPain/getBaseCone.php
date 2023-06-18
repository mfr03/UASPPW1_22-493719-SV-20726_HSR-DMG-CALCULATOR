<?php
    session_start();
    include 'connect.php';
    $res = mysqli_fetch_assoc(mysqli_query($_SESSION['mysqli'], "SELECT * FROM light_cone_base_stats_n_level WHERE light_cone_base_stats_n_level_id = " . "'" . $_POST["name"] . $_POST["level"] ."';" ));
    
    echo json_encode(array(
        "base_atk" => $res['base_stats_atk'],
        "base_def" => $res['base_stats_def'],
        "add_atk" => $res['atk_add_per_level'],
        "add_def" => $res['def_add_per_level']

    ));
?>