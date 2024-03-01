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
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table-header {
            background-color: #990000;
            color: #fff;
        }
        .table-header th, .table-header td {
            padding: 5px;
            border: 1px solid #ddd; /* Thêm đường viền cho các cột */
            white-space: nowrap; /* Ngăn chặn xuống dòng */
        }
        .quantity-input {
            width: 70px;
        }
        .btn-update {
            width: 100px; /* Đặt chiều rộng tùy ý cho nút */
        }
        .btn-checkout {
            width: auto; /* Đặt chiều rộng tùy ý cho nút */
        }
        .table-bordered {
            border: 2px solid #ddd; /* Thêm viền cho bảng */
        }
        .btn-delete {
            width: 100px; /* Đặt chiều rộng tùy ý cho nút */
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Thông tin giỏ hàng</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-header">
                <tr>
                    <th scope="col" style="width: 20%;">Hình ảnh</th>
                    <th scope="col" style="width: 150%;">Tên Sản Phẩm</th>
                    <th scope="col" style="width: 20%;">Loại Sản Phẩm</th>
                    <th scope="col" style="width: 10%;">Số Lượng</th>
                    <th scope="col" style="width: 10%;">Giá</th>
                    <th scope="col" style="width: 20%;">Giảm Giá</th>
                    <th scope="col" style="width: 10%;">Tổng Tiền</th>
                    <th scope="col" style="width: 20%;">Cập nhật</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connectdb.php'; // Kết nối đến cơ sở dữ liệu

                // Lấy user_id từ session hoặc bất kỳ cơ chế xác thực nào khác
                $user_id = $_SESSION['user_id'];

                // Truy vấn SQL để lấy thông tin giỏ hàng của user hiện tại
                $sql = "SELECT p.name AS product_name, t.name AS product_type, p.image_link_1, c.number AS quantity, p.price AS price, p.discount AS discount, c.total AS total, c.product_id AS product_id
                        FROM product p
                        INNER JOIN cart c ON p.product_id = c.product_id
                        INNER JOIN type t ON p.type_id = t.type_id
                        WHERE c.user_id = $user_id"; // Lọc theo user_id
                $result = $conn->query($sql);
                $total_price = 0;

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo '<td><img src="' . $row["image_link_1"] . '" class="img-thumbnail"></td>';
                        echo "<td>" . $row["product_name"] . "</td>";
                        echo "<td>" . $row["product_type"] . "</td>";
                        echo '<form action="update_cart.php" method="post">';
                        echo '<input type="hidden" name="product_id" value="' . $row["product_id"] . '">';
                        echo '<td><input type="number" name="quantity" value="' . $row["quantity"] . '" min="1" class="form-control quantity-input"></td>';
                        echo '<td>' . number_format($row["price"], 0, '', '.') . 'đ</td>'; // Hiển thị giá
                        echo '<td>' . number_format($row["discount"], 0, '', '.') . '%' . '</td>'; // Hiển thị giảm giá dưới dạng phần trăm
                        echo '<td>' . number_format($row["total"], 0, '', '.') . 'đ</td>'; // Hiển thị tổng tiền
                        $total_price += $row["total"]; // Tính tổng tiền
                        echo '<td class="text-right">
                            <button type="submit" class="btn btn-primary btn-update">Cập nhật</button>
                            <button type="submit" formaction="delete_product.php" class="btn btn-danger btn-delete" name="delete_product">Xóa</button>
                            </td>';
                        echo '</form>';
                        echo "</tr>";
                    }
                    // Hiển thị hàng tổng cộng
                    echo "<tr>";
                    echo "<td colspan='6' class='text-right'><b>Tổng cộng:</b></td>";
                    echo "<td><b>" . number_format($total_price, 0, '', '.') . 'đ</b></td>';
                    echo "<td></td>"; // Thêm cột trống cho phần cập nhật
                    echo "</tr>";
                } else {
                    echo "<tr><td colspan='7'>Không có sản phẩm trong giỏ hàng.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-12 text-right">
            <?php
            include 'connectdb.php'; // Kết nối đến cơ sở dữ liệu

            // Truy vấn SQL để kiểm tra xem giỏ hàng có sản phẩm không
            $user_id = $_SESSION['user_id'];
            $check_sql = "SELECT COUNT(*) AS num_products FROM cart WHERE user_id = $user_id";
            $check_result = $conn->query($check_sql);
            $row = $check_result->fetch_assoc();
            $num_products = $row['num_products'];

            if ($num_products > 0) {
                // Nếu có sản phẩm trong giỏ hàng, chuyển hướng đến trang thanh toán
                echo '<a href="checkout.php" class="btn btn-danger btn-checkout">Thanh toán</a>';
            } else {
                // Nếu không có sản phẩm trong giỏ hàng, hiển thị thông báo
                echo '<button class="btn btn-danger btn-checkout" disabled>Bạn vui lòng thêm sản phẩm vào giỏ hàng </button>';
            }

            $conn->close();
            ?>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>

</body>
</html>
