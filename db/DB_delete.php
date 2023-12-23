<?php
    session_start();
    include('config.php');
    
    if (isset($_GET['delete'])){

        $sql = "UPDATE events SET deleted_at = NOW() WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_GET["id"]);
        if (!$stmt->execute()) {
            $_SESSION["alert_fail"] = time() + 1;
            echo "<script>";
                echo "window.location = '../show_manage_event.php';";
            echo "</script>";
            die();
        }
        $_SESSION["alert_success"] = time() + 1;
        echo "<script>";
            echo "window.location = '../show_manage_event.php'";
        echo "</script>";

    }
    $conn->close();
    
?>