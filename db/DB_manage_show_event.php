<?php
    session_start();
    include('config.php'); //import การเชื่อมฐานข้อมูลจาก server.php
    
    if (!isset($_SESSION['id'])) {
        echo "<script>";
            echo "alert('Please login first');";
            echo "window.location = '../admin_page.php?page=admin_users_management'; ";
        echo "</script>";
    }

    $sql = "SELECT * FROM events WHERE user_id = {$_SESSION["id"]} AND deleted_at IS NULL";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Error: ".mysqli_error($conn));
    }
    
    // $conn->close();
?>