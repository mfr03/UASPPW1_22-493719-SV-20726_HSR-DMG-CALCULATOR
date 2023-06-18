<?php
    session_start();
    include 'connect.php';
    $res = mysqli_fetch_assoc(mysqli_query($_SESSION['mysqli'], "SELECT * FROM light_cone_desc WHERE light_cone_desc_id = " . "'" . $_POST["name"] ."';" ));
    
    echo $res['cone_desc'];
?>