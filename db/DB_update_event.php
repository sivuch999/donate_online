<?php
    session_start();
    include('config.php'); // เชื่อมต่อฐานข้อมูล

    // if(isset($_POST['update_The_Event'])){ // ดูว่ามีการส่งข้อมูลมาจาก update หรือไม่

    //     //function-level scope ถ้าอยู่ภายใต้ function หรือ if ซ้อน if ตัวแปรจะสามารถถึงกันได้  ex $image สามารถใช้ใน $stmt->bind_param
    //     if (isset($_FILES['bg_event'])) {  // แปลงfileภาพ ให้สามารถให้เก็บใน database
    //         $image = $_FILES['bg_event']['name'];
    //         $image_tmp = $_FILES['bg_event']['tmp_name'];
    //         move_uploaded_file($image_tmp, "image_event/{$image}");
    //     }

    //     $imagePath = "image_event/{$image}";
    //     $stmt = $conn->prepare("UPDATE events SET 
    //             name=?,
    //             date=?,
    //             subtitles=?,
    //             bg_event=? 
    //         WHERE
    //             id=?
    //     ");
    //     $stmt->bind_param("sssss", $_POST['name'], $_POST['date'], $_POST['subtitles'], $imagePath, $_POST['id']);
    //     $stmt->execute();

    //     if($stmt->affected_rows > 0){ // ตรวจดู มีแถวใน table ที่มีการเปลี่ยนแปลงหรือไม่ ใช้กับ insert update delete 
    //         echo "<script type='text/javascript'>";
    //         echo "alert('The Update is complete');";
    //         echo "window.location = '../show_manage_event.php'; ";
    //         echo "</script>";
            
    //     }   
    //     else {
    //         echo "<script type='text/javascript'>"; 
    //         echo "alert('you can not update this data');";
    //         echo "window.location = '../show_manage_event.php'; ";
    //         echo "</script>";
    //     }
    
    // }

    if (isset($_POST["submit_save_donate_items"])) {
        $donorName = (!empty($_POST["donor_name"])) ? $_POST["donor_name"] : "ไม่ประสงค์ออกนาม";
        for ($i=0; $i<count($_POST["name"]); $i++) {
            $imagePath = null;
            // echo $_POST["name"][$i]."/".$_POST["unit"][$i]."<br>";
            // print_r($_FILES['picture']);
            if (isset($_FILES['picture']) && !empty($_FILES['picture']["name"][$i])) {
                $image = $_FILES['picture']['name'][$i];
                $imageTmp = $_FILES['picture']['tmp_name'][$i];
                move_uploaded_file($imageTmp, "../image_items/{$image}");
                $imagePath = "image_items/{$image}";
            }
            // die();
            $itemName = $_POST["name"][$i]." ".$_POST["amount"][$i]." ".$_POST["unit"][$i];
            // echo $itemName;
            $sql = "INSERT INTO user_donate_items(
                user_id,
                donor_name,
                donor_email,
                donor_tel,
                donor_contact,
                name,
                picture
            ) VALUE (?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssss",
                $_POST["user_id"],
                $donorName,
                $_POST["donor_email"],
                $_POST["donor_tel"],
                $_POST["donor_contact"],
                $itemName,
                $imagePath
            );
            if (!$stmt->execute()) {
                $_SESSION["alert_fail"] = time() + 1;
            } else {
                $_SESSION["alert_success"] = time() + 1;
            }
            
            echo "<script type='text/javascript'>";
                echo "window.location = '{$_POST["go_page"]}';";
            echo "</script>";
        }
    }

    $conn->close();
?>