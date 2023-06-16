<?php
    session_start();
    include 'connect.php';
    $get = $_POST["character"].$_POST['type'];
    $res = mysqli_fetch_assoc(mysqli_query($_SESSION['mysqli'], "SELECT * FROM character_skills WHERE character_skill_id = " . "'" . $get . "';" ));

    echo $res['skill_base_multiplier']. "'";
    echo $res['skill_level_multiplier'];
?>