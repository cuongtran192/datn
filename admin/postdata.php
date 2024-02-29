<?php
    header('Content-Type: application/json');
    include '../connectdb.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $currentMonth = date("n");
    $currentYear = date("Y");
    $revenueData4 = array();

    for ($i = 1; $i <= 12; $i++) {
        $month = $currentMonth + $i;
        $year = $currentYear - 1;
    
        // Chỉnh lại tháng và năm nếu vượt quá giới hạn
        if ($month > 12) {
            $month -= 12;
            $year += 1;
        }
    
        // Sử dụng hàm để lấy tổng tiền cho một tháng và năm cụ thể
        $totalRevenue = getTotalRevenue($conn, $month, $year);
        $monthYearString = "$month/$year";

        // Thêm dữ liệu vào mảng
        $revenueData4[] = array("month" => $monthYearString, "revenue" => $totalRevenue);
    }
        // Hiển thị kết quả
      
    
    
    // Đóng kết nối
    $conn->close();
    
    // Hàm lấy tổng tiền dựa trên tháng và năm
    function getTotalRevenue($conn, $month, $year) {
        // Truy vấn SQL
        $sql = "SELECT SUM(total_price) AS total_revenue
                FROM `orders`
                WHERE MONTH(order_date) = $month AND YEAR(order_date) = $year";
    
        $result = $conn->query($sql);
    
        // Kiểm tra và xử lý kết quả
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $totalRevenue = $row["total_revenue"];
        } else {
            $totalRevenue = 0;
        }
    
        return $totalRevenue;
    }
    // echo json_encode($data);
    // $month = 3; // Tháng
    // $year = 2024; // Năm
    // $totalRevenue = getTotalRevenue($month, $year);
    // echo $totalRevenue;
    // $revenueData4 = array(
    //     array("month" => "January", "revenue" => 5000),
    //     array("month" => "February", "revenue" => 6000),
    //     array("month" => "March", "revenue" => 7500),
    //     array("month" => "April", "revenue" => 8000),
    //     array("month" => "May", "revenue" => 9000),
    //     array("month" => "June", "revenue" => 12000),
    //     array("month" => "July", "revenue" => 10000),
    //     array("month" => "August", "revenue" => 11000),
    //     array("month" => "September", "revenue" => 9500),
    //     array("month" => "October", "revenue" => 8500),
    //     array("month" => "November", "revenue" => 7000),
    //     array("month" => "December", "revenue" => 9500)
    // );
    
    // echo json_encode($revenueData2);

    echo json_encode($revenueData4);
?>
