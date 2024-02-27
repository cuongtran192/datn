<?php
session_start();
include 'connectdb.php';

// Lấy thông tin từ form
$user_id = $_SESSION['user_id']; // Lấy user_id từ session
$total_price = $_SESSION['total_price']; // Lấy tổng tiền từ session
$address = $_POST['address'];
$name = $_POST['name'];
$phone = $_POST['phone'];

// Gán giá trị ngày đặt hàng
$order_date = date("Y-m-d H:i:s");

// Thêm dữ liệu vào bảng orders
$sql_order = "INSERT INTO orders (user_id, total_price, order_date, address, name, phone, state)
              VALUES (?, ?, ?, ?, ?, ?, 'pending')";
$stmt_order = $conn->prepare($sql_order);
$stmt_order->bind_param("idssss", $user_id, $total_price, $order_date, $address, $name, $phone);
$stmt_order->execute();
$order_id = $stmt_order->insert_id; // Lấy order_id của đơn hàng vừa thêm


// Lặp qua các sản phẩm trong giỏ hàng để thêm vào bảng order_product
$sql_cart = "SELECT * FROM cart WHERE user_id = $user_id";
$result_cart = $conn->query($sql_cart);
while ($row_cart = $result_cart->fetch_assoc()) {
    $product_id = $row_cart['product_id'];
    $quantity = $row_cart['number'];
    $total = $row_cart['total'];
    
    // Thêm dữ liệu vào bảng order_product
    $sql_order_product = "INSERT INTO order_product (order_id, product_id, number, price)
                          VALUES (?, ?, ?, ?)";
    $stmt_order_product = $conn->prepare($sql_order_product);
    $stmt_order_product->bind_param("iiid", $order_id, $product_id, $quantity, $total);
    $stmt_order_product->execute();
}


// Xóa dữ liệu trong bảng cart sau khi đặt hàng thành công
$sql_delete_cart = "DELETE FROM cart WHERE user_id = $user_id";
$conn->query($sql_delete_cart);

// Đóng kết nối
$stmt_order->close();
$stmt_order_product->close();
$conn->close();

// Chuyển hướng người dùng đến trang cảm ơn
header("Location: thank_you.php");
exit();
?>
