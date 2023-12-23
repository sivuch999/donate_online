<?php
    session_start();
    include('config.php');

    // Start Users
    if (isset($_GET["trigger_status_users"]) && isset($_GET["id"])) {
        echo "trigger_status_users";
        $stmt = $conn->prepare("UPDATE users SET status = !status WHERE id = ?");
        $stmt->bind_param("s", $_GET["id"]);
        if (!$stmt->execute()) {
            $_SESSION["alert_fail"] = time() + 1;
            echo "<script type='text/javascript'>"; 
                echo "window.location = '../admin_page.php?page=admin_users_management'; ";
            echo "</script>";
            die();
        }

        $_SESSION["alert_success"] = time() + 1;
        echo "<script type='text/javascript'>";
            echo "window.location = '../admin_page.php?page=admin_users_management'; ";
        echo "</script>";
    
    }
    
    // Start Recipient Types
    if (isset($_POST["add_recipient_types"])) {
        $sql = "INSERT INTO donor_recipient_types(name) VALUE (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_POST["name"]);
        if (!$stmt->execute()) {
            $_SESSION["alert_fail"] = time() + 1;
            echo "<script type='text/javascript'>";
                echo "window.location = '../admin_page.php?page=admin_recipient_types_management';";
            echo "</script>";
            die();
        }
        $_SESSION["alert_success"] = time() + 1;
        echo "<script type='text/javascript'>";
            echo "window.location = '../admin_page.php?page=admin_recipient_types_management';";
        echo "</script>";
    }

    if (isset($_POST["update_recipient_types"])) {
        $sql = "UPDATE donor_recipient_types SET name = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $_POST["name"], $_POST["id"]);
        if (!$stmt->execute()) {
            $_SESSION["alert_fail"] = time() + 1;
            echo "<script type='text/javascript'>";
                echo "window.location = '../admin_page.php?page=admin_recipient_types_management';";
            echo "</script>";
            die();
        }
        $_SESSION["alert_success"] = time() + 1;
        echo "<script type='text/javascript'>";
            echo "window.location = '../admin_page.php?page=admin_recipient_types_management';";
        echo "</script>";
    }

    if (isset($_GET["delete_recipient_types"]) && isset($_GET["id"])) {
        $sql = "UPDATE donor_recipient_types SET deleted_at = NOW() WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_GET["id"]);
        if (!$stmt->execute()) {
            $_SESSION["alert_fail"] = time() + 1;
            echo "<script type='text/javascript'>";
                echo "window.location = '../admin_page.php?page=admin_recipient_types_management';";
            echo "</script>";
            die();
        }
        $_SESSION["alert_success"] = time() + 1;
        echo "<script type='text/javascript'>";
            echo "window.location = '../admin_page.php?page=admin_recipient_types_management';";
        echo "</script>";
    }
    
    // Start Donate Types
    if (isset($_POST["add_donate_types"])) {
        $sql = "INSERT INTO donate_types(name) VALUE (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_POST["name"]);
        if (!$stmt->execute()) {
            $_SESSION["alert_fail"] = time() + 1;
            echo "<script type='text/javascript'>";
                echo "window.location = '../admin_page.php?page=admin_donate_types_management';";
            echo "</script>";
            die();
        }
        $_SESSION["alert_success"] = time() + 1;
        echo "<script type='text/javascript'>";
            echo "window.location = '../admin_page.php?page=admin_donate_types_management';";
        echo "</script>";
    }

    if (isset($_POST["update_donate_types"])) {
        $sql = "UPDATE donate_types SET name = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $_POST["name"], $_POST["id"]);
        if (!$stmt->execute()) {
            $_SESSION["alert_fail"] = time() + 1;
            echo "<script type='text/javascript'>";
                echo "window.location = '../admin_page.php?page=admin_donate_types_management';";
            echo "</script>";
            die();
        }
        $_SESSION["alert_success"] = time() + 1;
        echo "<script type='text/javascript'>";
            echo "window.location = '../admin_page.php?page=admin_donate_types_management';";
        echo "</script>";
    }

    if (isset($_GET["delete_donate_types"]) && isset($_GET["id"])) {
        $sql = "UPDATE donate_types SET deleted_at = NOW() WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_GET["id"]);
        if (!$stmt->execute()) {
            $_SESSION["alert_fail"] = time() + 1;
            echo "<script type='text/javascript'>";
                echo "window.location = '../admin_page.php?page=admin_donate_types_management';";
            echo "</script>";
            die();
        }
        $_SESSION["alert_success"] = time() + 1;
        echo "<script type='text/javascript'>";
            echo "window.location = '../admin_page.php?page=admin_donate_types_management';";
        echo "</script>";
    }

    $conn->close();
?>