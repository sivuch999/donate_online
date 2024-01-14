<?php
    include('config.php');
    
    // Get user
    $conditionGetUser = "";
    if (isset($_GET["submit"])) {
        if ( isset($_GET["donorname"]) && !empty($_GET["donorname"]) ) {
            $conditionGetUser .= " AND users.donorname LIKE '%{$_GET["donorname"]}%'";
        }
        if (isset($_GET["donor_recipient_type_id"]) && !empty($_GET["donor_recipient_type_id"])) {
            $conditionGetUser .= " AND users.donor_recipient_type_id = {$_GET["donor_recipient_type_id"]}";
        }
        if ( isset($_GET["location"]) && !empty($_GET["location"]) ) {
            $conditionGetUser .= " AND users.location LIKE '%{$_GET["location"]}%'";
        }
        if (isset($_GET["donate_type_id"])) {
            $donateTypeId = "";
            foreach ($_GET["donate_type_id"] as $key => $value) {
                $donateTypeId .= ",{$value}";
            }
            $donateTypeId = preg_replace("/,/", "", $donateTypeId, 1);

            $conditionGetUser .= " AND user_donate_types.donate_type_id IN ($donateTypeId)";
        }
        // $conditionGetUser = preg_replace("/AND/", "", $conditionGetUser, 1);
    }

    $sqlGetUser = "SELECT
            users.*,
            donor_recipient_types.name AS donor_recipient_types_name,
            GROUP_CONCAT(donate_types.name SEPARATOR ', ') AS donate_types_name
        FROM
            users
        INNER JOIN donor_recipient_types ON users.donor_recipient_type_id = donor_recipient_types.id
            AND donor_recipient_types.deleted_at IS NULL
        INNER JOIN user_donate_types ON users.id = user_donate_types.user_id
            AND user_donate_types.deleted_at IS NULL
        INNER JOIN donate_types ON user_donate_types.donate_type_id = donate_types.id
            AND donate_types.deleted_at IS NULL
        WHERE
            users.deleted_at IS NULL".((!empty($conditionGetUser)) ? "$conditionGetUser" : "")."
            AND users.status = '1'
            AND users.is_admin = '0'
        GROUP BY
            users.id
    ";
    // echo $sqlGetUser;
    $resultGetUser = mysqli_query($conn, $sqlGetUser);
    if (!$resultGetUser) { die("Error: " . mysqli_error($conn)); }

    // Get donor_recipient_types
    $sqlGetDonorRecipientTypes = "SELECT * FROM donor_recipient_types WHERE donor_recipient_types.deleted_at IS NULL ORDER BY id DESC";
    $resultGetDonorRecipientTypes = mysqli_query($conn, $sqlGetDonorRecipientTypes);
    if (!$resultGetDonorRecipientTypes) { die("Error: " . mysqli_error($conn)); }

    // Get donate_types
    $sqlGetDonateTypes = "SELECT * FROM donate_types WHERE donate_types.deleted_at IS NULL ORDER BY id DESC";
    $resultDonateTypes = mysqli_query($conn, $sqlGetDonateTypes);
    // print_r($resultDonateTypes);
    if (!$resultDonateTypes) { die("Error: " . mysqli_error($conn)); }
    
    $conn->close(); 
?>