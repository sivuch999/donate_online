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
        
    }

    if (isset($_POST["submit"])) {
        // print_r($_POST);
        $donorName = (!empty($_POST["donor_name"])) ? $_POST["donor_name"] : "ไม่ประสงค์ออกนาม";
        for ($i=0; $i<count($_POST["name"]); $i++) {
            $imagePath = null;
            // echo $_POST["name"][$i]."/".$_POST["unit"][$i]."<br>";
            print_r($_FILES['picture']);
            if (isset($_FILES['picture']) && !empty($_FILES['picture']["name"][$i])) {
                $image = $_FILES['picture']['name'][$i];
                $imageTmp = $_FILES['picture']['tmp_name'][$i];
                move_uploaded_file($imageTmp, "./image_items/{$image}");
                $imagePath = "image_items/{$image}";
            }
            // die();
            $itemName = $_POST["name"][$i]." ".$_POST["amount"][$i]." ".$_POST["unit"][$i];
            // echo $itemName;
            $sql = "INSERT INTO user_donate_items(
                user_id,
                donate_type_id,
                donor_name,
                name,
                picture
            ) VALUE (?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss",
                $_POST["user_id"],
                $_POST["donate_type_id"][$i],
                $donorName,
                $itemName,
                $imagePath
            );
            if (!$stmt->execute()) {
                $_SESSION["alert_fail"] = time() + 1;
                echo "<script type='text/javascript'>";
                    echo "window.location = './show_event.php?user_id={$_POST["user_id"]}';";
                echo "</script>";
                die();
            }
            $_SESSION["alert_success"] = time() + 1;
            echo "<script type='text/javascript'>";
                echo "window.location = './show_event.php?user_id={$_POST["user_id"]}';";
            echo "</script>";
        }
    }

    $conn->close(); 
?>