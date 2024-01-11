<?php
    session_start();
    if(isset($_POST['select'])){
        $_SESSION['name']=$_POST['name'];
        echo "<script type='text/javascript'>";
        echo "window.location = '../show_event.php'; ";
        echo "</script>";

    }
    else{
        echo "<script type='text/javascript'>";
        echo "alert('noting send to this page??? ');";
        echo "window.location = '../show_Searching.php?page=searching_website'; ";
        echo "</script>";
    }
?>