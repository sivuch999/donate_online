<?php session_start(); ?>
<?php
    include('config.php'); // เชื่อมต่อฐานข้อมูล

    if (isset($_POST['register'])) { // ดูว่ามีการส่งข้อมูลมาจาก register หรือไม่
        $salt = generateRandomSalt();
        $hashedPassword = password_hash($_POST['password'].$salt, PASSWORD_DEFAULT); // ทำการ hash
        // Verify Match Password
        if ($_POST['password'] != $_POST['confirm_password']) {
            $_SESSION["alert_fail"] = time() + 1;
            $_SESSION["alert_msg"] = "Password dose not match!!";            
            echo "<script type='text/javascript'>"; 
                echo "window.location = '../show_register.php'";
            echo "</script>";
            die();
        } // ตรวจว่า password ที่กรอกตรงกันหรือไม่

        // Upload File
        if (isset($_FILES['picture'])) {  // แปลงfileภาพ ให้สามารถให้เก็บใน database
            $image = $_FILES['picture']['name'];
            $imageTmp = $_FILES['picture']['tmp_name'];
            move_uploaded_file($imageTmp, "../image_evd/{$image}"); //ส่ง uploadfile ไปยัง folder ที่ต้องการ ex "image_evd/" ชื่อ folder  . $image ชื่อ file ภาพ
        }
        
        // Verify Duplicate users.name
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?"); // ตรวจสอบว่า name ซ้ำกันหรือไม่
        $stmt->bind_param("s", $_POST['username']);
        if (!$stmt->execute()) {
            $_SESSION["alert_fail"] = time() + 1;
            echo "<script type='text/javascript'>";
                echo "window.location = '../show_register.php';";
            echo "</script>";
            die();
        }

        $result = $stmt->get_result();
        if (mysqli_num_rows($result) == 1) {
            $_SESSION["alert_fail"] = time() + 1;
            $_SESSION["alert_msg"] = "Duplicate users!!";
            echo "<script type='text/javascript'>";
                echo "window.location = '../show_register.php';";
            echo "</script>";
            die();
        }

        $imagePath = "image_evd/{$image}";
        // Prepare Query
        $sql = "INSERT INTO users(
            donor_recipient_type_id,
            username,
            password,
            firstname,
            lastname,
            donorname,
            salt,
            picture,
            subtitles,
            status,
            contact,
            location
        ) VALUE (?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql); // ใช้ prepare แยก user input ออกจาก SQL code เพื่อป้องกัน sql injection

        // Binding Data into Query && Exucute
        $status = "0";
        $subtitles = (($_POST['subtitles']) ? $_POST['subtitles'] : "-");
        $stmt->bind_param("ssssssssssss",
            $_POST["donor_recipient_type_id"],
            $_POST["username"],
            $hashedPassword,
            $_POST["firstname"],
            $_POST["lastname"],
            $_POST["donorname"],
            $salt,
            $imagePath,
            $subtitles,
            $status,
            $_POST['contact'],
            $_POST['location']
        );
        if (!$stmt->execute()) {
            $_SESSION["alert_fail"] = time() + 1;
            echo "<script type='text/javascript'>";
                echo "window.location = '../show_register.php';";
            echo "</script>";
            die();
        }
        
        if ($stmt->affected_rows <= 0) { // ตรวจดู มีแถวใน table ที่มีการเปลี่ยนแปลงหรือไม่ ใช้กับ insert update delete 
            $_SESSION["alert_success"] = time() + 1;
            echo "<script type='text/javascript'>";
                echo "window.location = '../index.php';";
            echo "</script>";
            die();
        }

        $user_id = $conn->insert_id;
        foreach ($_POST["donate_type_id"] as $key => $value) {
            $sql = "INSERT INTO user_donate_types(user_id, donate_type_id) VALUES(?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $user_id, $value);
            $stmt->execute();
        }
        $_SESSION["alert_success"] = time() + 1;
        echo "<script type='text/javascript'>";
            echo "window.location = '../index.php';";
        echo "</script>";
        
    }
    
    $conn->close();

    function generateRandomSalt($length = 15) { // Define a function to generate a random salt.
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Define a string of characters that can be used for the salt.
        $salt = '';                                                                     // Initialize an empty string to store the salt.
        for ($i = 0; $i < $length; $i++) {                                              // Loop to generate the salt of the specified length.
            $randomIndex = rand(0, strlen($characters) - 1);                            // Generate a random index within the range of valid characters.
            $salt .= $characters[$randomIndex];                                         // Append the randomly selected character to the salt.
        }
        return $salt;
    }
?>