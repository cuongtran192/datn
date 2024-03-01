<?php
include 'header.php';

// Kiểm tra xem user_id đã được thiết lập trong session hay chưa
if (!isset($_SESSION['user_id'])) {
    // Hiển thị thông báo và chờ người dùng xác nhận
    echo '<script>';
    echo 'if(confirm("Bạn vui lòng đăng nhập để xem giỏ hàng.")) {';
    echo '  window.location.href = "login.php";'; // Chuyển hướng đến trang đăng nhập nếu nhấn OK
    echo '} else {';
    echo '  window.location.href = "index.php";'; // Ở lại trang chủ nếu nhấn Cancel
    echo '}';
    echo '</script>';
    exit; // Kết thúc kịch bản
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Xác nhận đơn hàng</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" style="width: 10%;">Hình ảnh</th>
                    <th scope="col">Tên Sản Phẩm</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Tổng Tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connectdb.php'; // Kết nối đến cơ sở dữ liệu

                // Lấy user_id từ session hoặc bất kỳ cơ chế xác thực nào khác
                $user_id = $_SESSION['user_id'];

                // Truy vấn SQL để lấy thông tin giỏ hàng của user hiện tại
                $sql = "SELECT p.name AS product_name, p.image_link_1, c.number AS quantity, p.price AS price, c.total AS total
                        FROM product p
                        INNER JOIN cart c ON p.product_id = c.product_id
                        WHERE c.user_id = $user_id"; // Lọc theo user_id

                $result = $conn->query($sql);
                $total_price = 0;

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo '<td><img src="' . $row["image_link_1"] . '" class="img-thumbnail"></td>';
                        echo "<td>" . $row["product_name"] . "</td>";
                        echo "<td>" . $row["quantity"] . "</td>";
                        echo "<td>" . number_format($row["price"], 0, '', '.') . 'đ</td>'; // Hiển thị giá
                        echo "<td>" . number_format($row["total"], 0, '', '.') . 'đ</td>'; // Hiển thị tổng tiền
                        echo "</tr>";
                        $total_price += $row["total"]; // Tính tổng tiền
                    }
                } else {
                    echo "<tr><td colspan='5'>Không có sản phẩm trong giỏ hàng.</td></tr>";
                }
                // Hiển thị hàng tổng cộng
                echo "<tr>";
                echo "<td colspan='4' class='text-right'><strong>Tổng tiền:</strong></td>";
                echo "<td>" . number_format($total_price, 0, '', '.') . 'đ</td>'; // Hiển thị tổng tiền
                echo "</tr>";

                // Lưu tổng tiền vào biến session
                $_SESSION['total_price'] = $total_price;

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="container mt-6">
    <h2 class="mb-4">Xác nhận đơn hàng</h2>
    <?php
    // Kiểm tra xem có sản phẩm trong giỏ hàng hay không
    if ($result->num_rows > 0) {
        echo '<form action="process_order.php" method="post">';
        echo '<div class="form-group">';
        echo '<label for="name">Họ và tên:</label>';
        echo '<input type="text" class="form-control" id="name" name="name" required>';
        echo '</div>';
        echo '<div class="form-group">';
        echo '<label for="phone">Số điện thoại:</label>';
        echo '<input type="text" class="form-control" id="phone" name="phone" required>';
        echo '</div>';
        echo '<div class="form-group">';
        echo '<label for="address">Địa chỉ giao hàng:</label>';
        echo '<textarea class="form-control" id="address" name="address" required></textarea>';
        echo '</div>';
        echo '<div class="form-group">';
        echo '<label for="payment">Phương thức thanh toán:</label>';
        echo '<select class="form-control" id="payment" name="payment">';
        echo '<option value="cash">Thanh toán khi nhận hàng (COD)</option>';
        echo '<option value="bank_transfer">Chuyển khoản ngân hàng</option>';
        echo '<option value="credit_card">Thẻ tín dụng</option>';
        echo '</select>';
        echo '</div>';
        echo '<button type="submit" class="btn btn-success">Đặt hàng</button>';
        echo '</form>';
    } else {
        // Hiển thị thông báo khi không có sản phẩm trong giỏ hàng
        echo '<div class="alert alert-warning" role="alert">';
        echo 'Không có sản phẩm trong giỏ hàng. Vui lòng thêm sản phẩm vào giỏ hàng để tiến hành thanh toán.';
        echo '</div>';
    }
    ?>
</div>

</body>
</html>

<?php
include 'footer.php';
?>
