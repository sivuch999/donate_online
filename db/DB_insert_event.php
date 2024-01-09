<?php
    include('config.php'); // เชื่อมต่อฐานข้อมูล
    session_start();

    print_r($_POST["select2"]);
    die();

    if (isset($_POST['submit_insert'])) {
        $imagePath = "";
        if (isset($_FILES['bg_event']) && !empty($_FILES['bg_event']["name"])) {
            $image = $_FILES['bg_event']['name'];
            $imageTmp = $_FILES['bg_event']['tmp_name'];
            move_uploaded_file($imageTmp, "../image_event/{$image}");

            $imagePath = "image_event/{$image}";
        }
    

        $stmt = $conn->prepare("INSERT INTO events(
            user_id,
            name,
            subtitles,
            date,
            bg_event
        ) VALUE (?,?,?,?,?)");

        $stmt->bind_param("sssss",
            $_SESSION['id'],
            $_POST['name'],
            $_POST['subtitles'],
            $_POST['date'],
            $imagePath
        );
    } else if (isset($_POST['submit_update'])) {
            $sql = "UPDATE events SET";
            if (isset($_FILES['bg_event']) && !empty($_FILES['bg_event']["name"])) {
                $image = $_FILES['bg_event']['name'];
                $imageTmp = $_FILES['bg_event']['tmp_name'];
                move_uploaded_file($imageTmp, "../image_event/{$image}");

                $imagePath = "image_event/{$image}";
                $sql .= " bg_event=?,";
            }
            $sql .= " name=?, subtitles=?, date=? WHERE id=?";
    
            $stmt = $conn->prepare($sql);
    
            if (isset($imagePath) && !empty($imagePath)) {
                $stmt->bind_param("sssss", $imagePath, $_POST['name'], $_POST['subtitles'], $_POST['date'], $_POST['id']);
            } else {
                $aa = $stmt->bind_param("ssss", $_POST['name'], $_POST['subtitles'], $_POST['date'], $_POST['id']);
            }
    }

    if ($stmt->execute()) {
        $_SESSION["alert_success"] = time() + 1;
        echo "<script>";
            echo "window.location = '../show_manage_event.php?page=manage_event'; ";
        echo "</script>";
    } else {
        $_SESSION["alert_fail"] = time() + 1;
        echo "<script>";
            echo "window.location = '../show_manage_event.php?page=manage_event'; ";
        echo "</script>";
    }

    $conn->close();

?>