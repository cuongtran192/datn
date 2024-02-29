<?php
include 'connectdb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Kiểm tra số lượng mua mới có lớn hơn số lượng sản phẩm còn trong kho không
    $check_quantity_sql = "SELECT number FROM product WHERE product_id = ?";
    $stmt = $conn->prepare($check_quantity_sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $available_quantity = $row['number'];

    if ($quantity > $available_quantity) {
        // Nếu số lượng mua mới lớn hơn số lượng sản phẩm còn trong kho, xuất thông báo cảnh báo
        echo '<script>';
        echo 'alert("Bạn mua quá số lượng còn hàng, vui lòng chọn lại số lượng");';
        echo 'window.location.href = "cart.php";'; // Chuyển hướng người dùng trở lại trang giỏ hàng
        echo '</script>';
        exit(); // Dừng việc thực hiện các lệnh PHP tiếp theo
    } else {
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
    }
} else {
    // Nếu không có dữ liệu được gửi từ form, chuyển hướng người dùng trở lại trang giỏ hàng
    header("Location: cart.php");
    exit();
}
?>
