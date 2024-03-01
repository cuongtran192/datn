<?php
include 'header.php';

// Kiểm tra xem user_id đã được thiết lập trong session hay chưa
if (!isset($_SESSION['user_id'])) {
    // Hiển thị thông báo và chờ người dùng xác nhận
    echo '<script>';
    echo 'if(confirm("Bạn vui lòng đăng nhập để xem đơn hàng.")) {';
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
    <title>Đơn hàng của bạn</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Đơn hàng của bạn</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Mã Đơn Hàng</th>
                    <th scope="col">Ngày Đặt</th>
                    <th scope="col">Trạng Thái</th>
                    <th scope="col">Tổng Tiền</th>
                    <th scope="col">Chi Tiết Đơn Hàng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connectdb.php'; // Kết nối đến cơ sở dữ liệu

                // Lấy user_id từ session hoặc bất kỳ cơ chế xác thực nào khác
                $user_id = $_SESSION['user_id'];

                // Truy vấn SQL để lấy thông tin đơn hàng của user hiện tại
                $sql = "SELECT * FROM orders WHERE user_id = $user_id ORDER BY order_date DESC"; // Lọc theo user_id
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["order_id"] . "</td>";
                        echo "<td>" . $row["order_date"] . "</td>";
                        echo "<td>" . $row["state"] . "</td>";
                        echo "<td>" . number_format($row["total_price"], 0, '', '.') . 'đ</td>'; // Hiển thị tổng tiền
                        echo '<td><a href="order_detail.php?order_id=' . $row["order_id"] . '" class="btn btn-info">Chi Tiết</a></td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Không có đơn hàng nào.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

<?php
include 'footer.php';
?>
