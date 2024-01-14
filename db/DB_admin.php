<?php include('db/config.php'); ?>
<?php
    if ($_GET["page"] == "admin_users_management") {

        $condition = "WHERE users.deleted_at IS NULL AND users.is_admin = '0'";
        if (isset($_GET['show']) && $_GET["show"] == "show_0") {
            $condition .= " AND users.status = 0";
        } else if (isset($_GET['show']) && $_GET["show"] == "show_1") {
            $condition .= " AND users.status = 1";
        }
    
        $sql = "SELECT
                users.*,
                donor_recipient_types.name AS donor_recipient_type_name
            FROM
                users
            INNER JOIN donor_recipient_types ON users.donor_recipient_type_id = donor_recipient_types.id
            $condition
        ";
        $result = mysqli_query($conn, $sql);
        if (!$result) { die("Error: ".mysqli_error($conn)); }

    } else if ($_GET["page"] == "admin_recipient_types_management") {

        $sql = "SELECT * FROM donor_recipient_types WHERE deleted_at IS NULL ORDER BY id ASC";
        $result = mysqli_query($conn, $sql);
        if (!$result) { die("Error: ".mysqli_error($conn)); }

        if (isset($_GET["id"])) {
            $sql = "SELECT * FROM donor_recipient_types WHERE deleted_at IS NULL AND id={$_GET["id"]} ORDER BY id ASC";
            $resultOne = mysqli_query($conn, $sql);
            if (!$resultOne) { die("Error: ".mysqli_error($conn)); }
            $rowOne = mysqli_fetch_assoc($resultOne);
        }

    } else if ($_GET["page"] == "admin_donate_types_management") {

        $sql = "SELECT * FROM donate_types WHERE deleted_at IS NULL ORDER BY id ASC";
        $result = mysqli_query($conn, $sql);
        if (!$result) { die("Error: ".mysqli_error($conn)); }

        if (isset($_GET["id"])) {
            $sql = "SELECT * FROM donate_types WHERE deleted_at IS NULL AND id={$_GET["id"]} ORDER BY id ASC";
            $resultOne = mysqli_query($conn, $sql);
            if (!$resultOne) { die("Error: ".mysqli_error($conn)); }
            $rowOne = mysqli_fetch_assoc($resultOne);
        }

    }

    $conn->close(); 
?>