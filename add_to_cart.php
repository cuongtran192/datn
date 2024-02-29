<?php
session_start();
include 'connectdb.php';

// Kiểm tra xem có dữ liệu gửi từ form hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $product_id = $_POST['product_id'];
    $price = $_POST['price'];

    // Thêm sản phẩm vào giỏ hàng
    $sql = "INSERT INTO cart (user_id, product_id, number, total) VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE number = number + VALUES(number), total = total + VALUES(total)";
    $stmt = $conn->prepare($sql);

    // Lấy user_id từ session (nếu có)
    $user_id = $_SESSION['user_id'] ?? null;

    if (!$user_id) {
        // Xử lý khi không tìm thấy user_id trong session
        echo "<script>";
        echo "if(confirm('Vui lòng đăng nhập để mua hàng.')){";
        echo "  window.location.href = 'login.php';"; // Chuyển hướng đến trang đăng nhập nếu người dùng chọn "Đăng nhập"
        echo "} else {";
        echo "  window.history.back();"; // Quay lại trang trước nếu người dùng chọn "Quay lại trang trước"
        echo "}";
        echo "</script>";
        exit(); // Kết thúc quá trình thực thi để tránh tiếp tục thực hiện mã
    }

    $number = 1; // Số lượng sản phẩm được thêm vào giỏ hàng
    $total = $price * $number; // Tính toán tổng giá trị của sản phẩm

    // Bạn đã có 4 tham số trong câu lệnh SQL, vì vậy bạn cần truyền 4 biến vào bind_param()
    $stmt->bind_param("iiid", $user_id, $product_id, $number, $total);

    if ($stmt->execute()) {
        echo '<script>
        var confirmAddToCart = confirm("Sản phẩm đã được thêm vào giỏ hàng thành công. Bạn có muốn chuyển đến giỏ hàng?");
        if (confirmAddToCart) {
            window.location.href = "cart.php"; // Chuyển đến trang giỏ hàng
        } else {
            history.back(); // Quay lại trang trước đó
        }
        </script>';
    } else {
        echo "Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng: " . $stmt->error;
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
} else {
    echo "Không có dữ liệu được gửi từ form!";
}
?>
