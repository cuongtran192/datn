<?php
// Kết nối với cơ sở dữ liệu
include '../config/connectdb.php';

// Lấy dữ liệu từ form đăng nhập
$phone = $_POST['phone'];
$password = $_POST['password'];

// Kiểm tra số điện thoại và mật khẩu
$sql = "SELECT * FROM users WHERE phone = '$phone' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // Khởi tạo session
    session_start();
    // Lấy thông tin người dùng từ kết quả truy vấn
    $user = mysqli_fetch_assoc($result);
    // Lưu số điện thoại và user_id vào session
    $_SESSION['phone'] = $phone;
    $_SESSION['user_id'] = $user['user_id'];
    // Hiển thị thông báo đăng nhập thành công bằng JavaScript và chuyển hướng đến index.php
    echo '<script>alert("Đăng nhập thành công."); window.location.href = "../index.php";</script>';
} else {
    // Hiển thị thông báo đăng nhập thất bại và nút thử lại bằng JavaScript
    echo '<script>alert("Số điện thoại hoặc mật khẩu không đúng."); window.history.back();</script>';
}




// Đóng kết nối
mysqli_close($conn);
?>
