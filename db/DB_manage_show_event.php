<?php
    include('config.php'); //import การเชื่อมฐานข้อมูลจาก server.php
    
    if (!isset($_SESSION['id'])) {
        echo "<script>";
            echo "alert('Please login first');";
            echo "window.location = './";
        echo "</script>";
    }

    if (isset($_GET["submit_update"]) && ($_GET["page"] == "manage_donate_items" || $_GET["page"] == "manage_request_items" || $_GET["page"] == "admin_manage_request_items")) { 
        $goPage = "./show_manage_event.php?page={$_GET["page"]}";
        if ($_GET["page"] == "admin_manage_request_items") {
            $goPage = "./admin_page.php?page={$_GET["page"]}";
        }
        if (!isset($_GET["id"])) {
            $_SESSION["alert_fail"] = time() + 1;
            echo "<script>";
                echo "window.location = './show_manage_event.php?page={$_GET["page"]}';";
            echo "</script>";
            die();
        }
        $sql = "UPDATE user_donate_items SET";
        $set = "";
        if (isset($_GET["status"])) {
            $sql .= " status = ?";
            $set = $_GET["status"];
        } else if ($_GET["page"] == "manage_request_items" && isset($_GET["req_user_id"])) {
            // $sql .= " req_user_id = ?";
            // $set = $_GET["req_user_id"];
            $sql .= " user_id = ?, req_user_id = ?";
            $set = $_GET["req_user_id"];
        } else if ($_GET["page"] == "admin_manage_request_items" && isset($_GET["req_user_id"])) {
            $sql .= " user_id = ?";
            if ($_GET["is_req_approve"] == "0") {
                $set = null;
                $sql .= " ,req_user_id = NULL";
            } else if ($_GET["is_req_approve"] == "1") {
                $set = $_GET["req_user_id"];
            }
        }
        $sql .= " WHERE id = ?";
        $stmt = $conn->prepare($sql);
        if (isset($_GET["status"])) {
            $stmt->bind_param("ss", $set, $_GET["id"]);
        } else if ($_GET["page"] == "manage_request_items" && isset($_GET["req_user_id"])) {
            $stmt->bind_param("sss", $set, $set, $_GET["id"]);
        } else if ($_GET["page"] == "admin_manage_request_items" && isset($_GET["req_user_id"])) {
            $stmt->bind_param("ss", $set, $_GET["id"]);
        }
        if (!$stmt->execute()) {
            // print_r($stmt);
            $_SESSION["alert_fail"] = time() + 1;
            echo "<script>";
                echo "window.location = '$goPage';";
            echo "</script>";
            die();
        }
        $_SESSION["alert_success"] = time() + 1;
        echo "<script>";
            echo "window.location = '$goPage'";
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
        $sql .= " bank_id = ?, bank_account_fullname = ?, bank_account_number = ? WHERE id = ?";

        $stmt = $conn->prepare($sql);

        if (isset($imagePath) && !empty($imagePath)) {
            $stmt->bind_param("sssss", $imagePath, $_POST["bank_id"], $_POST["bank_account_fullname"], $_POST["bank_account_number"], $_POST["id"]);
        } else {
            $stmt->bind_param("ssss", $_POST["bank_id"], $_POST["bank_account_fullname"], $_POST["bank_account_number"], $_POST["id"]);
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

    // $sqlDonateTypes = "SELECT donate_types.id, donate_types.name 
    //     FROM user_donate_types
    //     INNER JOIN donate_types ON user_donate_types.donate_type_id = donate_types.id
    //         AND donate_types.deleted_at IS NULL
    //     WHERE 
    //         user_donate_types.deleted_at IS NULL 
    //         AND user_donate_types.user_id = {$_SESSION["id"]}";
    // $resultDonateTypes = mysqli_query($conn, $sqlDonateTypes);
    // if (!$resultDonateTypes) {
    //     die("Error: ".mysqli_error($conn));
    // }

    $sqlGetDonateTypes = "SELECT donate_types.* FROM donate_types 
            INNER JOIN users ON donate_types.user_id = users.id
                AND users.id = {$_SESSION['id']}
            WHERE
                donate_types.deleted_at IS NULL 
            ORDER BY
                donate_types.id ASC";
    $resultGetDonateTypes = mysqli_query($conn, $sqlGetDonateTypes);
    if (!$resultGetDonateTypes) { die("Error: ".mysqli_error($conn)); }

    if ($_GET["page"] == "manage_donate_types") {
        if (isset($_GET["id"])) {
            $sql = "SELECT * FROM donate_types WHERE deleted_at IS NULL AND id={$_GET["id"]} ORDER BY id ASC";
            $resultGetDonateTypesOne = mysqli_query($conn, $sql);
            if (!$resultGetDonateTypesOne) { die("Error: ".mysqli_error($conn)); }
            $rowGetDonateTypesOne = mysqli_fetch_assoc($resultGetDonateTypesOne);
        }
    }

    $sqlUserDonateItems = "SELECT
            user_donate_items.*,
            donate_types.name AS donate_type_name,
            req_users.firstname,
            req_users.lastname,
            req_users.donorname AS req_donorname
        FROM user_donate_items
        INNER JOIN donate_types ON user_donate_items.donate_type_id = donate_types.id
            AND donate_types.deleted_at IS NULL
        LEFT JOIN users AS req_users ON user_donate_items.req_user_id = req_users.id
            AND req_users.deleted_at IS NULL
        WHERE 
            user_donate_items.deleted_at IS NULL";
    if ($_GET["page"] == "manage_donate_items") {
        $sqlUserDonateItems .= " AND user_donate_items.user_id = {$_SESSION["id"]}";
    } else if ($_GET["page"] == "manage_request_items") {
        $sqlUserDonateItems .= " AND user_donate_items.user_id IS NULL 
            AND user_donate_items.req_user_id IS NULL
            AND user_donate_items.status = '1'
        ";
    } else if ($_GET["page"] == "admin_manage_request_items") {
        $sqlUserDonateItems .= " AND user_donate_items.user_id IS NULL";
    }
    $sqlUserDonateItems .= " ORDER BY user_donate_items.id DESC";
    $resultUserDonateItems = mysqli_query($conn, $sqlUserDonateItems);
    if (!$resultUserDonateItems) {
        die("Error: ".mysqli_error($conn));
    }

    $sqlRequestedItems = "SELECT 
        user_donate_items.*,
        donate_types.name AS donate_type_name,
        req_users.firstname,
        req_users.lastname,
        req_users.donorname AS req_donorname
        FROM user_donate_items
        INNER JOIN donate_types ON user_donate_items.donate_type_id = donate_types.id
            AND donate_types.deleted_at IS NULL
        LEFT JOIN users AS req_users ON user_donate_items.req_user_id = req_users.id
            AND req_users.deleted_at IS NULL
        WHERE 
            user_donate_items.deleted_at IS NULL
            AND user_donate_items.req_user_id = {$_SESSION["id"]}
            AND user_donate_items.user_id IS NULL
    ";
    $sqlRequestedItems .= " ORDER BY user_donate_items.id DESC";
    $resultRequestedItems = mysqli_query($conn, $sqlRequestedItems);
    if (!$resultRequestedItems) {
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


    // Start Donate Types
    if (isset($_POST["add_donate_types"])) {
        $sql = "INSERT INTO donate_types(user_id, name) VALUE (?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $_SESSION["id"], $_POST["name"]);
        if (!$stmt->execute()) {
            $_SESSION["alert_fail"] = time() + 1;
            echo "<script type='text/javascript'>";
                echo "window.location = './show_manage_event.php?page=manage_donate_types';";
            echo "</script>";
            die();
        }
        $_SESSION["alert_success"] = time() + 1;
        echo "<script type='text/javascript'>";
            echo "window.location = './show_manage_event.php?page=manage_donate_types';";
        echo "</script>";
    }

    if (isset($_POST["update_donate_types"])) {
        $sql = "UPDATE donate_types SET name = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $_POST["name"], $_POST["id"]);
        if (!$stmt->execute()) {
            $_SESSION["alert_fail"] = time() + 1;
            echo "<script type='text/javascript'>";
                echo "window.location = './show_manage_event.php?page=manage_donate_types';";
            echo "</script>";
            die();
        }
        $_SESSION["alert_success"] = time() + 1;
        echo "<script type='text/javascript'>";
            echo "window.location = './show_manage_event.php?page=manage_donate_types';";
        echo "</script>";
    }

    if (isset($_GET["delete_donate_types"]) && isset($_GET["id"])) {
        $sql = "UPDATE donate_types SET deleted_at = NOW() WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_GET["id"]);
        if (!$stmt->execute()) {
            $_SESSION["alert_fail"] = time() + 1;
            echo "<script type='text/javascript'>";
                echo "window.location = './show_manage_event.php?page=manage_donate_types';";
            echo "</script>";
            die();
        }
        $_SESSION["alert_success"] = time() + 1;
        echo "<script type='text/javascript'>";
            echo "window.location = './show_manage_event.php?page=manage_donate_types';";
        echo "</script>";
    }
    
    $conn->close();
?>