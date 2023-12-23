<?php
if(isset($_POST['Searching'])){
        // Retrieve search criteria from the form  1.รับข้อมูลจาก form action 
    if(empty($_POST['request_item']) && empty($_POST['search_name']) && empty($_POST['search_type'])){
            echo "<script type='text/javascript'>";          
                echo "window.location = '../show_Searching.php'; ";        
            echo "</script>";
    }
    elseif (!empty($_POST['request_item'])){
        $search_name = $_POST['search_name'];
        $search_type = $_POST['search_type'];

        $request_item = $_POST['request_item'];
        $all_request_item = implode(", ",$request_item);
    }
    else{
        $search_name = $_POST['search_name'];
        $search_type = $_POST['search_type'];
        $all_request_item="-";
        
    }
     
    //$serializedData = serialize($checkboxes);
    
    //------------------------------------------------------------------------------------------------------------------
    // Build the SQL query              2.เตรียมโครงสร้าง sql ที่จะใช้
    $sql = "SELECT * FROM users WHERE ";
    $sql_conditions = [];

    if (!empty($search_name)) {
        $sql_conditions[] = "LOWER(name) LIKE :search_name";
    }

    if (!empty($search_type)) {
        $sql_conditions[] = "type = :search_type";
        
    }

    if (!empty($request_item)) {
        // $checkboxes_conditions = [];
        // foreach ($checkboxes as $checkbox) {
        //     $checkboxes_conditions[] = "request_item LIKE :checkbox";
        // }
        // $sql_conditions[] = "(" . implode(" OR ", $checkboxes_conditions) . ")";
        $sql_conditions[] = "request_item LIKE :search_request_item";
        
    }
    //------------------------------------------------------------------------------------------------------------------
    // Establish a database connection using PDO    3.เชื่อมต่อฐานข้อมูล
    try {
        $db = new PDO("mysql:host=localhost;port=8889;dbname=donate_online_db", "root", "root");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    $sql .= implode(" AND ", $sql_conditions);
    $query = $db->prepare($sql);
    //------------------------------------------------------------------------------------------------------------------

    // Bind parameters to prevent SQL injection สร้างเงื่อนไงการค้นหาแต่ละกรณี
    if (!empty($search_name)) {
        $search_name_value = '%' . strtolower($search_name) . '%';
        $query->bindParam(':search_name', $search_name_value, PDO::PARAM_STR);
    }
    if (!empty($search_type)) {
        $query->bindParam(':search_type', $search_type, PDO::PARAM_STR);
        
        
    }
    if (!empty($request_item)) { 
        // foreach ($checkboxes as $checkbox) {
        //     $query->bindParam(':checkbox',  $serializedData , PDO::PARAM_STR);
        // }
        $search_request_item = '%' . strtolower($all_request_item) . '%';
        $query->bindParam(':search_request_item', $search_request_item, PDO::PARAM_STR);


    }
    // if (!empty($search_name) && !empty($search_type)) {
    //     $search_name_value = '%' . strtolower($search_name) . '%';
    //     $search_type_value = strtolower($search_type);
    //     $query->bindParam(':search_name', $search_name_value, PDO::PARAM_STR);
    //     $query->bindParam(':search_type', $search_type_value, PDO::PARAM_STR);
    // }
    //------------------------------------------------------------------------------------------------------------------
    session_start();
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['results'] = $results;
    // Process and display the results
    if (count($results) > 0) {
        
             echo "<script type='text/javascript'>";          
            // echo "alert('Search Complete');";
             echo "window.location = '../show_Searched.php'; ";        
             echo "</script>";

            
            
  
    }
    else {
        echo "<script type='text/javascript'>";
        echo "alert('not found any match');";     
        echo "window.location = '../show_Searching.php'; ";        
        echo "</script>";
    }

    // Close the database connection
    $db = null;
}else{
    include('db/DB_show_Searching.php');
}
$_SESSION['time_login'] = time();

?>
