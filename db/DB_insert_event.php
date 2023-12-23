<?php
    include('config.php'); // เชื่อมต่อฐานข้อมูล
    session_start();
     // ดูว่ามีการส่งข้อมูลมาจาก register หรือไม่


    if (isset($_FILES['bg_event'])) { // แปลงfileภาพ ให้สามารถให้เก็บใน database
        $image = $_FILES['bg_event']['name'];
        $image_tmp = $_FILES['bg_event']['tmp_name'];
        move_uploaded_file($image_tmp, "image_event/" . $image); //ส่ง uploadfile ไปยัง folder ที่ต้องการ ex "image_evd/" ชื่อ folder  . $image ชื่อ file ภาพ
    }

    if (isset($_POST['submit_insert'])) {
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
            $image
        );
    } else if (isset($_POST['submit_update'])) {
            $sql = "UPDATE events SET";
            if (isset($image) && !empty($image)) { $sql .= " bg_event=?,"; }
            $sql .= " name=?, subtitles=?, date=? WHERE id=?";
    
            $stmt = $conn->prepare($sql);
    
            if (isset($image) && !empty($image)) {
                $stmt->bind_param("sssss", $image, $_POST['name'], $_POST['subtitles'], $_POST['date'], $_POST['id']);
            } else {
                $aa = $stmt->bind_param("ssss", $_POST['name'], $_POST['subtitles'], $_POST['date'], $_POST['id']);
            }
    }

    if ($stmt->execute()) {
        $_SESSION["alert_success"] = time() + 1;
        echo "<script>";
            echo "window.location = '../show_manage_event.php'; ";
        echo "</script>";
    } else {
        $_SESSION["alert_fail"] = time() + 1;
        echo "<script>";
            echo "window.location = '../show_manage_event.php'; ";
        echo "</script>";
    }

    $conn->close();

?>