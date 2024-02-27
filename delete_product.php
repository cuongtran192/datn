<?php
session_start();
include 'connectdb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["product_id"])) {
    $product_id = $_POST["product_id"];
    // Lấy user_id từ session hoặc từ đâu đó nếu cần
    $user_id = $_SESSION["user_id"]; // Giả sử user_id được lưu trong session

    // Xóa sản phẩm khỏi giỏ hàng
    $sql = "DELETE FROM cart WHERE product_id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $product_id, $user_id);
    
    if ($stmt->execute()) {
        // Xóa thành công, chuyển hướng người dùng đến trang giỏ hàng
        header("Location: cart.php");
        exit();
    } else {
        // Xử lý khi có lỗi xảy ra
        echo "Có lỗi xảy ra khi xóa sản phẩm khỏi giỏ hàng: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // Trường hợp không có dữ liệu được gửi hoặc không có product_id
    header("Location: cart.php");
    exit();
}
?>
