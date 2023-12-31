<?php
    include('config.php'); //import การเชื่อมฐานข้อมูลจาก server.php
    
    if (!isset($_SESSION['id'])) {
        echo "<script>";
            echo "alert('Please login first');";
            echo "window.location = '../admin_page.php?page=admin_users_management'; ";
        echo "</script>";
    }

    if (isset($_GET["submit_update"]) && $_GET["page"] == "manage_donate_items") {
        if (!isset($_GET["id"]) || !isset($_GET["status"])) {
            $_SESSION["alert_fail"] = time() + 1;
            echo "<script>";
                echo "window.location = './show_manage_event.php?page=manage_donate_items';";
            echo "</script>";
            die();
        }
        $sql = "UPDATE user_donate_items SET status = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $_GET["status"], $_GET["id"]);
        if (!$stmt->execute()) {
            $_SESSION["alert_fail"] = time() + 1;
            echo "<script>";
                echo "window.location = './show_manage_event.php?page=manage_donate_items';";
            echo "</script>";
            die();
        }
        $_SESSION["alert_success"] = time() + 1;
        echo "<script>";
            echo "window.location = './show_manage_event.php?page=manage_donate_items'";
        echo "</script>";
    }

    if (isset($_POST["submit_update"]) && $_GET["page"] == "manage_banks") {
        if (!isset($_POST["id"]) || !isset($_POST["bank_id"])) {
            $_SESSION["alert_fail"] = time() + 1;
            echo "<script>";
                echo "window.location = './show_manage_event.php?page=manage_banks';";
            echo "</script>";
            die();
        }

        $sql = "UPDATE users SET";
        if (isset($_FILES['bank_account_qrcode']) && !empty($_FILES['bank_account_qrcode']["name"])) {
            $image = $_FILES['bank_account_qrcode']['name'];
            $imageTmp = $_FILES['bank_account_qrcode']['tmp_name'];
            move_uploaded_file($imageTmp, "./image_qrcode/{$image}");

            $imagePath = "image_qrcode/{$image}";
            $sql .= " bank_account_qrcode = ?,";
        }
        $sql .= " bank_id = ?, bank_account_number = ? WHERE id = ?";

        $stmt = $conn->prepare($sql);

        if (isset($imagePath) && !empty($imagePath)) {
            $stmt->bind_param("ssss", $imagePath, $_POST["bank_id"], $_POST["bank_account_number"], $_POST["id"]);
        } else {
            $stmt->bind_param("sss", $_POST["bank_id"], $_POST["bank_account_number"], $_POST["id"]);
        }

        
        if (!$stmt->execute()) {
            $_SESSION["alert_fail"] = time() + 1;
            echo "<script>";
                echo "window.location = './show_manage_event.php?page=manage_banks';";
            echo "</script>";
            die();
        }
        $_SESSION["alert_success"] = time() + 1;
        echo "<script>";
            echo "window.location = './show_manage_event.php?page=manage_banks'";
        echo "</script>";
    }

    $sql = "SELECT * FROM events WHERE user_id = {$_SESSION["id"]} AND deleted_at IS NULL";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Error: ".mysqli_error($conn));
    }

    $sqlDonateTypes = "SELECT donate_types.id, donate_types.name 
        FROM user_donate_types
        INNER JOIN donate_types ON user_donate_types.donate_type_id = donate_types.id
            AND donate_types.deleted_at IS NULL
        WHERE 
            user_donate_types.deleted_at IS NULL 
            AND user_donate_types.user_id = {$_SESSION["id"]}";
    $resultDonateTypes = mysqli_query($conn, $sqlDonateTypes);
    if (!$resultDonateTypes) {
        die("Error: ".mysqli_error($conn));
    }

    $sqlUserDonateItems = "SELECT user_donate_items.*, donate_types.name AS donate_type_name
        FROM user_donate_items
        INNER JOIN donate_types ON user_donate_items.donate_type_id = donate_types.id
            AND donate_types.deleted_at IS NULL
        WHERE 
            user_donate_items.deleted_at IS NULL 
            AND user_donate_items.user_id = {$_SESSION["id"]}
        ORDER BY user_donate_items.id DESC";
    $resultUserDonateItems = mysqli_query($conn, $sqlUserDonateItems);
    if (!$resultUserDonateItems) {
        die("Error: ".mysqli_error($conn));
    }

    // Get Banks
    $sqlBanks = "SELECT * FROM banks WHERE deleted_at IS NULL";
    $resultBanks = mysqli_query($conn, $sqlBanks);
    if (!$resultBanks) {
        die("Error: ".mysqli_error($conn));
    }

    // Get Users
    $sqlUsers = "SELECT * FROM users WHERE deleted_at IS NULL AND id = {$_SESSION["id"]}";
    $resultUsers = mysqli_query($conn, $sqlUsers);
    if (!$resultUsers) {
        die("Error: ".mysqli_error($conn));
    }
    $rowUsers = mysqli_fetch_assoc($resultUsers);
    
    $conn->close();
?>