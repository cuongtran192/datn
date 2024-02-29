<?php
// Kết nối với cơ sở dữ liệu
include '../config/connectdb.php';

// Lấy dữ liệu từ form đăng ký
$name = $_POST['name'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Kiểm tra xác nhận mật khẩu
if ($password !== $confirm_password) {
    echo '<script>alert("Mật khẩu và xác nhận mật khẩu không khớp."); window.history.back();</script>';
    exit;
}

// Kiểm tra xem số điện thoại đã tồn tại trong cơ sở dữ liệu chưa
$check_query = "SELECT * FROM users WHERE phone = '$phone'";
$check_result = mysqli_query($conn, $check_query);

if (mysqli_num_rows($check_result) > 0) {
    // Nếu số điện thoại đã tồn tại, hiển thị thông báo và quay lại trang đăng ký
    echo '<script>alert("Số điện thoại đã tồn tại."); window.history.back();</script>';
} else {
    // Nếu số điện thoại chưa tồn tại, thêm người dùng mới vào cơ sở dữ liệu
    $insert_query = "INSERT INTO users (name, phone, password) VALUES ('$name','$phone', '$password')";
    if (mysqli_query($conn, $insert_query)) {
        echo '<script>alert("Đăng ký thành công."); window.location.href = "../login.php";</script>';
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
    }
}

// Đóng kết nối
mysqli_close($conn);
?>
