<?php
// Kết nối đến cơ sở dữ liệu và bắt đầu session
include 'header.php';
include 'connectdb.php';

// Kiểm tra xem order_id đã được truyền vào từ URL hay không
if (!isset($_GET['order_id'])) {
    // Nếu không có order_id, chuyển hướng người dùng về trang order.php hoặc trang khác
    header("Location: order.php");
    exit(); // Kết thúc kịch bản
}

// Lấy order_id từ URL
$order_id = $_GET['order_id'];

// Truy vấn SQL để lấy thông tin chi tiết của đơn hàng từ bảng orders
$sql_order_detail = "SELECT * FROM orders WHERE order_id = ?";
$stmt_order_detail = $conn->prepare($sql_order_detail);
$stmt_order_detail->bind_param("i", $order_id);
$stmt_order_detail->execute();
$result_order_detail = $stmt_order_detail->get_result();

// Kiểm tra xem đơn hàng có tồn tại hay không
if ($result_order_detail->num_rows == 0) {
    echo "Đơn hàng không tồn tại.";
    exit(); // Kết thúc kịch bản nếu không tìm thấy đơn hàng
}

// Lấy thông tin chi tiết của đơn hàng
$order_detail = $result_order_detail->fetch_assoc();

// Truy vấn SQL để lấy thông tin chi tiết về các sản phẩm trong đơn hàng từ bảng order_product
$sql_product_detail = "SELECT p.name AS product_name, p.price AS product_price, op.number AS product_quantity, op.price AS product_total, p.image_link_1 AS image_link
                      FROM order_product op
                      INNER JOIN product p ON op.product_id = p.product_id
                      WHERE op.order_id = ?";
$stmt_product_detail = $conn->prepare($sql_product_detail);
$stmt_product_detail->bind_param("i", $order_id);
$stmt_product_detail->execute();
$result_product_detail = $stmt_product_detail->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5 rounded" style="border: 2px solid #ddd; padding: 20px;">
    <h2 class="mb-4">CHI TIẾT ĐƠN HÀNG</h2>
    <h4>Thông tin đơn hàng: Mã đơn <u><i>#LAPTOPS<?php echo $order_id; ?></h4></u></i>

    <p style="text-align: left;"><strong style="color: black; font-family: Arial, sans-serif;" >Người nhận hàng:</strong> <?php  echo $order_detail['name']; ?></p>
    <p style="text-align: left;"><strong style="color: black; font-family: Arial, sans-serif;">Địa chỉ giao hàng:</strong> <?php echo $order_detail['address']; ?></p>
    <p style="text-align: left;"><strong style="color: black; font-family: Arial, sans-serif;">Số điện thoại:</strong> <?php echo $order_detail['phone']; ?></p>
    <p style="text-align: left;"><strong style="color: black; font-family: Arial, sans-serif;">Phương thức thanh toán:</strong> <?php echo $order_detail['payment']; ?></p>
    <p style="text-align: left;"><strong style="color: black; font-family: Arial, sans-serif;">Trạng thái:</strong> <?php echo $order_detail['state']; ?></p>
    <p style="text-align: left;"><strong style="color: black; font-family: Arial, sans-serif;">Tổng tiền:</strong> <?php echo number_format($order_detail['total_price'], 0, '', '.') . 'đ'; ?></p>

    <h4>Danh sách sản phẩm:</h4>
    <table class="table">
    <thead>
        <tr>
            <th style="white-space: nowrap;">STT</th>
            <th style="white-space: nowrap;">Hình ảnh</th> <!-- Thêm cột hình ảnh -->
            <th style="white-space: nowrap;">Tên sản phẩm</th>
            <th style="white-space: nowrap;">Số lượng</th>
            <th style="white-space: nowrap;">Đơn giá</th>
            <th style="white-space: nowrap;">Tổng tiền</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        while ($product_detail = $result_product_detail->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $count++ . "</td>";
            // Thêm cột hình ảnh
            echo "<td><img src='" . $product_detail['image_link'] . "' alt='Product Image' style='max-width: 100px;'></td>";
            echo "<td>" . $product_detail['product_name'] . "</td>";
            echo "<td>" . $product_detail['product_quantity'] . "</td>";
            echo "<td>" . number_format($product_detail['product_price'], 0, '', '.') . 'đ' . "</td>";
            echo "<td>" . number_format($product_detail['product_total'], 0, '', '.') . 'đ' . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
</div>


</body>
</html>
