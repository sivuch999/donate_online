<?php
    session_start();
    include("config.php");
    
    if (isset($_GET["user_id"])) {
        $conditions = "";
        if (isset($_GET["event_id"])) {
            $conditions .= " AND id = {$_GET["event_id"]} ORDER BY id DESC";
        }
        $sql = "SELECT * FROM events
            WHERE deleted_at IS NULL 
            AND user_id = {$_GET["user_id"]}
            $conditions";
        $result = mysqli_query($conn, $sql);

        // Get Donate Type
        $sqlDonateTypes = "SELECT donate_types.id, donate_types.name 
            FROM user_donate_types
            INNER JOIN donate_types ON user_donate_types.donate_type_id = donate_types.id
                AND donate_types.deleted_at IS NULL
            WHERE 
                user_donate_types.deleted_at IS NULL 
                AND user_donate_types.user_id = {$_GET["user_id"]}";
        $resultDonateTypes = mysqli_query($conn, $sqlDonateTypes);
        if (!$resultDonateTypes) {
            die("Error: ".mysqli_error($conn));
        }

        // Get Users
        $sqlUsers = "SELECT users.*, banks.name AS bank_name 
            FROM users 
            LEFT JOIN banks ON users.bank_id = banks.id 
                AND banks.deleted_at IS NULL
            WHERE
                users.deleted_at IS NULL 
                AND users.id = {$_GET["user_id"]}";
        $resultUsers = mysqli_query($conn, $sqlUsers);
        if (!$resultUsers) {
            die("Error: ".mysqli_error($conn));
        }
        $rowUsers = mysqli_fetch_assoc($resultUsers);
        // print_r($rowUsers);
        
    }

    if (isset($_POST["submit"])) {
        // print_r($_POST);
     
    }

    $conn->close(); 
?>