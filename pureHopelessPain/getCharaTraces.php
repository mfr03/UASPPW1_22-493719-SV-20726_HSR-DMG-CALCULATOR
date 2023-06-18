<?php
    session_start();
    include 'connect.php';
    $res = mysqli_fetch_assoc(mysqli_query($_SESSION['mysqli'], "SELECT * FROM character_traces WHERE traces_id= " . "'" . $_POST["name"]. "_traces" ."';" ));
    
    echo json_encode(array(
        "minor_traces" => $res['minor_traces'],
        "major_traces" => $res['major_traces'],
    ));
?>