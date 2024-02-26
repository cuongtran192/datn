<?php
include 'connectdb.php';
session_start(); // Bắt đầu phiên làm việc

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (isset($_SESSION['user_id'])) {
    // Kiểm tra xem dữ liệu được gửi từ biểu mẫu đánh giá sản phẩm hay không
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['rate']) && isset($_POST['comment']) && isset($_POST['product_id'])) {
        // Lấy dữ liệu từ biểu mẫu
        $user_id = $_SESSION['user_id'];
        $product_id = $_POST['product_id'];
        $rate = $_POST['rate'];
        $comment = $_POST['comment'];

        // Kiểm tra xem sản phẩm tồn tại trong cơ sở dữ liệu
        $product_check_query = "SELECT * FROM product WHERE product_id='$product_id'";
        $result = $conn->query($product_check_query);
        if ($result->num_rows == 1) {
            // Sản phẩm tồn tại, tiếp tục thêm đánh giá
            $sql = "INSERT INTO review (user_id, product_id, rate, comment, date_review) VALUES ('$user_id', '$product_id', '$rate', '$comment', NOW())";
            if ($conn->query($sql) === TRUE) {
                echo "Đánh giá đã được gửi thành công!";
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }
        } else {
            // Sản phẩm không tồn tại, thông báo lỗi
            echo "Sản phẩm không tồn tại!";
        }

        $conn->close();
    } else {
        echo "Dữ liệu không hợp lệ!";
    }
} else {
    echo "Vui lòng đăng nhập để đánh giá sản phẩm.";
}
?>
