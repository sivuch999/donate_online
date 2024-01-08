<?php
    include('config.php'); // เชื่อมต่อฐานข้อมูล

    if(isset($_POST['update_The_Event'])){ // ดูว่ามีการส่งข้อมูลมาจาก update หรือไม่

        //function-level scope ถ้าอยู่ภายใต้ function หรือ if ซ้อน if ตัวแปรจะสามารถถึงกันได้  ex $image สามารถใช้ใน $stmt->bind_param
        if (isset($_FILES['bg_event'])) {  // แปลงfileภาพ ให้สามารถให้เก็บใน database
            $image = $_FILES['bg_event']['name'];
            $image_tmp = $_FILES['bg_event']['tmp_name'];
            move_uploaded_file($image_tmp, "image_event/{$image}");
        }

        $imagePath = "image_event/{$image}";
        $stmt = $conn->prepare("UPDATE events SET 
                name=?,
                date=?,
                subtitles=?,
                bg_event=? 
            WHERE
                id=?
        ");
        $stmt->bind_param("sssss", $_POST['name'], $_POST['date'], $_POST['subtitles'], $imagePath, $_POST['id']);
        $stmt->execute();

        if($stmt->affected_rows > 0){ // ตรวจดู มีแถวใน table ที่มีการเปลี่ยนแปลงหรือไม่ ใช้กับ insert update delete 
            echo "<script type='text/javascript'>";
            echo "alert('The Update is complete');";
            echo "window.location = '../show_manage_event.php'; ";
            echo "</script>";
            
        }   
        else {
            echo "<script type='text/javascript'>"; 
            echo "alert('you can not update this data');";
            echo "window.location = '../show_manage_event.php'; ";
            echo "</script>";
        }
    
    }
    $conn->close();
?>