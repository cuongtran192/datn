<?php
include 'connectdb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    $update_sql = "UPDATE cart SET number = ? WHERE product_id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ii", $quantity, $product_id);
    $stmt->execute();

    // Tính lại tổng tiền của sản phẩm sau khi cập nhật số lượng
    $select_sql = "SELECT price, discount FROM product WHERE product_id = ?";
    $stmt = $conn->prepare($select_sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $price = $row['price'];
    $discount = $row['discount'];

    // Tính tổng tiền mới
    $total = $price * $quantity * (1 - $discount / 100);

    // Cập nhật tổng tiền mới vào bảng cart
    $update_total_sql = "UPDATE cart SET total = ? WHERE product_id = ?";
    $stmt = $conn->prepare($update_total_sql);
    $stmt->bind_param("di", $total, $product_id);
    $stmt->execute();

    // Chuyển hướng người dùng trở lại trang giỏ hàng
    header("Location: cart.php");
    exit();
} else {
    // Nếu không có dữ liệu được gửi từ form, chuyển hướng người dùng trở lại trang giỏ hàng
    header("Location: cart.php");
    exit();
}
?>
