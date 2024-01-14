<?php
    session_start();
    include('config.php'); //import การเชื่อมฐานข้อมูลจาก server.php
    
    // รับข้อมูลจาก form login
    if (isset($_POST['login'])){
        $username = $_POST['username']; // $_POST['username'] = รับค่าจาก form action ที่ชื่อว่า username method post
        $password = $_POST['password'];

        //ทำการตรวจสอบความถูกต้องกับฐานข้อมูล และ ป้องกัน SQL Injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?"); //ใช้ prepare ในการแยก user input ออกจาก SQL
        $stmt->bind_param("s", $username); // ใช้ bind_param ในการผูกค่า $username และ $password กับ placeholders(?)  และ "ss" หมายถึงค่าใน 2 ตัวแปรที่รับมาเป็น string
        $stmt->execute();
        $result = $stmt->get_result();
        
        if (mysqli_num_rows($result) == 1) { // mysqli_num_row เป็นการนับแถวใน sql ถ้า =1 แสดงว่ามีข้อมูลใน ฐานข้มูล
            $row = mysqli_fetch_assoc($result);// ดึงข้อมูลจาก $result (from TB)
            $status = $row['status']; // เจาะจงว่าเอาจาก attribute status
            $salt = $row['salt'];
            $passwordWithSalt = $password.$salt;
            $password_on_DB = $row['password'];
            // $_SESSION['time_login'] = time(); // เก็บเวลาสำหรับนำไปใช้ทำ time out
            if (password_verify($passwordWithSalt, $password_on_DB)) { // ทำการตรวจสอบ hashed password
                $_SESSION['type'] = (($row['is_admin']) ? "admin" : "user" );
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['donorname'] = $row["donorname"];
                $_SESSION['status'] = $row['status'];
                $_SESSION['is_admin'] = $row['is_admin'];
                if ($status == 0) {
                    // $_SESSION["alert_success"] = time() + 1;
                    // $_SESSION["alert_msg"] = "Your login was successful please wait until the admin confirms the process";
                    echo "<script>";
                        // echo "alert('Your login was successful please wait until the admin confirms the process');";
                        echo "window.location = '../show_manage_event.php?page=manage_event.php'; ";
                    echo "</script>";
                } else {
                    echo "<script>";
                    if ($row['is_admin'] == "1") {
                        echo "window.location = '../admin_page.php?page=admin_users_management';";
                    } else {
                        echo "window.location = '../show_manage_event.php?page=manage_event';";
                    }
                    echo "</script>";
                }
            } else {
                $_SESSION["alert_fail"] = time() + 1;
                $_SESSION["alert_msg"] = "Login Fail Please try again";
                echo "<script>";          
                    echo "window.location = '../show_login.php'; ";        
                echo "</script>";
            }   
        } else {
            $_SESSION["alert_fail"] = time() + 1;
            $_SESSION["alert_msg"] = "Login Fail Please try again";
            echo "<script>"; // สั่งให้สามารถใช้ javascript ได้
                echo "window.location = '../show_login.php'; "; // ให้ไปยังหน้า index.php
            echo "</script>";
        }

        $conn->close();

    }   
?>