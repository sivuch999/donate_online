<?php
    session_start();
    include("config.php");
    if (isset($_GET["user_id"])) {
        $sql = "SELECT * FROM events WHERE user_id = {$_GET["user_id"]} ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);
    }
    // if(mysqli_num_rows($result) >0 ){
         
    // }

    $conn->close(); 
?>