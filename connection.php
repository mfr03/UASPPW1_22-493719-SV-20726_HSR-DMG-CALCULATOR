<?php
    session_start();
    $servername = "p:localhost";
    $username = "root";
    $password = "";
    $database = "hsr_calc_prj";

    $_SESSION['mysqli'] = new mysqli($servername, $username, $password, $database);


    if(!$_SESSION['mysqli'])
    {
        die("connection failed : ".mysqli_connect_error());
    }
?>