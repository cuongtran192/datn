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

        // Kiểm tra xem người dùng đã đánh giá sản phẩm này trước đó hay chưa
        $review_check_query = "SELECT * FROM review WHERE user_id='$user_id' AND product_id='$product_id'";
        $review_result = $conn->query($review_check_query);
        if ($review_result->num_rows > 0) {
            // Người dùng đã đánh giá sản phẩm này trước đó, cập nhật đánh giá mới
            $update_sql = "UPDATE review SET rate='$rate', comment='$comment', date_review=NOW() WHERE user_id='$user_id' AND product_id='$product_id'";
            if ($conn->query($update_sql) === TRUE) {
                // Đánh giá được cập nhật thành công, chuyển hướng người dùng đến trang trước đó
                echo '<script>alert("Đánh giá của bạn đã được cập nhật thành công!");';
                echo 'window.location.href = document.referrer;</script>';
            } else {
                echo "Lỗi: " . $update_sql . "<br>" . $conn->error;
            }
        } else {
            // Người dùng chưa đánh giá sản phẩm này, tiếp tục thêm đánh giá mới
            $insert_sql = "INSERT INTO review (user_id, product_id, rate, comment, date_review) VALUES ('$user_id', '$product_id', '$rate', '$comment', NOW())";
            if ($conn->query($insert_sql) === TRUE) {
                // Đánh giá mới được gửi thành công, chuyển hướng người dùng đến trang trước đó
                echo '<script>alert("Đánh giá mới của bạn đã được gửi thành công!");';
                echo 'window.location.href = document.referrer;</script>';
            } else {
                echo "Lỗi: " . $insert_sql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "Dữ liệu không hợp lệ!";
    }
} else {
    echo "Vui lòng đăng nhập để đánh giá sản phẩm.";
}
?>
