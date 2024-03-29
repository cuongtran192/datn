<?php
session_start();
include 'connectdb.php';

// Lấy thông tin từ form
$user_id = $_SESSION['user_id'];
$total_price = $_SESSION['total_price'];
$address = $_POST['address'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$payment = $_POST['payment']; // Thu thập giá trị phương thức thanh toán từ form
date_default_timezone_set('Asia/Ho_Chi_Minh');


// Lấy thời gian hiện tại với định dạng Y-m-d H:i:s
$order_date = date("Y-m-d H:i:s");

// Thêm dữ liệu vào bảng orders
$sql_order = "INSERT INTO orders (user_id, total_price, order_date, address, name, phone, payment, state)
              VALUES (?, ?, ?, ?, ?, ?, ?, 'Chờ xác nhận')";
$stmt_order = $conn->prepare($sql_order);
$stmt_order->bind_param("idsssss", $user_id, $total_price, $order_date, $address, $name, $phone, $payment);
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

    // Truy vấn SQL để giảm số lượng sản phẩm trong kho (number)
    $sql_update_product = "UPDATE product SET number = number - ? WHERE product_id = ?";
    $stmt_update_product = $conn->prepare($sql_update_product);
    $stmt_update_product->bind_param("ii", $quantity, $product_id);
    $stmt_update_product->execute();

    // Truy vấn SQL để tăng số lượng đã mua của sản phẩm (number_buy)
    $sql_update_product_buy = "UPDATE product SET number_buy = number_buy + ? WHERE product_id = ?";
    $stmt_update_product_buy = $conn->prepare($sql_update_product_buy);
    $stmt_update_product_buy->bind_param("ii", $quantity, $product_id);
    $stmt_update_product_buy->execute();
}


// Xóa dữ liệu trong bảng cart sau khi đặt hàng thành công
$sql_delete_cart = "DELETE FROM cart WHERE user_id = $user_id";
$conn->query($sql_delete_cart);

// Đóng kết nối
$stmt_order->close();
$stmt_order_product->close();
$stmt_update_product->close();
$stmt_update_product_buy->close();
$conn->close();

// Chuyển hướng người dùng đến trang cảm ơn
echo '<script>';
echo 'alert("Cảm ơn bạn đã mua hàng. Nhấn OK để quay lại trang chủ.");';
echo 'window.location.href = "index.php";'; // Chuyển hướng về trang chủ
echo '</script>';
?>
