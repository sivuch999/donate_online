<?php
    session_start();
    include("config.php");
    
    if (isset($_GET["user_id"]) && isset($_GET["event_id"])) {
        $sql = "SELECT * FROM events WHERE user_id = {$_GET["user_id"]} AND id = {$_GET["event_id"]} ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);
    }

    $conn->close(); 
?>