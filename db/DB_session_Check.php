<?php
    session_start();

    $username = $_SESSION['username'];
    $password = $_SESSION['password'];


    if ($username == "" || $password == "") {
        echo "<script>";
            echo "alert('Please login first');";
            echo "window.location = './'; ";
        echo "</script>";
    }

    // Check if the user is logged in and there is an activity timestamp in the session.
    if (isset($username) && isset($password)) {
        // $inactiveTime = time() - $_SESSION['time_login'];

        // // If the user has been inactive for more than the timeout, log them out.
        // if ($inactiveTime >= 720) {
        //     // Destroy the session.
        //     session_destroy();
        //     echo "<script>";
        //         echo "alert('You are Time out');";
        //         echo "window.location = './'; ";
        //     echo "</script>";
        //     exit();
        // }
    }

?>
