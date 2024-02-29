<?php
    header('Content-Type: application/json');
    // require_once("database.php");
    
    // $data = array();
    // $query = "SELECT status, COUNT(status) AS size_status FROM graph GROUP BY status";
    
    // $stmt = $conn->prepare($query);
    
    // if ($stmt->execute()) {
    //     $result = $stmt->get_result();
    
    //     if ($result->num_rows > 0) {
    //         while ($row = $result->fetch_assoc()) {
    //             $data[] = $row;
    //         }
    //     }
    // }
    
    // echo json_encode($data);
    
    

    // Fake data for demonstration purposes
    $revenueData = array(
        array("month" => "January", "revenue" => 5000),
        array("month" => "February", "revenue" => 6000),
        array("month" => "March", "revenue" => 7500),
        array("month" => "April", "revenue" => 8000),
        array("month" => "May", "revenue" => 9000),
        array("month" => "June", "revenue" => 12000),
        array("month" => "July", "revenue" => 10000),
        array("month" => "August", "revenue" => 11000),
        array("month" => "September", "revenue" => 9500),
        array("month" => "October", "revenue" => 8500),
        array("month" => "November", "revenue" => 7000),
        array("month" => "December", "revenue" => 9500)
    );
    
    echo json_encode($revenueData);

    
?>
