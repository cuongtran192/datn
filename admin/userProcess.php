<?php
include '../connectdb.php';

// Kiểm tra xem action được truyền từ URL hay không
if(isset($_GET['action'])) {
    $action = $_GET['action'];
    $userId = $_GET['id'];

    // Thực hiện các hành động tương ứng
    switch ($action) {
        case 'edit':
            // Xử lý thao tác "Sửa"
            // Hiển thị biểu mẫu chỉnh sửa hoặc thực hiện lưu thông tin sau khi chỉnh sửa
            // ...
            break;

        case 'delete':
            // Xử lý thao tác "Xóa"
            // Xóa bản ghi từ cơ sở dữ liệu
            $deleteQuery = "DELETE FROM users WHERE user_id = $userId";
            if($conn->query($deleteQuery)) {
                header("Location: index.php?page=user");
            } else {
                echo "Lỗi khi xóa: " . $conn->error;
            }
            break;

        default:
            echo "Hành động không hợp lệ!";
            break;
    }
} else {
    echo "Không có hành động được xác định!";
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
